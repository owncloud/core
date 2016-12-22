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

use OC\Settings\Panels\Admin\SecurityWarning;

/**
 * @package Tests\Settings\Panels\Admin
 */
class SecurityWarningTest extends \Test\TestCase {

	/** @var \OC\Settings\Panels\Admin\SecurityWarning */
	private $panel;

	private $l;

	private $config;

	private $dbconnection;

	private $lockingProvider;

	private $helper;

	public function setUp() {
		parent::setUp();
		$this->l = $this->getMockBuilder('\OCP\IL10N')->getMock();
		$this->config = $this->getMockBuilder('\OCP\IConfig')->getMock();
		$this->dbconnection = $this->getMockBuilder('\OCP\IDBConnection')->getMock();
		$this->helper = $this->getMockBuilder('\OC\Settings\Panels\Helper')->getMock();
		$this->lockingProvider = $this->getMockBuilder('\OCP\Lock\ILockingProvider')->getMock();
		$this->panel = new SecurityWarning(
			$this->l,
			$this->config,
			$this->dbconnection,
			$this->helper,
			$this->lockingProvider);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
		$this->assertTrue($this->panel->getPriority() > 100);
	}

	public function testGetPanel() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<div id="security-warning" class="section">', $templateHtml);
	}

}
