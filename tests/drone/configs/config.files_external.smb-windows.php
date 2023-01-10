<?php
$envVarsSet = true;
$smbHost = \getenv('SMB_WINDOWS_HOST');
if ($smbHost === false) {
	$envVarsSet = false;
	echo __FILE__ . " SMB_WINDOWS_HOST has not been set";
}
$smbUserName = \getenv('SMB_WINDOWS_USERNAME');
if ($smbUserName === false) {
	$envVarsSet = false;
	echo __FILE__ . " SMB_WINDOWS_USERNAME has not been set";
}
$smbUserPassword = \getenv('SMB_WINDOWS_PWD');
if ($smbUserPassword === false) {
	$envVarsSet = false;
	echo __FILE__ . " SMB_WINDOWS_PWD has not been set";
}
$smbShareName = \getenv('SMB_WINDOWS_SHARE_NAME');
if ($smbShareName === false) {
	$envVarsSet = false;
	echo __FILE__ . " SMB_WINDOWS_SHARE_NAME has not been set";
}
$smbDomain = \getenv('SMB_WINDOWS_DOMAIN');
if ($smbDomain === false) {
	$envVarsSet = false;
	echo __FILE__ . " SMB_WINDOWS_DOMAIN has not been set";
}
if ($envVarsSet === false) {
	echo __FILE__ . " the above environment variables must be set when running the SMB WIndows PHP unit tests";
}
return [
	'run' => true,
	'host' => $smbHost,
	'user' => $smbUserName,
	'password' => $smbUserPassword,
	'root' => '',
	'share' => $smbShareName,
	'domain' => $smbDomain,
];
