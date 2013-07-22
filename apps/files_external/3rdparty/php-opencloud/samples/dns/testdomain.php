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

// connect to the DNS service
$dns = $cloud->DNS();

// get a domain

printf("Adding raxdrg.info\n");

$domain = $dns->Domain(array(
	'name' => 'raxdrg.info',
	'ttl' => 3600,
	'emailAddress' => 'glen@xlerb.com'));

printf("Adding records\n");

$domain->AddRecord($domain->Record(array(
	'type' => 'A',
	'name' => 'raxdrg.info',
	'ttl' => 600,
	'data' => '50.56.174.152')));
$domain->AddRecord($domain->Record(array(
	'type' => 'AAAA',
	'name' => 'raxdrg.info',
	'ttl' => 600,
	'data' => '2001:4800:780e:0510:a325:deec:ff04:48a8')));
$domain->AddRecord($domain->Record(array(
	'type' => 'MX',
	'name' => 'raxdrg.info',
	'ttl' => 600,
	'data' => 'mx1.xlerb.com',
	'priority' => 10)));
$domain->AddRecord($domain->Record(array(
	'type' => 'MX',
	'name' => 'raxdrg.info',
	'ttl' => 600,
	'data' => 'mx2.xlerb.com',
	'priority' => 20)));
$domain->AddRecord($domain->Record(array(
	'type' => 'CNAME',
	'name' => 'www.raxdrg.info',
	'ttl' => 600,
	'data' => 'rack2.broadpool.net',
	'comment' => 'Added '.date('Y-m-d H:i:s'))));
	
printf("Adding Subdomain foo\n");

$domain->AddSubdomain($domain->Subdomain(array(
	'name' => 'foo.raxdrg.info',
	'ttl' => 600,
	'emailAddress' => 'glen@glenc.co')));

printf("Adding Subdomain bar\n");

$domain->AddSubdomain($domain->Subdomain(array(
	'name' => 'bar.raxdrg.info',
	'ttl' => 600,
	'emailAddress' => 'glen@glenc.co')));

printf("Creating everything\n");

//setDebug(True);
$resp = $domain->Create();
setDebug(False);

$resp->WaitFor("COMPLETED", 300, 'showme', 1);

exit;

// callback for WaitFor method
function showme($obj) {
	printf("%s %s %s\n", date('H:i:s'), $obj->Status(), $obj->Name());
	if ($obj->Status() == 'ERROR') {
		printf("\tError code [%d] message [%s]\n\tDetails: %s\n",
			$obj->error->code, $obj->error->message, $obj->error->details);
	}
	else if ($obj->Status() == 'COMPLETED') {
		printf("Done\n");
	}
}
