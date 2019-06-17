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
use Sabre\DAV\Collection;

class TrashBinItemsFolder extends Collection {

	/**
	 * @var TrashBinManager
	 */
	private $trashBinManager;
	/**
	 * @var string
	 */
	private $user;

	/**
	 * AvatarHome constructor.
	 *
	 * @param string $user
	 * @param TrashBinManager $trashBinManager
	 */
	public function __construct(string $user, TrashBinManager $trashBinManager) {

		$this->trashBinManager = $trashBinManager;
		$this->user = $user;
	}

	public function getChild($name) {
		return $this->trashBinManager->getItemByFileId($this->user, $name);
	}

	public function getChildren() {
		return $this->trashBinManager->getChildren($this->user);
	}

	public function getName() {
		return 'items';
	}

	public function delete() {
		Trashbin::deleteAll();
	}
}
