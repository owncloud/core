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

use OCP\Files\NotPermittedException;

abstract class AbstractNode implements \OCP\Files\Node {

	/**
	 * @inheritdoc
	 */
	public function getMimePart() {
		$mime = $this->getMimetype();
		$parts = \explode('/', $mime, 2);
		return $parts[0];
	}

	/**
	 * @inheritdoc
	 */
	public function getFullPath($path) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getRelativePath($path) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function isEncrypted() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function isCreatable() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function isShared() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function isMounted() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getMountPoint() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getOwner() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getChecksum() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function move($targetPath) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function delete() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function copy($targetPath) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function touch($mtime = null) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getStorage() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getPath() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getInternalPath() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getId() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function stat() {
		return [
			'mtime' => $this->getMTime(),
			'size' => $this->getSize(),
		];
	}

	/**
	 * @inheritdoc
	 */
	public function getMTime() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getSize() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getEtag() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getPermissions() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function isReadable() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function isUpdateable() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function isDeletable() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function isShareable() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getParent() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getName() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function lock($type) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function changeLock($targetType) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function unlock($type) {
		throw new NotPermittedException();
	}
}
