<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;

/**
 * Class JobHash
 *
 * @package OC\Repair
 */
class JobHash implements IRepairStep {

	/** @var IDBConnection */
	protected $connection;

	/**
	 * JobHash constructor.
	 *
	 * @param IDBConnection $connection
	 */
	public function __construct(IDBConnection $connection) {
		$this->connection = $connection;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'Add hash to job table to allow quick lookup';
	}

	/**
	 * @param IOutput $output
	 */
	public function run(IOutput $output) {
		while(true) {
			$qb = $this->connection->getQueryBuilder();
			$qb->select('id', 'class', 'argument')
				->from('jobs')
				->where($qb->expr()->isNull('hash'))
				->setMaxResults(1000);

			$cursor = $qb->execute();
			$data = $cursor->fetchAll();
			$cursor->closeCursor();

			if (count($data) === 0) {
				break;
			}

			$hashes = [];
			foreach ($data as $d) {
				if ($d['argument'] === null || $d['argument'] === '') {
					$d['argument'] = json_encode(null);

					$qb = $this->connection->getQueryBuilder();
					$qb->update('jobs')
						->set('argument', $qb->expr()->literal($d['argument']));
					$qb->execute();
				}

				$hashes[$d['id']] = sha1($d['class'] . $d['argument']);
			}

			foreach ($hashes as $id => $hash) {
				$qb = $this->connection->getQueryBuilder();
				$qb->update('jobs')
					->set('hash', $qb->createNamedParameter($hash))
					->where($qb->expr()->eq('id', $qb->createNamedParameter($id)));
				$qb->execute();
			}
		}
	}
}
