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
 * Data holder for shared items. Extend this class for your items.
 *
 * A setter does not imply that property can change.
 *
 * Extension of OCA\AppFramework\Db\Entity
 * 
 */
class Share {

	public $id;
	public $parentId;
	public $shareTypeId;
	public $uidOwner;
	public $shareWith;
	public $permissions;
	public $itemSource;
	public $itemTarget;
	public $itemOwner;
	public $expirationTime;
	public $shareTime;

	private $updatedFields = array();
	private $fieldTypes = array(
		'id' => 'int',
		'parentId' => 'int',
		'permissions' => 'int',
		'expirationTime' => 'int',
		'shareTime' => 'int'
	);

	public function isCreatable() {
		return $this->permissions & OCP\PERMISSION_CREATE;
	}

	public function isReadable() {
		return $this->permissions & OCP\PERMISSION_READ;
	}

	public function isUpdatable() {
		return $this->permissions & OCP\PERMISSION_UPDATE;
	}

	public function isDeletable() {
		return $this->permissions & OCP\PERMISSION_DELETE;
	}

	public function isSharable() {
		return $this->permissions & OCP\PERMISSION_SHARE;
	}

	/**
	 * Simple alternative constructor for building entities from a request
	 * @param array $params the array which was obtained via $this->params('key')
	 * in the controller
	 * @return Share
	 */
	public static function fromParams(array $params) {
		$instance = new static();
		foreach ($params as $key => $value) {
			$method = 'set'.ucfirst($key);
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
		foreach ($row as $key => $value) {
			$prop = $this->columnToProperty($key);
			if ($value !== null && isset($this->fieldTypes[$prop])) {
				settype($value, $this->fieldTypes[$prop]);
			}
			$method = 'set'.ucfirst($key);
			$instance->$method($value);
			$this->$prop = $value;
		}
		return $instance;
	}
	
	/**
	 * Marks the entity as clean needed for setting the id after the insertion
	 */
	public function resetUpdatedFields() {
		$this->updatedFields = array();
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
			$attr = lcfirst( substr($methodName, 3) );
			// setters should only work for existing attributes
			if (property_exists($this, $attr)) {
				$this->markFieldUpdated($attr);
				$this->$attr = $args[0];	
			} else {
				throw new \BadFunctionCallException($attr . 
					' is not a valid attribute');
			}
		// getters
		} elseif (strpos($methodName, 'get') === 0) {
			$attr = lcfirst(substr($methodName, 3));
			// getters should only work for existing attributes
			if (property_exists($this, $attr)) {
				return $this->$attr;
			} else {
				throw new \BadFunctionCallException($attr . 
					' is not a valid attribute');
			}
		} else {
			throw new \BadFunctionCallException($methodName . 
					' does not exist');
		}
	}

	/**
	 * Mark an attribute as updated
	 * @param string $attribute the name of the attribute
	 */
	protected function markFieldUpdated($attribute) {
		$this->updatedFields[$attribute] = true;
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
	 * Transform a property to a database column name
	 * @param string $property the name of the property
	 * @return string the column name
	 */
	public function propertyToColumn($property) {
		$parts = preg_split('/(?=[A-Z])/', $property);
		$column = null;
		foreach($parts as $part) {
			if ($column === null) {
				$column = $part;
			} else {
				$column .= '_'.lcfirst($part);
			}
		}
		return $column;
	}

	/**
	 * @return array array of updated fields for update query
	 */
	public function getUpdatedFields() {
		return $this->updatedFields;
	}

	/**
	 * Adds type information for a field so that its automatically casted to
	 * that value once its being returned from the database
	 * @param string $fieldName the name of the attribute
	 * @param string $type the type which will be used to call settype()
	 */
	protected function addType($fieldName, $type) {
		$this->fieldTypes[$fieldName] = $type;
	}

}