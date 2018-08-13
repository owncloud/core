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
use OCA\FederatedFileSharing\Exception\NotSupportedException;
use OCA\FederatedFileSharing\Exception\InvalidShareException;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\FedShareManager;
use OCP\App\IAppManager;
use OCP\AppFramework\Http;
use OCP\AppFramework\OCSController;
use OCP\Constants;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\Share;
use OCP\Share\IShare;

/**
 * Class RequestHandlerController
 *
 * Handles OCS Request to the federated share API
 *
 * @package OCA\FederatedFileSharing\API
 */
class RequestHandlerController extends OCSController {

	/** @var FederatedShareProvider */
	private $federatedShareProvider;

	/** @var IAppManager */
	private $appManager;

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
	 * @param FederatedShareProvider $federatedShareProvider
	 * @param IAppManager $appManager
	 * @param IUserManager $userManager
	 * @param AddressHandler $addressHandler
	 * @param FedShareManager $fedShareManager
	 */
	public function __construct($appName,
								IRequest $request,
								FederatedShareProvider $federatedShareProvider,
								IAppManager $appManager,
								IUserManager $userManager,
								AddressHandler $addressHandler,
								FedShareManager $fedShareManager
	) {
		parent::__construct($appName, $request);

		$this->federatedShareProvider = $federatedShareProvider;
		$this->appManager = $appManager;
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
			$this->assertIncomingSharingEnabled();
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
			$hasMissingParams = $this->hasNull(
				[$remote, $token, $name, $owner, $remoteId, $shareWith]
			);
			if ($hasMissingParams) {
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
			\OCP\Util::writeLog('files_sharing', 'shareWith before, ' . $shareWith, \OCP\Util::DEBUG);
			\OCP\Util::emitHook(
				'\OCA\Files_Sharing\API\Server2Server',
				'preLoginNameUsedAsUserName',
				['uid' => &$shareWith]
			);
			\OCP\Util::writeLog('files_sharing', 'shareWith after, ' . $shareWith, \OCP\Util::DEBUG);
			if (!$this->userManager->userExists($shareWith)) {
				throw new InvalidShareException('User does not exist');
			}

			if ($ownerFederatedId === null) {
				$ownerFederatedId = $owner . '@' . $this->addressHandler->normalizeRemote($remote);
			}
			// if the owner of the share and the initiator are the same user
			// we also complete the federated share ID for the initiator
			if ($sharedByFederatedId === null && $owner === $sharedBy) {
				$sharedByFederatedId = $ownerFederatedId;
			}

			$ownerAddress = new Address($ownerFederatedId);
			$sharedByAddress = new Address($sharedByFederatedId);

			$this->fedShareManager->createShare(
				$ownerAddress,
				$sharedByAddress,
				$shareWith,
				$remoteId,
				$name,
				$token
			);
		} catch (InvalidShareException $e) {
			return new Result(
				null,
				Http::STATUS_BAD_REQUEST,
				$e->getMessage()
			);
		} catch (NotSupportedException $e) {
			return new Result(
				null,
				Http::STATUS_SERVICE_UNAVAILABLE,
				'Server does not support federated cloud sharing'
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

		if ($this->hasNull([$id, $token, $shareWith, $permission, $remoteId])) {
			return new Result(null, Http::STATUS_BAD_REQUEST);
		}

		try {
			$permission = (int) $permission;
			$remoteId = (int) $remoteId;
			$share = $this->getValidShare($id);

			// don't allow to share a file back to the owner
			list($user, $remote) = $this->addressHandler->splitUserRemote($shareWith);
			$owner = $share->getShareOwner();
			$currentServer = $this->addressHandler->generateRemoteURL();
			if ($this->addressHandler->compareAddresses($user, $remote, $owner, $currentServer)) {
				return new Result(null, Http::STATUS_FORBIDDEN);
			}

			$reSharingAllowed = $share->getPermissions() & Constants::PERMISSION_SHARE;
			if (!$reSharingAllowed) {
				return new Result(null, Http::STATUS_BAD_REQUEST);
			}
			$result = $this->fedShareManager->reShare(
				$share,
				$remoteId,
				$shareWith,
				$permission
			);
		} catch (Share\Exceptions\ShareNotFound $e) {
			return new Result(null, Http::STATUS_NOT_FOUND);
		} catch (InvalidShareException $e) {
			return new Result(null, Http::STATUS_FORBIDDEN);
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
			$this->assertOutgoingSharingEnabled();
			$share = $this->getValidShare($id);
			$this->fedShareManager->acceptShare($share);
		} catch (NotSupportedException $e) {
			return new Result(
				null,
				Http::STATUS_SERVICE_UNAVAILABLE,
				'Server does not support federated cloud sharing'
			);
		} catch (Share\Exceptions\ShareNotFound $e) {
			// pass
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
			$this->assertOutgoingSharingEnabled();
			$share = $this->getValidShare($id);
			$this->fedShareManager->declineShare($share);
		} catch (NotSupportedException $e) {
			return new Result(
				null,
				Http::STATUS_SERVICE_UNAVAILABLE,
				'Server does not support federated cloud sharing'
			);
		} catch (Share\Exceptions\ShareNotFound $e) {
			// pass
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
			$this->assertOutgoingSharingEnabled();
			$token = $this->request->getParam('token', null);
			if ($token && $id) {
				$this->fedShareManager->unshare($id, $token);
			}
		} catch (NotSupportedException $e) {
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
			$share = $this->getValidShare($id);
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

			$share = $this->getValidShare($id);
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

	/**
	 * Get share by id, validate it's type and token
	 *
	 * @param int $id
	 *
	 * @return IShare
	 *
	 * @throws Share\Exceptions\ShareNotFound
	 * @throws InvalidShareException
	 */
	protected function getValidShare($id) {
		$share = $this->federatedShareProvider->getShareById($id);
		$token = $this->request->getParam('token', null);
		if ($share->getShareType() !== FederatedShareProvider::SHARE_TYPE_REMOTE
			|| $share->getToken() !== $token
		) {
			throw new InvalidShareException();
		}
		return $share;
	}

	/**
	 * Make sure that incoming shares are enabled
	 *
	 * @return void
	 *
	 * @throws NotSupportedException
	 */
	protected function assertIncomingSharingEnabled() {
		if (!$this->appManager->isEnabledForUser('files_sharing')
			|| !$this->federatedShareProvider->isIncomingServer2serverShareEnabled()
		) {
			throw new NotSupportedException();
		}
	}
	
	/**
	 * Make sure that outgoing shares are enabled
	 *
	 * @return void
	 *
	 * @throws NotSupportedException
	 */
	protected function assertOutgoingSharingEnabled() {
		if (!$this->appManager->isEnabledForUser('files_sharing')
			|| !$this->federatedShareProvider->isOutgoingServer2serverShareEnabled()
		) {
			throw new NotSupportedException();
		}
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
