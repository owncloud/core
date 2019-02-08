<?php
/**
 * @author Philipp Schaffrath <github@philipp.schaffrath.email>
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
 */
namespace OC\Theme;

use OCP\App\IAppManager;
use OCP\Theme\IThemeService;
use OC\Helper\EnvironmentHelper;

/**
 * Class ThemeService
 *
 * @package OC\Theme
 */
class ThemeService implements IThemeService {
	const DEFAULT_THEME_PATH = '/themes/default';

	/**
	 * @var Theme
	 */
	private $theme;

	/**
	 * @var IAppManager
	 */
	private $appManager;

	/**
	 * @var EnvironmentHelper
	 */
	private $environmentHelper;

	/**
	 * ThemeService constructor.
	 *
	 * @param string $themeName
	 * @param IAppManager $appManager
	 * @param EnvironmentHelper $environmentHelper
	 */
	public function __construct($themeName,
		IAppManager $appManager, EnvironmentHelper $environmentHelper
	) {
		$this->appManager = $appManager;
		$this->environmentHelper = $environmentHelper;
		if ($themeName === '' && $this->defaultThemeExists()) {
			$themeName = 'default';
		}

		$this->theme = $this->makeTheme($themeName, false);
	}

	/**
	 * @return bool
	 */
	public function defaultThemeExists() {
		$defaultThemePath = $this->environmentHelper->getServerRoot()
			. self::DEFAULT_THEME_PATH;
		return \is_dir($defaultThemePath);
	}

	/**
	 * @return Theme
	 */
	public function getTheme() {
		return $this->theme;
	}

	/**
	 * @param string $themeName
	 *
	 * @return void
	 */
	public function setAppTheme($themeName = '') {
		$this->theme = $this->makeTheme($themeName, true);
	}

	/**
	 * @param string $themeName
	 * @param bool $appTheme
	 *
	 * @return Theme
	 */
	private function makeTheme($themeName, $appTheme = true) {
		$serverRoot = $this->environmentHelper->getServerRoot();
		$baseDirectory = $serverRoot;
		$directory = '';
		$webPath = '';
		if ($themeName !== '') {
			if ($appTheme) {
				$themeDirectory = $this->appManager->getAppPath($themeName);
				// If theme is located below OC server root
				//   Theme base directory is OC server root
				//
				// if theme is located outside OC server root
				//   Theme base directory is a path to the appsRoot containing
				//   this theme
				//
				// In any case theme directory is relative to theme base directory
				if (\strpos($themeDirectory, $serverRoot) === 0) {
					$directory = \substr($themeDirectory, \strlen($serverRoot) + 1);
				} else {
					$appsRoots = $this->environmentHelper->getAppsRoots();
					foreach ($appsRoots as $appsRoot) {
						if (\strpos($themeDirectory, $appsRoot['path']) === 0) {
							$baseDirectory = $appsRoot['path'];
							$directory = \substr(
								$themeDirectory,
								\strlen($appsRoot['path']) + 1
							);
						}
					}
				}

				$webPath = $this->appManager->getAppWebPath($themeName);
			} else {
				$directory = 'themes/' . $themeName;
				$webPath = '/themes/' . $themeName;
			}
		}

		$theme = new Theme($themeName, $directory, $webPath);
		$theme->setBaseDirectory($baseDirectory);

		return $theme;
	}

	/**
	 * @return Theme[]
	 */
	public function getAllThemes() {
		return \array_merge($this->getAllAppThemes(), $this->getAllLegacyThemes());
	}

	/**
	 * @return Theme[]
	 */
	private function getAllAppThemes() {
		$themes = [];
		foreach ($this->appManager->getInstalledApps() as $app) {
			if (\OC_App::isType($app, 'theme')) {
				$themes[$app] = $this->makeTheme($app);
			}
		}
		return $themes;
	}

	/**
	 * @return Theme[]
	 */
	private function getAllLegacyThemes() {
		$serverRoot = $this->environmentHelper->getServerRoot();
		$themes = [];
		if (\is_dir($serverRoot . '/themes')) {
			if ($handle = \opendir($serverRoot . '/themes')) {
				while (($entry = \readdir($handle)) !== false) {
					if ($entry === '.' || $entry === '..') {
						continue;
					}
					if (\is_dir($serverRoot . '/themes/' . $entry)) {
						$themes[$entry] = $this->makeTheme($entry, false);
					}
				}
				\closedir($handle);
				return $themes;
			}
		}
		return $themes;
	}

	/**
	 * @param string $themeName
	 * @return Theme|false
	 */
	public function findTheme($themeName) {
		$allThemes = $this->getAllThemes();
		if (\array_key_exists($themeName, $allThemes)) {
			return $allThemes[$themeName];
		}
		return false;
	}
}
