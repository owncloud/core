# Changelogs

The monitoring service records changelogs for alarm statuses. Changelogs are accessible as a Time Series Collection. By default the API queries the last 7 days of changelog information.

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

$changelog = $monitoringService->resource('changelog');
```

### List changelogs
```php
$changelogList = $changelog->listAll();
while ($changelog = $changelogList->Next()) {
	// Do whatever
	echo $changelog->timestamp . PHP_EOL;
	echo $changelog->analyzed_by_monitoring_zone_id . PHP_EOL;
}
```