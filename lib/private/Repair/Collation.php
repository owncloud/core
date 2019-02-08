<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

use Doctrine\DBAL\Platforms\MySqlPlatform;
use OCP\IDBConnection;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;

class Collation implements IRepairStep {

	/** @var \OCP\IConfig */
	protected $config;

	/** @var IDBConnection */
	protected $connection;

	/**
	 * @param \OCP\IConfig $config
	 * @param IDBConnection $connection
	 */
	public function __construct($config, IDBConnection $connection) {
		$this->connection = $connection;
		$this->config = $config;
	}

	public function getName() {
		return 'Repair MySQL collation';
	}

	/**
	 * Fix mime types
	 *
	 * @param IOutput $output
	 */
	public function run(IOutput $output) {
		if (!$this->connection->getDatabasePlatform() instanceof MySqlPlatform) {
			$output->info('Not a mysql database -> nothing to do');
			return;
		}

		$characterSet = $this->config->getSystemValue('mysql.utf8mb4', false) ? 'utf8mb4' : 'utf8';

		$tables = $this->getAllNonUTF8BinTables($this->connection);
		foreach ($tables as $table) {
			$output->info("Change collation for $table ...");
			if ($characterSet === 'utf8mb4') {
				// need to set row compression first
				$query = $this->connection->prepare('ALTER TABLE `' . $table . '` ROW_FORMAT=COMPRESSED;');
				$query->execute();
			}
			$query = $this->connection->prepare('ALTER TABLE `' . $table . '` CONVERT TO CHARACTER SET ' . $characterSet . ' COLLATE ' . $characterSet . '_bin;');
			$query->execute();
		}
		if (empty($tables)) {
			$output->info('All tables already have the correct collation -> nothing to do');
		}
	}

	/**
	 * @param IDBConnection $connection
	 * @return string[]
	 */
	protected function getAllNonUTF8BinTables(IDBConnection $connection) {
		$dbPrefix = $this->config->getSystemValue("dbtableprefix");
		$dbName = $this->config->getSystemValue("dbname");
		$characterSet = $this->config->getSystemValue('mysql.utf8mb4', false) ? 'utf8mb4' : 'utf8';

		// fetch tables by columns
		$statement = $connection->executeQuery(
			"SELECT DISTINCT(TABLE_NAME) AS `table`" .
			"	FROM INFORMATION_SCHEMA . COLUMNS" .
			"	WHERE TABLE_SCHEMA = ?" .
			"	AND (COLLATION_NAME <> '" . $characterSet . "_bin' OR CHARACTER_SET_NAME <> '" . $characterSet . "')" .
			"	AND TABLE_NAME LIKE ?",
			[$dbName, $dbPrefix.'%']
		);
		$rows = $statement->fetchAll();
		$result = [];
		foreach ($rows as $row) {
			$result[$row['table']] = true;
		}

		// fetch tables by collation
		$statement = $connection->executeQuery(
			"SELECT DISTINCT(TABLE_NAME) AS `table`" .
			"	FROM INFORMATION_SCHEMA . TABLES" .
			"	WHERE TABLE_SCHEMA = ?" .
			"	AND TABLE_COLLATION <> '" . $characterSet . "_bin'" .
			"	AND TABLE_NAME LIKE ?",
			[$dbName, $dbPrefix.'%']
		);
		$rows = $statement->fetchAll();
		foreach ($rows as $row) {
			$result[$row['table']] = true;
		}

		return \array_keys($result);
	}
}
