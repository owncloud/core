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

namespace Aws\Lambda;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonRestExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with AWS Lambda
 *
 * @method Model addEventSource(array $args = array()) {@command Lambda AddEventSource}
 * @method Model deleteFunction(array $args = array()) {@command Lambda DeleteFunction}
 * @method Model getEventSource(array $args = array()) {@command Lambda GetEventSource}
 * @method Model getFunction(array $args = array()) {@command Lambda GetFunction}
 * @method Model getFunctionConfiguration(array $args = array()) {@command Lambda GetFunctionConfiguration}
 * @method Model invokeAsync(array $args = array()) {@command Lambda InvokeAsync}
 * @method Model listEventSources(array $args = array()) {@command Lambda ListEventSources}
 * @method Model listFunctions(array $args = array()) {@command Lambda ListFunctions}
 * @method Model removeEventSource(array $args = array()) {@command Lambda RemoveEventSource}
 * @method Model updateFunctionConfiguration(array $args = array()) {@command Lambda UpdateFunctionConfiguration}
 * @method Model uploadFunction(array $args = array()) {@command Lambda UploadFunction}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-lambda.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Lambda.LambdaClient.html API docs
 */
class LambdaClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-11-11';

    /**
     * Factory method to create a new AWS Lambda client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/lambda-%s.php'
            ))
            ->setExceptionParser(new JsonRestExceptionParser())
            ->build();
    }
}
