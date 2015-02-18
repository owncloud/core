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
    'apiVersion' => '2012-06-01',
    'endpointPrefix' => 'glacier',
    'serviceFullName' => 'Amazon Glacier',
    'serviceType' => 'rest-json',
    'signatureVersion' => 'v4',
    'namespace' => 'Glacier',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'glacier.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'glacier.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'glacier.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'glacier.eu-west-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'glacier.ap-southeast-2.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'glacier.ap-northeast-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'glacier.cn-north-1.amazonaws.com.cn',
        ),
    ),
    'operations' => array(
        'AbortMultipartUpload' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'uploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'CompleteMultipartUpload' => array(
            'httpMethod' => 'POST',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ArchiveCreationOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'uploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'archiveSize' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-archive-size',
                ),
                'checksum' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-sha256-tree-hash',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'CreateVault' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{accountId}/vaults/{vaultName}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateVaultOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
                array(
                    'reason' => 'Returned if the request results in a vault or account limit being exceeded.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'DeleteArchive' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{accountId}/vaults/{vaultName}/archives/{archiveId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'archiveId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'DeleteVault' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{accountId}/vaults/{vaultName}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'DeleteVaultNotifications' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/{accountId}/vaults/{vaultName}/notification-configuration',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'DescribeJob' => array(
            'httpMethod' => 'GET',
            'uri' => '/{accountId}/vaults/{vaultName}/jobs/{jobId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GlacierJobDescription',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'DescribeVault' => array(
            'httpMethod' => 'GET',
            'uri' => '/{accountId}/vaults/{vaultName}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DescribeVaultOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'GetJobOutput' => array(
            'httpMethod' => 'GET',
            'uri' => '/{accountId}/vaults/{vaultName}/jobs/{jobId}/output',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetJobOutputOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'jobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'range' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Range',
                ),
                'saveAs' => array(
                    'location' => 'response_body',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'GetVaultNotifications' => array(
            'httpMethod' => 'GET',
            'uri' => '/{accountId}/vaults/{vaultName}/notification-configuration',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetVaultNotificationsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'InitiateJob' => array(
            'httpMethod' => 'POST',
            'uri' => '/{accountId}/vaults/{vaultName}/jobs',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'InitiateJobOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Format' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Type' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ArchiveId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SNSTopic' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RetrievalByteRange' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InventoryRetrievalParameters' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'StartDate' => array(
                            'type' => 'string',
                        ),
                        'EndDate' => array(
                            'type' => 'string',
                        ),
                        'Limit' => array(
                            'type' => 'string',
                        ),
                        'Marker' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'InitiateMultipartUpload' => array(
            'httpMethod' => 'POST',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'InitiateMultipartUploadOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'archiveDescription' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-archive-description',
                ),
                'partSize' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-part-size',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'ListJobs' => array(
            'httpMethod' => 'GET',
            'uri' => '/{accountId}/vaults/{vaultName}/jobs',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListJobsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'limit' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'statuscode' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'completed' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'ListMultipartUploads' => array(
            'httpMethod' => 'GET',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListMultipartUploadsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'limit' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'ListParts' => array(
            'httpMethod' => 'GET',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListPartsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'uploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'limit' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'ListVaults' => array(
            'httpMethod' => 'GET',
            'uri' => '/{accountId}/vaults',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListVaultsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'limit' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'SetVaultNotifications' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{accountId}/vaults/{vaultName}/notification-configuration',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'SNSTopic' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Events' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'string',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'UploadArchive' => array(
            'httpMethod' => 'POST',
            'uri' => '/{accountId}/vaults/{vaultName}/archives',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ArchiveCreationOutput',
            'responseType' => 'model',
            'parameters' => array(
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'archiveDescription' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-archive-description',
                ),
                'checksum' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-sha256-tree-hash',
                ),
                'body' => array(
                    'type' => array(
                        'string',
                        'object',
                    ),
                    'location' => 'body',
                ),
                'ContentSHA256' => array(
                    'default' => true,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if, when uploading an archive, Amazon Glacier times out while receiving the upload.',
                    'class' => 'RequestTimeoutException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'UploadMultipartPart' => array(
            'httpMethod' => 'PUT',
            'uri' => '/{accountId}/vaults/{vaultName}/multipart-uploads/{uploadId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UploadMultipartPartOutput',
            'responseType' => 'model',
            'parameters' => array(
                'accountId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'vaultName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'uploadId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'checksum' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-sha256-tree-hash',
                ),
                'range' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Range',
                ),
                'body' => array(
                    'type' => array(
                        'string',
                        'object',
                    ),
                    'location' => 'body',
                ),
                'ContentSHA256' => array(
                    'default' => true,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if the specified resource, such as a vault, upload ID, or job ID, does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'Returned if a required header or parameter is missing from the request.',
                    'class' => 'MissingParameterValueException',
                ),
                array(
                    'reason' => 'Returned if, when uploading an archive, Amazon Glacier times out while receiving the upload.',
                    'class' => 'RequestTimeoutException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'ArchiveCreationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'location' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Location',
                ),
                'checksum' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-sha256-tree-hash',
                ),
                'archiveId' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-archive-id',
                ),
            ),
        ),
        'CreateVaultOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'location' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Location',
                ),
            ),
        ),
        'GlacierJobDescription' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'JobId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'JobDescription' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Action' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ArchiveId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VaultARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreationDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Completed' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
                'StatusCode' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StatusMessage' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ArchiveSizeInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'InventorySizeInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'SNSTopic' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CompletionDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SHA256TreeHash' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ArchiveSHA256TreeHash' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'RetrievalByteRange' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InventoryRetrievalParameters' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'Format' => array(
                            'type' => 'string',
                        ),
                        'StartDate' => array(
                            'type' => 'string',
                        ),
                        'EndDate' => array(
                            'type' => 'string',
                        ),
                        'Limit' => array(
                            'type' => 'string',
                        ),
                        'Marker' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DescribeVaultOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VaultARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VaultName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CreationDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LastInventoryDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'NumberOfArchives' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'SizeInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
        ),
        'GetJobOutputOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'body' => array(
                    'type' => 'string',
                    'instanceOf' => 'Guzzle\\Http\\EntityBody',
                    'location' => 'body',
                ),
                'checksum' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-sha256-tree-hash',
                ),
                'status' => array(
                    'type' => 'numeric',
                    'location' => 'statusCode',
                ),
                'contentRange' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Range',
                ),
                'acceptRanges' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Accept-Ranges',
                ),
                'contentType' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Content-Type',
                ),
                'archiveDescription' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-archive-description',
                ),
            ),
        ),
        'GetVaultNotificationsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SNSTopic' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Events' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'string',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'InitiateJobOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'location' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Location',
                ),
                'jobId' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-job-id',
                ),
            ),
        ),
        'InitiateMultipartUploadOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'location' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'Location',
                ),
                'uploadId' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-multipart-upload-id',
                ),
            ),
        ),
        'ListJobsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'JobList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'GlacierJobDescription',
                        'type' => 'object',
                        'properties' => array(
                            'JobId' => array(
                                'type' => 'string',
                            ),
                            'JobDescription' => array(
                                'type' => 'string',
                            ),
                            'Action' => array(
                                'type' => 'string',
                            ),
                            'ArchiveId' => array(
                                'type' => 'string',
                            ),
                            'VaultARN' => array(
                                'type' => 'string',
                            ),
                            'CreationDate' => array(
                                'type' => 'string',
                            ),
                            'Completed' => array(
                                'type' => 'boolean',
                            ),
                            'StatusCode' => array(
                                'type' => 'string',
                            ),
                            'StatusMessage' => array(
                                'type' => 'string',
                            ),
                            'ArchiveSizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'InventorySizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'SNSTopic' => array(
                                'type' => 'string',
                            ),
                            'CompletionDate' => array(
                                'type' => 'string',
                            ),
                            'SHA256TreeHash' => array(
                                'type' => 'string',
                            ),
                            'ArchiveSHA256TreeHash' => array(
                                'type' => 'string',
                            ),
                            'RetrievalByteRange' => array(
                                'type' => 'string',
                            ),
                            'InventoryRetrievalParameters' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Format' => array(
                                        'type' => 'string',
                                    ),
                                    'StartDate' => array(
                                        'type' => 'string',
                                    ),
                                    'EndDate' => array(
                                        'type' => 'string',
                                    ),
                                    'Limit' => array(
                                        'type' => 'string',
                                    ),
                                    'Marker' => array(
                                        'type' => 'string',
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
        'ListMultipartUploadsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'UploadsList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'UploadListElement',
                        'type' => 'object',
                        'properties' => array(
                            'MultipartUploadId' => array(
                                'type' => 'string',
                            ),
                            'VaultARN' => array(
                                'type' => 'string',
                            ),
                            'ArchiveDescription' => array(
                                'type' => 'string',
                            ),
                            'PartSizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'CreationDate' => array(
                                'type' => 'string',
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
        'ListPartsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MultipartUploadId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VaultARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ArchiveDescription' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'PartSizeInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'CreationDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Parts' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PartListElement',
                        'type' => 'object',
                        'properties' => array(
                            'RangeInBytes' => array(
                                'type' => 'string',
                            ),
                            'SHA256TreeHash' => array(
                                'type' => 'string',
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
        'ListVaultsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VaultList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DescribeVaultOutput',
                        'type' => 'object',
                        'properties' => array(
                            'VaultARN' => array(
                                'type' => 'string',
                            ),
                            'VaultName' => array(
                                'type' => 'string',
                            ),
                            'CreationDate' => array(
                                'type' => 'string',
                            ),
                            'LastInventoryDate' => array(
                                'type' => 'string',
                            ),
                            'NumberOfArchives' => array(
                                'type' => 'numeric',
                            ),
                            'SizeInBytes' => array(
                                'type' => 'numeric',
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
        'UploadMultipartPartOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'checksum' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-sha256-tree-hash',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListJobs' => array(
            'input_token' => 'marker',
            'output_token' => 'Marker',
            'limit_key' => 'limit',
            'result_key' => 'JobList',
        ),
        'ListMultipartUploads' => array(
            'input_token' => 'marker',
            'output_token' => 'Marker',
            'limit_key' => 'limit',
            'result_key' => 'UploadsList',
        ),
        'ListParts' => array(
            'input_token' => 'marker',
            'output_token' => 'Marker',
            'limit_key' => 'limit',
            'result_key' => 'Parts',
        ),
        'ListVaults' => array(
            'input_token' => 'marker',
            'output_token' => 'Marker',
            'limit_key' => 'limit',
            'result_key' => 'VaultList',
        ),
    ),
    'waiters' => array(
        '__default__' => array(
            'interval' => 3,
            'max_attempts' => 15,
        ),
        '__VaultState' => array(
            'operation' => 'DescribeVault',
        ),
        'VaultExists' => array(
            'extends' => '__VaultState',
            'success.type' => 'output',
            'ignore_errors' => array(
                'ResourceNotFoundException',
            ),
        ),
        'VaultNotExists' => array(
            'extends' => '__VaultState',
            'success.type' => 'error',
            'success.value' => 'ResourceNotFoundException',
        ),
    ),
);
