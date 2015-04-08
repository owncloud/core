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

namespace Aws\Ec2;

use Aws\Common\Client\AwsClientInterface;
use Aws\Common\Signature\SignatureV4;
use Guzzle\Common\Event;
use Guzzle\Service\Command\CommandInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Adds computed values to the CopySnapshot operation
 * @internal
 */
class CopySnapshotListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array('command.before_prepare' => 'onCommandBeforePrepare');
    }

    public function onCommandBeforePrepare(Event $event)
    {
        /** @var $command \Guzzle\Service\Command\CommandInterface */
        $command = $event['command'];

        if ($command->getName() !== 'CopySnapshot') {
            return;
        } elseif ($command['__internal']) {
            // Prevent infinite recursion when adding the presigned URL
            unset($command['__internal']);
            return;
        }

        /** @var $client \Aws\Common\Client\AwsClientInterface */
        $client = $command->getClient();
        $presignedUrl = $this->createPresignedUrl($client, $command);
        $command['DestinationRegion'] = $client->getRegion();
        $command['PresignedUrl'] = $presignedUrl;
    }

    private function createPresignedUrl(
        AwsClientInterface $client,
        CommandInterface $command
    ) {
        // Create a temporary client used to generate the presigned URL
        $newClient = Ec2Client::factory(array(
            'region'    => $command['SourceRegion'],
            'signature' => 'v4',
            'key'       => $client->getCredentials()->getAccessKeyId(),
            'secret'    => $client->getCredentials()->getSecretKey()
        ));

        $preCommand = $newClient->getCommand(
            'CopySnapshot',
            $command->toArray()
        );

        $preCommand['__internal'] = true;
        /** @var \Guzzle\Http\Message\EntityEnclosingRequest $preRequest */
        $preRequest = $preCommand->prepare();

        return $newClient->getSignature()->createPresignedUrl(
            SignatureV4::convertPostToGet($preRequest),
            $newClient->getCredentials(),
            '+1 hour'
        );
    }
}
