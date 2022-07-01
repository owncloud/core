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

use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Platforms\OraclePlatform;
use OCP\Files\Folder;
use OCP\IDBConnection;

class PreviewCleanup {

	/**
	 * @var IDBConnection
	 */
	private $connection;

	public function __construct(IDBConnection $connection) {
		$this->connection = $connection;
	}

	public function process(bool $all = false, int $chunkSize = 1000, \Closure $progress = null): int {
		$root = \OC::$server->getLazyRootFolder();
		$count = 0;

		$lastFileId = 0;
		while (true) {
			$rows = $this->queryPreviewsToDelete($lastFileId, $chunkSize);
			foreach ($rows as $row) {
				$name = $row['name'];
				$userId = $row['user_id'];
				$lastFileId = $row['fileid'];

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
		$isOracle = ($this->connection->getDatabasePlatform() instanceof OraclePlatform);

		$sql = "select `fileid`, `name`, `user_id` from `*PREFIX*filecache` `fc`
join `*PREFIX*mounts` on `storage` = `storage_id`
where `parent` in (select `fileid` from `*PREFIX*filecache` where `storage` in (select `numeric_id` from `oc_storages` where `id` like 'home::%' or `id` like 'object::user:%') and `path` = 'thumbnails')
  and not exists(select `fileid` from `*PREFIX*filecache` where `fc`.`name` = CAST(`*PREFIX*filecache`.`fileid` as CHAR(24)))
  and `fc`.`fileid` > ?
  order by `user_id`, `fileid`";

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
