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
			return array($cache, $internalPath);
		}
		return array(null, null);
	}

	public function getNumericStorageId() {
		return null;
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
				'path' => '',
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
		} else {
			$data = false;
			if (is_string($file)) {
				$shares = $this->fetcher->getByPath($file);
			} else {
				$shares = $this->fetcher->getById($file);
			}
			foreach ($shares as $share) {
				// Check if we have an exact share for this path or id
				if (is_string($file) && $share->getItemTarget() === $file
					|| is_int($file) && $share->getItemSource() === $file
				) {
					$data = $share->getMetadata();
					break;
				}
			}
			if ($data) {
				$data['mimetype'] = $this->getMimetype($data['mimetype']);
				$data['mimepart'] = $this->getMimetype($data['mimepart']);
				if ($data['storage_mtime'] === 0) {
					$data['storage_mtime'] = $data['mtime'];
				}
			} else if (!empty($shares)) {
				$share = reset($shares);
				$folder = $share->getItemTarget();
				if (is_string($file)) {
					list($cache, $internalPath) = $this->getSourceCache($file);
					$data = $cache->get($internalPath);
				} else {
					list($cache) = $this->getSourceCache($folder);
					$data = $cache->get($file);
				}
				if ($data) {
					$data['path'] = $folder.substr($data['path'], strlen($share->getPath()));
				}
			}
			return $data;
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
		if ($file !== '') {
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
		if ($cache && $oldInternalPath) {
			// Renaming/moving is only allowed within shared folders
			if (dirname($target) !== '') {
				list( , $newInternalPath) = $this->fetcher->resolvePath(dirname($target));
				$newInternalPath .= '/'.basename($target);
				$cache->move($oldInternalPath, $newInternalPath);
			}
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
		$pattern = $this->normalize($pattern);
		// Remove the '%' characters that were added for the LIKE query
		$trimmedPattern = trim($pattern, '%');
		return $this->searchCommon($pattern, 'search', function($share) use ($trimmedPattern) {
			if (stripos($share->getItemTarget(), $trimmedPattern) !== false) {
				return true;
			}
			return false;
		});
	}

	/**
	 * search for files by mimetype
	 *
	 * @param string $mimetype
	 * @return array
	 */
	public function searchByMime($mimetype) {
		$mimetypeId = (int)$this->getMimetypeId($mimetype);
		return $this->searchCommon($mimetype, 'searchByMime',
			function($share) use ($mimetypeId) {
				if ($share->getMimepart() === $mimetypeId
					|| $share->getMimetype() === $mimetypeId
				) {
					return true;
				}
				return false;
			}
		);
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
		$folderMimetypeId = (int)$this->getMimetypeId('httpd/unix-directory');
		foreach ($shares as $share) {
			$fileId = $share->getItemSource();
			if (!isset($ids[$fileId])) {
				$ids[$fileId] = $fileId;
				if ($share->getMimetype() === $folderMimetypeId) {
					$childrenIds = $this->getChildrenIds($fileId);
					$ids = array_merge($ids, array_combine($childrenIds, $childrenIds));
				}
			}
		}
		return array_values($ids);
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

	/**
	 * Search all file shares and their children
	 * @param mixed $query The search query to pass to the method
	 * @param string $method The method to call inside a cache - 'search' or 'searchByMime'
	 * @param callable $callback A callable that returns true if the file share passed as an
	 * argument matches the search query, elsewise returns false
	 * @return array
	 */
	protected function searchCommon($query, $method, $callback) {
		$files = array();
		$caches = array();
		$folderMimetypeId = (int)$this->getMimetypeId('httpd/unix-directory');
		$shares = $this->fetcher->getAll();
		// Look through all file shares for matches
		foreach ($shares as $share) {
			$fileId = $share->getItemSource();
			// Ignore duplicate shares
			if (!isset($files[$fileId])) {
				if ($callback($share)) {
					$file = $share->getMetadata();
					$file['mimetype'] = $this->getMimetype($file['mimetype']);
					$file['mimepart'] = $this->getMimetype($file['mimepart']);
					if ($file['storage_mtime'] === 0) {
						$file['storage_mtime'] = $file['mtime'];
					}
					$files[$fileId] = $file;
				}
				$storageId = $share->getStorage();
				if ($share->getMimetype() === $folderMimetypeId && !isset($caches[$storageId])) {
					list($cache) = $this->getSourceCache($share->getItemTarget());
					$caches[$storageId] = $cache;
				}
			}
		}
		$ids = $this->getAll();
		// Look inside shared folders' caches for more results
		foreach ($caches as $cache) {
			$result = $cache->$method($query);
			foreach ($result as $file) {
				$fileId = (int)$file['fileid'];
				// Ensure that the search result is a shared file
				if (!isset($files[$fileId]) && in_array($fileId, $ids) !== false) {
					// Find the shared folder this file is inside
					foreach ($shares as $share) {
						$path = $share->getPath();
						if ((int)$file['storage'] === $share->getStorage()
							&& strpos($file['path'], $path) === 0
						) {
							// Rebuild the path relative to the Shared folder
							$folder = $share->getItemTarget();
							$file['path'] = $folder.substr($file['path'], strlen($path));
							$files[$fileId] = $file;
						}
					}
				}
			}
		}
		return array_values($files);
	}

	/**
	 * Get all children file ids for the specified file id
	 * @param int $fileId
	 * @return int[]
	 */
	protected function getChildrenIds($fileId) {
		$ids = array();
		$folderMimetypeId = (int)$this->getMimetypeId('httpd/unix-directory');
		$sql = 'SELECT `fileid`, `mimetype` FROM `*PREFIX*filecache` WHERE `parent` = ?';
		$result = \OC_DB::executeAudited($sql, array($fileId));
		$rows = $result->fetchAll();
		foreach ($rows as $row) {
			$fileId = (int)$row['fileid'];
			$ids[] = $fileId;
			if ((int)$row['mimetype'] === $folderMimetypeId) {
				$ids = array_merge($ids, $this->getChildrenIds($fileId));
			}
		}
		return $ids;
	}

}