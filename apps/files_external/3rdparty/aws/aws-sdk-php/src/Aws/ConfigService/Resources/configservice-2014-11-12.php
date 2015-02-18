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
    'apiVersion' => '2014-11-12',
    'endpointPrefix' => 'config',
    'serviceFullName' => 'AWS Config',
    'serviceAbbreviation' => 'Config Service',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'StarlingDoveService.',
    'signatureVersion' => 'v4',
    'namespace' => 'ConfigService',
    'operations' => array(
        'DeleteDeliveryChannel' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StarlingDoveService.DeleteDeliveryChannel',
                ),
                'DeliveryChannelName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have specified a delivery channel that does not exist.',
                    'class' => 'NoSuchDeliveryChannelException',
                ),
                array(
                    'reason' => 'You cannot delete the delivery channel you specified because the configuration recorder is running.',
                    'class' => 'LastDeliveryChannelDeleteFailedException',
                ),
            ),
        ),
        'DeliverConfigSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeliverConfigSnapshotResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StarlingDoveService.DeliverConfigSnapshot',
                ),
                'deliveryChannelName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have specified a delivery channel that does not exist.',
                    'class' => 'NoSuchDeliveryChannelException',
                ),
                array(
                    'reason' => 'There are no configuration recorders available to provide the role needed to describe your resources.',
                    'class' => 'NoAvailableConfigurationRecorderException',
                ),
                array(
                    'reason' => 'There is no configuration recorder running.',
                    'class' => 'NoRunningConfigurationRecorderException',
                ),
            ),
        ),
        'DescribeConfigurationRecorderStatus' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeConfigurationRecorderStatusResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StarlingDoveService.DescribeConfigurationRecorderStatus',
                ),
                'ConfigurationRecorderNames' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RecorderName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 256,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have specified a configuration recorder that does not exist.',
                    'class' => 'NoSuchConfigurationRecorderException',
                ),
            ),
        ),
        'DescribeConfigurationRecorders' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeConfigurationRecordersResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StarlingDoveService.DescribeConfigurationRecorders',
                ),
                'ConfigurationRecorderNames' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RecorderName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 256,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have specified a configuration recorder that does not exist.',
                    'class' => 'NoSuchConfigurationRecorderException',
                ),
            ),
        ),
        'DescribeDeliveryChannelStatus' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeDeliveryChannelStatusResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StarlingDoveService.DescribeDeliveryChannelStatus',
                ),
                'DeliveryChannelNames' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ChannelName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 256,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have specified a delivery channel that does not exist.',
                    'class' => 'NoSuchDeliveryChannelException',
                ),
            ),
        ),
        'DescribeDeliveryChannels' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeDeliveryChannelsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StarlingDoveService.DescribeDeliveryChannels',
                ),
                'DeliveryChannelNames' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ChannelName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 256,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have specified a delivery channel that does not exist.',
                    'class' => 'NoSuchDeliveryChannelException',
                ),
            ),
        ),
        'GetResourceConfigHistory' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetResourceConfigHistoryResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StarlingDoveService.GetResourceConfigHistory',
                ),
                'resourceType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'resourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'laterTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'json',
                ),
                'earlierTime' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'json',
                ),
                'chronologicalOrder' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 100,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The requested action is not valid.',
                    'class' => 'ValidationException',
                ),
                array(
                    'reason' => 'The specified time range is not valid. The earlier time is not chronologically before the later time.',
                    'class' => 'InvalidTimeRangeException',
                ),
                array(
                    'reason' => 'You have reached the limit on the pagination.',
                    'class' => 'InvalidLimitException',
                ),
                array(
                    'reason' => 'The specified nextToken for pagination is not valid.',
                    'class' => 'InvalidNextTokenException',
                ),
                array(
                    'reason' => 'There are no configuration recorders available to provide the role needed to describe your resources.',
                    'class' => 'NoAvailableConfigurationRecorderException',
                ),
                array(
                    'reason' => 'You have specified a resource that is either unknown or has not been discovered.',
                    'class' => 'ResourceNotDiscoveredException',
                ),
            ),
        ),
        'PutConfigurationRecorder' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StarlingDoveService.PutConfigurationRecorder',
                ),
                'ConfigurationRecorder' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'roleARN' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have reached the limit on the number of recorders you can create.',
                    'class' => 'MaxNumberOfConfigurationRecordersExceededException',
                ),
                array(
                    'reason' => 'You have provided a configuration recorder name that is not valid.',
                    'class' => 'InvalidConfigurationRecorderNameException',
                ),
                array(
                    'reason' => 'You have provided a null or empty role ARN.',
                    'class' => 'InvalidRoleException',
                ),
            ),
        ),
        'PutDeliveryChannel' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StarlingDoveService.PutDeliveryChannel',
                ),
                'DeliveryChannel' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        's3BucketName' => array(
                            'type' => 'string',
                        ),
                        's3KeyPrefix' => array(
                            'type' => 'string',
                        ),
                        'snsTopicARN' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have reached the limit on the number of delivery channels you can create.',
                    'class' => 'MaxNumberOfDeliveryChannelsExceededException',
                ),
                array(
                    'reason' => 'There are no configuration recorders available to provide the role needed to describe your resources.',
                    'class' => 'NoAvailableConfigurationRecorderException',
                ),
                array(
                    'reason' => 'The specified delivery channel name is not valid.',
                    'class' => 'InvalidDeliveryChannelNameException',
                ),
                array(
                    'reason' => 'The specified Amazon S3 bucket does not exist.',
                    'class' => 'NoSuchBucketException',
                ),
                array(
                    'reason' => 'The specified Amazon S3 key prefix is not valid.',
                    'class' => 'InvalidS3KeyPrefixException',
                ),
                array(
                    'reason' => 'The specified Amazon SNS topic does not exist.',
                    'class' => 'InvalidSNSTopicARNException',
                ),
                array(
                    'reason' => 'Your Amazon S3 bucket policy does not permit AWS Config to write to it.',
                    'class' => 'InsufficientDeliveryPolicyException',
                ),
            ),
        ),
        'StartConfigurationRecorder' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StarlingDoveService.StartConfigurationRecorder',
                ),
                'ConfigurationRecorderName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have specified a configuration recorder that does not exist.',
                    'class' => 'NoSuchConfigurationRecorderException',
                ),
                array(
                    'reason' => 'There is no delivery channel available to record configurations.',
                    'class' => 'NoAvailableDeliveryChannelException',
                ),
            ),
        ),
        'StopConfigurationRecorder' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'StarlingDoveService.StopConfigurationRecorder',
                ),
                'ConfigurationRecorderName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You have specified a configuration recorder that does not exist.',
                    'class' => 'NoSuchConfigurationRecorderException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DeliverConfigSnapshotResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'configSnapshotId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeConfigurationRecorderStatusResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ConfigurationRecordersStatus' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ConfigurationRecorderStatus',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            'lastStartTime' => array(
                                'type' => 'string',
                            ),
                            'lastStopTime' => array(
                                'type' => 'string',
                            ),
                            'recording' => array(
                                'type' => 'boolean',
                            ),
                            'lastStatus' => array(
                                'type' => 'string',
                            ),
                            'lastErrorCode' => array(
                                'type' => 'string',
                            ),
                            'lastErrorMessage' => array(
                                'type' => 'string',
                            ),
                            'lastStatusChangeTime' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeConfigurationRecordersResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ConfigurationRecorders' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ConfigurationRecorder',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            'roleARN' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeDeliveryChannelStatusResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DeliveryChannelsStatus' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DeliveryChannelStatus',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            'configSnapshotDeliveryInfo' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'lastStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'lastErrorCode' => array(
                                        'type' => 'string',
                                    ),
                                    'lastErrorMessage' => array(
                                        'type' => 'string',
                                    ),
                                    'lastAttemptTime' => array(
                                        'type' => 'string',
                                    ),
                                    'lastSuccessfulTime' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'configHistoryDeliveryInfo' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'lastStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'lastErrorCode' => array(
                                        'type' => 'string',
                                    ),
                                    'lastErrorMessage' => array(
                                        'type' => 'string',
                                    ),
                                    'lastAttemptTime' => array(
                                        'type' => 'string',
                                    ),
                                    'lastSuccessfulTime' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'configStreamDeliveryInfo' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'lastStatus' => array(
                                        'type' => 'string',
                                    ),
                                    'lastErrorCode' => array(
                                        'type' => 'string',
                                    ),
                                    'lastErrorMessage' => array(
                                        'type' => 'string',
                                    ),
                                    'lastStatusChangeTime' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeDeliveryChannelsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DeliveryChannels' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DeliveryChannel',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            's3BucketName' => array(
                                'type' => 'string',
                            ),
                            's3KeyPrefix' => array(
                                'type' => 'string',
                            ),
                            'snsTopicARN' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetResourceConfigHistoryResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'configurationItems' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ConfigurationItem',
                        'type' => 'object',
                        'properties' => array(
                            'version' => array(
                                'type' => 'string',
                            ),
                            'accountId' => array(
                                'type' => 'string',
                            ),
                            'configurationItemCaptureTime' => array(
                                'type' => 'string',
                            ),
                            'configurationItemStatus' => array(
                                'type' => 'string',
                            ),
                            'configurationStateId' => array(
                                'type' => 'string',
                            ),
                            'configurationItemMD5Hash' => array(
                                'type' => 'string',
                            ),
                            'arn' => array(
                                'type' => 'string',
                            ),
                            'resourceType' => array(
                                'type' => 'string',
                            ),
                            'resourceId' => array(
                                'type' => 'string',
                            ),
                            'availabilityZone' => array(
                                'type' => 'string',
                            ),
                            'resourceCreationTime' => array(
                                'type' => 'string',
                            ),
                            'tags' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'relatedEvents' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'RelatedEvent',
                                    'type' => 'string',
                                ),
                            ),
                            'relationships' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Relationship',
                                    'type' => 'object',
                                    'properties' => array(
                                        'resourceType' => array(
                                            'type' => 'string',
                                        ),
                                        'resourceId' => array(
                                            'type' => 'string',
                                        ),
                                        'relationshipName' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'configuration' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
);
