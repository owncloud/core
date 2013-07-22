<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

// uncomment for debug output
//setDebug(TRUE);

// establish our credentials
$cloud = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

$dns = $cloud->DNS();
$dlist = $dns->DomainList();
while($domain = $dlist->Next()) {
	printf("\n%s [%s]\n",
		$domain->Name(), $domain->emailAddress);

	$changes = $domain->Changes();
	printf("%d changes:\n", $changes->totalEntries);
	if ($changes->totalEntries) {
		foreach($changes->changes as $change) {
			print_r($change);
		}
	}

	// list records
	printf("Records:\n");
	$rlist = $domain->RecordList();
	while($rec = $rlist->Next()) {
		printf("- %s %d %s %s\n",
			$rec->type, $rec->ttl, $rec->Name(), $rec->data);
	}

	printf("A records:\n");
	$rlist = $domain->RecordList(array('type'=>'A'));
	while($rec = $rlist->Next()) {
		printf("- %s %d %s %s\n",
			$rec->type, $rec->ttl, $rec->Name(), $rec->data);
	}

}
