<?php

/**
 * @author Robin Appelman <icewind@owncloud.com>
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

use OC\User\User;
use OC\User\Account;
use OC\Group\Database;
use Test\Util\Group\Dummy as DummyBackend;
use OC\Group\Group;
use OC\User\Manager as UserManager;
use OC\Group\Manager as GroupManager;
use OC\Group\GroupMapper;
use OC\Group\BackendGroup;
use OC\MembershipManager;
use OCP\IUser;

class GroupTest extends \Test\TestCase {

	/** @var UserManager | \PHPUnit_Framework_MockObject_MockObject  */
	private $userManager;
	/** @var GroupManager | \PHPUnit_Framework_MockObject_MockObject  */
	private $groupManager;
	/** @var GroupMapper | \PHPUnit_Framework_MockObject_MockObject */
	private $groupMapper;
	/** @var MembershipManager | \PHPUnit_Framework_MockObject_MockObject */
	private $membershipManager;

	public function setUp() {
		parent::setUp();

		$this->groupMapper = $this->createMock(GroupMapper::class);
		$this->membershipManager = $this->createMock(MembershipManager::class);
		$this->groupManager = $this->createMock(GroupManager::class);

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->expects($this->any())->method('getUID')->willReturn('user2');
		$user3 = $this->createMock(IUser::class);
		$user3->expects($this->any())->method('getUID')->willReturn('user3');
		$this->userManager = $this->createMock(UserManager::class);
		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnValueMap([
				['user1', $user1],
				['user2', $user2],
				['user3', $user3]
			]));
	}

	/**
	 * Helper function to create group with some internal id
	 *
	 * @param int $id
	 * @param string $backend
	 * @return Group
	 */
	private function getGroup($id, $backend) {
		$backendGroup = new BackendGroup();
		$backendGroup->setId($id);
		$backendGroup->setGroupId("group$id");
		$backendGroup->setDisplayName("group$id");
		$backendGroup->setBackend($backend);
		return new Group($backendGroup, $this->groupMapper, $this->groupManager, $this->userManager, $this->membershipManager);
	}

	public function testGroup() {
		// Internal database backend does not support adding users
		$backend1 = $this->createMock(Database::class);

		// Dummy database backend does support adding users
		$backend2 = $this->createMock(DummyBackend::class);

		$this->groupManager->expects($this->any())
			->method('getBackends')
			->willReturn([$backend1, $backend2]);


		$group =  $this->getGroup(1, get_class($backend1));
		$this->assertEquals('group1', $group->getGID());
		$this->assertEquals('group1', $group->getDisplayName());
		$this->assertEquals($backend1, $group->getBackend());
	}

	public function testGetUsers() {
		$backendGroupId = 1;
		$group =  $this->getGroup($backendGroupId, 'OC\Group\Database');
		$account1 = $this->createMock(Account::class);
		$user1 = $this->createMock(User::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');
		$account2 = $this->createMock(Account::class);
		$user2 = $this->createMock(User::class);
		$user2->expects($this->any())->method('getUID')->willReturn('user2');
		$user3 = $this->createMock(User::class);
		$user3->expects($this->any())->method('getUID')->willReturn('user3');
		$this->membershipManager->expects($this->once())
			->method('getGroupMemberAccountsById')
			->with($backendGroupId, MembershipManager::MEMBERSHIP_TYPE_GROUP_USER)
			->will($this->returnValue([$account1, $account2]));
		$this->userManager->expects($this->at(0))
			->method('getUserObject')
			->with($account1)
			->willReturn($user1);
		$this->userManager->expects($this->at(1))
			->method('getUserObject')
			->with($account2)
			->willReturn($user2);

		$users = $group->getUsers();

		$this->assertEquals(2, count($users));
		$this->assertEquals('user1', $users[0]->getUID());
		$this->assertEquals('user2', $users[1]->getUID());

		// This call should fetch from cache
		$users2 = $group->getUsers();
		$this->assertEquals($users, $users2);

		// Call inGroup should also be fetched from cache
		$this->userManager->expects($this->never())
			->method('getAccountObject');
		$this->membershipManager->expects($this->never())
			->method('isGroupMemberByType');
		$this->assertTrue($group->inGroup($user1));
		$this->assertTrue($group->inGroup($user2));
		$this->assertFalse($group->inGroup($user3));
	}

	public function testInGroup() {
		$accountId = 1;
		$backendGroupId = 1;
		$group =  $this->getGroup($backendGroupId, 'OC\Group\Database');

		$user = $this->createMock(User::class);
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('__call')->willReturn($accountId);
		$user->expects($this->never())->method('getUID')->willReturn('user1');

		$this->userManager->expects($this->once())
			->method('getAccountObject')
			->with($user)
			->willReturn($account);
		$this->membershipManager->expects($this->once())
			->method('isGroupMemberByType')
			->with($accountId,$backendGroupId, MembershipManager::MEMBERSHIP_TYPE_GROUP_USER, null)
			->willReturn(true);

		$this->assertTrue($group->inGroup($user));
	}

	public function testAddUser() {
		// Internal database backend does not support adding users
		$backend1 = $this->createMock(Database::class);
		$backend1->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(false));
		$backend1->expects($this->never())
			->method('inGroup');

		// Dummy database backend does support adding users
		$backend2 = $this->createMock(DummyBackend::class);
		$backend2->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));
		$backend2->expects($this->once())
			->method('addToGroup')
			->with('user1', 'group2');
		$backend1->expects($this->never())
			->method('inGroup');

		$this->groupManager->expects($this->any())
			->method('getBackends')
			->willReturn([$backend1, $backend2]);

		$group1 =  $this->getGroup(1, get_class($backend1));
		$group2 =  $this->getGroup(2, get_class($backend2));

		$this->membershipManager->expects($this->any())
			->method('isGroupMemberByType')
			->willReturn(false);
		$this->membershipManager->expects($this->any())
			->method('addMembership')
			->withConsecutive([1,1, MembershipManager::MEMBERSHIP_TYPE_GROUP_USER], [1,2, MembershipManager::MEMBERSHIP_TYPE_GROUP_USER])
			->willReturn(true);

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('__call')->willReturn(1);

		$this->userManager->expects($this->any())
			->method('getAccountObject')
			->with($user1)
			->willReturn($account);

		$group1->addUser($user1);
		$group2->addUser($user1);
	}

	public function testAddUserAlreadyInGroup() {
		$group =  $this->getGroup(1, 'OC\Group\Database');

		$backend = $this->createMock(Database::class);
		$backend->expects($this->never())
			->method('inGroup');
		$backend->expects($this->never())
			->method('implementsActions');

		$this->groupManager->expects($this->never())
			->method('getBackends');

		$this->membershipManager->expects($this->once())
			->method('isGroupMemberByType')
			->with(1,1, MembershipManager::MEMBERSHIP_TYPE_GROUP_USER, null)
			->willReturn(true);

		$user1 = $this->createMock(IUser::class);
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('__call')->willReturn(1);

		$this->userManager->expects($this->any())
			->method('getAccountObject')
			->with($user1)
			->willReturn($account);

		$group->addUser($user1);
	}

	public function testRemoveUser() {
		// Internal database backend does not support removing users
		$backend1 = $this->createMock(Database::class);
		$backend1->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(false));

		// Dummy database backend does support removing users
		$backend2 = $this->createMock(DummyBackend::class);
		$backend2->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));
		$backend2->expects($this->once())
			->method('removeFromGroup')
			->with('user1', 'group2');

		$this->groupManager->expects($this->any())
			->method('getBackends')
			->willReturn([$backend1, $backend2]);

		$group1 =  $this->getGroup(1, get_class($backend1));
		$group2 =  $this->getGroup(2, get_class($backend2));

		$this->membershipManager->expects($this->any())
			->method('removeMembership')
			->withConsecutive([1,1, MembershipManager::MEMBERSHIP_TYPE_GROUP_USER], [1,2, MembershipManager::MEMBERSHIP_TYPE_GROUP_USER])
			->willReturn(true);

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('__call')->willReturn(1);

		$this->userManager->expects($this->any())
			->method('getAccountObject')
			->with($user1)
			->willReturn($account);

		$group1->removeUser($user1);
		$group2->removeUser($user1);
	}

	public function testRemoveUserNotInGroup() {
		$group =  $this->getGroup(1, 'OC\Group\Database');

		$backend = $this->createMock(Database::class);
		$backend->expects($this->never())
			->method('inGroup');
		$backend->expects($this->never())
			->method('implementsActions');

		$this->groupManager->expects($this->any())
			->method('getBackends')
			->willReturn([$backend]);

		$this->membershipManager->expects($this->any())
			->method('removeMembership')
			->with(1,1, MembershipManager::MEMBERSHIP_TYPE_GROUP_USER)
			->willReturn(false);

		$user1 = $this->createMock(IUser::class);
		$account = $this->createMock(Account::class);
		$account->expects($this->any())->method('__call')->willReturn(1);

		$this->userManager->expects($this->any())
			->method('getAccountObject')
			->with($user1)
			->willReturn($account);

		$group->removeUser($user1);
	}

	public function testSearchUsers() {
		$group =  $this->getGroup(1, 'OC\Group\Database');
		$account1 = $this->createMock(Account::class);
		$user1 = $this->createMock(User::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');
		$account2 = $this->createMock(Account::class);
		$user2 = $this->createMock(User::class);
		$user2->expects($this->any())->method('getUID')->willReturn('user2');
		$this->userManager->expects($this->at(0))
			->method('getUserObject')
			->with($account1)
			->willReturn($user1);
		$this->userManager->expects($this->at(1))
			->method('getUserObject')
			->with($account2)
			->willReturn($user2);
		$this->membershipManager->expects($this->once())
			->method('find')
			->with('group1','user', null,  null)
			->will($this->returnValue([$account1, $account2]));

		$users = $group->searchUsers('user');

		$this->assertCount(2, $users);
		$user1 = $users[0];
		$user2 = $users[1];
		$this->assertEquals('user1', $user1->getUID());
		$this->assertEquals('user2', $user2->getUID());
	}

	public function testSearchUsersLimitAndOffset() {
		$group =  $this->getGroup(1, 'OC\Group\Database');
		$account1 = $this->createMock(Account::class);
		$user1 = $this->createMock(User::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');
		$this->userManager->expects($this->once())
			->method('getUserObject')
			->with($account1)
			->willReturn($user1);
		$this->membershipManager->expects($this->once())
			->method('find')
			->with('group1','user', 1,  1)
			->will($this->returnValue([$account1]));

		$users = $group->searchUsers('user', 1, 1);

		$this->assertCount(1, $users);
		$user1 = $users[0];
		$this->assertEquals('user1', $user1->getUID());
	}

	public function testSearchUsersDisplayName() {
		$group =  $this->getGroup(1, 'OC\Group\Database');
		$account1 = $this->createMock(Account::class);
		$user1 = $this->createMock(User::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');
		$user1->expects($this->any())->method('getDisplayName')->willReturn('User 1');
		$this->userManager->expects($this->once())
			->method('getUserObject')
			->with($account1)
			->willReturn($user1);
		$this->membershipManager->expects($this->once())
			->method('find')
			->with('group1','User 1', 1,  1)
			->will($this->returnValue([$account1]));

		$users = $group->searchDisplayName('User 1', 1, 1);

		$this->assertCount(1, $users);
		$user1 = $users[0];
		$this->assertEquals('user1', $user1->getUID());
		$this->assertEquals('User 1', $user1->getDisplayName());
	}

	public function testCountUsers() {
		$group =  $this->getGroup(1, 'OC\Group\Database');
		$this->membershipManager->expects($this->once())
			->method('count')
			->with('group1','user')
			->will($this->returnValue(2));

		$count = $group->count('user');

		$this->assertEquals(2,$count);
	}

	public function testDeleteAdmin() {
		$backendGroup = new BackendGroup();
		$backendGroup->setId(0);
		$backendGroup->setGroupId("admin");
		$backendGroup->setDisplayName("admin");
		$backendGroup->setBackend('OC\Group\Database');
		$group =  new Group($backendGroup, $this->groupMapper, $this->groupManager, $this->userManager, $this->membershipManager);

		$result = $group->delete();

		$this->assertEquals(false,$result);
	}

	public function testDelete() {
		// Internal database backend does not support removing users
		$backend1 = $this->createMock(Database::class);
		$backend1->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(false));

		// Dummy database backend does support removing users
		$backend2 = $this->createMock(DummyBackend::class);
		$backend2->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));
		$backend2->expects($this->once())
			->method('deleteGroup')
			->with('group2');

		$group1 =  $this->getGroup(1, get_class($backend1));
		$group2 =  $this->getGroup(2, get_class($backend2));

		$this->membershipManager->expects($this->at(0))
			->method('removeGroupMembers')
			->with(1)
			->willReturn(true);
		$this->membershipManager->expects($this->at(1))
			->method('removeGroupMembers')
			->with(2)
			->willReturn(true);

		$this->groupManager->expects($this->any())
			->method('getBackends')
			->willReturn([$backend1, $backend2]);

		$this->groupMapper->expects($this->exactly(2))
			->method('delete')
			->willReturn(true);

		$group1->delete();
		$group2->delete();
	}
}