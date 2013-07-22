Working with Objects
====================

Objects are the fundamental component of the Object Storage service.
An "object" can be an image, a movie, a file, or anything else that
has bits and requires a place to be stored.

Unfortunately, the term *object* has a very specific meaning in
terms of computer programming, and it can be rather confusing to
have multiple things carry the same "object" moniker. Thus,
*php-opencloud* refers to an object stored in the object storage
service as a `DataObject`. This is purely to avoid confusion—for
example, the built-in PHP function `is_object()` checks to see
whether its argument is a PHP object, not if it's stored in the
`ObjectStore`.

Thus, the complete hierarchy for the object storage service is:

* `OpenStack` (or `Rackspace`) is the parent of
* `ObjectStore` service instance, which is the parent of
* `Container`, which is the parent of
* `DataObject`, which holds the actual object data

### The DataObject class and its methods

You create an (empty) `DataObject` by calling the factory method
on a `Container` object:

	$cloud = new OpenStack(...);
	$ostore = $cloud->ObjectStore(...);
	$container = $ostore->Container('MyContainer');
	$obj = $container->DataObject();


#### Attributes

These are the standard attributes defined on a DataObject:

* `name` - name of the object
* `hash` - MD5 checksum of the object
* `bytes` - size of the object in bytes
* `last_modified` - date and time the object was last modified
* `content_type` - a Content-Type identifier
* `content_length` - content length (should be the same as bytes)

#### Methods

These are the available methods (examples are below):

* `Url()` - the URL of the object in the storage system
* `Create()` - creates a new object in the object storage system
* `Update()` - updates an existing object
* `Delete()` - deletes an object
* `SetData()` - sets the content of the object directly (rarely used)
* `SaveToString()` - returns the object as a string (rarely used)
* `SaveToFilename()` - saves the stored object to a local file

#### Large objects

It is not uncommon for objects stored in the object storage service
to me much large that the available memory on the server. For
example, the server may only have a few gigabytes of memory, but a
stored video file may be 100GB in size.  Thus, the objects' data
is typically read from (or written to) files in the local filesystem.
This is not always the case, of course, so other methods are provided,
but they are marked as (rarely used) in the list above.

## What's Next?

Return to the [Table of Contents](toc.md)


