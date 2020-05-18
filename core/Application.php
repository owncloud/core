<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Peter Prochaska <info@peter-prochaska.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
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

namespace OC\Core;

use OC\AppFramework\Utility\SimpleContainer;
use OC\AppFramework\Utility\TimeFactory;
use OC\Core\Controller\AvatarController;
use OC\Core\Controller\CloudController;
use OC\Core\Controller\CronController;
use OC\Core\Controller\LicenseController;
use OC\Core\Controller\LoginController;
use OC\Core\Controller\LostController;
use OC\Core\Controller\RolesController;
use OC\Core\Controller\TokenController;
use OC\Core\Controller\TwoFactorChallengeController;
use OC\Core\Controller\UserController;
use OC\Core\Controller\UserSyncController;
use OC\User\AccountMapper;
use OC\User\SyncService;
use OC_Defaults;
use OCP\AppFramework\App;
use OCP\BackgroundJob\IJobList;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IServerContainer;
use OCP\Util;
use OCP\License\ILicenseManager;

/**
 * Class Application
 *
 * @package OC\Core
 */
class Application extends App {

	/**
	 * @param array $urlParams
	 */
	public function __construct(array $urlParams= []) {
		parent::__construct('core', $urlParams);

		$container = $this->getContainer();

		/**
		 * Controllers
		 */
		$container->registerService('LostController', static function (SimpleContainer $c) {
			return new LostController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('URLGenerator'),
				$c->query('UserManager'),
				$c->query('Defaults'),
				$c->query('L10N'),
				$c->query('Config'),
				$c->query('SecureRandom'),
				$c->query('DefaultEmailAddress'),
				$c->query('IsEncryptionEnabled'),
				$c->query('Mailer'),
				$c->query('TimeFactory'),
				$c->query('Logger'),
				$c->query('UserSession')
			);
		});
		$container->registerService('UserController', static function (SimpleContainer $c) {
			return new UserController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('UserManager'),
				$c->query('Defaults')
			);
		});
		$container->registerService('AvatarController', static function (SimpleContainer $c) {
			/** @var IServerContainer $server */
			$server = $c->query('ServerContainer');
			return new AvatarController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('AvatarManager'),
				$c->query('Cache'),
				$c->query('L10N'),
				$c->query('UserManager'),
				$c->query('UserSession'),
				$server->getRootFolder(),
				$c->query('Logger')
			);
		});
		$container->registerService('LoginController', static function (SimpleContainer $c) {
			return new LoginController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('UserManager'),
				$c->query('Config'),
				$c->query('Session'),
				$c->query('UserSession'),
				$c->query('URLGenerator'),
				$c->query('TwoFactorAuthManager'),
				$c->query('ServerContainer')->getLicenseManager()
			);
		});
		$container->registerService('TwoFactorChallengeController', static function (SimpleContainer $c) {
			return new TwoFactorChallengeController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('TwoFactorAuthManager'),
				$c->query('UserSession'),
				$c->query('Session'),
				$c->query('URLGenerator'));
		});
		$container->registerService('TokenController', static function (SimpleContainer $c) {
			return new TokenController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('UserManager'),
				$c->query('ServerContainer')->query('OC\Authentication\Token\IProvider'),
				$c->query('TwoFactorAuthManager'),
				$c->query('SecureRandom')
			);
		});
		$container->registerService('CloudController', static function (SimpleContainer $c) {
			return new CloudController(
				$c->query('AppName'),
				$c->query('Request')
			);
		});
		$container->registerService('RolesController', static function (SimpleContainer $c) {
			/** @var IServerContainer $serverContainer */
			$serverContainer = $c->query('ServerContainer');
			return new RolesController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('L10N'),
				$serverContainer->getEventDispatcher()
			);
		});
		$container->registerService('UserSyncController', static function (SimpleContainer $c) {
			$syncService = new SyncService(
				$c->query(IConfig::class),
				$c->query(ILogger::class),
				$c->query(AccountMapper::class)
			);
			return new UserSyncController(
				$c->query('AppName'),
				$c->query('Request'),
				$syncService,
				$c->query('UserManager')
			);
		});
		$container->registerService('CronController', static function (SimpleContainer $c) {
			return new CronController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query(IConfig::class),
				$c->query(ILogger::class),
				$c->query(IJobList::class)
			);
		});
		$container->registerService('LicenseController', static function (SimpleContainer $c) {
			$server = $c->query('ServerContainer');
			return new LicenseController(
				$c->query('AppName'),
				$c->query('Request'),
				$server->getLicenseManager()
			);
		});

		/**
		 * Core class wrappers
		 */
		$container->registerService('IsEncryptionEnabled', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getEncryptionManager()->isEnabled();
		});
		$container->registerService('URLGenerator', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getURLGenerator();
		});
		$container->registerService('UserManager', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getUserManager();
		});
		$container->registerService('Config', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getConfig();
		});
		$container->registerService('L10N', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getL10N('core');
		});
		$container->registerService('SecureRandom', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getSecureRandom();
		});
		$container->registerService('AvatarManager', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getAvatarManager();
		});
		$container->registerService('Session', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getSession();
		});
		$container->registerService('UserSession', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getUserSession();
		});
		$container->registerService('Cache', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getCache();
		});
		$container->registerService('Defaults', static function () {
			return new OC_Defaults;
		});
		$container->registerService('Mailer', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getMailer();
		});
		$container->registerService('Logger', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getLogger();
		});
		$container->registerService('TimeFactory', static function (SimpleContainer $c) {
			return new TimeFactory();
		});
		$container->registerService('DefaultEmailAddress', static function () {
			return Util::getDefaultEmailAddress('lostpassword-noreply');
		});
		$container->registerService('TwoFactorAuthManager', static function (SimpleContainer $c) {
			return $c->query('ServerContainer')->getTwoFactorAuthManager();
		});
	}
}
