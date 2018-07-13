<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\Files_External\Lib\Storage;

use function GuzzleHttp\Psr7\stream_for;
use OCP\Files\Storage\StorageAdapter;
use Psr\Http\Message\StreamInterface;

abstract class StreamWrapper extends StorageAdapter {

	/**
	 * @param string $path
	 * @return string|null
	 */
	abstract public function constructUrl($path);

	public function mkdir($path) {
		return \mkdir($this->constructUrl($path));
	}

	public function rmdir($path) {
		if ($this->is_dir($path) && $this->isDeletable($path)) {
			$dh = $this->opendir($path);
			if (!\is_resource($dh)) {
				return false;
			}
			while (($file = \readdir($dh)) !== false) {
				if ($this->is_dir($path . '/' . $file)) {
					$this->rmdir($path . '/' . $file);
				} else {
					$this->unlink($path . '/' . $file);
				}
			}
			$url = $this->constructUrl($path);
			$success = \rmdir($url);
			\clearstatcache(false, $url);
			return $success;
		} else {
			return false;
		}
	}

	public function opendir($path) {
		return \opendir($this->constructUrl($path));
	}

	public function filetype($path) {
		return @\filetype($this->constructUrl($path));
	}

	public function file_exists($path) {
		return \file_exists($this->constructUrl($path));
	}

	public function unlink($path) {
		$url = $this->constructUrl($path);
		$success = \unlink($url);
		// normally unlink() is supposed to do this implicitly,
		// but doing it anyway just to be sure
		\clearstatcache(false, $url);
		return $success;
	}

	public function fopen($path, $mode) {
		throw new \BadMethodCallException('fopen is no longer allowed to be called');
	}

	public function touch($path, $mtime = null) {
		if ($this->file_exists($path)) {
			if ($mtime === null) {
				$fh = $this->fopen($path, 'a');
				\fwrite($fh, '');
				\fclose($fh);

				return true;
			} else {
				return false; //not supported
			}
		} else {
			$this->file_put_contents($path, '');
			return true;
		}
	}

	/**
	 * @param string $path
	 * @param string $target
	 */
	public function getFile($path, $target) {
		return \copy($this->constructUrl($path), $target);
	}

	/**
	 * @param string $target
	 */
	public function uploadFile($path, $target) {
		return \copy($path, $this->constructUrl($target));
	}

	public function rename($path1, $path2) {
		return \rename($this->constructUrl($path1), $this->constructUrl($path2));
	}

	public function stat($path) {
		return \stat($this->constructUrl($path));
	}
	public function readFile(string $path, array $options = []): StreamInterface {
		return stream_for(\fopen($this->constructUrl($path)));
	}
	public function writeFile(string $path, StreamInterface $stream): int {
		\file_put_contents($this->constructUrl($path), $stream->detach());
		return $stream->getSize();
	}
}
