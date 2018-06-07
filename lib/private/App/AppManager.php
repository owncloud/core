<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Christoph Schaefer <christophł@wolkesicher.de>
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\App;

use OC_App;
use OC\Installer;
use OCP\App\IAppManager;
use OCP\App\AppManagerException;
use OCP\App\ManagerEvent;
use OCP\Files;
use OCP\IAppConfig;
use OCP\ICacheFactory;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\IUser;
use OCP\IUserSession;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class AppManager implements IAppManager {

	/**
	 * Apps with these types can not be enabled for certain groups only
	 * @var string[]
	 */
	protected $protectedAppTypes = [
		'filesystem',
		'prelogin',
		'authentication',
		'logging',
		'prevent_group_restriction',
		'theme',
	];

	/** @var \OCP\IUserSession */
	private $userSession;
	/** @var \OCP\IAppConfig */
	private $appConfig;
	/** @var \OCP\IGroupManager */
	private $groupManager;
	/** @var \OCP\ICacheFactory */
	private $memCacheFactory;
	/** @var string[] $appId => $enabled */
	private $installedAppsCache;
	/** @var string[] */
	private $shippedApps;
	/** @var string[] */
	private $alwaysEnabled;
	/** @var EventDispatcherInterface */
	private $dispatcher;
	/** @var IConfig */
	private $config;

	/**
	 * Apps as 'appId' => [
	 *   'path' => '/app/path'
	 *   'url' => '/app/url'
	 * ]
	 * @var string[][]
	 */
	private $appDirs = [];

	/**
	 * @param IUserSession $userSession
	 * @param IAppConfig $appConfig
	 * @param IGroupManager $groupManager
	 * @param ICacheFactory $memCacheFactory
	 * @param EventDispatcherInterface $dispatcher
	 * @param IConfig $config
	 */
	public function __construct(IUserSession $userSession = null,
								IAppConfig $appConfig = null,
								IGroupManager $groupManager = null,
								ICacheFactory $memCacheFactory,
								EventDispatcherInterface $dispatcher,
								IConfig $config) {
		$this->userSession = $userSession;
		$this->appConfig = $appConfig;
		$this->groupManager = $groupManager;
		$this->memCacheFactory = $memCacheFactory;
		$this->dispatcher = $dispatcher;
		$this->config = $config;
	}

	/**
	 * @return string[] $appId => $enabled
	 */
	private function getInstalledAppsValues() {
		if (!$this->installedAppsCache) {
			$values = $this->appConfig->getValues(false, 'enabled');

			$alwaysEnabledApps = $this->getAlwaysEnabledApps();
			foreach ($alwaysEnabledApps as $appId) {
				$values[$appId] = 'yes';
			}

			$this->installedAppsCache = \array_filter($values, function ($value) {
				return $value !== 'no';
			});
			\ksort($this->installedAppsCache);
		}
		return $this->installedAppsCache;
	}

	/**
	 * List all installed apps
	 *
	 * @return string[]
	 */
	public function getInstalledApps() {
		return \array_keys($this->getInstalledAppsValues());
	}

	/**
	 * List all apps enabled for a user
	 *
	 * @param \OCP\IUser|null $user
	 * @return string[]
	 */
	public function getEnabledAppsForUser(IUser $user = null) {
		$apps = $this->getInstalledAppsValues();
		$appsForUser = \array_filter($apps, function ($enabled) use ($user) {
			return $this->checkAppForUser($enabled, $user);
		});
		return \array_keys($appsForUser);
	}

	/**
	 * Check if an app is enabled for user
	 *
	 * @param string $appId
	 * @param \OCP\IUser $user (optional) if not defined, the currently logged in user will be used
	 * @return bool
	 */
	public function isEnabledForUser($appId, $user = null) {
		if ($this->isAlwaysEnabled($appId)) {
			return true;
		}
		if ($user === null && $this->userSession !== null) {
			$user = $this->userSession->getUser();
		}
		$installedApps = $this->getInstalledAppsValues();
		if (isset($installedApps[$appId])) {
			return $this->checkAppForUser($installedApps[$appId], $user);
		} else {
			return false;
		}
	}

	/**
	 * @param string $enabled
	 * @param IUser $user
	 * @return bool
	 */
	private function checkAppForUser($enabled, $user) {
		if ($enabled === 'yes') {
			return true;
		} elseif ($user === null) {
			return false;
		} else {
			if (empty($enabled)) {
				return false;
			}

			$groupIds = \json_decode($enabled);

			if (!\is_array($groupIds)) {
				$jsonError = \json_last_error();
				\OC::$server->getLogger()->warning('AppManager::checkAppForUser - can\'t decode group IDs: ' . \print_r($enabled, true) . ' - json error code: ' . $jsonError, ['app' => 'lib']);
				return false;
			}

			$userGroups = $this->groupManager->getUserGroupIds($user);
			foreach ($userGroups as $groupId) {
				if (\array_search($groupId, $groupIds) !== false) {
					return true;
				}
			}
			return false;
		}
	}

	/**
	 * Check if an app is installed in the instance
	 *
	 * @param string $appId
	 * @return bool
	 */
	public function isInstalled($appId) {
		$installedApps = $this->getInstalledAppsValues();
		return isset($installedApps[$appId]);
	}

	/**
	 * Enable an app for every user
	 *
	 * @param string $appId
	 * @throws \Exception
	 */
	public function enableApp($appId) {
		if ($this->getAppPath($appId) === false) {
			throw new \Exception("$appId can't be enabled since it is not installed.");
		}

		if (!Installer::isInstalled($appId)) {
			Installer::installShippedApp($appId);
		}

		$this->canEnableTheme($appId);

		$this->installedAppsCache[$appId] = 'yes';
		$this->appConfig->setValue($appId, 'enabled', 'yes');
		$this->dispatcher->dispatch(ManagerEvent::EVENT_APP_ENABLE, new ManagerEvent(
			ManagerEvent::EVENT_APP_ENABLE, $appId
		));
		$this->clearAppsCache();
	}

	/**
	 * Do not allow more than one active app-theme
	 *
	 * @param $appId
	 * @throws AppManagerException
	 */
	protected function canEnableTheme($appId) {
		$info = $this->getAppInfo($appId);
		if (
			isset($info['types'])
			&& \is_array($info['types'])
			&& \in_array('theme', $info['types'])
		) {
			$apps = $this->getInstalledApps();
			foreach ($apps as $installedAppId) {
				if ($installedAppId === $appId) {
					continue;
				}
				if ($this->isTheme($installedAppId)) {
					throw new AppManagerException("$appId can't be enabled until $installedAppId is disabled.");
				}
			}
		}
	}

	/**
	 *  Wrapper for OC_App for easy mocking
	 *
	 * @param string $appId
	 * @return bool
	 */
	protected function isTheme($appId) {
		return \OC_App::isType($appId, 'theme');
	}

	/**
	 * Enable an app only for specific groups
	 *
	 * @param string $appId
	 * @param \OCP\IGroup[] $groups
	 * @throws \Exception if app can't be enabled for groups
	 */
	public function enableAppForGroups($appId, $groups) {
		$info = $this->getAppInfo($appId);
		if (!empty($info['types'])) {
			$protectedTypes = \array_intersect($this->protectedAppTypes, $info['types']);
			if (!empty($protectedTypes)) {
				throw new \Exception("$appId can't be enabled for groups.");
			}
		}

		if (!Installer::isInstalled($appId)) {
			Installer::installShippedApp($appId);
		}

		$groupIds = \array_map(function ($group) {
			/** @var \OCP\IGroup $group */
			return $group->getGID();
		}, $groups);
		$this->installedAppsCache[$appId] = \json_encode($groupIds);
		$this->appConfig->setValue($appId, 'enabled', \json_encode($groupIds));
		$this->dispatcher->dispatch(ManagerEvent::EVENT_APP_ENABLE_FOR_GROUPS, new ManagerEvent(
			ManagerEvent::EVENT_APP_ENABLE_FOR_GROUPS, $appId, $groups
		));
		$this->clearAppsCache();
	}

	/**
	 * Disable an app for every user
	 *
	 * @param string $appId
	 * @throws \Exception if app can't be disabled
	 */
	public function disableApp($appId) {
		if ($this->isAlwaysEnabled($appId)) {
			throw new \Exception("$appId can't be disabled.");
		}
		unset($this->installedAppsCache[$appId]);
		$this->appConfig->setValue($appId, 'enabled', 'no');
		$this->dispatcher->dispatch(ManagerEvent::EVENT_APP_DISABLE, new ManagerEvent(
			ManagerEvent::EVENT_APP_DISABLE, $appId
		));
		$this->clearAppsCache();
	}

	/**
	 * Clear the cached list of apps when enabling/disabling an app
	 */
	public function clearAppsCache() {
		$settingsMemCache = $this->memCacheFactory->create('settings');
		$settingsMemCache->clear('listApps');
	}

	/**
	 * Returns a list of apps that need upgrade
	 *
	 * @param array $ocVersion ownCloud version as array of version components
	 * @return array list of app info from apps that need an upgrade
	 *
	 * @internal
	 */
	public function getAppsNeedingUpgrade($ocVersion) {
		$appsToUpgrade = [];
		$apps = $this->getInstalledApps();
		foreach ($apps as $appId) {
			$appInfo = $this->getAppInfo($appId);
			$appDbVersion = $this->appConfig->getValue($appId, 'installed_version');
			if ($appDbVersion
				&& isset($appInfo['version'])
				&& \version_compare($appInfo['version'], $appDbVersion, '>')
				&& \OC_App::isAppCompatible($ocVersion, $appInfo)
			) {
				$appsToUpgrade[] = $appInfo;
			}
		}

		return $appsToUpgrade;
	}

	/**
	 * Returns the app information from "appinfo/info.xml".
	 *
	 * @param string $appId app id
	 *
	 * @return array app info
	 *
	 * @internal
	 */
	public function getAppInfo($appId) {
		$appInfo = \OC_App::getAppInfo($appId);
		if ($appInfo === null) {
			return null;
		}
		if (!isset($appInfo['version'])) {
			// read version from separate file
			$appInfo['version'] = \OC_App::getAppVersion($appId);
		}
		return $appInfo;
	}

	/**
	 * Returns a list of apps incompatible with the given version
	 *
	 * @param array $version ownCloud version as array of version components
	 *
	 * @return array list of app info from incompatible apps
	 *
	 * @internal
	 */
	public function getIncompatibleApps($version) {
		$apps = $this->getInstalledApps();
		$incompatibleApps = [];
		foreach ($apps as $appId) {
			$info = $this->getAppInfo($appId);
			if (!\OC_App::isAppCompatible($version, $info)) {
				$incompatibleApps[] = $info;
			}
		}
		return $incompatibleApps;
	}

	/**
	 * @inheritdoc
	 */
	public function isShipped($appId) {
		$this->loadShippedJson();
		return \in_array($appId, $this->shippedApps);
	}

	private function isAlwaysEnabled($appId) {
		$alwaysEnabled = $this->getAlwaysEnabledApps();
		return \in_array($appId, $alwaysEnabled);
	}

	private function loadShippedJson() {
		if ($this->shippedApps === null) {
			$shippedJson = \OC::$SERVERROOT . '/core/shipped.json';
			if (!\file_exists($shippedJson)) {
				throw new \Exception("File not found: $shippedJson");
			}
			$content = \json_decode(\file_get_contents($shippedJson), true);
			$this->shippedApps = $content['shippedApps'];
			$this->alwaysEnabled = $content['alwaysEnabled'];
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getAlwaysEnabledApps() {
		$this->loadShippedJson();
		return $this->alwaysEnabled;
	}

	/**
	 * @param string $package package path
	 * @param bool $skipMigrations whether to skip migrations, which would only install the code
	 * @return string|false app id or false in case of error
	 * @since 10.0
	 */
	public function installApp($package, $skipMigrations = false) {
		$appId = Installer::installApp([
			'source' => 'local',
			'path' => $package
		]);
		return $appId;
	}

	/**
	 * @param string $package
	 * @return mixed
	 * @since 10.0
	 */
	public function updateApp($package) {
		return Installer::updateApp([
			'source' => 'local',
			'path' => $package
		]);
	}

	/**
	 * Returns the list of all apps, enabled and disabled
	 *
	 * @return string[]
	 * @since 10.0
	 */
	public function getAllApps() {
		return $this->appConfig->getApps();
	}

	/**
	 * @param string $path
	 * @return string[] app info
	 */
	public function readAppPackage($path) {
		$data = [
			'source' => 'path',
			'path' => $path,
		];
		list($appCodeDir, $path) = Installer::downloadApp($data);
		$appInfo = Installer::checkAppsIntegrity($data, $appCodeDir, $path);
		Files::rmdirr($appCodeDir);
		return $appInfo;
	}

	/**
	 * Indicates if app installation is supported. Usually it is but in certain
	 * environments it is disallowed because of hardening. In a clustered setup
	 * apps need to be installed on each cluster node which is out of scope of
	 * ownCloud itself.
	 *
	 * @return bool
	 * @since 10.0.3
	 */
	public function canInstall() {
		if ($this->config->getSystemValue('operation.mode', 'single-instance') !== 'single-instance') {
			return false;
		}

		$appsFolder = OC_App::getInstallPath();
		return $appsFolder !== null && \is_writable($appsFolder) && \is_readable($appsFolder);
	}

	/**
	 * Get the absolute path to the directory for the given app.
	 * If the app exists in multiple directories, the most recent version is taken.
	 * Returns false if not found
	 *
	 * @param string $appId
	 * @return string|false
	 * @since 10.0.5
	 */
	public function getAppPath($appId) {
		if (\trim($appId) === '') {
			return false;
		}
		if (($appRoot = $this->findAppInDirectories($appId)) !== false) {
			return $appRoot['path'];
		}
		return false;
	}

	/**
	 * Get the HTTP Web path to the app directory for the given app, relative to the ownCloud webroot.
	 * If the app exists in multiple directories, web path to the most recent version is taken.
	 * Returns false if not found
	 *
	 * @param string $appId
	 * @return string|false
	 * @since 10.0.5
	 */
	public function getAppWebPath($appId) {
		if (($appRoot = $this->findAppInDirectories($appId)) !== false) {
			$ocWebRoot = $this->getOcWebRoot();
			// consider all relative ../ in the app web path as an adjustment
			// for oC web root
			while (\strpos($appRoot['url'], '../') === 0) {
				$appRoot['url'] = \substr($appRoot['url'], 3);
				$ocWebRoot = \dirname($ocWebRoot);
			}
			$trimmedOcWebRoot = \rtrim($ocWebRoot, '/');
			$trimmedAppRoot = \ltrim($appRoot['url'], '/');
			return "$trimmedOcWebRoot/$trimmedAppRoot";
		}
		return false;
	}

	/**
	 * Search for an app in all app directories
	 * Returns an app directory as an array with keys
	 *  'path' - a path to the app with no trailing slash
	 *  'url' - a web path to the app with no trailing slash
	 * both are relative to OC root directory and webroot
	 *
	 * @param string $appId
	 * @return false|string[]
	 */
	protected function findAppInDirectories($appId) {
		$sanitizedAppId = \OC_App::cleanAppId($appId);
		if ($sanitizedAppId !== $appId) {
			return false;
		}

		if (!isset($this->appDirs[$appId])) {
			$possibleAppRoots = [];
			foreach ($this->getAppRoots() as $appRoot) {
				if (\is_dir($appRoot['path'] . '/' . $appId)) {
					$possibleAppRoots[] = $appRoot;
				}
			}

			$versionToLoad = [];
			foreach ($possibleAppRoots as $possibleAppRoot) {
				$version = $this->getAppVersionByPath($possibleAppRoot['path'] . '/' . $appId);
				if (empty($versionToLoad) || \version_compare($version, $versionToLoad['version'], '>')) {
					$versionToLoad = \array_merge($possibleAppRoot, ['version' => $version]);
					$versionToLoad['path'] .= '/' . $appId;
					$versionToLoad['url'] .= '/' . $appId;
				}
			}

			if (empty($versionToLoad)) {
				return false;
			}
			$this->saveAppPath($appId, $versionToLoad);
		}
		return $this->appDirs[$appId];
	}

	/**
	 * Save app path and webPath to internal cache
	 * @param string $appId
	 * @param string[] $appData
	 */
	protected function saveAppPath($appId, $appData) {
		$this->appDirs[$appId] = $appData;
	}

	/**
	 * Get OC web root
	 * Wrapper for easy mocking
	 * @return string
	 */
	protected function getOcWebRoot() {
		return \OC::$WEBROOT;
	}

	/**
	 * Get apps roots as an array of path and url
	 * Wrapper for easy mocking
	 * @return string[][]
	 */
	protected function getAppRoots() {
		return \OC::$APPSROOTS;
	}

	/**
	 * Get app's version based on it's path
	 * Wrapper for easy mocking
	 *
	 * @param string $path
	 * @return string
	 */
	protected function getAppVersionByPath($path) {
		return \OC_App::getAppVersionByPath($path);
	}
}
