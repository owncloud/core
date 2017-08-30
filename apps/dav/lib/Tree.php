<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\DAV;

use OCA\DAV\Connector\Sabre\Exception\Forbidden;
use OCA\DAV\Connector\Sabre\Exception\InvalidPath;
use OCA\DAV\Connector\Sabre\Exception\FileLocked;
use OCP\Files\ForbiddenException;
use OCP\Files\StorageInvalidException;
use OCP\Files\StorageNotAvailableException;
use OCP\Lock\LockedException;
use OC\Files\View;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\ICollection;
use OCA\DAV\Connector\Sabre\Node;

/**
 * Sabre tree of nodes.
 *
 * Provides a shortcut when accessing the "files/" subtree to avoid
 * having to walk through every node and trigger unnecessary extra queries.
 */
class Tree extends \Sabre\DAV\Tree {

	/**
	 * Cache specific for file nodes to avoid conflicting with
	 * the regular tree nodes cache which have the full DAV path.
	 *
	 * This file node cache uses the DAV subpath after "/files/$userId/"
	 * as key
	 *
	 * @var array
	 */
	private $fileNodeCache;

	/**
	 * Creates the tree
	 *
	 * @param \Sabre\DAV\INode $rootNode
	 */
	public function __construct(ICollection $rootNode) {
		parent::__construct($rootNode);
		$this->fileNodeCache = [];
	}

	/**
	 * Cache a files specific node
	 */
	public function cacheNode(Node $node) {
		// FIXME this is used by Directory::getChildren() to cache every
		// found children directly. We should find a better way in the future.
		// This is only to keep compatible with ObjectTree and the Directory class'
		// expectations.
		$this->fileNodeCache[trim($node->getPath(), '/')] = $node;
	}

	/**
	 * Returns the INode object for the requested path
	 *
	 * @param string $path
	 * @return \Sabre\DAV\INode
	 * @throws InvalidPath
	 * @throws \Sabre\DAV\Exception\Locked
	 * @throws \Sabre\DAV\Exception\NotFound
	 * @throws \Sabre\DAV\Exception\Forbidden
	 * @throws \Sabre\DAV\Exception\ServiceUnavailable
	 */
	public function getNodeForPath($path) {
		// querying "files" directly or anything outside of it
		// will fallback to the regular implementation
		if (strpos(rtrim($path, '/'), 'files/') !== 0) {
			return parent::getNodeForPath($path);
		}

		// anything else will go through this shortcut to file nodes to avoid
		// traversing every parent because it would trigger
		// additional filecache queries and also
		// additional locking of parent nodes and
		// potential rescan in the case of external storages with update detection
		$sections = explode('/', $path);
		array_shift($sections);
		$userId = array_shift($sections);

		// this will ensure that the user exists and is accessible and also
		// use the cached version when needed
		$filesRoot = parent::getNodeForPath('files/' . $userId);

		$path = implode('/', $sections);

		$path = trim($path, '/');

		// is it the root node?
		if ($path === '') {
			return $filesRoot;
		}

		if (isset($this->fileNodeCache[$path])) {
			if ($this->fileNodeCache[$path] === false) {
				throw new \Sabre\DAV\Exception\NotFound('File with name ' . $path . ' could not be located');
			}
			return $this->fileNodeCache[$path];
		}

		// check the path, also called when the path has been entered manually eg via a file explorer
		if (\OC\Files\Filesystem::isForbiddenFileOrDir($path)) {
			throw new \Sabre\DAV\Exception\Forbidden();
		}

		$fileView = new View('/' . $userId . '/files/');

		try {
			$fileView->verifyPath($path, basename($path));
		} catch (\OCP\Files\InvalidPathException $ex) {
			throw new InvalidPath($ex->getMessage());
		}

		// read from file cache
		try {
			$info = $fileView->getFileInfo($path);
		} catch (StorageNotAvailableException $e) {
			throw new \Sabre\DAV\Exception\ServiceUnavailable('Storage is temporarily not available', 0, $e);
		} catch (StorageInvalidException $e) {
			throw new \Sabre\DAV\Exception\NotFound('Storage ' . $path . ' is invalid');
		} catch (LockedException $e) {
			throw new \Sabre\DAV\Exception\Locked();
		} catch (ForbiddenException $e) {
			throw new \Sabre\DAV\Exception\Forbidden();
		}

		if (!$info) {
			$this->fileNodeCache[$path] = false;
			throw new \Sabre\DAV\Exception\NotFound('File with name ' . $path . ' could not be located');
		}

		if ($info->getType() === 'dir') {
			$node = new \OCA\DAV\Connector\Sabre\Directory($fileView, $info, $this);
		} else {
			$node = new \OCA\DAV\Connector\Sabre\File($fileView, $info);
		}

		$this->fileNodeCache[$path] = $node;
		return $node;

	}
}
