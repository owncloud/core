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

use OCP\Files\File as FilesFile;

class File extends Node implements FilesFile {

	/**
	 * Get the content of the file as string
	 *
	 * @return string
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function getContent() {
		return $this->storage->file_get_contents($this->path);
	}

	/**
	 * Write to the file from string data
	 *
	 * @param string $data
	 * @return void
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function putContent($data) {
		$this->storage->file_put_contents($this->path, $data);
	}

	/**
	 * Open the file as stream, resulting resource can be operated as stream like the result from php's own fopen
	 *
	 * @param string $mode
	 * @return resource
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function fopen($mode) {
		return $this->storage->fopen($this->path, $mode);
	}

	/**
	 * Delete the folder
	 *
	 * @return void
	 * @throws \Exception
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function delete() {
		$this->storage->unlink($this->path);
	}

	/**
	 * Compute the hash of the file
	 * Type of hash is set with $type and can be anything supported by php's hash_file
	 *
	 * @param string $type
	 * @param bool $raw
	 * @return string
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function hash($type, $raw = false) {
		return $this->storage->hash($type, $this->path, $raw);
	}
}
