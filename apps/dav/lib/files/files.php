<?php

namespace OCA\DAV\Files;

use OC\Connector\Sabre\Directory;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\ICollection;

class RootCollection implements ICollection {

	function createFile($name, $data = null) {
		return $this->impl()->createFile($name, $data);
	}

	function createDirectory($name) {
		$this->impl()->createDirectory($name);
	}

	function getChild($name) {
		return $this->impl()->getChild($name);
	}

	function getChildren() {
		return $this->impl()->getChildren();
	}

	function childExists($name) {
		return $this->impl()->childExists($name);
	}

	function delete() {
		$this->impl()->delete();
	}

	function getName() {
		return 'files';
	}

	function setName($name) {
		throw new Forbidden('Permission denied to rename this folder');
	}

	/**
	 * Returns the last modification time, as a unix timestamp
	 *
	 * @return int
	 */
	function getLastModified() {
		return $this->impl()->getLastModified();
	}

	/**
	 * @return Directory
	 */
	private function impl() {
		$view = \OC\Files\Filesystem::getView();
		$rootInfo = $view->getFileInfo('');
		$impl = new Directory($view, $rootInfo);
		return $impl;
	}
}
