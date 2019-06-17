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

use Sabre\DAV\Collection;
use Sabre\DAV\Exception\Forbidden;

class TrashBinHome extends Collection {

	/** @var array */
	private $principalInfo;
	/**
	 * @var TrashBinManager
	 */
	private $trashBinManager;

	/**
	 * AvatarHome constructor.
	 *
	 * @param array $principalInfo
	 * @param TrashBinManager $trashBinManager
	 */
	public function __construct($principalInfo, TrashBinManager $trashBinManager) {
		$this->principalInfo = $principalInfo;
		$this->trashBinManager = $trashBinManager;
	}

	public function getChildren() {
		return [
			new RestoreFolder(),
			new TrashBinItemsFolder($this->getName(), $this->trashBinManager)
			];
	}

	public function delete() {
		throw new Forbidden('Permission denied to delete this folder');
	}

	public function getName() {
		list(, $name) = \Sabre\Uri\split($this->principalInfo['uri']);
		return $name;
	}

	public function setName($name) {
		throw new Forbidden('Permission denied to rename this folder');
	}

	/**
	 * Returns the last modification time, as a unix timestamp
	 *
	 * @return int
	 */
	public function getLastModified() {
		return null;
	}
}
