<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace Owncloud\Updater\Utils;

/**
 * Class FilesystemHelper
 *
 * @package Owncloud\Updater\Utils
 */
class FilesystemHelper {
	/**
	 * Wrapper for filemtime function
	 * @param string $path
	 * @return integer
	 */
	public function filemtime($path) {
		return \filemtime($path);
	}

	/**
	 * Wrapper for scandir function.
	 * Filters current and parent directories
	 * @param string $path
	 * @return array
	 */
	public function scandirFiltered($path) {
		$content = $this->scandir($path);
		if (\is_array($content)) {
			return \array_diff($content, ['.', '..']);
		}
		return [];
	}

	/**
	 * Wrapper for scandir function
	 * @param string $path
	 * @return array
	 */
	public function scandir($path) {
		return \scandir($path);
	}

	/**
	 * Wrapper for file_exists function
	 * @param string $path
	 * @return bool
	 */
	public function fileExists($path) {
		return \file_exists($path);
	}

	/**
	 * Wrapper for is_writable function
	 * @param string $path
	 * @return bool
	 */
	public function isWritable($path) {
		return \is_writable($path);
	}

	/**
	 * Wrapper for is_dir function
	 * @param string $path
	 * @return bool
	 */
	public function isDir($path) {
		return \is_dir($path);
	}

	/**
	 * Wrapper for md5_file function
	 * @param string $path
	 * @return string
	 */
	public function md5File($path) {
		return \md5_file($path);
	}

	/**
	 * Wrapper for mkdir
	 * @param string $path
	 * @param bool $isRecursive
	 * @throws \Exception on error
	 */
	public function mkdir($path, $isRecursive = false) {
		if (!\mkdir($path, 0755, $isRecursive)) {
			throw new \Exception("Unable to create $path");
		}
	}

	/**
	 * Copy recursive
	 * @param string $src  - source path
	 * @param string $dest - destination path
	 * @throws \Exception on error
	 */
	public function copyr($src, $dest, $stopOnError = true) {
		if (\is_dir($src)) {
			if (!\is_dir($dest)) {
				try {
					$this->mkdir($dest);
				} catch (\Exception $e) {
					if ($stopOnError) {
						throw $e;
					}
				}
			}
			$files = \scandir($src);
			foreach ($files as $file) {
				if (!\in_array($file, [".", ".."])) {
					$this->copyr("$src/$file", "$dest/$file", $stopOnError);
				}
			}
		} elseif (\file_exists($src)) {
			if (!\copy($src, $dest) && $stopOnError) {
				throw new \Exception("Unable to copy $src to $dest");
			}
		}
	}

	/**
	 * Moves file/directory
	 * @param string $src  - source path
	 * @param string $dest - destination path
	 * @throws \Exception on error
	 */
	public function move($src, $dest) {
		if (!\rename($src, $dest)) {
			throw new \Exception("Unable to move $src to $dest");
		}
	}

	/**
	 * Check permissions recursive
	 * @param string $src  - path to check
	 * @param Collection $collection - object to store incorrect permissions
	 */
	public function checkr($src, $collection) {
		if (!\file_exists($src)) {
			return;
		}
		if (!\is_writable($src)) {
			$collection->addNotWritable($src);
		}
		if (!\is_readable($src)) {
			$collection->addNotReadable($src);
		}
		if (\is_dir($src)) {
			$files = \scandir($src);
			foreach ($files as $file) {
				if (!\in_array($file, [".", ".."])) {
					$this->checkr("$src/$file", $collection);
				}
			}
		}
	}

	/**
	 * @param string $path
	 */
	public function removeIfExists($path) {
		if (!\file_exists($path)) {
			return;
		}

		if (\is_dir($path)) {
			$this->rmdirr($path);
		} else {
			@\unlink($path);
		}
	}

	/**
	 * @param $dir
	 * @return bool
	 */
	public function rmdirr($dir) {
		if (\is_dir($dir)) {
			$files = \scandir($dir);
			foreach ($files as $file) {
				if ($file != "." && $file != "..") {
					$this->rmdirr("$dir/$file");
				}
			}
			@\rmdir($dir);
		} elseif (\file_exists($dir)) {
			@\unlink($dir);
		}
		if (\file_exists($dir)) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 *
	 * @param string $old
	 * @param string $new
	 * @param string $temp
	 * @param string $dirName
	 */
	public function tripleMove($old, $new, $temp, $dirName) {
		if ($this->fileExists($old . '/' . $dirName)) {
			$this->copyr($old . '/' . $dirName, $temp . '/' . $dirName, false);
			$this->rmdirr($old . '/' . $dirName);
		}
		if ($this->fileExists($new . '/' . $dirName)) {
			$this->copyr($new . '/' . $dirName, $old . '/' . $dirName, false);
			$this->rmdirr($new . '/' . $dirName);
		}
	}
}
