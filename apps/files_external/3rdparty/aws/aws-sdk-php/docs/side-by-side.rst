==================
Side-by-side Guide
==================

This guide helps you install, configure, and run Version 1 and Version 2 of the AWS SDK for PHP side-by-side within the
same application or project. Please see the :doc:`migration-guide` for more information on migrating code from the
original AWS SDK for PHP to Version 2.

Since Version 2 of the AWS SDK for PHP now supports all of the AWS services supported by Version 1 (and more), it is
recommended that you should begin migrating your code to use Version 2 of the SDK. Using both SDKs side-by-side may be
helpful if your use case requires you to migrate only sections of your code at a time.

Installing and Including the SDKs
---------------------------------

To install and include the SDKs in your project, you must first choose whether or not to use Composer.

Using Composer
~~~~~~~~~~~~~~

Using `Composer <http://getcomposer.org>`_ is the recommended way to install both versions of the AWS SDK for PHP.
Composer is a dependency management tool for PHP that allows you to declare the dependencies your project requres and
installs them into your project. In order to simultaneously use both versions of the SDK in the same project through
Composer, you must do the following:

#. Add both of the SDKs as dependencies in your project's ``composer.json`` file.

   .. code-block:: js

        {
            "require": {
                "aws/aws-sdk-php": "*",
                "amazonwebservices/aws-sdk-for-php": "*"
            }
        }

   **Note:** Consider tightening your dependencies to a known version when deploying mission critical applications
   (e.g., ``2.0.*``).

#. Download and install Composer.

   .. code-block:: sh

        curl -s "http://getcomposer.org/installer" | php

#. Install your dependencies.

   .. code-block:: sh

        php composer.phar install

#. Require Composer's autoloader.

   Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that
   it downloads. To use it, just add the following line to your code's bootstrap process.

   .. code-block:: php

        require '/path/to/sdk/vendor/autoload.php';

You can find out more on how to install Composer, configure autoloading, and other best-practices for defining
dependencies at `getcomposer.org <http://getcomposer.org>`_.

Without Composer
~~~~~~~~~~~~~~~~

Without Composer, you must manage your own project dependencies.

#. Download both of the SDKs (via PEAR, GitHub, or the AWS website) into a location accessible by your project. Make
   certain to use the pre-packaged ``aws.phar`` file, which includes all of the dependencies for the AWS SDK for PHP.

#. In your code's bootstrap process, you need to explicitly require the bootstrap file from Version 1 of the SDK and the
   ``aws.phar`` file containing Version 2 of the SDK:

   .. code-block:: php

        // Include each of the SDK's bootstrap files to setup autoloading
        require '/path/to/sdk.class.php'; // Load the Version 1 bootstrap file
        require '/path/to/aws.phar';      // Load the Version 2 pre-packaged phar file

Configuring and Instantiating the SDKs
--------------------------------------

How you configure and instantiate the SDKs is determined by whether or not you are using the service builder
(``Aws\Common\Aws`` class).

Instantiating Clients via the Service Builder
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The service builder (``Aws\Common\Aws class``) in the AWS SDK for PHP enables configuring all service clients with the
same credentials. It also accepts additional settings for some or all of the clients. The service builder functionality
is inherited from the `Guzzle <http://guzzlephp.org>`_ project.

You can pass the service builder a configuration file containing your credentials and other settings. It will then
inject these into all of the service clients your code instantiates. For more information about the configuration file,
please read the :doc:`configuration` section of the guide. When using both SDKs side-by-side, your configuration file
must include the following line:

.. code-block:: php

    'includes' => array('_sdk1'),

This will automatically set up the service clients from Version 1 of the SDK making them accessible through the service
builder by keys such as ``v1.s3`` and ``v1.cloudformation``. Here is an example configuration file that includes
referencing the Version 1 of the SDK:

.. code-block:: php

    <?php return array(
        'includes' => array('_sdk1'),
        'services' => array(
            'default_settings' => array(
                'params' => array(
                    'key'    => 'your-aws-access-key-id',
                    'secret' => 'your-aws-secret-access-key',
                    'region' => 'us-west-2'
                )
            )
        )
    );

Your code must instantiate the service builder through its factory method by passing in the path of the configuration
file. Your code then retrieves instances of the specific service clients from the returned builder object.

.. code-block:: php

    use Aws\Common\Aws;

    // Instantiate the service builder
    $aws = Aws::factory('/path/to/your/config.php');

    // Instantiate S3 clients via the service builder
    $s3v1 = $aws->get('v1.s3');  // All Version 1 clients are prefixed with "v1."
    $s3v2 = $aws->get('s3');

Instantiating Clients via Client Factories
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Your code can instantiate service clients using their respective ``factory()`` methods by passing in an array of
configuration data, including your credentials. The ``factory()`` will work for clients in either versions of the SDK.

.. code-block:: php

    use Aws\S3\S3Client;

    // Create an array of configuration options
    $config = array(
        'key'    => 'your-aws-access-key-id',
        'secret' => 'your-aws-secret-access-key',
    );

    // Instantiate Amazon S3 clients from both SDKs via their factory methods
    $s3v1 = AmazonS3::factory($config);
    $s3v2 = S3Client::factory($config);

Optionally, you could alias the classes to make it clearer which version of the SDK they are from.

.. code-block:: php

    use AmazonS3 as S3ClientV1;
    use Aws\S3\S3Client as S3ClientV2;

    $config = array(
        'key'    => 'your-aws-access-key-id',
        'secret' => 'your-aws-secret-access-key',
    );

    $s3v1 = S3ClientV1::factory($config);
    $s3v2 = S3ClientV2::factory($config);

Complete Examples
-----------------

The following two examples fully demonstrate including, configuring, instantiating, and using both SDKs side-by-side.
These examples adopt the recommended practices of using Composer and the service builder.

Example 1 - Dual Amazon S3 Clients
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

This example demonstrates using an Amazon S3 client from the AWS SDK for PHP working side-by-side with an Amazon S3
client from the first PHP SDK.

.. code-block:: php

    <?php

    require 'vendor/autoload.php';

    $aws = Aws\Common\Aws::factory('/path/to/config.json');

    $s3v1 = $aws->get('v1.s3');
    $s3v2 = $aws->get('s3');

    echo "ListBuckets with SDK Version 1:\n";
    echo "-------------------------------\n";
    $response = $s3v1->listBuckets();
    if ($response->isOK()) {
        foreach ($response->body->Buckets->Bucket as $bucket) {
            echo "- {$bucket->Name}\n";
        }
    } else {
        echo "Request failed.\n";
    }
    echo "\n";

    echo "ListBuckets with SDK Version 2:\n";
    echo "-------------------------------\n";
    try {
        $result = $s3v2->listBuckets();
        foreach ($result['Buckets'] as $bucket) {
            echo "- {$bucket['Name']}\n";
        }
    } catch (Aws\S3\Exception\S3Exception $e) {
        echo "Request failed.\n";
    }
    echo "\n";

Example 2 - Amazon DynamoDB and Amazon SNS Clients
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

This example shows how the AWS SDK for PHP DynamoDB client works together with the SNS client from the original SDK.
For this example, an ice cream parlor publishes a daily message (via SNS) containing its "flavors of the day" to
subscribers. First, it retrieves the flavors of the day from its DynamoDB database using the AWS SDK for PHP DynamoDB
client. It then uses the SNS client from the first SDK to publish a message to its SNS topic.

.. code-block:: php

    <?php

    require 'vendor/autoload.php';

    $aws = Aws\Common\Aws::factory('/path/to/config.php');

    // Instantiate the clients
    $ddb = $aws->get('dynamodb');
    $sns = $aws->get('v1.sns');
    $sns->set_region(AmazonSNS::REGION_US_W2);

    // Get today's flavors from DynamoDB using Version 2 of the SDK
    $date = new DateTime();
    $flavors = $ddb->getItem(array(
        'TableName' => 'flavors-of-the-day',
        'Key' => array(
            'HashKeyElement'  => array('N' => $date->format('n')),
            'RangeKeyElement' => array('N' => $date->format('j'))
        )
    ))->getResult()->getPath('Item/flavors/SS');

    // Generate the message
    $today = $date->format('l, F jS');
    $message = "It's {$today}, and here are our flavors of the day:\n";
    foreach ($flavors as $flavor) {
        $message .= "- {$flavor}\n";
    }
    $message .= "\nCome visit Mr. Foo\'s Ice Cream Parlor on 5th and Pine!\n";
    echo "{$message}\n";

    // Send today's flavors to subscribers using Version 1 of the SDK
    $response = $sns->publish('flavors-of-the-day-sns-topic', $message, array(
        'Subject' => 'Flavors of the Day - Mr. Foo\'s Ice Cream Parlor'
    ));
    if ($response->isOK()) {
        echo "Sent the flavors of the day to your subscribers.\n";
    } else {
        echo "There was an error sending the flavors of the day to your subscribers.\n";
    }

Final Notes
-----------

Remember that **instantiating clients from the original SDK using the service builder from AWS SDK for PHP does not
change how those clients work**. For example, notice the differences in response handling between SDK versions. For a
full list of differences between the versions, please see the :doc:`migration-guide`.

For more information about using the original version of the SDK, please see the `Version 1 API Documentation
<http://docs.aws.amazon.com/AWSSDKforPHP/latest/>`_ and the `Version 1 SDK README
<https://github.com/amazonwebservices/aws-sdk-for-php/blob/master/README.md>`_.
