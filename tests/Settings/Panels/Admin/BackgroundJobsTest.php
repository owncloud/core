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

use OC\Settings\Panels\Admin\BackgroundJobs;

/**
 * @package Tests\Settings\Panels\Admin
 */
class BackgroundJobsTest extends \Test\TestCase {

	/** @var \OC\Settings\Panels\Admin\BackgroundJobs */
	private $panel;

	private $config;

	public function setUp() {
		parent::setUp();
		$this->config =$this->getMockBuilder('\OCP\IConfig')->getMock();
		$this->panel = new BackgroundJobs($this->config);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
		$this->assertTrue($this->panel->getPriority() > -100);
		$this->assertTrue($this->panel->getPriority() < 100);
	}

	public function testGetPanel() {
		// Enable cron
		$this->config->expects($this->once())->method('getSystemValue')->willReturn(true);
		// Set cron to 10 mins ago, ajax mode
		$this->config->expects($this->exactly(2))->method('getAppValue')->willReturn(time()-10*60, 'ajax');
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<span class="status success"></span>', $templateHtml);
	}

}
