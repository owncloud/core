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

// get the limits
$limits = $dns->Limits();
printf("Rate limits:\n");
foreach($limits->rate as $limit) {
	printf("  Regex: %s URI: %s\n", $limit->regex, $limit->uri);
	foreach($limit->limit as $item)
		printf("    Verb %s allowed %d per %s\n",
			$item->verb, $item->value, $item->unit);
}
printf("Absolute limits:\n");
foreach($limits->absolute as $key => $value) {
	printf("    %s = %s\n", $key, $value);
}

// by type
printf("Limit Types:\n");
$types = $dns->LimitTypes();
foreach($types as $type) {
	printf("%s\n", $type);
	printf("Limits for %s:\n", $type);
	$limits = $dns->Limits($type);
}
