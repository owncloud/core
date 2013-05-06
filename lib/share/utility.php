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

}