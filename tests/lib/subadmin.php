<?php
/**
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
namespace Test;

class SubAdmin extends \Test\TestCase {

	/** @var \OCP\IUserManager */
	private $userManager;

	/** @var \OCP\IGroupManager */
	private $groupManager;

	/** @var \OCP\IDBConnection */
	private $dbConn;

	/** @var \OCP\IUser[] */
	private $users;

	/** @var \OCP\IGroup[] */
	private $groups;
	
	public function setup() {
		$this->users = [];
		$this->groups = [];

		$this->userManager = \OC::$server->getUserManager();
		$this->groupManager = \OC::$server->getGroupManager();
		$this->dbConn = \OC::$server->getDatabaseConnection();

		// Create 3 users and 3 groups
		for ($i = 0; $i < 3; $i++) {
			$this->users[] = $this->userManager->createUser('user'.$i, 'user');
			$this->groups[] = $this->groupManager->createGroup('group'.$i);
		}

		// Create admin group
		if (!$this->groupManager->groupExists('admin')) {
			$this->groupManager->createGroup('admin');
		}
	}

	public function tearDown() {
		foreach($this->users as $user) {
			$user->delete();
		}

		foreach($this->groups as $group) {
			$group->delete();
		}
	}

	private function mockAll() {
		$this->groupManager = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->groupManager->expects($this->once())
			->method('listen');
		$this->userManager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->userManager->expects($this->once())
			->method('listen');
		$this->dbConn = $this->getMockBuilder('\OCP\IDBConnection')
			->disableOriginalConstructor()
			->getMock();
		$this->dbConn->expects($this->never())
			->method($this->anything());
	}

	public function testCreateSubAdmin() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertTrue($subAdmin->createSubAdmin($this->users[0], $this->groups[0]));

		// Look for subadmin in the database
		$qb = $this->dbConn->getQueryBuilder();
		$result = $qb->select(['gid', 'uid'])
			->from('group_admin')
			->where($qb->expr()->eq('gid', $qb->createNamedParameter($this->groups[0]->getGID())))
			->andWHere($qb->expr()->eq('uid', $qb->createNamedParameter($this->users[0]->getUID())))
			->execute()
			->fetch();
		$this->assertEquals(
			[
				'gid' => $this->groups[0]->getGID(), 
				'uid' => $this->users[0]->getUID()
			], $result);

		// Delete subadmin
		$result = $qb->delete('*PREFIX*group_admin')
			->where($qb->expr()->eq('gid', $qb->createNamedParameter($this->groups[0]->getGID())))
			->andWHere($qb->expr()->eq('uid', $qb->createNamedParameter($this->users[0]->getUID())))
			->execute();
	}

	public function testCreateSubAdminNullUser() {
		$this->mockAll();
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertFalse($subAdmin->createSubAdmin(null, $this->groups[0]));
	}

	public function testCreateSubAdminNullGroup() {
		$this->mockAll();
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertFalse($subAdmin->createSubAdmin($this->users[0], null));
	}

	public function testDeleteSubAdmin() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertTrue($subAdmin->createSubAdmin($this->users[0], $this->groups[0]));
		$this->assertTrue($subAdmin->deleteSubAdmin($this->users[0], $this->groups[0]));

		// DB query should be empty
		$qb = $this->dbConn->getQueryBuilder();
		$result = $qb->select(['gid', 'uid'])
			->from('group_admin')
			->where($qb->expr()->eq('gid', $qb->createNamedParameter($this->groups[0]->getGID())))
			->andWHere($qb->expr()->eq('uid', $qb->createNamedParameter($this->users[0]->getUID())))
			->execute()
			->fetch();
		$this->assertEmpty($result);
	}

	public function testDeleteSubAdminNullUser() {
		$this->mockAll();
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertFalse($subAdmin->deleteSubAdmin(null, $this->groups[0]));
	}

	public function testDeleteSubAdminNullGroup() {
		$this->mockAll();
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertFalse($subAdmin->deleteSubAdmin($this->users[0], null));
	}

	public function testGetSubAdminsGroups() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertTrue($subAdmin->createSubAdmin($this->users[0], $this->groups[0]));
		$this->assertTrue($subAdmin->createSubAdmin($this->users[0], $this->groups[1]));

		$result = $subAdmin->getSubAdminsGroups($this->users[0]);
		
		$this->assertContains($this->groups[0], $result);
		$this->assertContains($this->groups[1], $result);
		$this->assertNotContains($this->groups[2], $result);

		$this->assertTrue($subAdmin->deleteSubAdmin($this->users[0], $this->groups[0]));
		$this->assertTrue($subAdmin->deleteSubAdmin($this->users[0], $this->groups[1]));
	}

	public function testGetSubAdminsGroupsNullUser() {
		$this->mockAll();
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertEquals([], $subAdmin->getSubAdminsGroups(null));
	}

	public function testGetGroupsSubAdmins() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertTrue($subAdmin->createSubAdmin($this->users[0], $this->groups[0]));
		$this->assertTrue($subAdmin->createSubAdmin($this->users[1], $this->groups[0]));

		$result = $subAdmin->getGroupsSubAdmins($this->groups[0]);
		
		$this->assertContains($this->users[0], $result);
		$this->assertContains($this->users[1], $result);
		$this->assertNotContains($this->users[2], $result);

		$this->assertTrue($subAdmin->deleteSubAdmin($this->users[0], $this->groups[0]));
		$this->assertTrue($subAdmin->deleteSubAdmin($this->users[1], $this->groups[0]));
	}

	public function testGetGroupsSubAdminsNullGroup() {
		$this->mockAll();
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$result = $subAdmin->getGroupsSubAdmins(null);
	}

	public function testGetAllSubAdmin() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);

		$this->assertTrue($subAdmin->createSubAdmin($this->users[0], $this->groups[0]));
		$this->assertTrue($subAdmin->createSubAdmin($this->users[1], $this->groups[1]));
		$this->assertTrue($subAdmin->createSubAdmin($this->users[2], $this->groups[1]));

		$result = $subAdmin->getAllSubAdmins();

		$this->assertContains(['user' => $this->users[0], 'group' => $this->groups[0]], $result);
		$this->assertContains(['user' => $this->users[1], 'group' => $this->groups[1]], $result);
		$this->assertContains(['user' => $this->users[2], 'group' => $this->groups[1]], $result);
	}

	public function testIsSubAdminofGroup() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertTrue($subAdmin->createSubAdmin($this->users[0], $this->groups[0]));

		$this->assertTrue($subAdmin->isSubAdminOfGroup($this->users[0], $this->groups[0]));
		$this->assertFalse($subAdmin->isSubAdminOfGroup($this->users[0], $this->groups[1]));
		$this->assertFalse($subAdmin->isSubAdminOfGroup($this->users[1], $this->groups[0]));

		$this->assertTrue($subAdmin->deleteSubAdmin($this->users[0], $this->groups[0]));
	}

	public function testIsSubAdminofGroupNullUser() {
		$this->mockAll();
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertFalse($subAdmin->isSubAdminOfGroup(null, $this->groups[0]));
	}

	public function testIsSubAdminofGroupNullGroup() {
		$this->mockAll();
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertFalse($subAdmin->isSubAdminOfGroup($this->users[0], null));
	}

	public function testIsSubAdmin() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertTrue($subAdmin->createSubAdmin($this->users[0], $this->groups[0]));

		$this->assertTrue($subAdmin->isSubAdmin($this->users[0]));
		$this->assertFalse($subAdmin->isSubAdmin($this->users[1]));

		$this->assertTrue($subAdmin->deleteSubAdmin($this->users[0], $this->groups[0]));
	}

	public function testSubAdminNull() {
		$this->mockAll();
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertFalse($subAdmin->isSubAdmin(null));
	}

	public function testIsSubAdminAsAdmin() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->groupManager->get('admin')->addUser($this->users[0]);

		$this->assertTrue($subAdmin->isSubAdmin($this->users[0]));
	}

	public function testIsUserAccessible() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->groups[0]->addUser($this->users[1]);
		$this->groups[1]->addUser($this->users[1]);
		$this->groups[1]->addUser($this->users[2]);
		$this->assertTrue($subAdmin->createSubAdmin($this->users[0], $this->groups[0]));
		$this->assertTrue($subAdmin->createSubAdmin($this->users[2], $this->groups[2]));

		$this->assertTrue($subAdmin->isUserAccessible($this->users[0], $this->users[1]));
		$this->assertFalse($subAdmin->isUserAccessible($this->users[0], $this->users[2]));
		$this->assertFalse($subAdmin->isUserAccessible($this->users[2], $this->users[0]));

		$this->assertTrue($subAdmin->deleteSubAdmin($this->users[0], $this->groups[0]));
		$this->assertTrue($subAdmin->deleteSubAdmin($this->users[2], $this->groups[2]));
	}

	public function testIsUserAccessibleAsUser() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertFalse($subAdmin->isUserAccessible($this->users[0], $this->users[1]));
	}

	public function testIsUserAccessibleAdmin() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertTrue($subAdmin->createSubAdmin($this->users[0], $this->groups[0]));
		$this->groupManager->get('admin')->addUser($this->users[1]);

		$this->assertFalse($subAdmin->isUserAccessible($this->users[0], $this->users[1]));
	}

	public function testIsUserAccessibleNullSubAdmin() {
		$this->mockAll();
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertFalse($subAdmin->isUserAccessible(null, $this->users[0]));
	}

	public function testIsUserAccessibleNullUser() {
		$this->mockAll();
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);
		$this->assertFalse($subAdmin->isUserAccessible($this->users[0], null));
	}

	public function testPostDeleteUser() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);

		$user = array_shift($this->users);
		foreach($this->groups as $group) {
			$this->assertTrue($subAdmin->createSubAdmin($user, $group));
		}

		$user->delete();
		$this->assertEmpty($subAdmin->getAllSubAdmins());
	}

	public function testPostDeleteGroup() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);

		$group = array_shift($this->groups);
		foreach($this->users as $user) {
			$this->assertTrue($subAdmin->createSubAdmin($user, $group));
		}

		$group->delete();
		$this->assertEmpty($subAdmin->getAllSubAdmins());
	}

	public function testHooks() {
		$subAdmin = new \OC\SubAdmin($this->userManager, $this->groupManager, $this->dbConn);

		$test = $this;
		$u = $this->users[0];
		$g = $this->groups[0];
		$count = 0;

		$subAdmin->listen('\OC\SubAdmin', 'postCreateSubAdmin', function ($user, $group) use ($test, $u, $g, &$count) {
			$test->assertEquals($u->getUID(), $user->getUID());
			$test->assertEquals($g->getGID(), $group->getGID());
			$count++;
		});

		$subAdmin->listen('\OC\SubAdmin', 'postDeleteSubAdmin', function ($user, $group) use ($test, $u, $g, &$count) {
			$test->assertEquals($u->getUID(), $user->getUID());
			$test->assertEquals($g->getGID(), $group->getGID());
			$count++;
		});

		$this->assertTrue($subAdmin->createSubAdmin($u, $g));
		$this->assertEquals(1, $count);

		$this->assertTrue($subAdmin->deleteSubAdmin($u, $g));
		$this->assertEquals(2, $count);
	}

}
