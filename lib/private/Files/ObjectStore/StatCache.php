<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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

namespace OC\Files\ObjectStore;

use OC\Files\Cache\CacheEntry;

class StatCache {

	/**
	 * @var \OC\Files\Cache\CacheEntry[] $cache
	 */
	private $cache;

	/**
	 * @var string[] $statCacheEnabled
	 */
	private $statCacheEnabled;

	public function __construct() {
	}

	public function enable($path) {
		$this->statCacheEnabled[$path] = true;
	}

	public function disable($path) {
		unset($this->statCacheEnabled[$path]);
	}

	public function put($path, CacheEntry $cache) {
		if ($this->isEnabled($path)) {
			$this->cache[$path] = $cache;
		}
	}

	public function get($path) {
		if ($this->isEnabled($path) && isset($this->cache[$path])) {
			return $this->cache[$path];
		}
		return false;
	}

	private function isEnabled($path) {
		return isset($this->statCacheEnabled[$path]);
	}
}
