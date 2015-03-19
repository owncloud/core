<?php
/**
 * ownCloud
 *
 * @author Joas Schilling
 * @copyright 2015 Joas Schilling nickvergessen@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Template;

use OCP\Template\IDelayedResourceLoader;

class DelayedResourceLoader implements IDelayedResourceLoader {
	/** @var array */
	protected $scripts;

	/** @var array */
	protected $styles;

	/** @var array */
	protected $vendorScripts;

	/** @var array */
	protected $vendorStyles;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->scripts = [];
		$this->styles = [];
		$this->vendorScripts = [];
		$this->vendorStyles = [];
	}

	/**
	 * Add a script resource to the list, that is loaded when the event is triggered
	 *
	 * @param string $eventApp
	 * @param string $eventName
	 * @param string $app
	 * @param string|array $script
	 */
	public function addScript($eventApp, $eventName, $app, $script) {
		if (!isset($this->scripts[$eventApp][$eventName][$app])) {
			$this->scripts[$eventApp][$eventName][$app] = [];
		}
		$this->scripts[$eventApp][$eventName][$app][] = $script;
	}

	/**
	 * Add a style resource to the list, that is loaded when the event is triggered
	 *
	 * @param string $eventApp
	 * @param string $eventName
	 * @param string $app
	 * @param string|array $style
	 */
	public function addStyle($eventApp, $eventName, $app, $style) {
		if (!isset($this->styles[$eventApp][$eventName][$app])) {
			$this->styles[$eventApp][$eventName][$app] = [];
		}
		$this->styles[$eventApp][$eventName][$app][] = $style;
	}

	/**
	 * Add a vendor script resource to the list, that is loaded when the event is triggered
	 *
	 * @param string $eventApp
	 * @param string $eventName
	 * @param string $app
	 * @param string|array $script
	 */
	public function addVendorScript($eventApp, $eventName, $app, $script) {
		if (!isset($this->vendorScripts[$eventApp][$eventName][$app])) {
			$this->vendorScripts[$eventApp][$eventName][$app] = [];
		}
		$this->vendorScripts[$eventApp][$eventName][$app][] = $script;
	}

	/**
	 * Add a vendor style resource to the list, that is loaded when the event is triggered
	 *
	 * @param string $eventApp
	 * @param string $eventName
	 * @param string $app
	 * @param string|array $style
	 */
	public function addVendorStyle($eventApp, $eventName, $app, $style) {
		if (!isset($this->vendorStyles[$eventApp][$eventName][$app])) {
			$this->vendorStyles[$eventApp][$eventName][$app] = [];
		}
		$this->vendorStyles[$eventApp][$eventName][$app][] = $style;
	}

	/**
	 * Load the resources that are registered for the event
	 *
	 * @param string $eventApp
	 * @param string $eventName
	 */
	public function loadResources($eventApp, $eventName) {
		if (isset($this->scripts[$eventApp][$eventName])) {
			foreach ($this->scripts[$eventApp][$eventName] as $app => $resources) {
				foreach ($resources as $resource) {
					script($app, $resource);
				}
			}
		}

		if (isset($this->styles[$eventApp][$eventName])) {
			foreach ($this->styles[$eventApp][$eventName] as $app => $resources) {
				foreach ($resources as $resource) {
					style($app, $resource);
				}
			}
		}

		if (isset($this->vendorScripts[$eventApp][$eventName])) {
			foreach ($this->vendorScripts[$eventApp][$eventName] as $app => $resources) {
				foreach ($resources as $resource) {
					vendor_script($app, $resource);
				}
			}
		}

		if (isset($this->vendorStyles[$eventApp][$eventName])) {
			foreach ($this->vendorStyles[$eventApp][$eventName] as $app => $resources) {
				foreach ($resources as $resource) {
					vendor_style($app, $resource);
				}
			}
		}
	}
}
