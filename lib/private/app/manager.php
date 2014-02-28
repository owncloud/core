<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\App;

use OCP\App\IManager as ManagerInterface;
use OCP\IAppConfig;

class Manager implements ManagerInterface {
	protected $appRoots;
	protected $appPath = array();
	protected $appInfo = array();
	protected $enabledApps;
	protected $appTypes;
	protected $installedVersions;
	protected $config;

	/**
	 * @param array $appRoots
	 * @param \OCP\IAppConfig $config
	 */
	public function __construct(array $appRoots, IAppConfig $config) {
		$this->appRoots = $appRoots;
		$this->config = $config;
	}

	/**
	 * @brief Locates the directory and webroot for this $appid
	 * @param string $appid appid
	 * @throws \OutOfBoundsException when not found
	 */
	protected function findAppInDirectories($appid) {
		if (isset($this->appPath[$appid])) {
			return $this->appPath[$appid];
		}
		foreach ($this->appRoots as $dir) {
			if (file_exists($dir['path'].'/'.$appid)) {
				return $this->appPath[$appid] = $dir;
			}
		}
		throw new \OutOfBoundsException('Directory for application "' . $appid . '" not found.');
	}

	/**
	 * @brief checks whether or not an app is enabled
	 * @param string $app appid
	 * @returns bool true when an app is enabled.
	 */
	public function isEnabled( $app ) {
		return in_array($app, $this->getEnabledApps());
	}

	/**
	 * get all enabled apps
	 */
	public function getEnabledApps($forceRefresh = false) {
		if (!$forceRefresh && isset($this->enabledApps)) {
			return $this->enabledApps;
		}
		$values = $this->config->getValues(false, 'enabled');
		$this->enabledApps = array('files');
		foreach($values as $app => $value) {
		  if ($value === 'yes') {
			$this->enabledApps[] = $app;
		  }
		}
		$this->enabledApps = array_unique($this->enabledApps);
		sort($this->enabledApps);
		return $this->enabledApps;
	}

	/**
	 * @brief enables an app
	 * @param string $app app
	 * @return void
	 *
	 * This function set an app as enabled in appconfig.
	 */
	public function enableApp( $app ) {
		$this->config->setValue($app, 'enabled', 'yes');
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
		$this->config->setValue($app, 'enabled', 'no');
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
			$this->appTypes = $this->config->getValues(false, 'types'); // TODO: DI
		}

		if (isset($this->appTypes[$app])) {
			return explode(',', $this->appTypes[$app]);
		} else {
			return array();
		}
	}

	/**
	 * read app types from info.xml and cache them in the database
	 * @param string $app
	 */
	public function setAppTypes($app) {
		$appData = $this->getInfo($app)->getData();

		if(isset($appData['types'])) {
			$appTypes = implode(',', $appData['types']);
		}else{
			$appTypes = '';
		}

		$this->config->setValue($app, 'types', $appTypes);
		$this->appTypes[$app] = $appTypes;
	}

	/**
	 * get the installed version of all apps
	 */
	public function getInstalledVersions() {
		if (isset($this->installedVersions)) {
			return $this->installedVersions;
		}
		$this->installedVersions = $this->config->getValues(false, 'installed_version'); // TODO: DI
		return $this->installedVersions;
	}

	/**
	 * @brief Get information about the app
	 * @param string $app appid
	 *
	 * @return \OC\App\Info
	 * @throws \OutOfBoundsException when not app is not available/found
	 */
	public function getInfo( $app ) {
		if (isset($this->appInfo[$app])) {
			return $this->appInfo[$app];
		}
		$app_path = $this->findAppInDirectories($app);
		$info = new Info($app, $app_path);
		return $this->appInfo[$app] = $info;
	}
}
