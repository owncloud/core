<?php

namespace OC\Connector\Sabre\Tags;

use \OC\Connector\Sabre\Tags\TagNode;

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
class TagTypeNode extends \Sabre\DAV\Collection implements \Sabre\DAV\ICollection {

	const TAG_FAVORITE = '_$!<Favorite>!$_';

	/**
	 * @var \OCP\ITagManager
	 */
	private $tagManager;

	/**
	 * @var string
	 */
	private $tagType;

	/**
	 * @var \OCP\ITags
	 */
	private $tagger;

	/**
	 * @param \OCP\ITagManager $tagManager tag manager
	 * @param string $tagType tag type
	 */
	public function __construct(\OCP\ITags $tagManager, $tagType) {
		$this->tagType = $tagType;
		$this->tagManager = $tagManager;
	}

	/**
	 * Returns the name of the node
	 * @return string
	 */
	public function getName() {
		return $this->tagType;
	}

	/**
	 * Returns the name of the node
	 * @return string
	 */
	public function setName($name) {
		// cannot rename tag types
		throw new \Sabre\DAV\Exception\Forbidden();
	}

	/**
	 * Returns the tagger for this tag type.
	 *
	 * @return \OCP\ITags tagger
	 */
	private function getTagger() {
		if (!$this->tagger) {
			$this->tagger = $this->tagManager->load($this->tagType);
		}
		return $this->tagger;
	}

    /**
     * Returns a specific child node, referenced by its name
     *
     * This method must throw Sabre\DAV\Exception\NotFound if the node does not
     * exist.
     *
     * @param string $name
     * @return DAV\INode
     */
	public function getChild($name) {
		if ($name === self::TAG_FAVORITE) {
			return new TagNode($this->getTagger(), array('name' => $name));
		}
		
		// TODO: add getTagByName to ITags...
		//$tagInfo = $this->getTagger()->getTagByName($name);
		$tags = $this->getTagger()->getTags();
		$tags = array_filter($tags, function($tagInfo) use ($name) { return $tagInfo['name'] === $name; });
		if (!$tags) {
			throw new \Sabre\DAV\Exception\NotFound();
		}
		return new TagNode($this->getTagger(), current($tags));
	}

    /**
     * Returns an array with all the child nodes
     *
     * @return DAV\INode[]
     */
	public function getChildren() {
		$nodes = array();
		$tags = $this->getTagger()->getTags();
		foreach ($tags as $tagInfo) {
			$nodes[] = new TagNode($this->getTagger(), $tagInfo);
		}
		// FIXME: don't hard-code favorite tag here
		$nodes[] = new TagNode($this->getTagger(), array('name' => self::TAG_FAVORITE));
		return $nodes;
	}

    /**
     * Checks if a child-node with the specified name exists
     *
     * @param string $name
     * @return bool
     */
	public function childExists($name) {
		if ($name === self::TAG_FAVORITE) {
			return true;
		}
		$tagInfo = $this->getTagger()->getTag($name);
		if (!$tagInfo) {
			return false;
		}
		return true;
	}
}
