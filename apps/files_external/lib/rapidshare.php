<?php

/**
 * ownCloud
 *
 * @author Philipp Kapfer
 * @copyright 2013 Philipp Kapfer philipp.kapfer@gmx.at
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

namespace OC\Files\Storage;

require_once 'rapidshare_api.php';

class RapidShare extends \OC\Files\Storage\Common {

	private $rsapi;
	private $root;
	private $user;
	private $password;
	private $folderIds;

	public function __construct($params) {
		if (isset($params['user']) && isset($params['password'])) {
			$this->rsapi = new \RapidShareAPI($params['user'], $params['password']);
			$this->root = \OC\Files\Filesystem::normalizePath(isset($params['root']) ? $params['root'] : '');
			$this->user = $params['user'];
			$this->password = $params['password'];

			// Ensure that given root folder exists
			if (!$this->is_dir('')) {
				$this->mkdir('');
			}
		} else {
			throw new \Exception('Creating OC_Filestorage_RapidShare storage failed');
		}
	}

	public function getId(){
		return 'rapidshare::' . $this->user . $this->root;
	}

	public function filetype($path) {
		$path = $this->makeAbsolute($path);
		if ($path == '' || $path == '/' || $this->getRealFolder($path) !== false) {
			return 'dir';
		} else {
			return 'file';
		}
	}

	public function mkdir($path) {
		return $this->createDirectory($path);
	}

	private function createDirectory($path, $isAbsolute=false) {
		if (!$isAbsolute) {
			$path = $this->makeAbsolute($path);
		}

		if ($this->getRealFolder($path) !== false) {
			return false;
		}

		$normalizedPath = \OC\Files\Filesystem::normalizePath($path);
		$folderName = basename($normalizedPath);
		$parentPath = \OC\Files\Filesystem::normalizePath(dirname($normalizedPath));

		$parentId = $this->getRealFolder($parentPath);
		if ($parentId === false) {
			if (!$this->createDirectory($parentPath, true)) {
				return false;
			}
		}

		try {
			$folderId = $this->rsapi->addRealFolder($folderName, $parentId);
			$this->rsapi->clearCache(\RapidShareAPI::Cache_Folders);
		}
		catch (\Exception $e) {
			\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
			$folderId = 0;
		}

		if ($folderId > 0) {
			$this->folderIds[$normalizedPath] = array('id' => $folderId, 'parent' => $parentId);
			return true;
		}

		return false;
	}

	public function rmdir($path) {
		$path = $this->makeAbsolute($path);
		$folderId = $this->getRealFolder($path);
		if ($folderId !== false) {
			try {
				$result = $this->rsapi->delRealFolder($folderId);
			} catch (\Exception $e) {
				\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
				return false;
			}

			if ($result === true) {
				$this->rsapi->clearCache(\RapidShareAPI::Cache_Folders);
				unset($this->folderIds[\OC\Files\Filesystem::normalizePath($path)]);
			}
			return $result;
		}
		return false;
	}

	public function opendir($path) {
		$path = $this->makeAbsolute($path);
		$folderId = $this->getRealFolder($path);
		if ($folderId !== false) {
			try {
				$fileList = $this->rsapi->listFiles($folderId);
			} catch (\Exception $e) {
				\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
				return false;
			}

			$files = array();
			foreach ($this->folderIds as $folder=>$ids) {
				if ($ids['parent'] === $folderId) {
					$files[] = basename($folder);
				}
			}
			foreach ($fileList as $file) {
				$files[] = $file['name'];
			}

			\OC\Files\Stream\Dir::register('rapidshare' . $path, $files);
			return opendir('fakedir://rapidshare' . $path);
		}
		return false;
	}

	public function stat($path) {
		if ($this->is_dir($path)) {
			$path = $this->makeAbsolute($path);

			$folderId = $this->getRealFolder($path);
			if ($folderId === false) {
				return false;
			}

			try {
				$files = $this->rsapi->listFiles($folderId);
			} catch (\Exception $e) {
				\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
				return false;
			}

			$stat['size'] = 0;
			$stat['atime'] = 0;
			$stat['mtime'] = 0;
			if (!empty($files)) {
				$stat['ctime'] = PHP_INT_MAX;

				foreach ($files as $file) {
					$stat['size'] += $file['bytes'];
					$stat['atime'] = max($stat['atime'], $file['accessed']);
					$stat['mtime'] = max($stat['mtime'], $file['modified']);
					$stat['ctime'] = min($stat['ctime'], $file['created']);
				}
			}
			else {
				$stat['ctime'] = 0;
			}
			return $stat;
		}
		else {
			$path = $this->makeAbsolute($path);

			$file = $this->getFileInfo($path);
			$stat['size'] = $file['bytes'];
			$stat['atime'] = $file['accessed'];
			$stat['mtime'] = $file['modified'];
			$stat['ctime'] = $file['created'];
			return $stat;
		}
	}

	public function isReadable($path) {
		return $this->file_exists($path);
	}

	public function isUpdatable($path) {
		return $this->file_exists($path);
	}

	public function hasUpdated($path, $time) {
		if ($this->is_dir($path)) {
			$mapNameFunc = function($item) {
				return $item['name'];
			};
			$filterFoldersFunc = function($item) {
				return $item['mimetype'] === 'httpd/unix-directory';
			};

			$cache = $this->getCache();
			$subfolderCache = array_map($mapNameFunc, array_filter($cache->getFolderContents($path), $filterFoldersFunc));
			$subfolders = array_map($mapNameFunc, $this->getSubfolders($this->makeAbsolute($path)));

			$folderDiff = array_merge(array_diff($subfolderCache, $subfolders), array_diff($subfolders, $subfolderCache));
			if (!empty($folderDiff)) {
				return true;
			}
		}

		$filemtime = $this->filemtime($path);
		if ($filemtime === 0) {
			return true;	// force refreshing filesystem cache for empty folders
		}
		return $filemtime > $time;
	}

	public function file_exists($path) {
		$type = $this->filetype($path);
		if ($type === 'dir') {
			return true;
		}

		$path = $this->makeAbsolute($path);
		return $this->getFileInfo($path) !== false;
	}

	public function unlink($path) {
		if ($this->is_dir($path)) {
			return $this->rmdir($path);
		}

		$path = $this->makeAbsolute($path);
		$file = $this->getFileInfo($path);
		if ($file === false) {
			return false;
		}

		try {
			$this->rsapi->clearCache(\RapidShareAPI::Cache_Files, $file['parent']);
			return $this->rsapi->deleteFiles($file['id']);
		} catch (\Exception $e) {
			\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
			return false;
		}
	}

	public function rename($oldPath, $newPath) {
		$newPath = \OC\Files\Filesystem::normalizePath($this->makeAbsolute($newPath));
		if ($this->is_dir($oldPath)) {
			$oldPath = \OC\Files\Filesystem::normalizePath($this->makeAbsolute($oldPath));
			return $this->renameFolder($oldPath, $newPath);
		}

		$oldPath = \OC\Files\Filesystem::normalizePath($this->makeAbsolute($oldPath));
		return $this->renameFile($oldPath, $newPath);
	}

	public function fopen($path, $mode) {
		if (!$this->is_file($path) || ($mode[0] === 'r' && !$this->file_exists($path))) {
			return false;
		}

		$path = $this->makeAbsolute($path);
		$file = $this->getFileInfo($path);

		if ($file === false) {
			$folderId = $this->getRealFolder(\OC\Files\Filesystem::normalizePath(dirname($path)));
			if ($folderId === false) {
				return false;
			}

			$fileHandle = $path . '?' . $folderId;
			try {
				$server = $this->rsapi->nextUploadServer();
			} catch (\Exception $e) {
				\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
				return false;
			}
			$this->rsapi->clearCache(\RapidShareAPI::Cache_Files, $folderId);
		}
		else {
			$fileHandle = $file['id'] . '?' . $file['bytes'] . '#' . $file['name'];
			$server = $file['server'];
			$this->rsapi->clearCache(\RapidShareAPI::Cache_Files, $file['parent']);
		}

		return $this->rsapi->llapiOpen($server, $fileHandle, $mode);
	}

	public function free_space($path) {
		// Infinite?
		return \OC\Files\FREE_SPACE_UNKNOWN;
	}

	public function touch($path, $mtime = null) {
		if ($mtime !== null && $mtime !== time()) {
			return false;
		}

		$fileExists = $this->file_exists($path);
		$fp = $this->fopen($path, 'r');
		if ($fp === false) {
			return false;
		}

		$result = true;
		if ($fileExists) {
			$result = fread($fp, 1);
		}
		fclose($fp);

		$file = $this->getFileInfo($path);
		$this->rsapi->clearCache(\RapidShareAPI::Cache_Files, $file['parent']);
		return $result !== false;
	}

	private function makeAbsolute($path) {
		if (strlen($path) > 0 and ($path[0] === '/' || $path[0] === '\\')) {
			return $this->root . $path;
		} elseif (strlen($path) > 0) {
			return $this->root . '/' . $path;
		} else {
			return $this->root;
		}
	}

	private function getRealFolder($path) {
		$this->buildFolderList();

		if ($path == '' || $path == '/') {
			return '0';
		} else {
			$normalizedPath = \OC\Files\Filesystem::normalizePath($path);

			if (array_key_exists($normalizedPath, $this->folderIds)) {
				return $this->folderIds[$normalizedPath]['id'];
			}
			return false;
		}
	}

	private function getSubfolders($path) {
		$this->buildFolderList();

		$keys = preg_grep('#^' . preg_quote($path . '/', '#') . '[^/]+$#', array_keys($this->folderIds));
		$folders = array();
		foreach ($keys as $key) {
			$folders[] = array_merge(array('name' => basename($key)), $this->folderIds[$key]);
		}
		return $folders;
	}

	private function buildFolderList() {
		if (empty($this->folderIds)) {
			try {
				$folders = $this->rsapi->listRealFolders();
			} catch (\Exception $e) {
				\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
				$folders = array();
			}

			$this->folderIds = array();
			$this->folderIds['/'] = array('id' => '0', 'parent' => null);
			$this->buildSubfolderList($folders, '', '0');
		}
	}

	private function buildSubfolderList($folderList, $folder, $id) {
		foreach ($folderList as $item) {
			if ($item['parent'] === $id) {
				$folderPath = $folder . '/' . $item['name'];
				$this->folderIds[$folderPath] = array('id' => $item['id'], 'parent' => $id);
				$this->buildSubfolderList($folderList, $folderPath, $item['id']);
			}
		}
	}

	private function getFileInfo($path) {
		$parentId = $this->getRealFolder(\OC\Files\Filesystem::normalizePath(dirname($path)));
		if ($parentId === false) {
			return false;
		}

		try {
			$fileList = $this->rsapi->listFiles($parentId);
		} catch (\Exception $e) {
			\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
			return false;
		}

		foreach ($fileList as $item) {
			if ($item['name'] === basename($path)) {
				$file = $item;
				break;
			}
		}

		if (!isset($file)) {
			return false;
		}
		$file['parent'] = $parentId;
		return $file;
	}

	private function renameFile($oldPath, $newPath) {
		$file = $this->getFileInfo($oldPath);

		if (dirname($oldPath) !== dirname($newPath)) {
			$newParent = $this->getRealFolder(\OC\Files\Filesystem::normalizePath(dirname($newPath)));
			if ($file === false || $newParent === false) {
				return false;
			}

			try {
				if (!$this->rsapi->moveFilesToRealFolder($file['id'], $newParent)) {
					return false;
				}
			} catch (\Exception $e) {
				\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
				return false;
			}
		}

		if (basename($oldPath) !== basename($newPath)) {
			try {
				$this->rsapi->renameFile($file['id'], basename($newPath));
			} catch (\Exception $e) {
				\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
				return false;
			}
		}

		$this->rsapi->clearCache(\RapidShareAPI::Cache_Files, $file['parent']);
		return true;
	}

	private function renameFolder($oldPath, $newPath) {
		$folderId = $this->getRealFolder($oldPath);
		if ($folderId === false || $this->getRealFolder($newPath) !== false) {
			return false;
		}

		if (basename($oldPath) === basename($newPath)) {
			$relativeParent = substr(\OC\Files\Filesystem::normalizePath(dirname($newPath)), strlen($this->root));
			if (!$this->file_exists($relativeParent) && !$this->mkdir($relativeParent)) {
				return false;
			}
			$newParent = $this->getRealFolder(\OC\Files\Filesystem::normalizePath(dirname($newPath)));

			try {
				$result = $this->rsapi->moveRealFolder($folderId, $newParent);
			} catch (\Exception $e) {
				\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
				return false;
			}

			if ($result === true) {
				$this->rsapi->clearCache(\RapidShareAPI::Cache_Folders);
				$this->folderIds[\OC\Files\Filesystem::normalizePath($newPath)] = $folderId;
				unset($this->folderIds[\OC\Files\Filesystem::normalizePath($oldPath)]);
			}
			return $result;
		} else {
			if (!$this->mkdir(substr($newPath, strlen($this->root)))) {
				return false;
			}
			$newFolderId = $this->getRealFolder($newPath);

			try {
				$files = $this->rsapi->listFiles($folderId);
				if (!empty($files)) {
					$fileIds = array();
					foreach ($files as $file) {
						$fileIds[] = $file['id'];
					}
					if (!$this->rsapi->moveFilesToRealFolder($fileIds, $newFolderId)) {
						return false;
					}
				}
			} catch (\Exception $e) {
				\OCP\Util::writeLog('files_external', $e->getMessage(), \OCP\Util::ERROR);
				return false;
			}

			$this->rsapi->clearCache(\RapidShareAPI::Cache_Files, $folderId);
			return $this->rmdir(substr($oldPath, strlen($this->root)));
		}
	}

}