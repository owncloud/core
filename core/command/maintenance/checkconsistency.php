<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
 * You should have received a copy of the GNU Affero General Public License,
 * version 3, along with this program. If not, see <http://www.gnu.org/licenses/>
 */

namespace OC\Core\Command\Maintenance;

use Doctrine\DBAL\Query\QueryBuilder;
use OCP\IDBConnection;
use OCP\IUserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckConsistency extends Command {

	/** @var String */
	protected $dataDir;
	/** @var IDBConnection */
	protected $db;
	/** @var IUserManager */
	protected $userManager;

	/**
	 * @var array user is the key and the value is an array with following
	 *                structure
	 *
	 * [
	 *   'abcdef-abc-abc-abcdef' => [
	 *              'home' => 'home::abcdef-abc-abc-abcdef',
	 *              'local' => 'local::MD5SUM',
	 *              'userExists' => true,
	 *              'homeCount' => [
	 *                  'files' => 15,
	 *                  'filesMtime' => 12345679, # as UNIX timestamp
	 *                  'shares' => 3,
	 *                  'sharesStime' => 12345679, # as UNIX timestamp
	 *              ],
	 *              'localCount' => [
	 *                  'files' => 17,
	 *                  'filesMtime' => 12345679, # as UNIX timestamp
	 *                  'shares' => 5,
	 *                  'sharesStime' => 12345679, # as UNIX timestamp
	 *              ],
	 *            ]
	 * ]
	 */
	private $userToStorageMapping = array();
	/**
	 * @var array with storage IDs as keys that can't be mapped to a user
	 * (mostly MD5 sums of the storage IDs)
	 *
	 * [
	 *   'e1930b4927e6b6d92d120c7c1bba3421' => true,
	 *   'f0bccd5decdfe159a0f1a5cdd99a9355' => true,
	 * ]
	 */
	private $unresolvedStorages = array();

	public function __construct($dataDir, IDBConnection $databaseConnection,
								IUserManager $userManager) {
		$this->dataDir = $dataDir;
		$this->db = $databaseConnection;
		$this->userManager = $userManager;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('maintenance:check-consistency')
			->setDescription('check for database consistency');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		/** @var QueryBuilder $qb */
		$qb = $this->db->createQueryBuilder();

		/**
		 * Check for storages with wrong data dir - it compares also against
		 * data dir without the additional slash
		 */
		$stmt = $qb->select('`id`')
			->from('`*PREFIX*storages`')
			->where($qb->expr()
				->notLike('`id`', '`local::' . $this->dataDir . '/%`'))
			->andWhere($qb->expr()
				->like('`id`', '`local::%`'))
			->andWhere($qb->expr()
				->neq('`id`', '`local::' . $this->dataDir . '`'))
			->execute();

		$oldDataDirs = $stmt->fetchAll(\PDO::FETCH_COLUMN);
		$stmt->closeCursor();
		if (count($oldDataDirs) > 0) {
			$output->writeln('There are ' . count($oldDataDirs) .
				' storages in place with an old data dir:');

			foreach ($oldDataDirs as $dir) {
				$output->writeln($dir);
			}
		}

		/**
		 * Fetch all ownCloud users from all possible backends
		 */
		foreach ($this->userManager->getBackends() as $backend) {
			$offset = 0;
			while (true) {
				$users = $backend->getUsers('', 500, $offset);
				$usersCount = count($users);
				$offset += $usersCount;

				foreach ($users as $user) {
					$this->userToStorageMapping[$user] = array(
						'userExists' => true
					);
				}

				if ($usersCount === 0) {
					break;
				}
			}
		}

		if ($input->getOption('verbose')) {
			$output->writeln('Fetched ' . count($this->userToStorageMapping) .
				' users.');
		}

		/** @var QueryBuilder $qb */
		$qb = $this->db->createQueryBuilder();

		/**
		 * Fetch all storages and try to map them
		 */
		$stmt = $qb->select('`id`')
			->from('`*PREFIX*storages`')
			->execute();

		$storages = $stmt->fetchAll(\PDO::FETCH_COLUMN);
		$stmt->closeCursor();

		/* just append the / because this is also done in the core this way */
		$localPart = 'local::' . $this->dataDir . '/';
		$localPartLength = strlen($localPart);

		/* temporary variable to hold the md5 hash of storages to look them up
		   later */
		$unresolvedStorages = array();

		/* this will be set to true if the "home::" storage is found (empty
		   username) */
		$brokenEmptyHomeStorage = false;

		/**
		 * iterate over all storages to match a corresponding user
		 */
		foreach ($storages as $storage) {
			/* check if this is the data dir entry  - skip it */
			if ($storage === 'local::' . $this->dataDir
				|| $storage === $localPart
			) {
				continue;
			}

			/* ignore storages that are detected as old storage */
			if (in_array($storage, $oldDataDirs)) {
				continue;
			}

			/* check if the storage is a local:: storage with readable username */
			if (substr($storage, 0, $localPartLength) === $localPart) {
				$user = rtrim(substr($storage, $localPartLength), '/');

				/* check for the user and add local storage if username is found */
				if (isset($this->userToStorageMapping[$user])) {
					$this->userToStorageMapping[$user]['local'] = $storage;
					continue;
				}

				$this->userToStorageMapping[$user] = array(
					'userExists' => false,
					'local' => $storage,
				);

				/**
				 * check if the storage is a home:: storage with readable
				 * username
				 */
			} elseif (substr($storage, 0, 6) === 'home::') {
				$user = substr($storage, 6);

				/* check if this is a valid username */
				if ($user === '') {
					$brokenEmptyHomeStorage = true;
				}

				/* check for the user and add home storage if username is found */
				if (isset($this->userToStorageMapping[$user])) {
					$this->userToStorageMapping[$user]['home'] = $storage;
					continue;
				}

				$this->userToStorageMapping[$user] = array(
					'userExists' => false,
					'home' => $storage,
				);

				/**
				 * it seems to be a MD5 hash of the storage ID which needs to be
				 * looked up later
				 */
			} else {
				$unresolvedStorages[$storage] = true;
			}
		}

		/**
		 * iterate over users to resolve the hashed storage IDs to users
		 */
		foreach ($this->userToStorageMapping as $user => $info) {

			$homeStorage = 'home::' . $user;
			/* if string is longer than 64 the MD5 will be used */
			if (isset($homeStorage[64])) {
				$homeStorage = md5($homeStorage);

				/**
				 * check for the home storage only here because otherwise the
				 * username would be readable and this is covered by above code
				 */
				if (isset($unresolvedStorages[$homeStorage])) {
					/* add home storage to user */
					$this->userToStorageMapping[$user]['home'] = $homeStorage;

					/* remove storage from list of remaining unresolved storages */
					unset($unresolvedStorages[$homeStorage]);
				}
			}

			$localStorage = $localPart . $user . '/';
			/* if string is longer than 64 the MD5 will be used */
			if (isset($localStorage[64])) {
				$localStorage = md5($localStorage);

				/**
				 * check for the local storage only here because otherwise the
				 * username would be readable and this is covered by above code
				 */
				if (isset($unresolvedStorages[$localStorage])) {
					/* add local storage to user */
					$this->userToStorageMapping[$user]['local'] = $localStorage;

					/* remove storage from list of remaining unresolved storages */
					unset($unresolvedStorages[$localStorage]);
				}
			}
		}

		$this->unresolvedStorages = $unresolvedStorages;

		if ($brokenEmptyHomeStorage) {
			$output->writeln('The storage "home::" is a broken storage');
		}

		if ($input->getOption('verbose')) {
			$output->writeln('Fetched ' . count($storages) .
				' storages (unresolved storages: ' . count($unresolvedStorages)
				. ').');
		}

	}
}
