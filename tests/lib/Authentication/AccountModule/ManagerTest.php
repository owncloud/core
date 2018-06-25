<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace Test\Authentication\AccountModule;

use OC\Authentication\AccountModule\Manager;
use OCP\App\IAppManager;
use OCP\App\IServiceLoader;
use OCP\Authentication\IAccountModule;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IServerContainer;
use OCP\IUser;
use Test\TestCase;

class ManagerTest extends TestCase {

	/** @var IUser|\PHPUnit_Framework_MockObject_MockObject */
	private $user;

	/** @var IConfig|\PHPUnit_Framework_MockObject_MockObject */
	private $config;

	/** @var ILogger|\PHPUnit_Framework_MockObject_MockObject */
	private $logger;

	/** @var IServiceLoader|\PHPUnit_Framework_MockObject_MockObject */
	private $serviceLoader;

	/** @var Manager */
	private $manager;

	protected function setUp() {
		parent::setUp();

		$this->user = $this->createMock(IUser::class);
		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->serviceLoader = $this->createMock(IServiceLoader::class);

		$this->manager = new Manager(
			$this->config,
			$this->logger,
			$this->serviceLoader
		);
	}

	public function testGetAccountModules() {
		$fakeModule = $this->createMock(IAccountModule::class);
		\OC::$server->registerService('\OCA\AccountModuleApp\Module', function () use ($fakeModule) {
			return $fakeModule;
		});

		$this->config->method('getAppValue')
		->with('core', 'account-module-order', '[]')
		->willReturn('[]');

		$this->serviceLoader->expects($this->once())
			->method('load')
			->with(['account-modules'], $this->user)
			->will($this->returnValue([$fakeModule]));

		$modules = $this->manager->getAccountModules($this->user);

		self::assertCount(1, $modules);
		self::assertSame($fakeModule, $modules[0]);
	}
}
