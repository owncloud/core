.. service:: Sqs

Creating a queue
----------------

Now, let's create a queue. You can create a standard queue by just providing a name. Make sure to get the queue's URL
from the result, since the queue URL is the unique identifier used to specify the queue in order to send and receive
messages.

.. code-block:: php

    $result = $client->createQueue(array('QueueName' => 'my-queue'));
    $queueUrl = $result->get('QueueUrl');

You can also set attributes on your queue when you create it.

.. code-block:: php

    $result = $client->createQueue(array(
        'QueueName'  => 'my-queue',
        'Attributes' => array(
            'DelaySeconds'       => 5,
            'MaximumMessageSize' => 4096, // 4 KB
        ),
    ));
    $queueUrl = $result->get('QueueUrl');

Or you can also set queue attributes later.

.. code-block:: php

    $result = $client->setQueueAttributes(array(
        'QueueUrl'   => $queueUrl,
        'Attributes' => array(
            'VisibilityTimeout' => 2 * 60 * 60, // 2 min
        ),
    ));

Sending messages
----------------

Sending a message to a queue is straight forward with the ``SendMessage`` command.

.. code-block:: php

    $client->sendMessage(array(
        'QueueUrl'    => $queueUrl,
        'MessageBody' => 'An awesome message!',
    ));

You can overwrite the queue's default delay for a message when you send it.

.. code-block:: php

    $client->sendMessage(array(
        'QueueUrl'     => $queueUrl,
        'MessageBody'  => 'An awesome message!',
        'DelaySeconds' => 30,
    ));

Receiving messages
------------------

Receiving messages is done with the ``ReceiveMessage`` command.

.. code-block:: php

    $result = $client->receiveMessage(array(
        'QueueUrl' => $queueUrl,
    ));

    foreach ($result->getPath('Messages/*/Body') as $messageBody) {
        // Do something with the message
        echo $messageBody;
    }

By default, only one message will be returned. If you want to get more messages, make sure to use the
``MaxNumberOfMessages`` parameter and specify a number of messages (1 to 10). Remember that you are not guaranteed to
receive that many messages, but you can receive up to that amount depending on how many are actually in the queue at
the time of your request.

SQS also supports `"long polling"
<http://docs.aws.amazon.com/AWSSimpleQueueService/latest/SQSDeveloperGuide/sqs-long-polling.html>`_, meaning that you
can instruct SQS to hold the connection open with the SDK for up to 20 seconds in order to wait for a message to arrive
in the queue. To configure this behavior, you must use the ``WaitTimeSeconds`` parameter.

.. code-block:: php

    $result = $client->receiveMessage(array(
        'QueueUrl'        => $queueUrl,
        'WaitTimeSeconds' => 10,
    ));

.. note:: You can also configure long-polling at the queue level by setting the ``ReceiveMessageWaitTimeSeconds`` queue
          attribute.

.. apiref:: Sqs
