<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Michael Telatynski <7t3chguy@gmail.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

use OCP\IMemcacheTTL;

class Redis extends Cache implements IMemcacheTTL {
	/**
	 * @var \Redis $cache
	 */
	private static $cache = null;

	const MAX_TRIES = 3;

	public function __construct($prefix = '') {
		parent::__construct($prefix);
		$this->connect();
	}

	private function connect() {
		if (is_null(self::$cache)) {
			self::$cache = new \Redis();
			$config = \OC::$server->getSystemConfig()->getValue('redis', []);
			// TODO allow configuring a RedisArray, see https://github.com/nicolasff/phpredis/blob/master/arrays.markdown#redis-arrays
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

			self::$cache->connect($host, $port, $timeout);
			if(isset($config['password']) && $config['password'] !== '') {
				self::$cache->auth($config['password']);
			}

			if (isset($config['dbindex'])) {
				self::$cache->select($config['dbindex']);
			}
		}
	}

	/**
	 * entries in redis get namespaced to prevent collisions between ownCloud instances and users
	 */
	protected function getNameSpace() {
		return $this->prefix;
	}

	public function get($key) {
		$result = $this->retryOp('get', [$this->getNameSpace() . $key]);
		if ($result === false && !$this->retryOp('exists', [$this->getNameSpace() . $key])) {
			return null;
		} else {
			return json_decode($result, true);
		}
	}

	public function set($key, $value, $ttl = 0) {
		if ($ttl > 0) {
			return $this->retryOp('setex', [$this->getNameSpace() . $key, $ttl, json_encode($value)]);
		} else {
			return $this->retryOp('set', [$this->getNameSpace() . $key, json_encode($value)]);
		}
	}

	public function hasKey($key) {
		return $this->retryOp('exists', [$this->getNameSpace() . $key]);
	}

	public function remove($key) {
		if ($this->retryOp('delete', [$this->getNameSpace() . $key])) {
			return true;
		} else {
			return false;
		}
	}

	public function clear($prefix = '') {
		$prefix = $this->getNameSpace() . $prefix . '*';
		$it = null;
		$this->retryOp('setOption', [\Redis::OPT_SCAN, \Redis::SCAN_RETRY]);
		while ($keys = $this->retryOp('scan', [$it, $prefix])) {
			$this->retryOp('delete', [$keys]);
		}
		return true;
	}

	/**
	 * Set a value in the cache if it's not already stored
	 *
	 * @param string $key
	 * @param mixed $value
	 * @param int $ttl Time To Live in seconds. Defaults to 60*60*24
	 * @return bool
	 */
	public function add($key, $value, $ttl = 0) {
		// dont encode ints for inc/dec
		if (!is_int($value)) {
			$value = json_encode($value);
		}
		return $this->retryOp('setnx', [$this->getPrefix() . $key, $value]);
	}

	/**
	 * Increase a stored number
	 *
	 * @param string $key
	 * @param int $step
	 * @return int | bool
	 */
	public function inc($key, $step = 1) {
		return $this->retryOp('incrBy', [$this->getNameSpace() . $key, $step]);
	}

	/**
	 * Decrease a stored number
	 *
	 * @param string $key
	 * @param int $step
	 * @return int | bool
	 */
	public function dec($key, $step = 1) {
		if (!$this->hasKey($key)) {
			return false;
		}
		return $this->retryOp('decrBy', [$this->getNameSpace() . $key, $step]);
	}

	/**
	 * Compare and set
	 *
	 * @param string $key
	 * @param mixed $old
	 * @param mixed $new
	 * @return bool
	 */
	public function cas($key, $old, $new) {
		if (!is_int($new)) {
			$new = json_encode($new);
		}
		$this->retryOp('watch', [$this->getNameSpace() . $key]);
		if ($this->get($key) === $old) {
			$result = $this->retryOp('multi')
				->set($this->getNameSpace() . $key, $new)
				->exec();
			return ($result === false) ? false : true;
		}
		$this->retryOp('unwatch');
		return false;
	}

	/**
	 * Compare and delete
	 *
	 * @param string $key
	 * @param mixed $old
	 * @return bool
	 */
	public function cad($key, $old) {
		$this->retryOp('watch', [$this->getNameSpace() . $key]);
		if ($this->get($key) === $old) {
			$result = $this->retryOp('multi')
				->del($this->getNameSpace() . $key)
				->exec();
			return ($result === false) ? false : true;
		}
		$this->retryOp('unwatch');
		return false;
	}

	public function setTTL($key, $ttl) {
		$this->retryOp('expire', [$this->getNameSpace() . $key, $ttl]);
	}

	static public function isAvailable() {
		return extension_loaded('redis')
		&& version_compare(phpversion('redis'), '2.2.5', '>=');
	}

	public function retryOp($name, array $params = []) {
		$tries = 0;
		$ex = null;
		do {
			try {
				return call_user_func_array([self::$cache, $name], $params);
			} catch (\RedisException $ex) {
				self::$cache->close();
				self::$cache = null;
				$this->connect();
			}
		} while (++$tries < self::MAX_TRIES);
		throw new \RedisException($tries . ' tries exceeded', 0, $ex);
	}
}

