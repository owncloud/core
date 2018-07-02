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
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;

class RepairSubShares implements IRepairStep {

	/** @var IDBConnection  */
	private $connection;

	/** @var  IQueryBuilder */
	private $getDuplicateRows;

	/** @var  IQueryBuilder */
	private $deleteShareId;

	public function __construct(
		IDBConnection $connection) {
		$this->connection = $connection;
	}

	public function getName() {
		return "Repair sub shares";
	}

	/**
	 * Set query to remove duplicate rows.
	 * i.e, except id all columns are same for oc_share
	 * Also set query to select rows which have duplicate rows of share.
	 */
	private function setRemoveAndSelectQuery() {
		/**
		 * Retrieves the duplicate rows with different id's
		 * of oc_share
		 */
		$builder = $this->connection->getQueryBuilder();
		$builder
			->select('id', 'parent', $builder->createFunction('count(*)'))
			->from('share')
			->where($builder->expr()->eq('share_type', $builder->createNamedParameter(2)))
			->groupBy('parent')
			->addGroupBy('id')
			->addGroupBy('share_with')
			->having('count(*) > 1')->setMaxResults(1000);

		$this->getDuplicateRows = $builder;

		$builder = $this->connection->getQueryBuilder();
		$builder
			->delete('share')
			->where($builder->expr()->eq('id', $builder->createParameter('shareId')));

		$this->deleteShareId = $builder;
	}

	public function run(IOutput $output) {
		$deletedEntries = 0;
		$this->setRemoveAndSelectQuery();

		/**
		 * Going for pagination because if there are 1 million rows
		 * it wont be easy to scale the data
		 */
		do {
			$results = $this->getDuplicateRows->execute();
			$rows = $results->fetchAll();
			$results->closeCursor();
			$lastResultCount = 0;

			foreach ($rows as $row) {
				$deletedEntries += $this->deleteShareId->setParameter('shareId', (int) $row['id'])
					->execute();
				$lastResultCount++;
			}
		} while ($lastResultCount > 0);

		if ($deletedEntries > 0) {
			$output->info('Removed ' . $deletedEntries . ' shares where duplicate rows where found');
		}
	}
}
