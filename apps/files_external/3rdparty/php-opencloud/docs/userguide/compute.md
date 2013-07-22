Working with Compute Services
=============================

*Nova* is the OpenStack compute service and is used to manage virtual
servers and their associated resources including *flavors* and *images*.
It is accessed from the `Compute` class, which is generated from a Connection
object (either `OpenStack` or `Rackspace`).

Like the other services, instances of the compute service
are identified by the name of the
service, the region, and a URL type (which is almost always `"publicURL"`).
You can specify these parameters directly, or you can rely upon the defaults
set by the global constants (see [Services](services.md) for complete
details).

For example, Rackspace has a Compute service named `"cloudServersOpenStack"`
and it is available (at the time I'm writing this) in three different
regions: Dallas (`DFW`), Chicago (`ORD`), and London (`LON`). (Note that
because of account restrictions, you may not have all of these regions
available to you; for example, the `LON` region is
only available to Rackspace UK customers under normal circumstances.)
To connect to the Compute service
in Chicago, for example:

    $cloud = new Rackspace({credentials});
    $chicago = $cloud->Compute('cloudServersOpenStack', 'ORD');

There is an optional third parameter to the `Compute()` method: the URL type.
However, this example relies upon the fact that its default value is
`"publicURL"`. Unless you're involved in a Beta program or preview, you
will not have other URL types available.

### Compute objects and collections

There are three primary persistent objects that you'll work with in the
Compute service, and each of them has an associated
[Collection](collections.md):

* `Server` (and the `ServerList` Collection),
* `Image` (and the `ImageList` Collection), and
* `Flavor` (and the `FlavorList` Collection).

## What's next?

Each of these are described in separate documents:

* [Working with Servers](servers.md)
* [Working with Images](images.md)
* [Working with Flavors](flavors.md)
