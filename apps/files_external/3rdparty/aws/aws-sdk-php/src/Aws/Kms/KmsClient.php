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

namespace Aws\Kms;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with AWS Key Management Service
 *
 * @method Model createAlias(array $args = array()) {@command Kms CreateAlias}
 * @method Model createGrant(array $args = array()) {@command Kms CreateGrant}
 * @method Model createKey(array $args = array()) {@command Kms CreateKey}
 * @method Model decrypt(array $args = array()) {@command Kms Decrypt}
 * @method Model deleteAlias(array $args = array()) {@command Kms DeleteAlias}
 * @method Model describeKey(array $args = array()) {@command Kms DescribeKey}
 * @method Model disableKey(array $args = array()) {@command Kms DisableKey}
 * @method Model disableKeyRotation(array $args = array()) {@command Kms DisableKeyRotation}
 * @method Model enableKey(array $args = array()) {@command Kms EnableKey}
 * @method Model enableKeyRotation(array $args = array()) {@command Kms EnableKeyRotation}
 * @method Model encrypt(array $args = array()) {@command Kms Encrypt}
 * @method Model generateDataKey(array $args = array()) {@command Kms GenerateDataKey}
 * @method Model generateDataKeyWithoutPlaintext(array $args = array()) {@command Kms GenerateDataKeyWithoutPlaintext}
 * @method Model generateRandom(array $args = array()) {@command Kms GenerateRandom}
 * @method Model getKeyPolicy(array $args = array()) {@command Kms GetKeyPolicy}
 * @method Model getKeyRotationStatus(array $args = array()) {@command Kms GetKeyRotationStatus}
 * @method Model listAliases(array $args = array()) {@command Kms ListAliases}
 * @method Model listGrants(array $args = array()) {@command Kms ListGrants}
 * @method Model listKeyPolicies(array $args = array()) {@command Kms ListKeyPolicies}
 * @method Model listKeys(array $args = array()) {@command Kms ListKeys}
 * @method Model putKeyPolicy(array $args = array()) {@command Kms PutKeyPolicy}
 * @method Model reEncrypt(array $args = array()) {@command Kms ReEncrypt}
 * @method Model retireGrant(array $args = array()) {@command Kms RetireGrant}
 * @method Model revokeGrant(array $args = array()) {@command Kms RevokeGrant}
 * @method Model updateKeyDescription(array $args = array()) {@command Kms UpdateKeyDescription}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-kms.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Kms.KmsClient.html API docs
 */
class KmsClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-11-01';

    /**
     * Factory method to create a new AWS KMS client using an array of configuration options.
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
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/kms-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser)
            ->build();
    }
}
