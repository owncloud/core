<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OC\Repair;

use Doctrine\DBAL\Platforms\MySqlPlatform;
use OCP\DB\QueryBuilder\IQueryBuilder;
use Doctrine\DBAL\Platforms\OraclePlatform;
use OC\Hooks\BasicEmitter;

/**
 * Repairs file cache entry which path do not match the parent-child relationship
 */
class RepairMismatchFileCachePath extends BasicEmitter implements \OC\RepairStep {

	const CHUNK_SIZE = 200;

	/** @var \OCP\IDBConnection */
	protected $connection;

	/**
	 * @param \OCP\IDBConnection $connection
	 */
	public function __construct($connection) {
		$this->connection = $connection;
	}

	public function getName() {
		return 'Repair file cache entries with path that does not match parent-child relationships';
	}

	/**
	 * Fixes the broken entry's path.
	 *
	 * @param int $fileId file id of the entry to fix
	 * @param string $wrongPath wrong path of the entry to fix
	 * @param int $correctStorageNumericId numeric idea of the correct storage
	 * @param string $correctPath value to which to set the path of the entry 
	 * @return bool true for success
	 */
	private function fixEntryPath($fileId, $wrongPath, $correctStorageNumericId, $correctPath) {
		$this->connection->beginTransaction();
		// delete target if exists
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('filecache')
			->where($qb->expr()->eq('storage', $qb->createNamedParameter($correctStorageNumericId)))
			->andWhere($qb->expr()->eq('path', $qb->createNamedParameter($correctPath)));
		$entryExisted = $qb->execute() > 0;

		$qb = $this->connection->getQueryBuilder();
		$qb->update('filecache')
			->set('path', $qb->createNamedParameter($correctPath))
			->set('path_hash', $qb->createNamedParameter(md5($correctPath)))
			->set('storage', $qb->createNamedParameter($correctStorageNumericId))
			->where($qb->expr()->eq('fileid', $qb->createNamedParameter($fileId)));
		$qb->execute();

		$this->connection->commit();
	}

	private function addQueryConditions($qb) {
		// thanks, VicDeo!
		if ($this->connection->getDatabasePlatform() instanceof MySqlPlatform) {
			$concatFunction = $qb->createFunction("CONCAT(fcp.path, '/', fc.name)");
		} else {
			$concatFunction = $qb->createFunction("(fcp.`path` || '/' || fc.`name`)");
		}

		if ($this->connection->getDatabasePlatform() instanceof OraclePlatform) {
			$emptyPathExpr = $qb->expr()->isNotNull('fcp.path');
		} else {
			$emptyPathExpr = $qb->expr()->neq('fcp.path', $qb->expr()->literal(''));
		}

		$qb
			->from('filecache', 'fc')
			->from('filecache', 'fcp')
			->where($qb->expr()->eq('fc.parent', 'fcp.fileid'))
			->andWhere(
				$qb->expr()->orX(
					$qb->expr()->neq(
						$qb->createFunction($concatFunction),
						'fc.path'
					),
					$qb->expr()->neq('fc.storage', 'fcp.storage')
				)
			)
			->andWhere($emptyPathExpr)
			// yes, this was observed in the wild...
			->andWhere($qb->expr()->neq('fc.fileid', 'fcp.fileid'));
	}

	private function countResultsToProcess() {
		$qb = $this->connection->getQueryBuilder();
		$qb->select($qb->createFunction('COUNT(*)'));
		$this->addQueryConditions($qb);
		$results = $qb->execute();
		$count = $results->fetchColumn(0);
		$results->closeCursor();
		return $count;
	}

	/**
	 * Repair all entries for which the parent entry exists but the path
	 * value doesn't match the parent's path.
	 *
	 * @return int number of results that were fixed
	 */
	private function fixEntriesWithCorrectParentIdButWrongPath() {
		$totalResultsCount = 0;

		// find all entries where the path entry doesn't match the path value that would
		// be expected when following the parent-child relationship, basically
		// concatenating the parent's "path" value with the name of the child
		$qb = $this->connection->getQueryBuilder();
		$qb->select('fc.storage', 'fc.fileid', 'fc.name')
			->selectAlias('fc.path', 'path')
			->selectAlias('fc.parent', 'wrongparentid')
			->selectAlias('fcp.storage', 'parentstorage')
			->selectAlias('fcp.path', 'parentpath');
		$this->addQueryConditions($qb);
		$qb->setMaxResults(self::CHUNK_SIZE);

		do {
			$results = $qb->execute();
			// since we're going to operate on fetched entry, better cache them
			// to avoid DB lock ups
			$rows = $results->fetchAll();
			$results->closeCursor();

			$lastResultsCount = 0;
			foreach ($rows as $row) {
				$wrongPath = $row['path'];
				$correctPath = $row['parentpath'] . '/' . $row['name'];
				// make sure the target is on a different subtree
				if (substr($correctPath, 0, strlen($wrongPath)) === $wrongPath) {
					// the path based parent entry is referencing one of its own children, skipping
					// fix the entry's parent id instead
					// note: fixEntryParent cannot fail to find the parent entry by path
					// here because the reason we reached this code is because we already
					// found it
					$this->fixEntryParent(
						$row['storage'],
						$row['fileid'],
						$row['path'],
						$row['wrongparentid']
					);
				} else {
					$this->fixEntryPath(
						$row['fileid'],
						$wrongPath,
						$row['parentstorage'],
						$correctPath
					);
				}
				$lastResultsCount++;
			}

			$totalResultsCount += $lastResultsCount;

			// note: this is not pagination but repeating the query over and over again
			// until all possible entries were fixed
		} while ($lastResultsCount > 0);

		if ($totalResultsCount > 0) {
			$this->emit('\OC\Repair', 'info', array("Fixed $totalResultsCount file cache entries with wrong path"));
		}

		return $totalResultsCount;
	}

	/**
	 * Fixes the broken entry's path.
	 *
	 * @param int $storageId storage id of the entry to fix
	 * @param int $fileId file id of the entry to fix
	 * @param string $path path from the entry to fix
	 * @param int $wrongParentId wrong parent id
	 * @return bool true if the entry was fixed, false otherwise
	 */
	private function fixEntryParent($storageId, $fileId, $path, $wrongParentId) {
		$this->connection->beginTransaction();

		$parentPath = dirname($path);
		if ($parentPath === '.') {
			$parentPath = '';
		}

		// find the correct parent
		$qb = $this->connection->getQueryBuilder();
		// select fileid as "correctparentid"
		$qb->select('fileid')
			// from oc_filecache
			->from('filecache')
			// where storage=$storage and path='$parentPath'
			->where($qb->expr()->eq('storage', $qb->createNamedParameter($storageId)))
			->andWhere($qb->expr()->eq('path', $qb->createNamedParameter($parentPath)));
		$results = $qb->execute();
		$rows = $results->fetchAll();
		$results->closeCursor();

		if (empty($rows)) {
			// not the case we want to fix!
			$this->connection->commit();
			return false;
		}

		$correctParentId = $rows[0]['fileid'];

		$qb = $this->connection->getQueryBuilder();
		$qb->update('filecache')
			->set('parent', $qb->createNamedParameter($correctParentId))
			->where($qb->expr()->eq('fileid', $qb->createNamedParameter($fileId)));
		$qb->execute();

		$this->connection->commit();

		return true;
	}

	/**
	 * Repair entries where the parent id doesn't point to any existing entry
	 * by finding the actual parent entry matching the entry's path dirname.
	 * 
	 * @return int number of results that were fixed
	 */
	private function fixEntriesWithNonExistingParentIdEntry() {
		// Subquery for parent existence
		$qbe = $this->connection->getQueryBuilder();
		$qbe->select($qbe->expr()->literal('1'))
			->from('filecache', 'fce')
			->where($qbe->expr()->eq('fce.fileid', 'fc.parent'));

		$qb = $this->connection->getQueryBuilder();

		// Find entries to repair
		// select fc.storage,fc.fileid,fc.parent as "wrongparent",fc.path,fc.etag
		// and not exists (select 1 from oc_filecache fc2 where fc2.fileid = fc.parent)
		$qb->select('storage', 'fileid', 'path', 'parent')
			// from oc_filecache fc
			->from('filecache', 'fc')
			// where fc.parent <> -1
			->where($qb->expr()->neq('fc.parent', $qb->createNamedParameter(-1)))
			// and not exists (select 1 from oc_filecache fc2 where fc2.fileid = fc.parent)
			->andWhere(
				$qb->expr()->orX(
					$qb->expr()->eq('fc.fileid', 'fc.parent'),
					$qb->createFunction('NOT EXISTS (' . $qbe->getSQL() . ')'))
				)
			->andWhere($qb->expr()->notIn('fileid', $qb->createParameter('excludedids')));
		$qb->setMaxResults(self::CHUNK_SIZE);

		$totalResultsCount = 0;
		$blacklist = [-1];
		do {
			$qb->setParameter('excludedids', $blacklist, IQueryBuilder::PARAM_INT_ARRAY);
			$results = $qb->execute();
			// since we're going to operate on fetched entry, better cache them
			// to avoid DB lock ups
			$rows = $results->fetchAll();
			$results->closeCursor();

			$lastResultsCount = 0;
			foreach ($rows as $row) {
				if ($this->fixEntryParent(
					$row['storage'],
					$row['fileid'],
					$row['path'],
					$row['parent']
				)) {
					$lastResultsCount++;
				} else {
					$blacklist[] = $row['fileid'];
				};
			}

			$totalResultsCount += $lastResultsCount;

			// note: this is not pagination but repeating the query over and over again
			// until all possible entries were fixed
		} while ($lastResultsCount > 0);

		if ($totalResultsCount > 0) {
			$this->emit('\OC\Repair', 'info', array("Fixed $totalResultsCount file cache entries with wrong parent"));
		}

		// remove first entry which is -1
		array_shift($blacklist);
		if (!empty($blacklist)) {
			$chunks = array_chunk($blacklist, 100);
			foreach ($chunks as $chunk) {
				$this->emit(
					'\OC\Repair',
					'warning',
					array('The entries with the following file ids could not be repaired because the matching parent was not found: ' . implode(', ', $chunk))
				);
			}
		}

		return $totalResultsCount;
	}

	/**
	 * Run the repair step
	 */
	public function run() {
		$totalFixed = 0;

		/*
		 * This repair itself might overwrite existing target parent entries and create
		 * orphans where the parent entry of the parent id doesn't exist but the path matches.
		 * This needs to be repaired by fixEntriesWithNonExistingParentIdEntry(), this is why
		 * we need to keep this specific order of repair.
		 */
		$totalFixed += $this->fixEntriesWithCorrectParentIdButWrongPath();

		$totalFixed += $this->fixEntriesWithNonExistingParentIdEntry();

		if ($totalFixed > 0) {
			$this->emit('\OC\Repair', 'warning', array('Please run `occ files:scan --all` once to complete the repair'));
		}
	}
}
