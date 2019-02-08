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
use OC\Settings\Panels\Personal\Legacy;

/**
 * @package Tests\Settings\Panels\Personal
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
		$this->helper->expects($this->once())->method('getPersonalForms')->willReturn([
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
