<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\Files\External;

use OC\Files\Mount\MountPoint;
use OC\Files\Mount\MoveableMount;
use OCP\Files\External\Service\IUserStoragesService;

/**
 * Person mount points can be moved by the user
 */
class PersonalMount extends MountPoint implements MoveableMount {
	/** @var IUserStoragesService */
	protected $storagesService;

	/** @var int */
	protected $numericStorageId;

	/**
	 * @param IUserStoragesService $storagesService
	 * @param int $storageId
	 * @param \OCP\Files\Storage $storage
	 * @param string $mountpoint
	 * @param array $arguments (optional) configuration for the storage backend
	 * @param \OCP\Files\Storage\IStorageFactory $loader
	 * @param array $mountOptions mount specific options
	 */
	public function __construct(
		IUserStoragesService $storagesService,
		$storageId,
		$storage,
		$mountpoint,
		$arguments = null,
		$loader = null,
		$mountOptions = null
	) {
		parent::__construct($storage, $mountpoint, $arguments, $loader, $mountOptions);
		$this->storagesService = $storagesService;
		$this->numericStorageId = $storageId;
	}

	/**
	 * Move the mount point to $target
	 *
	 * @param string $target the target mount point
	 * @return bool
	 */
	public function moveMount($target) {
		$storage = $this->storagesService->getStorage($this->numericStorageId);
		// remove "/$user/files" prefix
		$targetParts = \explode('/', \trim($target, '/'), 3);
		$storage->setMountPoint($targetParts[2]);
		$this->storagesService->updateStorage($storage);
		$this->setMountPoint($target);
		return true;
	}

	/**
	 * Remove the mount points
	 *
	 * @return bool
	 */
	public function removeMount() {
		$this->storagesService->removeStorage($this->numericStorageId);
		return true;
	}

	/**
	 * Returns true
	 *
	 * @param string $target unused
	 * @return bool true
	 */
	public function isTargetAllowed($target) {
		// note: home storage check already done in View
		return true;
	}
}
