<?php
 /**
 * ownCloud
 *
 * @author Thomas Müller
 * @copyright 2014 Thomas Müller deepdiver@owncloud.com
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


namespace OC\Files;

/**
 * Class Lock
 * As soon as the scope is left an acquired lock is released.
 * @package OC\Files
 */
class Lock {

	private $handle;

	/**
	 * Locks the given handle for reading. False is returned if the operation would block because
	 * there is already another lock in place.
	 *
	 * @param $handle
	 * @return bool|Lock
	 */
	public static function read ( $handle ) {
		$lock = new Lock();
		$lock->handle = $handle;
		$wouldBlock = false;
		$lockReturn = flock($handle, LOCK_SH | LOCK_NB, $wouldBlock);
		if ($wouldBlock === true && $lockReturn === false) {
			return false;
		}
		return $lock;
	}

	/**
	 * Locks the given handle for writing. False is returned if the operation would block because
	 * there is already another lock in place.
	 *
	 * @param $handle
	 * @return bool|Lock
	 */
	public static function write ( $handle ) {
		$lock = new static();
		$lock->handle = $handle;
		$lockReturn = flock($handle, LOCK_EX | LOCK_NB, $wouldBlock);
		if ($wouldBlock === true && $lockReturn === false) {
			return false;
		}
		return $lock;
	}

	public function __destruct ( ) {
		flock($this->handle,LOCK_UN);
	}

}
