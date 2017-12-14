<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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
namespace OCA\DAV\Files;

use OCA\DAV\Connector\Sabre\ObjectTree;
use Sabre\DAV\Exception\Forbidden;
use Sabre\HTTP\URLUtil;
use Sabre\DAV\ICollection;

class FilesHome extends ObjectTree implements ICollection {

	/** @var array */
	private $principalInfo;

	/**
	 * FilesHome constructor.
	 *
	 * @param array $principalInfo
	 */
	public function __construct($principalInfo) {
		parent::__construct();
		$this->principalInfo = $principalInfo;
	}

	function createFile($name, $data = null) {
		return $this->rootNode->createFile($name, $data);
	}

	function createDirectory($name) {
		$this->rootNode->createDirectory($name);
	}

	function getChild($name) {
		return $this->rootNode->getChild($name);
	}

	function getChildren($path = null) {
		if ($path === null) {
			return $this->rootNode->getChildren();
		}
		return parent::getChildren($path);
	}

	function childExists($name) {
		return $this->rootNode->childExists($name);
	}

	function getLastModified() {
		return $this->rootNode->getLastModified();
	}

	/**
	 * @param string $path
	 * @throws Forbidden
	 */
	function delete($path = null) {
		if ($path === null) {
			throw new Forbidden('Permission denied to delete home folder');
		}
		parent::delete($path);
	}

	function getName() {
		list(,$name) = URLUtil::splitPath($this->principalInfo['uri']);
		return $name;
	}

	/**
	 * @param string $name
	 * @throws Forbidden
	 */
	function setName($name) {
		throw new Forbidden('Permission denied to rename this folder');
	}
}
