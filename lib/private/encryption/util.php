<?php

/**
 * ownCloud
 *
 * @copyright (C) 2015 ownCloud, Inc.
 *
 * @author Bjoern Schiessle <schiessle@owncloud.com>
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
 */

namespace OC\Encryption;

class Util {

	const HEADER_ENCRYPTION_MODULE = 1;
	const HEADER_START = 'HBEGIN';
	const HEADER_END = 'HEND';
	const HEADER_PADDING_CHAR = '-';

	/** @var integer */
	protected $headerSize;

	/** @var integer */
	protected $blockSize;


	/** $var array */
	protected $ocHeaderKeys;

	public function __construct() {
		// block size will always be 8192 for a PHP stream https://bugs.php.net/bug.php?id=21641
		$this->blockSize = 8192;
		// the encryption header is exactly the same size as one block read
		// by a php stream
		$this->headerSize = $this->blockSize;

		$this->ocHeaderKeys = array(
			self::HEADER_ENCRYPTION_MODULE => 'oc_encryption_module'
		);
	}

	/**
	 * read encryption module ID from header
	 *
	 * @param array $header
	 * @return string|null
	 */
	public function getEncryptionModuleId(array $header) {
		$id = null;
		$encryptionModuleKey = $this->ocHeaderKeys[self::HEADER_ENCRYPTION_MODULE];

		if (isset($header[$encryptionModuleKey])) {
			$id = $header[$encryptionModuleKey];
		}

		return $id;
	}

	/**
	 * read header into array
	 *
	 * @param string $header
	 * @return array
	 */
	public function readHeader($header) {

		$result = array();

		if (substr($header, 0, strlen(self::HEADER_START)) === self::HEADER_START) {
			$endAt = strpos($header, self::HEADER_END);
			if ($endAt !== false) {
				$header = substr($header, 0, $endAt + strlen(self::HEADER_END));

				// +1 to not start with an ':' which would result in empty element at the beginning
				$exploded = explode(':', substr($header, strlen(self::HEADER_START)+1));

				$element = array_shift($exploded);
				while ($element !== self::HEADER_END) {
					$result[$element] = array_shift($exploded);
					$element = array_shift($exploded);
				}
			}
		}

		return $result;
	}

	/**
	 * create header for encrypted file
	 *
	 * @param array $headerData
	 * @param \OCP\Encryption\IEncryptionModule $encryptionModule
	 * @return string
	 * @throws EncryptionException
	 */
	public function createHeader(array $headerData, \OCP\Encryption\IEncryptionModule $encryptionModule) {
		$header = self::HEADER_START . ':' . self::HEADER_ENCRYPTION_MODULE . ':' . $encryptionModule->getId() . ':';
		foreach ($headerData as $key => $value) {
			if (in_array($key, $this->ocHeaderKeys)) {
				throw new EncryptionException('header key "'. $key . '" already reserved by ownCloud');
			}
			$header .= $key . ':' . $value . ':';
		}
		$header .= self::HEADER_END;

		if (strlen($header) > $this->getHeaderSize()) {
			throw new EncryptionException('max header size exceeded', EncryptionException::ENCRYPTION_HEADER_TO_LARGE);
		}

		$paddedHeader = str_pad($header, $this->headerSize, self::HEADER_PADDING_CHAR, STR_PAD_RIGHT);

		return $paddedHeader;
	}

	/**
	 * Find, sanitise and format users sharing a file
	 * @note This wraps other methods into a portable bundle
	 * @param string $path path relativ to current users files folder
	 * @return array
	 */
	public function getSharingUsersArray($path) {

		// Make sure that a share key is generated for the owner too
		list($owner, $ownerPath) = $this->getUidAndFilename($path);

		$ownerPath = $this->stripPartialFileExtension($ownerPath);

		// always add owner to the list of users with access to the file
		$userIds = array($owner);

		// Find out who, if anyone, is sharing the file
		$result = \OCP\Share::getUsersSharingFile($ownerPath, $owner);
		$userIds = \array_merge($userIds, $result['users']);
		$public = $result['public'] || $result['remote'];

		// check if it is a group mount
		if (\OCP\App::isEnabled("files_external")) {
			$mounts = \OC_Mount_Config::getSystemMountPoints();
			foreach ($mounts as $mount) {
				if ($mount['mountpoint'] == substr($ownerPath, 1, strlen($mount['mountpoint']))) {
					$mountedFor = $this->getUserWithAccessToMountPoint($mount['applicable']['users'], $mount['applicable']['groups']);
					$userIds = array_merge($userIds, $mountedFor);
				}
			}
		}

		// Remove duplicate UIDs
		$uniqueUserIds = array_unique($userIds);

		return array('users' => $uniqueUserIds, 'public' => $public);
	}

	/**
	 * return size of encryption header
	 *
	 * @return integer
	 */
	public function getHeaderSize() {
		return $this->headerSize;
	}

	/**
	 * return size of block read by a PHP stream
	 *
	 * @return integer
	 */
	public function getBlockSize() {
		return $this->blockSize;
	}

	public function getUidAndFilename($filename) {
		// TODO find a better implementation than in the current encyption app
	}

	/**
	 * Remove .path extension from a file path
	 * @param string $path Path that may identify a .part file
	 * @return string File path without .part extension
	 * @note this is needed for reusing keys
	 */
	public function stripPartialFileExtension($path) {
		$extension = pathinfo($path, PATHINFO_EXTENSION);

		if ( $extension === 'part') {

			$newLength = strlen($path) - 5; // 5 = strlen(".part")
			$fPath = substr($path, 0, $newLength);

			// if path also contains a transaction id, we remove it too
			$extension = pathinfo($fPath, PATHINFO_EXTENSION);
			if(substr($extension, 0, 12) === 'ocTransferId') { // 12 = strlen("ocTransferId")
				$newLength = strlen($fPath) - strlen($extension) -1;
				$fPath = substr($fPath, 0, $newLength);
			}
			return $fPath;

		} else {
			return $path;
		}
	}

	protected function getUserWithAccessToMountPoint($users, $groups) {
		$result = array();
		if (in_array('all', $users)) {
			$result = \OCP\User::getUsers();
		} else {
			$result = array_merge($result, $users);
			foreach ($groups as $group) {
				$result = array_merge($result, \OC_Group::usersInGroup($group));
			}
		}

		return $result;
	}

	/**
	 * check if the file is stored on a system wide mount point
	 * @param string $path relative to /data/user with leading '/'
	 * @return boolean
	 */
	public function isSystemWideMountPoint($path) {
		$normalizedPath = ltrim($path, '/');
		if (\OCP\App::isEnabled("files_external")) {
			$mounts = \OC_Mount_Config::getSystemMountPoints();
			foreach ($mounts as $mount) {
				if ($mount['mountpoint'] == substr($normalizedPath, 0, strlen($mount['mountpoint']))) {
					if ($this->isMountPointApplicableToUser($mount)) {
						return true;
					}
				}
			}
		}
		return false;
	}

}
