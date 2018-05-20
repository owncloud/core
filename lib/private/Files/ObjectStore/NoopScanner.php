<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
use \OC\Files\Cache\Scanner;
use OC\Files\Filesystem;
use OCP\Files\Storage\ILockingStorage;
use OCP\Lock\ILockingProvider;

class NoopScanner extends Scanner {

	public function __construct(\OC\Files\Storage\Storage $storage) {
		parent::__construct($storage);
	}

	/**
	 * scan a single file and store it in the cache
	 *
	 * @param string $file
	 * @param int $reuseExisting
	 * @param int $parentId
	 * @param array|null $cacheData existing data in the cache for the file to be scanned
	 * @return array an array of metadata of the scanned file
	 */
	public function scanFile($file, $reuseExisting = 0, $parentId = -1, $cacheData = null, $lock = true) {
		return [];
	}

	/**
	 * Scan an objectstore object. Since objectstore uses filecache as storage
	 * metadata, scanner will only adjust checksums and calculate oldSize
	 * of file.
	 *
	 * @param string $path
	 * @param bool $recursive
	 * @param int $reuse
	 * @return array with the meta data of the scanned file or folder
	 * @throws \OCP\Lock\LockedException
	 */
	public function scan($path, $recursive = self::SCAN_RECURSIVE, $reuse = -1, $lock = true) {
		if ($lock && $this->storage->instanceOfStorage(ILockingStorage::class)) {
			// Use lock for calculation of filesize
			$this->storage->acquireLock($path, ILockingProvider::LOCK_SHARED, $this->lockingProvider);
		}
		try {
			// Get storage metadata
			$meta = $this->storage->getMetaData($path);

			// Objectstore scanner can only scan objects which are not a partial file nor a blacklisted file
			if ($meta and $meta['mimetype'] !== 'httpd/unix-directory'
					and !self::isPartialFile($path) and !Filesystem::isFileBlacklisted($path)) {

				// Check size difference for the path
				$parent = \dirname($path);
				if ($parent === '.' or $parent === '/') {
					$parent = '';
				}
				$parentCache = $this->cache->get($parent);
				$parentOldSize = $parentCache['size'];
				$parentNewSize = $this->cache->getFolderSize($parentCache['fileid']);
				if (($parentNewSize != -1 || $parentOldSize != -1) && $parentNewSize != $parentOldSize) {
					// Only set oldSize if parent folder size is calculated and
					// there is size difference between parent filecache and folder size calculation based on children size.
					// Otherwise scanner shall not calculate last file size.
					$meta['oldSize'] = $meta['size'] - ($parentNewSize - $parentOldSize);
				}

				// Add checksum if available
				if (!empty($meta['checksum'])) {
					$this->cache->put(
						$path,
						['checksum' => $meta['checksum']]
					);
				}
			}
		} finally {
			if ($lock && $this->storage->instanceOfStorage(ILockingStorage::class)) {
				$this->storage->releaseLock($path, ILockingProvider::LOCK_SHARED, $this->lockingProvider);
			}
		}

		return $meta;
	}

	/**
	 * scan all the files and folders in a folder
	 *
	 * @param string $path
	 * @param bool $recursive
	 * @param int $reuse
	 * @param array $folderData existing cache data for the folder to be scanned
	 * @return int the size of the scanned folder or -1 if the size is unknown at this stage
	 */
	protected function scanChildren($path, $recursive = self::SCAN_RECURSIVE, $reuse = -1, $folderData = null, $lock = true) {
		return 0;
	}

	/**
	 * walk over any folders that are not fully scanned yet and scan them
	 */
	public function backgroundScan() {
		//noop
	}
}
