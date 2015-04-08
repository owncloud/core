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

namespace Aws\Support;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS Support
 *
 * @method Model addAttachmentsToSet(array $args = array()) {@command Support AddAttachmentsToSet}
 * @method Model addCommunicationToCase(array $args = array()) {@command Support AddCommunicationToCase}
 * @method Model createCase(array $args = array()) {@command Support CreateCase}
 * @method Model describeAttachment(array $args = array()) {@command Support DescribeAttachment}
 * @method Model describeCases(array $args = array()) {@command Support DescribeCases}
 * @method Model describeCommunications(array $args = array()) {@command Support DescribeCommunications}
 * @method Model describeServices(array $args = array()) {@command Support DescribeServices}
 * @method Model describeSeverityLevels(array $args = array()) {@command Support DescribeSeverityLevels}
 * @method Model describeTrustedAdvisorCheckRefreshStatuses(array $args = array()) {@command Support DescribeTrustedAdvisorCheckRefreshStatuses}
 * @method Model describeTrustedAdvisorCheckResult(array $args = array()) {@command Support DescribeTrustedAdvisorCheckResult}
 * @method Model describeTrustedAdvisorCheckSummaries(array $args = array()) {@command Support DescribeTrustedAdvisorCheckSummaries}
 * @method Model describeTrustedAdvisorChecks(array $args = array()) {@command Support DescribeTrustedAdvisorChecks}
 * @method Model refreshTrustedAdvisorCheck(array $args = array()) {@command Support RefreshTrustedAdvisorCheck}
 * @method Model resolveCase(array $args = array()) {@command Support ResolveCase}
 * @method ResourceIteratorInterface getDescribeCasesIterator(array $args = array()) The input array uses the parameters of the DescribeCases operation
 * @method ResourceIteratorInterface getDescribeCommunicationsIterator(array $args = array()) The input array uses the parameters of the DescribeCommunications operation
 * @method ResourceIteratorInterface getDescribeServicesIterator(array $args = array()) The input array uses the parameters of the DescribeServices operation
 * @method ResourceIteratorInterface getDescribeTrustedAdvisorCheckRefreshStatusesIterator(array $args = array()) The input array uses the parameters of the DescribeTrustedAdvisorCheckRefreshStatuses operation
 * @method ResourceIteratorInterface getDescribeTrustedAdvisorCheckSummariesIterator(array $args = array()) The input array uses the parameters of the DescribeTrustedAdvisorCheckSummaries operation
 * @method ResourceIteratorInterface getDescribeSeverityLevelsIterator(array $args = array()) The input array uses the parameters of the DescribeSeverityLevels operation
 * @method ResourceIteratorInterface getDescribeTrustedAdvisorChecksIterator(array $args = array()) The input array uses the parameters of the DescribeTrustedAdvisorChecks operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-support.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Support.SupportClient.html API docs
 */
class SupportClient extends AbstractClient
{
    const LATEST_API_VERSION = '2013-04-15';

    /**
     * Factory method to create a new AWS Support client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/support-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
