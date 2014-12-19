<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_Sharing;

use OC\Files\Filesystem;
use OC\Files\Mount\MountPoint;
use OC\Files\Storage\Loader;
use OCP\Files\Config\IMountProvider;
use OCP\Files\Mount\IMountManager;
use OCP\Files\Storage\IStorageFactory;
use OCP\IUser;
use OCP\IUserManager;

/**
 * Setup shared storages for users
 */
class MountManager implements IMountProvider {
	/**
	 * @var \OCP\Files\Mount\IMountManager
	 */
	private $mountManager;

	private $userManager;

	function __construct(IUserManager $userManager, IMountManager $mountManager) {
		$this->userManager = $userManager;
		$this->mountManager = $mountManager;
	}

	/**
	 * Get all mount points applicable for the user
	 *
	 * @param \OCP\IUser $user
	 * @param \OCP\Files\Storage\IStorageFactory $factory
	 * @return \OCP\Files\Mount\IMountPoint[]
	 */
	public function getMountsForUser(IUser $user, IStorageFactory $factory) {
		$shares = \OCP\Share::getItemsSharedWithUser('file', $user->getUID());
		$userDir = '/' . $user->getUID() . '/files';
		$mounts = [];
		foreach ($shares as $share) {
			$owner = $this->userManager->get($share['uid_owner']);
			// don't mount shares where we have no permissions
			if ($share['permissions'] > 0) {
				$sourceId = $share['file_source'];
				$targetPath = $userDir . '/' . $share['file_target'];
				Filesystem::initMountPoints($owner->getUID()); //TODO move to filesystem factory once that's merged
				$root = \OC::$server->getRootFolder();
				$sourceNodes = $root->getById($sourceId);
				if (count($sourceNodes) > 0) {
					$sourceNode = $sourceNodes[0];

					$mounts[] = new SharedMount(
						'\OCA\Files_Sharing\SharedStorage',
						$targetPath,
						array(
							'share' => $share,
							'user' => $user->getUID(),
							'displayname' => $owner->getDisplayName(),
							'storage' => $sourceNode->getStorage(),
							'root' => $sourceNode->getInternalPath()
						),
						$factory
					);

					$subMounts = $this->mountManager->findIn($sourceNode->getPath());
					foreach ($subMounts as $mount) {
						$mounts[] = $this->copyMountPoint($mount, $sourceNode->getPath(), $targetPath, $factory);
					}
				}
			}
		};
		return $mounts;
	}

	/**
	 * @param \OCP\Files\Mount\IMountPoint $mount
	 * @param string $sourcePath
	 * @param string $targetPath
	 * @param \OCP\Files\Storage\IStorageFactory $factory
	 * @return \OC\Files\Mount\MountPoint
	 */
	private function copyMountPoint($mount, $sourcePath, $targetPath, $factory) {
		$relMountPoint = substr($mount->getMountPoint(), strlen($sourcePath));
		$newMountPoint = $targetPath . $relMountPoint;
		return new MountPoint($mount->getStorage(), $newMountPoint, array(), $factory);
	}
}
