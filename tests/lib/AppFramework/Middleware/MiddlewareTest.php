<?php

/**
 * ownCloud - App Framework
 *
 * @author Bernhard Posselt
 * @copyright Copyright (c) 2012 Bernhard Posselt <dev@bernhard-posselt.com>
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

namespace Test\AppFramework\Middleware;

use OC\AppFramework\Http\Request;
use OCP\AppFramework\Http\Response;
use OCP\AppFramework\Middleware;

class ChildMiddleware extends Middleware {
};

class MiddlewareTest extends \Test\TestCase {
	/**
	 * @var Middleware
	 */
	private $middleware;
	private $controller;
	private $exception;
	private $api;
	/** @var Response */
	private $response;

	protected function setUp(): void {
		parent::setUp();

		$this->middleware = new ChildMiddleware();

		$this->api = $this->getMockBuilder(
			'OC\AppFramework\DependencyInjection\DIContainer'
		)
				->disableOriginalConstructor()
				->getMock();

		$this->controller = $this->createMock(
			'OCP\AppFramework\Controller',
			[],
			[
				$this->api,
				new Request(
					[],
					$this->createMock('\OCP\Security\ISecureRandom'),
					$this->createMock('\OCP\IConfig')
				)
			]
		);
		$this->exception = new \Exception();
		$this->response = $this->createMock('OCP\AppFramework\Http\Response');
	}

	public function testBeforeController() {
		$this->middleware->beforeController($this->controller, null);
		$this->assertNull(null);
	}

	public function testAfterExceptionRaiseAgainWhenUnhandled() {
		$this->expectException('Exception');
		$afterEx = $this->middleware->afterException($this->controller, null, $this->exception);
	}

	public function testAfterControllerReturnResponseWhenUnhandled() {
		$response = $this->middleware->afterController($this->controller, null, $this->response);

		$this->assertEquals($this->response, $response);
	}

	public function testBeforeOutputReturnOutputThenUnhandled() {
		$output = $this->middleware->beforeOutput($this->controller, null, 'test');

		$this->assertEquals('test', $output);
	}
}
