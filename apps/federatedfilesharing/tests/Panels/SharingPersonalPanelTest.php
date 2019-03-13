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
namespace OCA\FederatedFileSharing\Tests\Panels;

use OCA\FederatedFileSharing\Panels\SharingPersonalPanel;
use OCP\IConfig;
use OCP\IUser;
use OCP\IUserSession;

class SharingPersonalPanelTest extends \Test\TestCase {

	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject $config */
	private $config;

	/** @var IUserSession | \PHPUnit_Framework_MockObject_MockObject $userSession */
	private $userSession;

	/** @var SharingPersonalPanel $personalPanel */
	private $sharingPersonalPanel;

	protected function setUp() {
		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()
			->getMock();

		$this->userSession = $this->getMockBuilder(IUserSession::class)
			->disableOriginalConstructor()
			->getMock();

		$this->sharingPersonalPanel = new SharingPersonalPanel($this->config, $this->userSession);
	}

	public function testGetSectionID() {
		$this->assertEquals('sharing', $this->sharingPersonalPanel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertEquals(40, $this->sharingPersonalPanel->getPriority());
	}

	public function globalFederatedSharingConfigProvider() {
		return [
			[['auto_accept_trusted' => 'yes'], '<form class="section" id="federatedfilesharing_settings">'],
			[['auto_accept_trusted' => 'no'], '<p>Nothing to configure.</p>'],
		];
	}

	/**
	 * @dataProvider globalFederatedSharingConfigProvider
	 *
	 * @param array $globalConfigs
	 * @param string $expectedString
	 */
	public function testGetPanel($globalConfigs, $expectedString) {
		$mockUser = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$mockUser->expects($this->any())
			->method('getUID')
			->willReturn('testuser');

		$this->userSession->expects($this->any())
			->method('getUser')
			->willReturn($mockUser);
		$this->config->expects($this->once())
			->method('getAppValue')
			->with('federatedfilesharing', 'auto_accept_trusted', 'no')
			->willReturn($globalConfigs['auto_accept_trusted']);
		
		$templateHtml = $this->sharingPersonalPanel->getPanel()->fetchPage();
		$this->assertContains($expectedString, $templateHtml);
	}
}
