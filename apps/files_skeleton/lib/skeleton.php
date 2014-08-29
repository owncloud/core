<?php
/**
 * @author Jörn Friedrich Dreyer
 * @copyright (c) 2014 Jörn Friedrich Dreyer <jfd@owncloud.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Files_Skeleton;

use OC\Files\Cache\Scanner;
use OC\Files\Filesystem;
use OCA\Encryption\Session;
use OCP\App;
use OCP\Config;
use OCP\Files\Folder;
use OCP\Util;

class Skeleton {

	/*
	 * @var boolean $copySkeleton flag indicating if the skeleton needs to be copied
	 */
	private static $copySkeleton = false;

	/**
	 * copies the skeleton to the users /files
	 *
	 * @param array $params
	 */
	public static function copySkeleton($params) {
		if (isset($params['user'])) {
			// we were called by the createUserFiles hook
			$user = $params['user'];
		} else if (isset($params['uid']) && self::$copySkeleton) {
			// we were called by the post_login hook
			$user = $params['uid'];

			// check that the encryption has been fully initialized
			if (App::isEnabled('files_encryption')
				&& \OC::$session->get('encryptionInitialized') !== Session::INIT_SUCCESSFUL
			) {
				Util::writeLog(
					'files_skeleton',
					'files_skeleton has received the post_login hook before files_encryption has been initialized. '.
					'This race condition might be avoided by increasing the inode number of the files_skeleton app '.
					'folder above the inode number of the files_encryption app, eg. by copying, deleting and renaming '.
					'the copy of the files_skeleton app folder.',
					Util::ERROR
				);
				return;
			}
		} else {
			return;
		}
		$userDirectory = \OC::$server->getUserFolder();
		$skeletonDirectory = Config::getSystemValue('skeletondirectory', \OC::$SERVERROOT . '/core/skeleton');

		if (!empty($skeletonDirectory)) {
			Util::writeLog(
				'files_skeleton',
				'copying skeleton for '.$user.' from '.$skeletonDirectory.' to '.$userDirectory->getFullPath('/'),
				Util::DEBUG
			);
			self::copyr($skeletonDirectory, $userDirectory);
			// update the file cache
			$userDirectory->getStorage()->getScanner()->scan('', Scanner::SCAN_RECURSIVE);
		}
	}

	/**
	 * copies a directory recursively
	 *
	 * @param string $source
	 * @param Folder $target
	 * @return void
	 */
	public static function copyr($source, Folder $target) {
		$dir = opendir($source);
		while (false !== ($file = readdir($dir))) {
			if (!Filesystem::isIgnoredDir($file)) {
				if (is_dir($source . '/' . $file)) {
					$child = $target->newFolder($file);
					self::copyr($source . '/' . $file, $child);
				} else {
					$child = $target->newFile($file);
					stream_copy_to_stream(fopen($source . '/' . $file,'r'), $child->fopen('w'));
				}
			}
		}
		closedir($dir);
	}

	/*
	 * called by the OC_Filesystem createUserFiles Hook
	 */
	public static function setCopySkeletonFlag() {
		self::$copySkeleton = true;
	}

}
