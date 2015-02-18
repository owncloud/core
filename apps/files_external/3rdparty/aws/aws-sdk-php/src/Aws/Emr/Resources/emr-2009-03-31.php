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
    'apiVersion' => '2009-03-31',
    'endpointPrefix' => 'elasticmapreduce',
    'serviceFullName' => 'Amazon Elastic MapReduce',
    'serviceAbbreviation' => 'Amazon EMR',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'ElasticMapReduce.',
    'timestampFormat' => 'unixTimestamp',
    'signatureVersion' => 'v4',
    'namespace' => 'Emr',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.sa-east-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.cn-north-1.amazonaws.com.cn',
        ),
        'us-gov-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'elasticmapreduce.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AddInstanceGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'AddInstanceGroupsOutput',
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
                    'default' => 'ElasticMapReduce.AddInstanceGroups',
                ),
                'InstanceGroups' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'InstanceGroupConfig',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'Market' => array(
                                'type' => 'string',
                            ),
                            'InstanceRole' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'BidPrice' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'InstanceType' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 256,
                            ),
                            'InstanceCount' => array(
                                'required' => true,
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'JobFlowId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'AddJobFlowSteps' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'AddJobFlowStepsOutput',
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
                    'default' => 'ElasticMapReduce.AddJobFlowSteps',
                ),
                'JobFlowId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'Steps' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'StepConfig',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'ActionOnFailure' => array(
                                'type' => 'string',
                            ),
                            'HadoopJarStep' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'Properties' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeyValue',
                                            'type' => 'object',
                                            'properties' => array(
                                                'Key' => array(
                                                    'type' => 'string',
                                                    'maxLength' => 10280,
                                                ),
                                                'Value' => array(
                                                    'type' => 'string',
                                                    'maxLength' => 10280,
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Jar' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 10280,
                                    ),
                                    'MainClass' => array(
                                        'type' => 'string',
                                        'maxLength' => 10280,
                                    ),
                                    'Args' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'XmlString',
                                            'type' => 'string',
                                            'maxLength' => 10280,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'AddTags' => array(
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
                    'default' => 'ElasticMapReduce.AddTags',
                ),
                'ResourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Tags' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception occurs when there is an internal failure in the EMR service.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'This exception occurs when there is something wrong with user input.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'DescribeCluster' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeClusterOutput',
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
                    'default' => 'ElasticMapReduce.DescribeCluster',
                ),
                'ClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception occurs when there is an internal failure in the EMR service.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'This exception occurs when there is something wrong with user input.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'DescribeJobFlows' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeJobFlowsOutput',
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
                    'default' => 'ElasticMapReduce.DescribeJobFlows',
                ),
                'CreatedAfter' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'timestamp',
                    'location' => 'json',
                ),
                'CreatedBefore' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'timestamp',
                    'location' => 'json',
                ),
                'JobFlowIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlString',
                        'type' => 'string',
                        'maxLength' => 10280,
                    ),
                ),
                'JobFlowStates' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'JobFlowExecutionState',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeStep' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeStepOutput',
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
                    'default' => 'ElasticMapReduce.DescribeStep',
                ),
                'ClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StepId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception occurs when there is an internal failure in the EMR service.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'This exception occurs when there is something wrong with user input.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ListBootstrapActions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListBootstrapActionsOutput',
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
                    'default' => 'ElasticMapReduce.ListBootstrapActions',
                ),
                'ClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception occurs when there is an internal failure in the EMR service.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'This exception occurs when there is something wrong with user input.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ListClusters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListClustersOutput',
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
                    'default' => 'ElasticMapReduce.ListClusters',
                ),
                'CreatedAfter' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'timestamp',
                    'location' => 'json',
                ),
                'CreatedBefore' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'timestamp',
                    'location' => 'json',
                ),
                'ClusterStates' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ClusterState',
                        'type' => 'string',
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception occurs when there is an internal failure in the EMR service.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'This exception occurs when there is something wrong with user input.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ListInstanceGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListInstanceGroupsOutput',
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
                    'default' => 'ElasticMapReduce.ListInstanceGroups',
                ),
                'ClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception occurs when there is an internal failure in the EMR service.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'This exception occurs when there is something wrong with user input.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ListInstances' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListInstancesOutput',
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
                    'default' => 'ElasticMapReduce.ListInstances',
                ),
                'ClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceGroupId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceGroupTypes' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'InstanceGroupType',
                        'type' => 'string',
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception occurs when there is an internal failure in the EMR service.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'This exception occurs when there is something wrong with user input.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ListSteps' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListStepsOutput',
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
                    'default' => 'ElasticMapReduce.ListSteps',
                ),
                'ClusterId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StepStates' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'StepState',
                        'type' => 'string',
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception occurs when there is an internal failure in the EMR service.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'This exception occurs when there is something wrong with user input.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ModifyInstanceGroups' => array(
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
                    'default' => 'ElasticMapReduce.ModifyInstanceGroups',
                ),
                'InstanceGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'InstanceGroupModifyConfig',
                        'type' => 'object',
                        'properties' => array(
                            'InstanceGroupId' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'InstanceCount' => array(
                                'type' => 'numeric',
                            ),
                            'EC2InstanceIdsToTerminate' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'InstanceId',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'RemoveTags' => array(
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
                    'default' => 'ElasticMapReduce.RemoveTags',
                ),
                'ResourceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'TagKeys' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This exception occurs when there is an internal failure in the EMR service.',
                    'class' => 'InternalServerException',
                ),
                array(
                    'reason' => 'This exception occurs when there is something wrong with user input.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'RunJobFlow' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RunJobFlowOutput',
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
                    'default' => 'ElasticMapReduce.RunJobFlow',
                ),
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'LogUri' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 10280,
                ),
                'AdditionalInfo' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 10280,
                ),
                'AmiVersion' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'Instances' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'MasterInstanceType' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'SlaveInstanceType' => array(
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'InstanceCount' => array(
                            'type' => 'numeric',
                        ),
                        'InstanceGroups' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'InstanceGroupConfig',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                        'maxLength' => 256,
                                    ),
                                    'Market' => array(
                                        'type' => 'string',
                                    ),
                                    'InstanceRole' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'BidPrice' => array(
                                        'type' => 'string',
                                        'maxLength' => 256,
                                    ),
                                    'InstanceType' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'InstanceCount' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                        'Ec2KeyName' => array(
                            'type' => 'string',
                            'maxLength' => 256,
                        ),
                        'Placement' => array(
                            'type' => 'object',
                            'properties' => array(
                                'AvailabilityZone' => array(
                                    'required' => true,
                                    'type' => 'string',
                                    'maxLength' => 10280,
                                ),
                            ),
                        ),
                        'KeepJobFlowAliveWhenNoSteps' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'TerminationProtected' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'HadoopVersion' => array(
                            'type' => 'string',
                            'maxLength' => 256,
                        ),
                        'Ec2SubnetId' => array(
                            'type' => 'string',
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'Steps' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'StepConfig',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'ActionOnFailure' => array(
                                'type' => 'string',
                            ),
                            'HadoopJarStep' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'Properties' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'KeyValue',
                                            'type' => 'object',
                                            'properties' => array(
                                                'Key' => array(
                                                    'type' => 'string',
                                                    'maxLength' => 10280,
                                                ),
                                                'Value' => array(
                                                    'type' => 'string',
                                                    'maxLength' => 10280,
                                                ),
                                            ),
                                        ),
                                    ),
                                    'Jar' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 10280,
                                    ),
                                    'MainClass' => array(
                                        'type' => 'string',
                                        'maxLength' => 10280,
                                    ),
                                    'Args' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'XmlString',
                                            'type' => 'string',
                                            'maxLength' => 10280,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'BootstrapActions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'BootstrapActionConfig',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'ScriptBootstrapAction' => array(
                                'required' => true,
                                'type' => 'object',
                                'properties' => array(
                                    'Path' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'maxLength' => 10280,
                                    ),
                                    'Args' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'XmlString',
                                            'type' => 'string',
                                            'maxLength' => 10280,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'SupportedProducts' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlStringMaxLen256',
                        'type' => 'string',
                        'maxLength' => 256,
                    ),
                ),
                'NewSupportedProducts' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'SupportedProductConfig',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                                'maxLength' => 256,
                            ),
                            'Args' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'XmlString',
                                    'type' => 'string',
                                    'maxLength' => 10280,
                                ),
                            ),
                        ),
                    ),
                ),
                'VisibleToAllUsers' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'JobFlowRole' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 10280,
                ),
                'ServiceRole' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 10280,
                ),
                'Tags' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'SetTerminationProtection' => array(
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
                    'default' => 'ElasticMapReduce.SetTerminationProtection',
                ),
                'JobFlowIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlString',
                        'type' => 'string',
                        'maxLength' => 10280,
                    ),
                ),
                'TerminationProtected' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'SetVisibleToAllUsers' => array(
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
                    'default' => 'ElasticMapReduce.SetVisibleToAllUsers',
                ),
                'JobFlowIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlString',
                        'type' => 'string',
                        'maxLength' => 10280,
                    ),
                ),
                'VisibleToAllUsers' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'TerminateJobFlows' => array(
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
                    'default' => 'ElasticMapReduce.TerminateJobFlows',
                ),
                'JobFlowIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlString',
                        'type' => 'string',
                        'maxLength' => 10280,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an error occurred while processing the request and that the request was not completed.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
    ),
    'models' => array(
        'AddInstanceGroupsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'JobFlowId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InstanceGroupIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlStringMaxLen256',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'AddJobFlowStepsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StepIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'XmlStringMaxLen256',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DescribeClusterOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Cluster' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'StateChangeReason' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Code' => array(
                                            'type' => 'string',
                                        ),
                                        'Message' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'Timeline' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'CreationDateTime' => array(
                                            'type' => 'string',
                                        ),
                                        'ReadyDateTime' => array(
                                            'type' => 'string',
                                        ),
                                        'EndDateTime' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Ec2InstanceAttributes' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Ec2KeyName' => array(
                                    'type' => 'string',
                                ),
                                'Ec2SubnetId' => array(
                                    'type' => 'string',
                                ),
                                'Ec2AvailabilityZone' => array(
                                    'type' => 'string',
                                ),
                                'IamInstanceProfile' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'LogUri' => array(
                            'type' => 'string',
                        ),
                        'RequestedAmiVersion' => array(
                            'type' => 'string',
                        ),
                        'RunningAmiVersion' => array(
                            'type' => 'string',
                        ),
                        'AutoTerminate' => array(
                            'type' => 'boolean',
                        ),
                        'TerminationProtected' => array(
                            'type' => 'boolean',
                        ),
                        'VisibleToAllUsers' => array(
                            'type' => 'boolean',
                        ),
                        'Applications' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Application',
                                'type' => 'object',
                                'properties' => array(
                                    'Name' => array(
                                        'type' => 'string',
                                    ),
                                    'Version' => array(
                                        'type' => 'string',
                                    ),
                                    'Args' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'AdditionalInfo' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Tags' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Tag',
                                'type' => 'object',
                                'properties' => array(
                                    'Key' => array(
                                        'type' => 'string',
                                    ),
                                    'Value' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'ServiceRole' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeJobFlowsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'JobFlows' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'JobFlowDetail',
                        'type' => 'object',
                        'properties' => array(
                            'JobFlowId' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'LogUri' => array(
                                'type' => 'string',
                            ),
                            'AmiVersion' => array(
                                'type' => 'string',
                            ),
                            'ExecutionStatusDetail' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'State' => array(
                                        'type' => 'string',
                                    ),
                                    'CreationDateTime' => array(
                                        'type' => 'string',
                                    ),
                                    'StartDateTime' => array(
                                        'type' => 'string',
                                    ),
                                    'ReadyDateTime' => array(
                                        'type' => 'string',
                                    ),
                                    'EndDateTime' => array(
                                        'type' => 'string',
                                    ),
                                    'LastStateChangeReason' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Instances' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'MasterInstanceType' => array(
                                        'type' => 'string',
                                    ),
                                    'MasterPublicDnsName' => array(
                                        'type' => 'string',
                                    ),
                                    'MasterInstanceId' => array(
                                        'type' => 'string',
                                    ),
                                    'SlaveInstanceType' => array(
                                        'type' => 'string',
                                    ),
                                    'InstanceCount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'InstanceGroups' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'InstanceGroupDetail',
                                            'type' => 'object',
                                            'properties' => array(
                                                'InstanceGroupId' => array(
                                                    'type' => 'string',
                                                ),
                                                'Name' => array(
                                                    'type' => 'string',
                                                ),
                                                'Market' => array(
                                                    'type' => 'string',
                                                ),
                                                'InstanceRole' => array(
                                                    'type' => 'string',
                                                ),
                                                'BidPrice' => array(
                                                    'type' => 'string',
                                                ),
                                                'InstanceType' => array(
                                                    'type' => 'string',
                                                ),
                                                'InstanceRequestCount' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'InstanceRunningCount' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'State' => array(
                                                    'type' => 'string',
                                                ),
                                                'LastStateChangeReason' => array(
                                                    'type' => 'string',
                                                ),
                                                'CreationDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'StartDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'ReadyDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'EndDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'NormalizedInstanceHours' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Ec2KeyName' => array(
                                        'type' => 'string',
                                    ),
                                    'Ec2SubnetId' => array(
                                        'type' => 'string',
                                    ),
                                    'Placement' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'AvailabilityZone' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'KeepJobFlowAliveWhenNoSteps' => array(
                                        'type' => 'boolean',
                                    ),
                                    'TerminationProtected' => array(
                                        'type' => 'boolean',
                                    ),
                                    'HadoopVersion' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Steps' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'StepDetail',
                                    'type' => 'object',
                                    'properties' => array(
                                        'StepConfig' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Name' => array(
                                                    'type' => 'string',
                                                ),
                                                'ActionOnFailure' => array(
                                                    'type' => 'string',
                                                ),
                                                'HadoopJarStep' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Properties' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'KeyValue',
                                                                'type' => 'object',
                                                                'properties' => array(
                                                                    'Key' => array(
                                                                        'type' => 'string',
                                                                    ),
                                                                    'Value' => array(
                                                                        'type' => 'string',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        'Jar' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'MainClass' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Args' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'XmlString',
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'ExecutionStatusDetail' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'State' => array(
                                                    'type' => 'string',
                                                ),
                                                'CreationDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'StartDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'EndDateTime' => array(
                                                    'type' => 'string',
                                                ),
                                                'LastStateChangeReason' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'BootstrapActions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'BootstrapActionDetail',
                                    'type' => 'object',
                                    'properties' => array(
                                        'BootstrapActionConfig' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Name' => array(
                                                    'type' => 'string',
                                                ),
                                                'ScriptBootstrapAction' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Path' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Args' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'XmlString',
                                                                'type' => 'string',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'SupportedProducts' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'XmlStringMaxLen256',
                                    'type' => 'string',
                                ),
                            ),
                            'VisibleToAllUsers' => array(
                                'type' => 'boolean',
                            ),
                            'JobFlowRole' => array(
                                'type' => 'string',
                            ),
                            'ServiceRole' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeStepOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Step' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Config' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Jar' => array(
                                    'type' => 'string',
                                ),
                                'Properties' => array(
                                    'type' => 'object',
                                    'additionalProperties' => array(
                                        'type' => 'string',
                                    ),
                                ),
                                'MainClass' => array(
                                    'type' => 'string',
                                ),
                                'Args' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'String',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'ActionOnFailure' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'StateChangeReason' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Code' => array(
                                            'type' => 'string',
                                        ),
                                        'Message' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'Timeline' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'CreationDateTime' => array(
                                            'type' => 'string',
                                        ),
                                        'StartDateTime' => array(
                                            'type' => 'string',
                                        ),
                                        'EndDateTime' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListBootstrapActionsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'BootstrapActions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Command',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'ScriptPath' => array(
                                'type' => 'string',
                            ),
                            'Args' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListClustersOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Clusters' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ClusterSummary',
                        'type' => 'object',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'State' => array(
                                        'type' => 'string',
                                    ),
                                    'StateChangeReason' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Code' => array(
                                                'type' => 'string',
                                            ),
                                            'Message' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'Timeline' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'CreationDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'ReadyDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'EndDateTime' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListInstanceGroupsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'InstanceGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'InstanceGroup',
                        'type' => 'object',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Market' => array(
                                'type' => 'string',
                            ),
                            'InstanceGroupType' => array(
                                'type' => 'string',
                            ),
                            'BidPrice' => array(
                                'type' => 'string',
                            ),
                            'InstanceType' => array(
                                'type' => 'string',
                            ),
                            'RequestedInstanceCount' => array(
                                'type' => 'numeric',
                            ),
                            'RunningInstanceCount' => array(
                                'type' => 'numeric',
                            ),
                            'Status' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'State' => array(
                                        'type' => 'string',
                                    ),
                                    'StateChangeReason' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Code' => array(
                                                'type' => 'string',
                                            ),
                                            'Message' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'Timeline' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'CreationDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'ReadyDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'EndDateTime' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListInstancesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Instances' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Instance',
                        'type' => 'object',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Ec2InstanceId' => array(
                                'type' => 'string',
                            ),
                            'PublicDnsName' => array(
                                'type' => 'string',
                            ),
                            'PublicIpAddress' => array(
                                'type' => 'string',
                            ),
                            'PrivateDnsName' => array(
                                'type' => 'string',
                            ),
                            'PrivateIpAddress' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'State' => array(
                                        'type' => 'string',
                                    ),
                                    'StateChangeReason' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Code' => array(
                                                'type' => 'string',
                                            ),
                                            'Message' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'Timeline' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'CreationDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'ReadyDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'EndDateTime' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListStepsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Steps' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'StepSummary',
                        'type' => 'object',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'State' => array(
                                        'type' => 'string',
                                    ),
                                    'StateChangeReason' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Code' => array(
                                                'type' => 'string',
                                            ),
                                            'Message' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'Timeline' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'CreationDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'StartDateTime' => array(
                                                'type' => 'string',
                                            ),
                                            'EndDateTime' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'RunJobFlowOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'JobFlowId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'DescribeJobFlows' => array(
            'result_key' => 'JobFlows',
        ),
        'ListBootstrapActions' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'result_key' => 'BootstrapActions',
        ),
        'ListClusters' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'result_key' => 'Clusters',
        ),
        'ListInstanceGroups' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'result_key' => 'InstanceGroups',
        ),
        'ListInstances' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'result_key' => 'Instances',
        ),
        'ListSteps' => array(
            'input_token' => 'Marker',
            'output_token' => 'Marker',
            'result_key' => 'Steps',
        ),
    ),
);
