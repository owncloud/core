<?php
namespace OC\Migrations;

use OC\User\AccountMapper;
use OC\User\AccountTermMapper;
use OC\User\Database;
use OC\User\Sync\BackendUsersIterator;
use OC\User\SyncService;
use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

class Version20170221114437 implements ISimpleMigration {

	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		$backend = new Database();
		$config = \OC::$server->getConfig();
		$logger = \OC::$server->getLogger();
		$connection = \OC::$server->getDatabaseConnection();
		$accountMapper = new AccountMapper($config, $connection, new AccountTermMapper($connection));
		$syncService = new SyncService($config, $logger, $accountMapper);

		// insert/update known users
		$out->info("Insert new users ...");
		$out->startProgress($backend->countUsers());
		$syncService->run($backend, new BackendUsersIterator($backend), function () use ($out) {
			$out->advance();
		});
		$out->finishProgress();
	}
}
