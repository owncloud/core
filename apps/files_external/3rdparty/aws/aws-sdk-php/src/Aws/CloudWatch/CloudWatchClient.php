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

namespace Aws\CloudWatch;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon CloudWatch
 *
 * @method Model deleteAlarms(array $args = array()) {@command CloudWatch DeleteAlarms}
 * @method Model describeAlarmHistory(array $args = array()) {@command CloudWatch DescribeAlarmHistory}
 * @method Model describeAlarms(array $args = array()) {@command CloudWatch DescribeAlarms}
 * @method Model describeAlarmsForMetric(array $args = array()) {@command CloudWatch DescribeAlarmsForMetric}
 * @method Model disableAlarmActions(array $args = array()) {@command CloudWatch DisableAlarmActions}
 * @method Model enableAlarmActions(array $args = array()) {@command CloudWatch EnableAlarmActions}
 * @method Model getMetricStatistics(array $args = array()) {@command CloudWatch GetMetricStatistics}
 * @method Model listMetrics(array $args = array()) {@command CloudWatch ListMetrics}
 * @method Model putMetricAlarm(array $args = array()) {@command CloudWatch PutMetricAlarm}
 * @method Model putMetricData(array $args = array()) {@command CloudWatch PutMetricData}
 * @method Model setAlarmState(array $args = array()) {@command CloudWatch SetAlarmState}
 * @method ResourceIteratorInterface getDescribeAlarmHistoryIterator(array $args = array()) The input array uses the parameters of the DescribeAlarmHistory operation
 * @method ResourceIteratorInterface getDescribeAlarmsIterator(array $args = array()) The input array uses the parameters of the DescribeAlarms operation
 * @method ResourceIteratorInterface getDescribeAlarmsForMetricIterator(array $args = array()) The input array uses the parameters of the DescribeAlarmsForMetric operation
 * @method ResourceIteratorInterface getListMetricsIterator(array $args = array()) The input array uses the parameters of the ListMetrics operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-cloudwatch.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.CloudWatch.CloudWatchClient.html API docs
 */
class CloudWatchClient extends AbstractClient
{
    const LATEST_API_VERSION = '2010-08-01';

    /**
     * Factory method to create a new Amazon CloudWatch client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/cloudwatch-%s.php'
            ))
            ->build();
    }
}
