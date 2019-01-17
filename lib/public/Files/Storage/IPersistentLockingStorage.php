<?php
declare(strict_types=1);
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
 */

namespace OCP\Files\Storage;

use OCP\Lock\Persistent\ILock;

/**
 * Interface IPersistentLockingStorage
 *
 * @package OCP\Files\Storage
 * @since 10.1.0
 */
interface IPersistentLockingStorage {
	/**
	 * Acquire or refresh a persistent lock on the given internal path.
	 *
	 * If lockinfo is passed with an existing token, the matching lock will be refreshed.
	 *
	 * Note: it is the responsibility of the caller to enforce lock uniqueness in case
	 * of exclusive locks.
	 *
	 * @param string $internalPath
	 * @param array $lockInfo
	 * @return ILock newly created lock
	 * @since 10.1.0
	 */
	public function lockNodePersistent(string $internalPath, array $lockInfo);

	/**
	 * @param string $internalPath storage internal path to query
	 * @param array $lockInfo
	 * @return bool true if the lock was deleted, false if no such lock existed
	 * @since 10.1.0
	 */
	public function unlockNodePersistent(string $internalPath, array $lockInfo);

	/**
	 * Returns the direct locks from the given internal path and also indirect locks
	 * that exist on any parents.
	 *
	 * @param string $internalPath storage internal path to query
	 * @param bool $returnChildLocks whether to also return locks that exist on any
	 * child paths
	 * @return ILock[]
	 * @since 10.1.0
	 */
	public function getLocks(string $internalPath, bool $returnChildLocks = false) : array;
}
