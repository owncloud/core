<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Meta;

use OCP\Files\File;
use OCP\Files\Folder;
use OCP\Files\Node;
use Sabre\DAV\Collection;

/**
 * Class MetaFolder
 * This is a Sabre based implementation of a folder living in the /meta resource.
 *
 * @package OCA\DAV\Meta
 */
class MetaFolder extends Collection {

	/** @var Folder */
	private $folder;

	/**
	 * MetaFolder constructor.
	 *
	 * @param Folder $folder
	 */
	public function __construct(Folder $folder) {
		$this->folder = $folder;
	}

	/**
	 * @inheritdoc
	 */
	public function getChildren() {
		$nodes = $this->folder->getDirectoryListing();
		return \array_map(function ($node) {
			return $this->nodeFactory($node);
		}, $nodes);
	}

	/**
	 * @inheritdoc
	 */
	public function getName() {
		return $this->folder->getName();
	}

	private function nodeFactory(Node $node) {
		if ($node instanceof Folder) {
			return new MetaFolder($node);
		}
		if ($node instanceof File) {
			return new MetaFile($node);
		}
		throw new \InvalidArgumentException();
	}
}
