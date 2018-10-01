<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

use OC\OCS\Result;
use OCA\FederatedFileSharing\Address;
use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\FedShareManager;
use OCA\FederatedFileSharing\Middleware\OcmMiddleware;
use OCA\FederatedFileSharing\Ocm\Exception\BadRequestException;
use OCA\FederatedFileSharing\Ocm\Exception\NotImplementedException;
use OCA\FederatedFileSharing\Ocm\Exception\OcmException;
use OCP\AppFramework\Http;
use OCP\AppFramework\OCSController;
use OCP\IRequest;
use OCP\IUserManager;

/**
 * Class RequestHandlerController
 *
 * Handles OCS Request to the federated share API
 *
 * @package OCA\FederatedFileSharing\API
 */
class RequestHandlerController extends OCSController {

	/** @var OcmMiddleware */
	private $ocmMiddleware;

	/** @var IUserManager */
	private $userManager;

	/** @var AddressHandler */
	private $addressHandler;

	/** @var  FedShareManager */
	private $fedShareManager;

	/**
	 * Server2Server constructor.
	 *
	 * @param string $appName
	 * @param IRequest $request
	 * @param OcmMiddleware $ocmMiddleware
	 * @param IUserManager $userManager
	 * @param AddressHandler $addressHandler
	 * @param FedShareManager $fedShareManager
	 */
	public function __construct($appName,
								IRequest $request,
								OcmMiddleware $ocmMiddleware,
								IUserManager $userManager,
								AddressHandler $addressHandler,
								FedShareManager $fedShareManager
	) {
		parent::__construct($appName, $request);

		$this->ocmMiddleware = $ocmMiddleware;
		$this->userManager = $userManager;
		$this->addressHandler = $addressHandler;
		$this->fedShareManager = $fedShareManager;
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * create a new share
	 *
	 * @return Result
	 */
	public function createShare() {
		try {
			$this->ocmMiddleware->assertIncomingSharingEnabled();
			$remote = $this->request->getParam('remote', null);
			$token = $this->request->getParam('token', null);
			$name = $this->request->getParam('name', null);
			$owner = $this->request->getParam('owner', null);
			$sharedBy = $this->request->getParam('sharedBy', null);
			$shareWith = $this->request->getParam('shareWith', null);
			$remoteId = $this->request->getParam('remoteId', null);
			$sharedByFederatedId = $this->request->getParam(
				'sharedByFederatedId',
				null
			);
			$ownerFederatedId = $this->request->getParam('ownerFederatedId', null);
			$this->ocmMiddleware->assertNotNull(
				[
					'remote' => $remote,
					'token' => $token,
					'name' => $name,
					'owner' => $owner,
					'remoteId' => $remoteId,
					'shareWith' => $shareWith
				]
			);

			if (!\OCP\Util::isValidFileName($name)) {
				throw new BadRequestException(
					'The mountpoint name contains invalid characters.'
				);
			}
			// FIXME this should be a method in the user management instead
			\OCP\Util::writeLog('files_sharing', 'shareWith before, ' . $shareWith, \OCP\Util::DEBUG);
			\OCP\Util::emitHook(
				'\OCA\Files_Sharing\API\Server2Server',
				'preLoginNameUsedAsUserName',
				['uid' => &$shareWith]
			);
			\OCP\Util::writeLog('files_sharing', 'shareWith after, ' . $shareWith, \OCP\Util::DEBUG);
			if (!$this->userManager->userExists($shareWith)) {
				throw new BadRequestException('User does not exist');
			}

			$ownerAddress = $ownerFederatedId === null
				? new Address("{$owner}@{$remote}")
				: new Address($ownerFederatedId);
			// if the owner of the share and the initiator are the same user
			// we also complete the federated share ID for the initiator
			if ($sharedByFederatedId === null && $owner === $sharedBy) {
				$sharedByFederatedId = $ownerAddress->getCloudId();
			}

			$sharedByAddress = new Address($sharedByFederatedId);

			$this->fedShareManager->createShare(
				$ownerAddress,
				$sharedByAddress,
				$shareWith,
				$remoteId,
				$name,
				$token
			);
		} catch (OcmException $e) {
			return new Result(
				null,
				$e->getHttpStatusCode(),
				$e->getMessage()
			);
		} catch (\Exception $e) {
			\OCP\Util::writeLog(
				'files_sharing',
				'server can not add remote share, ' . $e->getMessage(),
				\OCP\Util::ERROR
			);
			return new Result(
				null,
				Http::STATUS_INTERNAL_SERVER_ERROR,
				'internal server error, was not able to add share from ' . $remote
			);
		}
		return new Result();
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * create re-share on behalf of another user
	 *
	 * @param int $id
	 *
	 * @return Result
	 */
	public function reShare($id) {
		$token = $this->request->getParam('token', null);
		$shareWith = $this->request->getParam('shareWith', null);
		$permission = $this->request->getParam('permission', null);
		$remoteId = $this->request->getParam('remoteId', null);

		try {
			$this->ocmMiddleware->assertNotNull(
				[
					'id' => $id,
					'token' => $token,
					'shareWith' => $shareWith,
					'permission'  => $permission,
					'remoteId' => $remoteId
				]
			);
			$permission = (int) $permission;
			$remoteId = (int) $remoteId;
			$share = $this->ocmMiddleware->getValidShare($id, $token);

			// don't allow to share a file back to the owner
			$owner = $share->getShareOwner();
			$ownerAddress = $this->addressHandler->getLocalUserFederatedAddress($owner);
			$shareWithAddress = new Address($shareWith);
			$this->ocmMiddleware->assertNotSameUser($ownerAddress, $shareWithAddress);

			$this->ocmMiddleware->assertSharingPermissionSet($share);
			$result = $this->fedShareManager->reShare(
				$share,
				$remoteId,
				$shareWith,
				$permission
			);
		} catch (OcmException $e) {
			return new Result(
				null,
				$e->getHttpStatusCode(),
				$e->getMessage()
			);
		} catch (\Exception $e) {
			return new Result(null, Http::STATUS_BAD_REQUEST);
		}

		return new Result(
			[
				'token' => $result->getToken(),
				'remoteId' => $result->getId()
			]
		);
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * accept server-to-server share
	 *
	 * @param int $id
	 *
	 * @return Result
	 */
	public function acceptShare($id) {
		try {
			$this->ocmMiddleware->assertOutgoingSharingEnabled();
			$token = $this->request->getParam('token', null);
			$share = $this->ocmMiddleware->getValidShare($id, $token);
			$this->fedShareManager->acceptShare($share);
		} catch (NotImplementedException $e) {
			return new Result(
				null,
				Http::STATUS_SERVICE_UNAVAILABLE,
				'Server does not support federated cloud sharing'
			);
		}
		return new Result();
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * decline server-to-server share
	 *
	 * @param int $id
	 *
	 * @return Result
	 */
	public function declineShare($id) {
		try {
			$token = $this->request->getParam('token', null);
			$this->ocmMiddleware->assertOutgoingSharingEnabled();
			$share = $this->ocmMiddleware->getValidShare($id, $token);
			$this->fedShareManager->declineShare($share);
		} catch (NotImplementedException $e) {
			return new Result(
				null,
				Http::STATUS_SERVICE_UNAVAILABLE,
				'Server does not support federated cloud sharing'
			);
		}

		return new Result();
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * remove server-to-server share if it was unshared by the owner
	 *
	 * @param int $id
	 *
	 * @return Result
	 */
	public function unshare($id) {
		try {
			$this->ocmMiddleware->assertOutgoingSharingEnabled();
			$token = $this->request->getParam('token', null);
			if ($token && $id) {
				$this->fedShareManager->unshare($id, $token);
			}
		} catch (NotImplementedException $e) {
			return new Result(
				null,
				Http::STATUS_SERVICE_UNAVAILABLE,
				'Server does not support federated cloud sharing'
			);
		} catch (\Exception $e) {
			// pass
		}
		return new Result();
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * federated share was revoked, either by the owner or the re-sharer
	 *
	 * @param int $id
	 *
	 * @return Result
	 */
	public function revoke($id) {
		try {
			$token = $this->request->getParam('token', null);
			$share = $this->getValidShare($id, $token);
			$this->fedShareManager->revoke($share);
		} catch (\Exception $e) {
			return new Result(null, Http::STATUS_BAD_REQUEST);
		}

		return new Result();
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * update share information to keep federated re-shares in sync
	 *
	 * @param int $id
	 *
	 * @return Result
	 */
	public function updatePermissions($id) {
		try {
			$permissions = $this->request->getParam('permissions', null);
			$token = $this->request->getParam('token', null);
			$share = $this->ocmMiddleware->getValidShare($id, $token);
			$validPermission = \ctype_digit((string)$permissions);
			if (!$validPermission) {
				throw new \Exception();
			}
			$this->fedShareManager->updatePermissions($share, (int)$permissions);
		} catch (\Exception $e) {
			return new Result(null, Http::STATUS_BAD_REQUEST);
		}

		return new Result();
	}
}
