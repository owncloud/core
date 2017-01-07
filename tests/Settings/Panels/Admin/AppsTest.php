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

use OC\Settings\Panels\Admin\Apps;

/**
 * @package Tests\Settings\Panels\Admin
 */
class AppsTest extends \Test\TestCase {

	/** @var \OC\Settings\Panels\Admin\Apps */
	private $panel;

	private $config;

	public function setUp() {
		parent::setUp();
		$this->config = $this->getMockBuilder('\OCP\IConfig')->getMock();
		$this->panel = new Apps($this->config);
	}

	public function testGetSection() {
		$this->assertEquals('apps', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
	}

	public function testGetPanel() {
		$this->config->expects($this->once())->method('getSystemValue')->with('appstoreenabled', true)->willReturn(true);
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<div id="apps-list" class="icon-loading"></div>', $templateHtml);
	}

}
