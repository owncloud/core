<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\Files\Share;

use OC\Share\Share;

/**
 * Data holder for shared files and folders
 */
class FileShare extends Share {

	protected $storage;
	protected $path;
	protected $parent;
	protected $name;
	protected $mimetype;
	protected $mimepart;
	protected $size;
	protected $mtime;
	protected $storageMtime;
	protected $encrypted;
	protected $unencryptedSize;
	protected $etag;

	public function __construct() {
		$this->addType('itemSource', 'int');
		$this->addType('storage', 'int');
		$this->addType('parent', 'int');
		$this->addType('size', 'int');
		$this->addType('mtime', 'int');
		$this->addType('encrypted', 'bool');
		$this->addType('unencryptedSize', 'int');
	}

	/**
	 * Get the numeric storage id
	 * @return int
	 */
	public function getStorage() {
		return $this->storage;
	}

	/**
	 * Set the numeric storage id
	 * @param int $storage
	 */
	public function setStorage($storage) {
		$this->storage = $storage;
	}

	/**
	 * Get the source file path
	 * @return string
	 */
	public function getPath() {
		return $this->path;
	}

	/**
	 * Set the source file path
	 * @param string $path
	 */
	public function setPath($path) {
		$this->path = $path;
	}

	/**
	 * Get the parent folder id, not to be confused with getParentIds for reshares
	 * @return int
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * Set the parent folder id, not to be confused with setParentIds for reshares
	 * @param int $parent
	 */
	public function setParent($parent) {
		$this->parent = $parent;
	}

	/**
	 * Get the mimetype id
	 * @return int
	 */
	public function getMimetype() {
		return $this->mimetype;
	}

	/**
	 * Set the mimetype id
	 * @param int $mimetype
	 */
	public function setMimetype($mimetype) {
		$this->mimetype = $mimetype;
	}

	/**
	 * Get the mimepart id
	 * @return int
	 */
	public function getMimepart() {
		return $this->mimepart;
	}

	/**
	 * Set the mimepart id
	 * @param int $mimepart
	 */
	public function setMimepart($mimepart) {
		$this->mimepart = $mimepart;
	}

	/**
	 * Get the file size
	 * @return int
	 */
	public function getSize() {
		return $this->size;
	}

	/**
	 * Set the file size
	 * @param int $size
	 */
	public function setSize($size) {
		$this->size = $size;
	}

	/**
	 * Get the mtime
	 * @return int
	 */
	public function getMtime() {
		return $this->mtime;
	}

	/**
	 * Set the mtime
	 * @param int $mtime
	 */
	public function setMtime($mtime) {
		$this->mtime = $mtime;
	}

	/**
	 * Get the storage mtime
	 * @return int
	 */
	public function getStorageMtime() {
		return $this->storageMtime;
	}

	/**
	 * Set the storage mtime
	 * @param int $storageMtime
	 */
	public function setStorageMtime($storageMtime) {
		$this->storageMtime = $storageMtime;
	}

	/**
	 * Get if the file is encrypted
	 * @return bool
	 */
	public function getEncrypted() {
		return $this->encrypted;
	}

	/**
	 * Set if the file is encrypted
	 * @param bool $encrypted
	 */
	public function setEncrypted($encrypted) {
		$this->encrypted = $encrypted;
	}

	/**
	 * Get the unencrypted file size
	 * @return int
	 */
	public function getUnencryptedSize() {
		return $this->unencryptedSize;
	}

	/**
	 * Set the unencrypted file size
	 * @param int $unencryptedSize
	 */
	public function setUnencryptedSize($unencryptedSize) {
		$this->unencryptedSize = $unencryptedSize;
	}

	/**
	 * Get the ETag
	 * @return string
	 */
	public function getEtag() {
		return $this->etag;
	}

	/**
	 * Set the ETag
	 * @param string $etag
	 */
	public function setEtag($etag) {
		$this->etag = $etag;
	}

	/**
	 * Get the metadata
	 * @return array
	 */
	public function getMetadata() {
		return array(
			'fileid' => $this->getItemSource(),
			'storage' => $this->getStorage(),
			'path' => $this->getItemTarget(),
			'parent' => $this->getParent(),
			'name' => basename($this->getItemTarget()),
			'mimetype' => $this->getMimetype(),
			'mimepart' => $this->getMimepart(),
			'size' => $this->getSize(),
			'mtime' => $this->getMtime(),
			'storage_mtime' => $this->getStorageMtime(),
			'encrypted' => $this->getEncrypted(),
			'unencrypted_size' => $this->getUnencryptedSize(),
			'etag' => $this->getEtag(),
		);
	}

}