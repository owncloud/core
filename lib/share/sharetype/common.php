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
use OC\Share\AdvancedShareFactory;

abstract class Common implements IShareType {

	protected $itemType;
	protected $shareFactory;
	protected $table;
	protected $parentTable;

	/**
	 * The constructor
	 * @param string $itemType
	 * @param ShareFactory $shareFactory
	 */
	public function __construct($itemType, ShareFactory $shareFactory) {
		$this->itemType = $itemType;
		$this->shareFactory = $shareFactory;
		$this->table = '`*PREFIX*shares`';
		$this->parentsTable = '`*PREFIX*shares_parents`';
	}

	public function share(Share $share) {
		$properties = array(
			'shareTypeId',
			'shareOwner',
			'shareWith',
			'itemType',
			'itemSource',
			'itemTarget',
			'itemOwner',
			'permissions',
			'expirationTime',
			'shareTime',
		);
		$columms = array();
		$params = array();
		// Retrieve share's properties to store in the database
		foreach ($properties as $property) {
			$columns[] = Share::propertyToColumn($property);
			$getter = 'get'.ucfirst($property);
			$params[] = $share->$getter();
		}
		$placeholders = join(',', array_fill(0, count($columns), '?'));
		$columns = join(',', $columns);
		$sql = 'INSERT INTO '.$this->table.' ('.$columns.') VALUES ('.$placeholders.')';
		$result = \OC_DB::executeAudited($sql, $params);
		$id = (int)\OC_DB::insertid();
		$share->setId($id);
		$share->resetUpdatedProperties();
		$this->setParentIds($share);
		return $share;
	}

	public function unshare(Share $share) {
		$sql = 'DELETE FROM '.$this->table.' WHERE `id` = ?';
		$params = array($share->getId());
		\OC_DB::executeAudited($sql, $params);
		$sql = 'DELETE FROM '.$this->parentsTable.' WHERE `id` = ?';
		\OC_DB::executeAudited($sql, $params);
	}

	public function update(Share $share) {
		$columns = '';
		$params = array();
		$properties = $share->getUpdatedProperties();
		foreach ($properties as $property => $updated) {
			$columns .= Share::propertyToColumn($property).' = ?, ';
			$getter = 'get'.ucfirst($property);
			$params[] = $share->$getter();
		}
		$columns = rtrim($columns, ', ');
		$params[] = $share->getId();
		$sql = 'UPDATE '.$this->table.' SET '.$columns.' WHERE `id` = ?';
		\OC_DB::executeAudited($sql, $params);
	}

	/**
	 * Update the share's parent references in the database
	 * @param Share $share
	 */
	public function setParentIds(Share $share) {
		$id = $share->getId();
		$parentIds = $share->getParentIds();
		$cachedParentIds = $this->getParentIds($id);
		// Compare current parent ids with those in the database
		// to determine which need to be added and removed
		$newParentIds = array_diff($parentIds, $cachedParentIds);
		$oldParentIds = array_diff($cachedParentIds, $parentIds);
		if (!empty($newParentIds)) {
			$sql = 'INSERT INTO '.$this->parentsTable.' (`id`, `parent_id`) VALUES (?, ?)';
			foreach ($newParentIds as $parentId) {
				\OC_DB::executeAudited($sql, array($id, $parentId));
			}
		}
		if (!empty($oldParentIds)) {
			$sql = 'DELETE FROM '.$this->parentsTable.' WHERE `id` = ? AND `parent_id` = ?';
			foreach ($oldParentIds as $parentId) {
				\OC_DB::executeAudited($sql, array($id, $parentId));
			}
		}
	}

	public function getShares(array $filter, $limit, $offset) {
		$defaults = array(
			'shareTypeId' => $this->getId(),
			'itemType' => $this->itemType,
		);
		unset($filter['isShareWithUser']);
		$filter = array_merge($defaults, $filter);
		$where = '';
		$params = array();
		// Build the WHERE clause
		foreach ($filter as $property => $value) {
			$column = Share::propertyToColumn($property);
			if ($property === 'id') {
				$column = $this->table.'.'.$column;
			} else if ($property === 'parentId') {
				$column = $this->parentsTable.'.'.$column;
			}
			$where .= $column.' = ? AND ';
			$params[] = $value;
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
			$joins .= ' '.$this->shareFactory->getJoins();
			$columns .= ', '.$this->shareFactory->getColumns();
		}
		$sql = 'SELECT '.$columns.' FROM '.$this->table.' '.$joins.' WHERE '.$where;
		$query = \OC_DB::prepare($sql, $limit, $offset);
		$result = \OC_DB::executeAudited($query, $params);
		$shares = array();
		while ($row = $result->fetchRow()) {
			$share = $this->shareFactory->mapToShare($row);
			// TODO Come up with an alternative so we don't have to do an additional query
			$parentIds = $this->getParentIds($share->getId());
			$share->setParentIds($parentIds);
			$share->resetUpdatedProperties();
			$shares[] = $share;
		}
		return $shares;
	}

	public function clear() {
		$sql = 'DELETE FROM '.$this->table.' WHERE `share_type_id` = ?';
		\OC_DB::executeAudited($sql, array($this->getId()));
		$sql = 'DELETE FROM '.$this->parentsTable.' WHERE '.$this->parentsTable.'.`id` NOT IN '.
			' (SELECT `id` FROM '.$this->table.')';
		\OC_DB::executeAudited($sql);
	}

	/**
	 * Get the parent ids for a share based on id
	 * @param int $id
	 * @return array
	 */
	protected function getParentIds($id) {
		$sql = 'SELECT `parent_id` FROM '.$this->parentsTable.' WHERE `id` = ?';
		$result = \OC_DB::executeAudited($sql, array($id));
		$parentIds = array();
		while ($row = $result->fetchRow()) {
			$parentIds[] = $row['parent_id'];
		}
		return $parentIds;
	}

}