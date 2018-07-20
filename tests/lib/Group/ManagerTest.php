<?php

/**
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

use OC\Group\Database;
use OC\Group\Group;
use OC\User\Manager;
use OCP\GroupInterface;
use OCP\IUser;
use OCP\Util\UserSearch;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class ManagerTest extends \Test\TestCase {

	/**
	 * @var \OC\User\Manager
	 */
	protected $userManager;

	/**
	 * @var \OCP\Util\UserSearch
	 */
	protected $userSearch;

	/** @var EventDispatcherInterface */
	protected $eventDispatcher;

	/** @var \OC\Group\Manager */
	protected $manager;

	protected function setUp() {
		parent::setUp();
		$this->userSearch = $this->getMockBuilder(UserSearch::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSearch->expects($this->any())
			->method('isSearchable')
			->willReturn(true);

		$this->userManager = $this->createMock(Manager::class);
		$this->eventDispatcher = $this->getEventDispatcherMock();

		$this->manager = new \OC\Group\Manager($this->userManager, $this->userSearch, $this->eventDispatcher);
	}

	private function getTestUser($userId) {
		$mockUser = $this->createMock(IUser::class);
		$mockUser->expects($this->any())
			->method('getUID')
			->will($this->returnValue($userId));
		$mockUser->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue($userId));
		return $mockUser;
	}

	private function getTestBackend($implementedActions = null, $visibleForScopes = null) {
		if ($implementedActions === null) {
			$implementedActions =
				GroupInterface::ADD_TO_GROUP |
				GroupInterface::REMOVE_FROM_GOUP |
				GroupInterface::COUNT_USERS |
				GroupInterface::CREATE_GROUP |
				GroupInterface::DELETE_GROUP;
		}
		// need to declare it this way due to optional methods
		// thanks to the implementsActions logic
		$backend = $this->getMockBuilder(\OCP\GroupInterface::class)
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
				'addToGroup',
				'removeFromGroup',
				'isVisibleForScope',
			])
			->getMock();
		$backend->expects($this->any())
			->method('implementsActions')
			->will($this->returnCallback(function ($actions) use ($implementedActions) {
				return (bool)($actions & $implementedActions);
			}));
		if ($visibleForScopes === null) {
			$backend->expects($this->any())
				->method('isVisibleForScope')
				->willReturn(true);
		} else {
			$backend->expects($this->any())
				->method('isVisibleForScope')
				->will($this->returnValueMap($visibleForScopes));
		}
		return $backend;
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

	public function testGet() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend);

		$group = $this->manager->get('group1');
		$this->assertNotNull($group);
		$this->assertEquals('group1', $group->getGID());
	}

	public function testGetNoBackend() {
		$this->assertNull($this->manager->get('group1'));
	}

	public function testGetNotExists() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->once())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(false));

		$this->manager->addBackend($backend);

		$this->assertNull($this->manager->get('group1'));
	}

	public function testGetDeleted() {
		$backend = new \Test\Util\Group\Dummy();
		$backend->createGroup('group1');

		$this->manager->addBackend($backend);

		$group = $this->manager->get('group1');
		$group->delete();
		$this->assertNull($this->manager->get('group1'));
	}

	public function testGetMultipleBackends() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend1
		 */
		$backend1 = $this->getTestBackend();
		$backend1->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(false));

		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend2
		 */
		$backend2 = $this->getTestBackend();
		$backend2->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend1);
		$this->manager->addBackend($backend2);

		$group = $this->manager->get('group1');
		$this->assertNotNull($group);
		$this->assertEquals('group1', $group->getGID());
	}

	public function testCreate() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backendGroupCreated = false;
		$backend = $this->getTestBackend();
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnCallback(function () use (&$backendGroupCreated) {
				return $backendGroupCreated;
			}));
		$backend->expects($this->once())
			->method('createGroup')
			->will($this->returnCallback(function () use (&$backendGroupCreated) {
				$backendGroupCreated = true;
			}));
		;

		$this->manager->addBackend($backend);

		$group = $this->manager->createGroup('group1');
		$this->assertEquals('group1', $group->getGID());
	}

	public function testCreateWithDispatcher() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backendGroupCreated = false;
		$backend = $this->getTestBackend();
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnCallback(function () use (&$backendGroupCreated) {
				return $backendGroupCreated;
			}));
		$backend->expects($this->once())
			->method('createGroup')
			->will($this->returnCallback(function () use (&$backendGroupCreated) {
				$backendGroupCreated = true;
			}));
		;

		$eventsCalled = ['group.preCreate' => [], 'group.postCreate' => []];
		$this->eventDispatcher->addListener('group.preCreate', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.preCreate']['subject'] = $event->getSubject();
			$eventsCalled['group.preCreate']['arguments'] = $event->getArguments();
		});
		$this->eventDispatcher->addListener('group.postCreate', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.postCreate']['subject'] = $event->getSubject();
			$eventsCalled['group.postCreate']['arguments'] = $event->getArguments();
		});

		$this->manager->addBackend($backend);

		$group = $this->manager->createGroup('group1');
		$this->assertNotEmpty($eventsCalled['group.preCreate']);
		$this->assertNull($eventsCalled['group.preCreate']['subject']);
		$this->assertEquals(['gid' => 'group1'], $eventsCalled['group.preCreate']['arguments']);
		$this->assertNotEmpty($eventsCalled['group.postCreate']);
		$this->assertInstanceOf(Group::class, $eventsCalled['group.postCreate']['subject']);
		$this->assertEquals(['gid' => 'group1'], $eventsCalled['group.postCreate']['arguments']);
	}

	public function testCreateExists() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(true));
		$backend->expects($this->never())
			->method('createGroup');

		$this->manager->addBackend($backend);

		$group = $this->manager->createGroup('group1');
		$this->assertEquals('group1', $group->getGID());
	}

	public function testCreateExistsWithDispatcher() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(true));
		$backend->expects($this->never())
			->method('createGroup');

		$eventsCalled = ['group.preCreate' => [], 'group.postCreate' => []];
		$this->eventDispatcher->addListener('group.preCreate', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.preCreate']['subject'] = $event->getSubject();
			$eventsCalled['group.preCreate']['arguments'] = $event->getArguments();
		});
		$this->eventDispatcher->addListener('group.postCreate', function (GenericEvent $event) use (&$eventsCalled) {
			$eventsCalled['group.postCreate']['subject'] = $event->getSubject();
			$eventsCalled['group.postCreate']['arguments'] = $event->getArguments();
		});

		$this->manager->addBackend($backend);

		$group = $this->manager->createGroup('group1');
		// events shouldn't be called
		$this->assertEmpty($eventsCalled['group.preCreate']);
		$this->assertEmpty($eventsCalled['group.postCreate']);
	}

	public function testSearch() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->once())
			->method('getGroups')
			->with('1')
			->will($this->returnValue(['group1']));
		$backend->expects($this->once())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend);

		$groups = $this->manager->search('1');
		$this->assertCount(1, $groups);
		$group1 = \reset($groups);
		$this->assertEquals('group1', $group1->getGID());
	}

	public function testSearchMultipleBackends() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend1
		 */
		$backend1 = $this->getTestBackend();
		$backend1->expects($this->once())
			->method('getGroups')
			->with('1')
			->will($this->returnValue(['group1']));
		$backend1->expects($this->any())
			->method('groupExists')
			->will($this->returnValue(true));

		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend2
		 */
		$backend2 = $this->getTestBackend();
		$backend2->expects($this->once())
			->method('getGroups')
			->with('1')
			->will($this->returnValue(['group12', 'group1']));
		$backend2->expects($this->any())
			->method('groupExists')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend1);
		$this->manager->addBackend($backend2);

		$groups = $this->manager->search('1');
		$this->assertCount(2, $groups);
		$group1 = \reset($groups);
		$group12 = \next($groups);
		$this->assertEquals('group1', $group1->getGID());
		$this->assertEquals('group12', $group12->getGID());
	}

	public function testSearchMultipleBackendsLimitAndOffset() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend1
		 */
		$backend1 = $this->getTestBackend();
		$backend1->expects($this->once())
			->method('getGroups')
			->with('1', 2, 1)
			->will($this->returnValue(['group1']));
		$backend1->expects($this->any())
			->method('groupExists')
			->will($this->returnValue(true));

		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend2
		 */
		$backend2 = $this->getTestBackend();
		$backend2->expects($this->once())
			->method('getGroups')
			->with('1', 2, 1)
			->will($this->returnValue(['group12']));
		$backend2->expects($this->any())
			->method('groupExists')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend1);
		$this->manager->addBackend($backend2);

		$groups = $this->manager->search('1', 2, 1);
		$this->assertCount(2, $groups);
		$group1 = \reset($groups);
		$group12 = \next($groups);
		$this->assertEquals('group1', $group1->getGID());
		$this->assertEquals('group12', $group12->getGID());
	}

	public function testSearchResultExistsButGroupDoesNot() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->createMock(Database::class);
		$backend->expects($this->once())
			->method('getGroups')
			->with('1')
			->will($this->returnValue(['group1']));
		$backend->expects($this->once())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(false));
		$backend->expects($this->once())
			->method('isVisibleForScope')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend);

		$groups = $this->manager->search('1');
		$this->assertEmpty($groups);
	}

	public function testSearchBackendsForScope() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend1
		 */
		$backend1 = $this->getTestBackend();
		$backend1->expects($this->any())
			->method('getGroups')
			->with('1')
			->will($this->returnValue(['group1']));
		$backend1->expects($this->any())
			->method('groupExists')
			->will($this->returnValue(true));

		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend2
		 */
		$backend2 = $this->getTestBackend(null, [
			[null, false],
			['sharing', true],
		]);
		$backend2->expects($this->any())
			->method('getGroups')
			->with('1')
			->will($this->returnValue(['group12', 'group1']));
		$backend2->expects($this->any())
			->method('groupExists')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend1);
		$this->manager->addBackend($backend2);

		// search without scope
		$groups = $this->manager->search('1', null, null, null);
		$this->assertCount(1, $groups);
		$group1 = \reset($groups);
		$this->assertEquals('group1', $group1->getGID());

		// search with scope
		$groups = $this->manager->search('1', null, null, 'sharing');
		$this->assertCount(2, $groups);
		$group1 = \reset($groups);
		$group12 = \next($groups);
		$this->assertEquals('group1', $group1->getGID());
		$this->assertEquals('group12', $group12->getGID());
	}

	public function testGetUserGroups() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->once())
			->method('getUserGroups')
			->with('user1')
			->will($this->returnValue(['group1']));
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend);

		$groups = $this->manager->getUserGroups($this->getTestUser('user1'));
		$this->assertCount(1, $groups);
		$group1 = \reset($groups);
		$this->assertEquals('group1', $group1->getGID());
	}

	public function testGetUserGroupIds() {
		/** @var \PHPUnit_Framework_MockObject_MockObject|\OC\Group\Manager $manager */
		$manager = $this->getMockBuilder('OC\Group\Manager')
			->disableOriginalConstructor()
			->setMethods(['getUserGroups'])
			->getMock();
		$manager->expects($this->once())
			->method('getUserGroups')
			->willReturn([
				'123' => '123',
				'abc' => 'abc',
			]);

		/** @var \OC\User\User $user */
		$user = $this->getMockBuilder('OC\User\User')
			->disableOriginalConstructor()
			->getMock();

		$groups = $manager->getUserGroupIds($user);
		$this->assertCount(2, $groups);

		foreach ($groups as $group) {
			$this->assertInternalType('string', $group);
		}
	}

	public function testGetUserGroupsWithDeletedGroup() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->createMock(Database::class);
		$backend->expects($this->once())
			->method('getUserGroups')
			->with('user1')
			->will($this->returnValue(['group1']));
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(false));

		$this->manager->addBackend($backend);

		/** @var \OC\User\User $user */
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('user1');

		$groups = $this->manager->getUserGroups($user);
		$this->assertEmpty($groups);
	}

	public function testGetUserGroupsWithScope() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend(null, [
			[null, false],
			['sharing', true],
		]);
		$backend->expects($this->any())
			->method('getUserGroups')
			->with('user1')
			->will($this->returnValue(['group1']));
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend);

		$groups = $this->manager->getUserGroups($this->getTestUser('user1'));
		$this->assertEmpty($groups);

		$groups = $this->manager->getUserGroups($this->getTestUser('user1'), 'sharing');
		$this->assertCount(1, $groups);
		$group1 = \reset($groups);
		$this->assertEquals('group1', $group1->getGID());
	}

	public function testIsInGroup() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->once())
			->method('getUserGroups')
			->with('user1')
			->will($this->returnValue(['group1', 'admin', 'group2']));
		$backend->expects($this->any())
			->method('groupExists')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend);

		$this->assertTrue($this->manager->isInGroup('user1', 'group1'));
	}

	public function testInGroup() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(true));
		$backend->expects($this->once())
			->method('inGroup')
			->will($this->returnValue(true));

		/**
		 * @var IUser
		 */
		$user = $this->createMock(IUser::class);
		$this->userManager->expects($this->once())
			->method('get')
			->with('user1')
			->will($this->returnValue($user));

		$this->manager->addBackend($backend);

		$this->assertTrue($this->manager->inGroup('user1', 'group1'));
	}

	public function testNotInGroup() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(true));
		$backend->expects($this->once())
			->method('inGroup')
			->will($this->returnValue(false));

		/**
		 * @var IUser
		 */
		$user = $this->createMock(IUser::class);
		$this->userManager->expects($this->once())
			->method('get')
			->with('user1')
			->will($this->returnValue($user));

		$this->manager->addBackend($backend);

		$this->assertFalse($this->manager->inGroup('user1', 'group1'));
	}

	public function testIsAdmin() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->once())
			->method('getUserGroups')
			->with('user1')
			->will($this->returnValue(['group1', 'admin', 'group2']));
		$backend->expects($this->any())
			->method('groupExists')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend);

		$this->assertTrue($this->manager->isAdmin('user1'));
	}

	public function testNotAdmin() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->once())
			->method('getUserGroups')
			->with('user1')
			->will($this->returnValue(['group1', 'group2']));
		$backend->expects($this->any())
			->method('groupExists')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend);

		$this->assertFalse($this->manager->isAdmin('user1'));
	}

	public function testGetUserGroupsMultipleBackends() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend1
		 */
		$backend1 = $this->getTestBackend();
		$backend1->expects($this->once())
			->method('getUserGroups')
			->with('user1')
			->will($this->returnValue(['group1']));
		$backend1->expects($this->any())
			->method('groupExists')
			->will($this->returnValue(true));

		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend2
		 */
		$backend2 = $this->getTestBackend();
		$backend2->expects($this->once())
			->method('getUserGroups')
			->with('user1')
			->will($this->returnValue(['group1', 'group2']));
		$backend1->expects($this->any())
			->method('groupExists')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend1);
		$this->manager->addBackend($backend2);

		$groups = $this->manager->getUserGroups($this->getTestUser('user1'));
		$this->assertCount(2, $groups);
		$group1 = \reset($groups);
		$group2 = \next($groups);
		$this->assertEquals('group1', $group1->getGID());
		$this->assertEquals('group2', $group2->getGID());
	}

	public function testDisplayNamesInGroupWithOneUserBackend() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->any())
			->method('inGroup')
			->will($this->returnCallback(function ($uid, $gid) {
				switch ($uid) {
					case 'user1': return false;
					case 'user2': return true;
					case 'user3': return false;
					case 'user33': return true;
					default:
						return null;
					}
			}));

		$this->userManager->expects($this->any())
			->method('searchDisplayName')
			->with('user3')
			->will($this->returnCallback(function ($search, $limit, $offset) {
				switch ($offset) {
					case 0: return ['user3' => $this->getTestUser('user3'),
									'user33' => $this->getTestUser('user33')];
					case 2: return [];
				}
			}));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->displayNamesInGroup('testgroup', 'user3');
		$this->assertCount(1, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayNotHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayHasKey('user33', $users);
	}

	public function testDisplayNamesInGroupWithOneUserBackendWithLimitSpecified() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->any())
			->method('inGroup')
			->will($this->returnCallback(function ($uid, $gid) {
				switch ($uid) {
						case 'user1': return false;
						case 'user2': return true;
						case 'user3': return false;
						case 'user33': return true;
						case 'user333': return true;
						default:
							return null;
					}
			}));

		$this->userManager->expects($this->any())
			->method('searchDisplayName')
			->with('user3')
			->will($this->returnCallback(function ($search, $limit, $offset) {
				switch ($offset) {
					case 0: return ['user3' => $this->getTestUser('user3'),
									'user33' => $this->getTestUser('user33')];
					case 2: return ['user333' => $this->getTestUser('user333')];
				}
			}));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					case 'user333': return $this->getTestUser('user333');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->displayNamesInGroup('testgroup', 'user3', 1);
		$this->assertCount(1, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayNotHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayHasKey('user33', $users);
		$this->assertArrayNotHasKey('user333', $users);
	}

	public function testDisplayNamesInGroupWithOneUserBackendWithLimitAndOffsetSpecified() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->any())
			->method('inGroup')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
						case 'user1': return false;
						case 'user2': return true;
						case 'user3': return false;
						case 'user33': return true;
						case 'user333': return true;
						default:
							return null;
					}
			}));

		$this->userManager->expects($this->any())
			->method('searchDisplayName')
			->with('user3')
			->will($this->returnCallback(function ($search, $limit, $offset) {
				switch ($offset) {
						case 0:
							return [
								'user3' => $this->getTestUser('user3'),
								'user33' => $this->getTestUser('user33'),
								'user333' => $this->getTestUser('user333')
							];
					}
			}));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					case 'user333': return $this->getTestUser('user333');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->displayNamesInGroup('testgroup', 'user3', 1, 1);
		$this->assertCount(1, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayNotHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayNotHasKey('user33', $users);
		$this->assertArrayHasKey('user333', $users);
	}

	public function testDisplayNamesInGroupWithOneUserBackendAndSearchEmpty() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->once())
			->method('usersInGroup')
			->with('testgroup', '', -1, 0)
			->will($this->returnValue(['user2', 'user33']));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->displayNamesInGroup('testgroup', '');
		$this->assertCount(2, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayHasKey('user33', $users);
	}

	public function testDisplayNamesInGroupWithOneUserBackendAndSearchEmptyAndLimitSpecified() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->once())
			->method('usersInGroup')
			->with('testgroup', '', 1, 0)
			->will($this->returnValue(['user2']));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->displayNamesInGroup('testgroup', '', 1);
		$this->assertCount(1, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayNotHasKey('user33', $users);
	}

	public function testDisplayNamesInGroupWithOneUserBackendAndSearchEmptyAndLimitAndOffsetSpecified() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->once())
			->method('usersInGroup')
			->with('testgroup', '', 1, 1)
			->will($this->returnValue(['user33']));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->displayNamesInGroup('testgroup', '', 1, 1);
		$this->assertCount(1, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayNotHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayHasKey('user33', $users);
	}

	public function testGetUserGroupsWithAddUser() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$expectedGroups = [];
		$backend->expects($this->any())
			->method('getUserGroups')
			->with('user1')
			->will($this->returnCallback(function () use (&$expectedGroups) {
				return $expectedGroups;
			}));
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend);

		// prime cache
		$user1 = $this->getTestUser('user1');
		$groups = $this->manager->getUserGroups($user1);
		$this->assertEquals([], $groups);

		// add user
		$group = $this->manager->get('group1');
		$group->addUser($user1);
		$expectedGroups = ['group1'];

		// check result
		$groups = $this->manager->getUserGroups($user1);
		$this->assertCount(1, $groups);
		$group1 = \reset($groups);
		$this->assertEquals('group1', $group1->getGID());
	}

	public function testGetUserGroupsWithRemoveUser() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$expectedGroups = ['group1'];
		$backend->expects($this->any())
			->method('getUserGroups')
			->with('user1')
			->will($this->returnCallback(function () use (&$expectedGroups) {
				return $expectedGroups;
			}));
		$backend->expects($this->any())
			->method('groupExists')
			->with('group1')
			->will($this->returnValue(true));
		$backend->expects($this->once())
			->method('inGroup')
			->will($this->returnValue(true));
		$backend->expects($this->once())
			->method('removeFromGroup')
			->will($this->returnValue(true));

		$this->manager->addBackend($backend);

		// prime cache
		$user1 = $this->getTestUser('user1');
		$groups = $this->manager->getUserGroups($user1);
		$this->assertCount(1, $groups);
		$group1 = \reset($groups);
		$this->assertEquals('group1', $group1->getGID());

		// remove user
		$group = $this->manager->get('group1');
		$group->removeUser($user1);
		$expectedGroups = [];

		// check result
		$groups = $this->manager->getUserGroups($user1);
		$this->assertEquals($expectedGroups, $groups);
	}

	public function testGetUserIdGroups() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->any())
			->method('getUserGroups')
			->with('user1')
			->will($this->returnValue(null));

		$this->manager->addBackend($backend);

		$groups = $this->manager->getUserIdGroups('user1');
		$this->assertEquals([], $groups);
	}

	public function testGroupDisplayName() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend(
			GroupInterface::ADD_TO_GROUP |
			GroupInterface::REMOVE_FROM_GOUP |
			GroupInterface::COUNT_USERS |
			GroupInterface::CREATE_GROUP |
			GroupInterface::DELETE_GROUP |
			GroupInterface::GROUP_DETAILS
		);
		$backend->expects($this->any())
			->method('getGroupDetails')
			->will($this->returnValueMap([
				['group1', ['gid' => 'group1', 'displayName' => 'Group One']],
				['group2', ['gid' => 'group2']],
			]));

		$this->manager->addBackend($backend);

		// group with display name
		$group = $this->manager->get('group1');
		$this->assertNotNull($group);
		$this->assertEquals('group1', $group->getGID());
		$this->assertEquals('Group One', $group->getDisplayName());

		// group without display name
		$group = $this->manager->get('group2');
		$this->assertNotNull($group);
		$this->assertEquals('group2', $group->getGID());
		$this->assertEquals('group2', $group->getDisplayName());
	}

	public function testFindUsersInGroupWithOneUserBackend() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->any())
			->method('inGroup')
			->will($this->returnCallback(function ($uid, $gid) {
				switch ($uid) {
					case 'user1': return false;
					case 'user2': return true;
					case 'user3': return false;
					case 'user33': return true;
					default:
						return null;
				}
			}));

		$this->userManager->expects($this->any())
			->method('find')
			->with('user3')
			->will($this->returnCallback(function ($search, $limit, $offset) {
				switch ($offset) {
					case 0: return ['user3' => $this->getTestUser('user3'),
						'user33' => $this->getTestUser('user33')];
					case 2: return [];
				}
			}));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->findUsersInGroup('testgroup', 'user3');
		$this->assertCount(1, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayNotHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayHasKey('user33', $users);
	}

	public function testFindUsersInGroupWithOneUserBackendWithLimitSpecified() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->any())
			->method('inGroup')
			->will($this->returnCallback(function ($uid, $gid) {
				switch ($uid) {
					case 'user1': return false;
					case 'user2': return true;
					case 'user3': return false;
					case 'user33': return true;
					case 'user333': return true;
					default:
						return null;
				}
			}));

		$this->userManager->expects($this->any())
			->method('find')
			->with('user3')
			->will($this->returnCallback(function ($search, $limit, $offset) {
				switch ($offset) {
					case 0: return ['user3' => $this->getTestUser('user3'),
						'user33' => $this->getTestUser('user33')];
					case 2: return ['user333' => $this->getTestUser('user333')];
				}
			}));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					case 'user333': return $this->getTestUser('user333');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->findUsersInGroup('testgroup', 'user3', 1);
		$this->assertCount(1, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayNotHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayHasKey('user33', $users);
		$this->assertArrayNotHasKey('user333', $users);
	}

	public function testFindUsersInGroupWithOneUserBackendWithLimitAndOffsetSpecified() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->any())
			->method('inGroup')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return false;
					case 'user2': return true;
					case 'user3': return false;
					case 'user33': return true;
					case 'user333': return true;
					default:
						return null;
				}
			}));

		$this->userManager->expects($this->any())
			->method('find')
			->with('user3')
			->will($this->returnCallback(function ($search, $limit, $offset) {
				switch ($offset) {
					case 0:
						return [
							'user3' => $this->getTestUser('user3'),
							'user33' => $this->getTestUser('user33'),
							'user333' => $this->getTestUser('user333')
						];
				}
			}));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					case 'user333': return $this->getTestUser('user333');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->findUsersInGroup('testgroup', 'user3', 1, 1);
		$this->assertCount(1, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayNotHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayNotHasKey('user33', $users);
		$this->assertArrayHasKey('user333', $users);
	}

	public function testFindUsersInGroupWithOneUserBackendAndSearchEmpty() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->once())
			->method('usersInGroup')
			->with('testgroup', '', -1, 0)
			->will($this->returnValue(['user2', 'user33']));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->findUsersInGroup('testgroup', '');
		$this->assertCount(2, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayHasKey('user33', $users);
	}

	public function testFindUsersInGroupWithOneUserBackendAndSearchEmptyAndLimitSpecified() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->once())
			->method('usersInGroup')
			->with('testgroup', '', 1, 0)
			->will($this->returnValue(['user2']));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->findUsersInGroup('testgroup', '', 1);
		$this->assertCount(1, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayNotHasKey('user33', $users);
	}

	public function testFindUsersInGroupWithOneUserBackendAndSearchEmptyAndLimitAndOffsetSpecified() {
		/**
		 * @var \PHPUnit_Framework_MockObject_MockObject | \OC\Group\Backend $backend
		 */
		$backend = $this->getTestBackend();
		$backend->expects($this->exactly(1))
			->method('groupExists')
			->with('testgroup')
			->will($this->returnValue(true));

		$backend->expects($this->once())
			->method('usersInGroup')
			->with('testgroup', '', 1, 1)
			->will($this->returnValue(['user33']));

		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($uid) {
				switch ($uid) {
					case 'user1': return $this->getTestUser('user1');
					case 'user2': return $this->getTestUser('user2');
					case 'user3': return $this->getTestUser('user3');
					case 'user33': return $this->getTestUser('user33');
					default:
						return null;
				}
			}));

		$this->manager->addBackend($backend);

		$users = $this->manager->findUsersInGroup('testgroup', '', 1, 1);
		$this->assertCount(1, $users);
		$this->assertArrayNotHasKey('user1', $users);
		$this->assertArrayNotHasKey('user2', $users);
		$this->assertArrayNotHasKey('user3', $users);
		$this->assertArrayHasKey('user33', $users);
	}
}
