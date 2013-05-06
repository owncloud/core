<?php
/**
* ownCloud
*
* @author Michael Gapczynski
* @copyright 2012-2013 Michael Gapczynski mtgap@owncloud.com
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
*/

namespace OC\Share;

public class ExpirationChecker {

	protected $mapper;

	public function __construct(ShareMapper $mapper) {
		$this->mapper = $mapper;
	}

	/**
	 * Check if the expiration time is valid
	 * @param
	 * @return bool
	 *
	 * A valid time is at least 1 hour in the future
	 *
	 */
	public function isValidTime(Share $share) {
		$time = $share->getExpirationTime();
		if (isset($time) && !is_int($time)) {
			throw new \Exception($message);
		}
		if (isset($time) && $time < time() + 3600) {
			throw new \Exception($message);
		}
		$parentId = $share->getParentId();
		if (isset($parentId)) {
			// Check if time is later than the parent expiration time
			$parent = $this->mapper->getShare($parentId);
			$parentTime = $parent->getExpirationTime();
			if (isset($parentTime)) {
				if ((!isset($time) || $time > $parentTime) {
					throw new \Exception($message);
				}
			}
		}
		return true;
	}

	/**
	 * Check if Share is expired
	 * @param
	 * @return bool
	 */
	public function isExpired(Share $share) {
		$time = $share->getExpirationTime();
		if (isset($time)) {
			if ($time - time() > 0) {
				return true;
			}
		} else if (($this->getDefaultTime() + $share->getShareTime()) - time() > 0) {
			return true;
		}
		return false;
	}

	/**
	 * Get the default expiration time
	 * @return time
	 *
	 * No expiration time is set by default
	 *
	 */
	public function getDefaultTime() {
		return \OC_Appconfig::getValue('core', 'shareapi_expiration_time', null);
	}

}