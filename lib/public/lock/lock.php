<?php
/**
 * @author Robin McCorkell <rmccorkell@owncloud.com>
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

namespace OCP\Lock;

/**
 * Stateful lock object
 * Keep in scope to hold the lock
 *
 * @package OCP\Lock
 * @since 8.2.0
 */
class Lock {

	/** @var ILockingProvider */
	private $provider;

	/** @var string */
	private $path;

	/** @var int */
	private $type;

	/**
	 * @param ILockingProvider $provider
	 * @param string $path
	 * @param int $type ILockingProvider::LOCK_SHARED or ILockingProvider::LOCK_EXCLUSIVE
	 * @throws \OCP\Lock\LockedException
	 * @since 8.2.0
	 */
	public function __construct(ILockingProvider $provider, $path, $type) {
		$this->provider = $provider;
		$this->path = $path;
		$this->type = $type;

		$this->provider->acquireLock($this->path, $this->type);
	}

	/**
	 * @since 8.2.0
	 */
	public function __destruct() {
		$this->provider->releaseLock($this->path, $this->type);
	}

	/**
	 * Change the type of the lock
	 *
	 * @param int $targetType ILockingProvider::LOCK_SHARED or ILockingProvider::LOCK_EXCLUSIVE
	 * @throws \OCP\Lock\LockedException
	 * @since 8.2.0
	 */
	public function change($targetType) {
		$this->provider->changeLock($this->path, $targetType);
		$this->type = $targetType;
	}

}
