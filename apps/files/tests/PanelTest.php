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

use OC\Settings\Panels\Helper;
use OCA\Files\Panels\Admin;
use OCP\IURLGenerator;

/**
 * @package OCA\Files\Tests
 */
class PanelTest extends \Test\TestCase {

	/** @var Admin */
	private $panel;
	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var Helper */
	private $helper;

	public function setUp() {
		parent::setUp();
		$this->urlGenerator = $this->getMockBuilder(IURLGenerator::class)->getMock();
		$this->helper = $this->getMockBuilder(Helper::class)->getMock();
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
