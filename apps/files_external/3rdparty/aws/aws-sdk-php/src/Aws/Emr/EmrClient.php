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

namespace Aws\Emr;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Elastic MapReduce
 *
 * @method Model addInstanceGroups(array $args = array()) {@command Emr AddInstanceGroups}
 * @method Model addJobFlowSteps(array $args = array()) {@command Emr AddJobFlowSteps}
 * @method Model addTags(array $args = array()) {@command Emr AddTags}
 * @method Model describeCluster(array $args = array()) {@command Emr DescribeCluster}
 * @method Model describeJobFlows(array $args = array()) {@command Emr DescribeJobFlows}
 * @method Model describeStep(array $args = array()) {@command Emr DescribeStep}
 * @method Model listBootstrapActions(array $args = array()) {@command Emr ListBootstrapActions}
 * @method Model listClusters(array $args = array()) {@command Emr ListClusters}
 * @method Model listInstanceGroups(array $args = array()) {@command Emr ListInstanceGroups}
 * @method Model listInstances(array $args = array()) {@command Emr ListInstances}
 * @method Model listSteps(array $args = array()) {@command Emr ListSteps}
 * @method Model modifyInstanceGroups(array $args = array()) {@command Emr ModifyInstanceGroups}
 * @method Model removeTags(array $args = array()) {@command Emr RemoveTags}
 * @method Model runJobFlow(array $args = array()) {@command Emr RunJobFlow}
 * @method Model setTerminationProtection(array $args = array()) {@command Emr SetTerminationProtection}
 * @method Model setVisibleToAllUsers(array $args = array()) {@command Emr SetVisibleToAllUsers}
 * @method Model terminateJobFlows(array $args = array()) {@command Emr TerminateJobFlows}
 * @method ResourceIteratorInterface getDescribeJobFlowsIterator(array $args = array()) The input array uses the parameters of the DescribeJobFlows operation
 * @method ResourceIteratorInterface getListBootstrapActionsIterator(array $args = array()) The input array uses the parameters of the ListBootstrapActions operation
 * @method ResourceIteratorInterface getListClustersIterator(array $args = array()) The input array uses the parameters of the ListClusters operation
 * @method ResourceIteratorInterface getListInstanceGroupsIterator(array $args = array()) The input array uses the parameters of the ListInstanceGroups operation
 * @method ResourceIteratorInterface getListInstancesIterator(array $args = array()) The input array uses the parameters of the ListInstances operation
 * @method ResourceIteratorInterface getListStepsIterator(array $args = array()) The input array uses the parameters of the ListSteps operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-emr.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Emr.EmrClient.html API docs
 */
class EmrClient extends AbstractClient
{
    const LATEST_API_VERSION = '2009-03-31';

    /**
     * Factory method to create a new Amazon Elastic MapReduce client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/emr-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
