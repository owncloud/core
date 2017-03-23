<?php
/**
 * @author Tom Needham
 * @copyright 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Panels\Admin;

use OC\Settings\Panels\Admin\Tips;

/**
 * @package Tests\Settings\Panels\Admin
 */
class TipsTest extends \Test\TestCase {

	/** @var Tips */
	private $panel;

	public function setUp() {
		parent::setUp();
		$this->panel = new Tips();
	}

	public function testGetSection() {
		$this->assertEquals('help', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
		$this->assertTrue($this->panel->getPriority() > -100);
		$this->assertTrue($this->panel->getPriority() < 100);
	}

	public function testGetPanel() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<div id="admin-tips" class="section">', $templateHtml);
	}

}
