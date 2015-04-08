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

namespace Aws\Ec2;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Elastic Compute Cloud
 *
 * @method Model acceptVpcPeeringConnection(array $args = array()) {@command Ec2 AcceptVpcPeeringConnection}
 * @method Model allocateAddress(array $args = array()) {@command Ec2 AllocateAddress}
 * @method Model assignPrivateIpAddresses(array $args = array()) {@command Ec2 AssignPrivateIpAddresses}
 * @method Model associateAddress(array $args = array()) {@command Ec2 AssociateAddress}
 * @method Model associateDhcpOptions(array $args = array()) {@command Ec2 AssociateDhcpOptions}
 * @method Model associateRouteTable(array $args = array()) {@command Ec2 AssociateRouteTable}
 * @method Model attachInternetGateway(array $args = array()) {@command Ec2 AttachInternetGateway}
 * @method Model attachNetworkInterface(array $args = array()) {@command Ec2 AttachNetworkInterface}
 * @method Model attachVolume(array $args = array()) {@command Ec2 AttachVolume}
 * @method Model attachVpnGateway(array $args = array()) {@command Ec2 AttachVpnGateway}
 * @method Model authorizeSecurityGroupEgress(array $args = array()) {@command Ec2 AuthorizeSecurityGroupEgress}
 * @method Model authorizeSecurityGroupIngress(array $args = array()) {@command Ec2 AuthorizeSecurityGroupIngress}
 * @method Model bundleInstance(array $args = array()) {@command Ec2 BundleInstance}
 * @method Model cancelBundleTask(array $args = array()) {@command Ec2 CancelBundleTask}
 * @method Model cancelConversionTask(array $args = array()) {@command Ec2 CancelConversionTask}
 * @method Model cancelExportTask(array $args = array()) {@command Ec2 CancelExportTask}
 * @method Model cancelReservedInstancesListing(array $args = array()) {@command Ec2 CancelReservedInstancesListing}
 * @method Model cancelSpotInstanceRequests(array $args = array()) {@command Ec2 CancelSpotInstanceRequests}
 * @method Model confirmProductInstance(array $args = array()) {@command Ec2 ConfirmProductInstance}
 * @method Model copyImage(array $args = array()) {@command Ec2 CopyImage}
 * @method Model copySnapshot(array $args = array()) {@command Ec2 CopySnapshot}
 * @method Model createCustomerGateway(array $args = array()) {@command Ec2 CreateCustomerGateway}
 * @method Model createDhcpOptions(array $args = array()) {@command Ec2 CreateDhcpOptions}
 * @method Model createImage(array $args = array()) {@command Ec2 CreateImage}
 * @method Model createInstanceExportTask(array $args = array()) {@command Ec2 CreateInstanceExportTask}
 * @method Model createInternetGateway(array $args = array()) {@command Ec2 CreateInternetGateway}
 * @method Model createKeyPair(array $args = array()) {@command Ec2 CreateKeyPair}
 * @method Model createNetworkAcl(array $args = array()) {@command Ec2 CreateNetworkAcl}
 * @method Model createNetworkAclEntry(array $args = array()) {@command Ec2 CreateNetworkAclEntry}
 * @method Model createNetworkInterface(array $args = array()) {@command Ec2 CreateNetworkInterface}
 * @method Model createPlacementGroup(array $args = array()) {@command Ec2 CreatePlacementGroup}
 * @method Model createReservedInstancesListing(array $args = array()) {@command Ec2 CreateReservedInstancesListing}
 * @method Model createRoute(array $args = array()) {@command Ec2 CreateRoute}
 * @method Model createRouteTable(array $args = array()) {@command Ec2 CreateRouteTable}
 * @method Model createSecurityGroup(array $args = array()) {@command Ec2 CreateSecurityGroup}
 * @method Model createSnapshot(array $args = array()) {@command Ec2 CreateSnapshot}
 * @method Model createSpotDatafeedSubscription(array $args = array()) {@command Ec2 CreateSpotDatafeedSubscription}
 * @method Model createSubnet(array $args = array()) {@command Ec2 CreateSubnet}
 * @method Model createTags(array $args = array()) {@command Ec2 CreateTags}
 * @method Model createVolume(array $args = array()) {@command Ec2 CreateVolume}
 * @method Model createVpc(array $args = array()) {@command Ec2 CreateVpc}
 * @method Model createVpcPeeringConnection(array $args = array()) {@command Ec2 CreateVpcPeeringConnection}
 * @method Model createVpnConnection(array $args = array()) {@command Ec2 CreateVpnConnection}
 * @method Model createVpnConnectionRoute(array $args = array()) {@command Ec2 CreateVpnConnectionRoute}
 * @method Model createVpnGateway(array $args = array()) {@command Ec2 CreateVpnGateway}
 * @method Model deleteCustomerGateway(array $args = array()) {@command Ec2 DeleteCustomerGateway}
 * @method Model deleteDhcpOptions(array $args = array()) {@command Ec2 DeleteDhcpOptions}
 * @method Model deleteInternetGateway(array $args = array()) {@command Ec2 DeleteInternetGateway}
 * @method Model deleteKeyPair(array $args = array()) {@command Ec2 DeleteKeyPair}
 * @method Model deleteNetworkAcl(array $args = array()) {@command Ec2 DeleteNetworkAcl}
 * @method Model deleteNetworkAclEntry(array $args = array()) {@command Ec2 DeleteNetworkAclEntry}
 * @method Model deleteNetworkInterface(array $args = array()) {@command Ec2 DeleteNetworkInterface}
 * @method Model deletePlacementGroup(array $args = array()) {@command Ec2 DeletePlacementGroup}
 * @method Model deleteRoute(array $args = array()) {@command Ec2 DeleteRoute}
 * @method Model deleteRouteTable(array $args = array()) {@command Ec2 DeleteRouteTable}
 * @method Model deleteSecurityGroup(array $args = array()) {@command Ec2 DeleteSecurityGroup}
 * @method Model deleteSnapshot(array $args = array()) {@command Ec2 DeleteSnapshot}
 * @method Model deleteSpotDatafeedSubscription(array $args = array()) {@command Ec2 DeleteSpotDatafeedSubscription}
 * @method Model deleteSubnet(array $args = array()) {@command Ec2 DeleteSubnet}
 * @method Model deleteTags(array $args = array()) {@command Ec2 DeleteTags}
 * @method Model deleteVolume(array $args = array()) {@command Ec2 DeleteVolume}
 * @method Model deleteVpc(array $args = array()) {@command Ec2 DeleteVpc}
 * @method Model deleteVpcPeeringConnection(array $args = array()) {@command Ec2 DeleteVpcPeeringConnection}
 * @method Model deleteVpnConnection(array $args = array()) {@command Ec2 DeleteVpnConnection}
 * @method Model deleteVpnConnectionRoute(array $args = array()) {@command Ec2 DeleteVpnConnectionRoute}
 * @method Model deleteVpnGateway(array $args = array()) {@command Ec2 DeleteVpnGateway}
 * @method Model deregisterImage(array $args = array()) {@command Ec2 DeregisterImage}
 * @method Model describeAccountAttributes(array $args = array()) {@command Ec2 DescribeAccountAttributes}
 * @method Model describeAddresses(array $args = array()) {@command Ec2 DescribeAddresses}
 * @method Model describeAvailabilityZones(array $args = array()) {@command Ec2 DescribeAvailabilityZones}
 * @method Model describeBundleTasks(array $args = array()) {@command Ec2 DescribeBundleTasks}
 * @method Model describeConversionTasks(array $args = array()) {@command Ec2 DescribeConversionTasks}
 * @method Model describeCustomerGateways(array $args = array()) {@command Ec2 DescribeCustomerGateways}
 * @method Model describeDhcpOptions(array $args = array()) {@command Ec2 DescribeDhcpOptions}
 * @method Model describeExportTasks(array $args = array()) {@command Ec2 DescribeExportTasks}
 * @method Model describeImageAttribute(array $args = array()) {@command Ec2 DescribeImageAttribute}
 * @method Model describeImages(array $args = array()) {@command Ec2 DescribeImages}
 * @method Model describeInstanceAttribute(array $args = array()) {@command Ec2 DescribeInstanceAttribute}
 * @method Model describeInstanceStatus(array $args = array()) {@command Ec2 DescribeInstanceStatus}
 * @method Model describeInstances(array $args = array()) {@command Ec2 DescribeInstances}
 * @method Model describeInternetGateways(array $args = array()) {@command Ec2 DescribeInternetGateways}
 * @method Model describeKeyPairs(array $args = array()) {@command Ec2 DescribeKeyPairs}
 * @method Model describeNetworkAcls(array $args = array()) {@command Ec2 DescribeNetworkAcls}
 * @method Model describeNetworkInterfaceAttribute(array $args = array()) {@command Ec2 DescribeNetworkInterfaceAttribute}
 * @method Model describeNetworkInterfaces(array $args = array()) {@command Ec2 DescribeNetworkInterfaces}
 * @method Model describePlacementGroups(array $args = array()) {@command Ec2 DescribePlacementGroups}
 * @method Model describeRegions(array $args = array()) {@command Ec2 DescribeRegions}
 * @method Model describeReservedInstances(array $args = array()) {@command Ec2 DescribeReservedInstances}
 * @method Model describeReservedInstancesListings(array $args = array()) {@command Ec2 DescribeReservedInstancesListings}
 * @method Model describeReservedInstancesModifications(array $args = array()) {@command Ec2 DescribeReservedInstancesModifications}
 * @method Model describeReservedInstancesOfferings(array $args = array()) {@command Ec2 DescribeReservedInstancesOfferings}
 * @method Model describeRouteTables(array $args = array()) {@command Ec2 DescribeRouteTables}
 * @method Model describeSecurityGroups(array $args = array()) {@command Ec2 DescribeSecurityGroups}
 * @method Model describeSnapshotAttribute(array $args = array()) {@command Ec2 DescribeSnapshotAttribute}
 * @method Model describeSnapshots(array $args = array()) {@command Ec2 DescribeSnapshots}
 * @method Model describeSpotDatafeedSubscription(array $args = array()) {@command Ec2 DescribeSpotDatafeedSubscription}
 * @method Model describeSpotInstanceRequests(array $args = array()) {@command Ec2 DescribeSpotInstanceRequests}
 * @method Model describeSpotPriceHistory(array $args = array()) {@command Ec2 DescribeSpotPriceHistory}
 * @method Model describeSubnets(array $args = array()) {@command Ec2 DescribeSubnets}
 * @method Model describeTags(array $args = array()) {@command Ec2 DescribeTags}
 * @method Model describeVolumeAttribute(array $args = array()) {@command Ec2 DescribeVolumeAttribute}
 * @method Model describeVolumeStatus(array $args = array()) {@command Ec2 DescribeVolumeStatus}
 * @method Model describeVolumes(array $args = array()) {@command Ec2 DescribeVolumes}
 * @method Model describeVpcAttribute(array $args = array()) {@command Ec2 DescribeVpcAttribute}
 * @method Model describeVpcPeeringConnections(array $args = array()) {@command Ec2 DescribeVpcPeeringConnections}
 * @method Model describeVpcs(array $args = array()) {@command Ec2 DescribeVpcs}
 * @method Model describeVpnConnections(array $args = array()) {@command Ec2 DescribeVpnConnections}
 * @method Model describeVpnGateways(array $args = array()) {@command Ec2 DescribeVpnGateways}
 * @method Model detachInternetGateway(array $args = array()) {@command Ec2 DetachInternetGateway}
 * @method Model detachNetworkInterface(array $args = array()) {@command Ec2 DetachNetworkInterface}
 * @method Model detachVolume(array $args = array()) {@command Ec2 DetachVolume}
 * @method Model detachVpnGateway(array $args = array()) {@command Ec2 DetachVpnGateway}
 * @method Model disableVgwRoutePropagation(array $args = array()) {@command Ec2 DisableVgwRoutePropagation}
 * @method Model disassociateAddress(array $args = array()) {@command Ec2 DisassociateAddress}
 * @method Model disassociateRouteTable(array $args = array()) {@command Ec2 DisassociateRouteTable}
 * @method Model enableVgwRoutePropagation(array $args = array()) {@command Ec2 EnableVgwRoutePropagation}
 * @method Model enableVolumeIO(array $args = array()) {@command Ec2 EnableVolumeIO}
 * @method Model getConsoleOutput(array $args = array()) {@command Ec2 GetConsoleOutput}
 * @method Model getPasswordData(array $args = array()) {@command Ec2 GetPasswordData}
 * @method Model importInstance(array $args = array()) {@command Ec2 ImportInstance}
 * @method Model importKeyPair(array $args = array()) {@command Ec2 ImportKeyPair}
 * @method Model importVolume(array $args = array()) {@command Ec2 ImportVolume}
 * @method Model modifyImageAttribute(array $args = array()) {@command Ec2 ModifyImageAttribute}
 * @method Model modifyInstanceAttribute(array $args = array()) {@command Ec2 ModifyInstanceAttribute}
 * @method Model modifyNetworkInterfaceAttribute(array $args = array()) {@command Ec2 ModifyNetworkInterfaceAttribute}
 * @method Model modifyReservedInstances(array $args = array()) {@command Ec2 ModifyReservedInstances}
 * @method Model modifySnapshotAttribute(array $args = array()) {@command Ec2 ModifySnapshotAttribute}
 * @method Model modifySubnetAttribute(array $args = array()) {@command Ec2 ModifySubnetAttribute}
 * @method Model modifyVolumeAttribute(array $args = array()) {@command Ec2 ModifyVolumeAttribute}
 * @method Model modifyVpcAttribute(array $args = array()) {@command Ec2 ModifyVpcAttribute}
 * @method Model monitorInstances(array $args = array()) {@command Ec2 MonitorInstances}
 * @method Model purchaseReservedInstancesOffering(array $args = array()) {@command Ec2 PurchaseReservedInstancesOffering}
 * @method Model rebootInstances(array $args = array()) {@command Ec2 RebootInstances}
 * @method Model registerImage(array $args = array()) {@command Ec2 RegisterImage}
 * @method Model rejectVpcPeeringConnection(array $args = array()) {@command Ec2 RejectVpcPeeringConnection}
 * @method Model releaseAddress(array $args = array()) {@command Ec2 ReleaseAddress}
 * @method Model replaceNetworkAclAssociation(array $args = array()) {@command Ec2 ReplaceNetworkAclAssociation}
 * @method Model replaceNetworkAclEntry(array $args = array()) {@command Ec2 ReplaceNetworkAclEntry}
 * @method Model replaceRoute(array $args = array()) {@command Ec2 ReplaceRoute}
 * @method Model replaceRouteTableAssociation(array $args = array()) {@command Ec2 ReplaceRouteTableAssociation}
 * @method Model reportInstanceStatus(array $args = array()) {@command Ec2 ReportInstanceStatus}
 * @method Model requestSpotInstances(array $args = array()) {@command Ec2 RequestSpotInstances}
 * @method Model resetImageAttribute(array $args = array()) {@command Ec2 ResetImageAttribute}
 * @method Model resetInstanceAttribute(array $args = array()) {@command Ec2 ResetInstanceAttribute}
 * @method Model resetNetworkInterfaceAttribute(array $args = array()) {@command Ec2 ResetNetworkInterfaceAttribute}
 * @method Model resetSnapshotAttribute(array $args = array()) {@command Ec2 ResetSnapshotAttribute}
 * @method Model revokeSecurityGroupEgress(array $args = array()) {@command Ec2 RevokeSecurityGroupEgress}
 * @method Model revokeSecurityGroupIngress(array $args = array()) {@command Ec2 RevokeSecurityGroupIngress}
 * @method Model runInstances(array $args = array()) {@command Ec2 RunInstances}
 * @method Model startInstances(array $args = array()) {@command Ec2 StartInstances}
 * @method Model stopInstances(array $args = array()) {@command Ec2 StopInstances}
 * @method Model terminateInstances(array $args = array()) {@command Ec2 TerminateInstances}
 * @method Model unassignPrivateIpAddresses(array $args = array()) {@command Ec2 UnassignPrivateIpAddresses}
 * @method Model unmonitorInstances(array $args = array()) {@command Ec2 UnmonitorInstances}
 * @method waitUntilSpotInstanceRequestFulfilled(array $input) The input array uses the parameters of the DescribeSpotInstanceRequests operation and waiter specific settings
 * @method waitUntilInstanceRunning(array $input) The input array uses the parameters of the DescribeInstances operation and waiter specific settings
 * @method waitUntilInstanceStopped(array $input) The input array uses the parameters of the DescribeInstances operation and waiter specific settings
 * @method waitUntilInstanceTerminated(array $input) The input array uses the parameters of the DescribeInstances operation and waiter specific settings
 * @method waitUntilExportTaskCompleted(array $input) The input array uses the parameters of the DescribeExportTasks operation and waiter specific settings
 * @method waitUntilExportTaskCancelled(array $input) The input array uses the parameters of the DescribeExportTasks operation and waiter specific settings
 * @method waitUntilSnapshotCompleted(array $input) The input array uses the parameters of the DescribeSnapshots operation and waiter specific settings
 * @method waitUntilSubnetAvailable(array $input) The input array uses the parameters of the DescribeSubnets operation and waiter specific settings
 * @method waitUntilVolumeAvailable(array $input) The input array uses the parameters of the DescribeVolumes operation and waiter specific settings
 * @method waitUntilVolumeInUse(array $input) The input array uses the parameters of the DescribeVolumes operation and waiter specific settings
 * @method waitUntilVolumeDeleted(array $input) The input array uses the parameters of the DescribeVolumes operation and waiter specific settings
 * @method waitUntilVpcAvailable(array $input) The input array uses the parameters of the DescribeVpcs operation and waiter specific settings
 * @method waitUntilVpnConnectionAvailable(array $input) The input array uses the parameters of the DescribeVpnConnections operation and waiter specific settings
 * @method waitUntilVpnConnectionDeleted(array $input) The input array uses the parameters of the DescribeVpnConnections operation and waiter specific settings
 * @method waitUntilBundleTaskComplete(array $input) The input array uses the parameters of the DescribeBundleTasks operation and waiter specific settings
 * @method waitUntilConversionTaskCompleted(array $input) The input array uses the parameters of the DescribeConversionTasks operation and waiter specific settings
 * @method waitUntilConversionTaskCancelled(array $input) The input array uses the parameters of the DescribeConversionTasks operation and waiter specific settings
 * @method waitUntilCustomerGatewayAvailable(array $input) The input array uses the parameters of the DescribeCustomerGateways operation and waiter specific settings
 * @method waitUntilConversionTaskDeleted(array $input) The input array uses the parameters of the DescribeCustomerGateways operation and waiter specific settings
 * @method ResourceIteratorInterface getDescribeAccountAttributesIterator(array $args = array()) The input array uses the parameters of the DescribeAccountAttributes operation
 * @method ResourceIteratorInterface getDescribeAddressesIterator(array $args = array()) The input array uses the parameters of the DescribeAddresses operation
 * @method ResourceIteratorInterface getDescribeAvailabilityZonesIterator(array $args = array()) The input array uses the parameters of the DescribeAvailabilityZones operation
 * @method ResourceIteratorInterface getDescribeBundleTasksIterator(array $args = array()) The input array uses the parameters of the DescribeBundleTasks operation
 * @method ResourceIteratorInterface getDescribeConversionTasksIterator(array $args = array()) The input array uses the parameters of the DescribeConversionTasks operation
 * @method ResourceIteratorInterface getDescribeCustomerGatewaysIterator(array $args = array()) The input array uses the parameters of the DescribeCustomerGateways operation
 * @method ResourceIteratorInterface getDescribeDhcpOptionsIterator(array $args = array()) The input array uses the parameters of the DescribeDhcpOptions operation
 * @method ResourceIteratorInterface getDescribeExportTasksIterator(array $args = array()) The input array uses the parameters of the DescribeExportTasks operation
 * @method ResourceIteratorInterface getDescribeImagesIterator(array $args = array()) The input array uses the parameters of the DescribeImages operation
 * @method ResourceIteratorInterface getDescribeInstanceStatusIterator(array $args = array()) The input array uses the parameters of the DescribeInstanceStatus operation
 * @method ResourceIteratorInterface getDescribeInstancesIterator(array $args = array()) The input array uses the parameters of the DescribeInstances operation
 * @method ResourceIteratorInterface getDescribeInternetGatewaysIterator(array $args = array()) The input array uses the parameters of the DescribeInternetGateways operation
 * @method ResourceIteratorInterface getDescribeKeyPairsIterator(array $args = array()) The input array uses the parameters of the DescribeKeyPairs operation
 * @method ResourceIteratorInterface getDescribeNetworkAclsIterator(array $args = array()) The input array uses the parameters of the DescribeNetworkAcls operation
 * @method ResourceIteratorInterface getDescribeNetworkInterfacesIterator(array $args = array()) The input array uses the parameters of the DescribeNetworkInterfaces operation
 * @method ResourceIteratorInterface getDescribePlacementGroupsIterator(array $args = array()) The input array uses the parameters of the DescribePlacementGroups operation
 * @method ResourceIteratorInterface getDescribeRegionsIterator(array $args = array()) The input array uses the parameters of the DescribeRegions operation
 * @method ResourceIteratorInterface getDescribeReservedInstancesIterator(array $args = array()) The input array uses the parameters of the DescribeReservedInstances operation
 * @method ResourceIteratorInterface getDescribeReservedInstancesListingsIterator(array $args = array()) The input array uses the parameters of the DescribeReservedInstancesListings operation
 * @method ResourceIteratorInterface getDescribeReservedInstancesOfferingsIterator(array $args = array()) The input array uses the parameters of the DescribeReservedInstancesOfferings operation
 * @method ResourceIteratorInterface getDescribeRouteTablesIterator(array $args = array()) The input array uses the parameters of the DescribeRouteTables operation
 * @method ResourceIteratorInterface getDescribeSecurityGroupsIterator(array $args = array()) The input array uses the parameters of the DescribeSecurityGroups operation
 * @method ResourceIteratorInterface getDescribeSnapshotsIterator(array $args = array()) The input array uses the parameters of the DescribeSnapshots operation
 * @method ResourceIteratorInterface getDescribeSpotInstanceRequestsIterator(array $args = array()) The input array uses the parameters of the DescribeSpotInstanceRequests operation
 * @method ResourceIteratorInterface getDescribeSpotPriceHistoryIterator(array $args = array()) The input array uses the parameters of the DescribeSpotPriceHistory operation
 * @method ResourceIteratorInterface getDescribeSubnetsIterator(array $args = array()) The input array uses the parameters of the DescribeSubnets operation
 * @method ResourceIteratorInterface getDescribeTagsIterator(array $args = array()) The input array uses the parameters of the DescribeTags operation
 * @method ResourceIteratorInterface getDescribeVolumeStatusIterator(array $args = array()) The input array uses the parameters of the DescribeVolumeStatus operation
 * @method ResourceIteratorInterface getDescribeVolumesIterator(array $args = array()) The input array uses the parameters of the DescribeVolumes operation
 * @method ResourceIteratorInterface getDescribeVpcsIterator(array $args = array()) The input array uses the parameters of the DescribeVpcs operation
 * @method ResourceIteratorInterface getDescribeVpnConnectionsIterator(array $args = array()) The input array uses the parameters of the DescribeVpnConnections operation
 * @method ResourceIteratorInterface getDescribeVpnGatewaysIterator(array $args = array()) The input array uses the parameters of the DescribeVpnGateways operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-ec2.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Ec2.Ec2Client.html API docs
 */
class Ec2Client extends AbstractClient
{
    const LATEST_API_VERSION = '2014-10-01';

    /**
     * Factory method to create a new AWS Elastic Beanstalk client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/ec2-%s.php'
            ))
            ->build();

        $client->addSubscriber(new CopySnapshotListener());

        return $client;
    }
}
