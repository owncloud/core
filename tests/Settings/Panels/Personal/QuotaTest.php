<?php
/**
 * @author Tom Needham
 * @copyright Copyright (c) 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Panels\Personal;

use OC\Settings\Panels\Helper;
use OC\Settings\Panels\Personal\Quota;

/**
 * @package Tests\Settings\Panels
 */
class QuotaTest extends \Test\TestCase {

	/** @var Quota */
	private $panel;
	/** @var Helper */
	private $helper;

	public function setUp(): void {
		parent::setUp();
		$this->helper = $this->getMockBuilder(Helper::class)->getMock();
		$this->panel = new Quota($this->helper);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertInternalType('int', $this->panel->getPriority());
		$this->assertGreaterThan(0, $this->panel->getPriority());
	}

	public function testGetPanel() {
		$this->helper->expects($this->once())->method('getStorageInfo')->will($this->returnValue([
			'used' => 100,
			'total' => 2000,
			'relative' => 0.12,
			'quota' => 1000
		]));
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<div id="quota"', $templateHtml);
		$this->assertContains('You are using', $templateHtml);
	}
}
