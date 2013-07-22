# Metrics

When Monitoring checks run, they generate metrics. These metrics are stored as full resolution data points in the Cloud Monitoring system. Full resolution data points are periodically rolled up (condensed) into coarser data points.

Depending on your needs, you can use the metrics API to fetch individual data points (fine-grained) or rolled up data points (coarse-grained) over a period of time.

### Data Granularity

Cloud Monitoring supports several granularities of data: full resolution data and rollups computed at 5, 20, 60, 240 and 1440 minute intervals.

When you fetch metrics data points, you specify several parameters to control the granularity of data returned:

- A time range for the points
- Either the number of points you want returned OR the resolution of the data you want returned

When you query by points, the API selects the resolution that will return you the number of points you requested. The API makes the assumption of a 30 second frequency, performs the calculation, and selects the appropriate resolution.

**Note:** Because the API performs calculations to determine the points returned for a particular resolution, the number of points returned may differ from the specific number of points you request.

Consider that you want to query data for a 48-hour time range between the timestamps `from=1354647221000` and `to=1358794421000` ( **specified in Unix time, based on the number of milliseconds that have elapsed since January 1, 1970** ). The following table shows the number of points that the API returns for a given resolution.

#### Specifying resolution to retrieve data in 48 hour period

You specify resolution...|API returns points...
---|---
FULL|5760
MIN5|576
MIN20|144
MIN60|48
MIN240|12
MIN1440|2

#### Specifying number of points to retrieve data in 48 hour period

You specify points in the range...|API calculates resolution
---|---
3168-∞|FULL
360-3167|MIN5
96-359|MIN20
30-95|MIN60
7-29|MIN240
0-6|MIN1440

#### Data Point Expiration

Cloud Monitoring expires data points according to the following schedule:

Resolution|Expiration
---|---
FULL|2 days
MIN5|7 days
MIN20|15 days
MIN60|30 days
MIN240|60 days
MIN1440|365 days

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
```

Please be aware that Metrics are sub-resources of Entities **and** Checks, so you will need to associate a Metric to its parent Check (with its own parent Entity) before exploiting its functionality.

```php
// Find grandparent object (i.e. an Entity)
$entity = $monitoringService->resource('entity');
$entity->get('enAAAA'); // Get by ID

// Find parent object (i.e. a Check)
$check = $monitoringService->resource('check');
$check->setParent($entity); // Associate first
$check->get('chAAAA'); // Get by ID

$metrics = $monitoringService->resource('metric');
$metrics->setParent($check); // Associate
```

### List all metrics
```php
$list = $metrics->listAll();

while ($metric = $list->Next()) {
	echo $metric->name . PHP_EOL;
}
```

### Fetch data points
```php
$response = $metrics->fetchDataPoints('mzdfw.available', array(
	'resolution' => 'FULL',
	'from'       => 1369756378450,
	'to'         => 1369760279018
));
```
