<?php

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
 * @since 11.0.0
 */
interface IPersistentLockingStorage {
	/**
	 * @param string $internalPath
	 * @param array $lockInfo
	 * @return mixed
	 * @since 11.0.0
	 */
	public function lockNodePersistent($internalPath, array $lockInfo);

	/**
	 * @param string $internalPath
	 * @param array $lockInfo
	 * @return mixed
	 * @since 11.0.0
	 */
	public function unlockNodePersistent($internalPath, array $lockInfo);

	/**
	 * @param string $internalPath
	 * @param bool $returnChildLocks
	 * @return ILock[]
	 * @since 11.0.0
	 */
	public function getLocks($internalPath, $returnChildLocks = false);
}
