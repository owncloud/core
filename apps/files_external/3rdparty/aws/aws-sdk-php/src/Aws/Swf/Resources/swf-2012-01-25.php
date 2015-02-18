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
    'apiVersion' => '2012-01-25',
    'endpointPrefix' => 'swf',
    'serviceFullName' => 'Amazon Simple Workflow Service',
    'serviceAbbreviation' => 'Amazon SWF',
    'serviceType' => 'json',
    'jsonVersion' => '1.0',
    'targetPrefix' => 'SimpleWorkflowService.',
    'timestampFormat' => 'unixTimestamp',
    'signatureVersion' => 'v4',
    'namespace' => 'Swf',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.sa-east-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.cn-north-1.amazonaws.com.cn',
        ),
        'us-gov-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'swf.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CountClosedWorkflowExecutions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowExecutionCount',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.CountClosedWorkflowExecutions',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'startTimeFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                    ),
                ),
                'closeTimeFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                    ),
                ),
                'executionFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'typeFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'type' => 'string',
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'tagFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'tag' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'closeStatusFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'status' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'CountOpenWorkflowExecutions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowExecutionCount',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.CountOpenWorkflowExecutions',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'startTimeFilter' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                    ),
                ),
                'typeFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'type' => 'string',
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'tagFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'tag' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'executionFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'CountPendingActivityTasks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PendingTaskCount',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.CountPendingActivityTasks',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'taskList' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'CountPendingDecisionTasks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PendingTaskCount',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.CountPendingDecisionTasks',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'taskList' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DeprecateActivityType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DeprecateActivityType',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'activityType' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the specified activity or workflow type was already deprecated.',
                    'class' => 'TypeDeprecatedException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DeprecateDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DeprecateDomain',
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the specified domain has been deprecated.',
                    'class' => 'DomainDeprecatedException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DeprecateWorkflowType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DeprecateWorkflowType',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowType' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the specified activity or workflow type was already deprecated.',
                    'class' => 'TypeDeprecatedException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DescribeActivityType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ActivityTypeDetail',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DescribeActivityType',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'activityType' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DescribeDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DomainDetail',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DescribeDomain',
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DescribeWorkflowExecution' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowExecutionDetail',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DescribeWorkflowExecution',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'execution' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'runId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'DescribeWorkflowType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowTypeDetail',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.DescribeWorkflowType',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowType' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'GetWorkflowExecutionHistory' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'History',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.GetWorkflowExecutionHistory',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'execution' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'runId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'ListActivityTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ActivityTypeInfos',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.ListActivityTypes',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'name' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'registrationStatus' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
            ),
        ),
        'ListClosedWorkflowExecutions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowExecutionInfos',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.ListClosedWorkflowExecutions',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'startTimeFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                    ),
                ),
                'closeTimeFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                    ),
                ),
                'executionFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'closeStatusFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'status' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'typeFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'type' => 'string',
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'tagFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'tag' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'ListDomains' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DomainInfos',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.ListDomains',
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'registrationStatus' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'maximumPageSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'ListOpenWorkflowExecutions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowExecutionInfos',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.ListOpenWorkflowExecutions',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'startTimeFilter' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'oldestDate' => array(
                            'required' => true,
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                        'latestDate' => array(
                            'type' => array(
                                'object',
                                'string',
                                'integer',
                            ),
                            'format' => 'timestamp',
                        ),
                    ),
                ),
                'typeFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'type' => 'string',
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'tagFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'tag' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'executionFilter' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'ListWorkflowTypes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'WorkflowTypeInfos',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.ListWorkflowTypes',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'name' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'registrationStatus' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
            ),
        ),
        'PollForActivityTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ActivityTask',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.PollForActivityTask',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'taskList' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'identity' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'reason' => 'Returned by any operation if a system imposed limitation has been reached. To address this fault you should either clean up unused resources or increase the limit by contacting AWS.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'PollForDecisionTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DecisionTask',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.PollForDecisionTask',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'taskList' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'identity' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
                'maximumPageSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 1000,
                ),
                'reverseOrder' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'reason' => 'Returned by any operation if a system imposed limitation has been reached. To address this fault you should either clean up unused resources or increase the limit by contacting AWS.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'RecordActivityTaskHeartbeat' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ActivityTaskStatus',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RecordActivityTaskHeartbeat',
                ),
                'taskToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'details' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RegisterActivityType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RegisterActivityType',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'version' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'description' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'defaultTaskStartToCloseTimeout' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'defaultTaskHeartbeatTimeout' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'defaultTaskList' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'defaultTaskScheduleToStartTimeout' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'defaultTaskScheduleToCloseTimeout' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the type already exists in the specified domain. You will get this fault even if the existing type is in deprecated status. You can specify another version if the intent is to create a new distinct version of the type.',
                    'class' => 'TypeAlreadyExistsException',
                ),
                array(
                    'reason' => 'Returned by any operation if a system imposed limitation has been reached. To address this fault you should either clean up unused resources or increase the limit by contacting AWS.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RegisterDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RegisterDomain',
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'description' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'workflowExecutionRetentionPeriodInDays' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 8,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified domain already exists. You will get this fault even if the existing domain is in deprecated status.',
                    'class' => 'DomainAlreadyExistsException',
                ),
                array(
                    'reason' => 'Returned by any operation if a system imposed limitation has been reached. To address this fault you should either clean up unused resources or increase the limit by contacting AWS.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RegisterWorkflowType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RegisterWorkflowType',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'version' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'description' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'defaultTaskStartToCloseTimeout' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'defaultExecutionStartToCloseTimeout' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'defaultTaskList' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'defaultChildPolicy' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the type already exists in the specified domain. You will get this fault even if the existing type is in deprecated status. You can specify another version if the intent is to create a new distinct version of the type.',
                    'class' => 'TypeAlreadyExistsException',
                ),
                array(
                    'reason' => 'Returned by any operation if a system imposed limitation has been reached. To address this fault you should either clean up unused resources or increase the limit by contacting AWS.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RequestCancelWorkflowExecution' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RequestCancelWorkflowExecution',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'runId' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RespondActivityTaskCanceled' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RespondActivityTaskCanceled',
                ),
                'taskToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'details' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RespondActivityTaskCompleted' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RespondActivityTaskCompleted',
                ),
                'taskToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'result' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RespondActivityTaskFailed' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RespondActivityTaskFailed',
                ),
                'taskToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'reason' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'details' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'RespondDecisionTaskCompleted' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.RespondDecisionTaskCompleted',
                ),
                'taskToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'decisions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Decision',
                        'type' => 'object',
                        'properties' => array(
                            'decisionType' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'scheduleActivityTaskDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityType' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 256,
                                            ),
                                            'version' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 64,
                                            ),
                                        ),
                                    ),
                                    'activityId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'scheduleToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 256,
                                            ),
                                        ),
                                    ),
                                    'scheduleToStartTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'startToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'heartbeatTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                ),
                            ),
                            'requestCancelActivityTaskDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                ),
                            ),
                            'completeWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'result' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'failWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                        'maxLength' => 256,
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'cancelWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'details' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'continueAsNewWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'input' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 256,
                                            ),
                                        ),
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'maxItems' => 5,
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 256,
                                        ),
                                    ),
                                    'workflowTypeVersion' => array(
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 64,
                                    ),
                                ),
                            ),
                            'recordMarkerDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'markerName' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'startTimerDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'startToFireTimeout' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 8,
                                    ),
                                ),
                            ),
                            'cancelTimerDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                ),
                            ),
                            'signalExternalWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                        'maxLength' => 64,
                                    ),
                                    'signalName' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'requestCancelExternalWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                        'maxLength' => 64,
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                ),
                            ),
                            'startChildWorkflowExecutionDecisionAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowType' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 256,
                                            ),
                                            'version' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 64,
                                            ),
                                        ),
                                    ),
                                    'workflowId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                        'minLength' => 1,
                                        'maxLength' => 256,
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                        'maxLength' => 32768,
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 256,
                                            ),
                                        ),
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                        'maxLength' => 8,
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'maxItems' => 5,
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 256,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'executionContext' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'SignalWorkflowExecution' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.SignalWorkflowExecution',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'runId' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 64,
                ),
                'signalName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'input' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
        'StartWorkflowExecution' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'Run',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.StartWorkflowExecution',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowType' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                        'version' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                    ),
                ),
                'taskList' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'input' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
                'executionStartToCloseTimeout' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'tagList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 5,
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 256,
                    ),
                ),
                'taskStartToCloseTimeout' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8,
                ),
                'childPolicy' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the specified activity or workflow type was already deprecated.',
                    'class' => 'TypeDeprecatedException',
                ),
                array(
                    'reason' => 'Returned by StartWorkflowExecution when an open execution with the same workflowId is already running in the specified domain.',
                    'class' => 'WorkflowExecutionAlreadyStartedException',
                ),
                array(
                    'reason' => 'Returned by any operation if a system imposed limitation has been reached. To address this fault you should either clean up unused resources or increase the limit by contacting AWS.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
                array(
                    'class' => 'DefaultUndefinedException',
                ),
            ),
        ),
        'TerminateWorkflowExecution' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.0',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'SimpleWorkflowService.TerminateWorkflowExecution',
                ),
                'domain' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'workflowId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'runId' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 64,
                ),
                'reason' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 256,
                ),
                'details' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 32768,
                ),
                'childPolicy' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned when the named resource cannot be found with in the scope of this operation (region or domain). This could happen if the named resource was never created or is no longer available for this operation.',
                    'class' => 'UnknownResourceException',
                ),
                array(
                    'reason' => 'Returned when the caller does not have sufficient permissions to invoke the action.',
                    'class' => 'OperationNotPermittedException',
                ),
            ),
        ),
    ),
    'models' => array(
        'WorkflowExecutionCount' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'count' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'truncated' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'PendingTaskCount' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'count' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'truncated' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'ActivityTypeDetail' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'typeInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'activityType' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                                'version' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'description' => array(
                            'type' => 'string',
                        ),
                        'creationDate' => array(
                            'type' => 'string',
                        ),
                        'deprecationDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'configuration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'defaultTaskStartToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                        'defaultTaskHeartbeatTimeout' => array(
                            'type' => 'string',
                        ),
                        'defaultTaskList' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'defaultTaskScheduleToStartTimeout' => array(
                            'type' => 'string',
                        ),
                        'defaultTaskScheduleToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DomainDetail' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'domainInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'type' => 'string',
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'description' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'configuration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowExecutionRetentionPeriodInDays' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'WorkflowExecutionDetail' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'executionInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'execution' => array(
                            'type' => 'object',
                            'properties' => array(
                                'workflowId' => array(
                                    'type' => 'string',
                                ),
                                'runId' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'workflowType' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                                'version' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'startTimestamp' => array(
                            'type' => 'string',
                        ),
                        'closeTimestamp' => array(
                            'type' => 'string',
                        ),
                        'executionStatus' => array(
                            'type' => 'string',
                        ),
                        'closeStatus' => array(
                            'type' => 'string',
                        ),
                        'parent' => array(
                            'type' => 'object',
                            'properties' => array(
                                'workflowId' => array(
                                    'type' => 'string',
                                ),
                                'runId' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'tagList' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Tag',
                                'type' => 'string',
                            ),
                        ),
                        'cancelRequested' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
                'executionConfiguration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'taskStartToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                        'executionStartToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                        'taskList' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'childPolicy' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'openCounts' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'openActivityTasks' => array(
                            'type' => 'numeric',
                        ),
                        'openDecisionTasks' => array(
                            'type' => 'numeric',
                        ),
                        'openTimers' => array(
                            'type' => 'numeric',
                        ),
                        'openChildWorkflowExecutions' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'latestActivityTaskTimestamp' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'latestExecutionContext' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'WorkflowTypeDetail' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'typeInfo' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowType' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                                'version' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'description' => array(
                            'type' => 'string',
                        ),
                        'creationDate' => array(
                            'type' => 'string',
                        ),
                        'deprecationDate' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'configuration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'defaultTaskStartToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                        'defaultExecutionStartToCloseTimeout' => array(
                            'type' => 'string',
                        ),
                        'defaultTaskList' => array(
                            'type' => 'object',
                            'properties' => array(
                                'name' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'defaultChildPolicy' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'History' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'events' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'HistoryEvent',
                        'type' => 'object',
                        'properties' => array(
                            'eventTimestamp' => array(
                                'type' => 'string',
                            ),
                            'eventType' => array(
                                'type' => 'string',
                            ),
                            'eventId' => array(
                                'type' => 'numeric',
                            ),
                            'workflowExecutionStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'continuedExecutionRunId' => array(
                                        'type' => 'string',
                                    ),
                                    'parentWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'parentInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'completeWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'failWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'cancelWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionContinuedAsNewEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'newExecutionRunId' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'continueAsNewWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionTerminatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'externalWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'externalInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'decisionTaskScheduledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'startToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'decisionTaskStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'identity' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'decisionTaskCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'executionContext' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'decisionTaskTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskScheduledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduleToStartTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduleToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'startToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'heartbeatTimeout' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'activityTaskStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'identity' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'activityTaskCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'latestCancelRequestedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionSignaledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'signalName' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'externalWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'externalInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'markerRecordedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'markerName' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'recordMarkerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'markerName' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'startToFireTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerFiredEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startChildWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionTerminatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'signalExternalWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'signalName' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'externalWorkflowExecutionSignaledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'signalExternalWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'externalWorkflowExecutionCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'requestCancelExternalWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'requestCancelExternalWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'scheduleActivityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'requestCancelActivityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startTimerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'cancelTimerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startChildWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ActivityTypeInfos' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'typeInfos' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ActivityTypeInfo',
                        'type' => 'object',
                        'properties' => array(
                            'activityType' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'version' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                            'creationDate' => array(
                                'type' => 'string',
                            ),
                            'deprecationDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'WorkflowExecutionInfos' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'executionInfos' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'WorkflowExecutionInfo',
                        'type' => 'object',
                        'properties' => array(
                            'execution' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowType' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'version' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'startTimestamp' => array(
                                'type' => 'string',
                            ),
                            'closeTimestamp' => array(
                                'type' => 'string',
                            ),
                            'executionStatus' => array(
                                'type' => 'string',
                            ),
                            'closeStatus' => array(
                                'type' => 'string',
                            ),
                            'parent' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'tagList' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Tag',
                                    'type' => 'string',
                                ),
                            ),
                            'cancelRequested' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DomainInfos' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'domainInfos' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DomainInfo',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'WorkflowTypeInfos' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'typeInfos' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'WorkflowTypeInfo',
                        'type' => 'object',
                        'properties' => array(
                            'workflowType' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'version' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                            'creationDate' => array(
                                'type' => 'string',
                            ),
                            'deprecationDate' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ActivityTask' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'taskToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'activityId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'startedEventId' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'workflowExecution' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'type' => 'string',
                        ),
                        'runId' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'activityType' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'type' => 'string',
                        ),
                        'version' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'input' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DecisionTask' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'taskToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'startedEventId' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'workflowExecution' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'workflowId' => array(
                            'type' => 'string',
                        ),
                        'runId' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'workflowType' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'name' => array(
                            'type' => 'string',
                        ),
                        'version' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'events' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'HistoryEvent',
                        'type' => 'object',
                        'properties' => array(
                            'eventTimestamp' => array(
                                'type' => 'string',
                            ),
                            'eventType' => array(
                                'type' => 'string',
                            ),
                            'eventId' => array(
                                'type' => 'numeric',
                            ),
                            'workflowExecutionStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'continuedExecutionRunId' => array(
                                        'type' => 'string',
                                    ),
                                    'parentWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'parentInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'completeWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'failWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'cancelWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionContinuedAsNewEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'newExecutionRunId' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'continueAsNewWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'workflowExecutionTerminatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'externalWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'externalInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'decisionTaskScheduledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'startToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'decisionTaskStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'identity' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'decisionTaskCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'executionContext' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'decisionTaskTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskScheduledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduleToStartTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduleToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'startToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'heartbeatTimeout' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'activityTaskStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'identity' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'activityTaskCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'scheduledEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'latestCancelRequestedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'activityTaskCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'workflowExecutionSignaledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'signalName' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'externalWorkflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'externalInitiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'markerRecordedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'markerName' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'recordMarkerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'markerName' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'startToFireTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerFiredEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'timerCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startChildWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'executionStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'taskList' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'childPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'taskStartToCloseTimeout' => array(
                                        'type' => 'string',
                                    ),
                                    'tagList' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Tag',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionStartedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionCompletedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'result' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'reason' => array(
                                        'type' => 'string',
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionTimedOutEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'timeoutType' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionCanceledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'details' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'childWorkflowExecutionTerminatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'startedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'signalExternalWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'signalName' => array(
                                        'type' => 'string',
                                    ),
                                    'input' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'externalWorkflowExecutionSignaledEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'signalExternalWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'externalWorkflowExecutionCancelRequestedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowExecution' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'workflowId' => array(
                                                'type' => 'string',
                                            ),
                                            'runId' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'requestCancelExternalWorkflowExecutionInitiatedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'requestCancelExternalWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'runId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'scheduleActivityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'requestCancelActivityTaskFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'activityId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startTimerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'cancelTimerFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'timerId' => array(
                                        'type' => 'string',
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'startChildWorkflowExecutionFailedEventAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'workflowType' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'name' => array(
                                                'type' => 'string',
                                            ),
                                            'version' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'cause' => array(
                                        'type' => 'string',
                                    ),
                                    'workflowId' => array(
                                        'type' => 'string',
                                    ),
                                    'initiatedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'decisionTaskCompletedEventId' => array(
                                        'type' => 'numeric',
                                    ),
                                    'control' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'nextPageToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'previousStartedEventId' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
        ),
        'ActivityTaskStatus' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'cancelRequested' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'Run' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'runId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'GetWorkflowExecutionHistory' => array(
            'limit_key' => 'maximumPageSize',
            'input_token' => 'nextPageToken',
            'output_token' => 'nextPageToken',
            'result_key' => 'events',
        ),
        'ListActivityTypes' => array(
            'limit_key' => 'maximumPageSize',
            'input_token' => 'nextPageToken',
            'output_token' => 'nextPageToken',
            'result_key' => 'typeInfos',
        ),
        'ListClosedWorkflowExecutions' => array(
            'limit_key' => 'maximumPageSize',
            'input_token' => 'nextPageToken',
            'output_token' => 'nextPageToken',
            'result_key' => 'executionInfos',
        ),
        'ListDomains' => array(
            'limit_key' => 'maximumPageSize',
            'input_token' => 'nextPageToken',
            'output_token' => 'nextPageToken',
            'result_key' => 'domainInfos',
        ),
        'ListOpenWorkflowExecutions' => array(
            'limit_key' => 'maximumPageSize',
            'input_token' => 'nextPageToken',
            'output_token' => 'nextPageToken',
            'result_key' => 'executionInfos',
        ),
        'ListWorkflowTypes' => array(
            'limit_key' => 'maximumPageSize',
            'input_token' => 'nextPageToken',
            'output_token' => 'nextPageToken',
            'result_key' => 'typeInfos',
        ),
        'PollForDecisionTask' => array(
            'limit_key' => 'maximumPageSize',
            'input_token' => 'nextPageToken',
            'output_token' => 'nextPageToken',
            'result_key' => 'events',
        ),
    ),
);
