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

use OC\Settings\Panels\Admin\Mail;

/**
 * @package Tests\Settings\Panels\Admin
 */
class MailTest extends \Test\TestCase {

	/** @var \OC\Settings\Panels\Admin\Mail */
	private $panel;

	private $config;

	private $helper;

	public function setUp() {
		parent::setUp();
		$this->config = $this->getMockBuilder('\OCP\IConfig')->getMock();
		$this->helper = $this->getMockBuilder('\OC\Settings\Panels\Helper')->getMock();
		$this->panel = new Mail($this->config, $this->helper);
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
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<form id="mail_general_settings_form"', $templateHtml);
	}

}
