<?php
/**
 * ownCloud
 *
 * @author Joas Schilling
 * @copyright Copyright (c) 2015 Joas Schilling nickvergessen@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

use OC\NavigationManager;
use OCP\App\IAppManager;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\ISubAdminManager;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserSession;
use OCP\L10N\IFactory;

class NavigationManagerTest extends TestCase {
	/** @var \OC\NavigationManager */
	protected $navigationManager;

	protected function setUp() {
		parent::setUp();

		$this->navigationManager = new NavigationManager();
	}

	public function addArrayData() {
		return [
			[
				[
					'id'	=> 'entry id',
					'name'	=> 'link text',
					'order'	=> 1,
					'icon'	=> 'optional',
					'href'	=> 'url',
				],
				[
					'id'		=> 'entry id',
					'name'		=> 'link text',
					'order'		=> 1,
					'icon'		=> 'optional',
					'href'		=> 'url',
					'active'	=> false,
				],
			],
			[
				[
					'id'	=> 'entry id',
					'name'	=> 'link text',
					'order'	=> 1,
					//'icon'	=> 'optional',
					'href'	=> 'url',
					'active'	=> true,
				],
				[
					'id'		=> 'entry id',
					'name'		=> 'link text',
					'order'		=> 1,
					'icon'		=> '',
					'href'		=> 'url',
					'active'	=> false,
				],
			],
		];
	}

	/**
	 * @dataProvider addArrayData
	 *
	 * @param array $entry
	 * @param array $expectedEntry
	 */
	public function testAddArray(array $entry, array $expectedEntry) {
		$this->assertEmpty($this->navigationManager->getAll(), 'Expected no navigation entry exists');
		$this->navigationManager->add($entry);

		$navigationEntries = $this->navigationManager->getAll();
		$this->assertCount(1, $navigationEntries, 'Expected that 1 navigation entry exists');
		$this->assertEquals($expectedEntry, $navigationEntries[0]);

		$this->navigationManager->clear();
		$this->assertEmpty($this->navigationManager->getAll(), 'Expected no navigation entry exists after clear()');
	}

	/**
	 * @dataProvider addArrayData
	 *
	 * @param array $entry
	 * @param array $expectedEntry
	 */
	public function testAddClosure(array $entry, array $expectedEntry) {
		global $testAddClosureNumberOfCalls;
		$testAddClosureNumberOfCalls = 0;

		$this->navigationManager->add(function () use ($entry) {
			global $testAddClosureNumberOfCalls;
			$testAddClosureNumberOfCalls++;

			return $entry;
		});

		$this->assertEquals(0, $testAddClosureNumberOfCalls, 'Expected that the closure is not called by add()');

		$navigationEntries = $this->navigationManager->getAll();
		$this->assertEquals(1, $testAddClosureNumberOfCalls, 'Expected that the closure is called by getAll()');
		$this->assertCount(1, $navigationEntries, 'Expected that 1 navigation entry exists');
		$this->assertEquals($expectedEntry, $navigationEntries[0]);

		$navigationEntries = $this->navigationManager->getAll();
		$this->assertEquals(1, $testAddClosureNumberOfCalls, 'Expected that the closure is only called once for getAll()');
		$this->assertCount(1, $navigationEntries, 'Expected that 1 navigation entry exists');
		$this->assertEquals($expectedEntry, $navigationEntries[0]);

		$this->navigationManager->clear();
		$this->assertEmpty($this->navigationManager->getAll(), 'Expected no navigation entry exists after clear()');
	}

	public function testAddArrayClearGetAll() {
		$entry = [
			'id'	=> 'entry id',
			'name'	=> 'link text',
			'order'	=> 1,
			'icon'	=> 'optional',
			'href'	=> 'url',
		];

		$this->assertEmpty($this->navigationManager->getAll(), 'Expected no navigation entry exists');
		$this->navigationManager->add($entry);
		$this->navigationManager->clear();
		$this->assertEmpty($this->navigationManager->getAll(), 'Expected no navigation entry exists after clear()');
	}

	public function testAddClosureClearGetAll() {
		$this->assertEmpty($this->navigationManager->getAll(), 'Expected no navigation entry exists');

		$entry = [
			'id'	=> 'entry id',
			'name'	=> 'link text',
			'order'	=> 1,
			'icon'	=> 'optional',
			'href'	=> 'url',
		];

		global $testAddClosureNumberOfCalls;
		$testAddClosureNumberOfCalls = 0;

		$this->navigationManager->add(function () use ($entry) {
			global $testAddClosureNumberOfCalls;
			$testAddClosureNumberOfCalls++;

			return $entry;
		});

		$this->assertEquals(0, $testAddClosureNumberOfCalls, 'Expected that the closure is not called by add()');
		$this->navigationManager->clear();
		$this->assertEquals(0, $testAddClosureNumberOfCalls, 'Expected that the closure is not called by clear()');
		$this->assertEmpty($this->navigationManager->getAll(), 'Expected no navigation entry exists after clear()');
		$this->assertEquals(0, $testAddClosureNumberOfCalls, 'Expected that the closure is not called by getAll()');
	}

	/**
	 * @dataProvider providesNavigationConfig
	 */
	public function testWithAppManager($expected, $config, $isAdmin = false, $isSubAdmin = false) {
		$appManager = $this->createMock(IAppManager::class);
		$urlGenerator = $this->createMock(IURLGenerator::class);
		$l10nFac = $this->createMock(IFactory::class);
		$userSession = $this->createMock(IUserSession::class);
		$groupManager = $this->createMock(IGroupManager::class);
		$l = $this->createMock(IL10N::class);
		$l->expects($this->any())->method('t')->willReturnCallback(function ($text, $parameters = []) {
			return \vsprintf($text, $parameters);
		});

		$appManager->expects($this->once())->method('getInstalledApps')->willReturn(['test']);
		$appManager->expects($this->once())->method('getAppInfo')->with('test')->willReturn($config);
		$l10nFac->expects($this->exactly(\count($expected)))->method('get')->with('test')->willReturn($l);
		$urlGenerator->expects($this->any())->method('imagePath')->willReturnCallback(function ($appName, $file) {
			return "/apps/$appName/img/$file";
		});
		if (isset($config['navigation']['static'])) {
			$urlGenerator->expects($this->never())->method('linkToRoute')->willReturn('/apps/test/');
			$urlGenerator->expects($this->once())->method('linkTo')->willReturn('link-to-static');
		} else {
			$urlGenerator->expects($this->exactly(\count($expected)))->method('linkToRoute')->willReturn('/apps/test/');
			$urlGenerator->expects($this->never())->method('linkTo')->willReturn('link-to-static');
		}

		$user = $this->createMock(IUser::class);
		$user->expects($this->any())->method('getUID')->willReturn('user001');
		$userSession->expects($this->any())->method('getUser')->willReturn($user);
		$subAdminManager = $this->createMock(ISubAdminManager::class);
		$subAdminManager->expects($this->any())->method('isSubAdmin')->willReturn($isSubAdmin);
		$groupManager->expects($this->any())->method('isAdmin')->willReturn($isAdmin);
		$groupManager->expects($this->any())->method('getSubAdmin')->willReturn($subAdminManager);

		$navigationManager = new NavigationManager($appManager, $urlGenerator, $l10nFac, $userSession, $groupManager);

		$entries = $navigationManager->getAll();
		$this->assertEquals($expected, $entries);
	}

	public function providesNavigationConfig() {
		return [
			'minimalistic' => [[[
				'id' => 'test',
				'order' => 100,
				'href' => '/apps/test/',
				'icon' => '/apps/test/img/app.svg',
				'name' => 'Test',
				'active' => false
			]], ['navigation' => ['route' => 'test.page.index']]],
			'no admin' => [[[
				'id' => 'test',
				'order' => 100,
				'href' => '/apps/test/',
				'icon' => '/apps/test/img/app.svg',
				'name' => 'Test',
				'active' => false
			]], ['navigation' => ['@attributes' => ['role' => 'admin'], 'route' => 'test.page.index']], true],
			'admin' => [[], ['navigation' => ['@attributes' => ['role' => 'admin'], 'route' => 'test.page.index']]],
			'with static' => [[[
				'id' => 'test',
				'order' => 100,
				'href' => 'link-to-static',
				'icon' => '/apps/test/img/app.svg',
				'name' => 'Test',
				'active' => false
			]], ['navigation' => ['static' => 'static.html']]],
			'testAdminSubadmin' => [[[
				'id' => 'test',
				'order' => 100,
				'href' => '/apps/test/',
				'icon' => '/apps/test/img/app.svg',
				'name' => 'Test',
				'active' => false
			]], ['navigation' => ['@attributes' => ['role' => 'admin,sub-admin'], 'route' => 'test.page.index']], true, true],
			'testAdminSubadminWithSpaceAtAdmin' => [[[
				'id' => 'test',
				'order' => 100,
				'href' => '/apps/test/',
				'icon' => '/apps/test/img/app.svg',
				'name' => 'Test',
				'active' => false
			]], ['navigation' => ['@attributes' => ['role' => '  admin   ,sub-admin'], 'route' => 'test.page.index']], true, true],
			'testAdminSubadminWithSpaceAtSubAdmin' => [[[
				'id' => 'test',
				'order' => 100,
				'href' => '/apps/test/',
				'icon' => '/apps/test/img/app.svg',
				'name' => 'Test',
				'active' => false
			]], ['navigation' => ['@attributes' => ['role' => 'admin,   sub-admin  '], 'route' => 'test.page.index']], true, true],
			'testSubadmin' => [[[
				'id' => 'test',
				'order' => 100,
				'href' => '/apps/test/',
				'icon' => '/apps/test/img/app.svg',
				'name' => 'Test',
				'active' => false
			]], ['navigation' => ['@attributes' => ['role' => 'sub-admin'], 'route' => 'test.page.index']], false, true],
			'testAdmin' => [[[
				'id' => 'test',
				'order' => 100,
				'href' => '/apps/test/',
				'icon' => '/apps/test/img/app.svg',
				'name' => 'Test',
				'active' => false
			]], ['navigation' => ['@attributes' => ['role' => 'admin'], 'route' => 'test.page.index']], true],
			'testAdminWithSpace' => [[[
				'id' => 'test',
				'order' => 100,
				'href' => '/apps/test/',
				'icon' => '/apps/test/img/app.svg',
				'name' => 'Test',
				'active' => false
			]], ['navigation' => ['@attributes' => ['role' => '   admin   '], 'route' => 'test.page.index']], true]
		];
	}
}
