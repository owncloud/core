<?php
/**
 * @author Daniel Jagszent <daniel@jagszent.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OC\Files\Cache;
use OCP\Files\Cache\ICacheEntry;
use OCP\Files\Cache\IWatcher;

/**
 * check the storage backends for updates and change the cache accordingly
 */
class Watcher implements IWatcher {
	protected $watchPolicy = self::CHECK_ONCE;

	protected $checkedPaths = [];

	/**
	 * @var \OC\Files\Storage\Storage $storage
	 */
	protected $storage;

	/**
	 * @var Cache $cache
	 */
	protected $cache;

	/**
	 * @var Scanner $scanner ;
	 */
	protected $scanner;

	/**
	 * @param \OC\Files\Storage\Storage $storage
	 */
	public function __construct(\OC\Files\Storage\Storage $storage) {
		$this->storage = $storage;
		$this->cache = $storage->getCache();
		$this->scanner = $storage->getScanner();
	}

	/**
	 * @param int $policy either \OC\Files\Cache\Watcher::CHECK_NEVER, \OC\Files\Cache\Watcher::CHECK_ONCE, \OC\Files\Cache\Watcher::CHECK_ALWAYS
	 */
	public function setPolicy($policy) {
		$this->watchPolicy = $policy;
	}

	/**
	 * @return int either \OC\Files\Cache\Watcher::CHECK_NEVER, \OC\Files\Cache\Watcher::CHECK_ONCE, \OC\Files\Cache\Watcher::CHECK_ALWAYS
	 */
	public function getPolicy() {
		return $this->watchPolicy;
	}

	/**
	 * check $path for updates and update if needed
	 *
	 * @param string $path
	 * @param ICacheEntry|null $cachedEntry
	 * @return boolean true if path was updated
	 */
	public function checkUpdate($path, $cachedEntry = null) {
		if ($cachedEntry === null) {
			$cachedEntry = $this->cache->get($path);
		}
		if ($this->needsUpdate($path, $cachedEntry)) {
			$this->update($path, $cachedEntry);
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Update the cache for changes to $path
	 *
	 * @param string $path
	 * @param ICacheEntry|bool $cachedData false if there is currently no cached data
	 */
	public function update($path, $cachedData) {
		if ($this->storage->is_dir($path)) {
			$this->scanner->scan($path, Scanner::SCAN_SHALLOW, Scanner::REUSE_ETAG | Scanner::REUSE_SIZE | Scanner::REUSE_ONLY_FOR_FILES);
		} else {
			$this->scanner->scanFile($path);
		}
		if ((isset($cachedData['mimetype'])) && ($cachedData['mimetype'] === 'httpd/unix-directory')) {
			$this->cleanFolder($path);
		}
		if ($this->cache instanceof Cache) {
			$this->cache->correctFolderSize($path);
		}
	}

	/**
	 * Check if the cache for $path needs to be updated
	 *
	 * @param string $path
	 * @param ICacheEntry|bool $cachedData false if there is currently no cached data
	 * @return bool
	 */
	public function needsUpdate($path, $cachedData) {
		if ($this->watchPolicy === self::CHECK_ALWAYS or ($this->watchPolicy === self::CHECK_ONCE and \array_search($path, $this->checkedPaths) === false)) {
			$this->checkedPaths[] = $path;
			if (isset($cachedData['storage_mtime'])) {
				$storageMtime = $cachedData['storage_mtime'];
			} else {
				$storageMtime = 0;
			}
			return $this->storage->hasUpdated($path, $storageMtime);
		}
		return false;
	}

	/**
	 * remove deleted files in $path from the cache
	 *
	 * @param string $path
	 */
	public function cleanFolder($path) {
		$cachedContent = $this->cache->getFolderContents($path);
		foreach ($cachedContent as $entry) {
			if (!$this->storage->file_exists($entry['path'])) {
				$this->cache->remove($entry['path']);
			}
		}
	}
}
