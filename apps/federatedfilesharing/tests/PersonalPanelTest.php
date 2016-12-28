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

	public function setUp() {
		parent::setUp();
		$this->l = $this->getMockBuilder('\OCP\IL10N')->getMock();
		$this->urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')->getMock();
		$this->userSession = $this->getMockBuilder('\OCP\IUserSession')->getMock();
		$this->panel = new PersonalPanel($this->l, $this->userSession, $this->urlGenerator);
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
		$this->userSession->expects($this->once())->method('getUser')->willReturn($mockUser);
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('You are using', $templateHtml);
	}

}
