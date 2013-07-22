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

// create an instance
print "Creating a new instance...\n";
$instance = $dbservice->Instance();
$instance->flavor = $dbservice->Flavor(1);
$instance->volume->size = 3;
$instance->Create(array('name'=>'TestInstance'.time()));
$instance->WaitFor('ACTIVE', 300, 'showstatus');

// create a database
print "Creating a new database...\n";
$db = $instance->Database('TestDB');
$db->Create(array('character_set'=>'utf8'));

// create a user
print "Creating a new user...\n";
$user = $instance->User('dbuser');
$user->AddDatabase('TestDB');
$user->Create(array('password'=>'FOOBAR'));

print "Done\n";

exit;

function showstatus($item) {
    printf("\tStatus: %s\n", $item->status);
}
