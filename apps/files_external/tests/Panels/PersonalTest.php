<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OCA\Files_External\Tests\Panels;

use OC\Encryption\Manager;
use OCA\Files_External\Panels\Personal;
use OCP\Files\External\IStoragesBackendService;
use OCP\Files\External\Service\IUserStoragesService;
use OCP\IConfig;

/**
 * @package OCA\Files_External\Tests
 */
class PersonalTest extends \Test\TestCase {
	/** @var Personal */
	private $panel;
	/** @var IStoragesBackendService */
	private $backendService;
	/** @var IUserStoragesService */
	private $storagesService;
	/** @var IConfig */
	private $config;
	/** @var Manager */
	private $encManager;

	public function setUp(): void {
		parent::setUp();
		$this->backendService = $this->createMock(IStoragesBackendService::class);
		$this->storagesService = $this->createMock(IUserStoragesService::class);
		$this->config = $this->createMock(IConfig::class);
		$this->encManager = $this->createMock(Manager::class);
		$this->panel = new Personal(
			$this->backendService,
			$this->storagesService,
			$this->config,
			$this->encManager
		);
	}

	public function testGetSection() {
		$this->assertEquals('storage', $this->panel->getSectionID());
	}

	public function testGetPriority() {
		$this->assertIsInt($this->panel->getPriority());
		$this->assertTrue($this->panel->getPriority() > -100);
		$this->assertTrue($this->panel->getPriority() < 100);
	}

	public function testGetPanel() {
		$this->backendService->expects($this->once())->method('getAuthMechanisms')->willReturn([]);
		$this->backendService->expects($this->once())->method('getBackends')->willReturn([]);
		$this->backendService->expects($this->once())->method('getAvailableBackends')->willReturn([]);
		$templateHtml = $this->panel->getPanel()->fetchPage();
		$this->assertStringContainsString('<h2 class="app-name">External Storage</h2>', $templateHtml);
	}
}
