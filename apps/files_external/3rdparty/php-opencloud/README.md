**php-opencloud**
=============
PHP SDK for OpenStack/Rackspace APIs

[![Travis CI](https://secure.travis-ci.org/rackspace/php-opencloud.png)](https://travis-ci.org/rackspace/php-opencloud) [![Total Downloads](https://poser.pugx.org/rackspace/php-opencloud/downloads.png)](https://packagist.org/packages/rackspace/php-opencloud)

> **IMPORTANT NOTE**: With release 1.3, all of the file extensions have been
  changed from `.inc` to `.php`. This means that any existing code must be
  edited to use this new version.

> **ANOTHER IMPORTANT NOTE**: the working branch (soon to be release 1.5) has
  been substantially reorganized around namespaces and *all* of the file
  locations/names have been changed.

See the
[COPYING](https://github.com/rackspace/php-opencloud/blob/master/COPYING)
file for license and copyright information.

For other SDKs, see http://developer.rackspace.com

The PHP SDK should work with most OpenStack-based cloud deployments,
though it specifically targets the Rackspace public cloud. In
general, whenever a Rackspace deployment is substantially different
than a pure OpenStack one, a separate Rackspace subclass is provided
so that you can still use the SDK with a pure OpenStack instance
(for example, see the `OpenStack` class (for OpenStack) and the
`Rackspace` subclass).

See the [Release Notes](https://github.com/rackspace/php-opencloud/blob/master/RELEASENOTES.md)
for what has changed in the latest release(s).

See the [php-opencloud wiki](https://github.com/rackspace/php-opencloud/wiki)
for incidental notes mostly aimed at developers who are working *on* the
SDK (and not developers working *with* the SDK).

Downloading
-----------

Visit https://github.com/rackspace/php-opencloud/tags to see tagged releases
that you can download.

You can download the master branch using the
GitHub "ZIP" button, above. However, this has the latest code and may not
be as stable as the tagged branches.

Support and Feedback
--------------------
Your feedback is appreciated! If you have specific problems or bugs with the
**php-opencloud**
language bindings, please file an issue via Github.

For general feedback and support requests, send an email to:

sdk-support@rackspace.com

You can also find assistance via IRC on #rackspace at freenode.net.

Getting Started with OpenStack/Rackspace
----------------------------------------
To sign up for a Rackspace Cloud account, go to
http://www.rackspace.com/cloud and follow the prompts.

If you are working with an OpenStack deployment, you can find more
information at http://www.openstack.org.

### Requirements

We are not able to test and validate every possible combination of PHP
versions and supporting libraries, but here's our recommended minimum
version list:

* PHP 5.3 (note: Travis validates against 5.4 and 5.5 as well)
* CURL extensions to PHP

### Installation

In the .zip or .tar file in which you received the library, everything under
the `lib/` directory should be installed in a location that is accessible. If you're not using a dependency manager like Composer, you will have to reference the php-opencloud file (which registers the library namespaces):

    // Include the autoloader
    require_once '/path/to/lib/php-opencloud.php';

Once the OpenCloud namespace is registered, you will be able to access all functionality by referencing the class's namespace (in full PSR-0 compliance). For more information about namespaces, check out [PHP's documentation](http://php.net/manual/en/language.namespaces.php).

Contributing
------------
If you'd like to contribute to **php-opencloud**, see the
[HACKING.md](https://github.com/rackspace/php-opencloud/blob/master/HACKING.md)
file in the root directory.

Further Reading
---------------
The file
[docs/quickref.md](https://github.com/rackspace/php-opencloud/blob/master/docs/quickref.md)
contains a Quick Reference
guide to the
**php-opencloud** library.

The source for the "Getting Started with
**php-opencloud**" document (the user guide) starts in
[docs/userguide/index.md](https://github.com/rackspace/php-opencloud/blob/master/docs/userguide/index.md).

There is a complete (auto-generated) API reference manual in the
docs/api directory. Start with docs/api/index.html.

See the [HOWTO.md](https://github.com/rackspace/php-opencloud/blob/master/HOWTO.md) file for instructions on
regenerating the documentation and running tests.

See the [smoketest.php](https://github.com/rackspace/php-opencloud/blob/master/smoketest.php) file for some
simple, working examples. This is a test we run before builds to ensure that all
the core functionality is still working after code changes.

The [samples/](https://github.com/rackspace/php-opencloud/tree/master/samples/) directory has a collection
of tested, working sample code. Note that these may create objects in your cloud
for which you could be charged.

