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

namespace Aws\CloudSearch;

use Aws\CloudSearchDomain\CloudSearchDomainClient;
use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon CloudSearch
 *
 * @method Model buildSuggesters(array $args = array()) {@command CloudSearch BuildSuggesters}
 * @method Model createDomain(array $args = array()) {@command CloudSearch CreateDomain}
 * @method Model defineAnalysisScheme(array $args = array()) {@command CloudSearch DefineAnalysisScheme}
 * @method Model defineExpression(array $args = array()) {@command CloudSearch DefineExpression}
 * @method Model defineIndexField(array $args = array()) {@command CloudSearch DefineIndexField}
 * @method Model defineSuggester(array $args = array()) {@command CloudSearch DefineSuggester}
 * @method Model deleteAnalysisScheme(array $args = array()) {@command CloudSearch DeleteAnalysisScheme}
 * @method Model deleteDomain(array $args = array()) {@command CloudSearch DeleteDomain}
 * @method Model deleteExpression(array $args = array()) {@command CloudSearch DeleteExpression}
 * @method Model deleteIndexField(array $args = array()) {@command CloudSearch DeleteIndexField}
 * @method Model deleteSuggester(array $args = array()) {@command CloudSearch DeleteSuggester}
 * @method Model describeAnalysisSchemes(array $args = array()) {@command CloudSearch DescribeAnalysisSchemes}
 * @method Model describeAvailabilityOptions(array $args = array()) {@command CloudSearch DescribeAvailabilityOptions}
 * @method Model describeDomains(array $args = array()) {@command CloudSearch DescribeDomains}
 * @method Model describeExpressions(array $args = array()) {@command CloudSearch DescribeExpressions}
 * @method Model describeIndexFields(array $args = array()) {@command CloudSearch DescribeIndexFields}
 * @method Model describeScalingParameters(array $args = array()) {@command CloudSearch DescribeScalingParameters}
 * @method Model describeServiceAccessPolicies(array $args = array()) {@command CloudSearch DescribeServiceAccessPolicies}
 * @method Model describeSuggesters(array $args = array()) {@command CloudSearch DescribeSuggesters}
 * @method Model indexDocuments(array $args = array()) {@command CloudSearch IndexDocuments}
 * @method Model listDomainNames(array $args = array()) {@command CloudSearch ListDomainNames}
 * @method Model updateAvailabilityOptions(array $args = array()) {@command CloudSearch UpdateAvailabilityOptions}
 * @method Model updateScalingParameters(array $args = array()) {@command CloudSearch UpdateScalingParameters}
 * @method Model updateServiceAccessPolicies(array $args = array()) {@command CloudSearch UpdateServiceAccessPolicies}
 * @method ResourceIteratorInterface getDescribeAnalysisSchemesIterator(array $args = array()) The input array uses the parameters of the DescribeAnalysisSchemes operation
 * @method ResourceIteratorInterface getDescribeDomainsIterator(array $args = array()) The input array uses the parameters of the DescribeDomains operation
 * @method ResourceIteratorInterface getDescribeExpressionsIterator(array $args = array()) The input array uses the parameters of the DescribeExpressions operation
 * @method ResourceIteratorInterface getDescribeIndexFieldsIterator(array $args = array()) The input array uses the parameters of the DescribeIndexFields operation
 * @method ResourceIteratorInterface getDescribeSuggestersIterator(array $args = array()) The input array uses the parameters of the DescribeSuggesters operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-cloudsearch.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.CloudSearch.CloudSearchClient.html API docs
 */
class CloudSearchClient extends AbstractClient
{
    const LATEST_API_VERSION = '2013-01-01';

    /**
     * Factory method to create a new Amazon CloudSearch client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/cloudsearch-%s.php'
            ))
            ->build();
    }

    /**
     * Create a CloudSearchDomainClient for a particular domain to do searching
     * and document uploads.
     *
     * @param string $domainName Name of the domain for which to create a domain client.
     * @param array  $config     Config options for the CloudSearchDomainClient
     *
     * @return CloudSearchDomainClient
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public function getDomainClient($domainName, array $config = array())
    {
        // Determine the Domain client's base_url
        $config['base_url'] = $this->describeDomains(array(
            'DomainNames' => array($domainName)
        ))->getPath('DomainStatusList/0/SearchService/Endpoint');

        return CloudSearchDomainClient::factory($config);
    }
}
