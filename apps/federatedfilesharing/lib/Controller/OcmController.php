<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\FederatedFileSharing\Controller;

use OCA\FederatedFileSharing\Address;
use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\Middleware\OcmMiddleware;
use OCA\FederatedFileSharing\Ocm\Exception\BadRequestException;
use OCA\FederatedFileSharing\Ocm\Exception\NotImplementedException;
use OCA\FederatedFileSharing\Ocm\Notification\FileNotification;
use OCP\AppFramework\Http\JSONResponse;
use OCA\FederatedFileSharing\FedShareManager;
use OCA\FederatedFileSharing\Ocm\Exception\OcmException;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUserManager;

/**
 * Class OcmController
 *
 * @package OCA\FederatedFileSharing\Controller
 */
class OcmController extends Controller {
	const API_VERSION = '1.0-proposal1';

	/**
	 * @var OcmMiddleware
	 */
	private $ocmMiddleware;

	/**
	 * @var IURLGenerator
	 */
	protected $urlGenerator;

	/**
	 * @var IUserManager
	 */
	protected $userManager;

	/**
	 * @var AddressHandler
	 */
	protected $addressHandler;

	/**
	 * @var FedShareManager
	 */
	protected $fedShareManager;

	/**
	 * @var ILogger
	 */
	protected $logger;

	/**
	 * OcmController constructor.
	 *
	 * @param string $appName
	 * @param IRequest $request
	 * @param OcmMiddleware $ocmMiddleware
	 * @param IURLGenerator $urlGenerator
	 * @param IUserManager $userManager
	 * @param AddressHandler $addressHandler
	 * @param FedShareManager $fedShareManager
	 * @param ILogger $logger
	 */
	public function __construct($appName,
									IRequest $request,
									OcmMiddleware $ocmMiddleware,
									IURLGenerator $urlGenerator,
									IUserManager $userManager,
									AddressHandler $addressHandler,
									FedShareManager $fedShareManager,
									ILogger $logger
	) {
		parent::__construct($appName, $request);

		$this->ocmMiddleware = $ocmMiddleware;
		$this->urlGenerator = $urlGenerator;
		$this->userManager = $userManager;
		$this->addressHandler = $addressHandler;
		$this->fedShareManager = $fedShareManager;
		$this->logger = $logger;
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * EndPoint discovery
	 * Responds to /ocm-provider/ requests
	 *
	 * @return array
	 */
	public function discovery() {
		$endPoint = $this->urlGenerator->linkToRouteAbsolute(
			"{$this->appName}.ocm.index"
		);
		return [
			'enabled' => true,
			'apiVersion' => self::API_VERSION,
			'endPoint' => \rtrim($endPoint, '/'),
			'shareTypes' => [
				[
					'name' => FileNotification::RESOURCE_TYPE_FILE,
					'protocols' => $this->getProtocols()
				]
			]
		];
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * @param string $shareWith identifier of the user or group
	 * 							to share the resource with
	 * @param string $name name of the shared resource
	 * @param string $description share description (optional)
	 * @param string $providerId Identifier of the resource at the provider side
	 * @param string $owner identifier of the user that owns the resource
	 * @param string $ownerDisplayName display name of the owner
	 * @param string $sender Provider specific identifier of the user that wants
	 *							to share the resource
	 * @param string $senderDisplayName Display name of the user that wants
	 * 									to share the resource
	 * @param string $shareType Share type ('user' is supported atm)
	 * @param string $resourceType only 'file' is supported atm
	 * @param array $protocol
	 * 		[
	 * 			'name' => (string) protocol name. Only 'webdav' is supported atm,
	 * 			'options' => [
	 * 				protocol specific options
	 * 				only `webdav` options are supported atm
	 * 				e.g. `uri`,	`access_token`, `password`, `permissions` etc.
	 *
	 * 				For backward compatibility the webdav protocol will use
	 * 				the 'sharedSecret" as username and password
	 * 			]
	 *
	 * @return JSONResponse
	 */
	public function createShare($shareWith,
								$name,
								$description,
								$providerId,
								$owner,
								$ownerDisplayName,
								$sender,
								$senderDisplayName,
								$shareType,
								$resourceType,
								$protocol

	) {
		try {
			$this->ocmMiddleware->assertIncomingSharingEnabled();
			$this->ocmMiddleware->assertNotNull(
				[
					'shareWith' => $shareWith,
					'name' => $name,
					'providerId' => $providerId,
					'owner' => $owner,
					'shareType' => $shareType,
					'resourceType' => $resourceType
				]
			);
			if (!\is_array($protocol)
				|| !isset($protocol['name'])
				|| !isset($protocol['options'])
				|| !\is_array($protocol['options'])
				|| !isset($protocol['options']['sharedSecret'])
			) {
				throw new BadRequestException(
					'server can not add remote share, missing parameter'
				);
			}
			if (!\OCP\Util::isValidFileName($name)) {
				throw new BadRequestException(
					'The mountpoint name contains invalid characters.'
				);
			}

			if ($this->isSupportedProtocol($protocol['name']) === false) {
				throw new NotImplementedException(
					"Protocol {$protocol['name']} is not supported"
				);
			}

			if ($this->isSupportedShareType($shareType) === false) {
				throw new NotImplementedException(
					"ShareType {$shareType} is not supported"
				);
			}

			if ($this->isSupportedResourceType($resourceType) === false) {
				throw new NotImplementedException(
					"ResourceType {$resourceType} is not supported"
				);
			}

			$shareWithAddress = new Address($shareWith);
			$localShareWith = $shareWithAddress->toLocalUid();
			if (!$this->userManager->userExists($localShareWith)) {
				throw new BadRequestException("User $localShareWith does not exist");
			}

			$ownerAddress = new Address($owner, $ownerDisplayName);
			$sharedByAddress = new Address($sender, $senderDisplayName);

			$this->fedShareManager->createShare(
				$ownerAddress,
				$sharedByAddress,
				$localShareWith,
				$providerId,
				$name,
				$protocol['options']['sharedSecret']
			);
		} catch (OcmException $e) {
			return new JSONResponse(
				['message' => $e->getMessage()],
				$e->getHttpStatusCode()
			);
		} catch (\Exception $e) {
			$this->logger->error(
				"server can not add remote share, {$e->getMessage()}",
				['app' => 'federatefilesharing']
			);
			return new JSONResponse(
				[
					'message' => "internal server error, was not able to add share from {$owner}"
				],
				Http::STATUS_INTERNAL_SERVER_ERROR
			);
		}
		return new JSONResponse(
			[],
			Http::STATUS_CREATED
		);
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * @param string $notificationType notification type (SHARE_REMOVED, etc)
	 * @param string $resourceType only 'file' is supported atm
	 * @param string $providerId Identifier of the resource at the provider side
	 * @param array $notification
	 * 		[
	 * 			optional additional parameters, depending on the notification
	 * 				and the resource type
	 * 		]
	 *
	 * @return JSONResponse
	 */
	public function processNotification($notificationType,
										$resourceType,
										$providerId,
										$notification
	) {
		try {
			if (!\is_array($notification)) {
				throw new BadRequestException(
					'server can not add remote share, missing parameter'
				);
			}

			$notification = \array_merge(
				['sharedSecret' => null],
				$notification
			);

			$this->ocmMiddleware->assertNotNull(
				[
					'notificationType' => $notificationType,
					'resourceType' => $resourceType,
					'providerId' => $providerId,
					'sharedSecret' => $notification['sharedSecret']
				]
			);

			if ($this->isSupportedResourceType($resourceType) === false) {
				throw new NotImplementedException(
					"ResourceType {$resourceType} is not supported"
				);
			}

			switch ($notificationType) {
				case FileNotification::NOTIFICATION_TYPE_SHARE_ACCEPTED:
					$this->ocmMiddleware->assertOutgoingSharingEnabled();
					$share = $this->ocmMiddleware->getValidShare(
						$providerId, $notification['sharedSecret']
					);
					$this->fedShareManager->acceptShare($share);
					break;
				case FileNotification::NOTIFICATION_TYPE_SHARE_DECLINED:
					$this->ocmMiddleware->assertOutgoingSharingEnabled();
					$share = $this->ocmMiddleware->getValidShare(
						$providerId, $notification['sharedSecret']
					);
					$this->fedShareManager->declineShare($share);
					break;
				case FileNotification::NOTIFICATION_TYPE_REQUEST_RESHARE:
					$this->ocmMiddleware->assertOutgoingSharingEnabled();
					$this->ocmMiddleware->assertNotNull(
						[
							'shareWith' => $notification['shareWith'],
							'senderId' => $notification['senderId'],
						]
					);
					$share = $this->ocmMiddleware->getValidShare(
						$providerId, $notification['sharedSecret']
					);

					// don't allow to share a file back to the owner
					$owner = $share->getShareOwner();
					$ownerAddress = $this->addressHandler->getLocalUserFederatedAddress($owner);
					$shareWithAddress = new Address($notification['shareWith']);
					$this->ocmMiddleware->assertNotSameUser($ownerAddress, $shareWithAddress);
					$this->ocmMiddleware->assertSharingPermissionSet($share);

					$reShare = $this->fedShareManager->reShare(
						$share, $notification['senderId'],
						$notification['shareWith']
					);
					return new JSONResponse(
						[
							'sharedSecret' => $reShare->getToken(),
							'providerId' => $reShare->getId()
						],
						Http::STATUS_CREATED
					);
					break;
				case FileNotification::NOTIFICATION_TYPE_RESHARE_CHANGE_PERMISSION:
					$this->ocmMiddleware->assertNotNull(
						[
							'permission' => $notification['permission']
						]
					);
					$share = $this->ocmMiddleware->getValidShare(
						$providerId, $notification['sharedSecret']
					);
					$this->fedShareManager->updateOcmPermissions(
						$share,
						$notification['permission']
					);
					break;
				case FileNotification::NOTIFICATION_TYPE_SHARE_UNSHARED:
					$this->fedShareManager->unshare(
						$providerId, $notification['sharedSecret']
					);
					break;
				case FileNotification::NOTIFICATION_TYPE_RESHARE_UNDO:
					// Stub. Let it fallback to the prev endpoint for now
					return new JSONResponse(
						['message' => "Notification of type {$notificationType} is not supported"],
						Http::STATUS_NOT_IMPLEMENTED
					);

					// owner or sender unshared a resource
					$share = $this->ocmMiddleware->getValidShare(
						$providerId, $notification['sharedSecret']
					);
					$this->fedShareManager->undoReshare($share);
					break;
				default:
					return new JSONResponse(
						['message' => "Notification of type {$notificationType} is not supported"],
						Http::STATUS_NOT_IMPLEMENTED
					);
			}
		} catch (OcmException $e) {
			return new JSONResponse(
				['message' => $e->getMessage()],
				$e->getHttpStatusCode()
			);
		} catch (\Exception $e) {
			$this->logger->error(
				"server can not process notification, {$e->getMessage()}",
				['app' => 'federatefilesharing']
			);
			return new JSONResponse(
				[
					'message' => "internal server error, was not able to process notification"
				],
				Http::STATUS_INTERNAL_SERVER_ERROR
			);
		}
		return new JSONResponse(
			[],
			Http::STATUS_CREATED
		);
	}

	/**
	 * Get list of supported protocols
	 *
	 * @return array
	 */
	protected function getProtocols() {
		return [
			'webdav' => $this->urlGenerator->getAbsoluteURL('/public.php/webdav/')
		];
	}

	/**
	 * @param string $resourceType
	 *
	 * @return bool
	 */
	protected function isSupportedResourceType($resourceType) {
		return $resourceType === FileNotification::RESOURCE_TYPE_FILE;
	}

	/**
	 * @param string $shareType
	 * @return bool
	 */
	protected function isSupportedShareType($shareType) {
		// TODO: make it a constant
		return $shareType === 'user';
	}

	/**
	 * @param string $protocolName
	 * @return bool
	 */
	protected function isSupportedProtocol($protocolName) {
		$supportedProtocols = $this->getProtocols();
		$supportedProtocolNames = \array_keys($supportedProtocols);
		return \in_array($protocolName, $supportedProtocolNames);
	}
}
