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

	/**
	 * RepairOrphanedSubshare constructor.
	 *
	 * @param IDBConnection $connection
	 */
	public function __construct(IDBConnection $connection) {
		$this->connection = $connection;
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
		/**
		 * DELETE FROM share
		 * WHERE parent NOT IN (
		 * 		SELECT id FROM (
		 * 			SELECT id FROM share
		 * 			ORDER BY id -- to prevent derived table merge
		 * 		) mysqlerr1093hack
		 * )
		 */

		// subselect for all share ids
		$allShares = $this->connection->getQueryBuilder()
			->select('id')
			->from('share')
			->orderBy('id'); // to prevent derived table merge, see https://mariadb.com/kb/en/library/derived-table-merge-optimization/#factsheet

		// TODO this subquery currently cannot be built with our doctrine wrapper
		// TODO make the mysql hack optional? might also be needed for oracle
		$subquery = "SELECT `id` FROM ({$allShares->getSQL()}) mysqlerr1093hack";

		//This delete query deletes orphan shares whose parents are missing
		$deleteOrphanReshares = $this->connection->getQueryBuilder();
		$deleteOrphanReshares
			->delete('share')
			->where($deleteOrphanReshares->expr()->notIn('parent',
			$deleteOrphanReshares->createFunction($subquery)));
		$deleteOrphanReshares->execute();
	}
}
