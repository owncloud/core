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


use OC\Repair\RepairShareMountEntries;
use OC\Share\Constants;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use Test\TestCase;

/**
 * Tests for repairing share mount entries in the "oc_mounts" table.
 *
 * @group DB
 *
 * @see \OC\Repair\RepairShareMountEntries
 */
class RepairShareMountEntriesTest extends TestCase {

	/** @var IRepairStep */
	private $repair;

	/** @var \OCP\IDBConnection */
	private $connection;

	protected function setUp() {
		parent::setUp();

		$config = $this->getMockBuilder('OCP\IConfig')
			->disableOriginalConstructor()
			->getMock();
		$config->expects($this->any())
			->method('getSystemValue')
			->with('version')
			->will($this->returnValue('9.0.3.0'));

		$this->connection = \OC::$server->getDatabaseConnection();
		$this->deleteAll();

		/** @var \OCP\IConfig $config */
		$this->repair = new RepairShareMountEntries($config, $this->connection);
	}

	protected function tearDown() {
		$this->deleteAll();

		parent::tearDown();
	}

	protected function deleteAll() {
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('mounts')->execute();
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('filecache')->execute();
	}

	/**
	 * Creates a root entry in oc_filecache for the given storage id
	 *
	 * @param int $storageId storage id for the root
	 */
	private function createRoot($storageId) {
		$qb = $this->connection->getQueryBuilder();
		$values = [
			'path' => $qb->expr()->literal(''),
			'path_hash' => $qb->expr()->literal('d41d8cd98f00b204e9800998ecf8427e'),
			'name' => $qb->expr()->literal(''),
			'storage' => $qb->expr()->literal($storageId),
		];

		$qb->insert('filecache')
			->values($values)
			->execute();
		return $this->connection->lastInsertId('*PREFIX*filecache');
	}

	/**
	 * Creates a mount entry with a matching root entry in oc_filecache
	 *
	 * @param int $storageId storage id
	 * @param int $rootId root id
	 * @param string $mountPoint mount point name
	 */
	private function createMount($storageId, $rootId, $mountPoint) {
		$qb = $this->connection->getQueryBuilder();
		$values = [
			'storage_id' => $qb->expr()->literal($storageId),
			'root_id' => $qb->expr()->literal($rootId),
			'user_id' => $qb->expr()->literal('user1'),
			'mount_point' => $qb->expr()->literal($mountPoint),
		];
		$qb->insert('mounts')
			->values($values)
			->execute();

		return $this->connection->lastInsertId('*PREFIX*mount');
	}

	private function getAllMountIds() {
		$query = $this->connection->getQueryBuilder();
		$results = $query
			->select('id')
			->from('mounts')
			->orderBy('id')
			->execute()
			->fetchAll();

		$ids = [];
		foreach ($results as $result) {
			$ids[] = $result['id'];
		}
		return $ids;
	}

	/**
	 * Test repair mount entries
	 */
	public function testRepairMountEntries() {
		$pageSize = RepairShareMountEntries::CHUNK_SIZE;

		$brokenIds = [];
		$remainingIds = [];

		$storageId = 10;
		for ($i = 0; $i < $pageSize + 60; $i++) {
			$rootId1 = $this->createRoot($storageId);
			$remainingIds[] = $this->createMount($storageId, $rootId1, '/user1/files/test_matching' . $i);
			$rootId2 = $this->createRoot($storageId + 1);
			$brokenIds[] = $this->createMount($storageId, $rootId2, '/user1/files/test_non_matching' . $i);
			$storageId += 10;
		}

		/** @var IOutput | \PHPUnit_Framework_MockObject_MockObject $outputMock */
		$outputMock = $this->getMockBuilder('\OCP\Migration\IOutput')
			->disableOriginalConstructor()
			->getMock();

		$outputMock->expects($this->once())
			->method('startProgress')
			->with($pageSize + 60);

		// test pagination
		$outputMock->expects($this->at(1))
			->method('advance')
			->with($pageSize);
		$outputMock->expects($this->at(2))
			->method('advance')
			->with(60);

		$this->repair->run($outputMock);

		$this->assertEquals($remainingIds, $this->getAllMountIds());
	}
}

