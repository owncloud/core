<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Files;

use OC\Files\Mount\Manager;
use OC\Files\Node\Root;
use OC\Files\Storage\StorageFactory as Loader;
use OC\Files\Storage\Wrapper\Quota;
use OC\Hooks\BasicEmitter;
use OCP\Files\FileInfo;

class Factory extends BasicEmitter {
	/**
	 * @var \OCP\IConfig
	 */
	protected $config;

	/**
	 * @var \OC\Files\Node\Root
	 */
	protected $root;

	/**
	 * @var \OCP\Files\Folder[]
	 */
	protected $userFolders = array();

	/**
	 * @param \OCP\IConfig $config
	 */
	public function __construct($config) {
		$this->config = $config;
	}

	/**
	 * Mount the data dir as root storage
	 *
	 * @param \OC\Files\Mount\Manager $mountManager
	 * @param \OC\Files\Storage\StorageFactory $storageLoader
	 */
	protected function mountRoot($mountManager, $storageLoader) {
		// mount local file backend as root
		$configDataDirectory = $this->config->getSystemValue("datadirectory", \OC::$SERVERROOT . "/data");
		//first set up the local "root" storage
		$mount = new Mount\MountPoint('\OC\Files\Storage\Local', '/', array('datadir' => $configDataDirectory), $storageLoader);
		$mountManager->addMount($mount);
	}

	/**
	 * @param \OC\Files\Mount\Manager $mountManager
	 * @param \OC\Files\Storage\StorageFactory $storageLoader
	 * @param \OCP\IUser $user
	 */
	protected function mountUserFolder($mountManager, $storageLoader, $user) {
		// check for legacy home id (<= 5.0.12)
		$legacy = \OC\Files\Cache\Storage::exists('local::' . $user->getHome() . '/');
		$mount = new Mount\MountPoint('\OC\Files\Storage\Home', '/' . $user->getUID(), array(
			'datadir' => $user->getHome(),
			'user' => $user,
			'legacy' => $legacy
		), $storageLoader);
		$mountManager->addMount($mount);

		// Chance to mount for other storages
		$mountConfigManager = \OC::$server->getMountProviderCollection();
		$mounts = $mountConfigManager->getMountsForUser($user);
		array_walk($mounts, array($mountManager, 'addMount'));
	}

	/**
	 * Mount the cache storage if configured and create the cache dir if needed
	 *
	 * @param \OC\Files\Mount\Manager $mountManager
	 * @param \OC\Files\Storage\StorageFactory $storageLoader
	 * @param \OCP\IUser $user
	 */
	protected function setupCacheDir($mountManager, $storageLoader, $user) {
		$cacheBaseDir = $this->config->getSystemValue('cache_path', '');
		if ($cacheBaseDir === '') {
			// use local cache dir relative to the user's home
			$mount = $mountManager->find('/' . $user->getUID());
			$userStorage = $mount->getStorage();
			if (!$userStorage->file_exists('cache')) {
				$userStorage->mkdir('cache');
			}
		} else {
			$cacheDir = rtrim($cacheBaseDir, '/') . '/' . $user->getUID();
			if (!file_exists($cacheDir)) {
				mkdir($cacheDir, 0770, true);
			}
			$mount = new Mount\MountPoint('\OC\Files\Storage\Local', '/' . $user->getUID() . '/cache', array('datadir' => $cacheDir), $storageLoader);
			$mountManager->addMount($mount);
		}
	}

	/**
	 * @param \OCP\IUser $user
	 */
	protected function copySkeleton($user) {
		$root = $this->getRoot();
		$path = '/' . $user->getUID() . '/files';
		if (!$root->nodeExists($path)) {
			$this->emit('\OC\Files', 'preCopySkeleton', array($user));
			$userDirectory = $root->newFolder($path);
			$skeletonDirectory = $this->config->getSystemValue('skeletondirectory', \OC::$SERVERROOT . '/core/skeleton');
			if (!empty($skeletonDirectory)) {
				\OC_Util::copyr($skeletonDirectory, $userDirectory);
			}
			$userDirectory->getStorage()->getScanner()->scan('', \OC\Files\Cache\Scanner::SCAN_RECURSIVE);
			$this->emit('\OC\Files', 'postCopySkeleton', array($user));
		}
	}

	/**
	 * Create the root filesystem
	 *
	 * @return \OC\Files\Node\Root
	 */
	public function getRoot() {
		if ($this->root) {
			return $this->root;
		}
		$mountManager = new Manager();
		$storageLoader = new Loader();
		\OC::$server->getEventLogger()->start('setup_fs_root', 'Setup filesystem root');

		$storageLoader->addStorageWrapper('oc_quota', function ($mountPoint, $storage) {
			/**
			 * @var \OC\Files\Storage\Storage $storage
			 */
			if ($storage->instanceOfStorage('\OCP\Files\IHomeStorage')) {
				/**
				 * @var \OCP\Files\IHomeStorage $storage
				 */
				if (is_object($storage->getUser())) {
					$user = $storage->getUser()->getUID();
					$quota = \OC_Util::getUserQuota($user);
					if ($quota !== FileInfo::SPACE_UNLIMITED) {
						return new Quota(array('storage' => $storage, 'quota' => $quota, 'root' => 'files'));
					}
				}
			}
			return $storage;
		});

		$this->mountRoot($mountManager, $storageLoader);
		\OC::$server->getEventLogger()->end('setup_fs_root');
		$this->root = new Root($mountManager, $storageLoader, new View(''));
		return $this->root;
	}

	/**
	 * Mount the storages for a user
	 *
	 * @param \OCP\IUser $user
	 * @return \OCP\Files\Folder
	 */
	public function getUserFolder($user) {
		if (isset($this->userFolders[$user->getUID()])) {
			return $this->userFolders[$user->getUID()];
		}
		$root = $this->getRoot();
		$mountManager = $root->getMountManager();
		$storageLoader = $root->getStorageLoader();
		if (is_null($mountManager->getMount('/' . $user->getUID()))) {
			\OC::$server->getEventLogger()->start('setup_fs_' . $user->getUID(), 'Setup filesystem for ' . $user->getUID());
			$this->mountUserFolder($mountManager, $storageLoader, $user);
			$this->setupCacheDir($mountManager, $storageLoader, $user);
			$this->copySkeleton($user);
			\OC_Hook::emit('OC_Filesystem', 'post_initMountPoints', array('user' => $user->getUID(), 'user_dir' => $user->getHome()));

			\OC_Hook::emit('OC_Filesystem', 'setup', array('user' => $user->getUID(), 'user_dir' => $user->getHome() . '/files'));
			\OC::$server->getEventLogger()->end('setup_fs_' . $user->getUID());
		}
		$this->userFolders[$user->getUID()] = $root->get('/' . $user->getUID());
		return $this->userFolders[$user->getUID()];
	}

	/**
	 * Clear all mounts in the filesystem
	 *
	 * @param bool $preserveRoot whether or not to keep the root storage
	 */
	public function clear($preserveRoot = false) {
		if ($this->root) {
			$this->userFolders = array();
			$this->root->getMountManager()->clear($preserveRoot);
		}
	}
}
