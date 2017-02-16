<?php

/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\User;

use OC\Hooks\PublicEmitter;
use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\Backend;
use OC\User\Database;
use OC\User\User;
use OCP\IConfig;
use OCP\IURLGenerator;
use OCP\User\IChangePasswordBackend;
use Symfony\Component\EventDispatcher\EventDispatcher;
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

	public function setUp() {
		parent::setUp();
		$this->accountMapper = $this->createMock(AccountMapper::class);
		$this->config = $this->createMock(IConfig::class);
		$this->account = new Account();
		$this->account->setUserId('foo');
		$this->emitter = new PublicEmitter();
		$this->eventDispatcher = $this->createMock(EventDispatcher::class);
		$this->urlGenerator = $this->getMockBuilder('\OC\URLGenerator')
			->setMethods(['getAbsoluteURL'])
			->disableOriginalConstructor()
			->getMock();

		$this->user = new User($this->account, $this->accountMapper, $this->emitter, $this->config, $this->urlGenerator, $this->eventDispatcher);
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

		$backend = $this->createMock(IChangePasswordBackend::class);
		/** @var Account | \PHPUnit_Framework_MockObject_MockObject $account */
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('getBackendInstance')->willReturn($backend);
		$account->expects($this->any())->method('__call')->with('getUserId')->willReturn('foo');
		$backend->expects($this->once())->method('setPassword')->with('foo', 'bar')->willReturn(true);

		$this->user = new User($account, $this->accountMapper, null, $this->config);
		$this->assertTrue($this->user->setPassword('bar',''));
		$this->assertTrue($this->user->canChangePassword());

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

		$this->user = new User($account, $this->accountMapper, null, $this->config);
		$this->assertFalse($this->user->setPassword('bar',''));
		$this->assertTrue($this->user->canChangePassword());
	}

	public function testSetPasswordNoBackend() {
		$this->assertFalse($this->user->setPassword('bar',''));
		$this->assertFalse($this->user->canChangePassword());
	}

	public function testChangeAvatarSupportedYes() {
		$this->markTestSkipped('Avatar supported needs to be implemented');
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock('Test\User\AvatarUserDummy');
		$backend->expects($this->once())
			->method('canChangeAvatar')
			->with($this->equalTo('foo'))
			->will($this->returnValue(true));

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === Backend::PROVIDE_AVATAR) {
					return true;
				} else {
					return false;
				}
			}));

		$user = new User('foo', $backend);
		$this->assertTrue($user->canChangeAvatar());
	}

	public function testChangeAvatarSupportedNo() {
		$this->markTestSkipped('Avatar supported needs to be implemented');
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock('Test\User\AvatarUserDummy');
		$backend->expects($this->once())
			->method('canChangeAvatar')
			->with($this->equalTo('foo'))
			->will($this->returnValue(false));

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === Backend::PROVIDE_AVATAR) {
					return true;
				} else {
					return false;
				}
			}));

		$user = new User('foo', $backend);
		$this->assertFalse($user->canChangeAvatar());
	}

	public function testChangeAvatarNotSupported() {
		$this->markTestSkipped('Avatar supported needs to be implemented');
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock('Test\User\AvatarUserDummy');
		$backend->expects($this->never())
			->method('canChangeAvatar');

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
					return false;
			}));

		$user = new User('foo', $backend);
		$this->assertTrue($user->canChangeAvatar());
	}

	public function testDelete() {
		$this->accountMapper->expects($this->once())->method('delete')->willReturn($this->account);
		$this->assertTrue($this->user->delete());
	}

	public function testGetHome() {
		$this->account->setHome('/home/foo');
		$this->assertEquals('/home/foo', $this->user->getHome());
	}

	public function testGetBackendClassName() {
		$this->account->setBackend(Database::class);
		$this->assertEquals('Database', $this->user->getBackendClassName());
	}

	public function testGetHomeNotSupported() {
		$this->config->expects($this->any())
			->method('getUserValue')
			->will($this->returnValue(true));
		$this->config->expects($this->any())
			->method('getSystemValue')
			->with($this->equalTo('datadirectory'))
			->will($this->returnValue('arbitrary/path'));

		$this->assertEquals('arbitrary/path/foo', $this->user->getHome());
	}

	public function testCanChangeDisplayName() {
		$this->markTestSkipped('canChangeDisplayName() is not yet implemented');
		$this->assertTrue($this->user->canChangeDisplayName());
	}

	public function testCanChangeDisplayNameNotSupported() {
		$this->markTestSkipped('canChangeDisplayName() is not yet implemented');
		$this->assertFalse($this->user->canChangeDisplayName());
	}

	public function testSetDisplayNameSupported() {
		$this->accountMapper->expects($this->once())
			->method('update')
			->with($this->account);

		$this->assertTrue($this->user->setDisplayName('Foo'));
		$this->assertEquals('Foo', $this->user->getDisplayName());
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
		$this->markTestSkipped('canChangeDisplayName() is not yet implemented');
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock('\OC\User\Database');

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
					return false;
			}));

		$backend->expects($this->never())
			->method('setDisplayName');

		$user = new User('foo', $backend);
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

		$this->user = new User($account, $this->accountMapper, $emitter, $this->config);

		$this->user->setPassword('bar','');
		$this->assertEquals(2, $hooksCalled);
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
}
