<?php
/**
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

namespace OCA\files_external\Migrations;

use OC\Files\Storage\Wrapper\Wrapper;
use OCP\IDBConnection;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Migration\ISqlMigration;
use OCP\IUser;
use OCP\Files\Mount\IMountPoint;
use OCA\Files_External\Lib\Storage\SMB;

/**
 * Auto-generated migration step: Please modify to your needs!
 */
class Version20180215133329 implements ISqlMigration {

	public function sql(IDBConnection $connection) {
		$userManager = \OC::$server->getUserManager();
		$mountProviderCollection = \OC::$server->getMountProviderCollection();
		$changeMap = [];
		$userManager->callForSeenUsers(function(IUser $user) use ($mountProviderCollection, &$changeMap){
			$mountPoints = $mountProviderCollection->getMountsForUser($user);
			$changeMap = $this->processMountPoints($mountPoints, $changeMap);
		});

		$queries = [];
		foreach ($changeMap as $oldId => $newId) {
			if ($oldId !== $newId) {
				if (strlen($oldId) > 64) {
					$oldId = md5($oldId);
				}
				if (strlen($newId) > 64) {
					$newId = md5($newId);
				}
				$qb = $connection->getQueryBuilder();
				$qb->update('storages')
					->set('id', $qb->expr()->literal($newId))
					->where($qb->expr()->eq('id', $qb->expr()->literal($oldId)));
				$queries[] = $qb->getSQL();
			}
		}
		return $queries;
	}

	/**
	 */
	private function processMountPoints(array $mountPoints, array $baseData) {
		foreach ($mountPoints as $mountPoint) {
			$storage = $mountPoint->getStorage();
			while ($storage instanceof Wrapper) {
				$storage = $storage->getWrapperStorage();
			}
			if (get_class($storage) === SMB::class) {
				$oldId = $storage->getOldId();
				$newId = $storage->getId();
				if ($oldId === $newId) {
					// if the id didn't change, overwrite and prioritize this storage. The other storage will
					// need to generate a new id
					$baseData[$oldId] = $newId;
				} else {
					// first come, first served
					if (!isset($baseData[$oldId])) {
						$baseData[$oldId] = $newId;
					}
				}
				\OC\Files\Cache\Storage::remove($newId);
			} else {
				// we should log something somewhere.
			}
		}
		return $baseData;
	}
}

