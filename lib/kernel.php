<?php
/**
 * @author Adam Williamson <awilliam@redhat.com>
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author davidgumberg <davidnoizgumberg@gmail.com>
 * @author Florin Peter <github@florin-peter.de>
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Hugo Gonzalez Labrador <hglavra@gmail.com>
 * @author Individual IT Services <info@individual-it.net>
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Joachim Bauch <bauch@struktur.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Martin Mattel <martin.mattel@diemattels.at>
 * @author Michael Gapczynski <GapczynskiM@gmail.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author neumann <node512@gmail.com>
 * @author Owen Winkler <a_github@midnightcircus.com>
 * @author Phil Davis <phil.davis@inf.org>
 * @author Ramiro Aparicio <rapariciog@gmail.com>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Roeland Jago Douma <rullzer@users.noreply.github.com>
 * @author scolebrook <scolebrook@mac.com>
 * @author Stefan Weil <sw@weilnetz.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Thomas Tanghus <thomas@tanghus.net>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author Volkan Gezer <volkangezer@gmail.com>
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

use OC\Autoloader;
use OCP\IRequest;

require_once 'public/Constants.php';

/**
 * Class that is a namespace for all global OC variables
 * No, we can not put this class in its own file because it is used by
 * OC_autoload!
 */
/** @codeCoverageIgnore */
class OC {
	/**
	 * Associative array for autoloading. classname => filename
	 */
	public static $CLASSPATH = [];
	/**
	 * The installation path for owncloud on the server (e.g. /srv/http/owncloud)
	 */
	public static $SERVERROOT = '';
	/**
	 * the current request path relative to the owncloud root (e.g. files/index.php)
	 */
	private static $SUBURI = '';
	/**
	 * the owncloud root path for http requests (e.g. owncloud/)
	 */
	public static $WEBROOT = '';
	/**
	 * The installation path array of the apps folder on the server (e.g. /srv/http/owncloud) 'path' and
	 * web path in 'url'
	 */
	public static $APPSROOTS = [];

	/**
	 * @var string
	 */
	public static $configDir;

	/**
	 * requested app
	 */
	public static $REQUESTEDAPP = '';

	/**
	 * check if ownCloud runs in cli mode
	 */
	public static $CLI = false;

	/**
	 * @var Autoloader $loader
	 */
	public static $loader = null;

	/** @var \Composer\Autoload\ClassLoader $composerAutoloader */
	public static $composerAutoloader = null;

	/**
	 * @var \OC\Server
	 */
	public static $server = null;

	/**
	 * @var \OC\Config
	 */
	private static $config = null;

	/**
	 * @throws \RuntimeException when the app path list is empty or contains an invalid path
	 */
	public static function initPaths() {
		if (\defined('PHPUNIT_CONFIG_DIR')) {
			self::$configDir = OC::$SERVERROOT . '/' . PHPUNIT_CONFIG_DIR . '/';
		} elseif (\defined('PHPUNIT_RUN') and PHPUNIT_RUN and \is_dir(OC::$SERVERROOT . '/tests/config/')) {
			self::$configDir = OC::$SERVERROOT . '/tests/config/';
		} else {
			self::$configDir = OC::$SERVERROOT . '/config/';
		}
		self::$config = new \OC\Config(self::$configDir);

		OC::$SUBURI = \str_replace("\\", "/", \substr(\realpath($_SERVER["SCRIPT_FILENAME"]), \strlen(OC::$SERVERROOT)));
		/**
		 * FIXME: The following lines are required because we can't yet instantiate
		 *        \OC::$server->getRequest() since \OC::$server does not yet exist.
		 */
		$params = [
			'server' => [
				'SCRIPT_NAME' => $_SERVER['SCRIPT_NAME'],
				'SCRIPT_FILENAME' => $_SERVER['SCRIPT_FILENAME'],
			],
		];
		/**
		 * The event dispatcher added here will not be used to listen any event.
		 * So if the modifications made in the configuration, by fakeRequest
		 * will not throw events.
		 */
		$fakeRequest = new \OC\AppFramework\Http\Request(
			$params,
			null,
			new \OC\AllConfig(
				new \OC\SystemConfig(self::$config),
				new \Symfony\Component\EventDispatcher\EventDispatcher()
			)
		);
		$scriptName = $fakeRequest->getScriptName();
		if (\substr($scriptName, -1) == '/') {
			$scriptName .= 'index.php';
			//make sure suburi follows the same rules as scriptName
			if (\substr(OC::$SUBURI, -9) != 'index.php') {
				if (\substr(OC::$SUBURI, -1) != '/') {
					OC::$SUBURI = OC::$SUBURI . '/';
				}
				OC::$SUBURI = OC::$SUBURI . 'index.php';
			}
		}

		if (OC::$CLI) {
			OC::$WEBROOT = self::$config->getValue('overwritewebroot', '');
		} else {
			if (\substr($scriptName, 0 - \strlen(OC::$SUBURI)) === OC::$SUBURI) {
				OC::$WEBROOT = \substr($scriptName, 0, 0 - \strlen(OC::$SUBURI));

				if (OC::$WEBROOT != '' && OC::$WEBROOT[0] !== '/') {
					OC::$WEBROOT = '/' . OC::$WEBROOT;
				}
			} else {
				// The scriptName is not ending with OC::$SUBURI
				// This most likely means that we are calling from CLI.
				// However some cron jobs still need to generate
				// a web URL, so we use overwritewebroot as a fallback.
				OC::$WEBROOT = self::$config->getValue('overwritewebroot', '');
			}

			// Resolve /owncloud to /owncloud/ to ensure to always have a trailing
			// slash which is required by URL generation.
			if ($_SERVER['REQUEST_URI'] === \OC::$WEBROOT &&
					\substr($_SERVER['REQUEST_URI'], -1) !== '/') {
				\header('Location: '.\OC::$WEBROOT.'/');
				exit();
			}
		}

		// search the apps folder
		$config_paths = self::$config->getValue('apps_paths', []);
		if (!empty($config_paths)) {
			foreach ($config_paths as $paths) {
				if (isset($paths['url'], $paths['path'])) {
					$paths['url'] = \rtrim($paths['url'], '/');
					$paths['path'] = \rtrim($paths['path'], '/');
					OC::$APPSROOTS[] = $paths;
				}
			}
		} elseif (\file_exists(OC::$SERVERROOT . '/apps')) {
			OC::$APPSROOTS[] = ['path' => OC::$SERVERROOT . '/apps', 'url' => '/apps', 'writable' => true];
		} elseif (\file_exists(OC::$SERVERROOT . '/../apps')) {
			OC::$APPSROOTS[] = [
				'path' => \rtrim(\dirname(OC::$SERVERROOT), '/') . '/apps',
				'url' => '/apps',
				'writable' => true
			];
		}

		if (empty(OC::$APPSROOTS)) {
			throw new \RuntimeException('apps directory not found! Please put the ownCloud apps folder in the ownCloud folder'
				. ' or the folder above. You can also configure the location in the config.php file.');
		}
		$paths = [];
		foreach (OC::$APPSROOTS as $path) {
			$paths[] = $path['path'];
			if (!\is_dir($path['path'])) {
				throw new \RuntimeException(\sprintf('App directory "%s" not found! Please put the ownCloud apps folder in the'
					. ' ownCloud folder or the folder above. You can also configure the location in the'
					. ' config.php file.', $path['path']));
			}
		}

		// set the right include path
		\set_include_path(
			\implode(PATH_SEPARATOR, $paths)
		);
	}

	public static function checkConfig() {
		$l = \OC::$server->getL10N('lib');

		// Create config if it does not already exist
		$configFilePath = self::$configDir .'/config.php';
		if (!\file_exists($configFilePath)) {
			@\touch($configFilePath);
		}

		// Check if config is writable
		$configFileWritable = \is_writable($configFilePath);
		if (!$configFileWritable && !\OC::$server->getConfig()->isSystemConfigReadOnly()
			|| !$configFileWritable && self::checkUpgrade(false)) {
			$urlGenerator = \OC::$server->getURLGenerator();

			if (self::$CLI) {
				echo $l->t('Cannot write into "config" directory!')."\n";
				echo $l->t('This can usually be fixed by giving the webserver write access to the config directory')."\n";
				echo "\n";
				echo $l->t('See %s', [ $urlGenerator->linkToDocs('admin-dir_permissions') ])."\n";
				exit(1);
			} else {
				OC_Template::printErrorPage(
					$l->t('Cannot write into "config" directory!'),
					$l->t(
						'This can usually be fixed by '
					. '%sgiving the webserver write access to the config directory%s.',
						['<a href="' . $urlGenerator->linkToDocs('admin-dir_permissions') . '" target="_blank" rel="noreferrer">', '</a>']
					)
				);
			}
		}
	}

	public static function checkInstalled() {
		if (\defined('OC_CONSOLE')) {
			return;
		}
		// Redirect to installer if not installed
		if (!\OC::$server->getSystemConfig()->getValue('installed', false) && OC::$SUBURI != '/index.php') {
			if (OC::$CLI) {
				throw new Exception('Not installed');
			} else {
				$url = OC::$WEBROOT . '/index.php';
				\header('Location: ' . $url);
			}
			exit();
		}
	}

	/**
	 * Limit maintenance mode access
	 * @param IRequest $request
	 */
	public static function checkMaintenanceMode(IRequest $request) {
		// Check if requested URL matches 'index.php/occ'
		$isOccControllerRequested = \preg_match('|/index\.php$|', $request->getScriptName()) === 1
				&& \strpos($request->getPathInfo(), '/occ/') === 0;
		// Allow ajax update script to execute without being stopped
		if (
			\OC::$server->getSystemConfig()->getValue('maintenance', false)
			&& OC::$SUBURI != '/core/ajax/update.php'
			&& !$isOccControllerRequested
		) {
			// send http status 503
			\http_response_code(503);
			\header('Status: 503 Service Temporarily Unavailable');
			\header('Retry-After: 120');

			// render error page
			$template = new OC_Template('', 'update.user', 'guest');
			OC_Util::addScript('maintenance-check');
			$template->printPage();
			die();
		}
	}

	public static function checkSingleUserMode($lockIfNoUserLoggedIn = false) {
		if (!\OC::$server->getSystemConfig()->getValue('singleuser', false)) {
			return;
		}
		$user = OC_User::getUserSession()->getUser();
		if ($user) {
			$group = \OC::$server->getGroupManager()->get('admin');
			if ($group->inGroup($user)) {
				return;
			}
		} else {
			if (!$lockIfNoUserLoggedIn) {
				return;
			}
		}
		// send http status 503
		\http_response_code(503);
		\header('Status: 503 Service Temporarily Unavailable');
		\header('Retry-After: 120');

		// render error page
		$template = new OC_Template('', 'singleuser.user', 'guest');
		$template->printPage();
		die();
	}

	/**
	 * Checks if the version requires an update and shows
	 * @param bool $showTemplate Whether an update screen should get shown
	 * @return bool
	 */
	public static function checkUpgrade($showTemplate = true) {
		if (\OCP\Util::needUpgrade()) {
			$systemConfig = \OC::$server->getSystemConfig();
			if ($showTemplate && !$systemConfig->getValue('maintenance', false)) {
				self::printUpgradePage();
				exit();
			} else {
				return true;
			}
		}
		return false;
	}

	/**
	 * Prints the upgrade page
	 */
	private static function printUpgradePage() {
		$systemConfig = \OC::$server->getSystemConfig();

		$disableWebUpdater = $systemConfig->getValue('upgrade.disable-web', false);
		$tooBig = false;
		if (!$disableWebUpdater) {
			$apps = \OC::$server->getAppManager();
			$tooBig = $apps->isInstalled('user_ldap') || $apps->isInstalled('user_shibboleth');
			if (!$tooBig) {
				// count users
				$db = new \OC\User\Database();
				$tooBig = ($db->countUsers() > 50);
			}
		}
		if ($disableWebUpdater || $tooBig) {
			// send http status 503
			\http_response_code(503);
			\header('Status: 503 Service Temporarily Unavailable');
			\header('Retry-After: 120');

			// render error page
			$template = new OC_Template('', 'update.use-cli', 'guest');
			$template->assign('productName', 'ownCloud'); // for now
			$template->assign('version', OC_Util::getVersionString());
			$template->assign('tooBig', $tooBig);

			$template->printPage();
			die();
		}

		// check whether this is a core update or apps update
		$installedVersion = $systemConfig->getValue('version', '0.0.0');
		$currentVersion = \implode('.', \OCP\Util::getVersion());

		// if not a core upgrade, then it's apps upgrade
		$isAppsOnlyUpgrade = (\version_compare($currentVersion, $installedVersion, '='));

		$oldTheme = $systemConfig->getValue('theme');
		$systemConfig->setValue('theme', '');
		\OCP\Util::addScript('config'); // needed for web root
		\OCP\Util::addScript('update');
		\OCP\Util::addStyle('update');

		/** @var \OC\App\AppManager $appManager */
		$appManager = \OC::$server->getAppManager();
		'@phan-var \OC\App\AppManager $appManager';

		$tmpl = new OC_Template('', 'update.admin', 'guest');
		$tmpl->assign('version', OC_Util::getVersionString());
		$tmpl->assign('isAppsOnlyUpgrade', $isAppsOnlyUpgrade);

		// get third party apps
		$ocVersion = \OCP\Util::getVersion();
		$tmpl->assign('appsToUpgrade', $appManager->getAppsNeedingUpgrade($ocVersion));
		$tmpl->assign('productName', 'ownCloud'); // for now
		$tmpl->assign('oldTheme', $oldTheme);
		$tmpl->printPage();
	}

	public static function initSession() {
		// Let the session name be changed in the initSession Hook
		$sessionName = OC_Util::getInstanceId();

		try {
			// Allow session apps to create a custom session object
			$useCustomSession = false;
			$session = self::$server->getSession();
			OC_Hook::emit('OC', 'initSession', ['session' => &$session, 'sessionName' => &$sessionName, 'useCustomSession' => &$useCustomSession]);
			if (!$useCustomSession) {
				// set the session name to the instance id - which is unique
				$session = new \OC\Session\Internal($sessionName);
			}

			$cryptoWrapper = \OC::$server->getSessionCryptoWrapper();
			$cryptoWrapper->sendCookie(self::$server->getConfig());
			$session = $cryptoWrapper->wrapSession($session);
			self::$server->setSession($session);

			// if session can't be started break with http 500 error
		} catch (Exception $e) {
			\OCP\Util::logException('base', $e);
			//show the user a detailed error page
			OC_Response::setStatus(OC_Response::STATUS_INTERNAL_SERVER_ERROR);
			OC_Template::printExceptionErrorPage($e);
			die();
		}

		$sessionLifeTime = self::getSessionLifeTime();

		if (!$session->exists('LAST_ACTIVITY')) {
			// if this is a new session, invalidate any previously stored auth token.
			// this could happen if the session disappears / expires in the server but the user
			// didn't log out explicitly
			if (\OC::$server->getUserSession() !== null) {
				// web installer doesn't have a valid userSession at this point
				\OC::$server->getUserSession()->invalidateSessionToken();
			}
		} else {
			if (\time() - $session->get('LAST_ACTIVITY') > $sessionLifeTime) {
				// session timeout
				\OC::$server->getUserSession()->logout();
				if (isset($_COOKIE[\session_name()])) {
					\setcookie(\session_name(), null, -1, self::$WEBROOT ? : '/');
				}
			}
		}

		$session->set('LAST_ACTIVITY', \time());
	}

	/**
	 * @return string
	 */
	private static function getSessionLifeTime() {
		return \OC::$server->getConfig()->getSystemValue('session_lifetime', 60 * 20);
	}

	public static function loadAppClassPaths() {
		foreach (OC_App::getEnabledApps() as $app) {
			$appPath = OC_App::getAppPath($app);
			if ($appPath === false) {
				continue;
			}

			$file = $appPath . '/appinfo/classpath.php';
			if (\file_exists($file)) {
				require_once $file;
			}
		}
	}

	/**
	 * Try to set some values to the required ownCloud default
	 */
	public static function setRequiredIniValues() {
		@\ini_set('default_charset', 'UTF-8');
		@\ini_set('gd.jpeg_ignore_warning', 1);
	}

	public static function init() {
		// calculate the root directories
		OC::$SERVERROOT = \str_replace("\\", '/', \substr(__DIR__, 0, -4));

		// register autoloader
		$loaderStart = \microtime(true);
		self::$CLI = (\in_array(\php_sapi_name(), ['cli', 'phpdbg']));

		// setup composer autoloader
		$vendorAutoLoad = OC::$SERVERROOT . '/lib/composer/autoload.php';
		if (!\file_exists($vendorAutoLoad)) {
			\printf('Composer autoloader not found, unable to continue. Please run "make".');
			exit();
		}

		// Add default composer PSR-4 autoloader
		self::$composerAutoloader = require $vendorAutoLoad;
		if (!self::$composerAutoloader) {
			print('Composer autoloader not found!');
			exit();
		}
		self::$loader = new Autoloader();
		if (\defined('PHPUNIT_RUN')) {
			self::$loader->addValidRoot(OC::$SERVERROOT . '/tests');
		}
		\spl_autoload_register([self::$loader, 'load']);
		$loaderEnd = \microtime(true);

		try {
			self::initPaths();
		} catch (\RuntimeException $e) {
			if (!self::$CLI) {
				// can`t use OC_Response::setStatus because server is not
				// initialized here
				\http_response_code(OC_Response::STATUS_SERVICE_UNAVAILABLE);
			}
			// we can't use the template error page here, because this needs the
			// DI container which isn't available yet
			print($e->getMessage());
			exit(1);
		}

		// setup the basic server
		self::$server = new \OC\Server(\OC::$WEBROOT, self::$config);
		\OC::$server->getEventLogger()->log('autoloader', 'Autoloader', $loaderStart, $loaderEnd);
		\OC::$server->getEventLogger()->start('boot', 'Initialize');

		// Don't display errors and log them
		\error_reporting(E_ALL | E_STRICT);
		@\ini_set('display_errors', 0);
		@\ini_set('log_errors', 1);

		if (!\date_default_timezone_set('UTC')) {
			self::$server->getLogger()->error('Could not set timezone to UTC');
		}

		// try to configure php to enable big file uploads.
		// this doesn't work always depending on the webserver and php configuration.
		// Let´s try to overwrite some defaults anyway

		//try to set the maximum execution time to 60min
		@\set_time_limit(3600);
		@\ini_set('max_execution_time', 3600);
		@\ini_set('max_input_time', 3600);

		//try to set the maximum filesize to 10G
		@\ini_set('upload_max_filesize', '10G');
		@\ini_set('post_max_size', '10G');
		@\ini_set('file_uploads', '50');

		// disable phar handler in web requests
		if (!self::$CLI) {
			stream_wrapper_unregister("phar");
		}

		self::setRequiredIniValues();
		self::handleAuthHeaders();
		self::registerAutoloaderCache();

		OC_Util::isSetLocaleWorking();

		if (!\defined('PHPUNIT_RUN')) {
			OC\Log\ErrorHandler::setLogger(\OC::$server->getLogger());
			$debug = \OC::$server->getConfig()->getSystemValue('debug', false);
			OC\Log\ErrorHandler::register($debug);
		}

		// register the stream wrappers
		\stream_wrapper_register('fakedir', 'OC\Files\Stream\Dir');
		\stream_wrapper_register('static', 'OC\Files\Stream\StaticStream');
		\stream_wrapper_register('close', 'OC\Files\Stream\Close');
		\stream_wrapper_register('quota', 'OC\Files\Stream\Quota');

		\OC::$server->getEventLogger()->start('init_session', 'Initialize session');
		OC_App::loadApps(['session', 'theme']);
		if (!self::$CLI) {
			self::initSession();
		}
		OC_App::loadApps(['license']);

		\OC::$server->getEventLogger()->end('init_session');

		// incognito mode for now
		$uid = \OC::$server->getSession()->get('user_id');
		\OC::$server->getSession()->set('user_id', null);

		self::checkConfig();
		self::checkInstalled();

		OC_Response::addSecurityHeaders();

		if (!\defined('OC_CONSOLE')) {
			$errors = OC_Util::checkServer(\OC::$server->getConfig());
			if (\count($errors) > 0) {
				if (self::$CLI) {
					// Convert l10n string into regular string for usage in database
					$staticErrors = [];
					foreach ($errors as $error) {
						echo $error['error'] . "\n";
						echo $error['hint'] . "\n\n";
						$staticErrors[] = [
							'error' => (string)$error['error'],
							'hint' => (string)$error['hint'],
						];
					}

					try {
						\OC::$server->getConfig()->setAppValue('core', 'cronErrors', \json_encode($staticErrors));
					} catch (\Exception $e) {
						echo('Writing to database failed');
					}
					exit(1);
				} else {
					OC_Response::setStatus(OC_Response::STATUS_SERVICE_UNAVAILABLE);
					OC_Template::printGuestPage('', 'error', ['errors' => $errors]);
					exit;
				}
			} elseif (self::$CLI && \OC::$server->getConfig()->getSystemValue('installed', false)) {
				\OC::$server->getConfig()->deleteAppValue('core', 'cronErrors');
			}
		}

		// set back user
		\OC::$server->getSession()->set('user_id', $uid);

		$systemConfig = \OC::$server->getSystemConfig();

		// User and Groups
		if ($systemConfig->getValue("installed", false)) {
			OC_User::useBackend(new \OC\User\Database());
			\OC::$server->getGroupManager()->addBackend(new \OC\Group\Database());
		} else {
			self::$server->getSession()->set('user_id', '');
		}

		// Subscribe to the hook
		\OCP\Util::connectHook(
			'\OCA\Files_Sharing\API\Server2Server',
			'preLoginNameUsedAsUserName',
			'\OC\User\Database',
			'preLoginNameUsedAsUserName'
		);

		//setup extra user backends
		if (!self::checkUpgrade(false)) {
			OC_User::setupBackends();
		} else {
			// Run upgrades in incognito mode
			OC_User::setIncognitoMode(true);
		}

		self::registerCacheHooks();
		self::registerFilesystemHooks();
		if ($systemConfig->getValue('enable_previews', true)) {
			OC_Hook::connect('OC_Filesystem', 'post_write', 'OC\Preview', 'post_write');
		}
		self::registerShareHooks();
		self::registerLogRotate();
		if ($systemConfig->getValue("installed", false)) {
			self::registerEncryptionWrapper();
			self::registerEncryptionHooks();
		}

		//make sure temporary files are cleaned up
		\OC::$server->getShutdownHandler()->register(function () {
			$tmpManager = \OC::$server->getTempManager();
			$tmpManager->clean();
		});
		\OC::$server->getShutdownHandler()->register(function () {
			$lockProvider = \OC::$server->getLockingProvider();
			$lockProvider->releaseAll();
		});
		$debug = \OC::$server->getConfig()->getSystemValue('debug', false);
		if ($debug) {
			\OC::$server->getShutdownHandler()->register(function () {
				$queries = \OC::$server->getQueryLogger()->getQueries();
				\OC::$server->getLogger()->debug("SQL query log", [
					'app' => 'core/sql',
					'extraFields' => [
						'queries' => $queries
					]
				]);
			});
		}

		// Check whether the sample configuration has been copied
		if ($systemConfig->getValue('copied_sample_config', false)) {
			$l = \OC::$server->getL10N('lib');
			\http_response_code(503);
			\header('Status: 503 Service Temporarily Unavailable');
			OC_Template::printErrorPage(
				$l->t('Sample configuration detected'),
				$l->t('It has been detected that the sample configuration has been copied. This can break your installation and is unsupported. Please read the documentation before performing changes on config.php')
			);
			return;
		}

		$request = \OC::$server->getRequest();
		$host = $request->getInsecureServerHost();
		/**
		 * if the host passed in headers isn't trusted
		 * FIXME: Should not be in here at all :see_no_evil:
		 */
		if (!OC::$CLI
			// overwritehost is always trusted, workaround to not have to make
			// \OC\AppFramework\Http\Request::getOverwriteHost public
			&& self::$server->getConfig()->getSystemValue('overwritehost') === ''
			&& !\OC::$server->getTrustedDomainHelper()->isTrustedDomain($host)
			&& self::$server->getConfig()->getSystemValue('installed', false)
		) {
			\http_response_code(400);
			\header('Status: 400 Bad Request');

			\OC::$server->getLogger()->warning(
				'Trusted domain error. "{remoteAddress}" tried to access using "{host}" as host.',
				[
						'app' => 'core',
						'remoteAddress' => $request->getRemoteAddress(),
						'host' => $host,
					]
			);

			$tmpl = new OCP\Template('core', 'untrustedDomain', 'guest');
			$tmpl->assign('domain', $host);
			$tmpl->printPage();

			exit();
		}
		\OC::$server->getEventLogger()->end('boot');
	}

	/**
	 * register hooks for the cache
	 */
	public static function registerCacheHooks() {
		//don't try to do this before we are properly setup
		if (\OC::$server->getSystemConfig()->getValue('installed', false) && !self::checkUpgrade(false)) {
			// NOTE: This will be replaced to use OCP
			$userSession = self::$server->getUserSession();
			$userSession->listen('\OC\User', 'postLogin', function () {
				try {
					$cache = new \OC\Cache\File();
					$cache->gc();
				} catch (\OC\ServerNotAvailableException $e) {
					// not a GC exception, pass it on
					throw $e;
				} catch (\Exception $e) {
					// a GC exception should not prevent users from using OC,
					// so log the exception
					\OC::$server->getLogger()->warning('Exception when running cache gc: ' . $e->getMessage(), ['app' => 'core']);
				}
			});
		}
	}

	private static function registerEncryptionWrapper() {
		$manager = self::$server->getEncryptionManager();
		\OCP\Util::connectHook('OC_Filesystem', 'preSetup', $manager, 'setupStorage');
	}

	private static function registerEncryptionHooks() {
		$enabled = self::$server->getEncryptionManager()->isEnabled();
		//Call share hooks if they are not masterkey
		if ($enabled &&
			(\OC::$server->getConfig()->getAppValue('encryption', 'useMasterKey', '0') === '0')) {
			\OCP\Util::connectHook('OCP\Share', 'post_shared', 'OC\Encryption\HookManager', 'postShared');
			\OCP\Util::connectHook('OCP\Share', 'post_unshare', 'OC\Encryption\HookManager', 'postUnshared');
			\OCP\Util::connectHook('OC_Filesystem', 'post_rename', 'OC\Encryption\HookManager', 'postRename');
			\OCP\Util::connectHook('\OCA\Files_Trashbin\Trashbin', 'post_restore', 'OC\Encryption\HookManager', 'postRestore');
		}
	}

	/**
	 * register hooks for the cache
	 */
	public static function registerLogRotate() {
		$systemConfig = \OC::$server->getSystemConfig();
		if ($systemConfig->getValue('installed', false) && $systemConfig->getValue('log_rotate_size', false) && !self::checkUpgrade(false)) {
			//don't try to do this before we are properly setup
			//use custom logfile path if defined, otherwise use default of owncloud.log in data directory
			self::$server->getJobList()->add('OC\Log\Rotate', $systemConfig->getValue('logfile', $systemConfig->getValue('datadirectory', OC::$SERVERROOT . '/data') . '/owncloud.log'));
		}
	}

	/**
	 * register hooks for the filesystem
	 */
	public static function registerFilesystemHooks() {
		// Check for blacklisted files
		OC_Hook::connect('OC_Filesystem', 'write', 'OC\Files\Filesystem', 'isForbiddenFileOrDir_Hook');
		OC_Hook::connect('OC_Filesystem', 'rename', 'OC\Files\Filesystem', 'isForbiddenFileOrDir_Hook');
	}

	/**
	 * register hooks for sharing
	 */
	public static function registerShareHooks() {
		if (\OC::$server->getSystemConfig()->getValue('installed')) {
			OC_Hook::connect('OC_User', 'post_deleteUser', 'OC\Share20\Hooks', 'post_deleteUser');
			OC_Hook::connect('OC_User', 'post_removeFromGroup', 'OC\Share20\Hooks', 'post_removeFromGroup');
			OC_Hook::connect('OC_User', 'post_deleteGroup', 'OC\Share20\Hooks', 'post_deleteGroup');
		}
	}

	protected static function registerAutoloaderCache() {
		// The class loader takes an optional low-latency cache, which MUST be
		// namespaced. The instanceid is used for namespacing, but might be
		// unavailable at this point. Furthermore, it might not be possible to
		// generate an instanceid via \OC_Util::getInstanceId() because the
		// config file may not be writable. As such, we only register a class
		// loader cache if instanceid is available without trying to create one.
		$instanceId = \OC::$server->getSystemConfig()->getValue('instanceid', null);
		if ($instanceId) {
			try {
				$memcacheFactory = \OC::$server->getMemCacheFactory();
				'@phan-var \OC\MemCache\Factory $memcacheFactory';
				self::$loader->setMemoryCache($memcacheFactory->createLocal('Autoloader'));
			} catch (\Exception $ex) {
			}
		}
	}

	/**
	 * Handle the request
	 */
	public static function handleRequest() {
		\OC::$server->getEventLogger()->start('handle_request', 'Handle request');
		$systemConfig = \OC::$server->getSystemConfig();
		// load all the classpaths from the enabled apps so they are available
		// in the routing files of each app
		OC::loadAppClassPaths();

		// Check if ownCloud is installed or in maintenance (update) mode
		if (!$systemConfig->getValue('installed', false)) {
			\OC::$server->getSession()->clear();
			$setupHelper = new OC\Setup(
				\OC::$server->getConfig(),
				\OC::$server->getIniWrapper(),
				\OC::$server->getL10N('lib'),
				new \OC_Defaults(),
				\OC::$server->getLogger(),
				\OC::$server->getSecureRandom()
			);

			$controller = new OC\Core\Controller\SetupController($setupHelper);
			$controller->run($_POST);
			exit();
		}

		$request = \OC::$server->getRequest();
		// Check if requested URL matches 'index.php/occ'
		$isOccControllerRequested = \preg_match('|/index\.php$|', $request->getScriptName()) === 1
			&& \strpos($request->getPathInfo(), '/occ/') === 0;

		$needUpgrade = false;
		$requestPath = $request->getRawPathInfo();
		if (\substr($requestPath, -3) !== '.js') { // we need these files during the upgrade
			self::checkMaintenanceMode($request);
			$needUpgrade = self::checkUpgrade(!$isOccControllerRequested);
		}

		// emergency app disabling
		if ($requestPath === '/disableapp'
			&& $request->getMethod() === 'POST'
			&& ((string)$request->getParam('appid')) !== ''
		) {
			\OCP\JSON::callCheck();
			\OCP\JSON::checkAdminUser();
			$appId = (string)$request->getParam('appid');
			$appId = \OC_App::cleanAppId($appId);

			\OC_App::disable($appId);
			\OC_JSON::success();
			exit();
		}

		try {
			// Always load authentication apps
			OC_App::loadApps(['authentication']);
		} catch (\OC\NeedsUpdateException $e) {
			if ($isOccControllerRequested && $needUpgrade) {
				OC::$server->getRouter()->match(\OC::$server->getRequest()->getRawPathInfo());
				return;
			}
			throw $e;
		}

		// Load minimum set of apps
		if (!self::checkUpgrade(false)
			&& !$systemConfig->getValue('maintenance', false)) {
			// For logged-in users: Load everything
			$userSession = \OC::$server->getUserSession();
			if ($userSession->isLoggedIn() && $userSession->verifyAuthHeaders($request)) {
				OC_App::loadApps();
			} else {
				// For guests: Load only filesystem and logging
				OC_App::loadApps(['filesystem', 'logging']);
			}
		}

		if (!self::$CLI) {
			try {
				if (!$systemConfig->getValue('maintenance', false) && !self::checkUpgrade(false)) {
					OC_App::loadApps(['filesystem', 'logging']);
					OC_App::loadApps();
				}
				self::checkSingleUserMode();
				OC_Util::setupFS();
				OC::$server->getRouter()->match(\OC::$server->getRequest()->getRawPathInfo());
				return;
			} catch (\OC\NeedsUpdateException $e) {
				if ($isOccControllerRequested && $needUpgrade) {
					OC::$server->getRouter()->match(\OC::$server->getRequest()->getRawPathInfo());
					return;
				}
				throw $e;
			} catch (Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {
				//http_response_code(404);
			} catch (Symfony\Component\Routing\Exception\MethodNotAllowedException $e) {
				OC_Response::setStatus(405);
				return;
			}
		}

		// Handle WebDAV
		if ($_SERVER['REQUEST_METHOD'] == 'PROPFIND') {
			// not allowed any more to prevent people
			// mounting this root directly.
			// Users need to mount remote.php/webdav instead.
			\http_response_code(405);
			\header('Status: 405 Method Not Allowed');
			return;
		}

		// Someone is logged in
		if ($userSession->isLoggedIn() && $userSession->verifyAuthHeaders($request)) {
			OC_App::loadApps();
			OC_User::setupBackends();
			OC_Util::setupFS();
			// FIXME
			// Redirect to default application
			OC_Util::redirectToDefaultPage();
		} else {
			// Not handled and not logged in
			\header('Location: '.\OC::$server->getURLGenerator()->linkToRouteAbsolute('core.login.showLoginForm'));
		}
	}

	/**
	 * Check login: apache auth, auth token, basic auth
	 *
	 * @param OCP\IRequest $request
	 * @return boolean
	 */
	public static function handleLogin(OCP\IRequest $request) {
		$userSession = self::$server->getUserSession();
		if (OC_User::handleApacheAuth()) {
			return true;
		}
		if ($userSession->tryTokenLogin($request)) {
			return true;
		}
		if ($userSession->tryAuthModuleLogin($request)) {
			return true;
		}
		if ($userSession->tryBasicAuthLogin($request)) {
			return true;
		}
		if ($userSession->tryRememberMeLogin($request)) {
			return true;
		}
		return false;
	}

	protected static function handleAuthHeaders() {
		//copy http auth headers for apache+php-fcgid work around
		if (isset($_SERVER['HTTP_XAUTHORIZATION']) && !isset($_SERVER['HTTP_AUTHORIZATION'])) {
			$_SERVER['HTTP_AUTHORIZATION'] = $_SERVER['HTTP_XAUTHORIZATION'];
		}

		// Extract PHP_AUTH_USER/PHP_AUTH_PW from other headers if necessary.
		$vars = [
			'HTTP_AUTHORIZATION', // apache+php-cgi work around
			'REDIRECT_HTTP_AUTHORIZATION', // apache+php-cgi alternative
		];
		foreach ($vars as $var) {
			if (isset($_SERVER[$var]) && \preg_match('/Basic\s+(.*)$/i', $_SERVER[$var], $matches)) {
				list($name, $password) = \explode(':', \base64_decode($matches[1]), 2);
				$_SERVER['PHP_AUTH_USER'] = $name;
				$_SERVER['PHP_AUTH_PW'] = $password;
				break;
			}
		}
	}

	/**
	 * Log an ownCloud's crash. This means that ownCloud isn't usable and can't log through
	 * normal ownCloud's logger facilities.
	 * This crash log can't use the normal "owncloud.log" file because the ownCloud's logger
	 * requires additional context that can't be easily replicated. We'll use a different file.
	 * The crash log will create a "crash-Y-m-d.log" file in the ownCloud's data directory, unless
	 * the "crashdirectory" is set in the config.php file (make sure the "crashdirectory" exists and
	 * it's writeable for the web server). The filename will be reused for all the crashes that happen
	 * during the same day, and a new one will be used the next day.
	 * The crash file will be created only if needed.
	 *
	 * Note: This is mainly for internal purposes. You're encouraged to use the ownCloud's logger
	 * for anything you need to log.
	 *
	 * @param Throwable $ex
	 */
	public static function crashLog(\Throwable $ex): void {
		$crashDir = self::$SERVERROOT . '/data';
		if (self::$config) {
			$dataDir = self::$config->getValue('datadirectory', self::$SERVERROOT . '/data');
			$crashDir = self::$config->getValue('crashdirectory', $dataDir);
		}

		$filename = "{$crashDir}/crash-" . \date('Y-m-d') . '.log';

		$date = \date('c');
		$currentEntryId = \uniqid(\md5($date), true);
		$entry = [
			'date' => $date,
			'parentId' => null,
			'id' => $currentEntryId,
			'class' => \get_class($ex),
			'message' => $ex->getMessage(),
			'stacktrace' => \array_map(static function ($elem) {
				unset($elem['args'], $elem['type']);
				return $elem;
			}, $ex->getTrace()),
		];
		\file_put_contents($filename, \json_encode($entry, JSON_PRETTY_PRINT) . PHP_EOL, FILE_APPEND | LOCK_EX);

		while (($ex = $ex->getPrevious()) !== null) {
			$previousEntryId = $currentEntryId;
			$currentEntryId = \uniqid(\md5($date), true);
			$entry = [
				'date' => $date,
				'parentId' => $previousEntryId,
				'id' => $currentEntryId,
				'class' => \get_class($ex),
				'message' => $ex->getMessage(),
				'stacktrace' => \array_map(static function ($elem) {
					unset($elem['args'], $elem['type']);
					return $elem;
				}, $ex->getTrace()),
			];
			\file_put_contents($filename, \json_encode($entry, JSON_PRETTY_PRINT) . PHP_EOL, FILE_APPEND | LOCK_EX);
		}
	}
}

OC::init();
