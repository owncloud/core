<?php
set_time_limit(0);
$RUNTIME_NOAPPS = true;
require_once '../../lib/base.php';

// to bad OC_EventSource starts output, otherwise this could also be in the controller
if (OC::checkUpgrade(false)) {
	$eventSource = new OC_EventSource();
	$msg = function($msg) use ($eventSource) {
		$eventSource->send('success', $msg);
	};
	$failure = function($msg) use ($eventSource) {
		$eventSource->send('failure', $msg);
		$eventSource->close();
	};

	$updater = new \OC\Updater(\OC_Log::$object);
	$controller = new OC\Core\Controller\Update($updater);
	$controller->doUpgrade($msg, $failure);

	$eventSource->send('done', '');
	$eventSource->close();
}
