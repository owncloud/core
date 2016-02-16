<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */


namespace OC\DB;

class AdapterSQLSrv extends Adapter {
	public function fixupStatement($statement) {
		$statement = str_replace(' ILIKE ', ' COLLATE Latin1_General_CI_AS LIKE ', $statement);
		$statement = preg_replace( "/\`(.*?)`/", "[$1]", $statement );
		$statement = str_ireplace( 'NOW()', 'CURRENT_TIMESTAMP', $statement );
		$statement = str_replace( 'LENGTH(', 'LEN(', $statement );
		$statement = str_replace( 'SUBSTR(', 'SUBSTRING(', $statement );
		$statement = str_ireplace( 'UNIX_TIMESTAMP()', 'DATEDIFF(second,{d \'1970-01-01\'},GETDATE())', $statement );
		return $statement;
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
			$compare = array_keys($input);
		}
		$query = 'INSERT INTO `' .$table . '` (`'
			. implode('`,`', array_keys($input)) . '`) SELECT '
			. str_repeat('?,', count($input)-1).'? ' // Is there a prettier alternative?
			. 'FROM `' . $table . '` WITH (UPDLOCK, ROWLOCK) WHERE ';

		$inserts = array_values($input);
		foreach($compare as $key) {
			$query .= '`' . $key . '`';
			if (is_null($input[$key])) {
				$query .= ' IS NULL AND ';
			} else {
				$inserts[] = $input[$key];
				$query .= ' = ? AND ';
			}
		}
		$query = substr($query, 0, strlen($query) - 5);
		$query .= ' HAVING COUNT(*) = 0 FOR UPDATE';

		return $this->conn->executeUpdate($query, $inserts);
	}
}
