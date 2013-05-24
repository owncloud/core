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

public class Utility {

	/**
	 * Check if the Share API is enabled
	 * @return bool
	 *
	 * The Share API is enabled by default if not configured
	 *
	 */
	public function isEnabled() {
		$configValue = \OC_Appconfig::getValue('core', 'shareapi_enabled', 'yes');
		if ($configValue === 'yes') {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Check if the files_sharing app is enabled
	 * @return bool
	 *
	 * Item types dependent on files will only work if the files_sharing app is enabled
	 *
	 */
	public function isFileSharingEnabled() {
		return \OC_App::isEnabled('files_sharing');
	}

	/**
	 * Check if resharing is allowed
	 * @return bool
	 *
	 * Resharing is allowed by default if not configured
	 *
	 */
	public function isResharingAllowed() {
		$configValue = \OC_Appconfig::getValue('core', 'shareapi_allow_resharing', 'yes');
		if ($configValue === 'yes') {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Get the default expiration time
	 * @return int
	 *
	 * No expiration time is set by default
	 *
	 */
	public function getDefaultTime() {
		return \OC_Appconfig::getValue('core', 'shareapi_expiration_time', 0);
	}

	public static function getSupportedShareTypes($class) {
		// TODO Fetch share type objects based on marker interfaces
		$shareTypeIds = class_implements($class);
		foreach ($shareTypeIds as $shareTypeId) {
			$shareTypes[$shareTypdId] = new \$shareTypeId.'ShareType';
		}
	}

	public static function getSupportedShareType($class, $shareTypeId) {
		if (!isset(self::$shareTypes[$shareTypeId])) {

		}
		return self::$shareTypes[$shareTypeId];
	}

}