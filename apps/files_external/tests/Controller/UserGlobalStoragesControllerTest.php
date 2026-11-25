<?php
/**
 * @copyright Copyright (c) 2026, ownCloud GmbH
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
use OCA\Files_External\Controller\UserGlobalStoragesController;
use OCP\AppFramework\Http;
use OCP\Files\External\Auth\AuthMechanism;
use OCP\Files\External\Auth\IUserProvided;
use OCP\Files\External\Backend\Backend;
use OCP\Files\External\InsufficientDataForMeaningfulAnswerException;
use OCP\Files\External\IStorageConfig;
use OCP\Files\External\NotFoundException;
use OCP\Files\External\Service\IStoragesService;
use OCP\Files\External\Service\IUserGlobalStoragesService;
use OCP\Files\StorageNotAvailableException;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IUser;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

/**
 * An auth mechanism whose credentials every user enters for themselves
 * (like "password::userprovided"). Only the combination of the two types
 * matters here, the methods are mocked.
 */
abstract class UserProvidedAuthMechanismDouble extends AuthMechanism implements IUserProvided {
}

/**
 * @see \OCA\Files_External\Controller\UserGlobalStoragesController
 */
class UserGlobalStoragesControllerTest extends TestCase {
	/** @var UserGlobalStoragesController */
	private $controller;

	/** @var IUserGlobalStoragesService | MockObject */
	private $service;

	/** @var IL10N | MockObject */
	private $l10n;

	/** @var IUser | MockObject */
	private $user;

	protected function setUp(): void {
		parent::setUp();
		// the storage status check is skipped: nothing is connected to
		\OC_Mount_Config::$skipTest = true;

		$this->user = $this->createMock(IUser::class);
		$this->user->method('getUID')->willReturn('user1');
		$userSession = $this->createMock(IUserSession::class);
		$userSession->method('getUser')->willReturn($this->user);

		$this->l10n = $this->createMock(IL10N::class);
		$this->service = $this->createMock(IUserGlobalStoragesService::class);

		$this->controller = new UserGlobalStoragesController(
			'files_external',
			$this->createMock(IRequest::class),
			$this->l10n,
			$this->service,
			$userSession,
			$this->createMock(ILogger::class)
		);
	}

	protected function tearDown(): void {
		\OC_Mount_Config::$skipTest = false;
		parent::tearDown();
	}

	/**
	 * @return Backend | MockObject
	 */
	private function getBackendMock() {
		$backend = $this->getMockBuilder(Backend::class)
			->disableOriginalConstructor()
			->getMock();
		$backend->method('getStorageClass')
			->willReturn('\OCA\Files_External\Lib\Storage\SMB');
		$backend->method('getIdentifier')
			->willReturn('identifier:\OCA\Files_External\Lib\Backend\SMB');
		return $backend;
	}

	/**
	 * @return AuthMechanism | MockObject
	 */
	private function getAuthMechMock() {
		$authMech = $this->getMockBuilder(AuthMechanism::class)
			->disableOriginalConstructor()
			->getMock();
		$authMech->method('getScheme')
			->willReturn(AuthMechanism::SCHEME_PASSWORD);
		$authMech->method('getIdentifier')
			->willReturn('identifier:\OCA\Files_External\Lib\Auth\Password\Password');
		return $authMech;
	}

	/**
	 * @return UserProvidedAuthMechanismDouble | MockObject
	 */
	private function getUserProvidedAuthMechMock() {
		$authMech = $this->getMockBuilder(UserProvidedAuthMechanismDouble::class)
			->disableOriginalConstructor()
			->getMock();
		$authMech->method('getScheme')
			->willReturn(AuthMechanism::SCHEME_PASSWORD);
		$authMech->method('getIdentifier')
			->willReturn('identifier:password::userprovided');
		return $authMech;
	}

	/**
	 * An admin-defined mount as the service hands it out: with the admin's
	 * backend options and mount options.
	 *
	 * @return StorageConfig
	 */
	private function getStorageConfig($id, AuthMechanism $authMech, array $backendOptions = []) {
		$storageConfig = new StorageConfig($id);
		$storageConfig->setMountPoint('mount');
		$storageConfig->setBackend($this->getBackendMock());
		$storageConfig->setAuthMechanism($authMech);
		$storageConfig->setBackendOptions($backendOptions);
		$storageConfig->setMountOptions(['encrypt' => true]);
		$storageConfig->setType(IStorageConfig::MOUNT_TYPE_ADMIN);
		return $storageConfig;
	}

	/**
	 * Puts saved credentials back into the storage config, as the real
	 * mechanisms do in manipulateStorageConfig()
	 *
	 * @return \Closure
	 */
	private function restoreCredentials() {
		return function (IStorageConfig $storage) {
			$storage->setBackendOption('user', 'user001');
			$storage->setBackendOption('password', 'password001');
		};
	}

	public function testIndex() {
		$storageConfig1 = $this->getStorageConfig(1, $this->getAuthMechMock(), [
			'host' => 'smbhost',
			'password' => 'adminsecret',
		]);
		$storageConfig2 = $this->getStorageConfig(2, $this->getUserProvidedAuthMechMock(), [
			'host' => 'otherhost',
		]);
		$this->service->expects($this->once())
			->method('getUniqueStorages')
			->willReturn([$storageConfig1, $storageConfig2]);

		$response = $this->controller->index();
		$this->assertEquals(Http::STATUS_OK, $response->getStatus());

		$data = \array_map(function (StorageConfig $storage) {
			return $storage->jsonSerialize();
		}, $response->getData());
		$this->assertCount(2, $data);
		// the admin's configuration is private and never sent to the user
		$this->assertEquals([], $data[0]['backendOptions']);
		$this->assertArrayNotHasKey('mountOptions', $data[0]);
		$this->assertFalse($data[0]['userProvided']);
		$this->assertEquals([], $data[1]['backendOptions']);
		$this->assertArrayNotHasKey('mountOptions', $data[1]);
		$this->assertTrue($data[1]['userProvided']);
	}

	public function testShow() {
		$authMech = $this->getUserProvidedAuthMechMock();
		$this->service->expects($this->once())
			->method('getStorage')
			->with(1)
			->willReturn($this->getStorageConfig(1, $authMech, ['host' => 'smbhost', 'share' => 'docs']));
		$authMech->method('manipulateStorageConfig')
			->willReturnCallback($this->restoreCredentials());

		$response = $this->controller->show(1);
		$this->assertEquals(Http::STATUS_OK, $response->getStatus());

		$data = $response->getData()->jsonSerialize();
		$this->assertEquals(1, $data['id']);
		$this->assertTrue($data['userProvided']);
		$this->assertEquals(StorageNotAvailableException::STATUS_SUCCESS, $data['status']);
		// only the user's own fields come back, the password redacted;
		// the admin's host and share stay private
		$this->assertEquals(
			['user' => 'user001', 'password' => IStoragesService::REDACTED_PASSWORD],
			$data['backendOptions']
		);
		$this->assertArrayNotHasKey('mountOptions', $data);
	}

	public function testShowWithoutSavedCredentials() {
		$authMech = $this->getUserProvidedAuthMechMock();
		$this->service->expects($this->once())
			->method('getStorage')
			->with(1)
			->willReturn($this->getStorageConfig(1, $authMech, ['host' => 'smbhost']));
		$authMech->method('manipulateStorageConfig')
			->will($this->throwException(new InsufficientDataForMeaningfulAnswerException('No credentials saved')));

		$response = $this->controller->show(1);
		$this->assertEquals(Http::STATUS_OK, $response->getStatus());

		// the storage is listed, so that the user can enter credentials
		$data = $response->getData()->jsonSerialize();
		$this->assertEquals([], $data['backendOptions']);
		$this->assertEquals(StorageNotAvailableException::STATUS_INDETERMINATE, $data['status']);
	}

	public function testShowStorageNotFound() {
		$this->service->expects($this->once())
			->method('getStorage')
			->with(255)
			->will($this->throwException(new NotFoundException()));

		$response = $this->controller->show(255);
		$this->assertEquals(Http::STATUS_NOT_FOUND, $response->getStatus());
	}

	public function testUpdateSavesTheUserProvidedCredentials() {
		$authMech = $this->getUserProvidedAuthMechMock();
		$this->service->expects($this->once())
			->method('getStorage')
			->with(1)
			->willReturn($this->getStorageConfig(1, $authMech, ['host' => 'smbhost', 'share' => 'docs']));
		$authMech->expects($this->once())
			->method('saveBackendOptions')
			->with($this->user, 1, ['user' => 'user001', 'password' => 'password001']);
		$authMech->method('manipulateStorageConfig')
			->willReturnCallback($this->restoreCredentials());

		$response = $this->controller->update(1, ['user' => 'user001', 'password' => 'password001']);
		$this->assertEquals(Http::STATUS_OK, $response->getStatus());

		$data = $response->getData()->jsonSerialize();
		$this->assertEquals(1, $data['id']);
		$this->assertTrue($data['userProvided']);
		$this->assertEquals(StorageNotAvailableException::STATUS_SUCCESS, $data['status']);
		$this->assertEquals(
			['user' => 'user001', 'password' => IStoragesService::REDACTED_PASSWORD],
			$data['backendOptions']
		);
		$this->assertArrayNotHasKey('mountOptions', $data);
	}

	public function testUpdateStorageNotFound() {
		$this->service->expects($this->once())
			->method('getStorage')
			->with(255)
			->will($this->throwException(new NotFoundException()));

		$response = $this->controller->update(255, ['user' => 'user001', 'password' => 'password001']);
		$this->assertEquals(Http::STATUS_NOT_FOUND, $response->getStatus());
	}

	public function testUpdateStorageNotUserEditable() {
		$authMech = $this->getAuthMechMock();
		$this->service->expects($this->once())
			->method('getStorage')
			->with(1)
			->willReturn($this->getStorageConfig(1, $authMech, ['host' => 'smbhost']));
		$authMech->expects($this->never())
			->method('manipulateStorageConfig');

		$response = $this->controller->update(1, ['user' => 'user001', 'password' => 'password001']);
		$this->assertEquals(Http::STATUS_FORBIDDEN, $response->getStatus());
	}

	public function rejectedCredentialsProvider() {
		return [
			'empty username' => [['user' => '', 'password' => 'password001']],
			'empty password' => [['user' => 'user001', 'password' => '']],
		];
	}

	/**
	 * The auth mechanism rejects the submitted values: a client error
	 * with the reason, not a server error
	 *
	 * @dataProvider rejectedCredentialsProvider
	 */
	public function testUpdateWithRejectedCredentials(array $backendOptions) {
		$authMech = $this->getUserProvidedAuthMechMock();
		$this->service->expects($this->once())
			->method('getStorage')
			->with(1)
			->willReturn($this->getStorageConfig(1, $authMech, ['host' => 'smbhost']));
		$authMech->expects($this->once())
			->method('saveBackendOptions')
			->with($this->user, 1, $backendOptions)
			->will($this->throwException(new \InvalidArgumentException('Username and password are required')));
		$authMech->expects($this->never())
			->method('manipulateStorageConfig');
		$this->l10n->expects($this->once())
			->method('t')
			->with('Invalid credentials: %s', ['Username and password are required'])
			->willReturn('Invalid credentials: Username and password are required');

		$response = $this->controller->update(1, $backendOptions);
		$this->assertEquals(Http::STATUS_BAD_REQUEST, $response->getStatus());
		$this->assertEquals(
			['message' => 'Invalid credentials: Username and password are required'],
			$response->getData()
		);
	}

	/**
	 * Nothing usable was saved for the user, so the storage cannot be
	 * prepared: a client error with the reason, not a server error
	 */
	public function testUpdateWithoutUsableCredentials() {
		$authMech = $this->getUserProvidedAuthMechMock();
		$this->service->expects($this->once())
			->method('getStorage')
			->with(1)
			->willReturn($this->getStorageConfig(1, $authMech, ['host' => 'smbhost']));
		$authMech->expects($this->once())
			->method('saveBackendOptions')
			->with($this->user, 1, ['user' => 'user001', 'password' => 'password001']);
		$authMech->expects($this->once())
			->method('manipulateStorageConfig')
			->will($this->throwException(new InsufficientDataForMeaningfulAnswerException('No credentials saved')));
		$this->l10n->expects($this->once())
			->method('t')
			->with('Insufficient data: %s', ['No credentials saved'])
			->willReturn('Insufficient data: No credentials saved');

		$response = $this->controller->update(1, ['user' => 'user001', 'password' => 'password001']);
		$this->assertEquals(Http::STATUS_BAD_REQUEST, $response->getStatus());
		$this->assertEquals(
			['message' => 'Insufficient data: No credentials saved'],
			$response->getData()
		);
	}
}
