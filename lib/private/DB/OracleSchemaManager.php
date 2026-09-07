<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

use Doctrine\DBAL\Schema\Identifier;
use Doctrine\DBAL\Schema\OracleSchemaManager as DoctrineOracleSchemaManager;
use Doctrine\DBAL\Schema\Table;

/**
 * Introspects the whole Oracle schema with a constant number of queries.
 *
 * doctrine/dbal 2.13 implements AbstractSchemaManager::listTables() by looping
 * listTableDetails() over every table, which issues four data dictionary queries
 * per table (columns, indexes, foreign keys, table comment). Each of those has the
 * table name inlined as a string literal, so Oracle cannot share cursors and hard
 * parses every single one. Because OC\DB\Migrator::getDiff() introspects the full
 * schema once per applied migration, `maintenance:install` ends up running
 * thousands of hard-parsed dictionary queries and takes over 20 minutes.
 *
 * This subclass replaces the per-table loop with one batched query per category
 * over the user_* dictionary views, which is what doctrine/dbal does natively from
 * 3.4 onwards. The rows are bucketed by table name and handed to the very same
 * _getPortableTable*() methods the stock implementation uses, so the resulting
 * Table objects are unchanged.
 */
class OracleSchemaManager extends DoctrineOracleSchemaManager {
	/**
	 * {@inheritdoc}
	 */
	public function listTables() {
		// keeps the schema asset filter semantics of the stock implementation
		$tableNames = $this->listTableNames();
		if ($tableNames === []) {
			return [];
		}

		$database = $this->_conn->getDatabase();
		$columnsByTable = $this->fetchGroupedByTable($this->getBatchedTableColumnsSQL());
		$indexesByTable = $this->fetchGroupedByTable($this->getBatchedTableIndexesSQL());
		$foreignKeysByTable = $this->fetchGroupedByTable($this->getBatchedTableForeignKeysSQL());
		$commentsByTable = $this->fetchTableComments();

		$tables = [];
		foreach ($tableNames as $tableName) {
			$key = $this->normalizeTableName($tableName);

			$table = new Table(
				$tableName,
				$this->_getPortableTableColumnList($tableName, $database, $columnsByTable[$key] ?? []),
				$this->_getPortableTableIndexesList($indexesByTable[$key] ?? [], $tableName),
				$this->_getPortableTableForeignKeysList($foreignKeysByTable[$key] ?? [])
			);

			// mirrors the parent's listTableDetails(): the option is set whenever
			// user_tab_comments has a row, even when the comment itself is null
			if (\array_key_exists($key, $commentsByTable)) {
				$table->addOption('comment', $commentsByTable[$key]);
			}

			$tables[] = $table;
		}

		return $tables;
	}

	/**
	 * Runs $sql and buckets the rows by their (lower cased) table_name column.
	 *
	 * @return array<string, list<array<string, mixed>>>
	 */
	private function fetchGroupedByTable(string $sql): array {
		$grouped = [];
		foreach ($this->_conn->fetchAllAssociative($sql) as $row) {
			$row = \array_change_key_case($row, CASE_LOWER);
			$grouped[$row['table_name']][] = $row;
		}
		return $grouped;
	}

	/**
	 * @return array<string, string|null> table name => comment, null comments included
	 */
	private function fetchTableComments(): array {
		$comments = [];
		$rows = $this->_conn->fetchAllAssociative('SELECT table_name, comments FROM user_tab_comments');
		foreach ($rows as $row) {
			$row = \array_change_key_case($row, CASE_LOWER);
			$comments[$row['table_name']] = $row['comments'];
		}
		return $comments;
	}

	/**
	 * Same shape as OraclePlatform::getListTableColumnsSQL(), minus the table
	 * predicate and with the comment subquery turned into a join.
	 */
	private function getBatchedTableColumnsSQL(): string {
		return 'SELECT c.*, d.comments AS comments
			FROM user_tab_columns c
			LEFT JOIN user_col_comments d
				ON d.table_name = c.table_name
				AND d.column_name = c.column_name
			ORDER BY c.table_name, c.column_id';
	}

	/**
	 * Same shape as OraclePlatform::getListTableIndexesSQL(), minus the table
	 * predicate and with the correlated subqueries turned into joins.
	 *
	 * The is_primary join is restricted to 'P' because the only thing the consumer
	 * (_getPortableTableIndexesList) does with the value is compare it to 'P'.
	 */
	private function getBatchedTableIndexesSQL(): string {
		return "SELECT uind_col.table_name AS table_name,
				uind_col.index_name AS name,
				uind.index_type AS type,
				DECODE(uind.uniqueness, 'NONUNIQUE', 0, 'UNIQUE', 1) AS is_unique,
				uind_col.column_name AS column_name,
				uind_col.column_position AS column_pos,
				ucon.constraint_type AS is_primary
			FROM user_ind_columns uind_col
			LEFT JOIN user_indexes uind
				ON uind.index_name = uind_col.index_name
			LEFT JOIN user_constraints ucon
				ON ucon.index_name = uind_col.index_name
				AND ucon.constraint_type = 'P'
			ORDER BY uind_col.table_name, uind_col.column_position ASC";
	}

	/**
	 * Same shape as OraclePlatform::getListTableForeignKeysSQL(), minus the table
	 * predicate and with the correlated subqueries turned into a join.
	 */
	private function getBatchedTableForeignKeysSQL(): string {
		return "SELECT alc.table_name AS table_name,
				alc.constraint_name,
				alc.delete_rule,
				cols.column_name AS local_column,
				cols.position,
				r_cols.table_name AS references_table,
				r_cols.column_name AS foreign_column
			FROM user_cons_columns cols
			JOIN user_constraints alc
				ON alc.constraint_name = cols.constraint_name
				AND alc.constraint_type = 'R'
			LEFT JOIN user_cons_columns r_cols
				ON r_cols.constraint_name = alc.r_constraint_name
				AND r_cols.position = cols.position
			ORDER BY alc.table_name, cols.constraint_name ASC, cols.position ASC";
	}

	/**
	 * Reproduces the private OraclePlatform::normalizeIdentifier(): unquoted
	 * identifiers are upper cased, quoted ones keep their case.
	 */
	private function normalizeTableName(string $tableName): string {
		$identifier = new Identifier($tableName);
		return $identifier->isQuoted() ? $identifier->getName() : \strtoupper($identifier->getName());
	}
}
