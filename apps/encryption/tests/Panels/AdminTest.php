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
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\ISession;
use OCP\IUserManager;
use OCP\IUserSession;

/**
 * @package OCA\Encryption\Tests\Panels
 */
class AdminTest extends \Test\TestCase {

	/** @var Admin */
	private $panel;
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var IUserSession */
	private $userSession;
	/** @var IUserManager */
	private $userManager;
	/** @var ISession */
	private $session;
	/** @var IL10N */
	private $l;

	public function setUp() {
		parent::setUp();
		$this->config = $this->getMockBuilder(IConfig::class)->getMock();
		$this->logger = $this->getMockBuilder(ILogger::class)->getMock();
		$this->userSession = $this->getMockBuilder(IUserSession::class)->getMock();
		$this->userManager = $this->getMockBuilder(IUserManager::class)->getMock();
		$this->session = $this->getMockBuilder(ISession::class)->getMock();
		$this->l = $this->getMockBuilder(IL10N::class)->getMock();
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
