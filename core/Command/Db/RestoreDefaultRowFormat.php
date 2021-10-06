<?php
/**
 * @author Jan Ackermann <jackermann@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace OC\Core\Command\Db;

use Doctrine\DBAL\Platforms\MySqlPlatform;
use OCP\IConfig;
use OCP\IDBConnection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RestoreDefaultRowFormat extends Command {
	/** @var IConfig */
	private $config;

	/** @var IDBConnection */
	private $connection;

	/**
	 * @param IConfig $config
	 * @param IDBConnection $connection
	 */
	public function __construct(IConfig $config, IDBConnection $connection) {
		$this->config = $config;
		$this->connection = $connection;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('db:restore-default-row-format')
			->setDescription('Restore default row format of MySQL/MariaDB tables.');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		if (!$this->connection->getDatabasePlatform() instanceof MySqlPlatform) {
			$output->writeln("<error>This command is only valid for MySQL/MariaDB databases.</error>");
			return 1;
		}

		$dbPrefix = $this->config->getSystemValue("dbtableprefix");
		$dbName = $this->config->getSystemValue("dbname");

		$defaultRowFormatStatement = $this->connection->executeQuery("SELECT @@GLOBAL.innodb_default_row_format as 'default'");
		$defaultFormat = $defaultRowFormatStatement->fetchColumn();

		/**
		 * Fetch tables with the row_format not matching default.
		 */
		$tableSelectStatement = $this->connection->executeQuery(
			"SELECT DISTINCT(TABLE_NAME) AS `name`, LOWER(ROW_FORMAT) as `format`" .
			"	FROM INFORMATION_SCHEMA . TABLES" .
			"	WHERE TABLE_SCHEMA = ?" .
			"	AND TABLE_NAME LIKE ?" .
			"	AND ROW_FORMAT != ?",
			[$dbName, $dbPrefix.'%', $defaultFormat]
		);
		$tables = $tableSelectStatement->fetchAll();
		$tablesCount = \count($tables);

		$output->writeln("<info>Found $tablesCount tables to convert</info>");

		// Update row_format to DEFAULT
		foreach ($tables as $table) {
			$tableName = $table["name"];
			$tableRowFormat = $table["format"];
			$output->writeln("<info>Converting table '$tableName' with row format '$tableRowFormat' to default value '$defaultFormat'</info>");

			$alterTableQuery = $this->connection->prepare('ALTER TABLE `' . $tableName . '` ROW_FORMAT=DEFAULT;');
			$alterTableQuery->execute();
		}

		$output->writeln("<info>Conversion done</info>");
		return 0;
	}
}
