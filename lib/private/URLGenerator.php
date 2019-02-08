<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author mmccarn <mmccarn-github@mmsionline.us>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Philipp Schaffrath <github@philippschaffrath.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@users.noreply.github.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Thomas Tanghus <thomas@tanghus.net>
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

use OC\Helper\EnvironmentHelper;
use OCP\Theme\ITheme;
use OC_Defaults;
use OCP\ICacheFactory;
use OCP\IConfig;
use OCP\IURLGenerator;
use OCP\Route\IRouter;
use RuntimeException;

/**
 * Class to generate URLs
 */
class URLGenerator implements IURLGenerator {
	/** @var IConfig */
	private $config;
	/** @var ICacheFactory */
	private $cacheFactory;
	/** @var IRouter */
	private $router;
	/** @var ITheme */
	private $theme;
	
	/** @var EnvironmentHelper */
	private $environmentHelper;

	/**
	 * @param IConfig $config
	 * @param ICacheFactory $cacheFactory
	 * @param IRouter $router
	 * @param EnvironmentHelper $environmentHelper
	 */
	public function __construct(IConfig $config,
								ICacheFactory $cacheFactory,
								IRouter $router,
								EnvironmentHelper $environmentHelper
	) {
		$this->config = $config;
		$this->cacheFactory = $cacheFactory;
		$this->router = $router;
		$this->environmentHelper = $environmentHelper;
		$this->theme = \OC_Util::getTheme();
	}

	/**
	 * Creates an url using a defined route
	 * @param string $route
	 * @param array $parameters args with param=>value, will be appended to the returned url
	 * @return string the url
	 *
	 * Returns a url to the given route.
	 */
	public function linkToRoute($route, $parameters = []) {
		$urlLinkTo = $this->router->generate($route, $parameters);
		return $urlLinkTo;
	}

	/**
	 * Creates an absolute url using a defined route
	 * @param string $routeName
	 * @param array $arguments args with param=>value, will be appended to the returned url
	 * @return string the url
	 *
	 * Returns an absolute url to the given route.
	 */
	public function linkToRouteAbsolute($routeName, $arguments = []) {
		return $this->getAbsoluteURL($this->linkToRoute($routeName, $arguments));
	}

	/**
	 * Creates an url
	 * @param string $app app
	 * @param string $file file
	 * @param array $args array with param=>value, will be appended to the returned url
	 *    The value of $args will be urlencoded
	 * @return string the url
	 *
	 * Returns a url to the given app and file.
	 */
	public function linkTo($app, $file, $args = []) {
		$frontControllerActive = (\getenv('front_controller_active') === 'true');
		$webRoot = $this->environmentHelper->getWebRoot();

		if ($app != '') {
			$app_path = \OC_App::getAppPath($app);
			// Check if the app is in the app folder
			if ($app_path && \file_exists($app_path . '/' . $file)) {
				if (\substr($file, -3) == 'php') {
					$urlLinkTo = $webRoot . '/index.php/apps/' . $app;
					if ($frontControllerActive) {
						$urlLinkTo = $webRoot . '/apps/' . $app;
					}
					$urlLinkTo .= ($file != 'index.php') ? '/' . $file : '';
				} else {
					$urlLinkTo = \OC_App::getAppWebPath($app) . '/' . $file;
				}
			} else {
				$urlLinkTo = $webRoot . '/' . $app . '/' . $file;
			}
		} else {
			if (\file_exists($this->environmentHelper->getServerRoot() . '/core/' . $file)) {
				$urlLinkTo = $webRoot . '/core/' . $file;
			} else {
				if ($frontControllerActive && $file === 'index.php') {
					$urlLinkTo = $webRoot . '/';
				} else {
					$urlLinkTo = $webRoot . '/' . $file;
				}
			}
		}

		if ($args && $query = \http_build_query($args, '', '&')) {
			$urlLinkTo .= '?' . $query;
		}

		return $urlLinkTo;
	}

	/**
	 * Creates path to an image
	 * @param string $app app
	 * @param string $image image name
	 * @throws \RuntimeException If the image does not exist
	 * @return string the url
	 *
	 * Returns the path to the image.
	 */
	public function imagePath($app, $image) {
		$cache = $this->cacheFactory->create('imagePath');
		$cacheKey = $this->theme->getName().'-'.$app.'-'.$image;
		if ($key = $cache->get($cacheKey)) {
			return $key;
		}

		$path = $this->getImagePath($app, $image);

		if ($path !== '' && $path !== null) {
			$cache->set($cacheKey, $path);
			return $path;
		} else {
			throw new RuntimeException(
				'image not found: image:' . $image
				. ' webroot:' . $this->environmentHelper->getWebRoot()
				. ' serverroot:' . $this->environmentHelper->getServerRoot()
			);
		}
	}

	/**
	 * @param string $app
	 * @param string $imageName
	 * @return string
	 */
	private function getImagePath($app, $imageName) {
		$webRoot = $this->environmentHelper->getWebRoot();
		if ($app !== '') {
			$appWebPath = \OC_App::getAppWebPath($app);
		} else {
			$appWebPath = $webRoot;
		}
		$appPath = \substr($appWebPath, \strlen($webRoot));

		$directories = ["/core", ""];

		if ($app) {
			\array_unshift($directories, "$appPath", "/$app");
		}

		$themeDirectory = $this->theme->getDirectory();
		foreach ($directories as $directory) {
			$directory = $directory . "/img/";
			$file = $directory . $imageName;

			if ($themeDirectory !== ''
				&& $imagePath = $this->getImagePathOrFallback($this->theme->getBaseDirectory() . '/' . $themeDirectory . $file)
			) {
				return $this->theme->getWebPath() . $file;
			}

			if ($imagePath = $this->getImagePathOrFallback($this->environmentHelper->getServerRoot() . $file)) {
				return $webRoot . $file;
			}
		}
	}

	/**
	 * @param string $file
	 * @return string
	 */
	private function getImagePathOrFallback($file) {
		$fallback = \substr($file, 0, -3) . 'png';
		$locations = [ $file, $fallback ];
		foreach ($locations as $location) {
			if (\file_exists($location)) {
				return $location;
			}
		}
	}

	/**
	 * Makes an URL absolute
	 * @param string $url the url in the ownCloud host
	 * @return string the absolute version of the url
	 */
	public function getAbsoluteURL($url) {
		$webRoot = $this->environmentHelper->getWebRoot();
		$separator = $url[0] === '/' ? '' : '/';

		if (\OC::$CLI && !\defined('PHPUNIT_RUN')) {
			return \rtrim($this->config->getSystemValue('overwrite.cli.url'), '/') . '/' . \ltrim($url, '/');
		}

		// The ownCloud web root can already be prepended.
		$webRoot = \substr($url, 0, \strlen($webRoot)) === $webRoot
			? ''
			: $webRoot;

		$request = \OC::$server->getRequest();
		return $request->getServerProtocol() . '://' . $request->getServerHost() . $webRoot . $separator . $url;
	}

	/**
	 * @param string $key
	 * @return string url to the online documentation
	 */
	public function linkToDocs($key) {
		$theme = new OC_Defaults();
		return $theme->buildDocLinkToKey($key);
	}
}
