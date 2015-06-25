<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OC\Lock;

use OCP\Lock\ILockingProvider;
use OCP\Lock\LockedException;
use OCP\IMemcache;

class MemcacheLockingProvider implements ILockingProvider {
	/**
	 * @var \OCP\IMemcache
	 */
	private $memcache;

	private $acquiredLocks = [
		'memcache' => [
			'shared' => [],
			'exclusive' => [],
		],
		// Local locks are used, when we already have an exclusive lock
		'local' => [
			'shared' => [],
			'exclusive' => [],
		],
	];

	/**
	 * @param \OCP\IMemcache $memcache
	 */
	public function __construct(IMemcache $memcache) {
		$this->memcache = $memcache;
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
		} else if ($type === self::LOCK_EXCLUSIVE) {
			return $lockValue === 'exclusive';
		} else {
			return false;
		}
	}

	/**
	 * @param string $path
	 * @param int $type self::LOCK_SHARED or self::LOCK_EXCLUSIVE
	 * @throws \OCP\Lock\LockedException
	 */
	public function acquireLock($path, $type) {
		if (isset($this->acquiredLocks['memcache']['exclusive'][$path])) {
			$this->acquireLocalLock($path, $type);
			return;
		}

		if ($type === self::LOCK_SHARED) {
			if (!$this->memcache->inc($path)) {
				throw new LockedException($path);
			}
			if (!isset($this->acquiredLocks['memcache']['shared'][$path])) {
				$this->acquiredLocks['memcache']['shared'][$path] = 0;
			}
			$this->acquiredLocks['memcache']['shared'][$path]++;
		} else {
			$this->memcache->add($path, 0);
			if (!$this->memcache->cas($path, 0, 'exclusive')) {
				throw new LockedException($path);
			}
			$this->acquiredLocks['memcache']['exclusive'][$path] = true;
		}
	}

	/**
	 * @param string $path
	 * @param int $type self::LOCK_SHARED or self::LOCK_EXCLUSIVE
	 */
	protected function acquireLocalLock($path, $type) {
		if ($type === self::LOCK_SHARED) {
			if (!isset($this->acquiredLocks['local']['shared'][$path])) {
				$this->acquiredLocks['local']['shared'][$path] = 0;
			}
			$this->acquiredLocks['local']['shared'][$path]++;
		} else {
			if (!isset($this->acquiredLocks['local']['exclusive'][$path])) {
				$this->acquiredLocks['local']['exclusive'][$path] = 0;
			}
			$this->acquiredLocks['local']['exclusive'][$path]++;
		}
	}

	/**
	 * @param string $path
	 * @param int $type self::LOCK_SHARED or self::LOCK_EXCLUSIVE
	 * @param bool $ignoreLocalLocks Release the memcache locks directly
	 */
	public function releaseLock($path, $type, $ignoreLocalLocks = false) {
		if (isset($this->acquiredLocks['memcache']['exclusive'][$path]) && !$ignoreLocalLocks) {
			// If we acquired locks while we had an exclusive lock we have to unlock them
			// Only if we didn't have a sub-lock, we release the real memcache lock
			if ($this->releaseLocalLock($path, $type)) {
				return;
			}
		}

		if ($type === self::LOCK_SHARED) {
			if (isset($this->acquiredLocks['memcache']['shared'][$path]) and $this->acquiredLocks['memcache']['shared'][$path] > 0) {
				$this->memcache->dec($path);
				$this->acquiredLocks['memcache']['shared'][$path]--;
				$this->memcache->cad($path, 0);
			}
		} else if ($type === self::LOCK_EXCLUSIVE) {
			if (!$ignoreLocalLocks) {
				if ((isset($this->acquiredLocks['local']['shared'][$path]) && $this->acquiredLocks['local']['shared'][$path] > 0)
				 || (isset($this->acquiredLocks['local']['exclusive'][$path]) && $this->acquiredLocks['local']['exclusive'][$path] > 0)) {
					// Can not unlock the exclusive lock, when we still have local share locks
					throw new LockedException($path);
				}
			}
			$this->memcache->cad($path, 'exclusive');
			unset($this->acquiredLocks['local']['shared'][$path]);
			unset($this->acquiredLocks['local']['exclusive'][$path]);
			unset($this->acquiredLocks['memcache']['exclusive'][$path]);
		}
	}

	/**
	 * @param string $path
	 * @param int $type self::LOCK_SHARED or self::LOCK_EXCLUSIVE
	 * @return bool True if a local lock was released, false otherwise
	 */
	protected function releaseLocalLock($path, $type) {
		if ($type === self::LOCK_SHARED) {
			if (isset($this->acquiredLocks['local']['shared'][$path]) && $this->acquiredLocks['local']['shared'][$path] > 0) {
				$this->acquiredLocks['local']['shared'][$path]--;
				return true;
			}
			unset($this->acquiredLocks['local']['shared'][$path]);
		} else {
			if (isset($this->acquiredLocks['local']['exclusive'][$path]) && $this->acquiredLocks['local']['exclusive'][$path] > 0) {
				$this->acquiredLocks['local']['exclusive'][$path]--;
				return true;
			}
			unset($this->acquiredLocks['local']['exclusive'][$path]);
		}
		return false;
	}

	/**
	 * Change the type of an existing lock
	 *
	 * @param string $path
	 * @param int $targetType self::LOCK_SHARED or self::LOCK_EXCLUSIVE
	 * @throws \OCP\Lock\LockedException
	 */
	public function changeLock($path, $targetType) {
		if (isset($this->acquiredLocks['memcache']['exclusive'][$path])) {
			// If we acquired locks while we had an exclusive lock we have to unlock them
			// Only if we didn't have a sub-lock, we release the real memcache lock
			if ($this->changeLocalLock($path, $targetType)) {
				return;
			}
		}

		if ($targetType === self::LOCK_SHARED) {
			if ((isset($this->acquiredLocks['local']['shared'][$path]) && $this->acquiredLocks['local']['shared'][$path] > 0)
				|| (isset($this->acquiredLocks['local']['exclusive'][$path]) && $this->acquiredLocks['local']['exclusive'][$path] > 0)) {
				// Can not change the exclusive lock, when we still have local locks
				throw new LockedException($path);
			}

			if (!$this->memcache->cas($path, 'exclusive', 1)) {
				throw new LockedException($path);
			}
			unset($this->acquiredLocks['memcache']['exclusive'][$path]);
			if (!isset($this->acquiredLocks['memcache']['shared'][$path])) {
				$this->acquiredLocks['memcache']['shared'][$path] = 0;
			}
			$this->acquiredLocks['memcache']['shared'][$path]++;
		} else if ($targetType === self::LOCK_EXCLUSIVE) {
			// we can only change a shared lock to an exclusive if there's only a single owner of the shared lock
			if (!$this->memcache->cas($path, 1, 'exclusive')) {
				throw new LockedException($path);
			}
			$this->acquiredLocks['memcache']['exclusive'][$path] = true;
			$this->acquiredLocks['memcache']['shared'][$path]--;
		}
	}

	/**
	 * Change the type of an existing local lock
	 *
	 * @param string $path
	 * @param int $targetType self::LOCK_SHARED or self::LOCK_EXCLUSIVE
	 * @return bool True if a local lock was changed, false otherwise
	 */
	protected function changeLocalLock($path, $targetType) {
		if ($targetType === self::LOCK_SHARED) {
			if (isset($this->acquiredLocks['local']['exclusive'][$path]) && $this->acquiredLocks['local']['exclusive'][$path] > 0) {
				if (!isset($this->acquiredLocks['local']['shared'][$path])) {
					$this->acquiredLocks['local']['shared'][$path] = 0;
				}
				$this->acquiredLocks['local']['shared'][$path]++;
				$this->acquiredLocks['local']['exclusive'][$path]--;
				return true;
			}

		} else if ($targetType === self::LOCK_EXCLUSIVE) {
			if (isset($this->acquiredLocks['local']['shared'][$path]) && $this->acquiredLocks['local']['shared'][$path] > 0) {
				if (!isset($this->acquiredLocks['local']['exclusive'][$path])) {
					$this->acquiredLocks['local']['exclusive'][$path] = 0;
				}
				$this->acquiredLocks['local']['exclusive'][$path]++;
				$this->acquiredLocks['local']['shared'][$path]--;
				return true;
			}
		}
		return false;
	}

	/**
	 * release all lock acquired by this instance
	 */
	public function releaseAll() {
		foreach ($this->acquiredLocks['memcache']['shared'] as $path => $count) {
			for ($i = 0; $i < $count; $i++) {
				$this->releaseLock($path, self::LOCK_SHARED, true);
			}
		}

		foreach ($this->acquiredLocks['memcache']['exclusive'] as $path => $hasLock) {
			$this->releaseLock($path, self::LOCK_EXCLUSIVE, true);
		}
	}
}
