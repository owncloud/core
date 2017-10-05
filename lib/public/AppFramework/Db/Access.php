<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OCP\AppFramework\Db;

use OCP\IDBConnection;
use OCP\IDb;

/**
 * Simple class which abstracts query execution from inheriting class.
 *
 *
 * @since 10.0.0
 */
class Access {

	/**
	 * Provide protected access to IDBConnection
	 *
	 * @var IDBConnection
	 */
	protected $db;

	/**
	 * @param IDBConnection $db Instance of the Db abstraction layer
	 * mapped to queries without using sql
	 * @since 10.0.0
	 */
	public function __construct(IDBConnection $db){
		$this->db = $db;
	}

	/**
	 * Checks if an array is associative
	 * @param array $array
	 * @return bool true if associative
	 * @since 10.0.0
	 */
	private function isAssocArray(array $array) {
		return array_values($array) !== $array;
	}

	/**
	 * Returns the correct PDO constant based on the value type
	 * @param $value
	 * @return int PDO constant
	 * @since 10.0.0
	 */
	private function getPDOType($value) {
		switch (gettype($value)) {
			case 'integer':
				return \PDO::PARAM_INT;
			case 'boolean':
				return \PDO::PARAM_BOOL;
			default:
				return \PDO::PARAM_STR;
		}
	}

	/**
	 * Runs an sql query
	 *
	 * @param string $sql the prepare string
	 * @param array $params the params which should replace the ? in the sql query
	 * @param int $limit the maximum number of rows
	 * @param int $offset from which row we want to start
	 * @return \PDOStatement the database query result
	 * @since 10.0.0
	 */
	protected function execute($sql, array $params=[], $limit=null, $offset=null) {
		if ($this->db instanceof IDb) {
			$query = $this->db->prepareQuery($sql, $limit, $offset);
		} else {
			$query = $this->db->prepare($sql, $limit, $offset);
		}

		if ($this->isAssocArray($params)) {
			foreach ($params as $key => $param) {
				$pdoConstant = $this->getPDOType($param);
				$query->bindValue($key, $param, $pdoConstant);
			}
		} else {
			$index = 1;  // bindParam is 1 indexed
			foreach ($params as $param) {
				$pdoConstant = $this->getPDOType($param);
				$query->bindValue($index, $param, $pdoConstant);
				$index++;
			}
		}

		$result = $query->execute();

		// this is only for backwards compatibility reasons and can be removed
		// in owncloud 10. IDb returns a StatementWrapper from execute, PDO,
		// Doctrine and IDbConnection don't so this needs to be done in order
		// to stay backwards compatible for the things that rely on the
		// StatementWrapper being returned
		if ($result instanceof \OC_DB_StatementWrapper) {
			return $result;
		}

		return $query;
	}

	/**
	 * Builds an error message by prepending the $msg to an error message which
	 * has the parameters
	 * @see findEntity
	 * @param string $sql the sql query
	 * @param array $params the parameters of the sql query
	 * @param int $limit the maximum number of rows
	 * @param int $offset from which row we want to start
	 * @return string formatted error message string
	 * @since 10.0.0
	 */
	protected function buildDebugMessage($msg, $sql, array $params=[], $limit=null, $offset=null) {
		return $msg .
					': query "' .	$sql . '"; ' .
					'parameters ' . print_r($params, true) . '; ' .
					'limit "' . $limit . '"; '.
					'offset "' . $offset . '"';
	}

}
