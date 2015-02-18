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

use Aws\Sqs\Exception\SqsException;
use Guzzle\Common\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listener used to validate the MD5 of the ReceiveMessage body
 */
class Md5ValidatorListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array('command.after_send' => array('onCommandBeforeSend', -255));
    }

    /**
     * Validates the MD5OfBody attribute against the body
     *
     * @param Event $event Event emitted
     * @throws SqsException when an MD5 mismatch occurs
     */
    public function onCommandBeforeSend(Event $event)
    {
        if ($event['command']->getName() != 'ReceiveMessage') {
            return;
        }

        $result = $event['command']->getResult();
        if (isset($result['Messages'])) {
            foreach ($result['Messages'] as $message) {
                if ($message['MD5OfBody'] != md5($message['Body'])) {
                    throw new SqsException('Body MD5 mismatch for ' . var_export($message, true));
                }
            }
        }
    }
}
