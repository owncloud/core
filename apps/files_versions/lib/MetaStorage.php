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
	/** @var string File-prefix of the metadata of the current file  */
	public const CURRENT_FILE_PREFIX = ".current";

	/** @var string File-extension of the metadata file for a specific version */
	public const VERSION_FILE_EXT = ".json";

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
	 * @param string $uid
	 * @param bool $minor if true increases minor version, otherwise major
	 * @return bool
	 * @throws \Exception
	 */
	public function createForCurrent(string $currentFileName, string $uid, bool $minor) : bool {
		// if the file gets streamed we need to remove the .part extension
		// to get the right target
		$ext = \pathinfo($currentFileName, PATHINFO_EXTENSION);
		if ($ext === 'part') {
			$currentFileName = \substr($currentFileName, 0, \strlen($currentFileName) - 5);
		}

		$absPathOnDisk = $this->pathToAbsDiskPath($uid, "/files_versions/$currentFileName" . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT);
		$userView = $this->fileHelper->getUserView($uid);
		$this->fileHelper->createMissingDirectories($userView, $currentFileName);

		// get metadata for old current file (if exists)
		$oldMetadata = $this->readMetaFile($absPathOnDisk);

		// generate Version Edited By property
		$newVersionEditedBy = \OC_User::getUser();

		// generate Version Tag property
		$oldVersionTag = $oldMetadata['version_tag'] ?? '';
		$newVersionTag = $this->incrementVersionTag($oldVersionTag, $minor);

		$metadata = [
			'edited_by' => $newVersionEditedBy,
			'version_tag' => $newVersionTag
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
	public function getVersionMetadata(FileInfo $versionFile) : array {
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
	 * @param string $uid
	 * @return array metadata
	 * @throws \Exception
	 */
	public function getCurrentMetadata(string $currentFileName, string $uid) : array {
		$absPathOnDisk = $this->pathToAbsDiskPath($uid, "/files_versions/$currentFileName" . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT);

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
		$currentMetaFile = $this->pathToAbsDiskPath($uid, "/files_versions/$currentFileName" . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT);
		$targetMetaFile = $this->dataDir . $versionFile->getPath() . self::VERSION_FILE_EXT;

		if (\file_exists($currentMetaFile)) {
			@\copy($currentMetaFile, $targetMetaFile);
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
	public function deleteForCurrent(View $versionsView, string $filename) {
		$uid = $versionsView->getOwner("/");
		$toDelete = $this->pathToAbsDiskPath($uid, "files_versions$filename" . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT);

		if (\file_exists($toDelete)) {
			\unlink($toDelete);
		}
	}

	/**
	 * After a version is restored, the version's metadata is also restored
	 * and becomes the current metadata of the file.
	 *
	 * @param string $currentFileName
	 * @param FileInfo $restoreVersionFile
	 * @param string $uid
	 */
	public function restore(string $currentFileName, FileInfo $restoreVersionFile, string $uid) {
		// NOTE: restoring a version just copies the contents to new current version, it does not affect past version

		// get current metafile
		$currentMetaFile = $this->pathToAbsDiskPath($uid, "/files_versions/$currentFileName" . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT);

		// fetch metadata
		$currentMetaData = $this->readMetaFile($currentMetaFile);

		// restored version is technically a new version generated by a user
		$newVersionEditedBy = \OC_User::getUser();

		// increment version tag for current meta
		$oldCurrentVersionTag = $currentMetaData['version_tag'] ?? '';
		$newCurrentVersionTag = $this->incrementVersionTag($oldCurrentVersionTag, true);
			
		// create new currentMetaFile
		$metadata = [
			'edited_by' => $newVersionEditedBy,
			'version_tag' => $newCurrentVersionTag,
		];
		$this->writeMetaFile($metadata, $currentMetaFile);
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
	 * Get the incremented version tag for a new version, which is
	 * latest version +0.1 or new major version.
	 *
	 * @param string $oldVersionTag
	 * @param bool $minor if true increases minor version, otherwise major
	 * @return string
	 */
	private function incrementVersionTag(string $oldVersionTag, bool $minor) : string {
		if ($oldVersionTag === '') {
			// initialize
			return '0.1';
		}
		
		$versionParts = explode(".", $oldVersionTag);
		$majorVersionPart = $versionParts[0];
		$minorVersionPart = $versionParts[1];
		if ($minor) {
			// by default increase minor version
			$newVersionTag = $majorVersionPart . '.' . \strval(((int)$minorVersionPart) + 1);
		} elseif ($minorVersionPart !== '0') {
			// increase major only when not already increased
			$newVersionTag = \strval(((int)$majorVersionPart) + 1) . '.0';
		} else {
			// just keep old tag
			$newVersionTag = $oldVersionTag;
		}
		return $newVersionTag;
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
		if (!\file_exists($diskPath)) {
			return [];
		}

		$json = \file_get_contents($diskPath);
		if ($decoded = \json_decode($json, true)) {
			$metadata = [];

			// handling for edited_by
			if (isset($decoded['edited_by'])) {
				$metadata['edited_by'] = $decoded['edited_by'];
			}

			// LEGACY: property wrongly taken from DAV interface
			// backwards compatibilitiy handling for edited_by which in the past had DAV property name
			if (isset($decoded['{http://owncloud.org/ns}meta-version-edited-by'])) {
				$metadata['edited_by'] = $decoded['{http://owncloud.org/ns}meta-version-edited-by'];
			}

			// handling for version tags
			if (isset($decoded['version_tag'])) {
				$metadata['version_tag'] = $decoded['version_tag'];
			}
			return $metadata;
		}

		return [];
	}
}
