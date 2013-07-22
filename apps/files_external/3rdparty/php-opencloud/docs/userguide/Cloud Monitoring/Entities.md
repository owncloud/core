# Entities

An entity is the target of what you are monitoring. For example, you can create an entity to monitor your website, a particular web service, or your Rackspace server or server instance. Note that an entity represents only one item in the monitoring system. For example, if you wanted to monitor each server in a cluster, you would create an entity for each of the servers. You would not create a single entity to represent the entire cluster.

An entity can have multiple checks associated with it. This allows you to check multiple services on the same host by creating multiple checks on the same entity, instead of multiple entities each with a single check.

When you create a new entity in the monitoring system, you specify the follow parameters:

- A meaningful name for the entity
- The IP address(es) for the entity (optional)
- The meta-data that the monitoring system uses if an alarm is triggered (optional)

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

$entity = $monitoringService-resource('entity');
```

### Attributes

Name|Description|Required?|Data type
---|---|---|---
label|Defines a name for the entity.|Required|String between 1 and 255 characters long
agent_id|Agent to which this entity is bound to.|Optional|String matching the regex ```/^[-\.\w]{1,255}$/```
ip_addresses|Hash of IP addresses that can be referenced by checks on this entity.|Optional|Array
metadata|Arbitrary key/value pairs that are passed during the alerting phase.|Optional|Array

### Create entity
```php
$entity->create(array(
	'label' => 'Brand New Entity',
    'ip_addresses' => array(
        'default' => '127.0.0.4',
        'b'       => '127.0.0.5',
        'c'       => '127.0.0.6',
        'test'    => '127.0.0.7'
    ),
    'metadata' => array(
        'all'  => 'kinds',
        'of'   => 'stuff',
        'can'  => 'go',
        'here' => 'null is not a valid value'
    )
));
```


### Get, update and delete entity
```php
$entity->id = 'enAAAA';

// Get data
$entity->get();

// Update
$entity->update(array(
	'label' => 'New label for my entity'
));

// Delete
$entity->delete();
```