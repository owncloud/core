<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 */

namespace OC\Core\Command\Maintenance;

use OCP\IDBConnection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckConsistency extends Command {

	/** @var String */
	protected $dataDir;
	/** @var String */
	protected $prefix;
	/** @var IDBConnection */
	protected $db;

	public function __construct($dataDir, $prefix, IDBConnection $databaseConnection) {
		$this->dataDir = $dataDir;
		$this->prefix = $prefix;
		$this->db = $databaseConnection;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('maintenance:check-consistency')
			->setDescription('check for database consistency');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		/**
		 * Check for storages with wrong data dir - it compares also against
		 * data dir without the additional slash
		 */
		$stmt = $this->db->executeQuery('SELECT id FROM ' . $this->prefix .
			'storages WHERE id NOT LIKE "local::' . $this->dataDir .
			'%" AND id LIKE "local::%" AND id <> "local::' .
			substr($this->dataDir, 0, strlen($this->dataDir) - 1) . '"');

		$oldDataDirs = $stmt->fetchAll(\PDO::FETCH_COLUMN);
		$stmt->closeCursor();
		if (count($oldDataDirs) > 0) {
			$output->writeln('There are ' . count($oldDataDirs) .
				' storages in place with an old data dir:');

			foreach($oldDataDirs as $dir) {
				$output->writeln($dir);
			}
		}

	}
}
