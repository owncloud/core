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
	 * Get query builder to select rows which have duplicate rows of share
	 * @return IQueryBuilder
	 */
	private function getSelectQueryToDetectDuplicatesBuilder() {
		/**
		 * Retrieves the duplicate rows with different id's
		 * of oc_share. The query would look like:
		 * SELECT id
		 * FROM oc_share
		 * WHERE id NOT IN (
		 * 		SELECT MIN(id)
		 * 		FROM oc_share
		 * 		GROUP BY share_with, parent
		 * )
		 * AND share_type=2;
		 */
		$builder = $this->connection->getQueryBuilder();
		$subQuery = $this->connection->getQueryBuilder();
		$subQuery
			->select($subQuery->createFunction('MIN(`id`)'))
			->from('share')
			->groupBy('share_with')
			->addGroupBy('parent');

		$builder->select('id')
			->from('share')
			->where($builder->expr()->notIn('id', $builder->createFunction($subQuery->getSQL())))
			->andWhere($builder->expr()->eq('share_type', $builder->createNamedParameter(2)));
		return $builder;
	}

	/**
	 * Get query builder to delete rows which have duplicate rows of share based
	 * on ids
	 * @return IQueryBuilder
	 */
	private function getDeleteShareIdsBuilder() {
		$builder = $this->connection->getQueryBuilder();
		$builder
			->delete('share')
			->where($builder->expr()->in('id', $builder->createParameter('shareIds')));
		return $builder;
	}

	public function run(IOutput $output) {
		$deletedEntries = 0;
		$selectDuplicates = $this->getSelectQueryToDetectDuplicatesBuilder();

		$results = $selectDuplicates->execute();
		$rows = $results->fetchAll();
		$results->closeCursor();
		$rowIds = [];
		if (\count($rows) > 0) {
			$rowIds = \array_map(
				function ($value) {
					return (int)$value['id'];
				},
				$rows
			);
		}

		if (\count($rows) > 0) {
			//Delete in a batch of 1000 ids
			$deleteShareIds = $this->getDeleteShareIdsBuilder();
			foreach (\array_chunk($rowIds, 1000) as $getIds) {
				$deletedEntries += $deleteShareIds->setParameter('shareIds', $getIds, IQueryBuilder::PARAM_INT_ARRAY)
					->execute();
			}
		}

		if ($deletedEntries > 0) {
			$output->info('Removed ' . $deletedEntries . ' shares where duplicate rows where found');
		}
	}
}
