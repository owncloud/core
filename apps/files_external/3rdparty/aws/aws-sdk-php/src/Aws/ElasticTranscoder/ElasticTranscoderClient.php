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

namespace Aws\ElasticTranscoder;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonRestExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Elastic Transcoder
 *
 * @method Model cancelJob(array $args = array()) {@command ElasticTranscoder CancelJob}
 * @method Model createJob(array $args = array()) {@command ElasticTranscoder CreateJob}
 * @method Model createPipeline(array $args = array()) {@command ElasticTranscoder CreatePipeline}
 * @method Model createPreset(array $args = array()) {@command ElasticTranscoder CreatePreset}
 * @method Model deletePipeline(array $args = array()) {@command ElasticTranscoder DeletePipeline}
 * @method Model deletePreset(array $args = array()) {@command ElasticTranscoder DeletePreset}
 * @method Model listJobsByPipeline(array $args = array()) {@command ElasticTranscoder ListJobsByPipeline}
 * @method Model listJobsByStatus(array $args = array()) {@command ElasticTranscoder ListJobsByStatus}
 * @method Model listPipelines(array $args = array()) {@command ElasticTranscoder ListPipelines}
 * @method Model listPresets(array $args = array()) {@command ElasticTranscoder ListPresets}
 * @method Model readJob(array $args = array()) {@command ElasticTranscoder ReadJob}
 * @method Model readPipeline(array $args = array()) {@command ElasticTranscoder ReadPipeline}
 * @method Model readPreset(array $args = array()) {@command ElasticTranscoder ReadPreset}
 * @method Model testRole(array $args = array()) {@command ElasticTranscoder TestRole}
 * @method Model updatePipeline(array $args = array()) {@command ElasticTranscoder UpdatePipeline}
 * @method Model updatePipelineNotifications(array $args = array()) {@command ElasticTranscoder UpdatePipelineNotifications}
 * @method Model updatePipelineStatus(array $args = array()) {@command ElasticTranscoder UpdatePipelineStatus}
 * @method ResourceIteratorInterface getListJobsByPipelineIterator(array $args = array()) The input array uses the parameters of the ListJobsByPipeline operation
 * @method ResourceIteratorInterface getListJobsByStatusIterator(array $args = array()) The input array uses the parameters of the ListJobsByStatus operation
 * @method ResourceIteratorInterface getListPipelinesIterator(array $args = array()) The input array uses the parameters of the ListPipelines operation
 * @method ResourceIteratorInterface getListPresetsIterator(array $args = array()) The input array uses the parameters of the ListPresets operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-elastictranscoder.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.ElasticTranscoder.ElasticTranscoderClient.html API docs
 */
class ElasticTranscoderClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-09-25';

    /**
     * Factory method to create a new Amazon Elastic Transcoder client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/elastictranscoder-%s.php'
            ))
            ->setExceptionParser(new JsonRestExceptionParser())
            ->build();
    }
}
