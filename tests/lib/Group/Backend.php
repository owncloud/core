<?php
/**
 * @author Arthur Schiwon <blizzz@owncloud.com>
 * @author Felix Moeller <mail@felixmoeller.de>
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Scrutinizer Auto-Fixer <auto-fixer@scrutinizer-ci.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

/**
 * Class Backend
 *
 * @group DB
 */
abstract class Backend extends \Test\TestCase {
	/**
	 * @var \OC\Group\Backend $backend
	 */
	protected $backend;

	/**
	 * get a new unique group name
	 * test cases can override this in order to clean up created groups
	 *
	 * @return string
	 */
	public function getGroupName($name = null) {
		if ($name === null) {
			return self::getUniqueID('test_');
		} else {
			return $name;
		}
	}

	/**
	 * get a new unique user name
	 * test cases can override this in order to clean up created user
	 *
	 * @return string
	 */
	public function getUserName() {
		return self::getUniqueID('test_');
	}

	public function testAddRemove() {
		//get the number of groups we start with, in case there are existing groups
		$startCount = \count($this->backend->getGroups());

		$name1 = $this->getGroupName();
		$name2 = $this->getGroupName();
		$this->backend->createGroup($name1);
		$count = \count($this->backend->getGroups()) - $startCount;
		$this->assertEquals(1, $count);
		$this->assertContains($name1, $this->backend->getGroups());
		$this->assertNotContains($name2, $this->backend->getGroups());
		$this->backend->createGroup($name2);
		$count = \count($this->backend->getGroups()) - $startCount;
		$this->assertEquals(2, $count);
		$this->assertContains($name1, $this->backend->getGroups());
		$this->assertContains($name2, $this->backend->getGroups());

		$this->backend->deleteGroup($name2);
		$count = \count($this->backend->getGroups()) - $startCount;
		$this->assertEquals(1, $count);
		$this->assertContains($name1, $this->backend->getGroups());
		$this->assertNotContains($name2, $this->backend->getGroups());
	}

	public function testUser() {
		$group1 = $this->getGroupName();
		$group2 = $this->getGroupName();
		$this->backend->createGroup($group1);
		$this->backend->createGroup($group2);

		$user1 = $this->getUserName();
		$user2 = $this->getUserName();

		$this->assertFalse($this->backend->inGroup($user1, $group1));
		$this->assertFalse($this->backend->inGroup($user2, $group1));
		$this->assertFalse($this->backend->inGroup($user1, $group2));
		$this->assertFalse($this->backend->inGroup($user2, $group2));

		$this->assertTrue($this->backend->addToGroup($user1, $group1));

		$this->assertTrue($this->backend->inGroup($user1, $group1));
		$this->assertFalse($this->backend->inGroup($user2, $group1));
		$this->assertFalse($this->backend->inGroup($user1, $group2));
		$this->assertFalse($this->backend->inGroup($user2, $group2));

		$this->assertFalse($this->backend->addToGroup($user1, $group1));

		$this->assertEquals([$user1], $this->backend->usersInGroup($group1));
		$this->assertEquals([], $this->backend->usersInGroup($group2));

		$this->assertEquals([$group1], $this->backend->getUserGroups($user1));
		$this->assertEquals([], $this->backend->getUserGroups($user2));

		$this->backend->deleteGroup($group1);
		$this->assertEquals([], $this->backend->getUserGroups($user1));
		$this->assertEquals([], $this->backend->usersInGroup($group1));
		$this->assertFalse($this->backend->inGroup($user1, $group1));
	}

	public function testSearchGroups() {
		$name1 = $this->getGroupName('foobarbaz');
		$name2 = $this->getGroupName('bazbarfoo');
		$name3 = $this->getGroupName('notme');

		$this->backend->createGroup($name1);
		$this->backend->createGroup($name2);
		$this->backend->createGroup($name3);

		$result = $this->backend->getGroups('bar');
		$this->assertCount(2, $result);
	}

	public function testSearchUsers() {
		$group = $this->getGroupName();
		$this->backend->createGroup($group);

		$name1 = 'foobarbaz';
		$name2 = 'bazbarfoo';
		$name3 = 'notme';

		$this->backend->addToGroup($name1, $group);
		$this->backend->addToGroup($name2, $group);
		$this->backend->addToGroup($name3, $group);

		$result = $this->backend->usersInGroup($group, 'bar');
		$this->assertCount(2, $result);

		$result = $this->backend->countUsersInGroup($group, 'bar');
		$this->assertSame(2, $result);
	}

	public function testAddDouble() {
		$group = $this->getGroupName();

		$this->assertTrue(
			$this->backend->createGroup($group),
			"there was a problem creating $group"
		);
		$this->assertFalse(
			$this->backend->createGroup($group),
			"there was a problem creating $group a second time"
		);
	}
}
