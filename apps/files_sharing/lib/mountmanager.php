<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_Sharing;

use OC\Files\Filesystem;
use OC\Files\Mount\Manager;
use OC\Files\Storage\Loader;
use OCP\Files\Folder;

/**
 * Setup shared storages for users
 */
class MountManager {
	/**
	 * @var \OC\Files\Mount\Manager
	 */
	private $mountManager;
	/**
	 * @var \OC\Files\Storage\Loader
	 */
	private $storageLoader;

	/**
	 * @var \OCP\Files\Folder
	 */
	private $root;

	function __construct(Manager $mountManager, Loader $storageLoader, Folder $root) {
		$this->mountManager = $mountManager;
		$this->storageLoader = $storageLoader;
		$this->root = $root;
	}


	public function setupMounts($options) {
		$shares = \OCP\Share::getItemsSharedWithUser('file', $options['user']);
		foreach ($shares as $share) {
			// don't mount shares where we have no permissions
			if ($share['permissions'] > 0) {
				Filesystem::initMountPoints($share['uid_owner']); //TODO move to filesystem factory once that's merged
				$sourceFiles = $this->root->getById($share['file_source']);
				if (count($sourceFiles) === 0) {
					throw new \Exception('Cant find source file for share');
				}
				$sourceFile = $sourceFiles[0];

				$mount = new SharedMount(
					'\OC\Files\Storage\Shared',
					$options['user_dir'] . '/' . $share['file_target'],
					array(
						'share' => $share,
						'user' => $options['user'],
						'storage' => $sourceFile->getStorage(),
						'root' => $sourceFile->getInternalPath()
					),
					$this->storageLoader
				);
				$this->mountManager->addMount($mount);
			}
		}
	}

	/**
	 * We use a static wrapper since getting an instance requires the storage loader and mount manager, which require the
	 * filesystem to be setup
	 *
	 * @param array $options
	 */
	public static function setup($options) {
		$manager = new MountManager(
			\OC\Files\Filesystem::getMountManager(),
			\OC\Files\Filesystem::getLoader(),
			\OC::$server->getRootFolder()
		);
		$manager->setupMounts($options);
	}
}
