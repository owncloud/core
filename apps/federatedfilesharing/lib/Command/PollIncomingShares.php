<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\FederatedFileSharing\Command;

use OC\ServerNotAvailableException;
use OC\User\NoUserException;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\Files_Sharing\External\Manager;
use OCA\Files_Sharing\External\MountProvider;
use OCP\Files\Mount\IMountManager;
use OCP\Files\Storage\IStorage;
use OCP\Files\Storage\IStorageFactory;
use OCP\Files\StorageInvalidException;
use OCP\Files\StorageNotAvailableException;
use OCP\Files\NotFoundException;
use OCP\IDBConnection;
use OCP\IUserManager;
use OCP\Lock\LockedException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PollIncomingShares extends Command {
	/** @var IDBConnection */
	private $dbConnection;

	/** @var IUserManager */
	private $userManager;

	/** @var IStorageFactory */
	private $loader;

	/** @var Manager */
	private $externalManager;

	/** @var MountProvider | null */

	private $externalMountProvider;

	/**
	 * PollIncomingShares constructor.
	 *
	 * @param IDBConnection $dbConnection
	 * @param IUserManager $userManager
	 * @param MountProvider $externalMountProvider
	 * @param IStorageFactory $loader
	 */
	public function __construct(IDBConnection $dbConnection, IUserManager $userManager, IStorageFactory $loader, Manager $externalManager = null, MountProvider $externalMountProvider = null) {
		parent::__construct();
		$this->dbConnection = $dbConnection;
		$this->userManager = $userManager;
		$this->loader = $loader;
		$this->externalManager = $externalManager;
		$this->externalMountProvider = $externalMountProvider;
	}

	protected function configure() {
		$this->setName('incoming-shares:poll')
			->setDescription('Poll incoming federated shares manually to detect updates')
			->addOption(
				'force',
				'f',
				InputOption::VALUE_NONE,
				'Force.'
			);
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 *
	 * @return int|null|void
	 */
	public function execute(InputInterface $input, OutputInterface $output) {
		if ($this->externalMountProvider === null) {
			$output->writeln("Polling is not possible when files_sharing app is disabled. Please enable it with 'occ app:enable files_sharing'");
			return 1;
		}
		$force = $input->getOption('force') ? true : false;

		$cursor = $this->getCursor();
		while ($data = $cursor->fetch()) {
			$user = $this->userManager->get($data['user']);
			if ($user === null) {
				$output->writeln(
					"Skipping user \"{$data['user']}\". Reason: user manager was unable to resolve the uid into the user object"
				);
				continue;
			}

			$userMounts = $this->externalMountProvider->getMountsForUser($user, $this->loader);
			/** @var \OCA\Files_Sharing\External\Mount $mount */
			foreach ($userMounts as $mount) {
				try {
					$shareData = $this->getExternalShareData($data['user'], $mount->getMountPoint());
					if ($output->getVerbosity() >= OutputInterface::VERBOSITY_VERY_VERBOSE) {
						$encodedData = \json_encode($shareData);
						$output->writeln(
							"User: \"{$data['user']}\", Share data: $encodedData"
						);
					}

					/** @var IStorage $storage */
					$storage = $mount->getStorage();
					$invalidated = $this->invalidateStorageRoot($storage, $force);

					if ($output->getVerbosity() >= OutputInterface::VERBOSITY_VERY_VERBOSE) {
						$entryId = $shareData['id'];
						$invalidated = $invalidated ? 'true' : 'false';
						$output->writeln(
							"External share with id \"$entryId\" scanned, invalidated: $invalidated"
						);
					}
				} catch (NoUserException $e) {
					$entryId = $shareData['id'];
					$remote = $shareData['remote'];
					// uid was null so we need to set it
					$this->externalManager->setUid($data['user']);
					$this->externalManager->removeShare($mount->getMountPoint());
					// and now we need to reset uid back to null
					$this->externalManager->setUid(null);
					$output->writeln(
						"Remote \"$remote\" reports that external share with id \"$entryId\" no longer exists. Removing it.."
					);
				} catch (\Exception $e) {
					$entryId = $shareData['id'];
					$remote = $shareData['remote'];
					$reason = $e->getMessage();
					$output->writeln(
						"Skipping external share with id \"$entryId\" from remote \"$remote\". Reason: \"$reason\""
					);
				}
			}
		}
		$cursor->closeCursor();
	}

	/**
	 * If federated share storage of the external instance has updated
	 * (there were changes in the federated share), invalidate this storage
	 * filecache tree. This will force clients to repopulate the filecache of
	 * this storage for outdated entries, and allow to discover nested changes.
	 *
	 * @param IStorage $storage
	 * @param boolean $force whether it should force the invalidation
	 *
	 * @return boolean true if storage root has been invalidated
	 *
	 * @throws StorageNotAvailableException
	 * @throws NotFoundException
	 */
	protected function invalidateStorageRoot(IStorage $storage, $force) {
		$cache = $storage->getCache();
		$file = $cache->get('');
		if (!$file) {
			throw new NotFoundException('Cannot find cache entry');
		}

		if (!$force) {
			// Invalidate storage root etag when storage updates (e.g. by changed etag).
			// However, do not invalidate etag when share mtime did not change
			// as we would not be able to sync that change anyways (this could
			// be storage_mtime, not file mtime update that changed the etag)
			if (!$storage->hasUpdated('', $file->getStorageMTime())) {
				return false;
			}
			$stat = $storage->stat('');
			if ($stat['mtime'] === $file->getStorageMTime()) {
				return false;
			}
		}

		// invalidate this storage root by generating new root etag.
		$invalidationEtag = \uniqid();
		$cache->update($file->getId(), ['etag' => $invalidationEtag]);

		return true;
	}

	/**
	 * @return \Doctrine\DBAL\Driver\Statement
	 */
	protected function getCursor() {
		$qb = $this->dbConnection->getQueryBuilder();
		$qb->selectDistinct('user')
			->from('share_external')
			->where($qb->expr()->eq('accepted', $qb->expr()->literal('1')));

		return $qb->execute();
	}

	protected function getExternalShareData(string $userId, string $mountPoint) {
		$relativeMountPoint =\rtrim(
			\substr($mountPoint, \strlen("/$userId/files")),
			'/'
		);
		$qb = $this->dbConnection->getQueryBuilder();
		$qb->select('*')
			->from('share_external')
			->where(
				$qb->expr()->eq('user',
					$qb->expr()->literal($userId)
				))
		->andWhere(
			$qb->expr()->eq('mountpoint',
				$qb->expr()->literal($relativeMountPoint)
			));
		$result = $qb->execute();
		$externalShare = $result->fetch();
		return $externalShare;
	}
}
