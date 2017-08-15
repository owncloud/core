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
use Doctrine\DBAL\Types\Type;
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

	protected $testTable = 'testdbadapter';

	public function __construct() {
		$this->conn = \OC::$server->getDatabaseConnection();
		$this->adapter = new Adapter($this->conn);
		parent::__construct();
	}

	public function setUp() {
		// Create a dummy table
		$toSchema = $this->conn->createSchema();

		if(!$toSchema->hasTable($this->conn->getPrefix() . $this->testTable)) {
			$table = $toSchema->createTable($this->conn->getPrefix() . $this->testTable);
			$table->addColumn('id', Type::BIGINT, [
				'autoincrement' => true,
				'unsigned' => true,
				'notnull' => true,
			]);
			$table->addColumn('val1', Type::TEXT, [
				'notnull' => true,
			]);
			$table->setPrimaryKey(['id']);
			$this->conn->migrateToSchema($toSchema);
		}
	}

	public function tearDown() {
		// Drop the test table
		$toSchema = $this->conn->createSchema();

		if($toSchema->hasTable($this->conn->getPrefix() . $this->testTable)) {
			$table = $toSchema->dropTable($this->conn->getPrefix() . $this->testTable);
			$this->conn->migrateToSchema($toSchema);
		}
	}

	/**
	 * Use upsert to insert a row into the database
	 */
	public function testUpsertWithNoValuePresent() {
		$rows = $this->adapter->upsert($this->conn->getPrefix() . $this->testTable, ['val1' => 'test']);
		$this->assertEquals(1, $rows);
	}

	/**
	 * Use upsert to update an existing row in the database
	 */
	public function testUpsertToUpdateRow() {
		$row1 = [];
		$row2 = [];
		$rows = $this->conn->insert($this->conn->getPrefix() . $this->testTable, ['val1' => 'test']);
		$this->assertEquals(1, $rows);
		$rows = $this->adapter->upsert($this->conn->getPrefix() . $this->testTable, ['val1' => 'test-updated']);
		$this->assertEquals(1, $rows);
		// Now cehck the value of this column for this row
	}

	public function testUpsertToUpdateWithCompare() {
		$row1 = [];
		$row2 = [];
	}

	public function testUpsertToUpdateWithCompareNoMatches() {
		$row1 = [];
		$row2 = [];
	}

}
