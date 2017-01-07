<?php
/**
 * @author Tom Needham
 * @copyright 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\FederatedFileSharing\Tests;

use OCA\FederatedFileSharing\PersonalPanel;

/**
 * @package OCA\FederatedFileSharing\Tests
 */
class PersonalPanelTest extends \Test\TestCase {

	/** @var PersonalPanel */
	private $panel;

	private $l;

	private $urlGenerator;

	private $userSession;

	private $shareProvider;

	private $request;

	public function setUp() {
		parent::setUp();
		$this->l = $this->getMockBuilder('\OCP\IL10N')->getMock();
		$this->urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')->getMock();
		$this->userSession = $this->getMockBuilder('\OCP\IUserSession')->getMock();
		$this->request = $this->getMockBuilder('\OCP\IRequest')->getMock();
		$this->shareProvider = $this->getMockBuilder('\OCA\FederatedFileSharing\FederatedShareProvider')
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
		$this->assertTrue(is_integer($this->panel->getPriority()));
		$this->assertTrue($this->panel->getPriority() < 50);
	}

	public function testGetPanel() {
		$mockUser = $this->getMockBuilder('\OCP\IUser')->getMock();
		$agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12';
		$this->request->expects($this->once())->method('getHeader')->with('User-Agent')->willReturn($agent);
		$this->userSession->expects($this->once())->method('getUser')->willReturn($mockUser);
		$this->shareProvider->expects($this->once())->method('isOutgoingServer2serverShareEnabled')->willReturn(true);
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<div id="fileSharingSettings"', $templateHtml);
	}

}
