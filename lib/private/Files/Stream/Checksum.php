<?php

/**
 * @author Ilja Neumann <ineumann@owncloud.com>
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

namespace OC\Files\Stream;

use Icewind\Streams\Wrapper;
use OC\Cache\CappedMemoryCache;
use OC_Util;

/**
 * Computes the checksum of the wrapped stream. The checksum can be retrieved with
 * getChecksum after the stream is closed.
 *
 *
 * @package OC\Files\Stream
 */
class Checksum extends Wrapper {
	/**
	 * To stepwise compute a hash on a continuous stream
	 * of data a "context" is required which stores the intermediate
	 * hash result while the stream has not finished.
	 *
	 * After the stream ends the hashing contexts needs to be finalized
	 * to compute the final checksum.
	 *
	 * @var  resource[]
	 */
	private $hashingContexts;

	/**
	 * Check if the stream has been read or written from the beginning.
	 * If `fseek` is called, this flag should be false unless the target
	 * position of the beginning of the stream
	 */
	private $fromBeginning = true;
	private $reading = false;

	/** @var CappedMemoryCache Key is path, value is array of checksums */
	private static $checksums;

	public function __construct(array $algos = ['sha1', 'md5', 'adler32']) {
		$this->startHashingContexts($algos);

		if (!self::$checksums) {
			self::$checksums = new CappedMemoryCache();
		}
	}

	/**
	 * @param $source
	 * @param $path
	 * @return resource
	 */
	public static function wrap($source, $path) {
		$context = \stream_context_create([
			'occhecksum' => [
				'source' => $source,
				'path' => $path
			]
		]);

		// need to check the underlying stream's mode
		// The `wrapSource` will use 'r+' by default, so the
		// `stream_open` function might use that mode wrongly.
		$meta = \stream_get_meta_data($source);
		$mode = $meta['mode'] ?? 'r+';
		return Wrapper::wrapSource(
			$source,
			$context,
			'occhecksum',
			self::class,
			$mode
		);
	}

	/**
	 * @param string $path
	 * @param array $options
	 * @return bool
	 */
	public function dir_opendir($path, $options) {
		return true;
	}

	/**
	 * @param string $path
	 * @param string $mode
	 * @param int $options
	 * @param string $opened_path
	 * @return bool
	 */
	public function stream_open($path, $mode, $options, &$opened_path) {
		$context = parent::loadContext('occhecksum');
		$this->setSourceStream($context['source']);

		switch ($mode[0]) {  // check first char of the mode
			case 'r':
			case 'c':
				// "c" mode is write only, but we consider it as read because
				// the content isn't truncated and there could be content after
				// the pointer that should be read in order to compute the checksum
				$this->fromBeginning = true;
				$this->reading = true;
				break;
			case 'w':
			case 'x':
				$this->fromBeginning = true;
				$this->reading = false;
				break;
			case 'a':
				$this->fromBeginning = false;
				$this->reading = true;
				break;
		}

		return true;
	}

	/**
	 * @param int $offset
	 * @param int $whence
	 * @return bool
	 */
	public function stream_seek($offset, $whence = SEEK_SET) {
		$seeked = parent::stream_seek($offset, $whence);
		if ($seeked) {
			$this->fromBeginning = parent::stream_tell() === 0;
			if ($this->fromBeginning) {
				// start new hashing contexts if we've moved to the beginning of the stream
				$this->startHashingContexts();
				// mark the stream as reading because there could be content to read
				// after the pointer even if we're only writing.
				$this->reading = true;
			}
		}
		return $seeked;
	}

	/**
	 * @param int $count
	 * @return string
	 */
	public function stream_read($count) {
		$data = parent::stream_read($count);
		$this->updateHashingContexts($data);

		return $data;
	}

	/**
	 * @param string $data
	 * @return int
	 */
	public function stream_write($data) {
		$this->updateHashingContexts($data);

		return parent::stream_write($data);
	}

	private function updateHashingContexts($data) {
		foreach ($this->hashingContexts as $ctx) {
			\hash_update($ctx, $data);
		}
	}

	/**
	 * Make checksums available for part files and the original file for which part file has been created
	 * @return bool
	 */
	public function stream_close() {
		$currentPath = $this->getPathFromStreamContext();
		$checksum = $this->finalizeHashingContexts();
		if ($this->fromBeginning && (!$this->reading || parent::stream_eof())) {
			// only store the checksum if we've reached the end of the stream from the beginning
			self::$checksums[$currentPath] = $checksum;

			// If current path belongs to part file, save checksum for original file
			// As a result, call to getChecksums for original file (of this part file) will
			// fetch checksum from cache
			$originalFilePath = OC_Util::stripPartialFileExtension($currentPath);
			if ($originalFilePath !== $currentPath) {
				self::$checksums[$originalFilePath] = $checksum;
			}
		}

		return parent::stream_close();
	}

	/**
	 * Start hashing contexts. If no algorithm is provided, the existing ones
	 * will be reinitialized, otherwise the ones provided will be used
	 * @param array|null a list of hashing algorithms or null to use the existing ones
	 * (from a previous `startHashingContexts($algos)` call)
	 */
	private function startHashingContexts($algos = null) {
		if ($algos === null) {
			foreach ($this->hashingContexts as $key => $value) {
				$this->hashingContexts[$key] = \hash_init($key);
			}
		} else {
			$this->hashingContexts = [];
			foreach ($algos as $algo) {
				$this->hashingContexts[$algo] = \hash_init($algo);
			}
		}
	}

	/**
	 * @return array
	 */
	private function finalizeHashingContexts() {
		$hashes = [];

		foreach ($this->hashingContexts as $algo => $ctx) {
			$hashes[$algo] = \hash_final($ctx);
		}

		return $hashes;
	}

	public function dir_closedir() {
		if (!isset($this->source)) {
			return false;
		}
		return parent::dir_closedir();
	}

	/**
	 * @return mixed
	 * @return string
	 */
	private function getPathFromStreamContext() {
		$ctx = \stream_context_get_options($this->context);

		return $ctx['occhecksum']['path'];
	}

	/**
	 * @param $path
	 * @return array
	 */
	public static function getChecksums($path) {
		if (isset(self::$checksums[$path])) {
			return self::$checksums[$path];
		}

		// check the md5($path) in case "part_file_in_storage" is set to false
		// see apps/dav/lib/Connector/Sabre/File.php getPartFileBasePath  (around line 305)
		// strip initial dir, usually "files" from "files/dir1/dir2"
		$pathPieces = \explode('/', $path, 2);
		if (\count($pathPieces) !== 2) {
			return [];
		}

		$pathToCheck = "{$pathPieces[0]}/" . \md5("/{$pathPieces[1]}");
		if (isset(self::$checksums[$pathToCheck])) {
			return self::$checksums[$pathToCheck];
		}

		return [];
	}

	/**
	 * For debugging
	 *
	 * @return CappedMemoryCache
	 */
	public static function getChecksumsForAllPaths() {
		if (!self::$checksums) {
			self::$checksums = new CappedMemoryCache();
		}

		return self::$checksums;
	}

	/**
	 * For tests
	 */
	public static function resetChecksums() {
		self::$checksums = new CappedMemoryCache();
	}
}
