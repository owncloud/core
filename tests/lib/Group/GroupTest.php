<?php

/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Group;

use OCP\IUser;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use OC\Group\Group;

class GroupTest extends \Test\TestCase {
	/**
	 * @return \OC\User\Manager | \OC\User\Manager
	 */
	protected function getUserManager() {
		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->expects($this->any())->method('getUID')->willReturn('user2');
		$user3 = $this->createMock(IUser::class);
		$user3->expects($this->any())->method('getUID')->willReturn('user3');
		$userManager = $this->createMock('\OC\User\Manager');
		$userManager->expects($this->any())
			->method('get')
			->will($this->returnValueMap([
				['user1', $user1],
				['user2', $user2],
				['user3', $user3]
			]));
		return $userManager;
	}

	private function getEventDispatcherMock() {
		$eventMap = [];
		$eventDispatcher = $this->getMockBuilder(EventDispatcherInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$eventDispatcher->method('addListener')
			->will($this->returnCallback(function ($eventName, $callable, $priority) use (&$eventMap) {
				if (!isset($eventMap[$eventName])) {
					$eventMap[$eventName] = [];
				}
				// ignore priority for now
				$eventMap[$eventName][] = $callable;
			}));
		$eventDispatcher->method('dispatch')
			->will($this->returnCallback(function ($eventName, $event) use (&$eventMap) {
				if (isset($eventMap[$eventName])) {
					foreach ($eventMap[$eventName] as $callable) {
						$callable($event);
					}
				}
				return $event;
			}));
		return $eventDispatcher;
	}

	public function testGetUsersSingleBackend() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend], $userManager, $this->getEventDispatcherMock());

		$backend->expects($this->once())
			->method('usersInGroup')
			->with('group1')
			->will($this->returnValue(['user1', 'user2']));

		$users = $group->getUsers();

		$this->assertCount(2, $users);
		$user1 = $users['user1'];
		$user2 = $users['user2'];
		$this->assertEquals('user1', $user1->getUID());
		$this->assertEquals('user2', $user2->getUID());
	}

	public function testGetUsersMultipleBackends() {
		$backend1 = $this->createMock('OC\Group\Database');
		$backend2 = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend1, $backend2], $userManager, $this->getEventDispatcherMock());

		$backend1->expects($this->once())
			->method('usersInGroup')
			->with('group1')
			->will($this->returnValue(['user1', 'user2']));

		$backend2->expects($this->once())
			->method('usersInGroup')
			->with('group1')
			->will($this->returnValue(['user2', 'user3']));

		$users = $group->getUsers();

		$this->assertCount(3, $users);
		$user1 = $users['user1'];
		$user2 = $users['user2'];
		$user3 = $users['user3'];
		$this->assertEquals('user1', $user1->getUID());
		$this->assertEquals('user2', $user2->getUID());
		$this->assertEquals('user3', $user3->getUID());
	}

	public function testInGroupSingleBackend() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend], $userManager, $this->getEventDispatcherMock());

		$backend->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(true));

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');

		$this->assertTrue($group->inGroup($user1));
	}

	public function testInGroupMultipleBackends() {
		$backend1 = $this->createMock('OC\Group\Database');
		$backend2 = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend1, $backend2], $userManager, $this->getEventDispatcherMock());

		$backend1->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(false));

		$backend2->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(true));

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');

		$this->assertTrue($group->inGroup($user1));
	}

	public function testAddUser() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend], $userManager, $this->getEventDispatcherMock());

		$backend->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(false));
		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$backend->expects($this->once())
			->method('addToGroup')
			->with('user1', 'group1');

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');

		$group->addUser($user1);
	}

	public function testAddUserWithDispatcher() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();

		$eventsCalled = ['group.preAddUser' => [], 'group.postAddUser' => []];
		$dispatcher = $this->getEventDispatcherMock();
		$dispatcher->addListener('group.preAddUser', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.preAddUser']['subject'] = $event->getSubject();
			$eventsCalled['group.preAddUser']['arguments'] = $event->getArguments();
		});
		$dispatcher->addListener('group.postAddUser', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.postAddUser']['subject'] = $event->getSubject();
			$eventsCalled['group.postAddUser']['arguments'] = $event->getArguments();
		});

		$group = new \OC\Group\Group('group1', [$backend], $userManager, $dispatcher);

		$backend->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(false));
		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$backend->expects($this->once())
			->method('addToGroup')
			->with('user1', 'group1');

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');

		$group->addUser($user1);

		$this->assertNotEmpty($eventsCalled['group.preAddUser']);
		$this->assertInstanceOf(Group::class, $eventsCalled['group.preAddUser']['subject']);
		$this->assertEquals(['user' => $user1], $eventsCalled['group.preAddUser']['arguments']);
		$this->assertNotEmpty($eventsCalled['group.postAddUser']);
		$this->assertInstanceOf(Group::class, $eventsCalled['group.postAddUser']['subject']);
		$this->assertEquals(['user' => $user1], $eventsCalled['group.postAddUser']['arguments']);
	}

	public function testAddUserAlreadyInGroup() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend], $userManager, $this->getEventDispatcherMock());

		$backend->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(true));
		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$backend->expects($this->never())
			->method('addToGroup');

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');

		$group->addUser($user1);
	}

	public function testAddUserAlreadyInGroupWithDispatcher() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();

		$eventsCalled = ['group.preAddUser' => [], 'group.postAddUser' => []];
		$dispatcher = $this->getEventDispatcherMock();
		$dispatcher->addListener('group.preAddUser', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.preAddUser']['subject'] = $event->getSubject();
			$eventsCalled['group.preAddUser']['arguments'] = $event->getArguments();
		});
		$dispatcher->addListener('group.postAddUser', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.postAddUser']['subject'] = $event->getSubject();
			$eventsCalled['group.postAddUser']['arguments'] = $event->getArguments();
		});

		$group = new \OC\Group\Group('group1', [$backend], $userManager, $dispatcher);

		$backend->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(true));
		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$backend->expects($this->never())
			->method('addToGroup');

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');

		$group->addUser($user1);

		$this->assertEmpty($eventsCalled['group.preAddUser']);
		$this->assertEmpty($eventsCalled['group.postAddUser']);
	}

	public function testRemoveUser() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend], $userManager, $this->getEventDispatcherMock());

		$backend->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(true));
		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$backend->expects($this->once())
			->method('removeFromGroup')
			->with('user1', 'group1');

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');

		$group->removeUser($user1);
	}

	public function testRemoveUserWithDispatcher() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();

		$eventsCalled = ['group.preRemoveUser' => [], 'group.postRemoveUser' => []];
		$dispatcher = $this->getEventDispatcherMock();
		$dispatcher->addListener('group.preRemoveUser', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.preRemoveUser']['subject'] = $event->getSubject();
			$eventsCalled['group.preRemoveUser']['arguments'] = $event->getArguments();
		});
		$dispatcher->addListener('group.postRemoveUser', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.postRemoveUser']['subject'] = $event->getSubject();
			$eventsCalled['group.postRemoveUser']['arguments'] = $event->getArguments();
		});

		$group = new \OC\Group\Group('group1', [$backend], $userManager, $dispatcher);

		$backend->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(true));
		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$backend->expects($this->once())
			->method('removeFromGroup')
			->with('user1', 'group1');

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');

		$group->removeUser($user1);

		$this->assertNotEmpty($eventsCalled['group.preRemoveUser']);
		$this->assertInstanceOf(Group::class, $eventsCalled['group.preRemoveUser']['subject']);
		$this->assertEquals(['user' => $user1], $eventsCalled['group.preRemoveUser']['arguments']);
		$this->assertNotEmpty($eventsCalled['group.postRemoveUser']);
		$this->assertInstanceOf(Group::class, $eventsCalled['group.postRemoveUser']['subject']);
		$this->assertEquals(['user' => $user1], $eventsCalled['group.postRemoveUser']['arguments']);
	}

	public function testRemoveUserNotInGroup() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();

		$eventsCalled = ['group.preRemoveUser' => [], 'group.postRemoveUser' => []];
		$dispatcher = $this->getEventDispatcherMock();
		$dispatcher->addListener('group.preRemoveUser', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.preRemoveUser']['subject'] = $event->getSubject();
			$eventsCalled['group.preRemoveUser']['arguments'] = $event->getArguments();
		});
		$dispatcher->addListener('group.postRemoveUser', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.postRemoveUser']['subject'] = $event->getSubject();
			$eventsCalled['group.postRemoveUser']['arguments'] = $event->getArguments();
		});

		$group = new \OC\Group\Group('group1', [$backend], $userManager, $dispatcher);

		$backend->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(false));
		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$backend->expects($this->never())
			->method('removeFromGroup');
		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');

		$group->removeUser($user1);

		// preRemoveUser is triggered but not postRemoveUser
		$this->assertNotEmpty($eventsCalled['group.preRemoveUser']);
		$this->assertInstanceOf(Group::class, $eventsCalled['group.preRemoveUser']['subject']);
		$this->assertEquals(['user' => $user1], $eventsCalled['group.preRemoveUser']['arguments']);
		$this->assertEmpty($eventsCalled['group.postRemoveUser']);
	}

	public function testRemoveUserMultipleBackends() {
		$backend1 = $this->createMock('OC\Group\Database');
		$backend2 = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend1, $backend2], $userManager, $this->getEventDispatcherMock());

		$backend1->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(true));
		$backend1->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$backend1->expects($this->once())
			->method('removeFromGroup')
			->with('user1', 'group1');

		$backend2->expects($this->once())
			->method('inGroup')
			->with('user1', 'group1')
			->will($this->returnValue(true));
		$backend2->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$backend2->expects($this->once())
			->method('removeFromGroup')
			->with('user1', 'group1');

		$user1 = $this->createMock(IUser::class);
		$user1->expects($this->any())->method('getUID')->willReturn('user1');

		$group->removeUser($user1);
	}

	public function testSearchUsers() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend], $userManager, $this->getEventDispatcherMock());

		$backend->expects($this->once())
			->method('usersInGroup')
			->with('group1', '2')
			->will($this->returnValue(['user2']));

		$users = $group->searchUsers('2');

		$this->assertCount(1, $users);
		$user2 = $users[0];
		$this->assertEquals('user2', $user2->getUID());
	}

	public function testSearchUsersMultipleBackends() {
		$backend1 = $this->createMock('OC\Group\Database');
		$backend2 = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend1, $backend2], $userManager, $this->getEventDispatcherMock());

		$backend1->expects($this->once())
			->method('usersInGroup')
			->with('group1', '2')
			->will($this->returnValue(['user2']));
		$backend2->expects($this->once())
			->method('usersInGroup')
			->with('group1', '2')
			->will($this->returnValue(['user2']));

		$users = $group->searchUsers('2');

		$this->assertCount(1, $users);
		$user2 = $users[0];
		$this->assertEquals('user2', $user2->getUID());
	}

	public function testSearchUsersLimitAndOffset() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend], $userManager, $this->getEventDispatcherMock());

		$backend->expects($this->once())
			->method('usersInGroup')
			->with('group1', 'user', 1, 1)
			->will($this->returnValue(['user2']));

		$users = $group->searchUsers('user', 1, 1);

		$this->assertCount(1, $users);
		$user2 = $users[0];
		$this->assertEquals('user2', $user2->getUID());
	}

	public function testSearchUsersMultipleBackendsLimitAndOffset() {
		$backend1 = $this->createMock('OC\Group\Database');
		$backend2 = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend1, $backend2], $userManager, $this->getEventDispatcherMock());

		$backend1->expects($this->once())
			->method('usersInGroup')
			->with('group1', 'user', 2, 1)
			->will($this->returnValue(['user2']));
		$backend2->expects($this->once())
			->method('usersInGroup')
			->with('group1', 'user', 2, 1)
			->will($this->returnValue(['user1']));

		$users = $group->searchUsers('user', 2, 1);

		$this->assertCount(2, $users);
		$user2 = $users[0];
		$user1 = $users[1];
		$this->assertEquals('user2', $user2->getUID());
		$this->assertEquals('user1', $user1->getUID());
	}

	public function testCountUsers() {
		$backend1 = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend1], $userManager, $this->getEventDispatcherMock());

		$backend1->expects($this->once())
			->method('countUsersInGroup')
			->with('group1', '2')
			->will($this->returnValue(3));

		$backend1->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$users = $group->count('2');

		$this->assertSame(3, $users);
	}

	public function testCountUsersMultipleBackends() {
		$backend1 = $this->createMock('OC\Group\Database');
		$backend2 = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend1, $backend2], $userManager, $this->getEventDispatcherMock());

		$backend1->expects($this->once())
			->method('countUsersInGroup')
			->with('group1', '2')
			->will($this->returnValue(3));
		$backend1->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$backend2->expects($this->once())
			->method('countUsersInGroup')
			->with('group1', '2')
			->will($this->returnValue(4));
		$backend2->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$users = $group->count('2');

		$this->assertSame(7, $users);
	}

	public function testCountUsersNoMethod() {
		$backend1 = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend1], $userManager, $this->getEventDispatcherMock());

		$backend1->expects($this->never())
			->method('countUsersInGroup');
		$backend1->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(false));

		$users = $group->count('2');

		$this->assertFalse($users);
	}

	public function testDelete() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();
		$group = new \OC\Group\Group('group1', [$backend], $userManager, $this->getEventDispatcherMock());

		$backend->expects($this->once())
			->method('deleteGroup')
			->with('group1');
		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$group->delete();
	}

	public function testDeleteWithDispatcher() {
		$backend = $this->createMock('OC\Group\Database');
		$userManager = $this->getUserManager();

		$eventsCalled = ['group.preDelete' => [], 'group.postDelete' => []];
		$dispatcher = $this->getEventDispatcherMock();
		$dispatcher->addListener('group.preDelete', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.preDelete']['subject'] = $event->getSubject();
			$eventsCalled['group.preDelete']['arguments'] = $event->getArguments();
		});
		$dispatcher->addListener('group.postDelete', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.postDelete']['subject'] = $event->getSubject();
			$eventsCalled['group.postDelete']['arguments'] = $event->getArguments();
		});

		$group = new \OC\Group\Group('group1', [$backend], $userManager, $dispatcher);

		$backend->expects($this->once())
			->method('deleteGroup')
			->with('group1');
		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnValue(true));

		$group->delete();

		$this->assertNotEmpty($eventsCalled['group.preDelete']);
		$this->assertInstanceOf(Group::class, $eventsCalled['group.preDelete']['subject']);
		$this->assertNotEmpty($eventsCalled['group.postDelete']);
		$this->assertInstanceOf(Group::class, $eventsCalled['group.postDelete']['subject']);
	}
}
