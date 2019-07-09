<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
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

use OCA\FederatedFileSharing\Ocm\NotificationManager;
use OCP\AppFramework\Http;
use OCP\BackgroundJob\IJobList;
use OCP\Http\Client\IClientService;
use OCP\IConfig;
use GuzzleHttp\Exception\ClientException;

class Notifications {
	const RESPONSE_FORMAT = 'json'; // default response format for ocs calls

	/** @var AddressHandler */
	private $addressHandler;

	/** @var IClientService */
	private $httpClientService;

	/** @var DiscoveryManager */
	private $discoveryManager;

	/** @var NotificationManager */
	private $notificationManager;

	/** @var IJobList  */
	private $jobList;

	/** @var IConfig */
	private $config;

	/**
	 * @param AddressHandler $addressHandler
	 * @param IClientService $httpClientService
	 * @param DiscoveryManager $discoveryManager
	 * @param IJobList $jobList
	 * @param IConfig $config
	 */
	public function __construct(
		AddressHandler $addressHandler,
		IClientService $httpClientService,
		DiscoveryManager $discoveryManager,
		NotificationManager $notificationManager,
		IJobList $jobList,
		IConfig $config
	) {
		$this->addressHandler = $addressHandler;
		$this->httpClientService = $httpClientService;
		$this->discoveryManager = $discoveryManager;
		$this->notificationManager = $notificationManager;
		$this->jobList = $jobList;
		$this->config = $config;
	}

	/**
	 * send server-to-server share to remote server
	 *
	 * @param Address $shareWithAddress
	 * @param Address $ownerAddress
	 * @param Address $sharedByAddress
	 * @param string $token
	 * @param string $name
	 * @param string $remote_id
	 *
	 * @return bool|array true if successful or status information
	 *
	 * @throws \OC\HintException
	 * @throws \OC\ServerNotAvailableException
	 * @throws \Exception
	 */
	public function sendRemoteShare(Address $shareWithAddress,
		Address $ownerAddress,
		Address $sharedByAddress,
		$token,
		$name,
		$remote_id
	) {
		$remoteShareSuccess = false;
		if ($shareWithAddress->getUserId() && $shareWithAddress->getCloudId()) {
			$remoteShareSuccess = $this->sendOcmRemoteShare(
				$shareWithAddress, $ownerAddress, $sharedByAddress, $token, $name, $remote_id
			);
			if (!$remoteShareSuccess) {
				$remoteShareSuccess = $this->sendPreOcmRemoteShare(
					$shareWithAddress, $ownerAddress, $sharedByAddress, $token, $name, $remote_id
				);
			}
		}
		if ($remoteShareSuccess === true) {
			\OC_Hook::emit(
				'OCP\Share',
				'federated_share_added',
				['server' => $shareWithAddress->getHostName()]
			);
		}
		return $remoteShareSuccess;
	}

	/**
	 * ask owner to re-share the file with the given user
	 *
	 * @param string $token
	 * @param int $id remote Id
	 * @param int $shareId internal share Id
	 * @param string $remote remote address of the owner
	 * @param string $shareWith
	 * @param int $permission
	 * @return bool|array
	 * @throws \Exception
	 */
	public function requestReShare($token, $id, $shareId, $remote, $shareWith, $permission) {
		$data = [
			'shareWith' => $shareWith,
			'senderId' => $shareId
		];
		$ocmNotification = $this->notificationManager->convertToOcmFileNotification($id, $token, 'reshare', $data);
		$ocmFields = $ocmNotification->toArray();

		$url = \rtrim(
			$this->addressHandler->removeProtocolFromUrl($remote),
			'/'
		);
		$result = $this->tryHttpPostToShareEndpoint($url, '/notifications', $ocmFields, true);
		if (isset($result['statusCode']) && $result['statusCode'] === Http::STATUS_CREATED) {
			$response = \json_decode($result['result'], true);
			if (\is_array($response) && isset($response['sharedSecret'], $response['providerId'])) {
				return [
					$response['sharedSecret'],
					$response['providerId']
				];
			}
			return true;
		}

		$fields = [
			'shareWith' => $shareWith,
			'token' => $token,
			'permission' => $permission,
			'remoteId' => $shareId
		];

		$url = $this->addressHandler->removeProtocolFromUrl($remote);
		$result = $this->tryHttpPostToShareEndpoint(\rtrim($url, '/'), '/' . $id . '/reshare', $fields);
		$status = \json_decode($result['result'], true);

		$httpRequestSuccessful = $result['success'];
		$validToken = isset($status['ocs']['data']['token']) && \is_string($status['ocs']['data']['token']);
		$validRemoteId = isset($status['ocs']['data']['remoteId']);

		if ($httpRequestSuccessful && $this->isOcsStatusOk($status) && $validToken && $validRemoteId) {
			return [
				$status['ocs']['data']['token'],
				$status['ocs']['data']['remoteId']
			];
		}

		return false;
	}

	/**
	 * send server-to-server unshare to remote server
	 *
	 * @param string $remote url
	 * @param int $id share id
	 * @param string $token
	 * @return bool
	 */
	public function sendRemoteUnShare($remote, $id, $token) {
		return $this->sendUpdateToRemote($remote, $id, $token, 'unshare');
	}

	/**
	 * send server-to-server unshare to remote server
	 *
	 * @param string $remote url
	 * @param int $id share id
	 * @param string $token
	 * @return bool
	 */
	public function sendRevokeShare($remote, $id, $token) {
		return $this->sendUpdateToRemote($remote, $id, $token, 'revoke');
	}

	/**
	 * send notification to remote server if the permissions was changed
	 *
	 * @param string $remote
	 * @param string $remoteId
	 * @param string $token
	 * @param int $permissions
	 * @return bool
	 */
	public function sendPermissionChange($remote, $remoteId, $token, $permissions) {
		return $this->sendUpdateToRemote($remote, $remoteId, $token, 'permissions', ['permissions' => $permissions]);
	}

	/**
	 * forward accept reShare to remote server
	 *
	 * @param string $remote
	 * @param string $remoteId
	 * @param string $token
	 */
	public function sendAcceptShare($remote, $remoteId, $token) {
		$this->sendUpdateToRemote($remote, $remoteId, $token, 'accept');
	}

	/**
	 * forward decline reShare to remote server
	 *
	 * @param string $remote
	 * @param string $remoteId
	 * @param string $token
	 */
	public function sendDeclineShare($remote, $remoteId, $token) {
		$this->sendUpdateToRemote($remote, $remoteId, $token, 'decline');
	}

	/**
	 * inform remote server whether server-to-server share was accepted/declined
	 *
	 * @param string $remote
	 * @param string $remoteId Share id on the remote host
	 * @param string $token
	 * @param string $action possible actions:
	 * 	                     accept, decline, unshare, revoke, permissions
	 * @param array $data
	 * @param int $try
	 *
	 * @return boolean
	 *
	 * @throws \Exception
	 */
	public function sendUpdateToRemote($remote, $remoteId, $token, $action, $data = [], $try = 0) {
		$ocmNotification = $this->notificationManager->convertToOcmFileNotification($remoteId, $token, $action, $data);
		$ocmFields = $ocmNotification->toArray();
		$url = \rtrim(
			$this->addressHandler->removeProtocolFromUrl($remote),
			'/'
		);
		$result = $this->tryHttpPostToShareEndpoint($url, '/notifications', $ocmFields, true);
		if (isset($result['statusCode']) && $result['statusCode'] === Http::STATUS_CREATED) {
			return true;
		}

		$fields = ['token' => $token];
		foreach ($data as $key => $value) {
			$fields[$key] = $value;
		}

		$url = \rtrim(
			$this->addressHandler->removeProtocolFromUrl($remote),
			'/'
		);
		$result = $this->tryHttpPostToShareEndpoint($url, '/' . $remoteId . '/' . $action, $fields);
		$status = \json_decode($result['result'], true);

		if ($result['success'] && $this->isOcsStatusOk($status)) {
			return true;
		} elseif ($try === 0) {
			// only add new job on first try
			$this->jobList->add('OCA\FederatedFileSharing\BackgroundJob\RetryJob',
				[
					'remote' => $remote,
					'remoteId' => $remoteId,
					'token' => $token,
					'action' => $action,
					'data' => \json_encode($data),
					'try' => $try,
					'lastRun' => $this->getTimestamp()
				]
			);
		}

		return false;
	}

	/**
	 * return current timestamp
	 *
	 * @return int
	 */
	protected function getTimestamp() {
		return \time();
	}

	/**
	 * try http post first with https and then with http as a fallback
	 *
	 * @param string $remoteDomain
	 * @param string $urlSuffix
	 * @param array $fields post parameters
	 * @param bool $useOcm send request to OCM endpoint instead of OCS
	 *
	 * @return array
	 *
	 * @throws \Exception
	 */
	protected function tryHttpPostToShareEndpoint($remoteDomain, $urlSuffix, array $fields, $useOcm = false) {
		$client = $this->httpClientService->newClient();
		$protocol = 'https://';
		$result = [
			'success' => false,
			'result' => '',
		];
		$try = 0;

		while ($result['success'] === false && $try < 2) {
			if ($useOcm) {
				$endpoint = $this->discoveryManager->getOcmShareEndpoint($protocol . $remoteDomain);
				$endpoint .= $urlSuffix;
			} else {
				$relativePath = $this->discoveryManager->getShareEndpoint($protocol . $remoteDomain);
				$endpoint = $protocol . $remoteDomain . $relativePath . $urlSuffix . '?format=' . self::RESPONSE_FORMAT;
			}

			try {
				$options = [
					'timeout' => 10,
					'connect_timeout' => 10,
				];
				$sendAs = $useOcm === true ? 'json' : 'body';
				$options[$sendAs] = $fields;
				$response = $client->post($endpoint, $options);
				$result['result'] = $response->getBody();
				$result['statusCode'] = $response->getStatusCode();
				$result['success'] = true;
				break;
			} catch (ClientException $e) {
				// this exceptions happens for http error code 40x which the server sends
				// if any data of the request is bad, ie. the username does not exist.
				// In that case we want to retrieve an error message.
				$response = $e->getResponse();
				$result['result'] = $response->getBody();
				$try++;
			} catch (\Exception $e) {
				// if flat re-sharing is not supported by the remote server
				// we re-throw the exception and fall back to the old behaviour.
				// (flat re-shares has been introduced in ownCloud 9.1)
				if ($e->getCode() === Http::STATUS_INTERNAL_SERVER_ERROR) {
					throw $e;
				}
				$allowHttpFallback = $this->config->getSystemValue('sharing.federation.allowHttpFallback', false) === true;
				if (!$allowHttpFallback) {
					break;
				}
				$try++;
				$protocol = 'http://';
			}
		}

		return $result;
	}

	/**
	 * @param Address $shareWithAddress
	 * @param Address $ownerAddress
	 * @param Address $sharedByAddress
	 * @param $token
	 * @param $name
	 * @param $remote_id
	 * @return bool
	 * @throws \Exception
	 */
	protected function sendOcmRemoteShare(Address $shareWithAddress, Address $ownerAddress, Address $sharedByAddress, $token, $name, $remote_id) {
		$fields = [
			'shareWith' => $shareWithAddress->getCloudId(),
			'name' => $name,
			'providerId' => (string) $remote_id,
			'owner' => $ownerAddress->getCloudId(),
			'ownerDisplayName' => $ownerAddress->getDisplayName(),
			'sender' => $sharedByAddress->getCloudId(),
			'senderDisplayName' => $sharedByAddress->getDisplayName(),
			'shareType' => 'user',
			'resourceType' => 'file',
			'protocol' => [
				'name' => 'webdav',
				'options' => [
					'sharedSecret' => $token
				]
			]
		];

		$url = $shareWithAddress->getHostName();
		$result = $this->tryHttpPostToShareEndpoint($url, '/shares', $fields, true);

		if (isset($result['statusCode']) && $result['statusCode'] === Http::STATUS_CREATED) {
			return true;
		}
		return false;
	}

	/**
	 * @param Address $shareWithAddress
	 * @param Address $ownerAddress
	 * @param Address $sharedByAddress
	 * @param $token
	 * @param $name
	 * @param $remote_id
	 * @return array|bool
	 * @throws \Exception
	 */
	protected function sendPreOcmRemoteShare(Address $shareWithAddress, Address $ownerAddress, Address $sharedByAddress, $token, $name, $remote_id) {
		$fields = [
			'shareWith' => $shareWithAddress->getUserId(),
			'token' => $token,
			'name' => $name,
			'remoteId' => $remote_id,
			'owner' => $ownerAddress->getUserId(),
			'ownerFederatedId' => $ownerAddress->getCloudId(),
			'sharedBy' => $sharedByAddress->getUserId(),
			'sharedByFederatedId' => $sharedByAddress->getUserId(),
			'remote' => $this->addressHandler->generateRemoteURL(),
		];
		$url = $shareWithAddress->getHostName();
		$result = $this->tryHttpPostToShareEndpoint($url, '', $fields);
		$status = \json_decode($result['result'], true);
		if ($result['success'] && $this->isOcsStatusOk($status)) {
			return true;
		}
		return $status;
	}

	/**
	 * Validate ocs response - 100 or 200 means success
	 *
	 * @param array $status
	 *
	 * @return bool
	 */
	private function isOcsStatusOk($status) {
		return \in_array($status['ocs']['meta']['statuscode'], [100, 200]);
	}
}
