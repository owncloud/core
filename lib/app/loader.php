<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\App;

use OCP\App\Loader as LoaderInterface;

class Loader implements LoaderInterface {
	/**
	 * @var $manager \OC\App\Manager
	 */
	protected $manager;
	protected $loadedApps = array();
	protected $checkedApps = array();

	public function __construct(Manager $manager) {
		$this->manager = $manager;
	}

	/**
	 * @brief load all enabled apps
	 *
	 * This function tries to load all enabled apps
	 */
	public function loadAll() {
		$apps = $this->manager->getEnabledApps();
		$this->loadSet($apps);
	}

	/**
	 * @brief load all enabled apps of $types
	 * @param array $types
	 *
	 * Only apps of $types will be loaded
	 */
	public function loadTypes(array $types) {
		// Load the enabled apps here
		$apps = $this->manager->getEnabledApps();
		$appsToLoad = array();
		foreach( $apps as $app ) {
			if($this->manager->isType($app, $types)) {
				$appsToLoad[] = $app;
			}
		}
		$this->loadSet($appsToLoad);
	}

	/**
	 * @brief load a set of apps
	 * @param array $apps
	 *
	 * All $apps will be loaded
	 */
	protected function loadSet(array $apps) {
		// prevent app.php from printing output
		ob_start();
		foreach( $apps as $app ) {
			$this->load($app);
		}
		ob_end_clean();
	}

	/**
	 * load a single app
	 * @param string $app
	 */
	public function load( $app ) {
		if(!in_array($app, $this->loadedApps)
			&& is_file($appFile = $this->manager->getInfo($app)->getDirectory().'/appinfo/app.php'))
		{
			$this->checkUpgrade($app);
			require_once $appFile;
			$this->loadedApps[] = $app;
		}
	}

	protected function checkUpgrade($app) {
		if (in_array($app, $this->checkedApps)) {
			return;
		}
		$this->checkedApps[] = $app;
		try {
			$info = $this->manager->getInfo($app);
		} catch(OutOfBoundsException $e) {
			return;
		}
		$currentVersion = $info->getVersion();
		if ($currentVersion) {
			$versions = $this->manager->getInstalledVersions();
			$installedVersion = $versions[$app];
			if (version_compare($currentVersion, $installedVersion, '>')) {
				// TODO: emit signal
			}
		}
	}
}