<?php

return array (
    'apiVersion' => '2014-03-28',
    'endpointPrefix' => 'logs',
    'serviceFullName' => 'Amazon CloudWatch Logs',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'Logs_20140328.',
    'signatureVersion' => 'v4',
    'namespace' => 'CloudWatchLogs',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'logs.us-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CreateLogGroup' => array(
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
                    'default' => 'Logs_20140328.CreateLogGroup',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the specified resource already exists.',
                    'class' => 'ResourceAlreadyExistsException',
                ),
                array(
                    'reason' => 'Returned if you have reached the maximum number of resources that can be created.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Returned if multiple requests to update the same resource were in conflict.',
                    'class' => 'OperationAbortedException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'CreateLogStream' => array(
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
                    'default' => 'Logs_20140328.CreateLogStream',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'logStreamName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the specified resource already exists.',
                    'class' => 'ResourceAlreadyExistsException',
                ),
                array(
                    'reason' => 'Returned if the specified resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'DeleteLogGroup' => array(
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
                    'default' => 'Logs_20140328.DeleteLogGroup',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the specified resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if the resource cannot be deleted because other resources are still associated with it.',
                    'class' => 'ResourceInUseException',
                ),
                array(
                    'reason' => 'Returned if multiple requests to update the same resource were in conflict.',
                    'class' => 'OperationAbortedException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'DeleteLogStream' => array(
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
                    'default' => 'Logs_20140328.DeleteLogStream',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'logStreamName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the specified resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if multiple requests to update the same resource were in conflict.',
                    'class' => 'OperationAbortedException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'DeleteMetricFilter' => array(
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
                    'default' => 'Logs_20140328.DeleteMetricFilter',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'filterName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the specified resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if multiple requests to update the same resource were in conflict.',
                    'class' => 'OperationAbortedException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'DeleteRetentionPolicy' => array(
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
                    'default' => 'Logs_20140328.DeleteRetentionPolicy',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the specified resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if multiple requests to update the same resource were in conflict.',
                    'class' => 'OperationAbortedException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'DescribeLogGroups' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeLogGroupsResponse',
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
                    'default' => 'Logs_20140328.DescribeLogGroups',
                ),
                'logGroupNamePrefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'DescribeLogStreams' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeLogStreamsResponse',
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
                    'default' => 'Logs_20140328.DescribeLogStreams',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'logStreamNamePrefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the specified resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'DescribeMetricFilters' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeMetricFiltersResponse',
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
                    'default' => 'Logs_20140328.DescribeMetricFilters',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'filterNamePrefix' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the specified resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'GetLogEvents' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetLogEventsResponse',
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
                    'default' => 'Logs_20140328.GetLogEvents',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'logStreamName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'startTime' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'endTime' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 10000,
                ),
                'startFromHead' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the specified resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'PutLogEvents' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'PutLogEventsResponse',
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
                    'default' => 'Logs_20140328.PutLogEvents',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'logStreamName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'logEvents' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 1000,
                    'items' => array(
                        'name' => 'InputLogEvent',
                        'type' => 'object',
                        'properties' => array(
                            'timestamp' => array(
                                'required' => true,
                                'type' => 'numeric',
                            ),
                            'message' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 32768,
                            ),
                        ),
                    ),
                ),
                'sequenceToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'class' => 'InvalidSequenceTokenException',
                ),
                array(
                    'class' => 'DataAlreadyAcceptedException',
                ),
                array(
                    'reason' => 'Returned if the specified resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if multiple requests to update the same resource were in conflict.',
                    'class' => 'OperationAbortedException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'PutMetricFilter' => array(
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
                    'default' => 'Logs_20140328.PutMetricFilter',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'filterName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'filterPattern' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 512,
                ),
                'metricTransformations' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 1,
                    'items' => array(
                        'name' => 'MetricTransformation',
                        'type' => 'object',
                        'properties' => array(
                            'metricName' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 255,
                            ),
                            'metricNamespace' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 255,
                            ),
                            'metricValue' => array(
                                'required' => true,
                                'type' => 'string',
                                'maxLength' => 100,
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the specified resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if multiple requests to update the same resource were in conflict.',
                    'class' => 'OperationAbortedException',
                ),
                array(
                    'reason' => 'Returned if you have reached the maximum number of resources that can be created.',
                    'class' => 'LimitExceededException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'PutRetentionPolicy' => array(
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
                    'default' => 'Logs_20140328.PutRetentionPolicy',
                ),
                'logGroupName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 512,
                ),
                'retentionInDays' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
                ),
                array(
                    'reason' => 'Returned if the specified resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Returned if multiple requests to update the same resource were in conflict.',
                    'class' => 'OperationAbortedException',
                ),
                array(
                    'reason' => 'Returned if the service cannot complete the request.',
                    'class' => 'ServiceUnavailableException',
                ),
            ),
        ),
        'TestMetricFilter' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'TestMetricFilterResponse',
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
                    'default' => 'Logs_20140328.TestMetricFilter',
                ),
                'filterPattern' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'maxLength' => 512,
                ),
                'logEventMessages' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'minItems' => 1,
                    'maxItems' => 50,
                    'items' => array(
                        'name' => 'EventMessage',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 32768,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returned if a parameter of the request is incorrectly specified.',
                    'class' => 'InvalidParameterException',
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
        'DescribeLogGroupsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'logGroups' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'LogGroup',
                        'type' => 'object',
                        'properties' => array(
                            'logGroupName' => array(
                                'type' => 'string',
                            ),
                            'creationTime' => array(
                                'type' => 'numeric',
                            ),
                            'retentionInDays' => array(
                                'type' => 'numeric',
                            ),
                            'metricFilterCount' => array(
                                'type' => 'numeric',
                            ),
                            'arn' => array(
                                'type' => 'string',
                            ),
                            'storedBytes' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeLogStreamsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'logStreams' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'LogStream',
                        'type' => 'object',
                        'properties' => array(
                            'logStreamName' => array(
                                'type' => 'string',
                            ),
                            'creationTime' => array(
                                'type' => 'numeric',
                            ),
                            'firstEventTimestamp' => array(
                                'type' => 'numeric',
                            ),
                            'lastEventTimestamp' => array(
                                'type' => 'numeric',
                            ),
                            'lastIngestionTime' => array(
                                'type' => 'numeric',
                            ),
                            'uploadSequenceToken' => array(
                                'type' => 'string',
                            ),
                            'arn' => array(
                                'type' => 'string',
                            ),
                            'storedBytes' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeMetricFiltersResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'metricFilters' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'MetricFilter',
                        'type' => 'object',
                        'properties' => array(
                            'filterName' => array(
                                'type' => 'string',
                            ),
                            'filterPattern' => array(
                                'type' => 'string',
                            ),
                            'metricTransformations' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'MetricTransformation',
                                    'type' => 'object',
                                    'properties' => array(
                                        'metricName' => array(
                                            'type' => 'string',
                                        ),
                                        'metricNamespace' => array(
                                            'type' => 'string',
                                        ),
                                        'metricValue' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'creationTime' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetLogEventsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'events' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'OutputLogEvent',
                        'type' => 'object',
                        'properties' => array(
                            'timestamp' => array(
                                'type' => 'numeric',
                            ),
                            'message' => array(
                                'type' => 'string',
                            ),
                            'ingestionTime' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'nextForwardToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'nextBackwardToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'PutLogEventsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'nextSequenceToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'TestMetricFilterResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'matches' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'MetricFilterMatchRecord',
                        'type' => 'object',
                        'properties' => array(
                            'eventNumber' => array(
                                'type' => 'numeric',
                            ),
                            'eventMessage' => array(
                                'type' => 'string',
                            ),
                            'extractedValues' => array(
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
    ),
    'iterators' => array(
        'DescribeLogGroups' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'limit_key' => 'limit',
            'result_key' => 'logGroups',
        ),
        'DescribeLogStreams' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'limit_key' => 'limit',
            'result_key' => 'logStreams',
        ),
        'DescribeMetricFilters' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextToken',
            'limit_key' => 'limit',
            'result_key' => 'metricFilters',
        ),
        'GetLogEvents' => array(
            'input_token' => 'nextToken',
            'output_token' => 'nextForwardToken',
            'limit_key' => 'limit',
            'result_key' => 'events',
        ),
    ),
);
