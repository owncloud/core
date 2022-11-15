<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Robin Appelman <icewind@owncloud.com>
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
use OCA\Files_External\Controller\UserStoragesController;
use OCP\AppFramework\Http;
use OCP\Files\External\IStoragesBackendService;
use OCP\Files\External\IStorageConfig;
use OCP\Files\External\Service\IStoragesService;
use OCP\Files\StorageNotAvailableException;

class UserStoragesControllerTest extends StoragesControllerTest {
	/**
	 * @var array
	 */
	private $oldAllowedBackends;

	public function setUp(): void {
		parent::setUp();
		$this->service = $this->createMock('\OCP\Files\External\Service\IUserStoragesService');

		$this->service->method('getVisibilityType')
			->willReturn(IStoragesBackendService::VISIBILITY_PERSONAL);

		$this->controller = new UserStoragesController(
			'files_external',
			$this->createMock('\OCP\IRequest'),
			$this->createMock('\OCP\IL10N'),
			$this->service,
			$this->createMock('\OCP\IUserSession'),
			$this->createMock('\OCP\ILogger')
		);
	}

	public function testAddOrUpdateStorageDisallowedBackend() {
		$backend = $this->getBackendMock();
		$backend->method('isVisibleFor')
			->with(IStoragesBackendService::VISIBILITY_PERSONAL)
			->willReturn(false);
		$authMech = $this->getAuthMechMock();

		$storageConfig = new StorageConfig(1);
		$storageConfig->setMountPoint('mount');
		$storageConfig->setBackend($backend);
		$storageConfig->setAuthMechanism($authMech);
		$storageConfig->setBackendOptions([]);

		$this->service->expects($this->exactly(2))
			->method('createStorage')
			->will($this->returnValue($storageConfig));
		$this->service->expects($this->never())
			->method('addStorage');
		$this->service->expects($this->never())
			->method('updateStorage');

		$response = $this->controller->create(
			'mount',
			'\OCA\Files_External\Lib\Storage\SMB',
			'\Auth\Mechanism',
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
			'\OCA\Files_External\Lib\Storage\SMB',
			'\Auth\Mechanism',
			[],
			[],
			[],
			[],
			null
		);

		$this->assertEquals(Http::STATUS_UNPROCESSABLE_ENTITY, $response->getStatus());
	}

	public function testCreate() {
		$mount = 'randomMount';
		$backend = 'identifier:\This\Doesnt\Exist';
		$auth = 'identifier:\Random\Missing\Auth\Class';
		$backendOpts = [
			'host' => 'host001',
			'user' => 'user001',
			'password' => 'password001',
			'service-password' => '001password',
			'keystore_password' => 'wordpass',
		];
		$priority = 3;

		$storageConfig = $this->getNewStorageConfigMock([
			'id' => 30,
			'backendClass' => '\This\Doesnt\Exist',
			'backendStorageClass' => '\This\Doesnt\Exist\Storage',
			'authClass' => '\Random\Missing\Auth\Class',
			'mountPoint' => $mount,
			'backendOpts' => $backendOpts,
			'priority' => $priority,
			'type' => IStorageConfig::MOUNT_TYPE_ADMIN,
		]);

		$backendMock = $storageConfig->getBackend();
		$backendMock->method('isVisibleFor')->willReturn(true);
		$backendMock->method('validateStorage')->willReturn(true);

		$authMock = $storageConfig->getAuthMechanism();
		$authMock->method('isVisibleFor')->willReturn(true);
		$authMock->method('validateStorage')->willReturn(true);

		$this->service->expects($this->once())
		->method('createStorage')
		->willReturn($storageConfig);
		$this->service->expects($this->once())
		->method('addStorage')
		->will($this->returnArgument(0));

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
			'type' => 'system',
			'status' => StorageNotAvailableException::STATUS_SUCCESS, // status check for the storage is skipped and always returns this value
		];

		$result = $this->controller->create($mount, $backend, $auth, $backendOpts, [], [], [], $priority);
		$actual = $result->getData()->jsonSerialize();
		$this->assertEquals(Http::STATUS_CREATED, $result->getStatus());
		$this->assertEquals($expectedStorage, $actual);
	}

	public function testUpdate() {
		$mount = 'randomMount';
		$backend = 'identifier:\This\Doesnt\Exist';
		$auth = 'identifier:\Random\Missing\Auth\Class';
		$backendOpts = [
			'host' => 'host001',
			'user' => 'user001',
			'password' => 'password001',
			'service-password' => '001password',
			'keystore_password' => 'wordpass',
		];
		$priority = 3;

		$storageConfig = $this->getNewStorageConfigMock([
			'id' => 30,
			'backendClass' => '\This\Doesnt\Exist',
			'backendStorageClass' => '\This\Doesnt\Exist\Storage',
			'authClass' => '\Random\Missing\Auth\Class',
			'mountPoint' => $mount,
			'backendOpts' => $backendOpts,
			'priority' => $priority,
			'type' => IStorageConfig::MOUNT_TYPE_ADMIN,
		]);

		$backendMock = $storageConfig->getBackend();
		$backendMock->method('isVisibleFor')->willReturn(true);
		$backendMock->method('validateStorage')->willReturn(true);

		$authMock = $storageConfig->getAuthMechanism();
		$authMock->method('isVisibleFor')->willReturn(true);
		$authMock->method('validateStorage')->willReturn(true);

		$this->service->expects($this->once())
		->method('createStorage')
		->willReturn($storageConfig);
		$this->service->expects($this->once())
		->method('updateStorage')
		->will($this->returnArgument(0));

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
			'type' => 'system',
			'status' => StorageNotAvailableException::STATUS_SUCCESS, // status check for the storage is skipped and always returns this value
		];

		$result = $this->controller->update(30, $mount, $backend, $auth, $backendOpts, [], [], [], $priority);
		$actual = $result->getData()->jsonSerialize();
		$this->assertEquals(Http::STATUS_OK, $result->getStatus());
		$this->assertEquals($expectedStorage, $actual);
	}
}
