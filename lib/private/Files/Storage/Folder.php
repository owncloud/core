<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OC\Files\Storage;

use OCP\Files\Folder as FilesFolder;
use OCP\Files\NotPermittedException;

class Folder extends Node implements FilesFolder {
	/**
	 * Get the full path of an item in the folder within owncloud's filesystem
	 *
	 * @param string $path relative path of an item in the folder
	 * @throws NotPermittedException
	 */
	public function getFullPath($path) {
		throw new NotPermittedException();
	}

	/**
	 * Get the path of an item in the folder relative to the folder
	 *
	 * @param string $path absolute path of an item in the folder
	 * @throws NotPermittedException
	 */
	public function getRelativePath($path) {
		throw new NotPermittedException();
	}

	/**
	 * check if a node is a (grand-)child of the folder
	 *
	 * @param \OCP\Files\Node $node
	 * @throws NotPermittedException
	 */
	public function isSubNode($node) {
		throw new NotPermittedException();
	}

	/**
	 * get the content of this directory
	 *
	 * @return \OCP\Files\Node[]
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function getDirectoryListing() {
		$dh = $this->storage->opendir($this->path);

		$entries = [];

		while ($entry = \readdir($dh)) {
			if ($entry === '.' || $entry === '..') {
				continue;
			}

			$entry = $this->get($entry);
			if ($entry instanceof Node) {
				$entries[] = $entry;
			}
		}

		\closedir($dh);

		return $entries;
	}

	/**
	 * Get the node at $path
	 *
	 * @param string $path relative path of the file or folder
	 * @return \OCP\Files\Node
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function get($path) {
		$newPath = "$this->path/$path";
		$type = $this->storage->filetype($newPath);
		switch ($type) {
			case 'file': return new File($this->storage, $newPath);
			case 'dir': return new Folder($this->storage, $newPath);
		}
		// TODO log error?
		return null;
	}

	/**
	 * Check if a file or folder exists in the folder
	 *
	 * @param string $path relative path of the file or folder
	 * @return bool
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function nodeExists($path) {
		return $this->storage->file_exists(\rtrim("$this->path/$path", '/'));
	}

	/**
	 * Create a new folder
	 *
	 * @param string $path relative path of the new folder
	 * @return \OCP\Files\Folder
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function newFolder($path) {
		$newPath = "$this->path/$path";
		$this->storage->mkdir($newPath);
		return new Folder($this->storage, $newPath);
	}

	/**
	 * Create a new file
	 *
	 * @param string $path relative path of the new file
	 * @return \OCP\Files\File
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function newFile($path) {
		$newPath = "$this->path/$path";
		$this->storage->touch($newPath);
		return new File($this->storage, $newPath);
	}

	/**
	 * Delete the folder
	 *
	 * @return void
	 * @throws \Exception
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function delete() {
		$this->storage->rmdir($this->path);
	}

	/**
	 * search for files with the name matching $query
	 *
	 * @param string $query
	 * @throws NotPermittedException
	 */
	public function search($query) {
		throw new NotPermittedException();
	}

	/**
	 * search for files by mimetype
	 * $mimetype can either be a full mimetype (image/png) or a wildcard mimetype (image)
	 *
	 * @param string $mimetype
	 * @throws NotPermittedException
	 */
	public function searchByMime($mimetype) {
		throw new NotPermittedException();
	}

	/**
	 * search for files by tag
	 *
	 * @param string|int $tag tag name or tag id
	 * @param string $userId owner of the tags
	 * @throws NotPermittedException
	 */
	public function searchByTag($tag, $userId) {
		throw new NotPermittedException();
	}

	/**
	 * get a file or folder inside the folder by it's internal id
	 *
	 * @param int $id
	 * @param bool $first
	 * @throws NotPermittedException
	 */
	public function getById($id, $first = false) {
		throw new NotPermittedException();
	}

	/**
	 * Get the amount of free space inside the folder
	 *
	 * @return int
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function getFreeSpace() {
		return $this->storage->free_space($this->path);
	}

	/**
	 * Add a suffix to the name in case the file exists
	 *
	 * @param string $name
	 * @throws NotPermittedException
	 */
	public function getNonExistingName($name) {
		throw new NotPermittedException();
	}
}
