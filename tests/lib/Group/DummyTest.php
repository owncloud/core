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
 */

namespace Test\Group;

use Test\Util\Group\Dummy as DummyBackend;

/**
 * Class DummyTest
 *
 * @group DB
 */
class DummyTest extends Backend {
	protected function setUp() {
		parent::setUp();
		$this->backend= new DummyBackend();
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
		$this->assertSame(2, count($result));

		$result = $this->backend->countUsersInGroup($group, 'bar');
		$this->assertSame(2, $result);
	}
}