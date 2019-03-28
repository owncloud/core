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
use OCA\Files_Sharing\AppInfo\Application;
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

	/**
	 * @var MountProvider
	 */
	private $externalMountProvider;

	/**
	 * @var IStorageFactory
	 */
	private $loader;

	/**
	 * PollIncomingShares constructor.
	 *
	 * @param IDBConnection $dbConnection
	 * @param IUserManager $userManager
	 * @param MountProvider $externalMountProvider
	 * @param IStorageFactory $loader
	 */
	public function __construct(IDBConnection $dbConnection, IUserManager $userManager, MountProvider $externalMountProvider, IStorageFactory $loader) {
		parent::__construct();
		$this->dbConnection = $dbConnection;
		$this->userManager = $userManager;
		$this->externalMountProvider = $externalMountProvider;
		$this->loader = $loader;
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
					$output->writeln($e->getMessage());
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
}
