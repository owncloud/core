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

	public function setUp() {
		parent::setUp();
		$this->panel = new AdminPanel();
	}

	public function testGetSection() {
		$this->assertEquals('sharing', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
	}

	public function testGetPanel() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		// TODO
	}

}
