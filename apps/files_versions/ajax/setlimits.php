<?php
OCP\JSON::checkAppEnabled('files_versions');
OCP\JSON::checkAdminUser();
OCP\JSON::callCheck();

if ( !isset( $_POST['value'] ) ) {
	OCP\Config::setAppValue('files_versions', 'limitType', $_POST['type']);
} else {
	if ( $_POST['type'] == 'size' ) {
		OCP\Config::setAppValue('files_versions', 'max_size', OCP\Util::computerFileSize($_POST['value']));
	} else {
		OCP\Config::setAppValue('files_versions', 'max_time', $_POST['value']);
	}
}
