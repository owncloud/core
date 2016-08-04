<?php
/**
 * @author Piotr Mrowczynski <Piotr.Mrowczynski@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OCA\DAV\Files;

use OCA\DAV\Connector\Sabre\Exception\FileLocked;
use OCP\Files\StorageNotAvailableException;
use OCP\Lock\ILockingProvider;
use OCP\Lock\LockedException;
use Sabre\DAV\Exception;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\ServiceUnavailable;
use OCA\DAV\Connector\Sabre\File;

class BundledFile extends File {

	private $partFilePath = null;

	/**
	 * TODO
	 *
	 * @throws TODO
	 * @return resource $property
	 */
	public function getPartFileResource() {
		// verify path of the target
		$this->verifyPath();

		$this->partFilePath = $this->getPartFileBasePath($this->path) . '.ocTransferId' . rand() . '.part';

		// the part file and target file might be on a different storage in case of a single file storage (e.g. single file share)
		/** @var \OC\Files\Storage\Storage $partStorage */
		list($partStorage, $internalPartPath) = $this->fileView->resolvePath($this->partFilePath);

		$target = $partStorage->fopen($internalPartPath, 'wb');
		if ($target === false) {
			\OCP\Util::writeLog('webdav', '\OC\Files\Filesystem::fopen() failed', \OCP\Util::ERROR);
				// because we have no clue about the cause we can only throw back a 500/Internal Server Error
			$this->partFilePath = null;
			throw new Exception('Could not write file contents');
		}

		return $target;
	}

	/**
	 * TODO
	 *
	 * @return void
	 */
	public function unlinkPartFile() {
		//Prerequisite here is that partFile has to be already existing
		if ($this->partFilePath != null) {
			list($partStorage, $internalPartPath) = $this->fileView->resolvePath($this->partFilePath);
			$partStorage->unlink($internalPartPath);
		}
	}
	/**
	 * Creates the data
	 *
	 * The data argument is a readable stream
	 *
	 * @param resource $fileData
	 * @param array $fileAttributes
	 *
	 * @throws TODO
	 * @return Array $property
	 */
	public function createFile($fileAttributes) {
		//Prerequisite here is that partFile has to be already existing
		if ($this->partFilePath == null) {
			throw new Forbidden('Part file does not exists, cannot create target file');
		}

		$exists = $this->fileView->file_exists($this->path);
		if ($this->info && $exists) {
			throw new Forbidden('File does exists, cannot create file');
		}
		// verify path of the target
		$this->verifyPath();

		/** @var \OC\Files\Storage\Storage $storage */
		list($storage, $internalPath) = $this->fileView->resolvePath($this->path);
		list($partStorage, $internalPartPath) = $this->fileView->resolvePath($this->partFilePath);

		try {
			$view = \OC\Files\Filesystem::getView();
			if ($view) {
				$run = $this->emitPreHooks($exists);
			} else {
				$run = true;
			}

			try {
				$this->changeLock(ILockingProvider::LOCK_EXCLUSIVE);
			} catch (LockedException $e) {
				$partStorage->unlink($internalPartPath);
				throw new FileLocked($e->getMessage(), $e->getCode(), $e);
			}

			try {
				if ($run) {
					$renameOkay = $storage->moveFromStorage($partStorage, $internalPartPath, $internalPath);
					$fileExists = $storage->file_exists($internalPath);
				}
				if (!$run || $renameOkay === false || $fileExists === false) {
					\OCP\Util::writeLog('webdav', 'renaming part file to final file failed', \OCP\Util::ERROR);
					throw new Exception('Could not rename part file to final file');
				}
			} catch (\Exception $e) {
				$this->unlinkPartFile();
				$this->convertToSabreException($e);
			}

			// since we skipped the view we need to scan and emit the hooks ourselves
			$storage->getUpdater()->update($internalPath);

			try {
				$this->changeLock(ILockingProvider::LOCK_SHARED);
			} catch (LockedException $e) {
				$this->unlinkPartFile();
				throw new FileLocked($e->getMessage(), $e->getCode(), $e);
			}

			if ($view) {
				$this->emitPostHooks($exists);
			}
			
			// allow sync clients to send the mtime along in a header
			if (isset($fileAttributes['x-oc-mtime'])) {
				if ($this->fileView->touch($this->path, $fileAttributes['x-oc-mtime'])) {
					$property['{DAV:}x-oc-mtime'] = 'accepted'; //TODO: not sure about that
				}
			}

			$this->refreshInfo();

		} catch (StorageNotAvailableException $e) {
			$this->unlinkPartFile();
			throw new ServiceUnavailable("Failed to check file size: " . $e->getMessage());
		}

		//TODO add proper attributes
		$etag = $this->getEtag();
		$property['{DAV:}etag'] = $etag; //TODO: not sure about that
		$property['{DAV:}oc-etag'] = $etag; //TODO: not sure about that
		$property['{DAV:}oc-fileid'] = $this->getFileId();//TODO: not sure about that
		return $property;
	}

	/**
	 *
	 * TODO: description
	 *
	 * @param resource $data
	 *
	 * @throws Forbidden
	 */
	public function put($data) {
		throw new Forbidden('PUT method not supported for bundling');
	}
}