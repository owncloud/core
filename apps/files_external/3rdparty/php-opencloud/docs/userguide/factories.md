Factory Methods
===============

Much of the work in <b>php-opencloud</b> is handled by _factory methods_.
These are special methods that return a specified object. For example,
to work with an instance of a service, use the factory method on the
top-level provider object:

    $cloud = new \OpenCloud\OpenStack('endpoint',array(...));
    $swift = $cloud->ObjectStore(...);

In this case, the variable `$swift` now holds an instance of the `ObjectStore`
class. Likewise, the `Compute()` method returns a `Compute` object:

    $nova = $cloud->Compute(...);

Each of _those_ objects has its own factory methods as well.

You can actually create various objects directly, but it's much more cumbersome than
using the factory methods. For example, to create a connection to a Compute instance,
you could do this:

	$nova = new OpenCloud\Compute($cloud, $name, $region, $urltype);

In this case, you would need to maintain the relationships between the Compute object 
and its parent OpenStack or Rackspace object as well as providing the other three
parameters. By using a factory method, the parent object takes care of the book keeping
to manage the relationship as well as handling default values for the other parameters:

	$nova = $cloud->Compute();	// isn't this simpler?

## Compute object factory methods

Each of these returns the corresponding object.

* `Compute::Server()`
* `Compute::Image()`
* `Compute::Flavor()`

## Compute collection factory methods

Each of these methods returns a [Collection](collections.md) of the
associated objects.

* `Compute::ServerList()`
* `Compute::ImageList()`
* `Compute::FlavorList()`

## Object storage factory methods

* `ObjectStore::Container()`
* `ObjectStore::ContainerList()`

## Object storage container factory methods

* `Container::Object()`
* `Container::ObjectList()`

## What's next?

Continue with [Working with collections](collections.md)

