<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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
use OC\Files\External\Service\DBConfigService;
use OC\Files\External\Service\GlobalStoragesService;
use OC\Files\External\StoragesBackendService;
use OCA\Files_External\Lib\Backend\Backend;
use OCP\IUser;
use Test\TestCase;

/**
 * Class GlobalStoragesServiceDeleteUser
 *
 * @group DB
 * @package Test\Files\External\Service
 */
class GlobalStoragesServiceDeleteUserTest extends TestCase {
	public function setUp() {
		parent::setUp();
	}

	public function tearDown() {
		parent::tearDown();

		//Remove all global storages created
		$globalStorageService = \OC::$server->getGlobalStoragesService();
		foreach ($globalStorageService->getAllStorages() as $storage) {
			$storageId = $storage->getId();
			$globalStorageService->removeStorage($storageId);
		}
	}

	public function providesDeleteAllUser() {
		return [
			[
				[
					[
						'applicableUsers' => ['user1', 'user2'],
						'applicableGroups' => ['group1'],
						'priority' => 12,
						'authMechanism' => 'identifier:\Auth\Mechanism',
						'storageClass' => 'OC\Files\Storage\DAV',
						'backendIdentifier' => 'identifier:\Test\Files\External\Backend\DummyBackend',
						'backendOptions' => [
							'host' => 'http://localhost',
							'root' => 'test',
							'secure' => 'false',
							'user' => 'foo',
							'password' => 'foo'
						]
					],
					[
						'applicableUsers' => ['user1', 'user3'],
						'applicableGroups' => [],
						'priority' => 13,
						'authMechanism' => 'identifier:\Auth\Mechanism',
						'storageClass' => 'OC\Files\Storage\DAV',
						'backendIdentifier' => 'identifier:\Test\Files\External\Backend\DummyBackend2',
						'backendOptions' => [
							'host' => 'http://localhost',
							'root' => 'test1',
							'secure' => 'false',
							'user' => 'foo',
							'password' => 'foo'
						]
					],
					[
						'applicableUsers' => ['user1', 'user4'],
						'applicableGroups' => [],
						'priority' => 14,
						'storageClass' => 'OC\Files\Storage\DAV',
						'authMechanism' => 'identifier:\Auth\Mechanism',
						'backendIdentifier' => 'identifier:\Test\Files\External\Backend\DummyBackend2',
						'backendOptions' => [
							'host' => 'http://localhost',
							'root' => 'test2',
							'secure' => 'false',
							'user' => 'foo',
							'password' => 'foo'
						]
					],
					//This storage shouldn't be available
					[
						'applicableUsers' => ['user1'],
						'applicableGroups' => [],
						'priority' => 15,
						'authMechanism' => 'identifier:\Auth\Mechanism',
						'storageClass' => 'OC\Files\Storage\DAV',
						'backendIdentifier' => 'identifier:\Test\Files\External\Backend\DummyBackend2',
						'backendOptions' => [
							'host' => 'http://localhost',
							'root' => 'test3',
							'secure' => 'false',
							'user' => 'foo',
							'password' => 'foo'
						]
					],
				], 'user1'
			]
		];
	}

	/**
	 * @dataProvider providesDeleteAllUser
	 * @param $storageParams
	 */
	public function testDeleteAllForUser($storageParams, $userId) {
		$backendService = new StoragesBackendService(\OC::$server->getConfig());
		$dbConfigService = new DBConfigService(\OC::$server->getDatabaseConnection(), \OC::$server->getCrypto());
		$userManager = \OC::$server->getUserManager();
		$userMountCache = new UserMountCache(\OC::$server->getDatabaseConnection(), $userManager, \OC::$server->getLogger());
		$service = new GlobalStoragesService($backendService, $dbConfigService, $userMountCache);

		$storageIds = [];
		foreach ($storageParams as $storageParam) {
			$backend = new Backend();
			$backend->setIdentifier($storageParam['backendIdentifier']);
			$backendService->registerBackend($backend);
			$storageConfig = $service->createStorage('/foo/',
				$storageParam['backendIdentifier'], $storageParam['authMechanism'],
				$storageParam['backendOptions'], null,
				$storageParam['applicableUsers'], $storageParam['applicableGroups'],
				$storageParam['priority']);
			$storageConfig->setBackend($backend);
			$backend->setStorageClass($storageParam['storageClass']);

			$newStorage = $service->addStorage($storageConfig);
			$storageIds[] = $newStorage->getId();
		}

		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
			->method('getUID')
			->willReturn($userId);

		$this->assertTrue($service->deleteAllForUser($user));

		$storages = $service->getStorages();
		$newStorageIds = [];
		foreach ($storages as $storage) {
			$users = $storage->getApplicableUsers();
			$this->assertFalse(\in_array($userId, $users, true));
			$this->assertTrue(\in_array($storage->getId(), $storageIds, true));
			$newStorageIds[] = $storage->getId();
		}
		$missingStorageId = \array_pop($storageIds);
		$this->assertFalse(\in_array($missingStorageId, $newStorageIds, true));
	}
}
