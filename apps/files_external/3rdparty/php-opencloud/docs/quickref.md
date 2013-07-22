php-opencloud Quick Reference
=============================

This is a quick reference to <b>php-opencloud</b> functions; see the
[user guide](userguide/index.md) for more details.

Contents:
* [Authentication](#auth)
* [ObjectStore (Swift/Cloud Files)](#ostore)
* [Compute (Nova/Cloud Servers)](#compute)
* [Networks (Quantum/Cloud Networks)](#networks)
* [Cloud Databases](#dbaas)
* [Cloud Block Storage (Cinder)](#CBS)
* [Cloud DNS](#DNS)

<a name="auth"></a>
Authentication
--------------
Before you can use any of the cloud services, you must authenticate
using a connection object. This object establishes a relationship
between a user and a single Keystone identity endpoint URL. There are
two different connection services provided: OpenStack and Rackspace
(hopefully, there will be more in the future, and developers are
encouraged to contribute theirs).

To use the **php-opencloud** library, use this `require()` statement in your
script:

	require '/path/to/lib/php-opencloud.php';

Once you've referenced the desired connection class, you can proceed
to establish the connection. For OpenStack clouds, provide the
username and password:

    $conn = new \OpenCloud\OpenStack(
    	'https://example.com/v2/identity',
    	array(
    		'username' => 'your username',
    		'password' => 'your Keystone password',
    		'tenantName' => 'your tenant (project) name'
    	));

(Note that the `tenantName` value may not be required for all installations.)

If you are using Rackspace's authentication, you need to pass your
API key and tenant ID instead:

	$conn = new \OpenCloud\Rackspace(
		'https://example.com/v2/identity',
		array(
			'username' => 'your username',
			'apiKey' => 'your API key',
			'tenantName' => 'your tenant name'
		));

Note that the `Rackspace` class will also permit `username`/`password`
authentication as well, but the `apiKey` method is preferred.
The `tenantName` argument is optional; if not provided, your access
may be restricted because of ACLs on the account.

The connection object can be re-used at will (so long as you're
communicating with the same endpoint) and must be passed to other
data objects.

<a name="ostore"></a>
Quick Reference - ObjectStore (Swift/Cloud Files)
-------------------------------------------------
These examples all assume a `$conn` object created via one of the
authentication methods outlined above.

### Connecting to the ObjectStore service

    $ostore = $conn->ObjectStore({name}, {region}, {urltype});

where `{name}` is the service name (e.g., "cloudFiles"),
`{region}` is the region identifier (e.g., "DFW" or "LON"), and
`{urltype}` is the URL type (normally `'publicURL'` by default, but
can be changed if you're working with an internal staging instance).

You can simplify this by setting the defaults:

    $conn->SetDefaults('ObjectStore', {name}, {region}, {urltype});
    $ostore = $conn->ObjectStore(); // uses default values

### Create a new container

Using the `$ostore` object created above:

    $mycontainer = $ostore->Container();
    $mycontainer->name = 'SuperContainer';
    $mycontainer->Create();

Or, you can simplify things somewhat:

    $mycontainer = $ostore->Container();
    $mycontainer->Create(array('name'=>'SuperContainer'));

### Retrieve an existing container

Using the `$ostore` object create above:

    $myoldcontainer = $ostore->Container('SomeOldContainer');

### Get a list of all containers (using a Collection object)

When php-opencloud retrieves a _list_ of something, it returns a `Collection`
object that can be navigated via the `->First()`, `->Next()`, and `->Size()`
methods.

Using the `$ostore` object created above:

    $containerlist = $ostore->ContainerList();
    while($container = $containerlist->Next()) {
        // do something with the container
        printf("Container %s has %u bytes\n",
            $container->name, $container->bytes);
    }

The `->First()` method on a Collection resets to the beginning of the list,
while the `->Next()` method retrieves the next object in the collection,
returning `FALSE` when it's done.

### Delete a container

Note that you cannot delete a container unless it is empty (i.e., all the
objects in it have also been deleted). Example:

    $mycontainer->Delete();

### Create a new object in a container

    $mypicture = $mycontainer->DataObject();
    $mypicture->Create(
        array('name'=>'picture.jpg', 'content_type'=>'image/jpeg'),
        '/path/to/mypicture.jpg');

The first parameter to `Create()` is a hashed array of values. `name` is the
object name, and `content_type` is the Content-Type.

The second parameter to `Create()` is an optional filename; the data will be
streamed from the local file to the stored Object.

If you prefer, you can create the object in-memory first:

    $mypicture = $mycontainer->DataObject();
    $mypicture->SetData(file_get_contents('/path/to/picture.jpg'));
    $mypicture->name = 'potato.jpg';
    $mypicture->content_type = 'image/jpeg';
    $mypicture->Create();

### Save an object to a file

Because objects are sometimes enormous, they are not retrieved directly
from the object store; instead, the metadata about the object is returned.
For example, this call:

    $myphoto = $mycontainer->DataObject('photo.jpg');

does not actually retrieve the photo data; it retrieve the metadata about
the photo. To save the data to a file, use this method:

    $myphoto->SaveToFilename('/path/to/yourfile.jpg');

### Delete an object

To delete an object:

    $myobject->Delete();

### List the objects in a container

Remember the Collection object discussed above? Here it is used again
to list each object in a container:

    $objlist = $mycontainer->ObjectList();
    while($object = $objlist->Next()) {
        printf("Object %s size=%u\n", $object->name, $object->bytes);
    }

### Filter lists

Most functions that return a collection can be passed an associative array of
values that are used as filters. For example, see [the API guide](http://docs.rackspace.com/files/api/v1/cf-devguide/content/List_Objects-d1e1284.html)
for a list of filters. Here's an example: we'll only list objects whose
names are prefixed with `photo`:

    $objlist = $mycontainer->ObjectList(array('prefix'=>'photo'));


<a name="compute"></a>
Quick Reference - Compute (Nova/Cloud Servers)
----------------------------------------------

These examples all assume a connection object `$conn` created using either the
`OpenStack` or `Rackspace` classes (see "Authentication," above).

### Connecting to the Compute service

To connect to a Compute instance, you need to specify the name of the service,
the region, and the URL type:

    $compute = $conn->Compute('cloudServersOpenStack', 'DFW', 'publicURL');

This can get complicated, but you can simplify things by relying upon the
default values. For example, the default URL type is `'publicURL'`, so you
can leave that off:

    $compute = $conn->Compute('cloudServersOpenStack', 'DFW');

and you can set the defaults once and not have to change it:

    $conn->SetDefaults('Compute', 'cloudServersOpenStack', 'DFW', 'publicURL');

So this code:

    $compute = $conn->Compute();

connects to the default service and region, while this one:

    $computeORD = $conn->Compute(NULL, 'ORD');

connects to the same service, but on the `'ORD'` endpoint.

### Working with lists (the Collection object)

A `Collection` is a special type of object that manages lists. For example,
a list of _flavors_ is returned as a `Collection` object.

Collections have four primary methods:

* `Next()` - returns the next item in the collection, or `FALSE` at the end
* `First()` - resets the pointer to the first item in the collection
* `Sort()` - sorts the collection on a top-level key
* `Size()` - returns the number of items in the collection

### List Flavors

The following examples display the lists of flavors, images, and servers
for a compute object:

    $flavorlist = $compute->FlavorList();
    $flavorlist->Sort();    // The default sort key is 'id'
    while($flavor = $flavorlist->Next())
        printf("Flavor: %s RAM=%d\n", $flavor->name, $flavor->ram);

### List Images

    $imagelist = $compute->ImageList();
    $imagelist->Sort('name');   // sort by name
    while($image = $imagelist->Next())
        printf("Image: %s\n", $image->name);

### List Servers

    $serverlist = $compute->ServerList();
    while($server = $serverlist->Next())
        printf("Server: %s\n", $server->name);

### Create a new server

First, we get an empty server object:

    $myserver = $compute->Server();

Then, we use the `Create()` method, which requires a name as well as a
`Flavor` and an `Image` object:

    $myflavor = $compute->Flavor('3');
    $myimage = $compute->Image('c195ef3b-9195-4474-b6f7-16e5bd86acd0');
    $myserver->Create(array(
        'name' => 'MyServerName',
        'image' => $myimage,
        'flavor' => $myflavor));

This updates the `Server` object with the root password for the new
server:

    printf("The root password is %s\n", $myserver->adminPass);

### Rebuild an existing server

`Rebuild()` is identical to `Create()` except that an existing server is
modified with a new image and/or flavor.

    $server->Rebuild(array(
        'image' => $myimage,
        'flavor' => $myflavor));

### Update a server

Update is similar to `Create()`; however, you can only update a server's name.

	$server->Update(array('name'=>'A NEW NAME!'));

### Delete a server

The `Delete()` method deletes a server:

	$server->Delete();

This is normally destructive and the server is *not* recoverable; however,
providers may have a mechanism for recovering deleted servers. Contact
your provider for support.

### Performing server actions

The following examples perform actions on the server to create an image,
reboot, and resize the server

#### Create an image from a server

    $myserver->CreateImage('imageName');

#### Reboot the server

    $myserver->Reboot('hard'); // can be 'soft'

#### Resize the server

    $myserver->Resize($myflavor); // requires a Flavor

Resizing can take some time (as much as an hour or more for large instances).
Once the resize is complete, you can either confirm it or revert it back to
the original size:

    // once ready, then either
    $myserver->ResizeConfirm();
    // or
    $myserver->ResizeRevert();

### To rescue/unrescue a server

In rescue mode, a server is rebuilt to a pristine state and the existing
filesystem is mounted so that you can edit files and diagnose issues.
See
[this document](http://docs.rackspace.com/servers/api/v2/cs-devguide/content/rescue_mode.html)
for more details.

Put server into rescue mode:

    $password = $server->Rescue();

The `$password` is the assigned root password of the rescue server.

Take server out of rescue mode:

    $server->Unrescue();

This restores the server to its original state (plus any changes you may have
made while it was in rescue mode).

### Wait for server state change

The `WaitFor()` method is provided as a way to wait for the server build
to complete (or for another action to finish). For example, you can
reboot a server and wait for it to become active again:

    $myserver->Reboot();            // does a 'soft' reboot by default
    $myserver->WaitFor('ACTIVE');    // waits for ACTIVE state (or ERROR)
    printf("Server %s is available after reboot\n", $myserver->name);

If you don't want to wait forever, you can specify a timeout:

    $myserver->Reboot();
    $myserver->WaitFor('ACTIVE', 300);
    if ($myserver->status == 'REBOOT')
        die('I waited five minutes and the server did not reboot yet');

If you want to display progress messages to provide feedback feedback
while waiting, you can provide a
callback function that is passed the server object:

    function myProgressMeter($server) {
        printf("Server build is %d%% complete\n", $server->progress);
    }
    $myserver->Create(...);
    $myserver->WaitFor('ACTIVE', 600, 'myProgressMeter');

<a name="networks"></a>
Quick Reference - Cloud Networks
================================
Cloud Networks is accessible via the `Compute` object. Thus, before you can
create or manage virtual networks, you must have a Compute connection:

    $cloud = new Rackspace(...);
    $compute = $cloud->Compute(...);

The following examples assume the use of the `$compute` object.

### Create a new network

To create an isolated network, you must specify a `label` (name) and a CIDR
(range of addresses in CIDR notation):

    $backend_network = $compute->Network();     // empty network object
    $backend_network->Create(array(
        'label' => 'Backend Network',           // visible name of the network
        'cidr' => '192.168.0.0/28'));           // address range in CIDR format
    printf("Network ID is %s\n", $backend_network->id);

### Retrieve an existing network

To retrieve information on an existing network, use the `Compute::Network()`
method and specify a network ID:

    $mynetwork = $compute->Network('0fe1-819...');
    printf $mynetwork->label;

### Delete a network

Use the `Delete()` method:

    $backend_network->Delete();

Note that a network cannot be deleted if it is in use; that is, if there are
any servers attached to the network. To delete the network, you must first
delete the attached servers.

### Listing networks

The `Compute::NetworkList()` method returns a `Collection` of `Network` objects:

    $mynetworks = $compute->NetworkList();
    $mynetworks->Sort('label');
    while ($network = $mynetworks->Next()) {
        printf("%s: %s (%s)\n",
            $network->id, $network->label, $network->cidr);
    }

### Pseudo-networks 'public' and 'private'

Rackspace has two *pseudo-networks* called `public` and `private`. They
represent the Internet and the internal ServiceNet, respectively. The
constants RAX_PUBLIC and RAX_PRIVATE represent the UUIDs of these
pseudo-networks. Unlike user-created networks, the CIDR ranges of these
networks are not exposed, and they cannot be deleted.

They are necessary, however, to attach a server to one of these networks
(see the following section).

### Creating a server with virtual networks

To attach a new server to one or more networks, use the `$networks` attribute
(which is an array)
as a parameter for the `Server::Create()` method:

    $server = $compute->Server();
    $server->Create(array(
        'name' => 'My Private Server',
        'image' => $compute->Image(...),
        'flavor' => $compute->Flavor(...),
        'networks' => array(
            $compute->Network($backend_network),    // an isolated network
            $compute->Network(RAX_PUBLIC)           // uses the Internet
        )));

To create an interface on the ServiceNet, use `Network(RAX_PRIVATE)`
instead of, or in addition to, the `RAX_PUBLIC` network shown above.

<a name="dbaas"></a>
Quick Reference - Cloud Databases (database as a service)
=========================================================

### Connecting to the Database service

Cloud Databases is not part of OpenStack; the product is only available
via a Rackspace connection:

    $cloud = new OpenCloud\Rackspace('https://...', array(...));

To connect to Cloud Databases, you use the `DbService` object. Like the other
services, you must specify the service name ("cloudDatabases"),
the region, and the URL type:

    $dbaas = $cloud->DbService('cloudDatabases','DFW','publicURL');

This can be simplified by using the defaults:

    $dbaas = $cloud->DbService(NULL, 'DFW');

### Creating a database service instance

    $instance = $dbaas->Instance();         // empty Instance
    $instance->name = 'InstanceName';
    $instance->flavor = $dbaas->Flavor(1);  // small
    $instance->volume->size = 2;            // 2GB disk
    $instance->Create();            		// create it

### Retrieve an existing instance

    $instance = $dbaas->Instance({INSTANCE-ID});

### List all instances

    $instlist = $dbaas->InstanceList();
    while($instance = $instlist->Next()) {
        printf("%s (%s)\n", $instance->id, $instance->name);
    }

### Delete an instance

    $instance->Delete();

### Performing instance actions

#### Restart

    $instance->Restart();

#### Resize

    $instance->Resize($dbaas->Flavor(2));

#### Resize the disk volume

    $instance->ResizeVolume(4); // 4GB of disk

#### Enable the root user

    $user = $instance->EnableRootUser();
    printf("Root user name=%s password=%s\n", $user->name, $user->password);

#### Check the root user status

    if ($instance->IsRootEnabled())
        print("Root user ie enabled\n");

### Working with databases

#### Create a new database

    $db = $instance->Database();        // empty database
    $db->Create(array(
        'name' => 'db-name',            // required
        'character_set' => 'utf8',      // optional
        'collate' => 'utf8_general_ci'  // optional
    );

#### Delete a database

    $db->Delete();

#### Listing all databases for an instance

    $dblist = $instance->DatabaseList();
    while($db = $dblist->Next())
        printf("Database %s\n", $db->name);

### Working with users

Users, like databases, are related to the *Instance*, but they are also
associated with a database. Thus, they are created from the `Instance`
object:

    $user = $instance->User();

#### Create a new user

    $user = $instance->User('username');    // assigns a name
    $user->Create();    // user is not associated with a database

#### Associate a user with a database

Note that, since the `User` object cannot be updated, the user must be
associated with all databases prior to it being created:

    $user = $instance->User('myusername');  // assigns a name
    $user->AddDatabase('db-name1');
    $user->AddDatabase('db-name2');
    $user->Create();

#### Delete a user

    $user->Delete();

#### List all users for an instance

The `databases` attribute of a user contains a list of all the database
(names) that the user is associated with.

    $ulist = $instance->UserList();
    while($user = $ulist->Next()) {
        printf("User: %s\n", $user->name);
        foreach($user->databases as $dbname)
            printf("  database: %s\n", $dbname);
    }

<a name="CBS"></a>
Quick Reference - Cloud Block Storage (Cinder)
----------------------------------------------
Cloud Block Storage is a dynamic volume creation and management service
built upon the OpenStack Cinder project.

### Connecting to Cloud Block Storage
Cloud Block Storage is available on either the OpenStack or Rackspace
connection using the `VolumeService` method:

Assuming:

    $cloud = new Rackspace(...);

Syntax:

    {variable} = $cloud->VolumeService({servicename}, {region}, {urltype});

Example:

    $dallas = $cloud->VolumeService('cloudBlockStorage', 'DFW');

This creates a connection to the `cloudBlockStorage` service (as it is
called at Rackspace) in the `DFW` region.

### Volume Types

Providers may support multiple types of volumes; at Rackspace, a volume can
either be `SSD` (solid state disk: expensive, high-performance) or
`SATA` (serial attached storage: regular disks, less expensive).

#### Listing volume types
The `VolumeTypeList` method returns a Collection of VolumeType objects:

    $vtlist = $dallas->VolumeTypeList();
    while($vt = $vtlist->Next())
        printf("%s %s\n", $vt->id, $vt->Name());

This lists the volume types and their IDs.

#### Describe a single volume type

If you know the ID of a volume type, use the `VolumeType` method to retrieve
information on it:

    $volumetype = $dallas->VolumeType(1);

### Working with Volumes

Like other objects, you can create, list, and show volumes. The `Volume` method
on the VolumeService object is the primary interface.

#### To create a volume

To create a volume, you must specify its size (in gigabytes). All other
parameters are optional (and defaults will be provided), though providing
the volume type is recommended.

Example:

    $myvolume = $dallas->Volume();  // an empty volume object
    $response = $myvolume->Create(array(
        'size' => 200,
        'volume_type' => $dallas->VolumeType(1),
        'display_name' => 'My Volume',
        'display_description' => 'Use this for large object storage'));

This creates a 200GB volume. Note that the `volume_type` parameter must be
a `VolumeType` object.

#### To list volumes

The `VolumeList` method returns a Collection of Volume objects:

    $volumes = $dallas->VolumeList();
    $volumes->Sort('display_name');
    while($vol = $volumes->Next())
        print $vol->Name()."\n";

This lists all the volumes associated with your account.

#### To get details on a single volume

If you specify an ID on the `Volume` method, it retrieves information on
the specified volume:

    $myvolume = $dallas->Volume('0d0f90209...');
    printf("volume size = %d\n", $myvolume->size);

#### To delete a volume

The `Delete` method deletes a volume:

    $myvolume->Delete();

### Working with Snapshots

A `Snapshot` captures the contents of a volume at a point in time. It can be
used, for example, as a backup point; and you can later create a volume from
the snapshot.

#### To create a snapshot

A `Snapshot` object is created from the Cloud Block Storage service. However,
it is associated with a volume, and you must specify a volume to create one:

	$snapshot = $dallas->Snapshot();	// empty Snapshot object
	$snapshot->Create(array(
		'display_name' => 'Name that snapshot',
		'volume_id' => $volume->id));

#### To list snapshots

The `SnapshotList` method returns a Collection of Snapshot objects:

	$snaplist = $dallas->SnapshotList();
	while($snap = $snaplist->Next())
		printf("[%s] %s\n", $snap->id, $snap->Name());

#### To get details on a single snapshot

To retrieve a single Snapshot, specify its ID on the `Snapshot` method:

	$snapshot = $dallas->Snapshot({snapshot-id});

#### To delete a snapshot

Use the `Delete()` method to remove a snapshot:

	$snapshot->Delete();

### Volumes and Servers

A volume by itself is not much use; to be useful, it must be attached to
a server so that the server can use the volume.

#### To attach a volume to a server

Syntax:

    $server = $compute->Server({server-id});
    $volume = $dallas->Volume({volume-id});
    $server->AttachVolume($volume, {mount-point})

`{server-id}` and `{volume-id}` are the IDs of the server and volume,
respectively. `{mount-point}` is the location on the server on which to
mount the volume (usually `/dev/xvhdd` or similar). You can also supply
`'auto'` as the mount point, in which case the mount point will be
automatically selected for you. `auto` is the default value for
`{mount-point}`, so you do not actually need to supply anything for that
parameter.

Example:

    $server = $compute->Server('010d092...');
    $volume = $dallas->Volume('39d0f0...');
    $server->AttachVolume($volume); // uses the 'auto' mount point

#### To detach a volume from a server

Syntax:

	$server = $compute->Server({server-id});
	$volume = $dallas->Volume({volume-id});
	$server->DetachVolume($volume);

<a name="CLB"></a>
Quick Reference - Cloud Load Balancers
--------------------------------------
Cloud Load Balancers is a service for creating and managing load balancers
dynamically. It is not currently part of the OpenStack project.

### Connecting to Cloud Load Balancers
Cloud Block Storage is available only via a `Rackspace`
connection using the `LoadBalancerService` method:

Assuming:

    $cloud = new Rackspace(...);

Syntax:

    {variable} = $cloud->LoadBalancerService({servicename}, {region}, {urltype});

Example:

    $chitown = $cloud->VolumeService('cloudLoadBalancers', 'ORD');

This creates a connection to the `cloudLoadBalancers` service
in the `ORD` (Chicago) region.

In this example, `$chitown` is a variable of type `LoadBalancerService`. The
`LoadBalancerService` class supports a number of methods that
provide information about the region, in addition to the functions for creating
and listing load balancers themselves.

### Service-Level Methods

(full details below)

* `LoadBalancerService::LoadBalancer()` - returns a `LoadBalancer` object, which
  is the primary way of managing the virtual load balancers.
* `LoadBalancerService::LoadBalancerList()` - returns a
  [`Collection`](collection.md) of `LoadBalancer` objects.
* `LoadBalancerService::BillableLoadBalancerList()` - returns a
  [`Collection`](collection.md) of objects representing load balancers that
  had been in existence during a specified time frame. This is used for
  analyzing and reporting your usage.
* `LoadBalancerService::AllowedDomainList()` - returns a
  [`Collection`](collection.md) of the domains permitted for your account.
* `LoadBalancerService::ProtocolList()` - returns a
  [`Collection`](collection.md) of the protocols available in the region.
* `LoadBalancerService::AlgorithmList()` - returns a
  [`Collection`](collection.md) of the algorithms available in the region.

<a name="DNS"></a>
Quick Reference — Cloud DNS
---------------------------

Cloud DNS lets you manage your domain names via a simple interface. To connect
to Cloud DNS:

	$cloud = new Rackspace(...);
	$dns = $cloud->DNS({name}, {region}, {urltype});

Omitted values use defaults; since Cloud DNS is regionless, this is usually
sufficient:

	$dns = $cloud->DNS();

### Service-Level Methods

* `DNS::Domain($id)` - returns a domain object, optionally for the domain
  identified by `$id`
* `DNS::DomainList($filter)` - returns a `Collection` of domains. The optional
  `$filter` argument can be an array of key-value pairs.
* `DNS::Import($data)` - imports the BIND_9-formatted `$data` and creates a new
  domain from it.
* `DNS::Limits($type)` - returns an object containing the DNS limits. The
  optional `$type` argument can restrict this to limits of a single type
* `DNS::LimitTypes()` - returns an array of limit types
* `DNS::PtrRecord($id)` - creates a reverse-DNS (PTR) record. The optional
  `$id` can identify a specific record.
* `DNS::PtrRecordList($server)` - returns a `Collection` of all PTR records
  associated with the specified `$server` (a Cloud Server or Nova instance).

### Domain-Level Methods

* `Domain::AddRecord()` - adds a Record object to the Domain for automatic
  creation when the domain is created.
* `Domain::AddSubdomain()` - adds a Subdomain object to the Domain for
  automatic creation when the domain is created.
* `Domain::Changes($since)` - returns an object listing changes since the
  specified time (the `$since` parameter is optional; if omitted, returns
  changes since the prior day at midnight).
* `Domain::Export()` - exports the domain in BIND_9 format.
* `Domain::Record($id)` - returns a Record object, optionally identified by
  `$id`.
* `Domain::RecordList()` - returns a `Collection` of all the records for a
  domain.
* `Domain::Subdomain()` - returns a Subdomain object. This is a regular Domain
  object, but identified by its parent Domain.
* `Domain::SubdomainList()` - returns a list of Subdomains for the current
  Domain (note: *very* slow call).
