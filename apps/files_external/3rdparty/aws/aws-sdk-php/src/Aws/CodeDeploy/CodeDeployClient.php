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

namespace Aws\CodeDeploy;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with AWS CodeDeploy
 *
 * @method Model batchGetApplications(array $args = array()) {@command CodeDeploy BatchGetApplications}
 * @method Model batchGetDeployments(array $args = array()) {@command CodeDeploy BatchGetDeployments}
 * @method Model createApplication(array $args = array()) {@command CodeDeploy CreateApplication}
 * @method Model createDeployment(array $args = array()) {@command CodeDeploy CreateDeployment}
 * @method Model createDeploymentConfig(array $args = array()) {@command CodeDeploy CreateDeploymentConfig}
 * @method Model createDeploymentGroup(array $args = array()) {@command CodeDeploy CreateDeploymentGroup}
 * @method Model deleteApplication(array $args = array()) {@command CodeDeploy DeleteApplication}
 * @method Model deleteDeploymentConfig(array $args = array()) {@command CodeDeploy DeleteDeploymentConfig}
 * @method Model deleteDeploymentGroup(array $args = array()) {@command CodeDeploy DeleteDeploymentGroup}
 * @method Model getApplication(array $args = array()) {@command CodeDeploy GetApplication}
 * @method Model getApplicationRevision(array $args = array()) {@command CodeDeploy GetApplicationRevision}
 * @method Model getDeployment(array $args = array()) {@command CodeDeploy GetDeployment}
 * @method Model getDeploymentConfig(array $args = array()) {@command CodeDeploy GetDeploymentConfig}
 * @method Model getDeploymentGroup(array $args = array()) {@command CodeDeploy GetDeploymentGroup}
 * @method Model getDeploymentInstance(array $args = array()) {@command CodeDeploy GetDeploymentInstance}
 * @method Model listApplicationRevisions(array $args = array()) {@command CodeDeploy ListApplicationRevisions}
 * @method Model listApplications(array $args = array()) {@command CodeDeploy ListApplications}
 * @method Model listDeploymentConfigs(array $args = array()) {@command CodeDeploy ListDeploymentConfigs}
 * @method Model listDeploymentGroups(array $args = array()) {@command CodeDeploy ListDeploymentGroups}
 * @method Model listDeploymentInstances(array $args = array()) {@command CodeDeploy ListDeploymentInstances}
 * @method Model listDeployments(array $args = array()) {@command CodeDeploy ListDeployments}
 * @method Model registerApplicationRevision(array $args = array()) {@command CodeDeploy RegisterApplicationRevision}
 * @method Model stopDeployment(array $args = array()) {@command CodeDeploy StopDeployment}
 * @method Model updateApplication(array $args = array()) {@command CodeDeploy UpdateApplication}
 * @method Model updateDeploymentGroup(array $args = array()) {@command CodeDeploy UpdateDeploymentGroup}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-codedeploy.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/latest/class-Aws.CodeDeploy.CodeDeployClient.html API docs
 */
class CodeDeployClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-10-06';

    /**
     * Factory method to create a new AWS CodeDeploy client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/codedeploy-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser)
            ->build();
    }
}
