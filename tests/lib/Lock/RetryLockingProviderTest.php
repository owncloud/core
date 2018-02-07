<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace Test\Lock;

use OC\Lock\RetryLockingProvider;
use OCP\Lock\ILockingProvider;
use Test\TestCase;
use OCP\Lock\LockedException;

/**
 * Class DBLockingProvider
 *
 * @group DB
 *
 * @package Test\Lock
 */
class RetryLockingProviderTest extends TestCase {

	/**
	 * Instance to be tested
	 *
	 * @var RetryLockingProviderTest
	 */
	private $instance;

	/**
	 * Wrapped provider
	 *
	 * @var ILockingProvider
	 */
	private $provider;

	public function setUp() {
		parent::setUp();

		$this->provider = $this->createMock(ILockingProvider::class);
		$this->instance = new RetryLockingProvider($this->provider, 4, 1);
	}

	public function tearDown() {
		parent::tearDown();
	}

	public function testIsLocked() {
		$this->provider->expects($this->once())
			->method('isLocked')
			->with('abc', ILockingProvider::LOCK_EXCLUSIVE)
			->willReturn(true);
		$this->assertTrue($this->instance->isLocked('abc', ILockingProvider::LOCK_EXCLUSIVE));
	}

	public function retriedNethodNameProvider() {
		return [
			['acquireLock'],
			['changeLock'],
		];
	}

	/**
	 * @dataProvider retriedNethodNameProvider
	 */
	public function testLockSuccess($methodName) {
		$this->provider->expects($this->once())
			->method($methodName)
			->with('abc', ILockingProvider::LOCK_EXCLUSIVE)
			->willReturn(true);
		$this->assertTrue($this->instance->$methodName('abc', ILockingProvider::LOCK_EXCLUSIVE));
	}

	/**
	 * @dataProvider retriedNethodNameProvider
	 */
	public function testLockRetrySuccess($methodName) {
		$this->provider->expects($this->at(0))
			->method($methodName)
			->with('abc', ILockingProvider::LOCK_EXCLUSIVE)
			->will($this->throwException(new LockedException('one')));
		$this->provider->expects($this->at(1))
			->method($methodName)
			->with('abc', ILockingProvider::LOCK_EXCLUSIVE)
			->will($this->throwException(new LockedException('two')));
		$this->provider->expects($this->at(2))
			->method($methodName)
			->with('abc', ILockingProvider::LOCK_EXCLUSIVE)
			->will($this->throwException(new LockedException('three')));
		$this->provider->expects($this->at(3))
			->method($methodName)
			->with('abc', ILockingProvider::LOCK_EXCLUSIVE)
			->willReturn(true);
		$this->assertTrue($this->instance->$methodName('abc', ILockingProvider::LOCK_EXCLUSIVE));
	}

	/**
	 * @dataProvider retriedNethodNameProvider
	 * @expectedException \OCP\Lock\LockedException
	 */
	public function testLockRetryFail($methodName) {
		$this->provider->expects($this->at(0))
			->method($methodName)
			->with('abc', ILockingProvider::LOCK_EXCLUSIVE)
			->will($this->throwException(new LockedException('one')));
		$this->provider->expects($this->at(1))
			->method($methodName)
			->with('abc', ILockingProvider::LOCK_EXCLUSIVE)
			->will($this->throwException(new LockedException('two')));
		$this->provider->expects($this->at(2))
			->method($methodName)
			->with('abc', ILockingProvider::LOCK_EXCLUSIVE)
			->will($this->throwException(new LockedException('three')));
		$this->provider->expects($this->at(3))
			->method($methodName)
			->with('abc', ILockingProvider::LOCK_EXCLUSIVE)
			->will($this->throwException(new LockedException('three')));
		$this->instance->$methodName('abc', ILockingProvider::LOCK_EXCLUSIVE);
	}

	public function testReleaseLock() {
		$this->provider->expects($this->once())
			->method('releaseLock')
			->with('abc', ILockingProvider::LOCK_EXCLUSIVE)
			->willReturn(true);
		$this->assertTrue($this->instance->releaseLock('abc', ILockingProvider::LOCK_EXCLUSIVE));
	}

	public function testReleaseAll() {
		$this->provider->expects($this->once())
			->method('releaseAll')
			->willReturn(true);
		$this->assertTrue($this->instance->releaseAll());
	}
}
