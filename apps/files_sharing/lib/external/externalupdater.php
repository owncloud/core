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

namespace OCA\Files_Sharing\External;

use OC\User\NoUserException;
use OCP\Files\Storage\IStorageFactory;
use OCP\IUserManager;

/**
 * Handle updates from owner
 */
class ExternalUpdater {
	/**
	 * @var MountProvider
	 */
	private $externalShareMountProvider;

	/**
	 * @var IStorageFactory
	 */
	private $storageFactory;

	/**
	 * @var IUserManager
	 */
	private $userManager;

	/**
	 * ExternalUpdater constructor.
	 *
	 * @param MountProvider $externalShareMountProvider
	 * @param IStorageFactory $storageFactory
	 * @param IUserManager $userManager
	 */
	public function __construct(MountProvider $externalShareMountProvider, IStorageFactory $storageFactory, IUserManager $userManager) {
		$this->externalShareMountProvider = $externalShareMountProvider;
		$this->storageFactory = $storageFactory;
		$this->userManager = $userManager;
	}

	public function handleUpdate($userId, $data, $path, $newEtag) {
		$user = $this->userManager->get($userId);
		if (is_null($user)) {
			throw new NoUserException('user ' . $userId . 'not found');
		}

		$mount = $this->externalShareMountProvider->getMount($user, $data, $this->storageFactory);
		$storage = $mount->getStorage();
		$cache = $storage->getCache();
		$scanner = $storage->getScanner();

		$oldInfo = $cache->get($path);
		if ($oldInfo['etag'] !== $newEtag) {
			$scanner->scan($path);
		}
	}
}
