<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OCA\Files\Controller;

use OCA\Files\Service\TransferOwnership\TransferRequestManager;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IUserSession;

/**
 * Class TransferController
 *
 * @package OCA\Files\Controller
 */
class TransferController extends Controller {
	/** @var string */
	protected $appName;
	/** @var IRequest */
	protected $request;
	/** @var TransferRequestManager  */
	protected $transferManager;
	/** @var IUserSession  */
	protected $userSession;
	/** @var ILogger  */
	protected $logger;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param TransferRequestManager $transferManager
	 */
	public function __construct($appName,
								IRequest $request,
								TransferRequestManager $transferManager,
								IUserSession $userSession,
								ILogger $logger
	) {
		parent::__construct($appName, $request);
		$this->appName = $appName;
		$this->request = $request;
		$this->transferManager = $transferManager;
		$this->userSession = $userSession;
		$this->logger = $logger;
	}

	/**
	 * @NoAdminRequired
	 */
	public function transfer() {
		$file = $this->request->getParam('file');
		$dir = $this->request->getParam('dir');
		$destinationUser = $this->request->getParam('uid');
		$destinationUser = \OC::$server->getUserManager()->get($destinationUser);
		$sessionUser = \OC::$server->getUserSession()->getUser();
		$fileId = \OC::$server->getUserFolder($sessionUser->getUID())->get($dir.'/'.$file)->getId();
		try {
			$this->transferManager->newTransferRequest($sessionUser, $destinationUser, $fileId);
			return new JSONResponse();
		} catch (\Exception $e) {
			return new JSONResponse(['message' => $e->getMessage()], Http::STATUS_INTERNAL_SERVER_ERROR);
		}
	}

	/**
	 * @NoAdminRequired
	 */
	public function accept($requestId) {
		// Check this user is the recipient of this request
		try {
			// Not found, bad request
			$request = $this->transferManager->getRequestById($requestId);
		} catch (DoesNotExistException $e) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		$sessionUser = $this->userSession->getUser();
		if ($request->getDestinationUserId() !== $sessionUser->getUID()) {
			// This isn't their request to respond to, bad request
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		try {
			$this->transferManager->acceptRequest($request);
			return new JSONResponse([]);
		} catch (\Exception $e) {
			$this->logger->logException($e, ['app' => 'files']);
			return new JSONResponse([], Http::STATUS_INTERNAL_SERVER_ERROR);
		}
	}

	/**
	 * @NoAdminRequired
	 */
	public function reject($requestId) {
		// Check this user is the recipient of this request
		try {
			// Not found, bad request
			$request = $this->transferManager->getRequestById($requestId);
		} catch (DoesNotExistException $e) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		$sessionUser = $this->userSession->getUser();
		if ($request->getDestinationUserId() !== $sessionUser->getUID()) {
			// This isn't their request to respond to, bad request
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		try {
			$this->transferManager->rejectRequest($request);
			return new JSONResponse([]);
		} catch (\Exception $e) {
			$this->logger->logException($e, ['app' => 'files']);
			return new JSONResponse([], Http::STATUS_INTERNAL_SERVER_ERROR);
		}
	}




}
