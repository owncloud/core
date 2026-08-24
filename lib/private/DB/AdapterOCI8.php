<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

use Doctrine\DBAL\Types\BlobType;
use Doctrine\DBAL\Types\TextType;
use OCP\DB\QueryBuilder\IQueryBuilder;

class AdapterOCI8 extends Adapter {
	/**
	 * Large object columns per real table name, or null for a table whose
	 * columns could not be resolved.
	 *
	 * @var array
	 */
	private $lobColumns = [];

	public function lastInsertId($table) {
		if ($table === null) {
			throw new \InvalidArgumentException('Oracle requires a table name to be passed into lastInsertId()');
		}
		if ($table !== null) {
			$suffix = '_SEQ';
			$table = '"' . $table . $suffix . '"';
		}
		return $this->conn->realLastInsertId($table);
	}

	public const UNIX_TIMESTAMP_REPLACEMENT = "(cast(sys_extract_utc(systimestamp) as date) - date'1970-01-01') * 86400";

	public function fixupStatement($statement) {
		$statement = \preg_replace('( LIKE \?)', '$0 ESCAPE \'\\\'', $statement);
		$statement = \preg_replace('( LIKE :\w+)', '$0 ESCAPE \'\\\'', $statement);
		$statement = \preg_replace('/`(\w+)` ILIKE \?/', "LOWER(`$1`) LIKE LOWER(?) ESCAPE '\\' -- \\'' \n", $statement);  // FIXME workaround for singletick matching with regexes in SQLParserUtils::getUnquotedStatementFragments
		$statement = \preg_replace('/`(\w+)` ILIKE (:\w+)/', "LOWER(`$1`) LIKE LOWER(`$2`) ESCAPE '\\' -- \\'' \n", $statement);  // FIXME workaround for singletick matching with regexes in SQLParserUtils::getUnquotedStatementFragments
		$statement = \str_replace('`', '"', $statement);
		$statement = \str_ireplace('NOW()', 'CURRENT_TIMESTAMP', $statement);
		$statement = \str_ireplace('UNIX_TIMESTAMP()', self::UNIX_TIMESTAMP_REPLACEMENT, $statement);
		return $statement;
	}

	/**
	 * Oracle cannot compare a CLOB or a BLOB with `=` - the attempt fails with
	 * ORA-00932 - so those columns have to be wrapped in `to_char()`. Every
	 * other column has to be left alone: `to_char(col) = 'x'` is not sargable,
	 * so the comparison cannot use an index on `col` and degrades into a scan.
	 *
	 * If the column types cannot be resolved, all compare columns are cast.
	 * That is the behaviour which shipped before this distinction was made -
	 * slow, but it can never raise ORA-00932.
	 *
	 * @inheritdoc
	 */
	protected function getCompareColumnTypes($table, array $compare) {
		$lobColumns = $this->getLobColumns($table);

		$types = [];
		foreach ($compare as $key) {
			if ($lobColumns === null || isset($lobColumns[$key])) {
				$types[$key] = IQueryBuilder::PARAM_STR;
			}
		}
		return $types;
	}

	/**
	 * The names of all large object columns of the given table, as keys.
	 *
	 * The result is memoized per connection. A schema change within the same
	 * request is therefore not picked up, which is acceptable: the type of an
	 * existing column does not change underneath a running upsert.
	 *
	 * @param string $table table name including **PREFIX**
	 * @return array|null null if the columns could not be resolved
	 */
	private function getLobColumns($table) {
		$tableName = $this->getRealTableName($table);
		if (\array_key_exists($tableName, $this->lobColumns)) {
			return $this->lobColumns[$tableName];
		}

		$lobColumns = null;
		$reason = 'the table is not known to the schema manager';
		try {
			// the identifier has to be quoted: ownCloud creates all tables and
			// columns quoted, hence in lower case, while Oracle folds an unquoted
			// identifier to upper case and would not find the table at all
			$columns = $this->conn->getSchemaManager()->listTableColumns(
				$this->conn->quoteIdentifier($tableName)
			);
			if ($columns !== []) {
				$lobColumns = [];
				foreach ($columns as $column) {
					$type = $column->getType();
					if ($type instanceof TextType || $type instanceof BlobType) {
						// getName() and not the array key, because the key keeps the
						// quotes of a reserved word like `oc_privatedata`.`user`
						$lobColumns[$column->getName()] = true;
					}
				}
			}
		} catch (\Exception $e) {
			$reason = $e->getMessage();
		}

		if ($lobColumns === null) {
			// remember the failure as well, so this is logged once per table
			\OC::$server->getLogger()->warning(
				'Could not determine the column types of "{table}", falling back to comparing all columns as char: {reason}',
				['app' => 'core', 'table' => $tableName, 'reason' => $reason]
			);
		}

		$this->lobColumns[$tableName] = $lobColumns;
		return $lobColumns;
	}

	/**
	 * The table name as it exists in the database, for a name as it is passed to
	 * the query builder. Mirrors Connection::replaceTablePrefix(), which is not
	 * reachable from here.
	 *
	 * @param string $table table name including **PREFIX**
	 * @return string
	 */
	private function getRealTableName($table) {
		if (\strpos($table, '*PREFIX*') === 0) {
			$table = \substr($table, \strlen('*PREFIX*'));
		}
		return $this->conn->getPrefix() . $table;
	}
}
