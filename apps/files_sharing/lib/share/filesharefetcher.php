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
use OC\Group\Manager;

/**
 * Class to retrieve file shares from the ShareManager
 *
 * These are helper methods used by the shared storage, cache, permissions, etc.
 */
class FileShareFetcher {

	protected $shareManager;
	protected $groupManager;
	protected $uid;
	protected $fileItemType;
	protected $folderItemType;

	/**
	 * The constructor
	 * @param \OC\Share\ShareManager $shareManager
	 * @param \OC\Group\Manager $groupManager
	 * @param string $uid (optional)
	 */
	public function __construct(ShareManager $shareManager, Manager $groupManager, $uid = null) {
		$this->shareManager = $shareManager;
		$this->groupManager = $groupManager;
		$this->setUID($uid);
		$this->fileItemType = 'file';
		$this->folderItemType = 'folder';
	}

	/**
	 * Get the UID of the user to retrieve shares for
	 * @return string | null
	 *
	 * If no UID is set, all file shares can be retrieved
	 *
	 */
	public function getUID() {
		return $this->uid;
	}

	/**
	 * Set the UID of the user to retrieve shares for
	 * @param string | null $uid
	 */
	public function setUID($uid) {
		$this->uid = $uid;
	}

	/**
	 * Get all files shares
	 * @return \OCA\Files\Share\FileShare[]
	 */
	public function getAll() {
		$filter = array();
		$uid = $this->getUID();
		if (isset($uid)) {
			$filter['shareWith'] = $uid;
			$filter['isShareWithUser'] = true;
		}
		$fileShares = $this->shareManager->getShares($this->fileItemType, $filter);
		$folderShares = $this->shareManager->getShares($this->folderItemType, $filter);
		return array_merge($fileShares, $folderShares);
	}

	/**
	 * Get all permissions of all shared files
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
		$uid = $this->getUID();
		if (isset($uid)) {
			return \OCP\Config::getUserValue($uid, 'files_sharing', 'etag');
		}
	}

	/**
	 * Set the ETag of the Shared folder for the user
	 * @param string $etag
	 */
	public function setETag($etag) {
		$uid = $this->getUID();
		if (isset($uid)) {
			\OCP\Config::setUserValue($uid, 'files_sharing', 'etag', $etag);
		}
	}

	/**
	 * Get all files shares specified by target path for the user
	 * @param string $path
	 * @return \OCA\Files\Share\FileShare[]
	 * 
	 * The returned file shares may not be exact shares for the path, but parent folders
	 * Only works if a UID is set
	 * 
	 */
	public function getByPath($path) {
		$shares = array();
		$uid = $this->getUID();
		if (isset($uid)) {
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
			'itemSource' => $fileId,
		);
		$uid = $this->getUID();
		if (isset($uid)) {
			$filter['shareWith'] = $uid;
			$filter['isShareWithUser'] = true;
		}
		$shares = $this->shareManager->getShares($this->fileItemType, $filter);
		if (empty($shares)) {
			// Try folder item type instead
			$shares = $this->shareManager->getShares($this->folderItemType, $filter);
		}
		return array_merge($shares, $this->getParentFolders($fileId));
	}

	/**
	 * Resolve a target path for the user to a storage and internal path
 	 * @param string $path
	 * @return array Consisting of \OC\Files\Storage\Storage and the internal path
	 *
	 * Only works if a UID is set
	 *
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
	 * Get permissions for a shared file specified by target path for the user
	 * @param string $path
	 * @return int
	 *
	 * Only works if a UID is set
	 *
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
	 * Get all UIDs of files shares specified by target path for the user
	 * @param string $path
	 * @return array With UIDs as values
	 *
	 * Only works if a UID is set
	 *
	 */
	public function getUsersSharedWithByPath($path) {
		$shares = $this->getByPath($path);
		return $this->getUsersSharedWith($shares);
	}

	/**
	 * Get all UIDs of files shares specified by file id
	 * @param int $fileId
	 * @return array With UIDs as values
	 */
	public function getUsersSharedWithById($fileId) {
		$shares = $this->getById($fileId);
		return $this->getUsersSharedWith($shares);
	}

	/**
	 * Get all UIDs of an array of shares
	 * @param \OCA\Files\Share\FileShare[] $shares
	 * @return array With UIDs as values
	 */
	public function getUsersSharedWith(array $shares) {
		$uids = array();
		foreach ($shares as $share) {
			$shareTypeId = $share->getShareTypeId();
			if ($shareTypeId === 'user') {
				$uids[] = $share->getShareWith();
			} else if ($shareTypeId === 'group') {
				$group = $this->groupManager->get($share->getShareWith());
				if ($group) {
					foreach ($group->getUsers() as $user) {
						$uids[] = $user->getUID();
					}
				}
			}
		}
		return array_unique($uids);
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
			$uid = $this->getUID();
			if (isset($uid)) {
				$filter['shareWith'] = $uid;
				$filter['isShareWithUser'] = true;
			}
			$fileId = $folderShareBackend->getParentFolderId($fileId);
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