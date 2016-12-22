<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

use OC\Settings\Controller\SettingsPageController;
use OC\Settings\Panels\Personal\Profile;
use OC\Settings\Section;

class SettingsPageControllerTest extends TestCase {

	protected $settingsManager;
	protected $userSession;
	protected $groupManager;
	protected $urlGenerator;
	protected $request;
	protected $pageController;
	protected $config;
	protected $user;
	protected $helper;
	protected $lfactory;

	protected function setUp() {
		parent::setUp();

		$this->request = $this->getMockBuilder('\OCP\IRequest')->getMock();
		$this->settingsManager = $this->getMockBuilder('\OCP\Settings\ISettingsManager')->getMock();
		$this->urlGenerator = $this->getMockBuilder('\OCP\IUrlGenerator')->getMock();
		$this->groupManager = $this->getMockBuilder('\OCP\IGroupManager')->getMock();
		$this->userSession = $this->getMockBuilder('\OCP\IUserSession')->getMock();
		$this->config = $this->getMockBuilder('\OCP\IConfig')->getMock();
		$this->user = $this->getMockBuilder('\OCP\IUser')->getMock();
		$this->helper = $this->getMockBuilder('\OC\Settings\Panels\Helper')->getMock();
		$this->lfactory = $this->getMockBuilder('\OCP\IL10N\IFactory')->getMock();

		$this->pageController = new SettingsPageController('settings',
			$this->request,
			$this->settingsManager,
			$this->urlGenerator,
			$this->groupManager,
			$this->userSession);

	}

	public function testGetPersonalAsUser() {
		$this->user
			->expects($this->once())
			->method('getUID')
			->willReturn('testUser');
		$this->userSession
			->expects($this->any())
			->method('getUser')
			->willReturn($this->user);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('testUser')
			->willReturn(false);
		$this->settingsManager
			->expects($this->once())
			->method('getPersonalSections')
			->willReturn([new Section('testSectionID', 'testSectionID', 1)]);
		$this->settingsManager
			->expects($this->once())
			->method('getPersonalPanels')
			->with('general')
			->willReturn(
				new Profile(
					$this->config,
					$this->groupManager,
					$this->userSession,
					$this->helper,
					$this->lfactory));
		$response = $this->pageController->getPersonal('general');
		$this->assertArrayHasKey('personalNav', $response->getParams());
		$this->assertArrayHasKey('adminNav', $response->getParams());
		$this->assertEmpty($response->getParams()['adminNav']);
		$this->assertArrayHasKey('panels', $response->getParams());
		$this->assertContains('testSectionID', $response->getParams()['personalNav'][0]['id']);
	}

	public function testGetPersonalAsAdmin() {
		$this->user
			->expects($this->once())
			->method('getUID')
			->willReturn('testUser');
		$this->userSession
			->expects($this->any())
			->method('getUser')
			->willReturn($this->user);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('testUser')
			->willReturn(true);
		$this->settingsManager
			->expects($this->once())
			->method('getPersonalSections')
			->willReturn([new Section('testSectionID', 'testSectionID', 1)]);
		$this->settingsManager
			->expects($this->once())
			->method('getAdminSections')
			->willReturn([new Section('testAdminSectionID', 'testAdminSectionID', 1)]);
		$this->settingsManager
			->expects($this->once())
			->method('getPersonalPanels')
			->with('general')
			->willReturn(
				new Profile(
					$this->config,
					$this->groupManager,
					$this->userSession,
					$this->helper,
					$this->lfactory));
		$response = $this->pageController->getPersonal('general');
		$this->assertArrayHasKey('personalNav', $response->getParams());
		$this->assertArrayHasKey('adminNav', $response->getParams());
		$this->assertNotEmpty($response->getParams()['adminNav']);
		$this->assertArrayHasKey('panels', $response->getParams());
		$this->assertContains('testSectionID', $response->getParams()['personalNav'][0]['id']);
		$this->assertContains('testAdminSectionID', $response->getParams()['adminNav'][0]['id']);
	}


}