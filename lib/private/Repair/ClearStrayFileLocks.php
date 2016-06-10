<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

use OCP\IDBConnection;
use OCP\Migration\IRepairStep;
use OCP\Migration\IOutput;

/**
 * Repair step that clears stray file locks
 */
class ClearStrayFileLocks implements IRepairStep {
	/**
	 * @var IDBConnection
	 **/
	protected $connection;

	/**
	 * @param \OCP\IDBConnection $connection
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
		return 'Clear stray file locks';
	}

	/**
	 * Run repair step.
	 * Must throw exception on error.
	 *
	 * @throws \Exception in case of failure
	 */
	public function run(IOutput $output) {
		$qb = $this->connection->getQueryBuilder();
		$qb->update('file_locks')
			->set('lock', $qb->expr()->literal(0))
			->where($qb->expr()->neq('lock', $qb->expr()->literal(0)));

		$result = $qb->execute();
		$output->info('Cleared ' . $result . ' stray locks');
	}
}
