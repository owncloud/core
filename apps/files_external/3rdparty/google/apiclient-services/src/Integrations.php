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
 * Service definition for Integrations (v1alpha).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://www.google.com" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Integrations extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $callback;
  public $connectorPlatformRegions;
  public $projects_locations;
  public $projects_locations_appsScriptProjects;
  public $projects_locations_authConfigs;
  public $projects_locations_certificates;
  public $projects_locations_connections;
  public $projects_locations_connections_runtimeActionSchemas;
  public $projects_locations_connections_runtimeEntitySchemas;
  public $projects_locations_integrations;
  public $projects_locations_integrations_executions;
  public $projects_locations_integrations_versions;
  public $projects_locations_products;
  public $projects_locations_products_authConfigs;
  public $projects_locations_products_certificates;
  public $projects_locations_products_integrations;
  public $projects_locations_products_integrations_executions;
  public $projects_locations_products_integrations_executions_suspensions;
  public $projects_locations_products_integrations_executionsnapshots;
  public $projects_locations_products_integrations_versions;
  public $projects_locations_products_integrationtemplates_versions;
  public $projects_locations_products_sfdcInstances;
  public $projects_locations_products_sfdcInstances_sfdcChannels;
  public $projects_locations_sfdcInstances;
  public $projects_locations_sfdcInstances_sfdcChannels;

  /**
   * Constructs the internal representation of the Integrations service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://integrations.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1alpha';
    $this->serviceName = 'integrations';

    $this->callback = new Integrations\Resource\Callback(
        $this,
        $this->serviceName,
        'callback',
        [
          'methods' => [
            'generateToken' => [
              'path' => 'v1alpha/callback:generateToken',
              'httpMethod' => 'GET',
              'parameters' => [
                'code' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'gcpProjectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'product' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'redirectUri' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'state' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->connectorPlatformRegions = new Integrations\Resource\ConnectorPlatformRegions(
        $this,
        $this->serviceName,
        'connectorPlatformRegions',
        [
          'methods' => [
            'enumerate' => [
              'path' => 'v1alpha/connectorPlatformRegions:enumerate',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->projects_locations = new Integrations\Resource\ProjectsLocations(
        $this,
        $this->serviceName,
        'locations',
        [
          'methods' => [
            'listTaskEntities' => [
              'path' => 'v1alpha/{+parent}:listTaskEntities',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_appsScriptProjects = new Integrations\Resource\ProjectsLocationsAppsScriptProjects(
        $this,
        $this->serviceName,
        'appsScriptProjects',
        [
          'methods' => [
            'create' => [
              'path' => 'v1alpha/{+parent}/appsScriptProjects',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'link' => [
              'path' => 'v1alpha/{+parent}/appsScriptProjects:link',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_authConfigs = new Integrations\Resource\ProjectsLocationsAuthConfigs(
        $this,
        $this->serviceName,
        'authConfigs',
        [
          'methods' => [
            'create' => [
              'path' => 'v1alpha/{+parent}/authConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientCertificate.encryptedPrivateKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientCertificate.passphrase' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientCertificate.sslCertificate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/authConfigs',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientCertificate.encryptedPrivateKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientCertificate.passphrase' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientCertificate.sslCertificate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_certificates = new Integrations\Resource\ProjectsLocationsCertificates(
        $this,
        $this->serviceName,
        'certificates',
        [
          'methods' => [
            'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_connections = new Integrations\Resource\ProjectsLocationsConnections(
        $this,
        $this->serviceName,
        'connections',
        [
          'methods' => [
            'getConnectionSchemaMetadata' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/connections',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
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
    $this->projects_locations_connections_runtimeActionSchemas = new Integrations\Resource\ProjectsLocationsConnectionsRuntimeActionSchemas(
        $this,
        $this->serviceName,
        'runtimeActionSchemas',
        [
          'methods' => [
            'list' => [
              'path' => 'v1alpha/{+parent}/runtimeActionSchemas',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
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
    $this->projects_locations_connections_runtimeEntitySchemas = new Integrations\Resource\ProjectsLocationsConnectionsRuntimeEntitySchemas(
        $this,
        $this->serviceName,
        'runtimeEntitySchemas',
        [
          'methods' => [
            'list' => [
              'path' => 'v1alpha/{+parent}/runtimeEntitySchemas',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
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
    $this->projects_locations_integrations = new Integrations\Resource\ProjectsLocationsIntegrations(
        $this,
        $this->serviceName,
        'integrations',
        [
          'methods' => [
            'execute' => [
              'path' => 'v1alpha/{+name}:execute',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/integrations',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'monitorexecutionstats' => [
              'path' => 'v1alpha/{+parent}:monitorexecutionstats',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'schedule' => [
              'path' => 'v1alpha/{+name}:schedule',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_integrations_executions = new Integrations\Resource\ProjectsLocationsIntegrationsExecutions(
        $this,
        $this->serviceName,
        'executions',
        [
          'methods' => [
            'list' => [
              'path' => 'v1alpha/{+parent}/executions',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.customFilter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.endTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.eventStatuses' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'filterParams.executionId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.parameterKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.parameterPairKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.parameterPairValue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.parameterType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.parameterValue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.taskStatuses' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'filterParams.triggerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.workflowName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'refreshAcl' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'truncateParams' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_integrations_versions = new Integrations\Resource\ProjectsLocationsIntegrationsVersions(
        $this,
        $this->serviceName,
        'versions',
        [
          'methods' => [
            'archive' => [
              'path' => 'v1alpha/{+name}:archive',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1alpha/{+parent}/versions',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'newIntegration' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'deactivate' => [
              'path' => 'v1alpha/{+name}:deactivate',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/versions',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fieldMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'publish' => [
              'path' => 'v1alpha/{+name}:publish',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'takeoverEditLock' => [
              'path' => 'v1alpha/{+integrationVersion}:takeoverEditLock',
              'httpMethod' => 'POST',
              'parameters' => [
                'integrationVersion' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'validate' => [
              'path' => 'v1alpha/{+name}:validate',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_products = new Integrations\Resource\ProjectsLocationsProducts(
        $this,
        $this->serviceName,
        'products',
        [
          'methods' => [
            'createBundle' => [
              'path' => 'v1alpha/{+parent}:createBundle',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'listTaskEntities' => [
              'path' => 'v1alpha/{+parent}:listTaskEntities',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_products_authConfigs = new Integrations\Resource\ProjectsLocationsProductsAuthConfigs(
        $this,
        $this->serviceName,
        'authConfigs',
        [
          'methods' => [
            'create' => [
              'path' => 'v1alpha/{+parent}/authConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientCertificate.encryptedPrivateKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientCertificate.passphrase' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientCertificate.sslCertificate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/authConfigs',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientCertificate.encryptedPrivateKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientCertificate.passphrase' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientCertificate.sslCertificate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_products_certificates = new Integrations\Resource\ProjectsLocationsProductsCertificates(
        $this,
        $this->serviceName,
        'certificates',
        [
          'methods' => [
            'create' => [
              'path' => 'v1alpha/{+parent}/certificates',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/certificates',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_products_integrations = new Integrations\Resource\ProjectsLocationsProductsIntegrations(
        $this,
        $this->serviceName,
        'integrations',
        [
          'methods' => [
            'archiveBundle' => [
              'path' => 'v1alpha/{+name}:archiveBundle',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'execute' => [
              'path' => 'v1alpha/{+name}:execute',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/integrations',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'monitorexecutionstats' => [
              'path' => 'v1alpha/{+parent}:monitorexecutionstats',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'schedule' => [
              'path' => 'v1alpha/{+name}:schedule',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_products_integrations_executions = new Integrations\Resource\ProjectsLocationsProductsIntegrationsExecutions(
        $this,
        $this->serviceName,
        'executions',
        [
          'methods' => [
            'cancel' => [
              'path' => 'v1alpha/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/executions',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.customFilter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.endTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.eventStatuses' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'filterParams.executionId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.parameterKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.parameterPairKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.parameterPairValue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.parameterType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.parameterValue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.taskStatuses' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'filterParams.triggerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterParams.workflowName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'refreshAcl' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'truncateParams' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_products_integrations_executions_suspensions = new Integrations\Resource\ProjectsLocationsProductsIntegrationsExecutionsSuspensions(
        $this,
        $this->serviceName,
        'suspensions',
        [
          'methods' => [
            'lift' => [
              'path' => 'v1alpha/{+name}:lift',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/suspensions',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'resolve' => [
              'path' => 'v1alpha/{+name}:resolve',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_products_integrations_executionsnapshots = new Integrations\Resource\ProjectsLocationsProductsIntegrationsExecutionsnapshots(
        $this,
        $this->serviceName,
        'executionsnapshots',
        [
          'methods' => [
            'list' => [
              'path' => 'v1alpha/{+parent}/executionsnapshots',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_products_integrations_versions = new Integrations\Resource\ProjectsLocationsProductsIntegrationsVersions(
        $this,
        $this->serviceName,
        'versions',
        [
          'methods' => [
            'archive' => [
              'path' => 'v1alpha/{+name}:archive',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1alpha/{+parent}/versions',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'newIntegration' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'deactivate' => [
              'path' => 'v1alpha/{+name}:deactivate',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'download' => [
              'path' => 'v1alpha/{+name}:download',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fileFormat' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getBundle' => [
              'path' => 'v1alpha/{+name}:getBundle',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/versions',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fieldMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'publish' => [
              'path' => 'v1alpha/{+name}:publish',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'takeoverEditLock' => [
              'path' => 'v1alpha/{+integrationVersion}:takeoverEditLock',
              'httpMethod' => 'POST',
              'parameters' => [
                'integrationVersion' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateBundle' => [
              'path' => 'v1alpha/{+name}:updateBundle',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'upload' => [
              'path' => 'v1alpha/{+parent}/versions:upload',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'validate' => [
              'path' => 'v1alpha/{+name}:validate',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_products_integrationtemplates_versions = new Integrations\Resource\ProjectsLocationsProductsIntegrationtemplatesVersions(
        $this,
        $this->serviceName,
        'versions',
        [
          'methods' => [
            'create' => [
              'path' => 'v1alpha/{+parent}/versions',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/versions',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
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
    $this->projects_locations_products_sfdcInstances = new Integrations\Resource\ProjectsLocationsProductsSfdcInstances(
        $this,
        $this->serviceName,
        'sfdcInstances',
        [
          'methods' => [
            'create' => [
              'path' => 'v1alpha/{+parent}/sfdcInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/sfdcInstances',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_products_sfdcInstances_sfdcChannels = new Integrations\Resource\ProjectsLocationsProductsSfdcInstancesSfdcChannels(
        $this,
        $this->serviceName,
        'sfdcChannels',
        [
          'methods' => [
            'create' => [
              'path' => 'v1alpha/{+parent}/sfdcChannels',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/sfdcChannels',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_sfdcInstances = new Integrations\Resource\ProjectsLocationsSfdcInstances(
        $this,
        $this->serviceName,
        'sfdcInstances',
        [
          'methods' => [
            'create' => [
              'path' => 'v1alpha/{+parent}/sfdcInstances',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/sfdcInstances',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_sfdcInstances_sfdcChannels = new Integrations\Resource\ProjectsLocationsSfdcInstancesSfdcChannels(
        $this,
        $this->serviceName,
        'sfdcChannels',
        [
          'methods' => [
            'create' => [
              'path' => 'v1alpha/{+parent}/sfdcChannels',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1alpha/{+parent}/sfdcChannels',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
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
class_alias(Integrations::class, 'Google_Service_Integrations');
