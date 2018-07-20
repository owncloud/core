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

namespace OCP\Files\External\Backend;

/**
 * Invalid storage backend representing a backend
 * that could not be resolved
 *
 * @since 10.0.5
 */
class InvalidBackend extends Backend {

	/** @var string Invalid backend id */
	private $invalidId;

	/**
	 * Constructs a new InvalidBackend with the id of the invalid backend
	 * for display purposes
	 *
	 * @param string $invalidId id of the backend that did not exist
	 *
	 * @since 10.0.5
	 */
	public function __construct($invalidId) {
		$this->invalidId = $invalidId;
		$this->setIdentifier($invalidId)
			->setStorageClass('\OC\Files\External\InvalidStorage')
			->setText('Unknown storage backend ' . $invalidId)
		;
	}

	/**
	 * Returns the invalid backend id
	 *
	 * @return string invalid backend id
	 *
	 * @since 10.0.5
	 */
	public function getInvalidId() {
		return $this->invalidId;
	}
}
