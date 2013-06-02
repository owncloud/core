<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fp
 * Date: 01.06.13
 * Time: 00:06
 * To change this template use File | Settings | File Templates.
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