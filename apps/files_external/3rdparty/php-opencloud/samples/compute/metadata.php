<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

// establish our credentials
$connection = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

// now, connect to the compute service
$compute = $connection->Compute('cloudServersOpenStack', 'DFW');

// let's get a list of servers - with details
$serverlist = $compute->ServerList(RAXSDK_DETAILS);
while($server = $serverlist->Next()) {
	$metadata = $server->metadata();
	// set a value
	$metadata->random = "X".rand();
	$metadata->Update();
	// display the metadata
	printf("Server [%s] metadata:\n", $server->name);
	// print them all
	foreach($metadata as $name => $value)
		printf("  %s = %s\n", $name, $value);
	// now delete the random key
	$meta2 = $server->metadata('random');
	$meta2->Delete();
}
