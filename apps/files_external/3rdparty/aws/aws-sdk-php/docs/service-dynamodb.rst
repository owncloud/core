.. service:: DynamoDb

Creating tables
---------------

You must first create a table that can be used to store items. Even though Amazon DynamoDB tables do not use a fixed
schema, you do need to create a schema for the table's keys. This is explained in greater detail in Amazon DynamoDB's
`Data Model documentation <http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/DataModel.html>`_. You
will also need to specify the amount of `provisioned throughput
<http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/ProvisionedThroughputIntro.html>`_ that should
be made available to the table.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testCreateTable

The table will now have a status of ``CREATING`` while the table is being provisioned. You can use a waiter to poll the
table until it becomes ``ACTIVE``.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testWaitUntilTableExists

A full list of the parameters available to the ``createTable()`` operation can be found in the `API documentation
<http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DynamoDb.DynamoDbClient.html#_createTable>`_. For more
information about using Local Secondary Indexes, please see the :ref:`dynamodb-lsi` section of this guide.

Updating a table
----------------

You can also update the table after it's been created using the `updateTable() <http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DynamoDb.DynamoDbClient.html#_updateTable>`_ method. This allows you to do things
like increase or decrease your provisioned throughput capacity.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testUpdateTable

Describing a table
------------------

Now that the table is created, you can use the
`describeTable() <http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DynamoDb.DynamoDbClient.html#_describeTable>`_
method to get information about the table.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testDescribeTable

The return value of the ``describeTable()`` method is a ``Guzzle\Service\Resource\Model`` object that can be used like
an array. For example, you could retrieve the number of items in a table or the amount of provisioned read throughput.

Listing tables
--------------

You can retrieve a list of all of the tables associated with a specific endpoint using the
`listTables() <http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DynamoDb.DynamoDbClient.html#_listTables>`_
method. Each Amazon DynamoDB endpoint is entirely independent. For example, if you have two tables called "MyTable," one
in US-EAST-1 and one in US-WEST-2, they are completely independent and do not share any data. The ListTables operation
returns all of the table names associated with the account making the request, for the endpoint that receives the
request.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testListTables

Iterating over all tables
~~~~~~~~~~~~~~~~~~~~~~~~~

The result of a ``listTables()`` operation might be truncated. Because of this, it is usually better to use an iterator
to retrieve a complete list of all of the tables owned by your account in a specific region. The iterator will
automatically handle sending any necessary subsequent requests.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testListTablesWithIterator

.. tip::

    You can convert an iterator to an array using the ``toArray()`` method of the iterator.

Adding items
------------

You can add an item to our *errors* table using the
`putItem() <http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DynamoDb.DynamoDbClient.html#_putItem>`_
method of the client.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testAddItemWithoutHelperMethod

You can also add items in batches of up to 25 items using the `BatchWriteItem()
<http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DynamoDb.DynamoDbClient.html#_batchWriteItem>`_
method. Please see the example as shown in the :ref:`dynamodb-lsi` section of this guide.

There is also a higher-level abstraction in the SDK over the ``BatchWriteItem`` operation called the
``WriteRequestBatch`` that handles queuing of write requests and retrying of unprocessed items. Please see the
:ref:`dynamodb-wrb` section of this guide for more information.

Retrieving items
----------------

You can check if the item was added correctly using the
`getItem() <http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DynamoDb.DynamoDbClient.html#_getItem>`_
method of the client. Because Amazon DynamoDB works under an 'eventual consistency' model, we need to specify that we
are performing a `consistent read
<http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/APISummary.html#DataReadConsistency>`_ operation.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testGetItem

You can also retrieve items in batches of up to 100 using the `BatchGetItem()
<http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DynamoDb.DynamoDbClient.html#_batchGetItem>`_ method.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testBatchGetItem

Query and scan
--------------

Once data is in an Amazon DynamoDB table, you have two APIs for searching the data:
`Query and Scan <http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/QueryAndScan.html>`_.

Query
~~~~~

A query operation searches only primary key attribute values and supports a subset of comparison operators on key
attribute values to refine the search process. A query returns all of the item data for the matching primary keys
(all of each item's attributes) up to 1MB of data per query operation.

Let's say we want a list of all "1201" errors that occurred in the last 15 minutes. We could issue a single query
that will search by the primary key of the table and retrieve up to 1MB of the items. However, a better approach is to
use the query iterator to retrieve the entire list of all items matching the query.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testQuery

Scan
~~~~

A scan operation scans the entire table. You can specify filters to apply to the results to refine the values
returned to you, after the complete scan. Amazon DynamoDB puts a 1MB limit on the scan (the limit applies before
the results are filtered).

A scan can be useful for more complex searches. For example, we can retrieve all of the errors in the last 15
minutes that contain the word "overflow":

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testScan

Deleting items
--------------

To delete an item you must use the `DeleteItem()
<http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DynamoDb.DynamoDbClient.html#_batchGetItem>`_ method.
The following example scans through a table and deletes every item one by one.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testDeleteItem

You can also delete items in batches of up to 25 items using the `BatchWriteItem()
<http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DynamoDb.DynamoDbClient.html#_batchWriteItem>`_ method.

Deleting a table
----------------

.. warning::

    Deleting a table will also permanently delete all of its contents.

Now that you've taken a quick tour of the PHP client for Amazon DynamoDB, you will want to clean up by deleting the
resources you created.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testDeleteTable

.. _dynamodb-lsi:

Local secondary indexes
-----------------------

Local secondary indexes (LSI) pair your table's leading hash key with an alternate range key, in order to enable
specific queries to run more quickly than they would using a standard composite primary key. The following code samples
will show how to create an *Orders* table with a hash key of *CustomerId* and a range key of *OrderId*, but also include
a local secondary index on the *OrderDate* attribute so that searching the table based by *OrderDate* can be done with a
``Query`` operation instead of a ``Scan`` operation.

First you must create the table with the local secondary index. Note that the attributes referenced in the key schema
for the table *and* the index must all be declared in the ``AttributeDefinitions`` parameter. When you create a local
secondary index, you can specify which attributes get "projected" into the index using the ``Projection`` parameter.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testCreateTableWithLocalSecondaryIndexes

Next you must add some items to the table that you will be querying. There's nothing in the ``BatchWriteItem`` operation
that is specific to the LSI features, but since there is not an example of this operation elsewhere in the guide, this
seems like a good place to show how to use this operation.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testBatchWriteItem

When you query the table with an LSI, you must specify the name of the index using the ``IndexName`` parameter. The
attributes that are returned will depend on the value of the ``Select`` parameter and on what the table is projecting
to the index. In this case ``'Select' => 'COUNT'`` has been specified, so only the count of the items will be returned.

.. example:: DynamoDb/Integration/DynamoDb_20120810_Test.php testQueryWithLocalSecondaryIndexes

.. _dynamodb-wrb:

Using the WriteRequestBatch
---------------------------

You can use the ``WriteRequestBatch`` if you need to write or delete many items as quickly as possible. The
WriteRequestBatch provides a high level of performance because it converts what would normally be a separate HTTP
request for each operation into HTTP requests containing up to 25 comparable requests per transaction.

If you have a large array of items you wish to add to your table, you could iterate over the them, add each item to the
batch object. After all the items are added call ``flush()``. The batch object will automatically flush the batch and
write items to Amazon DynamoDB after hitting a customizable threshold. A final call to the batch object's ``flush()``
method is necessary to transfer any remaining items in the queue.

.. example:: DynamoDb/Integration/WriteRequestBatch_20120810_Test.php testWriteRequestBatchForPuts

You can also use the ``WriteRequestBatch`` object to delete items in batches.

.. example:: DynamoDb/Integration/WriteRequestBatch_20120810_Test.php testWriteRequestBatchForDeletes

The ``WriteRequestBatch``, ``PutRequest``, and ``DeleteRequest`` classes are all a part of the
``Aws\DynamoDb\Model\BatchRequest`` namespace.

.. apiref:: DynamoDb

