<?php

/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\User;

use OC\Hooks\PublicEmitter;
use OC\User\Backend;
use OC\User\Database;
use OC\User\User;
use OCP\IConfig;
use Test\TestCase;
use Test\Util\User\Dummy;

/**
 * Class UserTest
 *
 * @group DB
 *
 * @package Test\User
 */
class UserTest extends TestCase {
	public function testDisplayName() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock('\OC\User\Backend');
		$backend->expects($this->once())
			->method('getDisplayName')
			->with($this->equalTo('foo'))
			->will($this->returnValue('Foo'));

		$backend->expects($this->any())
			->method('implementsActions')
			->with($this->equalTo(Backend::GET_DISPLAYNAME))
			->will($this->returnValue(true));

		$user = new User('foo', $backend);
		$this->assertEquals('Foo', $user->getDisplayName());
	}

	/**
	 * if the display name contain whitespaces only, we expect the uid as result
	 */
	public function testDisplayNameEmpty() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock('\OC\User\Backend');
		$backend->expects($this->once())
			->method('getDisplayName')
			->with($this->equalTo('foo'))
			->will($this->returnValue('  '));

		$backend->expects($this->any())
			->method('implementsActions')
			->with($this->equalTo(Backend::GET_DISPLAYNAME))
			->will($this->returnValue(true));

		$user = new User('foo', $backend);
		$this->assertEquals('foo', $user->getDisplayName());
	}

	public function testDisplayNameNotSupported() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock('\OC\User\Backend');
		$backend->expects($this->never())
			->method('getDisplayName');

		$backend->expects($this->any())
			->method('implementsActions')
			->with($this->equalTo(Backend::GET_DISPLAYNAME))
			->will($this->returnValue(false));

		$user = new User('foo', $backend);
		$this->assertEquals('foo', $user->getDisplayName());
	}

	public function testSetPassword() {
		/** @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend */
		$backend = $this->createMock(Dummy::class);
		$backend->expects($this->once())
			->method('setPassword')
			->with($this->equalTo('foo'), $this->equalTo('bar'))
			->willReturn(true);

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === Backend::SET_PASSWORD) {
					return true;
				} else {
					return false;
				}
			}));
		$config = $this->createMock(IConfig::class);
		$config->expects($this->once())
			->method('deleteUserValue')
			->with('foo', 'owncloud', 'lostpassword');

		$user = new User('foo', $backend, null, $config);
		$this->assertTrue($user->setPassword('bar',''));
	}

	public function testSetPasswordNotSupported() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Dummy::class);
		$backend->expects($this->never())
			->method('setPassword');

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(false));

		$user = new User('foo', $backend);
		$this->assertFalse($user->setPassword('bar',''));
	}

	public function testChangeAvatarSupportedYes() {
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
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Dummy::class);
		$backend->expects($this->once())
			->method('deleteUser')
			->with($this->equalTo('foo'));

		$user = new User('foo', $backend);
		$this->assertTrue($user->delete());
	}

	public function testGetHome() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Dummy::class);
		$backend->expects($this->once())
			->method('getHome')
			->with($this->equalTo('foo'))
			->will($this->returnValue('/home/foo'));

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === Backend::GET_HOME) {
					return true;
				} else {
					return false;
				}
			}));

		$user = new User('foo', $backend);
		$this->assertEquals('/home/foo', $user->getHome());
	}

	public function testGetBackendClassName() {
		$user = new User('foo', new Dummy());
		$this->assertEquals('Dummy', $user->getBackendClassName());
		$user = new User('foo', new Database());
		$this->assertEquals('Database', $user->getBackendClassName());
	}

	public function testGetHomeNotSupported() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Dummy::class);
		$backend->expects($this->never())
			->method('getHome');

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(false));

		$allConfig = $this->getMockBuilder('\OCP\IConfig')
			->disableOriginalConstructor()
			->getMock();
		$allConfig->expects($this->any())
			->method('getUserValue')
			->will($this->returnValue(true));
		$allConfig->expects($this->any())
			->method('getSystemValue')
			->with($this->equalTo('datadirectory'))
			->will($this->returnValue('arbitrary/path'));

		$user = new User('foo', $backend, null, $allConfig);
		$this->assertEquals('arbitrary/path/foo', $user->getHome());
	}

	public function testCanChangePassword() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Dummy::class);

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === Backend::SET_PASSWORD) {
					return true;
				} else {
					return false;
				}
			}));

		$user = new User('foo', $backend);
		$this->assertTrue($user->canChangePassword());
	}

	public function testCanChangePasswordNotSupported() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Dummy::class);

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(false));

		$user = new User('foo', $backend);
		$this->assertFalse($user->canChangePassword());
	}

	public function testCanChangeDisplayName() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Dummy::class);

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === Backend::SET_DISPLAYNAME) {
					return true;
				} else {
					return false;
				}
			}));

		$user = new User('foo', $backend);
		$this->assertTrue($user->canChangeDisplayName());
	}

	public function testCanChangeDisplayNameNotSupported() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Dummy::class);

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(false));

		$user = new User('foo', $backend);
		$this->assertFalse($user->canChangeDisplayName());
	}

	public function testSetDisplayNameSupported() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock('\OC\User\Database');

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === Backend::SET_DISPLAYNAME) {
					return true;
				} else {
					return false;
				}
			}));

		$backend->expects($this->once())
			->method('setDisplayName')
			->with('foo','Foo')
			->willReturn(true);

		$user = new User('foo', $backend);
		$this->assertTrue($user->setDisplayName('Foo'));
		$this->assertEquals('Foo',$user->getDisplayName());
	}

	/**
	 * don't allow display names containing whitespaces only
	 */
	public function testSetDisplayNameEmpty() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock('\OC\User\Database');

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === Backend::SET_DISPLAYNAME) {
					return true;
				} else {
					return false;
				}
			}));

		$user = new User('foo', $backend);
		$this->assertFalse($user->setDisplayName(' '));
		$this->assertEquals('foo',$user->getDisplayName());
	}

	public function testSetDisplayNameNotSupported() {
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
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Dummy::class);
		$backend->expects($this->once())
			->method('setPassword')
			->willReturn(true);

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

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === Backend::SET_PASSWORD) {
					return true;
				} else {
					return false;
				}
			}));

		$user = new User('foo', $backend, $emitter);

		$user->setPassword('bar','');
		$this->assertEquals(2, $hooksCalled);
	}

	public function testDeleteHooks() {
		$hooksCalled = 0;
		$test = $this;

		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Dummy::class);
		$backend->expects($this->once())
			->method('deleteUser');

		/**
		 * @param User $user
		 */
		$hook = function ($user) use ($test, &$hooksCalled) {
			$hooksCalled++;
			$test->assertEquals('foo', $user->getUID());
		};

		$emitter = new PublicEmitter();
		$emitter->listen('\OC\User', 'preDelete', $hook);
		$emitter->listen('\OC\User', 'postDelete', $hook);

		$user = new User('foo', $backend, $emitter);
		$this->assertTrue($user->delete());
		$this->assertEquals(2, $hooksCalled);
	}

	public function testGetCloudId() {
		/**
		 * @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Dummy::class);
		$urlGenerator = $this->getMockBuilder('\OC\URLGenerator')
				->setMethods(['getAbsoluteURL'])
				->disableOriginalConstructor()->getMock();
		$urlGenerator
				->expects($this->any())
				->method('getAbsoluteURL')
				->withAnyParameters()
				->willReturn('http://localhost:8888/owncloud');
		$user = new User('foo', $backend, null, null, $urlGenerator);
		$this->assertEquals("foo@localhost:8888/owncloud", $user->getCloudId());
	}
}
