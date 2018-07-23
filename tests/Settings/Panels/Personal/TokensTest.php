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

use OC\Settings\Panels\Personal\Tokens;

/**
 * @package Tests\Settings\Panels\Personal
 */
class TokensTest extends \Test\TestCase {

	/** @var Tokens */
	private $panel;

	public function setUp() {
		parent::setUp();
		$this->panel = new Tokens;
	}

	public function testGetSection() {
		$this->assertEquals('security', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertInternalType('int', $this->panel->getPriority());
		$this->assertGreaterThan(-100, $this->panel->getPriority());
		$this->assertLessThan(100, $this->panel->getPriority());
	}

	public function testGetPanel() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('id="sessions"', $templateHtml);
	}
}
