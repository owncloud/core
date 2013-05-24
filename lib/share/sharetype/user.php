<?php
/**
* ownCloud
*
* @author Michael Gapczynski
* @copyright 2013 Michael Gapczynski mtgap@owncloud.com
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

namespace OC\Share\Type;

class User extends Common {

	public function getId() {
		return 'user';
	}

	public function isValidShare(Share $share) {
		$shareOwner = $share->getShareOwner();
		$shareWith = $share->getShareWith();
		if ($shareOwner === $shareWith) {
			$message = 'the user '.$this->shareWith.' is the item owner';
			throw new \InvalidShareException($message);
		}
		if (!\OC_User::userExists($shareWith)) {
			$message = 'the user '.$shareWith.' does not exist';
			throw new \Exception($message);
		}
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		if ($sharingPolicy === 'groups_only') {
			$inGroup = array_intersect(\OC_Group::getUserGroups($shareOwner), \OC_Group::getUserGroups($shareWith));
			if (empty($inGroup)) {
				$message = 'the user '.$shareWith.' is not a member of any groups that '.$shareOwner.' is a member of';
				throw new \Exception($message);
			}
		}
		return true;
	}

	public function searchForShareWiths($pattern) {
		return OC_User::getUsers();
	}

	// Hook Listener
	public static function post_deleteUser($params) {

	}

}