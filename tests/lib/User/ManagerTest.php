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
use \InvalidArgumentException;
use OC\MembershipManager;
use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\AccountTermMapper;
use OC\User\Backend;
use OC\User\Database;
use OC\User\Manager;
use OC\User\SyncService;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUser;
use Punic\Data;
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
	/** @var SyncService | \PHPUnit_Framework_MockObject_MockObject */
	private $syncService;
	/** @var MembershipManager | \PHPUnit_Framework_MockObject_MockObject */
	private $membershipManager;

	public function setUp() {
		parent::setUp();

		/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject $config */
		$config = $this->createMock(IConfig::class);
		/** @var ILogger | \PHPUnit_Framework_MockObject_MockObject $logger */
		$logger = $this->createMock(ILogger::class);
		$this->accountMapper = $this->createMock(AccountMapper::class);
		$this->syncService = $this->createMock(SyncService::class);
		$this->membershipManager = $this->createMock(MembershipManager::class);
		$this->manager = new \OC\User\Manager($config, $logger, $this->accountMapper, $this->syncService, $this->membershipManager);
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
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willThrowException(new DoesNotExistException(''));
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

		$account = $this->createMock(Account::class);

		$this->syncService->expects($this->once())
			->method('createOrSyncAccount')
			->with('foo', $backend)
			->willReturn($account);

		$this->manager->registerBackend($backend);

		$user = $this->manager->checkPassword('foo', 'bar');
		$this->assertInstanceOf(\OC\User\User::class, $user);
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

		// Second call should not call account mapper and fetch from cache
		$this->assertEquals('foo', $this->manager->get('foo')->getUID());
	}

	public function testGetByEmail() {
		$account = new Account();
		$account->setUserId('foo');
		$account->setEmail('foo@foo');
		$this->accountMapper->expects($this->once())->method('getByEmail')->with('foo@foo')->willReturn([$account]);
		$this->assertEquals('foo', $this->manager->getByEmail('foo@foo')[0]->getUID());
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testGetByEmailThrowsException() {
		$this->manager->getByEmail('');
	}

	public function testGetOneBackendNotExists() {
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willThrowException(new DoesNotExistException(''));
		$this->assertNull($this->manager->get('foo'));
	}

	public function testFind() {
		$a0 = new Account();
		$a0->setUserId('foo');
		$a1 = new Account();
		$a1->setUserId('foob');
		$this->accountMapper->expects($this->once())->method('find')
			->with('fo')->willReturn([$a0, $a1]);
		$result = $this->manager->find('fo');
		$this->assertCount(2, $result);
		$this->assertEquals('foo', array_shift($result)->getUID());
		$this->assertEquals('foob', array_shift($result)->getUID());
	}

	public function testSearch() {
		$a0 = new Account();
		$a0->setUserId('afoo');
		$a1 = new Account();
		$a1->setUserId('foo');
		$this->accountMapper->expects($this->once())->method('search')
			->with('user_id', 'fo')->willReturn([$a0, $a1]);
		$result = $this->manager->search('fo');
		$this->assertCount(2, $result);
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
		$this->assertCount(3, $result);
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
		$users = [];
		$function = function (IUser $user) use (&$users) {
			$users[] = $user->getUID();
		};
		$this->manager->callForAllUsers($function, '', true);
		$usersBefore = $users;

		//Add test users
		$user1 = $this->manager->createUser('testseen1', 'testseen1');
		$user1->updateLastLoginTimestamp();

		$user2 = $this->manager->createUser('testseen2', 'testseen2');
		$user2->updateLastLoginTimestamp();

		$user3 = $this->manager->createUser('testseen3', 'testseen3');

		$user4 = $this->manager->createUser('testseen4', 'testseen4');
		$user4->updateLastLoginTimestamp();

		$users = [];
		$this->manager->callForAllUsers($function, '', true);
		$this->assertCount(count($usersBefore) + 3, $users, join(', ', $usersBefore) . " !== " . join(', ', $users));

		//cleanup
		$user1->delete();
		$user2->delete();
		$user3->delete();
		$user4->delete();
	}

	public function testGetAccountObject() {
		$user = $this->createMock(IUser::class);
		$account = $this->createMock(Account::class);
		$user->expects($this->any())->method('getUID')->willReturn('foo');
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willReturn($account);

		// This should fetch user object from account mapper since user is not cached and created as object yet
		// (but exists in database)
		$this->assertEquals($this->manager->getAccountObject($user), $account);

		// This will create new user object from account and cache
		$user = $this->manager->getUserObject($account);

		// This should fetch from cache (getByUid not being called)
		$this->assertEquals($this->manager->getAccountObject($user), $account);
	}

	public function testGetAccountObjectDoesNotExists() {
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())->method('getUID')->willReturn('foo');
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willThrowException(new DoesNotExistException(''));

		$this->assertNull($this->manager->getAccountObject($user));
	}

	public function testNullUidMakesNoQueryToAccountsTable() {
		// migration from versions below 10.0. accounts table hasn't been created yet.
		$this->accountMapper->expects($this->never())->method('getByUid');
		$this->assertNull($this->manager->get(null));
	}

	public function testResets() {
		/** @var Backend | \PHPUnit_Framework_MockObject_MockObject $backend */
		$backend = $this->createMock(Backend::class);
		$this->manager->registerBackend($backend);
		$array = $this->manager->reset($this->accountMapper, [], $this->syncService);
		$this->assertEquals($array[0], $this->accountMapper);
		$this->assertEquals($array[1][get_class($backend)], $backend);
		$this->assertEquals($array[2], $this->syncService);

		$memb = $this->manager->resetMembershipManager($this->membershipManager);
		$this->assertEquals($memb, $this->membershipManager);
	}
}
