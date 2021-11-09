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
 * Service definition for CloudRun (v1).
 *
 * <p>
 * Deploy and manage user provided container images that scale automatically
 * based on incoming requests. The Cloud Run Admin API follows the Knative
 * Serving API specification.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/run/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class CloudRun extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $namespaces_authorizeddomains;
  public $namespaces_configurations;
  public $namespaces_domainmappings;
  public $namespaces_revisions;
  public $namespaces_routes;
  public $namespaces_services;
  public $operations;
  public $projects_authorizeddomains;
  public $projects_locations;
  public $projects_locations_authorizeddomains;
  public $projects_locations_configurations;
  public $projects_locations_domainmappings;
  public $projects_locations_revisions;
  public $projects_locations_routes;
  public $projects_locations_services;

  /**
   * Constructs the internal representation of the CloudRun service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://run.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'run';

    $this->namespaces_authorizeddomains = new CloudRun\Resource\NamespacesAuthorizeddomains(
        $this,
        $this->serviceName,
        'authorizeddomains',
        [
          'methods' => [
            'list' => [
              'path' => 'apis/domains.cloudrun.com/v1/{+parent}/authorizeddomains',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
    $this->namespaces_configurations = new CloudRun\Resource\NamespacesConfigurations(
        $this,
        $this->serviceName,
        'configurations',
        [
          'methods' => [
            'get' => [
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'apis/serving.knative.dev/v1/{+parent}/configurations',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'continue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fieldSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeUninitialized' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'resourceVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'watch' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->namespaces_domainmappings = new CloudRun\Resource\NamespacesDomainmappings(
        $this,
        $this->serviceName,
        'domainmappings',
        [
          'methods' => [
            'create' => [
              'path' => 'apis/domains.cloudrun.com/v1/{+parent}/domainmappings',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'apis/domains.cloudrun.com/v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apiVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'kind' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'propagationPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'apis/domains.cloudrun.com/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'apis/domains.cloudrun.com/v1/{+parent}/domainmappings',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'continue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fieldSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeUninitialized' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'resourceVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'watch' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->namespaces_revisions = new CloudRun\Resource\NamespacesRevisions(
        $this,
        $this->serviceName,
        'revisions',
        [
          'methods' => [
            'delete' => [
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apiVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'kind' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'propagationPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'apis/serving.knative.dev/v1/{+parent}/revisions',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'continue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fieldSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeUninitialized' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'resourceVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'watch' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->namespaces_routes = new CloudRun\Resource\NamespacesRoutes(
        $this,
        $this->serviceName,
        'routes',
        [
          'methods' => [
            'get' => [
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'apis/serving.knative.dev/v1/{+parent}/routes',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'continue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fieldSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeUninitialized' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'resourceVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'watch' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->namespaces_services = new CloudRun\Resource\NamespacesServices(
        $this,
        $this->serviceName,
        'services',
        [
          'methods' => [
            'create' => [
              'path' => 'apis/serving.knative.dev/v1/{+parent}/services',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apiVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'kind' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'propagationPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'apis/serving.knative.dev/v1/{+parent}/services',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'continue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fieldSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeUninitialized' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'resourceVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'watch' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'replaceService' => [
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->operations = new CloudRun\Resource\Operations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'cancel' => [
              'path' => 'v1/{+name}:cancel',
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
    $this->projects_authorizeddomains = new CloudRun\Resource\ProjectsAuthorizeddomains(
        $this,
        $this->serviceName,
        'authorizeddomains',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/authorizeddomains',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
    $this->projects_locations = new CloudRun\Resource\ProjectsLocations(
        $this,
        $this->serviceName,
        'locations',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+name}/locations',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
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
    $this->projects_locations_authorizeddomains = new CloudRun\Resource\ProjectsLocationsAuthorizeddomains(
        $this,
        $this->serviceName,
        'authorizeddomains',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/authorizeddomains',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
    $this->projects_locations_configurations = new CloudRun\Resource\ProjectsLocationsConfigurations(
        $this,
        $this->serviceName,
        'configurations',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/configurations',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'continue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fieldSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeUninitialized' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'resourceVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'watch' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_domainmappings = new CloudRun\Resource\ProjectsLocationsDomainmappings(
        $this,
        $this->serviceName,
        'domainmappings',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/domainmappings',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apiVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'kind' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'propagationPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/domainmappings',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'continue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fieldSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeUninitialized' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'resourceVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'watch' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_revisions = new CloudRun\Resource\ProjectsLocationsRevisions(
        $this,
        $this->serviceName,
        'revisions',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apiVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'kind' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'propagationPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/revisions',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'continue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fieldSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeUninitialized' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'resourceVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'watch' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_routes = new CloudRun\Resource\ProjectsLocationsRoutes(
        $this,
        $this->serviceName,
        'routes',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/routes',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'continue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fieldSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeUninitialized' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'resourceVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'watch' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_services = new CloudRun\Resource\ProjectsLocationsServices(
        $this,
        $this->serviceName,
        'services',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/services',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apiVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'kind' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'propagationPolicy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'v1/{+resource}:getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'options.requestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/services',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'continue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'fieldSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeUninitialized' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'labelSelector' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'resourceVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'watch' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'replaceService' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dryRun' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'v1/{+resource}:setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'v1/{+resource}:testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudRun::class, 'Google_Service_CloudRun');
