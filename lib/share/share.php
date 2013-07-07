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
 * 
 */
class Share {

	protected $id;
	protected $parentIds = array();
	protected $shareTypeId;
	protected $shareOwner;
	protected $shareWith;
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
	 * Check if the share has create permission
	 * @return bool
	 */
	public function isCreatable() {
		return ($this->permissions & \OCP\PERMISSION_CREATE) !== 0;
	}

	/**
	 * Check if the share has read permission
	 * @return bool
	 */
	public function isReadable() {
		return ($this->permissions & \OCP\PERMISSION_READ) !== 0;
	}

	/**
	 * Check if the share has update permission
	 * @return bool
	 */
	public function isUpdatable() {
		return ($this->permissions & \OCP\PERMISSION_UPDATE) !== 0;
	}

	/**
	 * Check if the share has delete permission
	 * @return bool
	 */
	public function isDeletable() {
		return ($this->permissions & \OCP\PERMISSION_DELETE) !== 0;
	}

	/**
	 * Check if the share has share permission
	 * @return bool
	 */
	public function isSharable() {
		return ($this->permissions & \OCP\PERMISSION_SHARE) !== 0;
	}

	/**
	 * Add a reference to a parent share
	 * @param Share $share
	 */
	public function addParentId($id) {
		$this->parentIds[] = $id;
		$this->markPropertyUpdated('parentIds');
	}

	/**
	 * Remove a reference to a parent share
	 * @param Share $share
	 */
	public function removeParentId($id) {
		$this->parentIds = array_diff($this->parentIds, array($id));
		$this->markPropertyUpdated('parentIds');
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
	 * Each time a setter is called, push the part after set
	 * into an array: for instance setId will save Id in the 
	 * updated fields array so it can be easily used to create the
	 * getter method
	 */
	public function __call($methodName, $args) {
		// setters
		if (strpos($methodName, 'set') === 0) {
			$property = lcfirst(substr($methodName, 3));
			// setters should only work for existing attributes
			if (property_exists($this, $property)) {
				$this->markPropertyUpdated($property);
				$this->$property = $args[0];	
			} else {
				throw new \BadFunctionCallException($property.' is not a valid property');
			}
		// getters
		} else if (strpos($methodName, 'get') === 0) {
			$property = lcfirst(substr($methodName, 3));
			// getters should only work for existing attributes
			if (property_exists($this, $property)) {
				return $this->$property;
			} else {
				throw new \BadFunctionCallException($property.' is not a valid property');
			}
		} else {
			throw new \BadFunctionCallException($methodName.' does not exist');
		}
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