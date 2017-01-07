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

use OCA\FederatedFileSharing\AdminPanel;

/**
 * @package OCA\FederatedFileSharing\Tests
 */
class AdminPanelTest extends \Test\TestCase {

	/** @var AdminPanel */
	private $panel;

	private $shareProvider;

	public function setUp() {
		parent::setUp();
		$this->shareProvider = $this->getMockBuilder('\OCA\FederatedFileSharing\FederatedShareProvider')
			->disableOriginalConstructor()
			->getMock();
		$this->panel = new AdminPanel($this->shareProvider);
	}

	public function testGetSection() {
		$this->assertEquals('sharing', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
	}

	public function testGetPanel() {
		$this->shareProvider->expects($this->once())->method('isOutgoingServer2serverShareEnabled')->willReturn(true);
		$this->shareProvider->expects($this->once())->method('isIncomingServer2serverShareEnabled')->willReturn(true);
		$templateHtml = $this->panel->getPanel()->fetchPage();
	}

}
