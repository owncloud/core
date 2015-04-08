.. service:: Redshift

Creating a cluster
------------------

The primary resource in Amazon Redshift is the cluster. To create a cluster you will use the ``CreateCluster``
operation. There are several parameters you can send when creating a cluster, so please refer to the API docs to
determine which parameters to use. The following is basic example.

.. code-block:: php

    $client->createCluster(array(
        'ClusterIdentifier'  => 'your-unique-cluster-id',
        'ClusterType'        => 'multi-node',
        'MasterUsername'     => 'yourusername',
        'MasterUserPassword' => 'Y0urP@$$w0rd',
        'NodeType'           => 'dw.hs1.xlarge',
        'NumberOfNodes'      => 2,
    ));

After the ``CreateCluster`` operation is complete, the record for your cluster will exist, but it will still take some
time before the cluster is actually available for use. You can describe your cluster to check it's status.

.. code-block:: php

    $result = $client->describeClusters(array(
        'ClusterIdentifier' => 'your-unique-cluster-id',
    ));
    $clusters = $result->get('Clusters');
    $status = $clusters['ClusterStatus'];

If you would like your code to wait until the cluster is available, you can use the the ``ClusterAvailable`` waiter.

.. code-block:: php

    $client->waitUntil('ClusterAvailable', array(
        'ClusterIdentifier' => 'your-unique-cluster-id',
    ));

.. warning:: It can take over 20 minutes for a cluster to become available.

Creating snapshots
------------------

You can also take snapshots of your cluster with the ``CreateClusterSnapshot`` operation. Snapshots can take a little
time before they become available as well, so there is a corresponding ``SnapshotAvailable`` waiter.

.. code-block:: php

    $client->createClusterSnapshot(array(
        'ClusterIdentifier'  => 'your-unique-cluster-id',
        'SnapshotIdentifier' => 'your-unique-snapshot-id',
    ));
    $client->waitUntil('SnapshotAvailable', array(
        'SnapshotIdentifier' => 'your-unique-snapshot-id',
    ));

Events
------

Amazon Redshift records events that take place with your clusters and account. These events are available for up to 14
days and can be retrieved via the ``DescribeEvents`` operation. Only 100 events can be returned at a time, so using the
SDK's iterators feature allows you to easily fetch and iterate over all the events in your query without having to
manually send repeated requests. The ``StartTime`` and ``EndTime`` parameters can take any PHP date string or DateTime
object.

.. code-block:: php

    $events = $client->getIterator('DescribeEvents', array(
        'StartTime'  => strtotime('-3 days'),
        'EndTime'    => strtotime('now'),
    ));

    foreach ($events as $event) {
        echo "{$event['Date']}: {$event['Message']}\n";
    }

.. apiref:: Redshift
