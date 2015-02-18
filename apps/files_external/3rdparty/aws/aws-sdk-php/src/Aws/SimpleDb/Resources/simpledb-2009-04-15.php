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
    'apiVersion' => '2009-04-15',
    'endpointPrefix' => 'sdb',
    'serviceFullName' => 'Amazon SimpleDB',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v2',
    'namespace' => 'SimpleDb',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sdb.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sdb.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sdb.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sdb.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sdb.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sdb.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sdb.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sdb.sa-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'BatchDeleteAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'BatchDeleteAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2009-04-15',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Items' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Item',
                    'items' => array(
                        'name' => 'Item',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'sentAs' => 'ItemName',
                            ),
                            'Attributes' => array(
                                'type' => 'array',
                                'sentAs' => 'Attribute',
                                'items' => array(
                                    'name' => 'Attribute',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Name' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                        'AlternateNameEncoding' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                        'AlternateValueEncoding' => array(
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
        'BatchPutAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'BatchPutAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2009-04-15',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Items' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Item',
                    'items' => array(
                        'name' => 'Item',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'sentAs' => 'ItemName',
                            ),
                            'Attributes' => array(
                                'required' => true,
                                'type' => 'array',
                                'sentAs' => 'Attribute',
                                'items' => array(
                                    'name' => 'Attribute',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Name' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'required' => true,
                                            'type' => 'string',
                                        ),
                                        'Replace' => array(
                                            'type' => 'boolean',
                                            'format' => 'boolean-string',
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
                    'reason' => 'The item name was specified more than once.',
                    'class' => 'DuplicateItemNameException',
                ),
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'The request must contain the specified missing parameter.',
                    'class' => 'MissingParameterException',
                ),
                array(
                    'reason' => 'The specified domain does not exist.',
                    'class' => 'NoSuchDomainException',
                ),
                array(
                    'reason' => 'Too many attributes in this item.',
                    'class' => 'NumberItemAttributesExceededException',
                ),
                array(
                    'reason' => 'Too many attributes in this domain.',
                    'class' => 'NumberDomainAttributesExceededException',
                ),
                array(
                    'reason' => 'Too many bytes in this domain.',
                    'class' => 'NumberDomainBytesExceededException',
                ),
                array(
                    'reason' => 'Too many items exist in a single call.',
                    'class' => 'NumberSubmittedItemsExceededException',
                ),
                array(
                    'reason' => 'Too many attributes exist in a single call.',
                    'class' => 'NumberSubmittedAttributesExceededException',
                ),
            ),
        ),
        'CreateDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
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
                    'default' => '2009-04-15',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'The request must contain the specified missing parameter.',
                    'class' => 'MissingParameterException',
                ),
                array(
                    'reason' => 'Too many domains exist per this account.',
                    'class' => 'NumberDomainsExceededException',
                ),
            ),
        ),
        'DeleteAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2009-04-15',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ItemName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attributes' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Attribute',
                    'items' => array(
                        'name' => 'Attribute',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'AlternateNameEncoding' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                            'AlternateValueEncoding' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Expected' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Value' => array(
                            'type' => 'string',
                        ),
                        'Exists' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'The request must contain the specified missing parameter.',
                    'class' => 'MissingParameterException',
                ),
                array(
                    'reason' => 'The specified domain does not exist.',
                    'class' => 'NoSuchDomainException',
                ),
                array(
                    'reason' => 'The specified attribute does not exist.',
                    'class' => 'AttributeDoesNotExistException',
                ),
            ),
        ),
        'DeleteDomain' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
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
                    'default' => '2009-04-15',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request must contain the specified missing parameter.',
                    'class' => 'MissingParameterException',
                ),
            ),
        ),
        'DomainMetadata' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DomainMetadataResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DomainMetadata',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2009-04-15',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The request must contain the specified missing parameter.',
                    'class' => 'MissingParameterException',
                ),
                array(
                    'reason' => 'The specified domain does not exist.',
                    'class' => 'NoSuchDomainException',
                ),
            ),
        ),
        'GetAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetAttributesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2009-04-15',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ItemName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AttributeNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AttributeName',
                    'items' => array(
                        'name' => 'AttributeName',
                        'type' => 'string',
                    ),
                ),
                'ConsistentRead' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'The request must contain the specified missing parameter.',
                    'class' => 'MissingParameterException',
                ),
                array(
                    'reason' => 'The specified domain does not exist.',
                    'class' => 'NoSuchDomainException',
                ),
            ),
        ),
        'ListDomains' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListDomainsResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListDomains',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2009-04-15',
                ),
                'MaxNumberOfDomains' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'The specified NextToken is not valid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'PutAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PutAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2009-04-15',
                ),
                'DomainName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ItemName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attributes' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Attribute',
                    'items' => array(
                        'name' => 'Attribute',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'Replace' => array(
                                'type' => 'boolean',
                                'format' => 'boolean-string',
                            ),
                        ),
                    ),
                ),
                'Expected' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'properties' => array(
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'Value' => array(
                            'type' => 'string',
                        ),
                        'Exists' => array(
                            'type' => 'boolean',
                            'format' => 'boolean-string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'The request must contain the specified missing parameter.',
                    'class' => 'MissingParameterException',
                ),
                array(
                    'reason' => 'The specified domain does not exist.',
                    'class' => 'NoSuchDomainException',
                ),
                array(
                    'reason' => 'Too many attributes in this domain.',
                    'class' => 'NumberDomainAttributesExceededException',
                ),
                array(
                    'reason' => 'Too many bytes in this domain.',
                    'class' => 'NumberDomainBytesExceededException',
                ),
                array(
                    'reason' => 'Too many attributes in this item.',
                    'class' => 'NumberItemAttributesExceededException',
                ),
                array(
                    'reason' => 'The specified attribute does not exist.',
                    'class' => 'AttributeDoesNotExistException',
                ),
            ),
        ),
        'Select' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SelectResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'Select',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2009-04-15',
                ),
                'SelectExpression' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ConsistentRead' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The value for a parameter is invalid.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'The specified NextToken is not valid.',
                    'class' => 'InvalidNextTokenException',
                ),
                array(
                    'reason' => 'Too many predicates exist in the query expression.',
                    'class' => 'InvalidNumberPredicatesException',
                ),
                array(
                    'reason' => 'Too many predicates exist in the query expression.',
                    'class' => 'InvalidNumberValueTestsException',
                ),
                array(
                    'reason' => 'The specified query expression syntax is not valid.',
                    'class' => 'InvalidQueryExpressionException',
                ),
                array(
                    'reason' => 'The request must contain the specified missing parameter.',
                    'class' => 'MissingParameterException',
                ),
                array(
                    'reason' => 'The specified domain does not exist.',
                    'class' => 'NoSuchDomainException',
                ),
                array(
                    'reason' => 'A timeout occurred when attempting to query the specified domain with specified query expression.',
                    'class' => 'RequestTimeoutException',
                ),
                array(
                    'reason' => 'Too many attributes requested.',
                    'class' => 'TooManyRequestedAttributesException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DomainMetadataResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ItemCount' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'ItemNamesSizeBytes' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'AttributeNameCount' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'AttributeNamesSizeBytes' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'AttributeValueCount' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'AttributeValuesSizeBytes' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
                'Timestamp' => array(
                    'type' => 'numeric',
                    'location' => 'xml',
                ),
            ),
        ),
        'GetAttributesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Attributes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'Attribute',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'Attribute',
                        'type' => 'object',
                        'sentAs' => 'Attribute',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'AlternateNameEncoding' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                            'AlternateValueEncoding' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListDomainsResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'DomainNames' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'DomainName',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'DomainName',
                        'type' => 'string',
                        'sentAs' => 'DomainName',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'SelectResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Items' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'Item',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'Item',
                        'type' => 'object',
                        'sentAs' => 'Item',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'AlternateNameEncoding' => array(
                                'type' => 'string',
                            ),
                            'Attributes' => array(
                                'type' => 'array',
                                'sentAs' => 'Attribute',
                                'data' => array(
                                    'xmlFlattened' => true,
                                ),
                                'items' => array(
                                    'name' => 'Attribute',
                                    'type' => 'object',
                                    'sentAs' => 'Attribute',
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                        'AlternateNameEncoding' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                        'AlternateValueEncoding' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListDomains' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxNumberOfDomains',
            'result_key' => 'DomainNames',
        ),
        'Select' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'result_key' => 'Items',
        ),
    ),
);
