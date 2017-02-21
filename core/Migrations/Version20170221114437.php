<?php
namespace OC\Migrations;

use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\Database;
use OC\User\SyncService;
use OCP\IConfig;
use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

class Version20170221114437 implements ISimpleMigration {

	/**
     * @param IOutput $out
     */
    public function run(IOutput $out) {
    	$backend = new Database();
		$accountMapper = new AccountMapper(\OC::$server->getDatabaseConnection());
		$config = \OC::$server->getConfig();
		$syncService = new SyncService($accountMapper, $backend, $config);

		// insert/update known users
		$out->info("Insert new users ...");
		$out->startProgress($backend->countUsers());
		$syncService->run(function () use ($out) {
			$out->advance();
		});
		$out->finishProgress();
	}
}
