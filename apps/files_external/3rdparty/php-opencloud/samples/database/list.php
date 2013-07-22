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
print "Connecting...\n";
$dbservice = $connection->DbService('cloudDatabases', 'DFW');

// delete all the instances created by the create.php script
$inlist = $dbservice->InstanceList(array('limit'=>2));
$pageno = 0;
do {
	printf("Page #%d of results...\n", ++$pageno);
	while($instance = $inlist->Next()) {
		printf("Instance: %s (%s)\n", $instance->id, $instance->Name());
		// get the instance for details
		$detail = $dbservice->Instance($instance->Id());
		printf("Volume size: %d Used: %f\n",
		    $detail->volume->size, $detail->volume->used);
		$dblist = $instance->DatabaseList();
		while($db = $dblist->Next()) {
			printf("  Database: %s\n", $db->name);
		}
		$userlist = $instance->UserList();
		while($user = $userlist->Next()) {
			printf("  User: %s\n", $user->name);
			foreach($user->databases as $db)
				printf("    Database for user; %s\n", $db->name);
		}
	}
	$inlist = $inlist->NextPage();
} while ($inlist);
