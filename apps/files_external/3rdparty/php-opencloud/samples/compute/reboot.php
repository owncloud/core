<?php
// (c)2012 Rackspace Hosting. See COPYING for license.

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

$rackspace = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));
$cservers = $rackspace->Compute('cloudServersOpenStack', 'DFW');
$list = $cservers->ServerList();
while($server = $list->Next()) {
    if ($server->name == 'MODEL')
        $server->Reboot('soft');
}
