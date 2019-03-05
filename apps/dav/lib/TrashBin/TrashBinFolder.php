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
use Sabre\DAV\Collection;
use Sabre\DAV\INode;

class TrashBinFolder extends Collection implements ITrashBinNode {

	/**
	 * @var FileInfo
	 */
	private $fileInfo;
	/**
	 * @var TrashBinManager
	 */
	private $trashBinManager;

	public function __construct(FileInfo $fileInfo, TrashBinManager $trashBinManager) {
		$this->fileInfo = $fileInfo;
		$this->trashBinManager = $trashBinManager;
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

	public function getChild($name) {
		return $this->trashBinManager->getItemByFileId($this->getName(), $name);
	}

	/**
	 * Returns an array with all the child nodes.
	 *
	 * @return INode[]
	 */
	public function getChildren() {
		return $this->trashBinManager->getChildren($this->getName(), $this->getName());
	}

	public function getOriginalFileName() : string {
		$pathparts = \pathinfo($this->fileInfo->getName());
		return $pathparts['filename'];
	}

	public function getOriginalLocation() : string {
		$pathparts = \pathinfo($this->fileInfo->getName());
		$timestamp = \substr($pathparts['extension'], 1);
		// TODO: hide in TrashBinManager
		return Trashbin::getLocation($this->fileInfo->getOwner(), $pathparts['filename'], $timestamp);
	}

	public function getDeleteTimestamp() : int {
		$pathparts = \pathinfo($this->fileInfo->getName());
		return (int)\substr($pathparts['extension'], 1);
	}
}
