<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2022, ownCloud GmbH
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
namespace OC;

use Doctrine\DBAL\Platforms\OraclePlatform;
use Doctrine\DBAL\Platforms\MySqlPlatform;
use OCP\Files\Folder;
use OCP\IDBConnection;
use OCP\DB\QueryBuilder\IQueryBuilder;

class PreviewCleanup {
	private \OCP\IDBConnection $connection;

	public function __construct(IDBConnection $connection) {
		$this->connection = $connection;
	}

	public function process(bool $all = false, int $chunkSize = 1000, \Closure $progress = null): int {
		$root = \OC::$server->getLazyRootFolder();
		$count = 0;

		$qb = $this->connection->getQueryBuilder();
		// the query will be reused, so the parameter will be set just before
		// executing the query
		$query = $qb->select('storage_id', 'user_id')
			->from('mounts')
			->where($qb->expr()->eq('storage_id', $qb->createParameter('sid')));
		$lastStorageInfo = [];

		$lastFileId = 0;
		while (true) {
			$rows = $this->queryPreviewsToDelete($lastFileId, $chunkSize);
			foreach ($rows as $row) {
				$storageId = $row['storage'];
				$name = $row['name'];
				$lastFileId = $row['fileid'];

				if (!isset($lastStorageInfo[$storageId])) {
					$query->setParameter(':sid', $storageId, IQueryBuilder::PARAM_INT);
					$result = $query->execute();
					$resultData = $result->fetchAll(); // only 1 result expected
					if (empty($resultData)) {
						continue; // we can't do anything without the user_id
					} else {
						// we only expect one result from the query, and we want to remove
						// the previous cached storage info.
						$lastStorageInfo = [$storageId => $resultData[0]['user_id']];
					}
				}

				$userId = $lastStorageInfo[$storageId];
				$userFiles = $root->getUserFolder($userId);
				if ($userFiles->getParent()->nodeExists('thumbnails')) {
					/** @var Folder $thumbnailsFolder */
					$thumbnailsFolder = $userFiles->getParent()->get('thumbnails');
					if ($thumbnailsFolder instanceof Folder && $thumbnailsFolder->nodeExists($name)) {
						$notExistingPreview = $thumbnailsFolder->get($name);
						$notExistingPreview->delete();
						if ($progress) {
							$progress($userId, $name, 'deleted');
						}
					} else {
						# cleanup cache
						$this->cleanFileCache($name, $thumbnailsFolder->getStorage()->getCache()->getNumericStorageId());
						if ($progress) {
							$progress($userId, $name, 'cache cleared');
						}
					}
				}
			}
			$count += \count($rows);
			if (!$all || empty($rows)) {
				break;
			}
		}

		return $count;
	}

	private function queryPreviewsToDelete(int $startFileId = 0, int $chunkSize = 1000): array {
		$dbPlatform = $this->connection->getDatabasePlatform();
		$isOracle = ($dbPlatform instanceof OraclePlatform);

		$castTo = 'BIGINT';
		if ($dbPlatform instanceof MySqlPlatform) {
			// for MySQL we need to cast to "signed" instead
			$castTo = 'SIGNED';
		} elseif ($isOracle) {
			$castTo = 'NUMBER';
		}

		// for the path_hash -> 3b8779ba05b8f0aed49650f3ff8beb4b = MD5('thumbnails')
		// sqlite doesn't have md5 function and oracle needs special function,
		// so we'll hardcode the value
		$sql = "SELECT `fileid`, `name`, `storage`
FROM `*PREFIX*filecache` `thumb`
WHERE `parent` IN (
  SELECT `fileid`
  FROM `*PREFIX*filecache`
  WHERE `storage` IN (
    SELECT `numeric_id`
    FROM `*PREFIX*storages`
    WHERE `id` LIKE 'home::%' OR `id` LIKE 'object::user:%'
  )
  AND `path_hash` = '3b8779ba05b8f0aed49650f3ff8beb4b'
)
AND NOT EXISTS (
  SELECT 1
  FROM `*PREFIX*filecache`
  WHERE `fileid` = CAST(`thumb`.`name` AS ${castTo})
)
AND `fileid` > ?
ORDER BY `storage`";

		if ($isOracle) {
			$sql = "select * from ($sql) where ROWNUM <= $chunkSize";

			# Oracle might have issues with new lines ......
			$sql = trim(preg_replace('/\s+/', ' ', $sql));
		} else {
			$sql .= " limit $chunkSize";
		}

		return $this->connection->executeQuery($sql, [$startFileId])->fetchAll(\PDO::FETCH_ASSOC);
	}

	private function cleanFileCache($name, int $storageId): void {
		$sql = "delete from `*PREFIX*filecache` where (path like 'thumbnails/$name/%' or path = 'thumbnails/$name') and storage = ?";
		$this->connection->executeQuery($sql, [$storageId])->rowCount();
	}
}
