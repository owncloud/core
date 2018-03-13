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

namespace OCA\Federation;


use OC\HintException;
use OCA\FederatedFileSharing\AddressHandler;

/**
 *
 * Class Cluster
 *
 * @package OCA\Federation
 */
class Cluster {

	/**
	 * @var AddressHandler
	 */
	private $addressHandler;

	function __construct() {
		$this->addressHandler = new AddressHandler(
			\OC::$server->getURLGenerator(),
			\OC::$server->getL10N('federatedfilesharing')
		);
	}

	/**
	 * @param string $userId
	 * @return string|null
	 */
	public function getClusterUserId($userId) {
		try {
			list ($user, $remote) = $this->addressHandler->splitUserRemote($userId);
		} catch (HintException $ex) {
			return null;
		}
		$remote = $this->addressHandler->removeProtocolFromUrl($remote);

		// check if id has cluster remote
		$cluster = $this->getClusterHost();
		if ($cluster !== $remote) {
			\OC::$server->getLogger()->debug("$userId is not a cluster id for $cluster", ['app' => 'cluster']);
			return null;
		}

		// find correct host
		list ( , $url) = $this->getUserNode($user);
		if ($url) {
			$host = parse_url($url, PHP_URL_HOST);
			\OC::$server->getLogger()->debug("$userId mapped to $user@$host", ['app' => 'cluster']);
			return "$user@$host";
		}

		\OC::$server->getLogger()->warning("$userId could not be mapped to a node", ['app' => 'cluster']);
		return null;
	}

	/**
	 * @param string $userId
	 * @return string
	 */
	public function hideClusterInUserId($userId) {
		if (empty(\OC::$server->getConfig()->getSystemValue('cluster.nodes', []))) {
			return $userId;
		}
		try {
			list ($user, $remote) = $this->addressHandler->splitUserRemote($userId);
		} catch (HintException $ex) {
			return $userId;
		}
		$remote = $this->addressHandler->removeProtocolFromUrl($remote);

		// check if id has cluster remote
		if ($this->isClusterMember($remote)) {
			$cluster = $this->getClusterHost();
			\OC::$server->getLogger()->debug("$userId mapped to $user@$cluster", ['app' => 'cluster']);
			return "$user@$cluster";
		}

		\OC::$server->getLogger()->warning("$userId is not a cluster member", ['app' => 'cluster']);
		return $userId;
	}

	/**
	 * @param $userId
	 * @return array with node name and node url
	 */
	public function getUserNode($userId) {
		// find correct host
		$nodes = \OC::$server->getConfig()->getSystemValue('cluster.nodes', []);
		foreach ($nodes as $name => $config) {
			preg_match($config['users'], $userId, $matches);
			if (!empty($matches)) {
				$url = $config['url'];
				\OC::$server->getLogger()->debug("Node for $userId is $name / $url", ['app' => 'cluster']);
				return [$name, $url];
			}
		}

		\OC::$server->getLogger()->debug("No Node for $userId found", ['app' => 'cluster']);
		return [null, null];
	}

	/**
	 * @param string $host
	 * @return bool
	 */
	public function isClusterMember($host) {
		$host = $this->addressHandler->removeProtocolFromUrl($host);
		$nodes = \OC::$server->getConfig()->getSystemValue('cluster.nodes', []);
		foreach ($nodes as $name => $config) {
			$node = parse_url($config['url'], PHP_URL_HOST);
			if ($node === $host) {
				\OC::$server->getLogger()->debug("$host is a cluster node", ['app' => 'cluster']);
				return true;
			}
		}
		\OC::$server->getLogger()->debug("$host is not a cluster node", ['app' => 'cluster']);
		return false;
	}

	public function getSourceFor($target) {
		if ($this->isClusterMember($target)) {
			$source = $this->getNodeUrl();
		} else {
			$source = \OC::$server->getURLGenerator()->getAbsoluteURL('/');
		}
		return rtrim($source, '/');
	}

	public function getNodeUrl() {
		return \OC::$server->getConfig()->getSystemValue('node.url');
	}

	public function getNodeHost() {
		$url = $this->getNodeUrl();
		return parse_url($url, PHP_URL_HOST);
	}

	public function getClusterUrl() {
		return \OC::$server->getConfig()->getSystemValue('overwrite.cli.url');
	}

	public function getClusterHost() {
		$url = $this->getClusterUrl();
		return parse_url($url, PHP_URL_HOST);
	}

	public function getClusterNodes() {
		return \OC::$server->getConfig()->getSystemValue('cluster.nodes', []);
	}

	public function getScheme($host, $default = 'https') {
		$host = $this->addressHandler->removeProtocolFromUrl($host);
		$nodes = $this->getClusterNodes();
		foreach ($nodes as $name => $config) {
			$parse = parse_url($config['url']);
			if ($host === $parse['host']) {
				return $parse['scheme'];
			}
		}
		return $default;
	}

	public function redirect($nodeName, $location, $path = '/', $session_name = null, $session_id = null) {
		header('HTTP/1.1 303 See Other'); // 303 because we need get request after login, 307 would do POST
		header('Cache-Control: no-cache, no-store, must-revalidate');
		if ($session_name && $session_id) {
			setcookie($session_name, $session_id, 0, '/', null, true, true);
		}
		setcookie(\OC::$server->getConfig()->getSystemValue('cluster.cookie'), $nodeName, 0, $path, null, true, true);
		header('Location: ' . $location);
		exit(0);
	}
}