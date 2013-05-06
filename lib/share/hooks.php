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

namespace OC\Share;

class Hooks {

	public static function post_deleteUser($arguments) {
		$cache = new \OC\Share\Cache()
		// Delete any items shared with the deleted user
		$query = \OC_DB::prepare('DELETE FROM `*PREFIX*share`'
			.' WHERE `share_with` = ? AND `share_type` = ? OR `share_type` = ?');
		$result = $query->execute(array($arguments['uid'], self::SHARE_TYPE_USER, self::$shareTypeGroupUserUnique));
		// Delete any items the deleted user shared
		$query = \OC_DB::prepare('SELECT `id` FROM `*PREFIX*share` WHERE `uid_owner` = ?');
		$result = $query->execute(array($arguments['uid']));
		while ($item = $result->fetchRow()) {
			self::delete($item['id']);
		}
	}

	public static function post_addToGroup($arguments) {
		// Find the group shares and check if the user needs a unique target
		$query = \OC_DB::prepare('SELECT * FROM `*PREFIX*share` WHERE `share_type` = ? AND `share_with` = ?');
		$result = $query->execute(array(self::SHARE_TYPE_GROUP, $arguments['gid']));
		$query = \OC_DB::prepare('INSERT INTO `*PREFIX*share` (`item_type`, `item_source`,'
			.' `item_target`, `parent`, `share_type`, `share_with`, `uid_owner`, `permissions`,'
			.' `stime`, `file_source`, `file_target`) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
		while ($item = $result->fetchRow()) {
			if ($item['item_type'] == 'file' || $item['item_type'] == 'file') {
				$itemTarget = null;
			} else {
				$itemTarget = self::generateTarget($item['item_type'], $item['item_source'], self::SHARE_TYPE_USER,
					$arguments['uid'], $item['uid_owner'], $item['item_target'], $item['id']);
			}
			if (isset($item['file_source'])) {
				$fileTarget = self::generateTarget($item['item_type'], $item['item_source'], self::SHARE_TYPE_USER,
					$arguments['uid'], $item['uid_owner'], $item['file_target'], $item['id']);
			} else {
				$fileTarget = null;
			}
			// Insert an extra row for the group share if the item or file target is unique for this user
			if ($itemTarget != $item['item_target'] || $fileTarget != $item['file_target']) {
				$query->execute(array($item['item_type'], $item['item_source'], $itemTarget, $item['id'],
					self::$shareTypeGroupUserUnique, $arguments['uid'], $item['uid_owner'], $item['permissions'],
					$item['stime'], $item['file_source'], $fileTarget));
				\OC_DB::insertid('*PREFIX*share');
			}
		}
	}

	public static function post_removeFromGroup($arguments) {
		// TODO Don't call if user deleted?
		$query = \OC_DB::prepare('SELECT `id`, `share_type` FROM `*PREFIX*share`'
			.' WHERE (`share_type` = ? AND `share_with` = ?) OR (`share_type` = ? AND `share_with` = ?)');
		$result = $query->execute(array(self::SHARE_TYPE_GROUP, $arguments['gid'], self::$shareTypeGroupUserUnique,
			$arguments['uid']));
		while ($item = $result->fetchRow()) {
			if ($item['share_type'] == self::SHARE_TYPE_GROUP) {
				// Delete all reshares by this user of the group share
				self::delete($item['id'], true, $arguments['uid']);
			} else {
				self::delete($item['id']);
			}
		}
	}

	public static function post_deleteGroup($arguments) {
		$query = \OC_DB::prepare('SELECT id FROM `*PREFIX*share` WHERE `share_type` = ? AND `share_with` = ?');
		$result = $query->execute(array(self::SHARE_TYPE_GROUP, $arguments['gid']));
		while ($item = $result->fetchRow()) {
			self::delete($item['id']);
		}
	}

}