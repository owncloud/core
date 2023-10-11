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
	private \Test\AppFramework\Middleware\ChildMiddleware $middleware;
	private \PHPUnit\Framework\MockObject\MockObject $controller;
	private \Exception $exception;
	private \PHPUnit\Framework\MockObject\MockObject $api;
	/** @var Response */
	private \PHPUnit\Framework\MockObject\MockObject $response;

	protected function setUp(): void {
		parent::setUp();

		$this->middleware = new ChildMiddleware();

		$this->api = $this->getMockBuilder(
			\OC\AppFramework\DependencyInjection\DIContainer::class
		)
				->disableOriginalConstructor()
				->getMock();

		$this->controller = $this->createMock(
			\OCP\AppFramework\Controller::class
		);
		$this->exception = new \Exception();
		$this->response = $this->createMock(\OCP\AppFramework\Http\Response::class);
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
