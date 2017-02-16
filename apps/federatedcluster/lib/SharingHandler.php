<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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

namespace OCA\FederatedCluster;

use OC\HTTPHelper;
use OCA\Federation\Cluster;
use OCP\AppFramework\Http;
use OCP\IRequest;

class SharingHandler {

	/** @var  Cluster */
	private $cluster;

	const USER_AGENT = 'ownCloud Federated Cluster';

	function __construct() {
		$this->cluster = new Cluster();
	}

	public function alterShardShare ($preHookData) {
		/** @var \OCP\Share\IShare $share */
		$share = $preHookData['\OCP\Share\IShare'];
		\OC::$server->getLogger()->debug('alterShardShare shareWith:'.$share->getSharedWith(), ['app'=>'clusterlogin']);
	}

	//redirects to another instance in case it knows the token
	public function getShareByToken ($params) {
		\OC::$server->getLogger()->debug("getShareByToken {$params['token']}", ['app'=>'clusterlogin']);
		$agent = \OC::$server->getRequest()->getHeader('User-Agent');
		if ($agent === self::USER_AGENT) {
			// ignore request
			return;
		}

		foreach ($this->cluster->getClusterNodes() as $name => $config) {
			if ($this->cluster->getNodeUrl() === $config['url']) {
				continue;
			}
			$client = \OC::$server->getHTTPClientService()->newClient();
			$url = $config['url'].'/index.php/s/'.$params['token'];
			\OC::$server->getLogger()->debug("checking $url", ['app'=>'clusterlogin']);
			try {
				$response = $client->head($url, [
					'headers' => [ 'User-Agent' => self::USER_AGENT ]
				]);
				\OC::$server->getLogger()->debug("status code {$response->getStatusCode()}", ['app'=>'clusterlogin']);
				if ($response->getStatusCode() === Http::STATUS_OK
					|| $response->getStatusCode() === Http::STATUS_FORBIDDEN) {
					$location = \OC::$server->getRequest()->getRequestUri();
					$this->cluster->redirect($name, $location, '/');
				}
			} catch (\Exception $ex) {
				// try the next one
			}
		}


	}
}