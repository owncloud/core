<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Vincent Petry <pvince81@owncloud.com>
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
namespace Test\Files\External\Service;

use OC\Files\Config\UserMountCache;
use OC\Files\External\Service\GlobalStoragesService;
use OC\Files\External\Service\UserStoragesService;
use OC\Files\External\StorageConfig;
use OC\Files\Filesystem;
use OC\Files\Mount\MountPoint;
use OCP\Files\External\IStorageConfig;
use OCP\Files\External\Service\IStoragesService;
use OCP\ILogger;
use OCP\IUser;
use Test\Traits\UserTrait;

/**
 * @group DB
 */
class UserStoragesServiceTest extends StoragesServiceTest {
	use UserTrait;

	private $user;

	private $userId;

	/**
	 * @var IStoragesService
	 */
	protected $globalStoragesService;

	public function setUp() {
		parent::setUp();

		$this->globalStoragesService = new GlobalStoragesService($this->backendService, $this->dbConfig, $this->mountCache);

		$this->userId = $this->getUniqueID('user_');
		$this->user = $this->createUser($this->userId, $this->userId);

		/** @var \OCP\IUserSession|\PHPUnit_Framework_MockObject_MockObject $userSession */
		$userSession = $this->createMock('\OCP\IUserSession');
		$userSession
			->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$this->service = new UserStoragesService($this->backendService, $this->dbConfig, $userSession, $this->mountCache);
	}

	private function makeTestStorageData() {
		return $this->makeStorageConfig([
			'mountPoint' => 'mountpoint',
			'backendIdentifier' => 'identifier:\Test\Files\External\Backend\DummyBackend',
			'authMechanismIdentifier' => 'identifier:\Auth\Mechanism',
			'backendOptions' => [
				'option1' => 'value1',
				'option2' => 'value2',
				'password' => 'testPassword',
			],
			'mountOptions' => [
				'preview' => false,
			]
		]);
	}

	public function testAddStorage() {
		$storage = $this->makeTestStorageData();

		$newStorage = $this->service->addStorage($storage);

		$id = $newStorage->getId();

		$newStorage = $this->service->getStorage($id);

		$this->assertEquals($storage->getMountPoint(), $newStorage->getMountPoint());
		$this->assertEquals($storage->getBackend(), $newStorage->getBackend());
		$this->assertEquals($storage->getAuthMechanism(), $newStorage->getAuthMechanism());
		$this->assertEquals($storage->getBackendOptions(), $newStorage->getBackendOptions());
		$this->assertEquals(0, $newStorage->getStatus());

		// hook called once for user
		$this->assertHookCall(
			current(self::$hookCalls),
			Filesystem::signal_create_mount,
			$storage->getMountPoint(),
			IStorageConfig::MOUNT_TYPE_USER,
			$this->userId
		);

		$nextStorage = $this->service->addStorage($storage);
		$this->assertEquals($id + 1, $nextStorage->getId());
	}

	public function testUpdateStorage() {
		$storage = $this->makeStorageConfig([
			'mountPoint' => 'mountpoint',
			'backendIdentifier' => 'identifier:\Test\Files\External\Backend\DummyBackend',
			'authMechanismIdentifier' => 'identifier:\Auth\Mechanism',
			'backendOptions' => [
				'option1' => 'value1',
				'option2' => 'value2',
				'password' => 'testPassword',
			],
		]);

		$newStorage = $this->service->addStorage($storage);

		$backendOptions = $newStorage->getBackendOptions();
		$backendOptions['password'] = 'anotherPassword';
		$newStorage->setBackendOptions($backendOptions);

		self::$hookCalls = [];

		$newStorage = $this->service->updateStorage($newStorage);

		$this->assertEquals('anotherPassword', $newStorage->getBackendOptions()['password']);
		$this->assertEquals([$this->userId], $newStorage->getApplicableUsers());
		// these attributes are unused for user storages
		$this->assertEmpty($newStorage->getApplicableGroups());
		$this->assertEquals(0, $newStorage->getStatus());

		// no hook calls
		$this->assertEmpty(self::$hookCalls);
	}

	/**
	 * @dataProvider deleteStorageDataProvider
	 */
	public function testDeleteStorage($backendOptions, $rustyStorageId, $expectedCountAfterDeletion) {
		parent::testDeleteStorage($backendOptions, $rustyStorageId, $expectedCountAfterDeletion);

		// hook called once for user (first one was during test creation)
		$this->assertHookCall(
			self::$hookCalls[1],
			Filesystem::signal_delete_mount,
			'/mountpoint',
			IStorageConfig::MOUNT_TYPE_USER,
			$this->userId
		);
	}

	public function testHooksRenameMountPoint() {
		$storage = $this->makeTestStorageData();
		$storage = $this->service->addStorage($storage);

		$storage->setMountPoint('renamedMountpoint');

		// reset calls
		self::$hookCalls = [];

		$this->service->updateStorage($storage);

		// hook called twice
		$this->assertHookCall(
			self::$hookCalls[0],
			Filesystem::signal_delete_mount,
			'/mountpoint',
			IStorageConfig::MOUNT_TYPE_USER,
			$this->userId
		);
		$this->assertHookCall(
			self::$hookCalls[1],
			Filesystem::signal_create_mount,
			'/renamedMountpoint',
			IStorageConfig::MOUNT_TYPE_USER,
			$this->userId
		);
	}

	/**
	 * @expectedException \OCP\Files\External\NotFoundException
	 */
	public function testGetAdminStorage() {
		$backend = $this->backendService->getBackend('identifier:\Test\Files\External\Backend\DummyBackend');
		$authMechanism = $this->backendService->getAuthMechanism('identifier:\Auth\Mechanism');

		$storage = new StorageConfig();
		$storage->setMountPoint('mountpoint');
		$storage->setBackend($backend);
		$storage->setAuthMechanism($authMechanism);
		$storage->setBackendOptions(['password' => 'testPassword']);
		$storage->setApplicableUsers([$this->userId]);

		$newStorage = $this->globalStoragesService->addStorage($storage);

		$this->assertInstanceOf('\OC\Files\External\StorageConfig', $this->globalStoragesService->getStorage($newStorage->getId()));

		$this->service->getStorage($newStorage->getId());
	}

	private function getStorage($storageId, $rootId) {
		$storageCache = $this->getMockBuilder('\OC\Files\Cache\Storage')
			->disableOriginalConstructor()
			->getMock();
		$storageCache->expects($this->any())
			->method('getNumericId')
			->will($this->returnValue($storageId));

		$cache = $this->getMockBuilder('\OC\Files\Cache\Cache')
			->disableOriginalConstructor()
			->getMock();
		$cache->expects($this->any())
			->method('getId')
			->will($this->returnValue($rootId));

		$storage = $this->getMockBuilder('\OC\Files\Storage\Storage')
			->disableOriginalConstructor()
			->getMock();
		$storage->expects($this->any())
			->method('getStorageCache')
			->will($this->returnValue($storageCache));
		$storage->expects($this->any())
			->method('getCache')
			->will($this->returnValue($cache));

		return $storage;
	}

	public function testDeleteAllMountsForUser() {
		$storage1 = $this->getStorage(10, 20);
		$storage2 = $this->getStorage(12, 22);

		$mount1 = new MountPoint($storage1, '/foo/');
		$mount2 = new MountPoint($storage2, '/bar/');

		$dbConnection = \OC::$server->getDatabaseConnection();
		$userManager = \OC::$server->getUserManager();
		$logger = $this->createMock(ILogger::class);
		$userMountCache = new UserMountCache($dbConnection, $userManager, $logger);
		$user1 = $userManager->createUser('user1', 'user1');
		$user2 = $userManager->createUser('user2', 'user2');

		$userMountCache->registerMounts($user1, [$mount1, $mount2]);

		$userMountCache->registerMounts($user2, [$mount2]);

		$backendService = \OC::$server->getStoragesBackendService();
		$userSession = \OC::$server->getUserSession();
		$this->service = new UserStoragesService($backendService, $this->dbConfig, $userSession, $userMountCache);
		$this->assertTrue($this->service->deleteAllMountsForUser($user1));
		$storarge1Result1 = $userMountCache->getMountsForStorageId(10);
		$storarge1Result2 = $userMountCache->getMountsForStorageId(12);
		$this->assertEquals(0, \count($storarge1Result1));
		$this->assertEquals(1, \count($storarge1Result2));
		$this->assertEquals(12, $storarge1Result2[0]->getStorageId());
		$this->assertEquals('/bar/', $storarge1Result2[0]->getMountPoint());
	}
}
