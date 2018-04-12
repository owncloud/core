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
	 * @return string
	 * @throws \Exception
	 * @throws \OCP\Files\NotPermittedException
	 * @since 6.0.0
	 */
	public function getFullPath($path) {
		throw new NotPermittedException();
	}

	/**
	 * Get the path of an item in the folder relative to the folder
	 *
	 * @param string $path absolute path of an item in the folder
	 * @return string
	 * @since 6.0.0
	 * @throws \Exception
	 * @throws NotPermittedException
	 */
	public function getRelativePath($path) {
		throw new NotPermittedException();
	}

	/**
	 * check if a node is a (grand-)child of the folder
	 *
	 * @param \OCP\Files\Node $node
	 * @since 6.0.0
	 * @throws NotPermittedException
	 */
	public function isSubNode($node) {
		throw new NotPermittedException();
	}

	/**
	 * get the content of this directory
	 *
	 * @return \OCP\Files\Node[]
	 * @since 6.0.0
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
	 * @since 6.0.0
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
	 * @since 6.0.0
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
	 * @since 6.0.0
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
	 * @since 6.0.0
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
	 * @since 6.0.0
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
	 * @return void
	 * @throws \Exception
	 * @throws NotPermittedException
	 * @since 6.0.0
	 */
	public function search($query) {
		throw new NotPermittedException();
	}

	/**
	 * search for files by mimetype
	 * $mimetype can either be a full mimetype (image/png) or a wildcard mimetype (image)
	 *
	 * @param string $mimetype
	 * @return void
	 * @throws \Exception
	 * @throws NotPermittedException
	 * @since 6.0.0
	 */
	public function searchByMime($mimetype) {
		throw new NotPermittedException();
	}

	/**
	 * search for files by tag
	 *
	 * @param string|int $tag tag name or tag id
	 * @param string $userId owner of the tags
	 * @return void
	 * @throws \Exception
	 * @throws NotPermittedException
	 * @since 8.0.0
	 */
	public function searchByTag($tag, $userId) {
		throw new NotPermittedException();
	}

	/**
	 * get a file or folder inside the folder by it's internal id
	 *
	 * @param int $id
	 * @return void
	 * @throws \Exception
	 * @throws NotPermittedException
	 * @since 6.0.0
	 */
	public function getById($id) {
		throw new NotPermittedException();
	}

	/**
	 * Get the amount of free space inside the folder
	 *
	 * @return int
	 * @since 6.0.0
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function getFreeSpace() {
		return $this->storage->free_space($this->path);
	}

	/**
	 * Add a suffix to the name in case the file exists
	 *
	 * @param string $name
	 * @return string
	 * @throws \Exception
	 * @throws NotPermittedException
	 * @since 8.1.0
	 */
	public function getNonExistingName($name) {
		throw new NotPermittedException();
	}
}
