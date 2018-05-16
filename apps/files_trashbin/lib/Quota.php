<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OCA\Files_Trashbin;

use OC\Files\Filesystem;
use OCP\Files\FileInfo;
use OCP\IConfig;
use OCP\IUserManager;
use OCP\IUser;

class Quota {

	// percent of free disk space/quota that triggers trashbin cleanup by default
	const DEFAULTMAXSIZE = 50;

	/** @var IUserManager */
	protected $userManager;

	/** @var IConfig */
	protected $config;

	public function __construct(IUserManager $userManager, IConfig $config) {
		$this->userManager = $userManager;
		$this->config = $config;
	}

	/**
	 * Calculate remaining free space for trash bin
	 *
	 * @param integer $trashbinSize current size of the trash bin
	 * @param string $user
	 * @return int available free space for trash bin
	 */
	public function calculateFreeSpace($trashbinSize, $user) {
		$userObject = $this->userManager->get($user);
		if ($userObject === null) {
			return 0;
		}
		$quota = $this->getUserQuota($userObject);

		$userFolder = \OC::$server->getUserFolder($user);
		if ($userFolder === null) {
			return 0;
		}

		$free = $quota - $userFolder->getSize(); // remaining free space for user
		if ($free > 0) {
			// does trashbin size hit purge limit with the current free space
			$availableSpace = ($free * $this->getPurgeLimit() / 100) - $trashbinSize;
		} else {
			$availableSpace = $free - $trashbinSize;
		}

		return $availableSpace;
	}

	/**
	 * Get a percentage of free space that should trigger
	 * cleanup for outdated files in trashbin
	 *
	 * @return int
	 */
	public function getPurgeLimit() {
		return $this->config->getSystemValue('trashbin_purge_limit', self::DEFAULTMAXSIZE);
	}

	/**
	 * Get user quota or free space when there is no quota set
	 *
	 * @param IUser $user
	 * @return int|mixed
	 */
	protected function getUserQuota(IUser $user) {
		$quota = \OC_Util::getUserQuota($user);
		if ($quota === FileInfo::SPACE_UNLIMITED) {
			$quota = Filesystem::free_space('/');
			// inf or unknown free space
			if ($quota < 0) {
				$quota = PHP_INT_MAX;
			}
		}

		return $quota;
	}
}
