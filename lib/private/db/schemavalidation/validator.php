<?php
/**
 * Copyright (c) 2014 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\DB\SchemaValidation;

class Validator {

	const VIOLATION_DUPLICATE_KEY = "duplicate-key";


	private $connection;

	private $schemaDiff;

	/**
	 * @param \OC\DB\Connection $connection
	 * @param \Doctrine\DBAL\Schema\SchemaDiff $schemaDiff
	 */
	public function __construct($connection, $schemaDiff) {
		$this->connection = $connection;
		$this->schemaDiff = $schemaDiff;
	}

	public function analyse() {
		$violations = array();

		/** @var $tableDiff \Doctrine\DBAL\Schema\TableDiff */
		foreach ($this->schemaDiff->changedTables as $tableDiff) {

			// validate data on primary and unique keys
			/** @var $changedIndex \Doctrine\DBAL\Schema\Index */
			$changedIndexes = array_merge($tableDiff->addedIndexes, $tableDiff->changedIndexes);
			foreach ($changedIndexes as $changedIndex) {
				$tableName = $tableDiff->name;
				if ($changedIndex->isPrimary() || $changedIndex->isUnique()) {

					$columns = implode(',', $changedIndex->getColumns());
					$sql = "select * from (select $columns, count(*) as c from $tableName group by $columns) where c > 1";
					$result = $this->connection->query($sql);
					$duplicates = $result->fetchAll();
					if (!empty($duplicates)) {
						$violation = array(
							'violation' => self::VIOLATION_DUPLICATE_KEY,
							'table' => $this->trimQuotes($tableName),
							'change' => $changedIndex,
							'data' => $duplicates);
						$violations[] = $violation;
					}
				}
			}
		}

		if (!empty($violations)) {
			throw new Exception($violations);
		}
	}

	private function trimQuotes($identifier)
	{
		return str_replace(array('`', '"'), '', $identifier);
	}

}
