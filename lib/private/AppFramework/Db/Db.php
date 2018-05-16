<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
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

namespace OC\AppFramework\Db;

use Doctrine\DBAL\Schema\Schema;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDb;
use OCP\IDBConnection;

/**
 * @deprecated use IDBConnection directly, will be removed in ownCloud 10
 * Small Facade for being able to inject the database connection for tests
 */
class Db implements IDb {
	/**
	 * @var IDBConnection
	 */
	protected $connection;

	/**
	 * @param IDBConnection $connection
	 */
	public function __construct(IDBConnection $connection) {
		$this->connection = $connection;
	}

	/**
	 * @inheritdoc
	 */
	public function getQueryBuilder() {
		return $this->connection->getQueryBuilder();
	}

	/**
	 * @inheritdoc
	 */
	public function prepareQuery($sql, $limit = null, $offset = null) {
		$isManipulation = \OC_DB::isManipulation($sql);
		$statement = $this->connection->prepare($sql, $limit, $offset);
		return new \OC_DB_StatementWrapper($statement, $isManipulation);
	}

	/**
	 * @inheritdoc
	 */
	public function getInsertId($tableName) {
		return $this->connection->lastInsertId($tableName);
	}

	/**
	 * @inheritdoc
	 */
	public function prepare($sql, $limit=null, $offset=null) {
		return $this->connection->prepare($sql, $limit, $offset);
	}

	/**
	 * @inheritdoc
	 */
	public function executeQuery($query, array $params = [], $types = []) {
		return $this->connection->executeQuery($query, $params, $types);
	}

	/**
	 * @inheritdoc
	 */
	public function executeUpdate($query, array $params = [], array $types = []) {
		return $this->connection->executeUpdate($query, $params, $types);
	}

	/**
	 * @inheritdoc
	 */
	public function lastInsertId($table = null) {
		return $this->connection->lastInsertId($table);
	}

	/**
	 * @inheritdoc
	 */
	public function insertIfNotExist($table, $input, array $compare = null) {
		return $this->connection->insertIfNotExist($table, $input, $compare);
	}

	/**
	 * @inheritdoc
	 */
	public function setValues($table, array $keys, array $values, array $updatePreconditionValues = []) {
		return $this->connection->setValues($table, $keys, $values, $updatePreconditionValues);
	}

	/**
	 * @inheritdoc
	 */
	public function lockTable($tableName) {
		$this->connection->lockTable($tableName);
	}

	/**
	 * @inheritdoc
	 */
	public function unlockTable() {
		$this->connection->unlockTable();
	}

	/**
	 * @inheritdoc
	 */
	public function beginTransaction() {
		$this->connection->beginTransaction();
	}

	/**
	 * @inheritdoc
	 */
	public function inTransaction() {
		return $this->connection->inTransaction();
	}

	/**
	 * @inheritdoc
	 */
	public function commit() {
		$this->connection->commit();
	}

	/**
	 * @inheritdoc
	 */
	public function rollBack() {
		$this->connection->rollBack();
	}

	/**
	 * @inheritdoc
	 */
	public function getError() {
		return $this->connection->getError();
	}

	/**
	 * @inheritdoc
	 */
	public function errorCode() {
		return $this->connection->errorCode();
	}

	/**
	 * @inheritdoc
	 */
	public function errorInfo() {
		return $this->connection->errorInfo();
	}

	/**
	 * @inheritdoc
	 */
	public function connect() {
		return $this->connection->connect();
	}

	/**
	 * @inheritdoc
	 */
	public function close() {
		$this->connection->close();
	}

	/**
	 * @inheritdoc
	 */
	public function quote($input, $type = IQueryBuilder::PARAM_STR) {
		return $this->connection->quote($input, $type);
	}

	/**
	 * @inheritdoc
	 */
	public function getDatabasePlatform() {
		return $this->connection->getDatabasePlatform();
	}

	/**
	 * @inheritdoc
	 */
	public function dropTable($table) {
		$this->connection->dropTable($table);
	}

	/**
	 * @inheritdoc
	 */
	public function tableExists($table) {
		return $this->connection->tableExists($table);
	}

	/**
	 * @inheritdoc
	 */
	public function escapeLikeParameter($param) {
		return $this->connection->escapeLikeParameter($param);
	}

	/**
	 * @inheritdoc
	 */
	public function createSchema() {
		return $this->connection->createSchema();
	}

	/**
	 * @inheritdoc
	 */
	public function migrateToSchema(Schema $toSchema) {
		return $this->connection->migrateToSchema($toSchema);
	}

	/**
	 * @inheritdoc
	 */
	public function getTransactionIsolation() {
		return $this->connection->getTransactionIsolation();
	}

	/**
	 * @inheritdoc
	 */
	public function allows4ByteCharacters() {
		return $this->connection->allows4ByteCharacters();
	}

	/**
	 * @inheritdoc
	 */
	public function upsert($table, $input, array $compare = null) {
		return $this->connection->upsert($table, $input, $compare);
	}
}
