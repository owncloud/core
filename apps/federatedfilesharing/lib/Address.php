<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\FederatedFileSharing;

/**
 * Class Address
 *
 * @package OCA\FederatedFileSharing
 */
class Address {
	/**
	 * @var string
	 */
	protected $cloudId;

	/**
	 * @var string
	 */
	protected $displayName;

	/**
	 * Address constructor.
	 *
	 * @param string $cloudId
	 * @param string $displayName
	 */
	public function __construct($cloudId, $displayName = '') {
		$this->cloudId = $cloudId;
		$this->displayName = $displayName;
	}

	/**
	 * Get user federated id
	 *
	 * @return string
	 */
	public function getCloudId() {
		return $this->cloudId;
	}

	/**
	 * Get user id
	 *
	 * @return string
	 */
	public function getUserId() {
		$parts = \explode('@', $this->cloudId);
		return $parts[0];
	}

	/**
	 * Get user host
	 *
	 * @return string
	 */
	public function getHostName() {
		$parts = \explode('@', $this->cloudId);
		return $parts[1];
	}

	/**
	 * Get user display name, fallback to userId if it is empty
	 *
	 * @return string
	 */
	public function getDisplayName() {
		return ($this->displayName !== '') ? $this->displayName : $this->getUserId();
	}
}
