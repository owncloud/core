<?php
/**
 * (c)2012 Rackspace Hosting. See COPYING for license details
 *
 */
$start = time();

require_once "php-opencloud.php";

/**
 * Relies upon environment variable settings — these are the same environment
 * variables that are used by python-novaclient. Just make sure that they're
 * set to the right values before running this test.
 */
define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

define('VOLUMENAME', 'SampleVolume');
define('VOLUMESIZE', 100);
define('LBNAME', 'LB-MODEL');

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

step('Connect to the Load Balancer Service');
$lbservice = $rackspace->LoadBalancerService('cloudLoadBalancers', 'DFW');

step('Create a Load Balancer');
$lb = $lbservice->LoadBalancer();
$lb->AddVirtualIp('public');
$lb->AddNode('192.168.0.1', 80);
$lb->AddNode('192.168.0.2', 80);
$response = $lb->Create(array(
    'name' => LBNAME,
    'protocol' => 'HTTP',
    'port' => 80));
$lb->WaitFor('ACTIVE', 300, 'dot');

step('Add a metadata item');
$met = $lb->Metadata();
$met->key = 'author';
$met->value = 'Glen Campbell';
$met->Create();

step('Add a public IPv6 address');
//setDebug(TRUE);
$lb->AddVirtualIp('PUBLIC', 6);
//setDebug(FALSE);

step('DONE');
exit;

function dot($obj) {
	info('...status: %s', $obj->Status());
}
