<?php

namespace OC\Connector\Sabre\Tags;

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

// TODO: add properties: owner, etc
class TagNode extends \Sabre\DAV\Collection implements \Sabre\DAV\ICollection {

	/**
	 * @var \OCP\ITags
	 */
	private $tagger;

	/**
	 * @var array
	 */
	private $info;

	/**
	 * @param \OCP\ITags $tagger tagger
	 * @param array $tagInfo tag info
	 */
	public function __construct($tagger, $tagInfo) {
		$this->info = $tagInfo;
		$this->tagger = $tagger;
	}

	/**
	 * Returns the name of the node
	 * @return string
	 */
	public function getName() {
		return $this->info['name'];
	}

	/**
	 * Returns the name of the node
	 * @return string
	 */
	public function setName($name) {
		// cannot rename tags
		throw new \Sabre\DAV\Exception\Forbidden();
	}

    /**
     * Returns an array with all the tagged files
     *
     * @return DAV\INode[]
     */
	public function getChildren() {
		// TODO: inject this / use public API !!!
		$view = \OC\Files\Filesystem::getView();

		$nodes = array();
		$owner = null;
		if (isset($this->info['owner'])) {
			$owner = $this->info['owner'];
		} else {
			// FIXME: don't hard-code this
			$owner = \OC::$server->getUserSession()->getUser()->getUId();
		}
		$results = $view->searchByTag($this->info['name'], $owner);
		// TODO: chunk this, horribly unefficient
		foreach ($results as $fileInfo) {
			if ($fileInfo->getType() === $fileInfo::TYPE_FOLDER) {
				$node = new \OC_Connector_Sabre_Directory($view, $fileInfo);
			} else {
				$node = new \OC_Connector_Sabre_File($view, $fileInfo);
			}
			$nodes[] = $node;
		}
		return $nodes;
	}
}
