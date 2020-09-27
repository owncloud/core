<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Files\Command;

use Doctrine\DBAL\Platforms\MySqlPlatform;
use OC\Share20\ProviderFactory;
use OCP\IDBConnection;
use OCP\Share\IManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;

/**
 */
class TroubleshootTransferOwnership extends Command {

	/**
	 * @var ProviderFactory
	 */
	protected $shareProviderFactory;

	/**
	 * @var IDBConnection
	 */
	protected $connection;

	private $allowedOps = "all|invalid-owner|invalid-initiator";

	public function __construct(IDBConnection $connection, ProviderFactory $shareProviderFactory) {
		$this->connection = $connection;
		$this->shareProviderFactory = $shareProviderFactory;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('files:troubleshoot-transfer-ownership')
			->setDescription('Scan for problems that might have occurred while running ownership transfer')
			->addArgument(
				'type',
				InputArgument::OPTIONAL,
				$this->allowedOps,
				''
			)
			->addOption(
				'fix',
				'f',
				InputOption::VALUE_NONE,
				'perform auto-fix for found problems'
			)
			->addOption(
				'uid',
				'u',
				InputArgument::OPTIONAL,
				'scope for particular user',
				null
			);
	}

	public function execute(InputInterface $input, OutputInterface $output) {
		$type = $input->getArgument('type');
		$fix = $input->getOption('fix');
		$scopeUid = $input->getOption('uid');

		$allowedOps = \explode("|", $this->allowedOps);
		if (!\in_array($type, $allowedOps)) {
			$output->writeln([
				"<error>type is not recognised, allowed: {$this->allowedOps}</>",
			]);
			return 1;
		}

		if ($type == 'all' || $type == 'invalid-initiator') {
			$this->findInvalidReshareInitiator($input, $output, $fix, $scopeUid);
		}
		if ($type == 'all' || $type == 'invalid-owner') {
			$this->findInvalidShareOwner($input, $output, $fix, $scopeUid);
		}

		return 0;
	}

	/**
	 * Search for shares with invalid storage ids. This could have happened due
	 * to past bug or as a result of lack of transactions in IManager->transferShare
	 * that could cause mismatching entries when a run has been terminated.
	 *
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param boolean $fix
	 * @param $scopeUid
	 */
	protected function findInvalidShareOwner(InputInterface $input, OutputInterface $output, $fix, $scopeUid) {
		$output->writeln([
			"<info>==========================</>",
			"<info>Searching for shares that have invalid uid_owner, meaning share uid_owner that does not match associated file storage id.</>",
			"<info>==========================</>",
			"",
		]);

		$invalidSharesCount = 0;

		$shareStorages = \array_merge(
			$this->getAllInvalidShareStorages('home::', $scopeUid),
			$this->getAllInvalidShareStorages('object::user:', $scopeUid)
		);

		$tableRows = [];
		$table = new Table($output);
		$table->setHeaders([
			[new TableCell("Invalid share storages", ['colspan' => 8])],
			['share_id', 'share_type', 'share_parent', 'file_source', 'storage', 'uid_owner', 'uid_initiator', 'share_with'],
		]);

		$sharesToFix = [];
		foreach ($shareStorages as $shareStorage) {
			$invalidSharesCount += 1;
			\array_push($sharesToFix, $shareStorage);
			\array_push($tableRows, [$shareStorage['share_id'], $shareStorage['share_type'], $shareStorage['share_parent'], $shareStorage['file_source'], $shareStorage['storage'], $shareStorage['uid_owner'], $shareStorage['uid_initiator'], $shareStorage['share_with']]);
		}

		if (\count($tableRows) > 0) {
			$table->setRows($tableRows);
			$table->render();
			$output->writeln("");
		}

		$output->writeln("<info>Found $invalidSharesCount invalid share owners</>");

		if ($fix) {
			foreach ($sharesToFix as $shareToFix) {
				// we need to adjust uid_owner to match user storage id
				$userIdFromStorage = null;
				if (\strpos($shareToFix['storage'], 'home::') === 0) {
					$userIdFromStorage = \explode('home::', $shareToFix['storage'])[1];
				} elseif (\strpos($shareToFix['storage'], 'object::user:') === 0) {
					$userIdFromStorage = \explode('object::user:', $shareToFix['storage'])[1];
				}

				if (!$userIdFromStorage) {
					continue;
				}

				if ($shareToFix['share_with'] !== null && $userIdFromStorage == $shareToFix['share_with']) {
					$this->deleteCorruptedShare($shareToFix['share_id'], (int) $shareToFix["share_type"]);
				} else {
					$this->adjustShareOwner($shareToFix['share_id'], $userIdFromStorage);
				}
			}

			$output->writeln("<info>Repaired $invalidSharesCount invalid share owners</>");
		}

		$output->writeln("");
	}

	/**
	 * Search for invalid initiator of the reshare that has been generated by
	 * bug which has been fixed as of https://github.com/owncloud/core/pull/37791
	 *
	 * NOTE: this command can take long
	 *
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param boolean $fix
	 * @param $scopeUid
	 */
	protected function findInvalidReshareInitiator(InputInterface $input, OutputInterface $output, $fix, $scopeUid) {
		$output->writeln([
			"<info>==========================</>",
			"<info>Searching for reshares that have invalid uid_initiator(resharer), meaning resharer which does not have the received share mounted anymore (that he reshared with other user).</>",
			"<info>==========================</>",
			"",
		]);

		$runExceptions = 0;
		$invalidReshareInitiatorCount = 0;

		if ($scopeUid == null) {
			$resharers = $this->getAllResharers();
		} else {
			$resharers = [['uid_initiator' => $scopeUid]];
		}

		$resharesToFix = [];
		foreach ($resharers as $resharer) {
			$resharerUid = $resharer['uid_initiator'];

			$table = new Table($output);
			$table->setHeaders([
				[new TableCell("Invalid uid_initiator found for $resharerUid", ['colspan' => 7])],
				['share_id', 'share_type', 'share_parent', 'file_source', 'uid_owner', 'uid_initiator', 'share_with'],
			]);
			$tableRows = [];
			try {
				$this->setupFS($resharerUid);
				$userFolder = $this->getUserFolder($resharerUid);

				// extract all reshares for this user and check if they have mount node
				$reshares = $this->getResharesForUser($resharerUid);
				foreach ($reshares as $reshare) {
					$nodes = $userFolder->getById((int) $reshare['file_source'], true);
					if (\count($nodes) == 0) {
						$invalidReshareInitiatorCount += 1;
						\array_push($resharesToFix, $reshare);
						\array_push($tableRows, [$reshare['id'], $reshare['share_type'], $reshare['parent'], $reshare['file_source'], $reshare['uid_owner'], $reshare['uid_initiator'], $reshare['share_with']]);
					}
				}
				if (\count($tableRows) > 0) {
					$table->setRows($tableRows);
					$table->render();
					$output->writeln("");
				}
				$this->tearDownFS();
			} catch (\Exception $e) {
				$runExceptions = $runExceptions + 1;
				$table->setRows($tableRows);
				$table->render();
				$output->writeln("<info>Encountered error for user {$resharer['uid_initiator']}, command might need to be retried: </info>");
				$output->writeln("<error>{$e->getMessage()}: </error>");
				$output->writeln("<error>{$e->getTraceAsString()}: </error>");
				$output->writeln("<info>Waiting 5 seconds after error before continuing with next user..</info>");
				$output->writeln("");
				\sleep(5);
			}
		}

		$output->writeln([
			"<info>Encountered $runExceptions exceptions while running command</>",
			"<info>Found $invalidReshareInitiatorCount invalid initiator reshares</>"
		]);

		if ($fix) {
			foreach ($resharesToFix as $reshareToFix) {
				// as we do not know what uid_initiator might be, we need to use uid_owner (original share initiator)
				$this->adjustShareInitiator($reshareToFix['id'], $reshareToFix['uid_owner']);
			}

			$output->writeln("<info>Repaired $invalidReshareInitiatorCount invalid initiator reshares</>");
		}

		$output->writeln("");
	}

	protected function getAllResharers() {
		$query = $this->connection->getQueryBuilder();

		$query->selectDistinct('uid_initiator')
			->from('share')
			->andWhere($query->expr()->orX(
				$query->expr()->eq('item_type', $query->createNamedParameter('file')),
				$query->expr()->eq('item_type', $query->createNamedParameter('folder'))
			));

		$query->andWhere($query->expr()->neq('uid_initiator', 'uid_owner'));

		$cursor = $query->execute();
		$resharers = $cursor->fetchAll();
		$cursor->closeCursor();

		return $resharers;
	}

	protected function getResharesForUser($userId) {
		$query = $this->connection->getQueryBuilder();

		$query->select('*')
			->from('share')
			->andWhere($query->expr()->orX(
				$query->expr()->eq('item_type', $query->createNamedParameter('file')),
				$query->expr()->eq('item_type', $query->createNamedParameter('folder'))
			));

		$query->andWhere($query->expr()->neq('uid_initiator', 'uid_owner'));
		$query->andWhere($query->expr()->eq('uid_initiator', $query->createNamedParameter($userId)));

		$cursor = $query->execute();
		$reshares = $cursor->fetchAll();
		$cursor->closeCursor();

		return $reshares;
	}

	protected function getAllInvalidShareStorages($storageType, $scopeUid) {
		$query = $this->connection->getQueryBuilder();

		if ($this->connection->getDatabasePlatform() instanceof MySqlPlatform) {
			$concatFunction = $query->createFunction("CONCAT('$storageType', s.uid_owner)");
		} else {
			$concatFunction = $query->createFunction("('$storageType' || s.`uid_owner`)");
		}

		$query->select('s.id', 's.file_source', 's.share_type', 's.parent', 'st.id', 's.uid_owner', 's.uid_initiator', 's.share_with')
			->selectAlias('s.id', 'share_id')
			->selectAlias('s.file_source', 'file_source')
			->selectAlias('s.share_type', 'share_type')
			->selectAlias('s.parent', 'share_parent')
			->selectAlias('st.id', 'storage')
			->selectAlias('s.uid_owner', 'uid_owner')
			->selectAlias('s.uid_initiator', 'uid_initiator')
			->selectAlias('s.share_with', 'share_with')
			->from('share', 's')
			->join('s', 'filecache', 'f', $query->expr()->eq('s.file_source', 'f.fileid'))
			->join('f', 'storages', 'st', $query->expr()->eq('st.numeric_id', 'f.storage'))
			->andWhere($query->expr()->orX(
				$query->expr()->like('st.id', $query->createNamedParameter("$storageType%"))
			))
			->andWhere($query->expr()->orX(
				$query->expr()->eq('s.item_type', $query->createNamedParameter('file')),
				$query->expr()->eq('s.item_type', $query->createNamedParameter('folder'))
			))
			->andWhere($query->expr()->neq(
				$concatFunction,
				'st.id'
			));

		if ($scopeUid !== null) {
			$query->andWhere($query->expr()->eq('s.uid_owner', $query->createNamedParameter($scopeUid)));
		}

		$cursor = $query->execute();
		$shareStorages = $cursor->fetchAll();
		$cursor->closeCursor();

		return $shareStorages;
	}

	protected function adjustShareInitiator($shareId, $newUidInitiator) {
		$query = $this->connection->getQueryBuilder();

		$query->update('share')
			->set('uid_initiator', $query->createParameter('uid_initiator'))
			->where($query->expr()->eq('id', $query->createParameter('shareid')))
			->andWhere($query->expr()->orX(
				$query->expr()->eq('item_type', $query->createNamedParameter('file')),
				$query->expr()->eq('item_type', $query->createNamedParameter('folder'))
			));

		$query->setParameter('shareid', $shareId);
		$query->setParameter('uid_initiator', $newUidInitiator);

		return $query->execute();
	}

	protected function adjustShareOwner($shareId, $newUidOwner) {
		$query = $this->connection->getQueryBuilder();

		$query->update('share')
			->set('uid_owner', $query->createParameter('uid_owner'))
			->where($query->expr()->eq('id', $query->createParameter('shareid')))
			->andWhere($query->expr()->orX(
				$query->expr()->eq('item_type', $query->createNamedParameter('file')),
				$query->expr()->eq('item_type', $query->createNamedParameter('folder'))
			));

		$query->setParameter('shareid', $shareId);
		$query->setParameter('uid_owner', $newUidOwner);

		return $query->execute();
	}

	protected function deleteCorruptedShare($shareId, $shareType) {
		$shareProvider = $this->shareProviderFactory->getProviderForType($shareType);
		$share = $shareProvider->getShareById($shareId);
		$shareProvider->delete($share);
	}

	protected function getUserFolder($uid) {
		return \OC::$server->getUserFolder($uid);
	}

	protected function tearDownFS() {
		\OC_Util::tearDownFS();
	}

	protected function setupFS($user) {
		\OC_Util::setupFS($user);
	}
}
