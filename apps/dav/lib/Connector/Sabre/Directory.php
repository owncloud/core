<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Martin Mattel <martin.mattel@diemattels.at>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
namespace OCA\DAV\Connector\Sabre;

use OC\Files\FileInfo;
use OC\Files\Filesystem;
use OC\Files\Mount\MoveableMount;
use OCA\DAV\Connector\Sabre\Exception\FileLocked;
use OCA\DAV\Connector\Sabre\Exception\Forbidden;
use OCA\DAV\Connector\Sabre\Exception\InvalidPath;
use OCA\DAV\Upload\FutureFile;
use OCP\Files\FileContentNotAllowedException;
use OCP\Files\ForbiddenException;
use OCP\Files\InvalidPathException;
use OCP\Files\StorageNotAvailableException;
use OCP\Lock\ILockingProvider;
use OCP\Lock\LockedException;
use Sabre\DAV\Exception\BadRequest;
use Sabre\DAV\Exception\Forbidden as SabreForbidden;
use Sabre\DAV\Exception\Locked as SabreLocked;
use Sabre\DAV\Exception\NotFound as SabreNotFound;
use Sabre\DAV\Exception\ServiceUnavailable as SabreServiceUnavailable;
use Sabre\DAV\ICollection;
use Sabre\DAV\IFile;
use Sabre\DAV\IMoveTarget;
use Sabre\DAV\INode;
use Sabre\DAV\IQuota;
use Sabre\HTTP\URLUtil;

class Directory extends Node implements ICollection, IQuota, IMoveTarget {

	/**
	 * Cached directory content
	 *
	 * @var INode[]
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
	 * @param \OC\Files\View $view
	 * @param \OCP\Files\FileInfo $info
	 * @param ObjectTree|null $tree
	 * @param \OCP\Share\IManager $shareManager
	 */
	public function __construct($view, $info, ObjectTree $tree = null, $shareManager = null) {
		parent::__construct($view, $info, $shareManager);
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
	 * @throws SabreForbidden
	 * @throws ServiceUnavailable
	 */
	public function createFile($name, $data = null) {

		# the check here is necessary, because createFile uses put covered in sabre/file.php
		# and not touch covered in files/view.php
		if (Filesystem::isForbiddenFileOrDir($name)) {
			throw new SabreForbidden();
		}

		try {
			# the check here is necessary, because createFile uses put covered in sabre/file.php
			# and not touch covered in files/view.php
			if (Filesystem::isForbiddenFileOrDir($name)) {
				throw new SabreForbidden();
			}

			$info = false;
			if (\OC_FileChunking::isWebdavChunk()) {
				// For chunked upload also updating a existing file is a "createFile"
				// because we create all the chunks before re-assemble them to the existing file.

				// exit if we can't create a new file and we don't update existing file
				$chunkInfo = \OC_FileChunking::decodeName($name);
				if (!$this->fileView->isCreatable($this->path) &&
					!$this->fileView->isUpdatable($this->path . '/' . $chunkInfo['name'])
				) {
					throw new SabreForbidden();
				}
			} elseif (FutureFile::isFutureFile()) {
				// Future file (chunked upload) requires fileinfo
				$info = $this->fileView->getFileInfo($this->path . '/' . $name);
			} else {
				// For non-chunked upload it is enough to check if we can create a new file
				if (!$this->fileView->isCreatable($this->path)) {
					throw new SabreForbidden();
				}
			}

			$this->fileView->verifyPath($this->path, $name);

			$path = $this->fileView->getAbsolutePath($this->path) . '/' . $name;

			if (!$info) {
				// use a dummy FileInfo which is acceptable here since it will be refreshed after the put is complete
				$info = new FileInfo($path, null, null, [], null);
			}

			$node = new File($this->fileView, $info);
			$node->acquireLock(ILockingProvider::LOCK_SHARED);
			return $node->put($data);
		} catch (StorageNotAvailableException $e) {
			throw new SabreServiceUnavailable($e->getMessage());
		} catch (InvalidPathException $ex) {
			throw new InvalidPath($ex->getMessage());
		} catch (ForbiddenException $ex) {
			if ($ex->getPrevious() instanceof FileContentNotAllowedException) {
				throw new FileContentNotAllowedException($ex->getMessage(), $ex->getRetry(), $ex);
			} else {
				throw new Forbidden($ex->getMessage(), $ex->getRetry());
			}
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
	 * @throws SabreForbidden
	 * @throws SabreServiceUnavailable
	 */
	public function createDirectory($name) {

		# the check here is necessary, because createDirectory does not use the methods in files/view.php
		if (Filesystem::isForbiddenFileOrDir($name)) {
			throw new SabreForbidden();
		}

		try {
			# the check here is necessary, because createDirectory does not use the methods in files/view.php
			if (Filesystem::isForbiddenFileOrDir($name)) {
				throw new SabreForbidden();
			}

			if (!$this->info->isCreatable()) {
				throw new SabreForbidden();
			}

			$this->fileView->verifyPath($this->path, $name);
			$newPath = $this->path . '/' . $name;
			if (!$this->fileView->mkdir($newPath)) {
				throw new SabreForbidden('Could not create directory ' . $newPath);
			}
		} catch (StorageNotAvailableException $e) {
			throw new SabreServiceUnavailable($e->getMessage());
		} catch (InvalidPathException $ex) {
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
	 * @throws SabreNotFound
	 * @throws SabreServiceUnavailable
	 * @throws SabreForbidden
	 */
	public function getChild($name, $info = null) {
		if (!$this->info->isReadable()) {
			// avoid detecting files through this way
			throw new SabreNotFound();
		}

		$path = $this->path . '/' . $name;
		if ($info === null) {
			try {
				$this->fileView->verifyPath($this->path, $name);
				$info = $this->fileView->getFileInfo($path);
			} catch (StorageNotAvailableException $e) {
				throw new SabreServiceUnavailable($e->getMessage());
			} catch (InvalidPathException $ex) {
				throw new InvalidPath($ex->getMessage());
			} catch (ForbiddenException $e) {
				throw new SabreForbidden();
			}
		}

		if (!$info) {
			throw new SabreNotFound('File with name ' . $path . ' could not be located');
		}

		if ($info['mimetype'] == 'httpd/unix-directory') {
			$node = new Directory($this->fileView, $info, $this->tree, $this->shareManager);
		} else {
			$node = new File($this->fileView, $info, $this->shareManager);
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
	 * @throws Forbidden
	 * @throws SabreLocked
	 */
	public function getChildren() {
		if ($this->dirContent !== null) {
			return $this->dirContent;
		}
		try {
			if (!$this->info->isReadable()) {
				// return 403 instead of 404 because a 404 would make
				// the caller believe that the collection itself does not exist
				throw new Forbidden('No read permissions');
			}
			$folderContent = $this->fileView->getDirectoryContent($this->path);
		} catch (LockedException $e) {
			throw new SabreLocked();
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
		$path = $this->path . '/' . $name;
		return $this->fileView->file_exists($path);
	}

	/**
	 * Deletes all files in this directory, and then itself
	 *
	 * @return void
	 * @throws FileLocked
	 * @throws SabreForbidden
	 */
	public function delete() {
		if ($this->path === '' || $this->path === '/' || !$this->info->isDeletable()) {
			throw new SabreForbidden();
		}

		try {
			if (!$this->fileView->rmdir($this->path)) {
				// assume it wasn't possible to remove due to permission issue
				throw new SabreForbidden();
			}
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
		} catch (StorageNotAvailableException $e) {
			return [0, 0];
		}
	}

	/**
	 * Moves a node into this collection.
	 *
	 * It is up to the implementors to:
	 *   1. Create the new resource.
	 *   2. Remove the old resource.
	 *   3. Transfer any properties or other data.
	 *
	 * Generally you should make very sure that your collection can easily move
	 * the move.
	 *
	 * If you don't, just return false, which will trigger sabre/dav to handle
	 * the move itself. If you return true from this function, the assumption
	 * is that the move was successful.
	 *
	 * @param string $targetName New local file/collection name.
	 * @param string $fullSourcePath Full path to source node
	 * @param INode $sourceNode Source node itself
	 * @return bool
	 * @throws BadRequest
	 * @throws SabreServiceUnavailable
	 * @throws SabreForbidden
	 * @throws Forbidden
	 * @throws FileLocked
	 * @throws InvalidPath
	 */
	public function moveInto($targetName, $fullSourcePath, INode $sourceNode) {
		if (!$sourceNode instanceof Node) {
			// it's a file of another kind, like FutureFile
			if ($sourceNode instanceof IFile) {
				// fallback to default copy+delete handling
				return false;
			}
			throw new BadRequest('Incompatible node types');
		}

		if (!$this->fileView) {
			throw new SabreServiceUnavailable('filesystem not setup');
		}

		$destinationPath = $this->getPath() . '/' . $targetName;

		# check the destination path, for source see below
		if (Filesystem::isForbiddenFileOrDir($destinationPath)) {
			throw new SabreForbidden();
		}

		$targetNodeExists = $this->childExists($targetName);

		// at getNodeForPath we also check the path for isForbiddenFileOrDir
		// with that we have covered both source and destination
		if ($sourceNode instanceof Directory && $targetNodeExists) {
			throw new SabreForbidden('Could not copy directory ' . $sourceNode->getName() . ', target exists');
		}

		list($sourceDir, ) = URLUtil::splitPath($sourceNode->getPath());
		$destinationDir = $this->getPath();

		$sourcePath = $sourceNode->getPath();

		$isMovableMount = false;
		$sourceMount = \OC::$server->getMountManager()->find($this->fileView->getAbsolutePath($sourcePath));
		$internalPath = $sourceMount->getInternalPath($this->fileView->getAbsolutePath($sourcePath));
		if ($sourceMount instanceof MoveableMount && $internalPath === '') {
			$isMovableMount = true;
		}

		try {
			$sameFolder = ($sourceDir === $destinationDir);
			// if we're overwriting or same folder
			if ($targetNodeExists || $sameFolder) {
				// note that renaming a share mount point is always allowed
				if (!$this->fileView->isUpdatable($destinationDir) && !$isMovableMount) {
					throw new SabreForbidden();
				}
			} else {
				if (!$this->fileView->isCreatable($destinationDir)) {
					throw new SabreForbidden();
				}
			}

			if (!$sameFolder) {
				// moving to a different folder, source will be gone, like a deletion
				// note that moving a share mount point is always allowed
				if (!$this->fileView->isDeletable($sourcePath) && !$isMovableMount) {
					throw new SabreForbidden();
				}
			}

			$fileName = \basename($destinationPath);
			try {
				$this->fileView->verifyPath($destinationDir, $fileName);
			} catch (InvalidPathException $ex) {
				throw new InvalidPath($ex->getMessage());
			}

			$renameOkay = $this->fileView->rename($sourcePath, $destinationPath);
			if (!$renameOkay) {
				throw new SabreForbidden('');
			}
		} catch (StorageNotAvailableException $e) {
			throw new SabreServiceUnavailable($e->getMessage());
		} catch (ForbiddenException $ex) {
			throw new Forbidden($ex->getMessage(), $ex->getRetry());
		} catch (LockedException $e) {
			throw new FileLocked($e->getMessage(), $e->getCode(), $e);
		}

		return true;
	}

	/**
	 * Create a file directly, bypassing the hooks
	 *
	 * @param string $name name
	 * @param resource $data data
	 */
	public function createFileDirectly($name, $data) {
		$this->fileView->file_put_contents($this->getPath() . '/' .  $name, $data);
	}
}
