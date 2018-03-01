<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OC\Repair;

use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;

class RepairOrphanedSubshare implements IRepairStep {

	/** @var IDBConnection  */
	private $connection;

	/** @var  IQueryBuilder */
	private $missingParents;

	/** @var  IQueryBuilder */
	private $deleteOrphanReshares;

	/**
	 * RepairOrphanedSubshare constructor.
	 *
	 * @param IDBConnection $connection
	 */
	public function __construct(IDBConnection $connection) {
		$this->connection = $connection;

		//This delete query deletes orphan shares whose parents are missing
		$this->deleteOrphanReshares = $this->connection->getQueryBuilder();
		$this->deleteOrphanReshares
			->delete('share')
			->where(
				$this->deleteOrphanReshares->expr()->eq('parent',
					$this->deleteOrphanReshares->createParameter('parentId')));


		//Set the query to get the parent id's missing from the table.
		$this->missingParents = $this->connection->getQueryBuilder();
		$qb = $this->connection->getQueryBuilder();

		$qb->select('id')
			->from('share');
		$this->missingParents->select('parent')
			->from('share');
		$this->missingParents->where($this->missingParents->expr()->isNotNull('parent'));
		$this->missingParents->andWhere($this->missingParents->expr()->notIn('parent', $this->missingParents->createFunction($qb->getSQL())));
		$this->missingParents->groupBy('parent');
	}

	/**
	 * Returns the step's name
	 *
	 * @return string
	 */
	public function getName() {
		return 'Repair orphaned reshare';
	}

	/**
	 * Run repair step.
	 * Must throw exception on error.
	 *
	 * @param IOutput $output
	 * @throws \Exception in case of failure
	 */
	public function run(IOutput $output) {
		$pageLimit = 1000;
		$paginationOffset = 0;
		$deleteParents = [];

		/** A one time call to get missing parents from oc_share table */
		do {
			$this->missingParents->setMaxResults($pageLimit);
			$this->missingParents->setFirstResult($paginationOffset);
			$results = $this->missingParents->execute();
			$rows = $results->fetchAll();
			$results->closeCursor();
			if (count($rows) > 0) {
				$paginationOffset += $pageLimit;
				foreach ($rows as $row) {
					$this->deleteOrphanReshares->setParameter('parentId', $row['parent'])->execute();
				}
			}

		} while (empty($rows));
	}
}
