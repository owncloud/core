<?php
require_once '../../lib/base.php';

// Javascript
header("Content-type: text/javascript"); 

// Disable caching
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 

// Apps Paths
$apps_paths = array();
foreach(OC_App::getEnabledApps() as $app) {
	$apps_paths[$app] = OC_App::getAppWebPath($app);
}
$apps_paths = str_replace('\\/', '/',json_encode($apps_paths));
?>
var oc_webroot = '<?php echo OC::$WEBROOT; ?>';
var oc_appswebroots = <?php echo $apps_paths ?>;
var oc_current_user = '<?php echo OC_User::getUser() ?>';
var oc_requesttoken = '<?php echo OC_Util::callRegister() ?>';
var oc_requestlifespan = '<?php echo OC_Util::$callLifespan ?>';