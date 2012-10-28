<?php 

OCP\JSON::checkLoggedIn();
$_SESSION['IFRAME_REQUESTTOKEN']=OC_Util::callRegister();
//OC_Log::write('core', 'register Call done', OC_Log::DEBUG);

?>