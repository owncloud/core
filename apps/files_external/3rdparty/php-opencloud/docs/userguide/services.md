Working with Services
=====================

When you [authenticate](authentication.md) against an OpenStack-based
cloud, the authentication endpoint returns a _service catalog_ that
contains a directory or listing of all of the various services supported
by the endpoint. Each service is identified by two bits of information:

* The service _type_, which is a standard identifier; for example, `compute` identifies the OpenStack Compute service (also known as "Nova").
* The service _name_, which is an arbitrary identifier assigned by the cloud provider. For example, the object storage service (Swift) at Rackspace is named `cloudFiles`.

For each type of service, there may be multiple endpoints for accessing the
specific type of service. To support geographic deployments, each service
may have one or more _regions_ identified. For example, the Rackspace Compute 
service (Cloud Servers&trade;) is accessible through three different 
regions: 

* Dallas/Fort Worth (identified by `DFW`)
* Chicago (identified by `ORD`)
* London (identified by `LON`).

Finally, each service and region may have different types of URLs.
For example, your provider may have an internal URL used for testing
or for beta program participants. However, in most cases, the public URL
(identified by the _urltype_ of `publicURL`) will be what is used.

This may seem overly complicated; however, such complications provide developers great
flexibility in how to deploy their cloud components. For example, a US-based
developer might deploy servers in both `DFW` and `ORD`. This is done to ensure
continuous availability (a storm in one area might interrupt
the Internet connectivity in a given region) or to improve performance
(a server in Chicago might have a shorter network path for some users
than a server in Dallas).

<b>php-opencloud</b> simplifies the interface for working with these
service nuances. There are a couple of ways of handling this.

## Connecting to a service

To access a service, you need a service object that is retrieved by
a [factory method](factories.md) on the cloud provider object. For example, assume that
you're connecting to an OpenStack cloud:

    $endpoint = 'https://....';
    $credentials = array('username'=>'USER','password'='PASS');
    $cloud = new \OpenCloud\OpenStack($endpoint,$credentials);

To access the Compute service, use the OpenStack `Compute()` method:

    $compute = $cloud->Compute('{name}', '{region}', '{urltype}');

This can be simplified by relying upon default values. For example, the
default value for `{urltype}` is `publicURL` and, in most cases, that's exactly
what you need:

    $compute = $cloud->Compute('{name}', '{region}');

By using the [service default constants](#constants), you don't even need to
specify those:

    $compute = $cloud->Compute(); // uses default values

## Setting service defaults

Use the `SetDefaults()` method on the provider object to set the default
values for your services.

The `SetDefaults()` method takes up to four parameters:

* the service type
* the service name
* the service region
* the service URL type

To set the defaults for the Object Storage service:

    $cloud->SetDefaults('ObjectStore','cloudFiles','DFW','publicURL');

Use `NULL` to rely on the values set in the service default constants (SEE below):

    $cloud->SetDefaults('ObjectStore', NULL, 'ORD');

This can be convenient if you store the default values in an external source.
For example, the sample code in `samples/auth_ini.php` uses an external
file, `auth.ini`, that holds the default values for the various services.

It looks like this:

    # Sample .ini file to be used by auth_ini.php
    [Identity]
    url = "https://identity.api.rackspacecloud.com/v2.0/"
    username = "{username}"
    apiKey = "{apikey}"
    [Compute]
    serviceName = "cloudServersOpenStack"
    urltype = "publicURL"
    region = "DFW"
    [ObjectStore]
    serviceName = "cloudFiles"
    urltype = "publicURL"
    region = "DFW"

The `samples/auth_ini.php` script loads these values and sets the defaults.
From then on, it becomes trivial to connect to a new service or region:

    $chicago = $cloud->Compute(NULL, 'ORD'); // use the Chicago instance

## Service default constants

<b>php-opencloud</b> defines a number of constants that can be used for
default values for services. To use these, define the constant *before*
including the top-level file. For example, if you want to use the `DFW`
region for Rackspace Cloud Servers and Cloud Files, your code would look
like this:

    <?php
    define('RAXSDK_COMPUTE_REGION', 'DFW');
    define('RAXSDK_OBJSTORE_REGION', 'DFW');
    require('rackspace.php');

## What's next?

Having established a connection to a service, you can then use that service's 
[factory methods](factories.md) to generate objects. 

<a name="constants"
## User-settable constants

<table>
<tr><td> <b>Name</b> </td><td> <b>Default</b> </td><td> <b>Description</b> </td></tr>
<tr><td> RAXSDK_TIMEZONE </td><td> America/Chicago </td><td> The default
timezone used by the library. It should be set to one of the values
listed <a href="http://php.net/manual/en/timezones.php">in the PHP documentation</a>. This value is used in interpreting timestamp values without timezone information. </td></tr>
<tr><td> RAXSDK_STRICT_PROPERTY_CHECKS </td><td> FALSE </td><td> Without strict property checks, any property can be set on any object. This can lead to confusion; for example, if you misspell "name" as "naem," then the object will have the wrong name. If turned ON (set to TRUE), then only properties either defined in the object or using an extension alias are permitted. This is turned OFF by default because persistent objects will frequently have values set that are no longer permitted.  </td></tr>
<tr><td> RAXSDK_COMPUTE_NAME </td><td> cloudServersOpenStack </td><td> The name of the Compute service to use. </td></tr>
<tr><td> RAXSDK_COMPUTE_REGION </td><td> - </td><td> The default region for the Compute service. </td></tr>
<tr><td> RAXSDK_COMPUTE_URLTYPE </td><td> publicURL </td><td> The default URL type for the Compute service. </td></tr>
<tr><td> RAXSDK_OBJSTORE_NAME </td><td> cloudFiles </td><td> The default name for the Object Storage service. </td></tr>
<tr><td> RAXSDK_OBJSTORE_REGION </td><td> - </td><td> The default region for the Object Storage service. </td></tr>
<tr><td> RAXSDK_OBJSTORE_URLTYPE </td><td> publicURL </td><td> The default URL type for the Object Storage service. </td></tr>
<tr><td> RAXSDK_DATABASE_NAME </td><td> cloudDatabases </td><td> The default name for the Database-as-a-service. </td></tr>
<tr><td> RAXSDK_DATABASE_REGION </td><td> - </td><td> The default region for the cloud database. </td></tr>
<tr><td> RAXSDK_DATABASE_URLTYPE </td><td> publicURL </td><td> The default URL type for the cloud database. </td></tr>
<tr><td> RAXSDK_CONNECTTIMEOUT </td><td> 2 </td><td> The max time (in seconds) to wait for a connection to a service. Increase this value if you have a very slow Internet connection. </td></tr>
<tr><td> RAXSDK_TIMEOUT </td><td> 30 </td><td> The max time (in seconds) permitted for a service to return results. If you have very long-running services, then you can increase this value. </td></tr>
<tr><td> RAXSDK_SERVER_MAXTIMEOUT </td><td> 3600 </td><td> When using the Server::WaitFor() method, this is the maximum time (in seconds) that it will continue polling. Once this time is reached, polling is aborted. </td></tr>
<tr><td> RAXSDK_POLL_INTERVAL </td><td> 20 </td><td> The interval (in seconds) between poll requests for the Server::WaitFor() method. You might alter this value if you are reaching rate limits. </td></tr>
<tr><td> RAXSDK_DEFAULT_IP_VERSION </td><td> 4 </td><td> The IP version returned by the Server::ip() method. Change to "6" if you are using IPv6 addresses. </td></tr>
<tr><td> RAXSDK_OVERLIMIT_TIMEOUT </td><td> 300 </td><td> When a rate-limit is set, the library will automatically wait until the service is available again. This is the maximum time (in seconds) that it will wait to retry a request. Set it higher if you are willing to wait longer, or lower if you would prefer to fail quickly. </td></tr>
</table>

