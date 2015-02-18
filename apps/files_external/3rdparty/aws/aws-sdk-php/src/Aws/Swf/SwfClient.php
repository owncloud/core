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

namespace Aws\Swf;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Simple Workflow Service
 *
 * @method Model countClosedWorkflowExecutions(array $args = array()) {@command Swf CountClosedWorkflowExecutions}
 * @method Model countOpenWorkflowExecutions(array $args = array()) {@command Swf CountOpenWorkflowExecutions}
 * @method Model countPendingActivityTasks(array $args = array()) {@command Swf CountPendingActivityTasks}
 * @method Model countPendingDecisionTasks(array $args = array()) {@command Swf CountPendingDecisionTasks}
 * @method Model deprecateActivityType(array $args = array()) {@command Swf DeprecateActivityType}
 * @method Model deprecateDomain(array $args = array()) {@command Swf DeprecateDomain}
 * @method Model deprecateWorkflowType(array $args = array()) {@command Swf DeprecateWorkflowType}
 * @method Model describeActivityType(array $args = array()) {@command Swf DescribeActivityType}
 * @method Model describeDomain(array $args = array()) {@command Swf DescribeDomain}
 * @method Model describeWorkflowExecution(array $args = array()) {@command Swf DescribeWorkflowExecution}
 * @method Model describeWorkflowType(array $args = array()) {@command Swf DescribeWorkflowType}
 * @method Model getWorkflowExecutionHistory(array $args = array()) {@command Swf GetWorkflowExecutionHistory}
 * @method Model listActivityTypes(array $args = array()) {@command Swf ListActivityTypes}
 * @method Model listClosedWorkflowExecutions(array $args = array()) {@command Swf ListClosedWorkflowExecutions}
 * @method Model listDomains(array $args = array()) {@command Swf ListDomains}
 * @method Model listOpenWorkflowExecutions(array $args = array()) {@command Swf ListOpenWorkflowExecutions}
 * @method Model listWorkflowTypes(array $args = array()) {@command Swf ListWorkflowTypes}
 * @method Model pollForActivityTask(array $args = array()) {@command Swf PollForActivityTask}
 * @method Model pollForDecisionTask(array $args = array()) {@command Swf PollForDecisionTask}
 * @method Model recordActivityTaskHeartbeat(array $args = array()) {@command Swf RecordActivityTaskHeartbeat}
 * @method Model registerActivityType(array $args = array()) {@command Swf RegisterActivityType}
 * @method Model registerDomain(array $args = array()) {@command Swf RegisterDomain}
 * @method Model registerWorkflowType(array $args = array()) {@command Swf RegisterWorkflowType}
 * @method Model requestCancelWorkflowExecution(array $args = array()) {@command Swf RequestCancelWorkflowExecution}
 * @method Model respondActivityTaskCanceled(array $args = array()) {@command Swf RespondActivityTaskCanceled}
 * @method Model respondActivityTaskCompleted(array $args = array()) {@command Swf RespondActivityTaskCompleted}
 * @method Model respondActivityTaskFailed(array $args = array()) {@command Swf RespondActivityTaskFailed}
 * @method Model respondDecisionTaskCompleted(array $args = array()) {@command Swf RespondDecisionTaskCompleted}
 * @method Model signalWorkflowExecution(array $args = array()) {@command Swf SignalWorkflowExecution}
 * @method Model startWorkflowExecution(array $args = array()) {@command Swf StartWorkflowExecution}
 * @method Model terminateWorkflowExecution(array $args = array()) {@command Swf TerminateWorkflowExecution}
 * @method ResourceIteratorInterface getGetWorkflowExecutionHistoryIterator(array $args = array()) The input array uses the parameters of the GetWorkflowExecutionHistory operation
 * @method ResourceIteratorInterface getListActivityTypesIterator(array $args = array()) The input array uses the parameters of the ListActivityTypes operation
 * @method ResourceIteratorInterface getListClosedWorkflowExecutionsIterator(array $args = array()) The input array uses the parameters of the ListClosedWorkflowExecutions operation
 * @method ResourceIteratorInterface getListDomainsIterator(array $args = array()) The input array uses the parameters of the ListDomains operation
 * @method ResourceIteratorInterface getListOpenWorkflowExecutionsIterator(array $args = array()) The input array uses the parameters of the ListOpenWorkflowExecutions operation
 * @method ResourceIteratorInterface getListWorkflowTypesIterator(array $args = array()) The input array uses the parameters of the ListWorkflowTypes operation
 * @method ResourceIteratorInterface getPollForDecisionTaskIterator(array $args = array()) The input array uses the parameters of the PollForDecisionTask operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-swf.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Swf.SwfClient.html API docs
 */
class SwfClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-01-25';

    /**
     * Factory method to create a new Amazon Simple Workflow Service client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/swf-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
