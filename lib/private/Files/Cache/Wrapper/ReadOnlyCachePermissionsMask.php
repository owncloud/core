<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Ilja Neumann <ineumann@owncloud.com>
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

namespace OC\Files\Cache\Wrapper;

use OCP\Constants;

/**
 * Works together with ReadOnlyJail class
 * to allow file creation outside of users files dir.
 *
 * @package OC\Files\Cache\Wrapper
 */
class ReadOnlyCachePermissionsMask extends CacheWrapper {
	/**
	 * @var int
	 */
	protected $mask;

	/**
	 * @param \OCP\Files\Cache\ICache $cache
	 * @param int $mask
	 */
	public function __construct($cache, $mask) {
		parent::__construct($cache);
		$this->mask = $mask;
	}

	/**
	 * @param \OCP\Files\Cache\ICacheEntry $entry
	 * @return \OCP\Files\Cache\ICacheEntry
	 */
	protected function formatCacheEntry($entry) {
		$storageId = $entry->getStorageId();

		if (substr($storageId, 0, strlen('home::')) === 'home::' && $entry->getPath() === "") {
			$entry['permissions'] = Constants::PERMISSION_CREATE;
			$this->mask = Constants::PERMISSION_CREATE;
		}

		$entry['permissions'] &= $this->mask;

		return $entry;
	}
}
