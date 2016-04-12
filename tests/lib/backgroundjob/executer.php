<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

namespace Test\BackgroundJob;

use OC\Lock\MemcacheLockingProvider;
use OC\Memcache\ArrayCache;
use OCP\Lock\ILockingProvider;
use Test\TestCase;

class Executer extends TestCase {
	public function testNoJob() {
		$lockingProvider = new MemcacheLockingProvider(new ArrayCache());
		$jobList = $this->getMock('\OCP\BackgroundJob\IJobList');
		$jobList->expects($this->once())
			->method('getNext')
			->will($this->returnValue(null));

		$jobList->expects($this->never())
			->method('setLastJob');

		$executer = new \OC\BackgroundJob\Executer($lockingProvider, $jobList);

		$this->assertFalse($executer->executeNextJob());
	}

	public function testRunJob() {
		$lockingProvider = new MemcacheLockingProvider(new ArrayCache());

		$job = $this->getMock('\OCP\BackgroundJob\IJob');

		$jobList = $this->getMock('\OCP\BackgroundJob\IJobList');
		$jobList->expects($this->once())
			->method('getNext')
			->will($this->returnValue($job));

		$jobList->expects($this->once())
			->method('setLastJob')
			->with($job);

		$job->expects($this->once())
			->method('execute')
			->with($jobList);

		$executer = new \OC\BackgroundJob\Executer($lockingProvider, $jobList);

		$this->assertTrue($executer->executeNextJob());
	}

	public function testLocked() {
		$lockingProvider = new MemcacheLockingProvider(new ArrayCache());

		$jobList = $this->getMock('\OCP\BackgroundJob\IJobList');
		$jobList->expects($this->never())
			->method('getNext');

		$jobList->expects($this->never())
			->method('setLastJob');

		$executer = new \OC\BackgroundJob\Executer($lockingProvider, $jobList);

		$lockingProvider->acquireLock('joblist', ILockingProvider::LOCK_EXCLUSIVE);

		$this->assertFalse($executer->executeNextJob());
	}

	public function testJobLocked() {
		$lockingProvider = new MemcacheLockingProvider(new ArrayCache());

		$job = $this->getMock('\OCP\BackgroundJob\IJob');
		$job->method('getId')
			->will($this->returnValue(1));

		$jobList = $this->getMock('\OCP\BackgroundJob\IJobList');
		$jobList->expects($this->once())
			->method('getNext')
			->will($this->returnValue($job));

		$jobList->expects($this->once())
			->method('setLastJob')
			->with($job);

		$job->expects($this->never())
			->method('execute');

		$lockingProvider->acquireLock('job/1', ILockingProvider::LOCK_EXCLUSIVE);

		$executer = new \OC\BackgroundJob\Executer($lockingProvider, $jobList);

		$this->assertFalse($executer->executeNextJob());
	}
}
