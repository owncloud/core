<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\App;

use OCP\App\Manager as ManagerInterface;

class Manager implements ManagerInterface {
	protected $approots;
	protected $app_path = array();
	protected $app_info = array();

	public function __construct($approots) {
		$this->approots = $approots;
		// TODO:appconfig
	}

	/**
	 * @brief Locates the directory and webroot for this $appid
	 * @param $app string appid
	 * @throws \OutOfBoundsException when not found
	 */
	protected function findAppInDirectories($appid) {
		if (isset($this->app_path[$appid])) {
			return $this->app_path[$appid];
		}
		foreach ($this->approots as $dir) {
			if (file_exists($dir['path'].'/'.$appid)) {
				return $this->app_path[$appid] = $dir;
			}
		}
		throw new \OutOfBoundsException('Directory for application "' . $appid . '" not found.');
	}

	/**
	 * @brief checks whether or not an app is enabled
	 * @param $app string appid
	 * @returns bool true when an app is enabled.
	 */
	public function isEnabled( $app ) {
		return in_array($app, $this->getEnabledApps());
	}

	public function getEnabledApps() {
		if (isset($this->enabledApps)) {
			return $this->enabledApps;
		}
		$values = \OC_Appconfig::getValues(false, 'enabled'); // TODO: DI
		$this->enabledApps = array('files');
		foreach($values as $app => $value) {
		  if ($value === 'yes') {
			$this->enabledApps[] = $app;
		  }
		}
		$this->enabledApps = array_unique($this->enabledApps);
		return $this->enabledApps;
	}

	/**
	 * @brief load all enabled apps
	 * @param array $types
	 *
	 * This function walks through the owncloud directory and loads all apps
	 * it can find. A directory contains an app if the file /appinfo/app.php
	 * exists.
	 *
	 * if $types is set, only apps of those types will be loaded
	 */
	public function loadAll() {
		\OC_App::loadApps(); // TODO: refactor
	}

	/**
	 * @brief Get information about the app
	 * @param $app string appid
	 *
	 * @return \OCP\App\Info|null
	 * @throws \OutOfBoundsException when not app is not available/found
	 */
	public function getInfo( $app ) {
		if (isset($this->app_info[$app])) {
			return $this->app_info[$app];
		}
		$app_path = $this->findAppInDirectories($app);
		$info = new Info($app, $app_path);
		return $this->app_info[$app] = $info;
	}
}