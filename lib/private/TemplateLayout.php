<?php
/**
 * @author Adam Williamson <awilliam@redhat.com>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Clark Tomlinson <fallen013@gmail.com>
 * @author Hendrik Leppelsack <hendrik@leppelsack.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Michael Gapczynski <GapczynskiM@gmail.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Philipp Schaffrath <github@philippschaffrath.de>
 * @author Remco Brenninkmeijer <requist1@starmail.nl>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 * @author Peter Prochaska <info@peter-prochaska.de>
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
namespace OC;

class TemplateLayout extends \OC_Template {
	private static $versionHash = '';

	/**
	 * @var \OCP\IConfig
	 */
	private $config;

	/**
	 * @param string $renderAs
	 * @param string $appId application id
	 */
	public function __construct($renderAs, $appId = '') {

		// yes - should be injected ....
		$this->config = \OC::$server->getConfig();

		// Decide which page we show
		if ($renderAs == 'user') {
			parent::__construct('core', 'layout.user');
			if (\in_array(\OC_App::getCurrentApp(), ['settings','admin', 'help']) !== false) {
				$this->assign('bodyid', 'body-settings');
			} else {
				$this->assign('bodyid', 'body-user');
			}

			// Code integrity notification
			$integrityChecker = \OC::$server->getIntegrityCodeChecker();
			if (\OC_User::isAdminUser(\OC_User::getUser()) && $integrityChecker->isCodeCheckEnforced() && !$integrityChecker->hasPassedCheck()) {
				\OCP\Util::addScript('core', 'integritycheck-failed-notification');
			}

			// Add navigation entry
			$this->assign('application', '');
			$this->assign('appid', $appId);
			$navigation = \OC_App::getNavigation();
			$this->assign('navigation', $navigation);
			$settingsNavigation = \OC_App::getSettingsNavigation();
			$this->assign('settingsnavigation', $settingsNavigation);
			foreach ($navigation as $entry) {
				if ($entry['active']) {
					$this->assign('application', $entry['name']);
					break;
				}
			}

			foreach ($settingsNavigation as $entry) {
				if ($entry['active']) {
					$this->assign('application', $entry['name']);
					break;
				}
			}
			$userDisplayName = \OC_User::getDisplayName();
			$this->assign('user_displayname', $userDisplayName);
			$this->assign('user_uid', \OC_User::getUser());
			$avatarsEnabled = $this->config->getSystemValue('enable_avatars', true) === true;
			$this->assign('enableAvatars', $avatarsEnabled);

			if (!$avatarsEnabled || \OC_User::getUser() === false) {
				$this->assign('userAvatarSet', false);
			} else {
				$this->assign('userAvatarSet', \OC::$server->getAvatarManager()->getAvatar(\OC_User::getUser())->exists());
			}
		} elseif ($renderAs == 'error') {
			parent::__construct('core', 'layout.guest', '', false);
			$this->assign('bodyid', 'body-login');
		} elseif ($renderAs == 'guest') {
			parent::__construct('core', 'layout.guest');
			$this->assign('bodyid', 'body-login');
		} else {
			parent::__construct('core', 'layout.base');
		}
		// Send the language to our layouts
		$lang = \OC::$server->getL10NFactory()->findLanguage();
		if ($lang === 'sr@latin') {
			$lang = 'sr';
		}
		$this->assign('language', $lang);

		if (\OC::$server->getSystemConfig()->getValue('installed', false)) {
			if (empty(self::$versionHash)) {
				$v = \OC_App::getAppVersions();
				$v['core'] = \implode('.', \OCP\Util::getVersion());
				self::$versionHash = \md5(\implode(',', $v));
			}
		} else {
			self::$versionHash = \md5('not installed');
		}

		// Add the js files
		$jsFiles = self::findJavascriptFiles(\OC_Util::$scripts);
		$this->assign('jsfiles', []);
		if ($this->config->getSystemValue('installed', false) && $renderAs != 'error') {
			$this->append('jsfiles', \OC::$server->getURLGenerator()->linkToRoute('js_config', ['v' => self::$versionHash]));
		}
		foreach ($jsFiles as $info) {
			$web = $info[1];
			$file = $info[2];
			$this->append('jsfiles', $web.'/'.$file . '?v=' . self::$versionHash);
		}

		// Add the css files
		$cssFiles = self::findStylesheetFiles(\OC_Util::$styles);
		$this->assign('cssfiles', []);
		$this->assign('printcssfiles', []);
		foreach ($cssFiles as $info) {
			$web = $info[1];
			$file = $info[2];

			if (\substr($file, -\strlen('print.css')) === 'print.css') {
				$this->append('printcssfiles', $web.'/'.$file . '?v=' . self::$versionHash);
			} else {
				$this->append('cssfiles', $web.'/'.$file . '?v=' . self::$versionHash);
			}
		}
	}

	/**
	 * @param array $styles
	 * @return array
	 */
	public static function findStylesheetFiles($styles) {
		$locator = new \OC\Template\CSSResourceLocator(
			\OC_Util::getTheme(),
			\OC::$server->getAppManager(),
			\OC::$server->getLogger(),
			[\OC::$SERVERROOT => \OC::$WEBROOT]);
		$locator->find($styles);
		return $locator->getResources();
	}

	/**
	 * @param array $scripts
	 * @return array
	 */
	public static function findJavascriptFiles($scripts) {
		$locator = new \OC\Template\JSResourceLocator(
			\OC_Util::getTheme(),
			\OC::$server->getAppManager(),
			\OC::$server->getLogger(),
			[\OC::$SERVERROOT => \OC::$WEBROOT]);
		$locator->find($scripts);
		return $locator->getResources();
	}

	/**
	 * Converts the absolute file path to a relative path from \OC::$SERVERROOT
	 * @param string $filePath Absolute path
	 * @return string Relative path
	 * @throws \Exception If $filePath is not under \OC::$SERVERROOT
	 */
	public static function convertToRelativePath($filePath) {
		$relativePath = \explode(\OC::$SERVERROOT, $filePath);
		if (\count($relativePath) !== 2) {
			throw new \Exception('$filePath is not under the \OC::$SERVERROOT');
		}

		return $relativePath[1];
	}
}
