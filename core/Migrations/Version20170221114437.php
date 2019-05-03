<?php
namespace OC\Migrations;

use OC\User\Database;
use OC\User\Sync\AllUsersIterator;
use OC\User\SyncService;
use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

class Version20170221114437 implements ISimpleMigration {
	/** @var SyncService */
	private $syncService;
	/** @var Database */
	private $dbBackend;

	public function __construct(SyncService $syncService, Database $dbBackend) {
		$this->syncService = $syncService;
		$this->dbBackend = $dbBackend;
	}

	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		// insert/update known users
		$out->info("Insert new users ...");
		$out->startProgress($this->dbBackend->countUsers());
		$this->syncService->run($this->dbBackend, new AllUsersIterator($this->dbBackend), function () use ($out) {
			$out->advance();
		});
		$out->finishProgress();
	}
}
