# Agents

The Monitoring Agent resides on the host server being monitored. The agent allows you to gather on-host metrics based on agent checks and push them to Cloud Monitoring where you can analyze them, use them with the Cloud Monitoring infrastructure (such as alarms), and archive them.

For more information about this feature, including a brief overview of its core design principles and security layers, see the [official API documentation](http://docs.rackspace.com/cm/api/v1.0/cm-devguide/content/service-agent.html).

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

$agent = $monitoringService->resource('agent');
```

### List agents
```php
$agentList = $agent->listAll();

while ($agent = $agentList->Next()) {
	// Do whatever...
	echo $agent->id;
}
```

### Get agent

```php
// Set ID first
$agent->id = 'someId';
$agent->get();

echo $agent->last_connected;
```

### List connections

```php
$connectionList = $agent->getConnections();

while ($connection = $connectionList->Next()) {
	// Do whatever...
	echo $connection->guid;
	echo $connection->process_version;
}
```

### Get connection
```php
$connection = $agent->getConnection('cntl4qsIbA');
echo $connection->agent_ip;
```

# Agent tokens

Agent tokens are used to authenticate Monitoring agents to the Monitoring Service. Multiple agents can share a single token.

### Setup
```php
$agentToken = $monitoringService->resource('agentToken');
```
### Create agent token
```php
$agentToken->create(array(
	'label' => 'Foobar'
));
```

### List agent tokens
```php
$tokenList = $agentToken->listAll();

while ($token = $tokenList->Next()) {
	// Do whatever...
	echo $token->token;
	echo $token->label;
}
```

### Get, update, delete agent token
```php
$agentToken->id = 'someId';

// Get
$token = $agentToken->get();

// Update
$token->update(array(
	'label' => 'New label'
));

// Delete
$token->delete();
```

# Agent host information

An agent can gather host information, such as process lists, network configuration, and memory usage, on demand. You can use the host-information API requests to gather this information for use in dashboards or other utilities.

### Setup
```php
$agentHost = $monitoringService->resource('agentHost');
```
### Get info/metrics
```php
$cpuInfo 				= $agentHost->info('cpus');
$diskInfo				= $agentHost->info('disks');
$filesystemInfo 		= $agentHost->info('filesystems'); 
$memoryInfo 			= $agentHost->info('memory'); 
$networkInterfacesInfo	= $agentHost->info('network_interfaces');
$processesInfo			= $agentHost->info('processes');
$systemInfo 			= $agentHost->info('system'); 
$userInfo				= $agentHost->info('who');

// What CPU models do we have?
while ($cpu = $cpuInfo->Next()) {
	echo $cpu->model . PHP_EOL;
}

// How many disks do we have?
echo $diskInfo->count();

// What's the available space on our ext4 filesystem?
while ($filesystem = $filesystemInfo->Next()) {
	if ($filesystem->sys_type_name == 'ext4') {
		echo $filesystem->avail;
	}
}
```

# Agent targets

Each agent check type gathers data for a related set of target devices on the server where the agent is installed. For example, agent.network gathers data for network devices. The actual list of target devices is specific to the configuration of the host server. By focusing on specific targets, you can efficiently narrow the metric data that the agent gathers.

### Setup
```php
$agentTarget = $monitoringService->resource('agentTarget');
```
### List agent targets
```php
$targets = $agentTarget->listAll();

// List all of them
foreach ($targets as $target) {
	echo $target . PHP_EOL;
}

// Are we monitoring a particular target device?
if (in_array()) {
	echo 'Yes we are! Phew.';
} 

```