<?php
/**
 * @author Tom Needham
 * @copyright 2016 Tom Needham tom@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_External\Tests\Panels;

use OCA\Files_External\Panels\Personal;
use OCP\Files\External\IStoragesBackendService;
use OCP\Files\External\Service\IGlobalStoragesService;
use OCP\Files\External\Service\IUserGlobalStoragesService;
use OCP\Files\External\Service\IUserStoragesService;

/**
 * @package OCA\Files_External\Tests
 */
class PersonalTest extends \Test\TestCase {

	/** @var \OCA\Files_External\Panels\Personal */
	private $panel;

	private $backendService;

	private $storagesService;

	private $encManager;

	private $helper;

	public function setUp() {
		parent::setUp();
		$this->backendService = $this->createMock(IStoragesBackendService::class);
		$this->storagesService = $this->createMock(IUserStoragesService::class);
		$this->encManager = $this->getMockBuilder(
			'\OC\Encryption\Manager')->disableOriginalConstructor()->getMock();
		$this->helper = $this->getMockBuilder('\OC\Settings\Panels\Helper')->getMock();
		$this->panel = new Personal(
			$this->backendService,
			$this->storagesService,
			$this->encManager,
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
		$this->backendService->expects($this->once())->method('getAuthMechanisms')->willReturn([]);
		$this->backendService->expects($this->once())->method('getBackends')->willReturn([]);
		$this->backendService->expects($this->once())->method('getAvailableBackends')->willReturn([]);
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertContains('<h2 class="app-name">External Storage</h2>', $templateHtml);
	}

}
