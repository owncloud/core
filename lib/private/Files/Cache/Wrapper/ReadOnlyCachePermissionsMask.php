<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Ilja Neumann <ineumann@owncloud.com>
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
	 * System internal paths which should not be protected
	 * @var array
	 */
	private $whitelist = [
		'uploads',
		'cache',
		'files_zsync'
	];

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

		// Give all permissions to whitelisted "internal" paths and their
		// subdirectories
		if ($this->isHomeStorage($storageId)) {
			foreach ($this->whitelist as $path) {
				if ($this->startsWith($entry->getPath(), $path)) {
					$entry['permissions'] = Constants::PERMISSION_ALL;
					return $entry;
				}
			}
		}

		// Allow creation of skeleton files
		if ($this->isHomeStorage($storageId) && $entry->getPath() === '') {
			$entry['permissions'] = Constants::PERMISSION_CREATE;
			$this->mask = Constants::PERMISSION_CREATE;
		}

		$entry['permissions'] &= $this->mask;
		return $entry;
	}

	private function isHomeStorage($storageId) {
		return $this->startsWith($storageId, 'home::') ||
			$this->startsWith($storageId, 'object::');
	}

	private function startsWith($haystack, $needle) {
		return (\strpos($haystack, $needle) === 0);
	}
}
