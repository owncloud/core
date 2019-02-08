<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Michael Jobst <mjobst+github@tecratech.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Philipp Schaffrath <github@philippschaffrath.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
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

namespace OC\Template;

use OCP\App\IAppManager;
use OCP\ILogger;
use OCP\Theme\ITheme;

abstract class ResourceLocator {
	/**
	 * @var ITheme
	 */
	protected $theme;

	protected $mapping;
	protected $serverroot;
	protected $webroot;

	protected $resources = [];

	/** @var $appManager */
	protected $appManager;

	/** @var ILogger */
	protected $logger;

	/**
	 * @param ITheme $theme
	 * @param IAppManager $appManager
	 * @param ILogger $logger
	 * @param array $core_map
	 */
	public function __construct(ITheme $theme, IAppManager $appManager, ILogger $logger, $core_map) {
		$this->theme = $theme;
		$this->logger = $logger;
		$this->appManager = $appManager;
		$this->mapping = $core_map;
		$this->serverroot = \key($core_map);
		$this->webroot = $this->mapping[$this->serverroot];
	}

	/**
	 * @param string $resource
	 */
	abstract public function doFind($resource);

	/**
	 * @param string $resource
	 */
	abstract public function doFindTheme($resource);

	/**
	 * @param string $path
	 * @return string
	 */
	abstract protected function addExtension($path);

	/**
	 * Finds the resources and adds them to the list
	 *
	 * @param array $resources
	 */
	public function find($resources) {
		foreach ($resources as $resource) {
			try {
				$this->doFind($resource);
			} catch (ResourceNotFoundException $e) {
				$resourceApp = \substr($resource, 0, \strpos($resource, '/'));
				$this->logger->error('Could not find resource file "' . $e->getResourcePath() . '"', ['app' => $resourceApp]);
			}
		}
		if (!empty($this->theme->getName())) {
			foreach ($resources as $resource) {
				try {
					$this->doFindTheme($resource);
				} catch (ResourceNotFoundException $e) {
					$resourceApp = \substr($resource, 0, \strpos($resource, '/'));
					$this->logger->error('Could not find resource file in theme "' . $e->getResourcePath() . '"', ['app' => $resourceApp]);
				}
			}
		}
	}

	/**
	 * append the $file resource once if exist at $root
	 *
	 * @param string $root path to check
	 * @param string $file the filename
	 * @param string|null $webRoot base for path, default map $root to $webRoot
	 * @return bool True if the resource was found, false otherwise
	 */
	protected function appendOnceIfExist($root, $file, $webRoot = null) {
		$file = \ltrim($file, '/');
		$path = $this->buildPath([$root, $file]);
		
		if (!isset($this->resources[$path]) && \is_file($path)) {
			$this->append($root, $file, $webRoot, false);
			return true;
		}
		return false;
	}

	/**
	 * append the $file resource at $root
	 *
	 * @param string $root path to check
	 * @param string $file the filename
	 * @param string|null $webRoot base for path, default map $root to $webRoot
	 * @param bool $throw Throw an exception, when the route does not exist
	 * @throws ResourceNotFoundException Only thrown when $throw is true and the resource is missing
	 */
	protected function append($root, $file, $webRoot = null, $throw = true) {
		if (!$webRoot) {
			$webRoot = $this->mapping[$root];
		}
		
		$path = $this->buildPath([$root, $file]);
		$this->resources[$path] = [$root, $webRoot, $file];

		if ($throw && !\is_file($path)) {
			throw new ResourceNotFoundException($file, $webRoot);
		}
	}
	
	/**
	 * build a path by given parts concatenated with a '/' (DIRECTORY_SEPARATOR)
	 *
	 * @param string[] $parts path parts to concatenate
	 * @return string $parts concatenated
	 */
	protected function buildPath($parts) {
		$trimmedParts = \array_map(
			function ($part) {
				return \rtrim($part, '/');
			},
			$parts
		);
		return \join(DIRECTORY_SEPARATOR, $trimmedParts);
	}

	/**
	 * Returns the list of all resources that should be loaded
	 * @return array
	 */
	public function getResources() {
		return $this->resources;
	}
}
