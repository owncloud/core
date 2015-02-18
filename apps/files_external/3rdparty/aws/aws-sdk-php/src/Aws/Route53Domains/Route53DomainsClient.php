<?php

namespace Aws\Route53Domains;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon Route 53 Domains
 *
 * @method Model checkDomainAvailability(array $args = array()) {@command Route53Domains CheckDomainAvailability}
 * @method Model disableDomainAutoRenew(array $args = array()) {@command Route53Domains DisableDomainAutoRenew}
 * @method Model disableDomainTransferLock(array $args = array()) {@command Route53Domains DisableDomainTransferLock}
 * @method Model enableDomainAutoRenew(array $args = array()) {@command Route53Domains EnableDomainAutoRenew}
 * @method Model enableDomainTransferLock(array $args = array()) {@command Route53Domains EnableDomainTransferLock}
 * @method Model getDomainDetail(array $args = array()) {@command Route53Domains GetDomainDetail}
 * @method Model getOperationDetail(array $args = array()) {@command Route53Domains GetOperationDetail}
 * @method Model listDomains(array $args = array()) {@command Route53Domains ListDomains}
 * @method Model listOperations(array $args = array()) {@command Route53Domains ListOperations}
 * @method Model registerDomain(array $args = array()) {@command Route53Domains RegisterDomain}
 * @method Model retrieveDomainAuthCode(array $args = array()) {@command Route53Domains RetrieveDomainAuthCode}
 * @method Model transferDomain(array $args = array()) {@command Route53Domains TransferDomain}
 * @method Model updateDomainContact(array $args = array()) {@command Route53Domains UpdateDomainContact}
 * @method Model updateDomainContactPrivacy(array $args = array()) {@command Route53Domains UpdateDomainContactPrivacy}
 * @method Model updateDomainNameservers(array $args = array()) {@command Route53Domains UpdateDomainNameservers}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-route53domains.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Route53Domains.Route53DomainsClient.html API docs
 */
class Route53DomainsClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-05-15';

    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/route53domains-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser)
            ->build();
    }
}
