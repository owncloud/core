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

namespace Aws\DataPipeline;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS Data Pipeline
 *
 * @method Model activatePipeline(array $args = array()) {@command DataPipeline ActivatePipeline}
 * @method Model createPipeline(array $args = array()) {@command DataPipeline CreatePipeline}
 * @method Model deletePipeline(array $args = array()) {@command DataPipeline DeletePipeline}
 * @method Model describeObjects(array $args = array()) {@command DataPipeline DescribeObjects}
 * @method Model describePipelines(array $args = array()) {@command DataPipeline DescribePipelines}
 * @method Model evaluateExpression(array $args = array()) {@command DataPipeline EvaluateExpression}
 * @method Model getPipelineDefinition(array $args = array()) {@command DataPipeline GetPipelineDefinition}
 * @method Model listPipelines(array $args = array()) {@command DataPipeline ListPipelines}
 * @method Model pollForTask(array $args = array()) {@command DataPipeline PollForTask}
 * @method Model putPipelineDefinition(array $args = array()) {@command DataPipeline PutPipelineDefinition}
 * @method Model queryObjects(array $args = array()) {@command DataPipeline QueryObjects}
 * @method Model reportTaskProgress(array $args = array()) {@command DataPipeline ReportTaskProgress}
 * @method Model reportTaskRunnerHeartbeat(array $args = array()) {@command DataPipeline ReportTaskRunnerHeartbeat}
 * @method Model setStatus(array $args = array()) {@command DataPipeline SetStatus}
 * @method Model setTaskStatus(array $args = array()) {@command DataPipeline SetTaskStatus}
 * @method Model validatePipelineDefinition(array $args = array()) {@command DataPipeline ValidatePipelineDefinition}
 * @method ResourceIteratorInterface getListPipelinesIterator(array $args = array()) The input array uses the parameters of the ListPipelines operation
 * @method ResourceIteratorInterface getDescribeObjectsIterator(array $args = array()) The input array uses the parameters of the DescribeObjects operation
 * @method ResourceIteratorInterface getDescribePipelinesIterator(array $args = array()) The input array uses the parameters of the DescribePipelines operation
 * @method ResourceIteratorInterface getQueryObjectsIterator(array $args = array()) The input array uses the parameters of the QueryObjects operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-datapipeline.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DataPipeline.DataPipelineClient.html API docs
 */
class DataPipelineClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-10-29';

    /**
     * Factory method to create a new Amazon Data Pipeline client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        // Construct the Data Pipeline client with the client builder
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/datapipeline-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();

        return $client;
    }
}
