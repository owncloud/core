Getting Started with php-opencloud
==================================

[Table of Contents](toc.md)

The <b>php-opencloud</b> library is a software development kit (SDK) to help
developers using PHP to work with OpenStack&reg; and other open clouds. Since
the library was developed at Rackspace, it works with the Rackspace public
cloud, and should also work with other OpenStack-based clouds with minimal
effort.

The main difference between various cloud providers is in how they handle
authentication. The OpenStack Keystone project defines a standard API for
authenticating users but, because of differences in the underlying
authentication mechanisms used by the various public cloud providers,
the actual credentials used for authentication will probably differ.
See the [Authentication](authentication.md) section for more details on this.

This initial release of the <b>php-opencloud</b> library supports Compute
(OpenStack Nova) and Object Storage (OpenStack Swift) services.
It also supports Rackspace's extensions to these services, such as the
content distribution network (CDN) provided with Rackspace's Cloud Files&trade;
offering, which is built on OpenStack Swift.

## Who should read this

I'm assuming that you are an experienced PHP developer, or at least have a
substantial familiarity with the language. This document does not instruct you into
how to write or execute a PHP program; if you need help with that, start with
[the official PHP website](http://www.php.net).

I'm also assuming that you have a cloud account with Rackspace or another OpenStack
cloud provider, that you have either a username and password or can get access to it.
For Rackspace, you need to have API access; this means that you need to have an
API key and customer number (also called "customer ID" or "tenant ID"), which is
available through the Rackspace Cloud Control panel.

## Before you start

PHP 5.3 is required. This library uses PHP namespaces, which were introduced
with version 5.3, so it will not work with earlier versions.

It uses the [CURL library](http://us.php.net/manual/en/book.curl.php)
to communicate over HTTP to the various services.
Since this is included with nearly all PHP installations, that should not be
a problem. However, if your installation does not include CURL,
then you'll need to make sure it is installed.

## Installing the library

In the .ZIP or .tar file in which you received the library, everything under
the `lib/` directory should be installed in a location that is accessible. If you're not using a dependency manager like Composer, you will have to register the OpenCloud namespace for your app to use:

    // Define the path to the library
    $libPath = '/path/to/php-opencloud/lib';

    // Include the autoloader
    require_once $libPath . '/php-opencloud.php';

Once the OpenCloud namespace is registered, you will be able to access all functionality by referencing the class's namespace (in full PSR-0 compliance). For more information about namespaces, check out [PHP's documentation](http://php.net/manual/en/language.namespaces.php).

## Using php-opencloud

There are currently two top-level entry points into the library:

* `OpenStack.php` for pure OpenStack-based clouds
* `Rackspace.php` for the Rackspace public cloud

(`Rackspace.php` is a subclass of `OpenStack` with some variation as
to how the authentication is handled, as well as factory methods for
Rackspace-only services such as Cloud Databases&trade;.)

To use the library, you can use either of their namespaces:

    use OpenCloud\OpenStack;
    $openStack = new OpenStack;

or you can omit the `use` line and reference the fully-qualified classname:

    $rackspace = new \OpenCloud\Rackspace;

Before you can do anything else, you need to authenticate with
your cloud. See the [Authentication](authentication.md) section
for more details on that.

----

Other Available Documentation
=============================

The *php-opencloud API Reference* is auto-generated documentation on the entire
php-opencloud library. Because it is auto-generated, it is kept in sync with the
actual underlying source code (unlike this document, which must be manually
edited).
[@TODO provide links to internal and online versions]

The *php-opencloud Quick Reference* is a simplified reference, providing API
descriptions and syntax for the core features of the library. It is found in
various formats:

* `docs/quickref.md` The Markdown source
* [@TODO link to online version]
* [@TODO link to downloadable PDF]

A note for developers
=====================

While this library has been developed at
[Rackspace](http://www.rackspace.com),
it is a true open-source initiative. If you would like to add your cloud
provider's support, feel free to submit your changes via our
Github repository:

https://github.com/rackspace/php-opencloud

Likewise, if you find any bugs or problems, please report them via the
Github issue system.
