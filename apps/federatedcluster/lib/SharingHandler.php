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

	public function assureUniqueToken ($params) {
		/** @var \OCP\Share\IShare $share */
		$share = $params['\OCP\Share\IShare'];
		$token = $share->getToken();

		\OC::$server->getLogger()->debug(__METHOD__." $token", ['app'=>'clusterlogin']);

		foreach ($this->cluster->getClusterNodes() as $name => $config) {
			$client = \OC::$server->getHTTPClientService()->newClient();
			$url = $config['url'].'/index.php/s/'.$token;
			\OC::$server->getLogger()->debug("checking $url", ['app'=>'clusterlogin']);
			try {
				$response = $client->head($url, [
					'headers' => [ 'User-Agent' => self::USER_AGENT ]
				]);
				\OC::$server->getLogger()->debug("status code {$response->getStatusCode()}", ['app'=>'clusterlogin']);
				if ($response->getStatusCode() === Http::STATUS_OK
					|| $response->getStatusCode() === Http::STATUS_FORBIDDEN) {
					// generate new token
					$share->setToken(
						\OC::$server->getSecureRandom()->generate(
							\OC\Share\Constants::TOKEN_LENGTH,
							\OCP\Security\ISecureRandom::CHAR_LOWER.
							\OCP\Security\ISecureRandom::CHAR_UPPER.
							\OCP\Security\ISecureRandom::CHAR_DIGITS
						));
					$this->assureUniqueToken($params);
					return; // finally it is unique
				}
			} catch (\Exception $ex) {
				// try the next one
			}
		}
		// token is unique
	}

	//redirects to another instance in case it knows the token
	public function getShareByToken ($params) {
		\OC::$server->getLogger()->debug(__METHOD__." {$params['token']}", ['app'=>'clusterlogin']);
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