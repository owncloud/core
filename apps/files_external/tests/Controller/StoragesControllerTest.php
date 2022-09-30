<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
namespace OCA\Files_External\Tests\Controller;

use OC\Files\External\StorageConfig;
use OCP\Files\External\IStorageConfig;
use OCA\Files_External\Controller\GlobalStoragesController;
use OCP\AppFramework\Http;
use OCP\Files\External\NotFoundException;
use OCP\Files\External\Service\IGlobalStoragesService;
use OCP\Files\External\Service\IStoragesService;
use OCP\Files\StorageNotAvailableException;

abstract class StoragesControllerTest extends \Test\TestCase {
	/**
	 * @var GlobalStoragesController
	 */
	protected $controller;

	/**
	 * @var IGlobalStoragesService
	 */
	protected $service;

	public function setUp(): void {
		\OC_Mount_Config::$skipTest = true;
		\OC::$server->getSystemConfig()->setValue('files_external_allow_create_new_local', true);
	}

	public function tearDown(): void {
		\OC_Mount_Config::$skipTest = false;
		\OC::$server->getSystemConfig()->setValue('files_external_allow_create_new_local', false);
	}

	/**
	 * @return \OCP\Files\External\Backend\Backend
	 */
	protected function getBackendMock($class = '\OCA\Files_External\Lib\Backend\SMB', $storageClass = '\OCA\Files_External\Lib\Storage\SMB') {
		$backend = $this->getMockBuilder('\OCP\Files\External\Backend\Backend')
			->disableOriginalConstructor()
			->getMock();
		$backend->method('getStorageClass')
			->willReturn($storageClass);
		$backend->method('getIdentifier')
			->willReturn('identifier:'.$class);
		return $backend;
	}

	/**
	 * @return \OCP\Files\External\Backend\Backend
	 */
	protected function getBackendMockLocal($class = '\OCA\Files_External\Lib\Backend\Local', $storageClass = '\OC\Files\Storage\Local') {
		$backend = $this->getMockBuilder('\OCP\Files\External\Backend\Backend')
			->disableOriginalConstructor()
			->getMock();
		$backend->method('getStorageClass')
			->willReturn($storageClass);
		$backend->method('getIdentifier')
			->willReturn('identifier:'.$class);
		return $backend;
	}

	/**
	 * @return \OCP\Files\External\Auth\AuthMechanism
	 */
	protected function getAuthMechMock($scheme = 'null', $class = '\OCA\Files_External\Lib\Auth\NullMechanism') {
		$authMech = $this->getMockBuilder('\OCP\Files\External\Auth\AuthMechanism')
			->disableOriginalConstructor()
			->getMock();
		$authMech->method('getScheme')
			->willReturn($scheme);
		$authMech->method('getIdentifier')
			->willReturn('identifier:'.$class);

		return $authMech;
	}

	public function testAddStorage() {
		$authMech = $this->getAuthMechMock();
		$authMech->method('validateStorage')
			->willReturn(true);
		$authMech->method('isVisibleFor')
			->willReturn(true);
		$backend = $this->getBackendMock();
		$backend->method('validateStorage')
			->willReturn(true);
		$backend->method('isVisibleFor')
			->willReturn(true);

		$storageConfig = new StorageConfig(1);
		$storageConfig->setMountPoint('mount');
		$storageConfig->setBackend($backend);
		$storageConfig->setAuthMechanism($authMech);
		$storageConfig->setBackendOptions([]);

		$this->service->expects($this->once())
			->method('createStorage')
			->will($this->returnValue($storageConfig));
		$this->service->expects($this->once())
			->method('addStorage')
			->will($this->returnValue($storageConfig));

		$response = $this->controller->create(
			'mount',
			'\OCA\Files_External\Lib\Storage\SMB',
			'\OCA\Files_External\Lib\Auth\NullMechanism',
			[],
			[],
			[],
			[],
			null
		);

		$data = $response->getData();
		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
		$this->assertEquals($storageConfig, $data);
	}

	public function testAddStorageWithoutConfig() {
		\OC::$server->getSystemConfig()->setValue('files_external_allow_create_new_local', false);

		$backend = $this->getBackendMockLocal();
		$backend->method('validateStorage')
			->willReturn(true);

		$storageConfig = new StorageConfig(1);
		$storageConfig->setMountPoint('Local');
		$storageConfig->setBackend($backend);
		$storageConfig->setBackendOptions([]);

		$this->service
			->method('createStorage')
			->will($this->returnValue($storageConfig));
		$this->service
			->method('addStorage')
			->will($this->returnValue($storageConfig));

		$response = $this->controller->create(
			'Local',
			'local',
			null,
			[],
			[],
			[],
			[],
			null
		);

		$data = $response->getData();
		$this->assertEquals(Http::STATUS_FORBIDDEN, $response->getStatus());
		$this->assertNull($data);
	}

	public function testUpdateStorage() {
		$authMech = $this->getAuthMechMock();
		$authMech->method('validateStorage')
			->willReturn(true);
		$authMech->method('isVisibleFor')
			->willReturn(true);
		$backend = $this->getBackendMock();
		$backend->method('validateStorage')
			->willReturn(true);
		$backend->method('isVisibleFor')
			->willReturn(true);

		$storageConfig = new StorageConfig(1);
		$storageConfig->setMountPoint('mount');
		$storageConfig->setBackend($backend);
		$storageConfig->setAuthMechanism($authMech);
		$storageConfig->setBackendOptions([]);

		$this->service->expects($this->once())
			->method('createStorage')
			->will($this->returnValue($storageConfig));
		$this->service->expects($this->once())
			->method('updateStorage')
			->will($this->returnValue($storageConfig));

		$response = $this->controller->update(
			1,
			'mount',
			'\OCA\Files_External\Lib\Storage\SMB',
			'\OCA\Files_External\Lib\Auth\NullMechanism',
			[],
			[],
			[],
			[],
			null
		);

		$data = $response->getData();
		$this->assertEquals(Http::STATUS_OK, $response->getStatus());
		$this->assertEquals($storageConfig, $data);
	}

	public function mountPointNamesProvider() {
		return [
			[''],
			['/'],
			['//'],
		];
	}

	/**
	 * @dataProvider mountPointNamesProvider
	 */
	public function testAddOrUpdateStorageInvalidMountPoint($mountPoint) {
		$storageConfig = new StorageConfig(1);
		$storageConfig->setMountPoint($mountPoint);
		$storageConfig->setBackend($this->getBackendMock());
		$storageConfig->setAuthMechanism($this->getAuthMechMock());
		$storageConfig->setBackendOptions([]);

		$this->service->expects($this->exactly(2))
			->method('createStorage')
			->will($this->returnValue($storageConfig));
		$this->service->expects($this->never())
			->method('addStorage');
		$this->service->expects($this->never())
			->method('updateStorage');

		$response = $this->controller->create(
			$mountPoint,
			'\OCA\Files_External\Lib\Storage\SMB',
			'\OCA\Files_External\Lib\Auth\NullMechanism',
			[],
			[],
			[],
			[],
			null
		);

		$this->assertEquals(Http::STATUS_UNPROCESSABLE_ENTITY, $response->getStatus());

		$response = $this->controller->update(
			1,
			$mountPoint,
			'\OCA\Files_External\Lib\Storage\SMB',
			'\OCA\Files_External\Lib\Auth\NullMechanism',
			[],
			[],
			[],
			[],
			null
		);

		$this->assertEquals(Http::STATUS_UNPROCESSABLE_ENTITY, $response->getStatus());
	}

	public function testAddOrUpdateStorageInvalidBackend() {
		$this->service->expects($this->exactly(2))
			->method('createStorage')
			->will($this->throwException(new \InvalidArgumentException()));
		$this->service->expects($this->never())
			->method('addStorage');
		$this->service->expects($this->never())
			->method('updateStorage');

		$response = $this->controller->create(
			'mount',
			'\OC\Files\Storage\InvalidStorage',
			'\OCA\Files_External\Lib\Auth\NullMechanism',
			[],
			[],
			[],
			[],
			null
		);

		$this->assertEquals(Http::STATUS_UNPROCESSABLE_ENTITY, $response->getStatus());

		$response = $this->controller->update(
			1,
			'mount',
			'\OC\Files\Storage\InvalidStorage',
			'\OCA\Files_External\Lib\Auth\NullMechanism',
			[],
			[],
			[],
			[],
			null
		);

		$this->assertEquals(Http::STATUS_UNPROCESSABLE_ENTITY, $response->getStatus());
	}

	public function testUpdateStorageNonExisting() {
		$authMech = $this->getAuthMechMock();
		$authMech->method('validateStorage')
			->willReturn(true);
		$authMech->method('isVisibleFor')
			->willReturn(true);
		$backend = $this->getBackendMock();
		$backend->method('validateStorage')
			->willReturn(true);
		$backend->method('isVisibleFor')
			->willReturn(true);

		$storageConfig = new StorageConfig(255);
		$storageConfig->setMountPoint('mount');
		$storageConfig->setBackend($backend);
		$storageConfig->setAuthMechanism($authMech);
		$storageConfig->setBackendOptions([]);

		$this->service->expects($this->once())
			->method('createStorage')
			->will($this->returnValue($storageConfig));
		$this->service->expects($this->once())
			->method('updateStorage')
			->will($this->throwException(new NotFoundException()));

		$response = $this->controller->update(
			255,
			'mount',
			'\OCA\Files_External\Lib\Storage\SMB',
			'\OCA\Files_External\Lib\Auth\NullMechanism',
			[],
			[],
			[],
			[],
			null
		);

		$this->assertEquals(Http::STATUS_NOT_FOUND, $response->getStatus());
	}

	public function testDeleteStorage() {
		$this->service->expects($this->once())
			->method('removeStorage');

		$response = $this->controller->destroy(1);
		$this->assertEquals(Http::STATUS_NO_CONTENT, $response->getStatus());
	}

	public function testDeleteStorageNonExisting() {
		$this->service->expects($this->once())
			->method('removeStorage')
			->will($this->throwException(new NotFoundException()));

		$response = $this->controller->destroy(255);
		$this->assertEquals(Http::STATUS_NOT_FOUND, $response->getStatus());
	}

	public function testGetStorage() {
		$backend = $this->getBackendMock();
		$authMech = $this->getAuthMechMock();
		$storageConfig = new StorageConfig(1);
		$storageConfig->setMountPoint('test');
		$storageConfig->setBackend($backend);
		$storageConfig->setAuthMechanism($authMech);
		$storageConfig->setBackendOptions(['user' => 'test', 'password', 'password123']);
		$storageConfig->setMountOptions(['priority' => false]);

		$this->service->expects($this->once())
			->method('getStorage')
			->with(1)
			->will($this->returnValue($storageConfig));
		$response = $this->controller->show(1);

		$this->assertEquals(Http::STATUS_OK, $response->getStatus());
		$this->assertEquals($storageConfig, $response->getData());
	}

	public function validateStorageProvider() {
		return [
			[true, true, true],
			[false, true, false],
			[true, false, false],
			[false, false, false]
		];
	}

	/**
	 * @dataProvider validateStorageProvider
	 */
	public function testValidateStorage($backendValidate, $authMechValidate, $expectSuccess) {
		$backend = $this->getBackendMock();
		$backend->method('validateStorage')
			->willReturn($backendValidate);
		$backend->method('isVisibleFor')
			->willReturn(true);

		$authMech = $this->getAuthMechMock();
		$authMech->method('validateStorage')
			->will($this->returnValue($authMechValidate));
		$authMech->method('isVisibleFor')
			->willReturn(true);

		$storageConfig = new StorageConfig();
		$storageConfig->setMountPoint('mount');
		$storageConfig->setBackend($backend);
		$storageConfig->setAuthMechanism($authMech);
		$storageConfig->setBackendOptions([]);

		$this->service->expects($this->once())
			->method('createStorage')
			->will($this->returnValue($storageConfig));

		if ($expectSuccess) {
			$this->service->expects($this->once())
				->method('addStorage')
				->with($storageConfig)
				->will($this->returnValue($storageConfig));
		} else {
			$this->service->expects($this->never())
				->method('addStorage');
		}

		$response = $this->controller->create(
			'mount',
			'\OCA\Files_External\Lib\Storage\SMB',
			'\OCA\Files_External\Lib\Auth\NullMechanism',
			[],
			[],
			[],
			[],
			null
		);

		if ($expectSuccess) {
			$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
		} else {
			$this->assertEquals(Http::STATUS_UNPROCESSABLE_ENTITY, $response->getStatus());
		}
	}

	protected function getNewStorageConfigMock($params) {
		$backendMock = $this->getBackendMock(
			$params['backendClass'] ?? '\Random\Missing\Class',
			$params['backendStorageClass'] ?? '\Random\Missing\Class\Storage'
		);

		$authMock = $this->getAuthMechMock(
			$params['authScheme'] ?? 'Missing',
			$params['authClass'] ?? '\Random\Missing\Auth\Class'
		);

		$storageConfig = new StorageConfig($params['id'] ?? 10);
		$storageConfig->setMountPoint($params['mountPoint'] ?? 'mount');
		$storageConfig->setBackend($backendMock);
		$storageConfig->setAuthMechanism($authMock);
		$storageConfig->setBackendOptions($params['backendOpts'] ?? []);
		$storageConfig->setPriority($params['priority'] ?? 1);
		$storageConfig->setApplicableUsers($params['applicableUsers'] ?? null);
		$storageConfig->setApplicableGroups($params['applicableGroups'] ?? null);
		$storageConfig->setMountOptions($params['mountOpts'] ?? null);
		$storageConfig->setType($params['type'] ?? IStorageConfig::MOUNT_TYPE_ADMIN);

		return $storageConfig;
	}

	public function testIndex() {
		$storageConfig1 = $this->getNewStorageConfigMock([]);
		$storageConfig2 = $this->getNewStorageConfigMock([
			'id' => 20,
			'backendOpts' => [
				'host' => 'host001',
				'user' => 'user001',
				'password' => 'password001',
			],
		]);
		$storageConfig3 = $this->getNewStorageConfigMock([
			'id' => 30,
			'backendClass' => '\This\Doesnt\Exist',
			'backendStorageClass' => '\This\Doesnt\Exist\Storage',
			'mountPoint' => 'randomMount',
			'backendOpts' => [
				'host' => 'host001',
				'user' => 'user001',
				'password' => 'password001',
				'service-password' => '001password',
				'keystore_password' => 'wordpass',
			],
			'priority' => 3,
			'type' => IStorageConfig::MOUNT_TYPE_PERSONAl,
		]);

		$this->service->expects($this->once())
		->method('getStorages')
		->willReturn([$storageConfig1, $storageConfig2, $storageConfig3]);

		$expectedStorage1 = [
			'id' => 10,
			'mountPoint' => '/mount',
			'backend' => 'identifier:\Random\Missing\Class',
			'authMechanism' => 'identifier:\Random\Missing\Auth\Class',
			'backendOptions' => [],
			'priority' => 1,
			'userProvided' => false,
			'type' => 'system',
		];
		$expectedStorage2 = [
			'id' => 20,
			'mountPoint' => '/mount',
			'backend' => 'identifier:\Random\Missing\Class',
			'authMechanism' => 'identifier:\Random\Missing\Auth\Class',
			'backendOptions' => [
				'host' => 'host001',
				'user' => 'user001',
				'password' => IStoragesService::REDACTED_PASSWORD,
			],
			'priority' => 1,
			'userProvided' => false,
			'type' => 'system',
		];
		$expectedStorage3 = [
			'id' => 30,
			'mountPoint' => '/randomMount',
			'backend' => 'identifier:\This\Doesnt\Exist',
			'authMechanism' => 'identifier:\Random\Missing\Auth\Class',
			'backendOptions' => [
				'host' => 'host001',
				'user' => 'user001',
				'password' => IStoragesService::REDACTED_PASSWORD,
				'service-password' => IStoragesService::REDACTED_PASSWORD,
				'keystore_password' => IStoragesService::REDACTED_PASSWORD,
			],
			'priority' => 3,
			'userProvided' => false,
			'type' => 'personal',
		];

		$expected = [$expectedStorage1, $expectedStorage2, $expectedStorage3];

		$result = $this->controller->index();
		$actual = \array_map(function ($item) {
			return $item->jsonSerialize();
		}, $result->getData());
		$this->assertEquals(Http::STATUS_OK, $result->getStatus());
		$this->assertEquals($expected, $actual);
	}

	public function testShow() {
		$storageConfig = $this->getNewStorageConfigMock([
			'id' => 30,
			'backendClass' => '\This\Doesnt\Exist',
			'backendStorageClass' => '\This\Doesnt\Exist\Storage',
			'mountPoint' => 'randomMount',
			'backendOpts' => [
				'host' => 'host001',
				'user' => 'user001',
				'password' => 'password001',
				'service-password' => '001password',
				'keystore_password' => 'wordpass',
			],
			'priority' => 3,
			'type' => IStorageConfig::MOUNT_TYPE_PERSONAl,
		]);

		$this->service->expects($this->once())
		->method('getStorage')
		->willReturn($storageConfig);

		$expectedStorage = [
			'id' => 30,
			'mountPoint' => '/randomMount',
			'backend' => 'identifier:\This\Doesnt\Exist',
			'authMechanism' => 'identifier:\Random\Missing\Auth\Class',
			'backendOptions' => [
				'host' => 'host001',
				'user' => 'user001',
				'password' => IStoragesService::REDACTED_PASSWORD,
				'service-password' => IStoragesService::REDACTED_PASSWORD,
				'keystore_password' => IStoragesService::REDACTED_PASSWORD,
			],
			'priority' => 3,
			'userProvided' => false,
			'type' => 'personal',
			'status' => StorageNotAvailableException::STATUS_SUCCESS, // status check for the storage is skipped and always returns this value
		];

		$result = $this->controller->show(30, true);
		$actual = $result->getData()->jsonSerialize();
		$this->assertEquals(Http::STATUS_OK, $result->getStatus());
		$this->assertEquals($expectedStorage, $actual);
	}
}
