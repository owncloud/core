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

use OC\Settings\Panels\Admin\Logging;
use OC\Settings\Panels\Helper;
use OCP\IConfig;
use OCP\IURLGenerator;

/**
 * @package Tests\Settings\Panels\Admin
 */
class LoggingTest extends \Test\TestCase {

	/** @var Logging */
	private $panel;
	/** @var IConfig */
	private $config;
	/** @var  IURLGenerator */
	private $urlGenerator;
	/** @var Helper */
	private $helper;

	public function setUp(): void {
		parent::setUp();
		$this->urlGenerator = $this->getMockBuilder(IURLGenerator::class)->getMock();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->helper = $this->getMockBuilder(Helper::class)->getMock();
		$this->panel = new Logging($this->config, $this->urlGenerator, $this->helper);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertInternalType('int', $this->panel->getPriority());
		$this->assertGreaterThan(-100, $this->panel->getPriority());
		$this->assertLessThan(100, $this->panel->getPriority());
	}

	public function testGetPanelWithNoLogFile() {
		$this->helper
			->expects($this->once())
			->method('getLogFilePath')
			->willReturn('/var/log/file/doesnt/exist.log');
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertNotContains('<div class="section">', $templateHtml);
	}

	public function testGetPanelWithLogFile() {
		$this->helper
			->expects($this->once())
			->method('getLogFilePath')
			->willReturn(__FILE__);
		$this->config->expects($this->exactly(2))->method('getSystemValue')->will($this->returnValueMap([
			['loglevel', 2, 2],
			['log_type', 'owncloud', 'owncloud'],
		]));
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<div class="section">', $templateHtml);
	}
}
