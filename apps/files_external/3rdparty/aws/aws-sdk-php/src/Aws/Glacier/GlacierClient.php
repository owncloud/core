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

namespace Aws\Glacier;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Client\UploadBodyListener;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonRestExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Glacier
 *
 * @method Model abortMultipartUpload(array $args = array()) {@command Glacier AbortMultipartUpload}
 * @method Model completeMultipartUpload(array $args = array()) {@command Glacier CompleteMultipartUpload}
 * @method Model createVault(array $args = array()) {@command Glacier CreateVault}
 * @method Model deleteArchive(array $args = array()) {@command Glacier DeleteArchive}
 * @method Model deleteVault(array $args = array()) {@command Glacier DeleteVault}
 * @method Model deleteVaultNotifications(array $args = array()) {@command Glacier DeleteVaultNotifications}
 * @method Model describeJob(array $args = array()) {@command Glacier DescribeJob}
 * @method Model describeVault(array $args = array()) {@command Glacier DescribeVault}
 * @method Model getJobOutput(array $args = array()) {@command Glacier GetJobOutput}
 * @method Model getVaultNotifications(array $args = array()) {@command Glacier GetVaultNotifications}
 * @method Model initiateJob(array $args = array()) {@command Glacier InitiateJob}
 * @method Model initiateMultipartUpload(array $args = array()) {@command Glacier InitiateMultipartUpload}
 * @method Model listJobs(array $args = array()) {@command Glacier ListJobs}
 * @method Model listMultipartUploads(array $args = array()) {@command Glacier ListMultipartUploads}
 * @method Model listParts(array $args = array()) {@command Glacier ListParts}
 * @method Model listVaults(array $args = array()) {@command Glacier ListVaults}
 * @method Model setVaultNotifications(array $args = array()) {@command Glacier SetVaultNotifications}
 * @method Model uploadArchive(array $args = array()) {@command Glacier UploadArchive}
 * @method Model uploadMultipartPart(array $args = array()) {@command Glacier UploadMultipartPart}
 * @method waitUntilVaultExists(array $input) The input array uses the parameters of the DescribeVault operation and waiter specific settings
 * @method waitUntilVaultNotExists(array $input) The input array uses the parameters of the DescribeVault operation and waiter specific settings
 * @method ResourceIteratorInterface getListJobsIterator(array $args = array()) The input array uses the parameters of the ListJobs operation
 * @method ResourceIteratorInterface getListMultipartUploadsIterator(array $args = array()) The input array uses the parameters of the ListMultipartUploads operation
 * @method ResourceIteratorInterface getListPartsIterator(array $args = array()) The input array uses the parameters of the ListParts operation
 * @method ResourceIteratorInterface getListVaultsIterator(array $args = array()) The input array uses the parameters of the ListVaults operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-glacier.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.Glacier.GlacierClient.html API docs
 */
class GlacierClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-06-01';

    /**
     * Factory method to create a new Amazon Glacier client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return GlacierClient
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        // Setup the Glacier client
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/glacier-%s.php',
                // Set default value for "accountId" for all requests
                'command.params' => array(
                    'accountId'               => '-',
                    Options::MODEL_PROCESSING => true
                )
            ))
            ->setExceptionParser(new JsonRestExceptionParser())
            ->build();

        // Add the Glacier version header required for all operations
        $client->getConfig()->setPath(
            'request.options/headers/x-amz-glacier-version',
            $client->getDescription()->getApiVersion()
        );

        // Allow for specifying bodies with file paths and file handles
        $uploadOperations = array('UploadArchive', 'UploadMultipartPart');
        $client->addSubscriber(new UploadBodyListener($uploadOperations, 'body', 'sourceFile'));

        // Listen for upload operations and make sure the required hash headers are added
        $client->addSubscriber(new GlacierUploadListener());

        return $client;
    }
}
