<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

require_once "php-opencloud.php";

define('AUTHURL', RACKSPACE_US);
define('USERNAME', $_ENV['OS_USERNAME']);
define('TENANT', $_ENV['OS_TENANT_NAME']);
define('APIKEY', $_ENV['NOVA_API_KEY']);

// establish our credentials
$connection = new \OpenCloud\Rackspace(AUTHURL,
	array( 'username' => USERNAME,
		   'apiKey' => APIKEY ));

// now, connect to the compute service
$compute = $connection->Compute('cloudServersOpenStack', 'DFW');

// display our limits
print("Rate limits:\n");
$lim = $compute->Limits();
foreach($lim->rate as $limit) {
    printf("Limit url=%s regex=%s:\n",
        isset($limit->url) ? $limit->url : 'N/A', $limit->regex);
    foreach($limit->limit as $item) {
        printf("\tVerb: %s Unit: %s Remaining: %d Value: %d\n",
            $item->verb, $item->unit, $item->remaining, $item->value);
        $next = 'next-available';
        printf("\tNext available: %s\n", $item->$next);
    }
}

/**
 * Now, we're going to try to hit the rate limits
 */
/* uncomment if you really want to do this
print("Trying to hit the rate limits\n");
$serverlist = $compute->ServerList();
$server = $serverlist->Next();        // we just need one server
$met = $server->metadata('foo');
$met->foo = 'bar';
$met->foo = 'baz';
$met->Create();
for($count=1; $count<=1000; $count++) {
    print(".");
    $met = $server->metadata();
    $met->Update();
    if (($count % 50) == 0)
        print(" $count\n");
}
*/
print("\nDone\n");
