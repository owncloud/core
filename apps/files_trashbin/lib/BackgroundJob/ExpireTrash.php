<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 * @author Piotr Mrowczynski piotr@owncloud.com
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

namespace OCA\Files_Trashbin\BackgroundJob;

use OC\BackgroundJob\TimedJob;
use OCA\Files_Trashbin\Expiration;
use OCA\Files_Trashbin\Quota;
use OCA\Files_Trashbin\TrashExpiryManager;
use OCP\IConfig;
use OCP\IUser;
use OCP\IUserManager;

class ExpireTrash extends TimedJob {

	/**
	 * @var IConfig
	 */
	private $config;

	/**
	 * @var TrashExpiryManager
	 */
	private $trashExpiryManager;
	
	/**
	 * @var IUserManager
	 */
	private $userManager;

	const USERS_PER_SESSION = 500;

	/**
	 * @param IConfig|null $config
	 * @param IUserManager|null $userManager
	 * @param TrashExpiryManager|null $trashExpiryManager
	 */
	public function __construct(IConfig $config = null,
								IUserManager $userManager = null,
								TrashExpiryManager $trashExpiryManager = null) {
		// Run once per 10 minutes
		$this->setInterval(60 * 10);

		if ($trashExpiryManager === null || $userManager === null) {
			$this->fixDIForJobs();
		} else {
			$this->userManager = $userManager;
			$this->trashExpiryManager = $trashExpiryManager;
			$this->config = $config;
		}
	}

	protected function fixDIForJobs() {
		$this->userManager = \OC::$server->getUserManager();
		$expiration = new Expiration(
			\OC::$server->getConfig(),
			\OC::$server->getTimeFactory()
		);
		$quota = new Quota(
			$this->userManager,
			\OC::$server->getConfig()
		);
		$this->trashExpiryManager = new TrashExpiryManager(
			$expiration,
			$quota,
			\OC::$server->getLogger()
		);
	}

	/**
	 * @param $argument
	 * @throws \Exception
	 */
	protected function run($argument) {
		$retentionEnabled = $this->trashExpiryManager->retentionEnabled();
		if (!$retentionEnabled) {
			return;
		}

		$offset = $this->config->getAppValue('files_trashbin', 'cronjob_trash_expiry_offset', 0);

		$usersScanned = 0;
		$this->userManager->callForUsers(function (IUser $user) use (&$usersScanned, &$offset) {
			// expire trash by retention for the user
			$usersScanned++;
			$uid = $user->getUID();
			if (!$this->setupFS($uid)) {
				return;
			}
			$this->trashExpiryManager->expireTrashByRetention($uid);

			// increase the offset to know where to start next
			// e.g. in case of crash of this job due to memory
			$this->config->setAppValue('files_trashbin', 'cronjob_trash_expiry_offset', $offset + $usersScanned);
		}, '', true, self::USERS_PER_SESSION, $offset);

		if ($usersScanned < self::USERS_PER_SESSION) {
			// next run wont have any users to scan,
			// as we returned less than the limit
			$this->config->setAppValue('files_trashbin', 'cronjob_trash_expiry_offset', 0);
		}

		$this->tearDownFS();
	}

	/**
	 * Tear down owner fs
	 */
	protected function tearDownFS() {
		\OC_Util::tearDownFS();
	}

	/**
	 * Act on behalf on trash item owner
	 * @param string $user
	 * @return boolean
	 */
	protected function setupFS($user) {
		\OC_Util::tearDownFS();
		\OC_Util::setupFS($user);

		// Check if this user has a trashbin directory
		$view = new \OC\Files\View('/' . $user);
		if (!$view->is_dir('/files_trashbin/files')) {
			return false;
		}

		return true;
	}
}
