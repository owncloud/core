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

use OC\Settings\Panels\Admin\Legacy;
use OC\Settings\Panels\Helper;

/**
 * @package Tests\Settings\Panels\Admin
 */
class LegacyTest extends \Test\TestCase {

	/** @var Legacy */
	private $panel;
	/** @var Helper */
	private $helper;

	public function setUp() {
		parent::setUp();
		$this->helper = $this->getMockBuilder(Helper::class)->getMock();
		$this->panel = new Legacy($this->helper);
	}

	public function testGetSection() {
		$this->assertEquals('additional', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertInternalType('int', $this->panel->getPriority());
		$this->assertLessThan(50, $this->panel->getPriority());
		$this->assertGreaterThan(-50, $this->panel->getPriority());
	}

	public function testGetPanel() {
		$this->helper->expects($this->once())->method('getAdminForms')->willReturn([
			[
				'page' => 'form 1'
			],
			[
				'page' => 'form 2'
			]
		]);
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('form 1', $templateHtml);
		$this->assertContains('form 2', $templateHtml);
	}
}
