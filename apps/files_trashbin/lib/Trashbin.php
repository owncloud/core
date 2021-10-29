<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Bastien Ho <bastienho@urbancube.fr>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Florin Peter <github@florin-peter.de>
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Qingping Hou <dave2008713@gmail.com>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Sjors van der Pluijm <sjors@desjors.nl>
 * @author Steven Bühner <buehner@me.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OCA\Files_Trashbin;

use OC\Files\Filesystem;
use OC\Files\View;
use OCA\Files_Trashbin\Command\Expire;
use OCP\Encryption\Keys\IStorage;
use OCP\Files\ForbiddenException;
use OCP\Files\NotFoundException;
use OCP\Files\StorageNotAvailableException;
use OCP\Lock\LockedException;
use OCP\User;
use Symfony\Component\EventDispatcher\GenericEvent;
use OCP\Files\Folder;
use OCP\Files\IRootFolder;
use OCP\IURLGenerator;
use Symfony\Component\EventDispatcher\EventDispatcher;

class Trashbin {

	/**
	 * @var IURLGenerator
	 */
	private $urlGenerator;

	/**
	 * @var IRootFolder
	 */
	private $rootFolder;

	/**
	 * @var EventDispatcher
	 */
	private $eventDispatcher;

	public function __construct(
		IRootFolder $rootFolder,
		IUrlGenerator $urlGenerator,
		EventDispatcher $eventDispatcher
	) {
		$this->rootFolder = $rootFolder;
		$this->urlGenerator = $urlGenerator;
		$this->eventDispatcher = $eventDispatcher;
	}

	/**
	 * Whether versions have already be rescanned during this PHP request
	 *
	 * @var bool
	 */
	private static $scannedVersions = false;

	/**
	 * Ensure we don't need to scan the file during the move to trash
	 * by triggering the scan in the pre-hook
	 *
	 * @param array $params
	 */
	public static function ensureFileScannedHook($params) {
		try {
			self::getUidAndFilename($params['path']);
		} catch (NotFoundException $e) {
			// nothing to scan for non existing files
		}
	}

	/**
	 * get the UID of the owner of the file and the path to the file relative to
	 * owners files folder
	 *
	 * @param string $filename
	 * @return array
	 * @throws \OC\User\NoUserException
	 */
	public static function getUidAndFilename($filename) {
		$uid = Filesystem::getOwner($filename);
		$userManager = \OC::$server->getUserManager();
		// if the user with the UID doesn't exists, e.g. because the UID points
		// to a remote user with a federated cloud ID we use the current logged-in
		// user. We need a valid local user to move the file to the right trash bin
		if (!$userManager->userExists($uid)) {
			$uid = User::getUser();
		}
		if (!$uid) {
			// no owner, usually because of share link from ext storage
			return [null, null];
		}
		Filesystem::initMountPoints($uid);
		if ($uid != User::getUser()) {
			$info = Filesystem::getFileInfo($filename);
			$ownerView = new View('/' . $uid . '/files');
			try {
				$filename = $ownerView->getPath($info['fileid']);
			} catch (NotFoundException $e) {
				$filename = null;
			}
		}
		return [$uid, $filename];
	}

	/**
	 * get original location of files for user
	 *
	 * @param string $user
	 * @return array (filename => array (timestamp => original location))
	 */
	public static function getLocations($user) {
		$query = \OC_DB::prepare('SELECT `id`, `timestamp`, `location`'
			. ' FROM `*PREFIX*files_trash` WHERE `user`=?');
		$result = $query->execute([$user]);
		$array = [];
		while ($row = $result->fetchRow()) {
			if (isset($array[$row['id']])) {
				$array[$row['id']][$row['timestamp']] = $row['location'];
			} else {
				$array[$row['id']] = [$row['timestamp'] => $row['location']];
			}
		}
		return $array;
	}

	/**
	 * get original location of file
	 *
	 * @param string $user
	 * @param string $filename
	 * @param string $timestamp
	 * @return string original location
	 */
	public static function getLocation($user, $filename, $timestamp) {
		$query = \OC_DB::prepare('SELECT `location` FROM `*PREFIX*files_trash`'
			. ' WHERE `user`=? AND `id`=? AND `timestamp`=?');
		$result = $query->execute([$user, $filename, $timestamp])->fetchAll();
		if (isset($result[0]['location'])) {
			return $result[0]['location'];
		} else {
			return false;
		}
	}

	/**
	 * Sets up the trashbin for the given user
	 *
	 * @param string $user user id
	 * @return bool true if trashbin is setup and usable, false otherwise
	 */
	private static function setUpTrash($user) {
		$view = new View('/' . $user);
		if (!$view->is_dir('files_trashbin')) {
			$view->mkdir('files_trashbin');
		}

		if (!$view->isUpdatable('files_trashbin')) {
			// no trashbin access or denied
			return false;
		}

		if (!$view->is_dir('files_trashbin/files')) {
			$view->mkdir('files_trashbin/files');
		}
		if (!$view->is_dir('files_trashbin/versions')) {
			$view->mkdir('files_trashbin/versions');
		}
		if (!$view->is_dir('files_trashbin/keys')) {
			$view->mkdir('files_trashbin/keys');
		}

		return true;
	}

	/**
	 * copy file to owners trash
	 *
	 * @param string $sourcePath
	 * @param string $owner
	 * @param string $targetPath
	 * @param $user
	 * @param integer $timestamp
	 */
	private static function copyFilesToUser($sourcePath, $owner, $targetPath, $user, $timestamp) {
		self::setUpTrash($owner);

		$targetFilename = \basename($targetPath);
		$targetLocation = \dirname($targetPath);

		$sourceFilename = \basename($sourcePath);

		$view = new View('/');

		$target = $user . '/files_trashbin/files/' . $targetFilename . '.d' . $timestamp;
		$source = $owner . '/files_trashbin/files/' . $sourceFilename . '.d' . $timestamp;
		self::copy_recursive($source, $target, $view);

		if ($view->file_exists($target)) {
			self::insertTrashEntry($user, $targetFilename, $targetLocation, $timestamp);
			self::scheduleExpire($user);
		}
	}

	/**
	 * Make a backup of a file into the trashbin for the owner
	 *
	 * @param string $ownerPath path relative to the owner's home folder and containing "files"
	 * @param string $owner user id of the owner
	 * @param int $timestamp deletion timestamp
	 */
	public static function copyBackupForOwner($ownerPath, $owner, $timestamp) {
		self::setUpTrash($owner);

		$targetFilename = \basename($ownerPath);
		$targetLocation = \dirname($ownerPath);
		$source = $owner . '/files/' . \ltrim($ownerPath, '/');
		$target = $owner . '/files_trashbin/files/' . $targetFilename . '.d' . $timestamp;

		$view = new View('/');
		self::copy_recursive($source, $target, $view);

		self::retainVersions($targetFilename, $owner, $ownerPath, $timestamp, null, true);

		if ($view->file_exists($target)) {
			self::insertTrashEntry($owner, $targetFilename, $targetLocation, $timestamp);
			self::scheduleExpire($owner);
		}
	}

	/**
	 *
	 */
	public static function insertTrashEntry($user, $targetFilename, $targetLocation, $timestamp) {
		$query = \OC_DB::prepare("INSERT INTO `*PREFIX*files_trash` (`id`,`timestamp`,`location`,`user`) VALUES (?,?,?,?)");
		$result = $query->execute([$targetFilename, $timestamp, $targetLocation, $user]);
		if (!$result) {
			\OCP\Util::writeLog('files_trashbin', 'trash bin database couldn\'t be updated for the files owner', \OCP\Util::ERROR);
		}
	}

	/**
	 * move file to the trash bin
	 *
	 * @param string $file_path path to the deleted file/directory relative to the files root directory
	 * @return bool|null true if the file is moved, false if there is an error, null if there
	 * isn't any trashbin available
	 */
	public static function move2trash($file_path) {
		// get the user for which the filesystem is setup
		$root = Filesystem::getRoot();
		list(, $user) = \explode('/', $root);
		list($owner, $ownerPath) = self::getUidAndFilename($file_path);

		// if no owner found (ex: ext storage + share link), will use the current user's trashbin then
		if ($owner === null) {
			$owner = $user;
			$ownerPath = $file_path;
		}

		$ownerView = new View('/' . $owner);
		// file has been deleted in between
		if ($ownerPath === null || $ownerPath === '' || !$ownerView->file_exists('/files/' . $ownerPath)) {
			return true;
		}

		if (!self::setUpTrash($user)) {
			// trashbin not usable for user (ex: guest), switch to owner only
			$user = $owner;
			if (!self::setUpTrash($owner)) {
				// nothing to do as no trash is available anywhere
				return null;
			}
		}
		if ($owner !== $user) {
			// also setup for owner
			self::setUpTrash($owner);
		}

		$path_parts = \pathinfo($ownerPath);

		$filename = $path_parts['basename'];
		$location = $path_parts['dirname'];
		$timestamp = \time();

		$trashPath = '/files_trashbin/files/' . $filename . '.d' . $timestamp;

		/** @var \OC\Files\Storage\Storage $trashStorage */
		list($trashStorage, $trashInternalPath) = $ownerView->resolvePath($trashPath);
		/** @var \OC\Files\Storage\Storage $sourceStorage */
		list($sourceStorage, $sourceInternalPath) = $ownerView->resolvePath('/files/' . $ownerPath);
		try {
			$moveSuccessful = true;
			if ($trashStorage->file_exists($trashInternalPath)) {
				$trashStorage->unlink($trashInternalPath);
			}
			$trashStorage->moveFromStorage($sourceStorage, $sourceInternalPath, $trashInternalPath);
		} catch (\OCA\Files_Trashbin\Exceptions\CopyRecursiveException $e) {
			$moveSuccessful = false;
			if ($trashStorage->file_exists($trashInternalPath)) {
				$trashStorage->unlink($trashInternalPath);
			}
			\OCP\Util::writeLog('files_trashbin', 'Couldn\'t move ' . $file_path . ' to the trash bin', \OCP\Util::ERROR);
		}

		if ($sourceStorage->file_exists($sourceInternalPath)) { // failed to delete the original file, abort
			if ($sourceStorage->is_dir($sourceInternalPath)) {
				$sourceStorage->rmdir($sourceInternalPath);
			} else {
				$sourceStorage->unlink($sourceInternalPath);
			}
			return false;
		}

		$trashStorage->getUpdater()->renameFromStorage($sourceStorage, $sourceInternalPath, $trashInternalPath);

		if ($moveSuccessful) {
			$query = \OC_DB::prepare("INSERT INTO `*PREFIX*files_trash` (`id`,`timestamp`,`location`,`user`) VALUES (?,?,?,?)");
			$result = $query->execute([$filename, $timestamp, $location, $owner]);
			if (!$result) {
				\OCP\Util::writeLog('files_trashbin', 'trash bin database couldn\'t be updated', \OCP\Util::ERROR);
			}
			\OCP\Util::emitHook('\OCA\Files_Trashbin\Trashbin', 'post_moveToTrash', ['filePath' => Filesystem::normalizePath($file_path),
				'trashPath' => Filesystem::normalizePath($filename . '.d' . $timestamp)]);

			self::retainVersions($filename, $owner, $ownerPath, $timestamp, $sourceStorage);

			// if owner !== user we need to also add a copy to the owners trash
			if ($user !== $owner) {
				self::copyFilesToUser($ownerPath, $owner, $file_path, $user, $timestamp);
			}
		}

		self::scheduleExpire($user);

		// if owner !== user we also need to update the owners trash size
		if ($owner !== $user) {
			self::scheduleExpire($owner);
		}

		return $moveSuccessful;
	}

	/**
	 * Move file versions to trash so that they can be restored later
	 *
	 * @param string $filename of deleted file
	 * @param string $owner owner user id
	 * @param string $ownerPath path relative to the owner's home storage
	 * @param integer $timestamp when the file was deleted
	 * @param IStorage|null $sourceStorage
	 * @param bool $forceCopy true to only make a copy of the versions into the trashbin
	 * @throws Exceptions\CopyRecursiveException
	 */
	private static function retainVersions($filename, $owner, $ownerPath, $timestamp, $sourceStorage = null, $forceCopy = false) {
		if (\OCP\App::isEnabled('files_versions') && !empty($ownerPath)) {
			$copyKeysResult = false;

			/**
			 * In case if encryption is enabled then we need to retain the keys which were
			 * deleted due to move operation to trashbin.
			 */
			if ($sourceStorage !== null) {
				'@phan-var \OCA\Files_Trashbin\Storage $sourceStorage';
				$copyKeysResult = $sourceStorage->retainKeys($filename, $owner, $ownerPath, $timestamp, $sourceStorage);
			}

			$user = User::getUser();
			$rootView = new View('/');

			if ($rootView->is_dir($owner . '/files_versions/' . $ownerPath)) {
				if ($owner !== $user || $forceCopy) {
					self::copy_recursive($owner . '/files_versions/' . $ownerPath, $owner . '/files_trashbin/versions/' . \basename($ownerPath) . '.d' . $timestamp, $rootView);
					self::copy_recursive($owner . '/files_versions/' . $ownerPath . '.json', $owner . '/files_trashbin/versions/' . \basename($ownerPath) . '.json' . '.d' . $timestamp, $rootView);
				}
				if (!$forceCopy) {
					self::move($rootView, $owner . '/files_versions/' . $ownerPath, $user . '/files_trashbin/versions/' . $filename . '.d' . $timestamp);
					self::move($rootView, $owner . '/files_versions/' . $ownerPath . 'json', $user . '/files_trashbin/versions/' . $filename . '.json' . '.d' . $timestamp);
				}
			} elseif ($versions = \OCA\Files_Versions\Storage::getVersions($owner, $ownerPath)) {
				foreach ($versions as $v) {
					if ($owner !== $user || $forceCopy) {
						self::copy($rootView, $owner . '/files_versions' . $v['path'] . '.v' . $v['version'], $owner . '/files_trashbin/versions/' . $v['name'] . '.v' . $v['version'] . '.d' . $timestamp);
						self::move($rootView, $owner . '/files_versions' . $v['path'] . '.v' . $v['version'] . '.json', $owner . '/files_trashbin/versions/' . $filename . '.v' . $v['version'] . '.json' . '.d' . $timestamp);
					}
					if (!$forceCopy) {
						self::move($rootView, $owner . '/files_versions' . $v['path'] . '.v' . $v['version'], $user . '/files_trashbin/versions/' . $filename . '.v' . $v['version'] . '.d' . $timestamp);
						self::move($rootView, $owner . '/files_versions' . $v['path'] . '.v' . $v['version'] . '.json', $user . '/files_trashbin/versions/' . $filename . '.v' . $v['version'] . '.json' . '.d' . $timestamp);
					}
				}
			}

			if ($copyKeysResult === true) {
				$filePath = $rootView->getAbsolutePath('/files/' . $ownerPath);
				$sourceStorage->deleteAllFileKeys($filePath);
			}
		}
	}

	/**
	 * Move a file or folder on storage level
	 *
	 * @param View $view
	 * @param string $source
	 * @param string $target
	 * @return bool
	 */
	private static function move(View $view, $source, $target) {
		/** @var \OC\Files\Storage\Storage $sourceStorage */
		list($sourceStorage, $sourceInternalPath) = $view->resolvePath($source);
		/** @var \OC\Files\Storage\Storage $targetStorage */
		list($targetStorage, $targetInternalPath) = $view->resolvePath($target);
		/** @var \OC\Files\Storage\Storage $ownerTrashStorage */

		$result = $targetStorage->moveFromStorage($sourceStorage, $sourceInternalPath, $targetInternalPath);
		if ($result) {
			$targetStorage->getUpdater()->renameFromStorage($sourceStorage, $sourceInternalPath, $targetInternalPath);
		}
		return $result;
	}

	/**
	 * Copy a file or folder on storage level
	 *
	 * @param View $view
	 * @param string $source
	 * @param string $target
	 * @return bool
	 */
	private static function copy(View $view, $source, $target) {
		/** @var \OC\Files\Storage\Storage $sourceStorage */
		list($sourceStorage, $sourceInternalPath) = $view->resolvePath($source);
		/** @var \OC\Files\Storage\Storage $targetStorage */
		list($targetStorage, $targetInternalPath) = $view->resolvePath($target);
		/** @var \OC\Files\Storage\Storage $ownerTrashStorage */

		$result = $targetStorage->copyFromStorage($sourceStorage, $sourceInternalPath, $targetInternalPath);
		if ($result) {
			$targetStorage->getUpdater()->update($targetInternalPath);
		}
		return $result;
	}

	/**
	 * Restore a file or folder from trash bin
	 *
	 * @param string $file path to the deleted file/folder relative to "files_trashbin/files/",
	 * including the timestamp suffix ".d12345678"
	 * @param string $filename name of the file/folder
	 * @param int $timestamp time when the file/folder was deleted
	 *
	 * @return bool true on success, false otherwise
	 * @throws \OC\DatabaseException
	 * @throws ForbiddenException
	 * @throws LockedException
	 * @throws StorageNotAvailableException
	 */
	public static function restore($file, $filename, $timestamp, $targetLocation = null) {
		$user = User::getUser();
		$view = new View('/' . $user);

		if ($targetLocation === null) {
			$location = '';
			if ($timestamp) {
				$location = self::getLocation($user, $filename, $timestamp);
				if ($location === false) {
					\OCP\Util::writeLog('files_trashbin', 'Original location of file ' . $filename .
						' not found in database, hence restoring into user\'s root instead', \OCP\Util::DEBUG);
				} else {
					// if location no longer exists, restore file in the root directory
					if ($location !== '/' &&
						(!$view->is_dir('files/' . $location) ||
							!$view->isCreatable('files/' . $location))
					) {
						$location = '';
					}
				}
			}

			// we need a  extension in case a file/dir with the same name already exists
			$uniqueFilename = self::getUniqueFilename($location, $filename, $view);
			$targetLocation = $location . '/' . $uniqueFilename;
		}

		$source = Filesystem::normalizePath('files_trashbin/files/' . $file);
		$target = Filesystem::normalizePath('files/' . $targetLocation);
		if (!$view->file_exists($source)) {
			return false;
		}
		$mtime = $view->filemtime($source);

		// restore file
		$restoreResult = $view->rename($source, $target);

		// handle the restore result
		if ($restoreResult) {
			$fakeRoot = $view->getRoot();
			$view->chroot('/' . $user . '/files');
			$view->touch('/' . $targetLocation, $mtime);
			$view->chroot($fakeRoot);
			\OCP\Util::emitHook('\OCA\Files_Trashbin\Trashbin', 'post_restore', ['filePath' => Filesystem::normalizePath('/' . $targetLocation),
				'trashPath' => Filesystem::normalizePath($file)]);

			self::restoreVersions($view, $file, $filename, $targetLocation, $timestamp);

			if ($timestamp) {
				$query = \OC_DB::prepare('DELETE FROM `*PREFIX*files_trash` WHERE `user`=? AND `id`=? AND `timestamp`=?');
				$query->execute([$user, $filename, $timestamp]);
			}

			return true;
		}

		return false;
	}

	/**
	 * restore versions from trash bin
	 *
	 * @param View $view file view
	 * @param string $file complete path to file
	 * @param string $filename name of file once it was deleted
	 * @param string $uniqueFilename new file name to restore the file without overwriting existing files
	 * @param string $location location if file
	 * @param int $timestamp deletion time
	 * @return false|null
	 */
	private static function restoreVersions(View $view, $file, $filename, $targetLocation, $timestamp) {
		if (\OCP\App::isEnabled('files_versions')) {
			$user = User::getUser();
			$rootView = new View('/');

			$target = Filesystem::normalizePath('/' . $targetLocation);

			list($owner, $ownerPath) = self::getUidAndFilename($target);

			// file has been deleted in between
			if (empty($ownerPath)) {
				return false;
			}

			if ($timestamp) {
				$versionedFile = $filename;
			} else {
				$versionedFile = $file;
			}

			if ($view->is_dir('/files_trashbin/versions/' . $file)) {
				$rootView->rename(Filesystem::normalizePath($user . '/files_trashbin/versions/' . $file), Filesystem::normalizePath($owner . '/files_versions/' . $ownerPath));
			} elseif ($versions = self::getVersionsFromTrash($versionedFile, $timestamp, $user)) {
				foreach ($versions as $v) {
					if ($timestamp) {
						$rootView->rename($user . '/files_trashbin/versions/' . $versionedFile . '.v' . $v . '.d' . $timestamp, $owner . '/files_versions/' . $ownerPath . '.v' . $v);
					} else {
						$rootView->rename($user . '/files_trashbin/versions/' . $versionedFile . '.v' . $v, $owner . '/files_versions/' . $ownerPath . '.v' . $v);
					}
				}
			}
		}
	}

	/**
	 * delete all files from the trash
	 */
	public static function deleteAll() {
		$user = User::getUser();
		$view = new View('/' . $user);
		$fileInfos = $view->getDirectoryContent('files_trashbin/files');

		// Array to store the relative path in (after the file is deleted, the view won't be able to relativise the path anymore)
		$filePaths = [];
		foreach ($fileInfos as $fileInfo) {
			$filePaths[] = $view->getRelativePath($fileInfo->getPath());
		}
		unset($fileInfos); // save memory

		// Bulk PreDelete-Hook
		\OC_Hook::emit('\OCP\Trashbin', 'preDeleteAll', ['paths' => $filePaths]);

		// Single-File Hooks
		foreach ($filePaths as $path) {
			self::emitTrashbinPreDelete($user, $path);
		}

		// actual file deletion
		$view->deleteAll('files_trashbin');
		$query = \OC_DB::prepare('DELETE FROM `*PREFIX*files_trash` WHERE `user`=?');
		$query->execute([$user]);

		// Bulk PostDelete-Hook
		\OC_Hook::emit('\OCP\Trashbin', 'deleteAll', ['paths' => $filePaths]);

		// Single-File Hooks
		foreach ($filePaths as $path) {
			self::emitTrashbinPostDelete($user, $path);
		}

		$view->mkdir('files_trashbin');
		$view->mkdir('files_trashbin/files');

		return true;
	}

	/**
	 * wrapper function to emit the 'preDelete' hook of \OCP\Trashbin before a file is deleted
	 *
	 * @param string $uid
	 * @param string $path
	 */
	protected static function emitTrashbinPreDelete($uid, $path) {
		\OC_Hook::emit(
			'\OCP\Trashbin',
			'preDelete',
			['path' => $path, 'user' => $uid]
		);
	}

	/**
	 * wrapper function to emit the 'delete' hook of \OCP\Trashbin after a file has been deleted
	 *
	 * @param string $uid
	 * @param string $path
	 */
	protected static function emitTrashbinPostDelete($uid, $path) {
		\OC_Hook::emit(
			'\OCP\Trashbin',
			'delete',
			['path' => $path, 'user' => $uid]
		);
	}

	/**
	 * delete file from trash bin permanently
	 *
	 * @param string $filename path to the file
	 * @param string $user
	 * @param int $timestamp of deletion time
	 *
	 * @return int size of deleted files
	 * @throws \OC\DatabaseException
	 * @throws ForbiddenException
	 * @throws LockedException
	 * @throws StorageNotAvailableException
	 */
	public static function delete($filename, $user, $timestamp = null) {
		$view = new View('/' . $user);
		$size = 0;

		if ($timestamp) {
			$query = \OC_DB::prepare('DELETE FROM `*PREFIX*files_trash` WHERE `user`=? AND `id`=? AND `timestamp`=?');
			$query->execute([$user, $filename, $timestamp]);
			$file = $filename . '.d' . $timestamp;
		} else {
			$file = $filename;
		}

		$size += self::deleteVersions($view, $file, $filename, $timestamp, $user);

		if ($view->is_dir('/files_trashbin/files/' . $file)) {
			$size += self::calculateSize(new View('/' . $user . '/files_trashbin/files/' . $file));
		} else {
			$size += $view->filesize('/files_trashbin/files/' . $file);
		}
		self::emitTrashbinPreDelete($user, "/files_trashbin/files/$file");
		$view->unlink('/files_trashbin/files/' . $file);
		self::emitTrashbinPostDelete($user, "/files_trashbin/files/$file");

		return $size;
	}

	/**
	 * @param View $view
	 * @param string $file
	 * @param string $filename
	 * @param integer|null $timestamp
	 * @param string $user
	 * @return int
	 */
	private static function deleteVersions(View $view, $file, $filename, $timestamp, $user) {
		$size = 0;
		if (\OCP\App::isEnabled('files_versions')) {
			if ($view->is_dir('files_trashbin/versions/' . $file)) {
				$size += self::calculateSize(new View('/' . $user . '/files_trashbin/versions/' . $file));
				$view->unlink('files_trashbin/versions/' . $file);
			} elseif ($versions = self::getVersionsFromTrash($filename, $timestamp, $user)) {
				foreach ($versions as $v) {
					if ($timestamp) {
						$size += $view->filesize('/files_trashbin/versions/' . $filename . '.v' . $v . '.d' . $timestamp);
						$view->unlink('/files_trashbin/versions/' . $filename . '.v' . $v . '.d' . $timestamp);
					} else {
						$size += $view->filesize('/files_trashbin/versions/' . $filename . '.v' . $v);
						$view->unlink('/files_trashbin/versions/' . $filename . '.v' . $v);
					}
				}
			}
		}
		return $size;
	}

	/**
	 * check to see whether a file exists in trashbin
	 *
	 * @param string $filename path to the file
	 * @param int $timestamp of deletion time
	 * @return bool true if file exists, otherwise false
	 */
	public static function file_exists($filename, $timestamp = null) {
		$user = User::getUser();
		$view = new View('/' . $user);

		if ($timestamp) {
			$filename = $filename . '.d' . $timestamp;
		}

		$target = Filesystem::normalizePath('files_trashbin/files/' . $filename);
		return $view->file_exists($target);
	}

	/**
	 * deletes used space for trash bin in db if user was deleted
	 *
	 * @param string $uid id of deleted user
	 * @return bool result of db delete operation
	 */
	public static function deleteUser($uid) {
		$query = \OC_DB::prepare('DELETE FROM `*PREFIX*files_trash` WHERE `user`=?');
		return $query->execute([$uid]);
	}

	/**
	 * resize trash bin if necessary after a new file was added to ownCloud
	 *
	 * @param string $user user id
	 */
	public static function resizeTrash($user) {
		$size = self::getTrashbinSize($user);

		$quota = new Quota(
			\OC::$server->getUserManager(),
			\OC::$server->getConfig()
		);
		$freeSpace = $quota->calculateFreeSpace($size, $user);

		if ($freeSpace < 0) {
			self::scheduleExpire($user);
		}
	}

	/**
	 * @param string $user
	 */
	private static function scheduleExpire($user) {
		\OC::$server->getCommandBus()->push(new Expire($user));
	}

	/**
	 * recursive copy to copy a whole directory
	 *
	 * @param string $source source path, relative to the users files directory
	 * @param string $destination destination path relative to the users root directory
	 * @param View $view file view for the users root directory
	 * @return int
	 * @throws Exceptions\CopyRecursiveException
	 */
	private static function copy_recursive($source, $destination, View $view) {
		$size = 0;
		if ($view->is_dir($source)) {
			$view->mkdir($destination);
			$view->touch($destination, $view->filemtime($source));
			foreach ($view->getDirectoryContent($source) as $i) {
				$pathDir = $source . '/' . $i['name'];
				if ($view->is_dir($pathDir)) {
					$size += self::copy_recursive($pathDir, $destination . '/' . $i['name'], $view);
				} else {
					$size += $view->filesize($pathDir);
					$result = $view->copy($pathDir, $destination . '/' . $i['name']);
					if (!$result) {
						throw new \OCA\Files_Trashbin\Exceptions\CopyRecursiveException();
					}
					$view->touch($destination . '/' . $i['name'], $view->filemtime($pathDir));
				}
			}
		} else {
			$size += $view->filesize($source);
			$result = $view->copy($source, $destination);
			if (!$result) {
				throw new \OCA\Files_Trashbin\Exceptions\CopyRecursiveException();
			}
			$view->touch($destination, $view->filemtime($source));
		}
		return $size;
	}

	/**
	 * find all versions which belong to the file we want to restore
	 *
	 * @param string $filename name of the file which should be restored
	 * @param int $timestamp timestamp when the file was deleted
	 * @return array
	 */
	private static function getVersionsFromTrash($filename, $timestamp, $user) {
		$view = new View('/' . $user . '/files_trashbin/versions');
		$versions = [];

		//force rescan of versions, local storage may not have updated the cache
		if (!self::$scannedVersions) {
			/** @var \OC\Files\Storage\Storage $storage */
			list($storage, ) = $view->resolvePath('/');
			$storage->getScanner()->scan('files_trashbin/versions');
			self::$scannedVersions = true;
		}

		if ($timestamp) {
			// fetch for old versions
			$matches = $view->searchRaw($filename . '.v%.d' . $timestamp);
			$offset = -\strlen($timestamp) - 2;
		} else {
			$matches = $view->searchRaw($filename . '.v%');
		}

		if (\is_array($matches)) {
			foreach ($matches as $ma) {
				if ($timestamp) {
					$parts = \explode('.v', \substr($ma['path'], 0, $offset));
					$versions[] = (\end($parts));
				} else {
					$parts = \explode('.v', $ma);
					$versions[] = (\end($parts));
				}
			}
		}
		return $versions;
	}

	/**
	 * find unique extension for restored file if a file with the same name already exists
	 *
	 * @param string $location where the file should be restored
	 * @param string $filename name of the file
	 * @param View $view filesystem view relative to users root directory
	 * @return string with unique extension
	 */
	private static function getUniqueFilename($location, $filename, View $view) {
		$ext = \pathinfo($filename, PATHINFO_EXTENSION);
		$name = \pathinfo($filename, PATHINFO_FILENAME);
		$l = \OC::$server->getL10N('files_trashbin');

		$location = '/' . \trim($location, '/');

		// if extension is not empty we set a dot in front of it
		if ($ext !== '') {
			$ext = '.' . $ext;
		}

		if ($view->file_exists('files' . $location . '/' . $filename)) {
			$i = 2;
			$uniqueName = $name . " (" . $l->t("restored") . ")" . $ext;
			while ($view->file_exists('files' . $location . '/' . $uniqueName)) {
				$uniqueName = $name . " (" . $l->t("restored") . " " . $i . ")" . $ext;
				$i++;
			}

			return $uniqueName;
		}

		return $filename;
	}

	/**
	 * get the size from a given root folder
	 *
	 * @param View $view file view on the root folder
	 * @return integer size of the folder
	 */
	private static function calculateSize($view) {
		$root = \OC::$server->getConfig()->getSystemValue('datadirectory') . $view->getAbsolutePath('');
		if (!\file_exists($root)) {
			return 0;
		}
		$iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root), \RecursiveIteratorIterator::CHILD_FIRST);
		$size = 0;

		/**
		 * RecursiveDirectoryIterator on an NFS path isn't iterable with foreach
		 * This bug is fixed in PHP 5.5.9 or before
		 * See #8376
		 */
		$iterator->rewind();
		while ($iterator->valid()) {
			$path = $iterator->current();
			$relpath = \substr($path, \strlen($root) - 1);
			if (!$view->is_dir($relpath)) {
				$size += $view->filesize($relpath);
			}
			$iterator->next();
		}
		return $size;
	}

	/**
	 * get current size of trash bin from a given user
	 *
	 * @param string $user user who owns the trash bin
	 * @return integer trash bin size
	 */
	public static function getTrashbinSize($user) {
		$view = new View('/' . $user);
		$fileInfo = $view->getFileInfo('/files_trashbin');
		return isset($fileInfo['size']) ? $fileInfo['size'] : 0;
	}

	/**
	 * Register listeners
	 */
	public function registerListeners() {
		$this->eventDispatcher->addListener(
			'files.resolvePrivateLink',
			function (GenericEvent $event) {
				$uid = $event->getArgument('uid');
				$fileId = $event->getArgument('fileid');

				$link = $this->resolvePrivateLink($uid, $fileId);

				if ($link !== null) {
					$event->setArgument('resolvedWebLink', $link);
				}
			}
		);
	}

	/**
	 * register hooks
	 */
	public static function registerHooks() {
		// create storage wrapper on setup
		\OCP\Util::connectHook('OC_Filesystem', 'preSetup', 'OCA\Files_Trashbin\Storage', 'setupStorage');
		//Listen to delete user signal
		\OCP\Util::connectHook('OC_User', 'pre_deleteUser', 'OCA\Files_Trashbin\Hooks', 'deleteUser_hook');
		//Listen to post write hook
		\OCP\Util::connectHook('OC_Filesystem', 'post_write', 'OCA\Files_Trashbin\Hooks', 'post_write_hook');
		// pre and post-rename, disable trash logic for the copy+unlink case
		\OCP\Util::connectHook('OC_Filesystem', 'delete', 'OCA\Files_Trashbin\Trashbin', 'ensureFileScannedHook');
		\OCP\Util::connectHook('OC_Filesystem', 'rename', 'OCA\Files_Trashbin\Storage', 'preRenameHook');
		\OCP\Util::connectHook('OC_Filesystem', 'post_rename', 'OCA\Files_Trashbin\Storage', 'postRenameHook');
	}

	/**
	 * Resolves web URL that points to the trashbin view of the given file
	 *
	 * @param string $uid user id
	 * @param string $fileId file id
	 * @return string|null view URL or null if the file is not found or not accessible
	 */
	public function resolvePrivateLink($uid, $fileId) {
		if ($this->rootFolder->nodeExists($uid . '/files_trashbin/files/')) {
			$baseFolder = $this->rootFolder->get($uid . '/files_trashbin/files/');
			'@phan-var \OCP\Files\Folder $baseFolder';
			$files = $baseFolder->getById($fileId);
			if (!empty($files)) {
				$params['view'] = 'trashbin';
				$file = \current($files);
				if ($file instanceof Folder) {
					// set the full path to enter the folder
					$params['dir'] = $baseFolder->getRelativePath($file->getPath());
				} else {
					// set parent path as dir
					$params['dir'] = $baseFolder->getRelativePath($file->getParent()->getPath());
					// and scroll to the entry
					$params['scrollto'] = $file->getName();
				}
				return $this->urlGenerator->linkToRoute('files.view.index', $params);
			}
		}

		return null;
	}

	/**
	 * check if trash bin is empty for a given user
	 *
	 * @param string $user
	 * @return bool
	 */
	public static function isEmpty($user) {
		$view = new View('/' . $user . '/files_trashbin');
		if ($view->is_dir('/files') && $dh = $view->opendir('/files')) {
			while ($file = \readdir($dh)) {
				if (!Filesystem::isIgnoredDir($file)) {
					return false;
				}
			}
		}
		return true;
	}

	/**
	 * @param $path
	 * @return string
	 */
	public static function preview_icon($path) {
		return \OCP\Util::linkToRoute('core_ajax_trashbin_preview', ['x' => 32, 'y' => 32, 'file' => $path]);
	}
}
