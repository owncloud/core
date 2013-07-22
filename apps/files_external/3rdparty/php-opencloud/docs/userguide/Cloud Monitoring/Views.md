# Views

Views contain a combination of data that usually includes multiple, different objects. The primary purpose of a view is to save API calls and make data retrieval more efficient. Instead of doing multiple API calls and then combining the result yourself, you can perform a single API call against the view endpoint.

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

$view = $monitoringService-resource('view');
```

### List all views
```php
$list = $this->resource->listAll();
      
$firstItem = $list->First();

// Entity
echo $first->entity->id;

// You can also access checks, alarms and latest alarm states...
 ```