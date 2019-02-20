<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @author Borjan Tchakaloff <borjan@tchakaloff.fr>
 * @author Brice Maron <brice@bmaron.net>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Felix Moeller <mail@felixmoeller.de>
 * @author Frank Karlitschek <frank@karlitschek.de>
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Kamil Domanski <kdomanski@kdemail.net>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Markus Goetz <markus@woboq.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Philipp Schaffrath <github@philippschaffrath.de>
 * @author ppaysant <patrick.paysant@linagora.com>
 * @author RealRancor <Fisch.666@gmx.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Sam Tuke <mail@samtuke.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Thomas Tanghus <thomas@tanghus.net>
 * @author Tom Needham <tom@owncloud.com>
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
use OC\App\DependencyAnalyzer;
use OC\App\Platform;
use OC\Installer;
use OC\Repair;

/**
 * This class manages the apps. It allows them to register and integrate in the
 * ownCloud ecosystem. Furthermore, this class is responsible for installing,
 * upgrading and removing apps.
 */
class OC_App {
	private static $adminForms = [];
	private static $personalForms = [];
	private static $appTypes = [];
	private static $loadedApps = [];
	private static $loadedTypes = [];
	private static $altLogin = [];
	const officialApp = 200;
	const approvedApp = 100;

	/**
	 * clean the appId
	 *
	 * @param string|boolean $app AppId that needs to be cleaned
	 * @return string
	 */
	public static function cleanAppId($app) {
		return \str_replace(['\0', '/', '\\', '..'], '', $app);
	}

	/**
	 * Check if an app is loaded
	 *
	 * @param string $app
	 * @return bool
	 */
	public static function isAppLoaded($app) {
		return \in_array($app, self::$loadedApps, true);
	}

	/**
	 * loads all apps
	 *
	 * @param string[] | string | null $types
	 * @return bool
	 *
	 * This function walks through the ownCloud directory and loads all apps
	 * it can find. A directory contains an app if the file /appinfo/info.xml
	 * exists.
	 *
	 * if $types is set, only apps of those types will be loaded
	 * @throws \OC\HintException
	 * @throws \OC\NeedsUpdateException
	 * @throws \OC\ServerNotAvailableException
	 */
	public static function loadApps($types = null) {
		if (\is_array($types) && !\array_diff($types, self::$loadedTypes)) {
			return true;
		}
		if (\OC::$server->getSystemConfig()->getValue('maintenance', false)) {
			return false;
		}
		// Load the enabled apps here
		$apps = self::getEnabledApps();

		// Add each apps' folder as allowed class path
		foreach ($apps as $app) {
			if (self::isAppLoaded($app)) {
				continue;
			}
			$path = self::getAppPath($app);
			if ($path !== false) {
				self::registerAutoloading($app, $path);
			}
		}

		// prevent app.php from printing output
		\ob_start();
		foreach ($apps as $app) {
			if (($types === null or self::isType($app, $types)) && !\in_array($app, self::$loadedApps, true)) {
				self::loadApp($app);
			}
		}
		\ob_end_clean();

		if (\is_array($types)) {
			self::$loadedTypes = \array_merge(self::$loadedTypes, $types);
		}

		\OC_Hook::emit('OC_App', 'loadedApps');
		return true;
	}

	/**
	 * load a single app
	 *
	 * @param string $app
	 * @param bool $checkUpgrade whether an upgrade check should be done
	 * @throws \OC\NeedsUpdateException
	 */
	public static function loadApp($app, $checkUpgrade = true) {
		self::$loadedApps[] = $app;
		$appPath = self::getAppPath($app);
		if ($appPath === false) {
			return;
		}

		// in case someone calls loadApp() directly
		self::registerAutoloading($app, $appPath);

		self::enableThemeIfApplicable($app);

		if (\is_file($appPath . '/appinfo/app.php')) {
			\OC::$server->getEventLogger()->start('load_app_' . $app, 'Load app: ' . $app);
			if ($checkUpgrade and self::shouldUpgrade($app)) {
				throw new \OC\NeedsUpdateException();
			}
			self::requireAppFile($app);
			if (self::isType($app, ['authentication'])) {
				// since authentication apps affect the "is app enabled for group" check,
				// the enabled apps cache needs to be cleared to make sure that the
				// next time getEnableApps() is called it will also include apps that were
				// enabled for groups
				self::$enabledAppsCache = [];
			}
			\OC::$server->getEventLogger()->end('load_app_' . $app);
		}
	}

	/**
	 * Enables the app as a theme if it has the type "theme"
	 *
	 * @param string $app
	 * @throws \OCP\AppFramework\QueryException
	 */
	private static function enableThemeIfApplicable($app) {
		if (self::isType($app, 'theme')) {
			/** @var \OCP\Theme\IThemeService $themeService */
			$themeService = \OC::$server->query('ThemeService');
			$themeService->setAppTheme($app);
		}
	}

	/**
	 * @internal
	 * @param string $app
	 * @param string $path
	 */
	public static function registerAutoloading($app, $path) {
		// Register on PSR-4 composer autoloader
		$appNamespace = \OC\AppFramework\App::buildAppNamespace($app);
		\OC::$composerAutoloader->addPsr4($appNamespace . '\\', $path . '/lib/', true);
		if (\defined('PHPUNIT_RUN')) {
			\OC::$composerAutoloader->addPsr4($appNamespace . '\\Tests\\', $path . '/tests/', true);
		}

		// Register on legacy autoloader
		\OC::$loader->addValidRoot($path);
	}

	/**
	 * Load app.php from the given app
	 *
	 * @param string $app app name
	 * @throws Exception
	 */
	private static function requireAppFile($app) {
		try {
			// encapsulated here to avoid variable scope conflicts
			require_once $app . '/appinfo/app.php';
		} catch (Exception $ex) {
			\OC::$server->getLogger()->logException($ex);
			$blacklist = \OC::$server->getAppManager()->getAlwaysEnabledApps();
			if (!\in_array($app, $blacklist, true)) {
				if (!self::isType($app, ['authentication', 'filesystem'])) {
					\OC::$server->getLogger()->warning('Could not load app "' . $app . '", it will be disabled', ['app' => 'core']);
					self::disable($app);
				} else {
					\OC::$server->getLogger()->warning('Could not load app "' . $app . '", see exception above', ['app' => 'core']);
				}
			}
			throw $ex;
		}
	}

	/**
	 * check if an app is of a specific type
	 *
	 * @param string $app
	 * @param string|array $types
	 * @return bool
	 */
	public static function isType($app, $types) {
		if (\is_string($types)) {
			$types = [$types];
		}
		$appTypes = self::getAppTypes($app);
		foreach ($types as $type) {
			if (\in_array($type, $appTypes, true)) {
				return true;
			}
		}
		return false;
	}

	/**
	 * get the types of an app
	 *
	 * @param string $app
	 * @return array
	 */
	private static function getAppTypes($app) {
		//load the cache
		if (\count(self::$appTypes) === 0) {
			self::$appTypes = \OC::$server->getAppConfig()->getValues(false, 'types');
		}

		if (isset(self::$appTypes[$app])) {
			return \explode(',', self::$appTypes[$app]);
		}

		return [];
	}

	/**
	 * read app types from info.xml and cache them in the database
	 */
	public static function setAppTypes($app) {
		$appData = self::getAppInfo($app);
		if (!\is_array($appData)) {
			return;
		}

		if (isset($appData['types'])) {
			$appTypes = \implode(',', $appData['types']);
		} else {
			$appTypes = '';
		}

		\OC::$server->getAppConfig()->setValue($app, 'types', $appTypes);
	}

	/**
	 * check if app is shipped
	 *
	 * @param string $appId the id of the app to check
	 * @return bool
	 *
	 * Check if an app that is installed is a shipped app or installed from the appstore.
	 */
	public static function isShipped($appId) {
		return \OC::$server->getAppManager()->isShipped($appId);
	}

	/* Get all apps that are part of the tar file
	 * @return string[]
	 * @since 10.2.0
	 */
	public static function getAppsInTar() {
		return \OC::$server->getAppManager()->getAppsInTar();
	}

	/**
	 * get all enabled apps
	 */
	protected static $enabledAppsCache = [];

	/**
	 * Returns apps enabled for the current user.
	 *
	 * @param bool $forceRefresh whether to refresh the cache
	 * @param bool $all whether to return apps for all users, not only the
	 * currently logged in one
	 * @return string[]
	 */
	public static function getEnabledApps($forceRefresh = false, $all = false) {
		if (!\OC::$server->getSystemConfig()->getValue('installed', false)) {
			return [];
		}
		// in incognito mode or when logged out, $user will be false,
		// which is also the case during an upgrade
		$appManager = \OC::$server->getAppManager();
		if ($all) {
			$user = null;
		} else {
			$user = \OC::$server->getUserSession()->getUser();
		}

		if ($user === null) {
			$apps = $appManager->getInstalledApps();
		} else {
			$apps = $appManager->getEnabledAppsForUser($user);
		}
		$apps = \array_filter($apps, function ($app) {
			return $app !== 'files';//we add this manually
		});
		\sort($apps);
		\array_unshift($apps, 'files');
		return $apps;
	}

	/**
	 * checks whether or not an app is enabled
	 *
	 * @param string $app app
	 * @return bool
	 *
	 * This function checks whether or not an app is enabled.
	 */
	public static function isEnabled($app) {
		return \OC::$server->getAppManager()->isEnabledForUser($app);
	}

	/**
	 * enables an app
	 *
	 * @param mixed $app app
	 * @param array $groups (optional) when set, only these groups will have access to the app
	 * @throws \Exception
	 * @return void
	 *
	 * This function set an app as enabled in appconfig.
	 */
	public static function enable($app, $groups = null) {
		self::$enabledAppsCache = []; // flush

		// check for required dependencies
		$config = \OC::$server->getConfig();
		$l = \OC::$server->getL10N('core');
		$info = self::getAppInfo($app);
		if ($info === null) {
			throw new \Exception("$app can't be enabled since it is not installed.");
		}

		self::checkAppDependencies($config, $l, $info);

		$appManager = \OC::$server->getAppManager();
		if ($groups !== null) {
			$groupManager = \OC::$server->getGroupManager();
			$groupsList = [];
			foreach ($groups as $group) {
				$groupItem = $groupManager->get($group);
				if ($groupItem instanceof \OCP\IGroup) {
					$groupsList[] = $groupManager->get($group);
				}
			}
			$appManager->enableAppForGroups($app, $groupsList);
		} else {
			$appManager->enableApp($app);
		}
	}

	/**
	 * @param string $app
	 * @return bool
	 * @throws \OCP\App\AppAlreadyInstalledException
	 */
	public static function removeApp($app) {
		if (self::isShipped($app)) {
			return false;
		}

		return Installer::removeApp($app);
	}

	/**
	 * This function set an app as disabled in appconfig.
	 *
	 * @param string $app app
	 * @throws Exception
	 */
	public static function disable($app) {
		// flush
		self::$enabledAppsCache = [];

		// run uninstall steps
		$appData = self::getAppInfo($app);
		if ($appData !== null) {
			self::executeRepairSteps($app, $appData['repair-steps']['uninstall']);
		}

		// emit disable hook - needed anymore ?
		\OC_Hook::emit('OC_App', 'pre_disable', ['app' => $app]);

		// finally disable it
		$appManager = \OC::$server->getAppManager();
		$appManager->disableApp($app);
	}

	/**
	 * Returns the Settings Navigation
	 *
	 * @return string[]
	 *
	 * This function returns an array containing all settings pages added. The
	 * entries are sorted by the key 'order' ascending.
	 */
	public static function getSettingsNavigation() {
		$l = \OC::$server->getL10N('lib');
		$urlGenerator = \OC::$server->getURLGenerator();

		$settings = [];
		// by default, settings only contain the help menu
		if (OC_Util::getEditionString() === OC_Util::EDITION_COMMUNITY &&
			\OC::$server->getSystemConfig()->getValue('knowledgebaseenabled', true) == true
		) {
			$settings = [
				[
					'id' => 'help',
					'order' => 1000,
					'href' => $urlGenerator->linkToRoute('settings_help'),
					'name' => $l->t('Help'),
					'icon' => $urlGenerator->imagePath('settings', 'help.svg')
				]
			];
		}

		// if the user is logged-in
		if (OC_User::isLoggedIn()) {
			// personal menu
			$settings[] = [
				'id' => 'settings',
				'order' => 1,
				'href' => $urlGenerator->linkToRoute('settings.SettingsPage.getPersonal'),
				'name' => $l->t('Settings'),
				'icon' => $urlGenerator->imagePath('settings', 'admin.svg')
			];
		}

		return self::proceedNavigation($settings);
	}

	// This is private as well. It simply works, so don't ask for more details
	private static function proceedNavigation($list) {
		$activeApp = OC::$server->getNavigationManager()->getActiveEntry();
		foreach ($list as &$navEntry) {
			if ($navEntry['id'] == $activeApp) {
				$navEntry['active'] = true;
			} else {
				$navEntry['active'] = false;
			}
		}
		unset($navEntry);

		\usort($list, function ($a, $b) {
			if ($a['order'] == $b['order']) {
				return 0;
			}

			if ($a['order'] < $b['order']) {
				return -1;
			}

			return 1;
		});

		return $list;
	}

	/**
	 * Get the path where to install apps
	 *
	 * @return string|null
	 */
	public static function getInstallPath() {
		foreach (OC::$APPSROOTS as $dir) {
			if (isset($dir['writable']) && $dir['writable'] === true) {
				return $dir['path'];
			}
		}

		\OCP\Util::writeLog('core', 'No application directories are marked as writable.', \OCP\Util::ERROR);
		return null;
	}

	/**
	 * Get the directory for the given app.
	 * If the app exists in multiple directories, the most recent version is taken.
	 * (false if not found)
	 *
	 * @param string $appId
	 * @return string|false
	 */
	public static function getAppPath($appId) {
		return \OC::$server->getAppManager()->getAppPath($appId);
	}

	/**
	 * Get the web path for the given app.
	 * If the app exists in multiple directories, the most recent version is taken.
	 * (false if not found)
	 *
	 * @param string $appId
	 * @return string|false
	 */
	public static function getAppWebPath($appId) {
		return \OC::$server->getAppManager()->getAppWebPath($appId);
	}

	/**
	 * check if an app's directory is writable
	 *
	 * @param string $appId
	 * @return bool
	 */
	public static function isAppDirWritable($appId) {
		$path = self::getAppPath($appId);
		return ($path !== false) ? \is_writable($path) : false;
	}

	/**
	 * get the last version of the app from appinfo/info.xml
	 *
	 * @param string $appId
	 * @return string
	 * @deprecated use \OC::$server->getAppManager()->getAppInfo($appId)
	 */
	public static function getAppVersion($appId) {
		$info = \OC::$server->getAppManager()->getAppInfo($appId);
		if (isset($info['version'])) {
			return $info['version'];
		}
		return '0';
	}

	/**
	 * Read all app metadata from the info.xml file
	 *
	 * @param string $appId id of the app or the path of the info.xml file
	 * @param bool $path
	 * @return array|null
	 * @throws Exception
	 * @note all data is read from info.xml, not just pre-defined fields
	 * @deprecated use \OC::$server->getAppManager()->getAppInfo($appId)
	 */
	public static function getAppInfo($appId, $path = false) {
		/** @var \OC\App\AppManager $am */
		$am = \OC::$server->getAppManager();
		if ($path) {
			return $am->getAppInfoByPath($appId);
		}
		return $am->getAppInfo($appId);
	}

	/**
	 * Returns the navigation
	 *
	 * @return array
	 *
	 * This function returns an array containing all entries added. The
	 * entries are sorted by the key 'order' ascending. Additional to the keys
	 * given for each app the following keys exist:
	 *   - active: boolean, signals if the user is on this navigation entry
	 */
	public static function getNavigation() {
		$entries = OC::$server->getNavigationManager()->getAll();
		return self::proceedNavigation($entries);
	}

	/**
	 * get the id of loaded app
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getCurrentApp() {
		$request = \OC::$server->getRequest();
		$script = \substr($request->getScriptName(), \strlen(OC::$WEBROOT) + 1);
		$topFolder = \substr($script, 0, \strpos($script, '/'));
		if (empty($topFolder)) {
			$path_info = $request->getPathInfo();
			if ($path_info) {
				$topFolder = \substr($path_info, 1, \strpos($path_info, '/', 1) - 1);
			}
		}
		if ($topFolder == 'apps') {
			$length = \strlen($topFolder);
			return \substr($script, $length + 1, \strpos($script, '/', $length + 1) - $length - 1);
		}

		return $topFolder;
	}

	/**
	 * @param string $type
	 * @return array
	 */
	public static function getForms($type) {
		$forms = [];
		switch ($type) {
			case 'admin':
				$source = self::$adminForms;
				break;
			case 'personal':
				$source = self::$personalForms;
				break;
			default:
				return [];
		}
		foreach ($source as $form) {
			$page = include $form['page'];
			$forms[] = [
				'appId' => $form['appId'],
				'page' => $page,
			];
		}
		return $forms;
	}

	/**
	 * register an admin form to be shown
	 *
	 * @param string $app
	 * @param string $page
	 * @deprecated Register settings panels in info.xml
	 */
	public static function registerAdmin($app, $page) {
		self::$adminForms[] = [
			'appId' => $app,
			'page' => $app . '/' . $page . '.php',
		];
	}

	/**
	 * register a personal form to be shown
	 * @param string $app
	 * @param string $page
	 * @deprecated Register settings panels in info.xml
	 */
	public static function registerPersonal($app, $page) {
		self::$personalForms[] = [
			'appId' => $app,
			'page' => $app . '/' . $page . '.php',
		];
	}

	/**
	 * @param array $entry
	 */
	public static function registerLogIn(array $entry) {
		self::$altLogin[] = $entry;
	}

	/**
	 * @return array
	 */
	public static function getAlternativeLogIns() {
		return self::$altLogin;
	}

	/**
	 * get a list of all apps in the apps folder
	 *
	 * @return array an array of app names (string IDs)
	 * @todo: change the name of this method to getInstalledApps, which is more accurate
	 */
	public static function getAllApps() {
		$apps = [];

		foreach (OC::$APPSROOTS as $apps_dir) {
			if (!\is_readable($apps_dir['path'])) {
				\OCP\Util::writeLog('core', 'unable to read app folder : ' . $apps_dir['path'], \OCP\Util::WARN);
				continue;
			}
			$dh = \opendir($apps_dir['path']);

			if (\is_resource($dh)) {
				while (($file = \readdir($dh)) !== false) {
					if ($file[0] != '.' and \is_dir($apps_dir['path'] . '/' . $file) and \is_file($apps_dir['path'] . '/' . $file . '/appinfo/info.xml')) {
						$apps[] = $file;
					}
				}
			}
		}

		return $apps;
	}

	/**
	 * List all apps, this is used in apps.php
	 *
	 * @return array
	 * @throws Exception
	 */
	public static function listAllApps() {
		$installedApps = self::getAllApps();

		//TODO which apps do we want to blacklist and how do we integrate
		// blacklisting with the multi apps folder feature?

		//we don't want to show configuration for these
		$blacklist = \OC::$server->getAppManager()->getAlwaysEnabledApps();
		$appList = [];
		$urlGenerator = \OC::$server->getURLGenerator();

		foreach ($installedApps as $app) {
			if (!\in_array($app, $blacklist, true)) {
				$info = self::getAppInfo($app);
				if (!\is_array($info)) {
					\OCP\Util::writeLog('core', 'Could not read app info file for app "' . $app . '"', \OCP\Util::ERROR);
					continue;
				}

				if (!isset($info['name'])) {
					\OCP\Util::writeLog('core', 'App id "' . $app . '" has no name in appinfo', \OCP\Util::ERROR);
					continue;
				}

				$enabled = \OC::$server->getAppConfig()->getValue($app, 'enabled', 'no');
				$info['groups'] = null;
				if ($enabled === 'yes') {
					$active = true;
				} elseif ($enabled === 'no') {
					$active = false;
				} else {
					$active = true;
					$info['groups'] = $enabled;
				}

				$info['active'] = $active;

				if (self::isShipped($app)) {
					$info['internal'] = true;
					$info['level'] = self::officialApp;
					$info['removable'] = false;
				} else {
					$result = \OC::$server->getIntegrityCodeChecker()->verifyAppSignature($app, '', true);
					if (empty($result)) {
						$info['level'] = self::approvedApp;
						$info['removable'] = false;
					}

					$info['internal'] = false;
					$info['removable'] = true;
				}

				$appPath = self::getAppPath($app);
				if ($appPath !== false) {
					$appIcon = $appPath . '/img/' . $app . '.svg';
					if (\file_exists($appIcon)) {
						$info['preview'] = \OC::$server->getURLGenerator()->imagePath($app, $app . '.svg');
						$info['previewAsIcon'] = true;
					} else {
						$appIcon = $appPath . '/img/app.svg';
						if (\file_exists($appIcon)) {
							$info['preview'] = \OC::$server->getURLGenerator()->imagePath($app, 'app.svg');
							$info['previewAsIcon'] = true;
						}
					}
				}
				// fix documentation
				if (isset($info['documentation']) && \is_array($info['documentation'])) {
					foreach ($info['documentation'] as $key => $url) {
						// If it is not an absolute URL we assume it is a key
						// i.e. admin-ldap will get converted to go.php?to=admin-ldap
						if (\stripos($url, 'https://') !== 0 && \stripos($url, 'http://') !== 0) {
							$url = $urlGenerator->linkToDocs($url);
						}

						$info['documentation'][$key] = $url;
					}
				}
				$appList[] = $info;
			}
		}

		return $appList;
	}

	public static function shouldUpgrade($app) {
		$versions = self::getAppVersions();
		$info = \OC::$server->getAppManager()->getAppInfo($app);

		if ($info && isset($versions[$app])) {
			if ($info['version'] === $versions[$app]) {
				return false;
			}

			if (self::atLeastMinorVersionLevelChanged($info['version'], $versions[$app])) {
				return true;
			}
			// update app version in db
			\OC::$server->getConfig()->setAppValue($app, 'installed_version', $versions[$app]);
		}
		return false;
	}

	/**
	 * Adjust the number of version parts of $version1 to match
	 * the number of version parts of $version2.
	 *
	 * @param string $version1 version to adjust
	 * @param string $version2 version to take the number of parts from
	 * @return string shortened $version1
	 */
	private static function adjustVersionParts($version1, $version2) {
		$version1 = \explode('.', $version1);
		$version2 = \explode('.', $version2);
		// reduce $version1 to match the number of parts in $version2
		while (\count($version1) > \count($version2)) {
			\array_pop($version1);
		}
		// if $version1 does not have enough parts, add some
		while (\count($version1) < \count($version2)) {
			$version1[] = '0';
		}
		return \implode('.', $version1);
	}

	/**
	 * Check whether the current ownCloud version matches the given
	 * application's version requirements.
	 *
	 * The comparison is made based on the number of parts that the
	 * app info version has. For example for ownCloud 6.0.3 if the
	 * app info version is expecting version 6.0, the comparison is
	 * made on the first two parts of the ownCloud version.
	 * This means that it's possible to specify "min-version" => 6
	 * and "max-version" => 6 and it will still match ownCloud 6.0.3.
	 *
	 * @param Platform $platform
	 * @param array $appInfo app info (from xml)
	 *
	 * @return boolean true if compatible, otherwise false
	 */
	public static function isAppCompatible(Platform $platform, $appInfo) {
		$requireMin = '';
		$requireMax = '';
		if (isset($appInfo['dependencies']['owncloud']['@attributes']['min-version'])) {
			$requireMin = $appInfo['dependencies']['owncloud']['@attributes']['min-version'];
		}

		if (isset($appInfo['dependencies']['owncloud']['@attributes']['max-version'])) {
			$requireMax = $appInfo['dependencies']['owncloud']['@attributes']['max-version'];
		}

		if ($requireMin === '' || $requireMax === '') {
			return false;
		}

		$ocVersion = $platform->getOcVersion();
		if (
			\version_compare(self::adjustVersionParts($ocVersion, $requireMin), $requireMin, '<')
			|| \version_compare(self::adjustVersionParts($ocVersion, $requireMax), $requireMax, '>')
		) {
			return false;
		}

		return true;
	}

	/**
	 * get the installed version of all apps
	 */
	public static function getAppVersions() {
		static $versions;

		if (!$versions) {
			$appConfig = \OC::$server->getAppConfig();
			$versions = $appConfig->getValues(false, 'installed_version');
		}
		return $versions;
	}

	/**
	 * update the database for the app and call the update script
	 *
	 * @param string $appId
	 * @return bool
	 * @throws \OC\NeedsUpdateException
	 */
	public static function updateApp($appId) {
		$appPath = self::getAppPath($appId);
		if ($appPath === false) {
			return false;
		}
		$appData = self::getAppInfo($appId);
		self::executeRepairSteps($appId, $appData['repair-steps']['pre-migration']);
		if (isset($appData['use-migrations']) && $appData['use-migrations'] === 'true') {
			$ms = new \OC\DB\MigrationService($appId, \OC::$server->getDatabaseConnection());
			$ms->migrate();
		} else {
			if (\file_exists($appPath . '/appinfo/database.xml')) {
				OC_DB::updateDbFromStructure($appPath . '/appinfo/database.xml');
			}
		}
		self::executeRepairSteps($appId, $appData['repair-steps']['post-migration']);
		self::setupLiveMigrations($appId, $appData['repair-steps']['live-migration']);
		\OC::$server->getAppManager()->clearAppsCache();
		// run upgrade code
		if (\file_exists($appPath . '/appinfo/update.php')) {
			self::loadApp($appId, false);
			include $appPath . '/appinfo/update.php';
		}
		self::setupBackgroundJobs($appData['background-jobs']);

		//set remote/public handlers
		foreach ($appData['remote'] as $name => $path) {
			\OC::$server->getConfig()->setAppValue('core', 'remote_' . $name, $appId . '/' . $path);
		}
		foreach ($appData['public'] as $name => $path) {
			\OC::$server->getConfig()->setAppValue('core', 'public_' . $name, $appId . '/' . $path);
		}

		self::setAppTypes($appId);

		\OC::$server->getConfig()->setAppValue($appId, 'installed_version', $appData['version']);

		return true;
	}

	/**
	 * @param string $appId
	 * @param string[] $steps
	 * @throws \OC\NeedsUpdateException
	 */
	public static function executeRepairSteps($appId, array $steps) {
		if (empty($steps)) {
			return;
		}
		// load the app
		self::loadApp($appId, false);

		$dispatcher = OC::$server->getEventDispatcher();

		// load the steps
		$r = new Repair([], $dispatcher);
		foreach ($steps as $step) {
			try {
				$r->addStep($step);
			} catch (Exception $ex) {
				$r->emit('\OC\Repair', 'error', [$ex->getMessage()]);
				\OC::$server->getLogger()->logException($ex);
			}
		}
		// run the steps
		$r->run();
	}

	public static function setupBackgroundJobs(array $jobs) {
		$queue = \OC::$server->getJobList();
		foreach ($jobs as $job) {
			$queue->add($job);
		}
		// TODO remove jobs that no longer exist in this app version
	}

	/**
	 * @param string $appId
	 * @param string[] $steps
	 */
	private static function setupLiveMigrations($appId, array $steps) {
		$queue = \OC::$server->getJobList();
		foreach ($steps as $step) {
			$queue->add('OC\Migration\BackgroundRepair', [
				'app' => $appId,
				'step' => $step]);
		}
	}

	/**
	 * @param string $appId
	 * @return \OC\Files\View|false
	 * @throws Exception
	 */
	public static function getStorage($appId) {
		if (self::isEnabled($appId)) { //sanity check
			if (OC_User::isLoggedIn()) {
				$view = new \OC\Files\View('/' . OC_User::getUser());
				if (!$view->file_exists($appId)) {
					$view->mkdir($appId);
				}
				return new \OC\Files\View('/' . OC_User::getUser() . '/' . $appId);
			}

			\OCP\Util::writeLog('core', 'Can\'t get app storage, app ' . $appId . ', user not logged in', \OCP\Util::ERROR);
			return false;
		} else {
			\OCP\Util::writeLog('core', 'Can\'t get app storage, app ' . $appId . ' not enabled', \OCP\Util::ERROR);
			return false;
		}
	}

	/**
	 * parses the app data array and enhanced the 'description' value
	 *
	 * @param array $data the app data
	 * @return array improved app data
	 */
	public static function parseAppInfo(array $data) {

		// just modify the description if it is available
		// otherwise this will create a $data element with an empty 'description'
		if (isset($data['description'])) {
			if (\is_string($data['description'])) {
				// sometimes the description contains line breaks and they are then also
				// shown in this way in the app management which isn't wanted as HTML
				// manages line breaks itself

				// first of all we split on empty lines
				$paragraphs = \preg_split("!\n[[:space:]]*\n!mu", $data['description']);

				$result = [];
				foreach ($paragraphs as $value) {
					// replace multiple whitespace (tabs, space, newlines) inside a paragraph
					// with a single space - also trims whitespace
					$result[] = \trim(\preg_replace('![[:space:]]+!mu', ' ', $value));
				}

				// join the single paragraphs with a empty line in between
				$data['description'] = \implode("\n\n", $result);
			} else {
				$data['description'] = '';
			}
		}

		return $data;
	}

	/**
	 * @param OCP\IConfig $config
	 * @param OCP\IL10N $l
	 * @param array $info
	 * @throws Exception
	 */
	protected static function checkAppDependencies($config, $l, $info) {
		$dependencyAnalyzer = new DependencyAnalyzer(new Platform($config), $l);
		$missing = $dependencyAnalyzer->analyze($info);
		if (!empty($missing)) {
			$missingMsg = \implode(PHP_EOL, $missing);
			throw new \Exception(
				$l->t('App "%s" cannot be installed because the following dependencies are not fulfilled: %s',
					[$info['name'], $missingMsg]
				)
			);
		}
	}

	/**
	 * @param $app
	 * @param $currentVersion
	 * @param $versions
	 * @return bool
	 */
	public static function atLeastMinorVersionLevelChanged($currentVersion, $installedVersion): bool {
		if ($currentVersion === $installedVersion) {
			return false;
		}

		$p = new \Composer\Semver\VersionParser();
		$currentVersion = $p->normalize($currentVersion);
		$installedVersion = $p->normalize($installedVersion);

		$currentVersion = \explode('.', $currentVersion);
		$installedVersion = \explode('.', $installedVersion);

		if ($currentVersion[0] === $installedVersion[0] &&
			$currentVersion[1] === $installedVersion[1]) {
			return false;
		}

		return true;
	}
}
