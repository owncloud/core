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

use OC\Settings\Panels\Admin\FileSharing;
use OC\Settings\Panels\Helper;
use OCP\IConfig;
use OCP\IL10N;

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

	public function setUp(): void {
		parent::setUp();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->helper = $this->getMockBuilder(Helper::class)->getMock();
		$l10n = $this->getMockBuilder(IL10N::class)->getMock();
		$this->panel = new FileSharing($this->config, $this->helper, $l10n);
	}

	public function testGetSection() {
		$this->assertEquals('sharing', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertInternalType('int', $this->panel->getPriority());
		$this->assertGreaterThan(-100, $this->panel->getPriority());
		$this->assertLessThan(100, $this->panel->getPriority());
	}

	public function testGetPanelEnabled() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<label for="shareAPIEnabled">', $templateHtml);
	}
}
