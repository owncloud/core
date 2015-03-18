<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

/**
 * Class for abstraction of filesystem functions
 * This class won't call any filesystem functions for itself but will pass them to the correct OC_Filestorage object
 * this class should also handle all the file permission related stuff
 *
 * Hooks provided:
 *   read(path)
 *   write(path, &run)
 *   post_write(path)
 *   create(path, &run) (when a file is created, both create and write will be emitted in that order)
 *   post_create(path)
 *   delete(path, &run)
 *   post_delete(path)
 *   rename(oldpath,newpath, &run)
 *   post_rename(oldpath,newpath)
 *   copy(oldpath,newpath, &run) (if the newpath doesn't exists yes, copy, create and write will be emitted in that order)
 *   post_rename(oldpath,newpath)
 *   post_initMountPoints(user, user_dir)
 *
 *   the &run parameter can be set to false to prevent the operation from occurring
 */

namespace OC\Files;

class Filesystem {
	/**
	 * @var \OC\Files\View $defaultInstance
	 */
	static private $defaultInstance;

	/**
	 * @var \OCP\IUser
	 */
	static public $activeUser;

	static public $loaded;

	static private $normalizedPathCache = array();

	/**
	 * classname which used for hooks handling
	 * used as signalclass in OC_Hooks::emit()
	 */
	const CLASSNAME = 'OC_Filesystem';

	/**
	 * signalname emitted before file renaming
	 *
	 * @param string $oldpath
	 * @param string $newpath
	 */
	const signal_rename = 'rename';

	/**
	 * signal emitted after file renaming
	 *
	 * @param string $oldpath
	 * @param string $newpath
	 */
	const signal_post_rename = 'post_rename';

	/**
	 * signal emitted before file/dir creation
	 *
	 * @param string $path
	 * @param bool $run changing this flag to false in hook handler will cancel event
	 */
	const signal_create = 'create';

	/**
	 * signal emitted after file/dir creation
	 *
	 * @param string $path
	 * @param bool $run changing this flag to false in hook handler will cancel event
	 */
	const signal_post_create = 'post_create';

	/**
	 * signal emits before file/dir copy
	 *
	 * @param string $oldpath
	 * @param string $newpath
	 * @param bool $run changing this flag to false in hook handler will cancel event
	 */
	const signal_copy = 'copy';

	/**
	 * signal emits after file/dir copy
	 *
	 * @param string $oldpath
	 * @param string $newpath
	 */
	const signal_post_copy = 'post_copy';

	/**
	 * signal emits before file/dir save
	 *
	 * @param string $path
	 * @param bool $run changing this flag to false in hook handler will cancel event
	 */
	const signal_write = 'write';

	/**
	 * signal emits after file/dir save
	 *
	 * @param string $path
	 */
	const signal_post_write = 'post_write';

	/**
	 * signal emitted before file/dir update
	 *
	 * @param string $path
	 * @param bool $run changing this flag to false in hook handler will cancel event
	 */
	const signal_update = 'update';

	/**
	 * signal emitted after file/dir update
	 *
	 * @param string $path
	 * @param bool $run changing this flag to false in hook handler will cancel event
	 */
	const signal_post_update = 'post_update';

	/**
	 * signal emits when reading file/dir
	 *
	 * @param string $path
	 */
	const signal_read = 'read';

	/**
	 * signal emits when removing file/dir
	 *
	 * @param string $path
	 */
	const signal_delete = 'delete';

	/**
	 * parameters definitions for signals
	 */
	const signal_param_path = 'path';
	const signal_param_oldpath = 'oldpath';
	const signal_param_newpath = 'newpath';

	/**
	 * run - changing this flag to false in hook handler will cancel event
	 */
	const signal_param_run = 'run';

	const signal_create_mount = 'create_mount';
	const signal_delete_mount = 'delete_mount';
	const signal_param_mount_type = 'mounttype';
	const signal_param_users = 'users';

	/**
	 * @param string $wrapperName
	 * @param callable $wrapper
	 */
	public static function addStorageWrapper($wrapperName, $wrapper) {
		$mounts = self::getMountManager()->getAll();
		if (!self::getLoader()->addStorageWrapper($wrapperName, $wrapper, $mounts)) {
			// do not re-wrap if storage with this name already existed
			return;
		}
	}

	/**
	 * Returns the storage factory
	 *
	 * @return \OCP\Files\Storage\IStorageFactory
	 */
	public static function getLoader() {
		/** @var \OC\Files\Node\Root $root */
		$root = \OC::$server->getRootFolder();
		return $root->getStorageLoader();
	}

	/**
	 * Returns the mount manager
	 *
	 * @return \OC\Files\Mount\Manager
	 */
	public static function getMountManager() {
		/** @var \OC\Files\Node\Root $root */
		$root = \OC::$server->getRootFolder();
		return $root->getMountManager();
	}

	/**
	 * get the mountpoint of the storage object for a path
	 * ( note: because a storage is not always mounted inside the fakeroot, the
	 * returned mountpoint is relative to the absolute root of the filesystem
	 * and doesn't take the chroot into account )
	 *
	 * @param string $path
	 * @return string
	 */
	static public function getMountPoint($path) {
		/** @var \OC\Files\Node\Root $root */
		$root = \OC::$server->getRootFolder();
		$mount = $root->getMount($path);
		if ($mount) {
			return $mount->getMountPoint();
		} else {
			return '';
		}
	}

	/**
	 * get a list of all mount points in a directory
	 *
	 * @param string $path
	 * @return string[]
	 */
	static public function getMountPoints($path) {
		/** @var \OC\Files\Node\Root $root */
		$root = \OC::$server->getRootFolder();
		$mounts = $root->getMountsIn($path);
		$result = array();
		foreach ($mounts as $mount) {
			$result[] = $mount->getMountPoint();
		}
		return $result;
	}

	/**
	 * get the storage mounted at $mountPoint
	 *
	 * @param string $mountPoint
	 * @return \OC\Files\Storage\Storage
	 */
	public static function getStorage($mountPoint) {
		/** @var \OC\Files\Node\Root $root */
		$root = \OC::$server->getRootFolder();
		$mount = $root->getMount($mountPoint);
		return $mount->getStorage();
	}

	/**
	 * @param string $id
	 * @return Mount\MountPoint[]
	 */
	public static function getMountByStorageId($id) {
		/** @var \OC\Files\Node\Root $root */
		$root = \OC::$server->getRootFolder();
		return $root->getMountByStorageId($id);
	}

	/**
	 * @param int $id
	 * @return Mount\MountPoint[]
	 */
	public static function getMountByNumericId($id) {
		/** @var \OC\Files\Node\Root $root */
		$root = \OC::$server->getRootFolder();
		return $root->getMountByNumericStorageId($id);
	}

	/**
	 * resolve a path to a storage and internal path
	 *
	 * @param string $path
	 * @return array an array consisting of the storage and the internal path
	 */
	static public function resolvePath($path) {
		/** @var \OC\Files\Node\Root $root */
		$root = \OC::$server->getRootFolder();
		$mount = $root->getMount($path);
		if ($mount) {
			return array($mount->getStorage(), rtrim($mount->getInternalPath($path), '/'));
		} else {
			return array(null, null);
		}
	}

	/**
	 * Initialize system and personal mount points for a user
	 *
	 * @param string $user
	 */
	public static function initMountPoints($user = '') {
		\OC::$server->setupFilesystem($user);
	}

	/**
	 * get the default filesystem view
	 *
	 * @return View
	 */
	static public function getView() {
		if (!self::$defaultInstance) {
			$user = self::$activeUser;
			if ($user) {
				self::$defaultInstance = new View('/' . $user->getUID() . '/files');
			} else {
				self::$defaultInstance = new View();
			}
		}
		return self::$defaultInstance;
	}

	/**
	 * tear down the filesystem, removing all storage providers
	 */
	static public function tearDown() {
		\OC::$server->getFilesystemFactory()->clear(true);
		self::$defaultInstance = null;
	}

	/**
	 * get the relative path of the root data directory for the current user
	 *
	 * @return string
	 *
	 * Returns path like /admin/files
	 */
	static public function getRoot() {
		return self::getView()->getRoot();
	}

	/**
	 * clear all mounts and storage backends
	 */
	public static function clearMounts() {
		\OC::$server->getFilesystemFactory()->clear();
	}

	/**
	 * mount an \OC\Files\Storage\Storage in our virtual filesystem
	 *
	 * @param \OC\Files\Storage\Storage|string $class
	 * @param array $arguments
	 * @param string $mountpoint
	 */
	static public function mount($class, $arguments, $mountpoint) {
		$mount = new Mount\MountPoint($class, $mountpoint, $arguments, self::getLoader());
		self::getMountManager()->addMount($mount);
	}

	/**
	 * return the path to a local version of the file
	 * we need this because we can't know if a file is stored local or not from
	 * outside the filestorage and for some purposes a local file is needed
	 *
	 * @param string $path
	 * @return string
	 */
	static public function getLocalFile($path) {
		return self::getView()->getLocalFile($path);
	}

	/**
	 * @param string $path
	 * @return string
	 */
	static public function getLocalFolder($path) {
		return self::getView()->getLocalFolder($path);
	}

	/**
	 * check if the requested path is valid
	 *
	 * @param string $path
	 * @return bool
	 */
	static public function isValidPath($path) {
		$path = self::normalizePath($path);
		if (!$path || $path[0] !== '/') {
			$path = '/' . $path;
		}
		if (strpos($path, '/../') !== FALSE || strrchr($path, '/') === '/..') {
			return false;
		}
		return true;
	}

	/**
	 * checks if a file is blacklisted for storage in the filesystem
	 * Listens to write and rename hooks
	 *
	 * @param array $data from hook
	 */
	static public function isBlacklisted($data) {
		if (isset($data['path'])) {
			$path = $data['path'];
		} else if (isset($data['newpath'])) {
			$path = $data['newpath'];
		}
		if (isset($path)) {
			if (self::isFileBlacklisted($path)) {
				$data['run'] = false;
			}
		}
	}

	/**
	 * @param string $filename
	 * @return bool
	 */
	static public function isFileBlacklisted($filename) {
		$filename = self::normalizePath($filename);

		$blacklist = \OC_Config::getValue('blacklisted_files', array('.htaccess'));
		$filename = strtolower(basename($filename));
		return in_array($filename, $blacklist);
	}

	/**
	 * check if the directory should be ignored when scanning
	 * NOTE: the special directories . and .. would cause never ending recursion
	 *
	 * @param String $dir
	 * @return boolean
	 */
	static public function isIgnoredDir($dir) {
		if ($dir === '.' || $dir === '..') {
			return true;
		}
		return false;
	}

	/**
	 * following functions are equivalent to their php builtin equivalents for arguments/return values.
	 */
	static public function mkdir($path) {
		return self::getView()->mkdir($path);
	}

	static public function rmdir($path) {
		return self::getView()->rmdir($path);
	}

	static public function opendir($path) {
		return self::getView()->opendir($path);
	}

	static public function readdir($path) {
		return self::getView()->readdir($path);
	}

	static public function is_dir($path) {
		return self::getView()->is_dir($path);
	}

	static public function is_file($path) {
		return self::getView()->is_file($path);
	}

	static public function stat($path) {
		return self::getView()->stat($path);
	}

	static public function filetype($path) {
		return self::getView()->filetype($path);
	}

	static public function filesize($path) {
		return self::getView()->filesize($path);
	}

	static public function readfile($path) {
		return self::getView()->readfile($path);
	}

	static public function isCreatable($path) {
		return self::getView()->isCreatable($path);
	}

	static public function isReadable($path) {
		return self::getView()->isReadable($path);
	}

	static public function isUpdatable($path) {
		return self::getView()->isUpdatable($path);
	}

	static public function isDeletable($path) {
		return self::getView()->isDeletable($path);
	}

	static public function isSharable($path) {
		return self::getView()->isSharable($path);
	}

	static public function file_exists($path) {
		return self::getView()->file_exists($path);
	}

	static public function filemtime($path) {
		return self::getView()->filemtime($path);
	}

	static public function touch($path, $mtime = null) {
		return self::getView()->touch($path, $mtime);
	}

	/**
	 * @return string
	 */
	static public function file_get_contents($path) {
		return self::getView()->file_get_contents($path);
	}

	static public function file_put_contents($path, $data) {
		return self::getView()->file_put_contents($path, $data);
	}

	static public function unlink($path) {
		return self::getView()->unlink($path);
	}

	static public function rename($path1, $path2) {
		return self::getView()->rename($path1, $path2);
	}

	static public function copy($path1, $path2) {
		return self::getView()->copy($path1, $path2);
	}

	static public function fopen($path, $mode) {
		return self::getView()->fopen($path, $mode);
	}

	/**
	 * @return string
	 */
	static public function toTmpFile($path) {
		return self::getView()->toTmpFile($path);
	}

	static public function fromTmpFile($tmpFile, $path) {
		return self::getView()->fromTmpFile($tmpFile, $path);
	}

	static public function getMimeType($path) {
		return self::getView()->getMimeType($path);
	}

	static public function hash($type, $path, $raw = false) {
		return self::getView()->hash($type, $path, $raw);
	}

	static public function free_space($path = '/') {
		return self::getView()->free_space($path);
	}

	static public function search($query) {
		return self::getView()->search($query);
	}

	/**
	 * @param string $query
	 */
	static public function searchByMime($query) {
		return self::getView()->searchByMime($query);
	}

	/**
	 * @param string|int $tag name or tag id
	 * @param string $userId owner of the tags
	 * @return FileInfo[] array or file info
	 */
	static public function searchByTag($tag, $userId) {
		return self::$defaultInstance->searchByTag($tag, $userId);
	}

	/**
	 * check if a file or folder has been updated since $time
	 *
	 * @param string $path
	 * @param int $time
	 * @return bool
	 */
	static public function hasUpdated($path, $time) {
		return self::getView()->hasUpdated($path, $time);
	}

	/**
	 * Fix common problems with a file path
	 *
	 * @param string $path
	 * @param bool $stripTrailingSlash
	 * @param bool $isAbsolutePath
	 * @return string
	 */
	public static function normalizePath($path, $stripTrailingSlash = true, $isAbsolutePath = false) {
		/**
		 * FIXME: This is a workaround for existing classes and files which call
		 *        this function with another type than a valid string. This
		 *        conversion should get removed as soon as all existing
		 *        function calls have been fixed.
		 */
		$path = (string)$path;

		$cacheKey = json_encode([$path, $stripTrailingSlash, $isAbsolutePath]);

		if(isset(self::$normalizedPathCache[$cacheKey])) {
			return self::$normalizedPathCache[$cacheKey];
		}

		if ($path == '') {
			return '/';
		}

		//normalize unicode if possible
		$path = \OC_Util::normalizeUnicode($path);

		//no windows style slashes
		$path = str_replace('\\', '/', $path);

		// When normalizing an absolute path, we need to ensure that the drive-letter
		// is still at the beginning on windows
		$windows_drive_letter = '';
		if ($isAbsolutePath && \OC_Util::runningOnWindows() && preg_match('#^([a-zA-Z])$#', $path[0]) && $path[1] == ':' && $path[2] == '/') {
			$windows_drive_letter = substr($path, 0, 2);
			$path = substr($path, 2);
		}

		//add leading slash
		if ($path[0] !== '/') {
			$path = '/' . $path;
		}

		// remove '/./'
		// ugly, but str_replace() can't replace them all in one go
		// as the replacement itself is part of the search string
		// which will only be found during the next iteration
		while (strpos($path, '/./') !== false) {
			$path = str_replace('/./', '/', $path);
		}
		// remove sequences of slashes
		$path = preg_replace('#/{2,}#', '/', $path);

		//remove trailing slash
		if ($stripTrailingSlash and strlen($path) > 1 and substr($path, -1, 1) === '/') {
			$path = substr($path, 0, -1);
		}

		// remove trailing '/.'
		if (substr($path, -2) == '/.') {
			$path = substr($path, 0, -2);
		}

		$normalizedPath = $windows_drive_letter . $path;
		self::$normalizedPathCache[$cacheKey] = $normalizedPath;

		return $normalizedPath;
	}

	/**
	 * get the filesystem info
	 *
	 * @param string $path
	 * @param boolean $includeMountPoints whether to add mountpoint sizes,
	 * defaults to true
	 * @return \OC\Files\FileInfo
	 */
	public static function getFileInfo($path, $includeMountPoints = true) {
		return self::getView()->getFileInfo($path, $includeMountPoints);
	}

	/**
	 * change file metadata
	 *
	 * @param string $path
	 * @param array $data
	 * @return int
	 *
	 * returns the fileid of the updated file
	 */
	public static function putFileInfo($path, $data) {
		return self::getView()->putFileInfo($path, $data);
	}

	/**
	 * get the content of a directory
	 *
	 * @param string $directory path under datadirectory
	 * @param string $mimetype_filter limit returned content to this mimetype or mimepart
	 * @return \OC\Files\FileInfo[]
	 */
	public static function getDirectoryContent($directory, $mimetype_filter = '') {
		return self::getView()->getDirectoryContent($directory, $mimetype_filter);
	}

	/**
	 * Get the path of a file by id
	 *
	 * Note that the resulting path is not guaranteed to be unique for the id, multiple paths can point to the same file
	 *
	 * @param int $id
	 * @return string
	 */
	public static function getPath($id) {
		return self::getView()->getPath($id);
	}

	/**
	 * Get the owner for a file or folder
	 *
	 * @param string $path
	 * @return string
	 */
	public static function getOwner($path) {
		return self::getView()->getOwner($path);
	}

	/**
	 * get the ETag for a file or folder
	 *
	 * @param string $path
	 * @return string
	 */
	static public function getETag($path) {
		return self::getView()->getETag($path);
	}
}
