# Zones

A monitoring zone is a location that Rackspace Cloud Monitoring collects data from. Examples of monitoring zones are "US West", "DFW1" or "ORD1". It is an abstraction for a general location from which data is collected.

An "endpoint," also known as a "collector," collects data from the monitoring zone. The endpoint is mapped directly to an individual machine or a virtual machine. A monitoring zone contains many endpoints, all of which will be within the IP address range listed in the response. The opposite is not true, however, as there may be unallocated IP addresses or unrelated machines within that IP address range.

A check references a list of monitoring zones it should be run from.

### Setup
```php
require_once 'path/to/lib/php-opencloud.php';

use OpenCloud\OpenStack;
use OpenCloud\CloudMonitoring\Service;

$connection = new OpenStack(
	RACKSPACE_US, // Set to whatever
	array(
		'username' => 'foo',
		'password' => 'bar'
	)
);

$monitoringService = new Service($connection);

$zone = $monitoringService-resource('zone');
```

### Attributes

Name|Description|Data type
---|---|---|---
country_code|Country Code|String longer than 2 characters
label|Label|String
source_ips|Source IP list|Array

### List all zones
```php
$list = $zone->listAll();

while ($zone = $list->Next()) {
	echo "{$zone->id} ({$zone->country_code})" . PHP_EOL;
}
```

### Perform a traceroute
```php
$zone->id = 'mzAAAAA';
$response = $zone->traceroute(array(
    'target' => 'http://test.com'
));

$object = json_decode($response->HttpBody());

// How many hops?
echo count($object->result);

// What was the first hop's IP?
echo $object->result[0]->ip;
```