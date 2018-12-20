<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
 */

namespace OC\Lock\Persistent;

use OCP\AppFramework\Db\Entity;
use OCP\AppFramework\Db\Mapper;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IDBConnection;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Lock\Persistent\ILock;

class LockMapper extends Mapper {
	/** @var ITimeFactory */
	private $timeFactory;

	public function __construct(IDBConnection $db, ITimeFactory $timeFactory) {
		parent::__construct($db, 'persistent_locks', null);
		$this->timeFactory = $timeFactory;
	}

	/**
	 * Returns an array of all paths to each of
	 * the parents from the given path.
	 *
	 * Ex: if "/a/b/c" is given, returns ["/a", "/a/b"]
	 *
	 * @param string $path
	 * @return string[] array of parent paths
	 */
	private function getParentPaths($path) {
		// We need to check locks for every part in the uri.
		$uriParts = \explode('/', $path);

		// only return parents, not the current one
		\array_pop($uriParts);

		$parentPaths = [];

		$currentPath = '';
		foreach ($uriParts as $part) {
			if ($currentPath) {
				$currentPath .= '/';
			}
			$currentPath .= $part;
			$parentPaths[] = $currentPath;
		}

		return $parentPaths;
	}

	/**
	 * Selects all locks from the database for the given storage and path.
	 * Locks for parent folders are returned as well as long as they have a non-zero depth,
	 * as these would mean the target $internalPath is indirectly locked through these.
	 * In case $returnChildLocks is true, locks for all children paths will be return as well,
	 * regardless of depth..
	 *
	 * Examples:
	 *
	 * When function called with "foo/bar" the returned array will have lock
	 * entries for the following, given the conditions are met:
	 * - "foo" if the latter has a lock set with non-zero Depth
	 * - "foo/bar" if the latter has a lock set (current target)
	 * - "foo/bar/sub" if the latter has a lock set, and given $returnChildLocks is true
	 *
	 * @param int $storageId numeric id of the storage for which to retrieve lock entries
	 * @param string $internalPath target internal path
	 * @param bool $returnChildLocks whether to return any lock for any child
	 * @return Lock[]
	 */
	public function getLocksByPath($storageId, $internalPath, $returnChildLocks) {
		$query = $this->db->getQueryBuilder();
		$internalPath = \rtrim($internalPath, '/');

		/*
		 * SELECT `id`, `owner`, `timeout`, `created_at`, `token`, `token`, `scope`, `depth`, `file_id`, `path`, `owner_account_id`
		 * FROM `oc_persistent_locks` l
		 * INNER JOIN `oc_filecache` f ON l.`file_id` = f.`fileid`
		 * WHERE (
		 * 	(`storage` = 4)
		 * 	AND (`created_at` > (1544710587 - `timeout`))
		 * 	AND (
		 * 		(f.`path` = 'files/test/target')
		 * 		OR ((`depth` <> 0) AND (`path` in ('files', 'files/test')))
		 * 	)
		 * );
		 */
		$query->select(['id', 'owner', 'timeout', 'created_at', 'token', 'token', 'scope', 'depth', 'file_id', 'path', 'owner_account_id'])
			->from($this->getTableName(), 'l')
			->join('l', 'filecache', 'f', $query->expr()->eq('l.file_id', 'f.fileid'))
			// WHERE (`storage` = 4)
			->where($query->expr()->eq('storage', $query->createPositionalParameter($storageId)))
			// AND (`created_at` > (1544710587 - `timeout`))
			->andWhere($query->expr()->gt('created_at', $query->createFunction('(' . $query->createPositionalParameter($this->timeFactory->getTime()) . ' - `timeout`)')));

		$pathMatchClauses = $query->expr()->orX(
			// direct match
			// (f.`path` = 'files/test/target')
			$query->expr()->eq('f.path', $query->createPositionalParameter($internalPath))
		);

		if ($returnChildLocks) {
			$pathMatchClauses->add(
				// match all children paths from the current path
				// (f.`path` LIKE 'files/test/target/%')
				$query->expr()->like('f.path', $query->createPositionalParameter($this->db->escapeLikeParameter($internalPath) . '/%'))
			);
		}

		$parentPaths = $this->getParentPaths($internalPath);
		if (!empty($parentPaths)) {
			// match any parents with the condition that there is a lock with non-zero Depth
			$pathMatchClauses->add(
				$query->expr()->andX(
					$query->expr()->neq('depth', $query->createPositionalParameter(0)),
					// here we are assuming that the number of path sections will be less than 1000
					$query->expr()->in('path', $query->createPositionalParameter($parentPaths, IQueryBuilder::PARAM_STR_ARRAY))
				)
			);
		}

		$query->andWhere($pathMatchClauses);

		$stmt = $query->execute();
		$entities = [];
		while ($row = $stmt->fetch()) {
			$entities[] = $this->mapRowToEntity($row);
		}
		$stmt->closeCursor();

		return $entities;
	}

	/**
	 * @param int $fileId
	 * @param string $token
	 * @return bool
	 */
	public function deleteByFileIdAndToken($fileId, $token) {
		$query = $this->db->getQueryBuilder();

		$rowCount = $query->delete($this->getTableName())
			->where($query->expr()->eq('file_id', $query->createNamedParameter($fileId)))
			->andWhere($query->expr()->eq('token_hash', $query->createNamedParameter(\md5($token))))
			->execute();

		return $rowCount === 1;
	}

	/**
	 * @param string $token
	 * @return Lock
	 * @throws \OCP\AppFramework\Db\DoesNotExistException
	 * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException
	 */
	public function getLockByToken($token) {
		$query = $this->db->getQueryBuilder();

		$query->select(['id', 'owner', 'timeout', 'created_at', 'token', 'token_hash', 'scope', 'depth', 'file_id', 'owner_account_id'])
			->from($this->getTableName(), 'l')
			->where($query->expr()->eq('token_hash', $query->createNamedParameter(\md5($token))));

		return $this->findEntity($query->getSQL(), $query->getParameters());
	}

	private function validateEntity($entity) {
		if (!$entity instanceof Lock) {
			throw new \InvalidArgumentException('Wrong entity type used');
		}
		if (\md5($entity->getToken()) !== $entity->getTokenHash()) {
			throw new \InvalidArgumentException('token_hash does not match the token of the lock');
		}
		if ($entity->getDepth() !== ILock::LOCK_DEPTH_ZERO && $entity->getDepth() !== ILock::LOCK_DEPTH_INFINITE) {
			throw new \InvalidArgumentException('Only -1 (infinity) and 0 are supported for lock depth, ' . $entity->getDepth() . ' given');
		}
	}

	public function insert(Entity $entity) {
		$this->validateEntity($entity);
		return parent::insert($entity);
	}

	public function update(Entity $entity) {
		$this->validateEntity($entity);
		return parent::update($entity);
	}

	public function cleanup() {
		$query = $this->db->getQueryBuilder();
		$query->delete($this->getTableName())
			->where($query->expr()->lt('created_at',
				$query->createFunction('(' . $query->createNamedParameter($this->timeFactory->getTime()) . ' - `timeout`)')))
			->execute();
	}
}
