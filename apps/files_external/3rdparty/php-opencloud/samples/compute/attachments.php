<?php
/**
 * (c)2012 Rackspace Hosting. See COPYING for license details
 *
 */
$start = time();

require('php-opencloud.php');

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
define('SERVERNAME', 'CBS-test-server');

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

step('Connect to the Compute Service');
$compute = $rackspace->Compute('cloudServersOpenStack', 'DFW');

step('List servers & attachments');
$slist = $compute->ServerList();
while($server = $slist->Next()) {
	info('%s', $server->Name());
	$alist = $server->VolumeAttachmentList();
	while($attachment = $alist->Next())
		printf("    %s Device: %s\n",
			$attachment->id, $attachment->device);
}
