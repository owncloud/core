<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service;

use Google\Client;

/**
 * Service definition for DeploymentManager (v2).
 *
 * <p>
 * The Google Cloud Deployment Manager v2 API provides services for configuring,
 * deploying, and viewing Google Cloud services and APIs via templates which
 * specify deployments of Cloud resources.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/deployment-manager" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class DeploymentManager extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View your data across Google Cloud services and see the email address of your Google Account. */
  const CLOUD_PLATFORM_READ_ONLY =
      "https://www.googleapis.com/auth/cloud-platform.read-only";
  /** View and manage your Google Cloud Platform management resources and deployment status information. */
  const NDEV_CLOUDMAN =
      "https://www.googleapis.com/auth/ndev.cloudman";
  /** View your Google Cloud Platform management resources and deployment status information. */
  const NDEV_CLOUDMAN_READONLY =
      "https://www.googleapis.com/auth/ndev.cloudman.readonly";

  public $deployments;
  public $manifests;
  public $operations;
  public $resources;
  public $types;

  /**
   * Constructs the internal representation of the DeploymentManager service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://deploymentmanager.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'deploymentmanager';

    $this->deployments = new DeploymentManager\Resource\Deployments(
        $this,
        $this->serviceName,
        'deployments',
        [
          'methods' => [
            'cancelPreview' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{deployment}/cancelPreview',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deployment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{deployment}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deployment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deletePolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{deployment}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deployment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{resource}/getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'optionsRequestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'insert' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'createPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'preview' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{deployment}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deployment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'createPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'deletePolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'preview' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{resource}/setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'stop' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{deployment}/stop',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deployment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{resource}/testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{deployment}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deployment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'createPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'deletePolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'preview' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->manifests = new DeploymentManager\Resource\Manifests(
        $this,
        $this->serviceName,
        'manifests',
        [
          'methods' => [
            'get' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{deployment}/manifests/{manifest}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deployment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'manifest' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{deployment}/manifests',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deployment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->operations = new DeploymentManager\Resource\Operations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/operations/{operation}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'operation' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->resources = new DeploymentManager\Resource\Resources(
        $this,
        $this->serviceName,
        'resources',
        [
          'methods' => [
            'get' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{deployment}/resources/{resource}',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deployment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/deployments/{deployment}/resources',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deployment' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->types = new DeploymentManager\Resource\Types(
        $this,
        $this->serviceName,
        'types',
        [
          'methods' => [
            'list' => [
              'path' => 'deploymentmanager/v2/projects/{project}/global/types',
              'httpMethod' => 'GET',
              'parameters' => [
                'project' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeploymentManager::class, 'Google_Service_DeploymentManager');
