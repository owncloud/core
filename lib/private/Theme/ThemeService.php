<?php
/**
 * @author Philipp Schaffrath <github@philippschaffrath.de>
 * @author Philipp Schaffrath <github@philipp.schaffrath.email>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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
namespace OC\Theme;

class ThemeService {

	/**
	 * @var Theme
	 */
	private $theme;

	/** @var string */
	private $defaultThemeDirectory;

	/**
	 * ThemeService constructor.
	 *
	 * @param string $themeName
	 * @param string $defaultThemeDirectory
	 */
	public function __construct($themeName = '', $defaultThemeDirectory = '') {
		$this->setDefaultThemeDirectory($defaultThemeDirectory);

		if ($themeName === '' && $this->defaultThemeExists()) {
			$themeName = 'default';
		}

		$this->theme = $this->makeTheme($themeName, false);
	}

	/**
	 * @param string $defaultThemeDirectory
	 */
	private function setDefaultThemeDirectory($defaultThemeDirectory = '') {
		if ($defaultThemeDirectory === '') {
			$this->defaultThemeDirectory = \OC::$SERVERROOT . '/themes/default';
		} else {
			$this->defaultThemeDirectory = $defaultThemeDirectory;
		}
	}

	/**
	 * @return bool
	 */
	private function defaultThemeExists() {
		if (is_dir($this->defaultThemeDirectory)) {
			return true;
		}

		return false;
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
		$this->theme = $this->makeTheme($themeName, true, $this->getTheme());
	}

	/**
	 * @param string $themeName
	 * @param bool $appTheme
	 * @param Theme $theme
	 * @return Theme
	 */
	private function makeTheme($themeName, $appTheme = true, Theme $theme = null) {
		$directory = $this->getDirectory($themeName, $appTheme);
		$webPath = $this->getWebPath($themeName, $appTheme);

		if (is_null($theme)) {
			$theme = new Theme(
				$themeName,
				$directory,
				$webPath
			);
		} else {
			$theme->setName($themeName);
			$theme->setDirectory($directory);
			$theme->setWebPath($webPath);
		}

		return $theme;
	}

	/**
	 * @param string $themeName
	 * @param bool $appTheme
	 * @return string
	 */
	private function getDirectory($themeName, $appTheme = true) {
		if ($themeName !== '') {
			if ($appTheme) {
				return substr(\OC_App::getAppPath($themeName), strlen(\OC::$SERVERROOT) + 1);
			}
			return 'themes/' . $themeName;
		}

		return '';
	}

	/**
	 * @param $themeName
	 * @param bool $appTheme
	 * @return false|string
	 */
	private function getWebPath($themeName, $appTheme = true) {
		if ($themeName !== '') {
			if ($appTheme) {
				$appWebPath = \OC_App::getAppWebPath($themeName);
				return $appWebPath ? $appWebPath : '';
			}
			return '/themes/' . $themeName;
		}

		return '';
	}

	/**
	 * @return Theme[]
	 */
	public function getAllThemes() {
		return array_merge($this->getAllAppThemes(), $this->getAllLegacyThemes());
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
		if ($handle = opendir(\OC::$SERVERROOT . '/themes')) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry === '.' || $entry === '..') {
					continue;
				}
				if (is_dir(\OC::$SERVERROOT . '/themes/' . $entry)) {
					$themes[$entry] = $this->makeTheme($entry, false);
				}
			}
			closedir($handle);
			return $themes;
		}
		return $themes;
	}

	/**
	 * @param string $themeName
	 * @return Theme|false
	 */
	public function findTheme($themeName) {
		$allThemes = $this->getAllThemes();
		if (array_key_exists($themeName, $allThemes)) {
			return $allThemes[$themeName];
		}
		return false;
	}
}
