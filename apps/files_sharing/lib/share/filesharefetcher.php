<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
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

namespace OCA\Files\Share;

use OC\Share\ShareManager;

/**
 * Class to retrieve file shares for a user from the ShareManager
 *
 * These are helper methods used by the shared storage, cache, permissions, etc.
 */
class FileShareFetcher {

	protected $shareManager;
	protected $uid;
	protected $fileItemType;
	protected $folderItemType;

	/**
	 * The constructor
	 * @param \OC\Share\ShareManager $shareManager
	 * @param string $uid
	 */
	public function __construct(ShareManager $shareManager, $uid) {
		$this->shareManager = $shareManager;
		$this->uid = $uid;
		$this->fileItemType = 'file';
		$this->folderItemType = 'folder';
	}

	/**
	 * Get all files shares for the user
	 * @return \OCA\Files\Share\FileShare[]
	 */
	public function getAll() {
		$filter = array(
			'shareWith' => $this->uid,
			'isShareWithUser' => true,
		);
		$fileShares = $this->shareManager->getShares($this->fileItemType, $filter);
		$folderShares = $this->shareManager->getShares($this->folderItemType, $filter);
		return array_merge($fileShares, $folderShares);
	}

	/**
	 * Get all permissions of all shared files for the user
	 * @return array With file ids as keys and permissions as values
	 */
	public function getAllPermissions() {
		return $this->getPermissions($this->getAll());
	}

	/**
	 * Get the ETag of the Shared folder for the user
	 * @return string
	 */
	public function getETag() {
		return \OCP\Config::getUserValue($this->uid, 'files_sharing', 'etag');
	}

	/**
	 * Set the ETag of the Shared folder for the user
	 * @param string $etag
	 */
	public function setETag($etag) {
		\OCP\Config::setUserValue($this->uid, 'files_sharing', 'etag', $etag);
	}

	/**
	 * Get all files shares specified by path
	 * @param string $path
	 * @return \OCA\Files\Share\FileShare[]
	 * 
	 * The returned file shares may not be exact shares for the path, but parent folders
	 * 
	 */
	public function getByPath($path) {
		$shares = array();
		$filter = array(
			'shareWith' => $this->uid,
			'isShareWithUser' => true,
		);
		$path = rtrim($path, '/');
		$pos = strpos($path, '/', 1);
		// Get shared folder name
		if ($pos !== false) {
			$filter['itemTarget'] = substr($path, 0, $pos);
			$shares = $this->shareManager->getShares($this->folderItemType, $filter);
		} else {
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			if ($ext === 'part') {
				$path = substr($path, 0, -5);
			}
			$filter['itemTarget'] = $path;
			// Try to guess file type
			if (empty($ext)) {
				$shares = $this->shareManager->getShares($this->folderItemType, $filter);
				$itemType = $this->fileItemType;
			} else {
				$shares = $this->shareManager->getShares($this->fileItemType, $filter);
				$itemType = $this->folderItemType;
			}
			if (empty($shares)) {
				// Try the other item type
				$shares = $this->shareManager->getShares($itemType, $filter);
			}
		}
		return $shares;
	}

	/**
	 * Get all files shares specified by file id
	 * @param int $fileId
	 * @return \OCA\Files\Share\FileShare[]
	 *
	 * The returned file shares may not be exact shares for the file id, but parent folders
	 * 
	 */
	public function getById($fileId) {
		$filter = array(
			'shareWith' => $this->uid,
			'isShareWithUser' => true,
			'itemSource' => $fileId,
		);
		$shares = $this->shareManager->getShares($this->fileItemType, $filter);
		if (empty($shares)) {
			// Try folder item type instead
			$shares = $this->shareManager->getShares($this->folderItemType, $filter);
		}
		return array_merge($shares, $this->getParentFolders($fileId));
	}

	/**
	 * Resolve a shared path to a storage and internal path
 	 * @param string $path
	 * @return array Consisting of \OC\Files\Storage\Storage and the internal path
	 */
	public function resolvePath($path) {
		$shares = $this->getByPath($path);
		if (!empty($shares)) {
			$share = reset($shares);
			\OC\Files\Filesystem::initMountPoints($share->getItemOwner());
			$mounts = \OC\Files\Filesystem::getMountByNumericId($share->getStorage());
			if (!empty($mounts)) {
				$internalPath = $share->getPath();
				$path = rtrim($path, '/');
				$pos = strpos($path, '/', 1);
				// Get shared folder name
				if ($pos !== false) {
					$internalPath .= substr($path, $pos);
				}
				if (pathinfo($path, PATHINFO_EXTENSION) === 'part') {
					$internalPath .= '.part';
				}
				$fullPath = reset($mounts)->getMountPoint().$internalPath;
				return \OC\Files\Filesystem::resolvePath($fullPath);
			}
		}
		return array(null, null);
	}

	/**
	 * Get permissions for a shared file specified by path
	 * @param string $path
	 * @return int
	 */
	public function getPermissionsByPath($path) {
		$shares = $this->getByPath($path);
		$permissions = $this->getPermissions($shares);
		if (!empty($permissions)) {
			return reset($permissions);
		}
		return 0;
	}

	/**
	 * Get permissions for a shared file specified by file id
	 * @param int $fileId
	 * @return int
	 */
	public function getPermissionsById($fileId) {
		$shares = $this->getById($fileId);
		$permissions = $this->getPermissions($shares);
		if (!empty($permissions)) {
			return reset($permissions);
		}
		return 0;
	}

	/**
	 * Get all permissions of an array of shares
	 * @param \OCA\Files\Share\FileShare[] $shares
	 * @return array With file ids as keys and permissions as values
	 */
	protected function getPermissions(array $shares) {
		$files = array();
		if (!empty($shares)) {
			foreach ($shares as $share) {
				$fileId = $share->getItemSource();
				if (!isset($files[$fileId])) {
					$files[$fileId] = $share->getPermissions();
				} else {
					// Combine permissions for duplicate shared files
					$files[$fileId] |= $share->getPermissions();
				}
			}
		}
		return $files;
	}

	/**
	 * Get all shared parent folders
	 * @param int $fileId
	 * @return \OCA\Files\Share\FileShare[]
	 */
	protected function getParentFolders($fileId) {
		$shares = array();
		$folderShareBackend = $this->shareManager->getShareBackend($this->folderItemType);
		if ($folderShareBackend) {
			$filter = array(
				'shareWith' => $this->uid,
				'isShareWithUser' => true,
			);
			while ($fileId !== -1) {
				$filter['itemSource'] = $fileId;
				$folderShares = $this->shareManager->getShares($this->folderItemType, $filter);
				$shares = array_merge($shares, $folderShares);
				$fileId = $folderShareBackend->getParentFolderId($fileId);
			}
		}
		return $shares;
	}

}