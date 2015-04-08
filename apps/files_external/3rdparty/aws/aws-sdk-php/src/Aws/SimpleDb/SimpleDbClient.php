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

namespace Aws\SimpleDb;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon SimpleDB
 *
 * @method Model batchDeleteAttributes(array $args = array()) {@command SimpleDb BatchDeleteAttributes}
 * @method Model batchPutAttributes(array $args = array()) {@command SimpleDb BatchPutAttributes}
 * @method Model createDomain(array $args = array()) {@command SimpleDb CreateDomain}
 * @method Model deleteAttributes(array $args = array()) {@command SimpleDb DeleteAttributes}
 * @method Model deleteDomain(array $args = array()) {@command SimpleDb DeleteDomain}
 * @method Model domainMetadata(array $args = array()) {@command SimpleDb DomainMetadata}
 * @method Model getAttributes(array $args = array()) {@command SimpleDb GetAttributes}
 * @method Model listDomains(array $args = array()) {@command SimpleDb ListDomains}
 * @method Model putAttributes(array $args = array()) {@command SimpleDb PutAttributes}
 * @method Model select(array $args = array()) {@command SimpleDb Select}
 * @method ResourceIteratorInterface getListDomainsIterator(array $args = array()) The input array uses the parameters of the ListDomains operation
 * @method ResourceIteratorInterface getSelectIterator(array $args = array()) The input array uses the parameters of the Select operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-simpledb.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.SimpleDb.SimpleDbClient.html API docs
 */
class SimpleDbClient extends AbstractClient
{
    const LATEST_API_VERSION = '2009-04-15';

    /**
     * Factory method to create a new Amazon SimpleDB client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/simpledb-%s.php'
            ))
            ->build();
    }
}
