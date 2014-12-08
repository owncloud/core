<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Files\Storage\Wrapper;

/**
 * Emulate filesystem proxies as storage wrapper
 */
class Proxy extends Wrapper {
	private $mountPoint;

	public function __construct($arguments) {
		parent::__construct($arguments);
		$this->mountPoint = $arguments['mountpoint'];
	}

	private function runPreProxies($operation, $path, &$data = null) {
		$absPath = $this->mountPoint . $path;
		\OC_FileProxy::runPreProxies($operation, $absPath, $data);
	}

	private function runPostProxies($operation, $path, $result) {
		$absPath = $this->mountPoint . $path;
		return \OC_FileProxy::runPostProxies($operation, $absPath, $result);
	}

	/**
	 * see http://php.net/manual/en/function.mkdir.php
	 *
	 * @param string $path
	 * @return bool
	 */
	public function mkdir($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->mkdir($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.rmdir.php
	 *
	 * @param string $path
	 * @return bool
	 */
	public function rmdir($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->rmdir($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.opendir.php
	 *
	 * @param string $path
	 * @return resource
	 */
	public function opendir($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->opendir($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.is_dir.php
	 *
	 * @param string $path
	 * @return bool
	 */
	public function is_dir($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->is_dir($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.is_file.php
	 *
	 * @param string $path
	 * @return bool
	 */
	public function is_file($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->is_file($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.stat.php
	 * only the following keys are required in the result: size and mtime
	 *
	 * @param string $path
	 * @return array
	 */
	public function stat($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->stat($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.filetype.php
	 *
	 * @param string $path
	 * @return bool
	 */
	public function filetype($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->filetype($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.filesize.php
	 * The result for filesize when called on a folder is required to be 0
	 *
	 * @param string $path
	 * @return int
	 */
	public function filesize($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->filesize($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * check if a file can be created in $path
	 *
	 * @param string $path
	 * @return bool
	 */
	public function isCreatable($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->isCreatable($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * check if a file can be read
	 *
	 * @param string $path
	 * @return bool
	 */
	public function isReadable($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->isReadable($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * check if a file can be written to
	 *
	 * @param string $path
	 * @return bool
	 */
	public function isUpdatable($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->isUpdatable($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * check if a file can be deleted
	 *
	 * @param string $path
	 * @return bool
	 */
	public function isDeletable($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->isDeletable($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * check if a file can be shared
	 *
	 * @param string $path
	 * @return bool
	 */
	public function isSharable($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->isSharable($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * get the full permissions of a path.
	 * Should return a combination of the PERMISSION_ constants defined in lib/public/constants.php
	 *
	 * @param string $path
	 * @return int
	 */
	public function getPermissions($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->getPermissions($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.file_exists.php
	 *
	 * @param string $path
	 * @return bool
	 */
	public function file_exists($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->file_exists($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.filemtime.php
	 *
	 * @param string $path
	 * @return int
	 */
	public function filemtime($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->filemtime($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.file_get_contents.php
	 *
	 * @param string $path
	 * @return string
	 */
	public function file_get_contents($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->file_get_contents($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.file_put_contents.php
	 *
	 * @param string $path
	 * @param string $data
	 * @return bool
	 */
	public function file_put_contents($path, $data) {
		$this->runPreProxies(__FUNCTION__, $path, $data);
		$result = $this->storage->file_put_contents($path, $data);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.unlink.php
	 *
	 * @param string $path
	 * @return bool
	 */
	public function unlink($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->unlink($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.rename.php
	 *
	 * @param string $path1
	 * @param string $path2
	 * @return bool
	 */
	public function rename($path1, $path2) {
		$this->runPreProxies(__FUNCTION__, $path1, $path2);
		$result = $this->storage->rename($path1, $path2);
		return $this->runPostProxies(__FUNCTION__, $path1, $result);
	}

	/**
	 * see http://php.net/manual/en/function.copy.php
	 *
	 * @param string $path1
	 * @param string $path2
	 * @return bool
	 */
	public function copy($path1, $path2) {
		$this->runPreProxies(__FUNCTION__, $path1, $path2);
		$result = $this->storage->copy($path1, $path2);
		return $this->runPostProxies(__FUNCTION__, $path1, $result);
	}

	/**
	 * see http://php.net/manual/en/function.fopen.php
	 *
	 * @param string $path
	 * @param string $mode
	 * @return resource
	 */
	public function fopen($path, $mode) {
		$this->runPreProxies(__FUNCTION__, $path, $mode);
		$result = $this->storage->fopen($path, $mode);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * get the mimetype for a file or folder
	 * The mimetype for a folder is required to be "httpd/unix-directory"
	 *
	 * @param string $path
	 * @return string
	 */
	public function getMimeType($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->getMimeType($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.free_space.php
	 *
	 * @param string $path
	 * @return int
	 */
	public function free_space($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->free_space($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * see http://php.net/manual/en/function.touch.php
	 * If the backend does not support the operation, false should be returned
	 *
	 * @param string $path
	 * @param int $mtime
	 * @return bool
	 */
	public function touch($path, $mtime = null) {
		$this->runPreProxies(__FUNCTION__, $path, $mtime);
		$result = $this->storage->touch($path, $mtime);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * get the path to a local version of the file.
	 * The local version of the file can be temporary and doesn't have to be persistent across requests
	 *
	 * @param string $path
	 * @return string
	 */
	public function getLocalFile($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->getLocalFile($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * get the path to a local version of the folder.
	 * The local version of the folder can be temporary and doesn't have to be persistent across requests
	 *
	 * @param string $path
	 * @return string
	 */
	public function getLocalFolder($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->getLocalFolder($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * check if a file or folder has been updated since $time
	 *
	 * @param string $path
	 * @param int $time
	 * @return bool
	 *
	 * hasUpdated for folders should return at least true if a file inside the folder is add, removed or renamed.
	 * returning true for other changes in the folder is optional
	 */
	public function hasUpdated($path, $time) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->hasUpdated($path, $time);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}

	/**
	 * get the ETag for a file or folder
	 *
	 * @param string $path
	 * @return string
	 */
	public function getETag($path) {
		$this->runPreProxies(__FUNCTION__, $path);
		$result = $this->storage->getETag($path);
		return $this->runPostProxies(__FUNCTION__, $path, $result);
	}
}
