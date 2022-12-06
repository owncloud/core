<?php
/**
 * @author Ilja Neumann <ineumann@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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
namespace OCA\Files_Versions;

use OC\Files\Filesystem;
use OC\Files\ObjectStore\ObjectStoreStorage;
use OC\Files\View;
use OCP\Files\FileInfo;

/**
 * Storage facade for the optional versioning-metadata feature which when enabled
 * stores an additional metadata file next to each version file in data/$uid/files_version.
 *
 * The metadata files are named like the version file but suffixed with .json. They
 * contain the uid of the editor/author of the version.
 *
 * Additionally a metadata file for the current version is maintained (.current.json).
 *
 * The methods are called in tandem by the operations in OCA\Files_Versions\Storage.php
 * but abstract away the required path transformations and filesystem layout. Pass in normal file and
 * version paths as used in Storage.php and get the metadata handled by this.
 *
 * Please note that this file-operations bypass the view api and write directly
 * to disk using php's file operations so currently this only works with local-storage.
 *
 * @example
 * $ tree admin/files_versions/
 * data/admin
 *	├── files
 *  │	├── Hello.txt                  # Current file
 *  └── files_versions
 *  	├── Hello.txt.current.json     # Meta for the current file in files
 *  	├── Hello.txt.v1638547177.json # Meta of prev. version
 *  	└── Hello.txt.v1638547177      # Content of the prev. version
 */
class MetaStorage {
	/** @var string File-extension of the metadata of the current file  */
	public const CURRENT_FILE_EXT = ".current.json";

	/** @var string File-extension of the metadata file for a specific version */
	public const VERSION_FILE_EXT = ".json";

	public const VERSION_EDITED_BY_PROPERTYNAME = 'edited_by';
	public const VERSION_TAG_PROPERTYNAME = 'version_tag';

	// LEGACY property taken from DAV interface (wrongly)
	public const LEGACY_VERSION_EDITED_BY_PROPERTYNAME = '{http://owncloud.org/ns}meta-version-edited-by';

	/** @var string  */
	private $dataDir;

	/** @var FileHelper  */
	private $fileHelper;

	/** @var boolean */
	private $objectStoreEnabled;

	/**
	 * @param string $dataDir Absolute path to the data-directory
	 * @param FileHelper $fileHelper
	 */
	public function __construct(string $dataDir, FileHelper $fileHelper) {
		$this->dataDir = $dataDir;
		$this->fileHelper = $fileHelper;
		$this->objectStoreEnabled = (new View(""))
			->getFileInfo("/")
			->getStorage()
			->instanceOfStorage(ObjectStoreStorage::class);
	}

	/**
	 * Creates or overwrites a metadata file for a current file. This is called
	 * after every modification of a file to store some metadata.
	 *
	 * @param string $currentFileName Path relative to the current user's home
	 * @return bool
	 * @throws \Exception
	 */
	public function createCurrent(string $currentFileName, string $uid) : bool {
		// if the file gets streamed we need to remove the .part extension
		// to get the right target
		$ext = \pathinfo($currentFileName, PATHINFO_EXTENSION);
		if ($ext === 'part') {
			$currentFileName = \substr($currentFileName, 0, \strlen($currentFileName) - 5);
		}

		// we don't support versioned directories
		if (Filesystem::is_dir($currentFileName) || !Filesystem::file_exists($currentFileName)) {
			return false;
		}

		$absPathOnDisk = $this->pathToAbsDiskPath($uid, "/files_versions$currentFileName" . MetaStorage::CURRENT_FILE_EXT);
		$userView = $this->fileHelper->getUserView($uid);
		$this->fileHelper->createMissingDirectories($userView, $currentFileName);

		$authorUid = \OC_User::getUser();

		$metadata = [
			self::VERSION_EDITED_BY_PROPERTYNAME => $authorUid
		];
		return $this->writeMetaFile($metadata, $absPathOnDisk) !== false;
	}

	/**
	 * Get a metadata file for a non-conncurent version of file.
	 *
	 * @param FileInfo $versionFile
	 * @return array metadata
	 * @throws \Exception
	 */
	public function getVersion(FileInfo $versionFile) : array {
		$absPathOnDisk = $this->dataDir . '/' . $versionFile->getPath() . MetaStorage::VERSION_FILE_EXT;
		if (\file_exists($absPathOnDisk)) {
			return $this->readMetaFile($absPathOnDisk);
		}
		return [];

	}

	/**
	 * Get a metadata file for a current file.
	 *
	 * @param string $currentFileName Path relative to the current user's home
	 * @return array metadata
	 * @throws \Exception
	 */
	public function getCurrent(string $currentFileName, string $uid) : array {
		// we don't support versioned directories
		if (Filesystem::is_dir($currentFileName) || !Filesystem::file_exists($currentFileName)) {
			return [];
		}
		$absPathOnDisk = $this->pathToAbsDiskPath($uid, "/files_versions/$currentFileName" . self::CURRENT_FILE_EXT);

		return $this->readMetaFile($absPathOnDisk);
	}

	/**
	 * Copies the current metadata of a file with a given version.
	 *
	 * After a version was created by making a copy before modification the
	 * current metadata becomes the metadata of the new version.
	 *
	 * @param string $currentFileName
	 * @param FileInfo $versionFile
	 * @param string $uid
	 */
	public function copyCurrentToVersion(string $currentFileName, FileInfo $versionFile, string $uid) {
		$currentMetaFile = $this->pathToAbsDiskPath($uid, "/files_versions/$currentFileName" . self::CURRENT_FILE_EXT);
		$targetMetaFile = $this->dataDir . $versionFile->getPath() . self::VERSION_FILE_EXT;

		if (\file_exists($currentMetaFile)) {
			@\copy($currentMetaFile, $targetMetaFile);
		}
	}

	/**
	 * Associates the current metadata of a file with a given version.
	 *
	 * After a version was created by making a copy before modification the
	 * current metadata becomes the metadata of the new version.
	 *
	 * @param string $currentFileName
	 * @param FileInfo $versionFile
	 * @param string $uid
	 */
	public function moveCurrentToVersion(string $currentFileName, FileInfo $versionFile, string $uid) {
		$currentMetaFile = $this->pathToAbsDiskPath($uid, "/files_versions/$currentFileName" . self::CURRENT_FILE_EXT);
		$targetMetaFile = $this->dataDir . $versionFile->getPath() . self::VERSION_FILE_EXT;

		if (\file_exists($currentMetaFile)) {
			@\rename($currentMetaFile, $targetMetaFile);
		}
	}

	/**
	 * Deletes metadata for a specific version file.
	 */
	public function deleteForVersion(View $versionsView, string $versionPath) {
		$uid = $versionsView->getOwner("/");
		$toDelete = $this->pathToAbsDiskPath($uid, "files_versions$versionPath" . self::VERSION_FILE_EXT);
		if (\file_exists($toDelete)) {
			\unlink($toDelete);
		}
	}

	/**
	 * Deletes metadata for the current revision of a given file.
	 *
	 * @param string $filename Path to the file relative to files/ for which the current revision should be deleted
	 */
	public function deleteCurrent(View $versionsView, string $filename) {
		$uid = $versionsView->getOwner("/");
		$toDelete = $this->pathToAbsDiskPath($uid, "files_versions$filename" . self::CURRENT_FILE_EXT);

		if (\file_exists($toDelete)) {
			\unlink($toDelete);
		}
	}

	/**
	 * After a version is restored, the version's metadata is also restored
	 * and becomes the current metadata of the file.
	 *
	 * @param string $uid
	 * @param string $fileToRestore
	 * @param string $target
	 */
	public function restore(string $uid, string $fileToRestore, string $target) {
		$restoreDirName = \dirname($fileToRestore);
		$restoreName = \basename($target);

		$src = self::pathToAbsDiskPath($uid, $fileToRestore) . self::VERSION_FILE_EXT;
		$dst = self::pathToAbsDiskPath($uid, "$restoreDirName/$restoreName") . self::CURRENT_FILE_EXT;

		if (\file_exists($src)) {
			\rename($src, $dst);
		} elseif (\file_exists($dst)) {
			// Remove current author file in case there is no author to restore
			\unlink($dst);
		}
	}

	/**
	 * @param string $op
	 * @param string $src
	 * @param string $srcOwnerUid
	 * @param string $dst
	 * @param string $dstOwnerUid
	 */
	public function renameOrCopy(string $op, string $src, string $srcOwnerUid, string $dst, string $dstOwnerUid) {
		if ($op !== 'copy' && $op !== 'rename') {
			throw new \InvalidArgumentException('Only move/rename and copy are supported');
		}

		$src = self::pathToAbsDiskPath($srcOwnerUid, $src);
		$dst = self::pathToAbsDiskPath($dstOwnerUid, $dst);

		if (\file_exists($src)) {
			$op($src, $dst);
		}
	}

	/**
	 * Copy all meta data files from a given folder to a destination folder
	 * recursively. This method presumes that the folder structure in the
	 * destination folder has already been created.
	 *
	 * @param string $src
	 * @param string $srcOwnerUid
	 * @param string $dst
	 * @param string $dstOwnerUid
	 */
	public function copyRecursiveMetaDataFiles(string $src, string $srcOwnerUid, string $dst, string $dstOwnerUid) {
		$absSrc = self::pathToAbsDiskPath($srcOwnerUid, $src);
		$absDst = self::pathToAbsDiskPath($dstOwnerUid, $dst);

		if (!\is_dir($absSrc)) {
			return;
		}

		foreach (\scandir($absSrc) as $filePath) {
			if ($filePath === '.' || $filePath === '..') {
				continue;
			}

			if (\pathinfo($filePath, PATHINFO_EXTENSION) === 'json') {
				\copy("$absSrc/$filePath", "$absDst/$filePath");
				continue;
			}

			if (\is_dir($filePath)) {
				$this->copyRecursiveMetaDataFiles("$srcOwnerUid/$filePath", $srcOwnerUid, "$dstOwnerUid/$filePath", $dstOwnerUid);
			}
		}
	}

	/**
	 * @return bool
	 */
	public function isObjectStoreEnabled(): bool {
		return $this->objectStoreEnabled;
	}

	/**
	 * Helper to convert relative vfs paths to absolute on disk paths
	 *
	 * @param string $uid The user
	 * @param string $path Path relative to user directory
	 * @return string absolute path of the given file on disc
	 */
	private function pathToAbsDiskPath(string $uid, string $path) : string {
		return "$this->dataDir/$uid/$path";
	}

	/**
	 * @param array $metadata
	 * @param string $diskPath
	 * @return int|false
	 */
	private function writeMetaFile(array $metadata, string $diskPath) {
		$metaJson = \json_encode($metadata);
		return \file_put_contents($diskPath, $metaJson);
	}

	/**
	 * @param string $diskPath
	 * @return array metadata
	 */
	private function readMetaFile(string $diskPath) {
		$json = \file_get_contents($diskPath);
		if ($decoded = \json_decode($json, true)) {
			$metadata = [];

			// handling for edited_by
			if (isset($decoded[MetaStorage::LEGACY_VERSION_EDITED_BY_PROPERTYNAME])) {
				$metadata[MetaStorage::VERSION_EDITED_BY_PROPERTYNAME] = $decoded[MetaStorage::LEGACY_VERSION_EDITED_BY_PROPERTYNAME];
			}

			// backwards compatibilitiy handling for edited_by which in the bast had DAV property name
			if (isset($decoded[MetaStorage::VERSION_EDITED_BY_PROPERTYNAME])) {
				$metadata[MetaStorage::VERSION_EDITED_BY_PROPERTYNAME] = $decoded[MetaStorage::VERSION_EDITED_BY_PROPERTYNAME];
			}

			// handling for version tags
			if (isset($decoded[MetaStorage::VERSION_TAG_PROPERTYNAME])) {
				$metadata[MetaStorage::VERSION_TAG_PROPERTYNAME] = $decoded[MetaStorage::VERSION_TAG_PROPERTYNAME];
			}
			return $metadata;
		}

		return [];
	}
}
