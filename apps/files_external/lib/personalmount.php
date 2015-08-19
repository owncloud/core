<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
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

namespace OCA\Files_External\Lib;

use OC\Files\Mount\MountPoint;
use OC\Files\Mount\MoveableMount;
use OCA\Files_External\Service\UserStoragesService;

/**
 * Person mount points can be moved by the user
 */
class PersonalMount extends MountPoint implements MoveableMount {
	/** @var UserStoragesService */
	protected $storagesService;

	/** @var int */
	protected $storageId;

	/**
	 * Attach a UserStoragesService for mount actions
	 *
	 * @param UserStoragesService $storagesService
	 * @param int $storageId
	 */
	public function attachStoragesService(UserStoragesService $storagesService, $storageId) {
		$this->storagesService = $storagesService;
		$this->storageId = $storageId;
	}

	/**
	 * Move the mount point to $target
	 *
	 * @param string $target the target mount point
	 * @return bool
	 */
	public function moveMount($target) {
		$storage = $this->storagesService->getStorage($this->storageId);
		// remove "/$user/files" prefix
		$targetParts = explode('/', trim($target, '/'), 3);
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
		$this->storagesService->removeStorage($this->storageId);
		return true;
	}
}
