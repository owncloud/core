Working with Images
===================

An `Image` object represents a stored virtual machine image. Images are used
to create new [servers](servers.md) as well as to hold backups of
existing servers. An `Image` object is created from a `Compute` object
via the `Image()` method:

    $myimage = $compute->Image();

This creates an empty Image object (which is not really useful by itself). More
commonly, you'll find an existing image and create an `Image` object by
using its ID:

    $myimage = $compute->Image('c79fecf7-2c37-4c51-a240-e9fa913c90a3');

### Listing images

To access all of the available images on a given compute instance, the
`ImageList` [Collection](collections.md) is used:

    $imlist = $compute->ImageList();
    foreach($image = $imlist->Next())
        printf("Image: %s id=%s\n", $image->name, $image->id);

This prints a list of all of the accessible images for your account in the
requested compute instance. This list will include both the publicly-available
images (provider by your cloud operator) as well as snapshot or backup images
that you have created.

### Image details

By default, the `ImageList()` method returns full details on all images;
because of the overhead involved in retrieving all the details, this may
become slow when you are working with a large number of images.
The first (optional) parameter
to the `ImageList()` method is a boolean that determines whether or not
the full image details are included. For example,

    $imlist = $compute->ImageList(FALSE);

would return a list of images that only have their name and ID. This will
generally execute faster than the same list of images with full details.

### Image filters

The second (optional) parameter to the `ImageList()` method is an associative
array of filter options. See
[List Images](http://docs.rackspace.com/servers/api/v2/cs-devguide/content/List_Images-d1e4435.html)
for complete details of the parameters that are available.

*Server* images are images that are created from a snapshot of an existing
server. *Base* images are those provided by the cloud operator. You can
filter these by using the `"type"` filter:

    $imlist = $compute->ImageList(TRUE, array('type'=>'SERVER'));

This would return a list containing *only* server images (with none
of the base images included).

You can also filter on the image name. This is useful because image IDs are
intentionally globally unique; that is, the same image will have different
IDs in different regions. To find the image named "CentOS 6.3," use the
`name` filter:

    $imlist = $compute->ImageList(TRUE, array('name'=>'CentOS 6.3'));
    $image = $imlist->Next();

Image filters can be combined:

    $imlist = $compute->ImageList(TRUE,
        array('name'=>'CentOS 6.3', 'type'=>'BASE'));

This would return only *Base* images named "CentOS 6.3" (it would exclude
any backup, or *Server*, images that might have the same name).

### Examples

* `samples/compute/images.php` - various image list examples

## What next?

See [Working with flavors](flavors.md).
