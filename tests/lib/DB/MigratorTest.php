<?php

/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\DB;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Platforms\OraclePlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\SchemaConfig;
use OCP\IConfig;

/**
 * Class MigratorTest
 *
 * @group DB
 *
 * @package Test\DB
 */
class MigratorTest extends \Test\TestCase {
	/**
	 * @var \Doctrine\DBAL\Connection $connection
	 */
	private $connection;

	/**
	 * @var \OC\DB\MDB2SchemaManager
	 */
	private $manager;

	/**
	 * @var IConfig
	 **/
	private $config;

	/** @var string */
	private $tableName;

	/** @var string */
	private $tableNameTmp;

	protected function setUp(): void {
		parent::setUp();

		$this->config = \OC::$server->getConfig();
		$this->connection = \OC::$server->getDatabaseConnection();
		$this->manager = new \OC\DB\MDB2SchemaManager($this->connection);
		$this->tableName = $this->getUniqueTableName();
		$this->tableNameTmp = $this->getUniqueTableName();
	}

	private function getUniqueTableName() {
		return \strtolower($this->getUniqueID($this->config->getSystemValue('dbtableprefix', 'oc_') . 'test_'));
	}

	protected function tearDown(): void {
		// Try to delete if exists (IF EXISTS NOT SUPPORTED IN ORACLE)
		try {
			$this->connection->exec('DROP TABLE ' . $this->connection->quoteIdentifier($this->tableNameTmp));
		} catch (\Doctrine\DBAL\DBALException $e) {
		}

		try {
			$this->connection->exec('DROP TABLE ' . $this->connection->quoteIdentifier($this->tableName));
		} catch (\Doctrine\DBAL\DBALException $e) {
		}
		parent::tearDown();
	}

	private function getIndexName($tableName, $indexName) {
		$indexName = $tableName . '_' . $indexName;
		if ($this->isOracle()) {
			// Oracle doesn't like long names...
			return 'i' . \substr(\md5($indexName), 0, 29);
		}
		return $indexName;
	}

	/**
	 * @return \Doctrine\DBAL\Schema\Schema[]
	 */
	private function getDuplicateKeySchemas() {
		$startSchema = new Schema([], [], $this->getSchemaConfig());
		$table = $startSchema->createTable($this->tableName);
		$table->addColumn('id', 'integer');
		$table->addColumn('name', 'string');
		$table->addIndex(['id'], $this->getIndexName($this->tableName, 'id'));

		$endSchema = new Schema([], [], $this->getSchemaConfig());
		$table = $endSchema->createTable($this->tableName);
		$table->addColumn('id', 'integer');
		$table->addColumn('name', 'string');
		$table->addUniqueIndex(['id'], $this->getIndexName($this->tableName, 'id'));

		return [$startSchema, $endSchema];
	}

	private function getSchemaConfig() {
		$config = new SchemaConfig();
		$config->setName($this->connection->getDatabase());
		return $config;
	}

	private function isSQLite() {
		return $this->connection->getDriver() instanceof \Doctrine\DBAL\Driver\PDOSqlite\Driver;
	}

	private function isOracle() {
		return ($this->connection->getDatabasePlatform() instanceof OraclePlatform);
	}

	public function testDuplicateKeyUpgrade() {
		if ($this->isSQLite()) {
			$this->markTestSkipped('sqlite does not throw errors when creating a new key on existing data');
		}
		if ($this->isOracle()) {
			$this->markTestSkipped('Does not work yet with Oracle, needs fixing index quoting');
		}
		list($startSchema, $endSchema) = $this->getDuplicateKeySchemas();
		$migrator = $this->manager->getMigrator();
		$migrator->migrate($startSchema);

		$this->connection->insert($this->tableName, ['id' => 1, 'name' => 'foo']);
		$this->connection->insert($this->tableName, ['id' => 2, 'name' => 'bar']);
		$this->connection->insert($this->tableName, ['id' => 2, 'name' => 'qwerty']);

		$caught = false;
		try {
			$migrator->migrate($endSchema);
			$this->fail('migrate should have failed');
		} catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
			$caught = true;
			// makes PostgreSQL happier after an exception (and we don't have rollback yet on the public API...)
			$this->connection->commit();
		}
		$this->assertTrue($caught);
	}

	public function testUpgrade() {
		list($startSchema, $endSchema) = $this->getDuplicateKeySchemas();
		$migrator = $this->manager->getMigrator();
		$migrator->migrate($startSchema);

		$this->connection->insert($this->tableName, ['id' => 1, 'name' => 'foo']);
		$this->connection->insert($this->tableName, ['id' => 2, 'name' => 'bar']);
		$this->connection->insert($this->tableName, ['id' => 3, 'name' => 'qwerty']);

		$migrator->migrate($endSchema);
		$this->assertTrue(true);
	}

	public function testUpgradeDifferentPrefix() {
		$oldTablePrefix = $this->config->getSystemValue('dbtableprefix', 'oc_');

		$this->config->setSystemValue('dbtableprefix', 'ownc_');
		$this->tableName = \strtolower($this->getUniqueID($this->config->getSystemValue('dbtableprefix') . 'test_'));

		list($startSchema, $endSchema) = $this->getDuplicateKeySchemas();
		$migrator = $this->manager->getMigrator();
		$migrator->migrate($startSchema);

		$this->connection->insert($this->tableName, ['id' => 1, 'name' => 'foo']);
		$this->connection->insert($this->tableName, ['id' => 2, 'name' => 'bar']);
		$this->connection->insert($this->tableName, ['id' => 3, 'name' => 'qwerty']);

		$migrator->migrate($endSchema);
		$this->assertTrue(true);

		$this->config->setSystemValue('dbtableprefix', $oldTablePrefix);
	}

	public function testInsertAfterUpgrade() {
		list($startSchema, $endSchema) = $this->getDuplicateKeySchemas();
		$migrator = $this->manager->getMigrator();
		$migrator->migrate($startSchema);

		$migrator->migrate($endSchema);

		$this->connection->insert($this->tableName, ['id' => 1, 'name' => 'foo']);
		$this->connection->insert($this->tableName, ['id' => 2, 'name' => 'bar']);
		try {
			$this->connection->insert($this->tableName, ['id' => 2, 'name' => 'qwerty']);
			$this->fail('Expected duplicate key insert to fail');
		} catch (DBALException $e) {
			$this->assertTrue(true);
		}
	}

	public function testAddingPrimaryKeyWithAutoIncrement() {
		$startSchema = new Schema([], [], $this->getSchemaConfig());
		$table = $startSchema->createTable($this->tableName);
		$table->addColumn('id', 'integer');
		$table->addColumn('name', 'string');

		$endSchema = new Schema([], [], $this->getSchemaConfig());
		$table = $endSchema->createTable($this->tableName);
		$table->addColumn('id', 'integer', ['autoincrement' => true]);
		$table->addColumn('name', 'string');
		$table->setPrimaryKey(['id']);

		$migrator = $this->manager->getMigrator();
		$migrator->migrate($startSchema);

		$migrator->migrate($endSchema);

		$this->assertTrue(true);
	}

	public function testAddingColumn() {
		$schema = new Schema([], [], $this->getSchemaConfig());
		$table = $schema->createTable($this->tableName);
		$table->addColumn('id', 'integer');
		$table->addColumn('name', 'string');

		$migrator = $this->manager->getMigrator();
		$migrator->migrate($schema);

		$table->addColumn('newcolumn', 'string', [
			'notnull' => false
		]);

		$migrator->migrate($schema);

		$schemaManager = $this->connection->getSchemaManager();
		$actualSchema = $schemaManager->createSchema();

		// Oracle might change casing if double quotes were missing, so verify
		// that the column names still match
		$table = $actualSchema->getTable($this->tableName);
		$this->assertEquals('id', $table->getColumn('id')->getName());
		$this->assertEquals('name', $table->getColumn('name')->getName());
		$this->assertEquals('newcolumn', $table->getColumn('newcolumn')->getName());

		$this->assertTrue(true);
	}

	public function testDeletingColumn() {
		$schema = new Schema([], [], $this->getSchemaConfig());
		$table = $schema->createTable($this->tableName);
		$table->addColumn('id', 'integer');
		$table->addColumn('name', 'string');
		$table->addColumn('to_delete', 'string');

		$migrator = $this->manager->getMigrator();
		$migrator->migrate($schema);

		$table->dropColumn('to_delete');

		$migrator->migrate($schema);

		$schemaManager = $this->connection->getSchemaManager();
		$actualSchema = $schemaManager->createSchema();

		// Oracle might change casing if double quotes were missing, so verify
		// that the column names still match
		$table = $actualSchema->getTable($this->tableName);
		$this->assertEquals('id', $table->getColumn('id')->getName());
		$this->assertEquals('name', $table->getColumn('name')->getName());
		$this->assertFalse($table->hasColumn('to_delete'));

		$this->assertTrue(true);
	}

	public function testReservedKeywords() {
		$startSchema = new Schema([], [], $this->getSchemaConfig());
		$table = $startSchema->createTable($this->tableName);
		$table->addColumn('id', 'integer', ['autoincrement' => true]);
		$table->addColumn('user', 'string', ['length' => 255]);
		$table->setPrimaryKey(['id']);

		$endSchema = new Schema([], [], $this->getSchemaConfig());
		$table = $endSchema->createTable($this->tableName);
		$table->addColumn('id', 'integer', ['autoincrement' => true]);
		$table->addColumn('user', 'string', ['length' => 64]);
		$table->setPrimaryKey(['id']);

		$migrator = $this->manager->getMigrator();
		$migrator->migrate($startSchema);

		$migrator->migrate($endSchema);

		$this->assertTrue(true);
	}

	public function testAddingForeignKey() {
		$startSchema = new Schema([], [], $this->getSchemaConfig());
		$table = $startSchema->createTable($this->tableName);
		$table->addColumn('id', 'integer', ['autoincrement' => true]);
		$table->addColumn('name', 'string');
		$table->setPrimaryKey(['id']);

		$fkName = "fkc";
		$tableFk = $startSchema->createTable($this->tableNameTmp);
		$tableFk->addColumn('fk_id', 'integer');
		$tableFk->addColumn('name', 'string');
		$tableFk->addForeignKeyConstraint($this->tableName, ['fk_id'], ['id'], [], $fkName);

		$migrator = $this->manager->getMigrator();
		$migrator->migrate($startSchema);

		$this->assertTrue($startSchema->getTable($this->tableNameTmp)->hasForeignKey($fkName));
	}
}
