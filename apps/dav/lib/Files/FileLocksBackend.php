<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Files;

use OCA\DAV\Connector\Sabre\Node;
use OCP\Files\Storage\IPersistentLockingStorage;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\Locks;
use Sabre\DAV\Locks\Backend\BackendInterface;
use Sabre\DAV\Tree;

class FileLocksBackend implements BackendInterface {

	/** @var Tree */
	private $tree;
	/** @var bool */
	private $useV1;

	public function __construct($tree, $useV1) {
		$this->tree = $tree;
		$this->useV1 = $useV1;
	}

	/**
	 * Returns a list of Sabre\DAV\Locks\LockInfo objects
	 *
	 * This method should return all the locks for a particular uri, including
	 * locks that might be set on a parent uri.
	 *
	 * If returnChildLocks is set to true, this method should also look for
	 * any locks in the subtree of the uri for locks.
	 *
	 * @param string $uri
	 * @param bool $returnChildLocks
	 * @return array
	 */
	public function getLocks($uri, $returnChildLocks) {
		try {
			$node = $this->tree->getNodeForPath($uri);
		} catch (NotFound $e) {
			return [];
		}
		if (!$node instanceof Node) {
			return [];
		}

		$storage = $node->getFileInfo()->getStorage();
		if (!$storage->instanceOfStorage(IPersistentLockingStorage::class)) {
			return [];
		}

		/** @var IPersistentLockingStorage $storage */
		$locks = $storage->getLocks($node->getFileInfo()->getInternalPath(), $returnChildLocks);

		$davLocks = [];
		foreach ($locks as $lock) {
			$lockInfo = new Locks\LockInfo();
			$fileName = $lock->getGlobalFileName();

			if ($this->useV1) {
				$lockInfo->uri = $fileName;
			} else {
				$uid = $lock->getGlobalUserId();
				$lockInfo->uri = "files/$uid/$fileName";
			}
			$lockInfo->token = $lock->getToken();
			$lockInfo->created = $lock->getTimeout();
			$lockInfo->depth = $lock->getDepth();
			$lockInfo->owner = $lock->getOwner();
			$lockInfo->scope = $lock->getScope();
			$lockInfo->timeout = $lock->getTimeout();

			$davLocks[] = $lockInfo;
		}
		return $davLocks;
	}

	/**
	 * Locks a uri
	 *
	 * @param string $uri
	 * @param Locks\LockInfo $lockInfo
	 * @return bool
	 */
	public function lock($uri, Locks\LockInfo $lockInfo) {
		try {
			$node = $this->tree->getNodeForPath($uri);
		} catch (NotFound $e) {
			return false;
		}
		if (!$node instanceof Node) {
			return false;
		}

		$storage = $node->getFileInfo()->getStorage();
		if (!$storage->instanceOfStorage(IPersistentLockingStorage::class)) {
			return false;
		}

		/** @var IPersistentLockingStorage $storage */
		return $storage->lockNodePersistent($node->getFileInfo()->getInternalPath(), [
			'token' => $lockInfo->token,
			'scope' => $lockInfo->scope,
			'depth' => $lockInfo->depth,
			'owner' => $lockInfo->owner
		]);
	}

	/**
	 * Removes a lock from a uri
	 *
	 * @param string $uri
	 * @param Locks\LockInfo $lockInfo
	 * @return bool
	 */
	public function unlock($uri, Locks\LockInfo $lockInfo) {
		try {
			$node = $this->tree->getNodeForPath($uri);
		} catch (NotFound $e) {
			return false;
		}
		if (!$node instanceof Node) {
			return false;
		}

		$storage = $node->getFileInfo()->getStorage();
		if (!$storage->instanceOfStorage(IPersistentLockingStorage::class)) {
			return false;
		}

		/** @var IPersistentLockingStorage $storage */
		return $storage->unlockNodePersistent($node->getFileInfo()->getInternalPath(), [
			'token' => $lockInfo->token
		]);
	}
}
