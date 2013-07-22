<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

define('IMAGE_ID', '8bf22129-8483-462b-a020-1754ec822770');
define('FLAVOR_ID', '2');

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

printf("Establish our credentials...\n");
$connection = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

printf("Connect to the compute service...\n");
$compute = $connection->Compute('cloudServersOpenStack', 'DFW');

printf("Get a server object...\n");
$server = $compute->Server();

printf("and create it...\n");
$server->Create(array(
	'name' => 'A simple server',
	'image' => $compute->Image(IMAGE_ID),
	'flavor' => $compute->Flavor(FLAVOR_ID)));

printf("The root password is [%s]\n", $server->adminPass);

printf("Wait for it to finish...\n");
$server->WaitFor('ACTIVE', 600, 'progress');

printf("DONE\n");
exit;

function progress($s) {
	printf("%3d%% complete, status is %s\n", $s->progress, $s->status);
}
