<?php
/**
 * @author Markus Goetz <markus@woboq.com>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OC\Lock;

use OCP\IMemcacheTTL;
use OCP\Lock\LockedException;
use OCP\IMemcache;

class MemcacheLockingProvider extends AbstractLockingProvider {
	/**
	 * @var \OCP\IMemcache
	 */
	private $memcache;

	/**
	 * @param \OCP\IMemcache $memcache
	 * @param int $ttl
	 */
	public function __construct(IMemcache $memcache, $ttl = 3600) {
		$this->memcache = $memcache;
		$this->ttl = $ttl;
	}

	private function setTTL($path) {
		if ($this->memcache instanceof IMemcacheTTL) {
			$this->memcache->setTTL($path, $this->ttl);
		}
	}

	/**
	 * @param string $path
	 * @param int $type self::LOCK_SHARED or self::LOCK_EXCLUSIVE
	 * @return bool
	 */
	public function isLocked($path, $type) {
		$lockValue = $this->memcache->get($path);
		if ($type === self::LOCK_SHARED) {
			return $lockValue > 0;
		}

		if ($type === self::LOCK_EXCLUSIVE) {
			return $lockValue === 'exclusive';
		}

		return false;
	}

	/**
	 * @param string $path
	 * @param int $type self::LOCK_SHARED or self::LOCK_EXCLUSIVE
	 * @throws \InvalidArgumentException
	 * @throws \OCP\Lock\LockedException
	 */
	public function acquireLock($path, $type) {
		if (\strlen($path) > 64) { // max length in file_locks
			throw new \InvalidArgumentException('Lock key length too long');
		}
		if ($type === self::LOCK_SHARED) {
			if ($this->memcache->inc($path) === false) {
				// "inc" will return false if the key has "exclusive" (or a non-integer) as value
				throw new LockedException($path);
			}
		} else {
			$this->memcache->add($path, 0);
			// (wrongly-named) "add" will set a 0 if the key doesn't exists
			// in case a shared lock is acquired exactly at this time, this exclusive lock will
			// return a LockedException, which is fine.
			if (!$this->memcache->cas($path, 0, 'exclusive')) {
				throw new LockedException($path);
			}
		}
		$this->setTTL($path);
		$this->markAcquire($path, $type);
	}

	/**
	 * @param string $path
	 * @param int $type self::LOCK_SHARED or self::LOCK_EXCLUSIVE
	 */
	public function releaseLock($path, $type) {
		if (!$this->hasAcquiredLock($path, $type)) {
			\OCP\Util::writeLog('core', "ignoring lock release with type $type for $path. Lock hasn't been acquired before", \OCP\Util::WARN);
			return;
		}

		if ($type === self::LOCK_SHARED) {
			$this->memcache->dec($path);
			$this->memcache->cad($path, 0);  // remove only if there is no more
		} elseif ($type === self::LOCK_EXCLUSIVE) {
			$this->memcache->cad($path, 'exclusive');
		}
		$this->markRelease($path, $type);
	}

	/**
	 * Change the type of an existing lock
	 *
	 * @param string $path
	 * @param int $targetType self::LOCK_SHARED or self::LOCK_EXCLUSIVE
	 * @throws \OCP\Lock\LockedException
	 */
	public function changeLock($path, $targetType) {
		if ($targetType === self::LOCK_SHARED) {
			if (!$this->hasAcquiredLock($path, self::LOCK_EXCLUSIVE)) {
				// trying to change a lock that we haven't acquired -> throw exception
				\OCP\Util::writeLog('core', "trying lock change to type $targetType for $path, but the lock hasn't been acquired before!!", \OCP\Util::WARN);
				throw new LockedException($path);
			}
			if (!$this->memcache->cas($path, 'exclusive', 1)) {
				throw new LockedException($path);
			}
		} elseif ($targetType === self::LOCK_EXCLUSIVE) {
			if (!$this->hasAcquiredLock($path, self::LOCK_SHARED)) {
				// trying to change a lock that we haven't acquired -> throw exception
				\OCP\Util::writeLog('core', "trying lock change to type $targetType for $path, but the lock hasn't been acquired before!!", \OCP\Util::WARN);
				throw new LockedException($path);
			}
			// we can only change a shared lock to an exclusive if there's only a single owner of the shared lock
			if (!$this->memcache->cas($path, 1, 'exclusive')) {
				throw new LockedException($path);
			}
		}
		$this->setTTL($path);
		$this->markChange($path, $targetType);
	}
}
