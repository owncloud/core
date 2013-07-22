<?php
/**
 * (c)2012 Rackspace Hosting. See LICENSE for license details
 *
 * The purpose of this smoketest is simply to ensure that the core
 * functionality of the library is present. It is not an exhaustive
 * integration test, nor is it a unit test. The goal is to rapidly
 * identify major problems if a code change breaks something.
 *
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

$start = time();

if (strpos($_ENV['NOVA_URL'], 'staging.identity.api.rackspacecloud')) {
	define('RAXSDK_SSL_VERIFYHOST', 0);
	define('RAXSDK_SSL_VERIFYPEER', 0);
}
define('INSTANCENAME', 'SmokeTestInstance');
define('SERVERNAME', 'SmokeTestServer');
define('NETWORKNAME', 'SMOKETEST');
define('MYREGION', $_ENV['OS_REGION_NAME']);
define('VOLUMENAME', 'SmokeTestVolume');
define('VOLUMESIZE', 103);
define('LBNAME', 'SmokeTestLoadBalancer');
define('CACHEFILE', '/tmp/smoketest.credentials');
define('TESTDOMAIN', 'domain-'.time().'.info');
define('RAXSDK_STRICT_PROPERTY_CHECKS', false);

require_once 'lib/php-opencloud.php';

/**
 * Relies upon environment variable settings — these are the same environment
 * variables that are used by python-novaclient. Just make sure that they're
 * set to the right values before running this test.
 */
define('AUTHURL', $_ENV['NOVA_URL']);
define('USERNAME', $_ENV['OS_USERNAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

/**
 * numbers each step
 */
function step($msg,$p1=NULL,$p2=NULL,$p3=NULL) {
    global $STEPCOUNTER;
    printf("\nStep %d. %s\n", ++$STEPCOUNTER, sprintf($msg,$p1,$p2,$p3));
}
function info($msg,$p1=NULL,$p2=NULL,$p3=NULL,$p4=NULL,$p5=NULL) {
    printf("  %s\n", sprintf($msg,$p1,$p2,$p3,$p4,$p5));
}
define('TIMEFORMAT', 'r');

// parse command-line arguments
if ($argc > 1) {
	foreach($argv as $arg) {
		switch($arg) {
		case '-D':
		case '--debug':
			printf("Debug ON\n");
			define(RAXSDK_DEBUG, true);
			break;
		case '-H':
		case '--help':
			printf(<<<ENDHELP
Switches:

    -D --debug      Turn debug mode ON
    -H --help       Display help message

ENDHELP
			);
			exit;
		default:

		}
	}
}

if (!USERNAME || !APIKEY || !AUTHURL) {
	die('No environment values set');
}

/**
 * START THE TESTS!
 */
printf("SmokeTest started at %s\n", date(TIMEFORMAT, $start));
printf("Using endpoint [%s]\n", $_ENV['NOVA_URL']);
printf("Using region [%s]\n", MYREGION);

step('Authenticate');
$secret = array('username' => USERNAME, 'apiKey' => APIKEY);

$rackspace = new \OpenCloud\Rackspace(AUTHURL, $secret);
$rackspace->AppendUserAgent('(PHP SDK SMOKETEST)');

/**
 * load cached credentials
 */
$fp = @fopen(CACHEFILE, 'r');
if (!$fp) { // no cached credentials
	info('Saving credentials in %s', CACHEFILE);
	$rackspace->Authenticate();
	$cred = $rackspace->ExportCredentials();
	$fp = @fopen(CACHEFILE, 'w');
	if (!$fp)
		die(sprintf("Cannot open cache file %s for writing\n", CACHEFILE));
	fwrite($fp, serialize($cred));
	fclose($fp);
}
else { // load cached credentials
	info('Loading credentials from %s', CACHEFILE);
	$str = fread($fp, 99999); // read it all
	fclose($fp);
	$rackspace->ImportCredentials(unserialize($str));
}

/**
 * Cloud DNS
 */
step('Connect to Cloud DNS');
$dns = $rackspace->DNS();

step('Try to add a domain %s', TESTDOMAIN);
$domain = $dns->Domain();
$aresp = $domain->Create(array(
	'name' => TESTDOMAIN,
	'emailAddress' => 'sdk-support@rackspace.com',
	'ttl' => 3600));
$aresp->WaitFor('COMPLETED', 300, 'dotter', 1);
if ($aresp->Status() == 'ERROR') {
	info('Error condition (this may be valid if the domain exists');
	info('[%d] %s - %s',
		$aresp->error->code, $aresp->error->message, $aresp->error->details);
}

step("Adding a CNAME record www.%s", TESTDOMAIN);
$dlist = $dns->DomainList(array('name'=>TESTDOMAIN));
$domain = $dlist->Next();

$record = $domain->Record();
$aresp = $record->Create(array(
	'type' => 'CNAME', 'ttl' => 600, 'name' => 'www.'.TESTDOMAIN,
	'data' => 'developer.rackspace.com'));
$aresp->WaitFor('COMPLETED', 300, 'dotter', 1);
if ($aresp->Status() == 'ERROR') {
	info('Error status:');
	info('[%d] $s - %s', $aresp->error->code, $aresp->error->message,
		$aresp->error->details);
}

step('List domains and records');
$dlist = $dns->DomainList();
while($domain = $dlist->Next()) {
	info('%s [%s]',
		$domain->Name(), $domain->emailAddress);
	// list records
	info('Domain Records:');
	$rlist = $domain->RecordList();
	while($rec = $rlist->Next()) {
		info('- %s %d %s %s',
			$rec->type, $rec->ttl, $rec->Name(), $rec->data);
	}
}

/**
 * Cloud Files
 */
step('Connect to Cloud Files');
$cloudfiles = $rackspace->ObjectStore('cloudFiles', MYREGION);

step('Create Container');
$container = $cloudfiles->Container();
$container->Create(array('name' => 'SmokeTestContainer'));

step('Create Object from this file');
$object = $container->DataObject();
$resp = $object->Create(
	array('name'=>'SmokeTestObject','content_type'=>'text/plain'), __FILE__);

step('Publish Container to CDN');
$container->PublishToCDN(600); // 600-second TTL
info('CDN URL:              %s', $container->CDNUrl());
info('Public URL:           %s', $container->PublicURL());
info('Object Public URL:    %s', $object->PublicURL());
info('Object SSL URL:       %s', $object->PublicURL('SSL'));
info('Object Streaming URL: %s', $object->PublicURL('Streaming'));

step('Verify Object PublicURL (CDN)');
$url = $object->PublicURL();
system("curl -s -I $url|grep HTTP");

step('Copy Object');
$target = $container->DataObject();
$target->name = 'COPY-of-SmokeTestObject';
$object->Copy($target);

step('List Containers');
$list = $cloudfiles->ContainerList();
while($c = $list->Next())
    info('Container: %s', $c->name);

step('List Objects in Container %s', $container->name);
$list = $container->ObjectList();
while($o = $list->Next())
    info('Object: %s', $o->name);

step('Disable Container CDN');
$container->DisableCDN();

step('Delete Object');
$list = $container->ObjectList();
while($o = $list->Next()) {
    info('Deleting: %s', $o->name);
    $o->Delete();
}

step('Delete Container: %s', $container->name);
$container->Delete();

/**
 * Cloud Load Balancers
 */
step('Connect to the Load Balancer Service');
$lbservice = $rackspace->LoadBalancerService('cloudLoadBalancers', MYREGION);

step('Create a Load Balancer');
$lb = $lbservice->LoadBalancer();
$lb->AddVirtualIp('public');
$lb->AddNode('192.168.0.1', 80);
$lb->AddNode('192.168.0.2', 80);
$response = $lb->Create(array(
    'name' => LBNAME,
    'protocol' => 'HTTP',
    'port' => 80));
$lb->WaitFor('ACTIVE', 300, 'dotter');

step('Add a metadata item');
$met = $lb->Metadata();
$met->key = 'author';
$met->value = 'Glen Campbell';
$met->Create();

step('Add a public IPv6 address');
//setDebug(TRUE);
$lb->AddVirtualIp('PUBLIC', 6);

// allowed domains
$adlist = $lbservice->AllowedDomainList();
while($ad = $adlist->Next()) {
	info('Allowed domain: [%s]', $ad->Name());
}

// protocols
info('Protocols:');
$prolist = $lbservice->ProtocolList();
while($prot = $prolist->Next()) {
	info('  %s %4d',
		substr($prot->Name().'.....................',0,20), $prot->port);
}

// algorithms
info('Algorithms:');
$alist = $lbservice->AlgorithmList();
while($al = $alist->Next()) {
	info('  %s', $al->Name());
}

// list load balancers
$list = $lbservice->LoadBalancerList();
if ($list->Size()) {
	step('Load balancers:');
	while($lb = $list->Next()) {
		info('[%s] %s in %s', $lb->id, $lb->Name(), $lb->Region());
		info('  Status: [%s]', $lb->Status());

		// Nodes
		$list = $lb->NodeList();
		if ($list->Size() == 0)
			info('  No nodes');
		else {
			while($node = $list->Next()) {
				info('  Node: [%s] %s:%d %s/%s',
					$node->Id(), $node->address, $node->port,
					$node->condition, $node->status);
			}
		}

		// NodeEvents
		$list = $lb->NodeEventList();
		if ($list->Size() == 0)
			info('  No node events');
		else {
			while($event = $list->Next()) {
				info('  * Event: %s (%s)',
					$event->detailedMessage, $event->author);
			}
		}

		// SSL Termination
		try {
			$ssl = $lb->SSLTermination();
			info('  SSL terminated');
		} catch (\OpenCloud\Common\Exceptions\InstanceNotFound $e) {
			info('  No SSL termination');
		}

		// Metadata
		$list = $lb->MetadataList();
		while($meta = $list->Next()) {
			info('  [Metadata #%s] %s=%s',
				$meta->Id(), $meta->key, $meta->value);
		}
	}
}
else
	step('There are no load balancers');

// list Billable LBs
$start = date('Y-m-d', time()-(3600*24*30));
$end = date('Y-m-d');
step('Billable Load Balancers from %s to %s', $start, $end);
$list = $lbservice->BillableLoadBalancerList(
	TRUE,
	array('startTime'=>$start, 'endTime'=>$end));
if ($list->Size() > 0) {
	while($lb = $list->Next()) {
		info('%10s %s', $lb->Id(), $lb->Name());
		info('%10s created: %s', '', $lb->created->time);
	}
}
else
	info('None');

/**
 * Cloud Servers
 */
try {
	$USE_SERVERS=TRUE;
	step('Connect to Cloud Servers');
	$cloudservers = $rackspace->Compute('cloudServersOpenStack', MYREGION);
} catch (Exception $e) {
	if (get_class($e) == 'OpenCloud\EndpointError')
		$USE_SERVERS=FALSE;
}

if ($USE_SERVERS) {
	step('List Flavors');
	$flavorlist = $cloudservers->FlavorList();
	$flavorlist->Sort('id');
	while($f = $flavorlist->Next())
		info('%s: %sMB', $f->name, $f->ram);

	step('List Images');
	$imagelist = $cloudservers->ImageList();
	$imagelist->Sort('name');
	while($i = $imagelist->Next()) {
		info($i->name);
		// save a CentOS image for later
		if (!isset($centos) && isset($i->metadata->os_distro) &&
			 $i->metadata->os_distro == 'centos') {
			$centos = $i;
		}
	}

	step('Create Network');
	$network = $cloudservers->Network();
	try {
		$network->Create(array('label'=>NETWORKNAME, 'cidr'=>'192.168.0.0/24'));
	} catch (Exception $e) {}

	step('List Networks');
	$netlist = $cloudservers->NetworkList();
	$netlist->Sort('label');
	while($net = $netlist->Next())
		info('%s: %s (%s)', $net->id, $net->label, $net->cidr);

	step('Connect to the VolumeService');
	$cbs = $rackspace->VolumeService('cloudBlockStorage', MYREGION);

	step('Volume Types');
	$list = $cbs->VolumeTypeList();
	$savedId = NULL;
	while($vtype = $list->Next()) {
		info('%s - %s', $vtype->id, $vtype->name);
		// save the ID for later
		if (!$savedId)
			$savedId = $vtype->id;
	}

	step('Create a new Volume');
	$volume = $cbs->Volume();
	$volume->Create(array(
		'display_name' => VOLUMENAME,
		'display_description' => 'A sample volume for testing',
		'size' => VOLUMESIZE,
		'volume_type' => $cbs->VolumeType($savedId)
	));
	$volume = $cbs->Volume($volume->id);

	step('Listing volumes');
	$list = $cbs->VolumeList();
	while($vol = $list->Next()) {
		info('Volume: %s %s [%s] size=%d',
			$vol->id,
			$vol->display_name,
			$vol->display_description,
			$vol->size);
	}

	step('Create Server');
	$server = $cloudservers->Server();
	$server->Create(array(
		'name'=>'FOOBAR',
		'image'=>$centos,
		'flavor'=>$flavorlist->First(),
		'networks'=>array($network, $cloudservers->Network(RAX_PUBLIC))
	));
	$ADMINPASSWORD = $server->adminPass;

	step('Wait for Server create');
	$server->WaitFor('ACTIVE', 600, 'dotter');

	// check for error
	if ($server->Status() == 'ERROR')
		die("Server create failed with ERROR\n");

	// test rebuild
	step('Rebuild the server');
	$server->Rebuild(array(
		'adminPass'=>$ADMINPASSWORD,
		'image'=>$centos
	));

	step('Wait for Server rebuild');
	$server->WaitFor('ACTIVE', 600, 'dotter');

	// check for error
	if ($server->Status() == 'ERROR')
		die("Server rebuild failed with ERROR\n");

	step('Attach the volume');
	$server->AttachVolume($volume);
	$volume->WaitFor('in-use', 600, 'dotter');

	step('Update the server name');
	$server->Update(array('name'=>SERVERNAME));
	$server->WaitFor('ACTIVE', 300, 'dotter');

	step('Reboot Server');
	$server->Reboot();
	$server->WaitFor('ACTIVE', 300, 'dotter');

	step('List Servers');
	$list = $cloudservers->ServerList();
	$list->Sort('name');
	while($s = $list->Next())
		info($s->name);

	step('Listing the server volume attachments');
	$list = $server->VolumeAttachmentList();
	while($vol = $list->Next())
		info('%s %-20s', $vol->id, $vol->Name());
	//exit;

	step('Detaching the volume');
	$server->DetachVolume($volume);
	$volume->WaitFor('available', 600, 'dotter');

	step('Creating a snapshot');
	$snap = $cbs->Snapshot();   // empty snapshot object
	$snap->Create(array(
		'display_name' => 'Smoketest Snapshot',
		'volume_id' => $volume->id
	));

	step('Deleting the test server(s)');
	$list = $cloudservers->ServerList();
	while($s = $list->Next()) {
		if ($s->name == SERVERNAME) {
			info('Deleting %s', $s->id);
			$s->Delete();
		}
	}
}
/**
 * Cloud Databases
 */
step('Connect to Cloud Databases');
$dbaas = $rackspace->DbService('cloudDatabases', MYREGION, 'publicURL');

step('Get Database Flavors');
$dbflist = $dbaas->FlavorList();
$dbflist->Sort();
while($flavor = $dbflist->Next())
    info('%s - %dM', $flavor->name, $flavor->ram);

step('Creating a Database Instance');
$instance = $dbaas->Instance();
$instance->name = INSTANCENAME;
$instance->flavor = $dbaas->Flavor(1);
$instance->volume->size = 1;
$instance->Create();
$instance->WaitFor('ACTIVE', 300, 'dotter');

step('Is the root user enabled?');
if ($instance->IsRootEnabled())
	info('Yes');
else
	info('No');

step('Creating a new database');
$db = $instance->Database();
$db->Create(array('name'=>'fooDb'));

step('Creating a new database user');
$user = $instance->User();
$user->Create(array('name'=>'FOO','password'=>'BAR','databases'=>array('fooDb')));

step('List database instances');
$dblist = $dbaas->InstanceList();
do {
	while($dbitem = $dblist->Next())
		info('Database Instance: %s (id %s)', $dbitem->name, $dbitem->id);
} while ($dblist = $dblist->NextPage());

step('Deleting the database user');
$user->Delete();

step('Deleting the database');
$db->Delete();

step('Deleting the test instance(s)');
$ilist = $dbaas->InstanceList();
while($inst = $ilist->Next())
    if ($inst->name == INSTANCENAME) {
        info('Deleting %s', $inst->id);
        $inst->Delete();
    }

/**
 * Cleanup
 */
step('Deleting the test network(s)');
$list = $cloudservers->NetworkList();
while($network = $list->Next()) {
	if ($network->label == NETWORKNAME) {
		info('Deleting: %s %s', $network->id, $network->label);
		$network->Delete();
	}
}

step('FINISHED at %s in %d seconds', date(TIMEFORMAT), time()-$start);
info('Remember to manually delete the volume and snapshot created');
exit();

/**
 * Callback for the WaitFor() method
 */
function dotter($obj) {
    info('...waiting on %s/%-12s %4s',
		$obj->Name(),
		$obj->Status(),
		isset($obj->progress) ? $obj->progress.'%' : 0);
}

