<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OC\App;

use OCP\Diagnostics\IEventLogger;
use OC\NeedsUpdateException;
use OCP\AppFramework\App;

class AppLoader {
	/**
	 * @var \OCP\Diagnostics\IEventLogger
	 */
	private $eventLogger;

	/**
	 * @var \OCP\AppFramework\App[]
	 */
	private $loadedApps = [];

	/**
	 * @param \OCP\Diagnostics\IEventLogger $eventLogger
	 */
	public function __construct(IEventLogger $eventLogger) {
		$this->eventLogger = $eventLogger;
	}

	/**
	 * Load the app and return the Application instance
	 *
	 * @param string $appId
	 * @return \OCP\AppFramework\App
	 * @throws \OC\NeedsUpdateException
	 */
	public function loadApp($appId) {
		if (isset($this->loadedApps[$appId])) {
			return $this->loadedApps[$appId];
		}
		$this->eventLogger->start('load_app_' . $appId, 'Load app: ' . $appId);
		if (\OC_App::shouldUpgrade($appId)) {
			throw new NeedsUpdateException();
		}
		$appClass = $this->getApplicationClassName($appId);
		$this->loadedApps[$appId] = new $appClass($appId);
		return $this->loadedApps[$appId];
	}

	private function getApplicationClassName($appId) {
		$appPath = $this->getAppPath($appId);
		$base = '\OCP\AppFramework\App';
		if (!file_exists($appPath . '/appinfo/application.php')) {
			return $base;
		} else {
			$class = App::buildAppNamespace($appId) . '/Application';
			if (class_exists($class) && is_subclass_of($class, $base)) {
				return $class;
			} else {
				return $base;
			}
		}
	}

	/**
	 * Get the directory for the given app.
	 * If the app is defined in multiple directories, the first one is taken. (false if not found)
	 *
	 * @param string $appId
	 * @return string|false
	 */
	public function getAppPath($appId) {
		return \OC_App::getAppPath($appId);
	}
}
