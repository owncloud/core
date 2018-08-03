<?php
/**
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Markus Goetz <markus@woboq.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

use \OCP\AutoloadNotAllowedException;

class Autoloader {
	/** @var array */
	private $validRoots = [];

	/**
	 * Optional low-latency memory cache for class to path mapping.
	 *
	 * @var \OC\Memcache\Cache
	 */
	protected $memoryCache;

	/**
	 * Autoloader constructor.
	 *
	 * @param string[] $validRoots
	 */
	public function __construct(array $validRoots = []) {
		foreach ($validRoots as $root) {
			$this->validRoots[$root] = true;
		}
	}

	/**
	 * Add a path to the list of valid php roots for auto loading
	 *
	 * @param string $root
	 */
	public function addValidRoot($root) {
		$root = \stream_resolve_include_path($root);
		$this->validRoots[$root] = true;
	}

	/**
	 * get the possible paths for a class
	 *
	 * @param string $class
	 * @return array|bool an array of possible paths or false if the class is not part of ownCloud
	 */
	public function findClass($class) {
		$class = \trim($class, '\\');

		$paths = [];
		if (\strpos($class, 'OCA\\') === 0) {
			list(, $app, $rest) = \explode('\\', $class, 3);
			$app = \strtolower($app);
			$appPath = \OC_App::getAppPath($app);
			if ($appPath && \stream_resolve_include_path($appPath)) {
				$paths[] = $appPath . '/' . \strtolower(\str_replace('\\', '/', $rest) . '.php');
				// If not found in the root of the app directory, insert '/lib' after app id and try again.
				$paths[] = $appPath . '/lib/' . \strtolower(\str_replace('\\', '/', $rest) . '.php');
			}
		}
		return $paths;
	}

	/**
	 * @param string $fullPath
	 * @return bool
	 */
	protected function isValidPath($fullPath) {
		foreach ($this->validRoots as $root => $true) {
			if (\substr($fullPath, 0, \strlen($root) + 1) === $root . '/') {
				return true;
			}
		}
		throw new AutoloadNotAllowedException($fullPath);
	}

	/**
	 * Load the specified class
	 *
	 * @param string $class
	 * @return bool
	 */
	public function load($class) {
		$pathsToRequire = null;
		if ($this->memoryCache) {
			$pathsToRequire = $this->memoryCache->get($class);
		}

		if (\class_exists($class, false)) {
			return false;
		}

		if (!\is_array($pathsToRequire)) {
			// No cache or cache miss
			$pathsToRequire = [];
			foreach ($this->findClass($class) as $path) {
				$fullPath = \stream_resolve_include_path($path);
				if ($fullPath && $this->isValidPath($fullPath)) {
					$pathsToRequire[] = $fullPath;
				}
			}

			if ($this->memoryCache) {
				$this->memoryCache->set($class, $pathsToRequire, 60); // cache 60 sec
			}
		}

		foreach ($pathsToRequire as $fullPath) {
			require_once $fullPath;
		}

		return false;
	}

	/**
	 * Sets the optional low-latency cache for class to path mapping.
	 *
	 * @param \OC\Memcache\Cache $memoryCache Instance of memory cache.
	 */
	public function setMemoryCache(\OC\Memcache\Cache $memoryCache = null) {
		$this->memoryCache = $memoryCache;
	}
}
