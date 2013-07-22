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

step('Authenticate');
$rackspace = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

step('Connect to the Load Balancer Service');
$lbservice = $rackspace->LoadBalancerService('cloudLoadBalancers', 'DFW');

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
		} catch (OpenCloud\InstanceNotFound $e) {
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

step('DONE');
exit;

function dot($obj) {
	info('...%s', $obj->Status());
}
