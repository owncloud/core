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

class Group extends Common {

	public function getId() {
		return 'group';
	}

	public function isValidShare($share) {
		parent::isValidShare($share);
		if (!\OC_Group::groupExists($shareWith)) {
			$message = 'Sharing '.$itemSource.' failed, because the group '.$shareWith.' does not exist';
			\OC_Log::write('OCP\Share', $message, \OC_Log::ERROR);
			throw new \Exception($message);
		}
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		if ($sharingPolicy === 'groups_only' && !\OC_Group::inGroup($shareOwner, $shareWith)) {
			$message = 'Sharing '.$itemSource.' failed, because '
				.$uidOwner.' is not a member of the group '.$shareWith;
			\OC_Log::write('OCP\Share', $message, \OC_Log::ERROR);
			throw new \Exception($message);
		}
	}

	public function share($share) {
		if ($this->isValidShare($share)) {
			if ($this->itemType->isUniqueTargetRequired()) {
				$users = \OC_Group::usersInGroup($share->getShareWith());
				$tempShare = $share;
				foreach ($users as $user) {
					$tempShare->setShareType('user');
					$tempShare->setShareWith($user);
					$tempdata['item_target'] = $this->generateItemTarget($tempShare);

					if ($tempdata[''])
				}
			}
			
			$id = $this->cache->put($data;
			$share->setId($id);
			return $share;
		}
	}

	public function unshareFromSelf($share) {

	}

	public function search($pattern) {
		return OC_Group::getGroups();
	}

	// Hook Listeners
	public static function post_addToGroup($params) {

	}

	public static function post_removeFromGroup($params) {

	}

	public static function post_deleteGroup($params) {

	}

}