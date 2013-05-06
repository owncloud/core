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

public class PermissionChecker {

	protected $mapper;

	public function __construct(ShareMapper $mapper) {
		$this->mapper = $mapper;
	}

	public function isValidPermission() {
		if (!is_int($permissions) || $permisisons < 0 || $permissions > OCP\PERMISSION_All) {
			throw new \Exception();
		}
		$parentId = $share->getParentId();
		if (isset($parentId)) {
			if (!$this->isResharingAllowed()) {
				throw new \Exception();
			}
			// Check if permissions exceed the parent share permissions
			$parent = $this->mapper->getShare($parentId);
			if ($permissions & ~$parent->getPermissions()) {
				throw new \Exception($message);
			}
			// Check if share permission is granted
			if (~$parentPermissions & PERMISSION_SHARE) {
				return false;
			}
		}
		// TODO Check if permission allowed for item
		return true;
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

}