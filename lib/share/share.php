<?php
/**
 * ownCloud
 *
 * @author Bernhard Posselt
 * @author Michael Gapczynski
 * @copyright 2012 Bernhard Posselt nukeawhale@gmail.com
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

/**
 * Data holder for shared items
 * Extend this class to store additional properties
 *
 * Adapated from OCA\AppFramework\Db\Entity
 * Only setters that call markPropertyUpdated are mutable properties
 */
class Share {

	protected $id;
	protected $parentIds = array();
	protected $shareTypeId;
	protected $shareOwner;
	protected $shareOwnerDisplayName;
	protected $shareWith;
	protected $shareWithDisplayName;
	protected $itemType;
	protected $itemSource;
	protected $itemTarget;
	protected $itemOwner;
	protected $permissions = 0;
	protected $expirationTime;
	protected $shareTime;
	protected $token;
	protected $password;

	private $updatedProperties = array();
	private $propertyTypes = array(
		'id' => 'int',
		'permissions' => 'int',
		'expirationTime' => 'int',
		'shareTime' => 'int'
	);

	/**
	 * Get the id
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set the id
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * Get the references to parent shares
	 * @return array
	 */
	public function getParentIds() {
		return $this->parentIds;
	}

	/**
	 * Set the references to parent shares
	 * @param array $parentIds
	 */
	public function setParentIds($parentIds) {
		$this->parentIds = $parentIds;
		$this->markPropertyUpdated('parentIds');
	}

	/**
	 * Add a reference to a parent share
	 * @param int $id
	 */
	public function addParentId($id) {
		$parentIds = $this->getParentIds();
		$parentIds[] = $id;
		$this->setParentIds($parentIds);
	}

	/**
	 * Remove a reference to a parent share
	 * @param int $id
	 */
	public function removeParentId($id) {
		$parentIds = $this->getParentIds();
		$parentIds = array_diff($this->getParentIds(), array($id));
		$this->setParentIds($parentIds);
	}

	/**
	 * Get the share type id
	 * @return string
	 */
	public function getShareTypeId() {
		return $this->shareTypeId;
	}

	/**
	 * Set the share type id
	 * @param string $shareTypeId
	 */
	public function setShareTypeId($shareTypeId) {
		$this->shareTypeId = $shareTypeId;
	}

	/**
	 * Get the share owner
	 * @return string
	 */
	public function getShareOwner() {
		return $this->shareOwner;
	}

	/**
	 * Set the share owner
	 * @param string $shareOwner
	 */
	public function setShareOwner($shareOwner) {
		$this->shareOwner = $shareOwner;
	}

	/**
	 * Get the share owner display name
	 * @return string
	 */
	public function getShareOwnerDisplayName() {
		return $this->shareOwnerDisplayName;
	}

	/**
	 * Set the share owner display name
	 * @param string $shareOwnerDisplayName
	 */
	public function setShareOwnerDisplayName($shareOwnerDisplayName) {
		$this->shareOwnerDisplayName = $shareOwnerDisplayName;
	}

	/**
	 * Get the share with
	 * @return string
	 */
	public function getShareWith() {
		return $this->shareWith;
	}

	/**
	 * Set the share with
	 * @param string $shareWith
	 */
	public function setShareWith($shareWith) {
		$this->shareWith = $shareWith;
	}

	/**
	 * Get the share with display name
	 * @return string
	 */
	public function getShareWithDisplayName() {
		return $this->shareWithDisplayName;
	}

	/**
	 * Set the share With display name
	 * @param string $shareWithDisplayName
	 */
	public function setShareWithDisplayName($shareWithDisplayName) {
		$this->shareWithDisplayName = $shareWithDisplayName;
	}

	/**
	 * Get the item type
	 * @return string
	 */
	public function getItemType() {
		return $this->itemType;
	}

	/**
	 * Set the item type
	 * @param string $itemType
	 */
	public function setItemType($itemType) {
		$this->itemType = $itemType;
	}

	/**
	 * Get the item source
	 * @return mixed
	 */
	public function getItemSource() {
		return $this->itemSource;
	}

	/**
	 * Set the item source
	 * @param mixed $itemSource
	 */
	public function setItemSource($itemSource) {
		$this->itemSource = $itemSource;
	}

	/**
	 * Get the item target
	 * @return string
	 */
	public function getItemTarget() {
		return $this->itemTarget;
	}

	/**
	 * Set the item target
	 * @param string $itemTarget
	 */
	public function setItemTarget($itemTarget) {
		$this->itemTarget = $itemTarget;
		$this->markPropertyUpdated('itemTarget');
	}

	/**
	 * Get the item owner, may differ from share owner if this is a reshare
	 * @return string
	 */
	public function getItemOwner() {
		return $this->itemOwner;
	}

	/**
	 * Set the item owner
	 * @param string $itemOwner
	 */
	public function setItemOwner($itemOwner) {
		$this->itemOwner = $itemOwner;
	}

	/**
	 * Get the permissions
	 * @return int
	 */
	public function getPermissions() {
		return $this->permissions;
	}

	/**
	 * Set the permissions
	 * @param int $permissions
	 */
	public function setPermissions($permissions) {
		$this->permissions = $permissions;
		$this->markPropertyUpdated('permissions');
	}

	/**
	 * Check if create permission is granted
	 * @return bool
	 */
	public function isCreatable() {
		return ($this->permissions & \OCP\PERMISSION_CREATE) !== 0;
	}

	/**
	 * Check if read permission is granted
	 * @return bool
	 */
	public function isReadable() {
		return ($this->permissions & \OCP\PERMISSION_READ) !== 0;
	}

	/**
	 * Check if update permission is granted
	 * @return bool
	 */
	public function isUpdatable() {
		return ($this->permissions & \OCP\PERMISSION_UPDATE) !== 0;
	}

	/**
	 * Check if delete permission is granted
	 * @return bool
	 */
	public function isDeletable() {
		return ($this->permissions & \OCP\PERMISSION_DELETE) !== 0;
	}

	/**
	 * Check if share permission is granted
	 * @return bool
	 */
	public function isSharable() {
		return ($this->permissions & \OCP\PERMISSION_SHARE) !== 0;
	}

	/**
	 * Get the expiration time
	 * @return int
	 */
	public function getExpirationTime() {
		return $this->expirationTime;
	}

	/**
	 * Set the expiration time
	 * @param int $expirationTime
	 */
	public function setExpirationTime($expirationTime) {
		$this->expirationTime = $expirationTime;
		$this->markPropertyUpdated('expirationTime');
	}

	/**
	 * Get the share time
	 * @return int
	 */
	public function getShareTime() {
		return $this->shareTime;
	}

	/**
	 * Set the share time
	 * @param int $shareTime
	 */
	public function setShareTime($shareTime) {
		$this->shareTime = $shareTime;
	}

	/**
	 * Get the token, only for shares of the link share type
	 * @return string
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * Set the token, only for shares of the link share type
	 * @param string $token
	 */
	public function setToken($token) {
		$this->token = $token;
	}

	/**
	 * Get the password, only for shares of the link share type
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * Set the password, only for shares of the link share type
	 * @param string $password
	 */
	public function setPassword($password) {
		$this->password = $password;
		$this->markPropertyUpdated('password');
	}

	/**
	 * Get all properties in an array
	 * @return array
	 */
	public function toAPI() {
		return array(
			'id' => $this->getId(),
			'parentIds' => $this->getParentIds(),
			'shareTypeId' => $this->getShareTypeId(),
			'shareOwner' => $this->getShareOwner(),
			'shareOwnerDisplayName' => $this->getShareOwnerDisplayName(),
			'shareWith' => $this->getShareWith(),
			'shareWithDisplayName' => $this->getShareWithDisplayName(),
			'itemType' => $this->getItemType(),
			'itemSource' => $this->getItemSource(),
			'itemTarget' => $this->getItemTarget(),
			'itemOwner' => $this->getItemOwner(),
			'permissions' => $this->getPermissions(),
			'expirationTime' => $this->getExpirationTime(),
			'shareTime' => $this->getShareTime(),
			'token' => $this->getToken(),
			'password' => $this->getPassword(),
		);
	}

	/**
	 * Simple alternative constructor for building entities from a request
	 * @param array $params the array which was obtained via $this->params('key')
	 * in the controller
	 * @return Share
	 */
	public static function fromParams(array $params) {
		$instance = new static();
		foreach ($params as $property => $value) {
			$method = 'set'.ucfirst($property);
			$instance->$method($value);
		}
		return $instance;
	}

	/**
	 * Maps the keys of the row array to the attributes
	 * @param array $row the row to map onto the entity
	 */
	public static function fromRow(array $row) {
		$instance = new static();
		foreach ($row as $column => $value) {
			$property = $instance::columnToProperty($column);
			if (isset($value) && isset($instance->propertyTypes[$property])) {
				settype($value, $instance->propertyTypes[$property]);
			}
			$method = 'set'.ucfirst($property);
			$instance->$method($value);
		}
		return $instance;
	}
	
	/**
	 * Mark a property as updated
	 * @param string $property the name of the property
	 */
	protected function markPropertyUpdated($property) {
		$this->updatedProperties[$property] = true;
	}

	/**
	 * @return array array of updated fields for update query
	 */
	public function getUpdatedProperties() {
		return $this->updatedProperties;
	}

	/**
	 * Marks the entity as clean
	 */
	public function resetUpdatedProperties() {
		$this->updatedProperties = array();
	}

	/**
	 * Transform a database column name to a property 
	 * @param string $columnName the name of the column
	 * @return string the property name
	 */
	public static function columnToProperty($columnName) {
		$columnName = trim($columnName, '`');
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
	 * Transform a property to a database column name
	 * @param string $property the name of the property
	 * @return string the column name
	 */
	public static function propertyToColumn($property) {
		$parts = preg_split('/(?=[A-Z])/', $property);
		$column = null;
		foreach ($parts as $part) {
			if ($column === null) {
				$column = $part;
			} else {
				$column .= '_'.lcfirst($part);
			}
		}
		return '`'.$column.'`';
	}

}