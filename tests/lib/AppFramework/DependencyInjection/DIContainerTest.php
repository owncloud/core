<?php

/**
 * ownCloud - App Framework
 *
 * @author Bernhard Posselt
 * @author Morris Jobke
 * @copyright Copyright (c) 2012 Bernhard Posselt <dev@bernhard-posselt.com>
 * @copyright Copyright (c) 2013 Morris Jobke <morris.jobke@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace Test\AppFramework\DependencyInjection;

use OC\AppFramework\Http\Request;

class DIContainerTest extends \Test\TestCase {
	private $container;

	protected function setUp(): void {
		parent::setUp();
		$this->container = $this->getMockBuilder('OC\AppFramework\DependencyInjection\DIContainer')
			->setMethods(['isAdminUser'])
			->setConstructorArgs(['name'])
			->getMock();
	}

	public function testProvidesRequest() {
		$this->assertArrayHasKey('Request', $this->container);
	}

	public function testProvidesSecurityMiddleware() {
		$this->assertArrayHasKey('SecurityMiddleware', $this->container);
	}

	public function testProvidesMiddlewareDispatcher() {
		$this->assertArrayHasKey('MiddlewareDispatcher', $this->container);
	}

	public function testProvidesAppName() {
		$this->assertArrayHasKey('AppName', $this->container);
	}

	public function testAppNameIsSetCorrectly() {
		$this->assertEquals('name', $this->container['AppName']);
	}

	public function testMiddlewareDispatcherIncludesSecurityMiddleware() {
		$this->container['Request'] = new Request(
			['method' => 'GET'],
			$this->createMock('\OCP\Security\ISecureRandom'),
			$this->createMock('\OCP\IConfig')
		);
		$security = $this->container['SecurityMiddleware'];
		$dispatcher = $this->container['MiddlewareDispatcher'];

		$this->assertContains($security, $dispatcher->getMiddlewares());
	}
}
