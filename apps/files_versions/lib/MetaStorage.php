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
use OCA\DAV\Meta\MetaPlugin;
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
	// TODO LEGACY: remove this if ensured not needed any more
	public const CURRENT_FILE_EXT = ".current.json";

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
	 * Creates a metadata-file for an existing version-file. Overwrites existing
	 * metadata.
	 *
	 * @param string $authorUid
	 * @param string $fileOwner
	 * @param FileInfo $version
	 * @param string $versionString
	 * @param bool $isCurrent
	 */
	public function createForVersion(string $authorUid, string $fileOwner, FileInfo $version, string $versionString, bool $isCurrent = true) {
		$path = self::pathToAbsDiskPath($fileOwner, $version->getInternalPath()) . self::VERSION_FILE_EXT;
		self::writeMetaFile($authorUid, $path, $versionString, $isCurrent);
	}

	/**
	 * Retrieve meta info for a given version.
	 *
	 * @param FileInfo $versionFile
	 * @return array|null null if no metadata is available
	 */
	public function getMetaInfo(FileInfo $versionFile) : ?array {
		$metaDataFilePath = $this->dataDir . '/' . $versionFile->getPath() . MetaStorage::VERSION_FILE_EXT;
		if (\file_exists($metaDataFilePath)) {
			return [
				MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->getPropertyByPath($metaDataFilePath, MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME),
				MetaPlugin::VERSION_STRING_PROPERTYNAME => $this->getPropertyByPath($metaDataFilePath, MetaPlugin::VERSION_STRING_PROPERTYNAME),
				MetaPlugin::VERSION_IS_CURRENT_PROPERTYNAME => $this->getPropertyByPath($metaDataFilePath, MetaPlugin::VERSION_IS_CURRENT_PROPERTYNAME),
			];
		}

		return null;
	}

	/**
	 * Reset the "isCurrent" state. This should be done before restoring or creating a new version.
	 *
	 * @param array $versions
	 */
	public function resetCurrentVersion($versions) : void {
		$currentVersion = $this->getCurrentVersion($versions);
		if (!$currentVersion) {
			return;
		}

		$path = self::pathToAbsDiskPath($currentVersion['owner'], $currentVersion['storage_location']) . self::VERSION_FILE_EXT;
		self::writeMetaFile($currentVersion['edited_by'], $path, $currentVersion['version_string'], false);
	}

	/**
	 * Publish the current version and make it a new major version.
	 *
	 * @param array $versions
	 * @param string $filename
	 * @param string $uid uid of the file owner
	 */
	public function publishCurrentVersion($versions, $filename, $uid) : void {
		$currentVersion = $this->getCurrentVersion($versions);
		if (!$currentVersion) {
			return;
		}

		$latestVersionString = $this->getLatestVersionString($versions, $filename, $uid);
		if ($this->isMajorVersion($latestVersionString)) {
			// If the latest version is a major, then we can't round up
			$newMajor = \strval(\floatval($latestVersionString) + 1);
		} else {
			$newMajor = \ceil($latestVersionString);
		}

		$path = self::pathToAbsDiskPath($currentVersion['owner'], $currentVersion['storage_location']) . self::VERSION_FILE_EXT;
		self::writeMetaFile($currentVersion['edited_by'], $path, "$newMajor.0", true);
	}

	/**
	 * Retrieve the version string of the latest version (not the current one!)
	 *
	 * @param array $versions
	 * @param string $filename
	 * @param string $uid uid of the file owner
	 * @return string|null
	 */
	public function getLatestVersionString($versions, $filename, $uid) : ?string {
		if (!\count($versions)) {
			return '';
		}

		$latestVersion = null;
		foreach ($versions as $version) {
			if (!$latestVersion) {
				$latestVersion = $version;
				continue;
			}

			if ($version['version_string'] > $latestVersion['version_string']) {
				$latestVersion = $version;
			}
		}

		$latestVersionTimeStamp = $latestVersion['version'];
		$latestVersionFileName = "files_versions/$filename.v$latestVersionTimeStamp";
		$metaDataFilePath = $this->pathToAbsDiskPath($uid, $latestVersionFileName . self::VERSION_FILE_EXT);
		if (\file_exists($metaDataFilePath)) {
			return $this->getPropertyByPath($metaDataFilePath, MetaPlugin::VERSION_STRING_PROPERTYNAME);
		}

		return '';
	}

	/**
	 * Get the increased (new) version string for a new version (latest version +0.1).
	 *
	 * @param array $versions
	 * @param string $filename
	 * @param string $uid uid of the file owner
	 * @return string|null
	 */
	public function getIncreasedVersionString($versions, $filename, $uid) : ?string {
		$currentVersionString = $this->getLatestVersionString($versions, $filename, $uid);
		if (!$currentVersionString) {
			return '0.1';
		}

		$currentVersionFloat = (float)$currentVersionString;
		return \strval($currentVersionFloat + 0.1);
	}

	/**
	 * Retrieve a given property for a given version file path. Presumes that the file exists.
	 *
	 * @param string $path
	 * @param string $property
	 * @return string|null
	 */
	protected function getPropertyByPath(string $path, string $property) : ?string {
		$json = \file_get_contents($path);
		if ($decoded = \json_decode($json, true)) {
			if (isset($decoded[$property])) {
				return $decoded[$property];
			}
		}

		return null;
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
	 * @param string $authorUid
	 * @param string $diskPath
	 * @param string $versionString
	 * @param bool $isCurrent
	 * @return false|int
	 */
	private function writeMetaFile(string $authorUid, string $diskPath, string $versionString, bool $isCurrent) {
		$metaJson = \json_encode([
			MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $authorUid,
			MetaPlugin::VERSION_STRING_PROPERTYNAME => $versionString,
			MetaPlugin::VERSION_IS_CURRENT_PROPERTYNAME => $isCurrent
		]);
		return \file_put_contents($diskPath, $metaJson);
	}

	/**
	 * @param array $versions
	 * @return array|null
	 */
	private function getCurrentVersion(array $versions) : ?array {
		if (!\count($versions)) {
			return null;
		}

		foreach ($versions as $version) {
			if ($version['is_current']) {
				return $version;
			}
		}

		return null;
	}

	/**
	 * @param $version_string
	 * @return bool
	 */
	public function isMajorVersion($versionString) : bool {
		return \substr($versionString, -\strlen('.0')) === '.0';
	}
}
