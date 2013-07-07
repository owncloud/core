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

namespace OC\Share\ShareType;

use OC\Share\Share;
use OC\Share\ShareFactory;
use OC\Share\Exception\InvalidShareException;
use OC\User\Manager as UserManager;

/**
 * Controller for shares between a user and a group
 */
class Group extends Common {

	protected $userManager;
	protected $groupTable;

	/**
	 * The constructor
	 * @param string $itemType
	 * @param ShareFactory $shareFactory
	 * @param Manager $userManager
	 */
	public function __construct($itemType, ShareFactory $shareFactory, UserManager $userManager) {
		parent::__construct($itemType, $shareFactory);
		$this->userManager = $userManager;
		$this->groupsTable = '`*PREFIX*shares_groups`';
	}

	public function getId() {
		return 'group';
	}

	public function isValidShare(Share $share) {
		$shareOwner = $share->getShareOwner();
		$shareWith = $share->getShareWith();
		if (!$this->userManager->userExists($shareOwner)) {
			throw new InvalidShareException('The share owner does not exist');
		}
		if (!\OC_Group::groupExists($shareWith)) {
			throw new InvalidShareException('The group shared with does not exist');
		}
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		if ($sharingPolicy === 'groups_only' && !\OC_Group::inGroup($shareOwner, $shareWith)) {
			throw new InvalidShareException('The share owner is not in the group shared with as'
				.' required by the groups only sharing policy set by the admin'
			);
		}
		return true;
	}

	public function share(Share $share) {
		$itemTargets = $share->getItemTarget();
		if (is_array($itemTargets)) {
			// The first element is the default group item target
			$share->setItemTarget(reset($itemTargets));
		}
		$share = parent::share($share);
		if ($share) {
			$share->setItemTarget($itemTargets);
			$this->setItemTarget($share);
			$share->resetUpdatedProperties();
		}
		return $share;
	}

	/**
	 * Update the share's item targets in the database
	 * @param Share $share
	 *
	 * Group shares can have different item targets for users in the group
	 * and are stored in a separate table
	 * 
	 */
	public function setItemTarget(Share $share) {
		$id = $share->getId();
		$itemTargets = $share->getItemTarget();
		if (is_array($itemTargets)) {
			$groupItemTarget = reset($itemTargets);
		} else {
			$groupItemTarget = $itemTargets;
		}
		if (isset($itemTargets['users'])) {
			$userItemTargets = $itemTargets['users'];
		} else {
			$userItemTargets = array();
		}
		$sql = 'UPDATE '.$this->table.' SET `item_target` = ? WHERE `id` = ?';
		\OC_DB::executeAudited($sql, array($groupItemTarget, $id));
		$cachedItemTargets = $this->getUserItemTargets($id);
		// Compare current item targets with those in the database
		// to determine which need to be added and removed
		$newItemTargets = array_diff_assoc($userItemTargets, $cachedItemTargets);
		$oldItemTargets = array_diff_assoc($cachedItemTargets, $userItemTargets);
		if (!empty($newItemTargets)) {
			$sql = 'INSERT INTO '.$this->groupsTable.' (`id`, `uid`, `item_target`)
				VALUES (?, ?, ?)';
			foreach ($newItemTargets as $uid => $itemTarget) {
				\OC_DB::executeAudited($sql, array($id, $uid, $itemTarget));
			}
		}
		if (!empty($oldItemTargets)) {
			$sql = 'DELETE FROM '.$this->groupsTable.' WHERE `id` = ? AND `uid` = ? AND '.
				'`item_target` = ?';
			foreach ($oldItemTargets as $uid => $itemTarget) {
				\OC_DB::executeAudited($sql, array($id, $uid, $itemTarget));
			}
		}
	}

	public function getShares(array $filter, $limit, $offset) {
		$shares = array();
		if (!isset($filter['shareWith'])
			|| (isset($filter['isShareWithGroup']) && $filter['isShareWithGroup'] === true)
		) {
			unset($filter['isShareWithGroup']);
			$shares = parent::getShares($filter, $limit, $offset);
		} else {
			unset($filter['isShareWithGroup']);
			$defaults = array(
				'shareTypeId' => $this->getId(),
				'itemType' => $this->itemType,
			);
			$filter = array_merge($defaults, $filter);
			$where = '';
			$params = array();
			// Build the WHERE clause
			foreach ($filter as $property => $value) {
				$column = Share::propertyToColumn($property);
				if ($property === 'shareWith')  {
					$groups = \OC_Group::getUserGroups($value);
					if (empty($groups)) {
						// The user has no groups, no group shares are possible
						return array();
					} else {
						// Find shares with the user's groups, but exclude the shares they own
						$placeholders = join(',', array_fill(0, count($groups), '?'));
						$where .= $column.' IN ('.$placeholders.') AND `share_owner` != ? AND ';
						$params = array_merge($params, $groups);
						$params[] = $value;
					}
				} else {
					if ($property === 'id') {
						$column = $this->table.'.'.$column;
					} else if ($property === 'parentId') {
						$column = $this->parentsTable.'.'.$column;
					}
					$where .= $column.' = ? AND ';
					$params[] = $value;
				}
			}
			$where = rtrim($where, ' AND ');
			$columns = $this->table.'.*';
			$joins = '';
			if (isset($filter['parentId'])) {
				// LEFT JOIN with the parents table
				$joins .= 'LEFT JOIN '.$this->parentsTable.' ON '.
					$this->table.'.`id` = '.$this->parentsTable.'.`id`';
			}
			if ($this->shareFactory instanceof AdvancedShareFactory) {
				// Add the JOINs for the app
				$joins .= $this->shareFactory->getJoins();
				$columns .= ', '.$this->shareFactory->getColumns();
			}
			$sql = 'SELECT '.$columns.' FROM '.$this->table.' '.$joins.' WHERE '.$where;
			$query = \OC_DB::prepare($sql, $limit, $offset);
			$result = \OC_DB::executeAudited($query, $params);
			while ($row = $result->fetchRow()) {
				$share = $this->shareFactory->mapToShare($row);
				$parentIds = $this->getParentIds($share->getId());
				$share->setParentIds($parentIds);
				$share->resetUpdatedProperties();
				$shares[] = $share;
			}
		}
		foreach ($shares as $share) {
			$userItemTargets = $this->getUserItemTargets($share->getId());
			if (!empty($userItemTargets)) {
				if (isset($filter['shareWith'])) {
					if (isset($userItemTargets[$filter['shareWith']])) {
						$share->setItemTarget($userItemTargets[$filter['shareWith']]);
					}
				} else {
					$itemTargets = array($share->getItemTarget());
					$itemTargets['users'] = $userItemTargets;
					$share->setItemTarget($itemTargets);
					$share->resetUpdatedProperties();
				}
			}
		}
		return $shares;
	}

	public function clear() {
		parent::clear();
		$sql = 'DELETE '.$this->groupsTable.' FROM '.$this->groupsTable.' '.
			'LEFT JOIN '.$this->table.' ON '.$this->groupsTable.'.`id` = '.$this->table.'.`id` '.
			'WHERE '.$this->table.'.`id` IS NULL';
		\OC_DB::executeAudited($sql);
	}

	public function searchForPotentialShareWiths($pattern, $limit, $offset) {
		return \OC_Group::getGroups($pattern, $limit, $offset);
	}

	protected function getUserItemTargets($id) {
		$sql = 'SELECT `uid`, `item_target` FROM '.$this->groupsTable.' WHERE `id` = ?';
		$result = \OC_DB::executeAudited($sql, array($id));
		$itemTargets = array();
		while ($row = $result->fetchRow()) {
			$itemTargets[$row['uid']] = $row['item_target'];
		}
		return $itemTargets;
	}

}