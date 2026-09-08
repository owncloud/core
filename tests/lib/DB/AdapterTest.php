<?php

/**
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

namespace Test\DB;
use Doctrine\DBAL\Exception as DBALException;
use Doctrine\DBAL\Driver\AbstractException;
use Doctrine\DBAL\Driver\DriverException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Platforms\OraclePlatform;
use Doctrine\DBAL\Platforms\SqlitePlatform;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;
use OC\DB\Adapter;
use OC\DB\AdapterOCI8;
use OC\DB\Connection;
use OCP\DB\QueryBuilder\IExpressionBuilder;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;

/**
 * Class Adapter
 *
 * @group DB
 *
 * @package Test\DB
 */
class AdapterTest extends \Test\TestCase {
	/** @var Adapter  */
	protected $adapter;
	/** @var IDBConnection  */
	protected $conn;

	public function __construct() {
		$this->conn = \OC::$server->getDatabaseConnection();
		$this->adapter = new Adapter($this->conn);
		parent::__construct();
	}

	public function tearDown(): void {
		// remove columns from the appconfig table
		$qb = $this->conn->getQueryBuilder();
		$qb->delete('*PREFIX*appconfig')
			->where(
				$qb->expr()->eq(
					'appid',
					$qb->expr()->literal('testadapter')
				)
			)
			->execute();
	}

	/**
	 * Helper to insert a row
	 * Checks one was inserted
	 * @param array $data associative array of columns and values to insert
	 */
	public function insertRow($data) {
		$qb = $this->conn->getQueryBuilder();
		$qb->insert('appconfig');
		$data['appid'] = 'testadapter';
		foreach ($data as $col => $val) {
			$qb->setValue($col, $qb->createParameter($col))
				->setParameter($col, $val);
		}
		$rows = $qb->execute();
		$this->assertEquals(1, $rows);
	}

	/**
	 * Helper method to check that a test row does exist in the database
	 * @param $key
	 * @param $value
	 */
	private function assertRowExists($key, $value) {
		$query = $this->conn->getQueryBuilder();
		$result = $query->select('*')
			->from('*PREFIX*appconfig')
			->where($query->expr()->eq('configvalue', $query->createNamedParameter($value)))
			->where($query->expr()->eq('configkey', $query->createNamedParameter($key)))
			->execute();
		$this->assertCount(1, $result->fetchAllAssociative());
	}

	/**
	 * Use upsert to insert a row into the database when nothing exists
	 * Should fail to update (does not exist), and insert a new row
	 */
	public function testUpsertWithNoRowPresent() {
		// Insert or update a new row
		$rows = $this->adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => 'test1', 'configkey' => 'test1'], ['appid', 'configkey']);
		$this->assertEquals(1, $rows);
		$this->assertRowExists('test1', 'test1');
	}

	/**
	 * Use upsert to insert a row into the database when row exists
	 * Should update row
	 */
	public function testUpsertWithRowPresent() {
		// Insert row
		$this->insertRow(['configvalue' => 'test2', 'configkey' => 'test2-key']);
		// Update it
		$rows = $this->adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => 'test2-newval', 'configkey' => 'test2-key'], ['appid', 'configkey']);
		$this->assertEquals(1, $rows);
		$this->assertRowExists('test2-key', 'test2-newval');
	}

	public function testUpsertWhenCompareColumnValueIsEmpty() {
		// Insert row
		$this->insertRow(['configvalue' => '', 'configkey' => 'test5-key']);
		// Update it
		$rows = $this->adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => '', 'configkey' => 'test5-key'], ['appid', 'configkey', 'configvalue']);
		$this->assertEquals(1, $rows);
		$this->assertRowExists('test5-key', '');
	}

	public function testUpsertCatchDeadlockAndThrowsException() {
		$mockConn = $this->createMock(IDBConnection::class);
		$qb = $this->createMock(IQueryBuilder::class);
		$qb->expects($this->exactly(4))->method('expr')->willReturn($this->createMock(IExpressionBuilder::class));
		$qb->expects($this->exactly(3))->method('set')->willReturn($qb);
		$qb->expects($this->exactly(3))->method('setValue')->willReturn($qb);
		// Make a deadlock driver exception
		$ex = $this->createMock(AbstractException::class);
		#$ex->expects($this->exactly(5))->method('getErrorCode')->willReturn(1213);
		// Wrap the exception in a doctrine exception
		$e = new DBALException\DeadlockException($ex, null);
		// Should be called 5 times for maxTry then kick out the exception
		$qb->expects($this->exactly(5))->method('execute')->willThrowException($e);
		$mockConn->expects($this->exactly(2))->method('getQueryBuilder')->willReturn($qb);
		// expect a runtime exception because of a deadlock
		$this->expectException(\RuntimeException::class);
		// Run
		$adapter = new Adapter($mockConn);
		$rows = $adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => 'test4-updated', 'configkey' => 'test4-updated'], ['appid', 'configkey']);
	}

	public function testUpsertCatchExceptionAndThrowImmediately() {
		$mockConn = $this->createMock(IDBConnection::class);
		$qb = $this->createMock(IQueryBuilder::class);
		$qb->expects($this->exactly(4))->method('expr')->willReturn($this->createMock(IExpressionBuilder::class));
		$qb->expects($this->exactly(3))->method('set')->willReturn($qb);
		$qb->expects($this->exactly(3))->method('setValue')->willReturn($qb);
		// Make random dbal exception which should be throw immediately, not retried
		$e = new DBALException();
		// Should be called 5 times for maxTry then kick out the exception
		$qb->expects($this->exactly(1))->method('execute')->willThrowException($e);
		$mockConn->expects($this->exactly(2))->method('getQueryBuilder')->willReturn($qb);
		// expect the dbal exception straight away
		$this->expectException(DBALException::class);
		// Run
		$adapter = new Adapter($mockConn);
		$rows = $adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => 'test4-updated', 'configkey' => 'test4-updated'], ['appid', 'configkey']);
	}

	public function testUpsertAndThrowOtherDriverExceptions() {
		$mockConn = $this->createMock(IDBConnection::class);
		$qb = $this->createMock(IQueryBuilder::class);
		$qb->expects($this->exactly(4))->method('expr')->willReturn($this->createMock(IExpressionBuilder::class));
		$qb->expects($this->exactly(3))->method('set')->willReturn($qb);
		$qb->expects($this->exactly(3))->method('setValue')->willReturn($qb);
		// Make a deadlock driver exception
		$ex = $this->createMock(AbstractException::class);
		#$ex->expects($this->exactly(1))->method('getErrorCode')->willReturn(1214);
		// Wrap the exception in a doctrine exception
		/** @var  DriverException|\PHPUnit\Framework\MockObject\MockObject $ex */
		$e = new \Doctrine\DBAL\Exception\DriverException($ex, null);
		// Should be called 5 times for maxTry then kick out the exception
		$qb->expects($this->exactly(1))->method('execute')->willThrowException($e);
		$mockConn->expects($this->exactly(2))->method('getQueryBuilder')->willReturn($qb);
		// expect a driver exception - not deadlock
		$this->expectException(\Doctrine\DBAL\Exception\DriverException::class);
		// Run
		$adapter = new Adapter($mockConn);
		$rows = $adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => 'test4-updated', 'configkey' => 'test4-updated'], ['appid', 'configkey']);
	}

	/**
	 * Runs an upsert against a stubbed connection and returns the type that was
	 * handed to the expression builder for each compare column. A column mapped
	 * to IQueryBuilder::PARAM_STR is the one that OCIExpressionBuilder wraps in
	 * to_char(); a column mapped to null is compared as it is.
	 *
	 * The platform is faked, so that every platform is pinned no matter which
	 * database the job runs against. The live Oracle behaviour is pinned by the
	 * tests at the bottom of this class.
	 *
	 * @param string $adapterClass
	 * @param AbstractPlatform $platform
	 * @param string $table table name including *PREFIX*
	 * @param array $input column name => value
	 * @param array $compare columns to compare
	 * @param array|null $columns column name as stored => doctrine type name,
	 *				or null to make the schema lookup fail
	 * @param string|null $expectedIdentifier the identifier the schema manager
	 *				must be queried with, or null not to check it
	 * @return array compare column => type
	 */
	private function captureCompareTypes(
		$adapterClass,
		AbstractPlatform $platform,
		$table,
		array $input,
		array $compare,
		$columns,
		$expectedIdentifier
	) {
		$captured = [];

		$expr = $this->createMock(IExpressionBuilder::class);
		$expr->method('literal')->willReturnCallback(function ($value) {
			return "'$value'";
		});
		$expr->method('eq')->willReturnCallback(function ($x, $y, $type = null) use (&$captured) {
			$captured[$x] = $type;
			return "$x = $y";
		});

		$qb = $this->createMock(IQueryBuilder::class);
		$qb->method('expr')->willReturn($expr);
		$qb->method('set')->willReturn($qb);
		$qb->method('setValue')->willReturn($qb);
		// pretend the update hit a row, so the insert is never attempted
		$qb->method('execute')->willReturn(1);

		$schemaManager = $this->createMock(AbstractSchemaManager::class);
		$listTableColumns = $schemaManager->method('listTableColumns');
		if ($expectedIdentifier !== null) {
			$listTableColumns->with($expectedIdentifier);
		}
		if ($columns === null) {
			$listTableColumns->willThrowException(new DBALException('unknown table'));
		} else {
			$portableColumns = [];
			foreach ($columns as $name => $typeName) {
				$column = new Column($name, Type::getType($typeName));
				// this is how AbstractSchemaManager keys the result: by the quoted name
				$portableColumns[\strtolower($column->getQuotedName($platform))] = $column;
			}
			$listTableColumns->willReturn($portableColumns);
		}

		$conn = $this->createMock(Connection::class);
		$conn->method('getDatabasePlatform')->willReturn($platform);
		$conn->method('getQueryBuilder')->willReturn($qb);
		$conn->method('getSchemaManager')->willReturn($schemaManager);
		$conn->method('getPrefix')->willReturn('oc_');
		$conn->method('quoteIdentifier')->willReturnCallback(function ($name) use ($platform) {
			return $platform->quoteIdentifier($name);
		});

		$adapter = new $adapterClass($conn);
		$this->assertEquals(1, $adapter->upsert($table, $input, $compare));

		return $captured;
	}

	/**
	 * The regression behind SE-1776: on Oracle the compare columns of a
	 * filecache upsert must not be wrapped in to_char(), because to_char(col)
	 * is not sargable - the unique index fs_storage_path_hash then cannot be
	 * used and every upload or rename degrades into an index skip scan.
	 */
	public function testUpsertOnOracleDoesNotCastNonLobCompareColumns() {
		$types = $this->captureCompareTypes(
			AdapterOCI8::class,
			new OraclePlatform(),
			'*PREFIX*filecache',
			['storage' => 1, 'path' => 'files/foo.txt', 'path_hash' => \md5('files/foo.txt')],
			['storage', 'path_hash'],
			[
				'storage' => Types::INTEGER,
				'path' => Types::STRING,
				'path_hash' => Types::STRING,
			],
			'"oc_filecache"'
		);

		$this->assertSame(['storage' => null, 'path_hash' => null], $types);
	}

	/**
	 * The other half: a text column in the compare array still has to be cast,
	 * because Oracle cannot compare a CLOB with = at all (ORA-00932).
	 */
	public function testUpsertOnOracleCastsLobCompareColumns() {
		$types = $this->captureCompareTypes(
			AdapterOCI8::class,
			new OraclePlatform(),
			'*PREFIX*appconfig',
			['appid' => 'core', 'configkey' => 'installedat', 'configvalue' => '1234567890'],
			['appid', 'configkey', 'configvalue'],
			[
				'appid' => Types::STRING,
				'configkey' => Types::STRING,
				'configvalue' => Types::TEXT,
			],
			'"oc_appconfig"'
		);

		$this->assertSame([
			'appid' => null,
			'configkey' => null,
			'configvalue' => IQueryBuilder::PARAM_STR,
		], $types);
	}

	/**
	 * A column whose name is a reserved word is created quoted, and the schema
	 * manager returns it keyed by its quoted name - the lookup must still match
	 * the plain column name used in the compare array.
	 */
	public function testUpsertOnOracleCastsLobColumnWithQuotedName() {
		$types = $this->captureCompareTypes(
			AdapterOCI8::class,
			new OraclePlatform(),
			'*PREFIX*testtable',
			['key' => 'somekey', 'value' => 'somevalue'],
			['key', 'value'],
			['"key"' => Types::STRING, '"value"' => Types::TEXT],
			'"oc_testtable"'
		);

		$this->assertSame(['key' => null, 'value' => IQueryBuilder::PARAM_STR], $types);
	}

	/**
	 * If the column types cannot be resolved, every compare column is cast -
	 * the behaviour that shipped before large objects were told apart. It is
	 * slow, but it can never raise ORA-00932.
	 *
	 * Note that this class cannot use a data provider: its constructor takes no
	 * arguments, so PHPUnit has no way to hand a data set to an instance.
	 *
	 * @param array|null $columns
	 */
	private function assertUpsertOnOracleCastsEverything($columns) {
		$types = $this->captureCompareTypes(
			AdapterOCI8::class,
			new OraclePlatform(),
			'*PREFIX*filecache',
			['storage' => 1, 'path_hash' => \md5('files/foo.txt')],
			['storage', 'path_hash'],
			$columns,
			'"oc_filecache"'
		);

		$this->assertSame([
			'storage' => IQueryBuilder::PARAM_STR,
			'path_hash' => IQueryBuilder::PARAM_STR,
		], $types);
	}

	public function testUpsertOnOracleCastsEverythingWhenTheSchemaManagerThrows() {
		$this->assertUpsertOnOracleCastsEverything(null);
	}

	public function testUpsertOnOracleCastsEverythingWhenTheTableIsUnknown() {
		$this->assertUpsertOnOracleCastsEverything([]);
	}

	/**
	 * Every other platform compares all columns as they are, text columns
	 * included - ExpressionBuilder::eq() ignores the type argument there.
	 */
	public function testUpsertDoesNotCastAnythingOnOtherPlatforms() {
		$types = $this->captureCompareTypes(
			Adapter::class,
			new SqlitePlatform(),
			'*PREFIX*appconfig',
			['appid' => 'core', 'configkey' => 'installedat', 'configvalue' => '1234567890'],
			['appid', 'configkey', 'configvalue'],
			[
				'appid' => Types::STRING,
				'configkey' => Types::STRING,
				'configvalue' => Types::TEXT,
			],
			null
		);

		$this->assertSame([
			'appid' => null,
			'configkey' => null,
			'configvalue' => null,
		], $types);
	}

	/**
	 * An Oracle adapter for the live connection, or a skipped test everywhere
	 * else. The adapter has to be built here: the one this class keeps is a
	 * plain Adapter, which never casts anything on any platform.
	 *
	 * @return AdapterOCI8
	 */
	private function getOracleAdapterOrSkip() {
		if (!$this->conn->getDatabasePlatform() instanceof OraclePlatform) {
			$this->markTestSkipped('the live Oracle schema is only available on the Oracle job');
		}
		return new AdapterOCI8($this->conn);
	}

	/**
	 * The comparison that upsert() builds for a single compare column, rendered
	 * by the expression builder of the live connection.
	 *
	 * @param string $table table name without the prefix
	 * @param string $column
	 * @param array $types result of getCompareColumnTypes()
	 * @return string
	 */
	private function buildCompareSql($table, $column, array $types) {
		$qb = $this->conn->getQueryBuilder();
		$qb->select($column)
			->from($table)
			->where(
				$qb->expr()->eq(
					$column,
					$qb->expr()->literal('x'),
					$types[$column] ?? null
				)
			);
		return $qb->getSQL();
	}

	/**
	 * The tests above fake the platform, so they cannot prove that the schema
	 * lookup finds an ownCloud table on a live Oracle at all: the tables are
	 * created quoted and therefore in lower case, while Oracle folds an
	 * unquoted identifier to upper case. If the lookup came up empty, every
	 * compare column would be cast again - which is the regression this fixes.
	 */
	public function testCompareColumnTypesAreResolvedFromTheLiveOracleSchema() {
		$adapter = $this->getOracleAdapterOrSkip();

		// storage is a NUMBER and path_hash a VARCHAR2, so neither is cast -
		// otherwise the unique index fs_storage_path_hash cannot be used
		$this->assertSame(
			[],
			self::invokePrivate($adapter, 'getCompareColumnTypes', ['*PREFIX*filecache', ['storage', 'path_hash']])
		);

		// configvalue is a CLOB and is the only one of the three that is cast
		$this->assertSame(
			['configvalue' => IQueryBuilder::PARAM_STR],
			self::invokePrivate($adapter, 'getCompareColumnTypes', ['*PREFIX*appconfig', ['appid', 'configkey', 'configvalue']])
		);
	}

	/**
	 * What the resolved types amount to in the generated SQL on a live Oracle:
	 * no to_char() around an indexed column, and still one around the CLOB.
	 */
	public function testUpsertSqlOnOracleDoesNotCastTheIndexedColumns() {
		$adapter = $this->getOracleAdapterOrSkip();

		$fileCacheTypes = self::invokePrivate($adapter, 'getCompareColumnTypes', ['*PREFIX*filecache', ['storage', 'path_hash']]);
		$this->assertStringNotContainsString('to_char', $this->buildCompareSql('filecache', 'storage', $fileCacheTypes));
		$this->assertStringNotContainsString('to_char', $this->buildCompareSql('filecache', 'path_hash', $fileCacheTypes));

		$appConfigTypes = self::invokePrivate($adapter, 'getCompareColumnTypes', ['*PREFIX*appconfig', ['configvalue']]);
		$this->assertStringContainsString('to_char', $this->buildCompareSql('appconfig', 'configvalue', $appConfigTypes));
	}

	/**
	 * Both comparisons have to keep working against a live Oracle: an uncast
	 * VARCHAR2 column, and a CLOB column that is still cast. A comparison that
	 * fails to match makes upsert() fall through to the insert, so a second row
	 * would appear - or the primary key of oc_appconfig would reject it and the
	 * upsert would end in a RuntimeException after five attempts. Both are
	 * caught by asserting that exactly one row is there afterwards.
	 */
	public function testUpsertOnOracleMatchesOnUncastAndOnCastColumns() {
		$adapter = $this->getOracleAdapterOrSkip();
		$input = ['appid' => 'testadapter', 'configkey' => 'test-oracle', 'configvalue' => 'v1'];

		// inserts, because nothing is there yet
		$this->assertEquals(1, $adapter->upsert('*PREFIX*appconfig', $input, ['appid', 'configkey']));
		$this->assertRowExists('test-oracle', 'v1');

		// updates, comparing two VARCHAR2 columns that are no longer cast
		$input['configvalue'] = 'v2';
		$this->assertEquals(1, $adapter->upsert('*PREFIX*appconfig', $input, ['appid', 'configkey']));
		$this->assertRowExists('test-oracle', 'v2');

		// updates again, this time comparing the CLOB column: the cast is what
		// makes that possible at all, without it Oracle raises ORA-00932
		$this->assertEquals(1, $adapter->upsert('*PREFIX*appconfig', $input, ['appid', 'configvalue']));
		$this->assertRowExists('test-oracle', 'v2');
	}
}
