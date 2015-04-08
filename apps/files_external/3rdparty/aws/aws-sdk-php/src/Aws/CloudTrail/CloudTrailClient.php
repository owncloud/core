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

namespace Aws\CloudTrail;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with AWS CloudTrail
 *
 * @method Model createTrail(array $args = array()) {@command CloudTrail CreateTrail}
 * @method Model deleteTrail(array $args = array()) {@command CloudTrail DeleteTrail}
 * @method Model describeTrails(array $args = array()) {@command CloudTrail DescribeTrails}
 * @method Model getTrailStatus(array $args = array()) {@command CloudTrail GetTrailStatus}
 * @method Model startLogging(array $args = array()) {@command CloudTrail StartLogging}
 * @method Model stopLogging(array $args = array()) {@command CloudTrail StopLogging}
 * @method Model updateTrail(array $args = array()) {@command CloudTrail UpdateTrail}
 * @method ResourceIteratorInterface getDescribeTrailsIterator(array $args = array()) The input array uses the parameters of the DescribeTrails operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-cloudtrail.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.CloudTrail.CloudTrailClient.html API docs
 */
class CloudTrailClient extends AbstractClient
{
    const LATEST_API_VERSION = '2013-11-01';

    /**
     * Factory method to create a new AWS CloudTrail client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/cloudtrail-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
