<?php
/**
 * ownCloud
 *
 * @author Robin Appelman
 * @copyright 2012 Robin Appelman icewind@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * Abstract class to provide the basis of backend-specific unit test classes.
 *
 * All subclasses MUST assign a backend property in setUp() which implements
 * user operations (add, remove, etc.). Test methods in this class will then be
 * run on each separate subclass and backend therein.
 *
 * For an example see /tests/lib/user/dummy.php
 */

abstract class Test_User_Backend extends PHPUnit_Framework_TestCase {
	/**
	 * @var OC_User_Backend | OC_User_Database $backend
	 */
	protected $backend;

	/**
	 * get a new unique user name
	 * test cases can override this in order to clean up created user
	 *
	 * @param string $postfix
	 * @return string
	 */
	public function getUser($postfix = '') {
		return uniqid('test_') . $postfix;
	}

	public function testAddRemove() {
		//get the number of groups we start with, in case there are exising groups
		$startCount = count($this->backend->getUsers());

		$name1 = $this->getUser();
		$name2 = $this->getUser();
		$this->backend->createUser($name1, '');
		$count = count($this->backend->getUsers()) - $startCount;
		$this->assertEquals(1, $count);
		$this->assertTrue((array_search($name1, $this->backend->getUsers()) !== false));
		$this->assertFalse((array_search($name2, $this->backend->getUsers()) !== false));
		$this->backend->createUser($name2, '');
		$count = count($this->backend->getUsers()) - $startCount;
		$this->assertEquals(2, $count);
		$this->assertTrue((array_search($name1, $this->backend->getUsers()) !== false));
		$this->assertTrue((array_search($name2, $this->backend->getUsers()) !== false));

		$this->backend->deleteUser($name2);
		$count = count($this->backend->getUsers()) - $startCount;
		$this->assertEquals(1, $count);
		$this->assertTrue((array_search($name1, $this->backend->getUsers()) !== false));
		$this->assertFalse((array_search($name2, $this->backend->getUsers()) !== false));
	}

	public function testLogin() {
		$name1 = $this->getUser();
		$name2 = $this->getUser();

		$this->assertFalse($this->backend->userExists($name1));
		$this->assertFalse($this->backend->userExists($name2));

		$this->backend->createUser($name1, 'pass1');
		$this->backend->createUser($name2, 'pass2');

		$this->assertTrue($this->backend->userExists($name1));
		$this->assertTrue($this->backend->userExists($name2));

		$this->assertEquals($name1, $this->backend->checkPassword($name1, 'pass1'));
		$this->assertEquals($name2, $this->backend->checkPassword($name2, 'pass2'));

		$this->assertFalse($this->backend->checkPassword($name1, 'pass2'));
		$this->assertFalse($this->backend->checkPassword($name2, 'pass1'));

		$this->assertFalse($this->backend->checkPassword($name1, 'dummy'));
		$this->assertFalse($this->backend->checkPassword($name2, 'foobar'));

		$this->backend->setPassword($name1, 'newpass1');
		$this->assertFalse($this->backend->checkPassword($name1, 'pass1'));
		$this->assertEquals($name1, $this->backend->checkPassword($name1, 'newpass1'));
		$this->assertFalse($this->backend->checkPassword($name2, 'newpass1'));
	}

	public function testUserExists() {
		$user = $this->getUser();
		$this->assertFalse($this->backend->userExists($user));
		$this->backend->createUser($user, '');
		$this->assertTrue($this->backend->userExists($user));
	}

	public function testUserExistsCaseInsensitive() {
		$user = strtolower($this->getUser());
		$this->backend->createUser($user, '');
		$this->assertTrue($this->backend->userExists(strtoupper($user)));

		$user2 = strtoupper($this->getUser());
		$this->backend->createUser($user2, '');
		$this->assertTrue($this->backend->userExists(strtolower($user2)));
	}

	public function testLoginCaseInsensitive() {
		$user = strtolower($this->getUser());
		$this->backend->createUser($user, 'lower');
		$this->assertEquals($user, $this->backend->checkPassword(strtoupper($user), 'lower'));

		$user2 = strtoupper($this->getUser());
		$this->backend->createUser($user2, 'upper');
		$this->assertEquals($user2, $this->backend->checkPassword(strtolower($user2), 'upper'));
	}

	public function testDeleteUser() {
		$user = $this->getUser();
		$this->backend->createUser($user, '');
		$this->assertTrue($this->backend->userExists($user));
		$this->backend->deleteUser($user);
		$this->assertFalse($this->backend->userExists($user));
	}

	public function testCantLoginAsDeletedUser() {
		$user = $this->getUser();
		$this->backend->createUser($user, '');
		$this->assertEquals($user, $this->backend->checkPassword($user, ''));
		$this->backend->deleteUser($user);
		$this->assertFalse($this->backend->checkPassword($user, ''));
	}

	public function testGetUsers() {
		$user1 = $this->getUser();
		$user2 = $this->getUser();
		$user3 = $this->getUser();
		$this->backend->createUser($user1, '');
		$this->backend->createUser($user2, '');
		$this->backend->createUser($user3, '');
		$users = $this->backend->getUsers();
		$this->assertContains($user1, $users);
		$this->assertContains($user2, $users);
		$this->assertContains($user3, $users);
	}

	public function testGetUsersSearch() {
		$user1 = $this->getUser('searchstring');
		$user2 = $this->getUser('searchstring');
		$user3 = $this->getUser();
		$this->backend->createUser($user1, '');
		$this->backend->createUser($user2, '');
		$this->backend->createUser($user3, '');
		$users = $this->backend->getUsers('searchstring');
		$this->assertEquals(2, count($users));
		$this->assertContains($user1, $users);
		$this->assertContains($user2, $users);
	}

	public function testGetUsersSearchOffsetAndLimit() {
		$user1 = $this->getUser('searchstring');
		$user2 = $this->getUser('searchstring');
		$user3 = $this->getUser();
		$this->backend->createUser($user1, '');
		$this->backend->createUser($user2, '');
		$this->backend->createUser($user3, '');
		$users = $this->backend->getUsers('searchstring', 1);
		$this->assertEquals(1, count($users));
		$this->assertContains($user1, $users);
		$users = $this->backend->getUsers('searchstring', 1, 1);
		$this->assertEquals(1, count($users));
		$this->assertContains($user2, $users);
	}

	public function testGetUsersSearchCaseInsensitive() {
		$user1 = $this->getUser('searchstring');
		$user2 = $this->getUser('searchSTRING');
		$user3 = $this->getUser();
		$this->backend->createUser($user1, '');
		$this->backend->createUser($user2, '');
		$this->backend->createUser($user3, '');
		$users = $this->backend->getUsers('SearchString');
		$this->assertEquals(2, count($users));
	}

	public function testGetDefaultDisplayName() {
		$user = $this->getUser();
		$this->backend->createUser($user, '');
		$this->assertEquals($user, $this->backend->getDisplayName($user));
	}

	public function testSetDisplayName() {
		$user = $this->getUser();
		$this->backend->createUser($user, '');
		$this->backend->setDisplayName($user, 'Foo');
		$this->assertEquals('Foo', $this->backend->getDisplayName($user));
	}

	public function testSetPassword() {
		$user = strtolower($this->getUser());
		$this->backend->createUser($user, 'pass1');
		$this->assertEquals($user, $this->backend->checkPassword(strtoupper($user), 'pass1'));
		$this->backend->setPassword($user, 'pass2');
		$this->assertEquals($user, $this->backend->checkPassword(strtoupper($user), 'pass2'));
		$this->assertFalse($this->backend->checkPassword(strtoupper($user), 'pass1'));
	}
}
