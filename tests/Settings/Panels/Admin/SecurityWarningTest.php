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

use OC\Settings\Panels\Admin\SecurityWarning;
use OC\Settings\Panels\Helper;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\IL10N;
use OCP\Lock\ILockingProvider;

/**
 * @package Tests\Settings\Panels\Admin
 */
class SecurityWarningTest extends \Test\TestCase {

	/** @var SecurityWarning */
	private $panel;
	/** @var IL10N */
	private $l;
	/** @var IConfig */
	private $config;
	/** @var IDBConnection */
	private $dbconnection;
	/** @var ILockingProvider */
	private $lockingProvider;
	/** @var Helper */
	private $helper;

	public function setUp() {
		parent::setUp();
		$this->l = $this->getMockBuilder(IL10N::class)->getMock();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->dbconnection = $this->getMockBuilder(IDBConnection::class)->getMock();
		$this->helper = $this->getMockBuilder(Helper::class)->getMock();
		$this->lockingProvider = $this->getMockBuilder(ILockingProvider::class)->getMock();
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
		$this->assertInternalType('int', $this->panel->getPriority());
		$this->assertGreaterThan(100, $this->panel->getPriority());
	}

	public function testGetPanel() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<div id="security-warning" class="section">', $templateHtml);
	}
}
