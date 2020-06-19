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
use OCP\IConfig;

class LockManager {
	const LOCK_TIMEOUT_DEFAULT = 30 * 60;  // default 30 minutes
	const LOCK_TIMEOUT_MAX = 24 * 60 * 60;  // max 1 day
	/** @var LockMapper */
	private $lockMapper;
	/** @var IUserSession */
	private $userSession;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var IConfig */
	private $config;

	public function __construct(LockMapper $lockMapper,
								IUserSession $userSession,
								ITimeFactory $timeFactory,
								IConfig $config) {
		$this->lockMapper = $lockMapper;
		$this->userSession = $userSession;
		$this->timeFactory = $timeFactory;
		$this->config = $config;
	}

	public function lock($storageId, $internalPath, $fileId, array $lockInfo) {
		if ($fileId <= 0) {
			throw new \InvalidArgumentException('Invalid file id');
		}
		if (!isset($lockInfo['token'])) {
			throw new \InvalidArgumentException('No token provided in $lockInfo');
		}

		$timeout = $this->config->getAppValue('core', 'lock_timeout_default', self::LOCK_TIMEOUT_DEFAULT);
		if (isset($lockInfo['timeout'])) {
			// set the requested timeout
			$timeout = $lockInfo['timeout'];
		}

		$maxTimeout = $this->config->getAppValue('core', 'lock_timeout_max', self::LOCK_TIMEOUT_MAX);
		if ($maxTimeout < 0) {
			// if the max timeout is set to negative, use the default maximum (1 day)
			$maxTimeout = self::LOCK_TIMEOUT_MAX;
		}

		if ($timeout < 0 || $timeout > $maxTimeout) {
			// ensure the timeout isn't greater than the one configured as maximum
			$timeout = $maxTimeout;
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
