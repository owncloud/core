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

use OCA\Encryption\Panels\Personal;

/**
 * @package OCA\Encryption\Tests\Panels
 */
class PersonalTest extends \Test\TestCase {

	/** @var Personal */
	private $panel;

	private $config;

	private $logger;

	private $userSession;

	private $userManager;

	private $session;

	private $l;

	private $encKeyStorage;

	public function setUp() {
		parent::setUp();
		$this->config = $this->getMockBuilder('\OCP\IConfig')->getMock();
		$this->logger = $this->getMockBuilder('\OCP\ILogger')->getMock();
		$this->userSession = $this->getMockBuilder('\OCP\IUserSession')->getMock();
		$this->userManager = $this->getMockBuilder('\OCP\IUserManager')->getMock();
		$this->session = $this->getMockBuilder('\OCP\ISession')->getMock();
		$this->l = $this->getMockBuilder('\OCP\IL10N')->getMock();
		$this->encKeyStorage = $this->getMockBuilder('\OCP\Encryption\Keys\IStorage')->getMock();
		$this->panel = new Personal(
			$this->logger,
			$this->userSession,
			$this->config,
			$this->l,
			$this->userManager,
			$this->session,
			$this->encKeyStorage);
	}

	public function testGetSection() {
		$this->assertEquals('encryption', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertTrue(is_integer($this->panel->getPriority()));
	}

	public function testGetPanel() {
		$mockUser = $this->getMockBuilder('\OCP\IUser')->getMock();
		$mockUser->expects($this->once())->method('getUID')->willReturn('testUser');
		$this->userSession->expects($this->once())->method('getUser')->willReturn($mockUser);
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<form id="ocDefaultEncryptionModule" class="section">', $templateHtml);
	}

}
