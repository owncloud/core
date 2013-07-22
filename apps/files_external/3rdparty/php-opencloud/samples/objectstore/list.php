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

// now, connect to the ObjectStore service
$objstore = $connection->ObjectStore('cloudFiles', 'DFW');

printf("\n\nREGULAR CONTAINERS\n\n");

$conlist = $objstore->ContainerList();
while($con = $conlist->Next()) {
	printf("  %s (%d objects, %d bytes)\n", 
		$con->Name(), $con->count, $con->bytes);
}

printf("\n\nCDN CONTAINERS\n\n");

// get our CDN containers
$cdnlist = $objstore->CDN()->ContainerList(array('enabled_only'=>TRUE));

// loop through containers
while($cdncontainer = $cdnlist->Next()) {
    printf("\n(CDN) %s\n", $cdncontainer->Name());
    // get the original container
    try {
		$container = $objstore->Container($cdncontainer->Name());
	} catch (OpenCloud\Common\Exceptions\ContainerNotFoundError $e) {
		// This handles a weird edge case where a CDN container may not
		// have a corresponding private container. This can happen if the
		// CDN TTL is set very high and the original container is deleted.
		print "Related private container not found\n";
		continue;
	}
	printf("%d object%s, %d byte%s\n", 
		$container->count, $container->count==1?'':'s', 
		$container->bytes, $container->bytes==1?'':'s');
    // get all the objects
    $objlist = $container->ObjectList();
    // loop through objects
    while($o = $objlist->Next()) {
    	printf("   %s\n", $o->Name());
    	printf("   %s\n", $o->PublicUrl());
    }
}

