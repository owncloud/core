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
    'apiVersion' => '2013-01-01',
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
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudsearch.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudsearch.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudsearch.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'cloudsearch.sa-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'BuildSuggesters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'BuildSuggestersResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'BuildSuggesters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
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
                    'default' => '2013-01-01',
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
        'DefineAnalysisScheme' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DefineAnalysisSchemeResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DefineAnalysisScheme',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'AnalysisScheme' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'AnalysisSchemeName' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                        'AnalysisSchemeLanguage' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'AnalysisOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Synonyms' => array(
                                    'type' => 'string',
                                ),
                                'Stopwords' => array(
                                    'type' => 'string',
                                ),
                                'StemmingDictionary' => array(
                                    'type' => 'string',
                                ),
                                'JapaneseTokenizationDictionary' => array(
                                    'type' => 'string',
                                ),
                                'AlgorithmicStemming' => array(
                                    'type' => 'string',
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
        'DefineExpression' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DefineExpressionResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DefineExpression',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'Expression' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'ExpressionName' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                        'ExpressionValue' => array(
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
                    'default' => '2013-01-01',
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
                        'IntOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'numeric',
                                ),
                                'SourceField' => array(
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 64,
                                ),
                                'FacetEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SearchEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'ReturnEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SortEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                            ),
                        ),
                        'DoubleOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'numeric',
                                ),
                                'SourceField' => array(
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 64,
                                ),
                                'FacetEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SearchEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'ReturnEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SortEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
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
                                'SourceField' => array(
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 64,
                                ),
                                'FacetEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SearchEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'ReturnEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SortEnabled' => array(
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
                                'SourceField' => array(
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 64,
                                ),
                                'ReturnEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SortEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'HighlightEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'AnalysisScheme' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'DateOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'string',
                                    'maxLength' => 1024,
                                ),
                                'SourceField' => array(
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 64,
                                ),
                                'FacetEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SearchEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'ReturnEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SortEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                            ),
                        ),
                        'LatLonOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'string',
                                    'maxLength' => 1024,
                                ),
                                'SourceField' => array(
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 64,
                                ),
                                'FacetEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SearchEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'ReturnEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SortEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                            ),
                        ),
                        'IntArrayOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'numeric',
                                ),
                                'SourceFields' => array(
                                    'type' => 'string',
                                ),
                                'FacetEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SearchEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'ReturnEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                            ),
                        ),
                        'DoubleArrayOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'numeric',
                                ),
                                'SourceFields' => array(
                                    'type' => 'string',
                                ),
                                'FacetEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SearchEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'ReturnEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                            ),
                        ),
                        'LiteralArrayOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'string',
                                    'maxLength' => 1024,
                                ),
                                'SourceFields' => array(
                                    'type' => 'string',
                                ),
                                'FacetEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SearchEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'ReturnEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                            ),
                        ),
                        'TextArrayOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'string',
                                    'maxLength' => 1024,
                                ),
                                'SourceFields' => array(
                                    'type' => 'string',
                                ),
                                'ReturnEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'HighlightEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'AnalysisScheme' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'DateArrayOptions' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DefaultValue' => array(
                                    'type' => 'string',
                                    'maxLength' => 1024,
                                ),
                                'SourceFields' => array(
                                    'type' => 'string',
                                ),
                                'FacetEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'SearchEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
                                ),
                                'ReturnEnabled' => array(
                                    'type' => 'boolean',
                                    'format' => 'boolean-string',
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
        'DefineSuggester' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DefineSuggesterResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DefineSuggester',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'Suggester' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'SuggesterName' => array(
                            'required' => true,
                            'type' => 'string',
                            'minLength' => 1,
                            'maxLength' => 64,
                        ),
                        'DocumentSuggesterOptions' => array(
                            'required' => true,
                            'type' => 'object',
                            'properties' => array(
                                'SourceField' => array(
                                    'required' => true,
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'maxLength' => 64,
                                ),
                                'FuzzyMatching' => array(
                                    'type' => 'string',
                                ),
                                'SortExpression' => array(
                                    'type' => 'string',
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
        'DeleteAnalysisScheme' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeleteAnalysisSchemeResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteAnalysisScheme',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'AnalysisSchemeName' => array(
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
                    'default' => '2013-01-01',
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
        'DeleteExpression' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeleteExpressionResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteExpression',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'ExpressionName' => array(
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
                    'default' => '2013-01-01',
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
        'DeleteSuggester' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeleteSuggesterResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteSuggester',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'SuggesterName' => array(
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
        'DescribeAnalysisSchemes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAnalysisSchemesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAnalysisSchemes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'AnalysisSchemeNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AnalysisSchemeNames.member',
                    'items' => array(
                        'name' => 'FieldName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 64,
                    ),
                ),
                'Deployed' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
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
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeAvailabilityOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAvailabilityOptionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAvailabilityOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'Deployed' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
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
                array(
                    'reason' => 'The request was rejected because it attempted an operation which is not enabled.',
                    'class' => 'DisabledOperationException',
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
                    'default' => '2013-01-01',
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
        'DescribeExpressions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeExpressionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeExpressions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'ExpressionNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ExpressionNames.member',
                    'items' => array(
                        'name' => 'FieldName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 64,
                    ),
                ),
                'Deployed' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
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
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
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
                    'default' => '2013-01-01',
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
                'Deployed' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
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
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeScalingParameters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeScalingParametersResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeScalingParameters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
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
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'Deployed' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
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
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeSuggesters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeSuggestersResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeSuggesters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'SuggesterNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SuggesterNames.member',
                    'items' => array(
                        'name' => 'FieldName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 64,
                    ),
                ),
                'Deployed' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
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
                    'default' => '2013-01-01',
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
        'ListDomainNames' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListDomainNamesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListDomainNames',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An error occurred while processing the request.',
                    'class' => 'BaseException',
                ),
            ),
        ),
        'UpdateAvailabilityOptions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UpdateAvailabilityOptionsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateAvailabilityOptions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'MultiAZ' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
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
                array(
                    'reason' => 'The request was rejected because it attempted an operation which is not enabled.',
                    'class' => 'DisabledOperationException',
                ),
            ),
        ),
        'UpdateScalingParameters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'UpdateScalingParametersResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'UpdateScalingParameters',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2013-01-01',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 3,
                    'maxLength' => 28,
                ),
                'ScalingParameters' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'DesiredInstanceType' => array(
                            'type' => 'string',
                        ),
                        'DesiredReplicationCount' => array(
                            'type' => 'numeric',
                        ),
                        'DesiredPartitionCount' => array(
                            'type' => 'numeric',
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
                    'reason' => 'The request was rejected because it attempted to reference a resource that does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'The request was rejected because it specified an invalid type definition.',
                    'class' => 'InvalidTypeException',
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
                    'default' => '2013-01-01',
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
    ),
    'models' => array(
        'BuildSuggestersResponse' => array(
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
                        'ARN' => array(
                            'type' => 'string',
                        ),
                        'Created' => array(
                            'type' => 'boolean',
                        ),
                        'Deleted' => array(
                            'type' => 'boolean',
                        ),
                        'DocService' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Endpoint' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'SearchService' => array(
                            'type' => 'object',
                            'properties' => array(
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
                        'Limits' => array(
                            'type' => 'object',
                            'properties' => array(
                                'MaximumReplicationCount' => array(
                                    'type' => 'numeric',
                                ),
                                'MaximumPartitionCount' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DefineAnalysisSchemeResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AnalysisScheme' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'AnalysisSchemeName' => array(
                                    'type' => 'string',
                                ),
                                'AnalysisSchemeLanguage' => array(
                                    'type' => 'string',
                                ),
                                'AnalysisOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Synonyms' => array(
                                            'type' => 'string',
                                        ),
                                        'Stopwords' => array(
                                            'type' => 'string',
                                        ),
                                        'StemmingDictionary' => array(
                                            'type' => 'string',
                                        ),
                                        'JapaneseTokenizationDictionary' => array(
                                            'type' => 'string',
                                        ),
                                        'AlgorithmicStemming' => array(
                                            'type' => 'string',
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
        'DefineExpressionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Expression' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'ExpressionName' => array(
                                    'type' => 'string',
                                ),
                                'ExpressionValue' => array(
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
                                'IntOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'numeric',
                                        ),
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'DoubleOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'numeric',
                                        ),
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'LiteralOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
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
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'HighlightEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'AnalysisScheme' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'DateOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'LatLonOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'IntArrayOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'numeric',
                                        ),
                                        'SourceFields' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'DoubleArrayOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'numeric',
                                        ),
                                        'SourceFields' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'LiteralArrayOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceFields' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'TextArrayOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceFields' => array(
                                            'type' => 'string',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'HighlightEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'AnalysisScheme' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'DateArrayOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceFields' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
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
        'DefineSuggesterResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Suggester' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'SuggesterName' => array(
                                    'type' => 'string',
                                ),
                                'DocumentSuggesterOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FuzzyMatching' => array(
                                            'type' => 'string',
                                        ),
                                        'SortExpression' => array(
                                            'type' => 'string',
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
        'DeleteAnalysisSchemeResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AnalysisScheme' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'AnalysisSchemeName' => array(
                                    'type' => 'string',
                                ),
                                'AnalysisSchemeLanguage' => array(
                                    'type' => 'string',
                                ),
                                'AnalysisOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'Synonyms' => array(
                                            'type' => 'string',
                                        ),
                                        'Stopwords' => array(
                                            'type' => 'string',
                                        ),
                                        'StemmingDictionary' => array(
                                            'type' => 'string',
                                        ),
                                        'JapaneseTokenizationDictionary' => array(
                                            'type' => 'string',
                                        ),
                                        'AlgorithmicStemming' => array(
                                            'type' => 'string',
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
                        'ARN' => array(
                            'type' => 'string',
                        ),
                        'Created' => array(
                            'type' => 'boolean',
                        ),
                        'Deleted' => array(
                            'type' => 'boolean',
                        ),
                        'DocService' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Endpoint' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'SearchService' => array(
                            'type' => 'object',
                            'properties' => array(
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
                        'Limits' => array(
                            'type' => 'object',
                            'properties' => array(
                                'MaximumReplicationCount' => array(
                                    'type' => 'numeric',
                                ),
                                'MaximumPartitionCount' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DeleteExpressionResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Expression' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'ExpressionName' => array(
                                    'type' => 'string',
                                ),
                                'ExpressionValue' => array(
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
                                'IntOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'numeric',
                                        ),
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'DoubleOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'numeric',
                                        ),
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'LiteralOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
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
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'HighlightEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'AnalysisScheme' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'DateOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'LatLonOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SortEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'IntArrayOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'numeric',
                                        ),
                                        'SourceFields' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'DoubleArrayOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'numeric',
                                        ),
                                        'SourceFields' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'LiteralArrayOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceFields' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                    ),
                                ),
                                'TextArrayOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceFields' => array(
                                            'type' => 'string',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'HighlightEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'AnalysisScheme' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'DateArrayOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'DefaultValue' => array(
                                            'type' => 'string',
                                        ),
                                        'SourceFields' => array(
                                            'type' => 'string',
                                        ),
                                        'FacetEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'SearchEnabled' => array(
                                            'type' => 'boolean',
                                        ),
                                        'ReturnEnabled' => array(
                                            'type' => 'boolean',
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
        'DeleteSuggesterResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Suggester' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'SuggesterName' => array(
                                    'type' => 'string',
                                ),
                                'DocumentSuggesterOptions' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'SourceField' => array(
                                            'type' => 'string',
                                        ),
                                        'FuzzyMatching' => array(
                                            'type' => 'string',
                                        ),
                                        'SortExpression' => array(
                                            'type' => 'string',
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
        'DescribeAnalysisSchemesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AnalysisSchemes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'AnalysisSchemeStatus',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Options' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'AnalysisSchemeName' => array(
                                        'type' => 'string',
                                    ),
                                    'AnalysisSchemeLanguage' => array(
                                        'type' => 'string',
                                    ),
                                    'AnalysisOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'Synonyms' => array(
                                                'type' => 'string',
                                            ),
                                            'Stopwords' => array(
                                                'type' => 'string',
                                            ),
                                            'StemmingDictionary' => array(
                                                'type' => 'string',
                                            ),
                                            'JapaneseTokenizationDictionary' => array(
                                                'type' => 'string',
                                            ),
                                            'AlgorithmicStemming' => array(
                                                'type' => 'string',
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
        'DescribeAvailabilityOptionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AvailabilityOptions' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'boolean',
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
                            'ARN' => array(
                                'type' => 'string',
                            ),
                            'Created' => array(
                                'type' => 'boolean',
                            ),
                            'Deleted' => array(
                                'type' => 'boolean',
                            ),
                            'DocService' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Endpoint' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'SearchService' => array(
                                'type' => 'object',
                                'properties' => array(
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
                            'Limits' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'MaximumReplicationCount' => array(
                                        'type' => 'numeric',
                                    ),
                                    'MaximumPartitionCount' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeExpressionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Expressions' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ExpressionStatus',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Options' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'ExpressionName' => array(
                                        'type' => 'string',
                                    ),
                                    'ExpressionValue' => array(
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
                                    'IntOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'numeric',
                                            ),
                                            'SourceField' => array(
                                                'type' => 'string',
                                            ),
                                            'FacetEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SearchEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'ReturnEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SortEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                    'DoubleOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'numeric',
                                            ),
                                            'SourceField' => array(
                                                'type' => 'string',
                                            ),
                                            'FacetEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SearchEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'ReturnEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SortEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                    'LiteralOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'string',
                                            ),
                                            'SourceField' => array(
                                                'type' => 'string',
                                            ),
                                            'FacetEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SearchEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'ReturnEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SortEnabled' => array(
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
                                            'SourceField' => array(
                                                'type' => 'string',
                                            ),
                                            'ReturnEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SortEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'HighlightEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'AnalysisScheme' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'DateOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'string',
                                            ),
                                            'SourceField' => array(
                                                'type' => 'string',
                                            ),
                                            'FacetEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SearchEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'ReturnEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SortEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                    'LatLonOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'string',
                                            ),
                                            'SourceField' => array(
                                                'type' => 'string',
                                            ),
                                            'FacetEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SearchEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'ReturnEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SortEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                    'IntArrayOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'numeric',
                                            ),
                                            'SourceFields' => array(
                                                'type' => 'string',
                                            ),
                                            'FacetEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SearchEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'ReturnEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                    'DoubleArrayOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'numeric',
                                            ),
                                            'SourceFields' => array(
                                                'type' => 'string',
                                            ),
                                            'FacetEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SearchEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'ReturnEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                    'LiteralArrayOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'string',
                                            ),
                                            'SourceFields' => array(
                                                'type' => 'string',
                                            ),
                                            'FacetEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SearchEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'ReturnEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                        ),
                                    ),
                                    'TextArrayOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'string',
                                            ),
                                            'SourceFields' => array(
                                                'type' => 'string',
                                            ),
                                            'ReturnEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'HighlightEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'AnalysisScheme' => array(
                                                'type' => 'string',
                                            ),
                                        ),
                                    ),
                                    'DateArrayOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'DefaultValue' => array(
                                                'type' => 'string',
                                            ),
                                            'SourceFields' => array(
                                                'type' => 'string',
                                            ),
                                            'FacetEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'SearchEnabled' => array(
                                                'type' => 'boolean',
                                            ),
                                            'ReturnEnabled' => array(
                                                'type' => 'boolean',
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
        'DescribeScalingParametersResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ScalingParameters' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DesiredInstanceType' => array(
                                    'type' => 'string',
                                ),
                                'DesiredReplicationCount' => array(
                                    'type' => 'numeric',
                                ),
                                'DesiredPartitionCount' => array(
                                    'type' => 'numeric',
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
        'DescribeSuggestersResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Suggesters' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'SuggesterStatus',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Options' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'SuggesterName' => array(
                                        'type' => 'string',
                                    ),
                                    'DocumentSuggesterOptions' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'SourceField' => array(
                                                'type' => 'string',
                                            ),
                                            'FuzzyMatching' => array(
                                                'type' => 'string',
                                            ),
                                            'SortExpression' => array(
                                                'type' => 'string',
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
        'ListDomainNamesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DomainNames' => array(
                    'type' => 'array',
                    'location' => 'xml',
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
        'UpdateAvailabilityOptionsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AvailabilityOptions' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'boolean',
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
        'UpdateScalingParametersResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ScalingParameters' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Options' => array(
                            'type' => 'object',
                            'properties' => array(
                                'DesiredInstanceType' => array(
                                    'type' => 'string',
                                ),
                                'DesiredReplicationCount' => array(
                                    'type' => 'numeric',
                                ),
                                'DesiredPartitionCount' => array(
                                    'type' => 'numeric',
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
    ),
    'iterators' => array(
        'DescribeAnalysisSchemes' => array(
            'result_key' => 'AnalysisSchemes',
        ),
        'DescribeDomains' => array(
            'result_key' => 'DomainStatusList',
        ),
        'DescribeExpressions' => array(
            'result_key' => 'Expressions',
        ),
        'DescribeIndexFields' => array(
            'result_key' => 'IndexFields',
        ),
        'DescribeSuggesters' => array(
            'result_key' => 'Suggesters',
        ),
    ),
);
