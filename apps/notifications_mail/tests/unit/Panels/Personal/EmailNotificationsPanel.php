<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
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

namespace OCA\notifications_mail\Tests\Panels\Personal;

use Test\TestCase;
use OCA\notifications_mail\Panels\Personal\EmailNotificationsPanel;

class EmailNotificationsPanelTest extends TestCase {
	private $config;
	private $userSession;
	private $emailNotificationsPanel;

	protected function setUp() {
		$this->userSession = $this->getMockBuilder('\OCP\IUserSession')
			->disableOriginalConstructor()
			->getMock();
		$this->config = $this->getMockBuilder('\OCP\IConfig')
			->disableOriginalConstructor()
			->getMock();

		$this->emailNotificationsPanel = new EmailNotificationsPanel($this->config, $this->userSession);
	}

	public function testGetPriority() {
		$this->assertEquals(0, $this->emailNotificationsPanel->getPriority());
	}

	public function testGetSectionID() {
		$this->assertEquals('additional', $this->emailNotificationsPanel->getSectionID());
	}

	public function panelValueProvider() {
		return [
			['never'],
			['action'],
			['always'],
			['randomValue'],
		];
	}

	/**
	 * @dataProvider panelValueProvider
	 */
	public function testGetPanelDefault($selectedValue) {
		$mockedUser = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()
			->getMock();
		$mockedUser->method('getUID')->willReturn('testUser');

		$this->userSession->method('getUser')->willReturn($mockedUser);

		$this->config->method('getUserValue')->willReturn($selectedValue);

		$page = $this->emailNotificationsPanel->getPanel()->fetchPage();
		$this->assertContains('<h2 class="app-name">Notifications Email</h2>', $page);
		if (in_array($selectedValue, ['never', 'action', 'always'], true)) {
			$this->assertContains("<option value=\"$selectedValue\" selected=\"selected\">", $page);
		} else {
			$this->assertContains("<option value=\"never\" selected=\"selected\">", $page);
		}
	}
}
