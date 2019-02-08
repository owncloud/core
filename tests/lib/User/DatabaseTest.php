<?php
/**
* ownCloud
*
* @author Robin Appelman
* @author Matthew Setter <matthew@matthewsetter.com>
* @copyright Copyright (c) 2012 Robin Appelman icewind@owncloud.com
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

namespace Test\User;
use Test\Traits\PasswordTrait;

/**
 * Class DatabaseTest
 *
 * @group DB
 */
class DatabaseTest extends BackendTestCase {
	/** @var array */
	private $users;

	public function getUser($prefix = 'test_') {
		$user = parent::getUser($prefix);
		$this->users[]=$user;
		return $user;
	}

	protected function setUp() {
		parent::setUp();
		$this->backend = new \OC\User\Database();
	}

	protected function tearDown() {
		if (!isset($this->users)) {
			return;
		}
		foreach ($this->users as $user) {
			$this->backend->deleteUser($user);
		}
		parent::tearDown();
	}

	/**
	 * Tests that a \OC\User\ArgumentNotSetException is thrown when the supplied password is empty.
	 *
	 * @param string $password
	 * @dataProvider getEmptyValues
	 * @expectedException \InvalidArgumentException
	 * @expectedExceptionMessage Password cannot be empty
	 */
	public function testCannotSetEmptyPassword($password) {
		$user1 = $this->getUser();
		$this->backend->createUser($this->getUser(), 'pw');
		$this->backend->setPassword($user1, $password);
	}

	public function testCreateUserInvalidatesCache() {
		$user1 = $this->getUser();
		$this->assertFalse($this->backend->userExists($user1));
		$this->backend->createUser($user1, 'pw');
		$this->assertTrue($this->backend->userExists($user1));
	}

	public function testDeleteUserInvalidatesCache() {
		$user1 = $this->getUser();
		$this->backend->createUser($user1, 'pw');
		$this->assertTrue($this->backend->userExists($user1));
		$this->backend->deleteUser($user1);
		$this->assertFalse($this->backend->userExists($user1));
		$this->backend->createUser($user1, 'pw2');
		$this->assertTrue($this->backend->userExists($user1));
	}
}
