<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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
namespace OC\Repair;

use OCP\IDBConnection;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use OCP\IUser;
use OC\Avatar;
use OCP\IConfig;
use OCP\Files\Folder;

/**
 * Move avatars outside of their homes to the new location
 *
 * @package OC\Repair
 */
class MoveAvatarOutsideHome implements IRepairStep {
	/** @var \OCP\IConfig */
	protected $config;

	/** @var IDBConnection */
	private $connection;

	/** @var IUserManager */
	private $userManager;

	/** @var \OCP\ILogger */
	private $logger;

	/** @var \OCP\IL10N */
	private $l;

	/**
	 * @param IConfig $config config
	 * @param IDBConnection $connection database connection
	 * @param IUserManager $userManager user manager
	 */
	public function __construct(
		IConfig $config,
		IDBConnection $connection,
		IUserManager $userManager,
		IL10N $l10n,
		ILogger $logger
	) {
		$this->config = $config;
		$this->connection = $connection;
		$this->userManager = $userManager;
		$this->l = $l10n;
		$this->logger = $logger;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'Move user avatars outside the homes to the new location';
	}

	/**
	 * Move avatars outside of their homes
	 */
	private function moveAvatars(IOutput $out, IUser $user, Folder $newAvatarsFolder) {
		$userId = $user->getUID();

		\OC\Files\Filesystem::initMountPoints($userId);

		// TODO: inject
		$rootFolder = \OC::$server->getRootFolder();

		$oldAvatarUserFolder = $rootFolder->get('/' . $userId);
		$oldAvatar = new Avatar($oldAvatarUserFolder, $this->l, $user, $this->logger);
		if ($oldAvatar->exists()) {
			$newAvatarsUserFolder = $newAvatarsFolder->newFolder($userId);

			// get original file
			$oldAvatarFile = $oldAvatar->getFile(-1);
			$oldAvatarFile->move($newAvatarsUserFolder->getPath() . '/' . $oldAvatarFile->getName());
			$oldAvatar->remove();
		}

		\OC_Util::tearDownFS();
	}

	/**
	 * Count all the users
	 *
	 * @return int
	 */
	private function countUsers() {
		$allCount = $this->userManager->countUsers();

		$totalCount = 0;
		foreach ($allCount as $backend => $count) {
			$totalCount += $count;
		}

		return $totalCount;
	}

	/**
	 * @param IOutput $output
	 */
	public function run(IOutput $output) {
		$ocVersionFromBeforeUpdate = $this->config->getSystemValue('version', '0.0.0');
		if (version_compare($ocVersionFromBeforeUpdate, '9.1.1.1', '<')) {
			$rootFolder = \OC::$server->getRootFolder();
			$newAvatarsFolder = $rootFolder->newFolder('metadata-avatars');

			$function = function(IUser $user) use ($output, $newAvatarsFolder) {
				$this->moveAvatars($output, $user, $newAvatarsFolder);
				$output->advance();
			};

			$userCount = $this->countUsers();
			$output->startProgress($userCount);

			$this->userManager->callForAllUsers($function);

			$output->finishProgress();
		}
	}
}

