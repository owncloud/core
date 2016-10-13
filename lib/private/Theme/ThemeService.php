<?php

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
				ltrim(\OC_App::getAppWebPath('theme-owncloud'), '/') . '/'
			);
		}
	}
}
