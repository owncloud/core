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

use OC\Settings\Panels\Admin\FileSharing;
use OC\Settings\Panels\Helper;
use OCP\IConfig;

/**
 * @package Tests\Settings\Panels\Admin
 */
class FileSharingTest extends \Test\TestCase {

	/** @var FileSharing */
	private $panel;
	/** @var IConfig */
	private $config;
	/** @var Helper */
	private $helper;

	public function setUp() {
		parent::setUp();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->helper = $this->getMockBuilder(Helper::class)->getMock();
		$this->panel = new FileSharing($this->config, $this->helper);
	}

	public function testGetSection() {
		$this->assertEquals('sharing', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
		$this->assertTrue($this->panel->getPriority() > -100);
		$this->assertTrue($this->panel->getPriority() < 100);
	}

	public function testGetPanelEnabled() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<label for="shareAPIEnabled">', $templateHtml);
	}

}
