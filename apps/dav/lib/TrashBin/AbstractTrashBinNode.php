<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\DAV\TrashBin;

use OCA\DAV\Connector\Sabre\Exception\FileLocked;
use OCP\Files\FileInfo;
use OCP\Files\ForbiddenException;
use OCP\Files\StorageNotAvailableException;
use OCP\Lock\LockedException;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\ServiceUnavailable as SabreServiceUnavailable;

abstract class AbstractTrashBinNode implements ITrashBinNode {

	/**
	 * @var FileInfo
	 */
	protected $fileInfo;
	/**
	 * @var TrashBinManager
	 */
	protected $trashBinManager;
	/**
	 * @var string
	 */
	protected $user;

	public function __construct(string $user, FileInfo $fileInfo,
								TrashBinManager $trashBinManager) {
		$this->fileInfo = $fileInfo;
		$this->trashBinManager = $trashBinManager;
		$this->user = $user;
	}

	/**
	 * Returns the name of the node.
	 *
	 * This is used to generate the url.
	 *
	 * @return string
	 */
	public function getName() {
		return (string)$this->fileInfo->getId();
	}

	/**
	 * Returns the mime-type for a file
	 *
	 * If null is returned, we'll assume application/octet-stream
	 *
	 * @return string|null
	 */
	public function getContentType() {
		return $this->fileInfo->getMimetype();
	}

	public function getETag() {
		return '"' . $this->fileInfo->getEtag() . '"';
	}

	public function getLastModified() {
		return $this->fileInfo->getMtime();
	}
	public function getSize() {
		return $this->fileInfo->getSize();
	}

	public function getOriginalFileName() : string {
		$path = $this->getPathInTrash();
		if (\count($path) === 1) {
			$path = \end($path);
			$pathInfo = \pathinfo($path);
			return $pathInfo['filename'];
		}
		return \end($path);
	}

	public function getOriginalLocation() : string {
		$pathElements = $this->getPathInTrash();
		$path = $pathElements[0];
		$pathParts = \pathinfo($path);
		$timestamp = (int)\substr($pathParts['extension'], 1);

		$pathElements[0] = $pathParts['filename'];
		$originalPath = \implode('/', $pathElements);

		$location = $this->trashBinManager->getLocation($this->user, $pathParts['filename'], $timestamp);
		if ($location !== '.') {
			$originalPath = $location . '/' . $originalPath;
		}

		return $originalPath;
	}

	public function getDeleteTimestamp() : int {
		$path = $this->getPathInTrash();
		$path = $path[0];
		$pathParts = \pathinfo($path);
		return (int)\substr($pathParts['extension'], 1);
	}

	/**
	 * @param string $targetLocation
	 * @return bool
	 */
	public function restore(string $targetLocation): bool {
		try {
			return $this->trashBinManager->restore($this->user, $this, $targetLocation);
		} catch (ForbiddenException $ex) {
			throw new \OCA\DAV\Connector\Sabre\Exception\Forbidden($ex->getMessage(), $ex->getRetry());
		} catch (LockedException $e) {
			throw new FileLocked($e->getMessage(), $e->getCode(), $e);
		} catch (StorageNotAvailableException $e) {
			throw new SabreServiceUnavailable($e->getMessage());
		}
	}

	public function delete() {
		try {
			$this->trashBinManager->delete($this->user, $this);
		} catch (ForbiddenException $ex) {
			throw new \OCA\DAV\Connector\Sabre\Exception\Forbidden($ex->getMessage(), $ex->getRetry());
		} catch (LockedException $e) {
			throw new FileLocked($e->getMessage(), $e->getCode(), $e);
		} catch (StorageNotAvailableException $e) {
			throw new SabreServiceUnavailable($e->getMessage());
		}
	}

	/**
	 * @return array
	 */
	public function getPathInTrash() {
		$path = $this->fileInfo->getPath();
		$path = \explode('/', $path);
		return \array_splice($path, 4);
	}

	public function setName($name) {
		throw new Forbidden('Permission denied to rename this resource');
	}
}
