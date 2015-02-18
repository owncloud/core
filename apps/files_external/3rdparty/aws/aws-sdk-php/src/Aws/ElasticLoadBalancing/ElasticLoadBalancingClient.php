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

namespace Aws\ElasticLoadBalancing;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Elastic Load Balancing
 *
 * @method Model addTags(array $args = array()) {@command ElasticLoadBalancing AddTags}
 * @method Model applySecurityGroupsToLoadBalancer(array $args = array()) {@command ElasticLoadBalancing ApplySecurityGroupsToLoadBalancer}
 * @method Model attachLoadBalancerToSubnets(array $args = array()) {@command ElasticLoadBalancing AttachLoadBalancerToSubnets}
 * @method Model configureHealthCheck(array $args = array()) {@command ElasticLoadBalancing ConfigureHealthCheck}
 * @method Model createAppCookieStickinessPolicy(array $args = array()) {@command ElasticLoadBalancing CreateAppCookieStickinessPolicy}
 * @method Model createLBCookieStickinessPolicy(array $args = array()) {@command ElasticLoadBalancing CreateLBCookieStickinessPolicy}
 * @method Model createLoadBalancer(array $args = array()) {@command ElasticLoadBalancing CreateLoadBalancer}
 * @method Model createLoadBalancerListeners(array $args = array()) {@command ElasticLoadBalancing CreateLoadBalancerListeners}
 * @method Model createLoadBalancerPolicy(array $args = array()) {@command ElasticLoadBalancing CreateLoadBalancerPolicy}
 * @method Model deleteLoadBalancer(array $args = array()) {@command ElasticLoadBalancing DeleteLoadBalancer}
 * @method Model deleteLoadBalancerListeners(array $args = array()) {@command ElasticLoadBalancing DeleteLoadBalancerListeners}
 * @method Model deleteLoadBalancerPolicy(array $args = array()) {@command ElasticLoadBalancing DeleteLoadBalancerPolicy}
 * @method Model deregisterInstancesFromLoadBalancer(array $args = array()) {@command ElasticLoadBalancing DeregisterInstancesFromLoadBalancer}
 * @method Model describeInstanceHealth(array $args = array()) {@command ElasticLoadBalancing DescribeInstanceHealth}
 * @method Model describeLoadBalancerAttributes(array $args = array()) {@command ElasticLoadBalancing DescribeLoadBalancerAttributes}
 * @method Model describeLoadBalancerPolicies(array $args = array()) {@command ElasticLoadBalancing DescribeLoadBalancerPolicies}
 * @method Model describeLoadBalancerPolicyTypes(array $args = array()) {@command ElasticLoadBalancing DescribeLoadBalancerPolicyTypes}
 * @method Model describeLoadBalancers(array $args = array()) {@command ElasticLoadBalancing DescribeLoadBalancers}
 * @method Model describeTags(array $args = array()) {@command ElasticLoadBalancing DescribeTags}
 * @method Model detachLoadBalancerFromSubnets(array $args = array()) {@command ElasticLoadBalancing DetachLoadBalancerFromSubnets}
 * @method Model disableAvailabilityZonesForLoadBalancer(array $args = array()) {@command ElasticLoadBalancing DisableAvailabilityZonesForLoadBalancer}
 * @method Model enableAvailabilityZonesForLoadBalancer(array $args = array()) {@command ElasticLoadBalancing EnableAvailabilityZonesForLoadBalancer}
 * @method Model modifyLoadBalancerAttributes(array $args = array()) {@command ElasticLoadBalancing ModifyLoadBalancerAttributes}
 * @method Model registerInstancesWithLoadBalancer(array $args = array()) {@command ElasticLoadBalancing RegisterInstancesWithLoadBalancer}
 * @method Model removeTags(array $args = array()) {@command ElasticLoadBalancing RemoveTags}
 * @method Model setLoadBalancerListenerSSLCertificate(array $args = array()) {@command ElasticLoadBalancing SetLoadBalancerListenerSSLCertificate}
 * @method Model setLoadBalancerPoliciesForBackendServer(array $args = array()) {@command ElasticLoadBalancing SetLoadBalancerPoliciesForBackendServer}
 * @method Model setLoadBalancerPoliciesOfListener(array $args = array()) {@command ElasticLoadBalancing SetLoadBalancerPoliciesOfListener}
 * @method ResourceIteratorInterface getDescribeInstanceHealthIterator(array $args = array()) The input array uses the parameters of the DescribeInstanceHealth operation
 * @method ResourceIteratorInterface getDescribeLoadBalancerPoliciesIterator(array $args = array()) The input array uses the parameters of the DescribeLoadBalancerPolicies operation
 * @method ResourceIteratorInterface getDescribeLoadBalancerPolicyTypesIterator(array $args = array()) The input array uses the parameters of the DescribeLoadBalancerPolicyTypes operation
 * @method ResourceIteratorInterface getDescribeLoadBalancersIterator(array $args = array()) The input array uses the parameters of the DescribeLoadBalancers operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-elasticloadbalancing.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.ElasticLoadBalancing.ElasticLoadBalancingClient.html API docs
 */
class ElasticLoadBalancingClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-06-01';

    /**
     * Factory method to create a new Elastic Load Balancing client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/elasticloadbalancing-%s.php'
            ))
            ->build();
    }
}
