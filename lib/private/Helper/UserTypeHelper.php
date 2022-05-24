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

use OCP\IConfig;
use OCP\User;

class UserTypeHelper {

	/** @var IConfig */
	private $config;

	public function __construct(IConfig $config = null) {
		$this->config = $config;
		if ($config === null) {
			$this->config = \OC::$server->getConfig();
		}
	}

	/**
	 * Checks whether given uid belongs to the user created for example by
	 * guests app
	 *
	 * @param string $uid
	 * @return bool
	 */
	public function isGuestUser($uid) {
		return (bool) $this->config->getUserValue($uid, 'owncloud', 'isGuest', false);
	}

	/**
	 * Returns the user type based on user id
	 *
	 * @param string $uid
	 * @return integer
	 */
	public function getUserType($uid) {
		if ($this->isGuestUser($uid)) {
			return User::USER_TYPE_GUEST;
		}

		return User::USER_TYPE_USER;
	}
}
