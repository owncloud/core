<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OC\Files\Storage;

use OCP\Files\Folder;
use OCP\Files\Node as FilesNode;
use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;
use OCP\Files\Storage\IStorage;
use OC\Files\Storage\Folder as StorageFolder;

/**
 * Class Node
 *
 * The Storage/Node classes are intended to work directly on the storage,
 * bypassing any updates to the metadata in the filecache, which is expensive
 * and not needed for avatars, thumbnails and maybe other things.
 *
 * @package OC\Files\Storage
 */
abstract class Node implements FilesNode {

	/** @var IStorage */
	protected $storage;

	/** @var string $path relativ to the storage root */
	protected $path;

	/**
	 * @param IStorage $storage
	 * @param $path
	 */
	public function __construct(IStorage $storage, $path) {
		$this->storage = $storage;
		$this->path = $path;
	}

	/**
	 * Get the full mimetype of the file or folder i.e. 'image/png'
	 *
	 * @return string
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function getMimetype() {
		return $this->storage->getMimeType($this->path);
	}

	/**
	 * Get the first part of the mimetype of the file or folder i.e. 'image'
	 *
	 * @return string
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function getMimePart() {
		return \explode('/', $this->getMimetype(), 2)[0];
	}

	/** {@inheritdoc} */
	public function isEncrypted() {
		return false;
	}

	/**
	 * Check whether this is a file or a folder
	 *
	 * @return string \OCP\Files\FileInfo::TYPE_FILE|\OCP\Files\FileInfo::TYPE_FOLDER
	 * @throws \Exception
	 * @throws \UnexpectedValueException
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function getType() {
		$type = $this->storage->filetype($this->path);
		switch ($type) {
			case 'file': return \OCP\Files\FileInfo::TYPE_FILE;
			case 'dir': return \OCP\Files\FileInfo::TYPE_FOLDER;
			case 'link': //TODO readlink and check it if path is in same storage
			default:
				throw new \UnexpectedValueException("filetype $type not supported ");
		}
	}

	/**
	 * Check whether new files or folders can be created inside this folder
	 *
	 * @return bool
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function isCreatable() {
		return $this->storage->isCreatable($this->path);
	}

	/** {@inheritdoc} */
	public function isShared() {
		return false;
	}

	/**
	 * Check if a file or folder is mounted
	 *
	 * @throws NotPermittedException
	 */
	public function isMounted() {
		throw new NotPermittedException();
	}

	/**
	 * Get the mountpoint the file belongs to
	 *
	 * @throws NotPermittedException
	 */
	public function getMountPoint() {
		throw new NotPermittedException();
	}

	/**
	 * Get the owner of the file
	 *
	 * @throws NotPermittedException
	 */
	public function getOwner() {
		throw new NotPermittedException();
	}

	/**
	 * Get the stored checksum for this file
	 *
	 * @throws NotPermittedException
	 */
	public function getChecksum() {
		throw new NotPermittedException();
	}

	/**
	 * Move the file or folder to a new location
	 *
	 * @param string $targetPath the absolute target path
	 * @throws NotPermittedException
	 */
	public function move($targetPath) {
		throw new NotPermittedException();
	}

	/**
	 * Delete the file or folder
	 *
	 * @return void
	 * @throws \Exception
	 * @throws \UnexpectedValueException
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	abstract public function delete();

	/**
	 * Cope the file or folder to a new location
	 *
	 * @param string $targetPath the absolute target path
	 * @throws NotPermittedException
	 */
	public function copy($targetPath) {
		throw new NotPermittedException();
	}

	/**
	 * Change the modified date of the file or folder
	 * If $mtime is omitted the current time will be used
	 *
	 * @param int $mtime (optional) modified date as unix timestamp
	 * @return void
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function touch($mtime = null) {
		$this->storage->touch($this->path, $mtime);
	}

	/** {@inheritdoc} */
	public function getStorage() {
		return $this->storage;
	}

	/**
	 * Get the full path of the file or folder
	 *
	 * @return string
	 * @throws NotPermittedException
	 */
	public function getPath() {
		throw new NotPermittedException();
	}

	/** {@inheritdoc} */
	public function getInternalPath() {
		return $this->path;
	}

	/**
	 * Get the internal file id for the file or folder
	 *
	 * @throws NotPermittedException
	 */
	public function getId() {
		throw new NotPermittedException();
	}

	/**
	 * Get metadata of the file or folder
	 * The returned array contains the following values:
	 *  - mtime
	 *  - size
	 *
	 * @throws \OCP\Files\StorageNotAvailableException
	 * @return array
	 */
	public function stat() {
		return $this->storage->stat($this->path);
	}

	/**
	 * Get the modified date of the file or folder as unix timestamp
	 *
	 * @return int
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function getMTime() {
		return $this->storage->filemtime($this->path);
	}

	/**
	 * Get the size of the file or folder in bytes
	 *
	 * @return int
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function getSize() {
		return $this->storage->filesize($this->path);
	}

	/**
	 * Get the Etag of the file or folder
	 * The Etag is an string id used to detect changes to a file or folder,
	 * every time the file or folder is changed the Etag will change to
	 *
	 * @return string
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function getEtag() {
		return $this->storage->getETag($this->path);
	}

	/**
	 * Get the permissions of the file or folder as a combination of one or more of the following constants:
	 *  - \OCP\Constants::PERMISSION_READ
	 *  - \OCP\Constants::PERMISSION_UPDATE
	 *  - \OCP\Constants::PERMISSION_CREATE
	 *  - \OCP\Constants::PERMISSION_DELETE
	 *  - \OCP\Constants::PERMISSION_SHARE
	 *
	 * @return int
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function getPermissions() {
		return $this->storage->getPermissions($this->path);
	}

	/**
	 * Check if the file or folder is readable
	 *
	 * @return bool
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function isReadable() {
		return $this->storage->isReadable($this->path);
	}

	/**
	 * Check if the file or folder is writable
	 *
	 * @return bool
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function isUpdateable() {
		return $this->storage->isUpdatable($this->path);
	}

	/**
	 * Check if the file or folder is deletable
	 *
	 * @return bool
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function isDeletable() {
		return $this->storage->isDeletable($this->path);
	}

	/** {@inheritdoc} */
	public function isShareable() {
		return false;
	}

	/**
	 * Get the parent folder of the file or folder
	 *
	 * @return Folder
	 * @throws \OCP\Files\NotFoundException
	 */
	public function getParent() {
		$parent = \dirname($this->path);
		if ($parent === '' || $parent === '.') {
			throw new NotFoundException($parent);
		}
		return new StorageFolder($this->storage, $parent);
	}

	/** {@inheritdoc} */
	public function getName() {
		return \basename($this->path);
	}

	/**
	 * Acquire a lock on this file or folder.
	 *
	 * A shared (read) lock will prevent any exclusive (write) locks from being created but any number of shared locks
	 * can be active at the same time.
	 * An exclusive lock will prevent any other lock from being created (both shared and exclusive).
	 *
	 * A locked exception will be thrown if any conflicting lock already exists
	 *
	 * Note that this uses mandatory locking, if you acquire an exclusive lock on a file it will block *all*
	 * other operations for that file, even within the same php process.
	 *
	 * Acquiring any lock on a file will also create a shared lock on all parent folders of that file.
	 *
	 * Note that in most cases you won't need to manually manage the locks for any files you're working with,
	 * any filesystem operation will automatically acquire the relevant locks for that operation.
	 *
	 * @param int $type \OCP\Lock\ILockingProvider::LOCK_SHARED or \OCP\Lock\ILockingProvider::LOCK_EXCLUSIVE
	 * @throws NotPermittedException
	 */
	public function lock($type) {
		throw new NotPermittedException();
	}

	/**
	 * Check the type of an existing lock.
	 *
	 * A shared lock can be changed to an exclusive lock is there is exactly one shared lock on the file,
	 * an exclusive lock can always be changed to a shared lock since there can only be one exclusive lock int he first place.
	 *
	 * A locked exception will be thrown when these preconditions are not met.
	 * Note that this is also the case if no existing lock exists for the file.
	 *
	 * @param int $targetType \OCP\Lock\ILockingProvider::LOCK_SHARED or \OCP\Lock\ILockingProvider::LOCK_EXCLUSIVE
	 * @throws NotPermittedException
	 */
	public function changeLock($targetType) {
		throw new NotPermittedException();
	}

	/**
	 * Release an existing lock.
	 *
	 * This will also free up the shared locks on any parent folder that were automatically acquired when locking the file.
	 *
	 * Note that this method will not give any sort of error when trying to free a lock that doesn't exist.
	 *
	 * @param int $type \OCP\Lock\ILockingProvider::LOCK_SHARED or \OCP\Lock\ILockingProvider::LOCK_EXCLUSIVE
	 * @throws NotPermittedException
	 */
	public function unlock($type) {
		throw new NotPermittedException();
	}
}
