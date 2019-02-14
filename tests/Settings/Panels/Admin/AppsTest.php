<?php
/**
 * @author Tom Needham
 * @copyright Copyright (c) 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Panels\Admin;

use OC\Settings\Panels\Admin\Apps;
use OCP\IConfig;

/**
 * @package Tests\Settings\Panels\Admin
 */
class AppsTest extends \Test\TestCase {

	/** @var Apps */
	private $panel;
	/** @var IConfig */
	private $config;

	public function setUp(): void {
		parent::setUp();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->panel = new Apps($this->config);
	}

	public function testGetSection() {
		$this->assertEquals('apps', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertInternalType('int', $this->panel->getPriority());
	}

	public function testGetPanel() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<div id="apps-list" class="icon-loading"></div>', $templateHtml);
	}
}
