<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jonny007-MKD <1-23-4-5@web.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\DB;
use Doctrine\DBAL\Exception\DriverException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\DBAL\Platforms\OraclePlatform;

/**
 * This handles the way we use to write queries, into something that can be
 * handled by the database abstraction layer.
 */
class Adapter {

	/**
	 * @var \OC\DB\Connection $conn
	 */
	protected $conn;

	public function __construct($conn) {
		$this->conn = $conn;
	}

	/**
	 * @param string $table name
	 * @return int id of last insert statement
	 */
	public function lastInsertId($table) {
		return $this->conn->realLastInsertId($table);
	}

	/**
	 * @param string $statement that needs to be changed so the db can handle it
	 * @return string changed statement
	 */
	public function fixupStatement($statement) {
		return $statement;
	}

	/**
	 * Create an exclusive read+write lock on a table
	 *
	 * @param string $tableName
	 * @since 9.1.0
	 */
	public function lockTable($tableName) {
		$this->conn->beginTransaction();
		$this->conn->executeUpdate('LOCK TABLE `' .$tableName . '` IN EXCLUSIVE MODE');
	}

	/**
	 * Release a previous acquired lock again
	 *
	 * @since 9.1.0
	 */
	public function unlockTable() {
		$this->conn->commit();
	}

	/**
	 * Insert a row if the matching row does not exists.
	 *
	 * @param string $table The table name (will replace *PREFIX* with the actual prefix)
	 * @param array $input data that should be inserted into the table  (column name => value)
	 * @param array|null $compare List of values that should be checked for "if not exists"
	 *				If this is null or an empty array, all keys of $input will be compared
	 *				Please note: text fields (clob) must not be used in the compare array
	 * @return int number of inserted rows
	 * @throws \Doctrine\DBAL\DBALException
	 */
	public function insertIfNotExist($table, $input, array $compare = null) {
		if (empty($compare)) {
			$compare = \array_keys($input);
		}
		$query = 'INSERT INTO `' . $table . '` (`'
			. \implode('`,`', \array_keys($input)) . '`) SELECT '
			. \str_repeat('?,', \count($input) - 1) . '? ' // Is there a prettier alternative?
			. 'FROM `' . $table . '` WHERE ';

		$inserts = \array_values($input);
		foreach ($compare as $key) {
			$query .= '`' . $key . '`';
			if ($input[$key] === null) {
				$query .= ' IS NULL AND ';
			} else {
				$inserts[] = $input[$key];
				$query .= ' = ? AND ';
			}
		}
		$query = \substr($query, 0, \strlen($query) - 5);
		$query .= ' HAVING COUNT(*) = 0';
		return $this->conn->executeUpdate($query, $inserts);
	}

	/**
	 * Inserts, or updates a row into the database. Returns the inserted or updated rows
	 * @param $table string table name including **PREFIX**
	 * @param $input array the key=>value pairs to insert into the db row
	 * @param $compare array columns that should be compared to look for existing arrays
	 * @return int the number of rows affected by the operation
	 * @throws DriverException|\RuntimeException
	 */
	public function upsert($table, $input, $compare) {
		$this->conn->beginTransaction();
		$done = false;

		if (empty($compare)) {
			$compare = \array_keys($input);
		}

		// Construct the update query
		$qbu = $this->conn->getQueryBuilder();
		$qbu->update($table);
		foreach ($input as $col => $val) {
			$qbu->set($col, $qbu->createParameter($col))
			->setParameter($col, $val);
		}
		foreach ($compare as $key) {
			if ($input[$key] === null || ($input[$key] === '' && $this->conn->getDatabasePlatform() instanceof OraclePlatform)) {
				$qbu->andWhere($qbu->expr()->isNull($key));
			} else {
				if ($this->conn->getDatabasePlatform() instanceof OraclePlatform) {
					$qbu->andWhere(
						$qbu->expr()->eq(
							// needs to cast to char in order to compare with char
							$qbu->createFunction('to_char(`'.$key.'`)'), // TODO does this handle empty strings on oracle correclty
							$qbu->expr()->literal($input[$key])));
				} else {
					$qbu->andWhere(
						$qbu->expr()->eq(
							$key,
							$qbu->expr()->literal($input[$key])));
				}
			}
		}

		// Construct the insert query
		$qbi = $this->conn->getQueryBuilder();
		$qbi->insert($table);
		foreach ($input as $c => $v) {
			$qbi->setValue($c, $qbi->createParameter($c))
				->setParameter($c, $v);
		}

		$rows = 0;
		$count = 0;
		// Attempt 5 times before failing the upsert
		$maxTry = 5;

		while (!$done && $count < $maxTry) {
			try {
				// Try to update
				$rows = $qbu->execute();
			} catch (DriverException $e) {
				// Skip deadlock and retry
				// @TODO when we update to DBAL 2.6 we can use DeadlockExceptions here
				if ($e->getErrorCode() == 1213) {
					$count++;
					continue;
				} else {
					// We should catch other exceptions up the stack
					$this->conn->rollBack();
					throw $e;
				}
			}
			if ($rows > 0) {
				// We altered some rows, return
				$done = true;
			} else {
				// Try the insert
				$this->conn->beginTransaction();
				try {
					// Execute the insert query
					$rows = $qbi->execute();
					$done = $rows > 0;
				} catch (UniqueConstraintViolationException $e) {
					// Catch the unique violation and try the loop again
					$count++;
				}
				// Other exceptions are not caught, they should be caught up the stack
				$this->conn->commit();
			}
		}

		// Pass through failures correctly
		if ($count === $maxTry) {
			$params = \implode(',', $input);
			$updateQuery = $qbu->getSQL();
			$insertQuery = $qbi->getSQL();
			throw new \RuntimeException("DB upsert failed after $count attempts. UpdateQuery: $updateQuery InsertQuery: $insertQuery");
		}

		$this->conn->commit();
		return $rows;
	}
}
