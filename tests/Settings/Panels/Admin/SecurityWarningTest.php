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
	private \OC\Settings\Panels\Admin\SecurityWarning $panel;
	/** @var IL10N */
	private \PHPUnit\Framework\MockObject\MockObject $l;
	/** @var IConfig */
	private \PHPUnit\Framework\MockObject\MockObject $config;
	/** @var IDBConnection */
	private \PHPUnit\Framework\MockObject\MockObject $dbconnection;
	/** @var ILockingProvider */
	private \PHPUnit\Framework\MockObject\MockObject $lockingProvider;
	/** @var Helper */
	private \PHPUnit\Framework\MockObject\MockObject $helper;

	public function setUp(): void {
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
			$this->lockingProvider
		);
	}

	public function testGetSection() {
		$this->assertEquals('general', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertIsInt($this->panel->getPriority());
		$this->assertGreaterThan(100, $this->panel->getPriority());
	}

	public function testGetPanel() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertStringContainsString(
			'<div id="security-warning" class="section">',
			$templateHtml
		);
	}
}
