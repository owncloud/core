<?php

/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\User;

use OC\AppFramework\Http\Request;
use OC\Authentication\Exceptions\InvalidTokenException;
use OC\Authentication\Exceptions\PasswordlessTokenException;
use OC\Authentication\Exceptions\PasswordLoginForbiddenException;
use OC\Authentication\Token\DefaultToken;
use OC\Authentication\Token\DefaultTokenProvider;
use OC\Authentication\Token\IProvider;
use OC\Authentication\Token\IToken;
use OC\Security\CSRF\CsrfTokenManager;
use OC\Session\Memory;

use OC\User\LoginException;
use OC\User\Manager;
use OC\User\Session;
use OC\User\SyncService;
use OCP\App\IServiceLoader;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\Authentication\IAuthModule;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IRequest;
use OCP\ISession;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Security\ISecureRandom;
use OCP\Session\Exceptions\SessionNotAvailableException;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;
use Test\TestCase;
use OCP\Authentication\IApacheBackend;
use OCP\UserInterface;

/**
 * @group DB
 * @package Test\User
 */
class SessionTest extends TestCase {

	/** @var ITimeFactory | MockObject */
	private $timeFactory;

	/** @var DefaultTokenProvider | MockObject */
	protected $tokenProvider;

	/** @var IConfig | MockObject */
	private $config;
	/** @var ILogger | MockObject */
	private $logger;
	/** @var IServiceLoader */
	private $serviceLoader;
	/** @var SyncService */
	protected $userSyncService;
	/** @var  EventDispatcher */
	protected $eventDispatcher;

	protected function setUp(): void {
		parent::setUp();

		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->timeFactory
			->method('getTime')
			->willReturn(10000);
		$this->tokenProvider = $this->createMock(IProvider::class);
		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->serviceLoader = $this->createMock(IServiceLoader::class);
		$this->userSyncService = $this->createMock(SyncService::class);
		$this->eventDispatcher = new EventDispatcher();
	}

	public function testGetUser(): void {
		$token = new DefaultToken();
		$token->setLoginName('User123');
		$token->setLastCheck(200);

		/** @var IUser | MockObject $expectedUser */
		$expectedUser = $this->createMock(IUser::class);
		$expectedUser
			->method('getUID')
			->willReturn('user123');
		/** @var Memory | MockObject $session */
		$session = $this->createMock(Memory::class);
		$session->expects($this->at(0))
			->method('get')
			->with('user_id')
			->willReturn($expectedUser->getUID());
		$sessionId = 'abcdef12345';

		/** @var Manager | MockObject $manager */
		$manager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();
		$session->expects($this->at(1))
			->method('get')
			->with('app_password')
			->willReturn(null); // No password set -> browser session
		$session->expects($this->once())
			->method('getId')
			->willReturn($sessionId);
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with($sessionId)
			->willReturn($token);
		$this->tokenProvider->expects($this->once())
			->method('getPassword')
			->with($token, $sessionId)
			->willReturn('passme');
		$manager->expects($this->once())
			->method('checkPassword')
			->with('User123', 'passme')
			->willReturn(true);
		$expectedUser->expects($this->once())
			->method('isEnabled')
			->willReturn(true);

		$this->tokenProvider->expects($this->once())
			->method('updateTokenActivity')
			->with($token);

		$manager
			->method('get')
			->with($expectedUser->getUID())
			->willReturn($expectedUser);

		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);
		$user = $userSession->getUser();
		$this->assertSame($expectedUser, $user);
		$userSession->validateSession();
		$this->assertSame(10000, $token->getLastCheck());
	}

	public function isLoggedInData(): array {
		return [
			'User is logged in' => [true],
			'User is not logged in' => [false],
		];
	}

	/**
	 * @dataProvider isLoggedInData
	 * @param $isLoggedIn
	 */
	public function testIsLoggedIn($isLoggedIn): void {
		$session = $this->createMock(Memory::class);

		$manager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();

		/** @var MockObject | Session $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $this->eventDispatcher])
			->setMethods([
				'getUser'
			])
			->getMock();
		$user = $this->createMock(IUser::class);
		$user->method('isEnabled')->willReturn(true);
		$userSession->expects($this->once())
			->method('getUser')
			->willReturn($isLoggedIn ? $user : null);
		$this->assertEquals($isLoggedIn, $userSession->isLoggedIn());
	}

	public function testSetUser(): void {
		/** @var ISession | MockObject $session */
		$session = $this->createMock(Memory::class);
		$session->expects($this->once())
			->method('set')
			->with('user_id', 'foo');

		/** @var Manager $manager */
		$manager = $this->createMock(Manager::class);

		/** @var IUser | MockObject $user */
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
			->method('getUID')
			->willReturn('foo');

		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);
		$userSession->setUser($user);
	}

	public function testLoginValidPasswordEnabled(): void {
		$session = $this->createMock(Memory::class);
		$session->expects($this->once())
			->method('regenerateId');
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('bar')
			->will($this->throwException(new InvalidTokenException()));
		$session->expects($this->exactly(2))
			->method('set')
			->with($this->callback(function ($key) {
				switch ($key) {
						case 'user_id':
						case 'loginname':
							return true;
						default:
							return false;
					}
			}));

		$managerMethods = \get_class_methods(Manager::class);
		//keep following methods intact in order to ensure hooks are
		//working
		$doNotMock = ['__construct', 'emit', 'listen'];
		foreach ($doNotMock as $methodName) {
			$i = \array_search($methodName, $managerMethods, true);
			if ($i !== false) {
				unset($managerMethods[$i]);
			}
		}
//		$manager = $this->getMockBuilder(Manager::class)
//			->setMethods($managerMethods)
//			->getMock();

		$manager = $this->createMock(Manager::class);
		$user = $this->createMock(IUser::class);
		$user
			->method('isEnabled')
			->willReturn(true);
		$user
			->method('getUID')
			->willReturn('foo');
		$user->expects($this->once())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('checkPassword')
			->with('foo', 'bar')
			->willReturn($user);

		/** @var $eventDispatcher | \PHPUnit\Framework\MockObject\MockObject */
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		/** @var Session | MockObject $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $eventDispatcher])
			->setMethods([
				'prepareUserLogin'
			])
			->getMock();
		$userSession->expects($this->once())
			->method('prepareUserLogin');
		$beforeEvent = new GenericEvent(
			null,
			['loginType' => 'password', 'login' => 'foo', 'uid' => 'foo',
				'_uid' => 'deprecated: please use \'login\', the real uid is not yet known',
				'password' => 'bar']
		);
		$afterEvent = new GenericEvent(
			null,
			['loginType' => 'password', 'user' => $user,
				'uid' => 'foo', 'password' => 'bar'
			]
		);
		$eventDispatcher->expects($this->exactly(2))
			->method('dispatch')
			->withConsecutive(
				[$this->equalTo($beforeEvent), $this->equalTo('user.beforelogin')],
				[$this->equalTo($afterEvent), $this->equalTo('user.afterlogin')]
			);
		$userSession->login('foo', 'bar');
	}

	/**
	 */
	public function testLoginValidPasswordDisabled(): void {
		$this->expectException(LoginException::class);

		/** @var ISession | MockObject $session */
		$session = $this->createMock(Memory::class);
		$session->expects($this->never())
			->method('set');
		$session->expects($this->once())
			->method('regenerateId');
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('bar')
			->will($this->throwException(new InvalidTokenException()));

		/** @var Manager | MockObject $manager */
		$manager = $this->createMock(Manager::class);

		$user = $this->createMock(IUser::class);
		$user
			->method('isEnabled')
			->willReturn(false);
		$user->expects($this->never())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('checkPassword')
			->with('foo', 'bar')
			->willReturn($user);

		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);
		$userSession->login('foo', 'bar');
	}

	public function testLoginInvalidPassword(): void {
		/** @var ISession | MockObject $session */
		$session = $this->createMock(Memory::class);
		/** @var Manager | MockObject $manager */
		$manager = $this->createMock(Manager::class);
		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);

		$user = $this->createMock(IUser::class);

		$session->expects($this->never())
			->method('set');
		$session->expects($this->once())
			->method('regenerateId');
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('bar')
			->will($this->throwException(new InvalidTokenException()));

		$user->expects($this->never())
			->method('isEnabled');
		$user->expects($this->never())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('checkPassword')
			->with('foo', 'bar')
			->willReturn(false);

		$userSession->login('foo', 'bar');
	}

	public function testLoginNonExisting(): void {
		/** @var ISession | MockObject $session */
		$session = $this->createMock(Memory::class);
		/** @var Manager | MockObject $manager */
		$manager = $this->createMock(Manager::class);
		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);

		$session->expects($this->never())
			->method('set');
		$session->expects($this->once())
			->method('regenerateId');
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('bar')
			->will($this->throwException(new InvalidTokenException()));

		$manager->expects($this->once())
			->method('checkPassword')
			->with('foo', 'bar')
			->willReturn(false);

		$userSession->login('foo', 'bar');
	}

	/**
	 * When using a device token, the loginname must match the one that was used
	 * when generating the token on the browser.
	 */
	public function testLoginWithDifferentTokenLoginName(): void {
		/** @var ISession | MockObject $session */
		$session = $this->createMock(Memory::class);
		/** @var Manager | MockObject $manager */
		$manager = $this->createMock(Manager::class);
		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);
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
			->willReturn($token);

		$manager->expects($this->once())
			->method('checkPassword')
			->with('foo', 'bar')
			->willReturn(false);

		$userSession->login('foo', 'bar');
	}

	/**
	 */
	public function testLogClientInNoTokenPasswordWith2fa(): void {
		$this->expectException(PasswordLoginForbiddenException::class);

		$manager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();
		$session = $this->createMock(ISession::class);
		/** @var IRequest | MockObject $request */
		$request = $this->createMock(IRequest::class);
		$request->method('getRemoteAddress')->willReturn('12.34.56.78');

		/** @var EventDispatcher | MockObject $eventDispatcher */
		$eventDispatcher = $this->createMock(EventDispatcher::class);

		/** @var Session $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $eventDispatcher])
			->setMethods(['login', 'supportsCookies', 'createSessionToken', 'getUser'])
			->getMock();

		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('doe')
			->will($this->throwException(new InvalidTokenException()));
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('token_auth_enforced', false)
			->willReturn(true);
		$this->logger->expects($this->once())->method('warning')->with("Login failed: 'john' (Remote IP: '12.34.56.78')");
		$eventDispatcher->expects($this->once())->method('dispatch')->with(new GenericEvent(null, ['user' => 'john']), 'user.loginfailed');

		$userSession->logClientIn('john', 'doe', $request);
	}

	public function dataLogClientInUnexist(): array {
		return [
			[false, 2],
			[true, 0],
		];
	}

	/**
	 * @dataProvider dataLogClientInUnexist
	 * @param $strictLoginCheck
	 * @param $expectedGetByEmailCalls
	 */
	public function testLogClientInUnexist($strictLoginCheck, $expectedGetByEmailCalls): void {
		$manager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();
		$session = $this->createMock(ISession::class);
		/** @var IRequest | MockObject $request */
		$request = $this->createMock(IRequest::class);

		/** @var Session $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $this->eventDispatcher])
			->setMethods(['login', 'supportsCookies', 'createSessionToken', 'getUser'])
			->getMock();

		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('doe')
			->will($this->throwException(new InvalidTokenException()));
		$this->config->expects($this->at(0))
			->method('getSystemValue')
			->with('token_auth_enforced', false)
			->willReturn(false);
		$this->config->expects($this->at(1))
			->method('getSystemValue')
			->with('strict_login_enforced', false)
			->willReturn($strictLoginCheck);
		$this->config->expects($this->at(2))
			->method('getSystemValue')
			->with('strict_login_enforced', false)
			->willReturn($strictLoginCheck);
		$manager->expects($this->exactly($expectedGetByEmailCalls))
			->method('getByEmail')
			->willReturn([]);

		$this->assertFalse($userSession->logClientIn('unexist', 'doe', $request));
	}

	public function testLogClientInWithTokenPassword(): void {
		$manager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();
		$session = $this->createMock(ISession::class);
		/** @var IRequest | MockObject $request */
		$request = $this->createMock(IRequest::class);

		/** @var Session | MockObject $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $this->eventDispatcher])
			->setMethods(['isTokenPassword', 'login', 'supportsCookies', 'createSessionToken', 'getUser'])
			->getMock();

		$userSession->expects($this->once())
			->method('isTokenPassword')
			->willReturn(true);
		$userSession->expects($this->once())
			->method('login')
			->with('john', 'I-AM-AN-APP-PASSWORD')
			->willReturn(true);

		$session->expects($this->once())
			->method('set')
			->with('app_password', 'I-AM-AN-APP-PASSWORD');

		$this->assertTrue($userSession->logClientIn('john', 'I-AM-AN-APP-PASSWORD', $request));
	}

	/**
	 */
	public function testLogClientInNoTokenPasswordNo2fa(): void {
		$this->expectException(PasswordLoginForbiddenException::class);

		$manager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();
		$session = $this->createMock(ISession::class);
		/** @var IRequest | MockObject $request */
		$request = $this->createMock(IRequest::class);
		$request->method('getRemoteAddress')->willReturn('12.34.56.78');

		/** @var EventDispatcher | MockObject $eventDispatcher */
		$eventDispatcher = $this->createMock(EventDispatcher::class);

		/** @var Session | MockObject $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $eventDispatcher])
			->setMethods(['login', 'isTwoFactorEnforced'])
			->getMock();

		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('doe')
			->will($this->throwException(new InvalidTokenException()));
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('token_auth_enforced', false)
			->willReturn(false);

		$userSession->expects($this->once())
			->method('isTwoFactorEnforced')
			->with('john')
			->willReturn(true);
		$this->logger->expects($this->once())->method('warning')->with("Login failed: 'john' (Remote IP: '12.34.56.78')");
		$eventDispatcher->expects($this->once())->method('dispatch')->with(new GenericEvent(null, ['user' => 'john']), 'user.loginfailed');

		$userSession->logClientIn('john', 'doe', $request);
	}

	public function testRememberLoginValidToken(): void {
		$session = $this->createMock(Memory::class);
		$session->expects($this->once())
			->method('set')
			->with($this->callback(function ($key) {
				return $key === 'user_id';
			}));
		$session->expects($this->once())
			->method('regenerateId');

		$manager = $this->createMock(Manager::class);
		$user = $this->createMock(IUser::class);
		$user
			->method('getUID')
			->willReturn('foo');
		$user->expects($this->once())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn($user);

		//prepare login token
		$token = 'goodToken';
		\OC::$server->getConfig()->setUserValue('foo', 'login_token', $token, \time());

		/** @var Session | MockObject $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			//override, otherwise tests will fail because of setcookie()
			->setMethods(['setMagicInCookie'])
			//there  are passed as parameters to the constructor
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $this->eventDispatcher])
			->getMock();

		$granted = $userSession->loginWithCookie('foo', $token);

		$this->assertTrue($granted);
	}

	public function testRememberLoginInvalidToken(): void {
		/** @var ISession | MockObject $session */
		$session = $this->createMock(Memory::class);
		$session->expects($this->never())
			->method('set');
		$session->expects($this->once())
			->method('regenerateId');

		/** @var Manager | MockObject $manager */
		$manager = $this->createMock(Manager::class);
		$user = $this->createMock(IUser::class);
		$user
			->method('getUID')
			->willReturn('foo');
		$user->expects($this->never())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn($user);

		//prepare login token
		$token = 'goodToken';
		\OC::$server->getConfig()->setUserValue('foo', 'login_token', $token, \time());

		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);

		$calledLoginFailedEvent = [];
		$this->eventDispatcher->addListener(
			'user.loginfailed',
			function (GenericEvent $event) use (&$calledLoginFailedEvent) {
				$calledLoginFailedEvent[] = 'user.loginfailed';
				$calledLoginFailedEvent[] = $event;
			}
		);

		$granted = $userSession->loginWithCookie('foo', 'badToken');

		$this->assertFalse($granted);
		$this->assertEquals('user.loginfailed', $calledLoginFailedEvent[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledLoginFailedEvent[1]);
		$this->assertArrayHasKey('user', $calledLoginFailedEvent[1]);
		$this->assertEquals('foo', $calledLoginFailedEvent[1]->getArgument('user'));
	}

	public function testRememberLoginInvalidUser(): void {
		/** @var ISession | MockObject $session */
		$session = $this->createMock(Memory::class);
		$session->expects($this->never())
			->method('set');
		$session->expects($this->once())
			->method('regenerateId');

		/** @var Manager | MockObject $manager */
		$manager = $this->createMock(Manager::class);
		$user = $this->createMock(IUser::class);

		$user->expects($this->never())
			->method('getUID');
		$user->expects($this->never())
			->method('updateLastLoginTimestamp');

		$manager->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn(null);

		//prepare login token
		$token = 'goodToken';
		\OC::$server->getConfig()->setUserValue('foo', 'login_token', $token, \time());

		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);
		$granted = $userSession->loginWithCookie('foo', $token);

		$this->assertFalse($granted);
	}

	public function testActiveUserAfterSetSession(): void {
		$user1 = $this->createMock(IUser::class);
		$user2 = $this->createMock(IUser::class);
		$users = [
			'foo' => $user1,
			'bar' => $user2
		];

		$manager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();

		$manager
			->method('get')
			->willReturnCallback(function ($uid) use ($users) {
				return $users[$uid];
			});

		$session = new Memory();
		$session->set('user_id', 'foo');
		/** @var Session | MockObject $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $this->eventDispatcher])
			->setMethods([
				'validateSession'
			])
			->getMock();
		$userSession
			->method('validateSession');

		$this->assertEquals($users['foo'], $userSession->getUser());

		$session2 = new Memory();
		$session2->set('user_id', 'bar');
		$userSession->setSession($session2);
		$this->assertEquals($users['bar'], $userSession->getUser());
	}

	public function testCreateSessionToken(): void {
		/** @var Manager | MockObject $manager */
		$manager = $this->createMock(Manager::class);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		$user = $this->createMock(IUser::class);
		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);

		$random = $this->createMock(ISecureRandom::class);
		$config = $this->createMock(IConfig::class);
		$csrf = $this->getMockBuilder(CsrfTokenManager::class)
			->disableOriginalConstructor()
			->getMock();
		$request = new Request([
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
			->willReturn($user);
		$session->expects($this->once())
			->method('getId')
			->willReturn($sessionId);
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with($password)
			->will($this->throwException(new InvalidTokenException()));

		$this->tokenProvider->expects($this->once())
			->method('generateToken')
			->with($sessionId, $uid, $loginName, $password, 'Firefox');

		$this->assertTrue($userSession->createSessionToken($request, $uid, $loginName, $password));
	}

	public function testCreateSessionTokenWithTokenPassword(): void {
		/** @var Manager | MockObject $manager */
		$manager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var IToken | MockObject $token */
		$token = $this->createMock(IToken::class);
		$user = $this->createMock(IUser::class);
		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);

		$random = $this->createMock(ISecureRandom::class);
		$config = $this->createMock(IConfig::class);
		$csrf = $this->getMockBuilder(CsrfTokenManager::class)
			->disableOriginalConstructor()
			->getMock();
		$request = new Request([
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
			->willReturn($user);
		$session->expects($this->once())
			->method('getId')
			->willReturn($sessionId);
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with($password)
			->willReturn($token);
		$this->tokenProvider->expects($this->once())
			->method('getPassword')
			->with($token, $password)
			->willReturn($realPassword);

		$this->tokenProvider->expects($this->once())
			->method('generateToken')
			->with($sessionId, $uid, $loginName, $realPassword, 'Firefox');

		$this->assertTrue($userSession->createSessionToken($request, $uid, $loginName, $password));
	}

	public function testCreateSessionTokenWithNonExistentUser(): void {
		/** @var Manager | MockObject $manager */
		$manager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);
		/** @var IRequest $request */
		$request = $this->createMock(IRequest::class);

		$uid = 'user123';
		$loginName = 'User123';
		$password = 'passme';

		$manager->expects($this->once())
			->method('get')
			->with($uid)
			->willReturn(null);

		$this->assertFalse($userSession->createSessionToken($request, $uid, $loginName, $password));
	}

	public function testInvalidateSessionToken(): void {
		$manager = $this->createMock(Manager::class);
		$session = $this->createMock(ISession::class);

		$session->method('getId')->willReturn('sessionid');

		$this->tokenProvider->expects($this->once())
			->method('invalidateToken')
			->with($this->equalTo('sessionid'));

		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);
		$userSession->invalidateSessionToken();
	}

	public function testTryTokenLoginWithDisabledUser(): void {
		$this->expectException(LoginException::class);

		$manager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->getMock();
		$session = new Memory();
		$token = new DefaultToken();
		$token->setLoginName('fritz');
		$token->setUid('fritz0');
		$token->setLastCheck(100); // Needs check
		$user = $this->createMock(IUser::class);
		/** @var Session | MockObject $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setMethods(['logout'])
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $this->eventDispatcher])
			->getMock();
		/** @var IRequest | MockObject $request */
		$request = $this->createMock(IRequest::class);

		$request->expects($this->once())
			->method('getHeader')
			->with('Authorization')
			->willReturn('token xxxxx');
		$this->tokenProvider->expects($this->once())
			->method('getToken')
			->with('xxxxx')
			->willReturn($token);
		$manager->expects($this->once())
			->method('get')
			->with('fritz0')
			->willReturn($user);
		$user->expects($this->once())
			->method('isEnabled')
			->willReturn(false);

		$userSession->tryTokenLogin($request);
	}

	public function testValidateSessionDisabledUser(): void {
		$userManager = $this->createMock(IUserManager::class);
		$session = $this->createMock(ISession::class);
		$timeFactory = $this->createMock(ITimeFactory::class);
		$tokenProvider = $this->createMock(IProvider::class);

		/** @var Session | MockObject $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$userManager, $session, $timeFactory, $tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $this->eventDispatcher])
			->setMethods(['logout'])
			->getMock();

		/** @var IUser | MockObject $user */
		$user = $this->createMock(IUser::class);
		$token = new DefaultToken();
		$token->setLoginName('susan');
		$token->setLastCheck(20);

		$session->expects($this->once())
			->method('get')
			->with('app_password')
			->willReturn('APP-PASSWORD');
		$tokenProvider->expects($this->once())
			->method('getToken')
			->with('APP-PASSWORD')
			->willReturn($token);
		$timeFactory->expects($this->once())
			->method('getTime')
			->willReturn(1000); // more than 5min since last check
		$tokenProvider->expects($this->once())
			->method('getPassword')
			->with($token, 'APP-PASSWORD')
			->willReturn('123456');
		$userManager->expects($this->once())
			->method('checkPassword')
			->with('susan', '123456')
			->willReturn(true);
		$user->expects($this->once())
			->method('isEnabled')
			->willReturn(false);
		$tokenProvider->expects($this->once())
			->method('invalidateToken')
			->with('APP-PASSWORD');
		$userSession->expects($this->once())
			->method('logout');

		$userSession->setUser($user);
		$userSession->validateSession();
	}

	public function testValidateSessionNoPassword(): void {
		$userManager = $this->createMock(IUserManager::class);
		$session = $this->createMock(ISession::class);
		$timeFactory = $this->createMock(ITimeFactory::class);
		$tokenProvider = $this->createMock(IProvider::class);
		/** @var Session | MockObject $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$userManager, $session, $timeFactory, $tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $this->eventDispatcher])
			->setMethods(['logout'])
			->getMock();

		/** @var IUser | MockObject $user */
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
			->method('isEnabled')
			->willReturn(true);
		$token = new DefaultToken();
		$token->setLastCheck(20);

		$session->expects($this->once())
			->method('get')
			->with('app_password')
			->willReturn('APP-PASSWORD');
		$tokenProvider->expects($this->once())
			->method('getToken')
			->with('APP-PASSWORD')
			->willReturn($token);
		$timeFactory->expects($this->once())
			->method('getTime')
			->willReturn(1000); // more than 5min since last check
		$tokenProvider->expects($this->once())
			->method('getPassword')
			->with($token, 'APP-PASSWORD')
			->will($this->throwException(new PasswordlessTokenException()));
		$tokenProvider->expects($this->once())
			->method('updateToken')
			->with($token);

		$userSession->setUser($user);
		$userSession->validateSession();

		$this->assertEquals(1000, $token->getLastCheck());
	}

	public function testUpdateSessionTokenPassword(): void {
		/** @var IUserManager | MockObject $userManager */
		$userManager = $this->createMock(IUserManager::class);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);

		$password = '123456';
		$sessionId ='session1234';
		$token = new DefaultToken();

		$session->expects($this->once())
			->method('getId')
			->willReturn($sessionId);
		$tokenProvider->expects($this->once())
			->method('getToken')
			->with($sessionId)
			->willReturn($token);
		$tokenProvider->expects($this->once())
			->method('setPassword')
			->with($token, $sessionId, $password);

		$userSession->updateSessionTokenPassword($password);
	}

	public function testUpdateSessionTokenPasswordNoSessionAvailable(): void {
		/** @var IUserManager | MockObject $userManager */
		$userManager = $this->createMock(IUserManager::class);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);

		$session->expects($this->once())
			->method('getId')
			->will($this->throwException(new SessionNotAvailableException()));

		$userSession->updateSessionTokenPassword('1234');
	}

	public function testUpdateSessionTokenPasswordInvalidTokenException(): void {
		/** @var IUserManager | MockObject $userManager */
		$userManager = $this->createMock(IUserManager::class);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);

		$password = '123456';
		$sessionId ='session1234';
		$token = new DefaultToken();

		$session->expects($this->once())
			->method('getId')
			->willReturn($sessionId);
		$tokenProvider->expects($this->once())
			->method('getToken')
			->with($sessionId)
			->willReturn($token);
		$tokenProvider->expects($this->once())
			->method('setPassword')
			->with($token, $sessionId, $password)
			->will($this->throwException(new InvalidTokenException()));

		$userSession->updateSessionTokenPassword($password);
	}

	public function testCancelLogout(): void {
		/** @var ISession | MockObject $session */
		$session = $this->createMock(Memory::class);
		$session->expects($this->once())
			->method('set')
			->with('user_id', 'foo');

		/** @var Manager $manager */
		$manager = $this->createMock(Manager::class);

		/** @var IUser | MockObject $user */
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
			->method('getUID')
			->willReturn('foo');

		$userSession = new Session(
			$manager,
			$session,
			$this->timeFactory,
			$this->tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);
		$userSession->setUser($user);

		$called['cancel'] = false;

		$this->eventDispatcher->addListener('\OC\User\Session::pre_logout', function ($event) use (&$called) {
			$called['cancel'] = true;
			$event['cancel'] = $called['cancel'];
		});

		$this->assertTrue($userSession->logout());

		$calledBeforeLogout = [];
		\OC::$server->getEventDispatcher()->addListener('user.beforelogout', function (GenericEvent $event) use (&$calledBeforeLogout) {
			$calledBeforeLogout[] = 'user.beforelogout';
			$calledBeforeLogout[] = $event;
		});

		$this->assertTrue($userSession->logout());
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeLogout[1]);
		$this->assertArrayHasKey('uid', $calledBeforeLogout[1]);
		$this->assertEquals('user.beforelogout', $calledBeforeLogout[0]);
	}

	public function testLogout(): void {
		/** @var ISession | MockObject $session */
		$session = $this->createMock(Memory::class);
		$session->expects($this->once())
			->method('set')
			->with('user_id', 'foo');

		/** @var Manager $manager */
		$manager = $this->createMock(Manager::class);

		/** @var IUser | MockObject $user */
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
			->method('getUID')
			->willReturn('foo');

		/** @var Session | MockObject $userSession */
		$userSession = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$manager, $session, $this->timeFactory, $this->tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $this->eventDispatcher])
			->setMethods(['getAuthModules', 'unsetMagicInCookie'])
			->getMock();
		$userSession->setUser($user);

		$this->assertTrue($userSession->logout());

		$calledBeforeLogout = [];
		\OC::$server->getEventDispatcher()->addListener('user.beforelogout', function (GenericEvent $event) use (&$calledBeforeLogout) {
			$calledBeforeLogout[] = 'user.beforelogout';
			$calledBeforeLogout[] = $event;
		});
		$calledAfterLogout = [];
		\OC::$server->getEventDispatcher()->addListener('user.afterlogout', function (GenericEvent $event) use (&$calledAfterLogout) {
			$calledAfterLogout[] = 'user.afterlogout';
			$calledAfterLogout[] = $event;
		});

		$this->assertEquals(true, $userSession->logout());
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeLogout[1]);
		$this->assertArrayHasKey('uid', $calledBeforeLogout[1]);
		$this->assertEquals('user.beforelogout', $calledBeforeLogout[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledAfterLogout[1]);
		$this->assertArrayHasKey('uid', $calledAfterLogout[1]);
		$this->assertEquals('user.afterlogout', $calledAfterLogout[0]);
	}

	public function testApacheLogin(): void {
		/** @var IUserManager | MockObject $userManager */
		$userManager = $this->createMock(IUserManager::class);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$eventDispatcher
		);

		// Fail if not userid returned
		$apacheBackend = $this->createMock(IApacheBackend::class);
		$apacheBackend->expects($this->once())->method('getCurrentUserId')->willReturn(null);

		$loginVal = $userSession->loginWithApache($apacheBackend);
		$this->assertFalse($loginVal);

		// Fail if not a user interface supplied
		$apacheBackend = $this->createMock(IApacheBackend::class);
		$apacheBackend->expects($this->once())->method('getCurrentUserId')->willReturn('userid');
		$loginVal = $userSession->loginWithApache($apacheBackend);
		$this->assertFalse($loginVal);
	}

	public function testFailedLoginWithApache(): void {
		/** @var Manager | MockObject $userManager */
		$userManager = $this->createMock(Manager::class);
		$userManager->method('emit')->willReturn(null);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$eventDispatcher
		);

		$apacheBackend = $this->createMock(IApacheBackend::class);
		$userInterface = $this->createMock(UserInterface::class);
		$apacheBackend->expects($this->once())->method('getCurrentUserId')->willReturn(['foo', $userInterface]);
		$apacheBackend->expects($this->once())->method('isSessionActive')->willReturn(true);
		$userInterface->expects($this->once())->method('userExists')->willReturn(true);

		$failedEvent = new GenericEvent(null, ['user' => 'foo']);
		$beforeLoginEvent = new GenericEvent(null, ['login' => 'foo', 'uid' => 'foo', 'password' => '', 'loginType' => 'apache']);
		$eventDispatcher->expects($this->exactly(2))
			->method('dispatch')
			->withConsecutive(
				[$this->equalTo($beforeLoginEvent), $this->equalTo('user.beforelogin')],
				[$this->equalTo($failedEvent), $this->equalTo('user.loginfailed')]
			);

		$userSession->loginWithApache($apacheBackend);
	}

	public function testLoginWithApache(): void {
		/** @var Manager | MockObject $userManager */
		$userManager = $this->createMock(Manager::class);
		$userManager->method('emit')->willReturn(null);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$eventDispatcher
		);

		$apacheBackend = $this->createMock(IApacheBackend::class);
		$userInterface = $this->createMock(UserInterface::class);
		$apacheBackend->expects($this->once())->method('getCurrentUserId')->willReturn(['foo', $userInterface]);
		$apacheBackend->expects($this->once())->method('isSessionActive')->willReturn(true);
		$userInterface->expects($this->once())->method('userExists')->willReturn(true);

		$iUser = $this->createMock(IUser::class);
		$iUser->expects($this->exactly(2))
			->method('isEnabled')
			->willReturn(true);
		$iUser->expects($this->exactly(4))
			->method('getUID')
			->willReturn('foo');

		$userManager->expects($this->exactly(2))
			->method('get')
			->willReturn($iUser);

		$beforeLoginEvent = new GenericEvent(null, ['login' => 'foo', 'uid' => 'foo', 'password' => '', 'loginType' => 'apache']);
		$afterLoginEvent = new GenericEvent(null, ['user' => $iUser, 'login' => 'foo', 'uid' => 'foo', 'password' => '', 'loginType' => 'apache']);
		$eventDispatcher->expects($this->exactly(2))
			->method('dispatch')
			->withConsecutive(
				[$this->equalTo($beforeLoginEvent), $this->equalTo('user.beforelogin')],
				[$this->equalTo($afterLoginEvent), $this->equalTo('user.afterlogin')]
			);

		$this->assertTrue($userSession->loginWithApache($apacheBackend));
	}

	public function testFailedLoginWithPassword(): void {
		/** @var Manager | MockObject $userManager */
		$userManager = $this->createMock(Manager::class);
		$userManager->method('emit')->willReturn(null);
		$userManager->expects($this->once())->method('checkPassword')->willReturn(false);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$eventDispatcher
		);

		$beforeEvent = new GenericEvent(
			null,
			['loginType' => 'password', 'login' => 'foo', 'uid' => 'foo',
				'_uid' => 'deprecated: please use \'login\', the real uid is not yet known',
				'password' => 'foo']
		);
		$failedLogin = new GenericEvent(null, ['user' => 'foo']);
		$eventDispatcher->expects($this->exactly(2))
			->method('dispatch')
			->withConsecutive(
				[$this->equalTo($beforeEvent), $this->equalTo('user.beforelogin')],
				[$this->equalTo($failedLogin), $this->equalTo('user.loginfailed')]
			);

		self::invokePrivate($userSession, 'loginWithPassword', ['foo', 'foo']);
	}

	public function testLoginWithPassword(): void {
		/** @var Manager | MockObject $userManager */
		$userManager = $this->createMock(Manager::class);
		$userManager->method('emit')->willReturn(null);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);

		$iUser = $this->createMock(IUser::class);
		$iUser
			->method('isEnabled')
			->willReturn(true);
		$iUser
			->method('getUID')
			->willReturn('foo');

		$userManager->expects($this->once())->method('checkPassword')->willReturn($iUser);

		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$eventDispatcher
		);

		$beforeEvent = new GenericEvent(
			null,
			['loginType' => 'password', 'login' => 'foo', 'uid' => 'foo',
				'_uid' => 'deprecated: please use \'login\', the real uid is not yet known',
				'password' => 'foopass']
		);
		$afterEvent = new GenericEvent(null, ['loginType' => 'password', 'user' => $iUser, 'uid' => 'foo', 'password' => 'foopass']);
		$eventDispatcher->expects($this->exactly(2))
			->method('dispatch')
			->withConsecutive(
				[$this->equalTo($beforeEvent), $this->equalTo('user.beforelogin')],
				[$this->equalTo($afterEvent), $this->equalTo('user.afterlogin')]
			);

		$result = self::invokePrivate($userSession, 'loginWithPassword', ['foo', 'foopass']);

		$this->assertTrue($result);
	}

	public function testLoginFailedWithToken(): void {
		/** @var Manager | MockObject $userManager */
		$userManager = $this->createMock(Manager::class);
		$userManager->method('emit')->willReturn(null);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$eventDispatcher
		);

		$iToken = $this->createMock(IToken::class);
		$iToken->expects($this->once())
			->method('getUID')->willReturn('foo');
		$tokenProvider->expects($this->once())
			->method('getToken')->willReturn($iToken);
		$tokenProvider->expects($this->once())
			->method('getPassword')
			->with($iToken, 'token')
			->willReturn('foobar');

		$userManager->expects($this->once())
			->method('get')
			->willReturn(null);

		$event = new GenericEvent(null, ['login' => 'foo', 'uid' => 'foo', 'password' => 'foobar', 'loginType' => 'token']);
		$failedEvent = new GenericEvent(null, ['user' => 'foo']);
		$eventDispatcher->expects($this->exactly(2))
			->method('dispatch')
			->withConsecutive(
				[$this->equalTo($event), $this->equalTo('user.beforelogin')],
				[$this->equalTo($failedEvent), $this->equalTo('user.loginfailed')]
			);

		self::invokePrivate($userSession, 'loginWithToken', ['token']);
	}

	public function testLoginWithToken(): void {
		/** @var Manager | MockObject $userManager */
		$userManager = $this->createMock(Manager::class);
		$userManager->method('emit')->willReturn(null);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$eventDispatcher
		);

		$iToken = $this->createMock(IToken::class);
		$iToken->expects($this->once())
			->method('getUID')->willReturn('foo');
		$tokenProvider->expects($this->once())
			->method('getToken')->willReturn($iToken);
		$tokenProvider->expects($this->once())
			->method('getPassword')
			->with($iToken, 'token')
			->willReturn('foobar');

		$iUser = $this->createMock(IUser::class);
		$iUser
			->method('isEnabled')
			->willReturn(true);
		$iUser
			->method('getUID')
			->willReturn('foo');

		$userManager->expects($this->once())
			->method('get')
			->willReturn($iUser);

		$beforeEvent = new GenericEvent(
			null,
			[
				'login' => 'foo', 'uid' => 'foo', 'password' => 'foobar', 'loginType' => 'token'
			]
		);
		$afterEvent = new GenericEvent(
			null,
			[
				'user' => $iUser, 'login' => 'foo', 'uid' => 'foo', 'password' => 'foobar', 'loginType' => 'token'
			]
		);

		$eventDispatcher->expects($this->exactly(2))
			->method('dispatch')
			->withConsecutive(
				[$this->equalTo($beforeEvent), $this->equalTo('user.beforelogin')],
				[$this->equalTo($afterEvent), $this->equalTo('user.afterlogin')]
			);

		$result = self::invokePrivate($userSession, 'loginWithToken', ['token']);
		$this->assertTrue($result);
	}

	public function providesModules(): array {
		$nullModule = $this->createMock(IAuthModule::class);
		$nullModule->method('auth')->willReturn(null);
		$throwingModule = $this->createMock(IAuthModule::class);
		$throwingModule->method('auth')->willThrowException(new \Exception('Invalid token'));
		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user1Module = $this->createMock(IAuthModule::class);
		$user1Module->method('auth')->willReturn($user1);
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');
		$user2Module = $this->createMock(IAuthModule::class);
		$user2Module->method('auth')->willReturn($user2);
		return [
			'no modules' => [true, []],
			'module returning null' => [true, [$nullModule]],
			'module returning a user' => [true, [$user1Module]],
			'module throwing an exception' => [false, [$throwingModule]],
			'modules returning different user' => [false, [$user1Module, $user2Module]],
			'logged in user does not match' => [false, [$user2Module], $user1],
		];
	}

	/**
	 * @dataProvider providesModules
	 * @param $expectedReturn
	 * @param array $modules
	 * @param null $loggedInUser
	 */
	public function testVerifyAuthHeaders($expectedReturn, array $modules, $loggedInUser = null): void {
		/** @var IRequest | MockObject $request */
		$request = $this->createMock(IRequest::class);
		/** @var IUserManager | MockObject $userManager */
		$userManager = $this->createMock(IUserManager::class);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);

		/** @var Session | MockObject $session */
		$session = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$userManager, $session, $timeFactory, $tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $this->eventDispatcher])
			->setMethods(['getAuthModules', 'logout', 'isLoggedIn', 'getUser'])
			->getMock();
		$session->method('getAuthModules')->willReturn($modules);

		$session->method('isLoggedIn')->willReturn($loggedInUser !== null);
		$session->method('getUser')->willReturn($loggedInUser);

		$session->expects($expectedReturn ? $this->never() : $this->once())->method('logout');
		$this->assertEquals($expectedReturn, $session->verifyAuthHeaders($request));
	}

	public function providesModulesForLogin(): array {
		$nullModule = $this->createMock(IAuthModule::class);
		$nullModule->method('auth')->willReturn(null);
		$throwingModule = $this->createMock(IAuthModule::class);
		$throwingModule->method('auth')->willThrowException(new \Exception('Invalid token'));
		$user1 = $this->createMock(IUser::class);
		$user1->method('isEnabled')->willReturn('true');
		$user1->method('getUID')->willReturn('user1');
		$user1Module = $this->createMock(IAuthModule::class);
		$user1Module->method('auth')->willReturn($user1);
		return [
			'no modules' => [false, []],
			'module returning null' => [false, [$nullModule]],
			'module returning a user' => [true, [$user1Module]],
			'module throwing an exception' => [new \Exception('Invalid token'), [$throwingModule]],
		];
	}

	/**
	 * @dataProvider providesModulesForLogin
	 * @param mixed $expectedReturn
	 * @param array $modules
	 * @throws \Exception
	 */
	public function testTryAuthModuleLogin($expectedReturn, array $modules): void {
		/** @var IRequest | MockObject $request */
		$request = $this->createMock(IRequest::class);
		/** @var IUserManager | MockObject $userManager */
		$userManager = $this->createMock(IUserManager::class);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);

		/** @var Session | MockObject $session */
		$session = $this->getMockBuilder(Session::class)
			->setConstructorArgs([$userManager, $session, $timeFactory, $tokenProvider, $this->config, $this->logger, $this->serviceLoader, $this->userSyncService, $this->eventDispatcher])
			->setMethods(['getAuthModules', 'createSessionToken', 'loginUser', 'getUser'])
			->getMock();
		$session->method('getAuthModules')->willReturn($modules);

		if ($expectedReturn instanceof \Exception) {
			$this->expectException(\Exception::class);
			$this->expectExceptionMessage('Invalid token');
		} else {
			$session->expects($expectedReturn ? $this->once() : $this->never())->method('createSessionToken');
			$session->expects($expectedReturn ? $this->once() : $this->never())->method('loginUser')->willReturn($expectedReturn);
		}

		$this->assertEquals($expectedReturn, $session->tryAuthModuleLogin($request));
	}

	public function testFailedLoginUser(): void {
		/** @var Manager | MockObject $userManager */
		$userManager = $this->createMock(Manager::class);
		$userManager->method('emit')->willReturn(null);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$eventDispatcher
		);

		$failedEvent = new GenericEvent(null, ['user' => null]);
		$eventDispatcher->expects($this->once())
			->method('dispatch')
			->withConsecutive(
				[$this->equalTo($failedEvent), $this->equalTo('user.loginfailed')]
			);

		self::invokePrivate($userSession, 'loginUser', [null, 'foo']);
	}

	public function testLoginUser(): void {
		/** @var Manager | MockObject $userManager */
		$userManager = $this->createMock(Manager::class);
		$userManager->method('emit')->willReturn(null);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$this->eventDispatcher
		);

		$iUser = $this->createMock(IUser::class);
		$iUser
			->method('isEnabled')
			->willReturn(true);
		$iUser->expects($this->atLeastOnce())
			->method('updateLastLoginTimestamp');

		$result = self::invokePrivate($userSession, 'loginUser', [$iUser, 'foo']);
		$this->assertTrue($result);
	}

	public function testFailedLoginUserDisabled(): void {
		$this->expectException(LoginException::class);
		$this->expectExceptionMessage('User disabled');

		/** @var Manager | MockObject $userManager */
		$userManager = $this->createMock(Manager::class);
		$userManager->method('emit')->willReturn(null);
		/** @var ISession | MockObject $session */
		$session = $this->createMock(ISession::class);
		/** @var ITimeFactory | MockObject $timeFactory */
		$timeFactory = $this->createMock(ITimeFactory::class);
		/** @var IProvider | MockObject $tokenProvider */
		$tokenProvider = $this->createMock(IProvider::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userSession = new Session(
			$userManager,
			$session,
			$timeFactory,
			$tokenProvider,
			$this->config,
			$this->logger,
			$this->serviceLoader,
			$this->userSyncService,
			$eventDispatcher
		);

		$failedEvent = new GenericEvent(null, ['user' => 'foo']);
		$eventDispatcher->expects($this->once())
			->method('dispatch')
			->withConsecutive(
				[$this->equalTo($failedEvent), $this->equalTo('user.loginfailed')]
			);

		$iUser = $this->createMock(IUser::class);
		$iUser->expects($this->once())
			->method('isEnabled')
			->willReturn(false);
		$iUser->method('getUID')
			->willReturn('foo');
		$iUser->expects($this->never())
			->method('updateLastLoginTimestamp');

		$failedEvent = new GenericEvent(null, ['user' => 'foo']);
		$eventDispatcher->expects($this->once())
			->method('dispatch')
			->withConsecutive(
				[$this->equalTo($failedEvent), $this->equalTo('user.loginfailed')]
			);

		self::invokePrivate($userSession, 'loginUser', [$iUser, 'foo']);
	}
}
