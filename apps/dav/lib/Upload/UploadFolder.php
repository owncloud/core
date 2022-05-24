<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
namespace OCA\DAV\Upload;

use OCA\DAV\Connector\Sabre\Directory;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\ICollection;

class UploadFolder implements ICollection {
	private $node;

	public function __construct(Directory $node) {
		$this->node = $node;
	}

	public function createFile($name, $data = null) {
		// need to bypass hooks for individual chunks
		$this->node->createFileDirectly($name, $data);
	}

	public function createDirectory($name) {
		throw new Forbidden('Permission denied to create file (filename ' . $name . ')');
	}

	public function getChild($name) {
		if ($name === FutureFile::getFutureFileName()) {
			return new FutureFile($this->node, FutureFile::getFutureFileName());
		}
		return $this->node->getChild($name);
	}

	public function getChildren() {
		$children = $this->node->getChildren();
		$children[] = new FutureFile($this->node, FutureFile::getFutureFileName());
		return $children;
	}

	public function childExists($name) {
		if ($name === FutureFile::getFutureFileName()) {
			return true;
		}
		return $this->node->childExists($name);
	}

	public function delete() {
		$this->node->delete();
	}

	public function getName() {
		return $this->node->getName();
	}

	public function setName($name) {
		throw new Forbidden('Permission denied to rename this folder');
	}

	public function getLastModified() {
		return $this->node->getLastModified();
	}
}
