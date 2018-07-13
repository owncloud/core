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

use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\FedShareManager;
use OCP\AppFramework\App;

class Application extends App {

	/** @var FederatedShareProvider */
	protected $federatedShareProvider;

	/** @var FedShareManager */
	protected $federatedShareManager;

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
	 * Get instance of federated share manager
	 *
	 * @return FedShareManager
	 */
	public function getFederatedShareManager() {
		if ($this->federatedShareManager === null) {
			$this->initFederatedShareManager();
		}
		return $this->federatedShareManager;
	}

	/**
	 * Initialize federated share manager
	 */
	protected function initFederatedShareManager() {
		$this->federatedShareManager = new FedShareManager(
			$this->getFederatedShareProvider(),
			\OC::$server->getDatabaseConnection(),
			\OC::$server->getUserManager(),
			\OC::$server->getActivityManager(),
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher()
		);
	}

	/**
	 * initialize federated share provider
	 */
	protected function initFederatedShareProvider() {
		$addressHandler = new \OCA\FederatedFileSharing\AddressHandler(
			\OC::$server->getURLGenerator(),
			\OC::$server->getL10N('federatedfilesharing')
		);
		$discoveryManager = new \OCA\FederatedFileSharing\DiscoveryManager(
			\OC::$server->getMemCacheFactory(),
			\OC::$server->getHTTPClientService()
		);
		$notifications = new \OCA\FederatedFileSharing\Notifications(
			$addressHandler,
			\OC::$server->getHTTPClientService(),
			$discoveryManager,
			\OC::$server->getJobList(),
			\OC::$server->getConfig()
		);
		$tokenHandler = new \OCA\FederatedFileSharing\TokenHandler(
			\OC::$server->getSecureRandom()
		);

		$this->federatedShareProvider = new \OCA\FederatedFileSharing\FederatedShareProvider(
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
}
