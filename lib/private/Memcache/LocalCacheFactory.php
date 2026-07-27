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

namespace OC\Memcache;

use OCP\ICache;
use OCP\ICacheFactory;

/**
 * Resolves a cache from the host local tier of an ICacheFactory.
 *
 * Values which are only meaningful on the machine which produced them - resolved
 * binary paths, theme asset paths, integrity check verdicts - must not be stored
 * in the distributed tier: it is reachable over the network and every node would
 * consume what any single node (or anything else able to talk to the backend)
 * wrote there.
 *
 * ICacheFactory does not declare createLocal(), so the tier is requested
 * defensively and a request scoped ArrayCache is used whenever a usable local
 * cache cannot be obtained.
 *
 * @package OC\Memcache
 */
class LocalCacheFactory {
	/**
	 * Create a cache in the host local tier of $factory, never returning a
	 * NullCache: when no local memcache is configured the returned cache is
	 * request scoped rather than a no-op, so the caller still benefits from
	 * caching within a single request.
	 *
	 * @param ICacheFactory $factory
	 * @param string $prefix
	 * @return ICache
	 */
	public static function create(ICacheFactory $factory, $prefix = '') {
		$cache = null;
		if (\method_exists($factory, 'createLocal')) {
			/* @phan-suppress-next-line PhanUndeclaredMethod */
			$cache = $factory->createLocal($prefix);
		}
		if (!$cache instanceof ICache || $cache instanceof NullCache) {
			$cache = new ArrayCache($prefix);
		}
		return $cache;
	}
}
