=================
Performance Guide
=================

The AWS SDK for PHP is able to send HTTP requests to various web services with minimal overhead. This document serves
as a guide that will help you to achieve optimal performance with the SDK.

.. contents::
   :depth: 1
   :local:
   :class: inline-toc

Upgrade PHP
-----------

Using an up-to-date version of PHP will generally improve the performance of your PHP applications. Did you know that
PHP 5.4 is `20-40% faster <http://news.php.net/php.internals/57760>`_ than PHP 5.3?
`Upgrading to PHP 5.4 <http://www.php.net/manual/en/migration54.php>`_ or greater will provide better performance and
lower memory usage. If you cannot upgrade from PHP 5.3 to PHP 5.4 or PHP 5.5, upgrading to PHP 5.3.18 or greater will
improve performance over older versions of PHP 5.3.

You can install PHP 5.4 on an Amazon Linux AMI using the following command.

.. code-block:: bash

    yum install php54

Use PHP 5.5 or an opcode cache like APC
---------------------------------------

To improve the overall performance of your PHP environment, it is highly recommended that you use an opcode cache
such as the OPCache built into PHP 5.5, APC, XCache, or WinCache. By default, PHP must load a file from disk, parse
the PHP code into opcodes, and finally execute the opcodes. Installing an opcode cache allows the parsed opcodes to
be cached in memory so that you do not need to parse the script on every web server request, and in ideal
circumstances, these opcodes can be served directly from memory.

We have taken great care to ensure that the SDK will perform well in an environment that utilizes an opcode cache.

.. note::

    PHP 5.5 comes with an opcode cache that is installed and enabled by default:
    http://php.net/manual/en/book.opcache.php

    If you are using PHP 5.5, then you may skip the remainder of this section.

APC
~~~

If you are not able to run PHP 5.5, then we recommend using APC as an opcode cache.

Installing on Amazon Linux
^^^^^^^^^^^^^^^^^^^^^^^^^^

When using Amazon Linux, you can install APC using one of the following commands depending on if you are using PHP 5.3
or PHP 5.4.

.. code-block:: bash

    # For PHP 5.4
    yum install php54-pecl-apc

    # For PHP 5.3
    yum install php-pecl-apc

Modifying APC settings
^^^^^^^^^^^^^^^^^^^^^^

APC configuration settings can be set and configured in the ``apc.ini`` file of most systems. You can find more
information about configuring APC in the PHP.net `APC documentation <http://www.php.net/manual/en/apc.configuration.php>`_.

The APC configuration file is located at ``/etc/php.d/apc.ini`` on Amazon Linux.

.. code-block:: bash

    # You can only modify the file as sudo
    sudo vim /etc/php.d/apc.ini

apc.shm_size=128M
^^^^^^^^^^^^^^^^^

It is recommended that you set the `apc.shm_size <http://www.php.net/manual/en/apc.configuration.php#ini.apc.shm-size>`_
setting to be 128M or higher. You should investigate what the right value will be for your application. The ideal
value will depend on how many files your application includes, what other frameworks are used by your application, and
if you are caching data in the APC user cache.

You can run the following command on Amazon Linux to set apc.shm_size to 128M::

    sed -i "s/apc.shm_size=.*/apc.shm_size=128M/g" /etc/php.d/apc.ini

apc.stat=0
^^^^^^^^^^

The SDK adheres to PSR-0 and relies heavily on class autoloading. When ``apc.stat=1``, APC will perform a stat on
each cached entry to ensure that the file has not been updated since it was cache in APC. This incurs a system call for
every autoloaded class required by a PHP script (you can see this for yourself by running ``strace`` on your
application).

You can tell APC to not stat each cached file by setting ``apc.stat=0`` in you apc.ini file. This change will generally
improve the overall performance of APC, but it will require you to explicitly clear the APC cache when a cached file
should be updated. This can be accomplished with Apache by issuing a hard or graceful restart. This restart step could
be added as part of the deployment process of your application.

You can run the following command on Amazon Linux to set apc.stat to 0::

    sed -i "s/apc.stat=1/apc.stat=0/g" /etc/php.d/apc.ini

.. admonition:: From the `PHP documentation <http://www.php.net/manual/en/apc.configuration.php#ini.apc.stat>`_

    This defaults to on, forcing APC to stat (check) the script on each request to determine if it has been modified. If
    it has been modified it will recompile and cache the new version. If this setting is off, APC will not check, which
    usually means that to force APC to recheck files, the web server will have to be restarted or the cache will have to
    be manually cleared. Note that FastCGI web server configurations may not clear the cache on restart. On a production
    server where the script files rarely change, a significant performance boost can be achieved by disabled stats.

    For included/required files this option applies as well, but note that for relative path includes (any path that
    doesn't start with / on Unix) APC has to check in order to uniquely identify the file. If you use absolute path
    includes APC can skip the stat and use that absolute path as the unique identifier for the file.

Use Composer with a classmap autoloader
---------------------------------------

Using `Composer <http://getcomposer.org>`_ is the recommended way to install the AWS SDK for PHP. Composer is a
dependency manager for PHP that can be used to pull in all of the dependencies of the SDK and generate an autoloader.

Autoloaders are used to lazily load classes as they are required by a PHP script. Composer will generate an autoloader
that is able to autoload the PHP scripts of your application and all of the PHP scripts of the vendors required by your
application (i.e. the AWS SDK for PHP). When running in production, it is highly recommended that you use a classmap
autoloader to improve the autoloader's speed. You can generate a classmap autoloader by passing the ``-o`` or
``--optimize-autoloader`` option to Composer's `install command <http://getcomposer.org/doc/03-cli.md#install>`_::

    php composer.phar install --optimize-autoloader

Please consult the :doc:`installation` guide for more information on how to install the SDK using Composer.

Uninstall Xdebug
----------------

`Xdebug <http://xdebug.org/>`_ is an amazing tool that can be used to identify performance bottlenecks. However, if
performance is critical to your application, do not install the Xdebug extension on your production environment. Simply
loading the extension will greatly slow down the SDK.

When running on Amazon Linux, Xdebug can be removed with the following command:

.. code-block:: bash

    # PHP 5.4
    yum remove php54-pecl-xdebug

    # PHP 5.3
    yum remove php-pecl-xdebug

Install PECL uri_template
-------------------------

The SDK utilizes URI templates to power each operation. In order to be compatible out of the box with the majority
of PHP environments, the default URI template expansion implementation is written in PHP.
`PECL URI_Template <https://github.com/ioseb/uri-template>`_ is a URI template extension for PHP written in C. This C
implementation is about 3 times faster than the default PHP implementation for expanding URI templates. Your
application will automatically begin utilizing the PECL uri_template extension after it is installed.

.. code-block:: bash

    pecl install uri_template-alpha

Turn off parameter validation
-----------------------------

The SDK utilizes service descriptions to tell the client how to serialize an HTTP request and parse an HTTP response
into a Model object. Along with serialization information, service descriptions are used to validate operation inputs
client-side before sending a request. Disabling parameter validation is a micro-optimization, but this setting can
typically be disabled in production by setting the ``validation`` option in a client factory method to ``false``.

.. code-block:: php

    $client = Aws\DynamoDb\DynamoDbClient::factory(array(
        'region'     => 'us-west-2',
        'validation' => false
    ));

Cache instance profile credentials
----------------------------------

When you do not provide credentials to the SDK and do not have credentials defined in your environment variables, the
SDK will attempt to utilize IAM instance profile credentials by contacting the Amazon EC2 instance metadata service
(IMDS). Contacting the IMDS requires an HTTP request to retrieve credentials from the IMDS.

You can cache these instance profile credentials in memory until they expire and avoid the cost of sending an HTTP
request to the IMDS each time the SDK is utilized. Set the ``credentials.cache`` option to ``true`` to attempt to
utilize the `Doctrine Cache <https://github.com/doctrine/cache>`_ PHP library to cache credentials with APC.

.. code-block:: php

    $client = Aws\DynamoDb\DynamoDbClient::factory(array(
        'region'            => 'us-west-2',
        'credentials.cache' => true
    ));

.. note::

    You will need to install Doctrine Cache in order for the SDK to cache credentials when setting
    ``credentials.cache`` to ``true``. You can add doctrine/cache to your composer.json dependencies by adding to your
    project's ``required`` section::

        {
            "required": {
                "aws/sdk": "2.*",
                "doctrine/cache": "1.*"
            }
        }

Check if you are being throttled
--------------------------------

You can check to see if you are being throttled by enabling the exponential backoff logger option. You can set the
``client.backoff.logger`` option to ``debug`` when in development, but we recommend that you provide a
``Guzzle\Log\LogAdapterInterface`` object when running in production.

.. code-block:: php

    $client = Aws\DynamoDb\DynamoDbClient::factory(array(
        'region'                => 'us-west-2',
        'client.backoff.logger' => 'debug'
    ));

When using Amazon DynamoDB, you can monitor your tables for throttling using
`Amazon CloudWatch <http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/MonitoringDynamoDB.html#CloudwatchConsole_DynamoDB>`_.

Preload frequently included files
---------------------------------

The AWS SDK for PHP adheres to PSR-0 and heavily utilizes class autoloading. Each class is in a separate file and
are included lazily as they are required. Enabling an opcode cache like APC, setting ``apc.stat=0``, and utilizing an
optimized Composer autoloader will help to mitigate the performance cost of autoloading the classes needed to utilize
the SDK. In situations like hosting a webpage where you are loading the same classes over and over, you can shave off a
bit more time by compiling all of the autoloaded classes into a single file thereby completely eliminating the cost of
autoloading. This technique can not only speed up the use of the SDK for specific use cases (e.g. using the
Amazon DynamoDB session handler), but can also speed up other aspects of your application. Even with ``apc.stat=0``,
preloading classes that you know will be used in your application will be slightly faster than relying on autoloading.

You can easily generate a compiled autoloader file using the
`ClassPreloader <https://github.com/mtdowling/ClassPreloader>`_ project. View the project's README for information on
creating a "preloader" for use with the AWS SDK for PHP.

Profile your code to find performance bottlenecks
-------------------------------------------------

You will need to profile your application to determine the bottlenecks. This can be done using
`Xdebug <http://xdebug.org/>`_, `XHProf <https://github.com/facebook/xhprof>`_,
`strace <http://en.wikipedia.org/wiki/Strace>`_, and various other tools. There are many resources available on the
internet to help you track down performance problems with your application. Here are a few that we have found useful:

* http://talks.php.net/show/devconf/0
* http://talks.php.net/show/perf_tunning/16

Comparing SDK1 and SDK2
-----------------------

Software performance is very subjective and depends heavily on factors outside of the control of the SDK. The
AWS SDK for PHP is tuned to cover the broadest set of performance sensitive applications using AWS. While there may
be a few isolated cases where V1 of the the SDK is as fast or faster than V2, that is not generally true and comes
with the loss of extensibility, maintainability, persistent HTTP connections, response parsing, PSR compliance, etc.

Depending on your use case, you will find that a properly configured environment running the AWS SDK for PHP is
generally just as fast as SDK1 for sending a single request and more than 350% faster than SDK1 for sending many
requests.

Comparing batch requests
~~~~~~~~~~~~~~~~~~~~~~~~

A common misconception when comparing the performance of SDK1 and SDK2 is that SDK1 is faster than SDK2 when sending
requests using the "batch()" API.

SDK1 is generally *not* faster at sending requests in parallel than SDK2. There may be some cases where SDK1 will appear
to more quickly complete the process of sending multiple requests in parallel, but SDK1 does not retry throttled
requests when using the ``batch()`` API. In SDK2, throttled requests are automatically retried in parallel using
truncated exponential backoff. Automatically retrying failed requests will help to ensure that your application is
successfully completing the requests that you think it is.

You can always disable retries if your use case does not benefit from retrying failed requests. To disable retries,
set 'client.backoff' to ``false`` when creating a client.

.. code-block:: php

    $client = Aws\DynamoDb\DynamoDbClient::factory(array(
        'region'         => 'us-west-2',
        'client.backoff' => false
    ));
