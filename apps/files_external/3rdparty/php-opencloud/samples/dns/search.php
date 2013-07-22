<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

// This script searches for domains that don't have MX records,
// then it adds them

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

// you should probably change this to use your MX hosts
$MX_HOSTS = array(
	'mx1.xlerb.com' => 10,
	'mx2.xlerb.com' => 20
);
define('MX_TTL', 7200);

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

	// list records
	// search for MX records
	$rlist = $domain->RecordList(array('type'=>'MX'));
	if ($rlist->Size() == 0) {
		print("Domain has no MX records\n");
		foreach($MX_HOSTS as $name => $priority) {
			printf(" - adding $name ($priority)\n");
			$rec = $domain->Record();
			$rec->Create(array(
				'type' => 'MX',
				'name' => $domain->Name(),
				'data' => $name,
				'priority' => $priority,
				'ttl' => MX_TTL
			));
		}
	}
	else {
		printf("MX records:\n");
		while($rec = $rlist->Next()) {
			printf("- %s %d %s %s %d\n",
				$rec->type, $rec->ttl, $rec->Name(),
				$rec->data, $rec->priority);
		}
	}

}
