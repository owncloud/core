<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OC\Files\Node;

use OCP\Files\NotFoundException;

class NonExistingFile extends File {
	/**
	 * @param string $newPath
	 * @throws \OCP\Files\NotFoundException
	 */
	public function rename($newPath) {
		throw new NotFoundException("{$this->path} not found.");
	}

	public function delete() {
		throw new NotFoundException("{$this->path} not found.");
	}

	public function copy($newPath) {
		throw new NotFoundException("{$this->path} not found.");
	}

	public function touch($mtime = null) {
		throw new NotFoundException("{$this->path} not found.");
	}

	public function getId() {
		if ($this->fileInfo) {
			return parent::getId();
		} else {
			throw new NotFoundException("{$this->path} not found.");
		}
	}

	public function stat() {
		throw new NotFoundException("{$this->path} not found.");
	}

	public function getMTime() {
		if ($this->fileInfo) {
			return parent::getMTime();
		} else {
			throw new NotFoundException("{$this->path} not found.");
		}
	}

	public function getSize() {
		if ($this->fileInfo) {
			return parent::getSize();
		} else {
			throw new NotFoundException("{$this->path} not found.");
		}
	}

	public function getEtag() {
		if ($this->fileInfo) {
			return parent::getEtag();
		} else {
			throw new NotFoundException("{$this->path} not found.");
		}
	}

	public function getPermissions() {
		if ($this->fileInfo) {
			return parent::getPermissions();
		} else {
			throw new NotFoundException("{$this->path} not found.");
		}
	}

	public function isReadable() {
		if ($this->fileInfo) {
			return parent::isReadable();
		} else {
			throw new NotFoundException("{$this->path} not found.");
		}
	}

	public function isUpdateable() {
		if ($this->fileInfo) {
			return parent::isUpdateable();
		} else {
			throw new NotFoundException("{$this->path} not found.");
		}
	}

	public function isDeletable() {
		if ($this->fileInfo) {
			return parent::isDeletable();
		} else {
			throw new NotFoundException("{$this->path} not found.");
		}
	}

	public function isShareable() {
		if ($this->fileInfo) {
			return parent::isShareable();
		} else {
			throw new NotFoundException("{$this->path} not found.");
		}
	}

	public function getContent() {
		throw new NotFoundException("{$this->path} not found.");
	}

	public function putContent($data) {
		throw new NotFoundException("{$this->path} not found.");
	}

	public function getMimeType() {
		if ($this->fileInfo) {
			return parent::getMimeType();
		} else {
			throw new NotFoundException("{$this->path} not found.");
		}
	}

	public function fopen($mode) {
		throw new NotFoundException("{$this->path} not found.");
	}
}
