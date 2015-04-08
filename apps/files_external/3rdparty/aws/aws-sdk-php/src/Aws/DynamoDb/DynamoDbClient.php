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

namespace Aws\DynamoDb;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Client\ExpiredCredentialsChecker;
use Aws\Common\Client\ThrottlingErrorChecker;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Aws\DynamoDb\Model\Attribute;
use Aws\DynamoDb\Session\SessionHandler;
use Guzzle\Common\Collection;
use Guzzle\Plugin\Backoff\BackoffPlugin;
use Guzzle\Plugin\Backoff\CallbackBackoffStrategy;
use Guzzle\Plugin\Backoff\CurlBackoffStrategy;
use Guzzle\Plugin\Backoff\HttpBackoffStrategy;
use Guzzle\Plugin\Backoff\TruncatedBackoffStrategy;
use Guzzle\Service\Command\AbstractCommand as Cmd;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon DynamoDB
 *
 * @method Model batchGetItem(array $args = array()) {@command DynamoDb BatchGetItem}
 * @method Model batchWriteItem(array $args = array()) {@command DynamoDb BatchWriteItem}
 * @method Model createTable(array $args = array()) {@command DynamoDb CreateTable}
 * @method Model deleteItem(array $args = array()) {@command DynamoDb DeleteItem}
 * @method Model deleteTable(array $args = array()) {@command DynamoDb DeleteTable}
 * @method Model describeTable(array $args = array()) {@command DynamoDb DescribeTable}
 * @method Model getItem(array $args = array()) {@command DynamoDb GetItem}
 * @method Model listTables(array $args = array()) {@command DynamoDb ListTables}
 * @method Model putItem(array $args = array()) {@command DynamoDb PutItem}
 * @method Model query(array $args = array()) {@command DynamoDb Query}
 * @method Model scan(array $args = array()) {@command DynamoDb Scan}
 * @method Model updateItem(array $args = array()) {@command DynamoDb UpdateItem}
 * @method Model updateTable(array $args = array()) {@command DynamoDb UpdateTable}
 * @method waitUntilTableExists(array $input) The input array uses the parameters of the DescribeTable operation and waiter specific settings
 * @method waitUntilTableNotExists(array $input) The input array uses the parameters of the DescribeTable operation and waiter specific settings
 * @method ResourceIteratorInterface getBatchGetItemIterator(array $args = array()) The input array uses the parameters of the BatchGetItem operation
 * @method ResourceIteratorInterface getListTablesIterator(array $args = array()) The input array uses the parameters of the ListTables operation
 * @method ResourceIteratorInterface getQueryIterator(array $args = array()) The input array uses the parameters of the Query operation
 * @method ResourceIteratorInterface getScanIterator(array $args = array()) The input array uses the parameters of the Scan operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-dynamodb.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.DynamoDb.DynamoDbClient.html API docs
 */
class DynamoDbClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-08-10';

    /**
     * Factory method to create a new Amazon DynamoDB client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        // Configure the custom exponential backoff plugin for DynamoDB throttling
        $exceptionParser = new JsonQueryExceptionParser();
        if (!isset($config[Options::BACKOFF])) {
            $config[Options::BACKOFF] = self::createBackoffPlugin($exceptionParser);
        }

        // Construct the DynamoDB client with the client builder
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                // DynamoDB does not use redirects
                self::DISABLE_REDIRECTS => true,
                Options::VERSION => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/dynamodb-%s.php',
                // DynamoDB does not require response processing other than turning JSON into an array
                self::COMMAND_PARAMS => array(Cmd::RESPONSE_PROCESSING => Cmd::TYPE_NO_TRANSLATION)
            ))
            ->setExceptionParser($exceptionParser)
            ->build();
    }

    /**
     * Create an Amazon DynamoDB specific backoff plugin
     *
     * @param JsonQueryExceptionParser $exceptionParser
     *
     * @return BackoffPlugin
     */
    private static function createBackoffPlugin(JsonQueryExceptionParser $exceptionParser)
    {
        return new BackoffPlugin(
            // Retry requests (even if successful) if the CRC32 header is does not match the CRC32 of the response
            new Crc32ErrorChecker(
                // Retry failed requests up to 11 times instead of the normal 3
                new TruncatedBackoffStrategy(11,
                    // Retry failed requests with 400-level responses due to throttling
                    new ThrottlingErrorChecker($exceptionParser,
                        // Retry failed requests with 500-level responses
                        new HttpBackoffStrategy(null,
                            // Retry failed requests due to transient network or cURL problems
                            new CurlBackoffStrategy(null,
                                new ExpiredCredentialsChecker($exceptionParser,
                                     // Use the custom retry delay method instead of default exponential backoff
                                     new CallbackBackoffStrategy(__CLASS__ . '::calculateRetryDelay', false)
                                )
                            )
                        )
                    )
                )
            )
        );
    }

    /**
     * Formats a value as a DynamoDB attribute.
     *
     * @param mixed  $value  The value to format for DynamoDB.
     * @param string $format The type of format (e.g. put, update).
     *
     * @return array The formatted value.
     * @deprecated The new DynamoDB document model, including the new types
     *             (L, M, BOOL, NULL), is not supported by this method.
     */
    public function formatValue($value, $format = Attribute::FORMAT_PUT)
    {
        return Attribute::factory($value)->getFormatted($format);
    }

    /**
     * Formats an array of values as DynamoDB attributes.
     *
     * @param array  $values The values to format for DynamoDB.
     * @param string $format The type of format (e.g. put, update).
     *
     * @return array The formatted values.
     * @deprecated The new DynamoDB document model, including the new types
     *             (L, M, BOOL, NULL), is not supported by this method.
     */
    public function formatAttributes(array $values, $format = Attribute::FORMAT_PUT)
    {
        $formatted = array();

        foreach ($values as $key => $value) {
            $formatted[$key] = $this->formatValue($value, $format);
        }

        return $formatted;
    }

    /**
     * Calculate the amount of time needed for an exponential backoff to wait
     * before retrying a request
     *
     * @param int $retries Number of retries
     *
     * @return float Returns the amount of time to wait in seconds
     */
    public static function calculateRetryDelay($retries)
    {
        return $retries == 0 ? 0 : (50 * (int) pow(2, $retries - 1)) / 1000;
    }

    /**
     * Convenience method for instantiating and registering the DynamoDB
     * Session handler with this DynamoDB client object.
     *
     * @param array $config Array of options for the session handler factory
     *
     * @return SessionHandler
     */
    public function registerSessionHandler(array $config = array())
    {
        $config = array_replace(array('dynamodb_client' => $this), $config);

        $handler = SessionHandler::factory($config);
        $handler->register();

        return $handler;
    }
}
