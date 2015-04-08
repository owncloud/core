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
    'apiVersion' => '2014-11-01',
    'endpointPrefix' => 'kms',
    'serviceFullName' => 'AWS Key Management Service',
    'serviceAbbreviation' => 'KMS',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'TrentService.',
    'signatureVersion' => 'v4',
    'namespace' => 'Kms',
    'operations' => array(
        'CreateAlias' => array(
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
                    'default' => 'TrentService.CreateAlias',
                ),
                'AliasName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'TargetKeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to create a resource that already exists.',
                    'class' => 'AlreadyExistsException',
                ),
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because the specified alias name is not valid.',
                    'class' => 'InvalidAliasNameException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
                array(
                    'reason' => 'The request was rejected because a quota was exceeded.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'CreateGrant' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateGrantResponse',
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
                    'default' => 'TrentService.CreateGrant',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'GranteePrincipal' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'RetiringPrincipal' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'Operations' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'GrantOperation',
                        'type' => 'string',
                    ),
                ),
                'Constraints' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'EncryptionContextSubset' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                                'data' => array(
                                    'shape_name' => 'EncryptionContextKey',
                                ),
                            ),
                        ),
                        'EncryptionContextEquals' => array(
                            'type' => 'object',
                            'additionalProperties' => array(
                                'type' => 'string',
                                'data' => array(
                                    'shape_name' => 'EncryptionContextKey',
                                ),
                            ),
                        ),
                    ),
                ),
                'GrantTokens' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'GrantTokenType',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 8192,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A request was rejected because the specified key was marked as disabled.',
                    'class' => 'DisabledException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
                array(
                    'reason' => 'A grant token provided as part of the request is invalid.',
                    'class' => 'InvalidGrantTokenException',
                ),
                array(
                    'reason' => 'The request was rejected because a quota was exceeded.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'CreateKey' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateKeyResponse',
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
                    'default' => 'TrentService.CreateKey',
                ),
                'Policy' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 131072,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8192,
                ),
                'KeyUsage' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified policy is not syntactically or semantically correct.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified parameter is not supported.',
                    'class' => 'UnsupportedOperationException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
                array(
                    'reason' => 'The request was rejected because a quota was exceeded.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'Decrypt' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DecryptResponse',
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
                    'default' => 'TrentService.Decrypt',
                ),
                'CiphertextBlob' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'filters' => array(
                        'base64_encode',
                    ),
                ),
                'EncryptionContext' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'EncryptionContextKey',
                        ),
                    ),
                ),
                'GrantTokens' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'GrantTokenType',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 8192,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A request was rejected because the specified key was marked as disabled.',
                    'class' => 'DisabledException',
                ),
                array(
                    'reason' => 'The request was rejected because the specified ciphertext has been corrupted or is otherwise invalid.',
                    'class' => 'InvalidCiphertextException',
                ),
                array(
                    'reason' => 'The request was rejected because the key was disabled, not found, or otherwise not available.',
                    'class' => 'KeyUnavailableException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'A grant token provided as part of the request is invalid.',
                    'class' => 'InvalidGrantTokenException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'DeleteAlias' => array(
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
                    'default' => 'TrentService.DeleteAlias',
                ),
                'AliasName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'DescribeKey' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeKeyResponse',
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
                    'default' => 'TrentService.DescribeKey',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'DisableKey' => array(
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
                    'default' => 'TrentService.DisableKey',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'DisableKeyRotation' => array(
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
                    'default' => 'TrentService.DisableKeyRotation',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'EnableKey' => array(
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
                    'default' => 'TrentService.EnableKey',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
                array(
                    'reason' => 'The request was rejected because a quota was exceeded.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'EnableKeyRotation' => array(
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
                    'default' => 'TrentService.EnableKeyRotation',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'Encrypt' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EncryptResponse',
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
                    'default' => 'TrentService.Encrypt',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'Plaintext' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'filters' => array(
                        'base64_encode',
                    ),
                ),
                'EncryptionContext' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'EncryptionContextKey',
                        ),
                    ),
                ),
                'GrantTokens' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'GrantTokenType',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 8192,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A request was rejected because the specified key was marked as disabled.',
                    'class' => 'DisabledException',
                ),
                array(
                    'reason' => 'The request was rejected because the key was disabled, not found, or otherwise not available.',
                    'class' => 'KeyUnavailableException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because the specified KeySpec parameter is not valid. The currently supported value is ENCRYPT/DECRYPT.',
                    'class' => 'InvalidKeyUsageException',
                ),
                array(
                    'reason' => 'A grant token provided as part of the request is invalid.',
                    'class' => 'InvalidGrantTokenException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'GenerateDataKey' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GenerateDataKeyResponse',
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
                    'default' => 'TrentService.GenerateDataKey',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'EncryptionContext' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'EncryptionContextKey',
                        ),
                    ),
                ),
                'NumberOfBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 1024,
                ),
                'KeySpec' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'GrantTokens' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'GrantTokenType',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 8192,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A request was rejected because the specified key was marked as disabled.',
                    'class' => 'DisabledException',
                ),
                array(
                    'reason' => 'The request was rejected because the key was disabled, not found, or otherwise not available.',
                    'class' => 'KeyUnavailableException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because the specified KeySpec parameter is not valid. The currently supported value is ENCRYPT/DECRYPT.',
                    'class' => 'InvalidKeyUsageException',
                ),
                array(
                    'reason' => 'A grant token provided as part of the request is invalid.',
                    'class' => 'InvalidGrantTokenException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'GenerateDataKeyWithoutPlaintext' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GenerateDataKeyWithoutPlaintextResponse',
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
                    'default' => 'TrentService.GenerateDataKeyWithoutPlaintext',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'EncryptionContext' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'EncryptionContextKey',
                        ),
                    ),
                ),
                'KeySpec' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'NumberOfBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 1024,
                ),
                'GrantTokens' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'GrantTokenType',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 8192,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A request was rejected because the specified key was marked as disabled.',
                    'class' => 'DisabledException',
                ),
                array(
                    'reason' => 'The request was rejected because the key was disabled, not found, or otherwise not available.',
                    'class' => 'KeyUnavailableException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because the specified KeySpec parameter is not valid. The currently supported value is ENCRYPT/DECRYPT.',
                    'class' => 'InvalidKeyUsageException',
                ),
                array(
                    'reason' => 'A grant token provided as part of the request is invalid.',
                    'class' => 'InvalidGrantTokenException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'GenerateRandom' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GenerateRandomResponse',
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
                    'default' => 'TrentService.GenerateRandom',
                ),
                'NumberOfBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 1024,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'GetKeyPolicy' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetKeyPolicyResponse',
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
                    'default' => 'TrentService.GetKeyPolicy',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'GetKeyRotationStatus' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetKeyRotationStatusResponse',
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
                    'default' => 'TrentService.GetKeyRotationStatus',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'ListAliases' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListAliasesResponse',
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
                    'default' => 'TrentService.ListAliases',
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'ListGrants' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListGrantsResponse',
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
                    'default' => 'TrentService.ListGrants',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because the marker that specifies where pagination should next begin is not valid.',
                    'class' => 'InvalidMarkerException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'ListKeyPolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListKeyPoliciesResponse',
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
                    'default' => 'TrentService.ListKeyPolicies',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'ListKeys' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListKeysResponse',
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
                    'default' => 'TrentService.ListKeys',
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 1000,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 320,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'PutKeyPolicy' => array(
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
                    'default' => 'TrentService.PutKeyPolicy',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'PolicyName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'Policy' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 131072,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The request was rejected because the specified policy is not syntactically or semantically correct.',
                    'class' => 'MalformedPolicyDocumentException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified parameter is not supported.',
                    'class' => 'UnsupportedOperationException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
                array(
                    'reason' => 'The request was rejected because a quota was exceeded.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'ReEncrypt' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ReEncryptResponse',
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
                    'default' => 'TrentService.ReEncrypt',
                ),
                'CiphertextBlob' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'filters' => array(
                        'base64_encode',
                    ),
                ),
                'SourceEncryptionContext' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'EncryptionContextKey',
                        ),
                    ),
                ),
                'DestinationKeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'DestinationEncryptionContext' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'EncryptionContextKey',
                        ),
                    ),
                ),
                'GrantTokens' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'GrantTokenType',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 8192,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'A request was rejected because the specified key was marked as disabled.',
                    'class' => 'DisabledException',
                ),
                array(
                    'reason' => 'The request was rejected because the specified ciphertext has been corrupted or is otherwise invalid.',
                    'class' => 'InvalidCiphertextException',
                ),
                array(
                    'reason' => 'The request was rejected because the key was disabled, not found, or otherwise not available.',
                    'class' => 'KeyUnavailableException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because the specified KeySpec parameter is not valid. The currently supported value is ENCRYPT/DECRYPT.',
                    'class' => 'InvalidKeyUsageException',
                ),
                array(
                    'reason' => 'A grant token provided as part of the request is invalid.',
                    'class' => 'InvalidGrantTokenException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'RetireGrant' => array(
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
                    'default' => 'TrentService.RetireGrant',
                ),
                'GrantToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 8192,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A grant token provided as part of the request is invalid.',
                    'class' => 'InvalidGrantTokenException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'RevokeGrant' => array(
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
                    'default' => 'TrentService.RevokeGrant',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'GrantId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
        'UpdateKeyDescription' => array(
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
                    'default' => 'TrentService.UpdateKeyDescription',
                ),
                'KeyId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 256,
                ),
                'Description' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 8192,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request was rejected because the specified entity or resource could not be found.',
                    'class' => 'NotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because a specified ARN was not valid.',
                    'class' => 'InvalidArnException',
                ),
                array(
                    'reason' => 'The system timed out while trying to fulfill the request.',
                    'class' => 'DependencyTimeoutException',
                ),
                array(
                    'reason' => 'The request was rejected because an internal exception occurred. This error can be retried.',
                    'class' => 'KMSInternalException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'CreateGrantResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GrantToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'GrantId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateKeyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'KeyMetadata' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'AWSAccountId' => array(
                            'type' => 'string',
                        ),
                        'KeyId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'CreationDate' => array(
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'KeyUsage' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'DecryptResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'KeyId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Plaintext' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'filters' => array(
                        'base64_decode',
                    ),
                ),
            ),
        ),
        'DescribeKeyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'KeyMetadata' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'AWSAccountId' => array(
                            'type' => 'string',
                        ),
                        'KeyId' => array(
                            'type' => 'string',
                        ),
                        'Arn' => array(
                            'type' => 'string',
                        ),
                        'CreationDate' => array(
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'Description' => array(
                            'type' => 'string',
                        ),
                        'KeyUsage' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
        'EncryptResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CiphertextBlob' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'filters' => array(
                        'base64_decode',
                    ),
                ),
                'KeyId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GenerateDataKeyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CiphertextBlob' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'filters' => array(
                        'base64_decode',
                    ),
                ),
                'Plaintext' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'filters' => array(
                        'base64_decode',
                    ),
                ),
                'KeyId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GenerateDataKeyWithoutPlaintextResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CiphertextBlob' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'filters' => array(
                        'base64_decode',
                    ),
                ),
                'KeyId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GenerateRandomResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Plaintext' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'filters' => array(
                        'base64_decode',
                    ),
                ),
            ),
        ),
        'GetKeyPolicyResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Policy' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetKeyRotationStatusResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'KeyRotationEnabled' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'ListAliasesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Aliases' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'AliasListEntry',
                        'type' => 'object',
                        'properties' => array(
                            'AliasName' => array(
                                'type' => 'string',
                            ),
                            'AliasArn' => array(
                                'type' => 'string',
                            ),
                            'TargetKeyId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Truncated' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'ListGrantsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Grants' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'GrantListEntry',
                        'type' => 'object',
                        'properties' => array(
                            'GrantId' => array(
                                'type' => 'string',
                            ),
                            'GranteePrincipal' => array(
                                'type' => 'string',
                            ),
                            'RetiringPrincipal' => array(
                                'type' => 'string',
                            ),
                            'IssuingAccount' => array(
                                'type' => 'string',
                            ),
                            'Operations' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'GrantOperation',
                                    'type' => 'string',
                                ),
                            ),
                            'Constraints' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'EncryptionContextSubset' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                    'EncryptionContextEquals' => array(
                                        'type' => 'object',
                                        'additionalProperties' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Truncated' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'ListKeyPoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'PolicyNames' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PolicyNameType',
                        'type' => 'string',
                    ),
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Truncated' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'ListKeysResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Keys' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'KeyListEntry',
                        'type' => 'object',
                        'properties' => array(
                            'KeyId' => array(
                                'type' => 'string',
                            ),
                            'KeyArn' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Truncated' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'ReEncryptResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CiphertextBlob' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'filters' => array(
                        'base64_decode',
                    ),
                ),
                'SourceKeyId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'KeyId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
);
