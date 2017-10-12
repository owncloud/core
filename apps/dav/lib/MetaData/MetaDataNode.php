<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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


namespace OCA\DAV\MetaData;


use OC\Files\Meta\MetaVersionCollection;
use OCA\DAV\Connector\Sabre\Exception\Forbidden;
use OCP\Files\IRootFolder;
use Sabre\DAV\ICollection;

class MetaDataNode implements ICollection {

	/** @var MetaVersionCollection  */
	private $metaVersionCollection;

	private $irootFolder;

	/**
	 * MetaDataNode constructor.
	 *
	 * @param MetaVersionCollection $metaVersionCollection
	 */
	public function __construct(MetaVersionCollection $metaVersionCollection, IRootFolder $irootFolder) {
		$this->metaVersionCollection = $metaVersionCollection;
		$this->irootFolder = $irootFolder;
	}

	function getName() {
		$this->getMetaVersionFolder()->getName();
	}

	function setName($name) {
		throw MethodNotAllowed();
	}

	function delete() {
		throw MethodNotAllowed();
	}

	function getLastModified() {
		return null;
	}
	/**
	 * @return \OCP\Files\Node
	 */
	function getMetaNodeFolder() {
		return $this->irootFolder->get('meta');
	}

	/**
	 * @return \OCP\Files\Node
	 */
	function getFileIdFolder() {
		return $this->irootFolder->get('meta/' . $this->metaVersionCollection->getId());
	}

	/**
	 * @return \OCP\Files\Node
	 */
	function getMetaVersionFolder() {
		return $this->irootFolder->get('meta/'. $this->metaVersionCollection->getId() . '/v');
	}

	/**
	 * @return \OCP\Files\Node
	 */
	function getMetaPreviewFolder() {
		return $this->irootFolder->get('meta/'. $this->metaVersionCollection->getId() . '/p');
	}

	function childExists($name) {
		return null;
	}

	function createDirectory($name) {
		throw new Forbidden('Permission denied to create a folder');
	}

	function createFile($name, $data = null) {
		throw new Forbidden('Permission denied to create a file');
	}

	function getChild($name) {
		return null;
	}

	function getChildren() {
		return [];
	}
}
