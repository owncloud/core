<?php

/**
 * ownCloud
 *
 * @author Vincent Petry
 * @copyright 2014 Vincent Petry <pvince81@owncloud.com>
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
 *
 */

namespace OC\Connector\Sabre\Tags;

use OC\Connector\Sabre\Tags\TagTypeNode;

class TagsRootNode extends \Sabre\DAV\Collection implements \Sabre\DAV\ICollection {

	private $tagManager;

	public function __construct(\OCP\ITagManager $tagManager) {
		$this->tagManager = $tagManager;
	}

	/**
	 * Returns the name of the node
	 * @return string
	 */
	public function getName() {
		return '';
	}

	/**
	 * Returns a specific child node, referenced by its name
	 *
	 * @param string $name
	 * @throws \Sabre\DAV\Exception\FileNotFound
	 * @return \Sabre\DAV\INode
	 */
	public function getChild($name) {
		return new TagTypeNode($this->tagManager, $name);
	}

	/**
	 * Returns an array with all the child nodes
	 *
	 * @return \Sabre\DAV\INode[]
	 */
	public function getChildren() {
		$nodes = array();
		// TODO: use tag manager if it had the proper API
		// TODO: use injected DB connection
		$query = \OC_DB::prepare( 'SELECT DISTINCT `type` FROM `*PREFIX*vcategory`');
		$result = $query->execute();
		while($row = $result->fetchRow()) {
			$nodes[] = new TagTypeNode($this->tagManager, $row['type']);
		}

		return $nodes;
	}
}
