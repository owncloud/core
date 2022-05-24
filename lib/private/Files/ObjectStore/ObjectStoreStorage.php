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

use Icewind\Streams\IteratorDirectory;
use OC\Files\Cache\CacheEntry;
use OCP\Files\NotFoundException;
use OCP\Files\ObjectStore\IObjectStore;
use OCP\Files\ObjectStore\IVersionedObjectStorage;

class ObjectStoreStorage extends \OC\Files\Storage\Common {

	/**
	 * @var array
	 */
	private static $tmpFiles = [];
	/** @var array */
	private $movingBetweenBuckets = [];
	/**
	 * @var \OCP\Files\ObjectStore\IObjectStore $objectStore
	 */
	protected $objectStore;
	/**
	 * @var string $id
	 */
	protected $id;
	/**
	 * @var \OC\User\User $user
	 */
	protected $user;

	private $objectPrefix = 'urn:oid:';

	public function __construct($params) {
		if (isset($params['objectstore']) && $params['objectstore'] instanceof IObjectStore) {
			$this->objectStore = $params['objectstore'];
		} else {
			throw new \Exception('missing IObjectStore instance');
		}
		if (isset($params['storageid'])) {
			$this->id = 'object::store:' . $params['storageid'];
		} else {
			$this->id = 'object::store:' . $this->objectStore->getStorageId();
		}
		if (isset($params['objectPrefix'])) {
			$this->objectPrefix = $params['objectPrefix'];
		}
		//initialize cache with root directory in cache
		if (!$this->is_dir('/')) {
			$this->mkdir('/');
		}
	}

	/**
	 * @return boolean
	 */
	public function usePartFile() {
		return false;
	}

	/**
	 * This is intended to be used during the moveFromStorage call. While moving, this is needed
	 * for the sourceStorage to know we're moving stuff and it shouldn't change the cache
	 * until it's finished.
	 * DO NOT USE OUTSIDE OF THIS CLASS
	 */
	public function setMovingBetweenBucketsInfo(array $info) {
		$this->movingBetweenBuckets = $info;
	}

	/**
	 * This is intended to be used during the moveFromStorage call. While moving, this is needed
	 * for the sourceStorage to know we're moving stuff and it shouldn't change the cache
	 * until it's finished. This will be called when we finish moving all the files, in order
	 * for the sourceStorage to operate normally.
	 * DO NOT USE OUTSIDE OF THIS CLASS
	 */
	public function clearMovingBetweenBucketsInfo() {
		$this->movingBetweenBuckets = [];
	}

	public function mkdir($path) {
		$path = $this->normalizePath($path);

		if ($this->file_exists($path)) {
			return false;
		}

		$mTime = \time();
		$data = [
			'mimetype' => 'httpd/unix-directory',
			'size' => 0,
			'mtime' => $mTime,
			'storage_mtime' => $mTime,
			'permissions' => \OCP\Constants::PERMISSION_ALL,
		];
		if ($path === '') {
			//create root on the fly
			$data['etag'] = $this->getETag('');
			if (empty($this->movingBetweenBuckets)) {
				$this->getCache()->put('', $data);
			}
			return true;
		} else {
			// if parent does not exist, create it
			$parent = $this->normalizePath(\dirname($path));
			$parentType = $this->filetype($parent);
			if ($parentType === false) {
				if (!$this->mkdir($parent)) {
					// something went wrong
					return false;
				}
			} elseif ($parentType === 'file') {
				// parent is a file
				return false;
			}
			if (empty($this->movingBetweenBuckets)) {
				// finally create the new dir
				$mTime = \time(); // update mtime
				$data['mtime'] = $mTime;
				$data['storage_mtime'] = $mTime;
				$data['etag'] = $this->getETag($path);
				$this->getCache()->put($path, $data);
			}
			return true;
		}
	}

	/**
	 * @param string $path
	 * @return string
	 */
	private function normalizePath($path) {
		$path = \trim($path, '/');
		//FIXME why do we sometimes get a path like 'files//username'?
		$path = \str_replace('//', '/', $path);

		// dirname('/folder') returns '.' but internally (in the cache) we store the root as ''
		if (!$path || $path === '.') {
			$path = '';
		}

		return $path;
	}

	/**
	 * Object Stores use a NoopScanner because metadata is directly stored in
	 * the file cache and cannot really scan the filesystem. The storage passed in is not used anywhere.
	 *
	 * @param string $path
	 * @param \OC\Files\Storage\Storage (optional) the storage to pass to the scanner
	 * @return \OC\Files\ObjectStore\NoopScanner
	 */
	public function getScanner($path = '', $storage = null) {
		if (!$storage) {
			$storage = $this;
		}
		if (!isset($this->scanner)) {
			$this->scanner = new NoopScanner($storage);
		}
		return $this->scanner;
	}

	public function getId() {
		return $this->id;
	}

	public function getBucket() {
		return $this->objectStore->getStorageId();
	}

	/** {@inheritdoc} */
	public function rmdir($path) {
		$path = $this->normalizePath($path);

		if (!$this->is_dir($path)) {
			return false;
		}

		$this->rmObjects($path);

		if (empty($this->movingBetweenBuckets)) {
			$this->getCache()->remove($path);
		}

		return true;
	}

	private function rmObjects($path) {
		$children = $this->getCache()->getFolderContents($path);
		foreach ($children as $child) {
			if ($child['mimetype'] === 'httpd/unix-directory') {
				$this->rmObjects($child['path']);
			} else {
				$this->unlink($child['path']);
			}
		}
	}

	public function unlink($path) {
		$path = $this->normalizePath($path);
		$stat = $this->stat($path);

		if ($stat && isset($stat['fileid'])) {
			if ($stat['mimetype'] === 'httpd/unix-directory') {
				return $this->rmdir($path);
			}
			try {
				$this->objectStore->deleteObject($this->getURN($stat['fileid']));
			} catch (\Exception $ex) {
				if ($ex->getCode() !== 404) {
					\OCP\Util::writeLog('objectstore', 'Could not delete object: ' . $ex->getMessage(), \OCP\Util::ERROR);
					return false;
				} else {
					//removing from cache is ok as it does not exist in the objectstore anyway
				}
			}
			if (empty($this->movingBetweenBuckets)) {
				$this->getCache()->remove($path);
			}
			return true;
		}
		return false;
	}

	public function stat($path) {
		$path = $this->normalizePath($path);
		$cacheEntry = $this->getCache()->get($path);
		if ($cacheEntry instanceof CacheEntry) {
			return $cacheEntry->getData();
		} else {
			return false;
		}
	}

	/**
	 * Override this method if you need a different unique resource identifier for your object storage implementation.
	 * The default implementations just appends the fileId to 'urn:oid:'. Make sure the URN is unique over all users.
	 * You may need a mapping table to store your URN if it cannot be generated from the fileid.
	 *
	 * @param int $fileId the fileid
	 * @return null|string the unified resource name used to identify the object
	 */
	protected function getURN($fileId) {
		if (\is_numeric($fileId)) {
			return $this->objectPrefix . $fileId;
		}
		return null;
	}

	public function opendir($path) {
		$path = $this->normalizePath($path);

		try {
			$files = [];
			$folderContents = $this->getCache()->getFolderContents($path);
			foreach ($folderContents as $file) {
				$files[] = $file['name'];
			}

			return IteratorDirectory::wrap($files);
		} catch (\Exception $e) {
			\OCP\Util::writeLog('objectstore', $e->getMessage(), \OCP\Util::ERROR);
			return false;
		}
	}

	public function filetype($path) {
		$path = $this->normalizePath($path);
		$stat = $this->stat($path);
		if ($stat) {
			if ($stat['mimetype'] === 'httpd/unix-directory') {
				return 'dir';
			}
			return 'file';
		} else {
			return false;
		}
	}

	public function fopen($path, $mode) {
		$path = $this->normalizePath($path);

		switch ($mode) {
			case 'r':
			case 'rb':
				$stat = $this->stat($path);
				if (\is_array($stat)) {
					try {
						return $this->objectStore->readObject($this->getURN($stat['fileid']));
					} catch (\Exception $ex) {
						\OCP\Util::writeLog('objectstore', 'Could not get object: ' . $ex->getMessage(), \OCP\Util::ERROR);
						return false;
					}
				} else {
					return false;
				}
				// no break
			case 'w':
			case 'wb':
			case 'a':
			case 'ab':
			case 'r+':
			case 'w+':
			case 'wb+':
			case 'a+':
			case 'x':
			case 'x+':
			case 'c':
			case 'c+':
				if (\strrpos($path, '.') !== false) {
					$ext = \substr($path, \strrpos($path, '.'));
				} else {
					$ext = '';
				}
				$tmpFile = \OC::$server->getTempManager()->getTemporaryFile($ext);
				\OC\Files\Stream\Close::registerCallback($tmpFile, [$this, 'writeBack']);
				if ($this->file_exists($path)) {
					$source = $this->fopen($path, 'r');
					\file_put_contents($tmpFile, $source);
				}
				self::$tmpFiles[$tmpFile] = $path;
				if (isset($this->movingBetweenBuckets[$this->getBucket()])) {
					// if we're moving files, mark the path we're moving. This is needed because
					// we need to know the fileid of the file we're moving in order to create
					// the new file with the same name in the other bucket
					$this->movingBetweenBuckets[$this->getBucket()]['paths'][$path] = true;
				}

				return \fopen('close://' . $tmpFile, $mode);
		}
		return false;
	}

	public function file_exists($path) {
		$path = $this->normalizePath($path);
		return (bool)$this->stat($path);
	}

	public function rename($source, $target) {
		$source = $this->normalizePath($source);
		$target = $this->normalizePath($target);
		$this->remove($target);
		if (empty($this->movingBetweenBuckets)) {
			$this->getCache()->move($source, $target);
		}
		$this->touch(\dirname($target));
		return true;
	}

	public function moveFromStorage(\OCP\Files\Storage $sourceStorage, $sourceInternalPath, $targetInternalPath) {
		if ($sourceStorage === $this) {
			return $this->copy($sourceInternalPath, $targetInternalPath);
		}
		// cross storage moves need to perform a move operation
		// TODO: there is some cache updating missing which requires bigger changes and is
		//       subject to followup PRs
		if (!$sourceStorage->instanceOfStorage(self::class)) {
			return parent::moveFromStorage($sourceStorage, $sourceInternalPath, $targetInternalPath);
		}

		// living on different buckets?
		/** @var ObjectStoreStorage $sourceStorage */
		'@phan-var ObjectStoreStorage $sourceStorage';
		if ($this->getBucket() !== $sourceStorage->getBucket()) {
			$this->movingBetweenBuckets[$this->getBucket()] = [
				'sourceStorage' => $sourceStorage,
				'sourceBase' => $sourceInternalPath,
				'targetBase' => $targetInternalPath,
				'paths' => [],
			];
			$sourceStorage->setMovingBetweenBucketsInfo($this->movingBetweenBuckets);
			try {
				$result = parent::moveFromStorage($sourceStorage, $sourceInternalPath, $targetInternalPath);
				$this->getCache()->moveFromCache($sourceStorage->getCache(), $sourceInternalPath, $targetInternalPath);
			} finally {
				// ensure we restore the normal behaviour in both storages
				$sourceStorage->clearMovingBetweenBucketsInfo();
				unset($this->movingBetweenBuckets[$this->getBucket()]);
			}
			return $result;
		}

		// source and target live on the same object store and we can simply rename
		// which updates the cache properly
		$this->getUpdater()->renameFromStorage($sourceStorage, $sourceInternalPath, $targetInternalPath);
		return true;
	}

	public function getMimeType($path) {
		$path = $this->normalizePath($path);
		$stat = $this->stat($path);
		if (\is_array($stat)) {
			return $stat['mimetype'];
		} else {
			return false;
		}
	}

	public function touch($path, $mtime = null) {
		if ($mtime === null) {
			$mtime = \time();
		}

		$path = $this->normalizePath($path);
		$dirName = \dirname($path);
		$parentExists = $this->is_dir($dirName);
		if (!$parentExists) {
			return false;
		}

		$stat = $this->stat($path);
		if (\is_array($stat)) {
			// update existing mtime in db
			$stat['mtime'] = $mtime;
			$this->getCache()->update($stat['fileid'], $stat);
		} else {
			if (!isset($this->movingBetweenBuckets[$this->getBucket()]['paths'][$path])) {
				$mimeType = \OC::$server->getMimeTypeDetector()->detectPath($path);
				// create new file
				$stat = [
					'etag' => $this->getETag($path),
					'mimetype' => $mimeType,
					'size' => 0,
					'mtime' => $mtime,
					'storage_mtime' => $mtime,
					'permissions' => \OCP\Constants::PERMISSION_ALL - \OCP\Constants::PERMISSION_CREATE,
				];

				$fileId = $this->getCache()->put($path, $stat);
				try {
					//read an empty file from memory
					$this->objectStore->writeObject($this->getURN($fileId), \fopen('php://memory', 'r'));
				} catch (\Exception $ex) {
					$this->getCache()->remove($path);
					\OCP\Util::writeLog('objectstore', 'Could not create object: ' . $ex->getMessage(), \OCP\Util::ERROR);
					return false;
				}
			}
		}
		return true;
	}

	public function writeBack($tmpFile) {
		if (!isset(self::$tmpFiles[$tmpFile])) {
			return;
		}

		$path = self::$tmpFiles[$tmpFile];
		$stat = $this->stat($path);
		if (empty($stat)) {
			// create new file
			$stat = [
				'permissions' => \OCP\Constants::PERMISSION_ALL - \OCP\Constants::PERMISSION_CREATE,
			];
		}
		// update stat with new data
		$mTime = \time();
		$stat['size'] = \filesize($tmpFile);
		$stat['mtime'] = $mTime;
		$stat['storage_mtime'] = $mTime;
		$stat['mimetype'] = \OC::$server->getMimeTypeDetector()->detect($tmpFile);
		$stat['etag'] = $this->getETag($path);

		if (isset($this->movingBetweenBuckets[$this->getBucket()]['paths'][$path])) {
			// if we're moving, we need the fileid of the old entry in order to create the new
			// file with the same name. The "movingBetweenBuckets" should contain enough
			// information to get the fileid of the old entry from the filecache.
			$targetBase = $this->movingBetweenBuckets[$this->getBucket()]['targetBase'];
			$sourceBase = $this->movingBetweenBuckets[$this->getBucket()]['sourceBase'];
			if (\substr($path, 0, \strlen($targetBase)) === $targetBase) {
				$movingPath = \substr($path, \strlen($targetBase));
				$originalSource = $sourceBase . $movingPath;
				$originalStorage = $this->movingBetweenBuckets[$this->getBucket()]['sourceStorage'];
				$fileId = $originalStorage->stat($originalSource)['fileid'];
			} else {
				// if the target path is outside the base... this shouldn't happen, but fallback to normal behaviour
				$fileId = $this->getCache()->put($path, $stat);
			}
			unset($this->movingBetweenBuckets[$this->getBucket()]['paths'][$path]);
		} else {
			$fileId = $this->getCache()->put($path, $stat);
		}
		try {
			//upload to object storage
			$this->objectStore->writeObject($this->getURN($fileId), \fopen($tmpFile, 'r'));
		} catch (\Exception $ex) {
			$this->getCache()->remove($path);
			\OCP\Util::writeLog('objectstore', 'Could not create object: ' . $ex->getMessage(), \OCP\Util::ERROR);
			throw $ex; // make this bubble up
		}
	}

	/**
	 * external changes are not supported, exclusive access to the object storage is assumed
	 *
	 * @param string $path
	 * @param int $time
	 * @return false
	 */
	public function hasUpdated($path, $time) {
		return false;
	}

	public function saveVersion($internalPath) {
		if ($this->objectStore instanceof IVersionedObjectStorage) {
			$stat = $this->stat($internalPath);
			// There are cases in the current implementation where saveVersion
			// is called before the file was even written.
			// There is nothing to be done in this case.
			// We return true to not trigger the fallback implementation
			if ($stat === false) {
				return true;
			}
			return $this->objectStore->saveVersion($this->getURN($stat['fileid']));
		}
		return parent::saveVersion($internalPath);
	}

	public function getVersions($internalPath) {
		if ($this->objectStore instanceof IVersionedObjectStorage) {
			$stat = $this->stat($internalPath);
			if ($stat === false) {
				throw new NotFoundException();
			}
			$versions = $this->objectStore->getVersions($this->getURN($stat['fileid']));
			list($uid, $path) = $this->convertInternalPathToGlobalPath($internalPath);
			return \array_map(function (array $version) use ($uid, $path) {
				$version['path'] = $path;
				$version['owner'] = $uid;
				return $version;
			}, $versions);
		}
		return parent::getVersions($internalPath);
	}

	public function getVersion($internalPath, $versionId) {
		if ($this->objectStore instanceof IVersionedObjectStorage) {
			$stat = $this->stat($internalPath);
			if ($stat === false) {
				throw new NotFoundException();
			}
			$version = $this->objectStore->getVersion($this->getURN($stat['fileid']), $versionId);
			list($uid, $path) = $this->convertInternalPathToGlobalPath($internalPath);
			if (!empty($version)) {
				$version['path'] = $path;
				$version['owner'] = $uid;
			}
			return $version;
		}
		return parent::getVersion($internalPath, $versionId);
	}

	public function getContentOfVersion($internalPath, $versionId) {
		if ($this->objectStore instanceof IVersionedObjectStorage) {
			$stat = $this->stat($internalPath);
			if ($stat === false) {
				throw new NotFoundException();
			}
			return $this->objectStore->getContentOfVersion($this->getURN($stat['fileid']), $versionId);
		}
		return parent::getContentOfVersion($internalPath, $versionId);
	}

	public function restoreVersion($internalPath, $versionId) {
		if ($this->objectStore instanceof IVersionedObjectStorage) {
			$stat = $this->stat($internalPath);
			if ($stat === false) {
				throw new NotFoundException();
			}
			return $this->objectStore->restoreVersion($this->getURN($stat['fileid']), $versionId);
		}
		return parent::restoreVersion($internalPath, $versionId);
	}
}
