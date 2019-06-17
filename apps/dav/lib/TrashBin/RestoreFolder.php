<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\DAV\TrashBin;

use OCA\Files_Trashbin\Trashbin;
use OCP\Files\FileInfo;
use Sabre\DAV\Collection;
use Sabre\DAV\IMoveTarget;
use Sabre\DAV\INode;

class RestoreFolder extends Collection implements IMoveTarget {

	/**
	 * Returns the name of the node.
	 *
	 * This is used to generate the url.
	 *
	 * @return string
	 */
	public function getName() {
		return 'restore';
	}

	/**
	 * Returns an array with all the child nodes.
	 *
	 * @return INode[]
	 */
	public function getChildren() {
		return [];
	}

	/**
	 * Moves a node into this collection.
	 *
	 * It is up to the implementors to:
	 *   1. Create the new resource.
	 *   2. Remove the old resource.
	 *   3. Transfer any properties or other data.
	 *
	 * Generally you should make very sure that your collection can easily move
	 * the move.
	 *
	 * If you don't, just return false, which will trigger sabre/dav to handle
	 * the move itself. If you return true from this function, the assumption
	 * is that the move was successful.
	 *
	 * @param string $targetName new local file/collection name
	 * @param string $sourcePath Full path to source node
	 * @param INode $sourceNode Source node itself
	 *
	 * @return bool
	 */
	public function moveInto($targetName, $sourcePath, INode $sourceNode) {
		if ($sourceNode instanceof ITrashBinNode) {
			return $sourceNode->restore();
		}
		return false;
	}
}
