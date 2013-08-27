<?php
/**
 * ownCloud
 *
 * @author Jakob Sack
 * @author Michael Gapczynski
 * @copyright 2011 Jakob Sack kde@jakobsack.de
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

class OC_Connector_Sabre_Directory extends OC_Connector_Sabre_Node implements Sabre_DAV_ICollection, Sabre_DAV_IQuota {

	/**
	 * Creates a new file in the directory
	 *
	 * @param string $name Name of the file
	 * @param resource|string $data Initial payload
	 * @throws Sabre_DAV_Exception_Forbidden
	 * @see Sabre_DAV_IFile->put
	 * @return null|string
	 */
	public function createFile($name, $data = null) {
		if (!\OC\Files\Filesystem::isCreatable($this->path)) {
			throw new \Sabre_DAV_Exception_Forbidden();
		}
		$path = $this->path . '/' . $name;
		$node = new OC_Connector_Sabre_File($path);
		return $node->put($data);
	}

	/**
	 * Creates a new subdirectory
	 *
	 * @param string $name
	 * @throws Sabre_DAV_Exception_Forbidden
	 * @return void
	 */
	public function createDirectory($name) {
		if (!\OC\Files\Filesystem::isCreatable($this->path)) {
			throw new \Sabre_DAV_Exception_Forbidden();
		}
		$newPath = $this->path . '/' . $name;
		if (!\OC\Files\Filesystem::mkdir($newPath)) {
			throw new Sabre_DAV_Exception_Forbidden('Could not create directory '.$newPath);
		}
	}

	/**
	 * Returns a specific child node, referenced by its name
	 *
	 * @param string $name
	 * @param array $fileInfo (optional)
	 * @throws Sabre_DAV_Exception_FileNotFound
	 * @return Sabre_DAV_INode
	 */
	public function getChild($name, $fileInfo = null) {
		$path = $this->path . '/' . $name;
		if (is_null($fileInfo)) {
			$fileInfo = \OC\Files\Filesystem::getFileInfo($path);
		}
		if (!$fileInfo) {
			throw new Sabre_DAV_Exception_NotFound(
				'File with name ' . $path . ' could not be located'
			);
		}
		if ($fileInfo['mimetype'] === 'httpd/unix-directory') {
			$node = new OC_Connector_Sabre_Directory($path);
		} else {
			$node = new OC_Connector_Sabre_File($path);
		}
		$node->setFileInfo($fileInfo);
		return $node;
	}

	/**
	 * Returns an array with all the child nodes
	 *
	 * @return Sabre_DAV_INode[]
	 */
	public function getChildren() {
		$content = \OC\Files\Filesystem::getDirectoryContent($this->path);
		foreach ($content as $child) {
			$nodes[] = $this->getChild($child['name'], $child);
		}
		return $nodes;
	}

	/**
	 * Checks if a child exists.
	 *
	 * @param string $name
	 * @return bool
	 */
	public function childExists($name) {
		$path = $this->path . '/' . $name;
		return \OC\Files\Filesystem::file_exists($path);
	}

	/**
	 * Deletes all files in this directory, and then itself
	 *
	 * @return void
	 * @throws Sabre_DAV_Exception_Forbidden
	 */
	public function delete() {
		if (!\OC\Files\Filesystem::isDeletable($this->path)) {
			throw new \Sabre_DAV_Exception_Forbidden();
		}
		\OC\Files\Filesystem::rmdir($this->path);
		$this->clearProperties();
	}

	/**
	 * Returns available diskspace information
	 *
	 * @return array
	 */
	public function getQuotaInfo() {
		$storageInfo = OC_Helper::getStorageInfo($this->path);
		return array(
			$storageInfo['used'],
			$storageInfo['total']
		);
	}

}
