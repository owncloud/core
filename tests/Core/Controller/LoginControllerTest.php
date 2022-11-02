<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
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

namespace Tests\Core\Controller;

use OC\Authentication\TwoFactorAuth\Manager;
use OC\Core\Controller\LoginController;
use OC\User\Session;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\License\ILicenseManager;
use OCP\IConfig;
use OCP\IRequest;
use OCP\ISession;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserManager;
use Test\TestCase;

class LoginControllerTest extends TestCase {
	/** @var LoginController */
	private $loginController;
	/** @var IRequest | \PHPUnit\Framework\MockObject\MockObject */
	private $request;
	/** @var IUserManager | \PHPUnit\Framework\MockObject\MockObject */
	private $userManager;
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var ISession | \PHPUnit\Framework\MockObject\MockObject */
	private $session;
	/** @var Session | \PHPUnit\Framework\MockObject\MockObject */
	private $userSession;
	/** @var IURLGenerator | \PHPUnit\Framework\MockObject\MockObject */
	private $urlGenerator;
	/** @var Manager | \PHPUnit\Framework\MockObject\MockObject */
	private $twoFactorManager;
	/** @var ILicenseManager */
	private $licenseManager;

	public function setUp(): void {
		parent::setUp();
		$this->request = $this->createMock(IRequest::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->config = $this->createMock(IConfig::class);
		$this->session = $this->createMock(ISession::class);
		$this->userSession = $this->getMockBuilder(Session::class)
			->disableOriginalConstructor()
			->getMock();
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->twoFactorManager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();
		$this->licenseManager = $this->createMock(ILicenseManager::class);

		$this->loginController = new LoginController(
			'core',
			$this->request,
			$this->userManager,
			$this->config,
			$this->session,
			$this->userSession,
			$this->urlGenerator,
			$this->twoFactorManager,
			$this->licenseManager
		);
	}

	private function getExpectedRememberLoginAllowedState() {
		// TODO: Improve detection
		if (\OC_App::isEnabled('files_external')) {
			return false;
		}
		return true;
	}

	public function testLogoutWithoutToken() {
		$this->request
			->expects($this->once())
			->method('getCookie')
			->with('oc_token')
			->willReturn(null);
		$this->userSession
			->expects($this->once())
			->method('clearRememberMeTokensForLoggedInUser');
		$this->urlGenerator
			->expects($this->once())
			->method('linkToRouteAbsolute')
			->with('core.login.showLoginForm')
			->willReturn('/login');

		$expected = new RedirectResponse('/login');
		$this->assertEquals($expected, $this->loginController->logout());
	}

	public function testLogoutWithToken() {
		$this->request
			->expects($this->once())
			->method('getCookie')
			->with('oc_token')
			->willReturn('MyLoginToken');
		$this->userSession
			->expects($this->once())
			->method('clearRememberMeTokensForLoggedInUser');
		$this->urlGenerator
			->expects($this->once())
			->method('linkToRouteAbsolute')
			->with('core.login.showLoginForm')
			->willReturn('/login');

		$expected = new RedirectResponse('/login');
		$this->assertEquals($expected, $this->loginController->logout());
	}

	public function testShowLoginFormForLoggedInUsers() {
		$this->userSession
			->expects($this->once())
			->method('isLoggedIn')
			->willReturn(true);

		$expectedResponse = new RedirectResponse(\OC_Util::getDefaultPageUrl());
		$this->assertEquals($expectedResponse, $this->loginController->showLoginForm('', '', ''));
	}

	public function testShowLoginFormForRememberMe() {
		$this->userSession
			->expects($this->once())
			->method('isLoggedIn')
			->willReturn(false);
		$this->userSession
			->expects($this->once())
			->method('tryRememberMeLogin')
			->willReturn(true);

		$expectedResponse = new RedirectResponse(\OC_Util::getDefaultPageUrl());
		$this->assertEquals($expectedResponse, $this->loginController->showLoginForm('', '', ''));
	}

	public function testResponseForNotLoggedinUser() {
		$params = [
			'messages' => [],
			'loginName' => '',
			'user_autofocus' => true,
			'redirect_url' => '%2Findex.php%2Ff%2F17',
			'canResetPassword' => true,
			'resetPasswordLink' => null,
			'alt_login' => [],
			'rememberLoginAllowed' => $this->getExpectedRememberLoginAllowedState(),
			'rememberLoginState' => 0,
			'strictLoginEnforced' => false
		];

		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['strict_login_enforced', false, false],
			]));
		$this->licenseManager->method('getLicenseMessageFor')
			->willReturn([
				'license_state' => ILicenseManager::LICENSE_STATE_MISSING
			]);

		$expectedResponse = new TemplateResponse('core', 'login', $params, 'guest');
		$this->assertEquals($expectedResponse, $this->loginController->showLoginForm('', '%2Findex.php%2Ff%2F17', ''));
	}

	public function responseForNotLoggedinUserDifferentLicensesProvider() {
		// use only license_state, type and translated_message fields, the rest aren't used for now
		return [
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_MISSING,
					'type' => -1,
					'translated_message' => ['license missing'],
				],
				false,
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_INVALID,
					'type' => -1,
					'translated_message' => ['license invalid'],
				],
				true,
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_EXPIRED,
					'type' => 0,
					'translated_message' => ['normal license expired'],
				],
				true,
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_EXPIRED,
					'type' => 1,
					'translated_message' => ['demo license expired'],
				],
				true,
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE,
					'type' => 0,
					'translated_message' => ['normal license about to expire'],
				],
				false,
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_ABOUT_TO_EXPIRE,
					'type' => 1,
					'translated_message' => ['demo license about to expire'],
				],
				true,
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_VALID,
					'type' => 0,
					'translated_message' => ['normal license valid'],
				],
				false,
			],
			[
				[
					'license_state' => ILicenseManager::LICENSE_STATE_VALID,
					'type' => 1,
					'translated_message' => ['demo license valid'],
				],
				true,
			],
		];
	}

	/**
	 * @dataProvider responseForNotLoggedinUserDifferentLicensesProvider
	 */
	public function testResponseForNotLoggedinUserDifferentLicenses($licenseInfo, $shouldShowMessage) {
		$params = [
			'messages' => [],
			'loginName' => '',
			'user_autofocus' => true,
			'redirect_url' => '%2Findex.php%2Ff%2F17',
			'canResetPassword' => true,
			'resetPasswordLink' => null,
			'alt_login' => [],
			'rememberLoginAllowed' => $this->getExpectedRememberLoginAllowedState(),
			'rememberLoginState' => 0,
			'strictLoginEnforced' => false
		];

		if ($shouldShowMessage) {
			$params['licenseMessage'] = \implode('<br/>', $licenseInfo['translated_message']);
		}

		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['strict_login_enforced', false, false],
			]));
		$this->licenseManager->method('getLicenseMessageFor')->willReturn($licenseInfo);

		$expectedResponse = new TemplateResponse('core', 'login', $params, 'guest');
		$this->assertEquals($expectedResponse, $this->loginController->showLoginForm('', '%2Findex.php%2Ff%2F17', ''));
	}

	public function testShowLoginFormWithErrorsInSession() {
		$this->userSession
			->expects($this->once())
			->method('isLoggedIn')
			->willReturn(false);
		$this->session
			->expects($this->once())
			->method('get')
			->with('loginMessages')
			->willReturn(
				[
					[
						'ErrorArray1',
						'ErrorArray2',
					],
					[
						'MessageArray1',
						'MessageArray2',
					],
				]
			);

		$this->licenseManager->method('getLicenseMessageFor')
			->willReturn([
				'license_state' => ILicenseManager::LICENSE_STATE_MISSING
			]);

		$expectedResponse = new TemplateResponse(
			'core',
			'login',
			[
				'ErrorArray1' => true,
				'ErrorArray2' => true,
				'messages' => [
					'MessageArray1',
					'MessageArray2',
				],
				'loginName' => '',
				'user_autofocus' => true,
				'canResetPassword' => true,
				'alt_login' => [],
				'rememberLoginAllowed' => \OC_Util::rememberLoginAllowed(),
				'rememberLoginState' => 0,
				'resetPasswordLink' => null,
				'strictLoginEnforced' => false
			],
			'guest'
		);
		$this->assertEquals($expectedResponse, $this->loginController->showLoginForm('', '', ''));
	}

	/**
	 * @return array
	 */
	public function passwordResetDataProvider() {
		return [
			[
				true,
				true,
			],
			[
				false,
				false,
			],
		];
	}

	/**
	 * @dataProvider passwordResetDataProvider
	 * @param $canChangePassword
	 * @param $expectedResult
	 */
	public function testShowLoginFormWithPasswordResetOption(
		$canChangePassword,
		$expectedResult
	) {
		$this->userSession
			->expects($this->once())
			->method('isLoggedIn')
			->willReturn(false);
		$this->config
			->expects($this->exactly(3))
			->method('getSystemValue')
			->willReturnMap([
				['lost_password_link', false],
				['login.alternatives', '', ''],
				['strict_login_enforced', false],
			]);
		$user = $this->createMock(IUser::class);
		$user
			->expects($this->once())
			->method('canChangePassword')
			->willReturn($canChangePassword);
		$this->userManager
			->expects($this->exactly(2))
			->method('get')
			->with('LdapUser')
			->willReturn($user);

		$this->licenseManager->method('getLicenseMessageFor')
			->willReturn([
				'license_state' => ILicenseManager::LICENSE_STATE_MISSING
			]);

		$expectedResponse = new TemplateResponse(
			'core',
			'login',
			[
				'messages' => [],
				'loginName' => 'LdapUser',
				'user_autofocus' => false,
				'canResetPassword' => $expectedResult,
				'alt_login' => [],
				'rememberLoginAllowed' => \OC_Util::rememberLoginAllowed(),
				'rememberLoginState' => 0,
				'resetPasswordLink' => false,
				'strictLoginEnforced' => false
			],
			'guest'
		);
		$this->assertEquals($expectedResponse, $this->loginController->showLoginForm('LdapUser', '', ''));
	}

	public function testShowLoginFormForUserNamedNull() {
		$this->userSession
			->expects($this->once())
			->method('isLoggedIn')
			->willReturn(false);
		$this->config
			->expects($this->exactly(3))
			->method('getSystemValue')
			->willReturnMap([
				['lost_password_link', false],
				['login.alternatives', '', ''],
				['strict_login_enforced', false],
			]);
		$user = $this->createMock(IUser::class);
		$user
			->expects($this->once())
			->method('canChangePassword')
			->willReturn(false);
		$this->userManager
			->expects($this->exactly(2))
			->method('get')
			->with('0')
			->willReturn($user);

		$this->licenseManager->method('getLicenseMessageFor')
			->willReturn([
				'license_state' => ILicenseManager::LICENSE_STATE_MISSING
			]);

		$expectedResponse = new TemplateResponse(
			'core',
			'login',
			[
				'messages' => [],
				'loginName' => '0',
				'user_autofocus' => false,
				'canResetPassword' => false,
				'alt_login' => [],
				'rememberLoginAllowed' => \OC_Util::rememberLoginAllowed(),
				'rememberLoginState' => 0,
				'resetPasswordLink' => false,
				'strictLoginEnforced' => false
			],
			'guest'
		);
		$this->assertEquals($expectedResponse, $this->loginController->showLoginForm('0', '', ''));
	}

	public function testShowLoginFormWithApacheBackend() {
		$this->userSession
			->expects($this->never())
			->method('isLoggedIn');
		$this->loginController = $this->getMockBuilder(LoginController::class)
			->setMethods(['handleApacheAuth', 'getDefaultUrl'])
			->setConstructorArgs([
				'core',
				$this->request,
				$this->userManager,
				$this->config,
				$this->session,
				$this->userSession,
				$this->urlGenerator,
				$this->twoFactorManager,
				$this->licenseManager
			])
			->getMock();
		$this->loginController->expects($this->once())
			->method('handleApacheAuth')
			->willReturn(true);
		$this->loginController->expects($this->once())
			->method('getDefaultUrl')
			->willReturn('redirect_url/test');

		$expectedResponse = new TemplateResponse(
			'core',
			'apacheauthredirect',
			['redirect_url' => 'redirect_url/test'],
			'guest'
		);
		$this->assertEquals($expectedResponse, $this->loginController->showLoginForm('0', '', ''));
	}

	public function dataLoginWithInvalidCredentials() {
		return [
			[false, 1],
			[true, 0],
		];
	}

	/**
	 * @dataProvider dataLoginWithInvalidCredentials
	 * @param $strictLoginCheck
	 * @param $expectedGetByEmailCalls
	 */
	public function testLoginWithInvalidCredentials($strictLoginCheck, $expectedGetByEmailCalls) {
		$user = 'unknown';
		$password = 'secret';
		$loginPageUrl = 'some url';

		$this->config->expects($this->exactly(1))
			->method('getSystemValue')
			->with('strict_login_enforced', false)
			->willReturn($strictLoginCheck);

		$this->userSession->expects($this->once())
			->method('login')
			->will($this->returnValue(false));
		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('core.login.showLoginForm', ['user' => $user, 'redirect_url' => '/foo'])
			->will($this->returnValue($loginPageUrl));

		$this->userSession->expects($this->never())
			->method('setNewRememberMeTokenForLoggedInUser');
		$this->userSession->expects($this->never())
			->method('createSessionToken');
		$this->userManager->expects($this->exactly($expectedGetByEmailCalls))
			->method('getByEmail')->willReturn([]);

		$expected = new RedirectResponse($loginPageUrl);
		$this->assertEquals($expected, $this->loginController->tryLogin($user, $password, '/foo'));
	}

	public function testLoginWithValidCredentials() {
		/** @var IUser | \PHPUnit\Framework\MockObject\MockObject $user */
		$user = $this->createMock(IUser::class);
		$password = 'secret';
		$indexPageUrl = 'some url';

		$this->userSession->expects($this->once())
			->method('login')
			->with($user, $password)
			->will($this->returnValue(true));
		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->userSession->expects($this->never())
			->method('setNewRememberMeTokenForLoggedInUser');
		$this->userSession->expects($this->once())
			->method('createSessionToken')
			->with($this->request, $user->getUID(), $user, $password);
		$this->twoFactorManager->expects($this->once())
			->method('isTwoFactorAuthenticated')
			->with($user)
			->will($this->returnValue(false));

		$expected = new RedirectResponse($indexPageUrl);

		$this->loginController = $this->getMockBuilder(LoginController::class)
			->setMethods(['getDefaultUrl'])
			->setConstructorArgs([
				'core',
				$this->request,
				$this->userManager,
				$this->config,
				$this->session,
				$this->userSession,
				$this->urlGenerator,
				$this->twoFactorManager,
				$this->licenseManager
			])
			->getMock();
		$this->loginController->expects($this->once())
			->method('getDefaultUrl')
			->willReturn($indexPageUrl);

		$this->assertEquals($expected, $this->loginController->tryLogin($user, $password, null));
	}

	public function testLoginWithValidCredentialsAndRememberMe() {
		/** @var IUser | \PHPUnit\Framework\MockObject\MockObject $user */
		$user = $this->createMock(IUser::class);
		$password = 'secret';
		$indexPageUrl = 'some url';

		$this->userSession->expects($this->once())
			->method('login')
			->with($user, $password)
			->will($this->returnValue(true));
		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->userSession->expects($this->once())
			->method('setNewRememberMeTokenForLoggedInUser');
		$this->userSession->expects($this->once())
			->method('createSessionToken')
			->with($this->request, $user->getUID(), $user, $password);
		$this->twoFactorManager->expects($this->once())
			->method('isTwoFactorAuthenticated')
			->with($user)
			->will($this->returnValue(false));

		$expected = new RedirectResponse($indexPageUrl);

		$this->loginController = $this->getMockBuilder(LoginController::class)
			->setMethods(['getDefaultUrl'])
			->setConstructorArgs([
				'core',
				$this->request,
				$this->userManager,
				$this->config,
				$this->session,
				$this->userSession,
				$this->urlGenerator,
				$this->twoFactorManager,
				$this->licenseManager
			])
			->getMock();
		$this->loginController->expects($this->once())
			->method('getDefaultUrl')
			->willReturn($indexPageUrl);

		$this->assertEquals($expected, $this->loginController->tryLogin($user, $password, null, null, "1")); // "1" is expected as rememberMe value
	}
	public function testLoginWithValidCredentialsAndRedirectUrl() {
		/** @var IUser | \PHPUnit\Framework\MockObject\MockObject $user */
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('jane'));
		$password = 'secret';
		$originalUrl = 'another%20url';
		$redirectUrl = 'http://localhost/another url';

		$this->userSession->expects($this->once())
			->method('login')
			->with('Jane', $password)
			->will($this->returnValue(true));
		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->userSession->expects($this->never())
			->method('setNewRememberMeTokenForLoggedInUser');
		$this->userSession->expects($this->once())
			->method('createSessionToken')
			->with($this->request, $user->getUID(), 'Jane', $password);
		$this->userSession->expects($this->once())
			->method('isLoggedIn')
			->with()
			->will($this->returnValue(true));
		$this->urlGenerator->expects($this->once())
			->method('getAbsoluteURL')
			->with(\urldecode($originalUrl))
			->will($this->returnValue($redirectUrl));

		$expected = new RedirectResponse(\urldecode($redirectUrl));
		$this->assertEquals($expected, $this->loginController->tryLogin('Jane', $password, $originalUrl));
	}
	
	public function testLoginWithTwoFactorEnforced() {
		/** @var IUser | \PHPUnit\Framework\MockObject\MockObject $user */
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('john'));
		$password = 'secret';
		$challengeUrl = 'challenge/url';

		$this->userSession->expects($this->once())
			->method('login')
			->will($this->returnValue(true));
		$this->userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$this->userSession->expects($this->once())
			->method('login')
			->with('john@doe.com', $password);
		$this->userSession->expects($this->never())
			->method('setNewRememberMeTokenForLoggedInUser');
		$this->userSession->expects($this->once())
			->method('createSessionToken')
			->with($this->request, $user->getUID(), 'john@doe.com', $password);
		$this->twoFactorManager->expects($this->once())
			->method('isTwoFactorAuthenticated')
			->with($user)
			->will($this->returnValue(true));
		$this->twoFactorManager->expects($this->once())
			->method('prepareTwoFactorLogin')
			->with($user);
		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('core.TwoFactorChallenge.selectChallenge')
			->will($this->returnValue($challengeUrl));

		$expected = new RedirectResponse($challengeUrl);
		$this->assertEquals($expected, $this->loginController->tryLogin('john@doe.com', $password, null));
	}

	public function testToNotLeakLoginName() {
		/** @var IUser | \PHPUnit\Framework\MockObject\MockObject $user */
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('john'));

		$this->userSession->expects($this->exactly(2))
			->method('login')
			->withConsecutive(
				['john@doe.com', 'just wrong'],
				['john', 'just wrong']
			)
			->willReturn(false);
		
		$this->userManager->expects($this->once())
			->method('getByEmail')
			->with('john@doe.com')
			->willReturn([$user]);

		$this->urlGenerator->expects($this->once())
			->method('linkToRoute')
			->with('core.login.showLoginForm', ['user' => 'john@doe.com'])
			->will($this->returnValue(''));

		$expected = new RedirectResponse('');
		$this->assertEquals($expected, $this->loginController->tryLogin('john@doe.com', 'just wrong', null));
	}
}
