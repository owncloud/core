<?php

OCP\JSON::callCheck();
OC_JSON::checkAdminUser();

$l = OC_L10n::get('settings');

$params = json_decode(file_get_contents('php://input'), true);

$groupname = $params["groupname"];
var_dump($params);
// Return Success story
if( OC_Group::deleteGroup( $groupname )) {
	OC_JSON::success(array("result" => array( "groupname" => $groupname )));
}
else{
	OC_JSON::error(array("result" => array( "message" => $l->t("Unable to delete group") )));
}