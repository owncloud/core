<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
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

namespace Tests\Settings\Controller;

use OC\Settings\Controller\AppSettingsController;
use OCP\App\IAppManager;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IRequest;
use Test\TestCase;

/**
 * Class AppSettingsControllerTest
 *
 * @package Tests\Settings\Controller
 */
class AppSettingsControllerTest extends TestCase {
	/** @var AppSettingsController */
	private $appSettingsController;
	/** @var IRequest */
	private $request;
	/** @var IL10N */
	private $l10n;
	/** @var IConfig */
	private $config;
	/** @var IAppManager */
	private $appManager;

	public function setUp(): void {
		parent::setUp();

		$this->request = $this->getMockBuilder(IRequest::class)
			->disableOriginalConstructor()->getMock();
		$this->l10n = $this->getMockBuilder(IL10N::class)
			->disableOriginalConstructor()->getMock();
		$this->l10n->expects($this->any())
			->method('t')
			->will($this->returnArgument(0));
		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()->getMock();
		$this->appManager = $this->getMockBuilder(IAppManager::class)
			->disableOriginalConstructor()->getMock();

		$this->config->method('getSystemValue')->willReturnArgument(1);
		$this->appSettingsController = new AppSettingsController(
			'settings',
			$this->request,
			$this->l10n,
			$this->config,
			$this->appManager
		);
	}

	public function test() {
		$apps = $this->appSettingsController->listApps('enabled');
		$this->assertArrayHasKey('apps', $apps);
		$this->assertArrayHasKey('status', $apps);
		$apps = $this->appSettingsController->listApps('disabled');
		$this->assertArrayHasKey('apps', $apps);
		$this->assertArrayHasKey('status', $apps);
	}
}
