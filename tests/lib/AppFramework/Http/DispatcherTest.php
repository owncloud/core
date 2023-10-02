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

namespace Test\AppFramework\Http;

use OC\AppFramework\Http;
use OC\AppFramework\Http\Dispatcher;
use OC\AppFramework\Http\Request;
use OC\AppFramework\Middleware\MiddlewareDispatcher;
use OC\AppFramework\Utility\ControllerMethodReflector;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\Response;
use OCP\IRequest;
use OC\AppFramework\DependencyInjection\DIContainer;
use OCP\Security\ISecureRandom;
use OCP\IConfig;

class TestController extends Controller {
	/**
	 * @param string $appName
	 * @param IRequest $request
	 */
	public function __construct($appName, $request) {
		parent::__construct($appName, $request);
	}

	/**
	 * @param int $int
	 * @param bool $bool
	 * @param int $test
	 * @param int $test2
	 * @return array
	 */
	public function exec($int, $bool, $test=4, $test2=1): array {
		$this->registerResponder('text', function ($in) {
			return new JSONResponse(['text' => $in]);
		});
		return [$int, $bool, $test, $test2];
	}

	/**
	 * @param int $int
	 * @param bool $bool
	 * @param int $test
	 * @param int $test2
	 * @return DataResponse
	 */
	public function execDataResponse($int, $bool, $test=4, $test2=1): DataResponse {
		return new DataResponse([
			'text' => [$int, $bool, $test, $test2]
		]);
	}
}

class DispatcherTest extends \Test\TestCase {
	/** @var MiddlewareDispatcher | \PHPUnit\Framework\MockObject\MockObject */
	private $middlewareDispatcher;
	/** @var Dispatcher | \PHPUnit\Framework\MockObject\MockObject */
	private $dispatcher;
	private $controllerMethod;
	/** @var Response | \PHPUnit\Framework\MockObject\MockObject */
	private $response;
	private $request;
	private $lastModified;
	private $etag;
	/** @var Http | \PHPUnit\Framework\MockObject\MockObject */
	private $http;
	private $reflector;

	/** @var Controller | \PHPUnit\Framework\MockObject\MockObject */
	private $controller;

	protected function setUp(): void {
		parent::setUp();
		$this->controllerMethod = 'test';

		$app = $this->getMockBuilder(
			DIContainer::class
		)
			->disableOriginalConstructor()
			->getMock();
		$request = $this->getMockBuilder(
			Request::class
		)
			->disableOriginalConstructor()
			->getMock();
		$this->http = $this->getMockBuilder(
			Http::class
		)
			->disableOriginalConstructor()
			->getMock();

		$this->middlewareDispatcher = $this->getMockBuilder(
			MiddlewareDispatcher::class
		)
			->disableOriginalConstructor()
			->getMock();
		$this->controller = $this->getMockBuilder(Controller::class)
			->setMethods([$this->controllerMethod])
			->setConstructorArgs([$app, $request])
			->getMock();

		$this->request = $this->getMockBuilder(
			Request::class
		)
			->disableOriginalConstructor()
			->getMock();

		$this->reflector = new ControllerMethodReflector();

		$this->dispatcher = new Dispatcher(
			$this->http,
			$this->middlewareDispatcher,
			$this->reflector,
			$this->request
		);

		$this->response = $this->getMockBuilder(
			Response::class
		)
			->disableOriginalConstructor()
			->getMock();

		$this->lastModified = new \DateTime('now', new \DateTimeZone('GMT'));
		$this->etag = 'hi';
	}

	private function setMiddlewareExpectations(
		$out=null,
		$responseHeaders= [],
		$ex=false,
		$catchEx=true
	): void {
		if ($ex) {
			$exception = new \Exception();
			$this->middlewareDispatcher->expects($this->once())
				->method('beforeController')
				->with(
					$this->equalTo($this->controller),
					$this->equalTo($this->controllerMethod)
				)
				->will($this->throwException($exception));
			if ($catchEx) {
				$this->middlewareDispatcher->expects($this->once())
					->method('afterException')
					->with(
						$this->equalTo($this->controller),
						$this->equalTo($this->controllerMethod),
						$this->equalTo($exception)
					)
					->willReturn($this->response);
			} else {
				$this->middlewareDispatcher->expects($this->once())
					->method('afterException')
					->with(
						$this->equalTo($this->controller),
						$this->equalTo($this->controllerMethod),
						$this->equalTo($exception)
					)
					->willReturn(null);
				return;
			}
		} else {
			$this->middlewareDispatcher->expects($this->once())
				->method('beforeController')
				->with(
					$this->equalTo($this->controller),
					$this->equalTo($this->controllerMethod)
				);
			$this->controller->expects($this->once())
				->method($this->controllerMethod)
				->willReturn($this->response);
		}

		$this->response->expects($this->once())
			->method('render')
			->willReturn($out);
		$this->response->expects($this->once())
			->method('getStatus')
			->willReturn(Http::STATUS_OK);
		$this->response->expects($this->once())
			->method('getLastModified')
			->willReturn($this->lastModified);
		$this->response->expects($this->once())
			->method('getETag')
			->willReturn($this->etag);
		$this->response->expects($this->once())
			->method('getHeaders')
			->willReturn($responseHeaders);
		$this->http->expects($this->once())
			->method('getStatusHeader')
			->with(
				$this->equalTo(Http::STATUS_OK),
				$this->equalTo($this->lastModified),
				$this->equalTo($this->etag)
			)
			->willReturn('Http');

		$this->middlewareDispatcher->expects($this->once())
			->method('afterController')
			->with(
				$this->equalTo($this->controller),
				$this->equalTo($this->controllerMethod),
				$this->equalTo($this->response)
			)
			->willReturn($this->response);

		$this->middlewareDispatcher->expects($this->once())
			->method('afterController')
			->with(
				$this->equalTo($this->controller),
				$this->equalTo($this->controllerMethod),
				$this->equalTo($this->response)
			)
			->willReturn($this->response);

		$this->middlewareDispatcher->expects($this->once())
			->method('beforeOutput')
			->with(
				$this->equalTo($this->controller),
				$this->equalTo($this->controllerMethod),
				$this->equalTo($out)
			)
			->willReturn($out);
	}

	public function testDispatcherReturnsArrayWith2Entries(): void {
		$this->setMiddlewareExpectations();

		$response = $this->dispatcher->dispatch(
			$this->controller,
			$this->controllerMethod
		);
		$this->assertEquals('Http', $response[0]);
		$this->assertEquals([], $response[1]);
		$this->assertNull($response[2]);
	}

	public function testHeadersAndOutputAreReturned(): void {
		$out = 'yo';
		$httpHeaders = 'Http';
		$responseHeaders = ['hell' => 'yeah'];
		$this->setMiddlewareExpectations($out, $responseHeaders);

		$response = $this->dispatcher->dispatch(
			$this->controller,
			$this->controllerMethod
		);

		$this->assertEquals($httpHeaders, $response[0]);
		$this->assertEquals($responseHeaders, $response[1]);
		$this->assertEquals($out, $response[3]);
	}

	public function testExceptionCallsAfterException(): void {
		$out = 'yo';
		$httpHeaders = 'Http';
		$responseHeaders = ['hell' => 'yeah'];
		$this->setMiddlewareExpectations($out, $responseHeaders, true);

		$response = $this->dispatcher->dispatch(
			$this->controller,
			$this->controllerMethod
		);

		$this->assertEquals($httpHeaders, $response[0]);
		$this->assertEquals($responseHeaders, $response[1]);
		$this->assertEquals($out, $response[3]);
	}

	public function testExceptionThrowsIfCanNotBeHandledByAfterException(): void {
		$out = 'yo';
		$responseHeaders = ['hell' => 'yeah'];
		$this->setMiddlewareExpectations($out, $responseHeaders, true, false);

		$this->expectException('\Exception');
		$response = $this->dispatcher->dispatch(
			$this->controller,
			$this->controllerMethod
		);
	}

	private function dispatcherPassthrough(): void {
		$this->middlewareDispatcher->expects($this->once())
				->method('beforeController');
		$this->middlewareDispatcher->expects($this->once())
			->method('afterController')
			->willReturnCallback(function ($a, $b, $in) {
				return $in;
			});
		$this->middlewareDispatcher->expects($this->once())
			->method('beforeOutput')
			->willReturnCallback(function ($a, $b, $in) {
				return $in;
			});
	}

	public function testControllerParametersInjected(): void {
		$this->request = new Request(
			[
				'post' => [
					'int' => '3',
					'bool' => 'false'
				],
				'method' => 'POST',
			],
			$this->createMock(ISecureRandom::class),
			$this->createMock(IConfig::class)
		);
		$this->dispatcher = new Dispatcher(
			$this->http,
			$this->middlewareDispatcher,
			$this->reflector,
			$this->request
		);
		$controller = new TestController('app', $this->request);

		// reflector is supposed to be called once
		$this->dispatcherPassthrough();
		$response = $this->dispatcher->dispatch($controller, 'exec');

		$this->assertEquals('[3,true,4,1]', $response[3]);
	}

	public function testControllerParametersInjectedDefaultOverwritten(): void {
		$this->request = new Request(
			[
				'post' => [
					'int' => '3',
					'bool' => 'false',
					'test2' => 7
				],
				'method' => 'POST',
			],
			$this->createMock(ISecureRandom::class),
			$this->createMock(IConfig::class)
		);
		$this->dispatcher = new Dispatcher(
			$this->http,
			$this->middlewareDispatcher,
			$this->reflector,
			$this->request
		);
		$controller = new TestController('app', $this->request);

		// reflector is supposed to be called once
		$this->dispatcherPassthrough();
		$response = $this->dispatcher->dispatch($controller, 'exec');

		$this->assertEquals('[3,true,4,7]', $response[3]);
	}

	public function testResponseTransformedByUrlFormat(): void {
		$this->request = new Request(
			[
				'post' => [
					'int' => '3',
					'bool' => 'false'
				],
				'urlParams' => [
					'format' => 'text'
				],
				'method' => 'GET'
			],
			$this->createMock(ISecureRandom::class),
			$this->createMock(IConfig::class)
		);
		$this->dispatcher = new Dispatcher(
			$this->http,
			$this->middlewareDispatcher,
			$this->reflector,
			$this->request
		);
		$controller = new TestController('app', $this->request);

		// reflector is supposed to be called once
		$this->dispatcherPassthrough();
		$response = $this->dispatcher->dispatch($controller, 'exec');

		$this->assertEquals('{"text":[3,false,4,1]}', $response[3]);
	}

	public function testResponseTransformsDataResponse(): void {
		$this->request = new Request(
			[
				'post' => [
					'int' => '3',
					'bool' => 'false'
				],
				'urlParams' => [
					'format' => 'json'
				],
				'method' => 'GET'
			],
			$this->createMock(ISecureRandom::class),
			$this->createMock(IConfig::class)
		);
		$this->dispatcher = new Dispatcher(
			$this->http,
			$this->middlewareDispatcher,
			$this->reflector,
			$this->request
		);
		$controller = new TestController('app', $this->request);

		// reflector is supposed to be called once
		$this->dispatcherPassthrough();
		$response = $this->dispatcher->dispatch($controller, 'execDataResponse');

		$this->assertEquals('{"text":[3,false,4,1]}', $response[3]);
	}

	public function testResponseTransformedByAcceptHeader(): void {
		$this->request = new Request(
			[
				'post' => [
					'int' => '3',
					'bool' => 'false'
				],
				'server' => [
					'HTTP_ACCEPT' => 'application/text, test',
					'HTTP_CONTENT_TYPE' => 'application/x-www-form-urlencoded'
				],
				'method' => 'PUT'
			],
			$this->createMock(ISecureRandom::class),
			$this->createMock(IConfig::class)
		);
		$this->dispatcher = new Dispatcher(
			$this->http,
			$this->middlewareDispatcher,
			$this->reflector,
			$this->request
		);
		$controller = new TestController('app', $this->request);

		// reflector is supposed to be called once
		$this->dispatcherPassthrough();
		$response = $this->dispatcher->dispatch($controller, 'exec');

		$this->assertEquals('{"text":[3,false,4,1]}', $response[3]);
	}

	public function testResponsePrimarilyTransformedByParameterFormat(): void {
		$this->request = new Request(
			[
				'post' => [
					'int' => '3',
					'bool' => 'false'
				],
				'get' => [
					'format' => 'text'
				],
				'server' => [
					'HTTP_ACCEPT' => 'application/json, test'
				],
				'method' => 'POST'
			],
			$this->createMock(ISecureRandom::class),
			$this->createMock(IConfig::class)
		);
		$this->dispatcher = new Dispatcher(
			$this->http,
			$this->middlewareDispatcher,
			$this->reflector,
			$this->request
		);
		$controller = new TestController('app', $this->request);

		// reflector is supposed to be called once
		$this->dispatcherPassthrough();
		$response = $this->dispatcher->dispatch($controller, 'exec');

		$this->assertEquals('{"text":[3,true,4,1]}', $response[3]);
	}
}
