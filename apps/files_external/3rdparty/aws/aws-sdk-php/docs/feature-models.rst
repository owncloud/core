=================
Modeled Responses
=================

Introduction
------------

.. include:: _snippets/models-intro.txt

Working with Model objects
--------------------------

Model objects (and Command objects) inherit from the `Guzzle Collection class
<http://docs.aws.amazon.com/aws-sdk-php/latest/class-Guzzle.Common.Collection.html>`_ and implement PHP's native
``ArrayAccess``, ``IteratorAggregate``, and ``Countable`` interfaces. This means that they behave like arrays when you
are accessing keys and iterating over key-value pairs. You can also use the ``toArray()`` method of the Model object to
get the array form directly.

However, model objects will not throw errors on undefined keys, so it's safe to use values directly without doing
``isset()`` checks. It the key doesn't exist, then the value will be returned as ``null``.

.. code-block:: php

    // Use an instance of S3Client to get an object
    $result = $s3Client->getObject(array(
        'Bucket' => 'my-bucket',
        'Key'    => 'test.txt'
    ));

    // Using a value that may not exist
    if (!$result['ContentLength']) {
        echo "Empty file.";
    }

    $isDeleted = (bool) $result->get('DeleteMarker');

Of course, you can still use ``isset()`` checks if you want to, since ``Model`` does implement ``ArrayAccess``. The
model object (and underlying Collection object) also has convenience methods for finding and checking for keys and
values.

.. code-block:: php

    // You can use isset() since the object implements ArrayAccess
    if (!isset($result['ContentLength'])) {
        echo "Empty file.";
    }

    // There is also a method that does the same type of check
    if (!$result->hasKey('ContentLength')) {
        echo "Empty file.";
    }

    // If needed, you can search for a key in a case-insensitive manner
    echo $result->keySearch('body');
    //> Body
    echo $result->keySearch('Body');
    //> Body

    // You can also list all of the keys in the result
    var_export($result->getKeys());
    //> array ( 'Body', 'DeleteMarker', 'Expiration', 'ContentLength', ... )

    // The getAll() method will return the result data as an array
    // You can specify a set of keys to only get a subset of the data
    var_export($result->getAll(array('Body', 'ContentLength')));
    //> array ( 'Body' => 'Hello!' , 'ContentLength' => 6 )

Getting nested values
~~~~~~~~~~~~~~~~~~~~~

The ``getPath()`` method of the model is useful for easily getting nested values from a response. The path is specified
as a series of keys separated by slashes.

.. code-block:: php

    // Perform a RunInstances operation and traverse into the results to get the InstanceId
    $result = $ec2Client->runInstances(array(
        'ImageId'      => 'ami-548f13d',
        'MinCount'     => 1,
        'MaxCount'     => 1,
        'InstanceType' => 't1.micro',
    ));
    $instanceId = $result->getPath('Instances/0/InstanceId');

Wildcards are also supported so that you can get extract an array of data. The following example is a modification of
the preceding such that multiple InstanceIds can be retrieved.

.. code-block:: php

    // Perform a RunInstances operation and get an array of the InstanceIds that were created
    $result = $ec2Client->runInstances(array(
        'ImageId'      => 'ami-548f13d',
        'MinCount'     => 3,
        'MaxCount'     => 5,
        'InstanceType' => 't1.micro',
    ));
    $instanceId = $result->getPath('Instances/*/InstanceId');

Using data in the model
-----------------------

Response Models contain the parsed data from the response from a service operation, so the contents of the model will
be different depending on which operation you've performed.

The SDK's API docs are the best resource for discovering what the model object will contain for a given operation. The
API docs contain a full specification of the data in the response model under the *Returns* section of the docs for an
operation (e.g., `S3 GetObject operation <http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.S3.S3Client.html#_getObject>`_,
`EC2 RunInstances operation <http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Ec2.Ec2Client.html#_runInstances>`_).

From within your code you can convert the response model directly into an array using the ``toArray()`` method. If you
are doing some debugging in your code, you could use ``toArray()`` in conjunction with ``print_r()`` to print out a
simple representation of the response data.

.. code-block:: php

    $result = $ec2Client->runInstances(array(/* ... */));
    print_r($result->toArray());

You can also examine the service description for a service, which is located in the ``Resources`` directory within a
given client's namespace directory. For example, here is a snippet from the SQS service description (located in
``src/Aws/Sqs/Resources/``) that shows the schema for the response of the ``SendMessage`` operation.

.. code-block:: php

    // ...
        'SendMessageResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MD5OfMessageBody' => array(
                    'description' => 'An MD5 digest of the non-URL-encoded message body string. This can be used [...]',
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MessageId' => array(
                    'description' => 'The message ID of the message added to the queue.',
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
    // ...

Getting Response Headers
------------------------

The ``Response`` object is not directly accessible from the ``Model`` object. If you are interested in getting header
values, the status code, or other data from the response you will need to get the ``Response`` object from the
``Command`` object (see :doc:`feature-commands`). You may need to switch from using the shorthand command syntax to the
expanded syntax so that the command object can be accessed directly.

.. code-block:: php

    // Getting the response Model with the shorthand syntax
    $result = $s3Client->createBucket(array(/* ... */));

    // Getting the response Model with the expanded syntax
    $command = $s3Client->getCommand('CreateBucket', array(/* ... */));
    $result = $command->getResult();

    // Getting the Response object from the Command
    $response = $command->getResponse();
    $contentLength = $response->getHeader('Content-Length');
    $statusCode = $response->getStatusCode();

In some cases, particularly with REST-like services like Amazon S3 and Amazon Glacier, most of the important headers are
already included in the response model.
