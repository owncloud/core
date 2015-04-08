<?php

namespace Aws\CloudSearchDomain;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\BadMethodCallException;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon CloudSearchDomain
 *
 * @method Model search(array $args = array()) {@command CloudSearchDomain Search}
 * @method Model suggest(array $args = array()) {@command CloudSearchDomain Suggest}
 * @method Model uploadDocuments(array $args = array()) {@command CloudSearchDomain UploadDocuments}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-cloudsearchdomain.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.CloudSearchDomain.CloudSearchDomainClient.html API docs
 */
class CloudSearchDomainClient extends AbstractClient
{
    const LATEST_API_VERSION = '2013-01-01';

    /**
     * Factory method to create a new Amazon CloudSearchDomain client using an array of configuration options.
     *
     * You must provide the `base_url` option for this client, but credentials and `region` are not needed.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        return CloudSearchDomainClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/cloudsearchdomain-%s.php'
            ))
            ->build();
    }

    /**
     * @internal
     * @throws BadMethodCallException Do not call this method.
     */
    public function setRegion($region)
    {
        throw new BadMethodCallException('You cannot change the region of a CloudSearchDomain client.');
    }
}
