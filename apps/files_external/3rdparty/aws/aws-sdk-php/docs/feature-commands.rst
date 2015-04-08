===============
Command Objects
===============

Command objects are fundamental to how the SDK works. In normal usage of the SDK, you may never interact with command
objects. However, if you are :ref:`performing operations in parallel <parallel_commands>`,
:ref:`inspecting data from the request or response <requests_and_responses>`, or writing custom plugins, you will need
to understand how they work.

Typical SDK usage
-----------------

.. include:: _snippets/performing-operations.txt

A peek under the hood
---------------------

If you examine a client class, you will see that the methods corresponding to the operations do not actually exist. They
are implemented using the ``__call()`` magic method behavior. These pseudo-methods are actually shortcuts that
encapsulate the SDK's — and the underlying Guzzle library's — use of command objects.

For example, you could perform the same ``DescribeTable`` operation from the preceding section using command objects:

.. code-block:: php

    $command = $dynamoDbClient->getCommand('DescribeTable', array(
        'TableName' => 'YourTableName',
    ));
    $result = $command->getResult();

A **Command** is an object that represents the execution of a service operation. Command objects are an abstraction of
the process of formatting a request to a service, executing the request, receiving the response, and formatting the
results. Commands are created and executed by the client and contain references to **Request** and **Response** objects.
The **Result** object is a what we refer to as a :doc:`"modeled response" <feature-models>`.

Using command objects
---------------------

Using the pseudo-methods for performing operations is shorter and preferred for typical use cases, but command objects
provide greater flexibility and access to additional data.

Manipulating command objects before execution
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

When you create a command using a client's ``getCommand()`` method, it does not immediately execute. Because commands
are lazily executed, it is possible to pass the command object around and add or modify the parameters. The following
examples show how to work with command objects:

.. code-block:: php

    // You can add parameters after instantiation
    $command = $s3Client->getCommand('ListObjects');
    $command->set('MaxKeys', 50);
    $command->set('Prefix', 'foo/baz/');
    $result = $command->getResult();

    // You can also modify parameters
    $command = $s3Client->getCommand('ListObjects', array(
        'MaxKeys' => 50,
        'Prefix'  => 'foo/baz/',
    ));
    $command->set('MaxKeys', 100);
    $result = $command->getResult();

    // The set method is chainable
    $result = $s3Client->getCommand('ListObjects')
        ->set('MaxKeys', 50);
        ->set('Prefix', 'foo/baz/');
        ->getResult();

    // You can also use array access
    $command = $s3Client->getCommand('ListObjects');
    $command['MaxKeys'] = 50;
    $command['Prefix'] = 'foo/baz/';
    $result = $command->getResult();

Also, see the `API docs for commands
<http://docs.aws.amazon.com/aws-sdk-php/latest/class-Guzzle.Service.Command.AbstractCommand.html>`_.

.. _requests_and_responses:

Request and response objects
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

From the command object, you can access the request, response, and result objects. The availability of these objects
depend on the state of the command object.

Managing command state
^^^^^^^^^^^^^^^^^^^^^^

Commands must be prepared before the request object is available, and commands must executed before the response and
result objects are available.

.. code-block:: php

    // 1. Create
    $command = $client->getCommand('OperationName');

    // 2. Prepare
    $command->prepare();
    $request = $command->getRequest();
    // Note: `prepare()` also returns the request object

    // 3. Execute
    $command->execute();
    $response = $command->getResponse();
    $result = $command->getResult();
    // Note: `execute()` also returns the result object

This is nice, because it gives you a chance to modify the request before it is actually sent.

.. code-block:: php

    $command = $client->getCommand('OperationName');
    $request = $command->prepare();
    $request->addHeader('foo', 'bar');
    $result = $command->execute();

You don't have to manage each aspect of the state though, calling ``execute()`` will also prepare the command, and
calling ``getResult()`` will prepare and execute the command.

Using requests and responses
^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Request and response objects contain data about the actual requests and responses to the service.

.. code-block:: php

    $command = $client->getCommand('OperationName');
    $command->execute();

    // Get and use the request object
    $request = $command->getRequest();
    $contentLength = $request->getHeader('Content-Length');
    $url = $request->getUrl();

    // Get and use the response object
    $response = $command->getResponse();
    $success = $response->isSuccessful();
    $status = $response->getStatusCode();

You can also take advantage of the ``__toString`` behavior of the request and response objects. If you print them
(e.g., ``echo $request;``), you can see the raw request and response data that was sent over the wire.

To learn more, read the API docs for the `Request
<http://docs.aws.amazon.com/aws-sdk-php/latest/class-Guzzle.Http.Message.Request.html>`_ and `Response
<http://docs.aws.amazon.com/aws-sdk-php/latest/class-Guzzle.Http.Message.Response.html>`_ classes.

.. _parallel_commands:

Executing commands in parallel
------------------------------

The AWS SDK for PHP allows you to execute multiple operations in parallel when you use command objects. This can reduce
the total time (sometimes drastically) it takes to perform a set of operations, since you can do them at the same time
instead of one after another. The following shows an example of how you could upload two files to Amazon S3 at the same
time.

.. code-block:: php

    $commands = array();
    $commands[] = $s3Client->getCommand('PutObject', array(
        'Bucket' => 'SOME_BUCKET',
        'Key'    => 'photos/photo01.jpg',
        'Body'   => fopen('/tmp/photo01.jpg', 'r'),
    ));
    $commands[] = $s3Client->getCommand('PutObject', array(
        'Bucket' => 'SOME_BUCKET',
        'Key'    => 'photos/photo02.jpg',
        'Body'   => fopen('/tmp/photo02.jpg', 'r'),
    ));

    // Execute an array of command objects to do them in parallel
    $s3Client->execute($commands);

    // Loop over the commands, which have now all been executed
    foreach ($commands as $command) {
        $result = $command->getResult();
        // Do something with result
    }

Error handling with parallel commands
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

When executing commands in parallel, error handling becomes a bit trickier. If an exception is thrown, then the SDK (via
Guzzle) will aggregate the exceptions together and throw a single ``Guzzle\Service\Exception\CommandTransferException``
(`see the API docs
<http://docs.aws.amazon.com/aws-sdk-php/latest/class-Guzzle.Service.Exception.CommandTransferException.html>`_) once all
of the commands have completed execution. This exception class keeps track of which commands succeeded and which failed
and also allows you to fetch the original exceptions thrown for failed commands.

.. code-block:: php

    use Guzzle\Service\Exception\CommandTransferException;

    try {
        $succeeded = $client->execute($commands);
    } catch (CommandTransferException $e) {
        $succeeded = $e->getSuccessfulCommands();
        echo "Failed Commands:\n";
        foreach ($e->getFailedCommands() as $failedCommand) {
            echo $e->getExceptionForFailedCommand($failedCommand)->getMessage() . "\n";
        }
    }
