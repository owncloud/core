# Checks

A check is one of the foundational building blocks of the monitoring system. The check determines the parts or pieces of the entity that you want to monitor, the monitoring frequency, how many monitoring zones are originating the check, and so on. When you create a new check in the monitoring system, you specify the following information:

- A name for the check
- The check's parent entity
- The type of check you're creating
- Details of the check
- The monitoring zones that will launch the check

The check, as created, will not trigger alert messages until you create an alarm to generate notifications, to enable the creation of a single alarm that acts upon multiple checks (e.g. alert if any of ten different servers stops responding) or multiple alarms off of a single check. (e.g. ensure both that a HTTPS server is responding and that it has a valid certificate).

### Setup

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
```

Please be aware that Checks are sub-resources of Entities, so you will need to associate a Check to its parent Entity before exploiting its functionality.

```php
$entity = $monitoringService-resource('entity');
$entity->get('enAAAA'); // Get by ID

$check = $monitoringService->resource('check');
$check->setParent($entity); // Associate
```

### Attributes

Name|Description|Required?|Data type
---|---|---|---
type|The type of check.|Required|Valid check type. String between 1 and 25 characters long
details|Details specific to the check type.|Optional|Array
disabled|Disables the check.|Optional|Boolean
label|A friendly label for a check.|Optional|String between 1 and 255 characters long
metadata|Arbitrary key/value pairs.|Optional|Array
period|The period in seconds for a check. The value must be greater than the minimum period set on your account.|Optional|Integer (30..1800)
timeout|The timeout in seconds for a check. This has to be less than the period.|Optional|Integer (2..1800)
Attributes used for remote checks|||
monitoring_zones_poll|List of monitoring zones to poll from. Note: This argument is only required for remote (non-agent) checks|Optional|Array
target_alias|A key in the entity's 'ip_addresses' hash used to resolve this check to an IP address. This parameter is mutually exclusive with target_hostname.|Optional|String between 1 and 64 characters long
target_hostname|The hostname this check should target. This parameter is mutually exclusive with target_alias.|Optional|Valid FQDN, IPv4 or IPv6 address. String between 1 and 256 characters long.
target_resolver|Determines how to resolve the check target.|Optional|One of (IPv4, IPv6)

### Create a check (and test its parameters)
```php
$params = array(
	'type'   => 'remote.http',
	'details' => array(
		'url'	 => 'http://example.com',
		'method' => 'GET'
	),
	'monitoring_zones_poll' => array('mzlon'),
	'period' => '100',
	'timeout' => '30',
	'target_alias' => 'default',
	'label'  => 'Website check 1'
);

// You can do a test to see what would happen 
// if a Check is launched with these params
$response = $check->test($params);

echo $response->timestamp; // When was it executed?
echo $response->available; // Was it available?
echo $response->status;    // Status code

// NOTE: You can also include "debug" information by passing true to test()
// This will contain the returned content (i.e. HTML content for remote.http)

// Now create the real thing
$check->create($params);
```
### Test existing check
```php
// Set the ID of an existing check
$check->id = 'chAAAA';

$response = $check->testExisting(true);

echo $response->debug_info;
```

### List checks
```php
$checkList = $check->listAll();

while ($check = $checkList->Next()) {
	echo $check->id . PHP_EOL;
}
```

### Get, update and delete check
```php
$check->id = 'newCheckId';

// Get data
$check->get();

// Update
$check->update(array(
	'period' => 500
));

// Delete
$check->delete();
```

### Check types

Each check within the Rackspace Cloud Monitoring has a designated check type. The check type instructs the monitoring system how to check the monitored resource.

**Note:** Users cannot create, update or delete check types.

Check types for commonly encountered web protocols, such as HTTP (```remote.http```), IMAP (```remote.imap-banner```) , SMTP (```remote.stmp```), and DNS (```remote.dns```) are provided. Monitoring commonly encountered infrastructure servers like MySQL (```remote.mysql-banner```) and PostgreSQL (```remote.postgresql-banner```) are also available. Monitoring custom server uptime can be accomplished with the remote.tcp banner check to check for a protocol-defined banner at the beginning of a connection. Gathering metrics from server software to create alerts against can be accomplished using the remote.http check type and the 'extract' attribute to define the format.

In addition to the standard Cloud Monitoring check types, you can also use agent check types if the Monitoring Agent is installed on the server you are monitoring.

For a list of available check types, see the [official API documentation](http://docs.rackspace.com/cm/api/v1.0/cm-devguide/content/appendix-check-types.html).

Checks generate metrics that alarms will alert based upon. The metrics generated often times depend on the check's parameters. For example, using the 'extract' attribute on the remote.http check, however the default metrics will always be present. To determine the exact metrics available, the Test Check API is provided.

### Setup

If you've already set up a main Check object, and want to access functionality for this Check's particular Check Type, you can access its property:

```php
$checkType = $check->type;
```

This will be encapsulated in its own object. Alternatively, you can instantiate a fresh resource object:

```php
$checkType = $monitoringService->resource('checkType');
```

### Attributes

Name|Description|Data type
---|---|---
type|The name of the supported check type.|String
fields|Check type fields.|Array
supported_platforms|Platforms on which an agent check type is supported. This is advisory information only - the check may still work on other platforms, or report that check execution failed at runtime|Array

### List all possible check types
```php
$list = $checkType->listAll();

while ($checkType = $list->Next()) {
	echo "{$checkType->id} ({$checkType->type})" . PHP_EOL;
}
```

