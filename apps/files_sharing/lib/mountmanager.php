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
use OCP\IUserManager;

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

	private $userManager;

	function __construct(Manager $mountManager, Loader $storageLoader, IUserManager $userManager, Folder $root) {
		$this->mountManager = $mountManager;
		$this->storageLoader = $storageLoader;
		$this->userManager = $userManager;
		$this->root = $root;
	}


	public function setupMounts($options) {
		/** @var \OCP\IUser $user */
		$user = $options['user_object'];
		if (!$user) {
			return;
		}
		$shares = \OCP\Share::getItemsSharedWithUser('file', $user->getUID());
		foreach ($shares as $share) {
			$owner = $this->userManager->get($share['uid_owner']);
			// don't mount shares where we have no permissions
			if ($share['permissions'] > 0) {
				Filesystem::initMountPoints($owner->getUID()); //TODO move to filesystem factory once that's merged
				$sourceFiles = $this->root->getById($share['file_source']);
				if (count($sourceFiles) === 0) {
					throw new \Exception('Cant find source file for share');
				}
				$sourceFile = $sourceFiles[0];

				$mount = new SharedMount(
					'\OCA\Files_Sharing\SharedStorage',
					$options['user_dir'] . '/' . $share['file_target'],
					array(
						'share' => $share,
						'user' => $user->getUID(),
						'displayname' => $owner->getDisplayName(),
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
			\OC::$server->getUserManager(),
			\OC::$server->getRootFolder()
		);
		$manager->setupMounts($options);
	}
}
