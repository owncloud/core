<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Files;

class ObjectStoreFactory extends Factory {
	/**
	 * @param \OC\Files\Mount\Manager $mountManager
	 * @param \OC\Files\Storage\Loader $storageLoader
	 */
	protected function mountRoot($mountManager, $storageLoader) {
		$config = $this->config->getSystemValue('objectstore');
		// check misconfiguration
		if (empty($config['class'])) {
			\OCP\Util::writeLog('files', 'No class given for objectstore', \OCP\Util::ERROR);
		}
		if (!isset($config['arguments'])) {
			$config['arguments'] = array();
		}

		// instantiate object store implementation
		$config['arguments']['objectstore'] = new $config['class']($config['arguments']);
		// mount with plain / root object store implementation
		$config['class'] = '\OC\Files\ObjectStore\ObjectStoreStorage';

		$mount = new Mount\MountPoint('\OC\Files\ObjectStore\ObjectStoreStorage', '/', $config['arguments'], $storageLoader);
		$mountManager->addMount($mount);
	}

	/**
	 * @param \OC\Files\Mount\Manager $mountManager
	 * @param \OC\Files\Storage\StorageFactory $storageLoader
	 * @param \OCP\IUser $user
	 */
	protected function mountUserFolder($mountManager, $storageLoader, $user) {
		$config = $this->config->getSystemValue('objectstore');
		// sanity checks
		if (empty($config['class'])) {
			\OCP\Util::writeLog('files', 'No class given for objectstore', \OCP\Util::ERROR);
		}
		if (!isset($config['arguments'])) {
			$config['arguments'] = array();
		}
		// instantiate object store implementation
		$config['arguments']['objectstore'] = new $config['class']($config['arguments']);

		$mount = new Mount\MountPoint('\OC\Files\ObjectStore\HomeObjectStoreStorage', '/' . $user->getUID(), $config['arguments'], $storageLoader);
		$mountManager->addMount($mount);
	}
}
