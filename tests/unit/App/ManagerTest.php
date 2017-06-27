<?php

/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\App;

use OC\Group\Group;
use OCP\IUser;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Test\TestCase;

/**
 * Class Manager
 *
 * @package Test\App
 * @group DB
 */
class ManagerTest extends TestCase {
	/**
	 * @return \OCP\IAppConfig | \PHPUnit_Framework_MockObject_MockObject
	 */
	protected function getAppConfig() {
		$appConfig = [];
		$config = $this->getMockBuilder('\OCP\IAppConfig')
			->disableOriginalConstructor()
			->getMock();

		$config->expects($this->any())
			->method('getValue')
			->will($this->returnCallback(function ($app, $key, $default) use (&$appConfig) {
				return (isset($appConfig[$app]) and isset($appConfig[$app][$key])) ? $appConfig[$app][$key] : $default;
			}));
		$config->expects($this->any())
			->method('setValue')
			->will($this->returnCallback(function ($app, $key, $value) use (&$appConfig) {
				if (!isset($appConfig[$app])) {
					$appConfig[$app] = [];
				}
				$appConfig[$app][$key] = $value;
			}));
		$config->expects($this->any())
			->method('getValues')
			->will($this->returnCallback(function ($app, $key) use (&$appConfig) {
				if ($app) {
					return $appConfig[$app];
				} else {
					$values = [];
					foreach ($appConfig as $app => $appData) {
						if (isset($appData[$key])) {
							$values[$app] = $appData[$key];
						}
					}
					return $values;
				}
			}));

		return $config;
	}

	/** @var \OCP\IUserSession | \PHPUnit_Framework_MockObject_MockObject */
	protected $userSession;

	/** @var \OCP\IGroupManager | \PHPUnit_Framework_MockObject_MockObject */
	protected $groupManager;

	/** @var \OCP\IAppConfig */
	protected $appConfig;

	/** @var \OCP\ICache | \PHPUnit_Framework_MockObject_MockObject */
	protected $cache;

	/** @var \OCP\ICacheFactory | \PHPUnit_Framework_MockObject_MockObject */
	protected $cacheFactory;

	/** @var \OCP\App\IAppManager */
	protected $manager;

	/** @var  EventDispatcherInterface | \PHPUnit_Framework_MockObject_MockObject */
	protected $eventDispatcher;

	protected function setUp() {
		parent::setUp();

		$this->userSession = $this->createMock('\OCP\IUserSession');
		$this->groupManager = $this->createMock('\OCP\IGroupManager');
		$this->appConfig = $this->getAppConfig();
		$this->cacheFactory = $this->createMock('\OCP\ICacheFactory');
		$this->cache = $this->createMock('\OCP\ICache');
		$this->eventDispatcher = $this->createMock('\Symfony\Component\EventDispatcher\EventDispatcherInterface');
		$this->cacheFactory->expects($this->any())
			->method('create')
			->with('settings')
			->willReturn($this->cache);
		$this->manager = new \OC\App\AppManager($this->userSession, $this->appConfig, $this->groupManager, $this->cacheFactory, $this->eventDispatcher);
	}

	protected function expectClearCache() {
		$this->cache->expects($this->once())
			->method('clear')
			->with('listApps');
	}

	public function testEnableApp() {
		$this->expectClearCache();
		// making sure "files_trashbin" is disabled
		if ($this->manager->isEnabledForUser('files_trashbin')) {
			$this->manager->disableApp('files_trashbin');
		}
		$this->manager->enableApp('files_trashbin');
		$this->assertEquals('yes', $this->appConfig->getValue('files_trashbin', 'enabled', 'no'));
	}

	public function testDisableApp() {
		$this->expectClearCache();
		$this->manager->disableApp('files_trashbin');
		$this->assertEquals('no', $this->appConfig->getValue('files_trashbin', 'enabled', 'no'));
	}
	/**
	 * @expectedException \Exception
	 */
	public function testNotEnableIfNotInstalled() {
		$this->manager->enableApp('some_random_name_which_i_hope_is_not_an_app');
		$this->assertEquals('no', $this->appConfig->getValue(
			'some_random_name_which_i_hope_is_not_an_app', 'enabled', 'no'
		));
	}

	public function testEnableAppForGroups() {
		$groups = [
			new Group('group1', [], null),
			new Group('group2', [], null)
		];
		$this->expectClearCache();
		$this->manager->enableAppForGroups('test', $groups);
		$this->assertEquals('["group1","group2"]', $this->appConfig->getValue('test', 'enabled', 'no'));
	}

	public function dataEnableAppForGroupsAllowedTypes() {
		return [
			[[]],
			[[
				'types' => [],
			]],
			[[
				'types' => ['nickvergessen'],
			]],
		];
	}

	/**
	 * @dataProvider dataEnableAppForGroupsAllowedTypes
	 *
	 * @param array $appInfo
	 */
	public function testEnableAppForGroupsAllowedTypes(array $appInfo) {
		$groups = [
			new Group('group1', [], null),
			new Group('group2', [], null)
		];
		$this->expectClearCache();

		/** @var \OC\App\AppManager|\PHPUnit_Framework_MockObject_MockObject $manager */
		$manager = $this->getMockBuilder('OC\App\AppManager')
			->setConstructorArgs([
				$this->userSession, $this->appConfig, $this->groupManager, $this->cacheFactory, $this->eventDispatcher
			])
			->setMethods([
				'getAppInfo'
			])
			->getMock();

		$manager->expects($this->once())
			->method('getAppInfo')
			->with('test')
			->willReturn($appInfo);

		$manager->enableAppForGroups('test', $groups);
		$this->assertEquals('["group1","group2"]', $this->appConfig->getValue('test', 'enabled', 'no'));
	}

	public function dataEnableAppForGroupsForbiddenTypes() {
		return [
			['filesystem'],
			['prelogin'],
			['authentication'],
			['logging'],
			['prevent_group_restriction'],
		];
	}

	/**
	 * @dataProvider dataEnableAppForGroupsForbiddenTypes
	 *
	 * @param string $type
	 *
	 * @expectedException \Exception
	 * @expectedExceptionMessage test can't be enabled for groups.
	 */
	public function testEnableAppForGroupsForbiddenTypes($type) {
		$groups = [
			new Group('group1', [], null),
			new Group('group2', [], null)
		];

		/** @var \OC\App\AppManager|\PHPUnit_Framework_MockObject_MockObject $manager */
		$manager = $this->getMockBuilder('OC\App\AppManager')
			->setConstructorArgs([
				$this->userSession, $this->appConfig, $this->groupManager, $this->cacheFactory, $this->eventDispatcher
			])
			->setMethods([
				'getAppInfo'
			])
			->getMock();

		$manager->expects($this->once())
			->method('getAppInfo')
			->with('test')
			->willReturn([
				'types' => [$type],
			]);

		$manager->enableAppForGroups('test', $groups);
	}

	public function testIsInstalledEnabled() {
		$this->appConfig->setValue('test', 'enabled', 'yes');
		$this->assertTrue($this->manager->isInstalled('test'));
	}

	public function testIsInstalledDisabled() {
		$this->appConfig->setValue('test', 'enabled', 'no');
		$this->assertFalse($this->manager->isInstalled('test'));
	}

	public function testIsInstalledEnabledForGroups() {
		$this->appConfig->setValue('test', 'enabled', '["foo"]');
		$this->assertTrue($this->manager->isInstalled('test'));
	}

	public function testIsEnabledForUserEnabled() {
		$this->appConfig->setValue('test', 'enabled', 'yes');
		$user = $this->createMock(IUser::class);
		$this->assertTrue($this->manager->isEnabledForUser('test', $user));
	}

	public function testIsEnabledForUserDisabled() {
		$this->appConfig->setValue('test', 'enabled', 'no');
		$user = $this->createMock(IUser::class);
		$this->assertFalse($this->manager->isEnabledForUser('test', $user));
	}

	public function testIsEnabledForUserEnabledForGroup() {
		$user = $this->createMock(IUser::class);
		$this->groupManager->expects($this->once())
			->method('getUserGroupIds')
			->with($user)
			->will($this->returnValue(['foo', 'bar']));

		$this->appConfig->setValue('test', 'enabled', '["foo"]');
		$this->assertTrue($this->manager->isEnabledForUser('test', $user));
	}

	public function testIsEnabledForUserDisabledForGroup() {
		$user = $this->createMock(IUser::class);
		$this->groupManager->expects($this->once())
			->method('getUserGroupIds')
			->with($user)
			->will($this->returnValue(['bar']));

		$this->appConfig->setValue('test', 'enabled', '["foo"]');
		$this->assertFalse($this->manager->isEnabledForUser('test', $user));
	}

	public function testIsEnabledForUserLoggedOut() {
		$this->appConfig->setValue('test', 'enabled', '["foo"]');
		$this->assertFalse($this->manager->IsEnabledForUser('test'));
	}

	public function testIsEnabledForUserLoggedIn() {
		$user = $this->createMock(IUser::class);

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->groupManager->expects($this->once())
			->method('getUserGroupIds')
			->with($user)
			->will($this->returnValue(['foo', 'bar']));

		$this->appConfig->setValue('test', 'enabled', '["foo"]');
		$this->assertTrue($this->manager->isEnabledForUser('test'));
	}

	public function testGetInstalledApps() {
		$this->appConfig->setValue('test1', 'enabled', 'yes');
		$this->appConfig->setValue('test2', 'enabled', 'no');
		$this->appConfig->setValue('test3', 'enabled', '["foo"]');
		$this->assertEquals([
			'dav',
			'federatedfilesharing',
			'files',
		   	'files_external',
		   	'test1',
			'test3'
		], $this->manager->getInstalledApps());
	}

	public function testGetAppsForUser() {
		$user = $this->createMock(IUser::class);
		$this->groupManager->expects($this->any())
			->method('getUserGroupIds')
			->with($user)
			->will($this->returnValue(['foo', 'bar']));

		$this->appConfig->setValue('test1', 'enabled', 'yes');
		$this->appConfig->setValue('test2', 'enabled', 'no');
		$this->appConfig->setValue('test3', 'enabled', '["foo"]');
		$this->appConfig->setValue('test4', 'enabled', '["asd"]');
		$this->assertEquals([
			'dav',
		   	'federatedfilesharing',
		   	'files',
			'files_external',
		   	'test1',
			'test3'
		], $this->manager->getEnabledAppsForUser($user));
	}

	public function testGetAppsNeedingUpgrade() {
		$this->manager = $this->getMockBuilder('\OC\App\AppManager')
			->setConstructorArgs([$this->userSession, $this->appConfig, $this->groupManager, $this->cacheFactory, $this->eventDispatcher])
			->setMethods(['getAppInfo'])
			->getMock();

		$appInfos = [
			'dav' => ['id' => 'dav'],
			'files' => ['id' => 'files'],
		   	'files_external' => ['id' => 'files_external'],
			'federatedfilesharing' => ['id' => 'federatedfilesharing'],
			'test1' => ['id' => 'test1', 'version' => '1.0.1', 'requiremax' => '9.0.0'],
			'test2' => ['id' => 'test2', 'version' => '1.0.0', 'requiremin' => '8.2.0'],
			'test3' => ['id' => 'test3', 'version' => '1.2.4', 'requiremin' => '9.0.0'],
			'test4' => ['id' => 'test4', 'version' => '3.0.0', 'requiremin' => '8.1.0'],
			'testnoversion' => ['id' => 'testnoversion', 'requiremin' => '8.2.0'],
		];

		$this->manager->expects($this->any())
			->method('getAppInfo')
			->will($this->returnCallback(
				function($appId) use ($appInfos) {
					return $appInfos[$appId];
				}
		));

		$this->appConfig->setValue('test1', 'enabled', 'yes');
		$this->appConfig->setValue('test1', 'installed_version', '1.0.0');
		$this->appConfig->setValue('test2', 'enabled', 'yes');
		$this->appConfig->setValue('test2', 'installed_version', '1.0.0');
		$this->appConfig->setValue('test3', 'enabled', 'yes');
		$this->appConfig->setValue('test3', 'installed_version', '1.0.0');
		$this->appConfig->setValue('test4', 'enabled', 'yes');
		$this->appConfig->setValue('test4', 'installed_version', '2.4.0');

		$apps = $this->manager->getAppsNeedingUpgrade('8.2.0');

		$this->assertCount(2, $apps);
		$this->assertEquals('test1', $apps[0]['id']);
		$this->assertEquals('test4', $apps[1]['id']);
	}

	public function testGetIncompatibleApps() {
		$this->manager = $this->getMockBuilder('\OC\App\AppManager')
			->setConstructorArgs([$this->userSession, $this->appConfig, $this->groupManager, $this->cacheFactory, $this->eventDispatcher])
			->setMethods(['getAppInfo'])
			->getMock();

		$appInfos = [
			'dav' => ['id' => 'dav'],
			'files' => ['id' => 'files'],
		   	'files_external' => ['id' => 'files_external'],
			'federatedfilesharing' => ['id' => 'federatedfilesharing'],
			'test1' => ['id' => 'test1', 'version' => '1.0.1', 'requiremax' => '8.0.0'],
			'test2' => ['id' => 'test2', 'version' => '1.0.0', 'requiremin' => '8.2.0'],
			'test3' => ['id' => 'test3', 'version' => '1.2.4', 'requiremin' => '9.0.0'],
			'testnoversion' => ['id' => 'testnoversion', 'requiremin' => '8.2.0'],
		];

		$this->manager->expects($this->any())
			->method('getAppInfo')
			->will($this->returnCallback(
				function($appId) use ($appInfos) {
					return $appInfos[$appId];
				}
		));

		$this->appConfig->setValue('test1', 'enabled', 'yes');
		$this->appConfig->setValue('test2', 'enabled', 'yes');
		$this->appConfig->setValue('test3', 'enabled', 'yes');

		$apps = $this->manager->getIncompatibleApps('8.2.0');

		$this->assertCount(2, $apps);
		$this->assertEquals('test1', $apps[0]['id']);
		$this->assertEquals('test3', $apps[1]['id']);
	}
}
