<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace Test\App;

use OC\App\AppAccessService;
use Test\TestCase;

/**
 * Class AppAccessServiceTest
 *
 * @package Test\App
 * @group DB
 */
class AppAccessServiceTest extends TestCase {
	private $logger;
	private $connection;
	private $groupManager;
	private $appAccessService;
	private $group1;
	private $group2;
	private $user1;
	private $user2;
	protected function setUp() {
		$this->logger = \OC::$server->getLogger();
		$this->connection = \OC::$server->getDatabaseConnection();
		$this->groupManager = \OC::$server->getGroupManager();
		$this->appAccessService = new AppAccessService($this->logger, $this->connection, $this->groupManager);
		$user1UniqueId = $this->getUniqueID('user1_');
		$user2UniqueId = $this->getUniqueID('user2_');
		$group1UniqueId = $this->getUniqueID('group1_');
		$group2UniqueId = $this->getUniqueID('group2_');
		$this->user1 = \OC::$server->getUserManager()->createUser($user1UniqueId, 'user1');
		$this->user2 = \OC::$server->getUserManager()->createUser($user2UniqueId, 'user2');
		$this->group1 = $this->groupManager->createGroup($group1UniqueId);
		$this->group2 = $this->groupManager->createGroup($group2UniqueId);
		parent::setUp();
	}

	protected function tearDown() {
		parent::tearDown();
		/**
		 * wipe methods are tested in the tear down.
		 */
		$this->user1->delete();
		$this->user2->delete();
		$this->group1->delete();
		$this->group2->delete();
	}

	public function testSetAndGetWhitelistedAppsForGroups() {
		//Set the whitelisted apps for the group1
		$this->appAccessService->setWhitelistedAppsForGroup($this->group1, ['foo', 'bar']);
		//Set the whitelisted apps for the group2
		$this->appAccessService->setWhitelistedAppsForGroup($this->group2, ['hello', 'world']);

		$result = $this->appAccessService->getWhitelistedAppsForGroup($this->group1);
		$this->assertEquals(['foo', 'bar'], $result);

		$result = $this->appAccessService->getWhitelistedAppsForGroup($this->group2);
		$this->assertEquals(['hello', 'world'], $result);
	}

	public function testGetWhitelistedAppsForNonExistingGroupInTable() {
		$this->assertFalse($this->appAccessService->getWhitelistedAppsForGroup($this->group1));
	}

	public function testOverWriteWhitelistedAppsForGroup() {
		$this->appAccessService->setWhitelistedAppsForGroup($this->group1, ['foo', 'bar']);
		$this->appAccessService->setWhitelistedAppsForGroup($this->group1, ['foo', 'hello']);
		$this->assertEquals(['foo', 'hello'], $this->appAccessService->getWhitelistedAppsForGroup($this->group1));

		$this->appAccessService->setWhitelistedAppsForGroup($this->group1, ['world', 'fun']);
		$this->assertEquals(['world', 'fun'], $this->appAccessService->getWhitelistedAppsForGroup($this->group1));
	}

	/**
	 * In this test user has whitelisted apps and no groups this user is a member of
	 */
	public function testWhitelistedAppsForUserComputedWithoutGroups() {
		//Set the whitelisted apps for the user1
		$this->appAccessService->setWhitelistedAppsForUser($this->user1, ['foo', 'bar']);
		$result = $this->appAccessService->getComputedWhitelistedAppsForUser($this->user1);
		$expectedResult = ['foo' => 'foo', 'bar' => 'bar'];
		$this->assertEquals([], \array_diff_assoc($expectedResult, $result));
		$this->assertEquals([], \array_diff_assoc($result, $expectedResult));

		//The result should not change when fetched by calling api which gets result by excluding groups
		$result = $this->appAccessService->getWhitelistedAppsForUser($this->user1);
		$this->assertSame(['foo', 'bar'], $result);
	}

	/**
	 * In this test user does not have any whitelisted apps, but the group
	 * in which it is a member of has.
	 */
	public function testWhitelistedAppsForUserComputedWithGroup() {
		$this->appAccessService->setWhitelistedAppsForGroup($this->group1, ['foo', 'bar']);
		$this->group1->addUser($this->user1);

		$expectedResult = ['foo' => 'foo', 'bar' => 'bar'];
		$realResult =  $this->appAccessService->getComputedWhitelistedAppsForUser($this->user1);
		$this->assertEquals([], \array_diff_assoc($expectedResult, $realResult));
		$this->assertEquals([], \array_diff_assoc($realResult, $expectedResult));
	}

	/**
	 * In this test user does not have any whitelisted apps. But this user is a member
	 * of multiple groups and these groups have whitelisted apps.
	 */
	public function testWhitelistedAppsForUserComputedWithMemberOfMultipleGrps() {
		$this->appAccessService->setWhitelistedAppsForGroup($this->group1, ['foo', 'bar']);
		$this->appAccessService->setWhitelistedAppsForGroup($this->group2, ['app1', 'app2', 'app3']);
		$this->group1->addUser($this->user1);
		$this->group2->addUser($this->user1);

		$expectedResult = [
			'foo' => 'foo',
			'bar' => 'bar',
			'app1' => 'app1',
			'app2' => 'app2',
			'app3' => 'app3'
		];
		$realResult = $this->appAccessService->getComputedWhitelistedAppsForUser($this->user1);
		$this->assertEquals([], \array_diff_assoc($expectedResult, $realResult));
		$this->assertEquals([], \array_diff_assoc($realResult, $expectedResult));
	}

	/**
	 * In this test user has whitelisted apps and groups have whitelisted apps.
	 * The users are not member of the groups.
	 */
	public function testWhitelistedAppsUsersAndGroupsAreNotMembers() {
		$this->appAccessService->setWhitelistedAppsForGroup($this->group1, ['group1App1', 'group1App2']);
		$this->appAccessService->setWhitelistedAppsForGroup($this->group2, ['group2App1', 'group2App2']);
		$this->appAccessService->setWhitelistedAppsForUser($this->user1, ['user1App1', 'user1App2']);
		$this->appAccessService->setWhitelistedAppsForUser($this->user2, ['user2App1', 'user2App2']);

		$expectedResult1 = [
			'user1App1' => 'user1App1',
			'user1App2' => 'user1App2'
		];
		$realResult1 = $this->appAccessService->getComputedWhitelistedAppsForUser($this->user1);
		$this->assertEquals([], \array_diff_assoc($expectedResult1, $realResult1));
		$this->assertEquals([], \array_diff_assoc($realResult1, $expectedResult1));

		$expectedResult2 = ['user2App1' => 'user2App1', 'user2App2' => 'user2App2'];
		$realResult2 = $this->appAccessService->getComputedWhitelistedAppsForUser($this->user2);
		$this->assertEquals([], \array_diff_assoc($expectedResult2, $realResult2));
		$this->assertEquals([], \array_diff_assoc($realResult2, $expectedResult2));
	}

	/**
	 * In this test the user is a member of a group. Both user and group have
	 * their whitelisted apps. There is another group which also has a whitelisted
	 * apps.
	 */
	public function testWhitelistedAppsComputedForUserWithMemberOfGroup() {
		$this->appAccessService->setWhitelistedAppsForUser($this->user1, ['user1App1', 'user1App2']);
		$this->appAccessService->setWhitelistedAppsForGroup($this->group1, ['group1App1', 'group1App2']);
		$this->appAccessService->setWhitelistedAppsForGroup($this->group2, ['group2App1', 'group2App2']);
		$this->group1->addUser($this->user1);

		$expectedResult = [
			'user1App1' => 'user1App1',
			'user1App2' => 'user1App2',
			'group1App1' => 'group1App1',
			'group1App2' => 'group1App2',
		];
		$realResult = $this->appAccessService->getComputedWhitelistedAppsForUser($this->user1);
		$this->assertEquals([], \array_diff_assoc($expectedResult, $realResult));
		$this->assertEquals([], \array_diff_assoc($realResult, $expectedResult));
	}

	/**
	 * In this test the user has whitelisted apps and groups which its a member of
	 * has whitelisted apps too.
	 */
	public function testWhitelistedAppsBothUserAndGroupsHaveList() {
		$this->appAccessService->setWhitelistedAppsForGroup($this->group1, ['foo', 'bar']);
		$this->appAccessService->setWhitelistedAppsForGroup($this->group2, ['app1', 'app2']);
		$this->appAccessService->setWhitelistedAppsForUser($this->user1, ['user1App1', 'user1App2']);
		$this->group1->addUser($this->user1);
		$this->group2->addUser($this->user1);

		$expectedResult = [
			'foo' => 'foo',
			'bar' => 'bar',
			'app1' => 'app1',
			'app2' => 'app2',
			'user1App1' => 'user1App1',
			'user1App2' => 'user1App2'
		];
		$realResult = $this->appAccessService->getComputedWhitelistedAppsForUser($this->user1);
		$this->assertEquals([], \array_diff_assoc($expectedResult, $realResult));
		$this->assertEquals([], \array_diff_assoc($realResult, $expectedResult));
	}

	public function testSetEmptyAppListToUser() {
		//Set empty whitelist to user1
		$this->appAccessService->setWhitelistedAppsForUser($this->user1, []);
		$result = $this->appAccessService->getComputedWhitelistedAppsForUser($this->user1);
		$this->assertEquals([], $result);
	}

	public function testSetEmptyAppListToGroup() {
		//Set empty whitelist to group1
		$this->appAccessService->setWhitelistedAppsForGroup($this->group1, []);
		$result = $this->appAccessService->getWhitelistedAppsForGroup($this->group1);
		$this->assertEquals([], $result);
	}

	/**
	 * This test proves that if user is not there in the table, then the user
	 * has access to all the apps.
	 */
	public function testGetComputedWhitelistedAppsForUserNotAddedToTable() {
		$this->assertFalse($this->appAccessService->getComputedWhitelistedAppsForUser($this->user1));
	}

	public function testGetWhitelistedAppsForUserNotAddedToTable() {
		$this->assertFalse($this->appAccessService->getWhitelistedAppsForUser($this->user1));
	}

	public function testSetWhitelistedAppsForUserAndGroup() {
		$this->group1->addUser($this->user1);
		$this->group2->addUser($this->user1);
		$this->group2->addUser($this->user2);

		$this->appAccessService->setWhitelistedAppsForGroup($this->group1, ['app1', 'app2']);
		$this->appAccessService->setWhitelistedAppsForGroup($this->group2, ['app1', 'app3', 'app4', 'app5']);

		$this->appAccessService->setWhitelistedAppsForUser($this->user1, ['appUser1', 'appUser10']);
		$this->appAccessService->setWhitelistedAppsForUser($this->user2, ['appUser2', 'appUser20']);

		$expectedResult = [
			'app1' => 'app1',
			'app2' => 'app2',
			'app3' => 'app3',
			'app4' => 'app4',
			'app5' => 'app5',
			'appUser1' => 'appUser1',
			'appUser10' => 'appUser10'
		];
		$realResult = $this->appAccessService->getComputedWhitelistedAppsForUser($this->user1);
		$this->assertEquals([], \array_diff_assoc($expectedResult, $realResult));
		$this->assertEquals([], \array_diff_assoc($realResult, $expectedResult));
		$this->assertEquals(
			['appUser1', 'appUser10'],
			$this->appAccessService->getWhitelistedAppsForUser($this->user1));

		$expectedResult2 = [
			'app1' => 'app1', 'app3' => 'app3', 'app4' => 'app4',
			'app5' => 'app5', 'appUser2' => 'appUser2', 'appUser20' => 'appUser20'];
		$realResult2 = $this->appAccessService->getComputedWhitelistedAppsForUser($this->user2);
		$this->assertEquals([], \array_diff_assoc($expectedResult2, $realResult2));
		$this->assertEquals([], \array_diff_assoc($realResult2, $expectedResult2));
		$this->assertEquals(
			['appUser2', 'appUser20'],
			$this->appAccessService->getWhitelistedAppsForUser($this->user2)
		);
	}

	public function testOverWriteWhitelistedAppsForUser() {
		$this->appAccessService->setWhitelistedAppsForUser($this->user1, ['foo', 'bar']);
		$this->appAccessService->setWhitelistedAppsForUser($this->user1, ['foo', 'world']);
		$expectedResult = ['foo' => 'foo', 'world' => 'world'];
		$realResult = $this->appAccessService->getComputedWhitelistedAppsForUser($this->user1);
		$this->assertEquals([], \array_diff_assoc($expectedResult, $realResult));
		$this->assertEquals([], \array_diff_assoc($realResult, $expectedResult));
		$this->assertEquals(['foo', 'world'], $this->appAccessService->getWhitelistedAppsForUser($this->user1));
	}
}
