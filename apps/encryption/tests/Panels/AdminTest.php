<?php
/**
 * @author Tom Needham
 * @copyright 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Encryption\Tests\Panels;

use OCA\Encryption\Panels\Admin;

/**
 * @package OCA\Encryption\Tests\Panels
 */
class AdminTest extends \Test\TestCase {

	/** @var Admin */
	private $panel;

	private $config;

	private $logger;

	private $userSession;

	private $userManager;

	private $session;

	private $l;

	public function setUp() {
		parent::setUp();
		$this->config = $this->getMockBuilder('\OCP\IConfig')->getMock();
		$this->logger = $this->getMockBuilder('\OCP\ILogger')->getMock();
		$this->userSession = $this->getMockBuilder('\OCP\IUserSession')->getMock();
		$this->userManager = $this->getMockBuilder('\OCP\IUserManager')->getMock();
		$this->session = $this->getMockBuilder('\OCP\ISession')->getMock();
		$this->l = $this->getMockBuilder('\OCP\IL10N')->getMock();
		$this->panel = new Admin(
			$this->config,
			$this->logger,
			$this->userSession,
			$this->userManager,
			$this->session,
			$this->l);
	}

	public function testGetSection() {
		$this->assertEquals('encryption', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
	}

	public function testGetPanel() {
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<form id="ocDefaultEncryptionModule" class="sub-section">', $templateHtml);
	}

}
