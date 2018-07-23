<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

use OC\Files\FileInfo;
use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;

class AbstractFolder extends AbstractNode implements \OCP\Files\Folder {

	/**
	 * @inheritdoc
	 */
	public function getMimetype() {
		return 'httpd/unix-directory';
	}

	/**
	 * @inheritdoc
	 */
	public function getType() {
		return FileInfo::TYPE_FOLDER;
	}

	/**
	 * @inheritdoc
	 */
	public function isSubNode($node) {
		return \strpos($node->getPath(), $this->getPath()) === 0;
	}

	/**
	 * @inheritdoc
	 */
	public function getDirectoryListing() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function get($path) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function nodeExists($path) {
		try {
			$this->get($path);
			return true;
		} catch (NotFoundException $ex) {
			return false;
		}
	}

	/**
	 * @inheritdoc
	 */
	public function newFolder($path) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function newFile($path) {
		throw new NotPermittedException();
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
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getNonExistingName($name) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getRelativePath($path) {
		throw new NotPermittedException();
	}
}
