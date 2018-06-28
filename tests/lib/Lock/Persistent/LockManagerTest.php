<?php
/**
 * @author Thomas Müller <thomas-mueller@tmit.eu>
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

namespace Test\Lock\Persistent;

use OC\Lock\Persistent\Lock;
use OC\Lock\Persistent\LockManager;
use OC\Lock\Persistent\LockMapper;
use OCP\IUser;
use OCP\IUserSession;
use OCP\Lock\Persistent\ILock;
use Test\TestCase;

/**
 * Class LockManagerTest
 *
 * @package Test\Lock\Persistent
 * @group DB
 */
class LockManagerTest extends TestCase {
	/** @var LockMapper | \PHPUnit_Framework_MockObject_MockObject */
	private $lockMapper;
	/** @var IUserSession | \PHPUnit_Framework_MockObject_MockObject */
	private $userSession;
	/** @var LockManager */
	private $manager;

	public function setUp() {
		parent::setUp();

		$this->lockMapper = $this->createMock(LockMapper::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->manager = new LockManager($this->lockMapper, $this->userSession);

		$user = $this->createMock(IUser::class);
		$user->method('getDisplayName')->willReturn('Alice');
		$user->method('getEmailAddress')->willReturn('alice@example.net');
		$user->method('getAccountId')->willReturn(999);

		$this->userSession->method('isLoggedIn')->willReturn(true);
		$this->userSession->method('getUser')->willReturn($user);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 * @expectedExceptionMessage No token provided in $lockInfo
	 */
	public function testLockNoToken() {
		$this->manager->lock(6, '/foo/bar', 123, []);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 * @expectedExceptionMessage Invalid file id
	 */
	public function testLockInvalidFileId() {
		$this->manager->lock(6, '/foo/bar', -1, []);
	}

	public function testLockInsert() {
		$this->lockMapper->expects($this->once())
			->method('insert')
			->willReturnCallback(function (Lock $lock) {
				$this->assertEquals(30 * 60, $lock->getTimeout());
				$this->assertEquals('qwertzuiopü', $lock->getToken());
				$this->assertEquals(\md5('qwertzuiopü'), $lock->getTokenHash());
				$this->assertEquals(123, $lock->getFileId());
				// path is not set on insert - only set on query
				$this->assertNull($lock->getPath());
				$this->assertEquals(0, $lock->getDepth());
				$this->assertEquals(ILock::LOCK_SCOPE_EXCLUSIVE, $lock->getScope());
				$this->assertEquals('Alice <alice@example.net>', $lock->getOwner());
				$this->assertEquals(999, $lock->getOwnerAccountId());
			});

		$this->manager->lock(6, '/foo/bar', 123, [
			'token' => 'qwertzuiopü',
			'scope' => ILock::LOCK_SCOPE_EXCLUSIVE
		]);
	}

	public function testLockUpdate() {
		$this->lockMapper->expects($this->once())
			->method('getLocksByPath')
			->with(6, '/foo/bar', false)
			->willReturnCallback(function () {
				$lock = new Lock();
				$lock->setToken('qwertzuiopü');
				return [$lock];
			});

		$this->lockMapper->expects($this->once())
			->method('update')
			->willReturnCallback(function (Lock $lock) {
				$this->assertEquals(60 * 60, $lock->getTimeout());
			});

		$this->manager->lock(6, '/foo/bar', 123, [
			'token' => 'qwertzuiopü',
			'scope' => ILock::LOCK_SCOPE_SHARED,
			'timeout' => 60 * 60
		]);
	}

	public function testUnLock() {
		$this->lockMapper->expects($this->once())
			->method('deleteByFileIdAndToken')
			->with(7, '1234567890');

		$this->manager->unlock(7, '1234567890');
	}

	public function testGetLocks() {
		$this->lockMapper->expects($this->once())
			->method('getLocksByPath')
			->with(7, '/foo/bar', false);

		$this->manager->getLocks(7, '/foo/bar', false);
	}
}
