<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC;

class RedisFactory {
	/** @var \Redis | \RedisCluster */
	private $instance;

	const REDIS_MINIMAL_VERSION = '2.2.5';
	const REDIS_EXTRA_PARAMETERS_MINIMAL_VERSION = '5.3.0';

	/** @var  SystemConfig */
	private $config;

	/**
	 * RedisFactory constructor.
	 *
	 * @param SystemConfig $config
	 */
	public function __construct(SystemConfig $config) {
		$this->config = $config;
	}

	/**
	 * @throws \UnexpectedValueException
	 */
	private function create() {
		$isConnectionParametersSupported = $this->isConnectionParametersSupported();

		if ($config = $this->config->getValue('redis.cluster', [])) {
			if (!\class_exists('RedisCluster')) {
				throw new \Exception('Redis Cluster support is not available');
			}
			// cluster config
			if (isset($config['timeout'])) {
				$timeout = $config['timeout'];
			} else {
				$timeout = null;
			}
			if (isset($config['read_timeout'])) {
				$readTimeout = $config['read_timeout'];
			} else {
				$readTimeout = null;
			}
			if (isset($config['connection_parameters'])) {
				if (!$isConnectionParametersSupported) {
					throw new \UnexpectedValueException(\sprintf('php-redis extension must be version %s or higher to support connection parameters',
						self::REDIS_EXTRA_PARAMETERS_MINIMAL_VERSION));
				}
				$connectionParameters = $config['connection_parameters'];
			} else {
				$connectionParameters = null;
			}

			if ($connectionParameters && $isConnectionParametersSupported) {
				$this->instance = new \RedisCluster(null, $config['seeds'], $timeout, $readTimeout, false, null, $connectionParameters); // @phan-suppress-current-line PhanParamTooManyInternal
			} else {
				$this->instance = new \RedisCluster(null, $config['seeds'], $timeout, $readTimeout);
			}

			if (isset($config['failover_mode'])) {
				$this->instance->setOption(\RedisCluster::OPT_SLAVE_FAILOVER, $config['failover_mode']);
			}
		} else {
			$config = $this->config->getValue('redis', []);
			if (isset($config['host'])) {
				$host = $config['host'];
			} else {
				$host = '127.0.0.1';
			}
			if (isset($config['port'])) {
				$port = $config['port'];
			} else {
				$port = 6379;
			}
			if (isset($config['timeout'])) {
				$timeout = $config['timeout'];
			} else {
				$timeout = 0.0; // unlimited
			}

			if (isset($config['connection_parameters'])) {
				if (!$isConnectionParametersSupported) {
					throw new \UnexpectedValueException(\sprintf('php-redis extension must be version %s or higher to support connection parameters',
						self::REDIS_EXTRA_PARAMETERS_MINIMAL_VERSION));
				}
				$connectionParameters = $config['connection_parameters'];
			} else {
				$connectionParameters = null;
			}

			$this->instance = new \Redis();

			if ($connectionParameters && $isConnectionParametersSupported) {
				@$this->instance->connect($host, $port, $timeout, null, 0, 0, $connectionParameters);  // @phan-suppress-current-line PhanParamTooManyInternal
			} else {
				@$this->instance->connect($host, $port, $timeout);
			}

			if (isset($config['password']) && $config['password'] !== '') {
				$this->instance->auth($config['password']);
			}

			if (isset($config['dbindex'])) {
				$this->instance->select($config['dbindex']);
			}
		}
	}

	/**
	 * @return \Redis|\RedisCluster
	 * @throws \Exception
	 */
	public function getInstance() {
		if (!$this->isAvailable()) {
			throw new \Exception('Redis support is not available');
		}
		if (!$this->instance instanceof \Redis) {
			$this->create();
		}

		return $this->instance;
	}

	public function isAvailable() {
		return \extension_loaded('redis')
			&& (\version_compare(\phpversion('redis'), self::REDIS_MINIMAL_VERSION, '>=')
				|| \strcmp(\phpversion('redis'), 'develop') == 0);
	}

	/**
	 * Php redis does support configurable extra parameters since version 5.3.0, see: https://github.com/phpredis/phpredis#connect-open.
	 * We need to check if the current version supports extra connection parameters, otherwise the connect method will throw an exception
	 *
	 * @return boolean
	 */
	private function isConnectionParametersSupported(): bool {
		return \extension_loaded('redis') &&
			\version_compare(\phpversion('redis'), self::REDIS_EXTRA_PARAMETERS_MINIMAL_VERSION, '>=');
	}
}
