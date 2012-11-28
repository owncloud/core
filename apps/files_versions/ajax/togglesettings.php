<?php

OCP\JSON::checkAppEnabled('files_versions');
OCP\JSON::checkAdminUser();
OCP\JSON::callCheck();
if (OCP\Config::getSystemValue('versions', 'true')=='true') {
	OCP\Config::setSystemValue('versions', 'false');
} else {
	OCP\Config::setSystemValue('versions', 'true');
	// set default values if versioning is enabled and they are not yet defined.
	if ( OCP\Config::getAppValue('files_versions', 'limitType') == null ) {
		OCP\Config::setAppValue('files_versions', 'limitType', 'number');
		OCP\Config::setAppValue('files_versions', 'max_size', '10485760');
		OCP\Config::setAppValue('files_versions', 'max_number', '5');	
	}
}
