<?php

/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\User;
use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\Backend;
use OC\User\Database;
use OC\User\Manager;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\IConfig;
use OCP\IUser;
use Test\TestCase;

/**
 * Class ManagerTest
 *
 * @group DB
 *
 * @package Test\User
 */
class ManagerTest extends TestCase {

	/** @var Manager */
	private $manager;
	/** @var AccountMapper | \PHPUnit_Framework_MockObject_MockObject */
	private $accountMapper;

	public function setUp() {
		parent::setUp();

		/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject $config */
		$config = $this->createMock(IConfig::class);
		$this->accountMapper = $this->createMock(AccountMapper::class);
		$this->manager = new \OC\User\Manager($config, $this->accountMapper);
	}

	public function testGetBackends() {
		/** @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend */
		$backend = $this->createMock(Backend::class);
		$this->manager->registerBackend($backend);
		$this->assertEquals([$backend], $this->manager->getBackends());

		/** @var Backend | \PHPUnit_Framework_MockObject_MockObject $dummyDatabaseBackend */
		$dummyDatabaseBackend = $this->createMock(Database::class);
		$this->manager->registerBackend($dummyDatabaseBackend);
		$this->assertEquals([$backend, $dummyDatabaseBackend], $this->manager->getBackends());
	}


	public function testUserExistsSingleBackendExists() {
		$account = $this->createMock(Account::class);
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willReturn($account);
		$this->assertTrue($this->manager->userExists('foo'));
	}

	public function testUserExistsSingleBackendNotExists() {
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willThrowException(new DoesNotExistException(''));
		$this->assertFalse($this->manager->userExists('foo'));
	}

	public function testUserExistsNoBackends() {
		$this->assertFalse($this->manager->userExists('foo'));
	}

	public function testCheckPassword() {
		/**
		 * @var \OC\User\Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Database::class);
		$backend->expects($this->once())
			->method('checkPassword')
			->with($this->equalTo('foo'), $this->equalTo('bar'))
			->willReturn('foo');

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === \OC_User_Backend::CHECK_PASSWORD) {
					return true;
				} else {
					return false;
				}
			}));

		$this->manager->registerBackend($backend);

		$account = $this->createMock(Account::class);
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willReturn($account);

		$user = $this->manager->checkPassword('foo', 'bar');
		$this->assertTrue($user instanceof \OC\User\User);
	}

	public function testCheckPasswordNotSupported() {
		/**
		 * @var \OC\User\Backend | \PHPUnit_Framework_MockObject_MockObject $backend
		 */
		$backend = $this->createMock(Database::class);
		$backend->expects($this->never())
			->method('checkPassword');

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(false));

		$this->manager->registerBackend($backend);

		$this->assertFalse($this->manager->checkPassword('foo', 'bar'));
	}

	public function testGetOneBackendExists() {
		$account = new Account();
		$account->setUserId('foo');
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willReturn($account);
		$this->assertEquals('foo', $this->manager->get('foo')->getUID());
	}

	public function testGetOneBackendNotExists() {
		$this->assertEquals(null, $this->manager->get('foo'));
	}

	public function testSearch() {
		$a0 = new Account();
		$a0->setUserId('afoo');
		$a1 = new Account();
		$a1->setUserId('foo');
		$this->accountMapper->expects($this->once())->method('search')
			->with('user_id', 'fo')->willReturn([$a0, $a1]);
		$result = $this->manager->search('fo');
		$this->assertEquals(2, count($result));
		$this->assertEquals('afoo', array_shift($result)->getUID());
		$this->assertEquals('foo', array_shift($result)->getUID());
	}

	public function testSearchLimitOffset() {
		$a0 = new Account();
		$a0->setUserId('foo1');
		$a1 = new Account();
		$a1->setUserId('foo2');
		$a2 = new Account();
		$a2->setUserId('foo3');
		$this->accountMapper->expects($this->once())->method('search')
			->with('user_id', 'fo', 3, 1)->willReturn([$a0, $a1, $a2]);
		$result = $this->manager->search('fo', 3, 1);
		$this->assertEquals(3, count($result));
		$this->assertEquals('foo1', array_shift($result)->getUID());
		$this->assertEquals('foo2', array_shift($result)->getUID());
		$this->assertEquals('foo3', array_shift($result)->getUID());
	}

	public function testCountUsersNoBackend() {
		$this->accountMapper->expects($this->once())->method('getUserCountPerBackend')->willReturn([]);
		$result = $this->manager->countUsers();
		$this->assertEquals([], $result);
	}

	public function testCountUsersOneBackend() {
		$this->accountMapper->expects($this->once())->method('getUserCountPerBackend')->willReturn([
			'dummy' => 7
		]);

		$result = $this->manager->countUsers();
		$this->assertEquals(['dummy' => 7], $result);
	}

	public function testCountUsersOnlySeen() {
		$this->manager = \OC::$server->getUserManager();
		if ($this->manager->userExists('testseencount1')) {
			$this->manager->get('testseencount1')->delete();
		}
		if ($this->manager->userExists('testseencount2')) {
			$this->manager->get('testseencount2')->delete();
		}
		if ($this->manager->userExists('testseencount3')) {
			$this->manager->get('testseencount3')->delete();
		}
		if ($this->manager->userExists('testseencount4')) {
			$this->manager->get('testseencount4')->delete();
		}

		// count other users in the db before adding our own
		$countBefore = $this->manager->countUsers(true);

		//Add test users
		$user1 = $this->manager->createUser('testseencount1', 'testseencount1');
		$user1->updateLastLoginTimestamp();

		$user2 = $this->manager->createUser('testseencount2', 'testseencount2');
		$user2->updateLastLoginTimestamp();

		$user3 = $this->manager->createUser('testseencount3', 'testseencount3');

		$user4 = $this->manager->createUser('testseencount4', 'testseencount4');
		$user4->updateLastLoginTimestamp();

		$this->assertEquals($countBefore + 3, $this->manager->countUsers(true));

		//cleanup
		$user1->delete();
		$user2->delete();
		$user3->delete();
		$user4->delete();
	}

	public function testCallForSeenUsers() {
		$this->manager = \OC::$server->getUserManager();
		if ($this->manager->userExists('testseen1')) {
			$this->manager->get('testseen1')->delete();
		}
		if ($this->manager->userExists('testseen2')) {
			$this->manager->get('testseen2')->delete();
		}
		if ($this->manager->userExists('testseen3')) {
			$this->manager->get('testseen3')->delete();
		}
		if ($this->manager->userExists('testseen4')) {
			$this->manager->get('testseen4')->delete();
		}

		// count other users in the db before adding our own
		$count = 0;
		$function = function (IUser $user) use (&$count) {
			$count++;
		};
		$this->manager->callForAllUsers($function, '', true);
		$countBefore = $count;

		//Add test users
		$user1 = $this->manager->createUser('testseen1', 'testseen1');
		$user1->updateLastLoginTimestamp();

		$user2 = $this->manager->createUser('testseen2', 'testseen2');
		$user2->updateLastLoginTimestamp();

		$user3 = $this->manager->createUser('testseen3', 'testseen3');

		$user4 = $this->manager->createUser('testseen4', 'testseen4');
		$user4->updateLastLoginTimestamp();

		$count = 0;
		$this->manager->callForAllUsers($function, '', true);

		$this->assertEquals($countBefore + 3, $count);

		//cleanup
		$user1->delete();
		$user2->delete();
		$user3->delete();
		$user4->delete();
	}
}
