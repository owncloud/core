<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Files\Cache\ICacheEntry;
use OCP\Files\Cache\ICacheIterator;
use OCP\Files\IMimeTypeLoader;
use OCP\IDBConnection;
use OCP\ILogger;

/**
 * This is implementation of ICacheIterator for const memory retrieval of
 * ICacheEntries for children of file with given $fileId (children is defined as
 * having parent field with the $fileId.
 *
 * @since 10.3.0
 */
class CacheChildrenIterator implements ICacheIterator {

	/** @var IMimeTypeLoader */
	private $mimetypeLoader;

	/**
	 * @var IDBConnection
	 */
	private $connection;

	/**
	 * @var ILogger
	 */
	private $logger;

	/**
	 * @var int
	 */
	private $lastRetrievedFileId;

	/**
	 * @var int
	 */
	private $cacheOffset;

	/**
	 * @var int
	 */
	private $cacheCapacity;

	/**
	 * @var ICacheEntry[]
	 */
	private $cache;

	/**
	 * @var int
	 */
	private $fileId;

	/**
	 * @param int $fileId the file id of the folder
	 * @param IMimeTypeLoader $mimetypeLoader
	 * @param IDBConnection $connection
	 * @param ILogger $logger
	 * @param int $cacheCapacity cache capacity, needs to be a positive number
	 */
	public function __construct($fileId, IMimeTypeLoader $mimetypeLoader, IDBConnection $connection, ILogger $logger, $cacheCapacity = 512) {
		$this->mimetypeLoader =$mimetypeLoader;
		$this->connection = $connection;
		$this->logger = $logger;

		$this->fileId = $fileId;
		$this->cacheCapacity = $cacheCapacity;

		$this->lastRetrievedFileId = null;
		$this->cache = null;
		$this->cacheOffset = 0;
	}

	/**
	 * @inheritDoc
	 */
	public function next() {
		if ($this->cacheOffset >= ($this->cacheCapacity - 1)) {
			// fetch new cache
			$this->cacheOffset = 0;
			unset($this->cache);
			$this->cache = $this->fetch();
		} else {
			$this->cacheOffset++;
		}
	}

	/**
	 * @inheritDoc
	 */
	public function rewind() {
		$this->logger->debug('Rewinding for cache children of ' . $this->fileId);

		// reset position to zero
		$this->lastRetrievedFileId = null;
		$this->cacheOffset = 0;

		// fetch new cache for first record to be available
		unset($this->cache);
		$this->cache = $this->fetch();

		$this->logger->debug('After rewind fileid offset is ' . ($this->lastRetrievedFileId ? $this->lastRetrievedFileId : 'null'));
	}

	/**
	 * @inheritDoc
	 */
	public function key() {
		if ($this->valid()) {
			return $this->current()->getId();
		}
		return null;
	}

	/**
	 * @inheritDoc
	 */
	public function valid() {
		return $this->current() !== null;
	}

	/**
	 * @inheritDoc
	 */
	public function current() {
		if (isset($this->cache, $this->cache[$this->cacheOffset])) {
			return $this->cache[$this->cacheOffset];
		}
		return null;
	}

	/**
	 * We prefetch here only limited chunk of data using scrolling fileid offset.
	 *
	 * NOTE: We cannot retrieve and store in memory only 1 record with fetch(),
	 * as this is not possible for some databases to use scrollable PDO cursors.
	 * Thus we need to use scrolling fileid with where(fileid > fileid_offset).
	 *
	 * @return CacheEntry[]
	 * @throws \Exception
	 */
	private function fetch() {
		if ($this->fileId < 0) {
			return [];
		}

		$qb = $this->connection->getQueryBuilder();
		$qb->select('fileid', 'storage', 'path', 'parent', 'name', 'mimetype', 'mimepart', 'size', 'mtime',
			'storage_mtime', 'encrypted', 'etag', 'permissions', 'checksum')
			->from('filecache')
			->where(
				$qb->expr()->eq('parent', $qb->createNamedParameter($this->fileId, IQueryBuilder::PARAM_INT))
			);

		// Add offset based on last retrieved fileid (fileid is increasing integer)
		// This is needed in case some record is removed or inserted in between calls of this query
		if ($this->lastRetrievedFileId) {
			$qb->andWhere(
				$qb->expr()->gt('fileid', $qb->createNamedParameter($this->lastRetrievedFileId, IQueryBuilder::PARAM_STR))
			);
		}

		// This is required to be able to make offset on fileid
		$qb->orderBy('fileid', 'ASC');

		// Add limit based on cache
		if ($this->cacheCapacity > 0) {
			$qb->setFirstResult(0);
			$qb->setMaxResults(
				$this->cacheCapacity
			);
		} else {
			throw new \Exception('Cache capacity needs to be a positive number');
		}

		$resultStatement = $qb->execute();

		$result = [];
		while (($row = $resultStatement->fetch()) !== false) {
			$row['mimetype'] = $this->mimetypeLoader->getMimetypeById($row['mimetype']);
			$row['mimepart'] = $this->mimetypeLoader->getMimetypeById($row['mimepart']);
			if ($row['storage_mtime'] == 0) {
				$row['storage_mtime'] = $row['mtime'];
			}
			$row['permissions'] = (int)$row['permissions'];
			$row['mtime'] = (int)$row['mtime'];
			$row['storage_mtime'] = (int)$row['storage_mtime'];
			$row['size'] = 0 + $row['size'];

			$this->lastRetrievedFileId = $row['fileid'];
			$result[] = new CacheEntry($row);
		}

		$resultStatement->closeCursor();

		$this->logger->debug('Fetched ' . \count($result) . ' ICacheEntry for cache children of ' . $this->fileId . ', new offset ' . ($this->lastRetrievedFileId ? $this->lastRetrievedFileId : 'null'));

		return $result;
	}
}
