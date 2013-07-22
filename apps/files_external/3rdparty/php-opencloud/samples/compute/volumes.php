<?php
/**
 * (c)2012 Rackspace Hosting. See COPYING for license details
 *
 * This script creates a volume and attaches it to a server—an existing 
 * server, if possible; if not, it will create a new server.
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
define('VOLUMESIZE', 101);
define('SERVERNAME', 'CBS-test-server');

/**
 * numbers each step
 */
function step($msg,$p1=NULL,$p2=NULL,$p3=NULL) {
    global $STEPCOUNTER;
    printf("\nStep %d. %s\n", ++$STEPCOUNTER, sprintf($msg,$p1,$p2,$p3));
}
function info($msg,$p1=NULL,$p2=NULL,$p3=NULL,$p4=NULL) {
    printf("  %s\n", sprintf($msg,$p1,$p2,$p3,$p4));
}
define('TIMEFORMAT', 'r');

step('Authenticate');
$rackspace = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

step('Connect to the Compute Service');
$compute = $rackspace->Compute('cloudServersOpenStack', 'DFW');

/*
step('List Extensions');
$arr = $compute->Extensions();
foreach($arr as $item)
	print($item->alias."\n");
exit;
*/

step('Connect to the VolumeService');
$cbs = $rackspace->VolumeService('cloudBlockStorage', 'DFW');

step('Volume Types');
$list = $cbs->VolumeTypeList();
while($vtype = $list->Next()) {
	info('%s - %s', $vtype->id, $vtype->name);
}

step('Create a new Volume');
$volume = $cbs->Volume();
//setDebug(TRUE);
$volume->Create(array(
	'display_name' => VOLUMENAME,
	'display_description' => 'A sample volume for testing',
	'size' => VOLUMESIZE,
	'volume_type' => $cbs->VolumeType(2)
));
setDebug(FALSE);

step('Listing volumes');
$list = $cbs->VolumeList();
while($vol = $list->Next()) {
	info('Volume: %s %s [%s] size=%d',
		$vol->id,
		$vol->display_name,
		$vol->display_description,
		$vol->size);
}

step('Find a server');
$slist = $compute->ServerList(TRUE, array('name'=>SERVERNAME));

if ($slist->Size() > 0) {
	$server = $slist->First();
	info("Using [%s] %s", $server->id, $server->Name());
}
else {
	step('Create a server');
	$server = $compute->Server();
	$server->Create(array(
		'name' => SERVERNAME,
		'flavor' => $compute->Flavor(2),
		'image' => $compute->
				ImageList(TRUE,array('name'=>'CentOS 6.3'))->
				Next()));
	$server->WaitFor('ACTIVE', 300, 'dot');
	print "\n";
}

step('Attach volume to server');
$server->AttachVolume($volume);	// use 'auto' device
$volume->WaitFor('in-use', 600, 'dot');
print "\n";

step('Detach volume from server');
$server->DetachVolume($volume);
$volume->WaitFor('available', 600, 'dot');

step('Create a snapshot');
$snap = $cbs->Snapshot();   // empty snapshot object
$snap->Create(array(
    'display_name' => 'Snapshot',
    'volume_id' => $volume->id
));

step('List snapshots');
$list = $cbs->SnapshotList();
while($snap = $list->Next())
    info('Snapshot [%s] %s', $snap->id, $snap->Name());

step('DONE');
exit;

// callback for WaitFor
function dot($object) {
    printf("\r\t%s %s %3d%% %-10s",
        $object->id, 
        $object->Name(), 
        get_class($object)=='OpenCloud\Compute\Server' ? $object->progress : 0, 
        $object->status);
}
