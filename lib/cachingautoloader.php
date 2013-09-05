<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC;

require_once __DIR__ . '/autoloader.php';

class CachingAutoloader extends Autoloader {
	protected $memoryCache = null;

	/**
	 * Constructor.
	 *
	 * @param object $cache   the cacher for class information
	 *
	 */
	public function __construct($cache)
	{
		$this->memoryCache = $cache;
	}

	public function findClass($class) {
		$path = $this->memoryCache->get($class);
		if (is_string($path)) {
			return $path;
		}

		// Use the normal class loading path
		$path = parent::findClass($class);
		if (is_string($path)) {
			// Save in our memory cache
			$this->memoryCache->set($class, $path, 60); // cache 60 sec
			return $path;
		}
		return false;
	}
}
