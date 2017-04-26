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

namespace OC;
use OC\Theme\Theme;
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
	/** @var Theme */
	private $theme;

	/**
	 * @param IConfig $config
	 * @param ICacheFactory $cacheFactory
	 * @param IRouter $router
	 */
	public function __construct(IConfig $config,
								ICacheFactory $cacheFactory,
								IRouter $router) {
		$this->config = $config;
		$this->cacheFactory = $cacheFactory;
		$this->router = $router;
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
	public function linkTo( $app, $file, $args = []) {
		$frontControllerActive = (getenv('front_controller_active') === 'true');

		if( $app != '' ) {
			$app_path = \OC_App::getAppPath($app);
			// Check if the app is in the app folder
			if ($app_path && file_exists($app_path . '/' . $file)) {
				if (substr($file, -3) == 'php') {

					$urlLinkTo = \OC::$WEBROOT . '/index.php/apps/' . $app;
					if ($frontControllerActive) {
						$urlLinkTo = \OC::$WEBROOT . '/apps/' . $app;
					}
					$urlLinkTo .= ($file != 'index.php') ? '/' . $file : '';
				} else {
					$urlLinkTo = \OC_App::getAppWebPath($app) . '/' . $file;
				}
			} else {
				$urlLinkTo = \OC::$WEBROOT . '/' . $app . '/' . $file;
			}
		} else {
			if (file_exists(\OC::$SERVERROOT . '/core/' . $file)) {
				$urlLinkTo = \OC::$WEBROOT . '/core/' . $file;
			} else {
				if ($frontControllerActive && $file === 'index.php') {
					$urlLinkTo = \OC::$WEBROOT . '/';
				} else {
					$urlLinkTo = \OC::$WEBROOT . '/' . $file;
				}
			}
		}

		if ($args && $query = http_build_query($args, '', '&')) {
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
		if($key = $cache->get($cacheKey)) {
			return $key;
		}

		$path = $this->getImagePath($app, $image);

		if($path !== '' && !is_null($path)) {
			$cache->set($cacheKey, $path);
			return $path;
		} else {
			throw new RuntimeException('image not found: image:' . $image . ' webroot:' . \OC::$WEBROOT . ' serverroot:' . \OC::$SERVERROOT);
		}
	}

	/**
	 * @param string $app
	 * @param string $imageName
	 * @return string
	 */
	private function getImagePath($app, $imageName) {
		$appWebPath = \OC_App::getAppWebPath($app);
		$appPath = substr($appWebPath, strlen(\OC::$WEBROOT));

		$directories = ["/core", ""];

		if ($app) {
			array_unshift($directories, "$appPath", "/$app");
		}

		foreach($directories as $directory) {
			$directory = $directory . "/img/";
			$themeDirectory = $this->theme->getDirectory();

			$file = $directory . $imageName;

			if (!empty($themeDirectory)) {
				if ($imagePath = $this->getImagePathOrFallback('/' . $this->theme->getDirectory() . $file)) {
					return $imagePath;
				}
			}

			if ($imagePath = $this->getImagePathOrFallback($file)) {
				return $imagePath;
			}
		}
	}

	/**
	 * @param string $file
	 * @return string
	 */
	private function getImagePathOrFallback($file) {

		if (file_exists(\OC::$SERVERROOT . $file)) {
			return \OC::$WEBROOT . $file;
		}

		$fallback = substr($file, 0, -3) . 'png';

		if (file_exists(\OC::$SERVERROOT . $fallback)) {
			return \OC::$WEBROOT . $fallback;
		}
	}

	/**
	 * Makes an URL absolute
	 * @param string $url the url in the ownCloud host
	 * @return string the absolute version of the url
	 */
	public function getAbsoluteURL($url) {
		$separator = $url[0] === '/' ? '' : '/';

		if (\OC::$CLI && !defined('PHPUNIT_RUN')) {
			return rtrim($this->config->getSystemValue('overwrite.cli.url'), '/') . '/' . ltrim($url, '/');
		}

		// The ownCloud web root can already be prepended.
		$webRoot = substr($url, 0, strlen(\OC::$WEBROOT)) === \OC::$WEBROOT
			? ''
			: \OC::$WEBROOT;

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
