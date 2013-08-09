<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2012-2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OC\Files\Cache;

use OCA\Files\Share\FileShareFetcher;

/**
 * Metadata cache for shared files
 *
 * don't use this class directly if you need to get metadata, use \OC\Files\Filesystem::getFileInfo instead
 */
class SharedCache extends Cache {

	private $storage;
	private $storageId;
	private $numericId;
	private $fetcher;

	/**
	 * The constructor
	 * @param \OC\Files\Storage\Shared $storage
	 * @param \OCA\Files\Share\FileShareFetcher $fetcher
	 */
	public function __construct($storage, FileShareFetcher $fetcher) {
		$this->storage = $storage;
		$this->fetcher = $fetcher;
	}

	/**
	 * Get the source cache of a shared file or folder
	 * @param string $target Shared target file path
	 * @return array Consisting of \OC\Files\Cache\Cache and the internal path
	 */
	protected function getSourceCache($path) {
		list ($storage, $internalPath) = $this->fetcher->resolvePath($path);
		if ($storage && $internalPath) {
			$cache = $storage->getCache();
			$this->storageId = $storage->getId();
			$this->numericId = $cache->getNumericStorageId();
			return array($cache, $internalPath);
		}
		return array(null, null);
	}

	public function getNumericStorageId() {
		if (isset($this->numericId)) {
			return $this->numericId;
		} else {
			return false;
		}
	}

	/**
	 * get the stored metadata of a file or folder
	 *
	 * @param string/int $file
	 * @return array
	 */
	public function get($file) {
		if ($file === '' || $file === -1) {
			$files = array();
			$size = 0;
			$mtime = 0;
			$encrypted = false;
			$unencryptedSize = 0;
			$shares = $this->fetcher->getAll();
			foreach ($shares as $share) {
				$fileId = $share->getItemSource();
				// Ignore duplicate shares
				if (!isset($files[$fileId])) {
					if ($share->getEncrypted()) {
						$encrypted = true;
					}
					if ($share->getMtime() > $mtime) {
						$mtime = $share->getMtime();
					}
					$size += $share->getSize();
					$unencryptedSize += $share->getUnencryptedSize();
					$files[$fileId] = true;
				}
			}
			$etag = $this->fetcher->getETag();
			if (!isset($etag)) {
				$etag = $this->storage->getETag('');
				$this->fetcher->setETag($etag);
			}
			return array(
				'fileid' => -1,
				'storage' => null,
				'path' => 'files/Shared',
				'parent' => -1,
				'name' => 'Shared',
				'mimetype' => 'httpd/unix-directory',
				'mimepart' => 'httpd',
				'size' => $size,
				'mtime' => $mtime,
				'storage_mtime' => $mtime,
				'encrypted' => $encrypted,
				'unencrypted_size' => $unencryptedSize,
				'etag' => $etag,
			);
		} else if (is_string($file)) {
			$shares = $this->fetcher->getByPath($file);
			foreach ($shares as $share) {
				// Check if we have an exact share for this path
				if ($share->getItemTarget() === $file) {
					return $share->getMetadata();
				}
			}
			if (!empty($shares)) {
				list($cache, $internalPath) = $this->getSourceCache($file);
				if ($cache && $internalPath) {
					return $cache->get($internalPath);
				}
			}
		} else {
			$shares = $this->fetcher->getById($file);
			foreach ($shares as $share) {
				// Check if we have an exact share for this id
				if ($share->getItemSource() === $file) {
					return $share->getMetadata();
				}
			}
			if (!empty($shares)) {
				return parent::get($file);
			}
		}
		return false;
	}

	/**
	 * get the metadata of all files stored in $folder
	 *
	 * @param string $folder
	 * @return array
	 */
	public function getFolderContents($folder) {
		$files = array();
		if ($folder === '') {
			$shares = $this->fetcher->getAll();
			foreach ($shares as $share) {
				$fileId = $share->getItemSource();
				// Ignore duplicate shares
				if (!isset($files[$fileId])) {
					$file = $share->getMetadata();
					$file['mimetype'] = $this->getMimetype($file['mimetype']);
					$file['mimepart'] = $this->getMimetype($file['mimepart']);
					if ($file['storage_mtime'] === 0) {
						$file['storage_mtime'] = $file['mtime'];
					}
					$files[$fileId] = $file;
				}
			}
			$files = array_values($files);
		} else {
			list($cache, $internalPath) = $this->getSourceCache($folder);
			if ($cache && $internalPath) {
				$files = $cache->getFolderContents($internalPath);
			}
		}
		return $files;
	}

	/**
	 * store meta data for a file or folder
	 *
	 * @param string $file
	 * @param array $data
	 *
	 * @return int file id
	 */
	public function put($file, array $data) {
		if ($file === '') {
			if (isset($data['etag'])) {
				$this->fetcher->setETag($data['etag']);
			}
		} else {
			list($cache, $internalPath) = $this->getSourceCache($file);
			if ($cache && $internalPath) {
				return $cache->put($internalPath, $data);
			}
		}
		return -1;
	}

	/**
	 * get the file id for a file
	 *
	 * @param string $file
	 * @return int
	 */
	public function getId($file) {
		if ($file === '') {
			return -1;
		}
		$shares = $this->fetcher->getByPath($file);
		foreach ($shares as $share) {
			// Check if we have an exact share for this path
			if ($share->getItemTarget() === $file) {
				return $share->getItemSource();
			}
		}
		list($cache, $internalPath) = $this->getSourceCache($file);
		if ($cache && $internalPath) {
			return $cache->getId($internalPath);
		}
		return -1;
	}

	/**
	 * check if a file is available in the cache
	 *
	 * @param string $file
	 * @return bool
	 */
	public function inCache($file) {
		if ($file === '') {
			return true;
		}
		return parent::inCache($file);
	}

	/**
	 * remove a file or folder from the cache
	 *
	 * @param string $file
	 */
	public function remove($file) {
		list($cache, $internalPath) = $this->getSourceCache($file);
		if ($cache && $internalPath) {
			return $cache->remove($internalPath);
		}
	}

	/**
	 * Move a file or folder in the cache
	 *
	 * @param string $source
	 * @param string $target
	 */
	public function move($source, $target) {
		list($cache, $oldInternalPath) = $this->getSourceCache($source);
		list( , $newInternalPath) = $this->fetcher->resolvePath(dirname($target));
		if ($cache && $oldInternalPath && $newInternalPath) {
			$newInternalPath .= '/'.basename($target);
			$cache->move($oldInternalPath, $newInternalPath);
		}
	}

	/**
	 * remove all entries for files that are stored on the storage from the cache
	 */
	public function clear() {
		// Not a valid action for Shared Cache
	}

	/**
	 * @param string $file
	 *
	 * @return int, Cache::NOT_FOUND, Cache::PARTIAL, Cache::SHALLOW or Cache::COMPLETE
	 */
	public function getStatus($file) {
		if ($file === '') {
			return self::COMPLETE;
		}
		list($cache, $internalPath) = $this->getSourceCache($file);
		if ($cache && $internalPath) {
			return $cache->getStatus($internalPath);
		}
		return self::NOT_FOUND;
	}

	/**
	 * search for files matching $pattern
	 *
	 * @param string $pattern
	 * @return array of file data
	 */
	public function search($pattern) {
		// TODO
	}

	/**
	 * search for files by mimetype
	 *
	 * @param string $part1
	 * @param string $part2
	 * @return array
	 */
	public function searchByMime($mimetype) {
		if (strpos($mimetype, '/')) {
			$where = '`mimetype` = ?';
		} else {
			$where = '`mimepart` = ?';
		}
		$mimetype = $this->getMimetypeId($mimetype);
		$ids = $this->getAll();
		$placeholders = join(',', array_fill(0, count($ids), '?'));
		$query = \OC_DB::prepare('
			SELECT `fileid`, `storage`, `path`, `parent`, `name`, `mimetype`, `mimepart`, `size`, `mtime`, `encrypted`
			FROM `*PREFIX*filecache` WHERE ' . $where . ' AND `fileid` IN (' . $placeholders . ')'
		);
		$result = $query->execute(array_merge(array($mimetype), $ids));
		return $result->fetchAll();
	}

	/**
	 * get the size of a folder and set it in the cache
	 *
	 * @param string $path
	 * @return int
	 */
	public function calculateFolderSize($path) {
		if ($path === '') {
			$data = $this->get('');
			return $data['size'];
		}
		list($cache, $internalPath) = $this->getSourceCache($path);
		if ($cache && $internalPath) {
			return $cache->calculateFolderSize($internalPath);
		}
		return 0;
	}

	/**
	 * get all file ids on the files on the storage
	 *
	 * @return int[]
	 */
	public function getAll() {
		$ids = array();
		$shares = $this->fetcher->getAll();
		foreach ($shares as $share) {
			$ids[] = $share->getItemSource();
		}
		return array_unique($ids);
	}

	/**
	 * find a folder in the cache which has not been fully scanned
	 *
	 * If multiply incomplete folders are in the cache, the one with the highest id will be returned,
	 * use the one with the highest id gives the best result with the background scanner, since that is most
	 * likely the folder where we stopped scanning previously
	 *
	 * @return string|bool the path of the folder or false when no folder matched
	 */
	public function getIncomplete() {
		return false;
	}

}