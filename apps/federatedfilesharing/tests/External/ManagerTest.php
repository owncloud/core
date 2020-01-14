<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\FederatedFileSharing\Tests\External;

use Doctrine\DBAL\Driver\Statement;
use OC\Files\Cache\Cache;
use OC\Files\Mount\Manager as MountManager;
use OC\Files\Storage\Storage;
use OCA\Files_Sharing\External\Manager;
use OCA\FederatedFileSharing\Tests\TestCase;
use OCP\Files\Mount\IMountPoint;
use OCP\Files\Storage\IStorageFactory;
use OCP\IDBConnection;
use OCP\Notification\IManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ManagerTest extends TestCase {
	/** @var Manager */
	private $manager;

	/** @var IDBConnection | \PHPUnit\Framework\MockObject\MockObject */
	private $connection;

	/** @var MountManager | \PHPUnit\Framework\MockObject\MockObject */
	private $mountManager;

	/** @var IStorageFactory | \PHPUnit\Framework\MockObject\MockObject */
	private $storageFactory;

	/** @var IManager | \PHPUnit\Framework\MockObject\MockObject */
	private $notificationManager;

	/** @var EventDispatcherInterface | \PHPUnit\Framework\MockObject\MockObject */
	private $eventDispatcher;

	private $uid = 'john doe';

	protected function setUp():void {
		$this->connection = $this->createMock(IDBConnection::class);
		$this->mountManager = $this->createMock(MountManager::class);
		$this->storageFactory = $this->createMock(IStorageFactory::class);
		$this->notificationManager = $this->createMock(IManager::class);
		$this->eventDispatcher = $this->createMock(EventDispatcherInterface::class);
		$this->manager = new Manager(
			$this->connection,
			$this->mountManager,
			$this->storageFactory,
			$this->notificationManager,
			$this->eventDispatcher,
			$this->uid
		);
	}

	public function testRemoveShareForNonExistingShareDispatchNoEvents() {
		$this->eventDispatcher->expects($this->never())
			->method('dispatch');

		$statement = $this->createMock(Statement::class);
		$statement->method('execute')->willReturnOnConsecutiveCalls(true, false);
		$statement->method('fetch')->willReturn(false);
		$this->connection->method('prepare')->willReturn($statement);

		$cache = $this->createMock(Cache::class);
		$cache->method('getId')->willReturn(99);

		$storage = $this->createMock(Storage::class);
		$storage->method('getCache')->willReturn($cache);

		$mountPoint = $this->createMock(IMountPoint::class);
		$mountPoint->method('getStorage')->willReturn($storage);

		$this->mountManager->method('find')
			->willReturn($mountPoint);

		$this->manager->removeShare('/neverhood');
	}
}
