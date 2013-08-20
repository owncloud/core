<?php

OCP\JSON::callCheck();
OC_JSON::checkAdminUser();

$l = OC_L10n::get('settings');

$params = json_decode(file_get_contents('php://input'), true);

$username = $params["username"];

// A user shouldn't be able to delete his own account
if(OC_User::getUser() === $username) {
	exit;
}

if(!OC_User::isAdminUser(OC_User::getUser()) && !OC_SubAdmin::isUserAccessible(OC_User::getUser(), $username)) {
	OC_JSON::error(array( "result" => array( "message" => $l->t("Authentication error") )));
	exit();
}

// Return Success story
if( OC_User::deleteUser( $username )) {
	OC_JSON::success(array("result" => array( "username" => $username )));
}
else{
	OC_JSON::error(array("result" => array( "message" => $l->t("Unable to delete user") )));
}
