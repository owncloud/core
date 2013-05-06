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

abstract class Share {

	private $id;
	private $parentId;
	private $shareOwner;
	private $shareType;
	private $shareWith;
	private $permissions;
	private $itemSource;
	private $itemTarget;

	public function __construct() {
		$this->shareType = $shareType;
		$this->permissions = (int)$data['permissions'];
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getParentId() {
		return $this->parentId;
	}

	public function setParentId($parentId) {
		$this->parentId = $parentId;
	}

	public function getShareType() {
		return $this->shareType;
	}

	public function getShareOwner() {
		return $this->shareOwner;
	}

	public function getShareWith() {
		return $this->shareWith;
	}

	public function getPermissions() {
		return $this->permissions;
	}

	public function setPermissions($permissions) {
		$this->permissions = $permissions;
	}

	public function isCreatable() {
		return $this->getPermissions() & OCP\PERMISSION_CREATE;
	}

	public function isReadable() {
		return $this->getPermissions() & OCP\PERMISSION_READ;
	}

	public function isUpdatable() {
		return $this->getPermissions() & OCP\PERMISSION_UPDATE;
	}

	public function isDeletable() {
		return $this->getPermissions() & OCP\PERMISSION_DELETE;
	}

	public function isSharable() {
		return $this->getPermissions() & OCP\PERMISSION_SHARE;
	}

	public function getItemType() {
		return $this->itemType;
	}

	public function getItemSource() {
		return $this->itemSource;
	}

	public function getItemTarget() {
		return $this->itemTarget;
	}

	public function getItemOwner() {
		$parentId = $this->getParentId();
		if ($parentId > -1) {
			$database = new \OC\Share\Cache();
			while ($parentId > -1) {
				$parentShare = $database->getShare($parentId);
				$parentId = $parentShare->getParentId();
			}
			return $parentShare->getShareOwner();
		} else {
			return $this->getShareOwner();
		}
	}

	public function getExpirationTime() {
		return $this->expirationTime;
	}
 
	public function setExpirationTime($time) {
		$this->expirationDate = $time;
	}

	public function getUpdatedFields() {
		
	}

	/**
	 * Transform a database columnname to a property 
	 * @param string $columnName the name of the column
	 * @return string the property name
	 */
	public function columnToProperty($columnName) {
		$parts = explode('_', $columnName);
		$property = null;
		foreach ($parts as $part) {
			if ($property === null) {
				$property = $part;
			} else {
				$property .= ucfirst($part);
			}
		}
		return $property;
	}

	/**
	 * Maps the keys of the row array to the attributes
	 * @param array $row the row to map onto the entity
	 */
	public function fromRow(array $row) {
		foreach ($row as $key => $value) {
			$prop = $this->columnToProperty($key);
			$this->$prop = $value;
		}
	}

	public function toArray() {
		
	}

}