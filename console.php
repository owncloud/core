<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */


require_once 'lib/base.php';

// Don't do anything if ownCloud has not been installed
if (!OC_Config::getValue('installed', false)) {
	exit(0);
}

if (OC::$CLI) {
	if ($argc > 1 && $argv[1] === 'update') {
		$msg = function($msg) {
			echo $msg."\n";
		};
		$failure = function($msg) {
			echo 'Failure: ' . $msg . "\n";
		};

		$updater = new \OC\Updater(\OC_Log::$object);
		$controller = new OC\Core\Controller\Update($updater);
		$controller->doUpgrade($msg, $failure);
	}
}
