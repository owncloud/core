<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2011-2013 Michael Gapczynski mtgap@owncloud.com
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

namespace OC\Files\Storage;

use OC\Files\Cache\SharedCache;
use OC\Files\Cache\SharedPermissions;
use OC\Files\Cache\SharedWatcher;
use OCA\Files\Share\FileShareFetcher;

/**
 * Convert target path to source path and pass the function call to the correct storage provider
 */
class Shared extends Common {

	private $fetcher;
	private $cache;
	private $permissionsCache;
	private $watcher;

	/**
	 * The constructor
	 * @param array $params Array with a FileShareFetcher
	 */
	public function __construct($params) {
		$this->fetcher = $params['fetcher'];
	}

	/**
	 * Mount this shared storage, called by the hook setup in files_sharing/appinfo/app.php
	 * @param array $params
	 */
	public static function setup($params) {
		if (isset($params['user']) && isset($params['user_dir'])) {
			$shareManager = \OCP\Share::getShareManager();
			$fetcher = new FileShareFetcher($shareManager, \OC_Group::getManager(),
				$params['user']
			);
			\OC\Files\Filesystem::mount('\OC\Files\Storage\Shared', array('fetcher' => $fetcher),
				$params['user_dir'].'/Shared/'
			);
		}
	}

	public function getId() {
		return 'shared';
	}

	public function mkdir($path) {
		if ($path === '' || !$this->isCreatable(dirname($path))) {
			return false;
		} else {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->mkdir($internalPath);
			}
		}
		return false;
	}

	public function rmdir($path) {
		if ($this->isDeletable($path)) {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->rmdir($internalPath);
			}
		}
		return false;
	}

	public function opendir($path) {
		if ($path === '') {
			$files = array();
			$shares = $this->fetcher->getAll();
			foreach ($shares as $share) {
				$fileId = $share->getItemSource();
				if (!isset($files[$fileId])) {
					$files[$fileId] = basename($share->getItemTarget());
				}
			}
			$files = array_values($files);
			\OC\Files\Stream\Dir::register('shared', $files);
			return opendir('fakedir://shared');
		} else {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->opendir($internalPath);
			}
		}
		return false;
	}

	public function is_dir($path) {
		if ($path === '') {
			return true;
		} else {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->is_dir($internalPath);
			}
		}
		return false;
	}

	public function is_file($path) {
		list($storage, $internalPath) = $this->fetcher->resolvePath($path);
		if ($storage && $internalPath) {
			return $storage->is_file($internalPath);
		}
		return false;
	}

	public function stat($path) {
		if ($path === '') {
			$stat['size'] = $this->filesize($path);
			$stat['mtime'] = $this->filemtime($path);
			return $stat;
		} else {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->mkdir($internalPath);
			}
		}
		return false;
	}

	public function filetype($path) {
		if ($path === '') {
			return 'dir';
		} else {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->filetype($internalPath);
			}
		}
		return false;
	}

	public function filesize($path) {
		if ($path === '' || $this->is_dir($path)) {
			return 0;
		} else {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->filesize($internalPath);
			}
		}
		return false;
	}

	public function isCreatable($path) {
		if ($path === '') {
			return false;
		}
		return ($this->getPermissions($path) & \OCP\PERMISSION_CREATE);
	}

	public function isReadable($path) {
		return $this->file_exists($path);
	}

	public function isUpdatable($path) {
		if ($path === '') {
			return false;
		}
		return ($this->getPermissions($path) & \OCP\PERMISSION_UPDATE);
	}

	public function isDeletable($path) {
		if ($path === '') {
			return true;
		}
		return ($this->getPermissions($path) & \OCP\PERMISSION_DELETE);
	}

	public function isSharable($path) {
		if ($path === '') {
			return false;
		}
		return ($this->getPermissions($path) & \OCP\PERMISSION_SHARE);
	}

	public function getPermissions($path) {
		$permissions = $this->fetcher->getPermissionsByPath($path);
		if (pathinfo($path, PATHINFO_EXTENSION) === 'part') {
			// All partial files have delete permission
			$permissions |= \OCP\PERMISSION_DELETE;
		}
		return $permissions;
	}

	public function file_exists($path) {
		if ($path === '') {
			return true;
		} else {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->file_exists($internalPath);
			}
		}
		return false;
	}

	public function filemtime($path) {
		$mtime = 0;
		if ($path === '') {
			if ($dh = $this->opendir($path)) {
				while (($filename = readdir($dh)) !== false) {
					$tempmtime = $this->filemtime($filename);
					if ($tempmtime > $mtime) {
						$mtime = $tempmtime;
					}
				}
			}
		} else {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				$mtime = $storage->filemtime($internalPath);
			}
		}
		return $mtime;
	}

	public function file_get_contents($path) {
		list($storage, $internalPath) = $this->fetcher->resolvePath($path);
		if ($storage && $internalPath) {
			$info = array(
				'target' => '/Shared'.$path,
				'source' => $internalPath,
			);
			\OCP\Util::emitHook('\OC\Files\Storage\Shared', 'file_get_contents', $info);
			return $storage->file_get_contents($internalPath);
		}
		return null;
	}

	public function file_put_contents($path, $data) {
		$exists = $this->file_exists($path);
		if ($exists && !$this->isUpdatable($path)) {
			return false;
		}
		if (!$exists && !$this->isCreatable(dirname(path))) {
			return false;
		}
		list($storage, $internalPath) = $this->fetcher->resolvePath($path);
		if ($storage && $internalPath) {
			$info = array(
				'target' => '/Shared'.$path,
				'source' => $internalPath,
			);
			\OCP\Util::emitHook('\OC\Files\Storage\Shared', 'file_put_contents', $info);
			return $storage->file_put_contents($internalPath, $data);
		}
		return false;
	}

	public function unlink($path) {
		// Delete the file if DELETE permission is granted
		if ($this->isDeletable($path)) {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->unlink($internalPath);
			} else if (dirname($path) === '/' || dirname($path) === '.') {
				// Unshare the file from the user if in the root of the Shared folder
				if ($this->is_dir($path)) {
					$itemType = 'folder';
				} else {
					$itemType = 'file';
				}
				$shareManager =\OCP\Share::getShareManager();
				$shares = $this->fetcher->getByPath($path);
				foreach ($shares as $share) {
					$shareManager->unshare($share);
				}
			}
		}
		return false;
	}

	public function rename($path1, $path2) {
		// Check for partial files
		if (pathinfo($path1, PATHINFO_EXTENSION) === 'part') {
			list($storage, $oldInternalPath) = $this->fetcher->resolvePath($path1);
			if ($storage && $oldInternalPath) {
				$newInternalPath = substr($oldInternalPath, 0, -5);
				return $storage->rename($oldInternalPath, $newInternalPath);
			}
		} else {
			// Renaming/moving is only allowed within shared folders
			$pos1 = strpos($path1, '/', 1);
			$pos2 = strpos($path2, '/', 1);
			if ($pos1 !== false && $pos2 !== false) {
				list($storage, $oldInternalPath) = $this->fetcher->resolvePath($path1);
				list( , $newInternalPath) = $this->fetcher->resolvePath(dirname($path2));
				if ($storage && $oldInternalPath && $newInternalPath) {
					$newInternalPath .= '/'.basename($path2);
					if (dirname($path1) === dirname($path2)) {
						// Rename the file if UPDATE permission is granted
						if ($this->isUpdatable($path1)) {
							return $storage->rename($oldInternalPath, $newInternalPath);
						}
					} else {
						// Move the file if DELETE and CREATE permissions are granted
						if ($this->isDeletable($path1) && $this->isCreatable(dirname($path2))) {
							// Get the root shared folder
							$folder1 = substr($path1, 0, $pos1);
							$folder2 = substr($path2, 0, $pos2);
							// Copy and unlink the file if it exists in a different shared folder
							if ($folder1 != $folder2) {
								if ($this->copy($path1, $path2)) {
									return $this->unlink($path1);
								}
							} else {
								return $storage->rename($oldInternalPath, $newInternalPath);
							}
						}
					}
				}
			}
		}
		return false;
	}

	public function copy($path1, $path2) {
		if ($this->isCreatable(dirname($path2))) {
			parent::copy($path1, $path2);
		}
		return false;
	}

	public function fopen($path, $mode) {
		list($storage, $internalPath) = $this->fetcher->resolvePath($path);
		if ($storage && $internalPath) {
			switch ($mode) {
				case 'r+':
				case 'rb+':
				case 'w+':
				case 'wb+':
				case 'x+':
				case 'xb+':
				case 'a+':
				case 'ab+':
				case 'w':
				case 'wb':
				case 'x':
				case 'xb':
				case 'a':
				case 'ab':
					$exists = $this->file_exists($path);
					if ($exists && !$this->isUpdatable($path)) {
						return false;
					}
					if (!$exists && !$this->isCreatable(dirname(path))) {
						return false;
					}
			}
			$info = array(
				'target' => '/Shared'.$path,
				'source' => $internalPath,
				'mode' => $mode,
			);
			\OCP\Util::emitHook('\OC\Files\Storage\Shared', 'fopen', $info);
			return $storage->fopen($internalPath, $mode);
		}
		return false;
	}

	public function getMimeType($path) {
		if ($path === '') {
			return 'httpd/unix-directory';
		} else {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->getMimeType($internalPath);
			}
		}
		return null;
	}

	public function free_space($path) {
		if ($path !== '') {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->free_space($internalPath);
			}
		}
		return \OC\Files\SPACE_UNKNOWN;
	}

	public function getLocalFile($path) {
		if ($path !== '') {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->getLocalFile($internalPath);
			}
		}
		return false;
	}

	public function touch($path, $mtime = null) {
		if ($path !== '') {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->touch($internalPath, $mtime);
			}
		}
		return false;
	}

	public function hasUpdated($path, $time) {
		if ($path !== '') {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->hasUpdated($internalPath, $time);
			}
		}
		return false;
	}

	public function getCache($path = '') {
		if (!isset($this->cache)) {
			$this->cache = new SharedCache($this, $this->fetcher);
		}
		return $this->cache;
	}

	public function getPermissionsCache($path = '') {
		if (!isset($this->permissionsCache)) {
			$this->permissionsCache = new SharedPermissions($this, $this->fetcher);
		}
		return $this->permissionsCache;
	}

	public function getWatcher($path = '') {
		if (!isset($this->watcher)) {
			$this->watcher = new SharedWatcher($this);
		}
		return $this->watcher;
	}

	public function getOwner($path) {
		if ($path !== '') {
			$shares = $this->fetcher->getByPath($path);
			if (!empty($shares)) {
				return reset($shares)->getItemOwner();
			}
		}
		return null;
	}

	public function getETag($path) {
		if ($path === '') {
			return parent::getETag($path);
		} else {
			list($storage, $internalPath) = $this->fetcher->resolvePath($path);
			if ($storage && $internalPath) {
				return $storage->getETag($internalPath);
			}
		}
		return null;
	}

}