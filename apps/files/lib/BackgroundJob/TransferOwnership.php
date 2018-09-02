<?php

namespace OCA\Files\BackgroundJob;

use OC\BackgroundJob\QueuedJob;
use OCA\Files\Service\TransferOwnership\TransferOwnershipService;
use OCA\Files\Service\TransferOwnership\TransferRequestManager;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\Files\IRootFolder;
use OCP\Files\NotFoundException;
use OCP\ILogger;
use OCP\IUserManager;

class TransferOwnership extends QueuedJob {

	/** @var ILogger */
	protected $logger;
	/** @var TransferOwnershipService  */
	protected $service;
	/** @var IUserManager  */
	protected $userManager;
	/** @var TransferRequestManager  */
	protected $requestManager;
	/** @var IRootFolder  */
	protected $rootFolder;

	public function __construct(
		TransferOwnershipService $service,
		IUserManager $userManager,
		TransferRequestManager $requestManager,
		IRootFolder $rootFolder) {
		$this->service = $service;
		$this->userManager = $userManager;
		$this->requestManager = $requestManager;
		$this->rootFolder = $rootFolder;
	}

	public function execute($jobList, ILogger $logger = null) {
		$this->logger = $logger;
		parent::execute($jobList, $logger);
	}

	public function run($argument) {
		// Get the arguments;
		$arguments = json_decode($argument);
		try {
			$request = $this->requestManager->getRequestById($arguments->requestId);
		} catch (DoesNotExistException $e) {
			// Can happen if this gets deleted before the cron runs
			$this->logger->info("Transfer job called but request is missing");
			return;
		}

		// Call the transfer service
		$sourceUser = $this->userManager->get($request->getSourceUserId());
		$destinationUser = $this->userManager->get($request->getDestinationUserId());

		if ($sourceUser === null || $destinationUser === null) {
			$this->logger->error("Trasnfer job called but at least one of the users in the request are missing: source:{$request->getSourceUserId()} destination:{$request->getDestinationUserId()}", ['app' => 'files']);
			return;
		}

		try {
			$sourcePath = $this->rootFolder->getUserFolder($request->getSourceUserId())
				->getById($request->getFileId())[0]
				->getInternalPath();
		} catch (NotFoundException $e) {
			$this->logger->error("Transfer job called but node no longer exists");
			$this->requestManager->deleteRequest($request);
			return;
		}


		try {
			$this->service->transfer($sourceUser, $destinationUser, $sourcePath);
		} catch (\Exception $e) {
			$this->logger->logException($e, ['app' =>  'files']);
			return;
		}

		$this->logger->info("Finished transfer of $sourcePath from {$sourceUser->getUID()} to {$destinationUser->getUID()}");
		$this->requestManager->actionRequest($request);

	}

}