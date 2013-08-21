<?php
OC_JSON::checkAdminUser();
OCP\JSON::callCheck();

try {
	OC_App::disable(OC_App::cleanAppId($_POST['appid']));
	OC_JSON::success();
} catch (\OC\App\DependingAppsException $e) {
	$dependentstring = "";
	foreach ($e->getDependent() as $dependent) {
		$dependentstring .= "<br>" . $dependent;
	}
	$l = OC_L10N::get('settings');
	OC_JSON::error( array('data' => array( "message" => $l->t("Can not disable app, because the following apps depend on it:%s", $dependentstring) )) );
}
