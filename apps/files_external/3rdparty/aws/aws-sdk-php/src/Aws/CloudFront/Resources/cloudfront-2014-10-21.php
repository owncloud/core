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
    'apiVersion' => '2014-10-21',
    'endpointPrefix' => 'cloudfront',
    'serviceFullName' => 'Amazon CloudFront',
    'serviceAbbreviation' => 'CloudFront',
    'serviceType' => 'rest-xml',
    'globalEndpoint' => 'cloudfront.amazonaws.com',
    'signatureVersion' => 'v4',
    'namespace' => 'CloudFront',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'cloudfront.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'cloudfront.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'cloudfront.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'cloudfront.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'cloudfront.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'cloudfront.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'cloudfront.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'cloudfront.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CreateCloudFrontOriginAccessIdentity' => array(
            'httpMethod' => 'POST',
            'uri' => '/2014-10-21/origin-access-identity/cloudfront',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateCloudFrontOriginAccessIdentityResult',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'CloudFrontOriginAccessIdentityConfig',
                    'namespaces' => array(
                        'http://cloudfront.amazonaws.com/doc/2014-10-21/',
                    ),
                ),
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'If the CallerReference is a value you already sent in a previous request to create an identity but the content of the CloudFrontOriginAccessIdentityConfig is different from the original request, CloudFront returns a CloudFrontOriginAccessIdentityAlreadyExists error.',
                    'class' => 'CloudFrontOriginAccessIdentityAlreadyExistsException',
                ),
                array(
                    'reason' => 'This operation requires a body. Ensure that the body is present and the Content-Type header is set.',
                    'class' => 'MissingBodyException',
                ),
                array(
                    'reason' => 'Processing your request would cause you to exceed the maximum number of origin access identities allowed.',
                    'class' => 'TooManyCloudFrontOriginAccessIdentitiesException',
                ),
                array(
                    'reason' => 'The argument is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'reason' => 'The value of Quantity and the size of Items do not match.',
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
        'CreateDistribution' => array(
            'httpMethod' => 'POST',
            'uri' => '/2014-10-21/distribution',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateDistributionResult',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'DistributionConfig',
                    'namespaces' => array(
                        'http://cloudfront.amazonaws.com/doc/2014-10-21/',
                    ),
                ),
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Aliases' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'DefaultRootObject' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Origins' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'minItems' => 1,
                            'items' => array(
                                'name' => 'Origin',
                                'type' => 'object',
                                'properties' => array(
                                    'Id' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'DomainName' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'S3OriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'OriginAccessIdentity' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'CustomOriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'HTTPPort' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'HTTPSPort' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'OriginProtocolPolicy' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DefaultCacheBehavior' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'TargetOriginId' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'ForwardedValues' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'QueryString' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'Cookies' => array(
                                    'required' => true,
                                    'type' => 'object',
                                    'properties' => array(
                                        'Forward' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                        'WhitelistedNames' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Quantity' => array(
                                                    'required' => true,
                                                    'type' => 'numeric',
                                                ),
                                                'Items' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'Name',
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'Headers' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Quantity' => array(
                                            'required' => true,
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Name',
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'Quantity' => array(
                                    'required' => true,
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'ViewerProtocolPolicy' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'MinTTL' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'AllowedMethods' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'required' => true,
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'required' => true,
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Method',
                                        'type' => 'string',
                                    ),
                                ),
                                'CachedMethods' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Quantity' => array(
                                            'required' => true,
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'required' => true,
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Method',
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'SmoothStreaming' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
                'CacheBehaviors' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheBehavior',
                                'type' => 'object',
                                'properties' => array(
                                    'PathPattern' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'TargetOriginId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'ForwardedValues' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'QueryString' => array(
                                                'required' => true,
                                                'type' => 'boolean',
                                                'format' => 'boolean-string',
                                            ),
                                            'Cookies' => array(
                                                'required' => true,
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Forward' => array(
                                                        'required' => true,
                                                        'type' => 'string',
                                                    ),
                                                    'WhitelistedNames' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Quantity' => array(
                                                                'required' => true,
                                                                'type' => 'numeric',
                                                            ),
                                                            'Items' => array(
                                                                'type' => 'array',
                                                                'items' => array(
                                                                    'name' => 'Name',
                                                                    'type' => 'string',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'Headers' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Quantity' => array(
                                                        'required' => true,
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'Name',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'TrustedSigners' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'Enabled' => array(
                                                'required' => true,
                                                'type' => 'boolean',
                                                'format' => 'boolean-string',
                                            ),
                                            'Quantity' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AwsAccountNumber',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'ViewerProtocolPolicy' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'MinTTL' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                    'AllowedMethods' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'required' => true,
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'Method',
                                                    'type' => 'string',
                                                ),
                                            ),
                                            'CachedMethods' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Quantity' => array(
                                                        'required' => true,
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'required' => true,
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'Method',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'SmoothStreaming' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'CustomErrorResponses' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CustomErrorResponse',
                                'type' => 'object',
                                'properties' => array(
                                    'ErrorCode' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                    'ResponsePagePath' => array(
                                        'type' => 'string',
                                    ),
                                    'ResponseCode' => array(
                                        'type' => 'string',
                                    ),
                                    'ErrorCachingMinTTL' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'IncludeCookies' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'Bucket' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'PriceClass' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Enabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'xml',
                ),
                'ViewerCertificate' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'IAMCertificateId' => array(
                            'type' => 'string',
                        ),
                        'CloudFrontDefaultCertificate' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'SSLSupportMethod' => array(
                            'type' => 'string',
                        ),
                        'MinimumProtocolVersion' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Restrictions' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'GeoRestriction' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'RestrictionType' => array(
                                    'required' => true,
                                    'type' => 'string',
                                ),
                                'Quantity' => array(
                                    'required' => true,
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Location',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'CNAMEAlreadyExistsException',
                ),
                array(
                    'reason' => 'The caller reference you attempted to create the distribution with is associated with another distribution.',
                    'class' => 'DistributionAlreadyExistsException',
                ),
                array(
                    'reason' => 'The Amazon S3 origin server specified does not refer to a valid Amazon S3 bucket.',
                    'class' => 'InvalidOriginException',
                ),
                array(
                    'reason' => 'The origin access identity is not valid or doesn\'t exist.',
                    'class' => 'InvalidOriginAccessIdentityException',
                ),
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Your request contains more trusted signers than are allowed per distribution.',
                    'class' => 'TooManyTrustedSignersException',
                ),
                array(
                    'reason' => 'One or more of your trusted signers do not exist.',
                    'class' => 'TrustedSignerDoesNotExistException',
                ),
                array(
                    'class' => 'InvalidViewerCertificateException',
                ),
                array(
                    'reason' => 'This operation requires a body. Ensure that the body is present and the Content-Type header is set.',
                    'class' => 'MissingBodyException',
                ),
                array(
                    'reason' => 'Your request contains more CNAMEs than are allowed per distribution.',
                    'class' => 'TooManyDistributionCNAMEsException',
                ),
                array(
                    'reason' => 'Processing your request would cause you to exceed the maximum number of distributions allowed.',
                    'class' => 'TooManyDistributionsException',
                ),
                array(
                    'reason' => 'The default root object file name is too big or contains an invalid character.',
                    'class' => 'InvalidDefaultRootObjectException',
                ),
                array(
                    'reason' => 'The relative path is too big, is not URL-encoded, or does not begin with a slash (/).',
                    'class' => 'InvalidRelativePathException',
                ),
                array(
                    'class' => 'InvalidErrorCodeException',
                ),
                array(
                    'class' => 'InvalidResponseCodeException',
                ),
                array(
                    'reason' => 'The argument is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'reason' => 'This operation requires the HTTPS protocol. Ensure that you specify the HTTPS protocol in your request, or omit the RequiredProtocols element from your distribution configuration.',
                    'class' => 'InvalidRequiredProtocolException',
                ),
                array(
                    'reason' => 'No origin exists with the specified Origin Id.',
                    'class' => 'NoSuchOriginException',
                ),
                array(
                    'reason' => 'You cannot create anymore origins for the distribution.',
                    'class' => 'TooManyOriginsException',
                ),
                array(
                    'reason' => 'You cannot create anymore cache behaviors for the distribution.',
                    'class' => 'TooManyCacheBehaviorsException',
                ),
                array(
                    'reason' => 'Your request contains more cookie names in the whitelist than are allowed per cache behavior.',
                    'class' => 'TooManyCookieNamesInWhiteListException',
                ),
                array(
                    'reason' => 'Your request contains forward cookies option which doesn\'t match with the expectation for the whitelisted list of cookie names. Either list of cookie names has been specified when not allowed or list of cookie names is missing when expected.',
                    'class' => 'InvalidForwardCookiesException',
                ),
                array(
                    'class' => 'TooManyHeadersInForwardedValuesException',
                ),
                array(
                    'class' => 'InvalidHeadersForS3OriginException',
                ),
                array(
                    'reason' => 'The value of Quantity and the size of Items do not match.',
                    'class' => 'InconsistentQuantitiesException',
                ),
                array(
                    'reason' => 'You cannot create anymore custom ssl certificates.',
                    'class' => 'TooManyCertificatesException',
                ),
                array(
                    'class' => 'InvalidLocationCodeException',
                ),
                array(
                    'class' => 'InvalidGeoRestrictionParameterException',
                ),
                array(
                    'reason' => 'You cannot specify SSLv3 as the minimum protocol version if you only want to support only clients that Support Server Name Indication (SNI).',
                    'class' => 'InvalidProtocolSettingsException',
                ),
            ),
        ),
        'CreateInvalidation' => array(
            'httpMethod' => 'POST',
            'uri' => '/2014-10-21/distribution/{DistributionId}/invalidation',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateInvalidationResult',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'InvalidationBatch',
                    'namespaces' => array(
                        'http://cloudfront.amazonaws.com/doc/2014-10-21/',
                    ),
                ),
            ),
            'parameters' => array(
                'DistributionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Paths' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Path',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'This operation requires a body. Ensure that the body is present and the Content-Type header is set.',
                    'class' => 'MissingBodyException',
                ),
                array(
                    'reason' => 'The argument is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'reason' => 'The specified distribution does not exist.',
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'class' => 'BatchTooLargeException',
                ),
                array(
                    'reason' => 'You have exceeded the maximum number of allowable InProgress invalidation batch requests, or invalidation objects.',
                    'class' => 'TooManyInvalidationsInProgressException',
                ),
                array(
                    'reason' => 'The value of Quantity and the size of Items do not match.',
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
        'CreateStreamingDistribution' => array(
            'httpMethod' => 'POST',
            'uri' => '/2014-10-21/streaming-distribution',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateStreamingDistributionResult',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'StreamingDistributionConfig',
                    'namespaces' => array(
                        'http://cloudfront.amazonaws.com/doc/2014-10-21/',
                    ),
                ),
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3Origin' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'DomainName' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'OriginAccessIdentity' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'Aliases' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'Bucket' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'TrustedSigners' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AwsAccountNumber',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'PriceClass' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Enabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'xml',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'CNAMEAlreadyExistsException',
                ),
                array(
                    'class' => 'StreamingDistributionAlreadyExistsException',
                ),
                array(
                    'reason' => 'The Amazon S3 origin server specified does not refer to a valid Amazon S3 bucket.',
                    'class' => 'InvalidOriginException',
                ),
                array(
                    'reason' => 'The origin access identity is not valid or doesn\'t exist.',
                    'class' => 'InvalidOriginAccessIdentityException',
                ),
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Your request contains more trusted signers than are allowed per distribution.',
                    'class' => 'TooManyTrustedSignersException',
                ),
                array(
                    'reason' => 'One or more of your trusted signers do not exist.',
                    'class' => 'TrustedSignerDoesNotExistException',
                ),
                array(
                    'reason' => 'This operation requires a body. Ensure that the body is present and the Content-Type header is set.',
                    'class' => 'MissingBodyException',
                ),
                array(
                    'class' => 'TooManyStreamingDistributionCNAMEsException',
                ),
                array(
                    'reason' => 'Processing your request would cause you to exceed the maximum number of streaming distributions allowed.',
                    'class' => 'TooManyStreamingDistributionsException',
                ),
                array(
                    'reason' => 'The argument is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'reason' => 'The value of Quantity and the size of Items do not match.',
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
        'DeleteCloudFrontOriginAccessIdentity' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2014-10-21/origin-access-identity/cloudfront/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DeleteCloudFrontOriginAccessIdentity2014_10_21Output',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'The If-Match version is missing or not valid for the distribution.',
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'reason' => 'The specified origin access identity does not exist.',
                    'class' => 'NoSuchCloudFrontOriginAccessIdentityException',
                ),
                array(
                    'reason' => 'The precondition given in one or more of the request-header fields evaluated to false.',
                    'class' => 'PreconditionFailedException',
                ),
                array(
                    'class' => 'CloudFrontOriginAccessIdentityInUseException',
                ),
            ),
        ),
        'DeleteDistribution' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2014-10-21/distribution/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DeleteDistribution2014_10_21Output',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'DistributionNotDisabledException',
                ),
                array(
                    'reason' => 'The If-Match version is missing or not valid for the distribution.',
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'reason' => 'The specified distribution does not exist.',
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'reason' => 'The precondition given in one or more of the request-header fields evaluated to false.',
                    'class' => 'PreconditionFailedException',
                ),
            ),
        ),
        'DeleteStreamingDistribution' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2014-10-21/streaming-distribution/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DeleteStreamingDistribution2014_10_21Output',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'StreamingDistributionNotDisabledException',
                ),
                array(
                    'reason' => 'The If-Match version is missing or not valid for the distribution.',
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'reason' => 'The specified streaming distribution does not exist.',
                    'class' => 'NoSuchStreamingDistributionException',
                ),
                array(
                    'reason' => 'The precondition given in one or more of the request-header fields evaluated to false.',
                    'class' => 'PreconditionFailedException',
                ),
            ),
        ),
        'GetCloudFrontOriginAccessIdentity' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-10-21/origin-access-identity/cloudfront/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetCloudFrontOriginAccessIdentityResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified origin access identity does not exist.',
                    'class' => 'NoSuchCloudFrontOriginAccessIdentityException',
                ),
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetCloudFrontOriginAccessIdentityConfig' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-10-21/origin-access-identity/cloudfront/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetCloudFrontOriginAccessIdentityConfigResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified origin access identity does not exist.',
                    'class' => 'NoSuchCloudFrontOriginAccessIdentityException',
                ),
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetDistribution' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-10-21/distribution/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetDistributionResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified distribution does not exist.',
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetDistributionConfig' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-10-21/distribution/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetDistributionConfigResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified distribution does not exist.',
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetInvalidation' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-10-21/distribution/{DistributionId}/invalidation/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetInvalidationResult',
            'responseType' => 'model',
            'parameters' => array(
                'DistributionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified invalidation does not exist.',
                    'class' => 'NoSuchInvalidationException',
                ),
                array(
                    'reason' => 'The specified distribution does not exist.',
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetStreamingDistribution' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-10-21/streaming-distribution/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetStreamingDistributionResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified streaming distribution does not exist.',
                    'class' => 'NoSuchStreamingDistributionException',
                ),
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'GetStreamingDistributionConfig' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-10-21/streaming-distribution/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetStreamingDistributionConfigResult',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The specified streaming distribution does not exist.',
                    'class' => 'NoSuchStreamingDistributionException',
                ),
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'ListCloudFrontOriginAccessIdentities' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-10-21/origin-access-identity/cloudfront',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListCloudFrontOriginAccessIdentitiesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The argument is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
            ),
        ),
        'ListDistributions' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-10-21/distribution',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListDistributionsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The argument is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
            ),
        ),
        'ListInvalidations' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-10-21/distribution/{DistributionId}/invalidation',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListInvalidationsResult',
            'responseType' => 'model',
            'parameters' => array(
                'DistributionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The argument is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'reason' => 'The specified distribution does not exist.',
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
            ),
        ),
        'ListStreamingDistributions' => array(
            'httpMethod' => 'GET',
            'uri' => '/2014-10-21/streaming-distribution',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListStreamingDistributionsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The argument is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
            ),
        ),
        'UpdateCloudFrontOriginAccessIdentity' => array(
            'httpMethod' => 'PUT',
            'uri' => '/2014-10-21/origin-access-identity/cloudfront/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UpdateCloudFrontOriginAccessIdentityResult',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'CloudFrontOriginAccessIdentityConfig',
                    'namespaces' => array(
                        'http://cloudfront.amazonaws.com/doc/2014-10-21/',
                    ),
                ),
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'reason' => 'Origin and CallerReference cannot be updated.',
                    'class' => 'IllegalUpdateException',
                ),
                array(
                    'reason' => 'The If-Match version is missing or not valid for the distribution.',
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'reason' => 'This operation requires a body. Ensure that the body is present and the Content-Type header is set.',
                    'class' => 'MissingBodyException',
                ),
                array(
                    'reason' => 'The specified origin access identity does not exist.',
                    'class' => 'NoSuchCloudFrontOriginAccessIdentityException',
                ),
                array(
                    'reason' => 'The precondition given in one or more of the request-header fields evaluated to false.',
                    'class' => 'PreconditionFailedException',
                ),
                array(
                    'reason' => 'The argument is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'reason' => 'The value of Quantity and the size of Items do not match.',
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
        'UpdateDistribution' => array(
            'httpMethod' => 'PUT',
            'uri' => '/2014-10-21/distribution/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UpdateDistributionResult',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'DistributionConfig',
                    'namespaces' => array(
                        'http://cloudfront.amazonaws.com/doc/2014-10-21/',
                    ),
                ),
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Aliases' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'DefaultRootObject' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Origins' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'minItems' => 1,
                            'items' => array(
                                'name' => 'Origin',
                                'type' => 'object',
                                'properties' => array(
                                    'Id' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'DomainName' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'S3OriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'OriginAccessIdentity' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'CustomOriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'HTTPPort' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'HTTPSPort' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'OriginProtocolPolicy' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DefaultCacheBehavior' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'TargetOriginId' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'ForwardedValues' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'QueryString' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'Cookies' => array(
                                    'required' => true,
                                    'type' => 'object',
                                    'properties' => array(
                                        'Forward' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                        'WhitelistedNames' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Quantity' => array(
                                                    'required' => true,
                                                    'type' => 'numeric',
                                                ),
                                                'Items' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'Name',
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'Headers' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Quantity' => array(
                                            'required' => true,
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Name',
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'required' => true,
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'Quantity' => array(
                                    'required' => true,
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                        'ViewerProtocolPolicy' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'MinTTL' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'AllowedMethods' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'required' => true,
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'required' => true,
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Method',
                                        'type' => 'string',
                                    ),
                                ),
                                'CachedMethods' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Quantity' => array(
                                            'required' => true,
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'required' => true,
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Method',
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'SmoothStreaming' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
                'CacheBehaviors' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheBehavior',
                                'type' => 'object',
                                'properties' => array(
                                    'PathPattern' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'TargetOriginId' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'ForwardedValues' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'QueryString' => array(
                                                'required' => true,
                                                'type' => 'boolean',
                                                'format' => 'boolean-string',
                                            ),
                                            'Cookies' => array(
                                                'required' => true,
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Forward' => array(
                                                        'required' => true,
                                                        'type' => 'string',
                                                    ),
                                                    'WhitelistedNames' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Quantity' => array(
                                                                'required' => true,
                                                                'type' => 'numeric',
                                                            ),
                                                            'Items' => array(
                                                                'type' => 'array',
                                                                'items' => array(
                                                                    'name' => 'Name',
                                                                    'type' => 'string',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'Headers' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Quantity' => array(
                                                        'required' => true,
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'Name',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'TrustedSigners' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'Enabled' => array(
                                                'required' => true,
                                                'type' => 'boolean',
                                                'format' => 'boolean-string',
                                            ),
                                            'Quantity' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AwsAccountNumber',
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'ViewerProtocolPolicy' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'MinTTL' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                    'AllowedMethods' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'required' => true,
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'required' => true,
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'Method',
                                                    'type' => 'string',
                                                ),
                                            ),
                                            'CachedMethods' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Quantity' => array(
                                                        'required' => true,
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'required' => true,
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'Method',
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'SmoothStreaming' => array(
                                        'type' => 'boolean',
                                        'format' => 'boolean-string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'CustomErrorResponses' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CustomErrorResponse',
                                'type' => 'object',
                                'properties' => array(
                                    'ErrorCode' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                    'ResponsePagePath' => array(
                                        'type' => 'string',
                                    ),
                                    'ResponseCode' => array(
                                        'type' => 'string',
                                    ),
                                    'ErrorCachingMinTTL' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'IncludeCookies' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'Bucket' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'PriceClass' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Enabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'xml',
                ),
                'ViewerCertificate' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'IAMCertificateId' => array(
                            'type' => 'string',
                        ),
                        'CloudFrontDefaultCertificate' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'SSLSupportMethod' => array(
                            'type' => 'string',
                        ),
                        'MinimumProtocolVersion' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Restrictions' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'GeoRestriction' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'RestrictionType' => array(
                                    'required' => true,
                                    'type' => 'string',
                                ),
                                'Quantity' => array(
                                    'required' => true,
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Location',
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'CNAMEAlreadyExistsException',
                ),
                array(
                    'reason' => 'Origin and CallerReference cannot be updated.',
                    'class' => 'IllegalUpdateException',
                ),
                array(
                    'reason' => 'The If-Match version is missing or not valid for the distribution.',
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'reason' => 'This operation requires a body. Ensure that the body is present and the Content-Type header is set.',
                    'class' => 'MissingBodyException',
                ),
                array(
                    'reason' => 'The specified distribution does not exist.',
                    'class' => 'NoSuchDistributionException',
                ),
                array(
                    'reason' => 'The precondition given in one or more of the request-header fields evaluated to false.',
                    'class' => 'PreconditionFailedException',
                ),
                array(
                    'reason' => 'Your request contains more CNAMEs than are allowed per distribution.',
                    'class' => 'TooManyDistributionCNAMEsException',
                ),
                array(
                    'reason' => 'The default root object file name is too big or contains an invalid character.',
                    'class' => 'InvalidDefaultRootObjectException',
                ),
                array(
                    'reason' => 'The relative path is too big, is not URL-encoded, or does not begin with a slash (/).',
                    'class' => 'InvalidRelativePathException',
                ),
                array(
                    'class' => 'InvalidErrorCodeException',
                ),
                array(
                    'class' => 'InvalidResponseCodeException',
                ),
                array(
                    'reason' => 'The argument is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'reason' => 'The origin access identity is not valid or doesn\'t exist.',
                    'class' => 'InvalidOriginAccessIdentityException',
                ),
                array(
                    'reason' => 'Your request contains more trusted signers than are allowed per distribution.',
                    'class' => 'TooManyTrustedSignersException',
                ),
                array(
                    'reason' => 'One or more of your trusted signers do not exist.',
                    'class' => 'TrustedSignerDoesNotExistException',
                ),
                array(
                    'class' => 'InvalidViewerCertificateException',
                ),
                array(
                    'reason' => 'This operation requires the HTTPS protocol. Ensure that you specify the HTTPS protocol in your request, or omit the RequiredProtocols element from your distribution configuration.',
                    'class' => 'InvalidRequiredProtocolException',
                ),
                array(
                    'reason' => 'No origin exists with the specified Origin Id.',
                    'class' => 'NoSuchOriginException',
                ),
                array(
                    'reason' => 'You cannot create anymore origins for the distribution.',
                    'class' => 'TooManyOriginsException',
                ),
                array(
                    'reason' => 'You cannot create anymore cache behaviors for the distribution.',
                    'class' => 'TooManyCacheBehaviorsException',
                ),
                array(
                    'reason' => 'Your request contains more cookie names in the whitelist than are allowed per cache behavior.',
                    'class' => 'TooManyCookieNamesInWhiteListException',
                ),
                array(
                    'reason' => 'Your request contains forward cookies option which doesn\'t match with the expectation for the whitelisted list of cookie names. Either list of cookie names has been specified when not allowed or list of cookie names is missing when expected.',
                    'class' => 'InvalidForwardCookiesException',
                ),
                array(
                    'class' => 'TooManyHeadersInForwardedValuesException',
                ),
                array(
                    'class' => 'InvalidHeadersForS3OriginException',
                ),
                array(
                    'reason' => 'The value of Quantity and the size of Items do not match.',
                    'class' => 'InconsistentQuantitiesException',
                ),
                array(
                    'reason' => 'You cannot create anymore custom ssl certificates.',
                    'class' => 'TooManyCertificatesException',
                ),
                array(
                    'class' => 'InvalidLocationCodeException',
                ),
                array(
                    'class' => 'InvalidGeoRestrictionParameterException',
                ),
            ),
        ),
        'UpdateStreamingDistribution' => array(
            'httpMethod' => 'PUT',
            'uri' => '/2014-10-21/streaming-distribution/{Id}/config',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'UpdateStreamingDistributionResult',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'StreamingDistributionConfig',
                    'namespaces' => array(
                        'http://cloudfront.amazonaws.com/doc/2014-10-21/',
                    ),
                ),
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3Origin' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'DomainName' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'OriginAccessIdentity' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'Aliases' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'Bucket' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                    ),
                ),
                'TrustedSigners' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'required' => true,
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                        'Quantity' => array(
                            'required' => true,
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AwsAccountNumber',
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'PriceClass' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Enabled' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'xml',
                ),
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ),
                'IfMatch' => array(
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'If-Match',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Access denied.',
                    'class' => 'AccessDeniedException',
                ),
                array(
                    'class' => 'CNAMEAlreadyExistsException',
                ),
                array(
                    'reason' => 'Origin and CallerReference cannot be updated.',
                    'class' => 'IllegalUpdateException',
                ),
                array(
                    'reason' => 'The If-Match version is missing or not valid for the distribution.',
                    'class' => 'InvalidIfMatchVersionException',
                ),
                array(
                    'reason' => 'This operation requires a body. Ensure that the body is present and the Content-Type header is set.',
                    'class' => 'MissingBodyException',
                ),
                array(
                    'reason' => 'The specified streaming distribution does not exist.',
                    'class' => 'NoSuchStreamingDistributionException',
                ),
                array(
                    'reason' => 'The precondition given in one or more of the request-header fields evaluated to false.',
                    'class' => 'PreconditionFailedException',
                ),
                array(
                    'class' => 'TooManyStreamingDistributionCNAMEsException',
                ),
                array(
                    'reason' => 'The argument is invalid.',
                    'class' => 'InvalidArgumentException',
                ),
                array(
                    'reason' => 'The origin access identity is not valid or doesn\'t exist.',
                    'class' => 'InvalidOriginAccessIdentityException',
                ),
                array(
                    'reason' => 'Your request contains more trusted signers than are allowed per distribution.',
                    'class' => 'TooManyTrustedSignersException',
                ),
                array(
                    'reason' => 'One or more of your trusted signers do not exist.',
                    'class' => 'TrustedSignerDoesNotExistException',
                ),
                array(
                    'reason' => 'The value of Quantity and the size of Items do not match.',
                    'class' => 'InconsistentQuantitiesException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CreateCloudFrontOriginAccessIdentityResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3CanonicalUserId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CloudFrontOriginAccessIdentityConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CreateDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'InProgressInvalidationBatches' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'DefaultRootObject' => array(
                            'type' => 'string',
                        ),
                        'Origins' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Origin',
                                        'type' => 'object',
                                        'sentAs' => 'Origin',
                                        'properties' => array(
                                            'Id' => array(
                                                'type' => 'string',
                                            ),
                                            'DomainName' => array(
                                                'type' => 'string',
                                            ),
                                            'S3OriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'OriginAccessIdentity' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'CustomOriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'HTTPPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'HTTPSPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'OriginProtocolPolicy' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'DefaultCacheBehavior' => array(
                            'type' => 'object',
                            'properties' => array(
                                'TargetOriginId' => array(
                                    'type' => 'string',
                                ),
                                'ForwardedValues' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'QueryString' => array(
                                            'type' => 'boolean',
                                        ),
                                        'Cookies' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Forward' => array(
                                                    'type' => 'string',
                                                ),
                                                'WhitelistedNames' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Quantity' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'Items' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'Name',
                                                                'type' => 'string',
                                                                'sentAs' => 'Name',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'Headers' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Quantity' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'Items' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'Name',
                                                        'type' => 'string',
                                                        'sentAs' => 'Name',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'TrustedSigners' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Enabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'AwsAccountNumber',
                                                'type' => 'string',
                                                'sentAs' => 'AwsAccountNumber',
                                            ),
                                        ),
                                    ),
                                ),
                                'ViewerProtocolPolicy' => array(
                                    'type' => 'string',
                                ),
                                'MinTTL' => array(
                                    'type' => 'numeric',
                                ),
                                'AllowedMethods' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Method',
                                                'type' => 'string',
                                                'sentAs' => 'Method',
                                            ),
                                        ),
                                        'CachedMethods' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Quantity' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'Items' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'Method',
                                                        'type' => 'string',
                                                        'sentAs' => 'Method',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'SmoothStreaming' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                        'CacheBehaviors' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CacheBehavior',
                                        'type' => 'object',
                                        'sentAs' => 'CacheBehavior',
                                        'properties' => array(
                                            'PathPattern' => array(
                                                'type' => 'string',
                                            ),
                                            'TargetOriginId' => array(
                                                'type' => 'string',
                                            ),
                                            'ForwardedValues' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'QueryString' => array(
                                                        'type' => 'boolean',
                                                    ),
                                                    'Cookies' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Forward' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'WhitelistedNames' => array(
                                                                'type' => 'object',
                                                                'properties' => array(
                                                                    'Quantity' => array(
                                                                        'type' => 'numeric',
                                                                    ),
                                                                    'Items' => array(
                                                                        'type' => 'array',
                                                                        'items' => array(
                                                                            'name' => 'Name',
                                                                            'type' => 'string',
                                                                            'sentAs' => 'Name',
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                    'Headers' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Quantity' => array(
                                                                'type' => 'numeric',
                                                            ),
                                                            'Items' => array(
                                                                'type' => 'array',
                                                                'items' => array(
                                                                    'name' => 'Name',
                                                                    'type' => 'string',
                                                                    'sentAs' => 'Name',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'TrustedSigners' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Enabled' => array(
                                                        'type' => 'boolean',
                                                    ),
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'AwsAccountNumber',
                                                            'type' => 'string',
                                                            'sentAs' => 'AwsAccountNumber',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'ViewerProtocolPolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'MinTTL' => array(
                                                'type' => 'numeric',
                                            ),
                                            'AllowedMethods' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'Method',
                                                            'type' => 'string',
                                                            'sentAs' => 'Method',
                                                        ),
                                                    ),
                                                    'CachedMethods' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Quantity' => array(
                                                                'type' => 'numeric',
                                                            ),
                                                            'Items' => array(
                                                                'type' => 'array',
                                                                'items' => array(
                                                                    'name' => 'Method',
                                                                    'type' => 'string',
                                                                    'sentAs' => 'Method',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'SmoothStreaming' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'CustomErrorResponses' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CustomErrorResponse',
                                        'type' => 'object',
                                        'sentAs' => 'CustomErrorResponse',
                                        'properties' => array(
                                            'ErrorCode' => array(
                                                'type' => 'numeric',
                                            ),
                                            'ResponsePagePath' => array(
                                                'type' => 'string',
                                            ),
                                            'ResponseCode' => array(
                                                'type' => 'string',
                                            ),
                                            'ErrorCachingMinTTL' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'IncludeCookies' => array(
                                    'type' => 'boolean',
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'PriceClass' => array(
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'ViewerCertificate' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IAMCertificateId' => array(
                                    'type' => 'string',
                                ),
                                'CloudFrontDefaultCertificate' => array(
                                    'type' => 'boolean',
                                ),
                                'SSLSupportMethod' => array(
                                    'type' => 'string',
                                ),
                                'MinimumProtocolVersion' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Restrictions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'GeoRestriction' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'RestrictionType' => array(
                                            'type' => 'string',
                                        ),
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Location',
                                                'type' => 'string',
                                                'sentAs' => 'Location',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CreateInvalidationResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CreateTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'InvalidationBatch' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Paths' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Path',
                                        'type' => 'string',
                                        'sentAs' => 'Path',
                                    ),
                                ),
                            ),
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CreateStreamingDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'StreamingDistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'S3Origin' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DomainName' => array(
                                    'type' => 'string',
                                ),
                                'OriginAccessIdentity' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                        'sentAs' => 'AwsAccountNumber',
                                    ),
                                ),
                            ),
                        ),
                        'PriceClass' => array(
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteCloudFrontOriginAccessIdentity2014_10_21Output' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteDistribution2014_10_21Output' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteStreamingDistribution2014_10_21Output' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetCloudFrontOriginAccessIdentityResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3CanonicalUserId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CloudFrontOriginAccessIdentityConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetCloudFrontOriginAccessIdentityConfigResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CallerReference' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Comment' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'InProgressInvalidationBatches' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'DefaultRootObject' => array(
                            'type' => 'string',
                        ),
                        'Origins' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Origin',
                                        'type' => 'object',
                                        'sentAs' => 'Origin',
                                        'properties' => array(
                                            'Id' => array(
                                                'type' => 'string',
                                            ),
                                            'DomainName' => array(
                                                'type' => 'string',
                                            ),
                                            'S3OriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'OriginAccessIdentity' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'CustomOriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'HTTPPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'HTTPSPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'OriginProtocolPolicy' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'DefaultCacheBehavior' => array(
                            'type' => 'object',
                            'properties' => array(
                                'TargetOriginId' => array(
                                    'type' => 'string',
                                ),
                                'ForwardedValues' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'QueryString' => array(
                                            'type' => 'boolean',
                                        ),
                                        'Cookies' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Forward' => array(
                                                    'type' => 'string',
                                                ),
                                                'WhitelistedNames' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Quantity' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'Items' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'Name',
                                                                'type' => 'string',
                                                                'sentAs' => 'Name',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'Headers' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Quantity' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'Items' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'Name',
                                                        'type' => 'string',
                                                        'sentAs' => 'Name',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'TrustedSigners' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Enabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'AwsAccountNumber',
                                                'type' => 'string',
                                                'sentAs' => 'AwsAccountNumber',
                                            ),
                                        ),
                                    ),
                                ),
                                'ViewerProtocolPolicy' => array(
                                    'type' => 'string',
                                ),
                                'MinTTL' => array(
                                    'type' => 'numeric',
                                ),
                                'AllowedMethods' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Method',
                                                'type' => 'string',
                                                'sentAs' => 'Method',
                                            ),
                                        ),
                                        'CachedMethods' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Quantity' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'Items' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'Method',
                                                        'type' => 'string',
                                                        'sentAs' => 'Method',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'SmoothStreaming' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                        'CacheBehaviors' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CacheBehavior',
                                        'type' => 'object',
                                        'sentAs' => 'CacheBehavior',
                                        'properties' => array(
                                            'PathPattern' => array(
                                                'type' => 'string',
                                            ),
                                            'TargetOriginId' => array(
                                                'type' => 'string',
                                            ),
                                            'ForwardedValues' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'QueryString' => array(
                                                        'type' => 'boolean',
                                                    ),
                                                    'Cookies' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Forward' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'WhitelistedNames' => array(
                                                                'type' => 'object',
                                                                'properties' => array(
                                                                    'Quantity' => array(
                                                                        'type' => 'numeric',
                                                                    ),
                                                                    'Items' => array(
                                                                        'type' => 'array',
                                                                        'items' => array(
                                                                            'name' => 'Name',
                                                                            'type' => 'string',
                                                                            'sentAs' => 'Name',
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                    'Headers' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Quantity' => array(
                                                                'type' => 'numeric',
                                                            ),
                                                            'Items' => array(
                                                                'type' => 'array',
                                                                'items' => array(
                                                                    'name' => 'Name',
                                                                    'type' => 'string',
                                                                    'sentAs' => 'Name',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'TrustedSigners' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Enabled' => array(
                                                        'type' => 'boolean',
                                                    ),
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'AwsAccountNumber',
                                                            'type' => 'string',
                                                            'sentAs' => 'AwsAccountNumber',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'ViewerProtocolPolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'MinTTL' => array(
                                                'type' => 'numeric',
                                            ),
                                            'AllowedMethods' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'Method',
                                                            'type' => 'string',
                                                            'sentAs' => 'Method',
                                                        ),
                                                    ),
                                                    'CachedMethods' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Quantity' => array(
                                                                'type' => 'numeric',
                                                            ),
                                                            'Items' => array(
                                                                'type' => 'array',
                                                                'items' => array(
                                                                    'name' => 'Method',
                                                                    'type' => 'string',
                                                                    'sentAs' => 'Method',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'SmoothStreaming' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'CustomErrorResponses' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CustomErrorResponse',
                                        'type' => 'object',
                                        'sentAs' => 'CustomErrorResponse',
                                        'properties' => array(
                                            'ErrorCode' => array(
                                                'type' => 'numeric',
                                            ),
                                            'ResponsePagePath' => array(
                                                'type' => 'string',
                                            ),
                                            'ResponseCode' => array(
                                                'type' => 'string',
                                            ),
                                            'ErrorCachingMinTTL' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'IncludeCookies' => array(
                                    'type' => 'boolean',
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'PriceClass' => array(
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'ViewerCertificate' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IAMCertificateId' => array(
                                    'type' => 'string',
                                ),
                                'CloudFrontDefaultCertificate' => array(
                                    'type' => 'boolean',
                                ),
                                'SSLSupportMethod' => array(
                                    'type' => 'string',
                                ),
                                'MinimumProtocolVersion' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Restrictions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'GeoRestriction' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'RestrictionType' => array(
                                            'type' => 'string',
                                        ),
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Location',
                                                'type' => 'string',
                                                'sentAs' => 'Location',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetDistributionConfigResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CallerReference' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Aliases' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                                'sentAs' => 'CNAME',
                            ),
                        ),
                    ),
                ),
                'DefaultRootObject' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Origins' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Origin',
                                'type' => 'object',
                                'sentAs' => 'Origin',
                                'properties' => array(
                                    'Id' => array(
                                        'type' => 'string',
                                    ),
                                    'DomainName' => array(
                                        'type' => 'string',
                                    ),
                                    'S3OriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'OriginAccessIdentity' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'CustomOriginConfig' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'HTTPPort' => array(
                                                'type' => 'numeric',
                                            ),
                                            'HTTPSPort' => array(
                                                'type' => 'numeric',
                                            ),
                                            'OriginProtocolPolicy' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DefaultCacheBehavior' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'TargetOriginId' => array(
                            'type' => 'string',
                        ),
                        'ForwardedValues' => array(
                            'type' => 'object',
                            'properties' => array(
                                'QueryString' => array(
                                    'type' => 'boolean',
                                ),
                                'Cookies' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Forward' => array(
                                            'type' => 'string',
                                        ),
                                        'WhitelistedNames' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Quantity' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'Items' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'Name',
                                                        'type' => 'string',
                                                        'sentAs' => 'Name',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'Headers' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Name',
                                                'type' => 'string',
                                                'sentAs' => 'Name',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                        'sentAs' => 'AwsAccountNumber',
                                    ),
                                ),
                            ),
                        ),
                        'ViewerProtocolPolicy' => array(
                            'type' => 'string',
                        ),
                        'MinTTL' => array(
                            'type' => 'numeric',
                        ),
                        'AllowedMethods' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Method',
                                        'type' => 'string',
                                        'sentAs' => 'Method',
                                    ),
                                ),
                                'CachedMethods' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Method',
                                                'type' => 'string',
                                                'sentAs' => 'Method',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'SmoothStreaming' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
                'CacheBehaviors' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CacheBehavior',
                                'type' => 'object',
                                'sentAs' => 'CacheBehavior',
                                'properties' => array(
                                    'PathPattern' => array(
                                        'type' => 'string',
                                    ),
                                    'TargetOriginId' => array(
                                        'type' => 'string',
                                    ),
                                    'ForwardedValues' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'QueryString' => array(
                                                'type' => 'boolean',
                                            ),
                                            'Cookies' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Forward' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'WhitelistedNames' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Quantity' => array(
                                                                'type' => 'numeric',
                                                            ),
                                                            'Items' => array(
                                                                'type' => 'array',
                                                                'items' => array(
                                                                    'name' => 'Name',
                                                                    'type' => 'string',
                                                                    'sentAs' => 'Name',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'Headers' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'Name',
                                                            'type' => 'string',
                                                            'sentAs' => 'Name',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'TrustedSigners' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Enabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AwsAccountNumber',
                                                    'type' => 'string',
                                                    'sentAs' => 'AwsAccountNumber',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'ViewerProtocolPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'MinTTL' => array(
                                        'type' => 'numeric',
                                    ),
                                    'AllowedMethods' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'Method',
                                                    'type' => 'string',
                                                    'sentAs' => 'Method',
                                                ),
                                            ),
                                            'CachedMethods' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'Method',
                                                            'type' => 'string',
                                                            'sentAs' => 'Method',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'SmoothStreaming' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'CustomErrorResponses' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CustomErrorResponse',
                                'type' => 'object',
                                'sentAs' => 'CustomErrorResponse',
                                'properties' => array(
                                    'ErrorCode' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ResponsePagePath' => array(
                                        'type' => 'string',
                                    ),
                                    'ResponseCode' => array(
                                        'type' => 'string',
                                    ),
                                    'ErrorCachingMinTTL' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'IncludeCookies' => array(
                            'type' => 'boolean',
                        ),
                        'Bucket' => array(
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'PriceClass' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Enabled' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'ViewerCertificate' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'IAMCertificateId' => array(
                            'type' => 'string',
                        ),
                        'CloudFrontDefaultCertificate' => array(
                            'type' => 'boolean',
                        ),
                        'SSLSupportMethod' => array(
                            'type' => 'string',
                        ),
                        'MinimumProtocolVersion' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Restrictions' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'GeoRestriction' => array(
                            'type' => 'object',
                            'properties' => array(
                                'RestrictionType' => array(
                                    'type' => 'string',
                                ),
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Location',
                                        'type' => 'string',
                                        'sentAs' => 'Location',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetInvalidationResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CreateTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'InvalidationBatch' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Paths' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Path',
                                        'type' => 'string',
                                        'sentAs' => 'Path',
                                    ),
                                ),
                            ),
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetStreamingDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'StreamingDistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'S3Origin' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DomainName' => array(
                                    'type' => 'string',
                                ),
                                'OriginAccessIdentity' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                        'sentAs' => 'AwsAccountNumber',
                                    ),
                                ),
                            ),
                        ),
                        'PriceClass' => array(
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetStreamingDistributionConfigResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CallerReference' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3Origin' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'DomainName' => array(
                            'type' => 'string',
                        ),
                        'OriginAccessIdentity' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'Aliases' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'CNAME',
                                'type' => 'string',
                                'sentAs' => 'CNAME',
                            ),
                        ),
                    ),
                ),
                'Comment' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Logging' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'Bucket' => array(
                            'type' => 'string',
                        ),
                        'Prefix' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'TrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'AwsAccountNumber',
                                'type' => 'string',
                                'sentAs' => 'AwsAccountNumber',
                            ),
                        ),
                    ),
                ),
                'PriceClass' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Enabled' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListCloudFrontOriginAccessIdentitiesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Quantity' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'Items' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'CloudFrontOriginAccessIdentitySummary',
                        'type' => 'object',
                        'sentAs' => 'CloudFrontOriginAccessIdentitySummary',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'S3CanonicalUserId' => array(
                                'type' => 'string',
                            ),
                            'Comment' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListDistributionsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Quantity' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'Items' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'DistributionSummary',
                        'type' => 'object',
                        'sentAs' => 'DistributionSummary',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'LastModifiedTime' => array(
                                'type' => 'string',
                            ),
                            'DomainName' => array(
                                'type' => 'string',
                            ),
                            'Aliases' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Quantity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Items' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CNAME',
                                            'type' => 'string',
                                            'sentAs' => 'CNAME',
                                        ),
                                    ),
                                ),
                            ),
                            'Origins' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Quantity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Items' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Origin',
                                            'type' => 'object',
                                            'sentAs' => 'Origin',
                                            'properties' => array(
                                                'Id' => array(
                                                    'type' => 'string',
                                                ),
                                                'DomainName' => array(
                                                    'type' => 'string',
                                                ),
                                                'S3OriginConfig' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'OriginAccessIdentity' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                                'CustomOriginConfig' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'HTTPPort' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'HTTPSPort' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'OriginProtocolPolicy' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'DefaultCacheBehavior' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'TargetOriginId' => array(
                                        'type' => 'string',
                                    ),
                                    'ForwardedValues' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'QueryString' => array(
                                                'type' => 'boolean',
                                            ),
                                            'Cookies' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Forward' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'WhitelistedNames' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Quantity' => array(
                                                                'type' => 'numeric',
                                                            ),
                                                            'Items' => array(
                                                                'type' => 'array',
                                                                'items' => array(
                                                                    'name' => 'Name',
                                                                    'type' => 'string',
                                                                    'sentAs' => 'Name',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'Headers' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'Name',
                                                            'type' => 'string',
                                                            'sentAs' => 'Name',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'TrustedSigners' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Enabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'AwsAccountNumber',
                                                    'type' => 'string',
                                                    'sentAs' => 'AwsAccountNumber',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'ViewerProtocolPolicy' => array(
                                        'type' => 'string',
                                    ),
                                    'MinTTL' => array(
                                        'type' => 'numeric',
                                    ),
                                    'AllowedMethods' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'Method',
                                                    'type' => 'string',
                                                    'sentAs' => 'Method',
                                                ),
                                            ),
                                            'CachedMethods' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'Method',
                                                            'type' => 'string',
                                                            'sentAs' => 'Method',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'SmoothStreaming' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                            'CacheBehaviors' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Quantity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Items' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CacheBehavior',
                                            'type' => 'object',
                                            'sentAs' => 'CacheBehavior',
                                            'properties' => array(
                                                'PathPattern' => array(
                                                    'type' => 'string',
                                                ),
                                                'TargetOriginId' => array(
                                                    'type' => 'string',
                                                ),
                                                'ForwardedValues' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'QueryString' => array(
                                                            'type' => 'boolean',
                                                        ),
                                                        'Cookies' => array(
                                                            'type' => 'object',
                                                            'properties' => array(
                                                                'Forward' => array(
                                                                    'type' => 'string',
                                                                ),
                                                                'WhitelistedNames' => array(
                                                                    'type' => 'object',
                                                                    'properties' => array(
                                                                        'Quantity' => array(
                                                                            'type' => 'numeric',
                                                                        ),
                                                                        'Items' => array(
                                                                            'type' => 'array',
                                                                            'items' => array(
                                                                                'name' => 'Name',
                                                                                'type' => 'string',
                                                                                'sentAs' => 'Name',
                                                                            ),
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                        'Headers' => array(
                                                            'type' => 'object',
                                                            'properties' => array(
                                                                'Quantity' => array(
                                                                    'type' => 'numeric',
                                                                ),
                                                                'Items' => array(
                                                                    'type' => 'array',
                                                                    'items' => array(
                                                                        'name' => 'Name',
                                                                        'type' => 'string',
                                                                        'sentAs' => 'Name',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'TrustedSigners' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Enabled' => array(
                                                            'type' => 'boolean',
                                                        ),
                                                        'Quantity' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'Items' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'AwsAccountNumber',
                                                                'type' => 'string',
                                                                'sentAs' => 'AwsAccountNumber',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'ViewerProtocolPolicy' => array(
                                                    'type' => 'string',
                                                ),
                                                'MinTTL' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'AllowedMethods' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Quantity' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'Items' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'Method',
                                                                'type' => 'string',
                                                                'sentAs' => 'Method',
                                                            ),
                                                        ),
                                                        'CachedMethods' => array(
                                                            'type' => 'object',
                                                            'properties' => array(
                                                                'Quantity' => array(
                                                                    'type' => 'numeric',
                                                                ),
                                                                'Items' => array(
                                                                    'type' => 'array',
                                                                    'items' => array(
                                                                        'name' => 'Method',
                                                                        'type' => 'string',
                                                                        'sentAs' => 'Method',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                                'SmoothStreaming' => array(
                                                    'type' => 'boolean',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'CustomErrorResponses' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Quantity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Items' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CustomErrorResponse',
                                            'type' => 'object',
                                            'sentAs' => 'CustomErrorResponse',
                                            'properties' => array(
                                                'ErrorCode' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'ResponsePagePath' => array(
                                                    'type' => 'string',
                                                ),
                                                'ResponseCode' => array(
                                                    'type' => 'string',
                                                ),
                                                'ErrorCachingMinTTL' => array(
                                                    'type' => 'numeric',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Comment' => array(
                                'type' => 'string',
                            ),
                            'PriceClass' => array(
                                'type' => 'string',
                            ),
                            'Enabled' => array(
                                'type' => 'boolean',
                            ),
                            'ViewerCertificate' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'IAMCertificateId' => array(
                                        'type' => 'string',
                                    ),
                                    'CloudFrontDefaultCertificate' => array(
                                        'type' => 'boolean',
                                    ),
                                    'SSLSupportMethod' => array(
                                        'type' => 'string',
                                    ),
                                    'MinimumProtocolVersion' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Restrictions' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'GeoRestriction' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'RestrictionType' => array(
                                                'type' => 'string',
                                            ),
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'Location',
                                                    'type' => 'string',
                                                    'sentAs' => 'Location',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListInvalidationsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Quantity' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'Items' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'InvalidationSummary',
                        'type' => 'object',
                        'sentAs' => 'InvalidationSummary',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'CreateTime' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListStreamingDistributionsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'Quantity' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'Items' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'StreamingDistributionSummary',
                        'type' => 'object',
                        'sentAs' => 'StreamingDistributionSummary',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Status' => array(
                                'type' => 'string',
                            ),
                            'LastModifiedTime' => array(
                                'type' => 'string',
                            ),
                            'DomainName' => array(
                                'type' => 'string',
                            ),
                            'S3Origin' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'DomainName' => array(
                                        'type' => 'string',
                                    ),
                                    'OriginAccessIdentity' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Aliases' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Quantity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Items' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'CNAME',
                                            'type' => 'string',
                                            'sentAs' => 'CNAME',
                                        ),
                                    ),
                                ),
                            ),
                            'TrustedSigners' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Enabled' => array(
                                        'type' => 'boolean',
                                    ),
                                    'Quantity' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Items' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'AwsAccountNumber',
                                            'type' => 'string',
                                            'sentAs' => 'AwsAccountNumber',
                                        ),
                                    ),
                                ),
                            ),
                            'Comment' => array(
                                'type' => 'string',
                            ),
                            'PriceClass' => array(
                                'type' => 'string',
                            ),
                            'Enabled' => array(
                                'type' => 'boolean',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'UpdateCloudFrontOriginAccessIdentityResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'S3CanonicalUserId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'CloudFrontOriginAccessIdentityConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'UpdateDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'InProgressInvalidationBatches' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'DistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'DefaultRootObject' => array(
                            'type' => 'string',
                        ),
                        'Origins' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'Origin',
                                        'type' => 'object',
                                        'sentAs' => 'Origin',
                                        'properties' => array(
                                            'Id' => array(
                                                'type' => 'string',
                                            ),
                                            'DomainName' => array(
                                                'type' => 'string',
                                            ),
                                            'S3OriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'OriginAccessIdentity' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'CustomOriginConfig' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'HTTPPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'HTTPSPort' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'OriginProtocolPolicy' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'DefaultCacheBehavior' => array(
                            'type' => 'object',
                            'properties' => array(
                                'TargetOriginId' => array(
                                    'type' => 'string',
                                ),
                                'ForwardedValues' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'QueryString' => array(
                                            'type' => 'boolean',
                                        ),
                                        'Cookies' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Forward' => array(
                                                    'type' => 'string',
                                                ),
                                                'WhitelistedNames' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Quantity' => array(
                                                            'type' => 'numeric',
                                                        ),
                                                        'Items' => array(
                                                            'type' => 'array',
                                                            'items' => array(
                                                                'name' => 'Name',
                                                                'type' => 'string',
                                                                'sentAs' => 'Name',
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'Headers' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Quantity' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'Items' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'Name',
                                                        'type' => 'string',
                                                        'sentAs' => 'Name',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'TrustedSigners' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Enabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'AwsAccountNumber',
                                                'type' => 'string',
                                                'sentAs' => 'AwsAccountNumber',
                                            ),
                                        ),
                                    ),
                                ),
                                'ViewerProtocolPolicy' => array(
                                    'type' => 'string',
                                ),
                                'MinTTL' => array(
                                    'type' => 'numeric',
                                ),
                                'AllowedMethods' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Method',
                                                'type' => 'string',
                                                'sentAs' => 'Method',
                                            ),
                                        ),
                                        'CachedMethods' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'Quantity' => array(
                                                    'type' => 'numeric',
                                                ),
                                                'Items' => array(
                                                    'type' => 'array',
                                                    'items' => array(
                                                        'name' => 'Method',
                                                        'type' => 'string',
                                                        'sentAs' => 'Method',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'SmoothStreaming' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                        'CacheBehaviors' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CacheBehavior',
                                        'type' => 'object',
                                        'sentAs' => 'CacheBehavior',
                                        'properties' => array(
                                            'PathPattern' => array(
                                                'type' => 'string',
                                            ),
                                            'TargetOriginId' => array(
                                                'type' => 'string',
                                            ),
                                            'ForwardedValues' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'QueryString' => array(
                                                        'type' => 'boolean',
                                                    ),
                                                    'Cookies' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Forward' => array(
                                                                'type' => 'string',
                                                            ),
                                                            'WhitelistedNames' => array(
                                                                'type' => 'object',
                                                                'properties' => array(
                                                                    'Quantity' => array(
                                                                        'type' => 'numeric',
                                                                    ),
                                                                    'Items' => array(
                                                                        'type' => 'array',
                                                                        'items' => array(
                                                                            'name' => 'Name',
                                                                            'type' => 'string',
                                                                            'sentAs' => 'Name',
                                                                        ),
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                    'Headers' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Quantity' => array(
                                                                'type' => 'numeric',
                                                            ),
                                                            'Items' => array(
                                                                'type' => 'array',
                                                                'items' => array(
                                                                    'name' => 'Name',
                                                                    'type' => 'string',
                                                                    'sentAs' => 'Name',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'TrustedSigners' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Enabled' => array(
                                                        'type' => 'boolean',
                                                    ),
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'AwsAccountNumber',
                                                            'type' => 'string',
                                                            'sentAs' => 'AwsAccountNumber',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'ViewerProtocolPolicy' => array(
                                                'type' => 'string',
                                            ),
                                            'MinTTL' => array(
                                                'type' => 'numeric',
                                            ),
                                            'AllowedMethods' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'Quantity' => array(
                                                        'type' => 'numeric',
                                                    ),
                                                    'Items' => array(
                                                        'type' => 'array',
                                                        'items' => array(
                                                            'name' => 'Method',
                                                            'type' => 'string',
                                                            'sentAs' => 'Method',
                                                        ),
                                                    ),
                                                    'CachedMethods' => array(
                                                        'type' => 'object',
                                                        'properties' => array(
                                                            'Quantity' => array(
                                                                'type' => 'numeric',
                                                            ),
                                                            'Items' => array(
                                                                'type' => 'array',
                                                                'items' => array(
                                                                    'name' => 'Method',
                                                                    'type' => 'string',
                                                                    'sentAs' => 'Method',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'SmoothStreaming' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'CustomErrorResponses' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CustomErrorResponse',
                                        'type' => 'object',
                                        'sentAs' => 'CustomErrorResponse',
                                        'properties' => array(
                                            'ErrorCode' => array(
                                                'type' => 'numeric',
                                            ),
                                            'ResponsePagePath' => array(
                                                'type' => 'string',
                                            ),
                                            'ResponseCode' => array(
                                                'type' => 'string',
                                            ),
                                            'ErrorCachingMinTTL' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'IncludeCookies' => array(
                                    'type' => 'boolean',
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'PriceClass' => array(
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'ViewerCertificate' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IAMCertificateId' => array(
                                    'type' => 'string',
                                ),
                                'CloudFrontDefaultCertificate' => array(
                                    'type' => 'boolean',
                                ),
                                'SSLSupportMethod' => array(
                                    'type' => 'string',
                                ),
                                'MinimumProtocolVersion' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Restrictions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'GeoRestriction' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'RestrictionType' => array(
                                            'type' => 'string',
                                        ),
                                        'Quantity' => array(
                                            'type' => 'numeric',
                                        ),
                                        'Items' => array(
                                            'type' => 'array',
                                            'items' => array(
                                                'name' => 'Location',
                                                'type' => 'string',
                                                'sentAs' => 'Location',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'UpdateStreamingDistributionResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Id' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'LastModifiedTime' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'DomainName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'ActiveTrustedSigners' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                        'Quantity' => array(
                            'type' => 'numeric',
                        ),
                        'Items' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'Signer',
                                'type' => 'object',
                                'sentAs' => 'Signer',
                                'properties' => array(
                                    'AwsAccountNumber' => array(
                                        'type' => 'string',
                                    ),
                                    'KeyPairIds' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Quantity' => array(
                                                'type' => 'numeric',
                                            ),
                                            'Items' => array(
                                                'type' => 'array',
                                                'items' => array(
                                                    'name' => 'KeyPairId',
                                                    'type' => 'string',
                                                    'sentAs' => 'KeyPairId',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'StreamingDistributionConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'S3Origin' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DomainName' => array(
                                    'type' => 'string',
                                ),
                                'OriginAccessIdentity' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Aliases' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'CNAME',
                                        'type' => 'string',
                                        'sentAs' => 'CNAME',
                                    ),
                                ),
                            ),
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                        'Logging' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'Bucket' => array(
                                    'type' => 'string',
                                ),
                                'Prefix' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'TrustedSigners' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Enabled' => array(
                                    'type' => 'boolean',
                                ),
                                'Quantity' => array(
                                    'type' => 'numeric',
                                ),
                                'Items' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'AwsAccountNumber',
                                        'type' => 'string',
                                        'sentAs' => 'AwsAccountNumber',
                                    ),
                                ),
                            ),
                        ),
                        'PriceClass' => array(
                            'type' => 'string',
                        ),
                        'Enabled' => array(
                            'type' => 'boolean',
                        ),
                    ),
                ),
                'ETag' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListCloudFrontOriginAccessIdentities' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'limit_key' => 'MaxItems',
            'more_results' => 'IsTruncated',
            'result_key' => 'Items',
        ),
        'ListDistributions' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'limit_key' => 'MaxItems',
            'more_results' => 'IsTruncated',
            'result_key' => 'Items',
        ),
        'ListInvalidations' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'limit_key' => 'MaxItems',
            'more_results' => 'IsTruncated',
            'result_key' => 'Items',
        ),
        'ListStreamingDistributions' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'limit_key' => 'MaxItems',
            'more_results' => 'IsTruncated',
            'result_key' => 'Items',
        ),
    ),
    'waiters' => array(
        '__default__' => array(
            'success.type' => 'output',
            'success.path' => 'Status',
        ),
        'StreamingDistributionDeployed' => array(
            'operation' => 'GetStreamingDistribution',
            'interval' => 60,
            'max_attempts' => 25,
            'success.value' => 'Deployed',
        ),
        'DistributionDeployed' => array(
            'operation' => 'GetDistribution',
            'interval' => 60,
            'max_attempts' => 25,
            'success.value' => 'Deployed',
        ),
        'InvalidationCompleted' => array(
            'operation' => 'GetInvalidation',
            'interval' => 20,
            'max_attempts' => 30,
            'success.value' => 'Completed',
        ),
    ),
);
