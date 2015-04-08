=======
Waiters
=======

Introduction
------------

.. include:: _snippets/waiters-intro.txt

If the Waiter has to poll the bucket too many times, it will throw an ``Aws\Common\Exception\RuntimeException``
exception.

Basic Configuration
-------------------

You can tune the number of polling attempts issued by a Waiter or the number of seconds to delay between each poll by
passing optional values prefixed with "waiter.":

.. code-block:: php

    $s3Client->waitUntil('BucketExists', array(
        'Bucket'              => 'my-bucket',
        'waiter.interval'     => 10,
        'waiter.max_attempts' => 3
    ));

Waiter Objects
--------------

To interact with the Waiter object directly, you must use the ``getWaiter()`` method. The following code is equivalent
to the example in the preceding section.

.. code-block:: php

    $bucketExistsWaiter = $s3Client->getWaiter('BucketExists')
        ->setConfig(array('Bucket' => 'my-bucket'))
        ->setInterval(10)
        ->setMaxAttempts(3);
    $bucketExistsWaiter->wait();

Waiter Events
-------------

One benefit of working directly with the Waiter object is that you can attach event listeners. Waiters emit up to two
events in each **wait cycle**. A wait cycle does the following:

#. Dispatch the ``waiter.before_attempt`` event.
#. Attempt to resolve the wait condition by making a request to the service and checking the result.
#. If the wait condition is resolved, the wait cycle exits. If ``max_attempts`` is reached, an exception is thrown.
#. Dispatch the ``waiter.before_wait`` event.
#. Sleep ``interval`` amount of seconds.

Waiter objects extend the ``Guzzle\Common\AbstractHasDispatcher`` class which exposes the ``addSubscriber()`` method and
``getEventDispatcher()`` method. To attach listeners, you can use the following example, which is a modified version of
the previous one.

.. code-block:: php

    // Get and configure the Waiter object
    $waiter = $s3Client->getWaiter('BucketExists')
        ->setConfig(array('Bucket' => 'my-bucket'))
        ->setInterval(10)
        ->setMaxAttempts(3);

    // Get the event dispatcher and register listeners for both events emitted by the Waiter
    $dispatcher = $waiter->getEventDispatcher();
    $dispatcher->addListener('waiter.before_attempt', function () {
        echo "Checking if the wait condition has been met…\n";
    });
    $dispatcher->addListener('waiter.before_wait', function () use ($waiter) {
        $interval = $waiter->getInterval();
        echo "Sleeping for {$interval} seconds…\n";
    });

    $waiter->wait();

Custom Waiters
--------------

It is possible to implement custom Waiter objects if your use case requires application-specific Waiter logic or Waiters
that are not yet supported by the SDK. You can use the ``getWaiterFactory()`` and ``setWaiterFactory()`` methods on the
client to manipulate the Waiter factory used by the client such that your custom Waiter can be instantiated. By default
the service clients use a ``Aws\Common\Waiter\CompositeWaiterFactory`` which allows you to add additional factories if
needed. The following example shows how to implement a contrived custom Waiter class and then modify a client's Waiter
factory such that it can create instances of the custom Waiter.

.. code-block:: php

    namespace MyApp\FakeWaiters
    {
        use Aws\Common\Waiter\AbstractResourceWaiter;

        class SleptThreeTimes extends AbstractResourceWaiter
        {
            public function doWait()
            {
                if ($this->attempts < 3) {
                    echo "Need to sleep…\n";
                    return false;
                } else {
                    echo "Now I've slept 3 times.\n";
                    return true;
                }
            }
        }
    }

    namespace
    {
        use Aws\S3\S3Client;
        use Aws\Common\Waiter\WaiterClassFactory;

        $s3Client = S3Client::factory();

        $compositeFactory = $s3Client->getWaiterFactory();
        $compositeFactory->addFactory(new WaiterClassFactory('MyApp\FakeWaiters'));

        $waiter = $s3Client->waitUntil('SleptThreeTimes');
    }

The result of this code should look like the following::

    Need to sleep…
    Need to sleep…
    Need to sleep…
    Now I've slept 3 times.

Waiter Definitions
------------------

The Waiters that are included in the SDK are defined in the service description for their client. They are defined
using a configuration DSL (domain-specific language) that describes the default wait intervals, wait conditions, and
how to check or poll the resource to resolve the condition.

This data is automatically consumed and used by the ``Aws\Common\Waiter\WaiterConfigFactory`` class when a client is
instantiated so that the waiters defined in the service description are available to the client.

The following is an excerpt of the Amazon Glacier service description that defines the Waiters provided by
``Aws\Glacier\GlacierClient``.

.. code-block:: php

    return array(
        // ...

        'waiters' => array(
            '__default__' => array(
                'interval' => 3,
                'max_attempts' => 15,
            ),
            '__VaultState' => array(
                'operation' => 'DescribeVault',
            ),
            'VaultExists' => array(
                'extends' => '__VaultState',
                'success.type' => 'output',
                'description' => 'Wait until a vault can be accessed.',
                'ignore_errors' => array(
                    'ResourceNotFoundException',
                ),
            ),
            'VaultNotExists' => array(
                'extends' => '__VaultState',
                'description' => 'Wait until a vault is deleted.',
                'success.type' => 'error',
                'success.value' => 'ResourceNotFoundException',
            ),
        ),

        // ...
    );

In order for you to contribute Waiters to the SDK, you will need to implement them using the Waiters DSL. The DSL is not
documented yet, since it is currently subject to change, so if you are interested in helping to implement more Waiters,
please reach out to us via `GitHub <https://github.com/aws/aws-sdk-php/issues>`_.
