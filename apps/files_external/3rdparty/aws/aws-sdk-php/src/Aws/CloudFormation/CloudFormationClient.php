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

namespace Aws\CloudFormation;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS CloudFormation
 *
 * @method Model cancelUpdateStack(array $args = array()) {@command CloudFormation CancelUpdateStack}
 * @method Model createStack(array $args = array()) {@command CloudFormation CreateStack}
 * @method Model deleteStack(array $args = array()) {@command CloudFormation DeleteStack}
 * @method Model describeStackEvents(array $args = array()) {@command CloudFormation DescribeStackEvents}
 * @method Model describeStackResource(array $args = array()) {@command CloudFormation DescribeStackResource}
 * @method Model describeStackResources(array $args = array()) {@command CloudFormation DescribeStackResources}
 * @method Model describeStacks(array $args = array()) {@command CloudFormation DescribeStacks}
 * @method Model estimateTemplateCost(array $args = array()) {@command CloudFormation EstimateTemplateCost}
 * @method Model getStackPolicy(array $args = array()) {@command CloudFormation GetStackPolicy}
 * @method Model getTemplate(array $args = array()) {@command CloudFormation GetTemplate}
 * @method Model getTemplateSummary(array $args = array()) {@command CloudFormation GetTemplateSummary}
 * @method Model listStackResources(array $args = array()) {@command CloudFormation ListStackResources}
 * @method Model listStacks(array $args = array()) {@command CloudFormation ListStacks}
 * @method Model setStackPolicy(array $args = array()) {@command CloudFormation SetStackPolicy}
 * @method Model signalResource(array $args = array()) {@command CloudFormation SignalResource}
 * @method Model updateStack(array $args = array()) {@command CloudFormation UpdateStack}
 * @method Model validateTemplate(array $args = array()) {@command CloudFormation ValidateTemplate}
 * @method ResourceIteratorInterface getDescribeStackEventsIterator(array $args = array()) The input array uses the parameters of the DescribeStackEvents operation
 * @method ResourceIteratorInterface getDescribeStackResourcesIterator(array $args = array()) The input array uses the parameters of the DescribeStackResources operation
 * @method ResourceIteratorInterface getDescribeStacksIterator(array $args = array()) The input array uses the parameters of the DescribeStacks operation
 * @method ResourceIteratorInterface getListStackResourcesIterator(array $args = array()) The input array uses the parameters of the ListStackResources operation
 * @method ResourceIteratorInterface getListStacksIterator(array $args = array()) The input array uses the parameters of the ListStacks operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-cloudformation.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.CloudFormation.CloudFormationClient.html API docs
 */
class CloudFormationClient extends AbstractClient
{
    const LATEST_API_VERSION = '2010-05-15';

    /**
     * Factory method to create a new AWS CloudFormation client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/cloudformation-%s.php'
            ))
            ->build();
    }
}
