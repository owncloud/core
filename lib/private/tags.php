<?php
/**
* ownCloud
*
* @author Thomas Tanghus
* @copyright 2012-2013 Thomas Tanghus <thomas@tanghus.net>
* @copyright 2012 Bart Visscher bartv@thisnet.nl
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

use \OCP\AppFramework\Db\Mapper,
    \OCP\IDb;

class Tags extends Mapper implements \OCP\ITags {

	/**
	 * Tags
	 *
	 * @var array
	 */
	private $tags = array();

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

	/**
	 * Are we including tags for shared items?
	 *
	 * @var bool
	 */
	private $includeShared = null;

	const RELATION_TABLE = '*PREFIX*vcategory_to_object';

	const TAG_FAVORITE = '_$!<Favorite>!$_';

	/**
	* Constructor.
	*
	* @param string $user The user whose data the object will operate on.
	* @param string $type The type of items for which tags will be loaded.
	* @param boolean $includeShared Whether to include tags for items shared with this user by others.
	* @param IDb $db Instance of the Db abstraction layer.
	*/
	public function __construct($user, $type, $defaultTags = array(), $includeShared = false, IDb $db = null) {
		if ($db === null)
			$db = new \OC\AppFramework\Db\Db();
		parent::__construct($db, 'vcategory', 'OC\Tag');

		$this->user = $user;
		$this->type = $type;
		$this->includeShared = $includeShared;
		$this->loadTags($defaultTags);
	}

	/**
	* Load tags from db.
	*
	*/
	protected function loadTags($defaultTags=array()) {
		$this->tags = array();
		$this->owners = array($this->user);
		if ($this->includeShared) {
			$this->owners = array_merge($this->owners, \OC\Share\Share::getSharedItemsOwners($this->user, $this->type, true));
			$this->backend = \OC\Share\Share::getBackend($this->type);
		}

		$result = null;
		$sql = 'SELECT `id`, `uid`, `type`, `category` FROM `' . $this->getTableName() . '` '
			. 'WHERE `uid` IN (' . str_repeat('?,', count($this->owners)-1) . '?) AND `type` = ? ORDER BY `category`';
		try {
			$this->tags = $this->findEntities($sql, array_merge($this->owners, array($this->type)));
		} catch(\Exception $e) {
			\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
				\OCP\Util::ERROR);
		}

		if(count($defaultTags) > 0 && count($this->tags) === 0) {
			$this->addMultiple($defaultTags, true);
		}
		\OCP\Util::writeLog('core', __METHOD__.', tags: ' . print_r($this->tags, true),
			\OCP\Util::DEBUG);
	}

	/**
	* Check if any tags are saved for this type and user.
	*
	* @return boolean.
	*/
	public function isEmpty() {
		return count($this->tags) === 0;
	}

	/**
	* Get the tags for a specific user.
	*
	* This returns an array with maps containing each tag's properties:
	* [
	* 	['id' => 0, 'name' = 'First tag', 'owner' = 'User', 'type' => 'tagtype', 'displayname' => 'First tag'],
	* 	['id' => 1, 'name' = 'Shared tag', 'owner' = 'Other user', 'type' => 'tagtype', 'displayname' => 'Shared tag (Other user)'],
	* ]
	*
	* @return array
	*/
	public function getTags() {
		if(!count($this->tags)) {
			return array();
		}

		$tags = $this->tags;
		usort($tags, function($a, $b) {
			return strnatcasecmp($a->category, $b->category);
		});
		$tagMap = array();

		foreach($tags as $tag) {
			if($tag->getCategory() !== self::TAG_FAVORITE) {
				$tagMap[] = array(
					'id'    => $tag->getId(),
					'name'  => $tag->getCategory(),
					'owner' => $tag->getUid(),
					'type'  => $tag->getType(),
					'displayname'  => $tag->getDisplayName()
				);
			}
		}
		return $tagMap;

	}

	/**
	* Get the a list if items tagged with $tag.
	*
	* Throws an exception if the tag could not be found.
	*
	* @param string $tag Tag id or name.
	* @return array An array of object ids or false on error.
	*/
	public function getIdsForTag($tag) {
		$result = null;
		if(is_numeric($tag)) {
			$tagId = $tag;
		} elseif(is_string($tag)) {
			$tag = trim($tag);
			if($tag === '') {
				\OCP\Util::writeLog('core', __METHOD__.', Cannot use empty tag names', \OCP\Util::DEBUG);
				return false;
			}
			$tagId = $this->getTagId($tag);
		}

		if($tagId === false) {
			$l10n = \OC::$server->getL10N('core');
			throw new \Exception(
				$l10n->t('Could not find category "%s"', $tag)
			);
		}

		$ids = array();
		$sql = 'SELECT `objid` FROM `' . self::RELATION_TABLE
			. '` WHERE `categoryid` = ?';

		try {
			$stmt = \OCP\DB::prepare($sql);
			$result = $stmt->execute(array($tagId));
			if (\OCP\DB::isError($result)) {
				\OCP\Util::writeLog('core', __METHOD__. 'DB error: ' . \OCP\DB::getErrorMessage($result), \OCP\Util::ERROR);
				return false;
			}
		} catch(\Exception $e) {
			\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
				\OCP\Util::ERROR);
			return false;
		}

		if(!is_null($result)) {
			while( $row = $result->fetchRow()) {
				$id = (int)$row['objid'];

				if ($this->includeShared) {
					// We have to check if we are really allowed to access the
					// items that are tagged with $tag. To that end, we ask the
					// corresponding sharing backend if the item identified by $id
					// is owned by any of $this->owners.
					foreach ($this->owners as $owner) {
						if ($this->backend->isValidSource($id, $owner)) {
							$ids[] = $id;
							break;
						}
					}
				} else {
					$ids[] = $id;
				}
			}
		}

		return $ids;
	}

	/**
	* Checks whether a tag is already saved.
	*
	* @param string $name The name to check for.
	* @return bool
	*/
	public function hasTag($name) {
		return $this->getTagId($name) !== false;
	}

	/**
	* Add a new tag.
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
		if($this->hasTag($name)) { // FIXME
			\OCP\Util::writeLog('core', __METHOD__.', name: ' . $name. ' exists already', \OCP\Util::DEBUG);
			return false;
		}
		try {
			$tag = new Tag($this->user, $this->type, $name);
			$tag = $this->insert($tag);
			$this->tags[$tag->getId()] = $tag; // FIXME: if not exists!
		} catch(\Exception $e) {
			\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
				\OCP\Util::ERROR);
			return false;
		}
		\OCP\Util::writeLog('core', __METHOD__.', id: ' . $tag->getId(), \OCP\Util::DEBUG);
		return $tag->getId();
	}

	/**
	* Rename tag.
	*
	* @param string $from The name of the existing tag
	* @param string $to The new name of the tag.
	* @return Tag|bool The renamed Tag object, or false on error.
	*/
	public function rename($from, $to) {
		$from = trim($from);
		$to = trim($to);

		if($to === '' || $from === '') {
			\OCP\Util::writeLog('core', __METHOD__.', Cannot use empty tag names', \OCP\Util::DEBUG);
			return false;
		}

		if(($key = $this->getTagByNameOrId($from)) === false) {
			\OCP\Util::writeLog('core', __METHOD__.', tag: ' . $from. ' does not exist', \OCP\Util::DEBUG);
			return false;
		}

		try {
			$tag = $this->tags[$key];
			$tag->setCategory($to);
			$this->tags[$key] = $this->update($tag);
		} catch(\Exception $e) {
			\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
				\OCP\Util::ERROR);
			return false;
		}
		return $this->tags[$key];
	}

	/**
	* Add a list of new tags.
	*
	* @param string[] $names A string with a name or an array of strings containing
	* the name(s) of the to add.
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

		$newones = array();
		foreach($names as $name) {
			if(!$this->hasTag($name) && $name !== '') {
				$newones[] = new Tag($this->user, $this->type, $name);
			}
			if(!is_null($id) ) {
				// Insert $objectid, $categoryid  pairs if not exist.
				self::$relations[] = array('objid' => $id, 'tag' => $name);
			}
		}
		$this->tags = array_merge($this->tags, $newones);
		if($sync === true) {
			$this->save();
		}

		return true;
	}

	/**
	 * Save the list of tags and their object relations
	 */
	protected function save() {
		if(is_array($this->tags)) {
			foreach($this->tags as &$tag) { // Do we need the & ?
				try {
					$tag = $this->insert($tag); // FIXME: if not exists!
				} catch(\Exception $e) {
					\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
						\OCP\Util::ERROR);
				}
			}
			// reload tags to get the proper ids.
			$this->loadTags();
			// Loop through temporarily cached objectid/tagname pairs
			// and save relations.
			$tags = $this->tags;
			// For some reason this is needed or array_search(i) will return 0..?
			ksort($tags);
			foreach(self::$relations as $relation) {
				$tagId = $this->getTagId($relation['tag']);
				\OCP\Util::writeLog('core', __METHOD__ . 'catid, ' . $relation['tag'] . ' ' . $tagId, \OCP\Util::DEBUG);
				if($tagId) {
					try {
						\OCP\DB::insertIfNotExist(self::RELATION_TABLE,
							array(
								'objid' => $relation['objid'],
								'categoryid' => $tagId,
								'type' => $this->type,
								));
					} catch(\Exception $e) {
						\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
							\OCP\Util::ERROR);
					}
				}
			}
			self::$relations = array(); // reset
		} else {
			\OCP\Util::writeLog('core', __METHOD__.', $this->tags is not an array! '
				. print_r($this->tags, true), \OCP\Util::ERROR);
		}
	}

	/**
	* Delete tags and tag/object relations for a user.
	*
	* For hooking up on post_deleteUser
	*
	* @param array $arguments
	*/
	public static function post_deleteUser($arguments) {
		// Find all objectid/tagId pairs.
		$result = null;
		try {
			$sql = 'SELECT `id` FROM `' . $this->getTableName() . '` '
				. 'WHERE `uid` = ?';
			$result = $this->execute($sql, array($arguments['uid']));
			if (\OCP\DB::isError($result)) {
				\OCP\Util::writeLog('core', __METHOD__. 'DB error: ' . \OCP\DB::getErrorMessage($result), \OCP\Util::ERROR);
			}
		} catch(\Exception $e) {
			\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
				\OCP\Util::ERROR);
		}

		if(!is_null($result)) {
			try {
				$sql = 'DELETE FROM `' . self::RELATION_TABLE . '` '
					. 'WHERE `categoryid` = ?';
				while( $row = $result->fetchRow()) {
					try {
						$this->execute($sql, array($row['id']));
					} catch(\Exception $e) {
						\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
							\OCP\Util::ERROR);
					}
				}
			} catch(\Exception $e) {
				\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
					\OCP\Util::ERROR);
			}
		}
		try {
			$sql = 'DELETE FROM `' . $this->getTableName() . '` '
				. 'WHERE `uid` = ?';
			$result = $this->execute($sql, array($arguments['uid']));
			if (\OCP\DB::isError($result)) {
				\OCP\Util::writeLog('core', __METHOD__. ', DB error: ' . \OCP\DB::getErrorMessage($result), \OCP\Util::ERROR);
			}
		} catch(\Exception $e) {
			\OCP\Util::writeLog('core', __METHOD__ . ', exception: '
				. $e->getMessage(), \OCP\Util::ERROR);
		}
	}

	/**
	* Delete tag/object relations from the db
	*
	* @param array $ids The ids of the objects
	* @return boolean Returns false on error.
	*/
	public function purgeObjects(array $ids) {
		if(count($ids) === 0) {
			// job done ;)
			return true;
		}
		$updates = $ids;
		try {
			$query = 'DELETE FROM `' . self::RELATION_TABLE . '` ';
			$query .= 'WHERE `objid` IN (' . str_repeat('?,', count($ids)-1) . '?) ';
			$query .= 'AND `type`= ?';
			$updates[] = $this->type;
			$result = $this->execute($query, $updates);
			if (\OCP\DB::isError($result)) {
				\OCP\Util::writeLog('core', __METHOD__. 'DB error: ' . \OCP\DB::getErrorMessage($result), \OCP\Util::ERROR);
				return false;
			}
		} catch(\Exception $e) {
			\OCP\Util::writeLog('core', __METHOD__.', exception: ' . $e->getMessage(),
				\OCP\Util::ERROR);
			return false;
		}
		return true;
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
		if(is_string($tag) && !is_numeric($tag)) {
			$tag = trim($tag);
			if($tag === '') {
				\OCP\Util::writeLog('core', __METHOD__.', Cannot add an empty tag', \OCP\Util::DEBUG);
				return false;
			}
			if(!$this->hasTag($tag)) {
				$this->add($tag);
			}
			$tagId =  $this->getTagId($tag);
		} else {
			$tagId = $tag;
		}
		try {
			\OCP\DB::insertIfNotExist(self::RELATION_TABLE,
				array(
					'objid' => $objid,
					'categoryid' => $tagId,
					'type' => $this->type,
				));
		} catch(\Exception $e) {
			\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
				\OCP\Util::ERROR);
			return false;
		}
		return true;
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
			$tagId =  $this->getTagId($tag);
		} else {
			$tagId = $tag;
		}

		try {
			$sql = 'DELETE FROM `' . self::RELATION_TABLE . '` '
					. 'WHERE `objid` = ? AND `categoryid` = ? AND `type` = ?';
			$this->execute($sql, array($objid, $tagId, $this->type));
		} catch(\Exception $e) {
			\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
				\OCP\Util::ERROR);
			return false;
		}
		return true;
	}

	/**
	* Delete tags from the database.
	*
	* @param string[] $names An array of tags (names or IDs) to delete
	* @return bool Returns false on error
	*/
	public function delete($names) {
		if(!is_array($names)) {
			$names = array($names);
		}

		$names = array_map('trim', $names);
		array_filter($names);

		\OCP\Util::writeLog('core', __METHOD__ . ', before: '
			. print_r($this->tags, true), \OCP\Util::DEBUG);
		foreach($names as $name) {
			$id = null;

			if (($key = $this->getTagByNameOrId($name)) !== false) {
				$tag = $this->tags[$key];
				$id = $tag->getId();
				unset($this->tags[$key]);
				try {
					parent::delete($tag);
				} catch(\Exception $e) {
					\OCP\Util::writeLog('core', __METHOD__ . ', exception: '
						. $e->getMessage(), \OCP\Util::ERROR);
					return false;
				}
			}
			if(!is_null($id) && $id !== false) {
				try {
					$sql = 'DELETE FROM `' . self::RELATION_TABLE . '` '
							. 'WHERE `categoryid` = ?';
					$result = $this->execute($sql, array($id));
					if (\OCP\DB::isError($result)) {
						\OCP\Util::writeLog('core',
							__METHOD__. 'DB error: ' . \OCP\DB::getErrorMessage($result),
							\OCP\Util::ERROR);
						return false;
					}
				} catch(\Exception $e) {
					\OCP\Util::writeLog('core', __METHOD__.', exception: '.$e->getMessage(),
						\OCP\Util::ERROR);
					return false;
				}
			}
		}
		return true;
	}

	// case-insensitive in_array
	private function in_arrayi($needle, $haystack) {
		if(!is_array($haystack)) {
			return false;
		}
		return in_array(strtolower($needle), array_map('strtolower', $haystack));
	}

	// case-insensitive array_search
	protected function array_searchi($needle, $haystack, $mem='category') {
		if(!is_array($haystack)) {
			return false;
		}
		return array_search(strtolower($needle), array_map(
			function($tag) use($mem) {
				return strtolower($tag->$mem);
			}, $haystack)
		);
	}

	/**
	* Get a tag's ID.
	*
	* @param string $name The tag name to look for.
	* @return string|bool The tag's id or false if it hasn't been saved yet.
	*/
	private function getTagId($name) {
		if (($key = $this->array_searchi($name, $this->tags)) === false)
			return false;
		return $this->tags[$key]->getId();
	}

	/**
	* Get a tag by its name or ID.
	*
	* @param string $tag The tag name or ID to look for.
	* @return integer|bool The tag object's offset within the $this->tags
	*                      array or false if it doesn't exist.
	*/
	private function getTagByNameOrId($tag) {
		if (is_numeric($tag))
			$search = 'id';
		else
			$search = 'category';

		if (($key = $this->array_searchi($tag, $this->tags, $search)) === false)
			return false;
		return $key;
	}
}
