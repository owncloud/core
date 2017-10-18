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
use OCP\Files\IRootFolder;
use OCP\Files\Node;
use Sabre\DAV\Collection;
use Sabre\DAV\Exception\MethodNotAllowed;

class RootCollection extends Collection {

	/** @var IRootFolder */
	private $rootFolder;

	/**
	 * RootCollection constructor.
	 *
	 * @param IRootFolder $rootFolder
	 */
	public function __construct(IRootFolder $rootFolder) {
		$this->rootFolder = $rootFolder;
	}

	/**
	 * @inheritdoc
	 */
	public function getChild($name) {
		$child = $this->rootFolder->get("meta/$name");
		return MetaFolder::nodeFactory($child);
	}
	
	/**
	 * @inheritdoc
	 */
	function getChildren() {
		throw new MethodNotAllowed('Listing members of this collection is disabled');
	}

	/**
	 * @inheritdoc
	 */
	function getName() {
		return 'meta';
	}
}
