<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

/**
 * Class to provide access to ownCloud filesystem via a "view", and methods for
 * working with files within that view (e.g. read, write, delete, etc.). Each
 * view is restricted to a set of directories via a virtual root. The default view
 * uses the currently logged in user's data directory as root (parts of
 * OC_Filesystem are merely a wrapper for OC\Files\View).
 *
 * Apps that need to access files outside of the user data folders (to modify files
 * belonging to a user other than the one currently logged in, for example) should
 * use this class directly rather than using OC_Filesystem, or making use of PHP's
 * built-in file manipulation functions. This will ensure all hooks and proxies
 * are triggered correctly.
 *
 * Filesystem functions are not called directly; they are passed to the correct
 * \OC\Files\Storage\Storage object
 */

namespace OC\Files;

use OC\Files\Cache\Updater;
use OC\Files\Mount\MoveableMount;

class View {
	private $fakeRoot = '';

	public function __construct($root = '') {
		$this->fakeRoot = $root;
	}

	public function getAbsolutePath($path = '/') {
		$this->assertPathLength($path);
		if ($path === '') {
			$path = '/';
		}
		if ($path[0] !== '/') {
			$path = '/' . $path;
		}
		return $this->fakeRoot . $path;
	}

	/**
	 * change the root to a fake root
	 *
	 * @param string $fakeRoot
	 * @return boolean|null
	 */
	public function chroot($fakeRoot) {
		if (!$fakeRoot == '') {
			if ($fakeRoot[0] !== '/') {
				$fakeRoot = '/' . $fakeRoot;
			}
		}
		$this->fakeRoot = $fakeRoot;
	}

	/**
	 * get the fake root
	 *
	 * @return string
	 */
	public function getRoot() {
		return $this->fakeRoot;
	}

	/**
	 * get path relative to the root of the view
	 *
	 * @param string $path
	 * @return string
	 */
	public function getRelativePath($path) {
		$this->assertPathLength($path);
		if ($this->fakeRoot == '') {
			return $path;
		}
		if (strpos($path, $this->fakeRoot) !== 0) {
			return null;
		} else {
			$path = substr($path, strlen($this->fakeRoot));
			if (strlen($path) === 0) {
				return '/';
			} else {
				return $path;
			}
		}
	}

	/**
	 * get the mountpoint of the storage object for a path
	 * ( note: because a storage is not always mounted inside the fakeroot, the
	 * returned mountpoint is relative to the absolute root of the filesystem
	 * and doesn't take the chroot into account )
	 *
	 * @param string $path
	 * @return string
	 */
	public function getMountPoint($path) {
		return Filesystem::getMountPoint($this->getAbsolutePath($path));
	}

	/**
	 * resolve a path to a storage and internal path
	 *
	 * @param string $path
	 * @return array an array consisting of the storage and the internal path
	 */
	public function resolvePath($path) {
		$a = $this->getAbsolutePath($path);
		$p = Filesystem::normalizePath($a);
		return Filesystem::resolvePath($p);
	}

	/**
	 * return the path to a local version of the file
	 * we need this because we can't know if a file is stored local or not from
	 * outside the filestorage and for some purposes a local file is needed
	 *
	 * @param string $path
	 * @return string
	 */
	public function getLocalFile($path) {
		$parent = substr($path, 0, strrpos($path, '/'));
		$path = $this->getAbsolutePath($path);
		list($storage, $internalPath) = Filesystem::resolvePath($path);
		if (Filesystem::isValidPath($parent) and $storage) {
			return $storage->getLocalFile($internalPath);
		} else {
			return null;
		}
	}

	/**
	 * @param string $path
	 * @return string
	 */
	public function getLocalFolder($path) {
		$parent = substr($path, 0, strrpos($path, '/'));
		$path = $this->getAbsolutePath($path);
		list($storage, $internalPath) = Filesystem::resolvePath($path);
		if (Filesystem::isValidPath($parent) and $storage) {
			return $storage->getLocalFolder($internalPath);
		} else {
			return null;
		}
	}

	/**
	 * the following functions operate with arguments and return values identical
	 * to those of their PHP built-in equivalents. Mostly they are merely wrappers
	 * for \OC\Files\Storage\Storage via basicOperation().
	 */
	public function mkdir($path) {
		return $this->basicOperation('mkdir', $path, array('create', 'write'));
	}

	public function rmdir($path) {
		if ($this->is_dir($path)) {
			return $this->basicOperation('rmdir', $path, array('delete'));
		} else {
			return false;
		}
	}

	/**
	 * @param string $path
	 * @return resource
	 */
	public function opendir($path) {
		return $this->basicOperation('opendir', $path, array('read'));
	}

	public function readdir($handle) {
		$fsLocal = new Storage\Local(array('datadir' => '/'));
		return $fsLocal->readdir($handle);
	}

	public function is_dir($path) {
		if ($path == '/') {
			return true;
		}
		return $this->basicOperation('is_dir', $path);
	}

	public function is_file($path) {
		if ($path == '/') {
			return false;
		}
		return $this->basicOperation('is_file', $path);
	}

	public function stat($path) {
		return $this->basicOperation('stat', $path);
	}

	public function filetype($path) {
		return $this->basicOperation('filetype', $path);
	}

	public function filesize($path) {
		return $this->basicOperation('filesize', $path);
	}

	public function readfile($path) {
		$this->assertPathLength($path);
		@ob_end_clean();
		$handle = $this->fopen($path, 'rb');
		if ($handle) {
			$chunkSize = 8192; // 8 kB chunks
			while (!feof($handle)) {
				echo fread($handle, $chunkSize);
				flush();
			}
			$size = $this->filesize($path);
			return $size;
		}
		return false;
	}

	public function isCreatable($path) {
		return $this->basicOperation('isCreatable', $path);
	}

	public function isReadable($path) {
		return $this->basicOperation('isReadable', $path);
	}

	public function isUpdatable($path) {
		return $this->basicOperation('isUpdatable', $path);
	}

	public function isDeletable($path) {
		return $this->basicOperation('isDeletable', $path);
	}

	public function isSharable($path) {
		return $this->basicOperation('isSharable', $path);
	}

	public function file_exists($path) {
		if ($path == '/') {
			return true;
		}
		return $this->basicOperation('file_exists', $path);
	}

	public function filemtime($path) {
		return $this->basicOperation('filemtime', $path);
	}

	public function touch($path, $mtime = null) {
		if (!is_null($mtime) and !is_numeric($mtime)) {
			$mtime = strtotime($mtime);
		}

		$hooks = array('touch');

		if (!$this->file_exists($path)) {
			$hooks[] = 'create';
			$hooks[] = 'write';
		}
		$result = $this->basicOperation('touch', $path, $hooks, $mtime);
		if (!$result) { //if native touch fails, we emulate it by changing the mtime in the cache
			$this->putFileInfo($path, array('mtime' => $mtime));
		}
		return true;
	}

	public function file_get_contents($path) {
		return $this->basicOperation('file_get_contents', $path, array('read'));
	}

	protected function emit_file_hooks_pre($exists, $path, &$run) {
		if (!$exists) {
			\OC_Hook::emit(Filesystem::CLASSNAME, Filesystem::signal_create, array(
				Filesystem::signal_param_path => $this->getHookPath($path),
				Filesystem::signal_param_run => &$run,
			));
		} else {
			\OC_Hook::emit(Filesystem::CLASSNAME, Filesystem::signal_update, array(
				Filesystem::signal_param_path => $this->getHookPath($path),
				Filesystem::signal_param_run => &$run,
			));
		}
		\OC_Hook::emit(Filesystem::CLASSNAME, Filesystem::signal_write, array(
			Filesystem::signal_param_path => $this->getHookPath($path),
			Filesystem::signal_param_run => &$run,
		));
	}

	protected function emit_file_hooks_post($exists, $path) {
		if (!$exists) {
			\OC_Hook::emit(Filesystem::CLASSNAME, Filesystem::signal_post_create, array(
				Filesystem::signal_param_path => $this->getHookPath($path),
			));
		} else {
			\OC_Hook::emit(Filesystem::CLASSNAME, Filesystem::signal_post_update, array(
				Filesystem::signal_param_path => $this->getHookPath($path),
			));
		}
		\OC_Hook::emit(Filesystem::CLASSNAME, Filesystem::signal_post_write, array(
			Filesystem::signal_param_path => $this->getHookPath($path),
		));
	}

	public function file_put_contents($path, $data) {
		if (is_resource($data)) { //not having to deal with streams in file_put_contents makes life easier
			$absolutePath = Filesystem::normalizePath($this->getAbsolutePath($path));
			if (\OC_FileProxy::runPreProxies('file_put_contents', $absolutePath, $data)
				and Filesystem::isValidPath($path)
				and !Filesystem::isFileBlacklisted($path)
			) {
				$path = $this->getRelativePath($absolutePath);
				$exists = $this->file_exists($path);
				$run = true;
				if ($this->shouldEmitHooks($path)) {
					$this->emit_file_hooks_pre($exists, $path, $run);
				}
				if (!$run) {
					return false;
				}
				$target = $this->fopen($path, 'w');
				if ($target) {
					list ($count, $result) = \OC_Helper::streamCopy($data, $target);
					fclose($target);
					fclose($data);
					if ($this->shouldEmitHooks($path) && $result !== false) {
						Updater::writeHook(array(
							'path' => $this->getHookPath($path)
						));
						$this->emit_file_hooks_post($exists, $path);
					}
					\OC_FileProxy::runPostProxies('file_put_contents', $absolutePath, $count);
					return $result;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			$hooks = ($this->file_exists($path)) ? array('update', 'write') : array('create', 'write');
			return $this->basicOperation('file_put_contents', $path, $hooks, $data);
		}
	}

	public function unlink($path) {
		if ($path === '' || $path === '/') {
			// do not allow deleting the root
			return false;
		}
		$postFix = (substr($path, -1, 1) === '/') ? '/' : '';
		$absolutePath = Filesystem::normalizePath($this->getAbsolutePath($path));
		$mount = Filesystem::getMountManager()->find($absolutePath . $postFix);
		if ($mount->getInternalPath($absolutePath) === '') {
			if ($mount instanceof MoveableMount) {
				\OC_Hook::emit(
						Filesystem::CLASSNAME, "umount",
						array(Filesystem::signal_param_path => $path)
						);
				$result = $mount->removeMount();
				if ($result) {
					\OC_Hook::emit(
							Filesystem::CLASSNAME, "post_umount",
							array(Filesystem::signal_param_path => $path)
							);
				}
				return $result;
			} else {
				// do not allow deleting the storage's root / the mount point
				// because for some storages it might delete the whole contents
				// but isn't supposed to work that way
				return false;
			}
		}
		return $this->basicOperation('unlink', $path, array('delete'));
	}

	/**
	 * @param string $directory
	 */
	public function deleteAll($directory, $empty = false) {
		return $this->rmdir($directory);
	}

	public function rename($path1, $path2) {
		$postFix1 = (substr($path1, -1, 1) === '/') ? '/' : '';
		$postFix2 = (substr($path2, -1, 1) === '/') ? '/' : '';
		$absolutePath1 = Filesystem::normalizePath($this->getAbsolutePath($path1));
		$absolutePath2 = Filesystem::normalizePath($this->getAbsolutePath($path2));
		if (
			\OC_FileProxy::runPreProxies('rename', $absolutePath1, $absolutePath2)
			and Filesystem::isValidPath($path2)
			and Filesystem::isValidPath($path1)
			and !Filesystem::isFileBlacklisted($path2)
		) {
			$path1 = $this->getRelativePath($absolutePath1);
			$path2 = $this->getRelativePath($absolutePath2);
			$exists = $this->file_exists($path2);

			if ($path1 == null or $path2 == null) {
				return false;
			}
			$run = true;
			if ($this->shouldEmitHooks() && (Cache\Scanner::isPartialFile($path1) && !Cache\Scanner::isPartialFile($path2))) {
				// if it was a rename from a part file to a regular file it was a write and not a rename operation
				$this->emit_file_hooks_pre($exists, $path2, $run);
			} elseif ($this->shouldEmitHooks()) {
				\OC_Hook::emit(
					Filesystem::CLASSNAME, Filesystem::signal_rename,
					array(
						Filesystem::signal_param_oldpath => $this->getHookPath($path1),
						Filesystem::signal_param_newpath => $this->getHookPath($path2),
						Filesystem::signal_param_run => &$run
					)
				);
			}
			if ($run) {
				$mp1 = $this->getMountPoint($path1 . $postFix1);
				$mp2 = $this->getMountPoint($path2 . $postFix2);
				$manager = Filesystem::getMountManager();
				$mount = $manager->find($absolutePath1 . $postFix1);
				$storage1 = $mount->getStorage();
				$internalPath1 = $mount->getInternalPath($absolutePath1 . $postFix1);
				list(, $internalPath2) = Filesystem::resolvePath($absolutePath2 . $postFix2);
				if ($internalPath1 === '' and $mount instanceof MoveableMount) {
					/**
					 * @var \OC\Files\Mount\Mount | \OC\Files\Mount\MoveableMount $mount
					 */
					$sourceMountPoint = $mount->getMountPoint();
					$result = $mount->moveMount($absolutePath2);
					$manager->moveMount($sourceMountPoint, $mount->getMountPoint());
					\OC_FileProxy::runPostProxies('rename', $absolutePath1, $absolutePath2);
				} elseif ($mp1 == $mp2) {
					if ($storage1) {
						$result = $storage1->rename($internalPath1, $internalPath2);
						\OC_FileProxy::runPostProxies('rename', $absolutePath1, $absolutePath2);
					} else {
						$result = false;
					}
				} else {
					if ($this->is_dir($path1)) {
						$result = $this->copy($path1, $path2);
						if ($result === true) {
							$result = $storage1->rmdir($internalPath1);
						}
					} else {
						$source = $this->fopen($path1 . $postFix1, 'r');
						$target = $this->fopen($path2 . $postFix2, 'w');
						list($count, $result) = \OC_Helper::streamCopy($source, $target);

						// close open handle - especially $source is necessary because unlink below will
						// throw an exception on windows because the file is locked
						fclose($source);
						fclose($target);

						if ($result !== false) {
							$storage1->unlink($internalPath1);
						}
					}
				}
				if ($this->shouldEmitHooks() && (Cache\Scanner::isPartialFile($path1) && !Cache\Scanner::isPartialFile($path2)) && $result !== false) {
					// if it was a rename from a part file to a regular file it was a write and not a rename operation
					Updater::writeHook(array('path' => $this->getHookPath($path2)));
					$this->emit_file_hooks_post($exists, $path2);
				} elseif ($this->shouldEmitHooks() && $result !== false) {
					Updater::renameHook(array(
						'oldpath' => $this->getHookPath($path1),
						'newpath' => $this->getHookPath($path2)
					));
					\OC_Hook::emit(
						Filesystem::CLASSNAME,
						Filesystem::signal_post_rename,
						array(
							Filesystem::signal_param_oldpath => $this->getHookPath($path1),
							Filesystem::signal_param_newpath => $this->getHookPath($path2)
						)
					);
				}
				return $result;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function copy($path1, $path2) {
		$postFix1 = (substr($path1, -1, 1) === '/') ? '/' : '';
		$postFix2 = (substr($path2, -1, 1) === '/') ? '/' : '';
		$absolutePath1 = Filesystem::normalizePath($this->getAbsolutePath($path1));
		$absolutePath2 = Filesystem::normalizePath($this->getAbsolutePath($path2));
		if (
			\OC_FileProxy::runPreProxies('copy', $absolutePath1, $absolutePath2)
			and Filesystem::isValidPath($path2)
			and Filesystem::isValidPath($path1)
			and !Filesystem::isFileBlacklisted($path2)
		) {
			$path1 = $this->getRelativePath($absolutePath1);
			$path2 = $this->getRelativePath($absolutePath2);

			if ($path1 == null or $path2 == null) {
				return false;
			}
			$run = true;
			$exists = $this->file_exists($path2);
			if ($this->shouldEmitHooks()) {
				\OC_Hook::emit(
					Filesystem::CLASSNAME,
					Filesystem::signal_copy,
					array(
						Filesystem::signal_param_oldpath => $this->getHookPath($path1),
						Filesystem::signal_param_newpath => $this->getHookPath($path2),
						Filesystem::signal_param_run => &$run
					)
				);
				$this->emit_file_hooks_pre($exists, $path2, $run);
			}
			if ($run) {
				$mp1 = $this->getMountPoint($path1 . $postFix1);
				$mp2 = $this->getMountPoint($path2 . $postFix2);
				if ($mp1 == $mp2) {
					list($storage, $internalPath1) = Filesystem::resolvePath($absolutePath1 . $postFix1);
					list(, $internalPath2) = Filesystem::resolvePath($absolutePath2 . $postFix2);
					if ($storage) {
						$result = $storage->copy($internalPath1, $internalPath2);
					} else {
						$result = false;
					}
				} else {
					if ($this->is_dir($path1) && ($dh = $this->opendir($path1))) {
						$result = $this->mkdir($path2);
						if (is_resource($dh)) {
							while (($file = readdir($dh)) !== false) {
								if (!Filesystem::isIgnoredDir($file)) {
									$result = $this->copy($path1 . '/' . $file, $path2 . '/' . $file);
								}
							}
						}
					} else {
						$source = $this->fopen($path1 . $postFix1, 'r');
						$target = $this->fopen($path2 . $postFix2, 'w');
						list($count, $result) = \OC_Helper::streamCopy($source, $target);
						fclose($source);
						fclose($target);
					}
				}
				if ($this->shouldEmitHooks() && $result !== false) {
					\OC_Hook::emit(
						Filesystem::CLASSNAME,
						Filesystem::signal_post_copy,
						array(
							Filesystem::signal_param_oldpath => $this->getHookPath($path1),
							Filesystem::signal_param_newpath => $this->getHookPath($path2)
						)
					);
					$this->emit_file_hooks_post($exists, $path2);
				}
				return $result;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	 * @param string $path
	 * @param string $mode
	 * @return resource
	 */
	public function fopen($path, $mode) {
		$hooks = array();
		switch ($mode) {
			case 'r':
			case 'rb':
				$hooks[] = 'read';
				break;
			case 'r+':
			case 'rb+':
			case 'w+':
			case 'wb+':
			case 'x+':
			case 'xb+':
			case 'a+':
			case 'ab+':
				$hooks[] = 'read';
				$hooks[] = 'write';
				break;
			case 'w':
			case 'wb':
			case 'x':
			case 'xb':
			case 'a':
			case 'ab':
				$hooks[] = 'write';
				break;
			default:
				\OC_Log::write('core', 'invalid mode (' . $mode . ') for ' . $path, \OC_Log::ERROR);
		}

		return $this->basicOperation('fopen', $path, $hooks, $mode);
	}

	public function toTmpFile($path) {
		$this->assertPathLength($path);
		if (Filesystem::isValidPath($path)) {
			$source = $this->fopen($path, 'r');
			if ($source) {
				$extension = pathinfo($path, PATHINFO_EXTENSION);
				$tmpFile = \OC_Helper::tmpFile($extension);
				file_put_contents($tmpFile, $source);
				return $tmpFile;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function fromTmpFile($tmpFile, $path) {
		$this->assertPathLength($path);
		if (Filesystem::isValidPath($path)) {

			// Get directory that the file is going into
			$filePath = dirname($path);

			// Create the directories if any
			if (!$this->file_exists($filePath)) {
				$this->mkdir($filePath);
			}

			if (!$tmpFile) {
				debug_print_backtrace();
			}

			$source = fopen($tmpFile, 'r');
			if ($source) {
				$this->file_put_contents($path, $source);
				unlink($tmpFile);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function getMimeType($path) {
		$this->assertPathLength($path);
		return $this->basicOperation('getMimeType', $path);
	}

	public function hash($type, $path, $raw = false) {
		$postFix = (substr($path, -1, 1) === '/') ? '/' : '';
		$absolutePath = Filesystem::normalizePath($this->getAbsolutePath($path));
		if (\OC_FileProxy::runPreProxies('hash', $absolutePath) && Filesystem::isValidPath($path)) {
			$path = $this->getRelativePath($absolutePath);
			if ($path == null) {
				return false;
			}
			if ($this->shouldEmitHooks($path)) {
				\OC_Hook::emit(
					Filesystem::CLASSNAME,
					Filesystem::signal_read,
					array(Filesystem::signal_param_path => $this->getHookPath($path))
				);
			}
			list($storage, $internalPath) = Filesystem::resolvePath($absolutePath . $postFix);
			if ($storage) {
				$result = $storage->hash($type, $internalPath, $raw);
				$result = \OC_FileProxy::runPostProxies('hash', $absolutePath, $result);
				return $result;
			}
		}
		return null;
	}

	public function free_space($path = '/') {
		$this->assertPathLength($path);
		return $this->basicOperation('free_space', $path);
	}

	/**
	 * abstraction layer for basic filesystem functions: wrapper for \OC\Files\Storage\Storage
	 *
	 * @param string $operation
	 * @param string $path
	 * @param array $hooks (optional)
	 * @param mixed $extraParam (optional)
	 * @return mixed
	 *
	 * This method takes requests for basic filesystem functions (e.g. reading & writing
	 * files), processes hooks and proxies, sanitises paths, and finally passes them on to
	 * \OC\Files\Storage\Storage for delegation to a storage backend for execution
	 */
	private function basicOperation($operation, $path, $hooks = array(), $extraParam = null) {
		$postFix = (substr($path, -1, 1) === '/') ? '/' : '';
		$absolutePath = Filesystem::normalizePath($this->getAbsolutePath($path));
		if (\OC_FileProxy::runPreProxies($operation, $absolutePath, $extraParam)
			and Filesystem::isValidPath($path)
			and !Filesystem::isFileBlacklisted($path)
		) {
			$path = $this->getRelativePath($absolutePath);
			if ($path == null) {
				return false;
			}

			$run = $this->runHooks($hooks, $path);
			list($storage, $internalPath) = Filesystem::resolvePath($absolutePath . $postFix);
			if ($run and $storage) {
				if (!is_null($extraParam)) {
					$result = $storage->$operation($internalPath, $extraParam);
				} else {
					$result = $storage->$operation($internalPath);
				}
				$result = \OC_FileProxy::runPostProxies($operation, $this->getAbsolutePath($path), $result);
				if ($this->shouldEmitHooks($path) && $result !== false) {
					if ($operation != 'fopen') { //no post hooks for fopen, the file stream is still open
						$this->runHooks($hooks, $path, true);
					}
				}
				return $result;
			}
		}
		return null;
	}

	/**
	 * get the path relative to the default root for hook usage
	 *
	 * @param string $path
	 * @return string
	 */
	private function getHookPath($path) {
		if (!Filesystem::getView()) {
			return $path;
		}
		return Filesystem::getView()->getRelativePath($this->getAbsolutePath($path));
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
		return (strlen($this->fakeRoot) > strlen($defaultRoot)) && (substr($this->fakeRoot, 0, strlen($defaultRoot) + 1) === $defaultRoot . '/');
	}

	/**
	 * @param string[] $hooks
	 * @param string $path
	 * @param bool $post
	 * @return bool
	 */
	private function runHooks($hooks, $path, $post = false) {
		$path = $this->getHookPath($path);
		$prefix = ($post) ? 'post_' : '';
		$run = true;
		if ($this->shouldEmitHooks($path)) {
			foreach ($hooks as $hook) {
				// manually triger updater hooks to ensure they are called first
				if ($post) {
					if ($hook == 'write') {
						Updater::writeHook(array('path' => $path));
					} elseif ($hook == 'touch') {
						Updater::touchHook(array('path' => $path));
					} else if ($hook == 'delete') {
						Updater::deleteHook(array('path' => $path));
					}
				}
				if ($hook != 'read') {
					\OC_Hook::emit(
						Filesystem::CLASSNAME,
						$prefix . $hook,
						array(
							Filesystem::signal_param_run => &$run,
							Filesystem::signal_param_path => $path
						)
					);
				} elseif (!$post) {
					\OC_Hook::emit(
						Filesystem::CLASSNAME,
						$prefix . $hook,
						array(
							Filesystem::signal_param_path => $path
						)
					);
				}
			}
		}
		return $run;
	}

	/**
	 * check if a file or folder has been updated since $time
	 *
	 * @param string $path
	 * @param int $time
	 * @return bool
	 */
	public function hasUpdated($path, $time) {
		return $this->basicOperation('hasUpdated', $path, array(), $time);
	}

	/**
	 * get the filesystem info
	 *
	 * @param string $path
	 * @param boolean|string $includeMountPoints true to add mountpoint sizes,
	 * 'ext' to add only ext storage mount point sizes. Defaults to true.
	 * defaults to true
	 * @return \OC\Files\FileInfo|false
	 */
	public function getFileInfo($path, $includeMountPoints = true) {
		$this->assertPathLength($path);
		$data = array();
		if (!Filesystem::isValidPath($path)) {
			return $data;
		}
		$path = Filesystem::normalizePath($this->fakeRoot . '/' . $path);
		/**
		 * @var \OC\Files\Storage\Storage $storage
		 * @var string $internalPath
		 */
		list($storage, $internalPath) = Filesystem::resolvePath($path);
		$data = null;
		if ($storage) {
			$cache = $storage->getCache($internalPath);

			if (!$cache->inCache($internalPath)) {
				if (!$storage->file_exists($internalPath)) {
					return false;
				}
				$scanner = $storage->getScanner($internalPath);
				$scanner->scan($internalPath, Cache\Scanner::SCAN_SHALLOW);
			} else {
				$watcher = $storage->getWatcher($internalPath);
				$data = $watcher->checkUpdate($internalPath);
			}

			if (!is_array($data)) {
				$data = $cache->get($internalPath);
			}

			if ($data and isset($data['fileid'])) {
				if ($includeMountPoints and $data['mimetype'] === 'httpd/unix-directory') {
					//add the sizes of other mountpoints to the folder
					$extOnly = ($includeMountPoints === 'ext');
					$mountPoints = Filesystem::getMountPoints($path);
					foreach ($mountPoints as $mountPoint) {
						$subStorage = Filesystem::getStorage($mountPoint);
						if ($subStorage) {
							// exclude shared storage ?
							if ($extOnly && $subStorage instanceof \OC\Files\Storage\Shared) {
								continue;
							}
							$subCache = $subStorage->getCache('');
							$rootEntry = $subCache->get('');
							$data['size'] += isset($rootEntry['size']) ? $rootEntry['size'] : 0;
						}
					}
				}
			}
		}
		if (!$data) {
			return false;
		}

		$data = \OC_FileProxy::runPostProxies('getFileInfo', $path, $data);

		return new FileInfo($path, $storage, $internalPath, $data);
	}

	/**
	 * get the content of a directory
	 *
	 * @param string $directory path under datadirectory
	 * @param string $mimetype_filter limit returned content to this mimetype or mimepart
	 * @return FileInfo[]
	 */
	public function getDirectoryContent($directory, $mimetype_filter = '') {
		$this->assertPathLength($directory);
		$result = array();
		if (!Filesystem::isValidPath($directory)) {
			return $result;
		}
		$path = Filesystem::normalizePath($this->fakeRoot . '/' . $directory);
		list($storage, $internalPath) = Filesystem::resolvePath($path);
		if ($storage) {
			$cache = $storage->getCache($internalPath);
			$user = \OC_User::getUser();

			if ($cache->getStatus($internalPath) < Cache\Cache::COMPLETE) {
				$scanner = $storage->getScanner($internalPath);
				$scanner->scan($internalPath, Cache\Scanner::SCAN_SHALLOW);
			} else {
				$watcher = $storage->getWatcher($internalPath);
				$watcher->checkUpdate($internalPath);
			}

			$folderId = $cache->getId($internalPath);
			$files = array();
			$contents = $cache->getFolderContents($internalPath, $folderId); //TODO: mimetype_filter
			foreach ($contents as $content) {
				$files[] = new FileInfo($path . '/' . $content['name'], $storage, $content['path'], $content);
			}

			$ids = array();
			foreach ($files as $i => $file) {
				$files[$i]['type'] = $file['mimetype'] === 'httpd/unix-directory' ? 'dir' : 'file';
				$ids[] = $file['fileid'];

				if (!isset($permissions[$file['fileid']])) {
					$permissions[$file['fileid']] = $storage->getPermissions($file['path']);
				}
				$files[$i]['permissions'] = $permissions[$file['fileid']];
			}

			//add a folder for any mountpoint in this directory and add the sizes of other mountpoints to the folders
			$mounts = Filesystem::getMountManager()->findIn($path);
			$dirLength = strlen($path);
			foreach ($mounts as $mount) {
				$mountPoint = $mount->getMountPoint();
				$subStorage = Filesystem::getStorage($mountPoint);
				if ($subStorage) {
					$subCache = $subStorage->getCache('');

					if ($subCache->getStatus('') === Cache\Cache::NOT_FOUND) {
						$subScanner = $subStorage->getScanner('');
						$subScanner->scanFile('');
					}

					$rootEntry = $subCache->get('');
					if ($rootEntry) {
						$relativePath = trim(substr($mountPoint, $dirLength), '/');
						if ($pos = strpos($relativePath, '/')) {
							//mountpoint inside subfolder add size to the correct folder
							$entryName = substr($relativePath, 0, $pos);
							foreach ($files as &$entry) {
								if ($entry['name'] === $entryName) {
									$entry['size'] += $rootEntry['size'];
								}
							}
						} else { //mountpoint in this folder, add an entry for it
							$rootEntry['name'] = $relativePath;
							$rootEntry['type'] = $rootEntry['mimetype'] === 'httpd/unix-directory' ? 'dir' : 'file';
							$permissions = $rootEntry['permissions'];
							// do not allow renaming/deleting the mount point if they are not shared files/folders
							// for shared files/folders we use the permissions given by the owner
							if ($mount instanceof MoveableMount) {
								$rootEntry['permissions'] = $permissions | \OCP\PERMISSION_UPDATE | \OCP\PERMISSION_DELETE;
							} else {
								$rootEntry['permissions'] = $permissions & (\OCP\PERMISSION_ALL - (\OCP\PERMISSION_UPDATE | \OCP\PERMISSION_DELETE));
							}

							//remove any existing entry with the same name
							foreach ($files as $i => $file) {
								if ($file['name'] === $rootEntry['name']) {
									unset($files[$i]);
									break;
								}
							}
							$rootEntry['path'] = substr($path . '/' . $rootEntry['name'], strlen($user) + 2); // full path without /$user/
							$files[] = new FileInfo($path . '/' . $rootEntry['name'], $subStorage, '', $rootEntry);
						}
					}
				}
			}

			if ($mimetype_filter) {
				foreach ($files as $file) {
					if (strpos($mimetype_filter, '/')) {
						if ($file['mimetype'] === $mimetype_filter) {
							$result[] = $file;
						}
					} else {
						if ($file['mimepart'] === $mimetype_filter) {
							$result[] = $file;
						}
					}
				}
			} else {
				$result = $files;
			}
		}

		return $result;
	}

	/**
	 * change file metadata
	 *
	 * @param string $path
	 * @param array|\OCP\Files\FileInfo $data
	 * @return int
	 *
	 * returns the fileid of the updated file
	 */
	public function putFileInfo($path, $data) {
		$this->assertPathLength($path);
		if ($data instanceof FileInfo) {
			$data = $data->getData();
		}
		$path = Filesystem::normalizePath($this->fakeRoot . '/' . $path);
		/**
		 * @var \OC\Files\Storage\Storage $storage
		 * @var string $internalPath
		 */
		list($storage, $internalPath) = Filesystem::resolvePath($path);
		if ($storage) {
			$cache = $storage->getCache($path);

			if (!$cache->inCache($internalPath)) {
				$scanner = $storage->getScanner($internalPath);
				$scanner->scan($internalPath, Cache\Scanner::SCAN_SHALLOW);
			}

			return $cache->put($internalPath, $data);
		} else {
			return -1;
		}
	}

	/**
	 * search for files with the name matching $query
	 *
	 * @param string $query
	 * @return FileInfo[]
	 */
	public function search($query) {
		return $this->searchCommon('%' . $query . '%', 'search');
	}

	/**
	 * search for files by mimetype
	 *
	 * @param string $mimetype
	 * @return FileInfo[]
	 */
	public function searchByMime($mimetype) {
		return $this->searchCommon($mimetype, 'searchByMime');
	}

	/**
	 * @param string $query
	 * @param string $method
	 * @return FileInfo[]
	 */
	private function searchCommon($query, $method) {
		$files = array();
		$rootLength = strlen($this->fakeRoot);

		$mountPoint = Filesystem::getMountPoint($this->fakeRoot);
		$storage = Filesystem::getStorage($mountPoint);
		if ($storage) {
			$cache = $storage->getCache('');

			$results = $cache->$method($query);
			foreach ($results as $result) {
				if (substr($mountPoint . $result['path'], 0, $rootLength + 1) === $this->fakeRoot . '/') {
					$internalPath = $result['path'];
					$result['path'] = substr($mountPoint . $result['path'], $rootLength);
					$files[] = new FileInfo($mountPoint . $result['path'], $storage, $internalPath, $result);
				}
			}

			$mountPoints = Filesystem::getMountPoints($this->fakeRoot);
			foreach ($mountPoints as $mountPoint) {
				$storage = Filesystem::getStorage($mountPoint);
				if ($storage) {
					$cache = $storage->getCache('');

					$relativeMountPoint = substr($mountPoint, $rootLength);
					$results = $cache->$method($query);
					if ($results) {
						foreach ($results as $result) {
							$internalPath = $result['path'];
							$result['path'] = rtrim($relativeMountPoint . $result['path'], '/');
							$path = rtrim($mountPoint . $internalPath, '/');
							$files[] = new FileInfo($path, $storage, $internalPath, $result);
						}
					}
				}
			}
		}
		return $files;
	}

	/**
	 * Get the owner for a file or folder
	 *
	 * @param string $path
	 * @return string
	 */
	public function getOwner($path) {
		return $this->basicOperation('getOwner', $path);
	}

	/**
	 * get the ETag for a file or folder
	 *
	 * @param string $path
	 * @return string
	 */
	public function getETag($path) {
		/**
		 * @var Storage\Storage $storage
		 * @var string $internalPath
		 */
		list($storage, $internalPath) = $this->resolvePath($path);
		if ($storage) {
			return $storage->getETag($internalPath);
		} else {
			return null;
		}
	}

	/**
	 * Get the path of a file by id, relative to the view
	 *
	 * Note that the resulting path is not guarantied to be unique for the id, multiple paths can point to the same file
	 *
	 * @param int $id
	 * @return string|null
	 */
	public function getPath($id) {
		$manager = Filesystem::getMountManager();
		$mounts = $manager->findIn($this->fakeRoot);
		$mounts[] = $manager->find($this->fakeRoot);
		// reverse the array so we start with the storage this view is in
		// which is the most likely to contain the file we're looking for
		$mounts = array_reverse($mounts);
		foreach ($mounts as $mount) {
			/**
			 * @var \OC\Files\Mount\Mount $mount
			 */
			if ($mount->getStorage()) {
				$cache = $mount->getStorage()->getCache();
				$internalPath = $cache->getPathById($id);
				if (is_string($internalPath)) {
					$fullPath = $mount->getMountPoint() . $internalPath;
					if (!is_null($path = $this->getRelativePath($fullPath))) {
						return $path;
					}
				}
			}
		}
		return null;
	}

	private function assertPathLength($path) {
		$maxLen = min(PHP_MAXPATHLEN, 4000);
		$pathLen = strlen($path);
		if ($pathLen > $maxLen) {
			throw new \OCP\Files\InvalidPathException("Path length($pathLen) exceeds max path length($maxLen): $path");
		}
	}
}
