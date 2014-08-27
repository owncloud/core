<?php
/**
* ownCloud - Backend for shared tags
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

use OC\Tags\Backend\Database;
use OC\Share\Share;

class Shared extends Database {

	/**
	 * The name of the backend.
	 *
	 * @var string
	 */
	public $name = 'shared';

	/**
	 * The shared tags' owners;
	 *
	 * @var string
	 */
	private $owners;

	/**
	* Load shared tags for a given user and type.
	*
	* @param string $user The user whose tags we're querying for.
	* @param string $type The type for which we're querying the corresponding tags.
	*/
	public function loadTags($user, $type, $defaultTags=array()) {
	// First, we find out if $type is part of a collection (and if that collection is part of
	// another one and so on). Of these collection types, along with our original $type, we make a
	// list of the ones for which a sharing backend has been registered.
	//
	// FIXME: Ideally, we wouldn't need to nest getItemsSharedWith in this loop but just call it
	// with its $includeCollections parameter set to true. Unfortunately, this fails currently.
	$this->owners = array();
	foreach (Share::getCollectionItemTypes($type) as $collectionType) {
		if (\OCP\Share::hasBackend($collectionType)) {
			$backend = \OCP\Share::getBackend($collectionType);
			$allMaybeSharedItems[$collectionType] = \OCP\Share::getItemsSharedWith(
				$collectionType,
				\OCP\Share::FORMAT_NONE
			);
		}
	}

	// We take a look at all shared items of the given $type (or of the collections it is part of)
	// and find out their owners. Then, we gather the tags for the original $type from all owners,
	// and return them as elements of a list that look like "Tag (owner)".
	$tags = array();
	foreach ($allMaybeSharedItems as $collectionType => $maybeSharedItems) {
		foreach ($maybeSharedItems as $sharedItem) {
			if (isset($sharedItem['id'])) { //workaround for https://github.com/owncloud/core/issues/2814
				$owner = $sharedItem['uid_owner'];
				$this->owners[] = $owner;
				// $displayname_owner = $sharedItem['displayname_owner'];
				foreach (parent::loadTags($owner, $type, $defaultTags) as $id => $tag) {
					// We might want to use some regular tag sharing backend for setting the target name.
					$this->tags[$id] = $tag; // . ' (' . $owner . ')';
				}
			}
		}
	}

	return $this->tags;
	}

	public function getIdsForTag($tag) {
	$ids = array();
	foreach ($this->owners as $owner)
		$ids += parent::getIdsForTagAndOwner($tag, $owner);

	return $ids;
	}

}
