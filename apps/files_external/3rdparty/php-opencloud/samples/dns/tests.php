<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

// establish our credentials
$cloud = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

$dns = $cloud->DNS();
$dlist = $dns->DomainList();
while($domain = $dlist->Next()) {
	printf("\n%s [%s]\n",
		$domain->Name(), $domain->emailAddress);
	// add subdomain
	if ($domain->Name() == 'raxdrg.info') {
		printf("Adding subdomain 'test'...\n");
		$sdom = $domain->SubDomain();
		setDebug(TRUE);
		$sdom->Create(array(
			'name' => 'test.raxdrg.info',
			'emailAddress' => 'glen@broadpool.com',
			'ttl' => 7200));
		setDebug(FALSE);
	}
	// list records
	$rlist = $domain->RecordList();
	$foobar = FALSE;
	while($rec = $rlist->Next()) {
		$name = str_replace($domain->Name(), '', $rec->name);
		printf("%s %s %d %s %s\n", 
			$domain->Name(),
			$rec->type, $rec->ttl, $name, $rec->data);
		if (($rec->type=='CNAME') && ($rec->name=='foobar.raxdrg.info')) {
			$foobar = TRUE;
			echo "  Deleting...\n";
			$rec->Delete();
		}
		else if ($rec->type=='NS') {
			$rec->ttl = rand(300, 600);
			printf("Updating ttl=%d\n", $rec->ttl);
			$rec->Update();
		}
	}
	if (!$foobar) {
		echo "  Creating CNAME foobar...\n";
		$foo = $domain->Record();
		$foo->Create(array(
			'type' => 'CNAME',
			'name' => 'foobar.raxdrg.info',
			'ttl'  => 600,
			'data' => 'rack2.broadpool.net'
		));
	}
}
