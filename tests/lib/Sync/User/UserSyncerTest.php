<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace Tests\Sync;

use OC\Sync\User\UserSyncer;
use OC\User\Account;
use OC\User\AccountMapper;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\IUser;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;
use OCP\Sync\SyncException;
use OCP\Sync\User\IUserSyncBackend;
use OCP\Sync\User\SyncBackendUserFailedException;
use OCP\Sync\User\SyncBackendBrokenException;
use OCP\Sync\User\SyncingUser;
use OCP\Sync\ISyncer;
use OCP\UserInterface;
use Test\TestCase;

class UserSyncerTest extends TestCase {
	/** @var IUserManager */
	private $userManager;
	/** @var AccountMapper */
	private $mapper;
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var UserSyncer */
	private $userSyncer;

	protected function setUp(): void {
		$this->mapper = $this->createMock(AccountMapper::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);

		$this->userSyncer = new UserSyncer($this->userManager, $this->mapper, $this->config, $this->logger);
	}

	public function testLocalItemCount() {
		$this->mapper->method('getUserCount')->willReturn(97);
		$this->assertSame(97, $this->userSyncer->localItemCount());
	}

	public function testLocalItemCountWithBackends() {
		$userInterface = $this->createMock(UserInterface::class);
		$userSyncBackend = $this->createMock(IUserSyncBackend::class);
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$perBackendCount = [
			'back1' => 77,
			\get_class($userInterface) => 123,
		];

		$this->mapper->method('getUserCountPerBackend')->willReturn($perBackendCount);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->assertSame(123, $this->userSyncer->localItemCount(['backends' => \get_class($userInterface)]));
	}

	public function testLocalItemCountWithBackendsNotRegistered() {
		$userInterface = $this->createMock(UserInterface::class);
		$userSyncBackend = $this->createMock(IUserSyncBackend::class);
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$perBackendCount = [
			'back1' => 77,
			\get_class($userInterface) => 123,
		];

		$this->mapper->method('getUserCountPerBackend')->willReturn($perBackendCount);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->assertSame(77, $this->userSyncer->localItemCount(['backends' => 'back1']));
	}

	public function testCheck() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$account2 = Account::fromRow([
			'id' => 234,
			'email' => 'awe@example.io',
			'user_id' => 'user2',
			'lower_user_id' => 'user2',
			'display_name' => 'awesome',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user2',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser2 = new SyncingUser('user2');
		$syncUser2->setDisplayName('awesome');
		$syncUser2->setEmail('awe@example.io');

		$userSyncBackend->method('getSyncingUser')
			->will($this->returnValueMap([
				['user1', $syncUser1]
			]));
		$userSyncBackend2->method('getSyncingUser')
			->will($this->returnValueMap([
				['user2', $syncUser2]
			]));

		$accountList = [$account1, $account2];
		$this->mapper->method('callForUsers')
			->will($this->returnCallback(function ($callback) use ($accountList) {
				foreach ($accountList as $acc) {
					$callback($acc);
				}
			}));

		$collectedData = [];
		$collectingCallback = function ($kvData, $state) use (&$collectedData) {
			$collectedData[] = ['data' => $kvData, 'state' => $state];
		};

		$this->userSyncer->check($collectingCallback);

		$this->assertSame(2, \count($collectedData)); // 2 results

		$this->assertEquals($syncUser1->getAllData(), $collectedData[0]['data']);
		$this->assertSame(ISyncer::CHECK_STATE_NO_CHANGE, $collectedData[0]['state']);

		$this->assertEquals($syncUser2->getAllData(), $collectedData[1]['data']);
		$this->assertSame(ISyncer::CHECK_STATE_NO_CHANGE, $collectedData[1]['state']);
	}

	public function testCheckFailedUser() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$account2 = Account::fromRow([
			'id' => 234,
			'email' => 'awe@example.io',
			'user_id' => 'user2',
			'lower_user_id' => 'user2',
			'display_name' => 'awesome',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user2',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser2 = new SyncingUser('user2');
		$syncUser2->setDisplayName('awesome');
		$syncUser2->setEmail('awe@example.io');

		$userSyncBackend->method('getSyncingUser')
			->will($this->throwException(new SyncBackendUserFailedException('Failed to fetch')));
		$userSyncBackend2->method('getSyncingUser')
			->will($this->returnValueMap([
				['user2', $syncUser2]
			]));

		$accountList = [$account1, $account2];
		$this->mapper->method('callForUsers')
			->will($this->returnCallback(function ($callback) use ($accountList) {
				foreach ($accountList as $acc) {
					$callback($acc);
				}
			}));

		$collectedData = [];
		$collectingCallback = function ($kvData, $state) use (&$collectedData) {
			$collectedData[] = ['data' => $kvData, 'state' => $state];
		};

		$this->userSyncer->check($collectingCallback);

		$this->assertSame(2, \count($collectedData)); // 2 results

		$this->assertEquals(new SyncBackendUserFailedException('Failed to fetch'), $collectedData[0]['data']);
		$this->assertSame(ISyncer::CHECK_STATE_ERROR, $collectedData[0]['state']);

		$this->assertEquals($syncUser2->getAllData(), $collectedData[1]['data']);
		$this->assertSame(ISyncer::CHECK_STATE_NO_CHANGE, $collectedData[1]['state']);
	}

	public function testCheckBrokenBackend() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$account1_2 = Account::fromRow([
			'id' => 123456,
			'email' => 'disp02@example.io',
			'user_id' => 'user1_2',
			'lower_user_id' => 'user1_2',
			'display_name' => 'display1or2',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1_2',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1_2 = new SyncingUser('user1_2');
		$syncUser1_2->setDisplayName('display1or2');
		$syncUser1_2->setEmail('disp02@example.io');

		$account2 = Account::fromRow([
			'id' => 234,
			'email' => 'awe@example.io',
			'user_id' => 'user2',
			'lower_user_id' => 'user2',
			'display_name' => 'awesome',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user2',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser2 = new SyncingUser('user2');
		$syncUser2->setDisplayName('awesome');
		$syncUser2->setEmail('awe@example.io');

		$userSyncBackend->expects($this->once())
			->method('getSyncingUser')
			->will($this->throwException(new SyncBackendBrokenException('Backend disconnected')));
		$userSyncBackend2->method('getSyncingUser')
			->will($this->returnValueMap([
				['user2', $syncUser2]
			]));

		$accountList = [$account1, $account1_2, $account2];
		$this->mapper->method('callForUsers')
			->will($this->returnCallback(function ($callback) use ($accountList) {
				foreach ($accountList as $acc) {
					$callback($acc);
				}
			}));

		$collectedData = [];
		$collectingCallback = function ($kvData, $state) use (&$collectedData) {
			$collectedData[] = ['data' => $kvData, 'state' => $state];
		};

		$this->userSyncer->check($collectingCallback);

		$this->assertSame(2, \count($collectedData)); // 2 results

		$this->assertEquals(new SyncBackendBrokenException('Backend disconnected'), $collectedData[0]['data']);
		$this->assertSame(ISyncer::CHECK_STATE_ERROR, $collectedData[0]['state']);
		// only one "backend broken" exception is expected for the syncBackend1

		$this->assertEquals($syncUser2->getAllData(), $collectedData[1]['data']);
		$this->assertSame(ISyncer::CHECK_STATE_NO_CHANGE, $collectedData[1]['state']);
	}

	public function testCheckOnlyOneBackend() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$account2 = Account::fromRow([
			'id' => 234,
			'email' => 'awe@example.io',
			'user_id' => 'user2',
			'lower_user_id' => 'user2',
			'display_name' => 'awesome',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user2',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser2 = new SyncingUser('user2');
		$syncUser2->setDisplayName('awesome');
		$syncUser2->setEmail('awe@example.io');

		$userSyncBackend->method('getSyncingUser')
			->will($this->returnValueMap([
				['user1', $syncUser1]
			]));
		$userSyncBackend2->expects($this->never())
			->method('getSyncingUser')
			->will($this->returnValueMap([
				['user2', $syncUser2]
			]));

		$accountList = [$account1, $account2];
		$this->mapper->method('callForUsers')
			->will($this->returnCallback(function ($callback) use ($accountList) {
				foreach ($accountList as $acc) {
					$callback($acc);
				}
			}));

		$collectedData = [];
		$collectingCallback = function ($kvData, $state) use (&$collectedData) {
			$collectedData[] = ['data' => $kvData, 'state' => $state];
		};

		$this->userSyncer->check($collectingCallback, ['backends' => 'Mock_UserInterface_001']);

		$this->assertSame(1, \count($collectedData)); // 1 results

		$this->assertEquals($syncUser1->getAllData(), $collectedData[0]['data']);
		$this->assertSame(ISyncer::CHECK_STATE_NO_CHANGE, $collectedData[0]['state']);
	}

	public function testCheckMissingUserDisable() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$account2 = Account::fromRow([
			'id' => 234,
			'email' => 'awe@example.io',
			'user_id' => 'user2',
			'lower_user_id' => 'user2',
			'display_name' => 'awesome',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user2',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser2 = new SyncingUser('user2');
		$syncUser2->setDisplayName('awesome');
		$syncUser2->setEmail('awe@example.io');

		$userSyncBackend->method('getSyncingUser')
			->will($this->returnValueMap([
				['user1', null]
			]));
		$userSyncBackend2->method('getSyncingUser')
			->will($this->returnValueMap([
				['user2', $syncUser2]
			]));

		$userObj = $this->createMock(IUser::class);
		$userObj->method('isEnabled')->willReturn(true);
		$userObj->expects($this->once())
			->method('setEnabled')
			->with(false);
		$userObj->expects($this->never())
			->method('delete');
		$this->userManager->method('get')
			->will($this->returnValueMap([
				['user1', false, $userObj]
			]));

		$accountList = [$account1, $account2];
		$this->mapper->method('callForUsers')
			->will($this->returnCallback(function ($callback) use ($accountList) {
				foreach ($accountList as $acc) {
					$callback($acc);
				}
			}));

		$collectedData = [];
		$collectingCallback = function ($kvData, $state) use (&$collectedData) {
			$collectedData[] = ['data' => $kvData, 'state' => $state];
		};

		$this->userSyncer->check($collectingCallback);

		$this->assertSame(2, \count($collectedData)); // 2 results

		$this->assertEquals(['uid' => 'user1', 'displayname' => 'display1', 'email' => 'disp@example.io'], $collectedData[0]['data']);
		$this->assertSame(ISyncer::CHECK_STATE_DISABLED, $collectedData[0]['state']);

		$this->assertEquals($syncUser2->getAllData(), $collectedData[1]['data']);
		$this->assertSame(ISyncer::CHECK_STATE_NO_CHANGE, $collectedData[1]['state']);
	}

	public function testCheckMissingUserRemoved() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$account2 = Account::fromRow([
			'id' => 234,
			'email' => 'awe@example.io',
			'user_id' => 'user2',
			'lower_user_id' => 'user2',
			'display_name' => 'awesome',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user2',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser2 = new SyncingUser('user2');
		$syncUser2->setDisplayName('awesome');
		$syncUser2->setEmail('awe@example.io');

		$userSyncBackend->method('getSyncingUser')
			->will($this->returnValueMap([
				['user1', null]
			]));
		$userSyncBackend2->method('getSyncingUser')
			->will($this->returnValueMap([
				['user2', $syncUser2]
			]));

		$userObj = $this->createMock(IUser::class);
		$userObj->method('isEnabled')->willReturn(true);
		$userObj->expects($this->never())
			->method('setEnabled');
		$userObj->expects($this->once())
			->method('delete');
		$this->userManager->method('get')
			->will($this->returnValueMap([
				['user1', false, $userObj]
			]));

		$accountList = [$account1, $account2];
		$this->mapper->method('callForUsers')
			->will($this->returnCallback(function ($callback) use ($accountList) {
				foreach ($accountList as $acc) {
					$callback($acc);
				}
			}));

		$collectedData = [];
		$collectingCallback = function ($kvData, $state) use (&$collectedData) {
			$collectedData[] = ['data' => $kvData, 'state' => $state];
		};

		$this->userSyncer->check($collectingCallback, ['missingAction' => 'remove']);

		$this->assertSame(2, \count($collectedData)); // 2 results

		$this->assertEquals(['uid' => 'user1', 'displayname' => 'display1', 'email' => 'disp@example.io'], $collectedData[0]['data']);
		$this->assertSame(ISyncer::CHECK_STATE_REMOVED, $collectedData[0]['state']);

		$this->assertEquals($syncUser2->getAllData(), $collectedData[1]['data']);
		$this->assertSame(ISyncer::CHECK_STATE_NO_CHANGE, $collectedData[1]['state']);
	}

	public function testCheckOne() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$this->mapper->expects($this->once())
			->method('getByUid')
			->willReturn($account1);

		$userSyncBackend->method('getSyncingUser')
			->will($this->returnValueMap([
				['user1', $syncUser1]
			]));
		$userSyncBackend2->expects($this->never())
			->method('getSyncingUser');

		$this->assertSame(ISyncer::CHECK_STATE_NO_CHANGE, $this->userSyncer->checkOne('user1'));
	}

	public function testCheckOneDisabled() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$this->mapper->expects($this->once())
			->method('getByUid')
			->willReturn($account1);

		$userObj = $this->createMock(IUser::class);
		$userObj->method('isEnabled')->willReturn(true);
		$userObj->expects($this->once())
			->method('setEnabled');
		$userObj->expects($this->never())
			->method('delete');
		$this->userManager->method('get')
			->will($this->returnValueMap([
				['user1', false, $userObj]
			]));

		$userSyncBackend->method('getSyncingUser')
			->will($this->returnValueMap([
				['user1', null]
			]));
		$userSyncBackend2->expects($this->never())
			->method('getSyncingUser');

		$this->assertSame(ISyncer::CHECK_STATE_DISABLED, $this->userSyncer->checkOne('user1'));
	}

	public function testCheckOneRemoved() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$this->mapper->expects($this->once())
			->method('getByUid')
			->willReturn($account1);

		$userObj = $this->createMock(IUser::class);
		$userObj->method('isEnabled')->willReturn(true);
		$userObj->expects($this->never())
			->method('setEnabled');
		$userObj->expects($this->once())
			->method('delete');
		$this->userManager->method('get')
			->will($this->returnValueMap([
				['user1', false, $userObj]
			]));

		$userSyncBackend->method('getSyncingUser')
			->will($this->returnValueMap([
				['user1', null]
			]));
		$userSyncBackend2->expects($this->never())
			->method('getSyncingUser');

		$this->assertSame(ISyncer::CHECK_STATE_REMOVED, $this->userSyncer->checkOne('user1', ['missingAction' => 'remove']));
	}

	public function testCheckOneSyncFetchException() {
		$this->expectException(SyncException::class);

		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$this->mapper->expects($this->once())
			->method('getByUid')
			->willReturn($account1);

		$userSyncBackend->method('getSyncingUser')
			->will($this->throwException(new SyncBackendBrokenException('disconnecter from external')));
		$userSyncBackend2->expects($this->never())
			->method('getSyncingUser');

		$this->userSyncer->checkOne('user1');
	}

	public function testCheckOneAccountNotExists() {
		$this->expectException(SyncBackendUserFailedException::class);
		$this->expectExceptionMessage('The database returned no accounts for this uid: user1');

		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$this->mapper->expects($this->once())
			->method('getByUid')
			->will($this->throwException(new DoesNotExistException('account does not exists')));

		$this->userSyncer->checkOne('user1');
	}

	public function testCheckOneMultipleAccountExist() {
		$this->expectException(SyncBackendUserFailedException::class);
		$this->expectExceptionMessage('The database returned multiple accounts for this uid: user1');

		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$this->mapper->expects($this->once())
			->method('getByUid')
			->will($this->throwException(new MultipleObjectsReturnedException('account does not exists')));

		$this->userSyncer->checkOne('user1');
	}

	public function testCheckOneNotInBackend() {
		$this->expectException(SyncBackendUserFailedException::class);
		$this->expectExceptionMessage('User found not belonging to any of the requested backends');

		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$this->mapper->expects($this->once())
			->method('getByUid')
			->willReturn($account1);

		$this->userSyncer->checkOne('user1', ['backends' => 'anotherOne']);
	}

	public function testRemoteItemCount() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);
		$userSyncBackend->method('userCount')->willReturn(290);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);
		$userSyncBackend2->method('userCount')->willReturn(150);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$this->assertSame(440, $this->userSyncer->remoteItemCount());
	}

	public function testRemoteItemCountNull() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);
		$userSyncBackend->method('userCount')->willReturn(290);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);
		$userSyncBackend2->method('userCount')->willReturn(null);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$this->assertNull($this->userSyncer->remoteItemCount());
	}

	public function testRemoteItemCountWithBackends() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);
		$userSyncBackend->method('userCount')->willReturn(290);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);
		$userSyncBackend2->method('userCount')->willReturn(150);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$this->assertSame(290, $this->userSyncer->remoteItemCount(['backends' => 'Mock_UserInterface_001']));
	}

	public function testSync() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$account2 = Account::fromRow([
			'id' => 234,
			'email' => 'awe@example.io',
			'user_id' => 'user2',
			'lower_user_id' => 'user2',
			'display_name' => 'awesome',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user2',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser2 = new SyncingUser('user2');
		$syncUser2->setDisplayName('awesome');
		$syncUser2->setEmail('awe@example.io');

		$userSyncBackend->expects($this->exactly(2))
			->method('getNextUser')
			->will($this->onConsecutiveCalls($syncUser1, null));
		$userSyncBackend2->expects($this->exactly(2))
			->method('getNextUser')
			->will($this->onConsecutiveCalls($syncUser2, null));

		$this->mapper->method('getByUid')
			->will($this->returnValueMap([
				['user1', $account1],
				['user2', $account2],
			]));
		$this->mapper->expects($this->exactly(2))
			->method('update');
		$this->mapper->expects($this->never())
			->method('insert');

		$this->config->method('getUserValue')
			->will($this->returnValueMap([
				['user1', 'core', 'enabled', 'true'],
				['user2', 'core', 'enabled', 'true'],
				['user1', 'login', 'lastLogin', 'true'],
				['user2', 'login', 'lastLogin', 'true'],
				['user1', 'core', 'username', 'user1_re'],
				['user2', 'core', 'username', 'user2_re'],
			]));
		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', '/foo/bar']
			]));

		$collectedData = [];
		$collectingCallback = function ($kvData) use (&$collectedData) {
			$collectedData[] = $kvData;
		};

		$this->userSyncer->sync($collectingCallback);

		$this->assertSame(2, \count($collectedData));

		$this->assertEquals($syncUser1->getAllData(), $collectedData[0]);
		$this->assertEquals($syncUser2->getAllData(), $collectedData[1]);
	}

	public function testSyncNew() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$syncUser2 = new SyncingUser('user2');
		$syncUser2->setDisplayName('awesome');
		$syncUser2->setEmail('awe@example.io');

		$userSyncBackend->expects($this->exactly(2))
			->method('getNextUser')
			->will($this->onConsecutiveCalls($syncUser1, null));
		$userSyncBackend2->expects($this->exactly(2))
			->method('getNextUser')
			->will($this->onConsecutiveCalls($syncUser2, null));

		$this->mapper->method('getByUid')
			->will($this->throwException(new DoesNotExistException('account does not exists')));
		$this->mapper->expects($this->never())
			->method('update');
		$this->mapper->expects($this->exactly(2))
			->method('insert');

		$this->config->method('getUserValue')
			->will($this->returnValueMap([
				['user1', 'core', 'enabled', 'true'],
				['user2', 'core', 'enabled', 'true'],
				['user1', 'login', 'lastLogin', 'true'],
				['user2', 'login', 'lastLogin', 'true'],
				['user1', 'core', 'username', 'user1_re'],
				['user2', 'core', 'username', 'user2_re'],
			]));
		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', '/foo/bar']
			]));

		$collectedData = [];
		$collectingCallback = function ($kvData) use (&$collectedData) {
			$collectedData[] = $kvData;
		};

		$this->userSyncer->sync($collectingCallback);

		$this->assertSame(2, \count($collectedData));

		$this->assertEquals($syncUser1->getAllData(), $collectedData[0]);
		$this->assertEquals($syncUser2->getAllData(), $collectedData[1]);
	}

	public function testSyncUserFailed() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$account2 = Account::fromRow([
			'id' => 234,
			'email' => 'awe@example.io',
			'user_id' => 'user2',
			'lower_user_id' => 'user2',
			'display_name' => 'awesome',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user2',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser2 = new SyncingUser('user2');
		$syncUser2->setDisplayName('awesome');
		$syncUser2->setEmail('awe@example.io');

		$account3 = Account::fromRow([
			'id' => 2346,
			'email' => 'awe3@example.io',
			'user_id' => 'user3',
			'lower_user_id' => 'user3',
			'display_name' => 'awesome3',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user3',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser3 = new SyncingUser('user3');
		$syncUser3->setDisplayName('awesome3');
		$syncUser3->setEmail('awe3@example.io');

		$userSyncBackend->expects($this->exactly(2))
			->method('getNextUser')
			->will($this->onConsecutiveCalls($syncUser1, null));
		$userSyncBackend2->expects($this->exactly(3))
			->method('getNextUser')
			->will($this->returnCallback(function () use ($syncUser3) {
				static $i = 0;
				$i++;
				if ($i === 1) {
					throw new SyncBackendUserFailedException('user collision');
				} elseif ($i === 2) {
					return $syncUser3;
				} else {
					return null;
				}
			}));

		$this->mapper->method('getByUid')
			->will($this->returnValueMap([
				['user1', $account1],
				['user2', $account2],
				['user3', $account3],
			]));
		$this->mapper->expects($this->exactly(2))
			->method('update');
		$this->mapper->expects($this->never())
			->method('insert');

		$this->config->method('getUserValue')
			->will($this->returnValueMap([
				['user1', 'core', 'enabled', 'true'],
				['user2', 'core', 'enabled', 'true'],
				['user1', 'login', 'lastLogin', 'true'],
				['user2', 'login', 'lastLogin', 'true'],
				['user1', 'core', 'username', 'user1_re'],
				['user2', 'core', 'username', 'user2_re'],
			]));
		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', '/foo/bar']
			]));

		$collectedData = [];
		$collectingCallback = function ($kvData) use (&$collectedData) {
			$collectedData[] = $kvData;
		};

		$this->userSyncer->sync($collectingCallback);

		$this->assertSame(3, \count($collectedData));

		$this->assertEquals($syncUser1->getAllData(), $collectedData[0]);
		$this->assertEquals(new SyncBackendUserFailedException('user collision'), $collectedData[1]);
		$this->assertEquals($syncUser3->getAllData(), $collectedData[2]);
	}

	public function testSyncBackendBroken() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$account2 = Account::fromRow([
			'id' => 234,
			'email' => 'awe@example.io',
			'user_id' => 'user2',
			'lower_user_id' => 'user2',
			'display_name' => 'awesome',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user2',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser2 = new SyncingUser('user2');
		$syncUser2->setDisplayName('awesome');
		$syncUser2->setEmail('awe@example.io');

		$account3 = Account::fromRow([
			'id' => 2346,
			'email' => 'awe3@example.io',
			'user_id' => 'user3',
			'lower_user_id' => 'user3',
			'display_name' => 'awesome3',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user3',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser3 = new SyncingUser('user3');
		$syncUser3->setDisplayName('awesome3');
		$syncUser3->setEmail('awe3@example.io');

		$userSyncBackend->expects($this->exactly(2))
			->method('getNextUser')
			->will($this->onConsecutiveCalls($syncUser1, null));
		$userSyncBackend2->expects($this->once())
			->method('getNextUser')
			->will($this->returnCallback(function () use ($syncUser3) {
				static $i = 0;
				$i++;
				if ($i === 1) {
					throw new SyncBackendBrokenException('disconnected from external');
				} else {
					return null;
				}
			}));

		$this->mapper->method('getByUid')
			->will($this->returnValueMap([
				['user1', $account1],
				['user2', $account2],
				['user3', $account3],
			]));
		$this->mapper->expects($this->once())
			->method('update');
		$this->mapper->expects($this->never())
			->method('insert');

		$this->config->method('getUserValue')
			->will($this->returnValueMap([
				['user1', 'core', 'enabled', 'true'],
				['user2', 'core', 'enabled', 'true'],
				['user1', 'login', 'lastLogin', 'true'],
				['user2', 'login', 'lastLogin', 'true'],
				['user1', 'core', 'username', 'user1_re'],
				['user2', 'core', 'username', 'user2_re'],
			]));
		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', '/foo/bar']
			]));

		$collectedData = [];
		$collectingCallback = function ($kvData) use (&$collectedData) {
			$collectedData[] = $kvData;
		};

		$this->userSyncer->sync($collectingCallback);

		$this->assertSame(2, \count($collectedData));

		$this->assertEquals($syncUser1->getAllData(), $collectedData[0]);
		$this->assertEquals(new SyncBackendBrokenException('disconnected from external'), $collectedData[1]);
	}

	public function testSyncSpecificBackends() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$account2 = Account::fromRow([
			'id' => 234,
			'email' => 'awe@example.io',
			'user_id' => 'user2',
			'lower_user_id' => 'user2',
			'display_name' => 'awesome',
			'quota' => null,
			'last_login' => 998866,
			'backend' => \get_class($userInterface2),
			'home' => '/home/user2',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '888',
		]);
		$syncUser2 = new SyncingUser('user2');
		$syncUser2->setDisplayName('awesome');
		$syncUser2->setEmail('awe@example.io');

		$userSyncBackend->expects($this->exactly(2))
			->method('getNextUser')
			->will($this->onConsecutiveCalls($syncUser1, null));
		$userSyncBackend2->expects($this->never())
			->method('getNextUser')
			->will($this->onConsecutiveCalls($syncUser2, null));

		$this->mapper->method('getByUid')
			->will($this->returnValueMap([
				['user1', $account1],
				['user2', $account2],
			]));
		$this->mapper->expects($this->once())
			->method('update');
		$this->mapper->expects($this->never())
			->method('insert');

		$this->config->method('getUserValue')
			->will($this->returnValueMap([
				['user1', 'core', 'enabled', 'true'],
				['user2', 'core', 'enabled', 'true'],
				['user1', 'login', 'lastLogin', 'true'],
				['user2', 'login', 'lastLogin', 'true'],
				['user1', 'core', 'username', 'user1_re'],
				['user2', 'core', 'username', 'user2_re'],
			]));
		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', '/foo/bar']
			]));

		$collectedData = [];
		$collectingCallback = function ($kvData) use (&$collectedData) {
			$collectedData[] = $kvData;
		};

		$this->userSyncer->sync($collectingCallback, ['backends' => 'Mock_UserInterface_001']);

		$this->assertSame(1, \count($collectedData));

		$this->assertEquals($syncUser1->getAllData(), $collectedData[0]);
	}

	public function testSyncOne() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$userSyncBackend->expects($this->once())
			->method('getSyncingUser')
			->willReturn($syncUser1);
		$userSyncBackend2->expects($this->never())
			->method('getSyncingUser');

		$this->mapper->method('getByUid')
			->will($this->returnValueMap([
				['user1', $account1],
			]));
		$this->mapper->expects($this->once())
			->method('update');
		$this->mapper->expects($this->never())
			->method('insert');

		$this->config->method('getUserValue')
			->will($this->returnValueMap([
				['user1', 'core', 'enabled', 'true'],
				['user2', 'core', 'enabled', 'true'],
				['user1', 'login', 'lastLogin', 'true'],
				['user2', 'login', 'lastLogin', 'true'],
				['user1', 'core', 'username', 'user1_re'],
				['user2', 'core', 'username', 'user2_re'],
			]));
		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', '/foo/bar']
			]));

		$this->assertTrue($this->userSyncer->syncOne('user1'));
	}

	public function testSyncOneNew() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$userSyncBackend->expects($this->once())
			->method('getSyncingUser')
			->willReturn($syncUser1);
		$userSyncBackend2->expects($this->never())
			->method('getSyncingUser');

		$this->mapper->method('getByUid')
			->will($this->throwException(new DoesNotExistException('account missing')));
		$this->mapper->expects($this->never())
			->method('update');
		$this->mapper->expects($this->once())
			->method('insert');

		$this->config->method('getUserValue')
			->will($this->returnValueMap([
				['user1', 'core', 'enabled', 'true'],
				['user2', 'core', 'enabled', 'true'],
				['user1', 'login', 'lastLogin', 'true'],
				['user2', 'login', 'lastLogin', 'true'],
				['user1', 'core', 'username', 'user1_re'],
				['user2', 'core', 'username', 'user2_re'],
			]));
		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', '/foo/bar']
			]));

		$this->assertTrue($this->userSyncer->syncOne('user1'));
	}

	public function testSyncOneExternalNotFound() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$userSyncBackend->expects($this->once())
			->method('getSyncingUser')
			->willReturn(null);
		$userSyncBackend2->expects($this->once())
			->method('getSyncingUser')
			->willReturn(null);

		$this->mapper->expects($this->never())
			->method('getByUid');
		$this->mapper->expects($this->never())
			->method('update');
		$this->mapper->expects($this->never())
			->method('insert');

		$this->config->method('getUserValue')
			->will($this->returnValueMap([
				['user1', 'core', 'enabled', 'true'],
				['user2', 'core', 'enabled', 'true'],
				['user1', 'login', 'lastLogin', 'true'],
				['user2', 'login', 'lastLogin', 'true'],
				['user1', 'core', 'username', 'user1_re'],
				['user2', 'core', 'username', 'user2_re'],
			]));
		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', '/foo/bar']
			]));

		$this->assertFalse($this->userSyncer->syncOne('user1'));
	}

	public function testSyncOneExternalException() {
		$this->expectException(SyncException::class);

		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$userSyncBackend->expects($this->once())
			->method('getSyncingUser')
			->will($this->throwException(new SyncBackendBrokenException('disconnected from external')));
		$userSyncBackend2->expects($this->never())
			->method('getSyncingUser');

		$this->mapper->expects($this->never())
			->method('getByUid');
		$this->mapper->expects($this->never())
			->method('update');
		$this->mapper->expects($this->never())
			->method('insert');

		$this->config->method('getUserValue')
			->will($this->returnValueMap([
				['user1', 'core', 'enabled', 'true'],
				['user2', 'core', 'enabled', 'true'],
				['user1', 'login', 'lastLogin', 'true'],
				['user2', 'login', 'lastLogin', 'true'],
				['user1', 'core', 'username', 'user1_re'],
				['user2', 'core', 'username', 'user2_re'],
			]));
		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', '/foo/bar']
			]));

		$this->userSyncer->syncOne('user1');
	}

	public function testSyncOneWithBackends() {
		$userInterface = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_001')
			->getMock();
		$userSyncBackend = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_001')
			->getMock();
		$userSyncBackend->method('getUserInterface')->willReturn($userInterface);

		$userInterface2 = $this->getMockBuilder(UserInterface::class)
			->setMockClassName('Mock_UserInterface_002')
			->getMock();
		$userSyncBackend2 = $this->getMockBuilder(IUserSyncBackend::class)
			->setMockClassName('Mock_IUserSyncBackend_002')
			->getMock();
		$userSyncBackend2->method('getUserInterface')->willReturn($userInterface2);

		$this->userSyncer->registerBackend($userSyncBackend);
		$this->userSyncer->registerBackend($userSyncBackend2);

		$account1 = Account::fromRow([
			'id' => 123,
			'email' => 'disp@example.io',
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'display1',
			'quota' => null,
			'last_login' => 998877,
			'backend' => \get_class($userInterface),
			'home' => '/home/user1',
			'state' => Account::STATE_ENABLED,
			'creation_time' => '777',
		]);
		$syncUser1 = new SyncingUser('user1');
		$syncUser1->setDisplayName('display1');
		$syncUser1->setEmail('disp@example.io');

		$userSyncBackend->expects($this->never())
			->method('getSyncingUser');
		$userSyncBackend2->expects($this->once())
			->method('getSyncingUser')
			->willReturn(null);

		$this->mapper->method('getByUid')
			->will($this->returnValueMap([
				['user1', $account1],
			]));
		$this->mapper->expects($this->never())
			->method('update');
		$this->mapper->expects($this->never())
			->method('insert');

		$this->config->method('getUserValue')
			->will($this->returnValueMap([
				['user1', 'core', 'enabled', 'true'],
				['user2', 'core', 'enabled', 'true'],
				['user1', 'login', 'lastLogin', 'true'],
				['user2', 'login', 'lastLogin', 'true'],
				['user1', 'core', 'username', 'user1_re'],
				['user2', 'core', 'username', 'user2_re'],
			]));
		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', '/foo/bar']
			]));

		$this->assertFalse($this->userSyncer->syncOne('user1', ['backends' => 'Mock_UserInterface_002']));
	}
}
