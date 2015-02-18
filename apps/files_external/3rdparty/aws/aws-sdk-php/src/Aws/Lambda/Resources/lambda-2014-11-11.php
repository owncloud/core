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
    'apiVersion' => '2014-11-11',
    'endpointPrefix' => 'lambda',
    'serviceFullName' => 'AWS Lambda',
    'serviceType' => 'rest-json',
    'signatureVersion' => 'v4',
    'namespace' => 'Lambda',
    'operations' => array(
        'AddEventSource' => array(
            'httpMethod' => 'POST',
            'uri' => '/2014-11-13/event-source-mappings/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EventSourceConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'EventSource' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'Role' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'BatchSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'Parameters' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'String',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the UploadFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
            ),
        ),
        'DeleteFunction' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2014-11-13/functions/{FunctionName}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The function or the event source specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'GetEventSource' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-11-13/event-source-mappings/{UUID}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EventSourceConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'UUID' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The function or the event source specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the UploadFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
            ),
        ),
        'GetFunction' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-11-13/functions/{FunctionName}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetFunctionResponse',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The function or the event source specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'GetFunctionConfiguration' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-11-13/functions/{FunctionName}/configuration',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'FunctionConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The function or the event source specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'InvokeAsync' => array(
            'httpMethod' => 'POST',
            'uri' => '/2014-11-13/functions/{FunctionName}/invoke-async/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'InvokeAsyncResponse',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'InvokeArgs' => array(
                    'required' => true,
                    'type' => array(
                        'string',
                        'object',
                    ),
                    'location' => 'body',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The function or the event source specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The request body could not be parsed as JSON.',
                    'class' => 'InvalidRequestContentException',
                ),
            ),
        ),
        'ListEventSources' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-11-13/event-source-mappings/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListEventSourcesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'EventSourceArn' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'EventSource',
                ),
                'FunctionName' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The function or the event source specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the UploadFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
            ),
        ),
        'ListFunctions' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-11-13/functions/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListFunctionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
            ),
        ),
        'RemoveEventSource' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2014-11-13/event-source-mappings/{UUID}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'UUID' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The function or the event source specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the UploadFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
            ),
        ),
        'UpdateFunctionConfiguration' => array(
            'httpMethod' => 'PUT',
            'uri' => '/2014-11-13/functions/{FunctionName}/configuration',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'FunctionConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'Role' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'Handler' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'maxLength' => 256,
                ),
                'Timeout' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 1,
                    'maximum' => 60,
                ),
                'MemorySize' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 64,
                    'maximum' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'The function or the event source specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the UploadFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
            ),
        ),
        'UploadFunction' => array(
            'httpMethod' => 'PUT',
            'uri' => '/2014-11-13/functions/{FunctionName}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'FunctionConfiguration',
            'responseType' => 'model',
            'parameters' => array(
                'FunctionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'FunctionZip' => array(
                    'required' => true,
                    'type' => array(
                        'string',
                        'object',
                    ),
                    'location' => 'body',
                ),
                'Runtime' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                ),
                'Role' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                ),
                'Handler' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                ),
                'Mode' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'query',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'maxLength' => 256,
                ),
                'Timeout' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 1,
                    'maximum' => 60,
                ),
                'MemorySize' => array(
                    'type' => 'numeric',
                    'location' => 'query',
                    'minimum' => 64,
                    'maximum' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The AWS Lambda service encountered an internal error.',
                    'class' => 'ServiceException',
                ),
                array(
                    'reason' => 'One of the parameters in the request is invalid. For example, if you provided an IAM role for AWS Lambda to assume in the UploadFunction or the UpdateFunctionConfiguration API, that AWS Lambda is unable to assume you will get this exception.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'The function or the event source specified in the request does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EventSourceConfiguration' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'UUID' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'BatchSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'EventSource' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'FunctionName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Parameters' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                    ),
                ),
                'Role' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LastModified' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IsActive' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'GetFunctionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Configuration' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'FunctionName' => array(
                            'type' => 'string',
                        ),
                        'FunctionARN' => array(
                            'type' => 'string',
                        ),
                        'ConfigurationId' => array(
                            'type' => 'string',
                        ),
                        'Runtime' => array(
                            'type' => 'string',
                        ),
                        'Role' => array(
                            'type' => 'string',
                        ),
                        'Handler' => array(
                            'type' => 'string',
                        ),
                        'Mode' => array(
                            'type' => 'string',
                        ),
                        'CodeSize' => array(
                            'type' => 'numeric',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'Timeout' => array(
                            'type' => 'numeric',
                        ),
                        'MemorySize' => array(
                            'type' => 'numeric',
                        ),
                        'LastModified' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Code' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'RepositoryType' => array(
                            'type' => 'string',
                        ),
                        'Location' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'FunctionConfiguration' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'FunctionName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'FunctionARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ConfigurationId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Runtime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Role' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Handler' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Mode' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CodeSize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Timeout' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'MemorySize' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'LastModified' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'InvokeAsyncResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Status' => array(
                    'type' => 'numeric',
                    'location' => 'statusCode',
                ),
            ),
        ),
        'ListEventSourcesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'EventSources' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'EventSourceConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'UUID' => array(
                                'type' => 'string',
                            ),
                            'BatchSize' => array(
                                'type' => 'numeric',
                            ),
                            'EventSource' => array(
                                'type' => 'string',
                            ),
                            'FunctionName' => array(
                                'type' => 'string',
                            ),
                            'Parameters' => array(
                                'type' => 'object',
                                'additionalProperties' => array(
                                    'type' => 'string',
                                ),
                            ),
                            'Role' => array(
                                'type' => 'string',
                            ),
                            'LastModified' => array(
                                'type' => 'string',
                            ),
                            'IsActive' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListFunctionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Functions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'FunctionConfiguration',
                        'type' => 'object',
                        'properties' => array(
                            'FunctionName' => array(
                                'type' => 'string',
                            ),
                            'FunctionARN' => array(
                                'type' => 'string',
                            ),
                            'ConfigurationId' => array(
                                'type' => 'string',
                            ),
                            'Runtime' => array(
                                'type' => 'string',
                            ),
                            'Role' => array(
                                'type' => 'string',
                            ),
                            'Handler' => array(
                                'type' => 'string',
                            ),
                            'Mode' => array(
                                'type' => 'string',
                            ),
                            'CodeSize' => array(
                                'type' => 'numeric',
                            ),
                            'Description' => array(
                                'type' => 'string',
                            ),
                            'Timeout' => array(
                                'type' => 'numeric',
                            ),
                            'MemorySize' => array(
                                'type' => 'numeric',
                            ),
                            'LastModified' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
