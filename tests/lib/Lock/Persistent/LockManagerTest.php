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
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IUser;
use OCP\IUserSession;
use OCP\IConfig;
use OCP\Lock\Persistent\ILock;
use Test\TestCase;

/**
 * Class LockManagerTest
 *
 * @package Test\Lock\Persistent
 * @group DB
 */
class LockManagerTest extends TestCase {
	/** @var LockMapper | \PHPUnit\Framework\MockObject\MockObject */
	private $lockMapper;
	/** @var IUserSession | \PHPUnit\Framework\MockObject\MockObject */
	private $userSession;
	/** @var LockManager */
	private $manager;
	/** @var ITimeFactory | \PHPUnit\Framework\MockObject\MockObject */
	private $timeFactory;
	/** @var IConfig */
	private $config;
	/** @var IUser | \PHPUnit\Framework\MockObject\MockObject */
	private $user;

	public function setUp(): void {
		parent::setUp();

		$this->lockMapper = $this->createMock(LockMapper::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->config = $this->createMock(IConfig::class);
		$this->manager = new LockManager($this->lockMapper, $this->userSession, $this->timeFactory, $this->config);

		$this->user = $this->createMock(IUser::class);
		$this->user->method('getDisplayName')->willReturn('Alice');
		$this->user->method('getAccountId')->willReturn(999);

		$this->userSession->method('isLoggedIn')->willReturn(true);
		$this->userSession->method('getUser')->willReturn($this->user);

		$this->timeFactory->method('getTime')->willReturn(123456);
	}

	/**
	 */
	public function testLockNoToken() {
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('No token provided in $lockInfo');

		$this->config->method('getAppValue')
			->willReturnMap([
				['core', 'lock_timeout_default', LockManager::LOCK_TIMEOUT_DEFAULT, 120],
				['core', 'lock_timeout_max', LockManager::LOCK_TIMEOUT_MAX, 150],
			]);

		$this->manager->lock(6, '/foo/bar', 123, []);
	}

	/**
	 */
	public function testLockInvalidFileId() {
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage('Invalid file id');

		$this->config->method('getAppValue')
			->willReturnMap([
				['core', 'lock_timeout_default', LockManager::LOCK_TIMEOUT_DEFAULT, 120],
				['core', 'lock_timeout_max', LockManager::LOCK_TIMEOUT_MAX, 150],
			]);

		$this->manager->lock(6, '/foo/bar', -1, []);
	}

	public function testLockInsert() {
		$this->config->method('getAppValue')
			->willReturnMap([
				['core', 'lock_timeout_default', LockManager::LOCK_TIMEOUT_DEFAULT, LockManager::LOCK_TIMEOUT_DEFAULT],
				['core', 'lock_timeout_max', LockManager::LOCK_TIMEOUT_MAX, LockManager::LOCK_TIMEOUT_MAX],
			]);

		$this->lockMapper->method('getLocksByPath')->willReturn([]);
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
				$this->assertEquals('Alice', $lock->getOwner());
				$this->assertEquals(999, $lock->getOwnerAccountId());
				$this->assertEquals(123456, $lock->getCreatedAt());
			});

		$lock = $this->manager->lock(6, '/foo/bar', 123, [
			'token' => 'qwertzuiopü',
			'scope' => ILock::LOCK_SCOPE_EXCLUSIVE
		]);

		$this->assertNotNull($lock);
		$this->assertEquals('Alice', $lock->getOwner());
	}

	public function testLockInsertWithEmail() {
		$this->user->method('getEmailAddress')->willReturn('alice@example.net');

		$this->config->method('getAppValue')
			->willReturnMap([
				['core', 'lock_timeout_default', LockManager::LOCK_TIMEOUT_DEFAULT, LockManager::LOCK_TIMEOUT_DEFAULT],
				['core', 'lock_timeout_max', LockManager::LOCK_TIMEOUT_MAX, LockManager::LOCK_TIMEOUT_MAX],
			]);

		$this->lockMapper->method('getLocksByPath')->willReturn([]);
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
				$this->assertEquals('Alice (alice@example.net)', $lock->getOwner());
				$this->assertEquals(999, $lock->getOwnerAccountId());
				$this->assertEquals(123456, $lock->getCreatedAt());
			});

		$lock = $this->manager->lock(6, '/foo/bar', 123, [
			'token' => 'qwertzuiopü',
			'scope' => ILock::LOCK_SCOPE_EXCLUSIVE
		]);

		$this->assertNotNull($lock);
		$this->assertEquals('Alice (alice@example.net)', $lock->getOwner());
	}

	public function testLockInsertWithEmailIsEmptyString() {
		$this->user->method('getEmailAddress')->willReturn('');

		$this->config->method('getAppValue')
			->willReturnMap([
				['core', 'lock_timeout_default', LockManager::LOCK_TIMEOUT_DEFAULT, LockManager::LOCK_TIMEOUT_DEFAULT],
				['core', 'lock_timeout_max', LockManager::LOCK_TIMEOUT_MAX, LockManager::LOCK_TIMEOUT_MAX],
			]);

		$this->lockMapper->method('getLocksByPath')->willReturn([]);
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
				$this->assertEquals('Alice', $lock->getOwner());
				$this->assertEquals(999, $lock->getOwnerAccountId());
				$this->assertEquals(123456, $lock->getCreatedAt());
			});

		$lock = $this->manager->lock(6, '/foo/bar', 123, [
			'token' => 'qwertzuiopü',
			'scope' => ILock::LOCK_SCOPE_EXCLUSIVE
		]);

		$this->assertNotNull($lock);
		$this->assertEquals('Alice', $lock->getOwner());
	}

	public function testLockUpdate() {
		$this->config->method('getAppValue')
			->willReturnMap([
				['core', 'lock_timeout_default', LockManager::LOCK_TIMEOUT_DEFAULT, LockManager::LOCK_TIMEOUT_DEFAULT],
				['core', 'lock_timeout_max', LockManager::LOCK_TIMEOUT_MAX, LockManager::LOCK_TIMEOUT_MAX],
			]);

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

	public function lockTimeoutProvider() {
		return [
			// default value
			[null, LockManager::LOCK_TIMEOUT_DEFAULT, LockManager::LOCK_TIMEOUT_MAX, 1800],
			// given value
			[10, LockManager::LOCK_TIMEOUT_DEFAULT, LockManager::LOCK_TIMEOUT_MAX, 10],
			// given value higher than default
			[2000, LockManager::LOCK_TIMEOUT_DEFAULT, LockManager::LOCK_TIMEOUT_MAX, 2000],
			// max value 1 day
			[2*60*60*24, LockManager::LOCK_TIMEOUT_DEFAULT, LockManager::LOCK_TIMEOUT_MAX, 60*60*24],
			// max value 1 day, not infinite
			[-1, LockManager::LOCK_TIMEOUT_DEFAULT, LockManager::LOCK_TIMEOUT_MAX, 60*60*24],

			// with a negative default value (shouldn't happen)
			// default value
			[null, -1, LockManager::LOCK_TIMEOUT_MAX, 60*60*24],
			// given value
			[10, -1, LockManager::LOCK_TIMEOUT_MAX, 10],
			// given value higher than default
			[2000, -1, LockManager::LOCK_TIMEOUT_MAX, 2000],
			// max value 1 day
			[2*60*60*24, -1, LockManager::LOCK_TIMEOUT_MAX, 60*60*24],
			// max value 1 day, not infinite
			[-1, -1, LockManager::LOCK_TIMEOUT_MAX, 60*60*24],

			// with a negative max value (shouldn't happen) should be a max of 1 day
			// default value
			[null, LockManager::LOCK_TIMEOUT_DEFAULT, -1, 1800],
			// given value
			[10, LockManager::LOCK_TIMEOUT_DEFAULT, -1, 10],
			// given value higher than default
			[2000, LockManager::LOCK_TIMEOUT_DEFAULT, -1, 2000],
			// max value 1 day
			[2*60*60*24, LockManager::LOCK_TIMEOUT_DEFAULT, -1, 60*60*24],
			// max value 1 day, not infinite
			[-1, LockManager::LOCK_TIMEOUT_DEFAULT, -1, 60*60*24],

			// with a negative default value and also negative maximum (shouldn't happen)
			// default value
			[null, -1, -1, 60*60*24],
			// given value
			[10, -1, -1, 10],
			// given value higher than default
			[2000, -1, -1, 2000],
			// max value 1 day
			[2*60*60*24, -1, -1, 60*60*24],
			// max value 1 day, not infinite
			[-1, -1, -1, 60*60*24],
		];
	}

	/**
	 * @dataProvider lockTimeoutProvider
	 */
	public function testLockTimeout($givenTimeout, $default, $max, $expectedTimeout) {
		$this->config->method('getAppValue')
			->willReturnMap([
				['core', 'lock_timeout_default', LockManager::LOCK_TIMEOUT_DEFAULT, $default],
				['core', 'lock_timeout_max', LockManager::LOCK_TIMEOUT_MAX, $max],
			]);

		$this->lockMapper->method('getLocksByPath')->willReturn([]);
		$lockInfo = [
			'token' => 'qwertzuiopü',
			'scope' => ILock::LOCK_SCOPE_EXCLUSIVE,
		];
		if ($givenTimeout !== null) {
			$lockInfo['timeout'] = $givenTimeout;
		}
		$lock = $this->manager->lock(6, '/foo/bar', 123, $lockInfo);

		$this->assertEquals($expectedTimeout, $lock->getTimeout());
	}
}
