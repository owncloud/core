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
	 * @inheritdoc
	 */
	public function isSubNode($node) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
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
	 * @inheritdoc
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
	 * @inheritdoc
	 */
	public function nodeExists($path) {
		return $this->storage->file_exists(\rtrim("$this->path/$path", '/'));
	}

	/**
	 * @inheritdoc
	 */
	public function newFolder($path) {
		$newPath = "$this->path/$path";
		$this->storage->mkdir($newPath);
		return new Folder($this->storage, $newPath);
	}

	/**
	 * @inheritdoc
	 */
	public function newFile($path) {
		$newPath = "$this->path/$path";
		$this->storage->touch($newPath);
		return new File($this->storage, $newPath);
	}

	/**
	 * @inheritdoc
	 */
	public function delete() {
		$this->storage->rmdir($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function search($query) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function searchByMime($mimetype) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function searchByTag($tag, $userId) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getById($id) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getFreeSpace() {
		return $this->storage->free_space($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function getNonExistingName($name) {
		throw new NotPermittedException();
	}
}
