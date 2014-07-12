<?php
/**
 * ownCloud - Collection class for PIM object
 *
 * @author Thomas Tanghus
 * @copyright 2012-2014 Thomas Tanghus (thomas@tanghus.net)
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
 *
 */

namespace OCP\Contacts;

/**
 * Subclass this for PIM collections.
 */
abstract class AbstractPIMCollection extends AbstractPIMObject implements \Iterator, \Countable, \ArrayAccess {

	// Iterator properties

	protected $objects = array();

	protected $current;

	/**
	 * Returns a specific child node, referenced by its id
	 *
	 * @param string $id
	 * @return IPIMObject
	 */
	public abstract function getChild($id);

	/**
	 * Returns an array with all the child nodes
	 *
	 * @return IPIMObject[]
	 */
	public abstract function getChildren($limit = null, $offset = null);

	/**
	 * Checks if a child-node with the specified id exists
	 *
	 * @param string $id
	 * @return bool
	 */
	public abstract function childExists($id);

	/**
	 * Add a child to the collection
	 *
	 * It's up to the implementations to "keep track" of the children.
	 *
	 * @param mixed $data
	 * @return string ID of the newly added child
	 */
	public abstract function addChild($data);

	/**
	 * Delete a child from the collection
	 *
	 * @param string $id
	 * @return bool
	 */
	public abstract function deleteChild($id, $options = array());

	// Iterator methods

	// NOTE: This method is reliant on sub class implementing count()
	public function rewind() {
		// Assure any internal counter's initialized
		self::count();
		if (count($this->objects) === 0) {
			$this->getChildren();
		}
		$this->current = reset($this->objects);
	}

	public function next() {
		$this->current = next($this->objects);
	}

	public function valid() {
		return $this->current ? array_key_exists($this->current->getId(), $this->objects) : false;
	}

	public function current() {
		return $this->objects[$this->current->getId()];
	}

	/** Implementations can choose to return the current objects ID/UUID
	 * to be able to iterate over the collection with ID => Object pairs:
	 * foreach($collection as $id => $object) {}
	 */
	public function key() {
		return $this->current->getId();
	}

	// Countable method.

	/**
	 * For implementations using a backend where fetching all object at once
	 * would give too much overhead, they can maintain an internal count value
	 * and fetch objects progressively.
	 */
	public function count() {
		return count($this->objects);
	}

	// ArrayAccess methods

	public function offsetSet($offset, $value) {
		if (is_null($offset)) {
			throw new \RunTimeException('You cannot add objects using array access');
		} else {
			// TODO: Check if offset is set and update element.
			$this->objects[$offset] = $value;
		}
	}

	public function offsetExists($offset) {
		if (isset($this->objects[$offset])) {
			return true;
		}

		try {
			$child = $this->getChild($offset);
		} catch (\Exception $e) {
			return false;
		}

		if ($child) {
			$this->objects[$offset] = $child;
			return true;
		}

		return false;
	}

	public function offsetUnset($offset) {
		$this->deleteChild($offset);
		unset($this->objects[$offset]);
	}

	public function offsetGet($offset) {
		if (isset($this->objects[$offset])) {
			return $this->objects[$offset];
		}

		$child = $this->getChild($offset);

		if ($child) {
			$this->objects[$offset] = $child;
			return $child;
		}

	}

}
