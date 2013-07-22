# Alarms

Alarms bind alerting rules, entities, and notification plans into a logical unit. Alarms are responsible for determining a state (```OK```, ```WARNING``` or ```CRITICAL```) based on the result of a Check, and executing a notification plan whenever that state changes. You create alerting rules by using the alarm DSL. For information about using the alarm language, refer to the [reference documentation](http://docs.rackspace.com/cm/api/v1.0/cm-devguide/content/alerts-language.html).

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

Please be aware that Alarms are sub-resources of Entities, so you will need to associate an Alarm to its parent Entity before exploiting its functionality.

```php
$entity = $monitoringService-resource('entity');
$entity->get('enAAAA'); // Get by ID

$alarm = $monitoringService->resource('alarm');
$alarm->setParent($entity); // Associate
```

### Attributes

Name|Description|Required?|Data type
---|---|---|---
check_id|The ID of the check to alert on.|Required|Valid Check ID
notification_plan_id|The id of the notification plan to execute when the state changes.|Optional|Valid Notification Plan ID
criteria|The alarm DSL for describing alerting conditions and their output states.|Optional|String between 1 and 16384 characters long
disabled|Disable processing and alerts on this alarm|Optional|Boolean
label|A friendly label for an alarm.|Optional|String between 1 and 255 characters long
metadata|Arbitrary key/value pairs.|Optional|Multidimensional array

### Create alarm
```php
$alarm->create(array(
	'check_id' => 'chAAAA',
	'criteria' => 'if (metric["duration"] >= 2) { return new AlarmStatus(OK); } return new AlarmStatus(CRITICAL);',
	'notification_plan_id' => 'npAAAAA'
));
```

### List alarms
```php
$alarmList = $alarm->listAll();

while ($alarm = $alarmList->Next()) {
	echo $alarm->id . PHP_EOL;
}
```

### Get, update and delete alarm
```php
$alarm->id = 'newAlarmId';

// Get data
$alarm->get();

// Update
$alarm->update(array(
	'criteria' => 'if (metric["duration"] >= 5) { return new AlarmStatus(OK); } return new AlarmStatus(CRITICAL);'
));

// Delete
$alarm->delete();
```