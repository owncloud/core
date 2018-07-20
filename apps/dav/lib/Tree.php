<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\DAV;

use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\ICollection;

/**
 * Sabre tree of nodes.
 *
 * Provides a shortcut when accessing the "files/" subtree to avoid
 * having to walk through every node and trigger unnecessary extra queries.
 */
class Tree extends \Sabre\DAV\Tree {
	/**
	 * Returns the INode object for the requested path
	 *
	 * @param string $path
	 * @return \Sabre\DAV\INode
	 * @throws NotFound
	 */
	public function getNodeForPath($path) {
		// FIXME: remove this check when we are sure that other
		// non-files endpoints work correctly

		// querying "files" directly or anything outside of it
		// will fallback to the regular implementation
		if (\strpos(\rtrim($path, '/'), 'files/') !== 0) {
			return parent::getNodeForPath($path);
		}

		$path = \trim($path, '/');
		if (isset($this->cache[$path])) {
			return $this->cache[$path];
		}

		$sections = \explode('/', $path);

		$node = $this->rootNode;
		while (\count($sections) > 0) {
			$section = \array_shift($sections);
			if (!$node instanceof ICollection) {
				throw new NotFound('Could not find node at path: ' . $path);
			}
			$node = $node->getChild($section);
			if ($node instanceof \Sabre\DAV\Tree) {
				// note: we don't cache here as the sub-tree has its own cache
				return $node->getNodeForPath(\implode('/', $sections));
			}
		}

		$this->cache[$path] = $node;
		return $node;
	}
}
