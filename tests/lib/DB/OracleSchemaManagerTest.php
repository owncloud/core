<?php
/**
 * Copyright (c) 2026 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\DB;

use Doctrine\DBAL\Logging\DebugStack;
use Doctrine\DBAL\Platforms\OraclePlatform;
use Doctrine\DBAL\Schema\Comparator;
use Doctrine\DBAL\Schema\OracleSchemaManager as DoctrineOracleSchemaManager;
use Doctrine\DBAL\Schema\Table;

/**
 * Guards the batched Oracle schema introspection in \OC\DB\OracleSchemaManager.
 *
 * @group DB
 */
class OracleSchemaManagerTest extends \Test\TestCase {
	/** @var \OC\DB\Connection */
	private $connection;

	/** @var string[] */
	private $tableNames = [];

	/** @var string */
	private $prefix;

	protected function setUp(): void {
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();
		if (!$this->connection->getDatabasePlatform() instanceof OraclePlatform) {
			$this->markTestSkipped('Test only relevant on Oracle');
		}

		// Lowercase, and well below Oracle's 30 character identifier limit.
		// getUniqueID() mixes in uppercase characters, which would end up in a
		// differently spelled Oracle identifier than the one created below.
		$this->prefix = \strtolower(self::getUniqueID('oc_bt', 8));
	}

	protected function tearDown(): void {
		if ($this->connection->getDatabasePlatform() instanceof OraclePlatform) {
			$this->connection->getConfiguration()->setFilterSchemaAssetsExpression(null);
			foreach ($this->tableNames as $tableName) {
				$this->connection->exec('DROP TABLE "' . $tableName . '" CASCADE CONSTRAINTS');
			}
		}
		parent::tearDown();
	}

	/**
	 * Creates $count additional throwaway tables and restricts introspection to
	 * them. Table names continue where a previous call left off, so repeated calls
	 * add tables instead of colliding.
	 *
	 * The identifiers are quoted, so Oracle stores them in lower case just like
	 * the real ownCloud tables do. Unquoted identifiers would be folded to upper
	 * case, which is not the code path production uses.
	 */
	private function createTables(int $count): void {
		$schemaManager = $this->connection->getSchemaManager();
		$offset = \count($this->tableNames);
		for ($i = $offset; $i < $offset + $count; $i++) {
			$tableName = $this->prefix . '_' . $i;
			$table = new Table('"' . $tableName . '"');
			$table->addColumn('"id"', 'integer', ['notnull' => true]);
			$table->addColumn('"name"', 'string', ['length' => 64, 'notnull' => false]);
			$table->setPrimaryKey(['"id"']);
			$table->addIndex(['"name"'], '"' . $tableName . '_ix"');
			$schemaManager->createTable($table);
			$this->tableNames[] = $tableName;
		}
		// listTableNames() returns lower case Oracle identifiers quoted, so the
		// filter has to allow for the leading quote character
		$this->connection->getConfiguration()
			->setFilterSchemaAssetsExpression('/^"?' . \preg_quote($this->prefix, '/') . '/');
	}

	/**
	 * @return int number of queries the given schema manager needs for a full
	 *             schema introspection
	 */
	private function countIntrospectionQueries(\Doctrine\DBAL\Schema\AbstractSchemaManager $schemaManager): int {
		$stack = new DebugStack();
		$this->connection->getConfiguration()->setSQLLogger($stack);
		$schemaManager->createSchema();
		$this->connection->getConfiguration()->setSQLLogger(null);
		return \count($stack->queries);
	}

	public function testOracleConnectionUsesBatchedSchemaManager() {
		$this->assertInstanceOf(\OC\DB\OracleSchemaManager::class, $this->connection->getSchemaManager());
	}

	/**
	 * The batched introspection must describe the database exactly like the stock
	 * doctrine/dbal implementation it replaces.
	 */
	public function testBatchedIntrospectionMatchesStockIntrospection() {
		$this->createTables(3);
		$platform = $this->connection->getDatabasePlatform();

		$stockSchema = (new DoctrineOracleSchemaManager($this->connection, $platform))->createSchema();
		$batchedSchema = (new \OC\DB\OracleSchemaManager($this->connection, $platform))->createSchema();

		// guards against both schemas coming back empty, which would make the
		// comparison below pass without comparing anything
		foreach ($this->tableNames as $tableName) {
			$this->assertTrue($batchedSchema->hasTable($tableName), "table $tableName was not introspected");
		}

		$comparator = new Comparator();
		$this->assertSame(
			[],
			$comparator->compare($stockSchema, $batchedSchema)->toSql($platform),
			'batched introspection differs from the stock introspection'
		);
		$this->assertSame(
			[],
			$comparator->compare($batchedSchema, $stockSchema)->toSql($platform),
			'stock introspection differs from the batched introspection'
		);
	}

	/**
	 * The whole point of the batched implementation: introspecting twice as many
	 * tables must not cost more queries. The stock implementation needs four per
	 * table, which is what made `maintenance:install` on Oracle take over 20
	 * minutes.
	 */
	public function testIntrospectionQueryCountIsIndependentOfTableCount() {
		$platform = $this->connection->getDatabasePlatform();
		$batchedSchemaManager = new \OC\DB\OracleSchemaManager($this->connection, $platform);

		$this->createTables(3);
		$queriesForThreeTables = $this->countIntrospectionQueries($batchedSchemaManager);

		$this->createTables(6);
		$queriesForNineTables = $this->countIntrospectionQueries($batchedSchemaManager);

		$this->assertSame(
			$queriesForThreeTables,
			$queriesForNineTables,
			'the number of introspection queries must not grow with the number of tables'
		);

		$stockSchemaManager = new DoctrineOracleSchemaManager($this->connection, $platform);
		$this->assertLessThan(
			$this->countIntrospectionQueries($stockSchemaManager),
			$queriesForNineTables,
			'the batched introspection must use fewer queries than the stock one'
		);
	}
}
