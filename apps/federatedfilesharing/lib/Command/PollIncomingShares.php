<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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
use OCA\Files_Sharing\External\MountProvider;
use OCP\Files\Storage\IStorage;
use OCP\Files\Storage\IStorageFactory;
use OCP\Files\StorageInvalidException;
use OCP\Files\StorageNotAvailableException;
use OCP\IDBConnection;
use OCP\IUserManager;
use OCP\Lock\LockedException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PollIncomingShares extends Command {
	/** @var IDBConnection */
	private $dbConnection;

	/** @var IUserManager */
	private $userManager;

	/** @var IStorageFactory */
	private $loader;

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
	public function __construct(IDBConnection $dbConnection, IUserManager $userManager, IStorageFactory $loader, MountProvider $externalMountProvider = null) {
		parent::__construct();
		$this->dbConnection = $dbConnection;
		$this->userManager = $userManager;
		$this->loader = $loader;
		$this->externalMountProvider = $externalMountProvider;
	}

	protected function configure() {
		$this->setName('incoming-shares:poll')
			->setDescription('Poll incoming federated shares manually to detect updates');
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
		$cursor = $this->getCursor();
		while ($data = $cursor->fetch()) {
			$user = $this->userManager->get($data['user']);
			$userMounts = $this->externalMountProvider->getMountsForUser($user, $this->loader);
			/** @var \OCA\Files_Sharing\External\Mount $mount */
			foreach ($userMounts as $mount) {
				try {
					/** @var Storage $storage */
					$storage = $mount->getStorage();
					$this->refreshStorageRoot($storage);
				} catch (\Exception $e) {
					$entryId = $this->getExternalShareId($data['user'], $mount->getMountPoint());
					$remote = $storage->getRemote();
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
	 * @param IStorage $storage
	 *
	 * @throws LockedException
	 * @throws ServerNotAvailableException
	 * @throws StorageInvalidException
	 * @throws StorageNotAvailableException
	 */
	protected function refreshStorageRoot(IStorage $storage) {
		$localMtime = $storage->filemtime('');
		/** @var \OCA\Files_Sharing\External\Storage $storage */
		if ($storage->hasUpdated('', $localMtime)) {
			$storage->getScanner('')->scan('', false, 0);
		}
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

	protected function getExternalShareId(string $userId, string $mountPoint) {
		$relativeMountPoint =\rtrim(
			\substr($mountPoint, \strlen("/$userId/files")),
			'/'
		);
		$qb = $this->dbConnection->getQueryBuilder();
		$qb->selectDistinct('id')
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
		return $externalShare['id'] ?? 0;
	}
}
