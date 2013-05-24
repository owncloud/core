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

	protected $groupTable;

	public function __construct($itemType, IShareFactory $shareFactory) {
		parent::__construct($itemType, $shareFactory);
		$this->groupTable = '*PREFIX*groupshares';
	}

	public function getId() {
		return 'group';
	}

	public function getShares($shareWith, $uidOwner, $isShareWithUser, $extraFilter) {
		if ($isShareWithUser === true) {
			list($where, $params) = $this->getDefaultFilter($shareWith, $uidOwner);
			if (isset($extraFilter)) {
				list($extraWhere, $extraParams) = $extraFilter;
				$where .= ' '.ltrim($extraWhere);
				$params += $extraParams;
			}
			// Select all columns in the share table
			$columns = '`'.$this->table.'`.*';
			// LEFT JOIN with the unique group shares table
			$joins = 'LEFT JOIN `'.$this->groupTable.'` ON `';
			$joins .= '`'.$this->table.'`.`id` = ';
			$joins .= '`'.$this->groupTable.'`.`id`';
			// Select all columns in the unique group shares table
			$columns .= ', `'.$this->groupTable.'`.*';
			list($appColumns, $appJoins) = $this->getAppJoins();
			$columns .= $appColumns;
			$joins .= ltrim($appJoins);
			$sql = 'SELECT '.$columns.' FROM `'.$this->table.'` '.$joins.' WHERE '.$where;
			$query = \OC_DB::prepare($sql);
			$result = $query->execute(array($params));
			$shares = array();
			while ($row = $result->fetchRow()) {
				$share = $this->shareFactory->mapToShare($row);
				// TODO 
				if (isset($row[$this->groupTable.'.target'])) {
					$share->setItemTarget()
				}
				$shares[] = $share;
			}
			return $shares;
		} else {
			return parent::getShares($shareWith, $uidOwner, $isShareWithUser, $extraFilter);
		}
	}

	public function isValidShare(Share $share) {
		$uidOwner = $share->getUidOwner();
		$shareWith = $share->getShareWith();
		if (!\OC_Group::groupExists($shareWith)) {
			$message = 'Sharing '.$itemSource.' failed, because the group '.$shareWith.' does not exist';
			throw new \Exception($message);
		}
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		if ($sharingPolicy === 'groups_only' && !\OC_Group::inGroup($uidOwner, $shareWith)) {
			$message = 'Sharing '.$itemSource.' failed, because '
				.$uidOwner.' is not a member of the group '.$shareWith;
			throw new \Exception($message);
		}
		return true;
	}

	public function share($share) {
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

	public function unshareFromSelf($share) {

	}

	public function searchForShareWiths($pattern) {
		return OC_Group::getGroups();
	}

	protected function getDefaultFilter($shareWith, $uidOwner, $isShareWithUser) {
		$where = '';
		$params = array($this->getId(), $this->itemType);
		if (isset($shareWith)) {
			if ($isShareWithUser === true) {
				$groups = \OC_Group::getUserGroups($shareWith);
				$placeholders = join(',', array_fill(0, count($groups), '?'));
				$where .= ' AND share_with IN ('.$placeholders.')';
				$params += $groups;
				$params[] 
			} else {
				$where .= '`share_type` = ? AND `share_with` = ?';
				$params[] = $this->getId();
				$params[] = $shareWith;
			}
		}
		if (isset($uidOwner)) {
			$where .= ' AND `uid_owner` = ?';
			$params[] = $uidOwner;
		}
		return array($where, $params);
	}

	// Hook Listeners
	public static function post_addToGroup($params) {

	}

	public static function post_removeFromGroup($params) {

	}

	public static function post_deleteGroup($params) {

	}

}