<?php
/**
 * (c)2012 Rackspace Hosting. See COPYING for license details
 *
 * This sample script deletes all cloud servers, snapshots,
 * cloud networks, cloud files containers, load balancers, DNS
 * entries, and database instances associated with your account.
 * Be careful using this script unless you want to purge all items
 * created under your account.
 */
$start = time();

require_once "php-opencloud.php";

if (strpos($_ENV['NOVA_URL'], 'staging.identity.api.rackspacecloud')) {
	define('RAXSDK_SSL_VERIFYHOST', 0);
	define('RAXSDK_SSL_VERIFYPEER', 0);
}
require('rackspace.php');
define('INSTANCENAME', 'SmokeTestInstance');
define('SERVERNAME', 'SmokeTestServer');
define('MYREGION', $_ENV['OS_REGION_NAME']);

/**
 * Relies upon environment variable settings — these are the same environment
 * variables that are used by python-novaclient. Just make sure that they're
 * set to the right values before running this test.
 */
define('AUTHURL', RACKSPACE_US);
// hard-coded to prevent inadvertently deleting stuff in my other account
define('USERNAME', 'raxglenc');
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

/**
 * servers to keep around
 */
$keep_servers = array('MODEL', 'Save');

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

print "This script deletes things created in other sample code scripts\n";
printf("Region [%s]\n", MYREGION);
printf("Endpoint [%s]\n", AUTHURL);

step('Authenticate');
$rackspace = new \OpenCloud\Rackspace(
	AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

step('Connect to Cloud Servers');
$cloudservers = $rackspace->Compute('cloudServersOpenStack', MYREGION);

step('Deleting servers');
$slist = $cloudservers->ServerList();
while($server = $slist->Next()) {
	if (in_array($server->Name(), $keep_servers))
		info('Keeping %s', $server->Name());
	else {
		info('Deleting %s', $server->Name());
		$server->Delete();
	}
}

step('Deleting the test network(s)');
$list = $cloudservers->NetworkList();
while($network = $list->Next()) {
	info('Deleting: %s %s', $network->id, $network->label);
	try {
		$network->Delete();
	} catch (OpenCloud\Common\Exceptions\DeleteError $e) {
		info('---Cannot delete');
	}
}

step('Connect to CBS');
$cbs = $rackspace->VolumeService('cloudBlockStorage', MYREGION);

step('Connect to Cloud Files');
$files = $rackspace->ObjectStore('cloudFiles', MYREGION);

step('Connect to Cloud Load Balancers');
$lbservice = $rackspace->LoadBalancerService('cloudLoadBalancers', MYREGION);

step('Deleting snapshots');
$list = $cbs->SnapshotList();
while($snap = $list->Next()) {
    if (($snap->Status()=='error')||($snap->Status()=='available')) {
        info('Deleting snapshot [%s] %s', $snap->id, $snap->Name());
        $snap->Delete();
    }
    else
        info('[%s] %s status is %s',
            $snap->id, $snap->Name(), $snap->Status());
}

step('Deleting objects');
$list = $files->ContainerList();
while($container = $list->Next()) {
    info('Container: %s', $container->Name());
    $objlist = $container->ObjectList();
    if ($objlist->Size())
        info('Objects:');
    while($obj = $objlist->Next()) {
        info('%30s deleting...', $obj->Name());
        $obj->Delete();
    }
    info('Deleting container');
    $container->Delete();
}

step('Deleting load balancers');
$list = $lbservice->LoadBalancerList();
while($lb = $list->Next()) {
	info('Deleting [%s] %s', $lb->id, $lb->Name());
	try {
		$lb->Delete();
	} catch (OpenCloud\Common\Exceptions\DeleteError $e) {
		info('---Cannot delete');
	}
}

step('Deleting unused volumes');
$list = $cbs->VolumeList();
while($vol = $list->Next()) {
	if (in_array($vol->Status(), array('in-use','attaching')))
		info('Volume [%s] %s is %s', $vol->id, $vol->Name(), $vol->Status());
	else {
		try {
			info('Deleting volume [%s] %s', $vol->id, $vol->Name());
			$vol->Delete();
		} catch (OpenCloud\DeleteError $e) {
			info('---Unable to delete volume [%s]', $vol->Name());
		}
	}
}

step('Deleting database instances');
$dbservice = $rackspace->DbService('cloudDatabases', MYREGION);
$list = $dbservice->InstanceList();
while($instance = $list->Next()) {
	info('Deleting %s', $instance->Name());
	$instance->Delete();
}

step('Deleting DNS entries');
$dns = $rackspace->DNS();
$list = $dns->DomainList();
while($domain = $list->Next()) {
	info('Deleting domain %s', $domain->Name());
	$domain->Delete();
}

step('DONE');
