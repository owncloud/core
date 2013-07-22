# Accounts

An account contains attributes describing a customer's account. This description contains mostly read only data; however, a few properties can be modified with the API.

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

$account = $monitoringService->resource('account');
```

### Get account

```php
$account->get();
```

### Update account

```php
$account->update(array(
	'metadata' 		=> array(
		'key1' => 'val1',
		'key2' => 'val2',
	),
	'webhook_token' => 'fooBar'
));
```
