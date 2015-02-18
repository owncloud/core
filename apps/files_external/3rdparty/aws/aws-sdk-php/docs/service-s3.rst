.. service:: S3

Creating a bucket
-----------------

Now that we've created a client object, let's create a bucket. This bucket will be used throughout the remainder of this
guide.

.. example:: S3/Integration/S3_20060301_Test.php testBucketAlreadyExists

If you run the above code example unaltered, you'll probably trigger the following exception::

    PHP Fatal error:  Uncaught Aws\S3\Exception\BucketAlreadyExistsException: AWS Error
    Code: BucketAlreadyExists, Status Code: 409, AWS Request ID: D94E6394791E98A4,
    AWS Error Type: client, AWS Error Message: The requested bucket name is not
    available. The bucket namespace is shared by all users of the system. Please select
    a different name and try again.

This is because bucket names in Amazon S3 reside in a global namespace. You'll need to change the actual name of the
bucket used in the examples of this tutorial in order for them to work correctly.

Creating a bucket in another region
-----------------------------------

The above example creates a bucket in the standard us-east-1 region. You can change the bucket location by passing a
``LocationConstraint`` value.

.. example:: S3/Integration/S3_20060301_Test.php testCreateBucketInRegion

Waiting until the bucket exists
-------------------------------

Now that we've created a bucket, let's force our application to wait until the bucket exists. This can be done easily
using a *waiter*. The following snippet of code will poll the bucket until it exists or the maximum number of
polling attempts are completed.

.. example:: S3/Integration/S3_20060301_Test.php testWaitUntilBucketExists

Uploading objects
-----------------

Now that you've created a bucket, let's put some data in it. The following example creates an object in your bucket
called data.txt that contains 'Hello!'.

.. example:: S3/Integration/S3_20060301_Test.php testPutObject

The AWS SDK for PHP will attempt to automatically determine the most appropriate Content-Type header used to store the
object. If you are using a less common file extension and your Content-Type header is not added automatically, you can
add a Content-Type header by passing a ``ContentType`` option to the operation.

Uploading a file
~~~~~~~~~~~~~~~~

The above example uploaded text data to your object. You can alternatively upload the contents of a file by passing
the ``SourceFile`` option. Let's also put some metadata on the object.

.. example:: S3/Integration/S3_20060301_Test.php testPutObjectFromFile

Uploading from a stream
~~~~~~~~~~~~~~~~~~~~~~~

Alternatively, you can pass a resource returned from an ``fopen`` call to the ``Body`` parameter.

.. example:: S3/Integration/S3_20060301_Test.php testPutObjectFromStream

Because the AWS SDK for PHP is built around Guzzle, you can also pass an EntityBody object.

.. example:: S3/Integration/S3_20060301_Test.php testPutObjectFromEntityBody

Listing your buckets
--------------------

You can list all of the buckets owned by your account using the ``listBuckets`` method.

.. example:: S3/Integration/S3_20060301_Test.php testListBuckets

All service operation calls using the AWS SDK for PHP return a ``Guzzle\Service\Resource\Model`` object. This object
contains all of the data returned from the service in a normalized array like object. The object also contains a
``get()`` method used to retrieve values from the model by name, and a ``getPath()`` method that can be used to
retrieve nested values.

.. example:: S3/Integration/S3_20060301_Test.php testListBucketsWithGetPath

Listing objects in your buckets
-------------------------------

Listing objects is a lot easier in the new SDK thanks to *iterators*. You can list all of the objects in a bucket using
the ``ListObjectsIterator``.

.. example:: S3/Integration/S3_20060301_Test.php testListObjectsWithIterator

Iterators will handle sending any required subsequent requests when a response is truncated. The ListObjects iterator
works with other parameters too.

.. code-block:: php

    $iterator = $client->getIterator('ListObjects', array(
        'Bucket' => $bucket,
        'Prefix' => 'foo'
    ));

    foreach ($iterator as $object) {
        echo $object['Key'] . "\n";
    }

You can convert any iterator to an array using the ``toArray()`` method of the iterator.

.. note::

    Converting an iterator to an array will load the entire contents of the iterator into memory.

Downloading objects
-------------------

You can use the ``GetObject`` operation to download an object.

.. example:: S3/Integration/S3_20060301_Test.php testGetObject

The contents of the object are stored in the ``Body`` parameter of the model object. Other parameters are stored in
model including ``ContentType``, ``ContentLength``, ``VersionId``, ``ETag``, etc...

The ``Body`` parameter stores a reference to a ``Guzzle\Http\EntityBody`` object. The SDK will store the data in a
temporary PHP stream by default. This will work for most use-cases and will automatically protect your application from
attempting to download extremely large files into memory.

The EntityBody object has other nice features that allow you to read data using streams.

.. example:: S3/Integration/S3_20060301_Test.php testGetObjectUsingEntityBody

Saving objects to a file
~~~~~~~~~~~~~~~~~~~~~~~~

You can save the contents of an object to a file by setting the SaveAs parameter.

.. example:: S3/Integration/S3_20060301_Test.php testGetObjectWithSaveAs

Uploading large files using multipart uploads
---------------------------------------------

Amazon S3 allows you to uploads large files in pieces. The AWS SDK for PHP provides an abstraction layer that makes it
easier to upload large files using multipart upload.

.. code-block:: php

    use Aws\Common\Exception\MultipartUploadException;
    use Aws\S3\Model\MultipartUpload\UploadBuilder;

    $uploader = UploadBuilder::newInstance()
        ->setClient($client)
        ->setSource('/path/to/large/file.mov')
        ->setBucket('mybucket')
        ->setKey('my-object-key')
        ->setOption('Metadata', array('Foo' => 'Bar'))
        ->setOption('CacheControl', 'max-age=3600')
        ->build();

    // Perform the upload. Abort the upload if something goes wrong
    try {
        $uploader->upload();
        echo "Upload complete.\n";
    } catch (MultipartUploadException $e) {
        $uploader->abort();
        echo "Upload failed.\n";
    }

You can attempt to upload parts in parallel by specifying the concurrency option on the UploadBuilder object. The
following example will create a transfer object that will attempt to upload three parts in parallel until the entire
object has been uploaded.

.. code-block:: php

    $uploader = UploadBuilder::newInstance()
        ->setClient($client)
        ->setSource('/path/to/large/file.mov')
        ->setBucket('mybucket')
        ->setKey('my-object-key')
        ->setConcurrency(3)
        ->build();

You can use the ``Aws\S3\S3Client::upload()`` method if you just want to upload files and not worry if they are too
large to send in a single PutObject operation or require a multipart upload.

.. code-block:: php

    $client->upload('bucket', 'key', 'object body', 'public-read');

Setting ACLs and Access Control Policies
----------------------------------------

You can specify a canned ACL on an object when uploading:

.. code-block:: php

    $client->putObject(array(
        'Bucket'     => 'mybucket',
        'Key'        => 'data.txt',
        'SourceFile' => '/path/to/data.txt',
        'ACL'        => 'public-read'
    ));

You can specify more complex ACLs using the ``ACP`` parameter when sending PutObject, CopyObject, CreateBucket,
CreateMultipartUpload, PutBucketAcl, PutObjectAcl, and other operations that accept a canned ACL. Using the ``ACP``
parameter allows you specify more granular access control policies using a ``Aws\S3\Model\Acp`` object. The easiest
way to create an Acp object is through the ``Aws\S3\Model\AcpBuilder``.

.. code-block:: php

    use Aws\S3\Enum\Group;
    use Aws\S3\Model\AcpBuilder;

    $acp = AcpBuilder::newInstance()
        ->setOwner($myOwnerId)
        ->addGrantForEmail('READ', 'test@example.com')
        ->addGrantForUser('FULL_CONTROL', 'user-id')
        ->addGrantForGroup('READ', Group::AUTHENTICATED_USERS)
        ->build();

    $client->putObject(array(
        'Bucket'     => 'mybucket',
        'Key'        => 'data.txt',
        'SourceFile' => '/path/to/data.txt',
        'ACP'        => $acp
    ));

Creating a pre-signed URL
-------------------------

You can authenticate certain types of requests by passing the required information as query-string parameters instead
of using the Authorization HTTP header. This is useful for enabling direct third-party browser access to your private
Amazon S3 data, without proxying the request. The idea is to construct a "pre-signed" request and encode it as a URL
that an end-user's browser can retrieve. Additionally, you can limit a pre-signed request by specifying an expiration
time.

The most common scenario is creating a pre-signed URL to GET an object. The easiest way to do this is to use the
``getObjectUrl`` method of the Amazon S3 client. This same method can also be used to get an unsigned URL of a public
S3 object.

.. example:: S3/Integration/S3_20060301_Test.php testGetObjectUrl

You can also create pre-signed URLs for any Amazon S3 operation using the ``getCommand`` method for creating a Guzzle
command object and then calling the ``createPresignedUrl()`` method on the command.

.. example:: S3/Integration/S3_20060301_Test.php testCreatePresignedUrlFromCommand

If you need more flexibility in creating your pre-signed URL, then you can create a pre-signed URL for a completely
custom ``Guzzle\Http\Message\RequestInterface`` object. You can use the ``get()``, ``post()``, ``head()``, ``put()``,
and ``delete()`` methods of a client object to easily create a Guzzle request object.

.. example:: S3/Integration/S3_20060301_Test.php testCreatePresignedUrl

Amazon S3 stream wrapper
------------------------

The Amazon S3 stream wrapper allows you to store and retrieve data from Amazon S3 using built-in PHP functions like
``file_get_contents``, ``fopen``, ``copy``, ``rename``, ``unlink``, ``mkdir``, ``rmdir``, etc.

See :doc:`feature-s3-stream-wrapper`.

Syncing data with Amazon S3
---------------------------

Uploading a directory to a bucket
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Uploading a local directory to an Amazon S3 bucket is rather simple:

.. code-block:: php

    $client->uploadDirectory('/local/directory', 'my-bucket');

The ``uploadDirectory()`` method of a client will compare the contents of the local directory to the contents in the
Amazon S3 bucket and only transfer files that have changed. While iterating over the keys in the bucket and comparing
against the names of local files using a customizable filename to key converter, the changed files are added to an in
memory queue and uploaded concurrently. When the size of a file exceeds a customizable ``multipart_upload_size``
parameter, the uploader will automatically upload the file using a multipart upload.

Customizing the upload sync
^^^^^^^^^^^^^^^^^^^^^^^^^^^

The method signature of the `uploadDirectory()` method allows for the following arguments:

.. code-block:: php

    public function uploadDirectory($directory, $bucket, $keyPrefix = null, array $options = array())

By specifying ``$keyPrefix``, you can cause the uploaded objects to be placed under a virtual folder in the Amazon S3
bucket. For example, if the ``$bucket`` name is ``my-bucket`` and the ``$keyPrefix`` is 'testing/', then your files
will be uploaded to ``my-bucket`` under the ``testing/`` virtual folder:
``https://my-bucket.s3.amazonaws.com/testing/filename.txt``

The ``uploadDirectory()`` method also accepts an optional associative array of ``$options`` that can be used to further
control the transfer.

=========== ============================================================================================================
params      Array of parameters to use with each ``PutObject`` or ``CreateMultipartUpload`` operation performed during
            the transfer. For example, you can specify an ``ACL`` key to change the ACL of each uploaded object.
            See `PutObject <http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.S3.S3Client.html#_putObject>`_
            for a list of available options.
base_dir    Base directory to remove from each object key. By default, the ``$directory`` passed into the
            ``uploadDirectory()`` method will be removed from each object key.
force       Set to true to upload every file, even if the file is already in Amazon S3 and has not changed.
concurrency Maximum number of parallel uploads (defaults to 5)
debug       Set to true to enable debug mode to print information about each upload. Setting this value to an ``fopen``
            resource will write the debug output to a stream rather than to ``STDOUT``.
=========== ============================================================================================================

In the following example, a local directory is uploaded with each object stored in the bucket using a ``public-read``
ACL, 20 requests are sent in parallel, and debug information is printed to standard output as each request is
transferred.

.. code-block:: php

    $dir = '/local/directory';
    $bucket = 'my-bucket';
    $keyPrefix = '';

    $client->uploadDirectory($dir, $bucket, $keyPrefix, array(
        'params'      => array('ACL' => 'public-read'),
        'concurrency' => 20,
        'debug'       => true
    ));

More control with the UploadSyncBuilder
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

The ``uploadDirectory()`` method is an abstraction layer over the much more powerful ``Aws\S3\Sync\UploadSyncBuilder``.
You can use an ``UploadSyncBuilder`` object directly if you need more control over the transfer. Using an
``UploadSyncBuilder`` allows for the following advanced features:

* Can upload only files that match a glob expression
* Can upload only files that match a regular expression
* Can specify a custom ``\Iterator`` object to use to yield files to an ``UploadSync`` object. This can be used, for
  example, to filter out which files are transferred even further using something like the
  `Symfony 2 Finder component <http://symfony.com/doc/master/components/finder.html>`_.
* Can specify the ``Aws\S3\Sync\FilenameConverterInterface`` objects used to convert Amazon S3 object names to local
  filenames and vice versa. This can be useful if you require files to be renamed in a specific way.

.. code-block:: php

    use Aws\S3\Sync\UploadSyncBuilder;

    UploadSyncBuilder::getInstance()
        ->setClient($client)
        ->setBucket('my-bucket')
        ->setAcl('public-read')
        ->uploadFromGlob('/path/to/file/*.php')
        ->build()
        ->transfer();

Downloading a bucket to a directory
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

You can download the objects stored in an Amazon S3 bucket using features similar to the ``uploadDirectory()`` method
and the ``UploadSyncBuilder``. You can download the entire contents of a bucket using the
``Aws\S3\S3Client::downloadBucket()`` method.

The following example will download all of the objects from ``my-bucket`` and store them in ``/local/directory``.
Object keys that are under virtual subfolders are converted into a nested directory structure when downloading the
objects. Any directories missing on the local filesystem will be created automatically.

.. code-block:: php

    $client->downloadBucket('/local/directory', 'my-bucket');

Customizing the download sync
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

The method signature of the ``downloadBucket()`` method allows for the following arguments:

.. code-block:: php

    public function downloadBucket($directory, $bucket, $keyPrefix = null, array $options = array())

By specifying ``$keyPrefix``, you can limit the downloaded objects to only keys that begin with the specified
``$keyPrefix``. This, for example, can be useful for downloading objects under a specific virtual directory.

The ``downloadBucket()`` method also accepts an optional associative array of ``$options`` that can be used to further
control the transfer.

=============== ============================================================================================================
params          Array of parameters to use with each ``GetObject`` operation performed during the transfer. See
                `GetObject <http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.S3.S3Client.html#_getObject>`_
                for a list of available options.
base_dir        Base directory to remove from each object key when downloading. By default, the entire object key is
                used to determine the path to the file on the local filesystem.
force           Set to true to download every file, even if the file is already on the local filesystem and has not
                changed.
concurrency     Maximum number of parallel downloads (defaults to 10)
debug           Set to true to enable debug mode to print information about each download. Setting this value to an
                ``fopen`` resource will write the debug output to a stream rather than to ``STDOUT``.
allow_resumable Set to true to allow previously interrupted downloads to be resumed using a Range GET
=============== ============================================================================================================

More control with the DownloadSyncBuilder
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

The ``downloadBucket()`` method is an abstraction layer over the much more powerful
``Aws\S3\Sync\DownloadSyncBuilder``. You can use a ``DownloadSyncBuilder`` object directly if you need more control
over the transfer. Using the ``DownloadSyncBuilder`` allows for the following advanced features:

* Can download only files that match a regular expression
* Just like the ``UploadSyncBuilder``, you can specify a custom ``\Iterator`` object to use to yield files to a
  ``DownloadSync`` object.
* Can specify the ``Aws\S3\Sync\FilenameConverterInterface`` objects used to convert Amazon S3 object names to local
  filenames and vice versa.

.. code-block:: php

    use Aws\S3\Sync\DownloadSyncBuilder;

    DownloadSyncBuilder::getInstance()
        ->setClient($client)
        ->setDirectory('/path/to/directory')
        ->setBucket('my-bucket')
        ->setKeyPrefix('/under-prefix')
        ->allowResumableDownloads()
        ->build()
        ->transfer();

Cleaning up
-----------

Now that we've taken a tour of how you can use the Amazon S3 client, let's clean up any resources we may have created.

.. example:: S3/Integration/S3_20060301_Test.php testCleanUpBucket

.. apiref:: S3

