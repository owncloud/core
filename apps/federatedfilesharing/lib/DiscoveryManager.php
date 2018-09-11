<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\FederatedFileSharing;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use OCP\Http\Client\IClient;
use OCP\Http\Client\IClientService;
use OCP\ICache;
use OCP\ICacheFactory;

/**
 * Class DiscoveryManager handles the discovery of endpoints used by Federated
 * Cloud Sharing.
 *
 * @package OCA\FederatedFileSharing
 */
class DiscoveryManager {
	/** @var ICache */
	private $cache;
	/** @var IClient */
	private $client;
	/** @var bool */
	public $underTest = false;

	/**
	 * @param ICacheFactory $cacheFactory
	 * @param IClientService $clientService
	 */
	public function __construct(ICacheFactory $cacheFactory,
								IClientService $clientService) {
		$this->cache = $cacheFactory->create('ocs-discovery');
		$this->client = $clientService->newClient();
	}

	/**
	 * Returns whether the specified URL includes only safe characters, if not
	 * returns false
	 *
	 * @param string $url
	 * @return bool
	 */
	private function isSafeUrl($url) {
		return (bool)\preg_match('/^[\/\.A-Za-z0-9]+$/', $url);
	}

	/**
	 * Discover the actual data and do some naive caching to ensure that the data
	 * is not requested multiple times.
	 *
	 * If no valid discovery data is found the ownCloud defaults are returned.
	 *
	 * @param string $remote
	 * @return array
	 */
	private function discover($remote) {
		// Check if something is in the cache
		if ($cacheData = $this->cache->get($remote)) {
			return \json_decode($cacheData, true);
		}

		// Default response body
		$discoveredServices = [
			'webdav' => '/public.php/webdav',
			'share' => '/ocs/v1.php/cloud/shares',
		];

		if (\defined('PHPUNIT_RUN') && !$this->underTest) {
			return $discoveredServices;
		}

		$decodedService = $this->makeRequest($remote . '/ocs-provider/');
		if (!empty($decodedService)) {
			$endpoints = [
				'webdav',
				'share',
			];

			foreach ($endpoints as $endpoint) {
				if (isset($decodedService['services']['FEDERATED_SHARING']['endpoints'][$endpoint])) {
					$endpointUrl = (string)$decodedService['services']['FEDERATED_SHARING']['endpoints'][$endpoint];
					if ($this->isSafeUrl($endpointUrl)) {
						$discoveredServices[$endpoint] = $endpointUrl;
					}
				}
			}
		}

		// Write into cache
		$this->cache->set($remote, \json_encode($discoveredServices));
		return $discoveredServices;
	}

	/**
	 * Discover the actual data and do some naive caching to ensure that the data
	 * is not requested multiple times.
	 *
	 * If no valid discovery data is found the ownCloud defaults are returned.
	 *
	 * @param string $remote
	 * @return array
	 */
	private function ocmDiscover($remote) {
		// Check if something is in the cache
		if ($cacheData = $this->cache->get('OCM' . $remote)) {
			return \json_decode($cacheData, true);
		}

		// Default response body
		$discoveredServices = [
			'webdav' => '/public.php/webdav',
			'ocm' => '/index.php/apps/federatedfilesharing',
		];

		if (\defined('PHPUNIT_RUN') && !$this->underTest) {
			return $discoveredServices;
		}

		$decodedService = $this->makeRequest($remote . '/ocm-provider/');
		if (!empty($decodedService)) {
			$discoveredServices['ocm'] = $decodedService['endPoint'];
			$shareTypes = $discoveredServices['shareTypes'];
			foreach ($shareTypes as $type) {
				if ($type['name'] == 'file') {
					$discoveredServices['webdav'] = $type['protocols']['webdav'];
				}
			}
		}

		// Write into cache
		$this->cache->set('OCM' . $remote, \json_encode($discoveredServices));
		return $discoveredServices;
	}

	/**
	 * Send GET request and return decoded body of response on success
	 *
	 * @param $url
	 *
	 * @return array
	 */
	private function makeRequest($url) {
		$decodedService = [];
		try {
			// make timeout configurable?
			$response = $this->client->get(
				$url,
				[
					'timeout' => 10,
					'connect_timeout' => 10,
				]
			);
			if ($response->getStatusCode() === 200) {
				$decodedService = \json_decode($response->getBody(), true);
			}
			if (\is_array($decodedService) === false) {
				$decodedService = [];
			}
		} catch (ClientException $e) {
			// Don't throw any exception since exceptions are handled before
		} catch (ConnectException $e) {
			// Don't throw any exception since exceptions are handled before
		}
		return $decodedService;
	}

	/**
	 * Return the public WebDAV endpoint used by the specified remote
	 *
	 * @param string $host
	 * @return string
	 */
	public function getWebDavEndpoint($host) {
		return $this->discover($host)['webdav'];
	}

	/**
	 * Return the sharing endpoint used by the specified remote
	 *
	 * @param string $host
	 * @return string
	 */
	public function getShareEndpoint($host) {
		return $this->discover($host)['share'];
	}

	public function getOcmWebDavEndPoint($host) {
		return $this->ocmDiscover($host)['webdav'];
	}

	public function getOcmShareEndPoint($host) {
		return $this->ocmDiscover($host)['ocm'];
	}
}
