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
		$this->createTheme($themeName);
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
	 * @param string $themeName
	 */
	private function createTheme($themeName = '') {
		if ($themeName === '' && $this->defaultThemeExists()) {
			$themeName = 'default';
		}

		$this->theme = new Theme($themeName, $this->getThemeDirectory($themeName));
	}

	/**
	 * @param string $themeName
	 * @return string
	 */
	private function getThemeDirectory($themeName) {
		if ($themeName !== '') {
			return 'themes/' . $themeName . '/';
		} else {
			return '';
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
	 * @param string $appName
	 */
	public function setAppTheme($appName = '') {
		if ($appName !== '') {
			$this->theme->setDirectory(
				substr(\OC_App::getAppPath($appName), strlen(\OC::$SERVERROOT) + 1)
			);
			$appWebPath = \OC_App::getAppWebPath($appName);
			$this->theme->setWebPath($appWebPath ? $appWebPath : '');
			$this->theme->setName($appName);
		}
	}
}
