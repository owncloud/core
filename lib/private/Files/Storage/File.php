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
	 * @inheritdoc
	 */
	public function getContent() {
		return $this->storage->file_get_contents($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function putContent($data) {
		$this->storage->file_put_contents($this->path, $data);
	}

	/**
	 * @inheritdoc
	 */
	public function fopen($mode) {
		return $this->storage->fopen($this->path, $mode);
	}

	/**
	 * @inheritdoc
	 */
	public function delete() {
		$this->storage->unlink($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function hash($type, $raw = false) {
		return $this->storage->hash($type, $this->path, $raw);
	}
}
