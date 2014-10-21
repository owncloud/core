<?php
/**
 * Copyright (c) 2014 Jörn Friedrich Dreyer <jfd@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_External\Cache;

use OC\Files\Filesystem;
use OC\Hooks\BasicEmitter;
use OCP\Config;

/**
 * Class Scanner
 */
class Scanner extends \OC\Files\Cache\Scanner {

	public function __construct (\OC\Files\Storage\Storage $storage) {
		parent::__construct($storage);
	}

	/**
	 * get all the metadata of a file or folder
	 * *
	 *
	 * @param string $path
	 * @return array an array of metadata of the file
	 */
	public function getData($object) {
		$data = array();
		if (isset($object['Key'])) {
			$data['path'] = trim($object['Key'], '/');
			if (isset($object['ContentType'])) {
				$data['mimetype'] = $object['ContentType'];
			} else if (substr($object['Key'],-1) === '/') {
				$data['mimetype'] = 'httpd/unix-directory';
				$data['etag'] = null;
			} else {
				$data['etag'] = $object['ETag'];
			}
			$data['mtime'] = strtotime($object['LastModified']);
			if ($data['mtime'] === false) {
				$data['mtime'] = -1;
			}
			$data['size'] = (int)$object['Size'];
			$data['name'] = basename($data['path']);
			$data['storage_mtime'] = $data['mtime'];
			if (!isset($data['mimetype'])) {
				$data['mimetype'] = \OC_Helper::getMimetypeDetector()->detectPath($data['name']);
			}
			$data['permissions'] = $this->storage->getPermissions($data['path']);
		} else {
			throw new \Exception('expected key in object');
		}
		return $data;
	}

	/**
	 * scan a folder and all it's children
	 *
	 * @param string $path
	 * @param bool $recursive
	 * @param int $reuse
	 * @return array an array of the meta data of the scanned file or folder
	 */
	public function scan($path, $recursive = self::SCAN_RECURSIVE, $reuse = -1) {
		$params = array(
			'Bucket' =>  $this->storage->getBucket()
		);

		//mark all storage_mtimes as unknown
		$stmt = \OC::$server->getDatabaseConnection()->prepare(
			'UPDATE `*PREFIX*filecache` SET `storage_mtime` = ? WHERE `storage` = ?'
		);
		$stmt->execute(array(-1, $this->cache->getNumericStorageId()));

		$data = $this->getData(array('Key' => '/'));
		$rootData = $this->cache->get('');
		if ($rootData) {
			// remember rootId for size update after scanning
			$rootId = $rootData['fileid'];
			// Only update metadata that has changed
			$newData = array_diff_assoc($data, $rootData);
		} else {
			$newData = $data;
		}
		if (!empty($newData)) {
			// remember rootId for size update after scanning
			$rootId = $this->addToCache('', $newData);
		}

		$previousParent = null;
		$parentId = null;
		$maxChildMTime = -1;
		try {
			// Since there are no real directories on S3, we fetch all objects
			do {
				// instead of the iterator, manually loop over the list ...
				$objects = $this->storage->getConnection()->listObjects($params);
				// ... so we get more than one directory
				foreach ($objects['Contents'] as $object) {
					$data = $this->getData($object);
					if (/*$data['name'] === basename($path)
						||*/ self::isPartialFile($data['name'])
						|| Filesystem::isFileBlacklisted($data['name'])
					) {
						continue;
					}

					$parent = dirname($data['path']);
					if ($parent === '.' or $parent === '/') {
						$parent = '';
					}
					if ($data['mtime'] > $maxChildMTime) {
						$maxChildMTime = $data['mtime'];
					}
					if ($previousParent !== $parent) {
						if ($previousParent) {
							$this->cache->calculateFolderSize($previousParent,
								array('fileid' => $parentId, 'mimetype' => 'httpd/unix-directory', 'size' => -1)
							);
						}
						//update mtime of previous parent in cache
						$this->updateCache($previousParent,
							array('mtime' => $maxChildMTime, 'storage_mtime' => $maxChildMTime)
						);

						// propagate mtime up the tree
						$p = dirname($previousParent);
						if ($p === '.') {
							$p = '';
						}
						do {
							$pData = $this->cache->get($p);
							if ($maxChildMTime > $pData['mtime']) {
								$this->updateCache($pData['path'],
									array('mtime' => $maxChildMTime, 'storage_mtime' => $maxChildMTime)
								);
							}
							$p = dirname($previousParent);
							if ($p === '.') {
								$p = '';
							}
						} while ($p !== '' || $maxChildMTime > $pData['mtime'] );

						$maxChildMTime = -1;
						$previousParent = $parent;
						$parentId = (int)$this->cache->getId($parent);
						//FIXME what if $parentId is -1?
					}
					$data['parent'] = $parentId;

					$cacheData = $this->cache->get($data['path']);
					if ($cacheData) {
						// Only update metadata that has changed
						$newData = array_diff_assoc($data, $cacheData);
					} else {
						$newData = $data;
					}
					if (!empty($newData)) {
						$this->addToCache($data['path'], $newData);
						$this->emit(
							'\OC\Files\Cache\Scanner',
							'postScanFile',
							array($data['path'], $this->storageId)
						);
						\OC_Hook::emit(
							'\OC\Files\Cache\Scanner',
							'post_scan_file',
							array('path' => $data['path'], 'storage' => $this->storageId)
						);
					}
					// we reached the end when the list is no longer truncated
				}
			} while ($objects['IsTruncated']);
		} catch (S3Exception $e) {
			\OCP\Util::logException('files_external', $e);
			return null;
		}

		// update root size
		$this->cache->calculateFolderSize('',
			array('fileid' => $rootId, 'mimetype' => 'httpd/unix-directory', 'size' => -1)
		);

		//delete all filecache entries where storage_mtimes has not been updated
		$stmt = \OC::$server->getDatabaseConnection()->prepare(
			'DELETE FROM `*PREFIX*filecache` WHERE `storage` = ? AND `storage_mtime` = ?'
		);
		$stmt->execute(array($this->cache->getNumericStorageId(), -1));

		return $this->cache->get($path);
	}
	public function scanFile($file, $reuseExisting = 0) {

	}
	public function scanChildren($path, $recursive = self::SCAN_RECURSIVE, $reuse = -1) {

	}
}
