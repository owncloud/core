<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Connector\Sabre;

use OC\Files\Filesystem;

class ObjectTree extends \Sabre\DAV\ObjectTree {

	/**
	 * keep this public to allow mock injection during unit test
	 *
	 * @var \OC\Files\View
	 */
	public $fileView;

	/**
	 * Returns the INode object for the requested path
	 *
	 * @param string $path
	 * @throws \Sabre\DAV\Exception_NotFound
	 * @return \Sabre\DAV\INode
	 */
	public function getNodeForPath($path) {

		$path = trim($path, '/');
		if (isset($this->cache[$path])) {
			return $this->cache[$path];
		}

		// Is it the root node?
		if (!strlen($path)) {
			return $this->rootNode;
		}

		$info = $this->getFileView()->getFileInfo($path);

		if (!$info) {
			throw new \Sabre\DAV\Exception\NotFound('File with name ' . $path . ' could not be located');
		}

		if ($info['mimetype'] === 'httpd/unix-directory') {
			$node = new \OC_Connector_Sabre_Directory($path);
		} else {
			$node = new \OC_Connector_Sabre_File($path);
		}

		$node->setFileinfoCache($info);

		$this->cache[$path] = $node;
		return $node;

	}

	/**
	 * Moves a file from one location to another
	 *
	 * @param string $sourcePath The path to the file which should be moved
	 * @param string $destinationPath The full destination path, so not just the destination parent node
	 * @throws \Sabre\DAV\Exception\Forbidden
	 * @return int
	 */
	public function move($sourcePath, $destinationPath) {

		$sourceNode = $this->getNodeForPath($sourcePath);
		if ($sourceNode instanceof \Sabre\DAV\ICollection and $this->nodeExists($destinationPath)) {
			throw new \Sabre\DAV\Exception\Forbidden('Could not copy directory ' . $sourceNode . ', target exists');
		}
		list($sourceDir,) = \Sabre\DAV\URLUtil::splitPath($sourcePath);
		list($destinationDir,) = \Sabre\DAV\URLUtil::splitPath($destinationPath);

		// check update privileges
		$fs = $this->getFileView();
		if (!$fs->isUpdatable($sourcePath)) {
			throw new \Sabre\DAV\Exception\Forbidden();
		}
		if ($sourceDir !== $destinationDir) {
			// for a full move we need update privileges on sourcePath and sourceDir as well as destinationDir
			if (!$fs->isUpdatable($sourceDir)) {
				throw new \Sabre\DAV\Exception\Forbidden();
			}
			if (!$fs->isUpdatable($destinationDir)) {
				throw new \Sabre\DAV\Exception\Forbidden();
			}
			if (!$fs->isDeletable($sourcePath)) {
				throw new \Sabre\DAV\Exception\Forbidden();
			}
		}

		$renameOkay = $fs->rename($sourcePath, $destinationPath);
		if (!$renameOkay) {
			throw new \Sabre\DAV\Exception\Forbidden('');
		}

		// update properties
		$query = \OC_DB::prepare( 'UPDATE `*PREFIX*properties` SET `propertypath` = ?'
		.' WHERE `userid` = ? AND `propertypath` = ?' );
		$query->execute( array( $destinationPath, \OC_User::getUser(), $sourcePath ));

		$this->markDirty($sourceDir);
		$this->markDirty($destinationDir);

	}

	/**
	 * Copies a file or directory.
	 *
	 * This method must work recursively and delete the destination
	 * if it exists
	 *
	 * @param string $source
	 * @param string $destination
	 * @return void
	 */
	public function copy($source, $destination) {

		if (Filesystem::is_file($source)) {
			Filesystem::copy($source, $destination);
		} else {
			Filesystem::mkdir($destination);
			$dh = Filesystem::opendir($source);
			if(is_resource($dh)) {
				while (($subnode = readdir($dh)) !== false) {

					if ($subnode == '.' || $subnode == '..') continue;
					$this->copy($source . '/' . $subnode, $destination . '/' . $subnode);

				}
			}
		}

		list($destinationDir,) = \Sabre\DAV\URLUtil::splitPath($destination);
		$this->markDirty($destinationDir);
	}

	/**
	 * @return \OC\Files\View
	 */
	public function getFileView() {
		if (is_null($this->fileView)) {
			$this->fileView = \OC\Files\Filesystem::getView();
		}
		return $this->fileView;
	}
}
