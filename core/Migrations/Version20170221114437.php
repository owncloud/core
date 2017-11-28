<?php
namespace OC\Migrations;

use OC\Migration\OutputAdapter;
use OC\Migration\SimpleOutput;
use OC\User\AccountMapper;
use OC\User\AccountTermMapper;
use OC\User\Database;
use OC\User\SyncService;
use OC\User\SyncServiceCallback;
use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;
use OCP\Util;

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
		$syncService = new SyncService($accountMapper, $backend, $config, $logger);

		// insert/update known users
		$out->info("Insert new users ...");
		$out->startProgress($backend->countUsers());
		$syncService->run(new SyncServiceCallback(
			$out,
			(int)$config->getSystemValue('loglevel', Util::WARN)
		));
		$out->finishProgress();
	}
}
