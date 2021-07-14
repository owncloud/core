<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace Tests\Core\Controller;

use OC\Core\Controller\SetupController;
use OC\Setup;
use OCP\IConfig;
use OCP\ILogger;

/**
 * Class SetupControllerTest
 *
 * @package Tests\Core\Controller
 */
class SetupControllerTest extends \PHPUnit\Framework\TestCase {
	/** @var Setup | \PHPUnit\Framework\MockObject\MockObject */
	private $setupHelper;
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var ILogger | \PHPUnit\Framework\MockObject\MockObject */
	private $logger;

	/** @var SetupController */
	private $setupController;

	public function setUp() {
		parent::setUp();
		$this->setupHelper = $this->createMock(Setup::class);
		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->setupController = new SetupController($this->setupHelper, $this->config, $this->logger);
	}

	public function testEmptyParams() {
		$post = [];
		$this->setupHelper->method('getSystemInfo')->willReturn(
			[
				'hasSQLite' => true,
				'hasMySQL' => true,
				'hasPostgreSQL' => true,
				'hasOracle' => true,
				'errors' => []
			]
		);
		$this->setupHelper->expects($this->never())->method('install');
		$this->setupController->run($post);
	}
}
