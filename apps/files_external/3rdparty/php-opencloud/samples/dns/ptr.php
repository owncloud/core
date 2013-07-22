<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);
define('REGION', $_ENV['OS_REGION_NAME']);

// establish our credentials
$cloud = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

// DNS service
$dns = $cloud->DNS();

// uncomment for debug output
//setDebug(TRUE);

// compute service
$compute = $cloud->Compute(NULL, REGION);
$slist = $compute->ServerList();
while($server = $slist->Next()) {
	printf("PTR records for Server [%s]:\n", $server->Name());
	try {
		$ptrlist = $dns->PtrRecordList($server);
		while($ptr = $ptrlist->Next()) {
			printf("- %s=%s\n", $ptr->data, $ptr->name);
		}
	} catch (\OpenCloud\CollectionError $e) {
		echo "- No records found\n";
	}
}
