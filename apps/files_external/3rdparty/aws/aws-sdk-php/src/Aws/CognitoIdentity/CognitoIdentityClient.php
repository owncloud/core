<?php

namespace Aws\CognitoIdentity;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Aws\Common\Signature\SignatureListener;
use Guzzle\Common\Collection;
use Guzzle\Service\Command\AbstractCommand;
use Guzzle\Service\Resource\Model;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;

/**
 * Client to interact with Amazon Cognito Identity
 *
 * @method Model createIdentityPool(array $args = array()) {@command CognitoIdentity CreateIdentityPool}
 * @method Model deleteIdentityPool(array $args = array()) {@command CognitoIdentity DeleteIdentityPool}
 * @method Model describeIdentityPool(array $args = array()) {@command CognitoIdentity DescribeIdentityPool}
 * @method Model getId(array $args = array()) {@command CognitoIdentity GetId}
 * @method Model getOpenIdToken(array $args = array()) {@command CognitoIdentity GetOpenIdToken}
 * @method Model getOpenIdTokenForDeveloperIdentity(array $args = array()) {@command CognitoIdentity GetOpenIdTokenForDeveloperIdentity}
 * @method Model listIdentities(array $args = array()) {@command CognitoIdentity ListIdentities}
 * @method Model listIdentityPools(array $args = array()) {@command CognitoIdentity ListIdentityPools}
 * @method Model lookupDeveloperIdentity(array $args = array()) {@command CognitoIdentity LookupDeveloperIdentity}
 * @method Model mergeDeveloperIdentities(array $args = array()) {@command CognitoIdentity MergeDeveloperIdentities}
 * @method Model unlinkDeveloperIdentity(array $args = array()) {@command CognitoIdentity UnlinkDeveloperIdentity}
 * @method Model unlinkIdentity(array $args = array()) {@command CognitoIdentity UnlinkIdentity}
 * @method Model updateIdentityPool(array $args = array()) {@command CognitoIdentity UpdateIdentityPool}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-cognitoidentity.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.CognitoIdentity.CognitoIdentityClient.html API docs
 */
class CognitoIdentityClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-06-30';

    /**
     * Factory method to create a new Amazon Cognito Identity client using an array of configuration options.
     *
     * See http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/cognitoidentity-%s.php',
            ))
            ->setExceptionParser(new JsonQueryExceptionParser)
            ->build();

        // Attach a listener to prevent some requests from being signed
        $client->getEventDispatcher()->addListener('command.before_send', function (Event $event) {
            /** @var AbstractCommand $command */
            $command = $event['command'];
            if (in_array($command->getName(), array('GetId', 'GetOpenIdToken', 'UnlinkIdentity'))) {
                /** @var EventDispatcher $dispatcher */
                $dispatcher = $command->getRequest()->getEventDispatcher();
                foreach ($dispatcher->getListeners('request.before_send') as $listener) {
                    if (is_array($listener) && $listener[0] instanceof SignatureListener) {
                        $dispatcher->removeListener('request.before_send', $listener);
                        break;
                    }
                }
            }
        });

        return $client;
    }
}
