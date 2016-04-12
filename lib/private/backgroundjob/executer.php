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

namespace OC\BackgroundJob;

use OCP\BackgroundJob\IJob;
use OCP\BackgroundJob\IJobList;
use OCP\ILogger;
use OCP\Lock\ILockingProvider;
use OCP\Lock\LockedException;

/**
 * Concurrency aware job executer
 */
class Executer {
	/** @var ILockingProvider */
	private $lockingProvider;

	/** @var IJobList */
	private $jobList;

	/** @var ILogger  */
	private $logger;

	/** how long until we give up trying to get the lock for getting a new job in seconds */
	const LOCK_TIMEOUT = 5;

	/** how long we sleep after each failed attempt to get exclusive access to the job list in seconds */
	const LOCK_SLEEP_TIME = 0.015;

	/**
	 * @param ILockingProvider $lockingProvider
	 * @param IJobList $jobList
	 * @param ILogger $logger
	 */
	public function __construct(ILockingProvider $lockingProvider, IJobList $jobList, ILogger $logger = null) {
		$this->lockingProvider = $lockingProvider;
		$this->jobList = $jobList;
		$this->logger = $logger;
	}

	/**
	 * Get the next job from the joblist and execute it
	 *
	 * Locking is used to allow multiple processes using the method in parallel for parallel job execution
	 *
	 * @return bool returns whether or not a job has been executed
	 */
	public function executeNextJob() {
		$job = $this->getNextJob();
		if ($job) {
			try {
				$this->runJob($job);
			} catch (LockedException $e) {
				return false;
			}
			return true;
		} else {
			return false;
		}
	}

	public function getNextJob() {
		$timeWaited = 0;
		while ($timeWaited < self::LOCK_TIMEOUT) {
			try {
				$this->lockingProvider->acquireLock('joblist', ILockingProvider::LOCK_EXCLUSIVE);

				$job = $this->jobList->getNext();

				if ($job) {
					$this->jobList->setLastJob($job);
				}

				$this->lockingProvider->releaseLock('joblist', ILockingProvider::LOCK_EXCLUSIVE);
				return $job;
			} catch (LockedException $e) {
				usleep(self::LOCK_SLEEP_TIME * 1000 * 1000);
				$timeWaited += self::LOCK_SLEEP_TIME;
			}
		}

		return null;
	}

	public function runJob(IJob $job) {
		$this->lockingProvider->acquireLock('job/' . $job->getId(), ILockingProvider::LOCK_EXCLUSIVE);

		$job->execute($this->jobList, $this->logger);

		$this->lockingProvider->releaseLock('job/' . $job->getId(), ILockingProvider::LOCK_EXCLUSIVE);
	}
}
