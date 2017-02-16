<?php

/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\User;

use OC\Authentication\Token\DefaultToken;
use OC\Authentication\Token\IProvider;
use OC\Session\Memory;
use OC\User\Manager;
use OC\User\Session;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\IUser;
use Test\TestCase;

/**
 * @group DB
 * @package Test\User
 */
class SessionTest extends TestCase {

	/** @var \OCP\AppFramework\Utility\ITimeFactory | \PHPUnit_Framework_MockObject_MockObject */
	private $timeFactory;

	/** @var \OC\Authentication\Token\DefaultTokenProvider | \PHPUnit_Framework_MockObject_MockObject */
	protected $tokenProvider;

	/** @var \OCP\IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;

	protected function setUp() {
		parent::setUp();

		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->timeFactory->expects($this->any())
			->method('getTime')
			->will($this->returnValue(10000));
		$this->tokenProvider = $this->createMock(IProvider::class);
		$this->config = $this->createMock(IConfig::class);
	}

	public function testGetUser() {
		$token = new DefaultToken();
		$token->setLoginName('User123');
		$token->setLastCheck(200);

		$expectedUser = $this->createMock('\OCP\IUser');
		$expectedUser->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user123'));
		$session = $this->createMock('\OC\Session\Memory');
		$session->expects($this->at(0))
			->method('get')
			->with('user_id')
			->will($this->returnValue($expectedUser->getUID()));
		$sessionId = 'abcdef12345';

		$manager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$session->expects($this->at(1))
			->method('get')
			->with('app_password')
			->will($this->returnValue(null)); // No password set -> browser session
		$session->expects($this->once())
			->method('getId')
			->will($this->returnValue($sessionId));
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with($sessionId)
			->will($this->returnValue($token));
		$this->tokenProvider->expects($this->once())
			->method('getPassword')
			->with($token, $sessionId)
			->will($this->returnValue('passme'));
		$manager->expects($this->once())
			->method('checkPassword')
			->with('User123', 'passme')
			->will($this->returnValue(true));
		$expectedUser->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(true));

		$this->tokenProvider->expects($this->once())
			->method('updateTokenActivity')
			->with($token);

		$manager->expects($this->any())
			->method('get')
			->with($expectedUser->getUID())
			->will($this->returnValue($expectedUser));

		$userSession = new \OC\User\Session($manager, $session, $this->timeFactory, $this->tokenProvider, $this->config);
		$user = $userSession->getUser();
		$this->assertSame($expectedUser, $user);
		$this->assertSame(10000, $token->getLastCheck());
	}

	public function isLoggedInData() {
		return [
			'User is logged in' => [true],
			'User is not logged in' => [false],
		];
	}

	/**
	 * @dataProvider isLoggedInData
	 */
	public function testIsLoggedIn($isLoggedIn) {
		$session = $this->createMock('\OC\Session\Memory');

		$manager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();

		/** @var \PHPUnit_Framework_MockObject_MockObject | Session $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config])
			->setMethods([
				'getUser'
			])
			->getMock();
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())->method('isEnabled')->willReturn(true);
		$userSession->expects($this->once())
			->method('getUser')
			->will($this->returnValue($isLoggedIn ? $user : null));
		$this->assertEquals($isLoggedIn, $userSession->isLoggedIn());
	}

	public function testSetUser() {
		$session = $this->createMock('\OC\Session\Memory');
		$session->expects($this->once())
			->method('set')
			->with('user_id', 'foo');

		$manager = $this->createMock('\OC\User\Manager');

		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
			->method('getUID')
			->will($this->returnValue('foo'));

		$userSession = new \OC\User\Session($manager, $session, $this->timeFactory, $this->tokenProvider, $this->config);
		$userSession->setUser($user);
	}

	public function testLoginValidPasswordEnabled() {
		$session = $this->createMock('\OC\Session\Memory');
		$session->expects($this->once())
			->method('regenerateId');
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('bar')
			->will($this->throwException(new \OC\Authentication\Exceptions\InvalidTokenException()));
		$session->expects($this->exactly(2))
			->method('set')
			->with($this->callback(function ($key) {
					switch ($key) {
						case 'user_id':
						case 'loginname':
							return true;
							break;
						default:
							return false;
							break;
					}
				}, 'foo'));

		$managerMethods = get_class_methods('\OC\User\Manager');
		//keep following methods intact in order to ensure hooks are
		//working
		$doNotMock = ['__construct', 'emit', 'listen'];
		foreach ($doNotMock as $methodName) {
			$i = array_search($methodName, $managerMethods, true);
			if ($i !== false) {
				unset($managerMethods[$i]);
			}
		}
//		$manager = $this->getMockBuilder('\OC\User\Manager')
//			->setMethods($managerMethods)
//			->getMock();

		$manager = $this->createMock(Manager::class);
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())
			->method('isEnabled')
			->will($this->returnValue(true));
		$user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('foo'));
		$user->expects($this->once())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('checkPassword')
			->with('foo', 'bar')
			->will($this->returnValue($user));

		$userSession = $this->getMockBuilder('\OC\User\Session')
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config])
			->setMethods([
				'prepareUserLogin'
			])
			->getMock();
		$userSession->expects($this->once())
			->method('prepareUserLogin');
		$userSession->login('foo', 'bar');
		$this->assertEquals($user, $userSession->getUser());
	}

	/**
	 * @expectedException \OC\User\LoginException
	 */
	public function testLoginValidPasswordDisabled() {
		$session = $this->createMock('\OC\Session\Memory');
		$session->expects($this->never())
			->method('set');
		$session->expects($this->once())
			->method('regenerateId');
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('bar')
			->will($this->throwException(new \OC\Authentication\Exceptions\InvalidTokenException()));

		$manager = $this->createMock('\OC\User\Manager');

		$user = $this->createMock(IUser::class);
		$user->expects($this->any())
			->method('isEnabled')
			->will($this->returnValue(false));
		$user->expects($this->never())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('checkPassword')
			->with('foo', 'bar')
			->will($this->returnValue($user));

		$userSession = new \OC\User\Session($manager, $session, $this->timeFactory, $this->tokenProvider, $this->config);
		$userSession->login('foo', 'bar');
	}

	public function testLoginInvalidPassword() {
		$session = $this->createMock('\OC\Session\Memory');
		$manager = $this->createMock('\OC\User\Manager');
		$userSession = new \OC\User\Session($manager, $session, $this->timeFactory, $this->tokenProvider, $this->config);

		$user = $this->createMock(IUser::class);

		$session->expects($this->never())
			->method('set');
		$session->expects($this->once())
			->method('regenerateId');
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('bar')
			->will($this->throwException(new \OC\Authentication\Exceptions\InvalidTokenException()));

		$user->expects($this->never())
			->method('isEnabled');
		$user->expects($this->never())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('checkPassword')
			->with('foo', 'bar')
			->will($this->returnValue(false));

		$userSession->login('foo', 'bar');
	}

	public function testLoginNonExisting() {
		$session = $this->createMock('\OC\Session\Memory');
		$manager = $this->createMock('\OC\User\Manager');
		$userSession = new \OC\User\Session($manager, $session, $this->timeFactory, $this->tokenProvider, $this->config);

		$session->expects($this->never())
			->method('set');
		$session->expects($this->once())
			->method('regenerateId');
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('bar')
			->will($this->throwException(new \OC\Authentication\Exceptions\InvalidTokenException()));

		$manager->expects($this->once())
			->method('checkPassword')
			->with('foo', 'bar')
			->will($this->returnValue(false));

		$userSession->login('foo', 'bar');
	}

	/**
	 * When using a device token, the loginname must match the one that was used
	 * when generating the token on the browser.
	 */
	public function testLoginWithDifferentTokenLoginName() {
		$session = $this->createMock('\OC\Session\Memory');
		$manager = $this->createMock('\OC\User\Manager');
		$userSession = new \OC\User\Session($manager, $session, $this->timeFactory, $this->tokenProvider, $this->config);
		$username = 'user123';
		$token = new DefaultToken();
		$token->setLoginName($username);

		$session->expects($this->never())
			->method('set');
		$session->expects($this->once())
			->method('regenerateId');
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('bar')
			->will($this->returnValue($token));

		$manager->expects($this->once())
			->method('checkPassword')
			->with('foo', 'bar')
			->will($this->returnValue(false));

		$userSession->login('foo', 'bar');
	}

	/**
	 * @expectedException \OC\Authentication\Exceptions\PasswordLoginForbiddenException
	 */
	public function testLogClientInNoTokenPasswordWith2fa() {
		$manager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$session = $this->createMock('\OCP\ISession');
		$request = $this->createMock('\OCP\IRequest');
		$user = $this->createMock('\OCP\IUser');

		/** @var \OC\User\Session $userSession */
		$userSession = $this->getMockBuilder('\OC\User\Session')
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config])
			->setMethods(['login', 'supportsCookies', 'createSessionToken', 'getUser'])
			->getMock();

		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('doe')
			->will($this->throwException(new \OC\Authentication\Exceptions\InvalidTokenException()));
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('token_auth_enforced', false)
			->will($this->returnValue(true));

		$userSession->logClientIn('john', 'doe', $request);
	}

	public function testLogClientInUnexist() {
		$manager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$session = $this->createMock('\OCP\ISession');
		$request = $this->createMock('\OCP\IRequest');
		$user = $this->createMock('\OCP\IUser');

		/** @var \OC\User\Session $userSession */
		$userSession = $this->getMockBuilder('\OC\User\Session')
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config])
			->setMethods(['login', 'supportsCookies', 'createSessionToken', 'getUser'])
			->getMock();

		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('doe')
			->will($this->throwException(new \OC\Authentication\Exceptions\InvalidTokenException()));
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('token_auth_enforced', false)
			->will($this->returnValue(false));

		$this->assertFalse($userSession->logClientIn('unexist', 'doe', $request));
	}

	public function testLogClientInWithTokenPassword() {
		$manager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$session = $this->createMock('\OCP\ISession');
		$request = $this->createMock('\OCP\IRequest');
		$user = $this->createMock('\OCP\IUser');

		/** @var \OC\User\Session $userSession */
		$userSession = $this->getMockBuilder('\OC\User\Session')
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config])
			->setMethods(['isTokenPassword', 'login', 'supportsCookies', 'createSessionToken', 'getUser'])
			->getMock();

		$userSession->expects($this->once())
			->method('isTokenPassword')
			->will($this->returnValue(true));
		$userSession->expects($this->once())
			->method('login')
			->with('john', 'I-AM-AN-APP-PASSWORD')
			->will($this->returnValue(true));

		$session->expects($this->once())
			->method('set')
			->with('app_password', 'I-AM-AN-APP-PASSWORD');

		$this->assertTrue($userSession->logClientIn('john', 'I-AM-AN-APP-PASSWORD', $request));
	}

	/**
	 * @expectedException \OC\Authentication\Exceptions\PasswordLoginForbiddenException
	 */
	public function testLogClientInNoTokenPasswordNo2fa() {
		$manager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$session = $this->createMock('\OCP\ISession');
		$user = $this->createMock('\OCP\IUser');
		$request = $this->createMock('\OCP\IRequest');

		/** @var \OC\User\Session $userSession */
		$userSession = $this->getMockBuilder('\OC\User\Session')
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config])
			->setMethods(['login', 'isTwoFactorEnforced'])
			->getMock();

		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('doe')
			->will($this->throwException(new \OC\Authentication\Exceptions\InvalidTokenException()));
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('token_auth_enforced', false)
			->will($this->returnValue(false));

		$userSession->expects($this->once())
			->method('isTwoFactorEnforced')
			->with('john')
			->will($this->returnValue(true));

		$userSession->logClientIn('john', 'doe', $request);
	}

	public function testRememberLoginValidToken() {
		$session = $this->createMock('\OC\Session\Memory');
		$session->expects($this->exactly(1))
			->method('set')
			->with($this->callback(function ($key) {
					switch ($key) {
						case 'user_id':
							return true;
						default:
							return false;
					}
				}, 'foo'));
		$session->expects($this->once())
			->method('regenerateId');

		$manager = $this->createMock(Manager::class);
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('foo'));
		$user->expects($this->once())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('get')
			->with('foo')
			->will($this->returnValue($user));

		//prepare login token
		$token = 'goodToken';
		\OC::$server->getConfig()->setUserValue('foo', 'login_token', $token, time());

		/** @var Session | \PHPUnit_Framework_MockObject_MockObject $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			//override, otherwise tests will fail because of setcookie()
			->setMethods(['setMagicInCookie'])
			//there  are passed as parameters to the constructor
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config])
			->getMock();

		$granted = $userSession->loginWithCookie('foo', $token);

		$this->assertSame($granted, true);
	}

	public function testRememberLoginInvalidToken() {
		$session = $this->createMock('\OC\Session\Memory');
		$session->expects($this->never())
			->method('set');
		$session->expects($this->once())
			->method('regenerateId');

		$manager = $this->createMock(Manager::class);
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('foo'));
		$user->expects($this->never())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('get')
			->with('foo')
			->will($this->returnValue($user));

		//prepare login token
		$token = 'goodToken';
		\OC::$server->getConfig()->setUserValue('foo', 'login_token', $token, time());

		$userSession = new \OC\User\Session($manager, $session, $this->timeFactory, $this->tokenProvider, $this->config);
		$granted = $userSession->loginWithCookie('foo', 'badToken');

		$this->assertSame($granted, false);
	}

	public function testRememberLoginInvalidUser() {
//		$session = $this->createMock('\OC\Session\Memory', array(), array(''));
		$session = $this->createMock('\OC\Session\Memory');
		$session->expects($this->never())
			->method('set');
		$session->expects($this->once())
			->method('regenerateId');

		$manager = $this->createMock(Manager::class);
		$user = $this->createMock(IUser::class);

		$user->expects($this->never())
			->method('getUID');
		$user->expects($this->never())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('get')
			->with('foo')
			->will($this->returnValue(null));

		//prepare login token
		$token = 'goodToken';
		\OC::$server->getConfig()->setUserValue('foo', 'login_token', $token, time());

		$userSession = new \OC\User\Session($manager, $session, $this->timeFactory, $this->tokenProvider, $this->config);
		$granted = $userSession->loginWithCookie('foo', $token);

		$this->assertSame($granted, false);
	}

	public function testActiveUserAfterSetSession() {
		$user1 = $this->createMock(IUser::class);
		$user2 = $this->createMock(IUser::class);
		$users = [
			'foo' => $user1,
			'bar' => $user2
		];

		$manager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();

		$manager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) use ($users) {
					return $users[$uid];
				}));

		$session = new Memory('');
		$session->set('user_id', 'foo');
		/** @var Session | \PHPUnit_Framework_MockObject_MockObject $userSession */
		$userSession = $this->getMockBuilder('\OC\User\Session')
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config])
			->setMethods([
				'validateSession'
			])
			->getMock();
		$userSession->expects($this->any())
			->method('validateSession');

		$this->assertEquals($users['foo'], $userSession->getUser());

		$session2 = new Memory('');
		$session2->set('user_id', 'bar');
		$userSession->setSession($session2);
		$this->assertEquals($users['bar'], $userSession->getUser());
	}

	public function testCreateSessionToken() {
		$manager = $this->createMock(Manager::class);
		$session = $this->createMock('\OCP\ISession');
		$user = $this->createMock('\OCP\IUser');
		$userSession = new \OC\User\Session($manager, $session, $this->timeFactory, $this->tokenProvider, $this->config);

		$random = $this->createMock('\OCP\Security\ISecureRandom');
		$config = $this->createMock('\OCP\IConfig');
		$csrf = $this->getMockBuilder('\OC\Security\CSRF\CsrfTokenManager')
			->disableOriginalConstructor()
			->getMock();
		$request = new \OC\AppFramework\Http\Request([
			'server' => [
				'HTTP_USER_AGENT' => 'Firefox',
			]
		], $random, $config, $csrf);

		$uid = 'user123';
		$loginName = 'User123';
		$password = 'passme';
		$sessionId = 'abcxyz';

		$manager->expects($this->once())
			->method('get')
			->with($uid)
			->will($this->returnValue($user));
		$session->expects($this->once())
			->method('getId')
			->will($this->returnValue($sessionId));
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with($password)
			->will($this->throwException(new \OC\Authentication\Exceptions\InvalidTokenException()));
		
		$this->tokenProvider->expects($this->once())
			->method('generateToken')
			->with($sessionId, $uid, $loginName, $password, 'Firefox');

		$this->assertTrue($userSession->createSessionToken($request, $uid, $loginName, $password));
	}

	public function testCreateSessionTokenWithTokenPassword() {
		$manager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$session = $this->createMock('\OCP\ISession');
		$token = $this->createMock('\OC\Authentication\Token\IToken');
		$user = $this->createMock('\OCP\IUser');
		$userSession = new \OC\User\Session($manager, $session, $this->timeFactory, $this->tokenProvider, $this->config);

		$random = $this->createMock('\OCP\Security\ISecureRandom');
		$config = $this->createMock('\OCP\IConfig');
		$csrf = $this->getMockBuilder('\OC\Security\CSRF\CsrfTokenManager')
			->disableOriginalConstructor()
			->getMock();
		$request = new \OC\AppFramework\Http\Request([
			'server' => [
				'HTTP_USER_AGENT' => 'Firefox',
			]
		], $random, $config, $csrf);

		$uid = 'user123';
		$loginName = 'User123';
		$password = 'iamatoken';
		$realPassword = 'passme';
		$sessionId = 'abcxyz';

		$manager->expects($this->once())
			->method('get')
			->with($uid)
			->will($this->returnValue($user));
		$session->expects($this->once())
			->method('getId')
			->will($this->returnValue($sessionId));
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with($password)
			->will($this->returnValue($token));
		$this->tokenProvider->expects($this->once())
			->method('getPassword')
			->with($token, $password)
			->will($this->returnValue($realPassword));
		
		$this->tokenProvider->expects($this->once())
			->method('generateToken')
			->with($sessionId, $uid, $loginName, $realPassword, 'Firefox');

		$this->assertTrue($userSession->createSessionToken($request, $uid, $loginName, $password));
	}

	public function testCreateSessionTokenWithNonExistentUser() {
		$manager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$session = $this->createMock('\OCP\ISession');
		$userSession = new \OC\User\Session($manager, $session, $this->timeFactory, $this->tokenProvider, $this->config);
		$request = $this->createMock('\OCP\IRequest');

		$uid = 'user123';
		$loginName = 'User123';
		$password = 'passme';

		$manager->expects($this->once())
			->method('get')
			->with($uid)
			->will($this->returnValue(null));
		
		$this->assertFalse($userSession->createSessionToken($request, $uid, $loginName, $password));
	}

	/**
	 * @expectedException \OC\User\LoginException
	 */
	public function testTryTokenLoginWithDisabledUser() {
		$manager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$session = new Memory('');
		$token = new DefaultToken();
		$token->setLoginName('fritz');
		$token->setUid('fritz0');
		$token->setLastCheck(100); // Needs check
		$user = $this->createMock('\OCP\IUser');
		$userSession = $this->getMockBuilder('\OC\User\Session')
			->setMethods(['logout'])
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config])
			->getMock();
		$request = $this->createMock('\OCP\IRequest');

		$request->expects($this->once())
			->method('getHeader')
			->with('Authorization')
			->will($this->returnValue('token xxxxx'));
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('xxxxx')
			->will($this->returnValue($token));
		$manager->expects($this->once())
			->method('get')
			->with('fritz0')
			->will($this->returnValue($user));
		$user->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(false));

		$userSession->tryTokenLogin($request);
	}

	public function testValidateSessionDisabledUser() {
		$userManager = $this->createMock('\OCP\IUserManager');
		$session = $this->createMock('\OCP\ISession');
		$timeFactory = $this->createMock('\OCP\AppFramework\Utility\ITimeFactory');
		$tokenProvider = $this->createMock('\OC\Authentication\Token\IProvider');
		$userSession = $this->getMockBuilder('\OC\User\Session')
			->setConstructorArgs([$userManager, $session, $timeFactory, $tokenProvider, $this->config])
			->setMethods(['logout'])
			->getMock();

		$user = $this->createMock('\OCP\IUser');
		$token = new DefaultToken();
		$token->setLoginName('susan');
		$token->setLastCheck(20);

		$session->expects($this->once())
			->method('get')
			->with('app_password')
			->will($this->returnValue('APP-PASSWORD'));
		$tokenProvider->expects($this->once())
			->method('getToken')
			->with('APP-PASSWORD')
			->will($this->returnValue($token));
		$timeFactory->expects($this->once())
			->method('getTime')
			->will($this->returnValue(1000)); // more than 5min since last check
		$tokenProvider->expects($this->once())
			->method('getPassword')
			->with($token, 'APP-PASSWORD')
			->will($this->returnValue('123456'));
		$userManager->expects($this->once())
			->method('checkPassword')
			->with('susan', '123456')
			->will($this->returnValue(true));
		$user->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(false));
		$tokenProvider->expects($this->once())
			->method('invalidateToken')
			->with('APP-PASSWORD');
		$userSession->expects($this->once())
			->method('logout');

		$userSession->setUser($user);
		$this->invokePrivate($userSession, 'validateSession');
	}

	public function testValidateSessionNoPassword() {
		$userManager = $this->createMock('\OCP\IUserManager');
		$session = $this->createMock('\OCP\ISession');
		$timeFactory = $this->createMock('\OCP\AppFramework\Utility\ITimeFactory');
		$tokenProvider = $this->createMock('\OC\Authentication\Token\IProvider');
		$userSession = $this->getMockBuilder('\OC\User\Session')
			->setConstructorArgs([$userManager, $session, $timeFactory, $tokenProvider, $this->config])
			->setMethods(['logout'])
			->getMock();

		$user = $this->createMock('\OCP\IUser');
		$token = new DefaultToken();
		$token->setLastCheck(20);

		$session->expects($this->once())
			->method('get')
			->with('app_password')
			->will($this->returnValue('APP-PASSWORD'));
		$tokenProvider->expects($this->once())
			->method('getToken')
			->with('APP-PASSWORD')
			->will($this->returnValue($token));
		$timeFactory->expects($this->once())
			->method('getTime')
			->will($this->returnValue(1000)); // more than 5min since last check
		$tokenProvider->expects($this->once())
			->method('getPassword')
			->with($token, 'APP-PASSWORD')
			->will($this->throwException(new \OC\Authentication\Exceptions\PasswordlessTokenException()));
		$tokenProvider->expects($this->once())
			->method('updateToken')
			->with($token);

		$this->invokePrivate($userSession, 'validateSession', [$user]);

		$this->assertEquals(1000, $token->getLastCheck());
	}

	public function testUpdateSessionTokenPassword() {
		$userManager = $this->createMock('\OCP\IUserManager');
		$session = $this->createMock('\OCP\ISession');
		$timeFactory = $this->createMock('\OCP\AppFramework\Utility\ITimeFactory');
		$tokenProvider = $this->createMock('\OC\Authentication\Token\IProvider');
		$userSession = new \OC\User\Session($userManager, $session, $timeFactory, $tokenProvider, $this->config);

		$password = '123456';
		$sessionId ='session1234';
		$token = new DefaultToken();

		$session->expects($this->once())
			->method('getId')
			->will($this->returnValue($sessionId));
		$tokenProvider->expects($this->once())
			->method('getToken')
			->with($sessionId)
			->will($this->returnValue($token));
		$tokenProvider->expects($this->once())
			->method('setPassword')
			->with($token, $sessionId, $password);

		$userSession->updateSessionTokenPassword($password);
	}

	public function testUpdateSessionTokenPasswordNoSessionAvailable() {
		$userManager = $this->createMock('\OCP\IUserManager');
		$session = $this->createMock('\OCP\ISession');
		$timeFactory = $this->createMock('\OCP\AppFramework\Utility\ITimeFactory');
		$tokenProvider = $this->createMock('\OC\Authentication\Token\IProvider');
		$userSession = new \OC\User\Session($userManager, $session, $timeFactory, $tokenProvider, $this->config);

		$session->expects($this->once())
			->method('getId')
			->will($this->throwException(new \OCP\Session\Exceptions\SessionNotAvailableException()));

		$userSession->updateSessionTokenPassword('1234');
	}

	public function testUpdateSessionTokenPasswordInvalidTokenException() {
		$userManager = $this->createMock('\OCP\IUserManager');
		$session = $this->createMock('\OCP\ISession');
		$timeFactory = $this->createMock('\OCP\AppFramework\Utility\ITimeFactory');
		$tokenProvider = $this->createMock('\OC\Authentication\Token\IProvider');
		$userSession = new \OC\User\Session($userManager, $session, $timeFactory, $tokenProvider, $this->config);

		$password = '123456';
		$sessionId ='session1234';
		$token = new DefaultToken();

		$session->expects($this->once())
			->method('getId')
			->will($this->returnValue($sessionId));
		$tokenProvider->expects($this->once())
			->method('getToken')
			->with($sessionId)
			->will($this->returnValue($token));
		$tokenProvider->expects($this->once())
			->method('setPassword')
			->with($token, $sessionId, $password)
			->will($this->throwException(new \OC\Authentication\Exceptions\InvalidTokenException()));

		$userSession->updateSessionTokenPassword($password);
	}

}
