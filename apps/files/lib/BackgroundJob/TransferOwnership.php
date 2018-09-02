<?php

namespace OCA\Files\BackgroundJob;

use OC\BackgroundJob\QueuedJob;
use OCA\Files\Service\TransferOwnership\TransferOwnershipService;
use OCP\ILogger;
use OCP\IUserManager;

class TransferOwnership extends QueuedJob {

	/** @var ILogger */
	protected $logger;
	/** @var TransferOwnershipService  */
	protected $service;
	/** @var IUserManager  */
	protected $userManager;

	public function __construct(TransferOwnershipService $service, IUserManager $userManager) {
		$this->service = $service;
		$this->userManager = $userManager;
	}

	public function execute($jobList, ILogger $logger = null) {
		$this->logger = $logger;
		parent::execute($jobList, $logger);
	}

	public function run($argument) {
		// Get the arguments;
		$arguments = json_decode($argument);
		if (!isset($arguments['sourceUser'], $arguments['destinationUser'], $arguments['sourcePath'])) {
			$this->logger->error(self::class . ' called with invalid argument: '.$argument, ['app' => 'files']);
			return;
		}
		// Call the transfer service
		$sourceUser = $this->userManager->get($arguments['sourceUser']);
		$destinationUser = $this->userManager->get($arguments['destinationuser']);

		if ($sourceUser === null || $destinationUser === null) {
			$this->logger->error("Trasnfer job called with missing users", ['app' => 'files']);
			return;
		}

		$sourcePath = $arguments['sourcePath'];
		try {
			$this->service->transfer($sourceUser, $destinationUser, $sourcePath);
		} catch (\Exception $e) {
			$this->logger->logException($e, ['app' =>  'files']);
			return;
		}

		$this->logger->info("Finished transfer of $sourcePath from {$sourceUser->getUID()} to {$destinationUser->getUID()}");
	}

}