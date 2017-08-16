<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace  OC\Files;

use OC\Encryption\CustomEncryptionWrapper;
use OC\Encryption\Manager;
use OC\Files\Cache;
use OC\Files\Filesystem;
use OC\Files\Storage\Storage;
use OC\Memcache\ArrayCache;
use OCP\Files\Mount\IMountPoint;
use OCP\Lock\ILockingProvider;
use OC\Files\Mount\MoveableMount;
use OCP\Lock\LockedException;

class CustomView extends View{
	/** @var string */
	private $fakeRoot = '';

	private $updaterEnabled = true;

	private $lockingProvider;

	private $lockingEnabled;

	private $encryptionManager;

	private $view;

	/**
	 * Rename/move a file or folder from the source path to target path.
	 *
	 * @param string $path1 source path
	 * @param string $path2 target path
	 *
	 * @return bool|mixed
	 */
	public function renameCustom($path1, $path2) {
		$absolutePath1 = Filesystem::normalizePath($this->getAbsolutePath($path1));
		$absolutePath2 = Filesystem::normalizePath($this->getAbsolutePath($path2));
		$result = false;
		if (
			Filesystem::isValidPath($path2)
			and Filesystem::isValidPath($path1)
			and !Filesystem::isForbiddenFileOrDir($path2)
		) {
			$path1 = $this->getRelativePath($absolutePath1);
			$path2 = $this->getRelativePath($absolutePath2);
			$exists = $this->file_exists($path2);

			if ($path1 == null or $path2 == null) {
				return false;
			}

			$this->lockFile($path1, ILockingProvider::LOCK_SHARED, true);
			try {
				$this->lockFile($path2, ILockingProvider::LOCK_SHARED, true);
			} catch (LockedException $e) {
				$this->unlockFile($path1, ILockingProvider::LOCK_SHARED);
				throw $e;
			}

			$run = true;
			if ($this->shouldEmitHooks($path1) && (Cache\Scanner::isPartialFile($path1) && !Cache\Scanner::isPartialFile($path2))) {
				// if it was a rename from a part file to a regular file it was a write and not a rename operation
				$this->emit_file_hooks_pre($exists, $path2, $run);
			} elseif ($this->shouldEmitHooks($path1)) {
				\OC_Hook::emit(
					Filesystem::CLASSNAME, Filesystem::signal_rename,
					[
						Filesystem::signal_param_oldpath => $this->getHookPath($path1),
						Filesystem::signal_param_newpath => $this->getHookPath($path2),
						Filesystem::signal_param_run => &$run
					]
				);
			}
			if ($run) {
				$this->verifyPath(dirname($path2), basename($path2));

				$manager = Filesystem::getMountManager();
				$mount1 = $this->getMount($path1);
				$mount2 = $this->getMount($path2);
				$storage1 = $mount1->getStorage();
				$storage2 = $mount2->getStorage();
				$internalPath1 = $mount1->getInternalPath($absolutePath1);
				$internalPath2 = $mount2->getInternalPath($absolutePath2);

				$this->changeLock($path1, ILockingProvider::LOCK_EXCLUSIVE, true);
				$this->changeLock($path2, ILockingProvider::LOCK_EXCLUSIVE, true);

				if ($internalPath1 === '' and $mount1 instanceof MoveableMount) {
					if ($this->canMove($mount1, $absolutePath2)) {
						/**
						 * @var \OC\Files\Mount\MountPoint | \OC\Files\Mount\MoveableMount $mount1
						 */
						$sourceMountPoint = $mount1->getMountPoint();
						$result = $mount1->moveMount($absolutePath2);
						$manager->moveMount($sourceMountPoint, $mount1->getMountPoint());
					} else {
						$result = false;
					}
					// moving a file/folder within the same mount point
				} elseif ($storage1 === $storage2) {
					if ($storage1) {
						$result = $storage1->rename($internalPath1, $internalPath2);
					} else {
						$result = false;
					}
				} else {
					$result = $storage2->moveFromStorageCustom($storage1, $internalPath1, $internalPath2, true, true);
				}

				if ((Cache\Scanner::isPartialFile($path1) && !Cache\Scanner::isPartialFile($path2)) && $result !== false) {
					// if it was a rename from a part file to a regular file it was a write and not a rename operation

					$this->writeUpdate($storage2, $internalPath2);
				} else if ($result) {
					if ($internalPath1 !== '') { // don't do a cache update for moved mounts
						$this->renameUpdate($storage1, $storage2, $internalPath1, $internalPath2);
					}
				}

				$this->changeLock($path1, ILockingProvider::LOCK_SHARED, true);
				$this->changeLock($path2, ILockingProvider::LOCK_SHARED, true);

				if ((Cache\Scanner::isPartialFile($path1) && !Cache\Scanner::isPartialFile($path2)) && $result !== false) {
					if ($this->shouldEmitHooks()) {
						$this->emit_file_hooks_post($exists, $path2);
					}
				} elseif ($result) {
					if ($this->shouldEmitHooks($path1) and $this->shouldEmitHooks($path2)) {
						\OC_Hook::emit(
							Filesystem::CLASSNAME,
							Filesystem::signal_post_rename,
							[
								Filesystem::signal_param_oldpath => $this->getHookPath($path1),
								Filesystem::signal_param_newpath => $this->getHookPath($path2)
							]
						);
					}
				}
			}
			$this->unlockFile($path1, ILockingProvider::LOCK_SHARED, true);
			$this->unlockFile($path2, ILockingProvider::LOCK_SHARED, true);
		}
		return $result;
	}

	/**
	 * Copy a file/folder from the source path to target path
	 *
	 * @param string $path1 source path
	 * @param string $path2 target path
	 * @param bool $preserveMtime whether to preserve mtime on the copy
	 * @param bool $getDecryptedFile whether to keep a decrypted file
	 *
	 * @return bool|mixed
	 */
	public function copyCustom($path1, $path2, $preserveMtime = false, $getDecryptedFile = false) {
		$absolutePath1 = Filesystem::normalizePath($this->getAbsolutePath($path1));
		$absolutePath2 = Filesystem::normalizePath($this->getAbsolutePath($path2));
		$result = false;
		if (
			Filesystem::isValidPath($path2)
			and Filesystem::isValidPath($path1)
			and !Filesystem::isForbiddenFileOrDir($path2)
		) {
			$path1 = $this->getRelativePath($absolutePath1);
			$path2 = $this->getRelativePath($absolutePath2);

			if ($path1 == null or $path2 == null) {
				return false;
			}
			$run = true;

			$this->lockFile($path2, ILockingProvider::LOCK_SHARED);
			$this->lockFile($path1, ILockingProvider::LOCK_SHARED);
			$lockTypePath1 = ILockingProvider::LOCK_SHARED;
			$lockTypePath2 = ILockingProvider::LOCK_SHARED;

			try {

				$exists = $this->file_exists($path2);
				if ($this->shouldEmitHooks()) {
					\OC_Hook::emit(
						Filesystem::CLASSNAME,
						Filesystem::signal_copy,
						[
							Filesystem::signal_param_oldpath => $this->getHookPath($path1),
							Filesystem::signal_param_newpath => $this->getHookPath($path2),
							Filesystem::signal_param_run => &$run
						]
					);
					$this->emit_file_hooks_pre($exists, $path2, $run);
				}
				if ($run) {
					$mount1 = $this->getMount($path1);
					$mount2 = $this->getMount($path2);
					$storage1 = $mount1->getStorage();
					$internalPath1 = $mount1->getInternalPath($absolutePath1);
					$storage2 = $mount2->getStorage();
					$internalPath2 = $mount2->getInternalPath($absolutePath2);

					$this->changeLock($path2, ILockingProvider::LOCK_EXCLUSIVE);
					$lockTypePath2 = ILockingProvider::LOCK_EXCLUSIVE;

					if ($mount1->getMountPoint() == $mount2->getMountPoint()) {
						if ($storage1) {
							$result = $storage1->copyCustom($internalPath1, $internalPath2, $getDecryptedFile);
						} else {
							$result = false;
						}
					} else {
						$result = $storage2->copyFromStorage($storage1, $internalPath1, $internalPath2);
					}

					$this->writeUpdate($storage2, $internalPath2);

					$this->changeLock($path2, ILockingProvider::LOCK_SHARED);
					$lockTypePath2 = ILockingProvider::LOCK_SHARED;

					if ($this->shouldEmitHooks() && $result !== false) {
						\OC_Hook::emit(
							Filesystem::CLASSNAME,
							Filesystem::signal_post_copy,
							[
								Filesystem::signal_param_oldpath => $this->getHookPath($path1),
								Filesystem::signal_param_newpath => $this->getHookPath($path2)
							]
						);
						$this->emit_file_hooks_post($exists, $path2);
					}

				}
			} catch (\Exception $e) {
				$this->unlockFile($path2, $lockTypePath2);
				$this->unlockFile($path1, $lockTypePath1);
				throw $e;
			}

			$this->unlockFile($path2, $lockTypePath2);
			$this->unlockFile($path1, $lockTypePath1);

		}
		return $result;
	}

	private function shouldEmitHooks($path = '') {
		if ($path && Cache\Scanner::isPartialFile($path)) {
			return false;
		}
		if (!Filesystem::$loaded) {
			return false;
		}
		$defaultRoot = Filesystem::getRoot();
		if ($defaultRoot === null) {
			return false;
		}
		if ($this->fakeRoot === $defaultRoot) {
			return true;
		}
		$fullPath = $this->getAbsolutePath($path);

		if ($fullPath === $defaultRoot) {
			return true;
		}

		return (strlen($fullPath) > strlen($defaultRoot)) && (substr($fullPath, 0, strlen($defaultRoot) + 1) === $defaultRoot . '/');
	}
}
