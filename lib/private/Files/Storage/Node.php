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

use OC\Files\Node\AbstractNode;
use OCP\Files\NotFoundException;
use OCP\Files\Storage\IStorage;
use OC\Files\Storage\Folder as StorageFolder;

/**
 * Class Node
 *
 * The Storage/Node classes are intended to work directly on the storage,
 * bypassing any updates to the metadata in the filecache, which is expensive
 * and not needed for avatars, thumbnails and maybe other things.
 *
 * @package OC\Files\Storage
 */
abstract class Node extends AbstractNode {

	/** @var IStorage */
	protected $storage;

	/** @var string $path relative to the storage root */
	protected $path;

	/**
	 * @param IStorage $storage
	 * @param $path
	 */
	public function __construct(IStorage $storage, $path) {
		$this->storage = $storage;
		$this->path = $path;
	}

	/**
	 * @inheritdoc
	 */
	public function getMimetype() {
		return $this->storage->getMimeType($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function getMimePart() {
		return \explode('/', $this->getMimetype(), 2)[0];
	}

	/**
	 * @inheritdoc
	 */
	public function isEncrypted() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function getType() {
		$type = $this->storage->filetype($this->path);
		switch ($type) {
			case 'file': return \OCP\Files\FileInfo::TYPE_FILE;
			case 'dir': return \OCP\Files\FileInfo::TYPE_FOLDER;
			case 'link': //TODO readlink and check it if path is in same storage
			default:
				throw new \UnexpectedValueException("filetype $type not supported ");
		}
	}

	/**
	 * @inheritdoc
	 */
	public function isCreatable() {
		return $this->storage->isCreatable($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function isShared() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function touch($mtime = null) {
		$this->storage->touch($this->path, $mtime);
	}

	/**
	 * @inheritdoc
	 */
	public function getStorage() {
		return $this->storage;
	}

	/**
	 * @inheritdoc
	 */
	public function getInternalPath() {
		return $this->path;
	}

	/**
	 * @inheritdoc
	 */
	public function stat() {
		return $this->storage->stat($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function getMTime() {
		return $this->storage->filemtime($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function getSize() {
		return $this->storage->filesize($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function getEtag() {
		return $this->storage->getETag($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function getPermissions() {
		return $this->storage->getPermissions($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function isReadable() {
		return $this->storage->isReadable($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function isUpdateable() {
		return $this->storage->isUpdatable($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function isDeletable() {
		return $this->storage->isDeletable($this->path);
	}

	/**
	 * @inheritdoc
	 */
	public function isShareable() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function getParent() {
		$parent = \dirname($this->path);
		if ($parent === '' || $parent === '.') {
			throw new NotFoundException($parent);
		}
		return new StorageFolder($this->storage, $parent);
	}

	/**
	 * @inheritdoc
	 */
	public function getName() {
		return \basename($this->path);
	}
}
