<?php

/**
 * In case background execution mode is ajax we execute one job within a remote call
 */
function executeBackgroundJobs() {
	$appMode = OC_BackgroundJob::getExecutionType();
	if ($appMode !== 'ajax') {
		return;
	}

	// execute one job
	try {
		$logger = \OC_Log::$object;
		$jobList = \OC::$server->getJobList();
		$job = $jobList->getNext();
		$job->execute($jobList, $logger);
		$jobList->setLastJob($job);
	} catch(Exception $ex) {
		\OC::$server->getLogger()->error('Job execution failed: {exception}',
			array('app' => 'core', 'exception' => $ex));
	}
}

try {
	require_once 'lib/base.php';
	$path_info = OC_Request::getPathInfo();
	if ($path_info === false || $path_info === '') {
		OC_Response::setStatus(OC_Response::STATUS_NOT_FOUND);
		exit;
	}
	if (!$pos = strpos($path_info, '/', 1)) {
		$pos = strlen($path_info);
	}
	$service=substr($path_info, 1, $pos-1);

	$file = \OC::$server->getAppConfig()->getValue('core', 'remote_' . $service);

	if(is_null($file)) {
		OC_Response::setStatus(OC_Response::STATUS_NOT_FOUND);
		exit;
	}

	$file=ltrim($file, '/');

	$parts=explode('/', $file, 2);
	$app=$parts[0];

	// Load all required applications
	\OC::$REQUESTEDAPP = $app;
	OC_App::loadApps(array('authentication'));
	OC_App::loadApps(array('filesystem', 'logging'));

	switch ($app) {
		case 'core':
			$file =  OC::$SERVERROOT .'/'. $file;
			break;
		default:
			OC_Util::checkAppEnabled($app);
			OC_App::loadApp($app);
			$file = OC_App::getAppPath($app) .'/'. $parts[1];
			break;
	}
	$baseuri = OC::$WEBROOT . '/remote.php/'.$service.'/';
	executeBackgroundJobs();

	require_once $file;

} catch (Exception $ex) {
	OC_Response::setStatus(OC_Response::STATUS_INTERNAL_SERVER_ERROR);
	\OCP\Util::writeLog('remote', $ex->getMessage(), \OCP\Util::FATAL);
	OC_Template::printExceptionErrorPage($ex);
}
