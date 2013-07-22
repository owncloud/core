<?php
// (c)2012 Rackspace Hosting. See COPYING for license.

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

print "Authenticating...\n";
$rackspace = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));
$compute = $rackspace->Compute('cloudServersOpenStack', 'DFW');
$server = $compute->Server();
print "Creating the server...\n";
$server->Create(array(
    'name' => 'MyServer',
    'flavor' => $compute->Flavor(2),
    'image' => $compute->ImageList(TRUE,array('name'=>'CentOS 6.3'))->Next()
    ));
$server->WaitFor('ACTIVE', 300, 'progress');
print "Done\n";
exit;

// callback function for WaitFor
function progress($server) {
    printf("%s:%-8s %3d%% complete\n",
        $server->name, $server->status, $server->progress);
}
