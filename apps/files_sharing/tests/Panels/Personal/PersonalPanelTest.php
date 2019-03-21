<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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
namespace OCA\Files_Sharing\Tests\Panels\Personal;

use OCA\Files_Sharing\Panels\Personal\PersonalPanel;
use OCP\IConfig;
use OCP\IUser;
use OCP\IUserSession;

class PersonalPanelTest extends \Test\TestCase {

	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject $config */
	private $config;

	/** @var IUserSession | \PHPUnit\Framework\MockObject\MockObject $userSession */
	private $userSession;

	/** @var PersonalPanel $personalPanel */
	private $personalPanel;

	protected function setUp() {
		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()
			->getMock();

		$this->userSession = $this->getMockBuilder(IUserSession::class)
			->disableOriginalConstructor()
			->getMock();

		$this->personalPanel = new PersonalPanel($this->config, $this->userSession);
	}

	public function testGetSectionID() {
		$this->assertEquals('sharing', $this->personalPanel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertEquals(100, $this->personalPanel->getPriority());
	}

	public function globalSharingConfigProvider() {
		return [
			[['shareapi_auto_accept_share' => 'yes'], '<form class="section" id="files_sharing_settings">'],
			[['shareapi_auto_accept_share' => 'no'], '<p>Nothing to configure.</p>'],
		];
	}

	public function testGetPanelEmpty() {
		$mockUser = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$mockUser->expects($this->any())
			->method('getUID')
			->willReturn('testuser');

		$this->userSession->expects($this->any())
			->method('getUser')
			->willReturn($mockUser);

		$this->config->expects($this->any())
			->method('getAppValue')
			->willReturn('no');

		$templateHtml = $this->personalPanel->getPanel()->fetchPage();
		$this->assertContains('<p>Nothing to configure.</p>', $templateHtml);
	}

	public function testGetPanelNotEmpty() {
		$mockUser = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$mockUser->expects($this->any())
			->method('getUID')
			->willReturn('testuser');

		$this->userSession->expects($this->any())
			->method('getUser')
			->willReturn($mockUser);

		$this->config->expects($this->any())
			->method('getAppValue')
			->willReturn('yes');

		$templateHtml = $this->personalPanel->getPanel()->fetchPage();
		$this->assertContains('<form class="section" id="files_sharing_settings">', $templateHtml);
	}
}
