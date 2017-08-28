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

namespace OC\Files\Storage\Wrapper;

use OC\Encryption\Exceptions\ModuleDoesNotExistsException;
use OC\Encryption\Update;
use OC\Encryption\Util;
use OC\Files\Cache\CacheEntry;
use OC\Files\Filesystem;
use OC\Files\Mount\Manager;
use OC\Files\Storage\LocalTempFileTrait;
use OC\Memcache\ArrayCache;
use OCP\Encryption\Exceptions\GenericEncryptionException;
use OCP\Encryption\IFile;
use OCP\Encryption\IManager;
use OCP\Encryption\Keys\IStorage;
use OCP\Files\Mount\IMountPoint;
use OCP\Files\Storage;
use OCP\ILogger;
use OCP\Files\Cache\ICacheEntry;

class CustomEncryption extends Wrapper {

	use LocalTempFileTrait;

	/** @var string */
	private $mountPoint;

	/** @var \OC\Encryption\Util */
	private $util;

	/** @var \OCP\Encryption\IManager */
	private $encryptionManager;

	/** @var \OCP\ILogger */
	private $logger;

	/** @var string */
	private $uid;

	/** @var array */
	protected $unencryptedSize;

	/** @var \OCP\Encryption\IFile */
	private $fileHelper;

	/** @var IMountPoint */
	private $mount;

	/** @var IStorage */
	private $keyStorage;

	/** @var Update */
	private $update;

	/** @var Manager */
	private $mountManager;

	/** @var array  */
	private $parameters;

	/** @var array remember for which path we execute the repair step to avoid recursions */
	private $fixUnencryptedSizeOf = [];

	/** @var  ArrayCache */
	private $arrayCache;

	/** @var Encryption  */
	private $encryptionWrapper;

	/**
	 * @param array $parameters
	 * @param IManager $encryptionManager
	 * @param Util $util
	 * @param ILogger $logger
	 * @param IFile $fileHelper
	 * @param string $uid
	 * @param IStorage $keyStorage
	 * @param Update $update
	 * @param Manager $mountManager
	 * @param ArrayCache $arrayCache
	 * @param Encryption $encryptionWrapper
	 */
	public function __construct(
		$parameters,
		IManager $encryptionManager = null,
		Util $util = null,
		ILogger $logger = null,
		IFile $fileHelper = null,
		$uid = null,
		IStorage $keyStorage = null,
		Update $update = null,
		Manager $mountManager = null,
		ArrayCache $arrayCache = null
	) {

		$this->parameters = $parameters;
		$this->mountPoint = $parameters['mountPoint'];
		$this->mount = $parameters['mount'];
		$this->encryptionManager = $encryptionManager;
		$this->util = $util;
		$this->logger = $logger;
		$this->uid = $uid;
		$this->fileHelper = $fileHelper;
		$this->keyStorage = $keyStorage;
		$this->unencryptedSize = [];
		$this->update = $update;
		$this->mountManager = $mountManager;
		$this->arrayCache = $arrayCache;
		$this->encryptionWrapper = new Encryption(
			$parameters,
			$this->encryptionManager,
			$this->util,
			$this->logger,
			$this->fileHelper,
			$this->uid,
			$this->keyStorage,
			$this->update,
			$this->mountManager,
			$this->arrayCache
		);

		parent::__construct($parameters);
	}

	public function copy($path1, $path2, $getDecryptedFile = true) {

		$source = $this->getFullPath($path1);

		if ($this->util->isExcluded($source)) {
			return $this->storage->copy($path1, $path2);
		}

		// need to stream copy file by file in case we copy between a encrypted
		// and a unencrypted storage
		$this->unlink($path2);
		$result = $this->copyFromStorage($this, $path1, $path2, false, false, $getDecryptedFile);

		return $result;
	}

	/**
	 * This method is a modified version of fopen ( http://php.net/manual/en/function.fopen.php)
	 * The two extra function argument is to make the function know whether to
	 * a) replace a file - do not return encrypted handle
	 * b) get the file decrypted ( if encryption is enabled ) - do not return encrypted handle
	 *
	 * @param string $path
	 * @param string $mode
	 * @param string|null $sourceFileOfRename
	 * @param bool $getDecryptedFile
	 * @return resource|bool
	 * @throws GenericEncryptionException
	 * @throws ModuleDoesNotExistsException
	 */
	public function fopen($path, $mode, $sourceFileOfRename = null, $getDecryptedFile = false) {

		// check if the file is stored in the array cache, this means that we
		// copy a file over to the versions folder, in this case we don't want to
		// decrypt it
		if ($this->arrayCache->hasKey('encryption_copy_version_' . $path)) {
			$this->arrayCache->remove('encryption_copy_version_' . $path);
			return $this->storage->fopen($path, $mode);
		}

		$encryptionEnabled = $this->encryptionManager->isEnabled();
		$shouldEncrypt = false;
		$encryptionModule = null;
		$header = $this->getHeader($path);
		$signed = (isset($header['signed']) && $header['signed'] === 'true') ? true : false;
		$fullPath = $this->getFullPath($path);
		$encryptionModuleId = ($encryptionEnabled) ? $this->util->getEncryptionModuleId($header): "";

		if ($this->util->isExcluded($fullPath) === false) {

			$size = $unencryptedSize = 0;
			$realFile = $this->util->stripPartialFileExtension($path);
			$targetExists = $this->file_exists($realFile) || $this->file_exists($path);
			$targetIsEncrypted = false;
			if ($targetExists) {
				// in case the file exists we require the explicit module as
				// specified in the file header - otherwise we need to fail hard to
				// prevent data loss on client side
				if (!empty($encryptionModuleId)) {
					$targetIsEncrypted = true;
					$encryptionModule = $this->encryptionManager->getEncryptionModule($encryptionModuleId);
				}

				if ($this->file_exists($path)) {
					$size = $this->storage->filesize($path);
					$unencryptedSize = $this->filesize($path);
				} else {
					$size = $unencryptedSize = 0;
				}
			}

			try {

				if (
					$mode === 'w'
					|| $mode === 'w+'
					|| $mode === 'wb'
					|| $mode === 'wb+'
				) {
					// don't overwrite encrypted files if encryption is not enabled
					if ($targetIsEncrypted && $encryptionEnabled === false) {
						throw new GenericEncryptionException('Tried to access encrypted file but encryption is not enabled');
					}
					if ($encryptionEnabled) {
						// if $encryptionModuleId is empty, the default module will be used
						$encryptionModule = $this->encryptionManager->getEncryptionModule($encryptionModuleId);
						$shouldEncrypt = $encryptionModule->shouldEncrypt($fullPath);
						$signed = true;
					}
				} else {
					$info = $this->getCache()->get($path);
					// only get encryption module if we found one in the header
					// or if file should be encrypted according to the file cache
					if (!empty($encryptionModuleId)) {
						$encryptionModule = $this->encryptionManager->getEncryptionModule($encryptionModuleId);
						$shouldEncrypt = true;
					} else if (empty($encryptionModuleId) && $info['encrypted'] === true) {
						// we come from a old installation. No header and/or no module defined
						// but the file is encrypted. In this case we need to use the
						// OC_DEFAULT_MODULE to read the file
						$encryptionModule = $this->encryptionManager->getEncryptionModule('OC_DEFAULT_MODULE');
						$shouldEncrypt = true;
						$targetIsEncrypted = true;
					}
				}
			} catch (ModuleDoesNotExistsException $e) {
				$this->logger->warning('Encryption module "' . $encryptionModuleId .
					'" not found, file will be stored unencrypted (' . $e->getMessage() . ')');
			}

			// encryption disabled on write of new file and write to existing unencrypted file -> don't encrypt
			if (!$encryptionEnabled || !$this->mount->getOption('encrypt', true)) {
				if (!$targetExists || !$targetIsEncrypted) {
					$shouldEncrypt = false;
				}
			}

			if ($shouldEncrypt === true && $encryptionModule !== null) {
				/**
				 * The check of $getDecryptedFile, required to get the file in the decrypted state.
				 * It will help us get the normal file handler. And hence we can re-encrypt
				 * the file when necessary, later. The true/false of $getDecryptedFile decides whether
				 * to keep the file decrypted or not.
				 */
				if ($getDecryptedFile === true) {
					return $this->fopenStorage($path, $mode);
					//return $this->storage->fopen($path, $mode);
				}
				$headerSize = $this->getHeaderSize($path);
				$source = $this->fopenStorage($path, $mode);
				if (!is_resource($source)) {
					return false;
				}

				$handle = \OC\Files\Stream\Encryption::wrap($source, $path, $fullPath, $header,
					$this->uid, $encryptionModule, $this->storage, $this->encryptionWrapper, $this->util, $this->fileHelper, $mode,
					$size, $unencryptedSize, $headerSize, $signed, $sourceFileOfRename);
				return $handle;
			}

		}

		return $this->storage->fopen($path, $mode);
	}

	public function fopenStorage($path, $mode) {
		return fopen($this->storage->getSourcePath($path), $mode);
	}

	/**
	 * @param Storage $sourceStorage
	 * @param string $sourceInternalPath
	 * @param string $targetInternalPath
	 * @param bool $preserveMtime
	 * @return bool
	 */
	public function moveFromStorage(Storage $sourceStorage, $sourceInternalPath, $targetInternalPath, $preserveMtime = true, $isRename = true) {
		if ($sourceStorage === $this) {
			return $this->rename($sourceInternalPath, $targetInternalPath);
		}

		// TODO clean this up once the underlying moveFromStorage in OC\Files\Storage\Wrapper\Common is fixed:
		// - call $this->storage->moveFromStorage() instead of $this->copyBetweenStorage
		// - copy the file cache update from  $this->copyBetweenStorage to this method
		// - copy the copyKeys() call from  $this->copyBetweenStorage to this method
		// - remove $this->copyBetweenStorage

		if (!$sourceStorage->isDeletable($sourceInternalPath)) {
			return false;
		}

		$result = $this->copyBetweenStorage($sourceStorage, $sourceInternalPath, $targetInternalPath, $preserveMtime, true);
		if ($result) {
			if ($sourceStorage->is_dir($sourceInternalPath)) {
				$result &= $sourceStorage->rmdir($sourceInternalPath);
			} else {
				$result &= $sourceStorage->unlink($sourceInternalPath);
			}
		}
		return $result;
	}


	/**
	 * @param Storage $sourceStorage
	 * @param string $sourceInternalPath
	 * @param string $targetInternalPath
	 * @param bool $preserveMtime
	 * @param bool $isRename
	 * @return bool
	 */
	public function copyFromStorage(Storage $sourceStorage, $sourceInternalPath, $targetInternalPath, $preserveMtime = false, $isRename = false, $getDecryptedFile = false) {

		// TODO clean this up once the underlying moveFromStorage in OC\Files\Storage\Wrapper\Common is fixed:
		// - call $this->storage->copyFromStorage() instead of $this->copyBetweenStorage
		// - copy the file cache update from  $this->copyBetweenStorage to this method
		// - copy the copyKeys() call from  $this->copyBetweenStorage to this method
		// - remove $this->copyBetweenStorage

		return $this->copyBetweenStorage($sourceStorage, $sourceInternalPath, $targetInternalPath, $preserveMtime, $isRename, $getDecryptedFile);
	}

	/**
	 * Update the encrypted cache version in the database
	 *
	 * @param Storage $sourceStorage
	 * @param string $sourceInternalPath
	 * @param string $targetInternalPath
	 * @param bool $isRename
	 */
	private function updateEncryptedVersion(Storage $sourceStorage, $sourceInternalPath, $targetInternalPath, $isRename) {
		$isEncrypted = $this->encryptionManager->isEnabled() && $this->mount->getOption('encrypt', true) ? 1 : 0;
		$cacheInformation = [
			'encrypted' => (bool)$isEncrypted,
		];
		if($isEncrypted === 1) {
			$encryptedVersion = $sourceStorage->getCache()->get($sourceInternalPath)['encryptedVersion'];

			// In case of a move operation from an unencrypted to an encrypted
			// storage the old encrypted version would stay with "0" while the
			// correct value would be "1". Thus we manually set the value to "1"
			// for those cases.
			// See also https://github.com/owncloud/core/issues/23078
			if($encryptedVersion === 0) {
				$encryptedVersion = 1;
			}

			$cacheInformation['encryptedVersion'] = $encryptedVersion;
		}

		// in case of a rename we need to manipulate the source cache because
		// this information will be kept for the new target
		if ($isRename) {
			/*
			 * Rename is a process of creating a new file. Here we try to use the
			 * incremented version of source file, for the destination file.
			 */
			$encryptedVersion = $sourceStorage->getCache()->get($sourceInternalPath)['encryptedVersion'];
			$cacheInformation['encryptedVersion'] = $encryptedVersion + 1;
			$sourceStorage->getCache()->put($sourceInternalPath, $cacheInformation);
		} else {
			$this->getCache()->put($targetInternalPath, $cacheInformation);
		}
	}

	/**
	 * copy file between two storages
	 *
	 * @param Storage $sourceStorage
	 * @param string $sourceInternalPath
	 * @param string $targetInternalPath
	 * @param bool $preserveMtime
	 * @param bool $isRename
	 * @return bool
	 * @throws \Exception
	 */
	private function copyBetweenStorage(Storage $sourceStorage, $sourceInternalPath, $targetInternalPath, $preserveMtime, $isRename, $getDecryptedFile = false) {
		// for versions we have nothing to do, because versions should always use the
		// key from the original file. Just create a 1:1 copy and done
		if ($this->isVersion($targetInternalPath) ||
			$this->isVersion($sourceInternalPath)) {
			// remember that we try to create a version so that we can detect it during
			// fopen($sourceInternalPath) and by-pass the encryption in order to
			// create a 1:1 copy of the file
			$this->arrayCache->set('encryption_copy_version_' . $sourceInternalPath, true);
			$result = $this->storage->copyFromStorage($sourceStorage, $sourceInternalPath, $targetInternalPath);
			$this->arrayCache->remove('encryption_copy_version_' . $sourceInternalPath);
			if ($result) {
				$info = $this->getCache('', $sourceStorage)->get($sourceInternalPath);
				// make sure that we update the unencrypted size for the version
				if (isset($info['encrypted']) && $info['encrypted'] === true) {
					$this->updateUnencryptedSize(
						$this->getFullPath($targetInternalPath),
						$info['size']
					);
				}
				$this->updateEncryptedVersion($sourceStorage, $sourceInternalPath, $targetInternalPath, $isRename);
			}
			return $result;
		}

		// first copy the keys that we reuse the existing file key on the target location
		// and don't create a new one which would break versions for example.
		$mount = $this->mountManager->findByStorageId($sourceStorage->getId());
		if (count($mount) === 1) {
			$mountPoint = $mount[0]->getMountPoint();
			$source = $mountPoint . '/' . $sourceInternalPath;
			$target = $this->getFullPath($targetInternalPath);
			$this->copyKeys($source, $target);
		} else {
			$this->logger->error('Could not find mount point, can\'t keep encryption keys');
		}

		if ($sourceStorage->is_dir($sourceInternalPath)) {
			$dh = $sourceStorage->opendir($sourceInternalPath);
			$result = $this->mkdir($targetInternalPath);
			if (is_resource($dh)) {
				while ($result and ($file = readdir($dh)) !== false) {
					if (!Filesystem::isIgnoredDir($file)) {
						$result &= $this->copyFromStorage($sourceStorage, $sourceInternalPath . '/' . $file, $targetInternalPath . '/' . $file, false, $isRename);
					}
				}
			}
		} else {
			try {
				$source = $sourceStorage->fopen($sourceInternalPath, 'r');
				if ($isRename) {
					$absSourcePath = Filesystem::normalizePath($sourceStorage->getOwner($sourceInternalPath). '/' . $sourceInternalPath);
					$target = $this->fopen($targetInternalPath, 'w', $absSourcePath);
				} else {
					if ($getDecryptedFile === true) {
						$target = $this->fopen($targetInternalPath, 'w', null, $getDecryptedFile);
					} else {
						$target = $this->fopen($targetInternalPath, 'w');
					}
				}
				list(, $result) = \OC_Helper::streamCopy($source, $target);
				fclose($source);
				fclose($target);
			} catch (\Exception $e) {
				fclose($source);
				fclose($target);
				throw $e;
			}
			if($result) {
				if ($preserveMtime) {
					$this->touch($targetInternalPath, $sourceStorage->filemtime($sourceInternalPath));
				}
				$this->updateEncryptedVersion($sourceStorage, $sourceInternalPath, $targetInternalPath, $isRename);
			} else {
				// delete partially written target file
				$this->unlink($targetInternalPath);
				// delete cache entry that was created by fopen
				$this->getCache()->remove($targetInternalPath);
			}
		}
		return (bool)$result;

	}

	/**
	 * return full path, including mount point
	 *
	 * @param string $path relative to mount point
	 * @return string full path including mount point
	 */
	protected function getFullPath($path) {
		return Filesystem::normalizePath($this->mountPoint . '/' . $path);
	}

	/**
	 * return header size of given file
	 *
	 * @param string $path
	 * @return int
	 */
	protected function getHeaderSize($path) {
		$headerSize = 0;
		$realFile = $this->util->stripPartialFileExtension($path);
		if ($this->storage->file_exists($realFile)) {
			$path = $realFile;
		}
		$firstBlock = $this->readFirstBlock($path);

		if (substr($firstBlock, 0, strlen(Util::HEADER_START)) === Util::HEADER_START) {
			$headerSize = $this->util->getHeaderSize();
		}

		return $headerSize;
	}

	/**
	 * parse raw header to array
	 *
	 * @param string $rawHeader
	 * @return array
	 */
	protected function parseRawHeader($rawHeader) {
		$result = [];
		if (substr($rawHeader, 0, strlen(Util::HEADER_START)) === Util::HEADER_START) {
			$header = $rawHeader;
			$endAt = strpos($header, Util::HEADER_END);
			if ($endAt !== false) {
				$header = substr($header, 0, $endAt + strlen(Util::HEADER_END));

				// +1 to not start with an ':' which would result in empty element at the beginning
				$exploded = explode(':', substr($header, strlen(Util::HEADER_START)+1));

				$element = array_shift($exploded);
				while ($element !== Util::HEADER_END) {
					$result[$element] = array_shift($exploded);
					$element = array_shift($exploded);
				}
			}
		}

		return $result;
	}

	/**
	 * read header from file
	 *
	 * @param string $path
	 * @return array
	 */
	protected function getHeader($path) {
		$realFile = $this->util->stripPartialFileExtension($path);
		$exists = $this->storage->file_exists($realFile);
		if ($exists) {
			$path = $realFile;
		}

		$firstBlock = $this->readFirstBlock($path);
		$result = $this->parseRawHeader($firstBlock);

		// if the header doesn't contain a encryption module we check if it is a
		// legacy file. If true, we add the default encryption module
		if (!isset($result[Util::HEADER_ENCRYPTION_MODULE_KEY])) {
			if (!empty($result)) {
				$result[Util::HEADER_ENCRYPTION_MODULE_KEY] = 'OC_DEFAULT_MODULE';
			} else if ($exists) {
				// if the header was empty we have to check first if it is a encrypted file at all
				// We would do query to filecache only if we know that entry in filecache exists
				$info = $this->getCache()->get($path);
				if (isset($info['encrypted']) && $info['encrypted'] === true) {
					$result[Util::HEADER_ENCRYPTION_MODULE_KEY] = 'OC_DEFAULT_MODULE';
				}
			}
		}

		return $result;
	}

	/**
	 * read encryption module needed to read/write the file located at $path
	 *
	 * @param string $path
	 * @return null|\OCP\Encryption\IEncryptionModule
	 * @throws ModuleDoesNotExistsException
	 * @throws \Exception
	 */
	protected function getEncryptionModule($path) {
		$encryptionModule = null;
		$header = $this->getHeader($path);
		$encryptionModuleId = $this->util->getEncryptionModuleId($header);
		if (!empty($encryptionModuleId)) {
			try {
				$encryptionModule = $this->encryptionManager->getEncryptionModule($encryptionModuleId);
			} catch (ModuleDoesNotExistsException $e) {
				$this->logger->critical('Encryption module defined in "' . $path . '" not loaded!');
				throw $e;
			}
		}
		return $encryptionModule;
	}

	/**
	 * @param string $path
	 * @param int $unencryptedSize
	 */
	public function updateUnencryptedSize($path, $unencryptedSize) {
		$this->unencryptedSize[$path] = $unencryptedSize;
	}

	/**
	 * copy keys to new location
	 *
	 * @param string $source path relative to data/
	 * @param string $target path relative to data/
	 * @return bool
	 */
	protected function copyKeys($source, $target) {
		if (!$this->util->isExcluded($source)) {
			return $this->keyStorage->copyKeys($source, $target);
		}

		return false;
	}

	/**
	 * check if path points to a files version
	 *
	 * @param $path
	 * @return bool
	 */
	protected function isVersion($path) {
		$normalized = Filesystem::normalizePath($path);
		return substr($normalized, 0, strlen('/files_versions/')) === '/files_versions/';
	}

}
