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
		$this->conn->prepare('DELETE FROM *PREFIX*appconfig WHERE `appid` LIKE ?')->execute(['testadapter-%']);
	}

	/**
	 * Helper to insert a row
	 * Checks one was inserted
	 * @param array associative array of columns and values to insert
	 */
	public function insertRow($data) {
		$table = $this->conn->getPrefix() . 'appconfig';
		$data['appid'] = uniqid('testadapter-');
		$query = "INSERT INTO $table ";
		$query .= "(" . implode(',', array_keys($data)) .')';
		$query .= ' VALUES (' . str_repeat('?, ', count($data)-1) . '?)';
		$rows = $this->conn->executeUpdate($query, array_values($data));
		$this->assertEquals(1, $rows);
	}

	/**
	 * Helper to delete a row
	 */
	public function deleteRow($where) {
		$table = $this->conn->getPrefix() . 'appconfig';
		$params = [];
		$query = "DELETE FROM $table WHERE ";
		foreach($where as $col => $val) {
			$query .= "`?` = `?`, ";
			$params[] = $col;
			$params[] = $val;
		}
		$rows = $this->conn->executeUpdate($query, $params);
		$this->assertEquals(1, $rows);
		return $rows;
	}

	/**
	 * Use upsert to insert a row into the database when nothing exists
	 * Should fail to update, and insert a new row
	 */
	public function testUpsertWithNoRowPresent() {
		// Insert or update a new row
		$rows = $this->adapter->upsert('*PREFIX*appconfig', ['configvalue' => 'test1', 'configkey' => 'test1']);
		$this->assertEquals(1, $rows);
		$this->assertRowExists('test1', 'test1');
	}

	/**
	 * Use upsert to insert a row into the database when row exists
	 * Should update row
	 */
	public function testUpsertWithRowPresent() {
		// Insert row
		$this->insertRow(['configvalue' => 'test2', 'configkey' => 'test2']);
		// Update it
		$rows = $this->adapter->upsert('*PREFIX*appconfig', ['configvalue' => 'test2-updated', 'configkey' => 'test2-updated']);
		$this->assertEquals(1, $rows);
		$this->assertRowExists('test2-updated', 'test2-updated');

	}

	/**
	 * Use upsert to insert a row into the database when row exists, using compare col
	 * Should update row
	 */
	public function testUpsertWithRowPresentUsingCompare() {
		// Insert row
		$this->insertRow(['configvalue' => 'test3', 'configkey' => 'test3']);
		// Update it
		$rows = $this->adapter->upsert('*PREFIX*appconfig', ['configvalue' => 'test3-updated', 'configkey' => 'test3-updated'], ['configvalue']);
		$this->assertEquals(1, $rows);
		$this->assertRowExists('test3-updated', 'test3-updated');

	}

	public function testUpsertCatchDeadlockAndThrowsException() {
		$mockConn = $this->createMock(IDBConnection::class);

		$ex = $this->createMock(DriverException::class);
		$ex->expects($this->exactly(10))->method('getErrorCode')->willReturn(1213);
		$e = new \Doctrine\DBAL\Exception\DriverException('1213', $ex);
		$mockConn->expects($this->exactly(10))->method('executeUpdate')->willThrowException($e);

		$this->expectException(\RuntimeException::class);

		// Run
		$adapter = new Adapter($mockConn);
		$rows = $adapter->upsert('*PREFIX*appconfig', ['configvalue' => 'test4-updated', 'configkey' => 'test4-updated']);
	}

	public function testUpsertCatchExceptionAndThrowImmediately() {
		$mockConn = $this->createMock(IDBConnection::class);

		$e = new DBALException();
		$mockConn->expects($this->exactly(1))->method('executeUpdate')->willThrowException($e);

		$this->expectException(DBALException::class);

		// Run
		$adapter = new Adapter($mockConn);
		$rows = $adapter->upsert('*PREFIX*appconfig', ['configvalue' => 'test4-updated', 'configkey' => 'test4-updated']);

	}

	public function testUpsertAndThrowOtherDriverExceptions() {
		$mockConn = $this->createMock(IDBConnection::class);

		$ex = $this->createMock(DriverException::class);
		$ex->expects($this->exactly(1))->method('getErrorCode')->willReturn(1214);
		$e = new \Doctrine\DBAL\Exception\DriverException('1214', $ex);
		$mockConn->expects($this->exactly(1))->method('executeUpdate')->willThrowException($e);

		$this->expectException(\Doctrine\DBAL\Exception\DriverException::class);

		// Run
		$adapter = new Adapter($mockConn);
		$rows = $adapter->upsert('*PREFIX*appconfig', ['configvalue' => 'test4-updated', 'configkey' => 'test4-updated']);
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
