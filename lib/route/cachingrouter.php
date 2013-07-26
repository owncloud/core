<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Route;

/**
 * Class CachingRouter
 *
 * Router that uses \OC\Memcache\Cache to cache generated urls
 *
 * @package OC\Route
 */
class CachingRouter extends Router {
	/**
	 * @var \OC\Memcache\Cache $cache
	 */
	protected $cache;

	/**
	 * @param \OC\Memcache\Cache $cache
	 */
	public function __construct($cache) {
		$this->cache = $cache;

		$versionSum = array_sum(\OC_App::getAppVersions());
		if (!$this->cache->hasKey('versionSum') || $this->cache->get('versionSum') != $versionSum) {
			$this->cache->clear();
			$this->cache->set('versionSum', $versionSum);
		}
		parent::__construct();
	}

	/**
	 * Generate url based on $name and $parameters
	 *
	 * @param string $name Name of the route to use.
	 * @param array $parameters Parameters for the route
	 * @param bool $absolute
	 * @return string
	 */
	public function generate($name, $parameters = array(), $absolute = false) {
		$key = $name . json_encode($parameters) . $absolute;
		if ($this->cache->hasKey($key)) {
			return $this->cache->get($key);
		} else {
			$url = parent::generate($name, $parameters, $absolute);
			$this->cache->set($key, $url);
			return $url;
		}
	}
}
