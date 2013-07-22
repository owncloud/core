<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

/**
 * This sample illustrates how to create a Swift/CloudFiles object
 * from a file using the file_get_contents() function. It uses its
 * own source code as the data!
 */

define('NUM_OBJECTS', 30); // the number of objects to create
define('CONTAINERNAME', 'OpenCloud-Sample-Container');
define('RAXSDK_OBJSTORE_NAME','cloudFiles');
define('RAXSDK_OBJSTORE_REGION','DFW');

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

// establish our credentials
$connection = new \OpenCloud\Rackspace(AUTHURL,
	array('username' => USERNAME,
		   'apiKey' => APIKEY));

// create a Cloud Files (ObjectStore) connection
$ostore = $connection->ObjectStore(/* uses defaults from above */);

// next, make a container named 'Sample'
printf("Creating container %s.\n", CONTAINERNAME);
$sample = $ostore->Container();
$sample->Create(array('name'=>CONTAINERNAME));

// create a bunch of objects
printf("\nCreating %d randomly-named objects:\n", NUM_OBJECTS);
for ($i=0; $i<=NUM_OBJECTS; $i++) {
    $obj = $sample->DataObject();
    $obj->SetData(rand());
    $obj->name = sprintf('%d-object-%d', rand(0,9), rand(0,999));
    $obj->Create(array('content_type'=>'text/plain'));
    printf("  Created %s\n", $obj->name);
}

// list all the objects in the container
print("\nListing all objects whose name starts with '3-':\n");
$list = $sample->ObjectList(array('prefix'=>'3-'));
while($o = $list->Next()) {
	printf("  Object: %s size: %d type: %s\n",
	    $o->name, $o->bytes, $o->content_type);
}

// delete everything
print("\nDeleting all the objects:\n");
$list = $sample->ObjectList();
while($o = $list->Next()) {
    printf("  Deleting %s\n", $o->name);
    $o->Delete();
}

// and delete the container
printf("\nAnd, finally, deleting the container %s.\n", CONTAINERNAME);
$sample->Delete();

print("\nDONE\n");
