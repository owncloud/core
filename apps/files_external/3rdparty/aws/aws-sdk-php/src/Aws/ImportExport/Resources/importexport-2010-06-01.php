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
    'apiVersion' => '2010-06-01',
    'endpointPrefix' => 'importexport',
    'serviceFullName' => 'AWS Import/Export',
    'serviceType' => 'query',
    'globalEndpoint' => 'importexport.amazonaws.com',
    'resultWrapped' => true,
    'signatureVersion' => 'v2',
    'namespace' => 'ImportExport',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'importexport.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'importexport.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'importexport.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'importexport.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'importexport.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'importexport.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'importexport.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'importexport.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CancelJob' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CancelJobOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CancelJob',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-06-01',
                ),
                'JobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The JOBID was missing, not found, or not associated with the AWS account.',
                    'class' => 'InvalidJobIdException',
                ),
                array(
                    'reason' => 'Indicates that the specified job has expired out of the system.',
                    'class' => 'ExpiredJobIdException',
                ),
                array(
                    'reason' => 'The specified job ID has been canceled and is no longer valid.',
                    'class' => 'CanceledJobIdException',
                ),
                array(
                    'reason' => 'AWS Import/Export cannot cancel the job',
                    'class' => 'UnableToCancelJobIdException',
                ),
                array(
                    'reason' => 'The AWS Access Key ID specified in the request did not match the manifest\'s accessKeyId value. The manifest and the request authentication must use the same AWS Access Key ID.',
                    'class' => 'InvalidAccessKeyIdException',
                ),
            ),
        ),
        'CreateJob' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateJobOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateJob',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-06-01',
                ),
                'JobType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Manifest' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ManifestAddendum' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ValidateOnly' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameters was missing from the request.',
                    'class' => 'MissingParameterException',
                ),
                array(
                    'reason' => 'One or more parameters had an invalid value.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'One or more parameters had an invalid value.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'The AWS Access Key ID specified in the request did not match the manifest\'s accessKeyId value. The manifest and the request authentication must use the same AWS Access Key ID.',
                    'class' => 'InvalidAccessKeyIdException',
                ),
                array(
                    'reason' => 'The address specified in the manifest is invalid.',
                    'class' => 'InvalidAddressException',
                ),
                array(
                    'reason' => 'One or more manifest fields was invalid. Please correct and resubmit.',
                    'class' => 'InvalidManifestFieldException',
                ),
                array(
                    'reason' => 'One or more required fields were missing from the manifest file. Please correct and resubmit.',
                    'class' => 'MissingManifestFieldException',
                ),
                array(
                    'reason' => 'The specified bucket does not exist. Create the specified bucket or change the manifest\'s bucket, exportBucket, or logBucket field to a bucket that the account, as specified by the manifest\'s Access Key ID, has write permissions to.',
                    'class' => 'NoSuchBucketException',
                ),
                array(
                    'reason' => 'One or more required customs parameters was missing from the manifest.',
                    'class' => 'MissingCustomsException',
                ),
                array(
                    'reason' => 'One or more customs parameters was invalid. Please correct and resubmit.',
                    'class' => 'InvalidCustomsException',
                ),
                array(
                    'reason' => 'File system specified in export manifest is invalid.',
                    'class' => 'InvalidFileSystemException',
                ),
                array(
                    'reason' => 'Your manifest file contained buckets from multiple regions. A job is restricted to buckets from one region. Please correct and resubmit.',
                    'class' => 'MultipleRegionsException',
                ),
                array(
                    'reason' => 'The account specified does not have the appropriate bucket permissions.',
                    'class' => 'BucketPermissionException',
                ),
                array(
                    'reason' => 'Your manifest is not well-formed.',
                    'class' => 'MalformedManifestException',
                ),
            ),
        ),
        'GetStatus' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetStatusOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetStatus',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-06-01',
                ),
                'JobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The JOBID was missing, not found, or not associated with the AWS account.',
                    'class' => 'InvalidJobIdException',
                ),
                array(
                    'reason' => 'Indicates that the specified job has expired out of the system.',
                    'class' => 'ExpiredJobIdException',
                ),
                array(
                    'reason' => 'The specified job ID has been canceled and is no longer valid.',
                    'class' => 'CanceledJobIdException',
                ),
                array(
                    'reason' => 'The AWS Access Key ID specified in the request did not match the manifest\'s accessKeyId value. The manifest and the request authentication must use the same AWS Access Key ID.',
                    'class' => 'InvalidAccessKeyIdException',
                ),
            ),
        ),
        'ListJobs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListJobsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListJobs',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-06-01',
                ),
                'MaxJobs' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more parameters had an invalid value.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'The AWS Access Key ID specified in the request did not match the manifest\'s accessKeyId value. The manifest and the request authentication must use the same AWS Access Key ID.',
                    'class' => 'InvalidAccessKeyIdException',
                ),
            ),
        ),
        'UpdateJob' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UpdateJobOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateJob',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-06-01',
                ),
                'JobId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Manifest' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'JobType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ValidateOnly' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'One or more required parameters was missing from the request.',
                    'class' => 'MissingParameterException',
                ),
                array(
                    'reason' => 'One or more parameters had an invalid value.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'The AWS Access Key ID specified in the request did not match the manifest\'s accessKeyId value. The manifest and the request authentication must use the same AWS Access Key ID.',
                    'class' => 'InvalidAccessKeyIdException',
                ),
                array(
                    'reason' => 'The address specified in the manifest is invalid.',
                    'class' => 'InvalidAddressException',
                ),
                array(
                    'reason' => 'One or more manifest fields was invalid. Please correct and resubmit.',
                    'class' => 'InvalidManifestFieldException',
                ),
                array(
                    'reason' => 'The JOBID was missing, not found, or not associated with the AWS account.',
                    'class' => 'InvalidJobIdException',
                ),
                array(
                    'reason' => 'One or more required fields were missing from the manifest file. Please correct and resubmit.',
                    'class' => 'MissingManifestFieldException',
                ),
                array(
                    'reason' => 'The specified bucket does not exist. Create the specified bucket or change the manifest\'s bucket, exportBucket, or logBucket field to a bucket that the account, as specified by the manifest\'s Access Key ID, has write permissions to.',
                    'class' => 'NoSuchBucketException',
                ),
                array(
                    'reason' => 'Indicates that the specified job has expired out of the system.',
                    'class' => 'ExpiredJobIdException',
                ),
                array(
                    'reason' => 'The specified job ID has been canceled and is no longer valid.',
                    'class' => 'CanceledJobIdException',
                ),
                array(
                    'reason' => 'One or more required customs parameters was missing from the manifest.',
                    'class' => 'MissingCustomsException',
                ),
                array(
                    'reason' => 'One or more customs parameters was invalid. Please correct and resubmit.',
                    'class' => 'InvalidCustomsException',
                ),
                array(
                    'reason' => 'File system specified in export manifest is invalid.',
                    'class' => 'InvalidFileSystemException',
                ),
                array(
                    'reason' => 'Your manifest file contained buckets from multiple regions. A job is restricted to buckets from one region. Please correct and resubmit.',
                    'class' => 'MultipleRegionsException',
                ),
                array(
                    'reason' => 'The account specified does not have the appropriate bucket permissions.',
                    'class' => 'BucketPermissionException',
                ),
                array(
                    'reason' => 'Your manifest is not well-formed.',
                    'class' => 'MalformedManifestException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CancelJobOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Success' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
            ),
        ),
        'CreateJobOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'JobId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'JobType' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'AwsShippingAddress' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Signature' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'SignatureFileContents' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'WarningMessage' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetStatusOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'JobId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'JobType' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'AwsShippingAddress' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LocationCode' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LocationMessage' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ProgressCode' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ProgressMessage' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Carrier' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'TrackingNumber' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LogBucket' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LogKey' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ErrorCount' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'Signature' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'SignatureFileContents' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CurrentManifest' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CreationDate' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListJobsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Jobs' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Job',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'JobId' => array(
                                'type' => 'string',
                            ),
                            'CreationDate' => array(
                                'type' => 'string',
                            ),
                            'IsCanceled' => array(
                                'type' => 'boolean',
                            ),
                            'JobType' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
            ),
        ),
        'UpdateJobOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Success' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'WarningMessage' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListJobs' => array(
            'input_token' => 'Marker',
            'output_token' => 'Jobs/#/JobId',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxJobs',
            'result_key' => 'Jobs',
        ),
    ),
);
