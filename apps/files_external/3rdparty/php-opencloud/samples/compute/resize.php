<?php
// (c)2012 Rackspace Hosting. See COPYING for license.

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);
define('MYREGION', $_ENV['OS_REGION_NAME']);

$rackspace = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));
$cservers = $rackspace->Compute('cloudServersOpenStack', MYREGION);
$list = $cservers->ServerList();
setDebug(TRUE);
$flavor = $cservers->Flavor(4);
setDebug(FALSE);
while($server = $list->Next()) {
    if ($server->name == 'MODEL') {
    	printf("Resizing %s [%s]\n", $server->Name(), $server->Id());
        $server->Resize($flavor);
    }
}
