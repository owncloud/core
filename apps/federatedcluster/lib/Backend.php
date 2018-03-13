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


use OCA\Federation\Cluster;

class Backend extends \OC\User\Backend implements \OCP\UserInterface {

	const USER_AGENT = 'ownCloud Federated Cluster Login';

	/**
	 * Check if the password is correct without logging in the user
	 *
	 * @param string $uid      The username
	 * @param string $password The password
	 *
	 * @return true/false
	 */
	public function checkPassword($uid, $password) {
		\OC::$server->getLogger()->debug("checkPassword('$uid', '$password')", ['app'=>'clusterlogin']);
		$agent = \OC::$server->getRequest()->getHeader('User-Agent');
		if ($agent === self::USER_AGENT) {
			// ignore request
			\OC::$server->getLogger()->debug("ignoring request from ".self::USER_AGENT, ['app'=>'clusterlogin']);
			return false;
		}

		$cluster = new Cluster();
		list($node, $url) = $cluster->getUserNode($uid);
		if ($url) {
			$client = \OC::$server->getHTTPClientService()->newClient();
			$url .= "/index.php/apps/federatedcluster/login";
			\OC::$server->getLogger()->debug("dispatching login to $url", ['app'=>'clusterlogin']);
			$response = $client->post($url, [
				'body' => [
					'login' => $uid,
					'password' => $password,
				],
				'headers' => [ 'User-Agent' => self::USER_AGENT ]
				//'verify' => false, // todo make configurable?
			]);
		}

		if (isset($response)) {
			$body = $response->getBody();
			\OC::$server->getLogger()->debug("got response " . $body, ['app'=>'clusterlogin']);
			$result = json_decode($body);
			$location = $result->location;
			$session_name = $result->session_name;
			$session_id = $result->session_id;
			\OC::$server->getLogger()->debug("got session '$session_name=$session_id'", ['app'=>'clusterlogin']);
			\OC::$server->getLogger()->debug("got location '$location'", ['app'=>'clusterlogin']);
			\OC::$server->getLogger()->debug("redirecting $uid to $location at $node", ['app'=>'clusterlogin']);

			$cluster->redirect($node, $location, '/', $session_name, $session_id);
		}
		return false;
	}
}