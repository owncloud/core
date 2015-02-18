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

namespace Aws\OpsWorks;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS OpsWorks
 *
 * @method Model assignVolume(array $args = array()) {@command OpsWorks AssignVolume}
 * @method Model associateElasticIp(array $args = array()) {@command OpsWorks AssociateElasticIp}
 * @method Model attachElasticLoadBalancer(array $args = array()) {@command OpsWorks AttachElasticLoadBalancer}
 * @method Model cloneStack(array $args = array()) {@command OpsWorks CloneStack}
 * @method Model createApp(array $args = array()) {@command OpsWorks CreateApp}
 * @method Model createDeployment(array $args = array()) {@command OpsWorks CreateDeployment}
 * @method Model createInstance(array $args = array()) {@command OpsWorks CreateInstance}
 * @method Model createLayer(array $args = array()) {@command OpsWorks CreateLayer}
 * @method Model createStack(array $args = array()) {@command OpsWorks CreateStack}
 * @method Model createUserProfile(array $args = array()) {@command OpsWorks CreateUserProfile}
 * @method Model deleteApp(array $args = array()) {@command OpsWorks DeleteApp}
 * @method Model deleteInstance(array $args = array()) {@command OpsWorks DeleteInstance}
 * @method Model deleteLayer(array $args = array()) {@command OpsWorks DeleteLayer}
 * @method Model deleteStack(array $args = array()) {@command OpsWorks DeleteStack}
 * @method Model deleteUserProfile(array $args = array()) {@command OpsWorks DeleteUserProfile}
 * @method Model deregisterElasticIp(array $args = array()) {@command OpsWorks DeregisterElasticIp}
 * @method Model deregisterRdsDbInstance(array $args = array()) {@command OpsWorks DeregisterRdsDbInstance}
 * @method Model deregisterVolume(array $args = array()) {@command OpsWorks DeregisterVolume}
 * @method Model describeApps(array $args = array()) {@command OpsWorks DescribeApps}
 * @method Model describeCommands(array $args = array()) {@command OpsWorks DescribeCommands}
 * @method Model describeDeployments(array $args = array()) {@command OpsWorks DescribeDeployments}
 * @method Model describeElasticIps(array $args = array()) {@command OpsWorks DescribeElasticIps}
 * @method Model describeElasticLoadBalancers(array $args = array()) {@command OpsWorks DescribeElasticLoadBalancers}
 * @method Model describeInstances(array $args = array()) {@command OpsWorks DescribeInstances}
 * @method Model describeLayers(array $args = array()) {@command OpsWorks DescribeLayers}
 * @method Model describeLoadBasedAutoScaling(array $args = array()) {@command OpsWorks DescribeLoadBasedAutoScaling}
 * @method Model describeMyUserProfile(array $args = array()) {@command OpsWorks DescribeMyUserProfile}
 * @method Model describePermissions(array $args = array()) {@command OpsWorks DescribePermissions}
 * @method Model describeRaidArrays(array $args = array()) {@command OpsWorks DescribeRaidArrays}
 * @method Model describeRdsDbInstances(array $args = array()) {@command OpsWorks DescribeRdsDbInstances}
 * @method Model describeServiceErrors(array $args = array()) {@command OpsWorks DescribeServiceErrors}
 * @method Model describeStackSummary(array $args = array()) {@command OpsWorks DescribeStackSummary}
 * @method Model describeStacks(array $args = array()) {@command OpsWorks DescribeStacks}
 * @method Model describeTimeBasedAutoScaling(array $args = array()) {@command OpsWorks DescribeTimeBasedAutoScaling}
 * @method Model describeUserProfiles(array $args = array()) {@command OpsWorks DescribeUserProfiles}
 * @method Model describeVolumes(array $args = array()) {@command OpsWorks DescribeVolumes}
 * @method Model detachElasticLoadBalancer(array $args = array()) {@command OpsWorks DetachElasticLoadBalancer}
 * @method Model disassociateElasticIp(array $args = array()) {@command OpsWorks DisassociateElasticIp}
 * @method Model getHostnameSuggestion(array $args = array()) {@command OpsWorks GetHostnameSuggestion}
 * @method Model rebootInstance(array $args = array()) {@command OpsWorks RebootInstance}
 * @method Model registerElasticIp(array $args = array()) {@command OpsWorks RegisterElasticIp}
 * @method Model registerRdsDbInstance(array $args = array()) {@command OpsWorks RegisterRdsDbInstance}
 * @method Model registerVolume(array $args = array()) {@command OpsWorks RegisterVolume}
 * @method Model setLoadBasedAutoScaling(array $args = array()) {@command OpsWorks SetLoadBasedAutoScaling}
 * @method Model setPermission(array $args = array()) {@command OpsWorks SetPermission}
 * @method Model setTimeBasedAutoScaling(array $args = array()) {@command OpsWorks SetTimeBasedAutoScaling}
 * @method Model startInstance(array $args = array()) {@command OpsWorks StartInstance}
 * @method Model startStack(array $args = array()) {@command OpsWorks StartStack}
 * @method Model stopInstance(array $args = array()) {@command OpsWorks StopInstance}
 * @method Model stopStack(array $args = array()) {@command OpsWorks StopStack}
 * @method Model unassignVolume(array $args = array()) {@command OpsWorks UnassignVolume}
 * @method Model updateApp(array $args = array()) {@command OpsWorks UpdateApp}
 * @method Model updateElasticIp(array $args = array()) {@command OpsWorks UpdateElasticIp}
 * @method Model updateInstance(array $args = array()) {@command OpsWorks UpdateInstance}
 * @method Model updateLayer(array $args = array()) {@command OpsWorks UpdateLayer}
 * @method Model updateMyUserProfile(array $args = array()) {@command OpsWorks UpdateMyUserProfile}
 * @method Model updateRdsDbInstance(array $args = array()) {@command OpsWorks UpdateRdsDbInstance}
 * @method Model updateStack(array $args = array()) {@command OpsWorks UpdateStack}
 * @method Model updateUserProfile(array $args = array()) {@command OpsWorks UpdateUserProfile}
 * @method Model updateVolume(array $args = array()) {@command OpsWorks UpdateVolume}
 * @method ResourceIteratorInterface getDescribeAppsIterator(array $args = array()) The input array uses the parameters of the DescribeApps operation
 * @method ResourceIteratorInterface getDescribeCommandsIterator(array $args = array()) The input array uses the parameters of the DescribeCommands operation
 * @method ResourceIteratorInterface getDescribeDeploymentsIterator(array $args = array()) The input array uses the parameters of the DescribeDeployments operation
 * @method ResourceIteratorInterface getDescribeElasticIpsIterator(array $args = array()) The input array uses the parameters of the DescribeElasticIps operation
 * @method ResourceIteratorInterface getDescribeElasticLoadBalancersIterator(array $args = array()) The input array uses the parameters of the DescribeElasticLoadBalancers operation
 * @method ResourceIteratorInterface getDescribeInstancesIterator(array $args = array()) The input array uses the parameters of the DescribeInstances operation
 * @method ResourceIteratorInterface getDescribeLayersIterator(array $args = array()) The input array uses the parameters of the DescribeLayers operation
 * @method ResourceIteratorInterface getDescribeLoadBasedAutoScalingIterator(array $args = array()) The input array uses the parameters of the DescribeLoadBasedAutoScaling operation
 * @method ResourceIteratorInterface getDescribePermissionsIterator(array $args = array()) The input array uses the parameters of the DescribePermissions operation
 * @method ResourceIteratorInterface getDescribeRaidArraysIterator(array $args = array()) The input array uses the parameters of the DescribeRaidArrays operation
 * @method ResourceIteratorInterface getDescribeServiceErrorsIterator(array $args = array()) The input array uses the parameters of the DescribeServiceErrors operation
 * @method ResourceIteratorInterface getDescribeStacksIterator(array $args = array()) The input array uses the parameters of the DescribeStacks operation
 * @method ResourceIteratorInterface getDescribeTimeBasedAutoScalingIterator(array $args = array()) The input array uses the parameters of the DescribeTimeBasedAutoScaling operation
 * @method ResourceIteratorInterface getDescribeUserProfilesIterator(array $args = array()) The input array uses the parameters of the DescribeUserProfiles operation
 * @method ResourceIteratorInterface getDescribeVolumesIterator(array $args = array()) The input array uses the parameters of the DescribeVolumes operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-opsworks.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.OpsWorks.OpsWorksClient.html API docs
 */
class OpsWorksClient extends AbstractClient
{
    const LATEST_API_VERSION = '2013-02-18';

    /**
     * Factory method to create a new AWS OpsWorks client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/opsworks-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
