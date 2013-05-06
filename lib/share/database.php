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

class ShareMapper {

	private $shareTypeId;
	private $itemType;


 	// NOTE: If permissions is 0, don't return it - Group share that is unshared from self


	/**
	 * @param \OC\Share\Share $itemType
	 */
	public function __construct(ItemType $itemType) {
		$this->itemType = $itemType;
	}

	public function getId($shareOwner, $shareWith, $itemSource) {

	}

	public function getShares($shareOwner, $shareWith, $shareType) {
		

	}

	public function getShare($id) {
		$query = \OC_DB::prepare('SELECT `parent` FROM `*PREFIX*share` WHERE `id` = ?', 1);
		$result = $query->execute(array($id));
		$data = $result->fetchRow();
		if ($data) {
			$data = $this->typeCastFields($data);
			// Look for duplicate shares
			$query = \OC_DB::prepare('SELECT `parent` FROM `*PREFIX*share` WHERE `id` != ?');

			foreach ($duplicateShares as $duplicateShare) {
				$
			}

			
			$share = new $itemType($data);
			return $share;
		} else {
			return false;
		}
	}

	// Only gets the first level of reshares
	public function getReshares($id) {
		$reshares = array();
		$reshareIds = array();
		$parentId = $this->getShare($id)->getParentId();
		$query = \OC_DB::prepare('SELECT * FROM `*PREFIX*share` WHERE `parent` = ?');
		$reshareIds = $query->execute(array($id))->fetchAll();
		// NOTE Don't include shares that are just duplicate shares i.e. user & group same owner
		foreach ($reshareIds as $reshareId) {
			$reshare = $this->getShare($reshareId);
			if ($reshare) {
				$reshares[$reshare->getId()] = $reshare;
			}
		}
		return $reshares;
	}

	/**
	 * Get identical shares from different owners or share types
	 * @return
	 */
	public function getDuplicateShares($id) {
		$duplicates = array();
		$share = $this->getShare($id);
		$query = \OC_DB::prepare('SELECT `id` FROM `*PREFIX*share` WHERE `parent` = ?');
		return $duplicates;
	}

	public function insert(array $data) {
		list($queryParts, $params) = $this->buildParts($data);
		$query = \OC_DB::prepare('INSERT INTO `*PREFIX*share` 
				(' . implode(', ', $queryParts) . ')'
			. ' VALUES( ' . implode(', ', $valuesPlaceholder) . ')');
		$result = $query->execute($params);
		return (int)\OC_DB::insertid('*PREFIX*share');
	}

	public function update($id, array $data) {
		if ($this->getShare($id)) {
			list($queryParts, $params) = $this->buildParts($data);
			$query = \OC_DB::prepare('UPDATE `*PREFIX*share` SET '.
					implode(' = ?, ', $queryParts).' = ?  WHERE id = ?');
			$query->execute($params);
		} else {
			throw new \Exception();
		}
	}

	public function delete($id) {
		$query = \OC_DB::prepare('DELETE FROM `*PREFIX*share` WHERE `id` = ?');
		$query->execute(array($id));
	}

	public function search($pattern) {

	}

	public function getItemTypeNumericId($itemType) {

	}

	public function getShareTypeNumericId($shareType) {

	}

	/**
	 * Remove all shares for this item type
	 */
	public function clear() {
		$query = \OC_DB::prepare('DELETE FROM `*PREFIX*share` WHERE `item_type` = ?');
		$query->execute(array($this->itemType));
	}

	public function mergeShares(Share $shares) {

	}

	private function typeCastFields(array $data) {
		foreach ($data as $name => $value) {
			if ($name === 'id' || $name === 'parent' || $name === 'permissions') {
				$data[$name] = (int)$value;
			}
		}
		return $data;
	}

	/**
	 * Extract query parts and params array from Share
	 *
	 * @param array $data
	 * @return array
	 */
	private function buildParts(Share $share) {
		$requiredFields = array('share_owner', 'share_type', 'share_with', 'permissions', 
								'item_type', 'item_source', 'item_target');
		if ($share instanceof OC\Share\FileDependent) {
			$requiredFields
		}
		$fields = array('path', 'parent', 'name', 'mimetype', 'size', 'mtime', 'encrypted', 'etag');
		$params = array();
		$queryParts = array();
		foreach ($data as $name => $value) {
			if (array_search($name, $fields) !== false) {
				$params[] = $value;
				$queryParts[] = '`' . $name . '`';
			}
		}
		return array($queryParts, $params);
	}

}