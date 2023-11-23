<?php

/**
 * @author Christoph Wurst <christoph@owncloud.com>
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

namespace Tests\Core\Middleware;

use OC\AppFramework\Http\Request;
use OC\Authentication\Exceptions\TwoFactorAuthRequiredException;
use OC\Authentication\Exceptions\UserAlreadyLoggedInException;
use OC\Authentication\TwoFactorAuth\Manager;
use OC\Core\Middleware\TwoFactorMiddleware;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Utility\IControllerMethodReflector;
use OCP\IConfig;
use OCP\IURLGenerator;
use OCP\IUserSession;
use OCP\Security\ISecureRandom;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;
use OCP\IUser;
use OC\Core\Controller\TwoFactorChallengeController;

class TwoFactorMiddlewareTest extends TestCase {
	/** @var Manager|MockObject */
	private $twoFactorManager;

	/** @var IUserSession|MockObject */
	private $userSession;

	/** @var IURLGenerator|MockObject */
	private $urlGenerator;

	/** @var IControllerMethodReflector|MockObject */
	private $reflector;

	private Request $request;

	private TwoFactorMiddleware $middleware;

	protected function setUp(): void {
		parent::setUp();

		$this->twoFactorManager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession = $this->createMock(IUserSession::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->reflector = $this->createMock(IControllerMethodReflector::class);
		$this->request = new Request(
			[
				'server' => [
					'REQUEST_URI' => 'test/url'
				]
			],
			$this->createMock(ISecureRandom::class),
			$this->createMock(IConfig::class)
		);

		$this->middleware = new TwoFactorMiddleware($this->twoFactorManager, $this->userSession, $this->urlGenerator, $this->reflector, $this->request);
	}

	public function testBeforeControllerNotLoggedIn(): void {
		$this->reflector->expects($this->once())
			->method('hasAnnotation')
			->with('PublicPage')
			->willReturn(false);
		$this->userSession->expects($this->once())
			->method('isLoggedIn')
			->willReturn(false);

		$this->userSession->expects($this->never())
			->method('getUser');

		$this->middleware->beforeController(null, 'index');
	}

	/**
	 * @throws TwoFactorAuthRequiredException
	 * @throws UserAlreadyLoggedInException
	 */
	public function testBeforeControllerPublicPage(): void {
		$this->reflector->expects($this->once())
			->method('hasAnnotation')
			->with('PublicPage')
			->willReturn(true);
		$this->userSession->expects($this->once())
			->method('isLoggedIn')
			->willReturn(false);

		$this->middleware->beforeController(null, 'create');
	}

	/**
	 * @throws TwoFactorAuthRequiredException
	 * @throws UserAlreadyLoggedInException
	 */
	public function testBeforeControllerNoTwoFactorCheckNeeded(): void {
		$user = $this->createMock(IUser::class);

		$this->reflector->expects($this->never())
			->method('hasAnnotation')
			->with('PublicPage');
		$this->userSession->expects($this->once())
			->method('isLoggedIn')
			->willReturn(true);
		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->twoFactorManager->expects($this->once())
			->method('isTwoFactorAuthenticated')
			->with($user)
			->willReturn(false);

		$this->middleware->beforeController(null, 'index');
	}

	/**
	 * @throws UserAlreadyLoggedInException
	 */
	public function testBeforeControllerTwoFactorAuthRequired(): void {
		$this->expectException(TwoFactorAuthRequiredException::class);

		$user = $this->createMock(IUser::class);

		$this->reflector->expects($this->never())
			->method('hasAnnotation')
			->with('PublicPage');
		$this->userSession->expects($this->once())
			->method('isLoggedIn')
			->willReturn(true);
		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->twoFactorManager->expects($this->once())
			->method('isTwoFactorAuthenticated')
			->with($user)
			->willReturn(true);
		$this->twoFactorManager->expects($this->once())
			->method('needsSecondFactor')
			->willReturn(true);

		$this->middleware->beforeController(null, 'index');
	}

	/**
	 * @throws TwoFactorAuthRequiredException
	 */
	public function testBeforeControllerUserAlreadyLoggedIn(): void {
		$this->expectException(UserAlreadyLoggedInException::class);

		$user = $this->createMock(IUser::class);

		$this->reflector->expects($this->never())
			->method('hasAnnotation')
			->with('PublicPage');
		$this->userSession->expects($this->once())
			->method('isLoggedIn')
			->willReturn(true);
		$this->userSession->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->twoFactorManager->expects($this->once())
			->method('isTwoFactorAuthenticated')
			->with($user)
			->willReturn(true);
		$this->twoFactorManager->expects($this->once())
			->method('needsSecondFactor')
			->willReturn(false);

		$twoFactorChallengeController = $this->getMockBuilder(TwoFactorChallengeController::class)
			->disableOriginalConstructor()
			->getMock();
		$this->middleware->beforeController($twoFactorChallengeController, 'index');
	}

	/**
	 * @throws \Exception
	 */
	public function testAfterExceptionTwoFactorAuthRequired(): void {
		$ex = new TwoFactorAuthRequiredException();

		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('core.TwoFactorChallenge.selectChallenge')
			->willReturn('test/url');
		$expected = new RedirectResponse('test/url');

		$this->assertEquals($expected, $this->middleware->afterException(null, 'index', $ex));
	}

	/**
	 * @throws \Exception
	 */
	public function testAfterException(): void {
		$ex = new UserAlreadyLoggedInException();

		$this->urlGenerator->expects($this->once())
			->method('getAbsoluteUrl')
			->with('')
			->willReturn('http://cloud.local/');
		$expected = new RedirectResponse('http://cloud.local/');

		$this->assertEquals($expected, $this->middleware->afterException(null, 'index', $ex));
	}
}
