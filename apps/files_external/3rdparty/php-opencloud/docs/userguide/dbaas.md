Working with Cloud Databases
============================

Cloud Databases is a "database-as-a-service" product offered by Rackspace. Since it is
not an official OpenStack project, it is only available via Rackspace connections,
and *not* through an OpenStack connection.

Therefore, this example will cause an error:

	$cloud = new \OpenCloud\OpenStack(...);
	$dbservice = $cloud->DbService(...);	// this won't work

However, this code *will* work properly:

	$cloud = new \OpenCloud\Rackspace(...);
	$dbservice = $cloud->DbService(...);	// this will

Like other [services](services.md), you connect to a specific deployment of Cloud 
Databases by supplying the service name, region, and URL type:

	$dbservice = $cloud->DbService('cloudDatabases', 'ORD', 'publicURL');

and, like the other services, you can rely upon the defaults to select the proper one:

	$dbservice = $cloud->DbService(NULL, 'LON');

## Instances and databases

An `Instance` is a virtual server running MySQL; it can support multiple databases. 
As such, it has much in common with the [Server](servers.md) object. However, there 
are some differences between the `Server` and the `Instance` objects:

1. Like a Server, a database Instance requires a [Flavor object](flavors.md) at creation. This specifies the amount of RAM allocated to the Instance.
1. Unlike a Server, the Instance's Flavor object does not control the disk space; this is set via the volume size attribute.
1. Unlike a Server, you do not specify an [Image object](images.md). The image is provided by the database service.
1. Listing the available Flavor objects for the DbService service is the same as for the Compute service.

Listing flavors:

	$compute = $cloud->Compute();
	$dbaas = $cloud->DbService();
	$compute_flavors = $compute->FlavorList();
	$dbaas_flavors = $dbaas->FlavorList();

The flavors themselves *are* different between the Compute service and the DbService, 
however. In other words, you cannot use a `Flavor` from a Compute service to create
a database Instance, and you cannot use a `Flavor` from a DbService service to 
create a Server object. 

### Create a new DbService Instance

	$dbaas = $cloud->DbService();
	$inst = $dbaas->Instance();			// new, empty Instance
	$inst->flavor = $dbaas->Flavor(2);	// flavor ID
	$inst->volume->size = 4;			// this specifies 4GB of disk
	$inst->Create();					// this actually creates the instance

### Deleting an instance

This is very simple:

	$inst->Delete();

### Performing actions on an instance

Like a Server, you can reboot (called *Restart* in DbService terminology) or resize
an instance.

#### Restarting an instance

	$inst = $dbaas->Instance({instance-id});
	$inst->Restart();

#### Resizing an instance

There are two methods for resizing an instance. The first, `Resize()`, changes the amount
of RAM allocated to the instance:

	$inst->Resize($dbaas->Flavor(4));	// uses the larger flavor

You can also independently change the volume size to increase the disk space:

	$inst->ResizeVolume(8);				// increase to 8GB of disk

## Databases and Users

Instances can have multiple databases; a `Database` object corresponds to a single
MySQL database. 

### Creating a new database

To create a new database, you must supply it with a name; you can optionally 
specify its character set and collating sequence:

	$db = $instance->Database();			// new, empty database object
	$db->Create(array('name'=>'simple'));	// creates the database w/defaults
	$prod = $instance->Database();			// empty database
	$prod->Create(array(
		'name' => 'production',
		'character_set' => 'utf8',			// specify the character set
		'collate' => 'utf8_general_ci'		// specify sort/collate sequence
	));

You can find values for `character_set` and `collate` at
[the MySQL website](http://dev.mysql.com/doc/refman/5.0/en/charset-mysql.html).

### Deleting a database

This is also a simple operation:

	$db = $instance->Database('simple');	// named database object
	$db->Delete();

Note that this is destructive; all your data will be wiped away and will not be
retrievable.

### Listing databases

The `DatabaseList` object is a `Collection` of databases in an instance:

	$dblist = $instance->DatabaseList();
	while($db = $dblist->Next())
		printf("Database: %s\n", $db->name);

### Creating users

Database users exist at the `Instance` level, but can be associated with a specific
`Database`. They are represented by the `User` object, which is constructed by
the `User()` factory method:

	$instance = $dbaas->Instance();
	$user = $instance->User();			// a new, empty user

Users cannot be altered after they are created, so they must be assigned to 
databases when they are created:

	$user->name = 'Fred';				// the user must have a name
	$user->password = 'S0m3thyng';
	$user->AddDatabase('simple');		// Fred can access the 'simple' DB
	$user->AddDatabase('production');	// as well as 'production'
	$user->Create();					// creates the user

If you need to add a new database to a user after it's been created, you must 
delete the user and then re-add it.

As a shortcut, you can specify all the info in the parameter of the `Create()` method:

	$user = $instance->User();
	$user->Create(array(
		'name' => 'Fred',
		'password' => 'S0m3thyng',		// I made this up; don't bother trying it
		'databases => array('simple','production')));

### Deleting users

This should be familiar to you by now:

	$user->Delete();

## The root user

By default, Cloud Databases does not enable the root user. In most cases, the root
user is not needed, and having one can leave you open to security violations. However,
if you want to enable access to the root user, the `EnableRootUser()` method is
available:

	$root_user = $instance->EnableRootUser();

This returns a regular `User` object with the `name` attribute set to `root` and the
`password` attribute set to an auto-generated password. 

To check if the root user is enabled, use the `IsRootEnabled()` method:

	if ($instance->IsRootEnabled())
		print("The root user is enabled\n");
	else
		print("No root access to this instance\n");

## Sample code

The directory `samples/database` contains various tested sample code snippets for your
use.

## What next?

Return to the [Table of Contents](toc.md)
