Working with Object Storage Services
====================================

*Swift* is the OpenStack object storage service. In the *php-opencloud* library,
it is accessed via the `ObjectStore` class, which is created from a connection
object (either `OpenStack` or `Rackspace`).

For example:

	$cloud = new \OpenCloud\OpenStack(array(
	    'username'=>'{username}','password'=>'{password}'));
	$swift = $cloud->ObjectStore('cloudFiles','DFW');

With this newly-created `$swift` object, you can now work with various object
storage components.

The highest-level component in an object store instance is the Container.
Essentially, a Container is a named collection of objects; it is similar (though
definitely not identical) to a directory or folder in a file system.

All objects live in a Container.

## List the containers in an object store instance

The `ContainerList` object is a [Collection](collections.md) of `Container` objects.
To list all the containers in an object storage instance:

	$containers = $swift->ContainerList();
	while($container = $containers->Next())
		printf("%s\n", $container->name);

Like other Collection objects, this supports the `First()`, `Next()`, and `Size()`
methods.

## Create a new container

With the newly-created `$swift` object created above, use the `Container()`
method to create a new (empty) container:

	$mycontainer = $swift->Container();

To save this container to the object store instance, use the `Create()` method:

	$mycontainer->Create('MyContainerName');

The name is not required on the `Create()` method call if it has already been set.
It may be more convenient to set the name directly:

	$mycontainer->name = 'MyContainerName';
	$mycontainer->Create();

## Retrieve an existing container

If you pass a container name to the `Container()` method on the `ObjectStore` object,
it will retrieve the existing container:

	$oldcontainer = $swift->Container('SomeOldContainer');

In this case, the information about the `SomeOldContainer` is retrieved. This contains
metadata about the container:

	printf("Container %s has %d object(s) consuming %d bytes\n",
		$oldcontainer->name, $oldcontainer->count, $oldcontainer->bytes);

## Delete a container

The `Delete()` method deletes the container:

	$oldcontainer->Delete();

Note that containers must be empty before they can be deleted; that is, there must be
no objects associated with the container.

## Updating a container

Beneath the covers, containers are created and updated in exactly the same way. You can
use the `Create()` method to update a container; however, an `Update()` method is
supplied as an alias to `Create()` because the semantics (in your application)
may be different:

	$oldcontainer->metadata->update_time = time();
	$oldcontainer->Update();

## What's next?

See [Working with objects](objects.md)
