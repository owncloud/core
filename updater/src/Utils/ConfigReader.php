<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace Owncloud\Updater\Utils;

/**
 * Class ConfigReader
 *
 * @package Owncloud\Updater\Utils
 */
class ConfigReader {
	/** @var array Associative array ($key => $value) */
	protected $cache = [];

	/**
	 * @var OccRunner $occRunner
	 */
	protected $occRunner;

	/**
	 * @var bool
	 */
	protected $isLoaded = false;

	/**
	 *
	 * @param OccRunner $occRunner
	 */
	public function __construct(OccRunner $occRunner) {
		$this->occRunner = $occRunner;
	}

	public function init() {
		$this->load();
	}

	/**
	 * @return bool
	 */
	public function getIsLoaded() {
		return $this->isLoaded;
	}

	/**
	 * Get a value from OC config by
	 * path key1.key2.key3
	 * @param string $path
	 * @return mixed
	 */
	public function getByPath($path) {
		return $this->get(\explode('.', $path));
	}

	/**
	 * Get a value from OC config by keys
	 * @param array $keys
	 * @return mixed
	 */
	public function get($keys) {
		$config = $this->cache;
		do {
			$key = \array_shift($keys);
			if (!\count($keys)>0 && !\is_array($config)) {
				return null;
			}
			if (!\array_key_exists($key, $config)) {
				return null;
			}
			$config = $config[$key];
		} while ($keys);
		return $config;
	}

	/**
	 * Get OC Edition
	 * @return string
	 * @throws \Symfony\Component\Process\Exception\ProcessFailedException
	 */
	public function getEdition() {
		$response = $this->occRunner->runJson('status');
		return $response['edition'];
	}

	/**
	 * Export OC config as JSON and parse it into the cache
	 * @throws \Symfony\Component\Process\Exception\ProcessFailedException
	 * @throws \UnexpectedValueException
	 */
	private function load() {
		$this->cache = $this->occRunner->runJson('config:list', ['--private']);
		$this->isLoaded = true;
	}
}
