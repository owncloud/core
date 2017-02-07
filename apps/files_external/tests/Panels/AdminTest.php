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

use OC\Encryption\Manager;
use OC\Settings\Panels\Helper;
use OCA\Files_External\Panels\Admin;
use OCP\Files\External\IStoragesBackendService;
use OCP\Files\External\Service\IGlobalStoragesService;

/**
 * @package OCA\Files_External\Tests
 */
class AdminTest extends \Test\TestCase {

	/** @var Admin */
	private $panel;
	/** @var IStoragesBackendService */
	private $backendService;
	/** @var IGlobalStoragesService */
	private $storagesService;
	/** @var Manager */
	private $encManager;
	/** @var Helper  */
	private $helper;

	public function setUp() {
		parent::setUp();
		$this->backendService = $this->createMock(IStoragesBackendService::class);
		$this->storagesService = $this->createMock(IGlobalStoragesService::class);
		$this->encManager = $this->getMockBuilder(Manager::class)->disableOriginalConstructor()->getMock();
		$this->helper = $this->getMockBuilder(Helper::class)->getMock();
		$this->panel = new Admin(
			$this->storagesService,
			$this->backendService,
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
