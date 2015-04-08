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

namespace Aws\ImportExport;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS Import/Export
 *
 * @method Model cancelJob(array $args = array()) {@command ImportExport CancelJob}
 * @method Model createJob(array $args = array()) {@command ImportExport CreateJob}
 * @method Model getStatus(array $args = array()) {@command ImportExport GetStatus}
 * @method Model listJobs(array $args = array()) {@command ImportExport ListJobs}
 * @method Model updateJob(array $args = array()) {@command ImportExport UpdateJob}
 * @method ResourceIteratorInterface getListJobsIterator(array $args = array()) The input array uses the parameters of the ListJobs operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-importexport.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.ImportExport.ImportExportClient.html API docs
 */
class ImportExportClient extends AbstractClient
{
    const LATEST_API_VERSION = '2010-06-01';

    /**
     * Factory method to create a new AWS Import/Export client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/importexport-%s.php'
            ))
            ->build();

        // If the Symfony YAML component is installed, add a listener that will convert arrays to proper YAML in when
        // specifying the "Manifest" parameter of the "CreateJob" operation
        if (class_exists('Symfony\Component\Yaml\Yaml')) {
            $client->addSubscriber(new JobManifestListener());
        }

        return $client;
    }
}
