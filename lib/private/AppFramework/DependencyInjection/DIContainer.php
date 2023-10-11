<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace OC\AppFramework\DependencyInjection;

use OC;
use OC\AppFramework\Http;
use OC\AppFramework\Http\Dispatcher;
use OC\AppFramework\Http\Output;
use OC\AppFramework\Middleware\MiddlewareDispatcher;
use OC\AppFramework\Middleware\Security\CORSMiddleware;
use OC\AppFramework\Middleware\Security\SecurityMiddleware;
use OC\AppFramework\Middleware\SessionMiddleware;
use OC\AppFramework\Utility\SimpleContainer;
use OC\Core\Middleware\AccountModuleMiddleware;
use OC\Core\Middleware\TwoFactorMiddleware;
use OCP\API;
use OCP\App\IServiceLoader;
use OCP\AppFramework\IApi;
use OCP\AppFramework\IAppContainer;
use OCP\Files\Mount\IMountManager;
use OCP\IDateTimeFormatter;

class DIContainer extends SimpleContainer implements IAppContainer {
	private array $middleWares = [];

	/**
	 * Put your class dependencies in here
	 * @param string $appName the name of the app
	 */
	public function __construct($appName, $urlParams = []) {
		parent::__construct();
		$this['AppName'] = $appName;
		$this['urlParams'] = $urlParams;

		/** @var \OC\ServerContainer $server */
		$server = $this->getServer();
		'@phan-var \OC\ServerContainer $server';
		$server->registerAppContainer($appName, $this);

		// aliases
		$this->registerAlias('appName', 'AppName');
		$this->registerAlias('webRoot', 'WebRoot');
		$this->registerAlias('userId', 'UserId');

		/**
		 * Core services
		 */
		$this->registerService(\OCP\IAppConfig::class, fn ($c) => $this->getServer()->getAppConfig());

		$this->registerService(\OCP\App\IAppManager::class, fn ($c) => $this->getServer()->getAppManager());

		$this->registerService(\OCP\License\ILicenseManager::class, fn ($c) => $this->getServer()->getLicenseManager());

		$this->registerService(\OCP\AppFramework\Http\IOutput::class, fn ($c) => new Output($this->getServer()->getWebRoot()));

		$this->registerService(\OCP\IAvatarManager::class, fn ($c) => $this->getServer()->getAvatarManager());

		$this->registerService(\OCP\Activity\IManager::class, fn ($c) => $this->getServer()->getActivityManager());

		$this->registerService(\OCP\ICache::class, fn ($c) => $this->getServer()->getCache());

		$this->registerService(\OCP\ICacheFactory::class, fn ($c) => $this->getServer()->getMemCacheFactory());

		$this->registerService(\OC\CapabilitiesManager::class, function ($c) {
			$server = $this->getServer();
			'@phan-var \OC\Server $server';
			return $server->getCapabilitiesManager();
		});

		$this->registerService(\OCP\Comments\ICommentsManager::class, fn ($c) => $this->getServer()->getCommentsManager());

		$this->registerService(\OCP\IConfig::class, fn ($c) => $this->getServer()->getConfig());

		$this->registerService(\OCP\Contacts\IManager::class, fn ($c) => $this->getServer()->getContactsManager());

		$this->registerService(\OCP\IDateTimeZone::class, fn ($c) => $this->getServer()->getDateTimeZone());

		$this->registerService(\OCP\IDb::class, fn ($c) => $this->getServer()->getDb());

		$this->registerService(\OCP\IDBConnection::class, fn ($c) => $this->getServer()->getDatabaseConnection());

		$this->registerService(\OCP\Diagnostics\IEventLogger::class, fn ($c) => $this->getServer()->getEventLogger());

		$this->registerService(\OCP\Diagnostics\IQueryLogger::class, fn ($c) => $this->getServer()->getQueryLogger());

		$this->registerService(\OCP\Files\IMimeTypeDetector::class, fn ($c) => $this->getServer()->getMimeTypeDetector());

		$this->registerService(\OCP\Files\Config\IMountProviderCollection::class, fn ($c) => $this->getServer()->getMountProviderCollection());

		$this->registerService(\OCP\Files\IRootFolder::class, fn ($c) => $this->getServer()->getRootFolder());

		$this->registerService(\OCP\Http\Client\IClientService::class, fn ($c) => $this->getServer()->getHTTPClientService());

		$this->registerService(\OCP\IGroupManager::class, fn ($c) => $this->getServer()->getGroupManager());

		$this->registerService(\OCP\Http\Client\IClientService::class, fn () => $this->getServer()->getHTTPClientService());

		$this->registerService(\OCP\IL10N::class, fn ($c) => $this->getServer()->getL10N($c->query('AppName')));

		$this->registerService(\OCP\L10N\IFactory::class, fn ($c) => $this->getServer()->getL10NFactory());

		$this->registerService(\OCP\ILogger::class, fn ($c) => $this->getServer()->getLogger());

		$this->registerService(\OCP\BackgroundJob\IJobList::class, fn ($c) => $this->getServer()->getJobList());

		$this->registerAlias(\OCP\AppFramework\Utility\IControllerMethodReflector::class, \OC\AppFramework\Utility\ControllerMethodReflector::class);
		$this->registerAlias('ControllerMethodReflector', \OCP\AppFramework\Utility\IControllerMethodReflector::class);

		$this->registerService(\OCP\Files\IMimeTypeDetector::class, fn ($c) => $this->getServer()->getMimeTypeDetector());

		$this->registerService(\OCP\Mail\IMailer::class, fn () => $this->getServer()->getMailer());

		$this->registerService(\OCP\INavigationManager::class, fn ($c) => $this->getServer()->getNavigationManager());

		$this->registerService(\OCP\Notification\IManager::class, fn ($c) => $this->getServer()->getNotificationManager());

		$this->registerService(\OCP\IPreview::class, fn ($c) => $this->getServer()->getPreviewManager());

		$this->registerService(\OCP\IRequest::class, fn () => $this->getServer()->getRequest());
		$this->registerAlias('Request', \OCP\IRequest::class);

		$this->registerService(\OCP\ITagManager::class, fn ($c) => $this->getServer()->getTagManager());

		$this->registerService(\OCP\ITempManager::class, fn ($c) => $this->getServer()->getTempManager());

		$this->registerAlias(\OCP\AppFramework\Utility\ITimeFactory::class, \OC\AppFramework\Utility\TimeFactory::class);
		$this->registerAlias('TimeFactory', \OCP\AppFramework\Utility\ITimeFactory::class);

		$this->registerService(\OCP\Route\IRouter::class, fn ($c) => $this->getServer()->getRouter());

		$this->registerService(\OCP\ISearch::class, fn ($c) => $this->getServer()->getSearch());

		$this->registerService(\OCP\ISearch::class, fn ($c) => $this->getServer()->getSearch());

		$this->registerService(\OCP\Security\ICrypto::class, fn ($c) => $this->getServer()->getCrypto());

		$this->registerService(\OCP\Security\IHasher::class, fn ($c) => $this->getServer()->getHasher());

		$this->registerService(\OCP\Security\ICredentialsManager::class, fn ($c) => $this->getServer()->getCredentialsManager());

		$this->registerService(\OCP\Security\ISecureRandom::class, fn ($c) => $this->getServer()->getSecureRandom());

		$this->registerService(\OCP\Share\IManager::class, fn ($c) => $this->getServer()->getShareManager());

		$this->registerService(\OCP\SystemTag\ISystemTagManager::class, fn () => $this->getServer()->getSystemTagManager());

		$this->registerService(\OCP\SystemTag\ISystemTagObjectMapper::class, fn () => $this->getServer()->getSystemTagObjectMapper());

		$this->registerService(\OCP\IURLGenerator::class, fn ($c) => $this->getServer()->getURLGenerator());

		$this->registerService(\OCP\IUserManager::class, fn ($c) => $this->getServer()->getUserManager());

		$this->registerService(\OCP\IUserSession::class, fn ($c) => $this->getServer()->getUserSession());

		$this->registerService(\OCP\ISession::class, fn ($c) => $this->getServer()->getSession());

		$this->registerService(\OCP\Security\IContentSecurityPolicyManager::class, fn ($c) => $this->getServer()->getContentSecurityPolicyManager());

		$this->registerService('ServerContainer', fn ($c) => $this->getServer());
		$this->registerAlias(\OCP\IServerContainer::class, 'ServerContainer');
		$this->registerAlias(IServiceLoader::class, 'ServerContainer');

		$this->registerService(\Symfony\Component\EventDispatcher\EventDispatcherInterface::class, fn ($c) => $this->getServer()->getEventDispatcher());

		$this->registerService(\OCP\AppFramework\IAppContainer::class, fn ($c) => $c);

		$this->registerService(IDateTimeFormatter::class, fn () => $this->getServer()->getDateTimeFormatter());
		$this->registerService(IMountManager::class, fn () => $this->getServer()->getMountManager());

		// commonly used attributes
		$this->registerService('UserId', fn ($c) => $c->query(\OCP\IUserSession::class)->getSession()->get('user_id'));

		$this->registerService('WebRoot', fn ($c) => $c->query('ServerContainer')->getWebRoot());

		/**
		 * App Framework APIs
		 */
		$this->registerService('API', function ($c) {
			$c->query(\OCP\ILogger::class)->debug(
				'Accessing the API class is deprecated! Use the appropriate ' .
				'services instead!'
			);
			return new API();
		});

		$this->registerService('Protocol', function ($c) {
			/** @var \OC\Server $server */
			$server = $c->query('ServerContainer');
			$protocol = $server->getRequest()->getHttpProtocol();
			return new Http($_SERVER, $protocol);
		});

		$this->registerService('Dispatcher', fn ($c) => new Dispatcher(
			$c['Protocol'],
			$c['MiddlewareDispatcher'],
			$c['ControllerMethodReflector'],
			$c['Request']
		));

		$this->registerService(\OCP\Theme\IThemeService::class, fn ($c) => $this->getServer()->getThemeService());

		/**
		 * Middleware
		 */
		$app = $this;
		$this->registerService('SecurityMiddleware', fn ($c) => new SecurityMiddleware(
			$c['Request'],
			$c['ControllerMethodReflector'],
			$app->getServer()->getNavigationManager(),
			$app->getServer()->getURLGenerator(),
			$app->getServer()->getLogger(),
			$app->getServer()->getUserSession(),
			$c['AppName'],
			$app->isAdminUser(),
			$app->getServer()->getContentSecurityPolicyManager()
		));

		$this->registerService('CORSMiddleware', fn ($c) => new CORSMiddleware(
			$c['Request'],
			$c['ControllerMethodReflector'],
			$c[\OCP\IUserSession::class],
			$c[\OCP\IConfig::class]
		));

		$this->registerService('SessionMiddleware', fn ($c) => new SessionMiddleware(
			$c['Request'],
			$c['ControllerMethodReflector'],
			$app->getServer()->getSession()
		));

		$this->registerService('TwoFactorMiddleware', function (SimpleContainer $c) use ($app) {
			// ToDo: DIServer is in DIContainer and not in SimpleContainer
			/* @phan-suppress-next-line PhanUndeclaredMethod */
			$twoFactorManager = $c->getServer()->getTwoFactorAuthManager();
			$userSession = $app->getServer()->getUserSession();
			$urlGenerator = $app->getServer()->getURLGenerator();
			$reflector = $c['ControllerMethodReflector'];
			$request = $app->getServer()->getRequest();
			return new TwoFactorMiddleware($twoFactorManager, $userSession, $urlGenerator, $reflector, $request);
		});

		$middleWares = &$this->middleWares;
		$this->registerService('MiddlewareDispatcher', function ($c) use (&$middleWares) {
			$dispatcher = new MiddlewareDispatcher();
			$dispatcher->registerMiddleware($c['CORSMiddleware']);
			$dispatcher->registerMiddleware($c['SecurityMiddleware']);
			$dispatcher->registerMiddleware($c['TwoFactorMiddleware']);
			$dispatcher->registerMiddleware($c->query(AccountModuleMiddleware::class));

			foreach ($middleWares as $middleWare) {
				$dispatcher->registerMiddleware($c[$middleWare]);
			}

			$dispatcher->registerMiddleware($c['SessionMiddleware']);
			return $dispatcher;
		});
	}

	/**
	 * @deprecated implements only deprecated methods
	 * @return IApi
	 */
	public function getCoreApi() {
		return $this->query('API');
	}

	/**
	 * @return \OCP\IServerContainer
	 */
	public function getServer() {
		return OC::$server;
	}

	/**
	 * @param string $middleWare
	 * @return boolean|null
	 */
	public function registerMiddleWare($middleWare) {
		\array_push($this->middleWares, $middleWare);
	}

	/**
	 * used to return the appname of the set application
	 * @return string the name of your application
	 */
	public function getAppName() {
		return $this->query('AppName');
	}

	/**
	 * @deprecated use IUserSession->isLoggedIn()
	 * @return boolean
	 */
	public function isLoggedIn() {
		return $this->getServer()->getUserSession()->isLoggedIn();
	}

	/**
	 * @deprecated use IGroupManager->isAdmin($userId)
	 * @return boolean
	 */
	public function isAdminUser() {
		$uid = $this->getUserId();
		return \OC_User::isAdminUser($uid);
	}

	private function getUserId() {
		return $this->getServer()->getSession()->get('user_id');
	}

	/**
	 * @deprecated use the ILogger instead
	 * @param string $message
	 * @param string $level
	 * @return mixed
	 */
	public function log($message, $level) {
		switch ($level) {
			case 'debug':
				$level = \OCP\Util::DEBUG;
				break;
			case 'info':
				$level = \OCP\Util::INFO;
				break;
			case 'warn':
				$level = \OCP\Util::WARN;
				break;
			case 'fatal':
				$level = \OCP\Util::FATAL;
				break;
			default:
				$level = \OCP\Util::ERROR;
				break;
		}
		\OCP\Util::writeLog($this->getAppName(), $message, $level);
	}

	/**
	 * Register a capability
	 *
	 * @param string $serviceName e.g. 'OCA\Files\Capabilities'
	 */
	public function registerCapability($serviceName) {
		$this->query(\OC\CapabilitiesManager::class)->registerCapability(fn () => $this->query($serviceName));
	}
}
