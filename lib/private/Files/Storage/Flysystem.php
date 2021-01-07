<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\Files\Storage;

use Icewind\Streams\CallbackWrapper;
use Icewind\Streams\IteratorDirectory;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemAdapter;
use League\Flysystem\FilesystemException;
use League\Flysystem\Plugin\GetWithMetadata;

/**
 * Generic adapter between flysystem adapters and owncloud's storage system
 *
 * To use: subclass and call $this->buildFlysystem with the flysystem adapter of choice
 */
abstract class Flysystem extends Common {
	/**
	 * @var Filesystem
	 */
	protected $flysystem;

	/**
	 * @var string
	 */
	protected $root = '';

	/**
	 * Initialize the storage backend with a flyssytem adapter
	 *
	 * @param FilesystemAdapter $adapter
	 */
	protected function buildFlySystem(FilesystemAdapter $adapter) {
		$this->flysystem = new Filesystem($adapter);
	}

	protected function buildPath($path) {
		$fullPath = \OC\Files\Filesystem::normalizePath($this->root . '/' . $path);
		return \ltrim($fullPath, '/');
	}

	/**
	 * {@inheritdoc}
	 */
	public function file_get_contents($path) {
		return $this->flysystem->read($this->buildPath($path));
	}

	/**
	 * {@inheritdoc}
	 */
	public function file_put_contents($path, $data) {
		$this->flysystem->write($this->buildPath($path), $data);
	}

	/**
	 * {@inheritdoc}
	 */
	public function file_exists($path) {
		return $this->flysystem->fileExists($this->buildPath($path));
	}

	/**
	 * {@inheritdoc}
	 */
	public function unlink($path) {
		if ($this->is_dir($path)) {
			return $this->rmdir($path);
		}
		try {
			$this->flysystem->delete($this->buildPath($path));
		} catch (FilesystemException $e) {
			return false;
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function rename($source, $target) {
		if ($this->file_exists($target)) {
			$this->unlink($target);
		}
		$this->flysystem->move($this->buildPath($source), $this->buildPath($target));
	}

	/**
	 * {@inheritdoc}
	 */
	public function copy($source, $target) {
		if ($this->file_exists($target)) {
			$this->unlink($target);
		}
		$this->flysystem->copy($this->buildPath($source), $this->buildPath($target));
	}

	/**
	 * {@inheritdoc}
	 */
	public function filesize($path) {
		if ($this->is_dir($path)) {
			return 0;
		} else {
			return $this->flysystem->fileSize($this->buildPath($path));
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function mkdir($path) {
		if ($this->file_exists($path)) {
			return false;
		}
		try {
			$this->flysystem->createDirectory($this->buildPath($path));
			return true;
		} catch (FilesystemException $e) {
			return false;
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function filemtime($path) {
		return $this->flysystem->lastModified($this->buildPath($path));
	}

	/**
	 * {@inheritdoc}
	 */
	public function rmdir($path) {
		try {
			@$this->flysystem->deleteDirectory($this->buildPath($path));
			return true;
		} catch (FilesystemException $e) {
			return false;
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function opendir($path) {
		try {
			$content = $this->flysystem->listContents($this->buildPath($path));
		} catch (FilesystemException $e) {
			return false;
		}
		$names = \array_map(function ($object) {
			return $object['basename'];
		}, $content);
		return IteratorDirectory::wrap($names);
	}

	/**
	 * {@inheritdoc}
	 */
	public function fopen($path, $mode) {
		$fullPath = $this->buildPath($path);
		$useExisting = true;
		switch ($mode) {
			case 'r':
			case 'rb':
				try {
					return $this->flysystem->readStream($fullPath);
				} catch (FilesystemException $e) {
					return false;
				}
			case 'w':
			case 'w+':
			case 'wb':
			case 'wb+':
				$useExisting = false;
				// no break
			case 'a':
			case 'ab':
			case 'r+':
			case 'a+':
			case 'x':
			case 'x+':
			case 'c':
			case 'c+':
				//emulate these
				if ($useExisting and $this->file_exists($path)) {
					if (!$this->isUpdatable($path)) {
						return false;
					}
					$tmpFile = $this->getCachedFile($path);
				} else {
					if (!$this->isCreatable(\dirname($path))) {
						return false;
					}
					$tmpFile = \OCP\Files::tmpFile();
				}
				$source = \fopen($tmpFile, $mode);
				return CallbackWrapper::wrap($source, null, null, function () use ($tmpFile, $fullPath) {
					$this->flysystem->writeStream($fullPath, \fopen($tmpFile, 'r'));
					\unlink($tmpFile);
				});
		}
		return false;
	}

	/**
	 * {@inheritdoc}
	 */
	public function touch($path, $mtime = null) {
		if ($this->file_exists($path)) {
			return false;
		} else {
			$this->file_put_contents($path, '');
			return true;
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function stat($path) {
		$builtPath = $this->buildPath($path);
		return [
			'mtime' => $this->flysystem->lastModified($builtPath),
			'size' => $this->flysystem->fileSize($builtPath),
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function filetype($path) {
		if ($path === '' or $path === '/' or $path === '.') {
			return 'dir';
		}
		try {
			$mimeType = $this->flysystem->mimeType($this->buildPath($path));
		} catch (FilesystemException $e) {
			return false;
		}
		return $mimeType;
	}
}
