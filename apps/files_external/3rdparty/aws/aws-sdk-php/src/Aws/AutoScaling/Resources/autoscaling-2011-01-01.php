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

return array (
    'apiVersion' => '2011-01-01',
    'endpointPrefix' => 'autoscaling',
    'serviceFullName' => 'Auto Scaling',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'AutoScaling',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'autoscaling.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'autoscaling.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'autoscaling.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'autoscaling.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'autoscaling.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'autoscaling.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'autoscaling.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'autoscaling.sa-east-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'autoscaling.cn-north-1.amazonaws.com.cn',
        ),
        'us-gov-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'autoscaling.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AttachInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AttachInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceIds.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen16',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 16,
                    ),
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
            ),
        ),
        'CompleteLifecycleAction' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CompleteLifecycleAction',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'LifecycleHookName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'LifecycleActionToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 36,
                    'maxLength' => 36,
                ),
                'LifecycleActionResult' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'CreateAutoScalingGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateAutoScalingGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'LaunchConfigurationName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 16,
                ),
                'MinSize' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MaxSize' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'DesiredCapacity' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'DefaultCooldown' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'AvailabilityZones' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AvailabilityZones.member',
                    'minItems' => 1,
                    'items' => array(
                        'name' => 'XmlStringMaxLen255',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
                'LoadBalancerNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'LoadBalancerNames.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen255',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
                'HealthCheckType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 32,
                ),
                'HealthCheckGracePeriod' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'PlacementGroup' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'VPCZoneIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'TerminationPolicies' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'TerminationPolicies.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen1600',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1600,
                    ),
                ),
                'Tags' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Tags.member',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'ResourceId' => array(
                                'type' => 'string',
                            ),
                            'ResourceType' => array(
                                'type' => 'string',
                            ),
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 128,
                            ),
                            'Value' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'PropagateAtLaunch' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The named Auto Scaling group or launch configuration already exists.',
                    'class' => 'AlreadyExistsException',
                ),
                array(
                    'reason' => 'The quota for capacity groups or launch configurations for this customer has already been reached.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'CreateLaunchConfiguration' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateLaunchConfiguration',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'LaunchConfigurationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'ImageId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'KeyName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'SecurityGroups' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SecurityGroups.member',
                    'items' => array(
                        'name' => 'XmlString',
                        'type' => 'string',
                    ),
                ),
                'UserData' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 21847,
                ),
                'InstanceId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 16,
                ),
                'InstanceType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'KernelId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'RamdiskId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'BlockDeviceMappings' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'BlockDeviceMappings.member',
                    'items' => array(
                        'name' => 'BlockDeviceMapping',
                        'type' => 'object',
                        'properties' => array(
                            'VirtualName' => array(
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                            'DeviceName' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                            'Ebs' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'SnapshotId' => array(
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 255,
                                    ),
                                    'VolumeSize' => array(
                                        'type' => 'numeric',
                                        'minimum' => 1,
                                        'maximum' => 1024,
                                    ),
                                    'VolumeType' => array(
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 255,
                                    ),
                                    'DeleteOnTermination' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                    'Iops' => array(
                                        'type' => 'numeric',
                                        'minimum' => 100,
                                        'maximum' => 4000,
                                    ),
                                ),
                            ),
                            'NoDevice' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
                'InstanceMonitoring' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
                'SpotPrice' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'IamInstanceProfile' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'EbsOptimized' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'AssociatePublicIpAddress' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'PlacementTenancy' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The named Auto Scaling group or launch configuration already exists.',
                    'class' => 'AlreadyExistsException',
                ),
                array(
                    'reason' => 'The quota for capacity groups or launch configurations for this customer has already been reached.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'CreateOrUpdateTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateOrUpdateTags',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'Tags' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Tags.member',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'ResourceId' => array(
                                'type' => 'string',
                            ),
                            'ResourceType' => array(
                                'type' => 'string',
                            ),
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 128,
                            ),
                            'Value' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'PropagateAtLaunch' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The quota for capacity groups or launch configurations for this customer has already been reached.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The named Auto Scaling group or launch configuration already exists.',
                    'class' => 'AlreadyExistsException',
                ),
            ),
        ),
        'DeleteAutoScalingGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteAutoScalingGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'ForceDelete' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You cannot delete an Auto Scaling group while there are scaling activities in progress for that group.',
                    'class' => 'ScalingActivityInProgressException',
                ),
                array(
                    'reason' => 'This is returned when you cannot delete a launch configuration or Auto Scaling group because it is being used.',
                    'class' => 'ResourceInUseException',
                ),
            ),
        ),
        'DeleteLaunchConfiguration' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteLaunchConfiguration',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'LaunchConfigurationName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This is returned when you cannot delete a launch configuration or Auto Scaling group because it is being used.',
                    'class' => 'ResourceInUseException',
                ),
            ),
        ),
        'DeleteLifecycleHook' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteLifecycleHook',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'LifecycleHookName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
            ),
        ),
        'DeleteNotificationConfiguration' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteNotificationConfiguration',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'TopicARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
            ),
        ),
        'DeletePolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeletePolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
            ),
        ),
        'DeleteScheduledAction' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteScheduledAction',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'ScheduledActionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
            ),
        ),
        'DeleteTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteTags',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'Tags' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Tags.member',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'ResourceId' => array(
                                'type' => 'string',
                            ),
                            'ResourceType' => array(
                                'type' => 'string',
                            ),
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 128,
                            ),
                            'Value' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'PropagateAtLaunch' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeAccountLimits' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAccountLimitsAnswer',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAccountLimits',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
            ),
        ),
        'DescribeAdjustmentTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAdjustmentTypesAnswer',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAdjustmentTypes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
            ),
        ),
        'DescribeAutoScalingGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AutoScalingGroupsType',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAutoScalingGroups',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AutoScalingGroupNames.member',
                    'items' => array(
                        'name' => 'ResourceName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1600,
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The NextToken value is invalid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'DescribeAutoScalingInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'AutoScalingInstancesType',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAutoScalingInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceIds.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen16',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 16,
                    ),
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The NextToken value is invalid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'DescribeAutoScalingNotificationTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAutoScalingNotificationTypesAnswer',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAutoScalingNotificationTypes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
            ),
        ),
        'DescribeLaunchConfigurations' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'LaunchConfigurationsType',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeLaunchConfigurations',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'LaunchConfigurationNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'LaunchConfigurationNames.member',
                    'items' => array(
                        'name' => 'ResourceName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1600,
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The NextToken value is invalid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'DescribeLifecycleHookTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeLifecycleHookTypesAnswer',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeLifecycleHookTypes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
            ),
        ),
        'DescribeLifecycleHooks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeLifecycleHooksAnswer',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeLifecycleHooks',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'LifecycleHookNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'LifecycleHookNames.member',
                    'items' => array(
                        'name' => 'AsciiStringMaxLen255',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
            ),
        ),
        'DescribeMetricCollectionTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeMetricCollectionTypesAnswer',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeMetricCollectionTypes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
            ),
        ),
        'DescribeNotificationConfigurations' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeNotificationConfigurationsAnswer',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeNotificationConfigurations',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AutoScalingGroupNames.member',
                    'items' => array(
                        'name' => 'ResourceName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1600,
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The NextToken value is invalid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'DescribePolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'PoliciesType',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribePolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'PolicyNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'PolicyNames.member',
                    'items' => array(
                        'name' => 'ResourceName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1600,
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The NextToken value is invalid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'DescribeScalingActivities' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ActivitiesType',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeScalingActivities',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'ActivityIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ActivityIds.member',
                    'items' => array(
                        'name' => 'XmlString',
                        'type' => 'string',
                    ),
                ),
                'AutoScalingGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The NextToken value is invalid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'DescribeScalingProcessTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ProcessesType',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeScalingProcessTypes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
            ),
        ),
        'DescribeScheduledActions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ScheduledActionsType',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeScheduledActions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'ScheduledActionNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ScheduledActionNames.member',
                    'items' => array(
                        'name' => 'ResourceName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1600,
                    ),
                ),
                'StartTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'EndTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The NextToken value is invalid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'DescribeTags' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'TagsType',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeTags',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'Filters' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Filters.member',
                    'items' => array(
                        'name' => 'Filter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Values' => array(
                                'type' => 'array',
                                'sentAs' => 'Values.member',
                                'items' => array(
                                    'name' => 'XmlString',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The NextToken value is invalid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'DescribeTerminationPolicyTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeTerminationPolicyTypesAnswer',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeTerminationPolicyTypes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
            ),
        ),
        'DetachInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DetachInstancesAnswer',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DetachInstances',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceIds.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen16',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 16,
                    ),
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'ShouldDecrementDesiredCapacity' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DisableMetricsCollection' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DisableMetricsCollection',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'Metrics' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Metrics.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen255',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
            ),
        ),
        'EnableMetricsCollection' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EnableMetricsCollection',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'Metrics' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Metrics.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen255',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
                'Granularity' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
            ),
        ),
        'EnterStandby' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EnterStandbyAnswer',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EnterStandby',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceIds.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen16',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 16,
                    ),
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'ShouldDecrementDesiredCapacity' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ExecutePolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ExecutePolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'HonorCooldown' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You cannot delete an Auto Scaling group while there are scaling activities in progress for that group.',
                    'class' => 'ScalingActivityInProgressException',
                ),
            ),
        ),
        'ExitStandby' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ExitStandbyAnswer',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ExitStandby',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'InstanceIds' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InstanceIds.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen16',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 16,
                    ),
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
            ),
        ),
        'PutLifecycleHook' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PutLifecycleHook',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'LifecycleHookName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'LifecycleTransition' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'RoleARN' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'NotificationTargetARN' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'NotificationMetadata' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1023,
                ),
                'HeartbeatTimeout' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'DefaultResult' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The quota for capacity groups or launch configurations for this customer has already been reached.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'PutNotificationConfiguration' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PutNotificationConfiguration',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'TopicARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'NotificationTypes' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'NotificationTypes.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen255',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The quota for capacity groups or launch configurations for this customer has already been reached.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'PutScalingPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'PolicyARNType',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PutScalingPolicy',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'ScalingAdjustment' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'AdjustmentType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'Cooldown' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MinAdjustmentStep' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The quota for capacity groups or launch configurations for this customer has already been reached.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'PutScheduledUpdateGroupAction' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PutScheduledUpdateGroupAction',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'ScheduledActionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'Time' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'StartTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'EndTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'Recurrence' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'MinSize' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MaxSize' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'DesiredCapacity' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The named Auto Scaling group or launch configuration already exists.',
                    'class' => 'AlreadyExistsException',
                ),
                array(
                    'reason' => 'The quota for capacity groups or launch configurations for this customer has already been reached.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'RecordLifecycleActionHeartbeat' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RecordLifecycleActionHeartbeat',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'LifecycleHookName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'LifecycleActionToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 36,
                    'maxLength' => 36,
                ),
            ),
        ),
        'ResumeProcesses' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ResumeProcesses',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'ScalingProcesses' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ScalingProcesses.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen255',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
            ),
        ),
        'SetDesiredCapacity' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetDesiredCapacity',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'DesiredCapacity' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'HonorCooldown' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You cannot delete an Auto Scaling group while there are scaling activities in progress for that group.',
                    'class' => 'ScalingActivityInProgressException',
                ),
            ),
        ),
        'SetInstanceHealth' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetInstanceHealth',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 16,
                ),
                'HealthStatus' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 32,
                ),
                'ShouldRespectGracePeriod' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'SuspendProcesses' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SuspendProcesses',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'ScalingProcesses' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ScalingProcesses.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen255',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
            ),
        ),
        'TerminateInstanceInAutoScalingGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ActivityType',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'TerminateInstanceInAutoScalingGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'InstanceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 16,
                ),
                'ShouldDecrementDesiredCapacity' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You cannot delete an Auto Scaling group while there are scaling activities in progress for that group.',
                    'class' => 'ScalingActivityInProgressException',
                ),
            ),
        ),
        'UpdateAutoScalingGroup' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateAutoScalingGroup',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-01-01',
                ),
                'AutoScalingGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'LaunchConfigurationName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1600,
                ),
                'MinSize' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MaxSize' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'DesiredCapacity' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'DefaultCooldown' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'AvailabilityZones' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AvailabilityZones.member',
                    'minItems' => 1,
                    'items' => array(
                        'name' => 'XmlStringMaxLen255',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
                'HealthCheckType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 32,
                ),
                'HealthCheckGracePeriod' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'PlacementGroup' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'VPCZoneIdentifier' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'TerminationPolicies' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'TerminationPolicies.member',
                    'items' => array(
                        'name' => 'XmlStringMaxLen1600',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1600,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You cannot delete an Auto Scaling group while there are scaling activities in progress for that group.',
                    'class' => 'ScalingActivityInProgressException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DescribeAccountLimitsAnswer' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MaxNumberOfAutoScalingGroups' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'MaxNumberOfLaunchConfigurations' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
            ),
        ),
        'DescribeAdjustmentTypesAnswer' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AdjustmentTypes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'AdjustmentType',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'AdjustmentType' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'AutoScalingGroupsType' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AutoScalingGroups' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'AutoScalingGroup',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'AutoScalingGroupName' => array(
                                'type' => 'string',
                            ),
                            'AutoScalingGroupARN' => array(
                                'type' => 'string',
                            ),
                            'LaunchConfigurationName' => array(
                                'type' => 'string',
                            ),
                            'MinSize' => array(
                                'type' => 'numeric',
                            ),
                            'MaxSize' => array(
                                'type' => 'numeric',
                            ),
                            'DesiredCapacity' => array(
                                'type' => 'numeric',
                            ),
                            'DefaultCooldown' => array(
                                'type' => 'numeric',
                            ),
                            'AvailabilityZones' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'XmlStringMaxLen255',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'LoadBalancerNames' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'XmlStringMaxLen255',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'HealthCheckType' => array(
                                'type' => 'string',
                            ),
                            'HealthCheckGracePeriod' => array(
                                'type' => 'numeric',
                            ),
                            'Instances' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Instance',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'InstanceId' => array(
                                            'type' => 'string',
                                        ),
                                        'AvailabilityZone' => array(
                                            'type' => 'string',
                                        ),
                                        'LifecycleState' => array(
                                            'type' => 'string',
                                        ),
                                        'HealthStatus' => array(
                                            'type' => 'string',
                                        ),
                                        'LaunchConfigurationName' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'CreatedTime' => array(
                                'type' => 'string',
                            ),
                            'SuspendedProcesses' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'SuspendedProcess',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'ProcessName' => array(
                                            'type' => 'string',
                                        ),
                                        'SuspensionReason' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'PlacementGroup' => array(
                                'type' => 'string',
                            ),
                            'VPCZoneIdentifier' => array(
                                'type' => 'string',
                            ),
                            'EnabledMetrics' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'EnabledMetric',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'Metric' => array(
                                            'type' => 'string',
                                        ),
                                        'Granularity' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'Tags' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'TagDescription',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'ResourceId' => array(
                                            'type' => 'string',
                                        ),
                                        'ResourceType' => array(
                                            'type' => 'string',
                                        ),
                                        'Key' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                        'PropagateAtLaunch' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                            ),
                            'TerminationPolicies' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'XmlStringMaxLen1600',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'AutoScalingInstancesType' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AutoScalingInstances' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'AutoScalingInstanceDetails',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'InstanceId' => array(
                                'type' => 'string',
                            ),
                            'AutoScalingGroupName' => array(
                                'type' => 'string',
                            ),
                            'AvailabilityZone' => array(
                                'type' => 'string',
                            ),
                            'LifecycleState' => array(
                                'type' => 'string',
                            ),
                            'HealthStatus' => array(
                                'type' => 'string',
                            ),
                            'LaunchConfigurationName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'DescribeAutoScalingNotificationTypesAnswer' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AutoScalingNotificationTypes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'XmlStringMaxLen255',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'LaunchConfigurationsType' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LaunchConfigurations' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'LaunchConfiguration',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'LaunchConfigurationName' => array(
                                'type' => 'string',
                            ),
                            'LaunchConfigurationARN' => array(
                                'type' => 'string',
                            ),
                            'ImageId' => array(
                                'type' => 'string',
                            ),
                            'KeyName' => array(
                                'type' => 'string',
                            ),
                            'SecurityGroups' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'XmlString',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'UserData' => array(
                                'type' => 'string',
                            ),
                            'InstanceType' => array(
                                'type' => 'string',
                            ),
                            'KernelId' => array(
                                'type' => 'string',
                            ),
                            'RamdiskId' => array(
                                'type' => 'string',
                            ),
                            'BlockDeviceMappings' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BlockDeviceMapping',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'VirtualName' => array(
                                            'type' => 'string',
                                        ),
                                        'DeviceName' => array(
                                            'type' => 'string',
                                        ),
                                        'Ebs' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'SnapshotId' => array(
                                                    'type' => 'string',
                                                ),
                                                'VolumeSize' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'VolumeType' => array(
                                                    'type' => 'string',
                                                ),
                                                'DeleteOnTermination' => array(
                                                    'type' => 'boolean',
                                                ),
                                                'Iops' => array(
                                                    'type' => 'numeric',
                                                ),
                                            ),
                                        ),
                                        'NoDevice' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                            ),
                            'InstanceMonitoring' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Enabled' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                            'SpotPrice' => array(
                                'type' => 'string',
                            ),
                            'IamInstanceProfile' => array(
                                'type' => 'string',
                            ),
                            'CreatedTime' => array(
                                'type' => 'string',
                            ),
                            'EbsOptimized' => array(
                                'type' => 'boolean',
                            ),
                            'AssociatePublicIpAddress' => array(
                                'type' => 'boolean',
                            ),
                            'PlacementTenancy' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'DescribeLifecycleHookTypesAnswer' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LifecycleHookTypes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'XmlStringMaxLen255',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'DescribeLifecycleHooksAnswer' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'LifecycleHooks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'LifecycleHook',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'LifecycleHookName' => array(
                                'type' => 'string',
                            ),
                            'AutoScalingGroupName' => array(
                                'type' => 'string',
                            ),
                            'LifecycleTransition' => array(
                                'type' => 'string',
                            ),
                            'NotificationTargetARN' => array(
                                'type' => 'string',
                            ),
                            'RoleARN' => array(
                                'type' => 'string',
                            ),
                            'NotificationMetadata' => array(
                                'type' => 'string',
                            ),
                            'HeartbeatTimeout' => array(
                                'type' => 'numeric',
                            ),
                            'GlobalTimeout' => array(
                                'type' => 'numeric',
                            ),
                            'DefaultResult' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeMetricCollectionTypesAnswer' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Metrics' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'MetricCollectionType',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Metric' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Granularities' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'MetricGranularityType',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Granularity' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeNotificationConfigurationsAnswer' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NotificationConfigurations' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'NotificationConfiguration',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'AutoScalingGroupName' => array(
                                'type' => 'string',
                            ),
                            'TopicARN' => array(
                                'type' => 'string',
                            ),
                            'NotificationType' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'PoliciesType' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ScalingPolicies' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ScalingPolicy',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'AutoScalingGroupName' => array(
                                'type' => 'string',
                            ),
                            'PolicyName' => array(
                                'type' => 'string',
                            ),
                            'ScalingAdjustment' => array(
                                'type' => 'numeric',
                            ),
                            'AdjustmentType' => array(
                                'type' => 'string',
                            ),
                            'Cooldown' => array(
                                'type' => 'numeric',
                            ),
                            'PolicyARN' => array(
                                'type' => 'string',
                            ),
                            'Alarms' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Alarm',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'AlarmName' => array(
                                            'type' => 'string',
                                        ),
                                        'AlarmARN' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'MinAdjustmentStep' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ActivitiesType' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Activities' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Activity',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'ActivityId' => array(
                                'type' => 'string',
                            ),
                            'AutoScalingGroupName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Cause' => array(
                                'type' => 'string',
                            ),
                            'StartTime' => array(
                                'type' => 'string',
                            ),
                            'EndTime' => array(
                                'type' => 'string',
                            ),
                            'StatusCode' => array(
                                'type' => 'string',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                            ),
                            'Progress' => array(
                                'type' => 'numeric',
                            ),
                            'Details' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ProcessesType' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Processes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ProcessType',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'ProcessName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ScheduledActionsType' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ScheduledUpdateGroupActions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ScheduledUpdateGroupAction',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'AutoScalingGroupName' => array(
                                'type' => 'string',
                            ),
                            'ScheduledActionName' => array(
                                'type' => 'string',
                            ),
                            'ScheduledActionARN' => array(
                                'type' => 'string',
                            ),
                            'Time' => array(
                                'type' => 'string',
                            ),
                            'StartTime' => array(
                                'type' => 'string',
                            ),
                            'EndTime' => array(
                                'type' => 'string',
                            ),
                            'Recurrence' => array(
                                'type' => 'string',
                            ),
                            'MinSize' => array(
                                'type' => 'numeric',
                            ),
                            'MaxSize' => array(
                                'type' => 'numeric',
                            ),
                            'DesiredCapacity' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'TagsType' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Tags' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'TagDescription',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'ResourceId' => array(
                                'type' => 'string',
                            ),
                            'ResourceType' => array(
                                'type' => 'string',
                            ),
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                            'PropagateAtLaunch' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'DescribeTerminationPolicyTypesAnswer' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TerminationPolicyTypes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'XmlStringMaxLen1600',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'DetachInstancesAnswer' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Activities' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Activity',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'ActivityId' => array(
                                'type' => 'string',
                            ),
                            'AutoScalingGroupName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Cause' => array(
                                'type' => 'string',
                            ),
                            'StartTime' => array(
                                'type' => 'string',
                            ),
                            'EndTime' => array(
                                'type' => 'string',
                            ),
                            'StatusCode' => array(
                                'type' => 'string',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                            ),
                            'Progress' => array(
                                'type' => 'numeric',
                            ),
                            'Details' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EnterStandbyAnswer' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Activities' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Activity',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'ActivityId' => array(
                                'type' => 'string',
                            ),
                            'AutoScalingGroupName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Cause' => array(
                                'type' => 'string',
                            ),
                            'StartTime' => array(
                                'type' => 'string',
                            ),
                            'EndTime' => array(
                                'type' => 'string',
                            ),
                            'StatusCode' => array(
                                'type' => 'string',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                            ),
                            'Progress' => array(
                                'type' => 'numeric',
                            ),
                            'Details' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ExitStandbyAnswer' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Activities' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Activity',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'ActivityId' => array(
                                'type' => 'string',
                            ),
                            'AutoScalingGroupName' => array(
                                'type' => 'string',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Cause' => array(
                                'type' => 'string',
                            ),
                            'StartTime' => array(
                                'type' => 'string',
                            ),
                            'EndTime' => array(
                                'type' => 'string',
                            ),
                            'StatusCode' => array(
                                'type' => 'string',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                            ),
                            'Progress' => array(
                                'type' => 'numeric',
                            ),
                            'Details' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'PolicyARNType' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PolicyARN' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ActivityType' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Activity' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'ActivityId' => array(
                            'type' => 'string',
                        ),
                        'AutoScalingGroupName' => array(
                            'type' => 'string',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'Cause' => array(
                            'type' => 'string',
                        ),
                        'StartTime' => array(
                            'type' => 'string',
                        ),
                        'EndTime' => array(
                            'type' => 'string',
                        ),
                        'StatusCode' => array(
                            'type' => 'string',
                        ),
                        'StatusMessage' => array(
                            'type' => 'string',
                        ),
                        'Progress' => array(
                            'type' => 'numeric',
                        ),
                        'Details' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'DescribeAutoScalingGroups' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxRecords',
            'result_key' => 'AutoScalingGroups',
        ),
        'DescribeAutoScalingInstances' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxRecords',
            'result_key' => 'AutoScalingInstances',
        ),
        'DescribeLaunchConfigurations' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxRecords',
            'result_key' => 'LaunchConfigurations',
        ),
        'DescribeNotificationConfigurations' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxRecords',
            'result_key' => 'NotificationConfigurations',
        ),
        'DescribePolicies' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxRecords',
            'result_key' => 'ScalingPolicies',
        ),
        'DescribeScalingActivities' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Activities',
        ),
        'DescribeScheduledActions' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxRecords',
            'result_key' => 'ScheduledUpdateGroupActions',
        ),
        'DescribeTags' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxRecords',
            'result_key' => 'Tags',
        ),
    ),
);
