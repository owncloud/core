<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace Test\Lock;

use OCP\Lock\ILockingProvider;

/**
 * Class DBLockingProvider
 *
 * @group DB
 *
 * @package Test\Lock
 */
class DBLockingProviderTest extends LockingProvider {
	/**
	 * @var \OC\Lock\DBLockingProvider
	 */
	protected $instance;

	/**
	 * @var \OCP\IDBConnection
	 */
	private $connection;

	/**
	 * @var \OCP\AppFramework\Utility\ITimeFactory
	 */
	private $timeFactory;

	private $currentTime;

	public function setUp(): void {
		$this->currentTime = \time();
		$this->timeFactory = $this->createMock('\OCP\AppFramework\Utility\ITimeFactory');
		$this->timeFactory->expects($this->any())
			->method('getTime')
			->will($this->returnCallback(function () {
				return $this->currentTime;
			}));
		parent::setUp();
		# we shall operate on a clean table
		$this->connection->executeQuery('DELETE FROM `*PREFIX*file_locks`');
	}

	/**
	 * @return \OCP\Lock\ILockingProvider
	 */
	protected function getInstance() {
		$this->connection = \OC::$server->getDatabaseConnection();
		return new \OC\Lock\DBLockingProvider($this->connection, \OC::$server->getLogger(), $this->timeFactory, 3600);
	}

	public function tearDown(): void {
		$this->connection->executeQuery('DELETE FROM `*PREFIX*file_locks`');
		parent::tearDown();
	}

	public function testCleanEmptyLocks() {
		$this->currentTime = 100;
		$this->instance->acquireLock('foo', ILockingProvider::LOCK_EXCLUSIVE);
		$this->instance->acquireLock('asd', ILockingProvider::LOCK_EXCLUSIVE);

		$this->currentTime = 200;
		$this->instance->acquireLock('bar', ILockingProvider::LOCK_EXCLUSIVE);
		$this->instance->changeLock('asd', ILockingProvider::LOCK_SHARED);

		$this->currentTime = 150 + 3600;

		$this->assertLocks(['foo', 'asd', 'bar']);

		$this->instance->cleanExpiredLocks();

		$this->assertLocks(['asd', 'bar']);
	}

	private function getLockEntries() {
		$query = $this->connection->prepare('SELECT * FROM `*PREFIX*file_locks`');
		$query->execute();
		$rows = $query->fetchAll();
		$query->closeCursor();
		return $rows;
	}

	protected function assertLocks(array $expected) {
		$locks = $this->getLockEntries();
		$this->assertCount(\count($expected), $locks, \json_encode($locks));
	}
}
