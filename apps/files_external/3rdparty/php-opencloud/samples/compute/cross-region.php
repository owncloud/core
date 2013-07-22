<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

require_once "php-opencloud.php";

/**
 * In this example, we're going to clone a server from one region to
 * another. The constant MYSERVERID identifies the server that we want
 * to clone from, and we'll create a new server in a different region
 * using the exact same parameters.
 */

// this is the ID of the server that we want to clone
define('MYSERVERID', '9bfd203a-0695-410d-8202-66c4194c967b');

// auth credentials
define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

printf("Authenticating...\n");

// establish our credentials
$rackspace = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

// now, connect to the compute service in Dallas and Chicago
$dallas = $rackspace->Compute(NULL, 'DFW');
$chicago = $rackspace->Compute(NULL, 'ORD');

printf("Retrieving the original server...\n");
$original = $dallas->Server(MYSERVERID);

printf("Copying it to a new, Chicago-based server...\n");
$copy = $chicago->Server($original);

printf("Creating the new server...\n");
$copy->Create();

printf("Waiting for it to finish...\n");
$copy->WaitFor('ACTIVE', 'dotter');

printf("All done\n");
exit;

/**
 * callback for WaitFor function, above
 */
function dotter($server) {
    printf("\t%s status:%s - %d%% complete...\n",
		$server->name, $server->status, $server->progress);
}

