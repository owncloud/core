<?php
// (c)2012 Rackspace Hosting. See COPYING for license.

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

/**
 * Finds the MODEL server
 */
function find_MODEL($list) {
    while($server = $list->Next()) {
        if ($server->name == 'MODEL')
            return $server;
    }
    die("Can't find the MODEL server\n");
}

/**
 * WaitFor callback function
 */
function dot($server) {
    print(".");
}
$rackspace = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));
$cservers = $rackspace->Compute('cloudServersOpenStack', 'DFW');
$list = $cservers->ServerList();
$model = find_MODEL($list);
if ($model->status == 'RESCUE') {
    printf("MODEL is already in RESCUE mode; unrescuing\n");
}
else {
    printf("Putting server into rescue mode...\n");
    $password = $model->Rescue();
    printf("MODEL IP is [%s]\n", $model->ip(4));
    printf("Waiting for RESCUE mode");
    $model->WaitFor('RESCUE', 300, 'dot');
    printf("\n");
    printf("Root password of rescue serveris [%s]\n", $password);
    printf("Verify rescue server and press RETURN to continue\n");
    print "> ";
    $fp = fopen('php://stdin', 'r');
    fgets($fp);
    fclose($fp);
}
printf("Unrescuing the server\n");
$model->Unrescue();
