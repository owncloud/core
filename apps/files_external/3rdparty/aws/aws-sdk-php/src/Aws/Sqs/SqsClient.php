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

namespace Aws\Sqs;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Simple Queue Service
 *
 * @method Model addPermission(array $args = array()) {@command Sqs AddPermission}
 * @method Model changeMessageVisibility(array $args = array()) {@command Sqs ChangeMessageVisibility}
 * @method Model changeMessageVisibilityBatch(array $args = array()) {@command Sqs ChangeMessageVisibilityBatch}
 * @method Model createQueue(array $args = array()) {@command Sqs CreateQueue}
 * @method Model deleteMessage(array $args = array()) {@command Sqs DeleteMessage}
 * @method Model deleteMessageBatch(array $args = array()) {@command Sqs DeleteMessageBatch}
 * @method Model deleteQueue(array $args = array()) {@command Sqs DeleteQueue}
 * @method Model getQueueAttributes(array $args = array()) {@command Sqs GetQueueAttributes}
 * @method Model getQueueUrl(array $args = array()) {@command Sqs GetQueueUrl}
 * @method Model listDeadLetterSourceQueues(array $args = array()) {@command Sqs ListDeadLetterSourceQueues}
 * @method Model listQueues(array $args = array()) {@command Sqs ListQueues}
 * @method Model receiveMessage(array $args = array()) {@command Sqs ReceiveMessage}
 * @method Model removePermission(array $args = array()) {@command Sqs RemovePermission}
 * @method Model sendMessage(array $args = array()) {@command Sqs SendMessage}
 * @method Model sendMessageBatch(array $args = array()) {@command Sqs SendMessageBatch}
 * @method Model setQueueAttributes(array $args = array()) {@command Sqs SetQueueAttributes}
 * @method ResourceIteratorInterface getListQueuesIterator(array $args = array()) The input array uses the parameters of the ListQueues operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-sqs.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Sqs.SqsClient.html API docs
 */
class SqsClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-11-05';

    /**
     * Factory method to create a new Amazon Simple Queue Service client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/sqs-%s.php'
            ))
            ->build();

        $client->addSubscriber(new QueueUrlListener());
        $client->addSubscriber(new Md5ValidatorListener());

        return $client;
    }

    /**
     * Converts a queue URL into a queue ARN.
     *
     * @param string $queueUrl The queue URL to perform the action on. Retrieved when the queue is first created.
     *
     * @return string An ARN representation of the queue URL.
     */
    public function getQueueArn($queueUrl)
    {
        return strtr($queueUrl, array(
            'http://'        => 'arn:aws:',
            'https://'       => 'arn:aws:',
            '.amazonaws.com' => '',
            '/'              => ':',
            '.'              => ':',
        ));
    }
}
