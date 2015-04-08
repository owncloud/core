=====================
Static Client Facades
=====================

Introduction
------------

Version 2.4 of the AWS SDK for PHP adds the ability to enable and use static client "facades". These facades provide an
easy, static interface to service clients available in the service builder. For example, when working with a normal
client instance, you might have code that looks like the following:

.. code-block:: php

    // Get the configured S3 client from the service builder
    $s3 = $aws->get('s3');

    // Execute the CreateBucket command using the S3 client
    $s3->createBucket(array('Bucket' => 'your_new_bucket_name'));

With client facades enabled, this can also be accomplished with the following code:

.. code-block:: php

    // Execute the CreateBucket command using the S3 client
    S3::createBucket(array('Bucket' => 'your_new_bucket_name'));

Why Use Client Facades?
-----------------------

The use of static client facades is completely optional. We have included this feature in the SDK in order to appeal to
PHP developers who prefer static notation or who are familiar with PHP frameworks like Code Ignitor, Laravel, or Kohana
where this style of method invocation is common.

Though using static client facades has little real benefit over using client instances, it can make your code more
concise and prevent your from having to inject the service builder or client instance into the context of where you
need the client object. This can make your code easier to write and understand. Whether or not you should use the client
facades is purely a matter of preference.

The way in which client facades work in the AWS SDK for PHP is similar to how `facades work in the Laravel 4
Framework <http://laravel.com/docs/facades>`_. Even though you are calling static classes, all of the method calls are
proxied to method calls on actual client instances — the ones stored in the service builder. This means that the usage
of the clients via the client facades can still be mocked in your unit tests, which removes one of the general
disadvantages to using static classes in object-oriented programming. For information about how to test code that uses
client facades, please see the **Testing Code that Uses Client Facades**
below.

Enabling and Using Client Facades
---------------------------------

To enable static client facades to be used in your application, you must use the ``Aws\Common\Aws::enableFacades``
method when you setup the service builder.

.. code-block:: php

    // Include the Composer autoloader
    require 'vendor/autoload.php';

    // Instantiate the SDK service builder with my config and enable facades
    $aws = Aws::factory('/path/to/my_config.php')->enableFacades();

This will setup the client facades and alias them into the global namespace. After that, you can use them anywhere to
have more simple and expressive code for interacting with AWS services.

.. code-block:: php

    // List current buckets
    echo "Current Buckets:\n";
    foreach (S3::getListBucketsIterator() as $bucket) {
        echo "{$bucket['Name']}\n";
    }

    $args = array('Bucket' => 'your_new_bucket_name');
    $file = '/path/to/the/file/to/upload.jpg';

    // Create a new bucket and wait until it is available for uploads
    S3::createBucket($args) and S3::waitUntilBucketExists($args);
    echo "\nCreated a new bucket: {$args['Bucket']}.\n";

    // Upload a file to the new bucket
    $result = S3::putObject($args + array(
        'Key'  => basename($file),
        'Body' => fopen($file, 'r'),
    ));
    echo "\nCreated a new object: {$result['ObjectURL']}\n";

You can also mount the facades into a namespace other than the global namespace. For example, if you wanted to make the
client facades available in the "Services" namespace, then you could do the following:

.. code-block:: php

    Aws::factory('/path/to/my_config.php')->enableFacades('Services');

    $result = Services\DynamoDb::listTables();

The client facades that are available are determined by what is in your service builder configuration (see
:doc:`configuration`). If you are extending the SDK's default configuration file or not providing one at all, then all
of the clients should be accessible from the service builder instance and client facades (once enabled) by default.

Based on the following excerpt from the default configuration file (located at
``src/Aws/Common/Resources/aws-config.php``):

.. code-block:: php

    's3' => array(
        'alias'   => 'S3',
        'extends' => 'default_settings',
        'class'   => 'Aws\S3\S3Client'
    ),

The ``'class'`` key indicates the client class that the static client facade will proxy to, and the ``'alias'`` key
indicates what the client facade will be named. Only entries in the service builder config that have both the
``'alias'`` and ``'class'`` keys specified will be mounted as static client facades. You can potentially update or add
to your service builder config to alter or create new or custom client facades.

Testing Code that Uses Client Facades
-------------------------------------

With the static client facades in the SDK, even though you are calling static classes, all of the method calls are
proxied to method calls on actual client instances — the ones stored in the service builder. This means that they can
be mocked during tests, which removes one of the general disadvantages to using static classes in object-oriented
programming.

To mock a client facade for a test, you can explicitly set a mocked client object for the key in the service builder
that would normally contain the client referenced by the client facade. Here is a complete, but contrived, PHPUnit test
showing how this is done:

.. code-block:: php

    <?php

    use Aws\Common\Aws;
    use Guzzle\Service\Resource\Model;
    use YourApp\Things\FileBrowser;

    class SomeKindOfFileBrowserTest extends PHPUnit_Framework_TestCase
    {
        private $serviceBuilder;

        public function setUp()
        {
            $this->serviceBuilder = Aws::factory();
            $this->serviceBuilder->enableFacades();
        }

        public function testCanDoSomethingWithYourAppsFileBrowserClass()
        {
            // Mock the ListBuckets method of S3 client
            $mockS3Client = $this->getMockBuilder('Aws\S3\S3Client')
                ->disableOriginalConstructor()
                ->getMock();
            $mockS3Client->expects($this->any())
                ->method('listBuckets')
                ->will($this->returnValue(new Model(array(
                    'Buckets' => array(
                        array('Name' => 'foo'),
                        array('Name' => 'bar'),
                        array('Name' => 'baz')
                    )
                ))));
            $this->serviceBuilder->set('s3', $mockS3Client);

            // Test the FileBrowser object that uses the S3 client facade internally
            $fileBrowser = new FileBrowser();
            $partitions = $fileBrowser->getPartitions();
            $this->assertEquals(array('foo', 'bar', 'baz'), $partitions);
        }
    }

Alternatively, if you are specifically only mocking responses from clients, you might consider using the `Guzzle Mock
Plugin <http://guzzlephp.org/plugins/mock-plugin.html>`_.
