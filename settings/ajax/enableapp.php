<?php

OC_JSON::checkAdminUser();
OCP\JSON::callCheck();

$appid = OC_App::enable(OC_App::cleanAppId($_POST['appid']));
if($appid === true) {
	OC_JSON::success(array('data' => array('appid' => $appid)));
} else {
	OC_JSON::error(array("data" => array("message" => $appid[0]) ));
}
