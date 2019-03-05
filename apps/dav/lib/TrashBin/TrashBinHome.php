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

use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\MethodNotAllowed;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\ICollection;

class TrashBinHome implements ICollection {

	/** @var array */
	private $principalInfo;
	/**
	 * @var TrashBinManager
	 */
	private $trashBinManager;

	/**
	 * AvatarHome constructor.
	 *
	 * @param array $principalInfo
	 * @param TrashBinManager $trashBinManager
	 */
	public function __construct($principalInfo, TrashBinManager $trashBinManager) {
		$this->principalInfo = $principalInfo;
		$this->trashBinManager = $trashBinManager;
	}

	public function createFile($name, $data = null) {
		throw new Forbidden('Permission denied to create a file');
	}

	public function createDirectory($name) {
		throw new Forbidden('Permission denied to create a folder');
	}

	public function getChild($name) {
		return $this->trashBinManager->getItemByFileId($this->getName(), $name);
	}

	public function getChildren() {
		return $this->trashBinManager->getChildren($this->getName());
	}

	public function childExists($name) {
		try {
			$ret = $this->getChild($name);
			return $ret !== null;
		} catch (NotFound $ex) {
			return false;
		} catch (MethodNotAllowed $ex) {
			return false;
		}
	}

	public function delete() {
		throw new Forbidden('Permission denied to delete this folder');
	}

	public function getName() {
		list(, $name) = \Sabre\Uri\split($this->principalInfo['uri']);
		return $name;
	}

	public function setName($name) {
		throw new Forbidden('Permission denied to rename this folder');
	}

	/**
	 * Returns the last modification time, as a unix timestamp
	 *
	 * @return int
	 */
	public function getLastModified() {
		return null;
	}
}
