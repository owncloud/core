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

use OCP\Theme\IThemeService;

class ThemeService implements IThemeService {
	const DEFAULT_THEME_PATH = '/themes/default';

	/**
	 * @var Theme
	 */
	private $theme;
	
	/** @var string */
	private $serverRoot;

	/** @var string */
	private $defaultThemeDirectory;

	/**
	 * ThemeService constructor.
	 *
	 * @param string $themeName
	 * @param string $serverRoot
	 */
	public function __construct($themeName, $serverRoot) {
		$this->serverRoot = $serverRoot;
		$this->defaultThemeDirectory = $this->serverRoot . self::DEFAULT_THEME_PATH;

		if ($themeName === '' && $this->defaultThemeExists()) {
			$themeName = 'default';
		}

		$this->theme = $this->makeTheme($themeName, false);
	}

	/**
	 * @return bool
	 */
	public function defaultThemeExists() {
		return \is_dir($this->defaultThemeDirectory);
	}

	/**
	 * @return Theme
	 */
	public function getTheme() {
		return $this->theme;
	}

	/**
	 * @param string $themeName
	 */
	public function setAppTheme($themeName = '') {
		$this->theme = $this->makeTheme($themeName, true);
	}

	/**
	 * @param string $themeName
	 * @param bool $appTheme
	 * @return Theme
	 */
	private function makeTheme($themeName, $appTheme = true) {
		$baseDirectory = $this->serverRoot;
		$directory = '';
		$webPath = '';
		if ($themeName !== '') {
			if ($appTheme) {
				$themeDirectory = \OC_App::getAppPath($themeName);
				// Use OC server root as a theme base directory if theme is located below it
				// Use path to an app root as a theme base directory otherwise
				// in any case theme directory is relative to theme base directory
				if (\strpos($themeDirectory, $this->serverRoot)===0) {
					$directory = \substr($themeDirectory, \strlen($this->serverRoot) + 1);
				} else {
					foreach (\OC::$APPSROOTS as $appRoot) {
						if (\strpos($themeDirectory, $appRoot['path'])===0) {
							$baseDirectory = $appRoot['path'];
							$directory = \substr($themeDirectory, \strlen($appRoot['path']) + 1);
						}
					}
				}

				$webPath = \OC_App::getAppWebPath($themeName);
			} else {
				$directory = 'themes/' . $themeName;
				$webPath = '/themes/' . $themeName;
			}
		}

		if ($this->theme === null) {
			$this->theme = new Theme($themeName, $directory, $webPath);
		} else {
			$this->theme->setName($themeName);
			$this->theme->setDirectory($directory);
			$this->theme->setWebPath($webPath);
		}
		$this->theme->setBaseDirectory($baseDirectory);

		return $this->theme;
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
		foreach (\OC::$server->getAppManager()->getAllApps() as $app) {
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
		$themes = [];
		if (\is_dir($this->serverRoot . '/themes')) {
			if ($handle = \opendir($this->serverRoot . '/themes')) {
				while (($entry = \readdir($handle)) !== false) {
					if ($entry === '.' || $entry === '..') {
						continue;
					}
					if (\is_dir($this->serverRoot . '/themes/' . $entry)) {
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
