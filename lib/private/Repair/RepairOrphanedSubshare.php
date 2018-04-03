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

	/** @var IQueryBuilder  */
	private $deleteOrphanReshares;

	/** @var  int */
	private $pageLimit;

	/**
	 * RepairOrphanedSubshare constructor.
	 *
	 * @param IDBConnection $connection
	 */
	public function __construct(IDBConnection $connection, $pageLimit = 1000) {
		$this->connection = $connection;
		$this->pageLimit = $pageLimit;

		//This delete query deletes orphan shares whose parents are missing
		$this->deleteOrphanReshares = $this->connection->getQueryBuilder();
		$this->deleteOrphanReshares
			->delete('share')
			->where(
				$this->deleteOrphanReshares->expr()->eq('parent',
					$this->deleteOrphanReshares->createParameter('parentId'))
			);
		//Set the query to get the parent id's missing from the table.
		$this->missingParents = $this->connection->getQueryBuilder();
		$qb = $this->connection->getQueryBuilder();

		$qb->select('s2.id')
			->from('share', 's2')
			->where($this->missingParents->expr()->eq('s2.id', 's1.parent'));
		$this->missingParents->select('parent')
			->from('share', 's1');
		$this->missingParents->where($this->missingParents->expr()->isNotNull('parent'));
		$this->missingParents->andWhere($this->missingParents->createFunction('NOT EXISTS (' . $qb->getSQL() . ')'));
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

		/** A one time call to get missing parents from oc_share table */
		do {
			$this->missingParents->setMaxResults($this->pageLimit);
			$results = $this->missingParents->execute();
			$rows = $results->fetchAll();
			$results->closeCursor();
			if (count($rows) > 0) {
				$this->connection->beginTransaction();
				foreach ($rows as $row) {
					$this->deleteOrphanReshares->setParameter('parentId', $row['parent'])->execute();
				}
				$this->connection->commit();
			}

		} while (!empty($rows));
	}
}
