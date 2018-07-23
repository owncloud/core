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

use OC\Helper\LocaleHelper;
use OC\Settings\Controller\SettingsPageController;
use OC\Settings\Panels\Personal\Profile;
use OC\Settings\Section;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserSession;
use OCP\L10N\IFactory;
use OCP\Settings\ISettingsManager;

class SettingsPageControllerTest extends TestCase {
	protected $settingsManager;
	protected $userSession;
	protected $groupManager;
	protected $urlGenerator;
	protected $request;
	protected $pageController;
	protected $config;
	protected $user;
	/** @var IFactory */
	protected $lfactory;

	protected function setUp() {
		parent::setUp();

		$this->request = $this->getMockBuilder(IRequest::class)->getMock();
		$this->settingsManager = $this->getMockBuilder(ISettingsManager::class)->getMock();
		$this->urlGenerator = $this->getMockBuilder(IURLGenerator::class)->getMock();
		$this->groupManager = $this->getMockBuilder(IGroupManager::class)->getMock();
		$this->userSession = $this->getMockBuilder(IUserSession::class)->getMock();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->user = $this->getMockBuilder(IUser::class)->getMock();
		$this->lfactory = $this->createMock(IFactory::class);

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
			->willReturn([new Section('testSectionID', 'testSectionID', 1, 'list')]);
		$this->settingsManager
			->expects($this->once())
			->method('getPersonalPanels')
			->with('general')
			->willReturn(
				new Profile(
					$this->config,
					$this->groupManager,
					$this->userSession,
					$this->lfactory,
					new LocaleHelper()
				)
			);
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
			->willReturn([new Section('testSectionID', 'testSectionID', 1, 'list')]);
		$this->settingsManager
			->expects($this->once())
			->method('getAdminSections')
			->willReturn([new Section('testAdminSectionID', 'testAdminSectionID', 1, 'list')]);
		$this->settingsManager
			->expects($this->once())
			->method('getPersonalPanels')
			->with('general')
			->willReturn(
				new Profile(
					$this->config,
					$this->groupManager,
					$this->userSession,
					$this->lfactory,
					new LocaleHelper()
				)
			);
		$response = $this->pageController->getPersonal('general');
		$this->assertArrayHasKey('personalNav', $response->getParams());
		$this->assertArrayHasKey('adminNav', $response->getParams());
		$this->assertNotEmpty($response->getParams()['adminNav']);
		$this->assertArrayHasKey('panels', $response->getParams());
		$this->assertArrayHasKey('icon', $response->getParams()['personalNav'][0]);
		$this->assertArrayHasKey('link', $response->getParams()['personalNav'][0]);
		$this->assertArrayHasKey('id', $response->getParams()['personalNav'][0]);
		$this->assertContains('testSectionID', $response->getParams()['personalNav'][0]['id']);
		$this->assertContains('testAdminSectionID', $response->getParams()['adminNav'][0]['id']);
	}
}
