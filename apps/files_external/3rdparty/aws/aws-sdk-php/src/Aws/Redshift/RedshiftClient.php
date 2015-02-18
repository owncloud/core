<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Redshift;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Redshift
 *
 * @method Model authorizeClusterSecurityGroupIngress(array $args = array()) {@command Redshift AuthorizeClusterSecurityGroupIngress}
 * @method Model authorizeSnapshotAccess(array $args = array()) {@command Redshift AuthorizeSnapshotAccess}
 * @method Model copyClusterSnapshot(array $args = array()) {@command Redshift CopyClusterSnapshot}
 * @method Model createCluster(array $args = array()) {@command Redshift CreateCluster}
 * @method Model createClusterParameterGroup(array $args = array()) {@command Redshift CreateClusterParameterGroup}
 * @method Model createClusterSecurityGroup(array $args = array()) {@command Redshift CreateClusterSecurityGroup}
 * @method Model createClusterSnapshot(array $args = array()) {@command Redshift CreateClusterSnapshot}
 * @method Model createClusterSubnetGroup(array $args = array()) {@command Redshift CreateClusterSubnetGroup}
 * @method Model createEventSubscription(array $args = array()) {@command Redshift CreateEventSubscription}
 * @method Model createHsmClientCertificate(array $args = array()) {@command Redshift CreateHsmClientCertificate}
 * @method Model createHsmConfiguration(array $args = array()) {@command Redshift CreateHsmConfiguration}
 * @method Model deleteCluster(array $args = array()) {@command Redshift DeleteCluster}
 * @method Model deleteClusterParameterGroup(array $args = array()) {@command Redshift DeleteClusterParameterGroup}
 * @method Model deleteClusterSecurityGroup(array $args = array()) {@command Redshift DeleteClusterSecurityGroup}
 * @method Model deleteClusterSnapshot(array $args = array()) {@command Redshift DeleteClusterSnapshot}
 * @method Model deleteClusterSubnetGroup(array $args = array()) {@command Redshift DeleteClusterSubnetGroup}
 * @method Model deleteEventSubscription(array $args = array()) {@command Redshift DeleteEventSubscription}
 * @method Model deleteHsmClientCertificate(array $args = array()) {@command Redshift DeleteHsmClientCertificate}
 * @method Model deleteHsmConfiguration(array $args = array()) {@command Redshift DeleteHsmConfiguration}
 * @method Model describeClusterParameterGroups(array $args = array()) {@command Redshift DescribeClusterParameterGroups}
 * @method Model describeClusterParameters(array $args = array()) {@command Redshift DescribeClusterParameters}
 * @method Model describeClusterSecurityGroups(array $args = array()) {@command Redshift DescribeClusterSecurityGroups}
 * @method Model describeClusterSnapshots(array $args = array()) {@command Redshift DescribeClusterSnapshots}
 * @method Model describeClusterSubnetGroups(array $args = array()) {@command Redshift DescribeClusterSubnetGroups}
 * @method Model describeClusterVersions(array $args = array()) {@command Redshift DescribeClusterVersions}
 * @method Model describeClusters(array $args = array()) {@command Redshift DescribeClusters}
 * @method Model describeDefaultClusterParameters(array $args = array()) {@command Redshift DescribeDefaultClusterParameters}
 * @method Model describeEventCategories(array $args = array()) {@command Redshift DescribeEventCategories}
 * @method Model describeEventSubscriptions(array $args = array()) {@command Redshift DescribeEventSubscriptions}
 * @method Model describeEvents(array $args = array()) {@command Redshift DescribeEvents}
 * @method Model describeHsmClientCertificates(array $args = array()) {@command Redshift DescribeHsmClientCertificates}
 * @method Model describeHsmConfigurations(array $args = array()) {@command Redshift DescribeHsmConfigurations}
 * @method Model describeLoggingStatus(array $args = array()) {@command Redshift DescribeLoggingStatus}
 * @method Model describeOrderableClusterOptions(array $args = array()) {@command Redshift DescribeOrderableClusterOptions}
 * @method Model describeReservedNodeOfferings(array $args = array()) {@command Redshift DescribeReservedNodeOfferings}
 * @method Model describeReservedNodes(array $args = array()) {@command Redshift DescribeReservedNodes}
 * @method Model describeResize(array $args = array()) {@command Redshift DescribeResize}
 * @method Model disableLogging(array $args = array()) {@command Redshift DisableLogging}
 * @method Model disableSnapshotCopy(array $args = array()) {@command Redshift DisableSnapshotCopy}
 * @method Model enableLogging(array $args = array()) {@command Redshift EnableLogging}
 * @method Model enableSnapshotCopy(array $args = array()) {@command Redshift EnableSnapshotCopy}
 * @method Model modifyCluster(array $args = array()) {@command Redshift ModifyCluster}
 * @method Model modifyClusterParameterGroup(array $args = array()) {@command Redshift ModifyClusterParameterGroup}
 * @method Model modifyClusterSubnetGroup(array $args = array()) {@command Redshift ModifyClusterSubnetGroup}
 * @method Model modifyEventSubscription(array $args = array()) {@command Redshift ModifyEventSubscription}
 * @method Model modifySnapshotCopyRetentionPeriod(array $args = array()) {@command Redshift ModifySnapshotCopyRetentionPeriod}
 * @method Model purchaseReservedNodeOffering(array $args = array()) {@command Redshift PurchaseReservedNodeOffering}
 * @method Model rebootCluster(array $args = array()) {@command Redshift RebootCluster}
 * @method Model resetClusterParameterGroup(array $args = array()) {@command Redshift ResetClusterParameterGroup}
 * @method Model restoreFromClusterSnapshot(array $args = array()) {@command Redshift RestoreFromClusterSnapshot}
 * @method Model revokeClusterSecurityGroupIngress(array $args = array()) {@command Redshift RevokeClusterSecurityGroupIngress}
 * @method Model revokeSnapshotAccess(array $args = array()) {@command Redshift RevokeSnapshotAccess}
 * @method Model rotateEncryptionKey(array $args = array()) {@command Redshift RotateEncryptionKey}
 * @method waitUntilClusterAvailable(array $input) The input array uses the parameters of the DescribeClusters operation and waiter specific settings
 * @method waitUntilClusterDeleted(array $input) The input array uses the parameters of the DescribeClusters operation and waiter specific settings
 * @method waitUntilSnapshotAvailable(array $input) The input array uses the parameters of the DescribeClusterSnapshots operation and waiter specific settings
 * @method ResourceIteratorInterface getDescribeClusterParameterGroupsIterator(array $args = array()) The input array uses the parameters of the DescribeClusterParameterGroups operation
 * @method ResourceIteratorInterface getDescribeClusterParametersIterator(array $args = array()) The input array uses the parameters of the DescribeClusterParameters operation
 * @method ResourceIteratorInterface getDescribeClusterSecurityGroupsIterator(array $args = array()) The input array uses the parameters of the DescribeClusterSecurityGroups operation
 * @method ResourceIteratorInterface getDescribeClusterSnapshotsIterator(array $args = array()) The input array uses the parameters of the DescribeClusterSnapshots operation
 * @method ResourceIteratorInterface getDescribeClusterSubnetGroupsIterator(array $args = array()) The input array uses the parameters of the DescribeClusterSubnetGroups operation
 * @method ResourceIteratorInterface getDescribeClusterVersionsIterator(array $args = array()) The input array uses the parameters of the DescribeClusterVersions operation
 * @method ResourceIteratorInterface getDescribeClustersIterator(array $args = array()) The input array uses the parameters of the DescribeClusters operation
 * @method ResourceIteratorInterface getDescribeDefaultClusterParametersIterator(array $args = array()) The input array uses the parameters of the DescribeDefaultClusterParameters operation
 * @method ResourceIteratorInterface getDescribeEventSubscriptionsIterator(array $args = array()) The input array uses the parameters of the DescribeEventSubscriptions operation
 * @method ResourceIteratorInterface getDescribeEventsIterator(array $args = array()) The input array uses the parameters of the DescribeEvents operation
 * @method ResourceIteratorInterface getDescribeHsmClientCertificatesIterator(array $args = array()) The input array uses the parameters of the DescribeHsmClientCertificates operation
 * @method ResourceIteratorInterface getDescribeHsmConfigurationsIterator(array $args = array()) The input array uses the parameters of the DescribeHsmConfigurations operation
 * @method ResourceIteratorInterface getDescribeOrderableClusterOptionsIterator(array $args = array()) The input array uses the parameters of the DescribeOrderableClusterOptions operation
 * @method ResourceIteratorInterface getDescribeReservedNodeOfferingsIterator(array $args = array()) The input array uses the parameters of the DescribeReservedNodeOfferings operation
 * @method ResourceIteratorInterface getDescribeReservedNodesIterator(array $args = array()) The input array uses the parameters of the DescribeReservedNodes operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-redshift.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Redshift.RedshiftClient.html API docs
 */
class RedshiftClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-12-01';

    /**
     * Factory method to create a new Amazon Redshift client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/redshift-%s.php'
            ))
            ->build();
    }
}
