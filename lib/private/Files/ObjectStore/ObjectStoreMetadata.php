<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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

namespace OC\Files\ObjectStore;

use OCP\Files\Cache\ICache;

/**
 * Metadata cache for objectstorage file objects.
 *
 * ObjectStore uses oc_filecache as storage metadata representation, thus
 * this class serves as filecache (storage metadata caching layer).
 */
class ObjectStoreMetadata extends \OC\Files\Cache\Cache {

	/**
	 * @@var \OC\Files\Cache\CacheEntry
	 */
	private $fileCacheEntry = null;

	/**
	 * @param \OC\Files\Storage\Storage|string $storage
	 */
	public function __construct($storage) {
		parent::__construct($storage);
	}

	/**
	 * @inheritdoc
	 */
	public function get($file) {
		$key = $this->getPathKey($this->getNumericStorageId(), $file);
		if ($this->isFileCacheMatch($key)) {
			return $this->fileCacheEntry;
		}

		// Cache only single objects metadata
		$data = parent::get($file);
		if ($data && $data->getMimeType() !== 'httpd/unix-directory') {
			$this->fileCacheEntry = $data;
		}

		return $data;
	}

	/**
	 * @inheritdoc
	 */
	public function getId($file) {
		$key = $this->getPathKey($this->getNumericStorageId(), $file);
		if ($this->isFileCacheMatch($key)) {
			return $this->fileCacheEntry->getId();
		}
		return parent::getId($file);
	}

	/**
	 * @inheritdoc
	 */
	public function getPathById($id) {
		$key = $this->getIdKey($this->getNumericStorageId(), $id);
		if ($this->isFileCacheMatch($key)) {
			return $this->fileCacheEntry->getPath();
		}
		return parent::getPathById($id);
	}

	/**
	 * @inheritdoc
	 */
	public function getAll() {
		return parent::getAll();
	}

	/**
	 * @inheritdoc
	 */
	public function getFolderContentsById($fileId) {
		return parent::getFolderContentsById($fileId);
	}

	/**
	 * @inheritdoc
	 */
	public function search($pattern) {
		return parent::search($pattern);
	}

	/**
	 * @inheritdoc
	 */
	public function searchByMime($mimetype) {
		return parent::searchByMime($mimetype);
	}

	/**
	 * @inheritdoc
	 */
	public function searchByTag($tag, $userId) {
		return parent::searchByTag($tag, $userId);
	}

	/**
	 * @inheritdoc
	 */
	public function insert($file, array $data) {
		$this->invalidateFileCache();
		return parent::insert($file, $data);
	}

	/**
	 * @inheritdoc
	 */
	public function update($id, array $data) {
		$this->invalidateFileCache();
		parent::update($id, $data);
	}

	/**
	 * @inheritdoc
	 */
	public function remove($file) {
		$this->invalidateFileCache();
		parent::remove($file);
	}

	/**
	 * @inheritdoc
	 */
	public function move($source, $target) {
		$this->invalidateFileCache();
		parent::move($source, $target);
	}

	/**
	 * @inheritdoc
	 */
	public function moveFromCache(ICache $sourceCache, $sourcePath, $targetPath) {
		$this->invalidateFileCache();
		parent::moveFromCache($sourceCache, $sourcePath, $targetPath);
	}

	/**
	 * @inheritdoc
	 */
	public function clear() {
		$this->invalidateFileCache();
		parent::clear();
	}

	/**
	 * Construct unique id key
	 */
	private function getIdKey($storageId, $id) {
		return $storageId.'-id-'.$id;
	}

	/**
	 * Construct unique path key
	 */
	private function getPathKey($storageId, $path) {
		return $storageId.'-path-'.$path;
	}

	/**
	 * Check if there is match between the requested key and
	 * filecache entry
	 */
	private function isFileCacheMatch($key) {
		// Cache only repetitive calls to the same record
		if (!isset($this->fileCacheEntry)) {
			return false;
		}

		$storageId = $this->fileCacheEntry->getStorageId();
		$id = $this->fileCacheEntry->getId();
		$path = $this->fileCacheEntry->getPath();
		if ($key === $this->getIdKey($storageId, $id) ||
			$key === $this->getPathKey($storageId, $path)) {
			return true;
		}

		return false;
	}

	/**
	 * Invalidate cache entry
	 */
	private function invalidateFileCache() {
		unset($this->fileCacheEntry);
	}
}
