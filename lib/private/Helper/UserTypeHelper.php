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

namespace OC\Helper;

use OCP\App\IAppManager;
use OCP\IConfig;
use OCP\User;

class UserTypeHelper {
	/** @var IAppManager */
	private $appManager;

	/** @var IConfig */
	private $config;

	public function __construct(IAppManager $appManager = null, IConfig $config = null) {
		$this->appManager = $appManager;
		if ($appManager === null) {
			$this->appManager = \OC::$server->getAppManager();
		}
		$this->config = $config;
		if ($config === null) {
			$this->config = \OC::$server->getConfig();
		}
	}

	/**
	 * Checks whether given uid belongs to the user created by the guests app
	 *
	 * @param string $uid
	 * @return bool
	 */
	public function isGuestUser($uid) {
		$guestsAppEnabled = $this->appManager->isEnabledForUser('guests');
		if ($guestsAppEnabled) {
			return (bool) $this->config->getUserValue(
				$uid, 'owncloud', 'isGuest', false
			);
		}
		return false;
	}

	public function getUserType($uid) {
		if ($this->isGuestUser($uid)) {
			return User::USER_TYPE_GUEST;
		}

		return User::USER_TYPE_USER;
	}
}
