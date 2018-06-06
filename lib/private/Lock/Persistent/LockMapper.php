<?php
declare(strict_types=1);
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

use OCP\AppFramework\Db\Mapper;
use OCP\IDBConnection;

class LockMapper extends Mapper {
	public function __construct(IDBConnection $db) {
		parent::__construct($db, 'persistent_locks', null);
	}

	/**
	 * Selects all locks from the database for the given storage and path.
	 * Also parent folders are returned and in case $returnChildLocks is true all
	 * children locks as well.
	 *
	 * @param int $storageId
	 * @param string $internalPath
	 * @param bool $returnChildLocks
	 * @return Lock[]
	 */
	public function getLocksByPath(int $storageId, string $internalPath, bool $returnChildLocks) : array {
		$query = $this->db->getQueryBuilder();
		$pathPattern = $this->db->escapeLikeParameter($internalPath) . '%';

		$query->select(['id', 'owner', 'timeout', 'created_at', 'token', 'scope', 'depth', 'file_id', 'path', 'owner_account_id'])
			->from($this->getTableName(), 'l')
			->join('l', 'filecache', 'f', $query->expr()->eq('l.file_id', 'f.fileid'))
			->where($query->expr()->eq('storage', $query->createNamedParameter($storageId)))
			->andWhere($query->expr()->gt('created_at', $query->createFunction('(' . $query->createNamedParameter(\time()) . ' - `timeout`)')));

		if ($returnChildLocks) {
			$query->andWhere($query->expr()->like('f.path', $query->createNamedParameter($pathPattern)));
		} else {
			$query->andWhere($query->expr()->eq('f.path', $query->createNamedParameter($internalPath)));
		}

		// We need to check locks for every part in the uri.
		$uriParts = \explode('/', $internalPath);

		// We already covered the last part of the uri
		\array_pop($uriParts);

		$currentPath = '';
		foreach ($uriParts as $part) {
			if ($currentPath) {
				$currentPath .= '/';
			}
			$currentPath .= $part;
			$query->orWhere(
				$query->expr()->andX(
					// TODO: think about parent locks for depth 1
					$query->expr()->neq('depth', $query->createNamedParameter(0)),
					$query->expr()->eq('path', $query->createNamedParameter($currentPath))
				)
			);
		}

		return $this->findEntities($query->getSQL(), $query->getParameters());
	}

	/**
	 * @param int $fileId
	 * @param string $token
	 * @return bool
	 */
	public function deleteByFileIdAndToken(int $fileId, string $token) : bool {
		$query = $this->db->getQueryBuilder();

		$rowCount = $query->delete($this->getTableName())
			->where($query->expr()->eq('file_id', $query->createNamedParameter($fileId)))
			->andWhere($query->expr()->eq('token', $query->createNamedParameter($token)))
			->execute();

		return $rowCount === 1;
	}

	/**
	 * @param string $token
	 * @return Lock
	 * @throws \OCP\AppFramework\Db\DoesNotExistException
	 * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException
	 */
	public function getLockByToken(string $token) : Lock {
		$query = $this->db->getQueryBuilder();

		$query->select(['id', 'owner', 'timeout', 'created_at', 'token', 'scope', 'depth', 'file_id', 'owner_account_id'])
			->from($this->getTableName(), 'l')
			->where($query->expr()->eq('token', $query->createNamedParameter($token)));

		return $this->findEntity($query->getSQL(), $query->getParameters());
	}
}
