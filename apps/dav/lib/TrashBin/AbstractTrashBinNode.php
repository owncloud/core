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

use OCA\Files_Trashbin\Trashbin;
use OCP\Files\FileInfo;

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

	public function __construct(string $user, FileInfo $fileInfo, TrashBinManager $trashBinManager) {
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
		return (string)$this->fileInfo['fileid'];
	}

	/**
	 * Returns the mime-type for a file
	 *
	 * If null is returned, we'll assume application/octet-stream
	 *
	 * @return string|null
	 */
	public function getContentType() {
		return $this->fileInfo['mimetype'];
	}

	public function getETag() {
		return $this->fileInfo['etag'];
	}

	public function getLastModified() {
		return $this->fileInfo['mtime'];
	}
	public function getSize() {
		return $this->fileInfo['size'];
	}

	public function getOriginalFileName() : string {
		$path = $this->getPathInTrash();
		if (\count($path) === 1) {
			$path = \end($path);
			$pathparts = \pathinfo($path);
			return $pathparts['filename'];
		}
		return \end($path);
	}

	public function getOriginalLocation() : string {
		$pathElements = $this->getPathInTrash();
		$path = $pathElements[0];
		$pathParts = \pathinfo($path);
		$timestamp = (int)\substr($pathParts['extension'], 1);

		// TODO: hide in TrashBinManager
		$location = Trashbin::getLocation($this->user, $pathParts['filename'], $timestamp);

		$pathElements[0] = $pathParts['filename'];
		return $location . '/' . \implode('/', $pathElements);
	}

	public function getDeleteTimestamp() : int {
		$path = $this->getPathInTrash();
		$path = $path[0];
		$pathParts = \pathinfo($path);
		return (int)\substr($pathParts['extension'], 1);
	}

	public function restore(): bool {
		$path = $this->getPathInTrash();
		$path = \implode('/', $path);
		return Trashbin::restore($path,
			$this->getOriginalFileName(), $this->getDeleteTimestamp());
	}

	public function delete() : void {
		$path = $this->fileInfo->getPath();
		$path = \explode('/', $path);
		$user = $path[1];
		$elements = \array_splice($path, 4);
		$path = \implode('/', $elements);

		$delimiter = \strrpos($path, '.d');
		$path = \substr($path, 0, $delimiter);

		Trashbin::delete($path, $user, $this->getDeleteTimestamp());
	}

	/**
	 * @return array
	 */
	private function getPathInTrash() {
		$path = $this->fileInfo->getPath();
		$path = \explode('/', $path);
		return \array_splice($path, 4);
	}
}
