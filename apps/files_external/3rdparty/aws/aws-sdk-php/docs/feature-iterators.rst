=========
Iterators
=========

Introduction
------------

.. include:: _snippets/iterators-intro.txt

The ``getIterator()`` method also accepts a command object for the first argument. If you have a command object already
instantiated, you can create an iterator directly from the command object.

.. code-block:: php

    $command = $client->getCommand('ListObjects', array('Bucket' => 'my-bucket'));
    $iterator = $client->getIterator($command);

Iterator Objects
----------------

The actual object returned by ``getIterator()`` is an instance of the ``Aws\Common\Iterator\AwsResourceIterator`` class
(see the `API docs <http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Common.Iterator.AwsResourceIterator.html>`_
for more information about its methods and properties). This class implements PHP's native ``Iterator`` interface, which
is why it works with ``foreach``, can be used with iterator functions like ``iterator_to_array``, and integrates well
with `SPL iterators <http://www.php.net/manual/en/spl.iterators.php>`_ like ``LimitIterator``.

Iterator objects only store one "page" of results at a time and only make as many requests as they need based on the
current iteration. The S3 ``ListObjects`` operation only returns up to 1000 objects at a time. If your bucket has ~10000
objects, then the iterator would need to do 10 requests. However, it does not execute the subsequent requests until
needed. If you are iterating through the results, the first request would happen when you start iterating, and the
second request would not happen until you iterate to the 1001th object. This can help your application save memory by
only holding one page of results at a time.

Basic Configuration
-------------------

Iterators accept an extra set of parameters that are not passed into the commands. You can set a limit on the number of
results you want with the ``limit`` parameter, and you can control how many results you want to get back per request
using the ``page_size`` parameter. If no ``limit`` is specified, then all results are retrieved. If no ``page_size`` is
specified, then the Iterator will use the maximum page size allowed by the operation being executed.

The following example will make 10 Amazon S3 ``ListObjects`` requests (assuming there are more than 1000 objects in the
specified bucket) that each return up to 100 objects. The ``foreach`` loop will yield up to 999 objects.

.. code-block:: php

    $iterator = $client->getIterator('ListObjects', array(
        'Bucket' => 'my-bucket'
    ), array(
        'limit'     => 999,
        'page_size' => 100
    ));

    foreach ($iterator as $object) {
        echo $object['Key'] . "\n";
    }

There are some limitations to the ``limit`` and ``page_size`` parameters though. Not all operations support specifying
a page size or limit, so the Iterator will do its best with what you provide. For example, if an operation always
returns 1000 results, and you specify a limit of 100, the Iterator will only yield 100 results, even though the actual
request sent to the service yielded 1000.

Iterator Events
---------------

Iterators emit 2 kinds of events:

1. ``resource_iterator.before_send`` - Emitted right before a request is sent to retrieve results.
2. ``resource_iterator.after_send`` - Emitted right after a request is sent to retrieve results.

Iterator objects extend the ``Guzzle\Common\AbstractHasDispatcher`` class which exposes the ``addSubscriber()`` method
and the ``getEventDispatcher()`` method. To attach listeners, you can use the following example which echoes a message
right before and after a request is executed by the iterator.

.. code-block:: php

    $iterator = $client->getIterator('ListObjects', array(
        'Bucket' => 'my-bucket'
    ));

    // Get the event dispatcher and register listeners for both events
    $dispatcher = $iterator->getEventDispatcher();
    $dispatcher->addListener('resource_iterator.before_send', function ($event) {
        echo "Getting more results…\n";
    });
    $dispatcher->addListener('resource_iterator.after_send', function ($event) use ($iterator) {
        $requestCount = $iterator->getRequestCount();
        echo "Results received. {$requestCount} request(s) made so far.\n";
    });

    foreach ($iterator as $object) {
        echo $object['Key'] . "\n";
    }
