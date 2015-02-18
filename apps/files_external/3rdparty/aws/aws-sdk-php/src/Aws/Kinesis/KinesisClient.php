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

namespace Aws\Kinesis;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon Kinesis
 *
 * @method Model addTagsToStream(array $args = array()) {@command Kinesis AddTagsToStream}
 * @method Model createStream(array $args = array()) {@command Kinesis CreateStream}
 * @method Model deleteStream(array $args = array()) {@command Kinesis DeleteStream}
 * @method Model describeStream(array $args = array()) {@command Kinesis DescribeStream}
 * @method Model getRecords(array $args = array()) {@command Kinesis GetRecords}
 * @method Model getShardIterator(array $args = array()) {@command Kinesis GetShardIterator}
 * @method Model listStreams(array $args = array()) {@command Kinesis ListStreams}
 * @method Model listTagsForStream(array $args = array()) {@command Kinesis ListTagsForStream}
 * @method Model mergeShards(array $args = array()) {@command Kinesis MergeShards}
 * @method Model putRecord(array $args = array()) {@command Kinesis PutRecord}
 * @method Model removeTagsFromStream(array $args = array()) {@command Kinesis RemoveTagsFromStream}
 * @method Model splitShard(array $args = array()) {@command Kinesis SplitShard}
 * @method ResourceIteratorInterface getDescribeStreamIterator(array $args = array()) The input array uses the parameters of the DescribeStream operation
 * @method ResourceIteratorInterface getListStreamsIterator(array $args = array()) The input array uses the parameters of the ListStreams operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-kinesis.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Kinesis.KinesisClient.html API docs
 */
class KinesisClient extends AbstractClient
{
    const LATEST_API_VERSION = '2013-12-02';

    /**
     * Factory method to create a new Amazon Kinesis client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/kinesis-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser)
            ->build();
    }

    public function __call($method, $args)
    {
        // Overrides the parent behavior to make sure that the GetShardIterator operation works correctly
        if ($method === 'getShardIterator') {
            $params = isset($args[0]) ? $args[0] : array();
            return $this->getCommand($method, $params)->getResult();
        } else {
            return parent::__call($method, $args);
        }
    }
}
