<?php
/**
 * ownCloud - App Framework
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @copyright Bernhard Posselt 2014
 */

namespace Test\AppFramework\Middleware\Security;

use OC\AppFramework\Http\Request;
use OC\AppFramework\Middleware\Security\CORSMiddleware;
use OC\AppFramework\Middleware\Security\Exceptions\SecurityException;
use OC\AppFramework\Utility\ControllerMethodReflector;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\Response;
use OCP\IConfig;
use OCP\IUser;
use OCP\IUserSession;

/**
 * Class CORSMiddlewareTest
 */
class CORSMiddlewareTest extends \Test\TestCase {
	private $reflector;
	private $session;

	protected function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->config->method('getUserValue')->willReturn('["http:\/\/www.test.com"]');
		$this->config->method('setUserValue')->willReturn(true);

		$this->reflector = new ControllerMethodReflector();

		$this->session = $this->getMockBuilder('\OC\User\Session')
			->disableOriginalConstructor()
			->getMock();

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('user');
		$userSession = $this->createMock(IUserSession::class);
		$userSession->method('getUser')->willReturn($user);

		$this->fakeSession = $userSession;
	}

	/**
	 * @CORS
	 */
	public function testSetCORSAPIHeader() {
		$request = new Request(
			[
				'server' => [
					'HTTP_ORIGIN' => 'http://www.test.com'
				]
			],
			$this->createMock('\OCP\Security\ISecureRandom'),
			$this->config
		);

		$this->reflector->reflect($this, __FUNCTION__);
		$middleware = new CORSMiddleware(
			$request,
			$this->reflector,
			$this->fakeSession,
			$this->config
		);

		$response = $middleware->afterController($this, __FUNCTION__, new Response());
		$headers = $response->getHeaders();
		$this->assertEquals('http://www.test.com', $headers['Access-Control-Allow-Origin']);
	}

	public function testNoAnnotationNoCORSHEADER() {
		$request = new Request(
			[
				'server' => [
					'HTTP_ORIGIN' => 'test'
				]
			],
			$this->createMock('\OCP\Security\ISecureRandom'),
			$this->createMock('\OCP\IConfig')
		);
		$middleware = new CORSMiddleware(
			$request,
			$this->reflector,
			$this->fakeSession,
			$this->config
		);

		$response = $middleware->afterController($this, __FUNCTION__, new Response());
		$headers = $response->getHeaders();
		$this->assertArrayNotHasKey('Access-Control-Allow-Origin', $headers);
	}

	/**
	 * @CORS
	 */
	public function testNoOriginHeaderNoCORSHEADER() {
		$request = new Request(
			[],
			$this->createMock('\OCP\Security\ISecureRandom'),
			$this->createMock('\OCP\IConfig')
		);
		$this->reflector->reflect($this, __FUNCTION__);
		$middleware = new CORSMiddleware(
			$request,
			$this->reflector,
			$this->fakeSession,
			$this->config
		);

		$response = $middleware->afterController($this, __FUNCTION__, new Response());
		$headers = $response->getHeaders();
		$this->assertArrayNotHasKey('Access-Control-Allow-Origin', $headers);
	}

	/**
	 * @CORS
	 * @expectedException \OC\AppFramework\Middleware\Security\Exceptions\SecurityException
	 */
	public function testCorsIgnoredIfWithCredentialsHeaderPresent() {
		$request = new Request(
			[
				'server' => [
					'HTTP_ORIGIN' => 'http://www.test.com',
				]
			],
			$this->createMock('\OCP\Security\ISecureRandom'),
			$this->createMock('\OCP\IConfig')
		);
		$this->reflector->reflect($this, __FUNCTION__);
		$middleware = new CORSMiddleware(
			$request,
			$this->reflector,
			$this->fakeSession,
			$this->config
		);

		$response = new Response();
		$response->addHeader('AcCess-control-Allow-Credentials ', 'TRUE');
		$middleware->afterController($this, __FUNCTION__, $response);
	}

	public function testAfterExceptionWithSecurityExceptionNoStatus() {
		$request = new Request(
			['server' => [
				'PHP_AUTH_USER' => 'user',
				'PHP_AUTH_PW' => 'pass'
			]],
			$this->createMock('\OCP\Security\ISecureRandom'),
			$this->createMock('\OCP\IConfig')
		);
		$middleware = new CORSMiddleware(
			$request,
			$this->reflector,
			$this->fakeSession,
			$this->config
		);
		$response = $middleware->afterException($this, __FUNCTION__, new SecurityException('A security exception'));

		$expected = new JSONResponse(['message' => 'A security exception'], 500);
		$this->assertEquals($expected, $response);
	}

	public function testAfterExceptionWithSecurityExceptionWithStatus() {
		$request = new Request(
			['server' => [
				'PHP_AUTH_USER' => 'user',
				'PHP_AUTH_PW' => 'pass'
			]],
			$this->createMock('\OCP\Security\ISecureRandom'),
			$this->createMock('\OCP\IConfig')
		);
		$middleware = new CORSMiddleware(
			$request,
			$this->reflector,
			$this->fakeSession,
			$this->config
		);
		$response = $middleware->afterException($this, __FUNCTION__, new SecurityException('A security exception', 501));

		$expected = new JSONResponse(['message' => 'A security exception'], 501);
		$this->assertEquals($expected, $response);
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage A regular exception
	 */
	public function testAfterExceptionWithRegularException() {
		$request = new Request(
			['server' => [
				'PHP_AUTH_USER' => 'user',
				'PHP_AUTH_PW' => 'pass'
			]],
			$this->createMock('\OCP\Security\ISecureRandom'),
			$this->createMock('\OCP\IConfig')
		);
		$middleware = new CORSMiddleware(
			$request,
			$this->reflector,
			$this->fakeSession,
			$this->config
		);
		$middleware->afterException($this, __FUNCTION__, new \Exception('A regular exception'));
	}
}
