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
use OC\User\AccountTermMapper;
use OC\User\Backend;
use OC\User\Database;
use OC\User\Manager;
use OC\User\SyncService;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUser;
use Punic\Data;
use Test\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

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
	/** @var AccountMapper | \PHPUnit\Framework\MockObject\MockObject */
	private $accountMapper;
	/** @var SyncService | \PHPUnit\Framework\MockObject\MockObject */
	private $syncService;

	/**
	 * @var \OCP\Util\UserSearch
	 */
	protected $userSearch;

	public function setUp() {
		parent::setUp();

		$this->overwriteService('EventDispatcher', new EventDispatcher());
		/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject $config */
		$config = $this->createMock(IConfig::class);
		/** @var ILogger | \PHPUnit\Framework\MockObject\MockObject $logger */
		$logger = $this->createMock(ILogger::class);
		$this->accountMapper = $this->createMock(AccountMapper::class);
		$this->syncService = $this->createMock(SyncService::class);

		$this->userSearch = $this->getMockBuilder(\OCP\Util\UserSearch::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSearch->expects($this->any())
			->method('isSearchable')
			->willReturn(true);
		$this->manager = new \OC\User\Manager(
			$config, $logger, $this->accountMapper, $this->syncService, $this->userSearch
		);
	}

	public function testGetBackends() {
		/** @var Backend | \PHPUnit\Framework\MockObject\MockObject $backend */
		$backend = $this->createMock(Backend::class);
		$this->manager->registerBackend($backend);
		$this->assertEquals([$backend], $this->manager->getBackends());

		/** @var Backend | \PHPUnit\Framework\MockObject\MockObject $dummyDatabaseBackend */
		$dummyDatabaseBackend = $this->createMock(Database::class);
		$this->manager->registerBackend($dummyDatabaseBackend);
		$this->assertEquals([$backend, $dummyDatabaseBackend], $this->manager->getBackends());
	}

	public function testUserExistsAccountExists() {
		$account = $this->createMock(Account::class);
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willReturn($account);
		$this->assertTrue($this->manager->userExists('foo'));
	}

	public function testUserExistsAccountNotExists() {
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willThrowException(new DoesNotExistException(''));
		$this->assertFalse($this->manager->userExists('foo'));
	}

	public function testCheckPassword() {
		/**
		 * @var \OC\User\Backend | \PHPUnit\Framework\MockObject\MockObject $backend
		 */
		$backend = $this->createMock(Database::class);
		$backend->expects($this->once())
			->method('checkPassword')
			->with($this->equalTo('foo'), $this->equalTo('bar'))
			->willReturn('foo');

		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) {
				if ($actions === \OC\User\Backend::CHECK_PASSWORD) {
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
		 * @var \OC\User\Backend | \PHPUnit\Framework\MockObject\MockObject $backend
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

	public function testGetAccountExists() {
		$account = new Account();
		$account->setUserId('foo');
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willReturn($account);
		$this->assertEquals('foo', $this->manager->get('foo')->getUID());
	}

	public function testGetAccountNotExists() {
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willThrowException(new DoesNotExistException(''));
		$this->assertNull($this->manager->get('foo'));
	}

	public function testGetDuplicateAccountNotExists() {
		$this->accountMapper->expects($this->once())->method('getByUid')->with('foo')->willThrowException(new MultipleObjectsReturnedException(''));
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
		$this->assertEquals('foo', \array_shift($result)->getUID());
		$this->assertEquals('foob', \array_shift($result)->getUID());
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
		$this->assertEquals('afoo', \array_shift($result)->getUID());
		$this->assertEquals('foo', \array_shift($result)->getUID());
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
		$this->assertEquals('foo1', \array_shift($result)->getUID());
		$this->assertEquals('foo2', \array_shift($result)->getUID());
		$this->assertEquals('foo3', \array_shift($result)->getUID());
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
		$this->assertCount(\count($usersBefore) + 3, $users, \join(', ', $usersBefore) . " !== " . \join(', ', $users));

		//cleanup
		$user1->delete();
		$user2->delete();
		$user3->delete();
		$user4->delete();
	}

	public function testUsernameMaxLength() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('The username can not be longer than 64 characters');
		$this->manager = \OC::$server->getUserManager();
		$user = $this->manager->createUser('testuser123456789012345678901234567890123456789012345678901234567890', 'testuser1');
	}

	public function testNullUidMakesNoQueryToAccountsTable() {
		// migration from versions below 10.0. accounts table hasn't been created yet.
		$this->accountMapper->expects($this->never())->method('getByUid');
		$this->assertNull($this->manager->get(null));
	}

	public function testValidatePassword() {
		$this->accountMapper->expects($this->once())
			->method('getByUid')
			->with('testuser1')
			->willThrowException(new DoesNotExistException(''));

		$account = $this->createMock(Account::class);
		$this->syncService->expects($this->once())
			->method('createOrSyncAccount')
			->with('testuser1')
			->willReturn($account);

		$event = null;
		\OC::$server->getEventDispatcher()->addListener('OCP\User::validatePassword',
			function (GenericEvent $receivedEvent) use (&$event) {
				$event = $receivedEvent;
			});

		$this->manager->createUser('testuser1', 'abcdefg');

		$this->assertEquals('abcdefg', $event->getArgument('password'));
		$this->assertEquals('testuser1', $event->getArgument('uid'));
	}
}
