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

use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use OC\Share\Constants;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\IUserManager;
use OCP\IUser;
use OCP\IGroupManager;
use OC\Share20\DefaultShareProvider;

/**
 * The UserMountCache used to store the shared::/ storages in the "oc_mounts" table which
 * is wrong. The "oc_mounts" cache must contain a direct reference to the target storage
 * of the sharer. This repair step fixes this by checking whether the stored root id matches
 * the referred storage id. When it doesn't, it will adjust it to the correct target storage.
 */
class RepairShareMountEntries implements IRepairStep {

	const CHUNK_SIZE = 100;

	/** @var \OCP\IConfig */
	protected $config;

	/** @var \OCP\IDBConnection */
	protected $connection;

	/**
	 * @param \OCP\IConfig $config
	 * @param \OCP\IDBConnection $connection
	 */
	public function __construct(
		IConfig $config,
		IDBConnection $connection
	) {
		$this->connection = $connection;
		$this->config = $config;
	}

	public function getName() {
		return 'Repair share entries in user mount cache';
	}

	private function countBrokenEntries() {
		$query = $this->connection->getQueryBuilder();
		$query->select($query->createFunction('count(*)'))
			->from('mounts', 'm')
			->innerJoin('m', 'filecache', 'f', $query->expr()->eq('m.root_id', 'f.fileid'))
			->where($query->expr()->neq('m.storage_id', 'f.storage'));
		return $query->execute()->fetchColumn();
	}

	private function repairMountEntries(IOutput $output) {
		$pageSize = self::CHUNK_SIZE;
		$query = $this->connection->getQueryBuilder();
		$query = $query->select('id')
			->from('mounts', 'm')
			->innerJoin('m', 'filecache', 'f', $query->expr()->eq('m.root_id', 'f.fileid'))
			->where($query->expr()->neq('m.storage_id', 'f.storage'))
			->setMaxResults($pageSize);

		$deleteQuery = $this->connection->getQueryBuilder();
		$deleteQuery->delete('mounts')
			->where($query->expr()->in('id', $query->createParameter('ids')));

		do {
			$results = $query->execute();

			$idsToDelete = [];
			while ($result = $results->fetch()) {
				$idsToDelete[] = $result['id'];
			}

			$resultsCount = count($idsToDelete);
			if ($resultsCount) {
				$deleteQuery->setParameter('ids', $idsToDelete, IQueryBuilder::PARAM_INT_ARRAY);
				$deleteQuery->execute();
			}

			$output->advance($resultsCount);

		} while ($resultsCount > 0);
	}

	public function run(IOutput $output) {
		$ocVersionFromBeforeUpdate = $this->config->getSystemValue('version', '0.0.0');
		if (version_compare($ocVersionFromBeforeUpdate, '9.1.0.17', '<')) {
			// this situation was only possible after 9.0.0

			$count = $this->countBrokenEntries();
			$output->startProgress($count);

			$this->repairMountEntries($output);

			$output->finishProgress();
		}
	}
}
