<?php
/**
 * ownCloud
 *
 * @author Florin Peter
 * @copyright 2013 Florin Peter <owncloud@florin-peter.de>
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

namespace OCA\Files\External;


/**
 * Class Proxy
 * @package OCA\Files\External
 */
class Proxy extends \OC_FileProxy {

	public function preFile_put_contents($path, $data) {

		$this->addlock($path);

		return true;
	}

	public function postFile_put_contents($path, $count) {

		$this->removelock($path);

		return true;
	}

	public function preMkdir($path) {

		$this->addlock($path);

		return true;
	}

	public function postMkdir($path) {

		$this->removelock($path);

		return true;
	}

	public function preTouch($path) {

		$this->addlock($path);

		return true;
	}

	public function postTouch($path) {

		$this->removelock($path);

		return true;
	}

	public function preRename($path) {

		$this->addlock($path);

		return true;
	}

	public function postRename($path) {

		$this->removelock($path);

		return true;
	}

	private function isOnExternalMountPoint($path) {
		$mounts = \OC_Mount_Config::getPersonalMountPoints(false);

		$fileMount = \OC\Files\Filesystem::getMountPoint($path);
		$fileStorage = \OC\Files\Filesystem::getStorage($fileMount);
		$class = '\\' . get_class($fileStorage);

		$found = false;
		foreach ($mounts as $mount) {
			if(isset($mount['class']) == $class) {
				$found = true;
				break;
			}
		}

		return $found;
	}

	private function addlock($path) {
		if($this->isOnExternalMountPoint($path)) {
			$mount = \OC\Files\Filesystem::getMountPoint($path);
			$path = \OC\Files\Filesystem::normalizePath(str_replace($mount, '', $path));
			\OCA\Files\External\Locks::addLock($path);
		}
	}

	private function removelock($path) {
		if($this->isOnExternalMountPoint($path)) {
			$mount = \OC\Files\Filesystem::getMountPoint($path);
			$path = \OC\Files\Filesystem::normalizePath(str_replace($mount, '', $path));
			\OCA\Files\External\Locks::removeLock($path);
		}
	}
}