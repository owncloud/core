<?php
/**
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

namespace Test\Group;

use OC\Group\BackendGroup;
use OC\User\SyncService as UserSyncService;
use OC\Group\SyncService as GroupSyncService;
use OC\MembershipManager;
use OC\User\Account;
use OC\User\AccountTermMapper;
use OCP\GroupInterface;
use OCP\IConfig;
use OCP\ILogger;
use Test\TestCase;
use Test\Traits\GroupTrait;
use Test\Traits\UserTrait;
use Test\Util\Group\MemoryGroupMapper;
use Test\Util\MemoryMembershipManager;
use Test\Util\User\MemoryAccountMapper;

/**
 * Class SyncServiceTest
 *
 * @group DB
 */
class SyncServiceTest extends TestCase {

	use GroupTrait;
	use UserTrait;

	/** @var GroupInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $backend;

	/** @var MemoryGroupMapper */
	private $groupMapper;

	/** @var MemoryAccountMapper */
	private $accountMapper;

	/** @var MemoryMembershipManager */
	private $membershipManager;

	public function setUp() {
		parent::setUp();
		$this->backend = $this->getMockBuilder(GroupInterface::class)
			->disableOriginalConstructor()
			->setMethods([
				'getGroupDetails',
				'implementsActions',
				'getUserGroups',
				'inGroup',
				'getGroups',
				'groupExists',
				'usersInGroup',
				'createGroup',
				'deleteGroup',
				'addToGroup',
				'removeFromGroup',
				'isVisibleForScope',
			])
			->getMock();

		$db = \OC::$server->getDatabaseConnection();
		$config = $this->createMock(IConfig::class);
		$this->groupMapper = new MemoryGroupMapper($db);
		$this->accountMapper = new MemoryAccountMapper($config, $db, new AccountTermMapper($db));
		$this->membershipManager = new MemoryMembershipManager($db, $config);
	}

	public function tearDown() {
		$this->membershipManager->clear();
		$this->groupMapper->clear();
		$this->accountMapper->clear();
		parent::tearDown();
	}

	public function testCount() {
		$syncService = $this->getSyncService();

		for($n=0; $n < 3; $n++) {
			$groups = [];
			for ($i = 0; $i < 500; $i++) {
				$id = $n*500 + $i;
				$groups[] = 'group'.$id;
			}

			$this->backend->expects($this->at($n))
				->method('getGroups')
				->with('', 500, $n*500)
				->will($this->returnValue($groups));
		}
		$this->backend->expects($this->at(3))
			->method('getGroups')
			->with('', 500, $n*500)
			->will($this->returnValue(['groupbeforelast', 'grouplast']));

		// This should call backend 4 times and count of gids should be 1502
		$counter = 0;
		$syncService->count($this->backend, function ($gid) use (&$counter){
			$counter++;
		});

		$this->assertEquals(1502, $counter);

		// This should call backend 0 times (fetch from cache). Count of gids should be 1502
		$counter = 0;
		$syncService->count($this->backend, function ($gid) use (&$counter){
			$counter++;
		});

		$this->assertEquals(1502, $counter);
	}

	/*
	 * Sync new groups and users
	 */
	public function testNewAllSync() {
		$syncService = $this->getSyncService();

		$this->backend->expects($this->at(0))
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1','group2']));

		$this->backend->expects($this->any())
			->method('implementsActions')
			->willReturn(false);

		$this->createUser('userbeforelast');
		$this->createUser('userlast');

		$this->backend->expects($this->at(2))
			->method('usersInGroup')
			->with('group1', '', 500, 0)
			->will($this->returnValue(['userbeforelast', 'userlast']));

		$this->backend->expects($this->at(4))
			->method('usersInGroup')
			->with('group2', '', 500, 0)
			->will($this->returnValue(['userbeforelast', 'userlast']));

		$groups = [];
		$syncService->run($this->backend, function ($gid) use (&$groups){
			$groups[] = $gid;
		});

		$this->assertEquals($groups[0], 'group1');
		$this->assertEquals($groups[1], 'group2');
		$this->assertCount(2, $groups);

		/** @var BackendGroup[] $backendGroups */
		$backendGroups = array_values($this->groupMapper->search('', 100, 0));
		$this->assertCount(2, $backendGroups);
		$this->assertEquals($backendGroups[0]->getGroupId(), 'group1');
		$this->assertEquals($backendGroups[1]->getGroupId(), 'group2');

		/** @var Account[] $resultAccounts */
		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroups[0]->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_SYNC));
		$this->assertCount(2, $resultAccounts);
		$this->assertEquals($resultAccounts[0]->getUserId(), 'userbeforelast');
		$this->assertEquals($resultAccounts[1]->getUserId(), 'userlast');
		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroups[1]->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_SYNC));
		$this->assertCount(2, $resultAccounts);
		$this->assertEquals($resultAccounts[0]->getUserId(), 'userbeforelast');
		$this->assertEquals($resultAccounts[1]->getUserId(), 'userlast');
	}

	/*
	 * There are 3 users in the system locally. One user user1 was added to group manualy, and another
	 * user2 was added using previous sync runs. Now, in remote there is only one user member, user3, and user2 was removed.
	 *
	 * We expect that user1 won't be affected, user2 will be removed and user3 will be added.
	 */
	public function testRemoveAddSync() {
		$syncService = $this->getSyncService();

		// Create group1 in the backend (simulate syncing)
		$group = $this->createGroup('group1', $this->backend);
		$backendGroup = \OC::$server->getGroupManager()->getBackendGroupObject($group->getGID());

		$this->backend->expects($this->any())
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1']));

		$this->backend->expects($this->any())
			->method('implementsActions')
			->willReturn(false);

		// 3 users are existing in the system already
		$user1 = $this->createUser('user1');
		$user2 = $this->createUser('user2');
		$user3 = $this->createUser('user3');

		// group1 and user3 membership is present on remote system
		$this->backend->expects($this->any())
			->method('usersInGroup')
			->with('group1', '', 500, 0)
			->will($this->returnValue(['user3']));

		// group1 and user1 membership is maintained by user (MANUAL) locally
		$group->addUser($user1);

		// group1 and user2 membership is maintained by sync (SYNC) locally
		$user2Account = \OC::$server->getUserManager()->getAccountObject($user2);
		$this->membershipManager->addMembership($user2Account->getId(), $backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_SYNC);

		// Check of preconditions
		/** @var Account[] $resultAccounts */
		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_SYNC));
		$this->assertCount(1, $resultAccounts);
		$this->assertEquals($resultAccounts[0]->getUserId(), 'user2');
		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_MANUAL));
		$this->assertCount(1, $resultAccounts);
		$this->assertEquals($resultAccounts[0]->getUserId(), 'user1');

		// Run sync
		$groups = [];
		$syncService->run($this->backend, function ($gid) use (&$groups){
			$groups[] = $gid;
		});

		// group1 should still exist
		/** @var BackendGroup[] $backendGroups */
		$this->assertEquals($groups[0], 'group1');
		$this->assertCount(1, $groups);
		$backendGroups = array_values($this->groupMapper->search('', 100, 0));
		$this->assertCount(1, $backendGroups);
		$this->assertEquals($backendGroups[0]->getGroupId(), 'group1');

		// Check that user3 was synced down, and user1 is not affected

		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_SYNC));
		$this->assertCount(1, $resultAccounts);
		$this->assertEquals($resultAccounts[0]->getUserId(), 'user3');

		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_MANUAL));
		$this->assertCount(1, $resultAccounts);
		$this->assertEquals($resultAccounts[0]->getUserId(), 'user1');
	}

	/*
	 * There are 3 users in the system locally. One user user1 was added to group manually in the system.
	 * Now, in remote there is only one user member, user1. This should generate conflict, and user1 should not be affected.
	 */
	public function testConflict() {
		$syncService = $this->getSyncService();

		// Create group1 in the backend (simulate syncing)
		$group = $this->createGroup('group1', $this->backend);
		$backendGroup = \OC::$server->getGroupManager()->getBackendGroupObject($group->getGID());

		$this->backend->expects($this->any())
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1']));

		$this->backend->expects($this->any())
			->method('implementsActions')
			->willReturn(false);

		// 1 user is existing in the system already
		$user1 = $this->createUser('user1');

		// group1 and user1 membership is present on remote system
		$this->backend->expects($this->any())
			->method('usersInGroup')
			->with('group1', '', 500, 0)
			->will($this->returnValue(['user1']));

		// group1 and user1 membership is maintained by user (MANUAL) locally
		$group->addUser($user1);

		// Check of preconditions
		/** @var Account[] $resultAccounts */
		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_SYNC));
		$this->assertCount(0, $resultAccounts);

		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_MANUAL));
		$this->assertCount(1, $resultAccounts);
		$this->assertEquals($resultAccounts[0]->getUserId(), 'user1');

		// Run sync
		$groups = [];
		$syncService->run($this->backend, function ($gid) use (&$groups){
			$groups[] = $gid;
		});

		// group1 should still exist
		/** @var BackendGroup[] $backendGroups */
		$this->assertEquals($groups[0], 'group1');
		$this->assertCount(1, $groups);
		$backendGroups = array_values($this->groupMapper->search('', 100, 0));
		$this->assertCount(1, $backendGroups);
		$this->assertEquals($backendGroups[0]->getGroupId(), 'group1');

		// Check that user1 is not affected

		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_SYNC));
		$this->assertCount(0, $resultAccounts);

		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_MANUAL));
		$this->assertCount(1, $resultAccounts);
		$this->assertEquals($resultAccounts[0]->getUserId(), 'user1');
	}

	/*
	 * One user membership is existing in remote system, but will not be synced since user is
	 * not created in the system
	 */
	public function testNoUserSync() {
		$syncService = $this->getSyncService();

		// Create group1 in the backend (simulate syncing)
		$group = $this->createGroup('group1', $this->backend);
		$backendGroup = \OC::$server->getGroupManager()->getBackendGroupObject($group->getGID());

		$this->backend->expects($this->any())
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1']));

		$this->backend->expects($this->any())
			->method('implementsActions')
			->willReturn(false);

		// group1 and user2 membership is present on remote system
		$this->backend->expects($this->any())
			->method('usersInGroup')
			->with('group1', '', 500, 0)
			->will($this->returnValue(['user2']));

		// Check preconditions
		/** @var Account[] $resultAccounts */
		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_SYNC));
		$this->assertCount(0, $resultAccounts);

		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_MANUAL));
		$this->assertCount(0, $resultAccounts);

		//  Run sync
		$groups = [];
		$syncService->run($this->backend, function ($gid) use (&$groups) {
			$groups[] = $gid;
		});

		$this->assertEquals($groups[0], 'group1');
		$this->assertCount(1, $groups);

		/** @var BackendGroup[] $backendGroups */
		$backendGroups = array_values($this->groupMapper->search('', 100, 0));
		$this->assertCount(1, $backendGroups);
		$this->assertEquals($backendGroups[0]->getGroupId(), 'group1');

		// Expect no change since user user2 is not synced
		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_SYNC));
		$this->assertCount(0, $resultAccounts);

		$resultAccounts = array_values($this->membershipManager->getGroupMembershipsByType($backendGroup->getId(),
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_MANUAL));
		$this->assertCount(0, $resultAccounts);
	}

	/*
	 * Test group mapping update (without memberships)
	 */
	public function testSyncGroups() {
		$syncService = $this->getSyncService();

		$this->backend->expects($this->at(0))
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1','group3']));

		$this->backend->expects($this->any())
			->method('implementsActions')
			->willReturn(true);

		// Insert first some existing group into internal mapping
		$backendGroup = new BackendGroup();
		$backendGroup->setGroupId("group1");
		$backendGroup->setDisplayName("Group 1");
		$backendGroup->setBackend(get_class($this->backend));
		$this->groupMapper->insert($backendGroup);

		// Group now has new displayname in the backend, so it would need to be changed
		$groupData['displayName'] = 'New Group 1';
		$this->backend->expects($this->at(2))
			->method('getGroupDetails')
			->with('group1')
			->willReturn($groupData);

		// This is new group from backend, it will setup it
		$groupData['displayName'] = 'Group 3';
		$this->backend->expects($this->at(5))
			->method('getGroupDetails')
			->with('group3')
			->willReturn($groupData);

		$this->backend->expects($this->any())
			->method('usersInGroup')
			->willReturn([]);

		/**
		 * Check before the sync internal backend group mapping
		 *
		 * @var BackendGroup[] $backendGroups
		 */
		$backendGroups = array_values($this->groupMapper->search('', 100, 0));
		$this->assertCount(1, $backendGroups);
		$this->assertEquals($backendGroups[0]->getGroupId(), 'group1');
		$this->assertEquals($backendGroups[0]->getDisplayName(), 'Group 1');
		$this->assertEquals($backendGroups[0]->getBackend(), get_class($this->backend));

		$groups = [];
		$syncService->run($this->backend, function ($gid) use (&$groups){
			$groups[] = $gid;
		});

		$this->assertEquals($groups[0], 'group1');
		$this->assertEquals($groups[1], 'group3');
		$this->assertCount(2, $groups);

		/**
		 * Check after the sync internal backend group mapping
		 *
		 * @var BackendGroup[] $backendGroups
		 */
		$backendGroups = array_values($this->groupMapper->search('', 100, 0));
		$this->assertCount(2, $backendGroups);
		$this->assertEquals($backendGroups[0]->getGroupId(), 'group1');
		$this->assertEquals($backendGroups[0]->getDisplayName(), 'New Group 1');
		$this->assertEquals($backendGroups[0]->getBackend(), get_class($this->backend));
		$this->assertEquals($backendGroups[1]->getGroupId(), 'group3');
		$this->assertEquals($backendGroups[1]->getDisplayName(), 'Group 3');
		$this->assertEquals($backendGroups[1]->getBackend(), get_class($this->backend));
	}

	/*
	 * Test group mapping update when group already exists, but in different backend
	 */
	public function testSyncDifferentGroupBackend() {
		$syncService = $this->getSyncService();

		$this->backend->expects($this->at(0))
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1']));

		$this->backend->expects($this->never())
			->method('implementsActions')
			->willReturn(true);

		// Insert first some existing group into internal mapping
		$backendGroup = new BackendGroup();
		$backendGroup->setGroupId("group1");
		$backendGroup->setDisplayName("Group 1");
		$backendGroup->setBackend('Test/Backend');
		$this->groupMapper->insert($backendGroup);


		$this->backend->expects($this->never())
			->method('usersInGroup');

		/** @var BackendGroup[] $backendGroups */
		$backendGroups = array_values($this->groupMapper->search('', 100, 0));
		$this->assertCount(1, $backendGroups);
		$this->assertEquals($backendGroups[0]->getGroupId(), 'group1');
		$this->assertEquals($backendGroups[0]->getDisplayName(), 'Group 1');
		$this->assertEquals($backendGroups[0]->getBackend(), 'Test/Backend');

		// This run should detect that group1 exists already in backend Test/Backend and
		// entry for backend $this->backend cannot be processed
		$groups = [];
		$syncService->run($this->backend, function ($gid) use (&$groups){
			$groups[] = $gid;
		});

		// No groups should be processed since there was skip due to duplicate backend entry
		$this->assertCount(0, $groups);

		/**
		 * Check after the sync internal backend group mapping
		 *
		 * @var BackendGroup[] $backendGroups
		 */
		$backendGroups = array_values($this->groupMapper->search('', 100, 0));
		$this->assertCount(1, $backendGroups);
		$this->assertEquals($backendGroups[0]->getGroupId(), 'group1');
		$this->assertEquals($backendGroups[0]->getDisplayName(), 'Group 1');
		$this->assertEquals($backendGroups[0]->getBackend(), 'Test/Backend');
	}

	public function testSyncNoGroupDetails() {
		$syncService = $this->getSyncService();

		$this->backend->expects($this->at(0))
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1','group3']));

		$this->backend->expects($this->any())
			->method('implementsActions')
			->willReturn(false);

		$this->backend->expects($this->never())
			->method('getGroupDetails');

		$this->backend->expects($this->any())
			->method('usersInGroup')
			->willReturn([]);

		// Insert first some existing group into internal mapping
		$backendGroup = new BackendGroup();
		$backendGroup->setGroupId("group1");
		$backendGroup->setDisplayName("Group 1");
		$backendGroup->setBackend(get_class($this->backend));
		$this->groupMapper->insert($backendGroup);

		/** @var BackendGroup[] $backendGroups */
		$backendGroups = array_values($this->groupMapper->search('', 100, 0));
		$this->assertCount(1, $backendGroups);
		$this->assertEquals($backendGroups[0]->getGroupId(), 'group1');
		$this->assertEquals($backendGroups[0]->getDisplayName(), 'Group 1');

		$groups = [];
		$syncService->run($this->backend, function ($gid) use (&$groups){
			$groups[] = $gid;
		});

		$this->assertEquals($groups[0], 'group1');
		$this->assertEquals($groups[1], 'group3');
		$this->assertCount(2, $groups);

		/**
		 * Check after the sync internal backend group mapping
		 *
		 * @var BackendGroup[] $backendGroups
		 */
		$backendGroups = array_values($this->groupMapper->search('', 100, 0));
		$this->assertCount(2, $backendGroups);
		$this->assertEquals($backendGroups[0]->getGroupId(), 'group1');
		$this->assertEquals($backendGroups[0]->getDisplayName(), 'group1');
		$this->assertEquals($backendGroups[1]->getGroupId(), 'group3');
		$this->assertEquals($backendGroups[1]->getDisplayName(), 'group3');
	}

	public function testGetNoLongerExistingGroup() {
		$syncService = $this->getSyncService();

		$this->backend->expects($this->at(0))
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1','group3']));

		$backendGroup = new BackendGroup();
		$backendGroup->setGroupId("group2");
		$backendGroup->setDisplayName("Group 2");
		$backendGroup->setBackend(get_class($this->backend));
		$this->groupMapper->insert($backendGroup);

		$toDeleteGroups = $syncService->getNoLongerExistingGroup($this->backend, function ($backendGroup){
		});

		$this->assertCount(1, $toDeleteGroups);
		$this->assertEquals($toDeleteGroups[0], 'group2');
	}

	/**
	 * This allows to reset sync service for each test
	 *
	 * @return GroupSyncService
	 */
	private function getSyncService() {
		$config =  \OC::$server->getConfig();
		$logger = $this->createMock(ILogger::class);

		// Adjust membership manager
		\OC::$server->getUserManager()->resetMembershipManager($this->membershipManager);
		\OC::$server->getGroupManager()->resetMembershipManager($this->membershipManager);

		// Adjust mappers
		$userSyncService = new UserSyncService($config, $logger, $this->accountMapper);
		$groupSyncService =  new GroupSyncService($this->groupMapper, $this->accountMapper, $this->membershipManager, $logger);

		\OC::$server->getUserManager()->reset($this->accountMapper, [], $userSyncService);
		\OC::$server->getGroupManager()->reset($this->groupMapper, [], $groupSyncService);

		return $groupSyncService;
	}
}