<?php
/**
* ownCloud
*
* @author Vincent Petry
* @copyright 2015 Vincent Petry <pvince81@owncloud.com>
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

namespace OC;

/**
 * Receiver for tag related hooks, rewires them
 * to the TagManager.
 */
class TagHooks {

	/**
	 * Hook for whenever a file or folder was deleted.
	 *
	 * Delete the tag mapping for every file in the folder.
	 */
	static function fileDeletedHook($args) {
		self::deleteFileTagMappings($path);
	}

	static function unmountHook($args) {
		$path = trim($args['path'], '/');
		// strip prefix "$user/files"
		$path = explode('/', 2);
		self::deleteFileTagMappings($path[1]);
	}

	/**
	 * Delete all tag mappings for all files inside the
	 * given path
	 *
	 * @param $path path for which to delete tag mappings
	 */
	static function deleteFileTagMappings($path) {
		$root = \OC::$server->getUserFolder();
		try {
			$node = $root->get($path);
		} catch (\OCP\Files\NotFoundException $e) {
			return;
		}

		$tagManager = \OC::$server->getTagManager();
		$tagger = $tagManager->load('files');

		// TODO: if no tags exist for that user, skip ?

		$fileIds = array($node->getId());

		// traverse subdirectories
		$exploreDirs = array();
		if ($node instanceof \OCP\Files\Folder) {
			$exploreDirs[] = $node;
		}

		while (count($exploreDirs) > 0) {
			$node = array_pop($exploreDirs);

			$children = $node->getDirectoryListing();
			foreach ($children as $child) {
				if ($child instanceof \OCP\Files\Folder) {
					$exploreDirs[] = $child;
				}
				$fileIds[] = $child->getId();
			}
		}

		$tagger->purgeObjects($fileIds);
	}
}
