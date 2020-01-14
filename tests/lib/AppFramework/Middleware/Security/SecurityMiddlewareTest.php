<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
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

namespace Test\AppFramework\Middleware\Security;

use OC\AppFramework\Http;
use OC\AppFramework\Http\Request;
use OC\AppFramework\Middleware\Security\Exceptions\AppNotEnabledException;
use OC\AppFramework\Middleware\Security\Exceptions\CrossSiteRequestForgeryException;
use OC\AppFramework\Middleware\Security\Exceptions\NotAdminException;
use OC\AppFramework\Middleware\Security\Exceptions\NotLoggedInException;
use OC\AppFramework\Middleware\Security\Exceptions\SecurityException;
use OC\AppFramework\Middleware\Security\SecurityMiddleware;
use OC\AppFramework\Utility\ControllerMethodReflector;
use OC\Core\Controller\LoginController;
use OC\Security\CSP\ContentSecurityPolicy;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\OCSController;
use OCP\ISession;
use OCP\AppFramework\Controller;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;
use OCP\AppFramework\Http\Response;
use OCP\IConfig;
use OCP\Security\ISecureRandom;
use OC\Security\CSP\ContentSecurityPolicyManager;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\INavigationManager;
use OCP\ILogger;

class SecurityMiddlewareTest extends TestCase {

	/** @var SecurityMiddleware */
	private $middleware;
	/** @var Controller | MockObject */
	private $controller;
	private $secException;
	private $secAjaxException;
	/** @var IRequest | MockObject */
	private $request;
	/** @var ControllerMethodReflector | MockObject */
	private $reader;
	/** @var ILogger | MockObject */
	private $logger;
	/** @var INavigationManager | MockObject */
	private $navigationManager;
	/** @var IURLGenerator | MockObject */
	private $urlGenerator;
	/** @var ContentSecurityPolicyManager | MockObject */
	private $contentSecurityPolicyManager;
	/** @var IUserSession | MockObject */
	private $session;

	protected function setUp(): void {
		parent::setUp();

		$this->controller = $this->getMockBuilder(Controller::class)
			->disableOriginalConstructor()
				->getMock();
		$this->reader = new ControllerMethodReflector();
		$this->logger = $this->getMockBuilder(
			ILogger::class)
				->disableOriginalConstructor()
				->getMock();
		$this->navigationManager = $this->getMockBuilder(
			INavigationManager::class)
				->disableOriginalConstructor()
				->getMock();
		$this->urlGenerator = $this->getMockBuilder(
			IURLGenerator::class)
				->disableOriginalConstructor()
				->getMock();
		$this->request = $this->getMockBuilder(
			IRequest::class)
				->disableOriginalConstructor()
				->getMock();
		$this->contentSecurityPolicyManager = $this->getMockBuilder(
			ContentSecurityPolicyManager::class)
				->disableOriginalConstructor()
				->getMock();
		$this->middleware = $this->getMiddleware(true, true);
		$this->secException = new SecurityException('hey', false);
		$this->secAjaxException = new SecurityException('hey', true);
	}

	/**
	 * @param bool $isLoggedIn
	 * @param bool $isAdminUser
	 * @return SecurityMiddleware
	 */
	private function getMiddleware($isLoggedIn, $isAdminUser): SecurityMiddleware {
		$this->session = $this->createMock(IUserSession::class);
		$this->session->method('isLoggedIn')->willReturn($isLoggedIn);
		return new SecurityMiddleware(
			$this->request,
			$this->reader,
			$this->navigationManager,
			$this->urlGenerator,
			$this->logger,
			$this->session,
			'files',
			$isAdminUser,
			$this->contentSecurityPolicyManager
		);
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 * @throws SecurityException
	 * @throws \ReflectionException
	 */
	public function testSetNavigationEntry(): void {
		$this->navigationManager->expects($this->once())
			->method('setActiveEntry')
			->with($this->equalTo('files'));

		$this->reader->reflect(__CLASS__, __FUNCTION__);
		$this->middleware->beforeController(__CLASS__, __FUNCTION__);
	}

	/**
	 * @param string $method
	 * @param string $test
	 * @param $status
	 * @throws \ReflectionException
	 */
	private function ajaxExceptionStatus($method, $test, $status): void {
		$isLoggedIn = false;
		$isAdminUser = false;

		// isAdminUser requires isLoggedIn call to return true
		if ($test === 'isAdminUser') {
			$isLoggedIn = true;
		}

		$sec = $this->getMiddleware($isLoggedIn, $isAdminUser);

		try {
			$this->reader->reflect(__CLASS__, $method);
			$sec->beforeController(__CLASS__, $method);
		} catch (SecurityException $ex) {
			$this->assertEquals($status, $ex->getCode());
		}

		// add assertion if everything should work fine otherwise phpunit will
		// complain
		if ($status === 0) {
			$this->assertTrue(true);
		}
	}

	/**
	 * @throws \ReflectionException
	 */
	public function testAjaxStatusLoggedInCheck(): void {
		$this->ajaxExceptionStatus(
			__FUNCTION__,
			'isLoggedIn',
			Http::STATUS_UNAUTHORIZED
		);
	}

	/**
	 * @NoCSRFRequired
	 * @throws \ReflectionException
	 */
	public function testAjaxNotAdminCheck(): void {
		$this->ajaxExceptionStatus(
			__FUNCTION__,
			'isAdminUser',
			Http::STATUS_FORBIDDEN
		);
	}

	/**
	 * @PublicPage
	 * @throws \ReflectionException
	 */
	public function testAjaxStatusCSRFCheck(): void {
		$this->ajaxExceptionStatus(
			__FUNCTION__,
			'passesCSRFCheck',
			Http::STATUS_PRECONDITION_FAILED
		);
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 * @throws \ReflectionException
	 * @throws \ReflectionException
	 * @throws \ReflectionException
	 * @throws \ReflectionException
	 */
	public function testAjaxStatusAllGood(): void {
		$this->ajaxExceptionStatus(
			__FUNCTION__,
			'isLoggedIn',
			0
		);
		$this->ajaxExceptionStatus(
			__FUNCTION__,
			'isAdminUser',
			0
		);
		$this->ajaxExceptionStatus(
			__FUNCTION__,
			'isSubAdminUser',
			0
		);
		$this->ajaxExceptionStatus(
			__FUNCTION__,
			'passesCSRFCheck',
			0
		);
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 * @throws SecurityException
	 * @throws \ReflectionException
	 */
	public function testNoChecks(): void {
		$this->request->expects($this->never())
				->method('passesCSRFCheck')
				->willReturn(false);

		$sec = $this->getMiddleware(false, false);

		$this->reader->reflect(__CLASS__, __FUNCTION__);
		$sec->beforeController(__CLASS__, __FUNCTION__);
	}

	/**
	 * @param string $method
	 * @param string $expects
	 * @param bool $shouldFail
	 * @throws SecurityException
	 * @throws \ReflectionException
	 */
	private function securityCheck($method, $expects, $shouldFail=false): void {
		// admin check requires login
		if ($expects === 'isAdminUser') {
			$isLoggedIn = true;
			$isAdminUser = !$shouldFail;
		} else {
			$isLoggedIn = !$shouldFail;
			$isAdminUser = false;
		}

		$sec = $this->getMiddleware($isLoggedIn, $isAdminUser);

		if ($shouldFail) {
			$this->expectException(SecurityException::class);
		} else {
			$this->assertTrue(true);
		}

		$this->reader->reflect(__CLASS__, $method);
		$sec->beforeController(__CLASS__, $method);
	}

	/**
	 * @PublicPage
	 * @throws SecurityException
	 * @throws \ReflectionException
	 */
	public function testCsrfCheck(): void {
		$this->expectException(CrossSiteRequestForgeryException::class);

		$this->request->expects($this->once())
			->method('passesCSRFCheck')
			->willReturn(false);

		$this->reader->reflect(__CLASS__, __FUNCTION__);
		$this->middleware->beforeController(__CLASS__, __FUNCTION__);
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 * @throws SecurityException
	 * @throws \ReflectionException
	 */
	public function testNoCsrfCheck(): void {
		$this->request->expects($this->never())
			->method('passesCSRFCheck')
			->willReturn(false);

		$this->reader->reflect(__CLASS__, __FUNCTION__);
		$this->middleware->beforeController(__CLASS__, __FUNCTION__);
	}

	/**
	 * @PublicPage
	 * @throws SecurityException
	 * @throws \ReflectionException
	 */
	public function testFailCsrfCheck(): void {
		$this->request->expects($this->once())
			->method('passesCSRFCheck')
			->willReturn(true);

		$this->reader->reflect(__CLASS__, __FUNCTION__);
		$this->middleware->beforeController(__CLASS__, __FUNCTION__);
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @throws SecurityException
	 * @throws \ReflectionException
	 */
	public function testLoggedInCheck(): void {
		$this->securityCheck(__FUNCTION__, 'isLoggedIn');
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @throws SecurityException
	 * @throws \ReflectionException
	 */
	public function testFailLoggedInCheck(): void {
		$this->securityCheck(__FUNCTION__, 'isLoggedIn', true);
	}

	/**
	 * @NoCSRFRequired
	 * @throws SecurityException
	 * @throws \ReflectionException
	 */
	public function testIsAdminCheck(): void {
		$this->securityCheck(__FUNCTION__, 'isAdminUser');
	}

	/**
	 * @NoCSRFRequired
	 * @throws SecurityException
	 * @throws \ReflectionException
	 */
	public function testFailIsAdminCheck(): void {
		$this->securityCheck(__FUNCTION__, 'isAdminUser', true);
	}

	/**
	 * @throws \Exception
	 */
	public function testAfterExceptionNotCaughtThrowsItAgain(): void {
		$ex = new \Exception();
		$this->expectException(\Exception::class);
		$this->middleware->afterException($this->controller, 'test', $ex);
	}

	/**
	 * @throws \Exception
	 */
	public function testAfterExceptionReturnsRedirectForNotLoggedInUser(): void {
		$this->request = new Request(
				[
						'server' =>
								[
										'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
										'REQUEST_URI' => 'owncloud/index.php/apps/specialapp'
								]
				],
				$this->createMock(ISecureRandom::class),
				$this->createMock(IConfig::class)
		);
		$this->middleware = $this->getMiddleware(false, false);
		$this->urlGenerator
				->expects($this->once())
				->method('linkToRoute')
				->with(
					'core.login.showLoginForm',
					[
						'redirect_url' => 'owncloud%2Findex.php%2Fapps%2Fspecialapp',
					]
				)
				->willReturn('http://localhost/index.php/login?redirect_url=owncloud%2Findex.php%2Fapps%2Fspecialapp');
		$this->logger
				->expects($this->once())
				->method('debug')
				->with('Current user is not logged in');
		$response = $this->middleware->afterException(
				$this->controller,
				'test',
				new NotLoggedInException()
		);

		$expected = new RedirectResponse('http://localhost/index.php/login?redirect_url=owncloud%2Findex.php%2Fapps%2Fspecialapp');
		$this->assertEquals($expected, $response);
	}

	/**
	 * @return array
	 */
	public function exceptionProvider(): array {
		return [
			[
				new AppNotEnabledException(),
			],
			[
				new CrossSiteRequestForgeryException(),
			],
			[
				new NotAdminException(),
			],
		];
	}

	/**
	 * @dataProvider exceptionProvider
	 * @param SecurityException $exception
	 * @throws \Exception
	 */
	public function testAfterExceptionReturnsTemplateResponse(SecurityException $exception): void {
		$this->request = new Request(
				[
						'server' =>
								[
										'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
										'REQUEST_URI' => 'owncloud/index.php/apps/specialapp'
								]
				],
				$this->createMock(ISecureRandom::class),
				$this->createMock(IConfig::class)
		);
		$this->middleware = $this->getMiddleware(false, false);
		$this->logger
				->expects($this->once())
				->method('debug')
				->with($exception->getMessage());
		$response = $this->middleware->afterException(
				$this->controller,
				'test',
				$exception
		);

		$expected = new TemplateResponse('core', '403', ['file' => $exception->getMessage()], 'guest');
		$expected->setStatus($exception->getCode());
		$this->assertEquals($expected, $response);
	}

	/**
	 * Test that redirect to login page takes place
	 * when not logged in user uses a private permalink
	 * and any content-type is accepted by client
	 *
	 * @throws \Exception
	 */
	public function testAfterExceptionReturnsLoginPageForAnyContentType(): void {
		$this->request = new Request(
			[
				'server' =>
					[
						'HTTP_ACCEPT' => '*/*',
						'REQUEST_URI' => 'owncloud/index.php/f/42'
					]
			],
			$this->createMock(ISecureRandom::class),
			$this->createMock(IConfig::class)
		);

		$exception = new NotLoggedInException();
		$this->controller = $this->getMockBuilder(LoginController::class)
			->disableOriginalConstructor()
			->getMock();

		$this->middleware = $this->getMiddleware(false, false);

		$this->logger
			->expects($this->once())
			->method('debug')
			->with($exception->getMessage());

		$response = $this->middleware->afterException(
			$this->controller,
			'showFile',
			$exception
		);

		$this->assertInstanceOf(RedirectResponse::class, $response);
	}

	/**
	 * @throws \Exception
	 */
	public function testAfterExceptionReturnsLoginPageForCsrfErrorOnLogin(): void {
		$this->request = new Request(
			[
				'server' =>
					[
						'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
						'REQUEST_URI' => 'owncloud/index.php/apps/specialapp'
					]
			],
			$this->createMock(ISecureRandom::class),
			$this->createMock(IConfig::class)
		);

		$exception = new CrossSiteRequestForgeryException();
		$sessionMock = $this->getMockBuilder(ISession::class)
			->disableOriginalConstructor()
			->getMock();

		$this->controller = $this->getMockBuilder(LoginController::class)
			->disableOriginalConstructor()
			->getMock();

		$this->middleware = $this->getMiddleware(false, false);

		$this->logger
			->expects($this->once())
			->method('debug')
			->with($exception->getMessage());
		$this->controller
			->expects($this->once())
			->method('showLoginForm')
			->with(null, null, null);
		$this->controller
			->expects($this->once())
			->method('getSession')
			->willReturn($sessionMock);

		$this->middleware->afterException(
			$this->controller,
			'tryLogin',
			$exception
		);
	}

	/**
	 * @throws \Exception
	 */
	public function testAfterAjaxExceptionReturnsJSONError(): void {
		$response = $this->middleware->afterException($this->controller, 'test',
				$this->secAjaxException);

		$this->assertInstanceOf(JSONResponse::class, $response);
	}

	public function testAfterExceptionForNonAdminAccess(): void {
		$nonAdminException = new NotAdminException();
		$expectedResponse = $this->createMock(Response::class);
		$controller = $this->createMock(OCSController::class);
		$controller->expects($this->once())
			->method('buildResponse')
			->willReturn($expectedResponse);
		$response = $this->middleware->afterException($controller, 'test', $nonAdminException);
		$this->assertSame($expectedResponse, $response);
	}

	/**
	 * @NoCSRFRequired
	 */
	public function testBeforeOCSController(): void {
		$this->expectException(NotLoggedInException::class);
		$controller = $this->createMock(OCSController::class);
		$controller->expects($this->never())->method('buildResponse');

		// this header needs to be verified
		$this->request->expects(self::once())->method('getHeader')->with('OCS-APIREQUEST');

		$this->reader->reflect(__CLASS__, __FUNCTION__);
		$this->middleware->beforeController($controller, 'test');
	}

	/**
	 * @NoCSRFRequired
	 */
	public function testBeforeOCSControllerWithHeader(): void {
		$controller = $this->createMock(OCSController::class);
		$controller->expects($this->never())->method('buildResponse');

		// this header needs to be verified
		$this->request->expects(self::once())->method('getHeader')->with('OCS-APIREQUEST')->willReturn(true);

		$this->reader->reflect(__CLASS__, __FUNCTION__);
		$this->middleware->beforeController($controller, 'test');
	}

	public function testAfterController(): void {
		/** @var Response | MockObject $response */
		$response = $this->getMockBuilder(Response::class)->disableOriginalConstructor()->getMock();
		$defaultPolicy = new ContentSecurityPolicy();
		$defaultPolicy->addAllowedImageDomain('defaultpolicy');
		$currentPolicy = new ContentSecurityPolicy();
		$currentPolicy->addAllowedConnectDomain('currentPolicy');
		$mergedPolicy = new ContentSecurityPolicy();
		$mergedPolicy->addAllowedMediaDomain('mergedPolicy');
		$response
			->expects($this->exactly(2))
			->method('getContentSecurityPolicy')
			->willReturn($currentPolicy);
		$this->contentSecurityPolicyManager
			->expects($this->once())
			->method('getDefaultPolicy')
			->willReturn($defaultPolicy);
		$this->contentSecurityPolicyManager
				->expects($this->once())
				->method('mergePolicies')
				->with($defaultPolicy, $currentPolicy)
				->willReturn($mergedPolicy);
		$response->expects($this->once())
			->method('setContentSecurityPolicy')
			->with($mergedPolicy);

		$this->middleware->afterController($this->controller, 'test', $response);
	}
}
