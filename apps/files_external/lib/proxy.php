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

		if($this->isOnExternalMountPoint($path)) {
			$mount = \OC\Files\Filesystem::getMountPoint($path);
			$path = str_replace($mount, '', $path);
			\OCA\Files\External\Locks::addLock($path);
		}
	}

	public function postFile_put_contents($path, $count) {

		if($this->isOnExternalMountPoint($path)) {
			$mount = \OC\Files\Filesystem::getMountPoint($path);
			$path = str_replace($mount, '', $path);
			\OCA\Files\External\Locks::removeLock($path);
		}
	}

	private function isOnExternalMountPoint($path) {
		$mounts = \OC_Mount_Config::getPersonalMountPoints();

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
}