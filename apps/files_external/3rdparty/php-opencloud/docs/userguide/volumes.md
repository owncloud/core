Working with Volumes
----------------------------------------------
Cloud Block Storage (CBS) is a dynamic volume creation and management service
built upon the OpenStack Cinder project. See http://cinder.openstack.org for
complete details about the available features and functionality.

### Connecting to Cloud Block Storage

The top-level object for working with CBS/Cinder is the `VolumeService`
object. Like other [services](services.md), it is created from the top-level
connection object (either `OpenStack` or `Rackspace`). The correct service is
selected from the service catalog by specifying:

* the service name (for example, 'cloudBlockStorage')
* the region (for example, 'ORD')
* the URL type (for example, 'publicURL')

Defaults are provided for the service name and URL type. To specify a
default region, define the `RAXSDK_VOLUME_REGION` constant *before* including
the top-level Rackspace class:

	// set the default region to London
	define('RAXSDK_VOLUME_REGION','LON');

Use the `VolumeService()` method to create a new `VolumeService` object:

	$cloud = new \OpenCloud\Rackspace(...);
	$cbs = $cloud->VolumeService();

You can override any defaults by specifying them:

	$cbs = $cloud->VolumeService('myService','myRegion');

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

**php-opencloud** does not permit you to create, delete, or update volume
types, since those are administrative functions. 

#### Describe a single volume type

If you know the ID of a volume type, use the `VolumeType` method to retrieve
information on it:

    $volumetype = $dallas->VolumeType(1);

A volume type has only three attributes:

* `$id` the volume type identifier
* `$name` its name
* `$extra_specs` additional information for the provider

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

The `VolumeList()` method returns a Collection of Volume objects:

    $volumes = $dallas->VolumeList();
    $volumes->Sort('display_name');
    while($vol = $volumes->Next())
        print $vol->Name()."\n";

This lists all the volumes associated with your account.

#### To get details on a single volume

If you specify an ID on the `Volume()` method, it retrieves information on
the specified volume:

    $myvolume = $dallas->Volume('0d0f90209...');
    printf("volume size = %d\n", $myvolume->size);

#### To delete a volume

The `Delete()` method deletes a volume:

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

The `SnapshotList()` method returns a Collection of Snapshot objects:

	$snaplist = $dallas->SnapshotList();
	while($snap = $snaplist->Next())
		printf("[%s] %s\n", $snap->id, $snap->Name());

#### To get details on a single snapshot

To retrieve a single `Snapshot`, specify its ID on the `Snapshot()` method:

	$snapshot = $dallas->Snapshot({snapshot-id});

#### To delete a snapshot

Use the `Delete()` method to remove a snapshot:

	$snapshot->Delete();

### Volumes and Servers

A volume by itself is useful when it is attached to
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

