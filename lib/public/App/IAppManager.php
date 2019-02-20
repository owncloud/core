<?php
/**
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

namespace OCP\App;

use OCP\IUser;

/**
 * Interface IAppManager
 *
 * @package OCP\App
 * @since 8.0.0
 */
interface IAppManager {
	/**
	 * Check if an app is enabled for user
	 *
	 * @param string $appId
	 * @param \OCP\IUser $user (optional) if not defined, the currently loggedin user will be used
	 * @return bool
	 * @since 8.0.0
	 */
	public function isEnabledForUser($appId, $user = null);

	/**
	 * Check if an app is installed in the instance
	 *
	 * @param string $appId
	 * @return bool
	 * @since 8.0.0
	 */
	public function isInstalled($appId);

	/**
	 * Enable an app for every user
	 *
	 * @param string $appId
	 * @since 8.0.0
	 */
	public function enableApp($appId);

	/**
	 * Enable an app only for specific groups
	 *
	 * @param string $appId
	 * @param \OCP\IGroup[] $groups
	 * @since 8.0.0
	 */
	public function enableAppForGroups($appId, $groups);

	/**
	 * Disable an app for every user
	 *
	 * @param string $appId
	 * @since 8.0.0
	 */
	public function disableApp($appId);

	/**
	 * List all apps enabled for a user
	 *
	 * @param \OCP\IUser|null $user
	 * @return string[]
	 * @since 8.1.0
	 */
	public function getEnabledAppsForUser(IUser $user = null);

	/**
	 * List all installed apps
	 *
	 * @return string[]
	 * @since 8.1.0
	 */
	public function getInstalledApps();

	/**
	 * Clear the cached list of apps when enabling/disabling an app
	 * @since 8.1.0
	 */
	public function clearAppsCache();

	/**
	 * @param string $appId
	 * @return boolean
	 * @since 9.0.0
	 */
	public function isShipped($appId);

	/**
	 * @return string[]
	 * @since 9.0.0
	 */
	public function getAlwaysEnabledApps();

	/* Get all apps that are part of the tar file
	 * @return string[]
	 * @since 10.2.0
	 */
	public function getAppsInTar();

	/**
	 * @param string $package
	 * @param bool $skipMigrations whether to skip migrations, which would only install the code
	 * @return mixed
	 * @since 10.0
	 */
	public function installApp($package, $skipMigrations = false);

	/**
	 * @param string $package
	 * @return mixed
	 * @since 10.0
	 */
	public function updateApp($package);

	/**
	 * Returns the app information from "appinfo/info.xml".
	 *
	 * @param string $appId app id
	 * @return array app info
	 * @since 10.0
	 */
	public function getAppInfo($appId);

	/**
	 * Returns the list of all apps, enabled and disabled
	 *
	 * @return string[]
	 * @since 10.0
	 */
	public function getAllApps();

	/**
	 * Read and validate info.xml from a local app package
	 * Returns the app information from "appinfo/info.xml".
	 *
	 * @param string $path package location
	 * @return string[] app info
	 * @since 10.0
	 */
	public function readAppPackage($path);

	/**
	 * Indicates if app installation is supported. Usually it is but in certain
	 * environments it is disallowed because of hardening. In a clustered setup
	 * apps need to be installed on each cluster node which is out of scope of
	 * ownCloud itself.
	 *
	 * @return bool
	 * @since 10.0.3
	 */
	public function canInstall();

	/**
	 * Get the absolute path to the directory for the given app.
	 * If the app exists in multiple directories, the most recent version is taken.
	 * Returns false if not found
	 *
	 * @param string $appId
	 * @return string|false
	 * @since 10.0.5
	 */
	public function getAppPath($appId);

	/**
	 * Get the HTTP Web path to the app directory for the given app, relative to the ownCloud webroot.
	 * If the app exists in multiple directories, web path to the most recent version is taken.
	 * Returns false if not found
	 *
	 * @param string $appId
	 * @return string|false
	 * @since 10.0.5
	 */
	public function getAppWebPath($appId);
}
