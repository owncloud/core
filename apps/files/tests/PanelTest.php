<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Files\Tests;

use OC\Settings\Panels\Helper;
use OCA\Files\Panels\Admin;
use OCP\IURLGenerator;

/**
 * @package OCA\Files\Tests
 */
class PanelTest extends \Test\TestCase {

	/** @var Admin */
	private $panel;
	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var Helper */
	private $helper;

	public function setUp() {
		parent::setUp();
		$this->urlGenerator = $this->getMockBuilder(IURLGenerator::class)->getMock();
		$this->helper = $this->getMockBuilder(Helper::class)->getMock();
		$this->panel = new Admin(
			$this->urlGenerator,
			$this->helper);
	}

	public function testGetSection() {
		$this->assertEquals('storage', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
		$this->assertTrue($this->panel->getPriority() > -100);
		$this->assertTrue($this->panel->getPriority() < 100);
	}

	public function testGetPanel() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('id="filesForm"', $templateHtml);
	}

}
