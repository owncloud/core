<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Connector\Sabre\Tags;

use OC\Connector\Sabre\Tags\TagsRootNode;

class ObjectTree extends \Sabre\DAV\ObjectTree {

	private $tagManager;
	protected $rootNode;

	/**
	 * Creates the object
	 *
	 * This method expects the rootObject to be passed as a parameter
	 */
	public function __construct(\OCP\ITagManager $tagManager) {
		$this->tagManager = $tagManager;
		$this->rootNode = new TagsRootNode($tagManager);
	}

	/**
	 * Moves a file from one location to another
	 *
	 * @param string $sourcePath The path to the file which should be moved
	 * @param string $destinationPath The full destination path, so not just the destination parent node
	 * @throws \Sabre\DAV\Exception\BadRequest
	 * @throws \Sabre\DAV\Exception\ServiceUnavailable
	 * @throws \Sabre\DAV\Exception\Forbidden
	 * @return int
	 */
	public function move($sourcePath, $destinationPath) {
		// TODO: only allow renamed
		throw new \Sabre\DAV\Exception\MethodNotAllowed();
	}
}
