<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OC\Files\External;

use OC\Files\Storage\Wrapper\Availability;
use OCP\Files\Storage;
use OC\Files\Mount\MountPoint;
use OCP\Files\Storage\IStorageFactory;
use OCP\Files\Config\IMountProvider;
use OCP\IUser;
use OCP\Files\External\Service\IUserStoragesService;
use OCP\Files\External\Service\IUserGlobalStoragesService;
use OCP\Files\External\IStorageConfig;
use OC\Files\Storage\FailedStorage;
use OCP\Files\StorageNotAvailableException;

/**
 * Make the old files_external config work with the new public mount config api
 */
class ConfigAdapter implements IMountProvider {

	/** @var IUserStoragesService */
	private $userStoragesService;

	/** @var IUserGlobalStoragesService */
	private $userGlobalStoragesService;

	/**
	 * @param IUserStoragesService $userStoragesService
	 * @param IUserGlobalStoragesService $userGlobalStoragesService
	 */
	public function __construct(
		IUserStoragesService $userStoragesService,
		IUserGlobalStoragesService $userGlobalStoragesService
	) {
		$this->userStoragesService = $userStoragesService;
		$this->userGlobalStoragesService = $userGlobalStoragesService;
	}

	/**
	 * Process storage ready for mounting
	 *
	 * @param IStorageConfig $storage
	 * @param IUser $user
	 */
	private function prepareStorageConfig(IStorageConfig &$storage, IUser $user) {
		foreach ($storage->getBackendOptions() as $option => $value) {
			$storage->setBackendOption($option, $this->setUserVars(
				$user->getUID(), $value
			));
		}

		$objectStore = $storage->getBackendOption('objectstore');
		if ($objectStore) {
			$objectClass = $objectStore['class'];
			if (!is_subclass_of($objectClass, '\OCP\Files\ObjectStore\IObjectStore')) {
				throw new \InvalidArgumentException('Invalid object store');
			}
			$storage->setBackendOption('objectstore', new $objectClass($objectStore));
		}

		$storage->getAuthMechanism()->manipulateStorageConfig($storage, $user);
		$storage->getBackend()->manipulateStorageConfig($storage, $user);
	}

	/**
	 * Construct the storage implementation
	 *
	 * @param IStorageConfig $storageConfig
	 * @return Storage
	 */
	private function constructStorage(IStorageConfig $storageConfig) {
		$class = $storageConfig->getBackend()->getStorageClass();
		$storage = new $class($storageConfig->getBackendOptions());

		// auth mechanism should fire first
		$storage = $storageConfig->getBackend()->wrapStorage($storage);
		$storage = $storageConfig->getAuthMechanism()->wrapStorage($storage);

		return $storage;
	}

	/**
	 * Get all mountpoints applicable for the user
	 *
	 * @param \OCP\IUser $user
	 * @param \OCP\Files\Storage\IStorageFactory $loader
	 * @return \OCP\Files\Mount\IMountPoint[]
	 */
	public function getMountsForUser(IUser $user, IStorageFactory $loader) {
		$mounts = [];

		$this->userStoragesService->setUser($user);
		$this->userGlobalStoragesService->setUser($user);

		foreach ($this->userGlobalStoragesService->getUniqueStorages() as $storage) {
			try {
				$this->prepareStorageConfig($storage, $user);
				$impl = $this->constructStorage($storage);
			} catch (\Exception $e) {
				// propagate exception into filesystem
				$impl = new FailedStorage(['exception' => $e]);
			}

			try {
				$availability = $impl->getAvailability();
				if (!$availability['available'] && !Availability::shouldRecheck($availability)) {
					$impl = new FailedStorage([
						'exception' => new StorageNotAvailableException('Storage with mount id ' . $storage->getId() . ' is not available')
					]);
				}
			} catch (\Exception $e) {
				// propagate exception into filesystem
				$impl = new FailedStorage(['exception' => $e]);
			}

			$mount = new MountPoint(
				$impl,
				'/' . $user->getUID() . '/files' . $storage->getMountPoint(),
				null,
				$loader,
				$storage->getMountOptions()
			);
			$mounts[$storage->getMountPoint()] = $mount;
		}

		foreach ($this->userStoragesService->getStorages() as $storage) {
			try {
				$this->prepareStorageConfig($storage, $user);
				$impl = $this->constructStorage($storage);
			} catch (\Exception $e) {
				// propagate exception into filesystem
				$impl = new FailedStorage(['exception' => $e]);
			}

			$mount = new PersonalMount(
				$this->userStoragesService,
				$storage->getId(),
				$impl,
				'/' . $user->getUID() . '/files' . $storage->getMountPoint(),
				null,
				$loader,
				$storage->getMountOptions()
			);
			$mounts[$storage->getMountPoint()] = $mount;
		}

		$this->userStoragesService->resetUser();
		$this->userGlobalStoragesService->resetUser();

		return $mounts;
	}

	/**
	 * fill in the correct values for $user
	 *
	 * @param string $user user value
	 * @param string|array $input
	 * @return string
	 */
	private function setUserVars($user, $input) {
		if (is_array($input)) {
			foreach ($input as $key => $value) {
				if (is_string($value)) {
					$input[$key] = str_replace('$user', $user, $value);
				}
			}
		} else {
			if (is_string($input)) {
				$input = str_replace('$user', $user, $input);
			}
		}
		return $input;
	}
}
