========================
DynamoDB Session Handler
========================

Introduction
------------

The **DynamoDB Session Handler** is a custom session handler for PHP that allows developers to use Amazon DynamoDB as a
session store. Using DynamoDB for session storage alleviates issues that occur with session handling in a distributed
web application by moving sessions off of the local file system and into a shared location. DynamoDB is fast, scalable,
easy to setup, and handles replication of your data automatically.

The DynamoDB Session Handler uses the ``session_set_save_handler()`` function to hook DynamoDB operations into PHP's
`native session functions <http://www.php.net/manual/en/ref.session.php>`_ to allow for a true drop in replacement. This
includes support for features like session locking and garbage collection which are a part of PHP's default session
handler.

For more information on the Amazon DynamoDB service, please visit the `Amazon DynamoDB homepage
<http://aws.amazon.com/dynamodb>`_.

Basic Usage
-----------

1. Register the handler
~~~~~~~~~~~~~~~~~~~~~~~

The first step is to instantiate the Amazon DynamoDB client and register the session handler.

.. code-block:: php

    require 'vendor/autoload.php';

    use Aws\DynamoDb\DynamoDbClient;

    $dynamoDb = DynamoDbClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => '<region name>'
    ));

    $sessionHandler = $dynamoDb->registerSessionHandler(array(
        'table_name' => 'sessions'
    ));

You can also instantiate the ``SessionHandler`` object directly using it's ``factory`` method.

.. code-block:: php

    require 'vendor/autoload.php';

    use Aws\DynamoDb\DynamoDbClient;
    use Aws\DynamoDb\Session\SessionHandler;

    $dynamoDb = DynamoDbClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => '<region name>',
    ));

    $sessionHandler = SessionHandler::factory(array(
        'dynamodb_client' => $dynamoDb,
        'table_name'      => 'sessions',
    ));
    $sessionHandler->register();

2. Create a table for storing your sessions
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Before you can actually use the session handler, you need to create a table in which to store the sessions. This can be
done ahead of time through the `AWS Console for Amazon DynamoDB <https://console.aws.amazon.com/dynamodb/home>`_, or you
can use the session handler object (which you've already configured with the table name) by doing the following:

.. code-block:: php

    $sessionHandler->createSessionsTable(5, 5);

The two parameters for this function are used to specify the read and write provisioned throughput for the table,
respectively.

.. note::

    The ``createSessionsTable`` function uses the ``TableExists`` :doc:`waiter <feature-waiters>` internally, so this
    function call will block until the table exists and is ready to be used.

3. Use PHP sessions like normal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Once the session handler is registered and the table exists, you can write to and read from the session using the
``$_SESSION`` superglobal, just like you normally do with PHP's default session handler. The DynamoDB Session Handler
encapsulates and abstracts the interactions with Amazon DynamoDB and enables you to simply use PHP's native session
functions and interface.

.. code-block:: php

    // Start the session
    session_start();

    // Alter the session data
    $_SESSION['user.name'] = 'jeremy';
    $_SESSION['user.role'] = 'admin';

    // Close the session (optional, but recommended)
    session_write_close();

Configuration
-------------

You may configure the behavior of the session handler using the following options. All options are optional, but you
should make sure to understand what the defaults are.

============================ ===========================================================================================
``table_name``               The name of the DynamoDB table in which to store the sessions. This defaults to ``sessions``.
---------------------------- -------------------------------------------------------------------------------------------
``hash_key``                 The name of the hash key in the DynamoDB sessions table. This defaults to ``id``.
---------------------------- -------------------------------------------------------------------------------------------
``session_lifetime``         The lifetime of an inactive session before it should be garbage collected. If it is not
                             provided, then the actual lifetime value that will be used is
                             ``ini_get('session.gc_maxlifetime')``.
---------------------------- -------------------------------------------------------------------------------------------
``consistent_read``          Whether or not the session handler should use consistent reads for the ``GetItem``
                             operation. This defaults to ``true``.
---------------------------- -------------------------------------------------------------------------------------------
``locking_strategy``         The strategy used for doing session locking. By default the handler uses the
                             ``NullLockingStrategy``, which means that session locking is **not** enabled (see the
                             :ref:`ddbsh-session-locking` section for more information). Valid values for this option
                             include null, 'null', 'pessemistic', or an instance of ``NullLockingStrategy`` or
                             ``PessimisticLockingStrategy``.
---------------------------- -------------------------------------------------------------------------------------------
``automatic_gc``             Whether or not to use PHP's session auto garbage collection. This defaults to the value of
                             ``(bool) ini_get('session.gc_probability')``, but the recommended value is ``false``. (see
                             the :ref:`ddbsh-garbage-collection` section for more information).
---------------------------- -------------------------------------------------------------------------------------------
``gc_batch_size``            The batch size used for removing expired sessions during garbage collection. This defaults
                             to ``25``, which is the maximum size of a single ``BatchWriteItem`` operation. This value
                             should also take your provisioned throughput into account as well as the timing of your
                             garbage collection.
---------------------------- -------------------------------------------------------------------------------------------
``gc_operation_delay``       The delay (in seconds) between service operations performed during garbage collection. This
                             defaults to ``0``. Increasing this value allows you to throttle your own requests in an
                             attempt to stay within your provisioned throughput capacity during garbage collection.
---------------------------- -------------------------------------------------------------------------------------------
``max_lock_wait_time``       Maximum time (in seconds) that the session handler should wait to acquire a lock before
                             giving up. This defaults to ``10`` and is only used with the ``PessimisticLockingStrategy``.
---------------------------- -------------------------------------------------------------------------------------------
``min_lock_retry_microtime`` Minimum time (in microseconds) that the session handler should wait between attempts
                             to acquire a lock. This defaults to ``10000`` and is only used with the
                             ``PessimisticLockingStrategy``.
---------------------------- -------------------------------------------------------------------------------------------
``max_lock_retry_microtime`` Maximum time (in microseconds) that the session handler should wait between attempts
                             to acquire a lock. This defaults to ``50000`` and is only used with the
                             ``PessimisticLockingStrategy``.
---------------------------- -------------------------------------------------------------------------------------------
``dynamodb_client``          The ``DynamoDbClient`` object that should be used for performing DynamoDB operations. If
                             you register the session handler from a client object using the ``registerSessionHandler()``
                             method, this will default to the client you are registering it from. If using the
                             ``SessionHandler::factory()`` method, you are required to provide an instance of
                             ``DynamoDbClient``.
============================ ===========================================================================================

To configure the Session Handler, you must specify the configuration options when you instantiate the handler. The
following code is an example with all of the configuration options specified.

.. code-block:: php

    $sessionHandler = $dynamoDb->registerSessionHandler(array(
        'table_name'               => 'sessions',
        'hash_key'                 => 'id',
        'session_lifetime'         => 3600,
        'consistent_read'          => true,
        'locking_strategy'         => null,
        'automatic_gc'             => 0,
        'gc_batch_size'            => 50,
        'max_lock_wait_time'       => 15,
        'min_lock_retry_microtime' => 5000,
        'max_lock_retry_microtime' => 50000,
    ));

Pricing
-------

Aside from data storage and data transfer fees, the costs associated with using Amazon DynamoDB are calculated based on
the provisioned throughput capacity of your table (see the `Amazon DynamoDB pricing details
<http://aws.amazon.com/dynamodb/#pricing>`_). Throughput is measured in units of Write Capacity and Read Capacity. The
Amazon DynamoDB homepage says:

    A unit of Write Capacity enables you to perform one write per second for items of up to 1KB in size. Similarly, a
    unit of Read Capacity enables you to perform one strongly consistent read per second (or two eventually consistent
    reads per second) of items of up to 1KB in size. Larger items will require more capacity. You can calculate the
    number of units of read and write capacity you need by estimating the number of reads or writes you need to do per
    second and multiplying by the size of your items (rounded up to the nearest KB).

Ultimately, the throughput and the costs required for your sessions table is going to correlate with your expected
traffic and session size. The following table explains the amount of read and write operations that are performed on
your DynamoDB table for each of the session functions.

+----------------------------------------+-----------------------------------------------------------------------------+
| Read via ``session_start()``           | * 1 read operation (only 0.5 if ``consistent_read`` is ``false``).          |
| (Using ``NullLockingStrategy``)        | * (Conditional) 1 write operation to delete the session if it is expired.   |
+----------------------------------------+-----------------------------------------------------------------------------+
| Read via ``session_start()``           | * A minimum of 1 *write* operation.                                         |
| (Using ``PessimisticLockingStrategy``) | * (Conditional) Additional write operations for each attempt at acquiring a |
|                                        |   lock on the session. Based on configured lock wait time and retry options.|
|                                        | * (Conditional) 1 write operation to delete the session if it is expired.   |
+----------------------------------------+-----------------------------------------------------------------------------+
| Write via ``session_write_close()``    | * 1 write operation.                                                        |
+----------------------------------------+-----------------------------------------------------------------------------+
| Delete via ``session_destroy()``       | * 1 write operation.                                                        |
+----------------------------------------+-----------------------------------------------------------------------------+
| Garbage Collection                     | * 0.5 read operations **per KB of data in the table** to scan for expired   |
|                                        |   sessions.                                                                 |
|                                        | * 1 write operation **per expired item** to delete it.                      |
+----------------------------------------+-----------------------------------------------------------------------------+

.. _ddbsh-session-locking:

Session Locking
---------------

The DynamoDB Session Handler supports pessimistic session locking in order to mimic the behavior of PHP's default
session handler. By default the DynamoDB Session Handler has this feature *turned off* since it can become a performance
bottleneck and drive up costs, especially when an application accesses the session when using ajax requests or iframes.
You should carefully consider whether or not your application requires session locking or not before enabling it.

By default the session handler uses the ``NullLockingStrategy`` which does not do any session locking. To enable session
locking, you should use the ``PessimisticLockingStrategy``, which can be specified when the session handler is created.

.. code-block:: php

    $sessionHandler = $dynamoDb->registerSessionHandler(array(
        'table_name'       => 'sessions',
        'locking_strategy' => 'pessimistic',
    ));

.. _ddbsh-garbage-collection:

Garbage Collection
------------------

The DynamoDB Session Handler supports session garbage collection by using a series of ``Scan`` and ``BatchWriteItem``
operations. Due to the nature of how the ``Scan`` operation works and in order to find all of the expired sessions and
delete them, the garbage collection process can require a lot of provisioned throughput.

For this reason it is discouraged to rely on the PHP's normal session garbage collection triggers (i.e., the
``session.gc_probability`` and ``session.gc_divisor`` ini settings). A better practice is to set
``session.gc_probability`` to ``0`` and schedule the garbage collection to occur during an off-peak time where a
burst of consumed throughput will not disrupt the rest of the application.

For example, you could have a nightly cron job trigger a script to run the garbage collection. This script might look
something like the following:

.. code-block:: php

    require 'vendor/autoload.php';

    use Aws\DynamoDb\DynamoDbClient;
    use Aws\DynamoDb\Session\SessionHandler;

    $dynamoDb = DynamoDbClient::factory(array(
        'key'    => '<aws access key>',
        'secret' => '<aws secret key>',
        'region' => '<region name>',
    ));

    $sessionHandler = SessionHandler::factory(array(
        'dynamodb_client' => $dynamoDb,
        'table_name'      => 'sessions',
    ));

    $sessionHandler->garbageCollect();

You can also use the ``gc_operation_delay`` configuration option on the session handler to introduce delays in between
the ``Scan`` and ``BatchWriteItem`` operations that are performed by the garbage collection process. This will increase
the amount of time it takes the garbage collection to complete, but it can help you spread out the requests made by the
session handler in order to help you stay close to or within your provisioned throughput capacity during garbage
collection.

Best Practices
--------------

#. Create your sessions table in a region that is geographically closest to or in the same region as your application
   servers. This will ensure the lowest latency between your application and DynamoDB database.
#. Choose the provisioned throughput capacity of your sessions table carefully, taking into account the expected traffic
   to your application and the expected size of your sessions.
#. Monitor your consumed throughput through the AWS Management Console or with Amazon CloudWatch and adjust your
   throughput settings as needed to meet the demands of your application.
#. Keep the size of your sessions small. Sessions that are less than 1KB will perform better and require less
   provisioned throughput capacity.
#. Do not use session locking unless your application requires it.
#. Instead of using PHP's built-in session garbage collection triggers, schedule your garbage collection via a cron job,
   or another scheduling mechanism, to run during off-peak hours. Use the ``gc_operation_delay`` option to add delays
   in between the requests performed for the garbage collection process.

