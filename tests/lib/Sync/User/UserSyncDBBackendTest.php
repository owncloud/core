<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace Tests\Sync\User;

use OC\Sync\User\UserSyncDBBackend;
use OC\User\Database;
use OCP\UserInterface;
use OCP\Sync\User\IUserSyncBackend;
use OCP\Sync\User\SyncingUser;
use Test\TestCase;

class UserSyncDBBackendTest extends TestCase {
	/** @var UserSyncDBBackend */
	private $userSyncDBBackend;
	/** @var Database */
	private $database;

	protected function setUp(): void {
		$this->database = $this->createMock(Database::class);
		$this->userSyncDBBackend = new UserSyncDBBackend($this->database);
	}

	public function testResetPointer() {
		$this->userSyncDBBackend->resetPointer();
		$this->assertSame(0, $this->userSyncDBBackend->getPointer());
		$this->assertEquals(['min' => 0, 'max' => 0, 'last' => false], $this->userSyncDBBackend->getCachedUserData());
	}

	public function testGetNextUser() {
		$userData = [
			['uid' => 'user1', 'displayname' => ''],
			['uid' => 'user2', 'displayname' => 'awesome'],
		];

		$this->database->expects($this->once())
			->method('getUsersData')
			->willReturn($userData);
		$this->database->method('getHome')
			->will($this->returnCallback(function ($uid) {
				return "/home/{$uid}";
			}));

		$expectedUser = new SyncingUser('user1');
		$expectedUser->setDisplayName('user1');
		$expectedUser->setHome('/home/user1');

		$nextUser = $this->userSyncDBBackend->getNextUser();
		$this->assertEquals($expectedUser->getAllData(), $nextUser->getAllData());
	}

	public function testGetNextUser2x() {
		$userData = [
			['uid' => 'user1', 'displayname' => 'display1'],
			['uid' => 'user2', 'displayname' => 'awesome'],
		];

		$this->database->expects($this->once())
			->method('getUsersData')
			->willReturn($userData);
		$this->database->method('getHome')
			->will($this->returnCallback(function ($uid) {
				return "/home/{$uid}";
			}));

		$expectedUser = new SyncingUser('user1');
		$expectedUser->setDisplayName('display1');
		$expectedUser->setHome('/home/user1');
		$expectedUser2 = new SyncingUser('user2');
		$expectedUser2->setDisplayName('awesome');
		$expectedUser2->setHome('/home/user2');

		$nextUser = $this->userSyncDBBackend->getNextUser();
		$this->assertEquals($expectedUser->getAllData(), $nextUser->getAllData());
		$nextUser2 = $this->userSyncDBBackend->getNextUser();
		$this->assertEquals($expectedUser2->getAllData(), $nextUser2->getAllData());
	}

	public function testGetNextUser3x() {
		$userData = [
			['uid' => 'user1', 'displayname' => 'display1'],
			['uid' => 'user2', 'displayname' => 'awesome'],
		];

		$this->database->expects($this->exactly(2))
			->method('getUsersData')
			->will($this->onConsecutiveCalls($userData, []));
		$this->database->method('getHome')
			->will($this->returnCallback(function ($uid) {
				return "/home/{$uid}";
			}));

		$expectedUser = new SyncingUser('user1');
		$expectedUser->setDisplayName('display1');
		$expectedUser->setHome('/home/user1');
		$expectedUser2 = new SyncingUser('user2');
		$expectedUser2->setDisplayName('awesome');
		$expectedUser2->setHome('/home/user2');

		$nextUser = $this->userSyncDBBackend->getNextUser();
		$this->assertEquals($expectedUser->getAllData(), $nextUser->getAllData());
		$nextUser2 = $this->userSyncDBBackend->getNextUser();
		$this->assertEquals($expectedUser2->getAllData(), $nextUser2->getAllData());

		$this->assertNull($this->userSyncDBBackend->getNextUser());
	}

	public function testGetNextUser3xMoreData() {
		$userData = [
			['uid' => 'user1', 'displayname' => 'display1'],
			['uid' => 'user2', 'displayname' => 'awesome'],
		];
		$userData2 = [
			['uid' => 'user3', 'displayname' => 'blob'],
			['uid' => 'user4', 'displayname' => 'limeJuice'],
		];

		$this->database->expects($this->exactly(2))
			->method('getUsersData')
			->will($this->onConsecutiveCalls($userData, $userData2));
		$this->database->method('getHome')
			->will($this->returnCallback(function ($uid) {
				return "/home/{$uid}";
			}));

		$expectedUser = new SyncingUser('user1');
		$expectedUser->setDisplayName('display1');
		$expectedUser->setHome('/home/user1');
		$expectedUser2 = new SyncingUser('user2');
		$expectedUser2->setDisplayName('awesome');
		$expectedUser2->setHome('/home/user2');
		$expectedUser3 = new SyncingUser('user3');
		$expectedUser3->setDisplayName('blob');
		$expectedUser3->setHome('/home/user3');

		$nextUser = $this->userSyncDBBackend->getNextUser();
		$this->assertEquals($expectedUser->getAllData(), $nextUser->getAllData());
		$nextUser2 = $this->userSyncDBBackend->getNextUser();
		$this->assertEquals($expectedUser2->getAllData(), $nextUser2->getAllData());
		$nextUser3 = $this->userSyncDBBackend->getNextUser();
		$this->assertEquals($expectedUser3->getAllData(), $nextUser3->getAllData());
	}

	public function testGetNextUser4x() {
		$userData = [
			['uid' => 'user1', 'displayname' => 'display1'],
			['uid' => 'user2', 'displayname' => 'awesome'],
		];

		$this->database->expects($this->exactly(2))
			->method('getUsersData')
			->will($this->onConsecutiveCalls($userData, []));
		$this->database->method('getHome')
			->will($this->returnCallback(function ($uid) {
				return "/home/{$uid}";
			}));

		$expectedUser = new SyncingUser('user1');
		$expectedUser->setDisplayName('display1');
		$expectedUser->setHome('/home/user1');
		$expectedUser2 = new SyncingUser('user2');
		$expectedUser2->setDisplayName('awesome');
		$expectedUser2->setHome('/home/user2');

		$nextUser = $this->userSyncDBBackend->getNextUser();
		$this->assertEquals($expectedUser->getAllData(), $nextUser->getAllData());
		$nextUser2 = $this->userSyncDBBackend->getNextUser();
		$this->assertEquals($expectedUser2->getAllData(), $nextUser2->getAllData());

		$this->assertNull($this->userSyncDBBackend->getNextUser()); // would need to fetch data
		$this->assertNull($this->userSyncDBBackend->getNextUser()); // no need to fetch data
	}

	public function testGetSyncingUser() {
		$userData = ['uid' => 'user1', 'displayname' => 'display1'];

		$this->database->method('getUserData')
			->with('user1')
			->willReturn($userData);
		$this->database->method('getHome')
			->will($this->returnCallback(function ($uid) {
				return "/home/{$uid}";
			}));

		$expectedUser = new SyncingUser('user1');
		$expectedUser->setDisplayName('display1');
		$expectedUser->setHome('/home/user1');

		$this->assertEquals($expectedUser->getAllData(), $this->userSyncDBBackend->getSyncingUser('user1')->getAllData());
	}

	public function testGetSyncingUserNoDisplayname() {
		$userData = ['uid' => 'user1', 'displayname' => ''];

		$this->database->method('getUserData')
			->with('user1')
			->willReturn($userData);
		$this->database->method('getHome')
			->will($this->returnCallback(function ($uid) {
				return "/home/{$uid}";
			}));

		$expectedUser = new SyncingUser('user1');
		$expectedUser->setDisplayName('user1');
		$expectedUser->setHome('/home/user1');

		$this->assertEquals($expectedUser->getAllData(), $this->userSyncDBBackend->getSyncingUser('user1')->getAllData());
	}

	public function testGetSyncingUserMissing() {
		$this->database->method('getUserData')
			->with('user1')
			->willReturn(false);
		$this->database->expects($this->never())
			->method('getHome');

		$this->assertNull($this->userSyncDBBackend->getSyncingUser('user1'));
	}

	public function testUserCount() {
		$this->database->expects($this->once())
			->method('countUsers')
			->willReturn(77);
		$this->assertSame(77, $this->userSyncDBBackend->userCount());
	}

	public function testUserCountFailure() {
		$this->database->expects($this->once())
			->method('countUsers')
			->willReturn(false);
		$this->assertNull($this->userSyncDBBackend->userCount());
	}

	public function testGetUserInterface() {
		$this->assertSame($this->database, $this->userSyncDBBackend->getUserInterface());
	}
}
