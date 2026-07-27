<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace Test\Memcache;

use OCP\ICache;
use OCP\ICacheFactory;

/**
 * An ICacheFactory handing out one and the same cache for every tier, so a test
 * can observe what the code under test stored.
 *
 * \OC\Memcache\Factory returns a fresh cache instance per call, which makes the
 * cache contents invisible to a test unless the factory is replaced.
 */
class FixedCacheFactory implements ICacheFactory {
	/** @var ICache */
	private $cache;

	/** @var string[] the prefixes this factory was asked for */
	private $prefixes = [];

	public function __construct(ICache $cache) {
		$this->cache = $cache;
	}

	public function create($prefix = '') {
		$this->prefixes[] = $prefix;
		return $this->cache;
	}

	public function createLocal($prefix = '') {
		$this->prefixes[] = $prefix;
		return $this->cache;
	}

	public function createDistributed($prefix = '') {
		$this->prefixes[] = $prefix;
		return $this->cache;
	}

	public function createLocking($prefix = '') {
		$this->prefixes[] = $prefix;
		return $this->cache;
	}

	public function isAvailable() {
		return true;
	}

	/**
	 * The prefixes this factory handed out a cache for, in call order.
	 *
	 * @return string[]
	 */
	public function getRequestedPrefixes() {
		return $this->prefixes;
	}
}
