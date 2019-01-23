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

namespace OC\Lock\Persistent;

use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IUserSession;
use OCP\Lock\Persistent\ILock;

class LockManager {

	/** @var LockMapper */
	private $lockMapper;
	/** @var IUserSession */
	private $userSession;
	/** @var ITimeFactory */
	private $timeFactory;

	public function __construct(LockMapper $lockMapper,
								IUserSession $userSession,
								ITimeFactory $timeFactory) {
		$this->lockMapper = $lockMapper;
		$this->userSession = $userSession;
		$this->timeFactory = $timeFactory;
	}

	public function lock($storageId, $internalPath, $fileId, array $lockInfo) {
		if ($fileId <= 0) {
			throw new \InvalidArgumentException('Invalid file id');
		}
		if (!isset($lockInfo['token'])) {
			throw new \InvalidArgumentException('No token provided in $lockInfo');
		}

		// default to 30 minutes if nothing is specified
		$timeout = 30*60;
		if (isset($lockInfo['timeout'])) {
			$timeout = $lockInfo['timeout'];
			// max one day, not infinie
			if ($timeout < 0 || $timeout > 60*60*24) {
				$timeout = 60*60*24;
			}
		}
		$owner = isset($lockInfo['owner']) ? $lockInfo['owner'] : null;
		if ($owner === null && $this->userSession->isLoggedIn()) {
			$user = $this->userSession->getUser();
			if ($user !== null) {
				$owner = $user->getDisplayName();
				if ($user->getEMailAddress() !== null) {
					$owner .= " ({$user->getEMailAddress()})";
				}
			}
		}

		$locks = $this->lockMapper->getLocksByPath($storageId, $internalPath, false);

		// check if lock exists for refreshing
		foreach ($locks as $lock) {
			if ($lock->getToken() === $lockInfo['token']) {
				$lock->setCreatedAt($this->timeFactory->getTime());
				$lock->setTimeout($timeout);
				if ($lock->getOwner() === '' || $lock->getOwner() === null) {
					$lock->setOwner($owner);
				}
				$this->lockMapper->update($lock);
				return $lock;
			}
		}

		$depth = 0;
		if (isset($lockInfo['depth'])) {
			$depth = $lockInfo['depth'];
		}
		$scope = ILock::LOCK_SCOPE_EXCLUSIVE;
		if (isset($lockInfo['scope'])) {
			$scope = $lockInfo['scope'];
		}

		$lock = new Lock();
		$lock->setFileId($fileId);
		$lock->setCreatedAt($this->timeFactory->getTime());
		$lock->setTimeout($timeout);
		$lock->setOwner($owner);
		$lock->setToken($lockInfo['token']);
		$lock->setScope($scope);
		$lock->setDepth($depth);

		if ($this->userSession->isLoggedIn()) {
			$user = $this->userSession->getUser();
			if ($user !== null) {
				$lock->setOwnerAccountId($user->getAccountId());
			}
		}
		$this->lockMapper->insert($lock);
		return $lock;
	}

	/**
	 * @param int $fileId
	 * @param string $token
	 * @return bool
	 */
	public function unlock($fileId, $token) {
		return $this->lockMapper->deleteByFileIdAndToken($fileId, $token);
	}

	/**
	 * @param int $storageId
	 * @param string $internalPath
	 * @param bool $returnChildLocks
	 * @return ILock[]
	 */
	public function getLocks($storageId, $internalPath, $returnChildLocks) {
		return $this->lockMapper->getLocksByPath($storageId, $internalPath, $returnChildLocks);
	}
}
