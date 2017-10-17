<?php

/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Driver\DriverException;
use OC\DB\Adapter;
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

	public function tearDown() {
		// remove columns from the appconfig table
		$qb = $this->conn->getQueryBuilder();
		$qb->delete('*PREFIX*appconfig')
			->where(
				$qb->expr()->eq(
					'appid',
					$qb->expr()->literal('testadapter')))
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
		foreach($data as $col => $val) {
			$qb->setValue($col, $qb->createParameter($col))
				->setParameter($col, $val);
		}
		$rows = $qb->execute();
		$this->assertEquals(1, $rows);
	}

	/**
	 * Helper to delete a row
	 * @param array $where associative array of columns and values to check
	 * @return int number of rows changed
	 */
	public function deleteRow($where) {
		$qb = $this->conn->getQueryBuilder();
		$rows = $qb->delete('appconfig')
			->where(
				$qb->expr()->eq(
					'appid',
					$qb->expr()->literal('testadapter')))
			->execute();
		$this->assertEquals(1, $rows);
		return $rows;
	}

	/**
	 * Use upsert to insert a row into the database when nothing exists
	 * Should fail to update, and insert a new row
	 */
	public function testUpsertWithNoRowPresent() {
		// Insert or update a new row
		$rows = $this->adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => 'test1', 'configkey' => 'test1']);
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
		$rows = $this->adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => 'test2-newval', 'configkey' => 'test2-key']);
		$this->assertEquals(1, $rows);
		$this->assertRowExists('test2-key', 'test2-newval');

	}

	/**
	 * Use upsert to insert a row into the database when row exists, using compare col
	 * Should update row
	 */
	public function testUpsertWithRowPresentUsingCompare() {
		// Insert row
		$this->insertRow(['configvalue' => 'test3', 'configkey' => 'test3-key']);
		// Update it
		$rows = $this->adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => 'test3-updated', 'configkey' => 'test3'], ['configvalue']);
		$this->assertEquals(1, $rows);
		$this->assertRowExists('test3-key', 'test3-updated');

	}

	public function testUpsertCatchDeadlockAndThrowsException() {
		$mockConn = $this->createMock(IDBConnection::class);
		$qb = $this->createMock(IQueryBuilder::class);
		$qb->expects($this->exactly(6))->method('expr')->willReturn($this->createMock(IExpressionBuilder::class));
		$qb->expects($this->exactly(3))->method('set')->willReturn($qb);
		$qb->expects($this->exactly(3))->method('setValue')->willReturn($qb);
		// Make a deadlock driver exception
		$ex = $this->createMock(DriverException::class);
		$ex->expects($this->exactly(5))->method('getErrorCode')->willReturn(1213);
		// Wrap the exception in a doctrine exception
		$e = new \Doctrine\DBAL\Exception\DriverException('1213', $ex);
		// Should be called 5 times for maxTry then kick out the exception
		$qb->expects($this->exactly(5))->method('execute')->willThrowException($e);
		$mockConn->expects($this->exactly(2))->method('getQueryBuilder')->willReturn($qb);
		// expect a runtime exception because of a deadlock
		$this->expectException(\RuntimeException::class);
		// Run
		$adapter = new Adapter($mockConn);
		$rows = $adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => 'test4-updated', 'configkey' => 'test4-updated']);
	}

	public function testUpsertCatchExceptionAndThrowImmediately() {
		$mockConn = $this->createMock(IDBConnection::class);
		$qb = $this->createMock(IQueryBuilder::class);
		$qb->expects($this->exactly(6))->method('expr')->willReturn($this->createMock(IExpressionBuilder::class));
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
		$rows = $adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => 'test4-updated', 'configkey' => 'test4-updated']);

	}


	public function testUpsertAndThrowOtherDriverExceptions() {
		$mockConn = $this->createMock(IDBConnection::class);
		$qb = $this->createMock(IQueryBuilder::class);
		$qb->expects($this->exactly(6))->method('expr')->willReturn($this->createMock(IExpressionBuilder::class));
		$qb->expects($this->exactly(3))->method('set')->willReturn($qb);
		$qb->expects($this->exactly(3))->method('setValue')->willReturn($qb);
		// Make a deadlock driver exception
		$ex = $this->createMock(DriverException::class);
		$ex->expects($this->exactly(1))->method('getErrorCode')->willReturn(1214);
		// Wrap the exception in a doctrine exception
		$e = new \Doctrine\DBAL\Exception\DriverException('1214', $ex);
		// Should be called 5 times for maxTry then kick out the exception
		$qb->expects($this->exactly(1))->method('execute')->willThrowException($e);
		$mockConn->expects($this->exactly(2))->method('getQueryBuilder')->willReturn($qb);
		// expect a driver exception - not deadlock
		$this->expectException(\Doctrine\DBAL\Exception\DriverException::class);
		// Run
		$adapter = new Adapter($mockConn);
		$rows = $adapter->upsert('*PREFIX*appconfig', ['appid' => 'testadapter', 'configvalue' => 'test4-updated', 'configkey' => 'test4-updated']);

	}

	private function assertRowExists($key, $value) {
		$query = $this->conn->getQueryBuilder();
		$result = $query->select('*')
			->from('*PREFIX*appconfig')
			->where($query->expr()->eq('configvalue', $query->createNamedParameter($value)))
			->where($query->expr()->eq('configkey', $query->createNamedParameter($key)))
			->execute();
		$this->assertCount(1, $result->fetchAll());
	}

}
