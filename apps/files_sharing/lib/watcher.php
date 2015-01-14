<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2012 Michael Gapczynski mtgap@owncloud.com
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

namespace OC\Files\Cache;

/**
 * check the storage backends for updates and change the cache accordingly
 */
class Shared_Watcher extends Watcher {
	/**
	 * @var \OCA\Files_Sharing\SharedStorage
	 */
	protected $storage;

	/**
	 * check $path for updates
	 *
	 * @param string $path
	 * @param array $cachedEntry
	 * @return boolean true if path was updated
	 */
	public function checkUpdate($path, $cachedEntry = null) {
		if (parent::checkUpdate($path, $cachedEntry) === true) {
			// since checkUpdate() has already updated the size of the subdirs,
			// only apply the update to the owner's parent dirs

			// find the owner's storage and path
			/** @var \OC\Files\Storage\Storage $storage */
			list($storage, $internalPath) = $this->storage->resolveSource($path);

			// update the parent dirs' sizes in the owner's cache
			$storage->getCache()->correctFolderSize(dirname($internalPath));

			return true;
		}
		return false;
	}
}
