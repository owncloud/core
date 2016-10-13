<?php

namespace OC\Theme;

class ThemeService {

	/**
	 * @var Theme
	 */
	private $theme;

	/**
	 * @param string $themeName
	 */
	public function __construct($themeName = '')
	{
		$this->createTheme($themeName);
	}

	/**
	 * @param string $themeName
	 */
	private function createTheme($themeName = '')
	{
		if ($themeName === '' && $this->defaultThemeExists()) {
			$themeName = 'default';
		}

		$this->theme = new Theme($themeName, $this->getThemeDirectory($themeName));
	}

	/**
	 * @param string $themeName
	 * @return string
	 */
	private function getThemeDirectory($themeName)
	{
		return 'themes/' . $themeName . '/';
	}

	/**
	 * @return bool
	 */
	private function defaultThemeExists()
	{
		if (is_dir(\OC::$SERVERROOT . '/themes/default')) {
			return true;
		}

		return false;
	}

	/**
	 * @return Theme
	 */
	public function getTheme()
	{
		return $this->theme;
	}

	/**
	 * @param string $appName
	 */
	public function setAppTheme($appName = '')
	{
		if ($appName !== '') {
			$this->theme->setDirectory(
				ltrim(\OC_App::getAppWebPath('theme-owncloud'), '/') . '/'
			);
		}
	}
}