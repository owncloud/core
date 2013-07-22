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
$slist = $compute->ServerList(TRUE, array('name'=>'MODEL'));
while($server = $slist->Next()) {
	printf("PTR records for Server [%s]:\n", $server->Name());
	try {
		$ptrlist = $dns->PtrRecordList($server);
		printf("IP: %s (v4) %s (v6)\n",
			$server->accessIPv4, $server->accessIPv6);
		$ptrcount = 0;
		while($ptr = $ptrlist->Next()) {
			++$ptrcount;
			printf("- %s=%s\n", $ptr->data, $ptr->name);
			printf("- comment: %s\n", $ptr->comment);
			printf("  modifying...\n");
			$ptr->comment = sprintf('Updated at %s', date('H:i:s'));
			$aresp = $ptr->Update(array('server'=>$server));
			$aresp->WaitFor('COMPLETED', 300, 'pstat', 1);
			printf("  deleting...\n");
			$ptr->server = $server;
			$aresp = $ptr->Delete();
			$aresp->WaitFor('COMPLETED', 300, 'pstat', 1);
		}
	} catch (\OpenCloud\CollectionError $e) {
		echo "- No records found\n";
	}
	printf("re-creating PTR records...\n");
	$ptr = $dns->PtrRecord();
	printf("- IPv4\n");
	$ptr->name = 'foo.raxdrg.info';
	$ptr->data = $server->accessIPv4;
	$aresp = $ptr->Create(array('server'=>$server));
	$aresp->WaitFor('COMPLETED', 300, 'pstat', 1);
	printf("- IPv6\n");
	$ptr->data = $server->accessIPv6;
	$aresp = $ptr->Create(array('server'=>$server));
	$aresp->WaitFor('COMPLETED', 300, 'pstat', 1);
}

exit;

function pstat($obj) {
	printf("  ...%s\n", $obj->Status());
}
