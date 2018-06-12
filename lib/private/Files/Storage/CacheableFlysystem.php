<?php
/**
 * @author Hemant Mann <hemant.mann121@gmail.com>
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

use League\Flysystem\FileNotFoundException;
use Icewind\Streams\IteratorDirectory;

/**
 * Generic Cacheable adapter between flysystem adapters and owncloud's storage system
 *
 * To use: subclass and call $this->buildFlysystem with the flysystem adapter of choice
 */
abstract class CacheableFlysystem extends \OCP\Files\Storage\FlysystemStorageAdapter {
	/**
	 * Stores the results in cache for the current request to prevent multiple requests to the API
	 *
	 * @var array
	 */
	protected $cacheContents = [];

	/**
	 * Get the location which will be used as a key in cache
	 * If Storage is not case sensitive then convert the key to lowercase
	 *
	 * @param  string $path Path to file/folder
	 * @return string
	 */
	public function getCacheLocation($path) {
		$location = $this->buildPath($path);
		if ($location === '') {
			$location = '/';
		}
		return $location;
	}

	public function buildPath($path) {
		$location = parent::buildPath($path);
		if ($this->isCaseInsensitiveStorage) {
			$location = \strtolower($location);
		}
		return $location;
	}

	/**
	 * Check if Cache Contains the data for given path, if not then get the data
	 * from flysystem and store it in cache for this request lifetime
	 *
	 * @param  string $path Path to file/folder
	 * @param boolean $overRideCache Whether to fetch the contents from Cache or directly from the API
	 * @return array|boolean
	 */
	public function getFlysystemMetadata($path, $overRideCache = false) {
		$location = $this->getCacheLocation($path);
		if (!isset($this->cacheContents[$location]) || $overRideCache) {
			try {
				$this->cacheContents[$location] = $this->flysystem->getMetadata($location);
			} catch (FileNotFoundException $e) {
				// do not store this info in cache as it might interfere with Upload process
				return false;
			}
		}
		return $this->cacheContents[$location];
	}

	/**
	 * Store the list of files/folders in the cache so that subsequent requests in the
	 * same request life cycle does not call the flysystem API
	 *
	 * @param  array $contents Return value of $this->flysystem->listContents
	 */
	public function updateCache($contents) {
		foreach ($contents as $object) {
			$path = $object['path'];
			$this->cacheContents[$path] = $object;
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function opendir($path) {
		try {
			$location = $this->buildPath($path);
			$content = $this->flysystem->listContents($location);
			$this->updateCache($content);
		} catch (FileNotFoundException $e) {
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
		switch ($mode) {
			case 'r':
			case 'rb':
				return parent::fopen($path, $mode);

			default:
				unset($this->cacheContents[$this->getCacheLocation($path)]);
				return parent::fopen($path, $mode);
		}
		return false;
	}

	/**
	 * {@inheritdoc}
	 */
	public function filesize($path) {
		if ($this->is_dir($path)) {
			return 0;
		} else {
			$info = $this->getFlysystemMetadata($path);
			return $info['size'];
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function filemtime($path) {
		$info = $this->getFlysystemMetadata($path);
		return $info['timestamp'];
	}

	/**
	 * {@inheritdoc}
	 */
	public function stat($path) {
		$info = $this->getFlysystemMetadata($path);
		return [
			'mtime' => $info['timestamp'],
			'size' => $info['size']
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function filetype($path) {
		if ($path === '' or $path === '/' or $path === '.') {
			return 'dir';
		}
		$info = $this->getFlysystemMetadata($path);
		return $info['type'];
	}
}
