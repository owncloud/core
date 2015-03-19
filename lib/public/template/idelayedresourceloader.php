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
namespace OCP\Template;

interface IDelayedResourceLoader {
	/**
	 * Add a script resource to the list, that is loaded when the event is triggered
	 *
	 * @param string $eventApp
	 * @param string $eventName
	 * @param string $app
	 * @param string|array $script
	 */
	public function addScript($eventApp, $eventName, $app, $script);

	/**
	 * Add a style resource to the list, that is loaded when the event is triggered
	 *
	 * @param string $eventApp
	 * @param string $eventName
	 * @param string $app
	 * @param string|array $style
	 */
	public function addStyle($eventApp, $eventName, $app, $style);

	/**
	 * Add a vendor script resource to the list, that is loaded when the event is triggered
	 *
	 * @param string $eventApp
	 * @param string $eventName
	 * @param string $app
	 * @param string|array $script
	 */
	public function addVendorScript($eventApp, $eventName, $app, $script);

	/**
	 * Add a vendor style resource to the list, that is loaded when the event is triggered
	 *
	 * @param string $eventApp
	 * @param string $eventName
	 * @param string $app
	 * @param string|array $style
	 */
	public function addVendorStyle($eventApp, $eventName, $app, $style);

	/**
	 * Load the resources that are registered for the event
	 *
	 * @param string $eventApp
	 * @param string $eventName
	 */
	public function loadResources($eventApp, $eventName);
}
