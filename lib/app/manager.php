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
	protected $enabledApps;
	protected $appTypes;
	protected $installedVersions;

	public function __construct(array $approots) {
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

	/**
	 * get all enabled apps
	 */
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
	 * @brief enables an app
	 * @param mixed $app app
	 * @return void
	 *
	 * This function set an app as enabled in appconfig.
	 */
	public function enableApp( $app ) {
		\OC_Appconfig::setValue( $app, 'enabled', 'yes' ); // TODO: DI
		if (isset($this->enabledApps)) {
			$this->enabledApps[] = $app;
		}
	}

	/**
	 * @brief disables an app
	 * @param string $app app
	 * @return bool
	 *
	 * This function set an app as disabled in appconfig.
	 */
	public function disableApp( $app ) {
		\OC_Hook::emit('OC_App', 'pre_disable', array('app' => $app)); // TODO: refactor
		\OC_Appconfig::setValue( $app, 'enabled', 'no' ); // TODO: DI
		$this->enabledApps = null;
	}

	/**
	 * check if an app is of a specific type
	 * @param string $app
	 * @param string|array $types
	 * @return bool
	 */
	public function isType($app, $types) {
		if (is_string($types)) {
			$types = array($types);
		}
		$appTypes = $this->getAppTypes($app);
		foreach ($types as $type) {
			if (in_array($type, $appTypes)) {
				return true;
			}
		}
		return false;
	}

	/**
	 * get the types of an app
	 * @param string $app
	 * @return array
	 */
	private function getAppTypes($app) {
		if (!isset($this->appTypes)) {
			$this->appTypes = \OC_Appconfig::getValues(false, 'types'); // TODO: DI
		}

		if (isset($this->appTypes[$app])) {
			return explode(',', $this->appTypes[$app]);
		} else {
			return array();
		}
	}

	/**
	 * read app types from info.xml and cache them in the database
	 */
	public function setAppTypes($app) {
		$appData = $this->getInfo($app)->getData();

		if(isset($appData['types'])) {
			$appTypes = implode(',', $appData['types']);
		}else{
			$appTypes = '';
		}

		\OC_Appconfig::setValue($app, 'types', $appTypes); // TODO: DI
		$this->appTypes[$app] = $appTypes;
	}

	/**
	 * get the installed version of all apps
	 */
	public function getInstalledVersions() {
		if (isset($this->installedVersions)) {
			return $this->installedVersions;
		}
		$this->installedVersions = \OC_Appconfig::getValues(false, 'installed_version'); // TODO: DI
		return $this->installedVersions;
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