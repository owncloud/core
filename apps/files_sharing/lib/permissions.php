<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2012-2013 Michael Gapczynski mtgap@owncloud.com
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

use OCA\Files\Share\FileShareFetcher;

class SharedPermissions extends Permissions {

	private $fetcher;

	/**
	 * The constructor
	 * @param \OC\Files\Storage\Storage|string $storage
	 * @param \OCA\FilesSharing\Share\FileShareFetcher $fetcher
	 */
	public function __construct($storage, FileShareFetcher $fetcher) {
		parent::__construct($storage);
		$this->fetcher = $fetcher;
	}

	/**
	 * get the permissions for a single file
	 *
	 * @param int $fileId
	 * @param string $user
	 * @return int (-1 if file no permissions set)
	 */
	public function get($fileId, $user) {
		if ($fileId === -1) {
			return \OCP\PERMISSION_READ;
		}
		return $this->fetcher->getPermissionsById($fileId);
	}

	/**
	 * set the permissions of a file
	 *
	 * @param int $fileId
	 * @param string $user
	 * @param int $permissions
	 */
	public function set($fileId, $user, $permissions) {
		// Not a valid action for Shared Permissions
	}

	/**
	 * get the permissions of multiply files
	 *
	 * @param int[] $fileIds
	 * @param string $user
	 * @return int[]
	 */
	public function getMultiple($fileIds, $user) {
		if (count($fileIds) === 0) {
			return array();
		}
		foreach ($fileIds as $fileId) {
			$filePermissions[$fileId] = $this->get($fileId, $user);
		}
		return $filePermissions;
	}

	/**
	 * get the permissions for all files in a folder
	 *
	 * @param int $parentId
	 * @param string $user
	 * @return int[]
	 */
	public function getDirectoryPermissions($parentId, $user) {
		$filePermissions = array();
		// Root of the Shared folder
		if ($parentId === -1) {
			$filePermissions = $this->fetcher->getAllPermissions();
		} else {
			$permissions = $this->get($parentId, $user);
			$sql = 'SELECT `fileid` FROM `*PREFIX*filecache` WHERE `parent` = ?';
			$result = \OC_DB::executeAudited($sql, array($parentId));
			while ($row = $result->fetchRow()) {
				$filePermissions[$row['fileid']] = $permissions;
			}
		}
		return $filePermissions;
	}

	/**
	 * remove the permissions for a file
	 *
	 * @param int $fileId
	 * @param string $user
	 */
	public function remove($fileId, $user = null) {
		// Not a valid action for Shared Permissions
	}

	public function removeMultiple($fileIds, $user) {
		// Not a valid action for Shared Permissions
	}

}
