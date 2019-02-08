<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace Test;

use OC\Settings\SettingsManager;

class SettingsManagerTest extends TestCase {

	/** @var \OC\Settings\SettingsManager */
	protected $settingsManager;
	protected $l;
	protected $appManager;
	protected $userSession;
	protected $logger;
	protected $groupManager;
	protected $config;
	protected $defaults;
	protected $urlGenerator;
	protected $helper;
	protected $lockingProvider;
	protected $dbconnection;
	protected $certificateManager;
	protected $factory;

	protected function setUp() {
		parent::setUp();

		$this->l = $this->getMockBuilder('\OCP\IL10N')->getMock();
		$this->appManager = $this->getMockBuilder('\OCP\App\IAppManager')->getMock();
		$this->userSession = $this->getMockBuilder('\OCP\IUserSession')->getMock();
		$this->logger = $this->getMockBuilder('\OCP\ILogger')->getMock();
		$this->groupManager = $this->getMockBuilder('\OCP\IGroupManager')->getMock();
		$this->config = $this->getMockBuilder('\OCP\IConfig')->getMock();
		$this->defaults = $this->getMockBuilder('\OCP\Defaults')->getMock();
		$this->urlGenerator = $this->getMockBuilder('\OCP\IUrlGenerator')->getMock();
		$this->helper = $this->getMockBuilder('\OC\Settings\Panels\Helper')->getMock();
		$this->lockingProvider = $this->getMockBuilder('\OCP\Lock\ILockingProvider')->getMock();
		$this->dbconnection = $this->getMockBuilder('\OCP\IDBConnection')->getMock();
		$this->certificateManager = $this->getMockBuilder('\OC\Security\CertificateManager')
			->disableOriginalConstructor()->getMock();
		$this->factory = $this->getMockBuilder('\OCP\L10N\IFactory')->getMock();

		$this->settingsManager = new SettingsManager(
			$this->l,
			$this->appManager,
			$this->userSession,
			$this->logger,
			$this->groupManager,
			$this->config,
			$this->defaults,
			$this->urlGenerator,
			$this->helper,
			$this->lockingProvider,
			$this->dbconnection,
			$this->certificateManager,
			$this->factory
		);
	}

	public function testGetBuiltInPanel() {
		$panel = $this->settingsManager->getBuiltInPanel('OC\Settings\Panels\Personal\Profile');
		$this->assertNotFalse($panel);
		$this->assertEquals('OC\Settings\Panels\Personal\Profile', \get_class($panel));
	}

	public function testGetPanelsList() {
		$user = $this->getMockBuilder('\OCP\IUser')->getMock();
		$this->userSession->expects($this->once())->method('getUser')->willReturn($user);
		$this->appManager->expects($this->once())->method('getEnabledAppsForUser')->with($user)->willReturn([]);
		$list = $this->settingsManager->getPanelsList('personal');
		$this->assertContains('OC\Settings\Panels\Personal\Profile', $list);
	}

	public function testFindRegisteredPanelsAdmin() {
		// Return a mock user
		$user = $this->getMockBuilder('\OCP\IUser')->getMock();
		$this->userSession->expects($this->any())->method('getUser')->willReturn($user);
		// Return encryption as example app with
		$this->appManager->expects($this->exactly(1))->method('getEnabledAppsForUser')->with($user)->willReturn(['encryption']);
		$settingsInfo = [
			'settings' =>
				['admin' => 'OCA\Encryption\TestPanel']
		];
		$this->appManager->expects($this->exactly(2))->method('getAppInfo')->with('encryption')->willReturn($settingsInfo);
		$panels = $this->invokePrivate($this->settingsManager, 'findRegisteredPanels', ['admin']);
		$this->assertCount(1, $panels);
	}

	public function testFindRegisteredPanelsPersonal() {
		// Return a mock user
		$user = $this->getMockBuilder('\OCP\IUser')->getMock();
		$this->userSession->expects($this->any())->method('getUser')->willReturn($user);
		// Return encryption as example app with
		$this->appManager->expects($this->exactly(1))->method('getEnabledAppsForUser')->with($user)->willReturn(['encryption']);
		$settingsInfo = [
			'settings' =>
				['personal' => 'OCA\Encryption\TestPanel']
		];
		$this->appManager->expects($this->exactly(2))->method('getAppInfo')->with('encryption')->willReturn($settingsInfo);
		$panels = $this->invokePrivate($this->settingsManager, 'findRegisteredPanels', ['personal']);
		$this->assertCount(1, $panels);
		$this->assertEquals('OCA\Encryption\TestPanel', \array_shift($panels));
	}

	public function testFindRegisteredPanelsPersonalMultiple() {
		// Return a mock user
		$user = $this->getMockBuilder('\OCP\IUser')->getMock();
		$this->userSession->expects($this->any())->method('getUser')->willReturn($user);
		// Return encryption as example app with
		$this->appManager->expects($this->exactly(1))->method('getEnabledAppsForUser')->with($user)->willReturn(['encryption']);
		$settingsInfo = [
			'settings' =>
				['personal' => ['OCA\Encryption\TestPanel', 'OCA\Encryption\TestPanel2']]
		];
		$this->appManager->expects($this->exactly(2))->method('getAppInfo')->with('encryption')->willReturn($settingsInfo);
		$panels = $this->invokePrivate($this->settingsManager, 'findRegisteredPanels', ['personal']);
		$this->assertCount(2, $panels);
	}

	public function testLoadPersonalPanels() {
		$user = $this->getMockBuilder('\OCP\IUser')->getMock();
		$this->userSession->expects($this->any())->method('getUser')->willReturn($user);
		$this->appManager->expects($this->exactly(1))->method('getEnabledAppsForUser')->with($user)->willReturn(['encryption']);
		$this->appManager->expects($this->exactly(1))->method('getAppInfo')->with('encryption')->willReturn([]);
		$panels = $this->settingsManager->loadPanels('personal');
		$this->assertNotEmpty($panels);
		foreach ($panels as $section => $panels) {
			foreach ($panels as $panel) {
				$panelClasses[$section][] = \get_class($panel);
			}
		}
		$this->assertArrayHasKey('additional', $panelClasses);
		$this->assertContains('OC\Settings\Panels\Personal\Legacy', $panelClasses['additional']);
		$this->assertArrayHasKey('general', $panelClasses);
		$this->assertContains('OC\Settings\Panels\Personal\Profile', $panelClasses['general']);
	}

	public function testLoadAdminPanels() {
		$user = $this->getMockBuilder('\OCP\IUser')->getMock();
		$this->userSession->expects($this->any())->method('getUser')->willReturn($user);
		$this->appManager->expects($this->exactly(1))->method('getEnabledAppsForUser')->with($user)->willReturn(['encryption']);
		$this->appManager->expects($this->exactly(1))->method('getAppInfo')->with('encryption')->willReturn([]);
		$panels = $this->settingsManager->loadPanels('admin');
		$this->assertNotEmpty($panels);
		foreach ($panels as $section => $panels) {
			foreach ($panels as $panel) {
				$panelClasses[$section][] = \get_class($panel);
			}
		}
		$this->assertArrayHasKey('additional', $panelClasses);
		$this->assertArrayHasKey('general', $panelClasses);
		$this->assertContains('OC\Settings\Panels\Admin\Legacy', $panelClasses['additional']);
		$this->assertContains('OC\Settings\Panels\Admin\SecurityWarning', $panelClasses['general']);
	}
}
