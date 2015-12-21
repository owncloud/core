<?php

namespace OCA\DAV\Avatars;

use OCP\Files\File;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\IFile;

class Avatar implements IFile {
	/** @var File */
	private $avatar;

	/**
	 * Avatar constructor.
	 *
	 * @param File $avatar
	 */
	public function __construct(File $avatar) {
		$this->avatar = $avatar;
	}

	/**
	 * Deleting avatars is not possible at this point
	 *
	 * @throws Forbidden
	 */
	public function delete() {
		throw new Forbidden('Permission denied to delete');
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->avatar->getName();
	}

	/**
	 * Renaming avatars is not allowed
	 *
	 * @param string $name
	 * @throws Forbidden
	 */
	public function setName($name) {
		throw new Forbidden('Permission denied to rename');
	}

	/**
	 * Get the modification (creation) date of the avatar (of this size)
	 *
	 * @return int
	 */
	public function getLastModified() {
		return $this->avatar->getMTime();
	}

	/**
	 * It is not allowed to update the avatar currently
	 *
	 * @param resource $data
	 * @throws Forbidden
	 */
	public function put($data) {
		throw new Forbidden('Permission denied to update');
	}

	/**
	 * Get the actual avatar data
	 *
	 * @return string
	 */
	public function get() {
		return $this->avatar->getContent();
	}

	/**
	 * Get the etag of the avatar
	 *
	 * @return string
	 */
	public function getETag() {
		return $this->avatar->getEtag();
	}

	/**
	 * Get the content type of the avatar
	 *
	 * @return string
	 */
	public function getContentType() {
		return $this->avatar->getMimeType();
	}

	/**
	 * Get the file size of the avatar
	 *
	 * @return int
	 */
	public function getSize() {
		return $this->avatar->getSize();
	}

}