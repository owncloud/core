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
    'apiVersion' => '2012-10-29',
    'endpointPrefix' => 'datapipeline',
    'serviceFullName' => 'AWS Data Pipeline',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'DataPipeline.',
    'signatureVersion' => 'v4',
    'namespace' => 'DataPipeline',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'datapipeline.us-east-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'datapipeline.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'datapipeline.eu-west-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'datapipeline.ap-southeast-2.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'datapipeline.ap-northeast-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'ActivatePipeline' => array(
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
                    'default' => 'DataPipeline.ActivatePipeline',
                ),
                'pipelineId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline has been deleted.',
                    'class' => 'PipelineDeletedException',
                ),
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'CreatePipeline' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreatePipelineOutput',
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
                    'default' => 'DataPipeline.CreatePipeline',
                ),
                'name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'uniqueId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'description' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'DeletePipeline' => array(
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
                    'default' => 'DataPipeline.DeletePipeline',
                ),
                'pipelineId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'DescribeObjects' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeObjectsOutput',
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
                    'default' => 'DataPipeline.DescribeObjects',
                ),
                'pipelineId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'objectIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'id',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1024,
                    ),
                ),
                'evaluateExpressions' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline has been deleted.',
                    'class' => 'PipelineDeletedException',
                ),
            ),
        ),
        'DescribePipelines' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribePipelinesOutput',
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
                    'default' => 'DataPipeline.DescribePipelines',
                ),
                'pipelineIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'id',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1024,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline has been deleted.',
                    'class' => 'PipelineDeletedException',
                ),
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'EvaluateExpression' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EvaluateExpressionOutput',
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
                    'default' => 'DataPipeline.EvaluateExpression',
                ),
                'pipelineId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'objectId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'expression' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 20971520,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The specified task was not found.',
                    'class' => 'TaskNotFoundException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline has been deleted.',
                    'class' => 'PipelineDeletedException',
                ),
            ),
        ),
        'GetPipelineDefinition' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetPipelineDefinitionOutput',
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
                    'default' => 'DataPipeline.GetPipelineDefinition',
                ),
                'pipelineId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'version' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline has been deleted.',
                    'class' => 'PipelineDeletedException',
                ),
            ),
        ),
        'ListPipelines' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListPipelinesOutput',
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
                    'default' => 'DataPipeline.ListPipelines',
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'PollForTask' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PollForTaskOutput',
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
                    'default' => 'DataPipeline.PollForTask',
                ),
                'workerGroup' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'hostname' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'instanceIdentity' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'document' => array(
                            'type' => 'string',
                            'maxLength' => 1024,
                        ),
                        'signature' => array(
                            'type' => 'string',
                            'maxLength' => 1024,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
                array(
                    'reason' => 'The specified task was not found.',
                    'class' => 'TaskNotFoundException',
                ),
            ),
        ),
        'PutPipelineDefinition' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PutPipelineDefinitionOutput',
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
                    'default' => 'DataPipeline.PutPipelineDefinition',
                ),
                'pipelineId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'pipelineObjects' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PipelineObject',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 1024,
                            ),
                            'name' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 1024,
                            ),
                            'fields' => array(
                                'required' => true,
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Field',
                                    'type' => 'object',
                                    'properties' => array(
                                        'key' => array(
                                            'required' => true,
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 256,
                                        ),
                                        'stringValue' => array(
                                            'type' => 'string',
                                            'maxLength' => 10240,
                                        ),
                                        'refValue' => array(
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
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline has been deleted.',
                    'class' => 'PipelineDeletedException',
                ),
            ),
        ),
        'QueryObjects' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'QueryObjectsOutput',
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
                    'default' => 'DataPipeline.QueryObjects',
                ),
                'pipelineId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'query' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'selectors' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Selector',
                                'type' => 'object',
                                'properties' => array(
                                    'fieldName' => array(
                                        'type' => 'string',
                                        'maxLength' => 1024,
                                    ),
                                    'operator' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            '' => array(
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'sphere' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline has been deleted.',
                    'class' => 'PipelineDeletedException',
                ),
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ReportTaskProgress' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ReportTaskProgressOutput',
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
                    'default' => 'DataPipeline.ReportTaskProgress',
                ),
                'taskId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 2048,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
                array(
                    'reason' => 'The specified task was not found.',
                    'class' => 'TaskNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline has been deleted.',
                    'class' => 'PipelineDeletedException',
                ),
            ),
        ),
        'ReportTaskRunnerHeartbeat' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ReportTaskRunnerHeartbeatOutput',
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
                    'default' => 'DataPipeline.ReportTaskRunnerHeartbeat',
                ),
                'taskrunnerId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'workerGroup' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'hostname' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'SetStatus' => array(
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
                    'default' => 'DataPipeline.SetStatus',
                ),
                'pipelineId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'objectIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'id',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1024,
                    ),
                ),
                'status' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline has been deleted.',
                    'class' => 'PipelineDeletedException',
                ),
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'SetTaskStatus' => array(
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
                    'default' => 'DataPipeline.SetTaskStatus',
                ),
                'taskId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 2048,
                ),
                'taskStatus' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'errorId' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
                'errorMessage' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'errorStackTrace' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The specified task was not found.',
                    'class' => 'TaskNotFoundException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline has been deleted.',
                    'class' => 'PipelineDeletedException',
                ),
            ),
        ),
        'ValidatePipelineDefinition' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ValidatePipelineDefinitionOutput',
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
                    'default' => 'DataPipeline.ValidatePipelineDefinition',
                ),
                'pipelineId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'pipelineObjects' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PipelineObject',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 1024,
                            ),
                            'name' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 1024,
                            ),
                            'fields' => array(
                                'required' => true,
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Field',
                                    'type' => 'object',
                                    'properties' => array(
                                        'key' => array(
                                            'required' => true,
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 256,
                                        ),
                                        'stringValue' => array(
                                            'type' => 'string',
                                            'maxLength' => 10240,
                                        ),
                                        'refValue' => array(
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
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An internal service error occurred.',
                    'class' => 'InternalServiceErrorException',
                ),
                array(
                    'reason' => 'The request was not valid. Verify that your request was properly formatted, that the signature was generated with the correct credentials, and that you haven\'t exceeded any of the service limits for your account.',
                    'class' => 'InvalidRequestException',
                ),
                array(
                    'reason' => 'The specified pipeline was not found. Verify that you used the correct user and account identifiers.',
                    'class' => 'PipelineNotFoundException',
                ),
                array(
                    'reason' => 'The specified pipeline has been deleted.',
                    'class' => 'PipelineDeletedException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'CreatePipelineOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'pipelineId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeObjectsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'pipelineObjects' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PipelineObject',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'type' => 'string',
                            ),
                            'name' => array(
                                'type' => 'string',
                            ),
                            'fields' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Field',
                                    'type' => 'object',
                                    'properties' => array(
                                        'key' => array(
                                            'type' => 'string',
                                        ),
                                        'stringValue' => array(
                                            'type' => 'string',
                                        ),
                                        'refValue' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'hasMoreResults' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribePipelinesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'pipelineDescriptionList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PipelineDescription',
                        'type' => 'object',
                        'properties' => array(
                            'pipelineId' => array(
                                'type' => 'string',
                            ),
                            'name' => array(
                                'type' => 'string',
                            ),
                            'fields' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Field',
                                    'type' => 'object',
                                    'properties' => array(
                                        'key' => array(
                                            'type' => 'string',
                                        ),
                                        'stringValue' => array(
                                            'type' => 'string',
                                        ),
                                        'refValue' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'EvaluateExpressionOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'evaluatedExpression' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetPipelineDefinitionOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'pipelineObjects' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PipelineObject',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'type' => 'string',
                            ),
                            'name' => array(
                                'type' => 'string',
                            ),
                            'fields' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Field',
                                    'type' => 'object',
                                    'properties' => array(
                                        'key' => array(
                                            'type' => 'string',
                                        ),
                                        'stringValue' => array(
                                            'type' => 'string',
                                        ),
                                        'refValue' => array(
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
        'ListPipelinesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'pipelineIdList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PipelineIdName',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'type' => 'string',
                            ),
                            'name' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'hasMoreResults' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'PollForTaskOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'taskObject' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'taskId' => array(
                            'type' => 'string',
                        ),
                        'pipelineId' => array(
                            'type' => 'string',
                        ),
                        'attemptId' => array(
                            'type' => 'string',
                        ),
                        'objects' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'id' => array(
                                        'type' => 'string',
                                    ),
                                    'name' => array(
                                        'type' => 'string',
                                    ),
                                    'fields' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Field',
                                            'type' => 'object',
                                            'properties' => array(
                                                'key' => array(
                                                    'type' => 'string',
                                                ),
                                                'stringValue' => array(
                                                    'type' => 'string',
                                                ),
                                                'refValue' => array(
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
            ),
        ),
        'PutPipelineDefinitionOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'validationErrors' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ValidationError',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'type' => 'string',
                            ),
                            'errors' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'validationMessage',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'validationWarnings' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ValidationWarning',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'type' => 'string',
                            ),
                            'warnings' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'validationMessage',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'errored' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'QueryObjectsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ids' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'id',
                        'type' => 'string',
                    ),
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'hasMoreResults' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'ReportTaskProgressOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'canceled' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'ReportTaskRunnerHeartbeatOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'terminate' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'ValidatePipelineDefinitionOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'validationErrors' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ValidationError',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'type' => 'string',
                            ),
                            'errors' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'validationMessage',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'validationWarnings' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ValidationWarning',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'type' => 'string',
                            ),
                            'warnings' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'validationMessage',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
                'errored' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListPipelines' => array(
            'input_token' => 'marker',
            'output_token' => 'marker',
            'more_results' => 'hasMoreResults',
            'result_key' => 'pipelineIdList',
        ),
        'DescribeObjects' => array(
            'input_token' => 'marker',
            'output_token' => 'marker',
            'more_results' => 'hasMoreResults',
            'result_key' => 'pipelineObjects',
        ),
        'DescribePipelines' => array(
            'result_key' => 'pipelineDescriptionList',
        ),
        'QueryObjects' => array(
            'input_token' => 'marker',
            'output_token' => 'marker',
            'more_results' => 'hasMoreResults',
            'limit_key' => 'limit',
            'result_key' => 'ids',
        ),
    ),
);
