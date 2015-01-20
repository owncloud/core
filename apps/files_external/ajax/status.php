<?php

OCP\JSON::checkAppEnabled('files_external');
OCP\JSON::callCheck();

if ($_POST['isPersonal'] == 'true') {
	OCP\JSON::checkLoggedIn();
	$isPersonal = true;
} else {
	OCP\JSON::checkAdminUser();
	$isPersonal = false;
}

$class = $_POST['class'];
$options = $_POST['classOptions'];

$status = OC_Mount_Config::getBackendStatus($class, $options, $isPersonal);
OCP\JSON::success(array('data' => array('message' => $status)));
