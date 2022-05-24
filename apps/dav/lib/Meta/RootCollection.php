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

use OC\Files\Meta\MetaFileIdNode;
use OCP\Files\IRootFolder;
use OCP\Files\NotFoundException;
use Sabre\DAV\Collection;
use Sabre\DAV\Exception\MethodNotAllowed;
use Sabre\DAV\Exception\NotFound;

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
		try {
			$child = $this->rootFolder->get("meta/$name");
			if (!$child instanceof MetaFileIdNode) {
				throw new NotFound();
			}
			return new MetaFolder($child);
		} catch (NotFoundException $exception) {
			throw new NotFound();
		}
	}
	
	/**
	 * @inheritdoc
	 */
	public function getChildren() {
		throw new MethodNotAllowed('Listing members of this collection is disabled');
	}

	/**
	 * @inheritdoc
	 */
	public function getName() {
		return 'meta';
	}
}
