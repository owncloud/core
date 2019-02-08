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

namespace OCA\FederatedFileSharing\Tests;

use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\PersonalPanel;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserSession;

/**
 * @package OCA\FederatedFileSharing\Tests
 */
class PersonalPanelTest extends \Test\TestCase {

	/** @var PersonalPanel */
	private $panel;
	/** @var IL10N */
	private $l;
	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var IUserSession */
	private $userSession;
	/** @var FederatedShareProvider */
	private $shareProvider;
	/** @var IRequest */
	private $request;

	public function setUp() {
		parent::setUp();
		$this->l = $this->getMockBuilder(IL10N::class)->getMock();
		$this->urlGenerator = $this->getMockBuilder(IURLGenerator::class)->getMock();
		$this->userSession = $this->getMockBuilder(IUserSession::class)->getMock();
		$this->request = $this->getMockBuilder(IRequest::class)->getMock();
		$this->shareProvider = $this->getMockBuilder(FederatedShareProvider::class)
			->disableOriginalConstructor()
			->getMock();
		$this->panel = new PersonalPanel($this->l,
			$this->userSession,
			$this->urlGenerator,
			$this->shareProvider,
			$this->request);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertInternalType('int', $this->panel->getPriority());
		$this->assertTrue($this->panel->getPriority() < 50);
	}

	public function testGetPanel() {
		$mockUser = $this->getMockBuilder(IUser::class)->getMock();
		$agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12';
		$this->request->expects($this->once())->method('getHeader')->with('User-Agent')->willReturn($agent);
		$this->userSession->expects($this->once())->method('getUser')->willReturn($mockUser);
		$this->shareProvider->expects($this->once())->method('isOutgoingServer2serverShareEnabled')->willReturn(true);
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<div id="fileSharingSettings"', $templateHtml);
	}
}
