<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
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

namespace OCA\FederatedFileSharing\AppInfo;

use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\Controller\OcmController;
use OCA\FederatedFileSharing\DiscoveryManager;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\FedShareManager;
use OCA\FederatedFileSharing\Middleware\OcmMiddleware;
use OCA\FederatedFileSharing\Notifications;
use OCA\FederatedFileSharing\Controller\RequestHandlerController;
use OCA\FederatedFileSharing\TokenHandler;
use OCP\AppFramework\App;
use OCP\Share\Events\AcceptShare;
use OCP\Share\Events\DeclineShare;

class Application extends App {

	/** @var FederatedShareProvider */
	protected $federatedShareProvider;

	/**
	 * Application constructor.
	 */
	public function __construct() {
		parent::__construct('federatedfilesharing');
		$container = $this->getContainer();
		$server = $container->getServer();

		$container->registerService(
			'AddressHandler',
			function ($c) use ($server) {
				return new AddressHandler(
					$server->getURLGenerator(),
					$server->getL10N('federatedfilesharing')
				);
			}
		);

		$container->registerService(
			'DiscoveryManager',
			function ($c) use ($server) {
				return new DiscoveryManager(
					$server->getMemCacheFactory(),
					$server->getHTTPClientService()
				);
			}
		);

		$container->registerService(
			'Notifications',
			function ($c) use ($server) {
				return new Notifications(
					$c->query('AddressHandler'),
					$server->getHTTPClientService(),
					$c->query('DiscoveryManager'),
					$server->getJobList(),
					$server->getConfig()
				);
			}
		);

		$container->registerService(
			'FederatedShareManager',
			function ($c) use ($server) {
				return new FedShareManager(
					$this->getFederatedShareProvider(),
					$c->query('Notifications'),
					$server->getUserManager(),
					$server->getActivityManager(),
					$server->getNotificationManager(),
					$c->query('AddressHandler'),
					$server->getEventDispatcher()
				);
			}
		);

		$container->registerService(
			'OcmMiddleware',
			function ($c) use ($server) {
				return new OcmMiddleware(
					$this->getFederatedShareProvider(),
					$server->getAppManager(),
					$server->getUserManager(),
					$c->query('AddressHandler'),
					$server->getLogger()
				);
			}
		);

		$container->registerService(
			'RequestHandlerController',
			function ($c) use ($server) {
				return new RequestHandlerController(
					$c->query('AppName'),
					$c->query('Request'),
					$c->query('OcmMiddleware'),
					$server->getUserManager(),
					$c->query('AddressHandler'),
					$c->query('FederatedShareManager')
				);
			}
		);

		$container->registerService(
			'OcmController',
			function ($c) use ($server) {
				return new OcmController(
					$c->query('AppName'),
					$c->query('Request'),
					$c->query('OcmMiddleware'),
					$server->getURLGenerator(),
					$server->getUserManager(),
					$c->query('AddressHandler'),
					$c->query('FederatedShareManager'),
					$server->getLogger()
				);
			}
		);
	}

	/**
	 * get instance of federated share provider
	 *
	 * @return FederatedShareProvider
	 */
	public function getFederatedShareProvider() {
		if ($this->federatedShareProvider === null) {
			$this->initFederatedShareProvider();
		}
		return $this->federatedShareProvider;
	}

	/**
	 * initialize federated share provider
	 */
	protected function initFederatedShareProvider() {
		$addressHandler = new AddressHandler(
			\OC::$server->getURLGenerator(),
			\OC::$server->getL10N('federatedfilesharing')
		);
		$discoveryManager = new DiscoveryManager(
			\OC::$server->getMemCacheFactory(),
			\OC::$server->getHTTPClientService()
		);
		$notifications = new Notifications(
			$addressHandler,
			\OC::$server->getHTTPClientService(),
			$discoveryManager,
			\OC::$server->getJobList(),
			\OC::$server->getConfig()
		);
		$tokenHandler = new TokenHandler(
			\OC::$server->getSecureRandom()
		);

		$this->federatedShareProvider = new FederatedShareProvider(
			\OC::$server->getDatabaseConnection(),
			$addressHandler,
			$notifications,
			$tokenHandler,
			\OC::$server->getL10N('federatedfilesharing'),
			\OC::$server->getLogger(),
			\OC::$server->getLazyRootFolder(),
			\OC::$server->getConfig(),
			\OC::$server->getUserManager()
		);
	}

	public function registerListeners() {
		$container = $this->getContainer();
		$server = $container->getServer();
		$eventDispatcher = $server->getEventDispatcher();

		// react to accept and decline share events
		$eventDispatcher->addListener(
			AcceptShare::class,
			function (AcceptShare $event) use ($container) {
				/** @var Notifications $notifications */
				$notifications = $container->query('Notifications');
				$notifications->sendAcceptShare(
					$event->getRemote(),
					$event->getRemoteId(),
					$event->getShareToken()
				);
			}
		);

		$eventDispatcher->addListener(
			DeclineShare::class,
			function (DeclineShare $event) use ($container) {
				/** @var Notifications $notifications */
				$notifications = $container->query('Notifications');
				$notifications->sendDeclineShare(
					$event->getRemote(),
					$event->getRemoteId(),
					$event->getShareToken()
				);
			}
		);
	}
}
