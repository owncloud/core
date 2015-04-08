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
    'apiVersion' => '2011-02-01',
    'endpointPrefix' => 'cloudsearch',
    'serviceFullName' => 'Amazon CloudSearch',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'CloudSearch',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudsearch.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudsearch.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudsearch.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudsearch.eu-west-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudsearch.ap-southeast-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CreateDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateDomainResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateDomain',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because a resource limit has already been met.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'DefineIndexField' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DefineIndexFieldResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DefineIndexField',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'IndexField' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'IndexFieldName' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                        'IndexFieldType' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'UIntOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'LiteralOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'string',
                                    'maxLength' => 1024,
                                ),
                                'SearchEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'FacetEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'ResultEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                            ),
                        ),
                        'TextOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'string',
                                    'maxLength' => 1024,
                                ),
                                'FacetEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'ResultEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'TextProcessor' => array(
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 64,
                                ),
                            ),
                        ),
                        'SourceAttributes' => array(
                            'type' => 'array',
                            'sentAs' => 'SourceAttributes.member',
                            'items' => array(
                                'name' => 'SourceAttribute',
                                'type' => 'object',
                                'properties' => array(
                                    'SourceDataFunction' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'SourceDataCopy' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'SourceName' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 64,
                                            ),
                                            'DefaultValue' => array(
                                                'type' => 'string',
                                                'maxLength' => 1024,
                                            ),
                                        ),
                                    ),
                                    'SourceDataTrimTitle' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'SourceName' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 64,
                                            ),
                                            'DefaultValue' => array(
                                                'type' => 'string',
                                                'maxLength' => 1024,
                                            ),
                                            'Separator' => array(
                                                'type' => 'string',
                                            ),
                                            'Language' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'SourceDataMap' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'SourceName' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 64,
                                            ),
                                            'DefaultValue' => array(
                                                'type' => 'string',
                                                'maxLength' => 1024,
                                            ),
                                            'Cases' => array(
                                                'type' => 'object',
                                                'sentAs' => 'Cases.entry',
                                                'additionalProperties' => array(
                                                    'type' => 'string',
                                                    'maxLength' => 1024,
                                                    'data' => array(
                                                        'shape_name' => 'FieldValue',
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
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because a resource limit has already been met.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it specified an invalid type definition.',
                    'class' => 'InvalidTypeException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DefineRankExpression' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DefineRankExpressionResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DefineRankExpression',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'RankExpression' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'RankName' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                        'RankExpression' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 10240,
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because a resource limit has already been met.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it specified an invalid type definition.',
                    'class' => 'InvalidTypeException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeleteDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeleteDomainResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteDomain',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
            ),
        ),
        'DeleteIndexField' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeleteIndexFieldResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteIndexField',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'IndexFieldName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it specified an invalid type definition.',
                    'class' => 'InvalidTypeException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DeleteRankExpression' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeleteRankExpressionResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteRankExpression',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'RankName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it specified an invalid type definition.',
                    'class' => 'InvalidTypeException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeDefaultSearchField' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeDefaultSearchFieldResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDefaultSearchField',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeDomains' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeDomainsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeDomains',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'DomainNames.member',
                    'items' => array(
                        'name' => 'DomainName',
                        'type' => 'string',
                        'minLength' => 3,
                        'maxLength' => 28,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
            ),
        ),
        'DescribeIndexFields' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeIndexFieldsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeIndexFields',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'FieldNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'FieldNames.member',
                    'items' => array(
                        'name' => 'FieldName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 64,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeRankExpressions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeRankExpressionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeRankExpressions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'RankNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'RankNames.member',
                    'items' => array(
                        'name' => 'FieldName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 64,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeServiceAccessPolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeServiceAccessPoliciesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeServiceAccessPolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeStemmingOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeStemmingOptionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeStemmingOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeStopwordOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeStopwordOptionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeStopwordOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeSynonymOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSynonymOptionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSynonymOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'IndexDocuments' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'IndexDocumentsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'IndexDocuments',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateDefaultSearchField' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UpdateDefaultSearchFieldResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateDefaultSearchField',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'DefaultSearchField' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it specified an invalid type definition.',
                    'class' => 'InvalidTypeException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateServiceAccessPolicies' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UpdateServiceAccessPoliciesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateServiceAccessPolicies',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'AccessPolicies' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because a resource limit has already been met.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because it specified an invalid type definition.',
                    'class' => 'InvalidTypeException',
                ),
            ),
        ),
        'UpdateStemmingOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UpdateStemmingOptionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateStemmingOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'Stems' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it specified an invalid type definition.',
                    'class' => 'InvalidTypeException',
                ),
                array(
                    'reason' => 'The request was rejected because a resource limit has already been met.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateStopwordOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UpdateStopwordOptionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateStopwordOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'Stopwords' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it specified an invalid type definition.',
                    'class' => 'InvalidTypeException',
                ),
                array(
                    'reason' => 'The request was rejected because a resource limit has already been met.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'UpdateSynonymOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UpdateSynonymOptionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateSynonymOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2011-02-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'Synonyms' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
                array(
                    'reason' => 'An internal error occurred while processing the request. If this problem persists, report an issue from the Service Health Dashboard.',
                    'class' => 'InternalException',
                ),
                array(
                    'reason' => 'The request was rejected because it specified an invalid type definition.',
                    'class' => 'InvalidTypeException',
                ),
                array(
                    'reason' => 'The request was rejected because a resource limit has already been met.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CreateDomainResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DomainStatus' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'DomainId' => array(
                            'type' => 'string',
                        ),
                        'DomainName' => array(
                            'type' => 'string',
                        ),
                        'Created' => array(
                            'type' => 'boolean',
                        ),
                        'Deleted' => array(
                            'type' => 'boolean',
                        ),
                        'NumSearchableDocs' => array(
                            'type' => 'numeric',
                        ),
                        'DocService' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Arn' => array(
                                    'type' => 'string',
                                ),
                                'Endpoint' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'SearchService' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Arn' => array(
                                    'type' => 'string',
                                ),
                                'Endpoint' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'RequiresIndexDocuments' => array(
                            'type' => 'boolean',
                        ),
                        'Processing' => array(
                            'type' => 'boolean',
                        ),
                        'SearchInstanceType' => array(
                            'type' => 'string',
                        ),
                        'SearchPartitionCount' => array(
                            'type' => 'numeric',
                        ),
                        'SearchInstanceCount' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'DefineIndexFieldResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IndexField' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IndexFieldName' => array(
                                    'type' => 'string',
                                ),
                                'IndexFieldType' => array(
                                    'type' => 'string',
                                ),
                                'UIntOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'numeric',
                                        ),
                                    ),
                                ),
                                'LiteralOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ResultEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'TextOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ResultEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'TextProcessor' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'SourceAttributes' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'SourceAttribute',
                                        'type' => 'object',
                                        'sentAs' => 'member',
                                        'properties' => array(
                                            'SourceDataFunction' => array(
                                                'type' => 'string',
                                            ),
                                            'SourceDataCopy' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'SourceName' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'DefaultValue' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'SourceDataTrimTitle' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'SourceName' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'DefaultValue' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Separator' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Language' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'SourceDataMap' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'SourceName' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'DefaultValue' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Cases' => array(
                                                        'type' => 'array',
                                                        'filters' => array(
                                                            array(
                                                                'method' => 'Aws\\Common\\Command\\XmlResponseLocationVisitor::xmlMap',
                                                                'args' => array(
                                                                    '@value',
                                                                    'entry',
                                                                    'key',
                                                                    'value',
                                                                ),
                                                            ),
                                                        ),
                                                        'items' => array(
                                                            'name' => 'entry',
                                                            'type' => 'object',
                                                            'sentAs' => 'entry',
                                                            'additionalProperties' => true,
                                                            'properties' => array(
                                                                'key' => array(
                                                                    'type' => 'string',
                                                                ),
                                                                'value' => array(
                                                                    'type' => 'string',
                                                                ),
                                                            ),
                                                        ),
                                                        'additionalProperties' => false,
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DefineRankExpressionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RankExpression' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'RankName' => array(
                                    'type' => 'string',
                                ),
                                'RankExpression' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DeleteDomainResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DomainStatus' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'DomainId' => array(
                            'type' => 'string',
                        ),
                        'DomainName' => array(
                            'type' => 'string',
                        ),
                        'Created' => array(
                            'type' => 'boolean',
                        ),
                        'Deleted' => array(
                            'type' => 'boolean',
                        ),
                        'NumSearchableDocs' => array(
                            'type' => 'numeric',
                        ),
                        'DocService' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Arn' => array(
                                    'type' => 'string',
                                ),
                                'Endpoint' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'SearchService' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Arn' => array(
                                    'type' => 'string',
                                ),
                                'Endpoint' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'RequiresIndexDocuments' => array(
                            'type' => 'boolean',
                        ),
                        'Processing' => array(
                            'type' => 'boolean',
                        ),
                        'SearchInstanceType' => array(
                            'type' => 'string',
                        ),
                        'SearchPartitionCount' => array(
                            'type' => 'numeric',
                        ),
                        'SearchInstanceCount' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'DeleteIndexFieldResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IndexField' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IndexFieldName' => array(
                                    'type' => 'string',
                                ),
                                'IndexFieldType' => array(
                                    'type' => 'string',
                                ),
                                'UIntOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'numeric',
                                        ),
                                    ),
                                ),
                                'LiteralOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ResultEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'TextOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ResultEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'TextProcessor' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'SourceAttributes' => array(
                                    'type' => 'array',
                                    'items' => array(
                                        'name' => 'SourceAttribute',
                                        'type' => 'object',
                                        'sentAs' => 'member',
                                        'properties' => array(
                                            'SourceDataFunction' => array(
                                                'type' => 'string',
                                            ),
                                            'SourceDataCopy' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'SourceName' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'DefaultValue' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'SourceDataTrimTitle' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'SourceName' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'DefaultValue' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Separator' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Language' => array(
                                                        'type' => 'string',
                                                    ),
                                                ),
                                            ),
                                            'SourceDataMap' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'SourceName' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'DefaultValue' => array(
                                                        'type' => 'string',
                                                    ),
                                                    'Cases' => array(
                                                        'type' => 'array',
                                                        'filters' => array(
                                                            array(
                                                                'method' => 'Aws\\Common\\Command\\XmlResponseLocationVisitor::xmlMap',
                                                                'args' => array(
                                                                    '@value',
                                                                    'entry',
                                                                    'key',
                                                                    'value',
                                                                ),
                                                            ),
                                                        ),
                                                        'items' => array(
                                                            'name' => 'entry',
                                                            'type' => 'object',
                                                            'sentAs' => 'entry',
                                                            'additionalProperties' => true,
                                                            'properties' => array(
                                                                'key' => array(
                                                                    'type' => 'string',
                                                                ),
                                                                'value' => array(
                                                                    'type' => 'string',
                                                                ),
                                                            ),
                                                        ),
                                                        'additionalProperties' => false,
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DeleteRankExpressionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RankExpression' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'RankName' => array(
                                    'type' => 'string',
                                ),
                                'RankExpression' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeDefaultSearchFieldResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DefaultSearchField' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeDomainsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DomainStatusList' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'DomainStatus',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'DomainId' => array(
                                'type' => 'string',
                            ),
                            'DomainName' => array(
                                'type' => 'string',
                            ),
                            'Created' => array(
                                'type' => 'boolean',
                            ),
                            'Deleted' => array(
                                'type' => 'boolean',
                            ),
                            'NumSearchableDocs' => array(
                                'type' => 'numeric',
                            ),
                            'DocService' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Arn' => array(
                                        'type' => 'string',
                                    ),
                                    'Endpoint' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'SearchService' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Arn' => array(
                                        'type' => 'string',
                                    ),
                                    'Endpoint' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'RequiresIndexDocuments' => array(
                                'type' => 'boolean',
                            ),
                            'Processing' => array(
                                'type' => 'boolean',
                            ),
                            'SearchInstanceType' => array(
                                'type' => 'string',
                            ),
                            'SearchPartitionCount' => array(
                                'type' => 'numeric',
                            ),
                            'SearchInstanceCount' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeIndexFieldsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'IndexFields' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'IndexFieldStatus',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Options' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'IndexFieldName' => array(
                                        'type' => 'string',
                                    ),
                                    'IndexFieldType' => array(
                                        'type' => 'string',
                                    ),
                                    'UIntOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                    'LiteralOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'string',
                                            ),
                                            'SearchEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'FacetEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'ResultEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                    'TextOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'string',
                                            ),
                                            'FacetEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'ResultEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'TextProcessor' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'SourceAttributes' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'SourceAttribute',
                                            'type' => 'object',
                                            'sentAs' => 'member',
                                            'properties' => array(
                                                'SourceDataFunction' => array(
                                                    'type' => 'string',
                                                ),
                                                'SourceDataCopy' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'SourceName' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'DefaultValue' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                                'SourceDataTrimTitle' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'SourceName' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'DefaultValue' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Separator' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Language' => array(
                                                            'type' => 'string',
                                                        ),
                                                    ),
                                                ),
                                                'SourceDataMap' => array(
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'SourceName' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'DefaultValue' => array(
                                                            'type' => 'string',
                                                        ),
                                                        'Cases' => array(
                                                            'type' => 'array',
                                                            'filters' => array(
                                                                array(
                                                                    'method' => 'Aws\\Common\\Command\\XmlResponseLocationVisitor::xmlMap',
                                                                    'args' => array(
                                                                        '@value',
                                                                        'entry',
                                                                        'key',
                                                                        'value',
                                                                    ),
                                                                ),
                                                            ),
                                                            'items' => array(
                                                                'name' => 'entry',
                                                                'type' => 'object',
                                                                'sentAs' => 'entry',
                                                                'additionalProperties' => true,
                                                                'properties' => array(
                                                                    'key' => array(
                                                                        'type' => 'string',
                                                                    ),
                                                                    'value' => array(
                                                                        'type' => 'string',
                                                                    ),
                                                                ),
                                                            ),
                                                            'additionalProperties' => false,
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'Status' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CreationDate' => array(
                                        'type' => 'string',
                                    ),
                                    'UpdateDate' => array(
                                        'type' => 'string',
                                    ),
                                    'UpdateVersion' => array(
                                        'type' => 'numeric',
                                    ),
                                    'State' => array(
                                        'type' => 'string',
                                    ),
                                    'PendingDeletion' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeRankExpressionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RankExpressions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'RankExpressionStatus',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Options' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'RankName' => array(
                                        'type' => 'string',
                                    ),
                                    'RankExpression' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'Status' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'CreationDate' => array(
                                        'type' => 'string',
                                    ),
                                    'UpdateDate' => array(
                                        'type' => 'string',
                                    ),
                                    'UpdateVersion' => array(
                                        'type' => 'numeric',
                                    ),
                                    'State' => array(
                                        'type' => 'string',
                                    ),
                                    'PendingDeletion' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeServiceAccessPoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AccessPolicies' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeStemmingOptionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Stems' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeStopwordOptionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Stopwords' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSynonymOptionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Synonyms' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'IndexDocumentsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'FieldNames' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'FieldName',
                        'type' => 'string',
                        'sentAs' => 'member',
                    ),
                ),
            ),
        ),
        'UpdateDefaultSearchFieldResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DefaultSearchField' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UpdateServiceAccessPoliciesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AccessPolicies' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UpdateStemmingOptionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Stems' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UpdateStopwordOptionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Stopwords' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'UpdateSynonymOptionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Synonyms' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'object',
                            'properties' => array(
                                'CreationDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateDate' => array(
                                    'type' => 'string',
                                ),
                                'UpdateVersion' => array(
                                    'type' => 'numeric',
                                ),
                                'State' => array(
                                    'type' => 'string',
                                ),
                                'PendingDeletion' => array(
                                    'type' => 'boolean',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'DescribeDomains' => array(
            'result_key' => 'DomainStatusList',
        ),
        'DescribeIndexFields' => array(
            'result_key' => 'IndexFields',
        ),
        'DescribeRankExpressions' => array(
            'result_key' => 'RankExpressions',
        ),
    ),
);
