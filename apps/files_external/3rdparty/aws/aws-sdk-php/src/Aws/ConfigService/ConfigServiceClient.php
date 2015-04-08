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

namespace Aws\ConfigService;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with AWS Config
 *
 * @method Model deleteDeliveryChannel(array $args = array()) {@command ConfigService DeleteDeliveryChannel}
 * @method Model deliverConfigSnapshot(array $args = array()) {@command ConfigService DeliverConfigSnapshot}
 * @method Model describeConfigurationRecorderStatus(array $args = array()) {@command ConfigService DescribeConfigurationRecorderStatus}
 * @method Model describeConfigurationRecorders(array $args = array()) {@command ConfigService DescribeConfigurationRecorders}
 * @method Model describeDeliveryChannelStatus(array $args = array()) {@command ConfigService DescribeDeliveryChannelStatus}
 * @method Model describeDeliveryChannels(array $args = array()) {@command ConfigService DescribeDeliveryChannels}
 * @method Model getResourceConfigHistory(array $args = array()) {@command ConfigService GetResourceConfigHistory}
 * @method Model putConfigurationRecorder(array $args = array()) {@command ConfigService PutConfigurationRecorder}
 * @method Model putDeliveryChannel(array $args = array()) {@command ConfigService PutDeliveryChannel}
 * @method Model startConfigurationRecorder(array $args = array()) {@command ConfigService StartConfigurationRecorder}
 * @method Model stopConfigurationRecorder(array $args = array()) {@command ConfigService StopConfigurationRecorder}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-configservice.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.ConfigService.ConfigServiceClient.html API docs
 */
class ConfigServiceClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-11-12';

    /**
     * Factory method to create a new AWS Config client using an array of configuration options.
     *
     * See http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/configservice-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
