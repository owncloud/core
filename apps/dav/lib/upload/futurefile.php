<?php

namespace OCA\DAV\Upload;

use OC\Connector\Sabre\Directory;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\IFile;

class FutureFile implements \Sabre\DAV\IFile {

	function __construct(Directory $root, $name) {
		$this->root = $root;
		$this->name = $name;
	}

	function put($data) {
		throw new Forbidden('Permission denied to put into this file');
	}

	function get() {
		// TODO: use a stream based implementation
		$blob = '';
		$children = $this->root->getChildren();
		foreach($children as $child) {
			/** @var IFile $child */
			$data = $child->get();
			if (is_resource($data)) {
				$data = stream_get_contents($data);
			}
			$blob .= $data;
		}
		return $blob;
	}

	function getContentType() {
		return 'application/octet-stream';
	}

	function getETag() {
		return $this->root->getETag();
	}

	function getSize() {
		$children = $this->root->getChildren();
		$sizes = array_map(function($node) {
			/** @var IFile $node */
			return $node->getSize();
		}, $children);

		return array_sum($sizes);
	}

	/**
	 * Deleted the current node
	 *
	 * @return void
	 */
	function delete() {
		throw new Forbidden('Permission denied to delete this file');
	}

	/**
	 * Returns the name of the node.
	 *
	 * This is used to generate the url.
	 *
	 * @return string
	 */
	function getName() {
		return $this->name;
	}

	/**
	 * Renames the node
	 *
	 * @param string $name The new name
	 * @return void
	 */
	function setName($name) {
		throw new Forbidden('Permission denied to rename this file');
	}

	/**
	 * Returns the last modification time, as a unix timestamp
	 *
	 * @return int
	 */
	function getLastModified() {
		return $this->root->getLastModified();
	}
}
