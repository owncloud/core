<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

namespace Test\Repair;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Migration\IOutput;

/**
 * Tests for the clearings stray file locks
 *
 * @group DB
 *
 * @see \OC\Repair\ClearStrayFileLocks
 */
class ClearStrayFileLocksTest extends \Test\TestCase {

	/** @var \OC\Repair\ClearStrayFileLocks */
	protected $repair;

	/** @var \OCP\IDBConnection */
	protected $connection;

	/** @var IOutput */
	private $outputMock;

	protected function setUp() {
		parent::setUp();

		$this->outputMock = $this->getMockBuilder('\OCP\Migration\IOutput')
			->disableOriginalConstructor()
			->getMock();

		$this->connection = \OC::$server->getDatabaseConnection();
		$this->repair = new \OC\Repair\ClearStrayFileLocks($this->connection);
		$this->cleanUpTables();
	}

	protected function tearDown() {
		$this->cleanUpTables();

		parent::tearDown();
	}

	protected function cleanUpTables() {
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('file_locks')
			->execute();
	}

	private function getLock($key) {
		$qb = $this->connection->getQueryBuilder();
		$result = $qb->select('lock')
			->from('file_locks')
			->where($qb->expr()->eq('key', $qb->createNamedParameter($key)))
			->execute();

		$row = $result->fetch();
		if ($row) {
			return $row['lock'];
		}
		$result->closeCursor();
		return null;
	}

	private function addLock($key, $value) {
		$qb = $this->connection->getQueryBuilder();
		$qb->insert('file_locks')
			->values([
				'lock' => $qb->createNamedParameter($value),
				'key' => $qb->createNamedParameter($key),
				'ttl' => $qb->createNamedParameter(time() + 3600),
			])
			->execute();
	}

	public function testRun() {
		$this->addLock('key0', 0);
		$this->addLock('key-1', -1);
		$this->addLock('key1', 1);
		$this->addLock('key2', 2);

		$this->outputMock->expects($this->once())
			->method('info')
			->with('Cleared 3 stray locks');

		$this->repair->run($this->outputMock);

		$this->assertEquals(0, $this->getLock('key0'));
		$this->assertEquals(0, $this->getLock('key-1'));
		$this->assertEquals(0, $this->getLock('key1'));
		$this->assertEquals(0, $this->getLock('key2'));
	}
}
