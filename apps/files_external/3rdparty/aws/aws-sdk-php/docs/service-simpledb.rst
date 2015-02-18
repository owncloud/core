.. service:: SimpleDb

Creating domains
----------------

The first step in storing data within Amazon SimpleDB is to
`create one or more domains <http://docs.aws.amazon.com/AmazonSimpleDB/latest/GettingStartedGuide/CreatingADomain.html>`_.

Domains are similar to database tables, except that you cannot perform functions across multiple domains, such as
querying multiple domains or using foreign keys. As a consequence, you should plan an Amazon SimpleDB data
architecture that will meet the needs of your project.

Let's use the CreateDomain operation of the |serviceFullName| client to create a domain.

.. code-block:: php

    $client->createDomain(array('DomainName' => 'mydomain'));

List all domains
----------------

Now that the domain is created, we can list the domains in our account to verify that it exists. This is done using the
ListDomains operation and the ListDomains iterator.

.. code-block:: php

    $domains = $client->getIterator('ListDomains')->toArray();
    var_export($domains);
    // Lists an array of domain names, including "mydomain"

Retrieving a domain
-------------------

You can get more information about a domain using the DomainMetadata operation. This operation returns information about
a domain, including when the domain was created, the number of items and attributes, and the size of attribute names
and values.

.. code-block:: php

    $result = $client->domainMetadata(array('DomainName' => 'mydomain'));
    echo $result['ItemCount'] . "\n";
    echo $result['ItemNamesSizeBytes'] . "\n";
    echo $result['AttributeNameCount'] . "\n";
    echo $result['AttributeNamesSizeBytes'] . "\n";
    echo $result['AttributeValueCount'] . "\n";
    echo $result['AttributeValuesSizeBytes'] . "\n";
    echo $result['Timestamp'] . "\n";

Adding items
------------

After creating a domain, you are ready to start putting data into it. Domains consist of items, which are described by
attribute name-value pairs. Items are added to a domain using the PutAttributes operation.

.. code-block:: php

    $client->putAttributes(array(
        'DomainName' => 'mydomain',
        'ItemName'   => 'test',
        'Attributes' => array(
            array('Name' => 'a', 'Value' => 1, 'Replace' => true),
            array('Name' => 'b', 'Value' => 2),
        )
    ));

.. note::

    When you put attributes, notice that the Replace parameter is optional, and set to false by default. If you do not
    explicitly set Replace to true, a new attribute name-value pair is created each time; even if the Name value
    already exists in your Amazon SimpleDB domain.

Retrieving items
----------------

GetAttributes
~~~~~~~~~~~~~

We can check to see if the item was added correctly by retrieving the specific item by name using the GetAttribute
operation.

.. code-block:: php

    $result = $client->getAttributes(array(
        'DomainName' => 'mydomain',
        'ItemName'   => 'test',
        'Attributes' => array(
            'a', 'b'
        ),
        'ConsistentRead' => true
    ));

Notice that we set the `ConsistentRead` option to `true`. Amazon SimpleDB keeps multiple copies of each domain. A
successful write (using PutAttributes, BatchPutAttributes, DeleteAttributes, BatchDeleteAttributes, CreateDomain, or
DeleteDomain) guarantees that all copies of the domain will durably persist. Amazon SimpleDB supports two read
consistency options: eventually consistent read and consistent read. A consistent read (using Select or GetAttributes
with ConsistentRead=true) returns a result that reflects all writes that received a successful response prior to the
read.

You can find out more about consistency and |serviceFullName| in the service's
`developer guide on consistency <http://docs.aws.amazon.com/AmazonSimpleDB/latest/DeveloperGuide/ConsistencySummary.html>`_.

Select
~~~~~~

You can retrieve attributes for items by name, but |serviceFullName| also supports the Select operation. The Select
operation returns a set of Attributes for ItemNames that match the select expression. Select is similar to the standard
SQL SELECT statement.

Let's write a select query that will return all items withe the `a` attribute set to `1`.

.. code-block:: php

    $result = $client->select(array(
        'SelectExpression' => "select * from mydomain where a = '1'"
    ));
    foreach ($result['Items'] as $item) {
        echo $item['Name'] . "\n";
        var_export($item['Attributes']);
    }

Because some responses will be truncated and require subsequent requests, it is recommended to always use the
Select iterator to easily retrieve an entire result set.

.. code-block:: php

    $iterator = $client->getIterator('Select', array(
        'SelectExpression' => "select * from mydomain where a = '1'"
    ));
    foreach ($iterator as $item) {
        echo $item['Name'] . "\n";
        var_export($item['Attributes']);
    }

You can find much more information about the Select operation in the service's
`developer guide on select <http://docs.aws.amazon.com/AmazonSimpleDB/latest/DeveloperGuide/UsingSelect.html>`_.

Deleting items
--------------

You can delete specific attributes of an item or an entire item using the DeleteAttributes operation. If all attributes
of an item are deleted, the item is deleted.

Let's go ahead and delete the item we created in `mydomain`.

.. code-block:: php

    $client->deleteAttributes(array(
        'DomainName' => 'mydomain',
        'ItemName'   => 'test'
    ));

Because we did not specify an `Attributes` parameter, the entire item is deleted.

Deleting domains
----------------

Now that we've explored some of the features of |serviceFullName|, we should delete our testing data.  The
DeleteDomain operation deletes a domain. Any items (and their attributes) in the domain are deleted as well. The
DeleteDomain operation might take 10 or more seconds to complete.

.. code-block:: php

    $client->deleteDomain(array('DomainName' => 'mydomain'));

.. apiref:: SimpleDb
