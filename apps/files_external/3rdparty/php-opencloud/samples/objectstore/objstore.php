<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

// note that we have to define these defaults BEFORE including the
// connection class
define('RAXSDK_OBJSTORE_NAME','cloudFiles');
define('RAXSDK_OBJSTORE_REGION','DFW');

require_once "php-opencloud.php";

// these hold our environment variable settings
define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

// establish our credentials
$connection = new \OpenCloud\Rackspace(AUTHURL,
	array('username' => USERNAME,
		   'apiKey' => APIKEY));

// create a Cloud Files (ObjectStore) connection
$ostore = $connection->ObjectStore();

// next, make a container named 'Sample'
$cont = $ostore->Container();
$cont->Create(array('name'=>'Sample'));

// finally, create an object in that container named hello.txt
$obj = $cont->DataObject();
$obj->SetData('Hello, World');
$obj->Create(array('name' => 'hello.txt', 'content_type' => 'text/plain'));

// list all the objects in the container
$list = $cont->ObjectList();
while($o = $list->Next())
	printf("Object: %s\n size: %d\n type: %s\n modified: %s\n\n",
	    $o->name, $o->bytes, $o->content_type, $o->last_modified);
