<?php
/**
 * (c)2012 Rackspace Hosting. See COPYING for license details
 *
 */
$start = time();

if (strpos($_ENV['NOVA_URL'], 'staging.identity.api.rackspacecloud')) {
	define('RAXSDK_SSL_VERIFYHOST', 0);
	define('RAXSDK_SSL_VERIFYPEER', 0);
}

require('php-opencloud.php');

/**
 * Relies upon environment variable settings — these are the same environment
 * variables that are used by python-novaclient. Just make sure that they're
 * set to the right values before running this test.
 */
define('AUTHURL', $_ENV['NOVA_URL']);
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

// parse command-line arguments
if ($argc > 1) {
	foreach($argv as $arg) {
		switch($arg) {
		case '-C':
		case '--catalog':
			print_r($rackspace->ServiceCatalog());
			break;
		case '-H':
		case '--help':
			printf(<<<ENDHELP
Switches:

    -C --catalog    Display service catalog
    -H --help       Display help message

ENDHELP
			);
			exit;
		default:

		}
	}
}


step('Listing Services');
$list = $rackspace->ServiceList();

#print_r($rackspace->ServiceCatalog());
$list->Sort('name');
while($service = $list->Next()) {
	info('Name: %s Type: %s', $service->name, $service->type);
	foreach($service->endpoints as $endpoint) {
		info('  %-60s (%s)',
			substr($endpoint->publicURL,0,60),
			isset($endpoint->region) ? $endpoint->region : 'N/A');
	}
}

step('Only list services in DFW');
$list = $rackspace->ServiceList();
$list->Select(function($item){
	foreach($item->endpoints as $endpoint) {
		if (isset($endpoint->region) && $endpoint->region == 'DFW') return true;
	}
	return false;
});
$list->Sort('name');
while($service = $list->Next())
	info('Name: %s', $service->name);

step('DONE');
exit;
