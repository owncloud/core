<?php
/**
* ownCloud - Abstract backend for tags
*
* @author Thomas Tanghus
* @copyright 2012-2013 Thomas Tanghus <thomas@tanghus.net>
* @copyright 2012 Bart Visscher bartv@thisnet.nl
* @copyright 2014 Bernhard Reiter <ockham@raz.or.at>
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

namespace OC\Tags\Backend;

/**
 * Subclass this class for tags backends.
 */
abstract class AbstractBackend {

	/**
	 * The name of the backend.
	 *
	 * @var string
	 */
	public $name;

	/**
	 * The tags this backend holds.
	 *
	 * @var array
	 */
	protected $tags = array();

	/**
	 * The type of the items for which this backends holds tags
	 *
	 * @var string
	 */
	protected $type;

	/**
	 * The user whose tags this backend holds
	 *
	 * @var string
	 */
	protected $user;

	/**
	* Constructor.
	*
	* @param string $user The user whose data the object will operate on.
	* @param string $type
	*/
	public function __construct(
		$user,
		$type,
		$defaultTags = array()
	) {
		$this->user = $user;
		$this->type = $type;
		$this->loadTags($this->user, $this->type, $defaultTags);
	}

	/**
	* Load tags from db.
	*
	*/
	public abstract function loadTags($user, $type, $defaultTags=array());

	/**
	* Check if any tags are saved for this type and user.
	*
	* @return boolean.
	*/
	public function isEmpty() {
		return count($this->tags) === 0;
	}

	/**
	 * Get a list of all tags stored in the backend.
	 */
	public function getUnsortedTags() {
		return $this->tags;
	}

	/**
	* Get the list of items tagged with $tag.
	*
	* Throws an exception if the tag could not be found.
	*
	* @param string $tag Tag id or name.
	* @return array An array of object ids or false on error.
	*/
	public abstract function getIdsForTag($tag);

	/**
	* Get a tag's ID.
	*
	* @param string $name The name to check for.
	* @return string The tag's id or false if it hasn't been saved yet.
	*/
	public function getTagId($name) {
		return $this->array_searchi($name, $this->tags);
	}

	/**
	* Checks whether a tag given by id is already saved.
	*
	* @param int $id The id to check for.
	* @return bool False if the tag hasn't been saved yet.
	*/
	public function hasTagId($id) {
		return array_key_exists($id, $this->tags);
	}

	/**
	* Add a new tag.
	*
	* @param string $name A string with a name of the tag
	* @return false|string the id of the added tag or false on error.
	*/
	public abstract function add($name);

	/**
	* Rename tag.
	*
	* @param string $id The id of the existing tag
	* @param string $to The new name of the tag.
	* @return bool
	*/
	public abstract function rename($id, $to);

	/**
	* Add a list of new tags.
	*
	* @param string[] $names An array of strings containing the name(s) of the
	* tags to add.
	* @param bool $sync When true, save the tags
	* @param int|null $id int Optional object id to add to this|these tag(s)
	* @return bool Returns false on error.
	*/
	public abstract function addMultiple(array $names, $sync=false, $id = null);

	/**
	* Delete tag/object relations from the db
	*
	* @param array $ids The ids of the objects
	* @return boolean Returns false on error.
	*/
	public abstract function purgeObjects(array $ids);

	/**
	* Creates a tag/object relation.
	*
	* @param int $objid The id of the object
	* @param string $tag The id or name of the tag
	* @return boolean Returns false on error.
	*/
	public abstract function tagAs($objid, $tag);

	/**
	* Delete single tag/object relation from the db
	*
	* @param int $objid The id of the object
	* @param string $tag The id or name of the tag
	* @return boolean
	*/
	public abstract function unTag($objid, $tag);

	/**
	* Delete tags from the
	*
	* @param string[] $names An array of tags to delete
	* @return bool Returns false on error
	*/
	public abstract function delete($names);

	// case-insensitive array_search
	protected function array_searchi($needle, $haystack) {
		if(!is_array($haystack)) {
			return false;
		}
		return array_search(strtolower($needle), array_map(function($tag) { return strtolower($tag->category); }, $haystack));
	}
}
