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
    'apiVersion' => '2012-11-05',
    'endpointPrefix' => 'sqs',
    'serviceFullName' => 'Amazon Simple Queue Service',
    'serviceAbbreviation' => 'Amazon SQS',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'Sqs',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sqs.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sqs.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sqs.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sqs.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sqs.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sqs.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sqs.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sqs.sa-east-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sqs.cn-north-1.amazonaws.com.cn',
        ),
        'us-gov-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'sqs.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AddPermission' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'AddPermission',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Label' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'AWSAccountIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AWSAccountId',
                    'items' => array(
                        'name' => 'AWSAccountId',
                        'type' => 'string',
                    ),
                ),
                'Actions' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ActionName',
                    'items' => array(
                        'name' => 'ActionName',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The action that you requested would violate a limit. For example, ReceiveMessage returns this error if the maximum number of messages inflight has already been reached. AddPermission returns this error if the maximum number of permissions for the queue has already been reached.',
                    'class' => 'OverLimitException',
                ),
            ),
        ),
        'ChangeMessageVisibility' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ChangeMessageVisibility',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReceiptHandle' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'VisibilityTimeout' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The message referred to is not in flight.',
                    'class' => 'MessageNotInflightException',
                ),
                array(
                    'reason' => 'The receipt handle provided is not valid.',
                    'class' => 'ReceiptHandleIsInvalidException',
                ),
            ),
        ),
        'ChangeMessageVisibilityBatch' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ChangeMessageVisibilityBatchResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ChangeMessageVisibilityBatch',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Entries' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'ChangeMessageVisibilityBatchRequestEntry',
                    'items' => array(
                        'name' => 'ChangeMessageVisibilityBatchRequestEntry',
                        'type' => 'object',
                        'properties' => array(
                            'Id' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'ReceiptHandle' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'VisibilityTimeout' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Batch request contains more number of entries than permissible.',
                    'class' => 'TooManyEntriesInBatchRequestException',
                ),
                array(
                    'reason' => 'Batch request does not contain an entry.',
                    'class' => 'EmptyBatchRequestException',
                ),
                array(
                    'reason' => 'Two or more batch entries have the same Id in the request.',
                    'class' => 'BatchEntryIdsNotDistinctException',
                ),
                array(
                    'reason' => 'The Id of a batch entry in a batch request does not abide by the specification.',
                    'class' => 'InvalidBatchEntryIdException',
                ),
            ),
        ),
        'CreateQueue' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'CreateQueueResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'CreateQueue',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attributes' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'sentAs' => 'Attribute',
                    'data' => array(
                        'keyName' => 'Name',
                        'valueName' => 'Value',
                    ),
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'QueueAttributeName',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'You must wait 60 seconds after deleting a queue before you can create another with the same name.',
                    'class' => 'QueueDeletedRecentlyException',
                ),
                array(
                    'reason' => 'A queue already exists with this name. Amazon SQS returns this error only if the request includes attributes whose values differ from those of the existing queue.',
                    'class' => 'QueueNameExistsException',
                ),
            ),
        ),
        'DeleteMessage' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteMessage',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ReceiptHandle' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The receipt handle is not valid for the current version.',
                    'class' => 'InvalidIdFormatException',
                ),
                array(
                    'reason' => 'The receipt handle provided is not valid.',
                    'class' => 'ReceiptHandleIsInvalidException',
                ),
            ),
        ),
        'DeleteMessageBatch' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DeleteMessageBatchResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteMessageBatch',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Entries' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'DeleteMessageBatchRequestEntry',
                    'items' => array(
                        'name' => 'DeleteMessageBatchRequestEntry',
                        'type' => 'object',
                        'properties' => array(
                            'Id' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'ReceiptHandle' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Batch request contains more number of entries than permissible.',
                    'class' => 'TooManyEntriesInBatchRequestException',
                ),
                array(
                    'reason' => 'Batch request does not contain an entry.',
                    'class' => 'EmptyBatchRequestException',
                ),
                array(
                    'reason' => 'Two or more batch entries have the same Id in the request.',
                    'class' => 'BatchEntryIdsNotDistinctException',
                ),
                array(
                    'reason' => 'The Id of a batch entry in a batch request does not abide by the specification.',
                    'class' => 'InvalidBatchEntryIdException',
                ),
            ),
        ),
        'DeleteQueue' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteQueue',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'GetQueueAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetQueueAttributesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetQueueAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
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
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The attribute referred to does not exist.',
                    'class' => 'InvalidAttributeNameException',
                ),
            ),
        ),
        'GetQueueUrl' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetQueueUrlResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetQueueUrl',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'QueueOwnerAWSAccountId' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The queue referred to does not exist.',
                    'class' => 'QueueDoesNotExistException',
                ),
            ),
        ),
        'ListDeadLetterSourceQueues' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListDeadLetterSourceQueuesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListDeadLetterSourceQueues',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The queue referred to does not exist.',
                    'class' => 'QueueDoesNotExistException',
                ),
            ),
        ),
        'ListQueues' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListQueuesResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListQueues',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueNamePrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'ReceiveMessage' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ReceiveMessageResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ReceiveMessage',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
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
                'MessageAttributeNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'MessageAttributeName',
                    'items' => array(
                        'name' => 'MessageAttributeName',
                        'type' => 'string',
                    ),
                ),
                'MaxNumberOfMessages' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'VisibilityTimeout' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'WaitTimeSeconds' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The action that you requested would violate a limit. For example, ReceiveMessage returns this error if the maximum number of messages inflight has already been reached. AddPermission returns this error if the maximum number of permissions for the queue has already been reached.',
                    'class' => 'OverLimitException',
                ),
            ),
        ),
        'RemovePermission' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'RemovePermission',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Label' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'SendMessage' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SendMessageResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SendMessage',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'MessageBody' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'DelaySeconds' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'MessageAttributes' => array(
                    'type' => 'object',
                    'location' => 'aws.query',
                    'sentAs' => 'MessageAttribute',
                    'data' => array(
                        'keyName' => 'Name',
                        'valueName' => 'Value',
                    ),
                    'additionalProperties' => array(
                        'type' => 'object',
                        'data' => array(
                            'shape_name' => 'String',
                        ),
                        'properties' => array(
                            'StringValue' => array(
                                'type' => 'string',
                            ),
                            'BinaryValue' => array(
                                'type' => 'string',
                            ),
                            'StringListValues' => array(
                                'type' => 'array',
                                'sentAs' => 'StringListValue',
                                'items' => array(
                                    'name' => 'StringListValue',
                                    'type' => 'string',
                                ),
                            ),
                            'BinaryListValues' => array(
                                'type' => 'array',
                                'sentAs' => 'BinaryListValue',
                                'items' => array(
                                    'name' => 'BinaryListValue',
                                    'type' => 'string',
                                ),
                            ),
                            'DataType' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The message contains characters outside the allowed set.',
                    'class' => 'InvalidMessageContentsException',
                ),
                array(
                    'reason' => 'Error code 400. Unsupported operation.',
                    'class' => 'UnsupportedOperationException',
                ),
            ),
        ),
        'SendMessageBatch' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'SendMessageBatchResult',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SendMessageBatch',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Entries' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'SendMessageBatchRequestEntry',
                    'items' => array(
                        'name' => 'SendMessageBatchRequestEntry',
                        'type' => 'object',
                        'properties' => array(
                            'Id' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'MessageBody' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                            'DelaySeconds' => array(
                                'type' => 'numeric',
                            ),
                            'MessageAttributes' => array(
                                'type' => 'object',
                                'sentAs' => 'MessageAttribute',
                                'data' => array(
                                    'keyName' => 'Name',
                                    'valueName' => 'Value',
                                ),
                                'additionalProperties' => array(
                                    'type' => 'object',
                                    'data' => array(
                                        'shape_name' => 'String',
                                    ),
                                    'properties' => array(
                                        'StringValue' => array(
                                            'type' => 'string',
                                        ),
                                        'BinaryValue' => array(
                                            'type' => 'string',
                                        ),
                                        'StringListValues' => array(
                                            'type' => 'array',
                                            'sentAs' => 'StringListValue',
                                            'items' => array(
                                                'name' => 'StringListValue',
                                                'type' => 'string',
                                            ),
                                        ),
                                        'BinaryListValues' => array(
                                            'type' => 'array',
                                            'sentAs' => 'BinaryListValue',
                                            'items' => array(
                                                'name' => 'BinaryListValue',
                                                'type' => 'string',
                                            ),
                                        ),
                                        'DataType' => array(
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
            'errorResponses' => array(
                array(
                    'reason' => 'Batch request contains more number of entries than permissible.',
                    'class' => 'TooManyEntriesInBatchRequestException',
                ),
                array(
                    'reason' => 'Batch request does not contain an entry.',
                    'class' => 'EmptyBatchRequestException',
                ),
                array(
                    'reason' => 'Two or more batch entries have the same Id in the request.',
                    'class' => 'BatchEntryIdsNotDistinctException',
                ),
                array(
                    'reason' => 'The length of all the messages put together is more than the limit.',
                    'class' => 'BatchRequestTooLongException',
                ),
                array(
                    'reason' => 'The Id of a batch entry in a batch request does not abide by the specification.',
                    'class' => 'InvalidBatchEntryIdException',
                ),
                array(
                    'reason' => 'Error code 400. Unsupported operation.',
                    'class' => 'UnsupportedOperationException',
                ),
            ),
        ),
        'SetQueueAttributes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetQueueAttributes',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2012-11-05',
                ),
                'QueueUrl' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Attributes' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'aws.query',
                    'sentAs' => 'Attribute',
                    'data' => array(
                        'keyName' => 'Name',
                        'valueName' => 'Value',
                    ),
                    'additionalProperties' => array(
                        'type' => 'string',
                        'data' => array(
                            'shape_name' => 'QueueAttributeName',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The attribute referred to does not exist.',
                    'class' => 'InvalidAttributeNameException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'ChangeMessageVisibilityBatchResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Successful' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'ChangeMessageVisibilityBatchResultEntry',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'ChangeMessageVisibilityBatchResultEntry',
                        'type' => 'object',
                        'sentAs' => 'ChangeMessageVisibilityBatchResultEntry',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Failed' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'BatchResultErrorEntry',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'BatchResultErrorEntry',
                        'type' => 'object',
                        'sentAs' => 'BatchResultErrorEntry',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'SenderFault' => array(
                                'type' => 'boolean',
                            ),
                            'Code' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'CreateQueueResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'QueueUrl' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'DeleteMessageBatchResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Successful' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'DeleteMessageBatchResultEntry',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'DeleteMessageBatchResultEntry',
                        'type' => 'object',
                        'sentAs' => 'DeleteMessageBatchResultEntry',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Failed' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'BatchResultErrorEntry',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'BatchResultErrorEntry',
                        'type' => 'object',
                        'sentAs' => 'BatchResultErrorEntry',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'SenderFault' => array(
                                'type' => 'boolean',
                            ),
                            'Code' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetQueueAttributesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Attributes' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'Attribute',
                    'data' => array(
                        'xmlFlattened' => true,
                        'xmlMap' => array(
                            'Policy',
                            'VisibilityTimeout',
                            'MaximumMessageSize',
                            'MessageRetentionPeriod',
                            'ApproximateNumberOfMessages',
                            'ApproximateNumberOfMessagesNotVisible',
                            'CreatedTimestamp',
                            'LastModifiedTimestamp',
                            'QueueArn',
                            'ApproximateNumberOfMessagesDelayed',
                            'DelaySeconds',
                            'ReceiveMessageWaitTimeSeconds',
                            'RedrivePolicy',
                        ),
                    ),
                    'filters' => array(
                        array(
                            'method' => 'Aws\\Common\\Command\\XmlResponseLocationVisitor::xmlMap',
                            'args' => array(
                                '@value',
                                'Attribute',
                                'Name',
                                'Value',
                            ),
                        ),
                    ),
                    'items' => array(
                        'name' => 'Attribute',
                        'type' => 'object',
                        'sentAs' => 'Attribute',
                        'additionalProperties' => true,
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                    'additionalProperties' => false,
                ),
            ),
        ),
        'GetQueueUrlResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'QueueUrl' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'ListDeadLetterSourceQueuesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'queueUrls' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'QueueUrl',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'QueueUrl',
                        'type' => 'string',
                        'sentAs' => 'QueueUrl',
                    ),
                ),
            ),
        ),
        'ListQueuesResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'QueueUrls' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'QueueUrl',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'QueueUrl',
                        'type' => 'string',
                        'sentAs' => 'QueueUrl',
                    ),
                ),
            ),
        ),
        'ReceiveMessageResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Messages' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'Message',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'Message',
                        'type' => 'object',
                        'sentAs' => 'Message',
                        'properties' => array(
                            'MessageId' => array(
                                'type' => 'string',
                            ),
                            'ReceiptHandle' => array(
                                'type' => 'string',
                            ),
                            'MD5OfBody' => array(
                                'type' => 'string',
                            ),
                            'Body' => array(
                                'type' => 'string',
                            ),
                            'Attributes' => array(
                                'type' => 'array',
                                'sentAs' => 'Attribute',
                                'data' => array(
                                    'xmlFlattened' => true,
                                    'xmlMap' => array(
                                        'Policy',
                                        'VisibilityTimeout',
                                        'MaximumMessageSize',
                                        'MessageRetentionPeriod',
                                        'ApproximateNumberOfMessages',
                                        'ApproximateNumberOfMessagesNotVisible',
                                        'CreatedTimestamp',
                                        'LastModifiedTimestamp',
                                        'QueueArn',
                                        'ApproximateNumberOfMessagesDelayed',
                                        'DelaySeconds',
                                        'ReceiveMessageWaitTimeSeconds',
                                        'RedrivePolicy',
                                    ),
                                ),
                                'filters' => array(
                                    array(
                                        'method' => 'Aws\\Common\\Command\\XmlResponseLocationVisitor::xmlMap',
                                        'args' => array(
                                            '@value',
                                            'Attribute',
                                            'Name',
                                            'Value',
                                        ),
                                    ),
                                ),
                                'items' => array(
                                    'name' => 'Attribute',
                                    'type' => 'object',
                                    'sentAs' => 'Attribute',
                                    'additionalProperties' => true,
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                                'additionalProperties' => false,
                            ),
                            'MD5OfMessageAttributes' => array(
                                'type' => 'string',
                            ),
                            'MessageAttributes' => array(
                                'type' => 'array',
                                'sentAs' => 'MessageAttribute',
                                'data' => array(
                                    'xmlFlattened' => true,
                                ),
                                'filters' => array(
                                    array(
                                        'method' => 'Aws\\Common\\Command\\XmlResponseLocationVisitor::xmlMap',
                                        'args' => array(
                                            '@value',
                                            'MessageAttribute',
                                            'Name',
                                            'Value',
                                        ),
                                    ),
                                ),
                                'items' => array(
                                    'name' => 'MessageAttribute',
                                    'type' => 'object',
                                    'sentAs' => 'MessageAttribute',
                                    'additionalProperties' => true,
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'type' => 'object',
                                            'properties' => array(
                                                'StringValue' => array(
                                                    'type' => 'string',
                                                ),
                                                'BinaryValue' => array(
                                                    'type' => 'string',
                                                ),
                                                'StringListValues' => array(
                                                    'type' => 'array',
                                                    'sentAs' => 'StringListValue',
                                                    'data' => array(
                                                        'xmlFlattened' => true,
                                                    ),
                                                    'items' => array(
                                                        'name' => 'StringListValue',
                                                        'type' => 'string',
                                                        'sentAs' => 'StringListValue',
                                                    ),
                                                ),
                                                'BinaryListValues' => array(
                                                    'type' => 'array',
                                                    'sentAs' => 'BinaryListValue',
                                                    'data' => array(
                                                        'xmlFlattened' => true,
                                                    ),
                                                    'items' => array(
                                                        'name' => 'BinaryListValue',
                                                        'type' => 'string',
                                                        'sentAs' => 'BinaryListValue',
                                                    ),
                                                ),
                                                'DataType' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
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
        'SendMessageResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MD5OfMessageBody' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MD5OfMessageAttributes' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MessageId' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
            ),
        ),
        'SendMessageBatchResult' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Successful' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'SendMessageBatchResultEntry',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'SendMessageBatchResultEntry',
                        'type' => 'object',
                        'sentAs' => 'SendMessageBatchResultEntry',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'MessageId' => array(
                                'type' => 'string',
                            ),
                            'MD5OfMessageBody' => array(
                                'type' => 'string',
                            ),
                            'MD5OfMessageAttributes' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Failed' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'sentAs' => 'BatchResultErrorEntry',
                    'data' => array(
                        'xmlFlattened' => true,
                    ),
                    'items' => array(
                        'name' => 'BatchResultErrorEntry',
                        'type' => 'object',
                        'sentAs' => 'BatchResultErrorEntry',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'SenderFault' => array(
                                'type' => 'boolean',
                            ),
                            'Code' => array(
                                'type' => 'string',
                            ),
                            'Message' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListQueues' => array(
            'result_key' => 'QueueUrls',
        ),
    ),
);
