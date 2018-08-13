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
use OCP\AppFramework\Http\JSONResponse;
use OCA\FederatedFileSharing\Exception\InvalidShareException;
use OCA\FederatedFileSharing\Exception\NotSupportedException;
use OCA\FederatedFileSharing\FedShareManager;
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
	 * @param IURLGenerator $urlGenerator
	 * @param IUserManager $userManager
	 * @param AddressHandler $addressHandler
	 * @param FedShareManager $fedShareManager
	 * @param ILogger $logger
	 */
	public function __construct($appName,
									IRequest $request,
									IURLGenerator $urlGenerator,
									IUserManager $userManager,
									AddressHandler $addressHandler,
									FedShareManager $fedShareManager,
									ILogger $logger
	) {
		parent::__construct($appName, $request);

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
		return [
			'enabled' => true,
			'apiVersion' => self::API_VERSION,
			'endPoint' => $this->urlGenerator->linkToRouteAbsolute(
				"{$this->appName}.ocm.index"
			),
			'shareTypes' => [
				'name' => 'file',
				'protocols' => $this->getProtocols()
			]
		];
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 *
	 *
	 * @param string $shareWith identifier of the user or group
	 * 							to share the resource with
	 * @param string $name name of the shared resource
	 * @param string $description share description (optional)
	 * @param string $providerId Identifier of the resource at the provider side
	 * @param string $owner identifier of the user that owns the resource
	 * @param string $ownerDisplayName display name of the owner
	 * @param string $sender Provider specific identifier of the user that wants
	 * 							to share the resource
	 * @param string $senderDisplayName Display name of the user that wants
	 * 									to share the resource
	 * @param string $shareType Share type (user or group share)
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
			$hasMissingParams = $this->hasNull(
				[$shareWith, $name, $providerId, $owner, $shareType, $resourceType]
			);
			if ($hasMissingParams
				|| !\is_array($protocol)
				|| !isset($protocol['name'])
				|| !isset($protocol['options'])
				|| !\is_array($protocol['options'])
				|| !isset($protocol['options']['sharedSecret'])
			) {
				throw new InvalidShareException(
					'server can not add remote share, missing parameter'
				);
			}
			if (!\OCP\Util::isValidFileName($name)) {
				throw new InvalidShareException(
					'The mountpoint name contains invalid characters.'
				);
			}
			// FIXME this should be a method in the user management instead
			$this->logger->debug(
				"shareWith before, $shareWith",
				['app' => $this->appName]
			);
			\OCP\Util::emitHook(
				'\OCA\Files_Sharing\API\Server2Server',
				'preLoginNameUsedAsUserName',
				['uid' => &$shareWith]
			);
			$this->logger->debug(
				"shareWith after, $shareWith",
				['app' => $this->appName]
			);

			if (!$this->userManager->userExists($shareWith)) {
				throw new InvalidShareException("User $shareWith does not exist");
			}

			$ownerAddress = new Address($owner, $ownerDisplayName);
			$sharedByAddress = new Address($sender, $senderDisplayName);

			$this->fedShareManager->createShare(
				$ownerAddress,
				$sharedByAddress,
				$shareWith,
				$providerId,
				$name,
				$protocol['options']['sharedSecret']
			);
		} catch (InvalidShareException $e) {
			return new JSONResponse(
				['message' => $e->getMessage()],
				Http::STATUS_BAD_REQUEST
			);
		} catch (NotSupportedException $e) {
			return new JSONResponse(
				['message' => 'Server does not support federated cloud sharing'],
				Http::STATUS_SERVICE_UNAVAILABLE
			);
		} catch (\Exception $e) {
			$this->logger->error(
				"server can not add remote share, {$e->getMessage()}",
				['app' => 'federatefilesharing']
			);
			return new JSONResponse(
				['message' => "internal server error, was not able to add share from {$ownerAddress->getHostName()}"],
				Http::STATUS_INTERNAL_SERVER_ERROR
			);
		}
		return new JSONResponse(
			[],
			Http::STATUS_CREATED
		);
	}

	/**
	 * @param string $notificationType notification type (SHARE_REMOVED, etc)
	 * @param string $resourceType only 'file' is supported atm
	 * @param string $providerId Identifier of the resource at the provider side
	 * @param array $notification
	 * 		[
	 * 			optional additional parameters, depending on the notification
	 * 				and the resource type
	 * 		]
	 */
	public function processNotification($notificationType,
										$resourceType,
										$providerId,
										$notification
	) {
		// TODO: implement
	}

	protected function getProtocols() {
		return [
			'webdav' => '/public.php/webdav/'
		];
	}

	/**
	 * Check if value is null or an array has any null item
	 *
	 * @param mixed $param
	 *
	 * @return bool
	 */
	protected function hasNull($param) {
		if (\is_array($param)) {
			return \in_array(null, $param, true);
		} else {
			return $param === null;
		}
	}
}
