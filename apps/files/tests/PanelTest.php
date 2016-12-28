<?php
/**
 * @author Tom Needham
 * @copyright 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files\Tests;

use OCA\Files\Panels\Admin;
/**
 * @package OCA\Files\Tests
 */
class PanelTest extends \Test\TestCase {

	/** @var \OCA\Files\Panels\Admin */
	private $panel;

	private $urlGenerator;

	private $helper;

	public function setUp() {
		parent::setUp();
		$this->urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')->getMock();
		$this->helper = $this->getMockBuilder('\OC\Settings\Panels\Helper')->getMock();
		$this->panel = new Admin(
			$this->urlGenerator,
			$this->helper);
	}

	public function testGetSection() {
		$this->assertEquals('storage', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
		$this->assertTrue($this->panel->getPriority() > -100);
		$this->assertTrue($this->panel->getPriority() < 100);
	}

	public function testGetPanel() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('id="filesForm"', $templateHtml);
	}

}
