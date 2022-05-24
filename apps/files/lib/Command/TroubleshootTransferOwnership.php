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
use OC\Share20\Exception\ProviderException;
use OC\Share20\ProviderFactory;
use OCP\IDBConnection;
use OCP\Share\Exceptions\ShareNotFound;
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
				"<error>type is not recognised, allowed: {$this->allowedOps}</error>",
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
	private function findInvalidShareOwner(InputInterface $input, OutputInterface $output, $fix, $scopeUid) {
		$output->writeln([
			"<info>==========================</info>",
			"<info>Searching for shares that have invalid uid_owner, meaning share uid_owner that does not match associated file storage id.</info>",
			"<info>==========================</info>",
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

		$output->writeln("<info>Found $invalidSharesCount invalid share owners</info>");

		if ($fix && \count($sharesToFix) > 0) {
			$output->writeln("<info>Proceeding with repair..</info>");
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
					try {
						// delete corrupted share
						// cast share_type to int just to be sure as we extracted it directly with PDO
						$this->deleteCorruptedShare($shareToFix['share_id'], (int) $shareToFix["share_type"]);
						$output->writeln("<info>Deleted corrupted share with id={$shareToFix['share_id']}</info>");
					} catch (ProviderException|ShareNotFound $e) {
						$output->writeln("<error>Skipping share with id={$shareToFix['share_id']}. Internal error while attempting to delete share: {$e->getMessage()}</error>");
					}
				} else {
					// cast share type to int just to be sure, as we extracted it directly with PDO
					$this->adjustShareOwner($shareToFix['share_id'], (int) $shareToFix["share_type"], $userIdFromStorage);
					$output->writeln("<info>Adjusted share with id={$shareToFix['share_id']} and its children from uid_owner={$shareToFix['uid_owner']} to uid_owner={$userIdFromStorage}</info>");
				}
			}
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
	 * @param string|null $scopeUid if uid provided, it will check only that user
	 */
	private function findInvalidReshareInitiator(InputInterface $input, OutputInterface $output, $fix, $scopeUid) {
		$output->writeln([
			"<info>==========================</info>",
			"<info>Searching for reshares that have invalid uid_initiator(resharer), meaning resharer which does not have the received share mounted anymore (that he reshared with other user).</info>",
			"<info>==========================</info>",
			"",
		]);

		$runExceptions = 0;
		$invalidReshareInitiatorCount = 0;

		if ($scopeUid === null) {
			$resharers = $this->getAllResharers();
		} else {
			$resharers = [$scopeUid];
		}

		$resharesToFix = [];
		foreach ($resharers as $resharerUid) {
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
			} catch (\Exception $e) {
				$runExceptions = $runExceptions + 1;
				$table->setRows($tableRows);
				$table->render();
				$output->writeln("<info>Encountered error for user {$resharerUid}: </info>");
				$output->writeln("<error>{$e->getMessage()}: </error>");
				$output->writeln("<error>{$e->getTraceAsString()}: </error>");
			} finally {
				$this->tearDownFS();
			}
		}

		$output->writeln("<info>Found $invalidReshareInitiatorCount invalid initiator reshares</info>");

		if ($fix && \count($resharesToFix) > 0) {
			$output->writeln("<info>Proceeding with repair..</info>");
			foreach ($resharesToFix as $reshareToFix) {
				// as we do not know what uid_initiator might be, we need to use uid_owner (original share initiator)
				$this->adjustShareInitiator($reshareToFix['id'], $reshareToFix['uid_owner']);
				$output->writeln("<info>Adjusted share with id={$reshareToFix['id']} from uid_initiator={$reshareToFix['uid_initiator']} to uid_initiator={$reshareToFix['uid_owner']}</info>");
			}
		}

		$output->writeln("");
		if ($runExceptions > 0) {
			$output->writeln("<info>Encountered $runExceptions exceptions while running command, command might need to be retried</info>");
		}
	}

	/**
	 * Note: protected is used to allow testing without using dedicated class
	 *
	 * @return string[]
	 */
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

		$entities = \array_map(function ($row) {
			return $row['uid_initiator'];
		}, $resharers);

		return $entities;
	}

	/**
	 * Note: protected is used to allow testing without using dedicated class
	 *
	 * @param $userId
	 * @return mixed[]
	 */
	protected function getResharesForUser($userId) {
		$query = $this->connection->getQueryBuilder();

		$query->select('*')
			->from('share')
			->andWhere($query->expr()->orX(
				$query->expr()->eq('item_type', $query->createNamedParameter('file')),
				$query->expr()->eq('item_type', $query->createNamedParameter('folder'))
			));

		$query->andWhere($query->expr()->orX(
			$query->expr()->eq('share_type', $query->createNamedParameter(\OCP\Share::SHARE_TYPE_USER)),
			$query->expr()->eq('share_type', $query->createNamedParameter(\OCP\Share::SHARE_TYPE_GROUP)),
			$query->expr()->eq('share_type', $query->createNamedParameter(\OCP\Share::SHARE_TYPE_LINK)),
			$query->expr()->eq('share_type', $query->createNamedParameter(\OCP\Share::SHARE_TYPE_REMOTE))
		));

		$query->andWhere($query->expr()->neq('uid_initiator', 'uid_owner'));
		$query->andWhere($query->expr()->eq('uid_initiator', $query->createNamedParameter($userId)));

		$cursor = $query->execute();
		$reshares = $cursor->fetchAll();
		$cursor->closeCursor();

		return $reshares;
	}

	/**
	 * Note: protected is used to allow testing without using dedicated class
	 *
	 * @param $storageType
	 * @param $scopeUid
	 * @return mixed[]
	 */
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
				$query->expr()->eq('s.share_type', $query->createNamedParameter(\OCP\Share::SHARE_TYPE_USER)),
				$query->expr()->eq('s.share_type', $query->createNamedParameter(\OCP\Share::SHARE_TYPE_GROUP)),
				$query->expr()->eq('s.share_type', $query->createNamedParameter(\OCP\Share::SHARE_TYPE_LINK)),
				$query->expr()->eq('s.share_type', $query->createNamedParameter(\OCP\Share::SHARE_TYPE_REMOTE))
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

	/**
	 * Note: protected is used to allow testing without using dedicated class
	 *
	 * @param $shareId
	 * @param $newUidInitiator
	 * @return int
	 */
	protected function adjustShareInitiator($shareId, $newUidInitiator) {
		$query = $this->connection->getQueryBuilder();

		// update this share initiator for this particular share
		$query->update('share')
			->set('uid_initiator', $query->createParameter('uid_initiator'))
			->where(
				$query->expr()->andX(
					$query->expr()->eq('id', $query->createParameter('shareid')),
					$query->expr()->orX(
						$query->expr()->eq('item_type', $query->createNamedParameter('file')),
						$query->expr()->eq('item_type', $query->createNamedParameter('folder'))
					)
				)
			);

		$query->setParameter('shareid', $shareId);
		$query->setParameter('uid_initiator', $newUidInitiator);

		return $query->execute();
	}

	/**
	 * Note: protected is used to allow testing without using dedicated class
	 *
	 * @param $shareId
	 * @param $shareType
	 * @param $newUidOwner
	 * @return int
	 */
	protected function adjustShareOwner($shareId, $shareType, $newUidOwner) {
		$query = $this->connection->getQueryBuilder();

		$query->update('share')
			->set('uid_owner', $query->createParameter('uid_owner'))
			->where(
				$query->expr()->andX(
					$query->expr()->eq('id', $query->createParameter('shareid')),
					$query->expr()->orX(
						$query->expr()->eq('item_type', $query->createNamedParameter('file')),
						$query->expr()->eq('item_type', $query->createNamedParameter('folder'))
					)
				)
			);

		if ($shareType === \OCP\Share::SHARE_TYPE_GROUP) {
			// if this is group share, make sure all child entries also have correct owner
			// (children shares should have the same owner as parent entry,
			// it is also ok if share-with=share-owner for these shares as
			// these would be equal to group share then)
			$query->orWhere(
				$query->expr()->andX(
					$query->expr()->eq('parent', $query->createParameter('shareid')),
					$query->expr()->orX(
						$query->expr()->eq('item_type', $query->createNamedParameter('file')),
						$query->expr()->eq('item_type', $query->createNamedParameter('folder'))
					)
				)
			);
		}

		$query->setParameter('shareid', $shareId);
		$query->setParameter('uid_owner', $newUidOwner);

		return $query->execute();
	}

	/**
	 * Note: protected is used to allow testing without using dedicated class
	 *
	 * @param $shareId
	 * @param $shareType
	 * @throws ProviderException
	 * @throws ShareNotFound
	 */
	protected function deleteCorruptedShare($shareId, $shareType) {
		$shareProvider = $this->shareProviderFactory->getProviderForType($shareType);
		$share = $shareProvider->getShareById($shareId);
		$shareProvider->delete($share);
	}

	/**
	 * Note: wrapped with protected to allow testing of the static helper methods
	 *
	 * @param $uid
	 * @return \OCP\Files\Folder|null
	 */
	protected function getUserFolder($uid) {
		return \OC::$server->getUserFolder($uid);
	}

	/**
	 * Note: wrapped with protected to allow testing of the static helper methods
	 */
	protected function tearDownFS() {
		\OC_Util::tearDownFS();
	}

	/**
	 * Note: wrapped with protected to allow testing of the static helper methods
	 *
	 * @param $user
	 */
	protected function setupFS($user) {
		\OC_Util::setupFS($user);
	}
}
