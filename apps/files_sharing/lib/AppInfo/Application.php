<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\Files_Sharing\AppInfo;

use OC\AppFramework\Utility\SimpleContainer;
use OCA\Files_Sharing\Controllers\ExternalSharesController;
use OCA\Files_Sharing\Controllers\ShareController;
use OCA\Files_Sharing\Middleware\SharingCheckMiddleware;
use OCA\Files_Sharing\MountProvider;
use OCA\Files_Sharing\Notifier;
use OCP\AppFramework\App;
use OCP\IContainer;
use OCA\Files_Sharing\Hooks;
use OCA\Files_Sharing\Service\NotificationPublisher;
use OCP\Notification\Events\RegisterNotifierEvent;

class Application extends App {
	public function __construct(array $urlParams = []) {
		parent::__construct('files_sharing', $urlParams);

		$container = $this->getContainer();
		$server = $container->getServer();

		/**
		 * Controllers
		 */
		$container->registerService('ShareController', function (SimpleContainer $c) use ($server) {
			return new ShareController(
				$c->query('AppName'),
				$c->query('Request'),
				$server->getConfig(),
				$server->getURLGenerator(),
				$server->getUserManager(),
				$server->getLogger(),
				$server->getActivityManager(),
				$server->getShareManager(),
				$server->getSession(),
				$server->getPreviewManager(),
				$server->getRootFolder(),
				$server->getEventDispatcher()
			);
		});
		$container->registerService('ExternalSharesController', function (SimpleContainer $c) use ($server) {
			return new ExternalSharesController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('ExternalManager'),
				$c->query('HttpClientService'),
				$server->getEventDispatcher()
			);
		});

		/**
		 * Core class wrappers
		 */
		$container->registerService('HttpClientService', function (SimpleContainer $c) use ($server) {
			return $server->getHTTPClientService();
		});
		$container->registerService('ExternalManager', function (SimpleContainer $c) use ($server) {
			$user = $server->getUserSession()->getUser();
			$uid = $user ? $user->getUID() : null;
			return new \OCA\Files_Sharing\External\Manager(
				$server->getDatabaseConnection(),
				\OC\Files\Filesystem::getMountManager(),
				\OC\Files\Filesystem::getLoader(),
				$server->getNotificationManager(),
				$server->getEventDispatcher(),
				$uid
			);
		});

		/**
		 * Middleware
		 */
		$container->registerService('SharingCheckMiddleware', function (SimpleContainer $c) use ($server) {
			return new SharingCheckMiddleware(
				$c->query('AppName'),
				$server->getConfig(),
				$server->getAppManager(),
				$c['ControllerMethodReflector']
			);
		});

		// Execute middlewares
		$container->registerMiddleware('SharingCheckMiddleware');

		$container->registerService('MountProvider', function (IContainer $c) {
			/** @var \OCP\IServerContainer $server */
			$server = $c->query('ServerContainer');
			return new MountProvider(
				$server->getConfig(),
				$server->getShareManager(),
				$server->getLogger()
			);
		});

		$container->registerService('ExternalMountProvider', function (IContainer $c) {
			/** @var \OCP\IServerContainer $server */
			$server = $c->query('ServerContainer');
			return new \OCA\Files_Sharing\External\MountProvider(
				$server->getDatabaseConnection(),
				function () use ($c) {
					return $c->query('ExternalManager');
				}
			);
		});

		/*
		 * Register trashbin service
		 */
		$container->registerService('Hooks', function ($c) {
			return new Hooks(
				$c->getServer()->getLazyRootFolder(),
				$c->getServer()->getUrlGenerator(),
				$c->getServer()->getEventDispatcher(),
				$c->getServer()->getShareManager(),
				$c->query(NotificationPublisher::class)
			);
		});

		/*
		 * Register capabilities
		 */
		$container->registerCapability('OCA\Files_Sharing\Capabilities');
	}

	public function registerMountProviders() {
		/** @var \OCP\IServerContainer $server */
		$server = $this->getContainer()->query('ServerContainer');
		$mountProviderCollection = $server->getMountProviderCollection();
		$mountProviderCollection->registerProvider($this->getContainer()->query('MountProvider'));
		$mountProviderCollection->registerProvider($this->getContainer()->query('ExternalMountProvider'));
	}

	/**
	 * Registers the notifier
	 */
	public function registerNotifier() {
		$container = $this->getContainer();

		$dispatcher = $container->getServer()->getEventDispatcher();

		$dispatcher->addListener(RegisterNotifierEvent::NAME, function (RegisterNotifierEvent $event) use ($container) {
			$l10n = $container->getServer()->getL10N('files_sharing');
			$event->registerNotifier($container->query(Notifier::class), 'files_sharing', $l10n->t('File sharing'));
		});
	}

	public function registerEvents() {
		$this->getContainer()->query('Hooks')->registerListeners();
	}
}
