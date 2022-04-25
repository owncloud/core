<?php

namespace OC\Core\Jobs;

use OC\BackgroundJob\TimedJob;
use OC\Core\Command\Previews\Cleanup;
use OCA\Windriver\AppInfo\Application;
use OCA\Windriver\Db\ShareMapper;

class PreviewCleanupJob extends TimedJob {
	public function __construct() {
		$this->setInterval(3600); //execute job every hour
	}

	public function run($arguments) {
		$cmd = new Cleanup(\OC::$server->getDatabaseConnection());
		$count = $cmd->process();
		$logger = \OC::$server->getLogger();
		$logger->info("$count orphaned previews deleted");
	}
}
