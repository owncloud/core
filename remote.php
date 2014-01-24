<?php
$RUNTIME_NOAPPS = true;
$RUNTIME_ISREMOTE = true;

try {
	require_once 'lib/private/request.php';
	$path_info = OC_Request::getPathInfo();
	if ($path_info === false || $path_info === '') {
		require_once 'lib/private/response.php';
		OC_Response::setStatus(OC_Response::STATUS_NOT_FOUND);
		exit;
	}
	if (!$pos = strpos($path_info, '/', 1)) {
		$pos = strlen($path_info);
	}
	$service=substr($path_info, 1, $pos-1);

	// init here because $service is needed in exception handler
	require_once 'lib/base.php';

	$file = OC_AppConfig::getValue('core', 'remote_' . $service);

	if(is_null($file)) {
		OC_Response::setStatus(OC_Response::STATUS_NOT_FOUND);
		exit;
	}

	$file=ltrim($file, '/');

	$parts=explode('/', $file, 2);
	$app=$parts[0];
	switch ($app) {
		case 'core':
			$file =  OC::$SERVERROOT .'/'. $file;
			break;
		default:
			OC_Util::checkAppEnabled($app);
			OC_App::loadApp($app);
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
				$file = OC_App::getAppPath($app) .'/'. $parts[1];
			}else{
				$file = '/' . OC_App::getAppPath($app) .'/'. $parts[1];
			}
			break;
	}
	$baseuri = OC::$WEBROOT . '/remote.php/'.$service.'/';
	require_once $file;

} catch (Exception $ex) {
	OC_Response::setStatus(OC_Response::STATUS_INTERNAL_SERVER_ERROR);
	\OCP\Util::writeLog('remote', $ex->getMessage(), \OCP\Util::FATAL);
	// hard-coded because we can't init Sabre when base.php failed
	if ($service === 'webdav') {
		print('<?xml version="1.0" encoding="utf-8"?>');
		print('<d:error xmlns:d="DAV:" xmlns:s="http://sabredav.org/ns">');
		print('<s:exception>' . htmlspecialchars(get_class($ex)) . '</s:exception>');
		print('<s:message>' . htmlspecialchars($ex->getMessage()) . '</s:message>');
		//print('<s:sabredav-version>1.7.9</s:sabredav-version>');
	  	print('</d:error>');
	}
	else {
		OC_Template::printExceptionErrorPage($ex);
	}
}
