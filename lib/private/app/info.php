<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\App;

use OCP\App\IInfo as InfoInterface;

class Info implements InfoInterface {
	protected $appId;
	protected $appPath;

	/**
	 * @param string $appid the id of the app
	 * @param string[] $appPath an array containing info of the app directory:
	 * 		{"path" => the full path of the app directory, "url" => how to reach the app directory from the web}
	 */
	public function __construct($appid, $appPath) {
		$this->appId = $appid;
		$this->appPath = $appPath;
	}

	/**
	 * @brief Get the name of the app.
	 *
	 * @return string
	 */
	public function getName() {
		$appData = $this->getData();
		return isset($appData['name']) ? $appData['name'] : null;
	}

	/**
	 * @brief Get the last version of the app. Either from appinfo/version or from appinfo/info.xml
	 *
	 * @return string for example '1.2.45'
	 */
	public function getVersion() {
		$file = $this->getDirectory().'/appinfo/version';
		if(is_file($file) && $version = trim(file_get_contents($file))) {
			return $version;
		} else {
			$appData = $this->getData();
			return isset($appData['version']) ? $appData['version'] : '';
		}
	}

	/**
	 * @brief Get the directory for the given app.
	 * If the app is defined in multiple directories, the first one is taken. (false if not found)
	 *
	 * @return string
	 */
	public function getDirectory() {
		return $this->appPath['path'].'/'.$this->appId;
	}

	/**
	 * @brief Get the web path of the app.
	 * If the app is defined in multiple directories, the first one is taken. (false if not found)
	 *
	 * @return string
	 */
	public function getWebPath() {
		return \OC::$WEBROOT.$this->appPath['url'].'/'.$this->appId; // FIXME: remove WEBROOT
	}

	/**
	 * @internal add getter function instead
	 */
	public function getData() {
		return \OC_App::getAppInfo($this->appId); // TODO: refactor
	}
}
