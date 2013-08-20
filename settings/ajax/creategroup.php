<?php

OCP\JSON::callCheck();
OC_JSON::checkAdminUser();

$l = OC_L10n::get('settings');

$params = json_decode(file_get_contents('php://input'), true);

$groupname = $params["groupname"];

// Does the group exist?
if( in_array( $groupname, OC_Group::getGroups())) {
	OC_JSON::error(array("result" => array( "message" => $l->t("Group already exists") )));
	exit();
}

// Return Success story
if( OC_Group::createGroup( $groupname )) {
	OC_JSON::success(array("result" => array( "groupname" => $groupname )));
}
else{
	OC_JSON::error(array("result" => array( "message" => $l->t("Unable to add group") )));
}
