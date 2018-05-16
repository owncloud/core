<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OCA\Files_Sharing\External;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use OC\Files\Storage\DAV;
use OCA\FederatedFileSharing\DiscoveryManager;
use OCA\Files_Sharing\ISharedStorage;
use OCP\Files\StorageInvalidException;
use OCP\Files\StorageNotAvailableException;
use Sabre\DAV\Client;

class Storage extends DAV implements ISharedStorage {
	/** @var string */
	private $remoteUser;
	/** @var string */
	private $remote;
	/** @var string */
	private $mountPoint;
	/** @var string */
	private $token;
	/** @var \OCP\ICacheFactory */
	private $memcacheFactory;
	/** @var \OCP\Http\Client\IClientService */
	private $httpClient;
	/** @var \OCP\ICertificateManager */
	private $certificateManager;
	/** @var bool */
	private $updateChecked = false;

	/**
	 * @var \OCA\Files_Sharing\External\Manager
	 */
	private $manager;

	public function __construct($options) {
		$this->memcacheFactory = \OC::$server->getMemCacheFactory();
		$this->httpClient = \OC::$server->getHTTPClientService();
		$this->manager = $options['manager'];
		$this->certificateManager = $options['certificateManager'];
		$this->remote = $options['remote'];
		$this->remoteUser = $options['owner'];
		list($protocol, $remote) = \explode('://', $this->remote);
		if (\strpos($remote, '/')) {
			list($host, $root) = \explode('/', $remote, 2);
		} else {
			$host = $remote;
			$root = '';
		}
		$secure = $protocol === 'https';
		$this->mountPoint = $options['mountpoint'];
		$this->token = $options['token'];
		parent::__construct([
			'secure' => $secure,
			'host' => $host,
			// root will be adjusted lazily in init() with discovery manager
			'root' => $root,
			'user' => $options['token'],
			'password' => (string)$options['password'],
			// Federated sharing always uses BASIC auth
			'authType' => Client::AUTH_BASIC
		]);
	}

	protected function init() {
		if ($this->ready) {
			return;
		}
		$discoveryManager = new DiscoveryManager(
			$this->memcacheFactory,
			\OC::$server->getHTTPClientService()
		);

		$this->root = \rtrim($this->root, '/') . $discoveryManager->getWebDavEndpoint($this->remote);
		if (!$this->root || $this->root[0] !== '/') {
			$this->root = '/' . $this->root;
		}
		if (\substr($this->root, -1, 1) !== '/') {
			$this->root .= '/';
		}
		parent::init();
	}

	/** {@inheritdoc} */
	public function createBaseUri() {
		// require lazy-initializing root to return correct value
		$this->init();
		return parent::createBaseUri();
	}

	public function getWatcher($path = '', $storage = null) {
		if (!$storage) {
			$storage = $this;
		}
		if (!isset($this->watcher)) {
			$this->watcher = new Watcher($storage);
			$this->watcher->setPolicy(\OC\Files\Cache\Watcher::CHECK_ONCE);
		}
		return $this->watcher;
	}

	public function getRemoteUser() {
		return $this->remoteUser;
	}

	public function getRemote() {
		return $this->remote;
	}

	public function getMountPoint() {
		return $this->mountPoint;
	}

	public function getToken() {
		return $this->token;
	}

	public function getPassword() {
		return $this->password;
	}

	/**
	 * @brief get id of the mount point
	 * @return string
	 */
	public function getId() {
		return 'shared::' . \md5($this->token . '@' . $this->remote);
	}

	public function getCache($path = '', $storage = null) {
		if ($this->cache === null) {
			$this->cache = new Cache($this, $this->remote, $this->remoteUser);
		}
		return $this->cache;
	}

	/**
	 * check if a file or folder has been updated since $time
	 *
	 * @param string $path
	 * @param int $time
	 * @throws \OCP\Files\StorageNotAvailableException
	 * @throws \OCP\Files\StorageInvalidException
	 * @return bool
	 */
	public function hasUpdated($path, $time) {
		// since for owncloud webdav servers we can rely on etag propagation we only need to check the root of the storage
		// because of that we only do one check for the entire storage per request
		if ($this->updateChecked) {
			return false;
		}
		$this->updateChecked = true;
		try {
			return parent::hasUpdated('', $time);
		} catch (StorageInvalidException $e) {
			// check if it needs to be removed
			$this->checkStorageAvailability();
			throw $e;
		} catch (StorageNotAvailableException $e) {
			// check if it needs to be removed or just temp unavailable
			$this->checkStorageAvailability();
			throw $e;
		}
	}

	public function test() {
		try {
			return parent::test();
		} catch (StorageInvalidException $e) {
			// check if it needs to be removed
			$this->checkStorageAvailability();
			throw $e;
		} catch (StorageNotAvailableException $e) {
			// check if it needs to be removed or just temp unavailable
			$this->checkStorageAvailability();
			throw $e;
		}
	}

	/**
	 * Check whether this storage is permanently or temporarily
	 * unavailable
	 *
	 * @throws \OCP\Files\StorageNotAvailableException
	 * @throws \OCP\Files\StorageInvalidException
	 */
	public function checkStorageAvailability() {
		// see if we can find out why the share is unavailable
		try {
			if (! $this->propfind('')) {
				// a 404 can either mean that the share no longer exists or there is no ownCloud on the remote
				if ($this->testRemote()) {
					// valid ownCloud instance means that the public share no longer exists
					// since this is permanent (re-sharing the file will create a new token)
					// we remove the invalid storage
					$this->manager->removeShare($this->mountPoint);
					$this->manager->getMountManager()->removeMount($this->mountPoint);
					throw new StorageInvalidException();
				} else {
					// ownCloud instance is gone, likely to be a temporary server configuration error
					throw new StorageNotAvailableException();
				}
			}
		} catch (StorageInvalidException $e) {
			// auth error, remove share for now (provide a dialog in the future)
			$this->manager->removeShare($this->mountPoint);
			$this->manager->getMountManager()->removeMount($this->mountPoint);
			throw $e;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function file_exists($path) {
		if ($path === '') {
			return true;
		} else {
			return parent::file_exists($path);
		}
	}

	/**
	 * check if the configured remote is a valid federated share provider
	 *
	 * @return bool
	 */
	protected function testRemote() {
		try {
			return $this->testRemoteUrl($this->remote . '/ocs-provider/index.php')
				|| $this->testRemoteUrl($this->remote . '/ocs-provider/')
				|| $this->testRemoteUrl($this->remote . '/status.php');
		} catch (\Exception $e) {
			return false;
		}
	}

	/**
	 * @param string $url
	 * @return bool
	 */
	private function testRemoteUrl($url) {
		$cache = $this->memcacheFactory->create('files_sharing_remote_url');
		if ($cache->hasKey($url)) {
			return (bool)$cache->get($url);
		}

		$client = $this->httpClient->newClient();
		try {
			$result = $client->get($url, [
				'timeout' => 10,
				'connect_timeout' => 10,
			])->getBody();
			$data = \json_decode($result);
			$returnValue = (\is_object($data) && !empty($data->version));
		} catch (ConnectException $e) {
			$returnValue = false;
		} catch (ClientException $e) {
			$returnValue = false;
		}

		$cache->set($url, $returnValue);
		return $returnValue;
	}

	public function getOwner($path) {
		list(, $remote) = \explode('://', $this->remote, 2);
		return $this->remoteUser . '@' . $remote;
	}

	public function isSharable($path) {
		if (\OCP\Util::isSharingDisabledForUser() || !\OC\Share\Share::isResharingAllowed()) {
			return false;
		}
		return ($this->getPermissions($path) & \OCP\Constants::PERMISSION_SHARE);
	}
	
	public function getPermissions($path) {
		$response = $this->propfind($path);
		if (isset($response['{http://open-collaboration-services.org/ns}share-permissions'])) {
			$permissions = $response['{http://open-collaboration-services.org/ns}share-permissions'];
		} else {
			// use default permission if remote server doesn't provide the share permissions
			if ($this->is_dir($path)) {
				$permissions = \OCP\Constants::PERMISSION_ALL;
			} else {
				$permissions = \OCP\Constants::PERMISSION_ALL & ~\OCP\Constants::PERMISSION_CREATE;
			}
		}

		return $permissions;
	}
}
