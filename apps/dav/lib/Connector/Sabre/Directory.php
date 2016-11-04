<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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
namespace OCA\DAV\Connector\Sabre;

use OCA\DAV\Connector\Sabre\Exception\Forbidden;
use OCA\DAV\Connector\Sabre\Exception\InvalidPath;
use OCA\DAV\Connector\Sabre\Exception\FileLocked;
use OCP\Files\ForbiddenException;
use OCP\Lock\ILockingProvider;
use OCP\Lock\LockedException;
use Sabre\DAV\Exception\Locked;
use Sabre\DAV\Exception\NotFound;
use OCP\Files\NotPermittedException;

class Directory extends \OCA\DAV\Connector\Sabre\Node
	implements \Sabre\DAV\ICollection, \Sabre\DAV\IQuota {

	/**
	 * Cached directory content
	 *
	 * @var \OCP\Files\Node[]
	 */
	private $dirContent;

	/**
	 * Cached quota info
	 *
	 * @var array
	 */
	private $quotaInfo;

	/**
	 * @var ObjectTree|null
	 */
	private $tree;

	/**
	 * Sets up the node, expects a full path name
	 *
	 * @param \OCP\Files\Folder $info folder info
	 * @param ObjectTree|null $tree
	 * @param \OCP\Share\IManager $shareManager
	 */
	public function __construct(\OCP\Files\Folder $info, $tree = null, $shareManager = null) {
		parent::__construct($info, $shareManager);
		$this->tree = $tree;
	}

	/**
	 * Creates a new file in the directory
	 *
	 * Data will either be supplied as a stream resource, or in certain cases
	 * as a string. Keep in mind that you may have to support either.
	 *
	 * After successful creation of the file, you may choose to return the ETag
	 * of the new file here.
	 *
	 * The returned ETag must be surrounded by double-quotes (The quotes should
	 * be part of the actual string).
	 *
	 * If you cannot accurately determine the ETag, you should not return it.
	 * If you don't store the file exactly as-is (you're transforming it
	 * somehow) you should also not return an ETag.
	 *
	 * This means that if a subsequent GET to this new file does not exactly
	 * return the same contents of what was submitted here, you are strongly
	 * recommended to omit the ETag.
	 *
	 * @param string $name Name of the file
	 * @param resource|string $data Initial payload
	 * @return null|string
	 * @throws Exception\EntityTooLarge
	 * @throws Exception\UnsupportedMediaType
	 * @throws FileLocked
	 * @throws InvalidPath
	 * @throws \Sabre\DAV\Exception
	 * @throws \Sabre\DAV\Exception\BadRequest
	 * @throws \Sabre\DAV\Exception\Forbidden
	 * @throws \Sabre\DAV\Exception\ServiceUnavailable
	 */
	public function createFile($name, $data = null) {

		# the check here is necessary, because createFile uses put covered in sabre/file.php 
		# and not touch covered in files/view.php
		if (\OC\Files\Filesystem::isForbiddenFileOrDir($name)) {
			throw new \Sabre\DAV\Exception\Forbidden();
		}

		try {
			# the check here is necessary, because createFile uses put covered in sabre/file.php 
			# and not touch covered in files/view.php
			if (\OC\Files\Filesystem::isForbiddenFileOrDir($name)) {
				throw new \Sabre\DAV\Exception\Forbidden();
			}

			// for chunked upload also updating a existing file is a "createFile"
			// because we create all the chunks before re-assemble them to the existing file.
			if (isset($_SERVER['HTTP_OC_CHUNKED'])) {

				// exit if we can't create a new file and we don't updatable existing file
				$info = \OC_FileChunking::decodeName($name);
				if (!$this->info->isCreatable() &&
					!$this->info->get($info['name'])->isUpdatable()
				) {
					throw new \Sabre\DAV\Exception\Forbidden();
				}

			} else {
				// For non-chunked upload it is enough to check if we can create a new file
				if (!$this->info->isCreatable()) {
					throw new \Sabre\DAV\Exception\Forbidden();
				}
			}

			// FIXME: need verifyPath alternative
			//$this->fileView->verifyPath($this->path, $name);
		
			// FIXME: this does an additional "touch" to create the file
			$newInfo = $this->info->newFile($name);
			$node = new \OCA\DAV\Connector\Sabre\File($newInfo);
			$node->acquireLock(ILockingProvider::LOCK_SHARED);
			return $node->put($data);
		} catch (\OCP\Files\NotFoundException $ex) {
			throw new NotFound($ex->getMessage());
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			throw new \Sabre\DAV\Exception\ServiceUnavailable($e->getMessage());
		} catch (\OCP\Files\InvalidPathException $ex) {
			throw new InvalidPath($ex->getMessage());
		} catch (ForbiddenException $ex) {
			throw new Forbidden($ex->getMessage(), $ex->getRetry());
		} catch (LockedException $e) {
			throw new FileLocked($e->getMessage(), $e->getCode(), $e);
		}
	}

	/**
	 * Creates a new subdirectory
	 *
	 * @param string $name
	 * @throws FileLocked
	 * @throws InvalidPath
	 * @throws \Sabre\DAV\Exception\Forbidden
	 * @throws \Sabre\DAV\Exception\ServiceUnavailable
	 */
	public function createDirectory($name) {

		# the check here is necessary, because createDirectory does not use the methods in files/view.php
		if (\OC\Files\Filesystem::isForbiddenFileOrDir($name)) {
			throw new \Sabre\DAV\Exception\Forbidden();
		}

		try {
			# the check here is necessary, because createDirectory does not use the methods in files/view.php
			if (\OC\Files\Filesystem::isForbiddenFileOrDir($name)) {
				throw new \Sabre\DAV\Exception\Forbidden();
			}

			if (!$this->info->isCreatable()) {
				throw new \Sabre\DAV\Exception\Forbidden();
			}

			// FIXME: need verifyPath alternative
			//$this->fileView->verifyPath($this->path, $name);
			if (!$this->info->newFolder($name)) {
				$newPath = $this->getPath() . '/' . $name;
				throw new \Sabre\DAV\Exception\Forbidden('Could not create directory ' . $newPath);
			}
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			throw new \Sabre\DAV\Exception\ServiceUnavailable($e->getMessage());
		} catch (\OCP\Files\InvalidPathException $ex) {
			throw new InvalidPath($ex->getMessage());
		} catch (ForbiddenException $ex) {
			throw new Forbidden($ex->getMessage(), $ex->getRetry());
		} catch (LockedException $e) {
			throw new FileLocked($e->getMessage(), $e->getCode(), $e);
		}
	}

	/**
	 * Returns a specific child node, referenced by its name
	 *
	 * @param string $name
	 * @param \OCP\Files\FileInfo $info
	 * @return \Sabre\DAV\INode
	 * @throws InvalidPath
	 * @throws \Sabre\DAV\Exception\NotFound
	 * @throws \Sabre\DAV\Exception\ServiceUnavailable
	 */
	public function getChild($name, $info = null) {
		$path = $this->getPath() . '/' . $name;
		if (is_null($info)) {
			try {
				// FIXME: need verifyPath alternative
				//$this->fileView->verifyPath($this->path, $name);
				$info = $this->info->get($name);
			} catch (\OCP\Files\NotFoundException $e) {
				throw new NotFound('File with name ' . $path . ' could not be located');
			} catch (\OCP\Files\StorageNotAvailableException $e) {
				throw new \Sabre\DAV\Exception\ServiceUnavailable($e->getMessage());
			} catch (\OCP\Files\InvalidPathException $ex) {
				throw new InvalidPath($ex->getMessage());
			} catch (ForbiddenException $e) {
				throw new \Sabre\DAV\Exception\Forbidden();
			}
		}

		if (!$info) {
			throw new NotFound('File with name ' . $path . ' could not be located');
		}

		if ($info instanceof \OCP\Files\Folder) {
			$node = new \OCA\DAV\Connector\Sabre\Directory($info, $this->tree, $this->shareManager);
		} else {
			$node = new \OCA\DAV\Connector\Sabre\File($info, $this->shareManager);
		}
		if ($this->tree) {
			$this->tree->cacheNode($node);
		}
		return $node;
	}

	/**
	 * Returns an array with all the child nodes
	 *
	 * @return \Sabre\DAV\INode[]
	 */
	public function getChildren() {
		if (!is_null($this->dirContent)) {
			return $this->dirContent;
		}
		try {
			$folderContent = $this->info->getDirectoryListing();
		} catch (LockedException $e) {
			throw new Locked();
		}

		$nodes = [];
		foreach ($folderContent as $info) {
			$node = $this->getChild($info->getName(), $info);
			$nodes[] = $node;
		}
		$this->dirContent = $nodes;
		return $this->dirContent;
	}

	/**
	 * Checks if a child exists.
	 *
	 * @param string $name
	 * @return bool
	 */
	public function childExists($name) {
		// note: here we do NOT resolve the chunk file name to the real file name
		// to make sure we return false when checking for file existence with a chunk
		// file name.
		// This is to make sure that "createFile" is still triggered
		// (required old code) instead of "updateFile".
		//
		// TODO: resolve chunk file name here and implement "updateFile"
		return $this->info->nodeExists($name);

	}

	/**
	 * Deletes all files in this directory, and then itself
	 *
	 * @return void
	 * @throws FileLocked
	 * @throws \Sabre\DAV\Exception\Forbidden
	 */
	public function delete() {
		// prevent deleting user's home
		$path = $this->getPath();
		if ($path === '' || $path === '/' || !$this->info->isDeletable()) {
			throw new \Sabre\DAV\Exception\Forbidden();
		}

		try {
			if (!$this->info->delete()) {
				// assume it wasn't possible to remove due to permission issue
				throw new \Sabre\DAV\Exception\Forbidden();
			}
		} catch (NotPermittedException $ex) {
			throw new Forbidden($ex->getMessage(), $ex->getRetry());
		} catch (ForbiddenException $ex) {
			throw new Forbidden($ex->getMessage(), $ex->getRetry());
		} catch (LockedException $e) {
			throw new FileLocked($e->getMessage(), $e->getCode(), $e);
		}
	}

	/**
	 * Returns available diskspace information
	 *
	 * @return array
	 */
	public function getQuotaInfo() {
		if ($this->quotaInfo) {
			return $this->quotaInfo;
		}
		try {
			$storageInfo = \OC_Helper::getStorageInfo($this->info->getPath(), $this->info);
			if ($storageInfo['quota'] === \OCP\Files\FileInfo::SPACE_UNLIMITED) {
				$free = \OCP\Files\FileInfo::SPACE_UNLIMITED;
			} else {
				$free = $storageInfo['free'];
			}
			$this->quotaInfo = [
				$storageInfo['used'],
				$free
			];
			return $this->quotaInfo;
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			return [0, 0];
		}
	}

}
