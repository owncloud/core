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

namespace Aws\AutoScaling;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Auto Scaling
 *
 * @method Model attachInstances(array $args = array()) {@command AutoScaling AttachInstances}
 * @method Model completeLifecycleAction(array $args = array()) {@command AutoScaling CompleteLifecycleAction}
 * @method Model createAutoScalingGroup(array $args = array()) {@command AutoScaling CreateAutoScalingGroup}
 * @method Model createLaunchConfiguration(array $args = array()) {@command AutoScaling CreateLaunchConfiguration}
 * @method Model createOrUpdateTags(array $args = array()) {@command AutoScaling CreateOrUpdateTags}
 * @method Model deleteAutoScalingGroup(array $args = array()) {@command AutoScaling DeleteAutoScalingGroup}
 * @method Model deleteLaunchConfiguration(array $args = array()) {@command AutoScaling DeleteLaunchConfiguration}
 * @method Model deleteLifecycleHook(array $args = array()) {@command AutoScaling DeleteLifecycleHook}
 * @method Model deleteNotificationConfiguration(array $args = array()) {@command AutoScaling DeleteNotificationConfiguration}
 * @method Model deletePolicy(array $args = array()) {@command AutoScaling DeletePolicy}
 * @method Model deleteScheduledAction(array $args = array()) {@command AutoScaling DeleteScheduledAction}
 * @method Model deleteTags(array $args = array()) {@command AutoScaling DeleteTags}
 * @method Model describeAccountLimits(array $args = array()) {@command AutoScaling DescribeAccountLimits}
 * @method Model describeAdjustmentTypes(array $args = array()) {@command AutoScaling DescribeAdjustmentTypes}
 * @method Model describeAutoScalingGroups(array $args = array()) {@command AutoScaling DescribeAutoScalingGroups}
 * @method Model describeAutoScalingInstances(array $args = array()) {@command AutoScaling DescribeAutoScalingInstances}
 * @method Model describeAutoScalingNotificationTypes(array $args = array()) {@command AutoScaling DescribeAutoScalingNotificationTypes}
 * @method Model describeLaunchConfigurations(array $args = array()) {@command AutoScaling DescribeLaunchConfigurations}
 * @method Model describeLifecycleHookTypes(array $args = array()) {@command AutoScaling DescribeLifecycleHookTypes}
 * @method Model describeLifecycleHooks(array $args = array()) {@command AutoScaling DescribeLifecycleHooks}
 * @method Model describeMetricCollectionTypes(array $args = array()) {@command AutoScaling DescribeMetricCollectionTypes}
 * @method Model describeNotificationConfigurations(array $args = array()) {@command AutoScaling DescribeNotificationConfigurations}
 * @method Model describePolicies(array $args = array()) {@command AutoScaling DescribePolicies}
 * @method Model describeScalingActivities(array $args = array()) {@command AutoScaling DescribeScalingActivities}
 * @method Model describeScalingProcessTypes(array $args = array()) {@command AutoScaling DescribeScalingProcessTypes}
 * @method Model describeScheduledActions(array $args = array()) {@command AutoScaling DescribeScheduledActions}
 * @method Model describeTags(array $args = array()) {@command AutoScaling DescribeTags}
 * @method Model describeTerminationPolicyTypes(array $args = array()) {@command AutoScaling DescribeTerminationPolicyTypes}
 * @method Model detachInstances(array $args = array()) {@command AutoScaling DetachInstances}
 * @method Model disableMetricsCollection(array $args = array()) {@command AutoScaling DisableMetricsCollection}
 * @method Model enableMetricsCollection(array $args = array()) {@command AutoScaling EnableMetricsCollection}
 * @method Model enterStandby(array $args = array()) {@command AutoScaling EnterStandby}
 * @method Model executePolicy(array $args = array()) {@command AutoScaling ExecutePolicy}
 * @method Model exitStandby(array $args = array()) {@command AutoScaling ExitStandby}
 * @method Model putLifecycleHook(array $args = array()) {@command AutoScaling PutLifecycleHook}
 * @method Model putNotificationConfiguration(array $args = array()) {@command AutoScaling PutNotificationConfiguration}
 * @method Model putScalingPolicy(array $args = array()) {@command AutoScaling PutScalingPolicy}
 * @method Model putScheduledUpdateGroupAction(array $args = array()) {@command AutoScaling PutScheduledUpdateGroupAction}
 * @method Model recordLifecycleActionHeartbeat(array $args = array()) {@command AutoScaling RecordLifecycleActionHeartbeat}
 * @method Model resumeProcesses(array $args = array()) {@command AutoScaling ResumeProcesses}
 * @method Model setDesiredCapacity(array $args = array()) {@command AutoScaling SetDesiredCapacity}
 * @method Model setInstanceHealth(array $args = array()) {@command AutoScaling SetInstanceHealth}
 * @method Model suspendProcesses(array $args = array()) {@command AutoScaling SuspendProcesses}
 * @method Model terminateInstanceInAutoScalingGroup(array $args = array()) {@command AutoScaling TerminateInstanceInAutoScalingGroup}
 * @method Model updateAutoScalingGroup(array $args = array()) {@command AutoScaling UpdateAutoScalingGroup}
 * @method ResourceIteratorInterface getDescribeAutoScalingGroupsIterator(array $args = array()) The input array uses the parameters of the DescribeAutoScalingGroups operation
 * @method ResourceIteratorInterface getDescribeAutoScalingInstancesIterator(array $args = array()) The input array uses the parameters of the DescribeAutoScalingInstances operation
 * @method ResourceIteratorInterface getDescribeLaunchConfigurationsIterator(array $args = array()) The input array uses the parameters of the DescribeLaunchConfigurations operation
 * @method ResourceIteratorInterface getDescribeNotificationConfigurationsIterator(array $args = array()) The input array uses the parameters of the DescribeNotificationConfigurations operation
 * @method ResourceIteratorInterface getDescribePoliciesIterator(array $args = array()) The input array uses the parameters of the DescribePolicies operation
 * @method ResourceIteratorInterface getDescribeScalingActivitiesIterator(array $args = array()) The input array uses the parameters of the DescribeScalingActivities operation
 * @method ResourceIteratorInterface getDescribeScheduledActionsIterator(array $args = array()) The input array uses the parameters of the DescribeScheduledActions operation
 * @method ResourceIteratorInterface getDescribeTagsIterator(array $args = array()) The input array uses the parameters of the DescribeTags operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-autoscaling.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.AutoScaling.AutoScalingClient.html API docs
 */
class AutoScalingClient extends AbstractClient
{
    const LATEST_API_VERSION = '2011-01-01';

    /**
     * Factory method to create a new Auto Scaling client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/autoscaling-%s.php'
            ))
            ->build();
    }
}
