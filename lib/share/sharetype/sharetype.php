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

abstract class ShareType implements IShareType {

	protected $table;
	protected $shareFactory;

	public function __construct($itemType, IShareFactory $shareFactory) {
		$this->table = '*PREFIX*share';
		$this->shareFactory = $shareFactory;
	}

	abstract public function getId();

	public function getShares($shareWith, $uidOwner, $isShareWithUser, $extraFilter) {
		list($where, $params) = $this->getDefaultFilter($shareWith, $uidOwner);
		if (isset($extraFilter)) {
			list($extraWhere, $extraParams) = $extraFilter;
			$where .= ' '.ltrim($extraWhere);
			$params += $extraParams;
		}
		// Select all columns in the share table
		$columns = '`'.$this->table.'`.*';
		list($appColumns, $appJoins) = $this->getAppJoins();
		$columns .= $appColumns;
		$sql = 'SELECT '.$columns.' FROM `'.$this->table.'` '.$appJoins.' WHERE '.$where;
		$query = \OC_DB::prepare($sql);
		$result = $query->execute(array($params));
		$shares = array();
		while ($row = $result->fetchRow()) {
			$shares[] = $this->shareFactory->mapToShare($row);
		}
		return $shares;
	}

	abstract public function isValidShare(Share $share);

	public function share(Share $share) {
		// TODO
		$query = \OC_DB::prepare('INSERT INTO `*PREFIX*share` 
				(' . implode(', ', $queryParts) . ')'
			. ' VALUES( ' . implode(', ', $valuesPlaceholder) . ')');
		$result = $query->execute($params);
		$id = (int)\OC_DB::insertid($this->table);
		$share->setId($id);
		return $share;
	}

	public function unshare(Share $share) {
		$query = \OC_DB::prepare('DELETE FROM `'.$this->table.'` WHERE `id` = ?');
		$query->execute(array($share->getId()));
	}

	public function setParentId(Share $share) {
		$parentId = $share->getParentId();
		$this->update($share->getId(), array('parent' => $parentId));
	}

	public function setPermissions(Share $share) {
		$permissions = $share->getPermissions();
		$this->update($share->getId(), array('permissions' => $permissions));
	}

	public function setExpirationTime(Share $share) {
		$time = $share->getExpirationTime();
		$this->update($share->getId(), array('expiration' => $time));
	}

	abstract public function searchForShareWiths($pattern);

	/**
	 * Get the default database filter for this share type
	 * @param string $shareWith
	 * @param string $uidOwner
	 * @param bool $isShareWithUser
	 * @return array($where, $params)
	 */
	protected function getDefaultFilter($shareWith, $uidOwner, $isShareWithUser) {
		$where = '`share_type` = ? AND `item_type` = ?';
		$params = array($this->getId(), $this->itemType);
		if (isset($shareWith)) {
			$where .= ' AND share_with = ?';
			$params[] = $shareWith;
		}
		if (isset($uidOwner)) {
			$where .= ' AND uid_owner = ?';
			$params[] = $uidOwner;
		}
		return array($where, $params);
	}

	protected function getAppJoins() {
		$columns = '';
		$joins = '';
		// Check if IAdvancedShareFactory is used and additional properties are needed
		if ($this->shareFactory instanceof IAdvancedShareFactory) {
			// Setup JOINs to fetch properties from app's tables
			$appJoins = $this->shareFactory->getJoins();
			foreach ($appJoins as $appTable => $appJoin) {
				$tables = array_keys($appJoin);
				$joinColumns = array_values($appJoin);
				if (count($tables) === 2) {
					$joins .= ' JOIN `*PREFIX*'.$appTable.'` ON `';
					$joins .= '`*PREFIX*'.$tables[0].'`.`'.$joinColumns[0].'` = ';
					$joins .= '`*PREFIX*'.$tables[1].'`.`'.$joinColumns[1].'`';
				} else {
					throw new \Exception()
				}
			}
			$joins = ltrim($joins);
			// Add app specific columns to SELECT
			$appTables = $this->shareFactory->getColumns();
			foreach ($appTables as $appTable => $appColumns) {
				foreach ($appColumns as $appColumn) {
					$columns .= ', `*PREFIX*'.$appTable.'`.`'.$appColumn.'`';
				}
			}
		}
		return array($columns, $joins);
	}

	/**
	 * Update the share's properties in the database
	 * @param int $id
	 * @param array $data
	 */
	protected function update($id, array $data) {
		// TODO
	}

}