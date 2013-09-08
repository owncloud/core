<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Files\Storage;

use OC\Files\Stream\Dir;
use SMB\NotFoundException;
use SMB\Server;

require_once 'files_external/3rdparty/smb/autoload.php';

class SMB extends Common {
	/**
	 * @var \SMB\Share $share
	 */
	private $share;

	/**
	 * @var \SMB\Server $server
	 */
	private $server;

	private $dirCache = array();

	private static $tempFiles = array();

	public function __construct($params) {
		if (isset($params['host']) && isset($params['user']) && isset($params['password']) && isset($params['share'])) {
			$params['share'] = trim($params['share'], '/');
			$this->server = new Server($params['host'], $params['user'], $params['password']);
			$this->share = $this->server->getShare($params['share']);
			$this->root = isset($params['root']) ? $params['root'] : '/';
			if (!$this->root || $this->root[0] != '/') {
				$this->root = '/' . $this->root;
			}
			if (substr($this->root, -1, 1) != '/') {
				$this->root .= '/';
			}
		} else {
			throw new \Exception();
		}
	}

	public function getId() {
		return 'smb::' . $this->server->getUser() . '@' . $this->server->getHost() . '/' . $this->share->getName() . '/' . $this->root;
	}

	/**
	 * @param string $path
	 * @return array[]
	 */
	private function dir($path) {
		$path = trim($path, '/');
		try {
			if (!isset($this->dirCache[$path])) {
				$this->dirCache[$path] = $this->share->dir($path);
			}
			return $this->dirCache[$path];
		} catch (NotFoundException $e) {
			return array();
		}
	}

	private function removeFromCache($path) {
		$path = trim($path, '/');
		if (isset($this->dirCache[$path])) {
			unset($this->dirCache[$path]);
		}
		if (isset($this->dirCache[dirname($path)])) {
			unset($this->dirCache[dirname($path)]);
		}
	}

	public function file_put_contents($path, $data) {
		$path = trim($path, '/');
		$tmpFile = \OCP\Files::tmpFile();
		file_put_contents($tmpFile, $data);
		$this->share->put($tmpFile, $this->root . $path);
		$this->removeFromCache($this->root . $path);
		unlink($tmpFile);
	}

	public function stat($path) {
		$path = trim($path, '/');
		try {
			if (!$path and $this->root == '/') { //mtime doesn't work for shares
				return array('mtime' => $this->shareMTime(), 'size' => 0, 'type' => 'dir');
			} else {
				$parent = dirname($this->root . $path);
				$files = $this->dir($parent);
				if (isset($files[basename($this->root . $path)])) {
					$file = $files[basename($this->root . $path)];
					if (isset($file['time'])) {
						$file['mtime'] = $file['time'];
					}
					return $file;
				} else {
					return false;
				}
			}
		} catch (NotFoundException $e) {
			return false;
		}
	}

	/**
	 * check if a file or folder has been updated since $time
	 *
	 * @param string $path
	 * @param int $time
	 * @return bool
	 */
	public function hasUpdated($path, $time) {
		// there is no reliable way to check this and updating the file/folder takes the same amount of requests as checking the mtime
		return true;
	}

	/**
	 * get the best guess for the modification time of the share
	 */
	private function shareMTime() {
		$files = $this->dir($this->root);
		$lastMtime = 0;
		foreach ($files as $file) {
			if ($file['time'] > $lastMtime) {
				$lastMtime = $file['time'];
			}
		}
		return $lastMtime;
	}

	public function writeBack($tmpFile) {
		if (isset(self::$tempFiles[$tmpFile])) {
			$this->uploadFile($tmpFile, self::$tempFiles[$tmpFile]);
			unlink($tmpFile);
		}
	}

	public function fopen($path, $mode) {
		$path = trim($path, '/');
		$tmpFile = \OCP\Files::tmpFile();
		try {
			$this->share->get($this->root . $path, $tmpFile);
		} catch (NotFoundException $e) {
			if ($mode === 'r' or $mode === 'rb' or $mode === 'rw' or $mode === 'rwb') {
				return false;
			}
		}
		if ($mode === 'r' or $mode === 'rb') {
			return fopen($tmpFile, $mode);
		} else {
			self::$tempFiles[$tmpFile] = $path;
			\OC\Files\Stream\Close::registerCallback($tmpFile, array($this, 'writeBack'));
			return fopen('close://' . $tmpFile, $mode);
		}
	}

	public function rename($source, $target) {
		$this->share->rename($this->root . $source, $this->root . $target);
		$this->removeFromCache($this->root . $source);
		$this->removeFromCache($this->root . $target);
	}

	public function copy($source, $target) {
		$tmpFile = \OCP\Files::tmpFile();
		$this->share->get($this->root . $source, $tmpFile);
		$this->share->put($tmpFile, $this->root . $target);
		unlink($tmpFile);
		$this->removeFromCache($this->root . $target);
	}

	public function file_exists($path) {
		$path = trim($path, '/');
		try {
			$parent = dirname($this->root . $path);
			$files = $this->dir($parent);
			return isset($files[basename($this->root . $path)]);
		} catch (NotFoundException $e) {
			return false;
		}
	}

	public function touch($path, $time = null) {
		if (!is_null($time)) {
			return false;
		}
		if (!file_exists($path)) {
			$parent = trim(dirname($this->root . $path), '/');
			$this->dirCache[$parent][basename($path)] = array('size' => 0, 'mtime' => time(), 'type' => 'file');
			return true;
		} else {
			return false;
		}
	}

	public function uploadFile($path, $target) {
		$this->removeFromCache($this->root . $target);
		$this->share->put($path, $this->root . $target);
	}

	public function getMimeType($path) {
		if ($this->is_dir($path)) {
			return 'httpd/unix-directory';
		}
		if (!$this->file_exists($path)) {
			return false;
		}
		return \OC_Helper::getFileNameMimeType($path);
	}

	public function isReadable($path) {
		return true;
	}

	public function isUpdatable($path) {
		return true;
	}

	public function mkdir($path) {
		$path = trim($path, '/');
		try {
			if (!$this->file_exists($path)) {
				$this->removeFromCache($this->root . $path);
				$this->share->mkdir($this->root . $path);
				return true;
			} else {
				return false;
			}
		} catch (NotFoundException $e) {
			return false;
		}
	}

	public function rmdir($path) {
		$path = trim($path, '/');
		try {
			$content = $this->dir($this->root . $path);
			foreach ($content as $name => $stat) {
				if ($stat['type'] === 'file') {
					$this->unlink($path . '/' . $name);
				} else {
					$this->rmdir($path . '/' . $name);
				}
			}
			$this->share->rmdir($this->root . $path);
			$this->removeFromCache($this->root . $path);
			return true;
		} catch (NotFoundException $e) {
			return false;
		}
	}

	public function unlink($path) {
		$path = trim($path, '/');
		try {
			$this->removeFromCache($this->root . $path);
			$this->share->del($this->root . $path);
		} catch (NotFoundException $e) {
			return false;
		}
	}

	public function filetype($path) {
		$path = trim($path, '/');
		$stat = $this->stat($path);
		if ($stat) {
			return $stat['type'];
		} else {
			return false;
		}
	}

	public function opendir($path) {
		$path = trim($path, '/');
		$files = $this->dir($this->root . $path);
		Dir::register('smb:' . $path, array_keys($files));
		return opendir('fakedir://smb:' . $path);
	}
}
