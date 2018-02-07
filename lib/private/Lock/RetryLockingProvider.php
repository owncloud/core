<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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
 *
 */

namespace OC\Lock;

use OCP\Lock\ILockingProvider;
use OCP\Lock\LockedException;

/**
 * Decorator for locking provider that will retry acquire locks
 * a given number of times.
 *
 * When acquireLock() is called, if a LockedException is thrown it will
 * retry as many times as $retries after waiting a delay of $retryDelay (ms)
 * between each tries. If the last try failed, it will forward the exception.
 */
class RetryLockingProvider implements ILockingProvider {
	/**
	 * Wrapped locking provider
	 *
	 * @var ILockingProvider
	 */
	private $provider;

	/**
	 * Retries count
	 *
	 * @var int
	 */
	private $retries;

	/**
	 * Time to wait for between retries in milliseconds
	 *
	 * @var int
	 */
	private $retryDelay;

	/**
	 * Wrap a given locking provider
	 *
	 * @param ILockingProvider $provider provider to wrap
	 * @param int $retries number of retries before giving up
	 * @param int $retryDelay delay to wait between retries, in milliseconds
	 */
	public function __construct($provider, $retries = 5, $retryDelay = 1000) {
		$this->provider = $provider;
		$this->retries = $retries;
		$this->retryDelay = $retryDelay;
	}

	/**
	 * {@inheritdoc}
	 */
	public function isLocked($path, $type) {
		return $this->provider->isLocked($path, $type);
	}

	/**
	 * {@inheritdoc}
	 */
	public function acquireLock($path, $type) {
		return $this->callAndRetry('acquireLock', $path, $type);
	}

	/**
	 * {@inheritdoc}
	 */
	public function changeLock($path, $type) {
		return $this->callAndRetry('changeLock', $path, $type);
	}

	/**
	 * Calls the given locking method with given arguments with
	 * the retry logic.
	 *
	 * @param string $methodName locking method to call
	 * @param string $path path to lock
	 * @param int $type lock type
	 */
	private function callAndRetry($methodName, $path, $type) {
		$lastException = null;
		$tries = $this->retries;
		while ($tries > 0) {
			try {
				return $this->provider->$methodName($path, $type);
			} catch (LockedException $e) {
				$lastException = $e;
				if ($tries > 0) {
					$tries--;
					usleep($this->retryDelay * 1000);
				}
			}
		}
		throw $lastException;
	}

	/**
	 * {@inheritdoc}
	 */
	public function releaseLock($path, $type) {
		return $this->provider->releaseLock($path, $type);
	}

	/**
	 * {@inheritdoc}
	 */
	public function releaseAll() {
		return $this->provider->releaseAll();
	}
}
