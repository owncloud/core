<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\DAV\Tests\unit\Connector\Sabre;

use OC\Authentication\Exceptions\PasswordLoginForbiddenException;
use OC\Authentication\TwoFactorAuth\Manager;
use OC\Authentication\AccountModule\Manager as AccountModuleManager;
use OC\User\LoginException;
use OC\User\Session;
use OCA\DAV\Connector\Sabre\Auth;
use OCP\IRequest;
use OCP\ISession;
use OCP\IUser;
use PHPUnit\Framework\MockObject\MockObject;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Test\TestCase;
use Sabre\DAV\Server;

/**
 * Class AuthTest
 *
 * @package OCA\DAV\Tests\unit\Connector\Sabre
 * @group DB
 */
class AuthTest extends TestCase {
	/** @var ISession | MockObject */
	private $session;
	/** @var Auth */
	private $auth;
	/** @var Session | MockObject */
	private $userSession;
	/** @var IRequest | MockObject */
	private $request;
	/** @var Manager | MockObject */
	private $twoFactorManager;
	/** @var AccountModuleManager | MockObject */
	private $accountModuleManager;

	public function setUp(): void {
		parent::setUp();
		$this->session = $this->createMock(ISession::class);
		$this->userSession = $this->createMock(Session::class);
		$this->request = $this->createMock(IRequest::class);
		$this->twoFactorManager = $this->createMock(Manager::class);
		$this->accountModuleManager = $this->createMock(AccountModuleManager::class);
		$this->auth = new Auth(
			$this->session,
			$this->userSession,
			$this->request,
			$this->twoFactorManager,
			$this->accountModuleManager
		);
	}

	public function testIsDavAuthenticatedWithoutDavSession() {
		$this->session
			->expects($this->once())
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn(null);

		$this->assertFalse(self::invokePrivate($this->auth, 'isDavAuthenticated', ['MyTestUser']));
	}

	public function testIsDavAuthenticatedWithWrongDavSession() {
		$this->session
			->expects($this->exactly(2))
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn('AnotherUser');

		$this->assertFalse(self::invokePrivate($this->auth, 'isDavAuthenticated', ['MyTestUser']));
	}

	public function testIsDavAuthenticatedWithCorrectDavSession() {
		$this->session
			->expects($this->exactly(2))
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn('MyTestUser');

		$this->assertTrue(self::invokePrivate($this->auth, 'isDavAuthenticated', ['MyTestUser']));
	}

	public function testValidateUserPassOfAlreadyDAVAuthenticatedUser() {
		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$user->expects($this->exactly(2))
			->method('getUID')
			->willReturn('MyTestUser');
		$this->userSession
			->expects($this->once())
			->method('isLoggedIn')
			->willReturn(true);
		$this->userSession
			->expects($this->once())
			->method('verifyAuthHeaders')
			->willReturn(true);
		$this->userSession
			->expects($this->exactly(2))
			->method('getUser')
			->willReturn($user);
		$this->session
			->expects($this->exactly(2))
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn('MyTestUser');
		$this->session
			->expects($this->once())
			->method('close');

		$this->assertTrue(self::invokePrivate($this->auth, 'validateUserPass', ['MyTestUser', 'MyTestPassword']));
	}

	public function testValidateUserPassOfInvalidDAVAuthenticatedUser() {
		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$user->expects($this->once())
			->method('getUID')
			->willReturn('MyTestUser');
		$this->userSession
			->expects($this->once())
			->method('isLoggedIn')
			->willReturn(true);
		$this->userSession
			->expects($this->once())
			->method('verifyAuthHeaders')
			->willReturn(true);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->session
			->expects($this->exactly(2))
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn('AnotherUser');
		$this->session
			->expects($this->once())
			->method('close');

		$this->assertFalse(self::invokePrivate($this->auth, 'validateUserPass', ['MyTestUser', 'MyTestPassword']));
	}

	public function testValidateUserPassOfInvalidDAVAuthenticatedUserWithValidPassword() {
		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$user->expects($this->exactly(3))
			->method('getUID')
			->willReturn('MyTestUser');
		$this->userSession
			->expects($this->once())
			->method('isLoggedIn')
			->willReturn(true);
		$this->userSession
			->expects($this->once())
			->method('verifyAuthHeaders')
			->willReturn(true);
		$this->userSession
			->expects($this->exactly(3))
			->method('getUser')
			->willReturn($user);
		$this->session
			->expects($this->exactly(2))
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn('AnotherUser');
		$this->userSession
			->expects($this->once())
			->method('logClientIn')
			->with('MyTestUser', 'MyTestPassword', $this->request)
			->willReturn(true);
		$this->session
			->expects($this->once())
			->method('set')
			->with('AUTHENTICATED_TO_DAV_BACKEND', 'MyTestUser');
		$this->session
			->expects($this->once())
			->method('close');

		$this->assertTrue(self::invokePrivate($this->auth, 'validateUserPass', ['MyTestUser', 'MyTestPassword']));
	}

	public function testValidateUserPassWithInvalidPassword() {
		$this->userSession
			->expects($this->once())
			->method('isLoggedIn')
			->willReturn(false);
		$this->userSession
			->expects($this->once())
			->method('logClientIn')
			->with('MyTestUser', 'MyTestPassword')
			->willReturn(false);
		$this->session
			->expects($this->once())
			->method('close');

		$this->assertFalse(self::invokePrivate($this->auth, 'validateUserPass', ['MyTestUser', 'MyTestPassword']));
	}

	/**
	 */
	public function testValidateUserPassWithPasswordLoginForbidden() {
		$this->expectException(\OCA\DAV\Connector\Sabre\Exception\PasswordLoginForbidden::class);

		$this->userSession
			->expects($this->once())
			->method('isLoggedIn')
			->willReturn(false);
		$this->userSession
			->expects($this->once())
			->method('logClientIn')
			->with('MyTestUser', 'MyTestPassword')
			->will($this->throwException(new PasswordLoginForbiddenException()));
		$this->session
			->expects($this->once())
			->method('close');

		self::invokePrivate($this->auth, 'validateUserPass', ['MyTestUser', 'MyTestPassword']);
	}

	public function testAuthenticateAlreadyLoggedInWithoutCsrfTokenForNonGet() {
		/** @var RequestInterface | MockObject $request */
		$request = $this->getMockBuilder(RequestInterface::class)
				->disableOriginalConstructor()
				->getMock();
		/** @var ResponseInterface | MockObject $response */
		$response = $this->getMockBuilder(ResponseInterface::class)
				->disableOriginalConstructor()
				->getMock();
		$this->userSession
			->method('isLoggedIn')
			->willReturn(true);
		$this->request
			->method('getMethod')
			->willReturn('POST');
		$this->session
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn(null);
		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$user
			->method('getUID')
			->willReturn('MyWrongDavUser');
		$this->userSession
			->method('getUser')
			->willReturn($user);
		$this->request
			->expects($this->once())
			->method('passesCSRFCheck')
			->willReturn(false);

		$expectedResponse = [
			false,
			"No 'Authorization: Basic' header found. Either the client didn't send one, or the server is misconfigured",
		];
		$response = $this->auth->check($request, $response);
		$this->assertSame($expectedResponse, $response);
	}

	public function testAuthenticateAlreadyLoggedInWithoutCsrfTokenAndCorrectlyDavAuthenticated() {
		/** @var RequestInterface | MockObject $request */
		$request = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ResponseInterface | MockObject $response */
		$response = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession
			->method('isLoggedIn')
			->willReturn(true);
		$this->request
			->method('getMethod')
			->willReturn('POST');
		$this->request
			->method('isUserAgent')
			->with([
				'/^Mozilla\/5\.0 \([A-Za-z ]+\) (mirall|csyncoC)\/.*$/',
				'/^Mozilla\/5\.0 \(Android\) ownCloud\-android.*$/',
				'/^Mozilla\/5\.0 \(iOS\) ownCloud\-iOS.*$/',
			])
			->willReturn(false);
		$this->session
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn('LoggedInUser');
		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$user
			->method('getUID')
			->willReturn('LoggedInUser');
		$this->userSession
			->method('getUser')
			->willReturn($user);
		$this->request
			->expects($this->once())
			->method('passesCSRFCheck')
			->willReturn(false);
		$this->auth->check($request, $response);
	}

	/**
	 */
	public function testAuthenticateAlreadyLoggedInWithoutTwoFactorChallengePassed() {
		$this->expectException(\Sabre\DAV\Exception\NotAuthenticated::class);
		$this->expectExceptionMessage('2FA challenge not passed.');

		/** @var RequestInterface | MockObject $request */
		$request = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ResponseInterface | MockObject $response */
		$response = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession
			->method('isLoggedIn')
			->willReturn(true);
		$this->request
			->method('getMethod')
			->willReturn('POST');
		$this->request
			->method('isUserAgent')
			->with([
				'/^Mozilla\/5\.0 \([A-Za-z ]+\) (mirall|csyncoC)\/.*$/',
				'/^Mozilla\/5\.0 \(Android\) ownCloud\-android.*$/',
				'/^Mozilla\/5\.0 \(iOS\) ownCloud\-iOS.*$/',
			])
			->willReturn(false);
		$this->session
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn('LoggedInUser');
		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$user
			->method('getUID')
			->willReturn('LoggedInUser');
		$this->userSession
			->method('getUser')
			->willReturn($user);
		$this->request
			->expects($this->once())
			->method('passesCSRFCheck')
			->willReturn(true);
		$this->twoFactorManager->expects($this->once())
			->method('needsSecondFactor')
			->willReturn(true);
		$this->auth->check($request, $response);
	}

	public function testAuthenticateAlreadyLoggedInWithoutCsrfTokenForNonGetAndDesktopClient() {
		/** @var RequestInterface | MockObject $request */
		$request = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ResponseInterface | MockObject $response */
		$response = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession
			->method('isLoggedIn')
			->willReturn(true);
		$this->request
			->method('getMethod')
			->willReturn('POST');
		$this->request
			->method('isUserAgent')
			->with([
				'/^Mozilla\/5\.0 \([A-Za-z ]+\) (mirall|csyncoC)\/.*$/',
				'/^Mozilla\/5\.0 \(Android\) ownCloud\-android.*$/',
				'/^Mozilla\/5\.0 \(iOS\) ownCloud\-iOS.*$/',
			])
			->willReturn(true);
		$this->session
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn(null);
		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$user
			->method('getUID')
			->willReturn('MyWrongDavUser');
		$this->userSession
			->method('getUser')
			->willReturn($user);
		$this->request
			->expects($this->once())
			->method('passesCSRFCheck')
			->willReturn(false);

		$this->auth->check($request, $response);
	}

	public function testAuthenticateAlreadyLoggedInWithoutCsrfTokenForGet() {
		/** @var RequestInterface | MockObject $request */
		$request = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ResponseInterface | MockObject $response */
		$response = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession
			->method('isLoggedIn')
			->willReturn(true);
		$this->session
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn(null);
		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$user
			->method('getUID')
			->willReturn('MyWrongDavUser');
		$this->userSession
			->method('getUser')
			->willReturn($user);
		$this->request
			->method('getMethod')
			->willReturn('GET');

		$response = $this->auth->check($request, $response);
		$this->assertEquals([true, 'principals/users/MyWrongDavUser'], $response);
	}

	public function testAuthenticateAlreadyLoggedInWithCsrfTokenForGet() {
		/** @var RequestInterface | MockObject $request */
		$request = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ResponseInterface | MockObject $response */
		$response = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession
			->method('isLoggedIn')
			->willReturn(true);
		$this->session
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn(null);
		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$user
			->method('getUID')
			->willReturn('MyWrongDavUser');
		$this->userSession
			->method('getUser')
			->willReturn($user);
		$this->request
			->expects($this->once())
			->method('passesCSRFCheck')
			->willReturn(true);

		$response = $this->auth->check($request, $response);
		$this->assertEquals([true, 'principals/users/MyWrongDavUser'], $response);
	}

	/**
	 */
	public function testAutenticateWithLoggedInUserButLoginExceptionThrown() {
		$this->expectException(\Sabre\DAV\Exception\NotAuthenticated::class);

		/** @var RequestInterface | MockObject $request */
		$request = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ResponseInterface | MockObject $response */
		$response = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession
			->method('isLoggedIn')
			->willThrowException(new LoginException());
		$response = $this->auth->check($request, $response);
	}

	public function testAuthenticateNoBasicAuthenticateHeadersProvided() {
		$server = $this->getMockBuilder(Server::class)
			->disableOriginalConstructor()
			->getMock();
		$server->httpRequest = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$server->httpResponse = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$response = $this->auth->check($server->httpRequest, $server->httpResponse);
		$this->assertEquals([false, 'No \'Authorization: Basic\' header found. Either the client didn\'t send one, or the server is misconfigured'], $response);
	}

	public function testAuthenticateNoBasicAuthenticateHeadersProvidedWithAjax() {
		/** @var RequestInterface | MockObject $httpRequest */
		$httpRequest = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ResponseInterface $httpResponse */
		$httpResponse = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession
			->method('isLoggedIn')
			->willReturn(false);
		$httpRequest->expects(self::at(0))->method('getHeader')->with('Authorization')->willReturn(null);
		$result = $this->auth->check($httpRequest, $httpResponse);
		$this->assertEquals([false, 'No \'Authorization: Basic\' header found. Either the client didn\'t send one, or the server is misconfigured' ], $result);
	}

	public function testAuthenticateNoBasicAuthenticateHeadersProvidedWithAjaxButUserIsStillLoggedIn() {
		/** @var RequestInterface | MockObject $httpRequest */
		$httpRequest = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ResponseInterface $httpResponse */
		$httpResponse = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var IUser */
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('MyTestUser');
		$this->userSession
			->method('isLoggedIn')
			->willReturn(true);
		$this->userSession
			->method('getUser')
			->willReturn($user);
		$this->session
			->expects($this->atLeastOnce())
			->method('get')
			->with('AUTHENTICATED_TO_DAV_BACKEND')
			->willReturn('MyTestUser');
		$this->request
			->expects($this->once())
			->method('getMethod')
			->willReturn('GET');
		$httpRequest
			->expects($this->atLeastOnce())
			->method('getHeader')
			->with('Authorization')
			->willReturn(null);
		$this->assertEquals(
			[true, 'principals/users/MyTestUser'],
			$this->auth->check($httpRequest, $httpResponse)
		);
	}

	public function testAuthenticateValidCredentials() {
		$server = $this->getMockBuilder(Server::class)
			->disableOriginalConstructor()
			->getMock();
		$server->httpRequest = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$server->httpRequest
			->expects($this->at(0))
			->method('getHeader')
			->with('Authorization')
			->willReturn('basic dXNlcm5hbWU6cGFzc3dvcmQ=');
		$server->httpResponse = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession
			->expects($this->once())
			->method('logClientIn')
			->with('username', 'password')
			->willReturn(true);
		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$user->expects($this->exactly(3))
			->method('getUID')
			->willReturn('MyTestUser');
		$this->userSession
			->expects($this->exactly(3))
			->method('getUser')
			->willReturn($user);
		$response = $this->auth->check($server->httpRequest, $server->httpResponse);
		$this->assertEquals([true, 'principals/users/MyTestUser'], $response);
	}

	public function testAuthenticateInvalidCredentials() {
		$server = $this->getMockBuilder(Server::class)
			->disableOriginalConstructor()
			->getMock();
		$server->httpRequest = $this->getMockBuilder(RequestInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$server->httpRequest
			->expects($this->at(0))
			->method('getHeader')
			->with('Authorization')
			->willReturn('basic dXNlcm5hbWU6cGFzc3dvcmQ=');
		$server->httpResponse = $this->getMockBuilder(ResponseInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession
			->expects($this->once())
			->method('logClientIn')
			->with('username', 'password')
			->willReturn(false);
		$response = $this->auth->check($server->httpRequest, $server->httpResponse);
		$this->assertEquals([false, 'Username or password was incorrect'], $response);
	}

	/**
	 * @dataProvider providesHeaders
	 * @param $expectedHeader
	 * @param $requestWith
	 */
	public function testChallenge($expectedHeader, $requestWith) {
		$request = $this->createMock(RequestInterface::class);
		$response = $this->createMock(ResponseInterface::class);

		$request->method('getHeader')->with('X-Requested-With')->willReturn($requestWith);
		$response->expects(self::once())->method('addHeader')->with('WWW-Authenticate', $expectedHeader);
		$response->expects(self::once())->method('setStatus')->with(401);
		$this->auth->challenge($request, $response);
	}

	public function providesHeaders() {
		return [
			['DummyBasic realm="ownCloud", charset="UTF-8"', 'XMLHttpRequest'],
			['DummyBasic realm="ownCloud", charset="UTF-8"', 'XMLHttpRequest, XMLHttpRequest'],
			['Basic realm="ownCloud", charset="UTF-8"', ''],
		];
	}
}
