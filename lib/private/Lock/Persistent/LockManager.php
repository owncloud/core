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

namespace OC\Lock\Persistent;

use OCP\IUserSession;

class LockManager {

	/** @var LockMapper */
	private $lockMapper;

	/** @var IUserSession */
	private $userSession;

	public function __construct(LockMapper $lockMapper,
								IUserSession $userSession) {
		$this->lockMapper = $lockMapper;
		$this->userSession = $userSession;
	}

	public function lock(int $storageId, string $internalPath, int $fileId, array $lockInfo) : bool {
		if ($fileId <= 0) {
			throw new \InvalidArgumentException();
		}
		// We're making the lock timeout 30 minutes
		$timeout = 30*60;
		if (isset($lockInfo['timeout'])) {
			$timeout = $lockInfo['timeout'];
		}
		$owner = $lockInfo['owner'] ?? null;
		if ($owner === null && $this->userSession->isLoggedIn()) {
			$user = $this->userSession->getUser();
			if ($user !== null) {
				$owner = $user->getDisplayName();
				if ($user->getEMailAddress() !== null) {
					$owner .= " <{$user->getEMailAddress()}>";
				}
			}
		}

		$locks = $this->lockMapper->getLocksByPath($storageId, $internalPath, false);
		$exists = false;
		foreach ($locks as $lock) {
			if ($lock->getToken() === $lockInfo['token']) {
				$exists = true;
				$lock->setCreatedAt(\time());
				$lock->setTimeout($timeout);
				$lock->setOwner($owner);
				$this->lockMapper->update($lock);
			}
		}

		if ($exists) {
			return true;
		}

		$lock = new Lock();
		$lock->setFileId($fileId);
		$lock->setCreatedAt(\time());
		$lock->setTimeout($timeout);
		$lock->setOwner($owner);
		$lock->setToken($lockInfo['token']);
		$lock->setScope($lockInfo['scope']);
		$lock->setDepth($lockInfo['depth']);

		if ($this->userSession->isLoggedIn()) {
			$user = $this->userSession->getUser();
			if ($user !== null) {
				$lock->setOwnerAccountId($user->getAccountId());
			}
		}
		$this->lockMapper->insert($lock);
		return true;
	}

	/**
	 * @param int $fileId
	 * @param string $token
	 * @return bool
	 */
	public function unlock(int $fileId, string $token) : bool {
		return $this->lockMapper->deleteByFileIdAndToken($fileId, $token);
	}

	public function getLocks(int $storageId, string $internalPath, bool $returnChildLocks) : array {
		return $this->lockMapper->getLocksByPath($storageId, $internalPath, $returnChildLocks);
	}
}
