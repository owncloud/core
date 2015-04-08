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
    'apiVersion' => '2010-08-01',
    'endpointPrefix' => 'monitoring',
    'serviceFullName' => 'Amazon CloudWatch',
    'serviceAbbreviation' => 'CloudWatch',
    'serviceType' => 'query',
    'resultWrapped' => true,
    'signatureVersion' => 'v4',
    'namespace' => 'CloudWatch',
    'regions' => array(
        'us-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'monitoring.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'monitoring.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'monitoring.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'monitoring.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'monitoring.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'monitoring.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'monitoring.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'monitoring.sa-east-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'monitoring.cn-north-1.amazonaws.com.cn',
        ),
        'us-gov-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'monitoring.us-gov-west-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'DeleteAlarms' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DeleteAlarms',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-08-01',
                ),
                'AlarmNames' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AlarmNames.member',
                    'maxItems' => 100,
                    'items' => array(
                        'name' => 'AlarmName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The named resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
            ),
        ),
        'DescribeAlarmHistory' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAlarmHistoryOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAlarmHistory',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-08-01',
                ),
                'AlarmName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'HistoryItemType' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'StartDate' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'EndDate' => array(
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 100,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The next token specified is invalid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'DescribeAlarms' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAlarmsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAlarms',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-08-01',
                ),
                'AlarmNames' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AlarmNames.member',
                    'maxItems' => 100,
                    'items' => array(
                        'name' => 'AlarmName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
                'AlarmNamePrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'StateValue' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'ActionPrefix' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 1024,
                ),
                'MaxRecords' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                    'maximum' => 100,
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The next token specified is invalid.',
                    'class' => 'InvalidNextTokenException',
                ),
            ),
        ),
        'DescribeAlarmsForMetric' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'DescribeAlarmsForMetricOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DescribeAlarmsForMetric',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-08-01',
                ),
                'MetricName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'Namespace' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'Statistic' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Dimensions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Dimensions.member',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'Dimension',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                            'Value' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                        ),
                    ),
                ),
                'Period' => array(
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 60,
                ),
                'Unit' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
        ),
        'DisableAlarmActions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'DisableAlarmActions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-08-01',
                ),
                'AlarmNames' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AlarmNames.member',
                    'maxItems' => 100,
                    'items' => array(
                        'name' => 'AlarmName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
            ),
        ),
        'EnableAlarmActions' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'EnableAlarmActions',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-08-01',
                ),
                'AlarmNames' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AlarmNames.member',
                    'maxItems' => 100,
                    'items' => array(
                        'name' => 'AlarmName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 255,
                    ),
                ),
            ),
        ),
        'GetMetricStatistics' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'GetMetricStatisticsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'GetMetricStatistics',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-08-01',
                ),
                'Namespace' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'MetricName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'Dimensions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Dimensions.member',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'Dimension',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                            'Value' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                        ),
                    ),
                ),
                'StartTime' => array(
                    'required' => true,
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'EndTime' => array(
                    'required' => true,
                    'type' => array(
                        'object',
                        'string',
                        'integer',
                    ),
                    'format' => 'date-time',
                    'location' => 'aws.query',
                ),
                'Period' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 60,
                ),
                'Statistics' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Statistics.member',
                    'minItems' => 1,
                    'maxItems' => 5,
                    'items' => array(
                        'name' => 'Statistic',
                        'type' => 'string',
                    ),
                ),
                'Unit' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Bad or out-of-range value was supplied for the input parameter.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'An input parameter that is mandatory for processing the request is not supplied.',
                    'class' => 'MissingRequiredParameterException',
                ),
                array(
                    'reason' => 'Parameters that must not be used together were used together.',
                    'class' => 'InvalidParameterCombinationException',
                ),
                array(
                    'reason' => 'Indicates that the request processing has failed due to some unknown error, exception, or failure.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'ListMetrics' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'ListMetricsOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'ListMetrics',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-08-01',
                ),
                'Namespace' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'MetricName' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'Dimensions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Dimensions.member',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'DimensionFilter',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                            'Value' => array(
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                        ),
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that the request processing has failed due to some unknown error, exception, or failure.',
                    'class' => 'InternalServiceException',
                ),
                array(
                    'reason' => 'Bad or out-of-range value was supplied for the input parameter.',
                    'class' => 'InvalidParameterValueException',
                ),
            ),
        ),
        'PutMetricAlarm' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PutMetricAlarm',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-08-01',
                ),
                'AlarmName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'AlarmDescription' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 255,
                ),
                'ActionsEnabled' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'aws.query',
                ),
                'OKActions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'OKActions.member',
                    'maxItems' => 5,
                    'items' => array(
                        'name' => 'ResourceName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1024,
                    ),
                ),
                'AlarmActions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'AlarmActions.member',
                    'maxItems' => 5,
                    'items' => array(
                        'name' => 'ResourceName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1024,
                    ),
                ),
                'InsufficientDataActions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'InsufficientDataActions.member',
                    'maxItems' => 5,
                    'items' => array(
                        'name' => 'ResourceName',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 1024,
                    ),
                ),
                'MetricName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'Namespace' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'Statistic' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'Dimensions' => array(
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'Dimensions.member',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'Dimension',
                        'type' => 'object',
                        'properties' => array(
                            'Name' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                            'Value' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                        ),
                    ),
                ),
                'Period' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 60,
                ),
                'Unit' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'EvaluationPeriods' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                    'minimum' => 1,
                ),
                'Threshold' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'aws.query',
                ),
                'ComparisonOperator' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The quota for alarms for this customer has already been reached.',
                    'class' => 'LimitExceededException',
                ),
            ),
        ),
        'PutMetricData' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'PutMetricData',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-08-01',
                ),
                'Namespace' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'MetricData' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'aws.query',
                    'sentAs' => 'MetricData.member',
                    'items' => array(
                        'name' => 'MetricDatum',
                        'type' => 'object',
                        'properties' => array(
                            'MetricName' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                                'maxLength' => 255,
                            ),
                            'Dimensions' => array(
                                'type' => 'array',
                                'sentAs' => 'Dimensions.member',
                                'maxItems' => 10,
                                'items' => array(
                                    'name' => 'Dimension',
                                    'type' => 'object',
                                    'properties' => array(
                                        'Name' => array(
                                            'required' => true,
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 255,
                                        ),
                                        'Value' => array(
                                            'required' => true,
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'maxLength' => 255,
                                        ),
                                    ),
                                ),
                            ),
                            'Timestamp' => array(
                                'type' => array(
                                    'object',
                                    'string',
                                    'integer',
                                ),
                                'format' => 'date-time',
                            ),
                            'Value' => array(
                                'type' => 'numeric',
                            ),
                            'StatisticValues' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'SampleCount' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                    'Sum' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                    'Minimum' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                    'Maximum' => array(
                                        'required' => true,
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'Unit' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Bad or out-of-range value was supplied for the input parameter.',
                    'class' => 'InvalidParameterValueException',
                ),
                array(
                    'reason' => 'An input parameter that is mandatory for processing the request is not supplied.',
                    'class' => 'MissingRequiredParameterException',
                ),
                array(
                    'reason' => 'Parameters that must not be used together were used together.',
                    'class' => 'InvalidParameterCombinationException',
                ),
                array(
                    'reason' => 'Indicates that the request processing has failed due to some unknown error, exception, or failure.',
                    'class' => 'InternalServiceException',
                ),
            ),
        ),
        'SetAlarmState' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\QueryCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                'Action' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => 'SetAlarmState',
                ),
                'Version' => array(
                    'static' => true,
                    'location' => 'aws.query',
                    'default' => '2010-08-01',
                ),
                'AlarmName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'StateValue' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                ),
                'StateReason' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 1023,
                ),
                'StateReasonData' => array(
                    'type' => 'string',
                    'location' => 'aws.query',
                    'maxLength' => 4000,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The named resource does not exist.',
                    'class' => 'ResourceNotFoundException',
                ),
                array(
                    'reason' => 'Data was not syntactically valid JSON.',
                    'class' => 'InvalidFormatException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
        'DescribeAlarmHistoryOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AlarmHistoryItems' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'AlarmHistoryItem',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'AlarmName' => array(
                                'type' => 'string',
                            ),
                            'Timestamp' => array(
                                'type' => 'string',
                            ),
                            'HistoryItemType' => array(
                                'type' => 'string',
                            ),
                            'HistorySummary' => array(
                                'type' => 'string',
                            ),
                            'HistoryData' => array(
                                'type' => 'string',
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
        'DescribeAlarmsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MetricAlarms' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'MetricAlarm',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'AlarmName' => array(
                                'type' => 'string',
                            ),
                            'AlarmArn' => array(
                                'type' => 'string',
                            ),
                            'AlarmDescription' => array(
                                'type' => 'string',
                            ),
                            'AlarmConfigurationUpdatedTimestamp' => array(
                                'type' => 'string',
                            ),
                            'ActionsEnabled' => array(
                                'type' => 'boolean',
                            ),
                            'OKActions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ResourceName',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'AlarmActions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ResourceName',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'InsufficientDataActions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ResourceName',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'StateValue' => array(
                                'type' => 'string',
                            ),
                            'StateReason' => array(
                                'type' => 'string',
                            ),
                            'StateReasonData' => array(
                                'type' => 'string',
                            ),
                            'StateUpdatedTimestamp' => array(
                                'type' => 'string',
                            ),
                            'MetricName' => array(
                                'type' => 'string',
                            ),
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'Statistic' => array(
                                'type' => 'string',
                            ),
                            'Dimensions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Dimension',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'Period' => array(
                                'type' => 'numeric',
                            ),
                            'Unit' => array(
                                'type' => 'string',
                            ),
                            'EvaluationPeriods' => array(
                                'type' => 'numeric',
                            ),
                            'Threshold' => array(
                                'type' => 'numeric',
                            ),
                            'ComparisonOperator' => array(
                                'type' => 'string',
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
        'DescribeAlarmsForMetricOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'MetricAlarms' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'MetricAlarm',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'AlarmName' => array(
                                'type' => 'string',
                            ),
                            'AlarmArn' => array(
                                'type' => 'string',
                            ),
                            'AlarmDescription' => array(
                                'type' => 'string',
                            ),
                            'AlarmConfigurationUpdatedTimestamp' => array(
                                'type' => 'string',
                            ),
                            'ActionsEnabled' => array(
                                'type' => 'boolean',
                            ),
                            'OKActions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ResourceName',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'AlarmActions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ResourceName',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'InsufficientDataActions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ResourceName',
                                    'type' => 'string',
                                    'sentAs' => 'member',
                                ),
                            ),
                            'StateValue' => array(
                                'type' => 'string',
                            ),
                            'StateReason' => array(
                                'type' => 'string',
                            ),
                            'StateReasonData' => array(
                                'type' => 'string',
                            ),
                            'StateUpdatedTimestamp' => array(
                                'type' => 'string',
                            ),
                            'MetricName' => array(
                                'type' => 'string',
                            ),
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'Statistic' => array(
                                'type' => 'string',
                            ),
                            'Dimensions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Dimension',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'Period' => array(
                                'type' => 'numeric',
                            ),
                            'Unit' => array(
                                'type' => 'string',
                            ),
                            'EvaluationPeriods' => array(
                                'type' => 'numeric',
                            ),
                            'Threshold' => array(
                                'type' => 'numeric',
                            ),
                            'ComparisonOperator' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'GetMetricStatisticsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Label' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'Datapoints' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Datapoint',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Timestamp' => array(
                                'type' => 'string',
                            ),
                            'SampleCount' => array(
                                'type' => 'numeric',
                            ),
                            'Average' => array(
                                'type' => 'numeric',
                            ),
                            'Sum' => array(
                                'type' => 'numeric',
                            ),
                            'Minimum' => array(
                                'type' => 'numeric',
                            ),
                            'Maximum' => array(
                                'type' => 'numeric',
                            ),
                            'Unit' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListMetricsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Metrics' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'Metric',
                        'type' => 'object',
                        'sentAs' => 'member',
                        'properties' => array(
                            'Namespace' => array(
                                'type' => 'string',
                            ),
                            'MetricName' => array(
                                'type' => 'string',
                            ),
                            'Dimensions' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Dimension',
                                    'type' => 'object',
                                    'sentAs' => 'member',
                                    'properties' => array(
                                        'Name' => array(
                                            'type' => 'string',
                                        ),
                                        'Value' => array(
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
        'DescribeAlarmHistory' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxRecords',
            'result_key' => 'AlarmHistoryItems',
        ),
        'DescribeAlarms' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'limit_key' => 'MaxRecords',
            'result_key' => 'MetricAlarms',
        ),
        'DescribeAlarmsForMetric' => array(
            'result_key' => 'MetricAlarms',
        ),
        'ListMetrics' => array(
            'input_token' => 'NextToken',
            'output_token' => 'NextToken',
            'result_key' => 'Metrics',
        ),
    ),
);
