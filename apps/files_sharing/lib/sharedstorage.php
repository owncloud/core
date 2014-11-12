<?php
/**
 * ownCloud
 *
 * @author Bjoern Schiessle, Michael Gapczynski
 * @copyright 2011 Michael Gapczynski <mtgap@owncloud.com>
 *            2014 Bjoern Schiessle <schiessle@owncloud.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Files_Sharing;

use OC\Files\Storage\Wrapper\Jail;
use OC\Files\Storage\Wrapper\PermissionsMask;

/**
 * Convert target path to source path and pass the function call to the correct storage provider
 */
class SharedStorage extends Jail implements ISharedStorage {

	/**
	 * @var string
	 */
	private $mountPoint;

	/**
	 * @var string
	 */
	private $owner;

	/**
	 * @var string
	 */
	private $displayName;

	public function __construct($arguments) {
		$this->mountPoint = $arguments['mountpoint'];
		$this->owner = $arguments['owner'];
		$this->displayName = $arguments['displayname'];
		$this->rootPath = $arguments['root'];

		// since we cant extends 2 wrappers, we apply the permissions mask wrapper manually
		$this->storage = new PermissionsMask(array(
			'storage' => $arguments['storage'],
			'mask' => $arguments['mask']
		));
	}

	/**
	 * @return string
	 */
	public function getMountPoint() {
		return $this->mountPoint;
	}

	/**
	 * @param string $mountPoint
	 */
	public function setMountPoint($mountPoint) {
		$this->mountPoint = $mountPoint;
	}

	/**
	 * get id of the mount point
	 *
	 * @return string
	 */
	public function getId() {
		return 'shared::' . $this->mountPoint;
	}


	public function getOwner($path) {
		return $this->owner;
	}

	public function getCache($path = '', $storage = null) {
		if (!$storage) {
			$storage = $this;
		}
		$sourceCache = $this->storage->getCache($this->getSourcePath($path), $storage);
		return new SharedCache($sourceCache, $this->rootPath, $this->owner, $this->displayName);
	}

	public function getWatcher($path = '', $storage = null) {
		if (!$storage) {
			$storage = $this;
		}
		return new \OC\Files\Cache\Shared_Watcher($storage);
	}

	public function resolveSource($path) {
		return array($this->storage, $this->getSourcePath($path));
	}
}
