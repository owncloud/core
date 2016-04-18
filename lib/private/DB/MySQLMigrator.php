<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OC\DB;

use Doctrine\DBAL\Schema\Index;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\Table;

class MySQLMigrator extends Migrator {
	/**
	 * @param Schema $targetSchema
	 * @param \Doctrine\DBAL\Connection $connection
	 * @return \Doctrine\DBAL\Schema\SchemaDiff
	 */
	public function getDiff(Schema $targetSchema, \Doctrine\DBAL\Connection $connection) {
		$platform = $connection->getDatabasePlatform();
		$platform->registerDoctrineTypeMapping('enum', 'string');
		$platform->registerDoctrineTypeMapping('bit', 'string');

		$schemaDiff = parent::getDiff($targetSchema, $connection);

		foreach ($schemaDiff->changedTables as $tableDiff) {
			// identifiers need to be quoted for mysql
			$tableDiff->name = $this->connection->quoteIdentifier($tableDiff->name);
			foreach ($tableDiff->changedColumns as $column) {
				$column->oldColumnName = $this->connection->quoteIdentifier($column->oldColumnName);
			}

			// adjust max index length if needed
			$addedIndexes = [];
			foreach ($tableDiff->addedIndexes as $index) {
				if ($index->hasOption('oc-length')) {
					$columnLength = $index->getOption('oc-length');
					$columns = [];
					foreach ($index->getUnquotedColumns() as $c) {
						$quotedC = $this->connection->quoteIdentifier($c);
						if (array_key_exists($quotedC, $columnLength)) {
							$l = $columnLength[$quotedC];
							// HACK: the whitespace in the beginning prevents Doctrine to remove the quotes
							$c = "$c($l)";
						}
						$columns[]= $c;
					}
					$newIndex = new Index($index->getName(), $columns);
					$addedIndexes[] = $newIndex;
				} else {
					$addedIndexes[] = $index;
				}
			}
			$tableDiff->addedIndexes = $addedIndexes;
		}

		return $schemaDiff;
	}
	
        /**
         * Speed up migration test by disabling autocommit and unique indexes check
         *
         * @param \Doctrine\DBAL\Schema\Table $table
         * @throws \OC\DB\MigrationException
         */
        protected function checkTableMigrate(Table $table) {
                $this->connection->exec('SET autocommit=0');
                $this->connection->exec('SET unique_checks=0');

                try {
                        parent::checkTableMigrate($table);
                } catch (\Exception $e) {
                        $this->connection->exec('SET unique_checks=1');
                        $this->connection->exec('SET autocommit=1');
                        throw new MigrationException($table->getName(), $e->getMessage());
                }
                $this->connection->exec('SET unique_checks=1');
                $this->connection->exec('SET autocommit=1');
        }

}
