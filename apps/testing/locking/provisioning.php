<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
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

namespace OCA\Testing\Locking;

use OC\Lock\DBLockingProvider;
use OC\User\NoUserException;
use OCP\AppFramework\Http;
use OCP\Files\NotFoundException;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\IRequest;
use OCP\Lock\ILockingProvider;
use OCP\Lock\LockedException;

class Provisioning {

	/** @var ILockingProvider */
	protected $lockingProvider;

	/** @var IDBConnection */
	protected $connection;

	/** @var IConfig */
	protected $config;

	/** @var IRequest */
	protected $request;

	/**
	 * @param ILockingProvider $lockingProvider
	 * @param IDBConnection $connection
	 * @param IConfig $config
	 * @param IRequest $request
	 */
	public function __construct(ILockingProvider $lockingProvider, IDBConnection $connection, IConfig $config, IRequest $request) {
		$this->lockingProvider = $lockingProvider;
		$this->connection = $connection;
		$this->config = $config;
		$this->request = $request;
	}

	/**
	 * @return FakeDBLockingProvider
	 */
	protected function getLockingProvider() {
		if ($this->lockingProvider instanceof DBLockingProvider) {
			return \OC::$server->query('OCA\Testing\Locking\FakeDBLockingProvider');
		} else {
			throw new \RuntimeException('Lock provisioning is only possible using the DBLockingProvider');
		}
	}

	/**
	 * @param array $parameters
	 * @return int
	 */
	protected function getType($parameters) {
		return isset($parameters['type']) ? (int) $parameters['type'] : 0;
	}

	/**
	 * @param array $parameters
	 * @return int
	 */
	protected function getPath($parameters) {
		$node = \OC::$server->getRootFolder()
			->getUserFolder($parameters['user'])
			->get($this->request->getParam('path'));
		return 'files/' . \md5($node->getStorage()->getId() . '::' . \trim($node->getInternalPath(), '/'));
	}

	/**
	 * @return \OC_OCS_Result
	 */
	public function isLockingEnabled() {
		try {
			$this->getLockingProvider();
			return new \OC_OCS_Result(null, 100);
		} catch (\RuntimeException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_NOT_IMPLEMENTED, $e->getMessage());
		}
	}

	/**
	 * @param array $parameters
	 * @return \OC_OCS_Result
	 */
	public function acquireLock(array $parameters) {
		try {
			$path = $this->getPath($parameters);
		} catch (NoUserException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_NOT_FOUND, 'User not found');
		} catch (NotFoundException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_NOT_FOUND, 'Path not found');
		}
		$type = $this->getType($parameters);

		$lockingProvider = $this->getLockingProvider();

		try {
			$lockingProvider->acquireLock($path, $type);
			$this->config->setAppValue('testing', 'locking_' . $path, $type);
			return new \OC_OCS_Result(null, 100);
		} catch (LockedException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_LOCKED);
		}
	}

	/**
	 * @param array $parameters
	 * @return \OC_OCS_Result
	 */
	public function changeLock(array $parameters) {
		try {
			$path = $this->getPath($parameters);
		} catch (NoUserException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_NOT_FOUND, 'User not found');
		} catch (NotFoundException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_NOT_FOUND, 'Path not found');
		}
		$type = $this->getType($parameters);

		$lockingProvider = $this->getLockingProvider();

		try {
			$lockingProvider->changeLock($path, $type);
			$this->config->setAppValue('testing', 'locking_' . $path, $type);
			return new \OC_OCS_Result(null, 100);
		} catch (LockedException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_LOCKED);
		}
	}

	/**
	 * @param array $parameters
	 * @return \OC_OCS_Result
	 */
	public function releaseLock(array $parameters) {
		try {
			$path = $this->getPath($parameters);
		} catch (NoUserException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_NOT_FOUND, 'User not found');
		} catch (NotFoundException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_NOT_FOUND, 'Path not found');
		}
		$type = $this->getType($parameters);

		$lockingProvider = $this->getLockingProvider();

		try {
			$lockingProvider->releaseLock($path, $type);
			$this->config->deleteAppValue('testing', 'locking_' . $path);
			return new \OC_OCS_Result(null, 100);
		} catch (LockedException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_LOCKED);
		}
	}

	/**
	 * @param array $parameters
	 * @return \OC_OCS_Result
	 */
	public function isLocked(array $parameters) {
		try {
			$path = $this->getPath($parameters);
		} catch (NoUserException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_NOT_FOUND, 'User not found');
		} catch (NotFoundException $e) {
			return new \OC_OCS_Result(null, Http::STATUS_NOT_FOUND, 'Path not found');
		}
		$type = $this->getType($parameters);

		$lockingProvider = $this->getLockingProvider();

		if ($lockingProvider->isLocked($path, $type)) {
			return new \OC_OCS_Result(null, 100);
		}

		return new \OC_OCS_Result(null, Http::STATUS_LOCKED);
	}

	/**
	 * releases all locks that were set by the testing app
	 * if $parameters['_delete']['global'] is set to "true"
	 * all locks in the files_lock table are released (set to "0")
	 *
	 * @param array $parameters
	 * @return \OC_OCS_Result
	 */
	public function releaseAll(array $parameters) {
		$type = $this->getType($parameters);
		if (isset($parameters['_delete']['global'])
			&& $parameters['_delete']['global'] === "true"
		) {
			$globalRelease = true;
		} else {
			$globalRelease = false;
		}

		$lockingProvider = $this->getLockingProvider();
		if ($globalRelease === true) {
			$lockingProvider->releaseAllGlobally();
		} else {
			foreach ($this->config->getAppKeys('testing') as $lock) {
				if (\strpos($lock, 'locking_') === 0) {
					$path = \substr($lock, \strlen('locking_'));
					$testingAppLock = (int) $this->config->getAppValue(
						'testing', $lock
					);
					if ($type === $testingAppLock || $type === 0) {
						$lockingProvider->releaseLock($path, $testingAppLock);
					}
				}
			}
		}

		return new \OC_OCS_Result(null, 100);
	}
}
