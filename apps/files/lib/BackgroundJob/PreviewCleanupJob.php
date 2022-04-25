<?php

namespace OCA\Files\BackgroundJob;

use OC\BackgroundJob\TimedJob;
use OC\PreviewCleanup;

class PreviewCleanupJob extends TimedJob {
	public function __construct() {
		$this->setInterval(3600); //execute job every hour
	}

	public function run($arguments) {
		$cmd = new PreviewCleanup(\OC::$server->getDatabaseConnection());
		$count = $cmd->process(false, 10);
		$logger = \OC::$server->getLogger();
		$logger->info("$count orphaned previews deleted");
	}
}
