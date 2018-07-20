<?php

/**
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
namespace OC\Files\Storage\Wrapper;

use OC\Files\Cache\Wrapper\ReadOnlyCachePermissionsMask;
use OCP\Constants;

class ReadOnlyJail extends DirMask {

	/**
	 * @param $path
	 * @return bool
	 */
	protected function checkPath($path) {
		if ($path === 'files') {
			return true;
		}

		return parent::checkPath($path);
	}

	/**
	 * @param string $path
	 * @return bool
	 */
	public function isDeletable($path) {
		if (\pathinfo($path, PATHINFO_EXTENSION) === 'part') {
			return true;
		}

		return $this->getWrapperStorage()->isDeletable($path);
	}

	/**
	 * @param string $path
	 * @return bool
	 */
	public function mkdir($path) {
		// Lift restrictions if files dir is created (at first login)
		if ($path === 'files') {
			$this->mask = Constants::PERMISSION_CREATE;
		};

		$result = parent::mkdir($path);
		$this->mask = Constants::PERMISSION_READ;

		return $result;
	}

	/**
	 * get a cache instance for the storage
	 *
	 * @param string $path
	 * @param \OC\Files\Storage\Storage (optional) the storage to pass to the cache
	 * @return \OC\Files\Cache\Cache
	 */
	public function getCache($path = '', $storage = null) {
		if (!$storage) {
			$storage = $this;
		}
		$sourceCache = parent::getCache($path, $storage);
		return new ReadOnlyCachePermissionsMask($sourceCache, $this->mask);
	}
}
