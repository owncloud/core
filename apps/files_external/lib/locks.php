<?php
/**
 * ownCloud
 *
 * @author Florin Peter
 * @copyright 2013 Florin Peter <owncloud@florin-peter.de>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Files\External;

/**
 * Class Proxy
 * @package OCA\Files\External
 */
class Locks {

	const TIME_OUT = 10;

	private static $locks;

	public static $loaded = false;
	public static $lastLock = false;

	static public function init() {
		self::$locks = array();
		self::$loaded = true;
	}

	static public function addLock($path) {
		if(!isset(self::$locks[$path])) {
			self::$locks[$path] = true;
			self::$lastLock = time();
		}
	}

	static public function removeLock($path) {
		if(isset(self::$locks[$path])) {
			unset(self::$locks[$path]);
			self::$lastLock = time();
		}
	}

	static public function isLocked($path) {
		if(isset(self::$locks[$path])) {
			return true;
		} else {
			return false;
		}
	}

	static public function isTimeOutReached() {
		if(\OCA\Files\External\Locks::$lastLock === false) {
			return true;
		}

		$lastLockSeconds = time() - \OCA\Files\External\Locks::$lastLock;
		if($lastLockSeconds <= self::TIME_OUT) {
			return false;
		} else {
			return true;
		}

	}

}