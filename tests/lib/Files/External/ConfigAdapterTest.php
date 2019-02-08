<?php
/**
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
namespace Test\Files\External;

use OC\Files\External\ConfigAdapter;
use OC\Files\External\PersonalMount;
use OC\Files\External\Service\UserGlobalStoragesService;
use OC\Files\External\Service\UserStoragesService;
use OC\Files\Storage\StorageFactory;
use OCP\Files\External\Auth\AuthMechanism;
use OCP\Files\External\Backend\Backend;
use OCP\Files\External\IStorageConfig;
use OCP\Files\External\Service\IUserGlobalStoragesService;
use OCP\Files\External\Service\IUserStoragesService;
use OCP\IConfig;
use OCP\IUser;
use OCP\ISession;
use OC\Files\External\StorageConfig;

class ConfigAdapterTest extends \Test\TestCase {

	/** @var \OCP\IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;

	/** @var IUserStoragesService */
	private $userStoragesService;

	/** @var IUserGlobalStoragesService */
	private $userGlobalStoragesService;

	/** @var IUser | \PHPUnit_Framework_MockObject_MockObject **/
	private $user;

	/** @var ISession | \PHPUnit_Framework_MockObject_MockObject **/
	private $session;

	/** @var int */
	private $configId;

	protected function setUp() {
		$this->config = $this->createMock(IConfig::class);
		$this->userStoragesService = $this->createMock(UserStoragesService::class);
		$this->userGlobalStoragesService = $this->createMock(UserGlobalStoragesService::class);
		$this->session = $this->createMock(ISession::class);
		$this->user = $this->createMock(IUser::class);
		$this->user->expects($this->any())
			->method('getUID')
			->willReturn('user1');
		$this->configId = 0;
	}

	private function createStorageConfig($mountPoint, $mountOptions, $storageOptions) {
		$auth = $this->createMock(AuthMechanism::class);
		$backend = $this->createMock(Backend::class);
		$this->configId++;
		$config = new StorageConfig($this->configId);

		$config->setMountPoint($mountPoint);
		$config->setMountOptions($mountOptions);
		$config->setBackendOptions($storageOptions);
		$config->setAuthMechanism($auth);
		$config->setBackend($backend);

		$auth->expects($this->once())
			->method('manipulateStorageConfig')
			->with($config, $this->user);
		$backend->expects($this->once())
			->method('manipulateStorageConfig')
			->with($config, $this->user);

		$backend->expects($this->once())
			->method('getStorageClass')
			->willReturn('\OC\Files\Storage\Temporary');

		$backend->expects($this->once())
			->method('wrapStorage')
			->will($this->returnArgument(0));
		$auth->expects($this->once())
			->method('wrapStorage')
			->will($this->returnArgument(0));

		return $config;
	}

	private function getMountsForUser($globalStorages, $personalStorages) {
		$storageFactory = $this->createMock(StorageFactory::class);
		$storageFactory->expects($this->any())
			->method('wrap')
			->will($this->returnArgument(1));

		$this->userStoragesService->expects($this->at(0))
			->method('setUser')
			->with($this->user);
		$this->userGlobalStoragesService->expects($this->at(0))
			->method('setUser')
			->with($this->user);

		$this->userGlobalStoragesService->expects($this->at(1))
			->method('getUniqueStorages')
			->willReturn($globalStorages);
		$this->userStoragesService->expects($this->at(1))
			->method('getStorages')
			->willReturn($personalStorages);

		$this->userStoragesService->expects($this->at(2))
			->method('resetUser');
		$this->userGlobalStoragesService->expects($this->at(2))
			->method('resetUser');

		$configAdapter = new ConfigAdapter(
			$this->config,
			$this->userStoragesService,
			$this->userGlobalStoragesService,
			$this->session
		);

		return $configAdapter->getMountsForUser($this->user, $storageFactory);
	}

	public function testGetPersonalMounts() {
		$storage1 = $this->createStorageConfig('/mount1', ['test_value' => true], ['backend_option' => 'abc']);
		$storage2 = $this->createStorageConfig('/globalmount1', ['test_value2' => 'abc'], ['backend_option' => 'def']);

		$result = $this->getMountsForUser([$storage2], [$storage1]);

		$this->assertCount(2, $result);

		$mount = $result['/mount1'];
		$this->assertInstanceOf(PersonalMount::class, $mount);
		$this->assertEquals('/user1/files/mount1/', $mount->getMountPoint());
		$options = $mount->getOptions();
		$this->assertTrue($options['test_value']);

		$mount = $result['/globalmount1'];
		$this->assertEquals('/user1/files/globalmount1/', $mount->getMountPoint());
		$options = $mount->getOptions();
		$this->assertEquals('abc', $options['test_value2']);
	}

	public function sharingOptionProvider() {
		return [
			[true, true],
			[false, false],
		];
	}

	/**
	 * @dataProvider sharingOptionProvider
	 */
	public function testGetPersonalMountSharingOption($isSharingAllowed, $expectedValue) {
		$this->config->expects($this->any())
			->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'allow_user_mount_sharing', 'yes', $isSharingAllowed ? 'yes' : 'no']
			]));

		$storage1 = $this->createStorageConfig('/mount1', ['enable_sharing' => true], ['backend_option' => 'abc']);
		$storage2 = $this->createStorageConfig('/globalmount1', ['enable_sharing' => true], ['backend_option' => 'abc']);

		$result = $this->getMountsForUser([$storage2], [$storage1]);

		$this->assertCount(2, $result);

		$mount = $result['/mount1'];
		$options = $mount->getOptions();
		$this->assertEquals($expectedValue, $options['enable_sharing']);

		$mount = $result['/globalmount1'];
		$options = $mount->getOptions();
		$this->assertTrue($options['enable_sharing']);
	}

	public function testGetPersonalMountsUserPlaceholder() {
		$this->user->expects($this->any())
			->method('getUserName')
			->willReturn('user1');
		
		$storage1 = $this->createStorageConfig('/mount1', [], ['backend_option' => '$user']);
		$storage2 = $this->createStorageConfig('/globalmount1', [], ['backend_option' => '$user']);

		$result = $this->getMountsForUser([$storage2], [$storage1]);

		$this->assertCount(2, $result);

		$this->assertEquals('user1', $storage1->getBackendOption('backend_option'));
		$this->assertEquals('user1', $storage2->getBackendOption('backend_option'));
	}

	public function testGetPersonalMountsUserPlaceholderAltLogin() {
		$this->user->expects($this->any())
			->method('getUserName')
			->willReturn('altlogin1');

		$storage1 = $this->createStorageConfig('/mount1', [], ['backend_option' => '$user']);
		$storage2 = $this->createStorageConfig('/globalmount1', [], ['backend_option' => '$user']);

		$result = $this->getMountsForUser([$storage2], [$storage1]);

		$this->assertCount(2, $result);

		$this->assertEquals('altlogin1', $storage1->getBackendOption('backend_option'));
		$this->assertEquals('altlogin1', $storage2->getBackendOption('backend_option'));
	}
}
