<?php
/**
 * (c)2012 Rackspace Hosting. See COPYING for license details
 *
 * This sample creates an isolated network called SAMPLENET. It then
 * creates two servers attached to that network. Once the servers are
 * created, it pauses to wait for you to verify the connectivity. When
 * it continues, it deletes the servers and SAMPLENET.
 */
$start = time();

require_once "php-opencloud.php";

define('INSTANCENAME', 'SmokeTestInstance');
define('SERVERNAME', 'SmokeTestServer');

/**
 * Relies upon environment variable settings — these are the same environment
 * variables that are used by python-novaclient. Just make sure that they're
 * set to the right values before running this test.
 */
define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

/**
 * numbers each step
 */
function step($msg,$p1=NULL,$p2=NULL,$p3=NULL) {
    global $STEPCOUNTER;
    printf("\nStep %d. %s\n", ++$STEPCOUNTER, sprintf($msg,$p1,$p2,$p3));
}
function info($msg,$p1=NULL,$p2=NULL,$p3=NULL) {
    printf("  %s\n", sprintf($msg,$p1,$p2,$p3));
}
define('TIMEFORMAT', 'r');

step('Authenticate');
$rackspace = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

step('Connect to Cloud Servers');
$cloudservers = $rackspace->Compute('cloudServersOpenStack', 'DFW');

step('Create a network SAMPLENET');
$samplenet = $cloudservers->Network();
$samplenet->Create(array(
    'label' => 'SAMPLENET',
    'cidr' => '192.168.0.0/24'));

step('List Networks');
$netlist = $cloudservers->NetworkList();
$netlist->Sort('label');
while($net = $netlist->Next())
	info('%s: %s (%s)', $net->id, $net->label, $net->cidr);

step('Create two servers on SAMPLENET');
$list = $cloudservers->ImageList(TRUE, array('name'=>'CentOS 6.3'));
$image = $list->First();
$flavor = $cloudservers->Flavor(2); // 512MB
$server1 = $cloudservers->Server();
info('Creating Server1');
$server1->Create(array(
    'name' => 'Server1',
    'image' => $image,
    'flavor' => $flavor,
    'networks' => array($samplenet, $cloudservers->Network(RAX_PUBLIC))));
$server2 = $cloudservers->Server();
info('Creating Server2');
$server2->Create(array(
    'name' => 'Server2',
    'image' => $image,
    'flavor' => $flavor,
    'networks' => array($samplenet, $cloudservers->Network(RAX_PUBLIC))));
info('Waiting for server build to complete:');
$server1->WaitFor('ACTIVE', 300, 'dot');
print "\n";
$server2->WaitFor('ACTIVE', 300, 'dot');
print "\n";

step('Setting root passwords on both servers to "Turp3ntin3"');
$server1->SetPassword("Turp3ntin3");
$server2->SetPassword("Turp3ntin3");

$server1->Refresh();
$server2->Refresh();

step('Pause for verification');
info('Server1 IP is %s', $server1->ip());
info('Server2 IP is %s', $server2->ip());
info('Verify network interfaces and press RETURN to continue');
print "\t> ";
$fp = fopen('php://stdin', 'r');
fgets($fp);
fclose($fp);

step('Deleting servers');
$server1->Delete();
$server2->Delete();
sleep(5);

step('Deleting the network');
$samplenet->Delete();

step('DONE');
exit;

// callback for WaitFor
function dot($server) {
    printf("\r\t%s %s %3d%% %s",
        $server->id, $server->name, $server->progress, $server->status);
}
