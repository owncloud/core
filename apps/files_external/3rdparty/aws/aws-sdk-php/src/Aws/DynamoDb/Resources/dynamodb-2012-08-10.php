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
    'apiVersion' => '2012-08-10',
    'endpointPrefix' => 'dynamodb',
    'serviceFullName' => 'Amazon DynamoDB',
    'serviceAbbreviation' => 'DynamoDB',
    'serviceType' => 'json',
    'jsonVersion' => '1.0',
    'targetPrefix' => 'DynamoDB_20120810.',
    'signatureVersion' => 'v4',
    'namespace' => 'DynamoDb',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.sa-east-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'dynamodb.cn-north-1.amazonaws.com.cn',
        ),
        'us-gov-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'dynamodb.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'BatchGetItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.BatchGetItem',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
        'BatchWriteItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.BatchWriteItem',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
        'CreateTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.CreateTable',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
            ),
        ),
        'DeleteItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.DeleteItem',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
        'DeleteTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.DeleteTable',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
            ),
        ),
        'DescribeTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.DescribeTable',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
            ),
        ),
        'GetItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.GetItem',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
        'ListTables' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.ListTables',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
            ),
        ),
        'PutItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.PutItem',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
        'Query' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.Query',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
        'Scan' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.Scan',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
        'UpdateItem' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.UpdateItem',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
                'filters' => array(
                    'Aws\DynamoDb\DynamoDbCommand::marshalAttributes',
                ),
            ),
        ),
        'UpdateTable' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\DynamoDb\\DynamoDbCommand',
            'responseClass' => 'JsonOutput',
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
                    'default' => 'DynamoDB_20120810.UpdateTable',
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
            ),
        ),
    ),
    'models' => array(
        'JsonOutput' => array(
            'type' => 'object',
            'additionalProperties' => array(
                'location' => 'json',
            )
        ),
    ),
    'iterators' => array(
        'BatchGetItem' => array(
            'input_token' => 'RequestItems',
            'output_token' => 'UnprocessedKeys',
            'result_key' => 'Responses/*',
        ),
        'ListTables' => array(
            'input_token' => 'ExclusiveStartTableName',
            'output_token' => 'LastEvaluatedTableName',
            'limit_key' => 'Limit',
            'result_key' => 'TableNames',
        ),
        'Query' => array(
            'input_token' => 'ExclusiveStartKey',
            'output_token' => 'LastEvaluatedKey',
            'limit_key' => 'Limit',
            'result_key' => 'Items',
        ),
        'Scan' => array(
            'input_token' => 'ExclusiveStartKey',
            'output_token' => 'LastEvaluatedKey',
            'limit_key' => 'Limit',
            'result_key' => 'Items',
        ),
    ),
    'waiters' => array(
        '__default__' => array(
            'interval' => 20,
            'max_attempts' => 25,
        ),
        '__TableState' => array(
            'operation' => 'DescribeTable',
        ),
        'TableExists' => array(
            'extends' => '__TableState',
            'success.type' => 'output',
            'success.path' => 'Table/TableStatus',
            'success.value' => 'ACTIVE',
            'ignore_errors' => array(
                'ResourceNotFoundException',
            ),
        ),
        'TableNotExists' => array(
            'extends' => '__TableState',
            'success.type' => 'error',
            'success.value' => 'ResourceNotFoundException',
        ),
    ),
);
