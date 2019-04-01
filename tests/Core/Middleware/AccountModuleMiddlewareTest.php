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

namespace Test\Core\Middleware;

use OC\Authentication\AccountModule\Manager;
use OC\Core\Controller\LoginController;
use OC\Core\Middleware\AccountModuleMiddleware;
use OCP\AppFramework\Utility\IControllerMethodReflector;
use OCP\Authentication\Exceptions\AccountCheckException;
use OCP\Authentication\IAccountModuleController;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserSession;
use Test\TestCase;
use OC\Core\Controller\TwoFactorChallengeController;

class AccountModuleMiddlewareTest extends TestCase {

	/** @var ILogger|\PHPUnit\Framework\MockObject\MockObject */
	private $logger;

	/** @var Manager|\PHPUnit\Framework\MockObject\MockObject */
	private $manager;

	/** @var IUserSession|\PHPUnit\Framework\MockObject\MockObject */
	private $userSession;

	/** @var IControllerMethodReflector|\PHPUnit\Framework\MockObject\MockObject */
	private $reflector;

	/** @var AccountModuleMiddleware */
	private $middleware;

	protected function setUp() {
		parent::setUp();

		$this->logger = $this->createMock(ILogger::class);
		$this->manager = $this->createMock(Manager::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->reflector = $this->createMock(IControllerMethodReflector::class);

		$this->middleware = new AccountModuleMiddleware(
			$this->logger,
			$this->manager,
			$this->userSession,
			$this->reflector
		);
	}

	public function testBeforeControllerPublicPage() {
		$this->reflector->expects($this->once())
			->method('hasAnnotation')
			->with('PublicPage')
			->will($this->returnValue(true));
		$this->userSession->expects($this->never())
			->method('isLoggedIn');

		$this->middleware->beforeController(null, 'create');
	}

	public function testBeforeControllerLoginController() {
		$this->reflector->expects($this->once())
			->method('hasAnnotation')
			->with('PublicPage')
			->will($this->returnValue(false));
		$this->userSession->expects($this->never())
			->method('isLoggedIn');

		$controller = $this->getMockBuilder(LoginController::class)
			->disableOriginalConstructor()
			->getMock();

		$this->middleware->beforeController($controller, 'logout');
	}
	public function testBeforeControllerAccountModuleController() {
		$this->reflector->expects($this->once())
			->method('hasAnnotation')
			->with('PublicPage')
			->will($this->returnValue(false));
		$this->userSession->expects($this->never())
			->method('isLoggedIn');

		$controller = $this->createMock(IAccountModuleController::class);

		$this->middleware->beforeController($controller, null);
	}
	public function testBeforeControllerSkipsTwoFactorChallengeController() {
		$this->reflector->expects($this->once())
			->method('hasAnnotation')
			->with('PublicPage')
			->will($this->returnValue(false));
		$this->userSession->expects($this->never())
			->method('isLoggedIn');

		$controller = $this->createMock(TwoFactorChallengeController::class);

		$this->middleware->beforeController($controller, null);
	}

	public function testBeforeControllerNotLoggedIn() {
		$this->reflector->expects($this->once())
			->method('hasAnnotation')
			->with('PublicPage')
			->will($this->returnValue(false));
		$this->userSession->expects($this->once())
			->method('isLoggedIn')
			->will($this->returnValue(false));

		$this->userSession->expects($this->never())
			->method('getUser');

		$this->middleware->beforeController(null, null);
	}

	/**
	 * @expectedException \UnexpectedValueException
	 */
	public function testBeforeControllerNoUserInSession() {
		$this->reflector->expects($this->once())
			->method('hasAnnotation')
			->with('PublicPage')
			->will($this->returnValue(false));
		$this->userSession->expects($this->once())
			->method('isLoggedIn')
			->will($this->returnValue(true));

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$this->middleware->beforeController(null, null);
	}

	public function testBeforeControllerAccountUpToDate() {
		$this->reflector->expects($this->once())
			->method('hasAnnotation')
			->with('PublicPage')
			->will($this->returnValue(false));
		$this->userSession->expects($this->once())
			->method('isLoggedIn')
			->will($this->returnValue(true));

		$user = $this->createMock(IUser::class);

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));

		$this->manager->expects($this->once())
			->method('check');

		$this->middleware->beforeController(null, null);
	}

	/**
	 * @expectedException \OCP\Authentication\Exceptions\AccountCheckException
	 */
	public function testBeforeControllerAccountNeedsUpdate() {
		$this->reflector->expects($this->once())
			->method('hasAnnotation')
			->with('PublicPage')
			->will($this->returnValue(false));
		$this->userSession->expects($this->once())
			->method('isLoggedIn')
			->will($this->returnValue(true));

		$user = $this->createMock(IUser::class);

		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));

		$rr = new \OCP\AppFramework\Http\RedirectResponse('test/url');
		$this->manager->expects($this->once())
			->method('check')
			->willThrowException(new AccountCheckException($rr));

		$this->middleware->beforeController(null, null);
	}

	public function testAfterExceptionAccountNeedsUpdate() {
		$expected = new \OCP\AppFramework\Http\RedirectResponse('test/url');
		$ex = new AccountCheckException($expected);
		$this->assertEquals($expected, $this->middleware->afterException(null, null, $ex));
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage testAfterException
	 */
	public function testAfterException() {
		$ex = new \Exception('testAfterException');
		$this->middleware->afterException(null, null, $ex);
	}
}
