<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace Owncloud\Updater\Utils;

use \Owncloud\Updater\Console\Application;

/**
 * Class Locator
 *
 * @package Owncloud\Updater\Utils
 */
class Locator {
	/**
	 * absolute path to ownCloud root
	 * @var string
	 */
	protected $ownCloudRootPath;

	/**
	 * absolute path to updater root
	 * @var string
	 */
	protected $updaterRootPath;

	/**
	 *
	 * @param string $baseDir
	 */
	public function __construct($baseDir) {
		$this->updaterRootPath = $baseDir;
		$this->ownCloudRootPath = \dirname($baseDir);
	}

	/**
	 * @return string
	 */
	public function getOwnCloudRootPath() {
		return $this->ownCloudRootPath;
	}

	/**
	 * expected items in the core
	 * @return string[]
	 */
	public function getRootDirContent() {
		return [
			"3rdparty",
			"config",
			"core",
			"l10n",
			"lib",
			"ocm-provider",
			"ocs",
			"ocs-provider",
			"resources",
			"settings",
			".htaccess",
			".mailmap",
			".tag",
			".user.ini",
			"AUTHORS",
			"CHANGELOG.md",
			"console.php",
			"COPYING",
			"cron.php",
			"db_structure.xml",
			"index.html",
			"index.php",
			"indie.json",
			"occ",
			"public.php",
			"remote.php",
			"robots.txt",
			"status.php",
			"version.php",
		];
	}

	/**
	 * @return array
	 */
	public function getUpdaterContent() {
		return [
			'app',
			'application.php',
			'box.json',
			'composer.json',
			'composer.lock',
			'CHANGELOG.md',
			'CONTRIBUTING.md',
			'COPYING-AGPL',
			'index.php',
			'pub',
			'src',
			'vendor',
			'README.md',
			'.travis.yml',
			'.scrutinizer.yml',
			'nbproject',
		];
	}

	/**
	 * Get all files and directories in the OC root dir using signature.json as a source
	 *
	 * @param string $basePath
	 *
	 * @return array
	 */
	public function getRootDirItemsFromSignature($basePath) {
		$signature = $this->getSignature($basePath);
		$items = [];
		if (isset($signature['hashes'])) {
			$allItems = \array_keys($signature['hashes']);
			foreach ($allItems as $k => $v) {
				// Get the part of the string before the first slash or entire string if there is no slash
				$allItems[$k] = \strtok($v, '/');
			}
			$items = \array_unique($allItems);
		}
		return $items;
	}

	/**
	 * Absolute path to core root dir content
	 * @return array
	 */
	public function getRootDirItems() {
		$items = $this->getRootDirContent();
		$items = \array_map(
			function ($item) {
				return $this->ownCloudRootPath . "/" . $item;
			},
			$items
		);
		return $items;
	}

	/**
	 * Absolute path
	 * @return string
	 * @throws \Exception
	 */
	public function getDataDir() {
		$container = Application::$container;
		if (isset($container['utils.configReader']) && $container['utils.configReader']->getIsLoaded()) {
			return $container['utils.configReader']->getByPath('system.datadirectory');
		}

		// Fallback case
		include $this->getPathToConfigFile();
		if (isset($CONFIG['datadirectory'])) {
			return $CONFIG['datadirectory'];
		}

		// Something went wrong
		throw new \Exception('Unable to detect datadirectory');
	}

	/**
	 * Absolute path to updater root dir
	 * @return string
	 */
	public function getUpdaterBaseDir() {
		return $this->getDataDir() . '/updater-data';
	}

	/**
	 * Absolute path to create a core and apps backups
	 * @return string
	 */
	public function getCheckpointDir() {
		return $this->getUpdaterBaseDir() . '/checkpoint';
	}

	/**
	 * Absolute path to store downloaded packages
	 * @return string
	 */
	public function getDownloadBaseDir() {
		return $this->getUpdaterBaseDir() . '/download';
	}

	/**
	 * Absolute path to a temporary directory
	 * to extract downloaded packages into
	 * @return string
	 */
	public function getExtractionBaseDir() {
		return $this->getUpdaterBaseDir() . "/_oc_upgrade";
	}

	/**
	 *
	 * @return string
	 */
	public function getPathToOccFile() {
		return $this->ownCloudRootPath . '/occ';
	}

	/**
	 *
	 * @return array
	 */
	public function getInstalledVersion() {
		include $this->getPathToVersionFile();

		/** @var $OC_Version array */
		return $OC_Version; /* @phan-suppress-current-line PhanUndeclaredVariable */
	}

	/**
	 *
	 * @return string
	 */
	public function getChannelFromVersionsFile() {
		include $this->getPathToVersionFile();

		/** @var $OC_Channel string */
		return $OC_Channel; /* @phan-suppress-current-line PhanUndeclaredVariable */
	}

	/**
	 *
	 * @return string
	 */
	public function getBuild() {
		include $this->getPathToVersionFile();

		/** @var $OC_Build string */
		return $OC_Build; /* @phan-suppress-current-line PhanUndeclaredVariable */
	}

	/**
	 * @return string
	 */
	public function getSecretFromConfig() {
		include $this->getPathToConfigFile();
		if (isset($CONFIG['updater.secret'])) {
			return $CONFIG['updater.secret'];
		}
		return '';
	}

	/**
	 * @param string $filePostfix
	 * @return array
	 */
	public function getPathtoConfigFiles($filePostfix = 'config.php') {
		// Only config.php for now
		return [
			$this->ownCloudRootPath . '/config/' . $filePostfix
		];
	}

	/**
	 * @return string
	 */
	public function getPathToConfigFile() {
		return $this->ownCloudRootPath . '/config/config.php';
	}

	/**
	 *
	 * @return string
	 */
	public function getPathToVersionFile() {
		return $this->ownCloudRootPath . '/version.php';
	}

	/**
	 * @param string $rootPath
	 *
	 * @return array|mixed
	 */
	private function getSignature($rootPath) {
		$signature = [];
		$signaturePath = $rootPath . '/core/signature.json';
		if (\is_file($signaturePath)) {
			$signature = \json_decode(\file_get_contents($signaturePath), true);
			if (!\is_array($signature)) {
				$signature = [];
			}
		}
		return $signature;
	}
}
