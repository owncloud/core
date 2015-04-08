================================
Frequently Asked Questions (FAQ)
================================

What methods are available on a client?
---------------------------------------

The AWS SDK for PHP utilizes service descriptions and dynamic
`magic __call() methods <http://www.php.net/manual/en/language.oop5.overloading.php#object.call>`_ to execute API
operations. Every magic method supported by a client is documented in the docblock of a client class using ``@method``
annotations. Several PHP IDEs, including `PHPStorm <http://www.jetbrains.com/phpstorm/>`_ and
`Zend Studio <http://www.zend.com/en/products/studio/>`_, are able to autocomplete based on ``@method`` annotations.
You can find a full list of methods available for a web service client in the
`API documentation <http://docs.aws.amazon.com/aws-sdk-php/latest/index.html>`_ of the client or in the
`user guide <http://docs.aws.amazon.com/aws-sdk-php/guide/latest/index.html>`_ for that client.

For example, the Amazon S3 client supports the following operations: :ref:`S3_operations`

What do I do about a cURL SSL certificate error?
------------------------------------------------

This issue can occur when using an out of date CA bundle with cURL and SSL. You
can get around this issue by updating the CA bundle on your server or downloading
a more up to date CA bundle from the `cURL website directly <http://curl.haxx.se/ca/cacert.pem>`_.

Simply download a more up to date CA bundle somewhere on your system and instruct the
SDK to use that CA bundle rather than the default. You can configure the SDK to
use a more up to date CA bundle by specifying the ``ssl.certificate_authority``
in a client's factory method or the configuration settings used with
``Aws\Common\Aws``.

.. code-block:: php

    $aws = Aws\Common\Aws::factory(array(
        'region' => 'us-west-2',
        'key'    => '****',
        'secret' => '****',
        'ssl.certificate_authority' => '/path/to/updated/cacert.pem'
    ));

You can find out more about how cURL bundles the CA bundle here: http://curl.haxx.se/docs/caextract.html

How do I disable SSL?
---------------------

.. warning::

    Because SSL requires all data to be encrypted and requires more TCP packets to complete a connection handshake than
    just TCP, disabling SSL may provide a small performance improvement. However, with SSL disabled, all data is sent
    over the wire unencrypted. Before disabling SSL, you must carefully consider the security implications and the
    potential for eavesdropping over the network.

You can disable SSL by setting the ``scheme`` parameter in a client factory method to 'http'.

.. code-block:: php

    $client = Aws\DynamoDb\DynamoDbClient::factory(array(
        'region' => 'us-west-2',
        'scheme' => 'http'
    ));

How can I make the SDK faster?
------------------------------

See :doc:`performance` for more information.

Why can't I upload or download files greater than 2GB?
------------------------------------------------------

Because PHP's integer type is signed and many platforms use 32-bit integers, the
AWS SDK for PHP does not correctly handle files larger than 2GB on a 32-bit stack
(where "stack" includes CPU, OS, web server, and PHP binary). This is a
`well-known PHP issue <http://www.google.com/search?q=php+2gb+32-bit>`_. In the
case of Microsoft® Windows®, there are no official builds of PHP that support
64-bit integers.

The recommended solution is to use a `64-bit Linux stack <http://aws.amazon.com/amazon-linux-ami/>`_,
such as the 64-bit Amazon Linux AMI with the latest version of PHP installed.

For more information, please see: `PHP filesize :Return values <http://docs.php.net/manual/en/function.filesize.php#refsect1-function.filesize-returnvalues>`_.

How can I see what data is sent over the wire?
----------------------------------------------

You can attach a ``Guzzle\Plugin\Log\LogPlugin`` to any client to see all request and
response data sent over the wire. The LogPlugin works with any logger that implements
the ``Guzzle\Log\LogAdapterInterface`` interface (currently Monolog, ZF1, ZF2).

If you just want to quickly see what data is being sent over the wire, you can
simply attach a debug log plugin to your client.

.. code-block:: php

    use Guzzle\Plugin\Log\LogPlugin;

    // Create an Amazon S3 client
    $s3Client = S3Client::factory();

    // Add a debug log plugin
    $s3Client->addSubscriber(LogPlugin::getDebugPlugin());

For more complex logging or logging to a file, you can build a LogPlugin manually.

.. code-block:: php

    use Guzzle\Log\MonologLogAdapter;
    use Guzzle\Plugin\Log\LogPlugin;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    // Create a log channel
    $log = new Logger('aws');
    $log->pushHandler(new StreamHandler('/path/to/your.log', Logger::WARNING));

    // Create a log adapter for Monolog
    $logger = new MonologLogAdapter($log);

    // Create the LogPlugin
    $logPlugin = new LogPlugin($logger);

    // Create an Amazon S3 client
    $s3Client = S3Client::factory();

    // Add the LogPlugin to the client
    $s3Client->addSubscriber($logPlugin);

You can find out more about the LogPlugin on the Guzzle website: http://guzzlephp.org/guide/plugins.html#log-plugin

How can I set arbitrary headers on a request?
---------------------------------------------

You can add any arbitrary headers to a service operation by setting the ``command.headers`` value. The following example
shows how to add an ``X-Foo-Baz`` header to an Amazon S3 PutObject operation.

.. code-block:: php

    $s3Client = S3Client::factory();
    $s3Client->putObject(array(
        'Key'    => 'test',
        'Bucket' => 'mybucket',
        'command.headers' => array(
            'X-Foo-Baz' => 'Bar'
        )
    ));

Does the SDK follow semantic versioning?
----------------------------------------

Yes. The SDK follows a semantic versioning scheme similar to – but not the same as – `semver <http://semver.org>`_.
Instead of the **MAJOR.MINOR.PATCH** scheme specified by semver, the SDK actually follows a scheme that looks like
**PARADIGM.MAJOR.MINOR** where:

1. The **PARADIGM** version number is incremented when **drastic, breaking changes** are made to the SDK, such that the
   fundamental way of using the SDK is different. You are probably aware that version 1.x and version 2.x of the AWS SDK
   for PHP are *very* different.
2. The **MAJOR** version number is incremented when **breaking changes** are made to the API. These are usually small
   changes, and only occur when one of the services makes breaking changes changes to their API. Make sure to check the
   `CHANGELOG <https://github.com/aws/aws-sdk-php/blob/master/CHANGELOG.md>`_ and
   `UPGRADING <https://github.com/aws/aws-sdk-php/blob/master/UPGRADING.md>`_ documents when these changes occur.
3. The **MINOR** version number is incremented when any **backwards-compatible** change is made, whether it's a new
   feature or a bug fix.

The best way to ensure that you are not affected by breaking changes is to set your dependency on the SDK in Composer to
stay within a particular **PARADIGM.MAJOR** version. This can be done using the wildcard syntax:

.. code-block:: json

    {
        "require": {
            "aws/aws-sdk-php": "2.4.*"
        }
    }

...Or by using the the tilde operator. The following statement is equivalent to `>=2.4.9,<2.5`:

.. code-block:: json

    {
        "require": {
            "aws/aws-sdk-php": "~2.4.9"
        }
    }

See the `Composer documentation <http://getcomposer.org/doc/01-basic-usage.md#package-versions>`_ for more information
on configuring your dependencies.

The SDK may at some point adopt the semver standard, but this will probably not happen until the next paradigm-type
change.

Why am I seeing a "Cannot redeclare class" error?
-------------------------------------------------

We have observed this error a few times when using the ``aws.phar`` from the CLI with APC enabled. This is due to some
kind of issue with phars and APC. Luckily there are a few ways to get around this. Please choose the one that makes the
most sense for your environment and application.

1. **Disable APC for CLI** - Change the ``apc.enable_cli`` INI setting to ``Off``.
2. **Tell APC not to cache phars** - Change the ``apc.filters`` INI setting to include ``"^phar://"``.
3. **Don't use APC** - PHP 5.5, for example, comes with Zend OpCache built in. This problem has not been observed with
   Zend OpCache.
4. **Don't use the phar** - You can install the SDK through Composer (recommended) or by using the zip file.

What is an InstanceProfileCredentialsException?
-----------------------------------------------

If you are seeing an ``Aws\Common\Exception\InstanceProfileCredentialsException`` while using the SDK, this means that
the SDK was not provided with any credentials.

If you instantiate a client *without* credentials, on the first time that you perform a service operation, the SDK will
attempt to find credentials. It first checks in some specific environment variables, then it looks for instance profile
credentials, which are only available on configured Amazon EC2 instances. If absolutely no credentials are provided or
found, an ``Aws\Common\Exception\InstanceProfileCredentialsException`` is thrown.

If you are seeing this error and you are intending to use instance profile credentials, then you need to make sure that
the Amazon EC2 instance that the SDK is running on is configured with an appropriate IAM role.

If you are seeing this error and you are **not** intending to use instance profile credentials, then you need to make
sure that you are properly providing credentials to the SDK.

For more information, see :doc:`credentials`.
