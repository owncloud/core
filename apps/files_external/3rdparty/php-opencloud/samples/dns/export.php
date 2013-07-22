<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

require_once "php-opencloud.php";

// set this to the name of the domain to export
define('EXPORT_DOMAIN', 'raxdrg.info');

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

// establish our credentials
$cloud = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

// uncomment to turn on debugging
//setDebug(TRUE);

$dns = $cloud->DNS();
$dlist = $dns->DomainList(array('name'=>EXPORT_DOMAIN));
while($domain = $dlist->Next()) {
	printf("Exporting %s\n", $domain->Name());
	setDebug(TRUE);
	$resp = $domain->Export();
	setDebug(FALSE);
	$resp->WaitFor('COMPLETED', 300, 'ShowStatus', 1);
	// check result
	if ($resp->Status() == 'ERROR')
		printf("Error code [%d] message [%s]\nDetails: [%s]\n",
			$resp->error->code, $resp->error->message, $resp->error->details);
	else if ($resp->Status() != 'COMPLETED')
		printf("Unable to wait longer. Sorry.\n");
	else {
		printf("Export records:\n%s\n", $resp->response->contents);
	}
}

exit;

// callback function for WaitFor
function ShowStatus($obj) {
	printf("%s - %s\n", $obj->Name(), $obj->Status());
}
