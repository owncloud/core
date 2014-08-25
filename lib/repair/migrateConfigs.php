<?php
/**
 * Copyright (c) 2014 Vincent Petry <pvince81@owncloud.com>
 * Copyright (c) 2014 Jörn Dreyer jfd@owncloud.com
 * Copyright (c) 2014 Clark Tomlinson clark@owncloud.com
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Repair;

use OC;
use OC\Hooks\BasicEmitter;
use OCP\IConfig;
use OCP\Util;

class MigrateConfigs extends BasicEmitter implements \OC\RepairStep {


	/**
	 * @var Config
	 */
	private $config;

	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	public function getName() {
		return 'Migrate Config Values';
	}

	public function fixThirdPartyRoot() {
		$currentConfig = $this->config->getSystemValue('3rdpartyroot', false);
		if (!$currentConfig) {
			return false;
		}
		
		$this->config->setSystemValue('3rdpartyroot', $currentConfig . '/3rdparty');
	}

	public function fixThirdPartyWebRoot() {
		$currentConfig = $this->config->getSystemValue('3rdpartyurl', false);
		if (!$currentConfig) {
			return false;
		}

		$this->config->setSystemValue('3rdpartyurl', $currentConfig . '/3rdparty');
	}


	/**
	 * Fix config values
	 */
	public function run() {
		$installedVersion = $this->config->getSystemValue('version', '0.0.0');
		$currentVersion = implode('.', Util::getVersion());
		if (version_compare($currentVersion, $installedVersion, '>')) {
			$this->fixThirdPartyRoot();
			$this->fixThirdPartyWebRoot();
		}
	}
}

