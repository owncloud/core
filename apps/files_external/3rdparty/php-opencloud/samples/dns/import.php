<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

require_once "php-opencloud.php";

// set this to the name of the domain to export
define('IMPORT_DATA', <<<ENDDATA
raxdrg.info.		3600	IN	SOA	ns.rackspace.com. glen.xlerb.com. %s 3600 3600 3600 3600
raxdrg.info.		600	IN	A	50.56.174.152
raxdrg.info.		3600	IN	NS	dns1.stabletransit.com.
raxdrg.info.		3600	IN	NS	dns2.stabletransit.com.
raxdrg.info.		600	IN	MX	10 mx1.xlerb.com.
raxdrg.info.		600	IN	MX	20 mx2.xlerb.com.
raxdrg.info.		600	IN	AAAA	2001:4800:780e:510:a325:deec:ff04:48a8
www.raxdrg.info.	600	IN	CNAME	rack2.broadpool.net.
ENDDATA
);

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

printf("Authenticating...\n");

// establish our credentials
$cloud = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

// uncomment to turn on debugging
//setDebug(TRUE);

printf("Connecting to DNS...\n");
$dns = $cloud->DNS();

// import the data
printf("Importing data...\n");
$data = sprintf(IMPORT_DATA, time());
printf($data);
$resp = $dns->Import($data);
printf("Waiting for completion...\n");
$resp->WaitFor('COMPLETED', 300, 'ShowStatus', 1);
// check result
if ($resp->Status() == 'ERROR')
	printf("Error code [%d] message [%s]\nDetails: [%s]\n",
		$resp->error->code, $resp->error->message, $resp->error->details);
else if ($resp->Status() != 'COMPLETED')
	printf("Unable to wait longer. Sorry.\n");
else {
	printf("Import response:\n%s\n", $resp->response->contents);
}

exit;

// callback function for WaitFor
function ShowStatus($obj) {
	printf("%s - %s\n", $obj->Name(), $obj->Status());
}
