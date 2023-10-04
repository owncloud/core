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
use OCP\L10N\IFactory;

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
		# 		$excludedGroupsList = $this->config->getAppValue('core', 'shareapi_exclude_groups_list', '') ?? '';

		$this->config->method('getAppValue')->willReturnArgument(2);

		$this->helper = $this->getMockBuilder(Helper::class)->getMock();

		$l = $this->createMock(IL10N::class);
		$lfactory = $this->getMockBuilder(IFactory::class)->getMock();
		$lfactory->method('findAvailableLanguages')->willReturn([]);
		$lfactory->method('get')->willReturn($l);
		$this->panel = new FileSharing($this->config, $this->helper, $lfactory);
	}

	public function testGetSection() {
		$this->assertEquals('sharing', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertIsInt($this->panel->getPriority());
		$this->assertGreaterThan(-100, $this->panel->getPriority());
		$this->assertLessThan(100, $this->panel->getPriority());
	}

	public function testGetPanelEnabled() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertStringContainsString(
			'<label for="shareAPIEnabled">',
			$templateHtml
		);
	}
}
