<?php
/**
* ownCloud
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

/**
 * Class for easily tagging objects by their id
 *
 * A tag can be e.g. 'Family', 'Work', 'Chore', 'Special Occation' or
 * anything else that is either parsed from a vobject or that the user chooses
 * to add.
 * Tag names are not case-sensitive, but will be saved with the case they
 * are entered in. If a user already has a tag 'family' for a type, and
 * tries to add a tag named 'Family' it will be silently ignored.
 */

namespace OC;

class Tags implements \OCP\ITags {

	/**
	 * FIXME var Backend\AbstractBackend
	 */
	private $backends = array();

	/**
	 * Used for storing objectid/categoryname pairs while rescanning.
	 *
	 * @var array
	 */
	private static $relations = array();

	/**
	 * Type
	 *
	 * @var string
	 */
	private $type = null;

	/**
	 * User
	 *
	 * @var string
	 */
	private $user = null;

	public static $backendClasses = array(
		'local' => 'OC\Tags\Backend\Database',
		'shared' => 'OC\Tags\Backend\Shared'
	);

	const TAG_FAVORITE = '_$!<Favorite>!$_';

	/**
	* Constructor.
	*
	* @param string $user The user whose data the object will operate on.
	* @param string $type
	*/
	public function __construct($user, $type, $defaultTags = array()) {
		$this->user = $user;
		$this->type = $type;
		foreach (self::$backendClasses as $backendName => $class)
			if ($backendName == 'local')
				$this->backends[$backendName] = new $class($user, $type, $defaultTags);
			else
				$this->backends[$backendName] = new $class($user, $type);
	}


	/**
	* Check if any tags are saved for this type and user.
	*
	* @return boolean.
	*/
	public function isEmpty() {
		foreach ($this->backends as $name => $backend)
			if (!$backend->isEmpty())
				return false;

		return true;
	}

	/**
	* Get the tags for a specific user.
	*
	* This returns an array with id/name/owner maps:
	* [
	* 	['id' => 0, 'name' = 'First tag', 'owner' = 'Tags owner'],
	* 	['id' => 1, 'name' = 'Second tag', 'owner' = 'Tags owner'],
	* ]
	*
	* @return array
	*/
	public function getTags() {
		$tags = array();
		foreach ($this->backends as $backend)
			$tags = array_merge($tags, $backend->getUnsortedTags());

		if(!count($tags))
			return array();

		usort($tags, function($a, $b) {
			return strnatcasecmp($a->category, $b->category);
		});

		$tags = array_filter($tags, function ($t) {
			return $t->category !== self::TAG_FAVORITE;
		});

		return (array) $tags;
	}

	/**
	* Get the a list of items tagged with $tag.
	*
	* Throws an exception if the tag could not be found.
	*
	* @param string $tag Tag id or name.
	* @return array An array of object ids or false on error.
	*/
	public function getIdsForTag($tag) {
		if (is_numeric($tag))
			$id = $tag;
		else
			foreach ($this->backends as $backend)
				if (($id = $backend->getTagId($tag)) !== false)
					break;

		$ids = array();
		foreach ($this->backends as $backend)
			$ids += $backend->getIdsForTag($id);

		return $ids;
	}

	/**
	* Checks whether a tag is already saved.
	*
	* @param string $name The name to check for.
	* @return bool
	*/
	public function hasTag($name) {
		foreach ($this->backends as $backend)
			if ($backend->getTagId($name) !== false)
				return true;

		return false;
	}

	/**
	* Add a new tag, owned by the current user.
	*
	* @param string $name A string with a name of the tag
	* @return false|string the id of the added tag or false on error.
	*/
	public function add($name) {
		$name = trim($name);

		if($name === '') {
			\OCP\Util::writeLog('core', __METHOD__.', Cannot add an empty tag', \OCP\Util::DEBUG);
			return false;
		}
		if($this->backends['local']->getTagId($name) !== false) {
			\OCP\Util::writeLog('core', __METHOD__.', name: ' . $name. ' exists already', \OCP\Util::DEBUG);
			return false;
		}

		return $this->backends['local']->add($name)->getId();
	}

	/**
	* Rename tag.
	*
	* @param string $from The name of the existing tag
	* @param string $to The new name of the tag.
	* @return bool
	*/
	public function rename($from, $to) {
		$from = trim($from);
		$to = trim($to);

		if($to === '' || $from === '') {
			\OCP\Util::writeLog('core', __METHOD__.', Cannot use empty tag names', \OCP\Util::DEBUG);
			return false;
		}

		foreach ($this->backends as $name => $backend)
			if ($backend->getTagId($from) !== false)
				return $backend->rename($from, $to);

		\OCP\Util::writeLog('core', __METHOD__.', tag: ' . $from. ' does not exist', \OCP\Util::DEBUG);
		return false;
	}

	/**
	* Add a list of new tags.
	*
	* @param string[] $names A string with a name or an array of strings containing
	* the name(s) of the tags to add.
	* @param bool $sync When true, save the tags
	* @param int|null $id int Optional object id to add to this|these tag(s)
	* @return bool Returns false on error.
	*/
	public function addMultiple($names, $sync=false, $id = null) {
		if(!is_array($names)) {
			$names = array($names);
		}
		$names = array_map('trim', $names);
		array_filter($names);

		return $this->backends['local']->addMultiple($names, $sync, $id);
	}

	/**
	* Delete tags and tag/object relations for a user.
	*
	* For hooking up on post_deleteUser
	*
	* @param array $arguments
	*/
	public static function post_deleteUser($arguments) {
		$this->backends['local']->post_deleteUser($arguments);
	}

	/**
	* Delete tag/object relations from the db
	*
	* @param array $ids The ids of the objects
	* @return boolean Returns false on error.
	*/
	public function purgeObjects(array $ids) {
		return $this->backends['local']->purgeObjects($ids);
	}

	/**
	* Get favorites for an object type
	*
	* @return array An array of object ids.
	*/
	public function getFavorites() {
		try {
			return $this->getIdsForTag(self::TAG_FAVORITE);
		} catch(\Exception $e) {
			\OCP\Util::writeLog('core', __METHOD__.', exception: ' . $e->getMessage(),
				\OCP\Util::DEBUG);
			return array();
		}
	}

	/**
	* Add an object to favorites
	*
	* @param int $objid The id of the object
	* @return boolean
	*/
	public function addToFavorites($objid) {
		if(!$this->hasTag(self::TAG_FAVORITE)) {
			$this->add(self::TAG_FAVORITE);
		}
		return $this->tagAs($objid, self::TAG_FAVORITE);
	}

	/**
	* Remove an object from favorites
	*
	* @param int $objid The id of the object
	* @return boolean
	*/
	public function removeFromFavorites($objid) {
		return $this->unTag($objid, self::TAG_FAVORITE);
	}

	/**
	* Creates a tag/object relation.
	*
	* @param int $objid The id of the object
	* @param string $tag The id or name of the tag
	* @return boolean Returns false on error.
	*/
	public function tagAs($objid, $tag) {
		$tagId = $tag;
		$backendToUse = $this->backends['local']; // Default backend
		if(is_string($tag) && !is_numeric($tag)) {
			$tag = trim($tag);
			if($tag === '') {
				\OCP\Util::writeLog('core', __METHOD__.', Cannot add an empty tag',
									\OCP\Util::DEBUG);
				return false;
			}

			$tagId = false;
			foreach ($this->backends as $name => $backend) {
				if (($tagId = $backend->getTagId($tag)) !== false) {
					$backendToUse = $backend;
					break;
				}
			}

			if(!$tagId) {
				// Add new tag to this user's tags (i.e. using the local backend).
				$tagId = $backendToUse->add($tag)->getId();
			}

		} else {
			foreach ($this->backends as $name => $backend) {
				if ($backend->hasTagId($tag)) {
					$backendToUse = $backend;
					$tagId = $tag;
					break;
				}
			}
		}

		return $backendToUse->tagAs($objid, $tagId);
	}

	/**
	* Delete single tag/object relation from the db
	*
	* @param int $objid The id of the object
	* @param string $tag The id or name of the tag
	* @return boolean
	*/
	public function unTag($objid, $tag) {
		if(is_string($tag) && !is_numeric($tag)) {
			$tag = trim($tag);
			if($tag === '') {
				\OCP\Util::writeLog('core', __METHOD__.', Tag name is empty', \OCP\Util::DEBUG);
				return false;
			}

			foreach ($this->backends as $name => $backend)
				if (($tagId = $backend->getTagId($tag)) !== false)
					return $backend->unTag($objid, $tagId);

			// Tag with given name not found.
			return false;

		} else {
			foreach ($this->backends as $name => $backend)
				if ($backend->hasTagId($tag))
					return $backend->unTag($objid, $tag);
		}

	// Tag with given ID not found.
	return false;
	}

	/**
	* Delete tags from the db.
	*
	* @param string[] $names An array of tags to delete
	* @return bool Returns false on error
	*/
	public function delete($names) {
		$success = true;
		if(!is_array($names)) {
			$names = array($names);
		}

		$names = array_map('trim', $names);
		array_filter($names);

		foreach ($this->backends as $backendName => $backend) {
			$tagsInBackend = array();
			foreach ($names as $name) {
				// FIXME: If we're given a tag name (not ID), this will delete tags of that name
				// from all backends.
				if ((is_numeric($name) && ($backend->hasTagId($name) !== false)) ||
					(($backend->getTagId($name)) !== false)) {
					$tagsInBackend[] = $name;
					unset($name);
				}
			}
			$success &= $backend->deleteTags($tagsInBackend);
		}
		return $success;
	}

}
