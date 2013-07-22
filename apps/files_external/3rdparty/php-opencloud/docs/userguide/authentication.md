Authentication
==============

Before you can do anything with php-opencloud, you must authenticate
with your cloud provider. This is simultaneously the simplest and sometimes
the most frustrating part of the whole process.

It is simple because you only need to have two pieces of information:

* The authentication endpoint of your cloud provider
* The credentials required to authenticate

Once you have authenticated, the cloud provider will respond with a
[service catalog](http://docs.rackspace.com/auth/api/v2.0/auth-client-devguide/content/Sample_Request_Response-d1e64.html)
that contains links to all the
various provider's services. All you need to do is specify which service
to use, and the library will take care of finding the appropriate links.

First, however, you need to know if you're using the Rackspace cloud
or an OpenStack cloud, and include the proper top-level file. These are
called *Connection* classes, because they establish a connection between an
authorized user and a specific cloud deployment. They are required for any use of
<b>php-opencloud</b>.

## Authenticating against OpenStack clouds

First, include the top-level file:

    <?php
    require '/path/to/php-opencloud.php';

This will allow you to access the OpenStack object through a simple `new OpenStack` declaration. If you omit the `use` line, you will have to access the OpenStack object through a fully-qualified namespace: `new \OpenCloud\OpenStack`.

Next, create an `OpenStack` object with the proper credentials:

    $endpoint = 'https://your-cloud-provider/path';
    $credentials = array(
        'username' => 'YOUR USERNAME',
        'password' => 'YOUR PASSWORD'
    );
    $cloud = new OpenStack($endpoint, $credentials);

(Note that the `tenantName` value may not be required for all installations.)

In this example, `$credentials` is an associative array (or "hashed" array). The
keys are `username` and `password` and their values are your assigned OpenStack user
name and password, respectively.

## Authenticating against the Rackspace public cloud

First, include the Rackspace top-level namespace:

    <?php
    use OpenCloud\Rackspace;

Next, create a `Rackspace` object with the proper credentials:

    $endpoint = 'https://identity.api.rackspacecloud.com/v2.0/';
    $credentials = array(
        'username' => 'YOUR USERNAME',
        'apiKey' => 'YOUR API KEY'
    );
    $cloud = new Rackspace($endpoint, $credentials);

Replace the values for `username` and `apiKey` with the values for your
account. If you don't have an API key, see:
https://mycloud.rackspace.com/a/`username`/account/api-keys

Note that Rackspace UK users will have a different `$endpoint` than US users.

## Setting CURL Options

The **php-opencloud** library uses the standard CURL methods for performing
HTTP requests. If you need to pass additional options to CURL, you can
provide them as an optional third argument to the `OpenStack` or
`Rackspace` constructors. This argument must an associative array of
option/value pairs. For example, if your code requires you to use an HTTP
proxy:

	$options = array(CURLOPT_PROXY=>'proxy-name');
	$cloud = new \OpenCloud\OpenStack($endpoint, $credentials, $options);

## Credential Caching

Note that you only need to authenticate once; the **php-opencloud** library
caches your credentials in memory and will reuse them until they expire, at
which point it
will automatically re-authenticate. The only time you will need to create a new
`OpenStack` or `Rackspace` object is if your credentials change (for example,
if your
password changes) or to use a different account.

If your PHP process is highly transient (for example, a web page that reloads
every time someone views it in a browser), then you can cache the credentials
(for example, using APC or a local disk file) so that you do not have to
re-authenticate for each request. **php-opencloud** provides two methods for
exporting and importing the credentials.

Repeatedly re-authenticating can create a load on the authentication servers and
potentially degrade performance for all users. In addition, some deployments
will limit the frequency with which you can authenticate.

### Exporting Credentials

The `OpenStack::ExportCredentials()` method exports the current credentials
(authorization token, expiration, tenant ID, and service catalog)
as an array:

	$cloud = new \OpenCloud\OpenStack('URL', array('username'=>'xx','password'=>'yy'));
	$cloud->Authenticate();	// retrieves credentials from identity service
	$arr = $cloud->ExportCredentials();
	store_credentials_in_cache($arr);

In this example, the `Authenticate()` method retrieves the credentials from
the identity service; the example `store_credentials_in_cache()` function
(not provided by **php-opencloud**; this is a made-up example) stores the
credentials in the browser's APC cache. Of course, you could create a function
to store the credentials in a local file, a database, or whatever meets your
needs.

## Importing Credentials

The `OpenStack::ImportCredentials()` method imports an array of credentials
that was created by the `ExportCredentials()` method:

	$cloud = new \OpenCloud\OpenStack('URL', array('username'=>'xx','password'=>'yy'));
	$arr = load_credentials_from_cache();
	$cloud->ImportCredentials($arr);

In this example, the (hypothetical) function `load_credentials_from_cache()`
loads the credentials that were saved earlier by the `ExportCredentials()`
method.

Note that the `ImportCredentials()` method must be used *before* any other
`OpenStack` methods. This is because the `OpenStack` class will automatically
re-authenticate whenever it needs a token.

	$cloud = new \OpenCloud\OpenStack('URL', array('username'=>'xx','password'=>'yy'));
	// this automatically re-authenticates against the identity service
	$nova = $cloud->Compute(...);
	// this accidentally overwrites the new credentials with the old one
	$cloud->ImportCredentials(...);

In other words, this causes no increase in efficiency and, in fact, could
actually double the number of requests to the identity service (because the
cached credentials might be invalid, forcing another re-authentication
on the next request).

What's next?
------------

See [Working with services](services.md) for the next steps.
