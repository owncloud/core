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

// list ALL the images
print("All images:\n");
$imlist = $compute->ImageList();
while($image = $imlist->Next()) {
    printf("\t%s - %s\n", $image->id, $image->name);
}

// list the server images
print("\n\nServer images only:\n");
$ilist = $compute->ImageList(TRUE, array('type'=>'SNAPSHOT'));
while($image = $ilist->Next()) {
    printf("\t%s - %s\n", $image->id, $image->name);
	printf("\tServer ID: %s\n", $image->server->id);
}

// list images named "CentOS 6.3"
print("\n\nCentOS 6.3 images:\n");
$ilist = $compute->ImageList(TRUE, array('name'=>'CentOS 6.3'));
while($image = $ilist->Next()) {
    printf("\t%s - %s\n", $image->id, $image->name);
}

