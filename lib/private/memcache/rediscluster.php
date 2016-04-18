<?php
/**
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

class RedisCluster extends Redis {

	public function __construct($prefix = '') {
		if (is_null(self::$cache)) {
			$systemConfig = \OC::$server->getSystemConfig();

			if ($config = $systemConfig->getValue('redis.cluster', [])) {
				$timeout = isset($config['timeout']) ? $config['timeout'] : null;
				$readTimeout = isset($config['read_timeout']) ? $config['read_timeout'] : null;
				self::$cache = new \RedisCluster(null, $config['seeds'], $timeout, $readTimeout);

				if (isset($config['failover_mode'])) {
					self::$cache->setOption(\RedisCluster::OPT_SLAVE_FAILOVER, $config['failover_mode']);
				}
			} else {
				throw new \OC\HintException(
					'No Redis cluster definitions found',
					'Configure Redis Cluster in config.php, or use the single-server Redis memcache'
				);
			}
		}

		parent::__construct($prefix);
	}

	// TODO: phpredis with cluster support not currently available
	// Assume it will be available in 2.2.8?
	static public function isAvailable() {
		//return extension_loaded('redis')
		//&& version_compare(phpversion('redis'), '2.2.8', '>=');
		return parent::isAvailable();
	}

}

