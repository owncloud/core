<?php

/**
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace Test\User;

use OC\Group\Manager;
use OC\Hooks\PublicEmitter;
use OC\MembershipManager;
use OC\SubAdmin;
use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\Backend;
use OC\User\Database;
use OC\User\Session;
use OC\User\User;
use OCP\IConfig;
use OCP\IURLGenerator;
use OCP\User\IChangePasswordBackend;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;
use Test\TestCase;

/**
 * Class UserTest
 *
 * @group DB
 *
 * @package Test\User
 */
class UserTest extends TestCase {

	/** @var AccountMapper | \PHPUnit_Framework_MockObject_MockObject */
	private $accountMapper;
	/** @var MembershipManager | \PHPUnit_Framework_MockObject_MockObject */
	private $membershipManager;
	/** @var Account */
	private $account;
	/** @var User */
	private $user;
	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var PublicEmitter */
	private $emitter;
	/** @var EventDispatcher | \PHPUnit_Framework_MockObject_MockObject */
	private $eventDispatcher;
	/** @var IURLGenerator | \PHPUnit_Framework_MockObject_MockObject */
	private $urlGenerator;
	/** @var  Manager | \PHPUnit_Framework_MockObject_MockObject */
	private $groupManager;
	/** @var  SubAdmin | \PHPUnit_Framework_MockObject_MockObject */
	private $subAdmin;
	/** @var  Session | \PHPUnit_Framework_MockObject_MockObject */
	private $sessionUser;

	public function setUp() {
		parent::setUp();
		$this->accountMapper = $this->createMock(AccountMapper::class);
		$this->membershipManager = $this->createMock(MembershipManager::class);
		$this->config = $this->createMock(IConfig::class);
		$this->account = new Account();
		$this->account->setUserId('foo');
		$this->emitter = new PublicEmitter();
		$this->eventDispatcher = $this->createMock(EventDispatcher::class);
		$this->urlGenerator = $this->getMockBuilder('\OC\URLGenerator')
			->setMethods(['getAbsoluteURL'])
			->disableOriginalConstructor()
			->getMock();
		$this->groupManager = $this->createMock('\OC\Group\Manager');
		$this->subAdmin = $this->createMock('\OC\SubAdmin');
		$this->sessionUser = $this->createMock(Session::class);

		$this->user = new User($this->account, $this->accountMapper, $this->membershipManager, $this->emitter, $this->config, $this->urlGenerator, $this->eventDispatcher);
	}

	public function testDisplayName() {
		$this->account->setDisplayName('Foo');
		$this->assertEquals('Foo', $this->user->getDisplayName());
	}

	/**
	 * if the display name contain whitespaces only, we expect the uid as result
	 */
	public function testDisplayNameEmpty() {
		$this->assertEquals('foo', $this->user->getDisplayName());
	}

	public function testSetPassword() {
		$this->config->expects($this->once())
			->method('deleteUserValue')
			->with('foo', 'owncloud', 'lostpassword');

		/**
		 * @var GenericEvent[] $calledEvents
		 */
		$calledEvents = [];
		\OC::$server->getEventDispatcher()->addListener('user.beforesetpassword', function ($event) use (&$calledEvents) {
			$calledEvents['user.beforesetpassword'] = $event;
		});
		\OC::$server->getEventDispatcher()->addListener('OCP\User::validatePassword', function ($event) use (&$calledEvents) {
			$calledEvents['OCP\User::validatePassword'] = $event;
		});
		\OC::$server->getEventDispatcher()->addListener('user.aftersetpassword', function ($event) use (&$calledEvents) {
			$calledEvents['user.aftersetpassword'] = $event;
		});
		$backend = $this->createMock(IChangePasswordBackend::class);
		/** @var Account | \PHPUnit_Framework_MockObject_MockObject $account */
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('getBackendInstance')->willReturn($backend);
		$account->expects($this->any())->method('__call')->with('getUserId')->willReturn('foo');
		$backend->expects($this->once())->method('setPassword')->with('foo', 'bar')->willReturn(true);

		$ocHook = new \OC_Hook();

		$this->user = new User($account, $this->accountMapper, $this->membershipManager, $ocHook, $this->config, null, \OC::$server->getEventDispatcher());
		$this->assertTrue($this->user->setPassword('bar',''));
		$this->assertTrue($this->user->canChangePassword());

		$this->assertArrayHasKey('user.beforesetpassword', $calledEvents);
		$this->assertArrayHasKey('OCP\User::validatePassword', $calledEvents);
		$this->assertArrayHasKey('user.aftersetpassword', $calledEvents);

		$this->assertInstanceOf(GenericEvent::class, $calledEvents['user.beforesetpassword']);
		$this->assertInstanceOf(GenericEvent::class, $calledEvents['OCP\User::validatePassword']);
		$this->assertInstanceOf(GenericEvent::class, $calledEvents['user.aftersetpassword']);

		$this->assertInstanceOf(User::class, $calledEvents['user.beforesetpassword']->getArgument('user'));
		$this->assertEquals('bar', $calledEvents['user.beforesetpassword']->getArgument('password'));
		$this->assertEquals('', $calledEvents['user.beforesetpassword']->getArgument('recoveryPassword'));
		$this->assertEquals('foo', $calledEvents['OCP\User::validatePassword']->getArgument('uid'));
		$this->assertEquals('bar', $calledEvents['OCP\User::validatePassword']->getArgument('password'));
		$this->assertInstanceOf(User::class, $calledEvents['user.aftersetpassword']->getArgument('user'));
		$this->assertEquals('bar', $calledEvents['user.aftersetpassword']->getArgument('password'));
		$this->assertEquals('', $calledEvents['user.aftersetpassword']->getArgument('recoveryPassword'));

	}
	public function testSetPasswordNotSupported() {
		$this->config->expects($this->never())
			->method('deleteUserValue')
			->with('foo', 'owncloud', 'lostpassword');

		$backend = $this->createMock(IChangePasswordBackend::class);
		/** @var Account | \PHPUnit_Framework_MockObject_MockObject $account */
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('getBackendInstance')->willReturn($backend);
		$account->expects($this->any())->method('__call')->with('getUserId')->willReturn('foo');
		$backend->expects($this->once())->method('setPassword')->with('foo', 'bar')->willReturn(false);

		$this->user = new User($account, $this->accountMapper, $this->membershipManager, null, $this->config);
		$this->assertFalse($this->user->setPassword('bar',''));
		$this->assertTrue($this->user->canChangePassword());
	}

	public function testSetPasswordNoBackend() {
		$this->assertFalse($this->user->setPassword('bar',''));
		$this->assertFalse($this->user->canChangePassword());
	}

	public function providesChangeAvatarSupported() {
		return [
			[true, true, true],
			[false, true, false],
			[true, false, null]
		];
	}

	/**
	 * @dataProvider providesChangeAvatarSupported
	 */
	public function testChangeAvatarSupported($expected, $implements, $canChange) {
		$backend = $this->getMockBuilder(Database::class)
			->setMethods(['canChangeAvatar', 'implementsActions'])
			->getMock();
		$backend->expects($this->any())->method('canChangeAvatar')->willReturn($canChange);

		/** @var Account | \PHPUnit_Framework_MockObject_MockObject $account */
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('getBackendInstance')->willReturn($backend);
		$account->expects($this->any())->method('__call')->with('getUserId')->willReturn('foo');

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) use ($implements) {
				if ($actions === Backend::PROVIDE_AVATAR) {
					return $implements;
				} else {
					return false;
				}
			}));

		$user = new User($account, $this->accountMapper, $this->membershipManager, null, $this->config);
		$this->assertEquals($expected, $user->canChangeAvatar());
	}

	public function testDelete() {
		$backend = $this->createMock(Database::class);
		$backend->expects($this->once())->method('deleteUser')->willReturn(true);
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('getBackendInstance')->willReturn($backend);
		$account->expects($this->any())->method('__call')->willReturnOnConsecutiveCalls('foo', '/home/foo', 'foo', 'foo');
		$this->accountMapper->expects($this->once())->method('delete')->willReturn($account);
		$this->membershipManager->expects($this->once())->method('removeMemberships')->willReturn(true);

		$account->expects($this->once())->method('getBackendInstance')->willReturn($backend);
		$user = new User($account, $this->accountMapper, $this->membershipManager, null, $this->config);
		$this->assertTrue($user->delete());
	}

	public function testGetHome() {
		$this->account->setHome('/home/foo');
		$this->assertEquals('/home/foo', $this->user->getHome());
	}

	public function testGetBackendClassName() {
		\OC::$server->getUserManager()->registerBackend(new Database());
		$this->account->setBackend(Database::class);
		$this->assertEquals('Database', $this->user->getBackendClassName());
	}

	public function providesChangeDisplayName() {
		return [
			[true, true],
			[false, false]
		];
	}

	public function providesAdminOrSubAdmin() {
		return [
			[false, false, false, false],
			[true, false, true, true],
			[true, true, true, true],
			[true, true, true, true]
		];
	}

	/**
	 * @dataProvider providesAdminOrSubAdmin
	 * @param $isAdmin
	 * @param $isSubaDmin
	 * @param $expected
	 * @param $implements
	 */
	public function testAdminSubadminCanChangeDisplayName($isAdmin, $isSubaDmin, $expected, $implements) {

		$this->config->method('getSystemValue')
			->with('allow_user_to_change_display_name')
			->willReturn(false);

		$user = $this->createMock('\OCP\IUser');
		$user->method('getUID')->willReturn('admin');

		$subAdmin = $this->createMock(SubAdmin::class);
		$subAdmin->method('isSubAdmin')->willReturn($isSubaDmin);

		$this->sessionUser->method('getUser')
			->willReturn($user);

		$this->groupManager->method('isAdmin')->willReturn($isAdmin);
		$this->groupManager->method('getSubAdmin')->willReturn($subAdmin);

		$backend = $this->getMockBuilder(Database::class)
			->setMethods(['implementsActions'])
			->getMock();

		/** @var Account | \PHPUnit_Framework_MockObject_MockObject $account */
		$account = $this->getMockBuilder(Account::class)
			->setMethods(['getBackendInstance', 'getDisplayName', 'setDisplayName'])
			->getMock();
		$account->expects($this->any())->method('getBackendInstance')->willReturn($backend);
		$account->expects($this->any())->method('getDisplayName')->willReturn('admin');
		$account->expects($this->any())->method('setDisplayName')->willReturn($implements);

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) use ($implements) {
				if ($actions === Backend::SET_DISPLAYNAME) {
					return $implements;
				} else {
					return false;
				}
			}));

		$user = new User($account, $this->accountMapper, $this->membershipManager, null, $this->config, null, null, $this->groupManager, $this->sessionUser);
		$this->assertEquals($expected, $user->canChangeDisplayName());
	}
	/**
	 * @dataProvider providesChangeDisplayName
	 */
	public function testCanChangeDisplayName($expected, $implements) {
		$backend = $this->getMockBuilder(Database::class)
			->setMethods(['implementsActions'])
			->getMock();

		/** @var Account | \PHPUnit_Framework_MockObject_MockObject $account */
		$account = $this->getMockBuilder(Account::class)
			->setMethods(['getBackendInstance', 'getDisplayName', 'setDisplayName'])
			->getMock();
		$account->expects($this->any())->method('getBackendInstance')->willReturn($backend);
		$account->expects($this->any())->method('getDisplayName')->willReturn('foo');
		$account->expects($this->any())->method('setDisplayName')->willReturn($implements);

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) use ($implements) {
				if ($actions === Backend::SET_DISPLAYNAME) {
					return $implements;
				} else {
					return false;
				}
			}));

		$user = new User($account, $this->accountMapper, $this->membershipManager, null, $this->config);
		$this->assertEquals($expected, $user->canChangeDisplayName());

		if ($expected) {
			$this->accountMapper->expects($this->once())
				->method('update');
		}

		$this->assertEquals($expected, $user->setDisplayName('Foo'));
	}

	public function provideNullorFalseData() {
		return [
			[null, null, false],
			[null, true, false],
			[null, true, true]
		];
	}

	/**
	 * @dataProvider provideNullorFalseData
	 * @param $user
	 * @param $backendinstance
	 * @param $setDisplayName
	 */
	public function testCanChangeDisplayNameWhenNullSession($getUser, $backendinstance, $setDisplayName) {
		$this->sessionUser->method('getUser')
			->willReturn($getUser);
		$backend = $this->getMockBuilder(Database::class)
			->setMethods(['implementsActions'])
			->getMock();

		/** @var Account | \PHPUnit_Framework_MockObject_MockObject $account */
		$account = $this->getMockBuilder(Account::class)
			->setMethods(['getBackendInstance', 'getDisplayName', 'setDisplayName'])
			->getMock();
		if ($backendinstance !== null) {
			$backendinstance = $backend;
		}
		$account->expects($this->any())->method('getBackendInstance')->willReturn($backendinstance);
		$account->expects($this->any())->method('getDisplayName')->willReturn('admin');
		$account->expects($this->any())->method('setDisplayName')->willReturn($setDisplayName);
		$user = new User($account, $this->accountMapper, null, $this->config, null, null, $this->groupManager, null);
		if ($setDisplayName !== true) {
			$this->assertEquals($setDisplayName, $user->canChangeDisplayName());
		} else {
			$this->assertEquals(null, $user->canChangeDisplayName());
		}
	}

	/**
	 * don't allow display names containing whitespaces only
	 */
	public function testSetDisplayNameEmpty() {
		$this->account->setDisplayName('');
		$this->assertFalse($this->user->setDisplayName(' '));
		$this->assertEquals('foo', $this->user->getDisplayName());
	}

	public function testSetDisplayNameNotSupported() {
		$backend = $this->getMockBuilder(Database::class)
			->setMethods(['implementsActions'])
			->getMock();

		/** @var Account | \PHPUnit_Framework_MockObject_MockObject $account */
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('getBackendInstance')->willReturn($backend);
		$account->expects($this->any())->method('__call')->with('getDisplayName')->willReturn('foo');

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				return false;
			}));

		$user = new User($account, $this->accountMapper, $this->membershipManager, null, $this->config);
		$this->assertFalse($user->setDisplayName('Foo'));
		$this->assertEquals('foo',$user->getDisplayName());
	}

	public function testSetPasswordHooks() {
		$hooksCalled = 0;
		$test = $this;

		/**
		 * @param User $user
		 * @param string $password
		 */
		$hook = function ($user, $password) use ($test, &$hooksCalled) {
			$hooksCalled++;
			$test->assertEquals('foo', $user->getUID());
			$test->assertEquals('bar', $password);
		};

		$emitter = new PublicEmitter();
		$emitter->listen('\OC\User', 'preSetPassword', $hook);
		$emitter->listen('\OC\User', 'postSetPassword', $hook);

		$backend = $this->createMock(IChangePasswordBackend::class);
		/** @var Account | \PHPUnit_Framework_MockObject_MockObject $account */
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('getBackendInstance')->willReturn($backend);
		$account->expects($this->any())->method('__call')->with('getUserId')->willReturn('foo');
		$backend->expects($this->once())->method('setPassword')->with('foo', 'bar')->willReturn(true);

		$this->user = new User($account, $this->accountMapper, $this->membershipManager, $emitter, $this->config, null, \OC::$server->getEventDispatcher());

		$calledEvent = [];
		\OC::$server->getEventDispatcher()->addListener('user.aftersetpassword', function ($event) use (&$calledEvent) {
			$calledEvent[] = 'user.aftersetpassword';
			$calledEvent[] = $event;
		});

		$this->user->setPassword('bar','');
		$this->assertEquals(2, $hooksCalled);
		$this->assertArrayHasKey('user', $calledEvent[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledEvent[1]);
		$this->assertEquals('user.aftersetpassword', $calledEvent[0]);
	}

	public function testDeleteHooks() {
		$hooksCalled = 0;
		$test = $this;

		/**
		 * @param User $user
		 */
		$hook = function ($user) use ($test, &$hooksCalled) {
			$hooksCalled++;
			$test->assertEquals('foo', $user->getUID());
		};

		$this->emitter->listen('\OC\User', 'preDelete', $hook);
		$this->emitter->listen('\OC\User', 'postDelete', $hook);

		$this->membershipManager->expects($this->once())->method('removeMemberships')->willReturn(true);
		$this->assertTrue($this->user->delete());
		$this->assertEquals(2, $hooksCalled);
	}

	public function testSetEnabledHook(){
		$this->eventDispatcher->expects($this->exactly(2))
			->method('dispatch')
			->with(
				$this->callback(
					function($eventName){
						if ($eventName === User::class . '::postSetEnabled' ){
							return true;
						}
						return false;
					}
				),
				$this->anything()
			)
		;

		$this->user->setEnabled(false);
		$this->user->setEnabled(true);
	}

	public function testGetCloudId() {
		$this->urlGenerator
				->expects($this->any())
				->method('getAbsoluteURL')
				->withAnyParameters()
				->willReturn('http://localhost:8888/owncloud');
		$this->assertEquals("foo@localhost:8888/owncloud", $this->user->getCloudId());
	}

	/**
	 * @dataProvider setTermsData
	 * @param array $terms
	 * @param array $expected
	 */
	public function testSettingAccountTerms(array $terms, array $expected) {
		$account = $this->getMockBuilder(Account::class)->getMock();
		$account->expects($this->once())->method('__call')->with('getId')->willReturn('foo');

		$this->accountMapper->expects($this->once())
			->method('setTermsForAccount')
			->with('foo', $expected);

		// Call the method
		$user = new User($account, $this->accountMapper, $this->membershipManager, null, $this->config);
		$user->setSearchTerms($terms);
	}

	public function setTermsData() {
		return [
			'normal terms' => [['term1'], ['term1']],
			'too long terms' => [['term1', str_repeat(".", 192)], ['term1', str_repeat(".", 191)]]
		];
	}

}
