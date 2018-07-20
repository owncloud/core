<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Philipp Schaffrath <github@philippschaffrath.de>
 * @author phisch <git@philippschaffrath.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\Template;

use OCP\Theme\ITheme;

class Base {
	/**
	 * @var string
	 */
	private $template;

	/**
	 * @var array
	 */
	private $vars;

	/**
	 * @var \OCP\IL10N
	 */
	private $l10n;

	/**
	 * @var ITheme
	 */
	protected $theme;

	/**
	 * @var \OC_Defaults
	 */
	private $themeDefaults;

	/**
	 * @param string $template
	 * @param string $requestToken
	 * @param \OCP\IL10N $l10n
	 * @param ITheme $theme
	 * @param \OC_Defaults $themeDefaults
	 */
	public function __construct($template, $requestToken, $l10n, $theme, $themeDefaults) {
		$this->vars = [];
		$this->vars['requesttoken'] = $requestToken;
		$this->l10n = $l10n;
		$this->template = $template;
		$this->theme = $theme;
		$this->themeDefaults = $themeDefaults;
	}

	/**
	 * @param ITheme $theme
	 * @param string $app
	 * @param string|false $appDir
	 * @return string[]
	 */
	protected function getAppTemplateDirs(ITheme $theme, $app, $appDir) {
		$templateDirectories = [];
		// Templates dir from the active theme first
		if ($theme->getDirectory() !== '') {
			$templateDirectories[] = $theme->getBaseDirectory() . '/' . $theme->getDirectory() . '/apps/' . $app . '/templates/';
		}

		// Templates dir from the app dir then
		if ($appDir !== false) {
			$templateDirectories[] = $appDir . '/templates/';
		}

		return $templateDirectories;
	}

	/**
	 * @param ITheme $theme
	 * @param string $serverRoot
	 * @return string[]
	 */
	protected function getCoreTemplateDirs(ITheme $theme, $serverRoot) {
		return $this->getTemplateDirs($theme, $serverRoot, '/core/templates/');
	}

	/**
	 * @param ITheme $theme
	 * @param string $serverRoot
	 * @return string[]
	 */
	protected function getSettingsTemplateDirs(ITheme $theme, $serverRoot) {
		return $this->getTemplateDirs($theme, $serverRoot, '/settings/templates/');
	}

	/**
	 * Get path to templates directory in theme (if any) and then
	 * in the requested ownCloud location
	 *
	 * @param ITheme $theme
	 * @param string $basePath
	 * @param string $relativePath
	 * @return string[]
	 */
	protected function getTemplateDirs(ITheme $theme, $basePath, $relativePath) {
		$directories = [];
		if ($theme->getDirectory() !== '') {
			$directories[] = $theme->getBaseDirectory() . '/' . $theme->getDirectory() . $relativePath;
		}
		$directories[] = $basePath . $relativePath;

		return $directories;
	}

	/**
	 * Assign variables
	 * @param string $key key
	 * @param array|bool|integer|string $value value
	 * @return bool
	 *
	 * This function assigns a variable. It can be accessed via $_[$key] in
	 * the template.
	 *
	 * If the key existed before, it will be overwritten
	 */
	public function assign($key, $value) {
		$this->vars[$key] = $value;
		return true;
	}

	/**
	 * Appends a variable
	 * @param string $key key
	 * @param mixed $value value
	 * @return boolean|null
	 *
	 * This function assigns a variable in an array context. If the key already
	 * exists, the value will be appended. It can be accessed via
	 * $_[$key][$position] in the template.
	 */
	public function append($key, $value) {
		if (\array_key_exists($key, $this->vars)) {
			$this->vars[$key][] = $value;
		} else {
			$this->vars[$key] = [$value];
		}
	}

	/**
	 * Prints the proceeded template
	 * @return bool
	 *
	 * This function proceeds the template and prints its output.
	 */
	public function printPage() {
		$data = $this->fetchPage();
		if ($data === false) {
			return false;
		} else {
			print $data;
			return true;
		}
	}

	/**
	 * Process the template
	 *
	 * @param array|null $additionalParams
	 * @return string This function processes the template.
	 *
	 * This function processes the template.
	 */
	public function fetchPage($additionalParams = null) {
		return $this->load($this->template, $additionalParams);
	}

	/**
	 * doing the actual work
	 *
	 * @param string $file
	 * @param array|null $additionalParams
	 * @return string content
	 * @throws \Exception
	 *
	 * Includes the template file, fetches its output
	 */
	protected function load($file, $additionalParams = null) {
		// This variables will be used inside templates, they are not unused!
		$_ = $this->vars;
		$l = $this->l10n;
		$theme = $this->themeDefaults;

		if ($additionalParams !== null) {
			$_ = \array_merge($additionalParams, $this->vars);
		}

		\ob_start();
		try {
			include $file;
			$data = \ob_get_contents();
		} catch (\Exception $e) {
			@\ob_end_clean();
			throw $e;
		}
		@\ob_end_clean();

		return $data;
	}
}
