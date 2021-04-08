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

/**
 * Service definition for CloudRun (v1).
 *
 * <p>
 * Deploy and manage user provided container images that scale automatically
 * based on HTTP traffic.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/run/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CloudRun extends Google_Service
{
  /** See, edit, configure, and delete your Google Cloud Platform data. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $namespaces_authorizeddomains;
  public $namespaces_configurations;
  public $namespaces_domainmappings;
  public $namespaces_revisions;
  public $namespaces_routes;
  public $namespaces_services;
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://run.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'run';

    $this->namespaces_authorizeddomains = new Google_Service_CloudRun_Resource_NamespacesAuthorizeddomains(
        $this,
        $this->serviceName,
        'authorizeddomains',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'apis/domains.cloudrun.com/v1/{+parent}/authorizeddomains',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->namespaces_configurations = new Google_Service_CloudRun_Resource_NamespacesConfigurations(
        $this,
        $this->serviceName,
        'configurations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'apis/serving.knative.dev/v1/{+parent}/configurations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'continue' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fieldSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeUninitialized' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'labelSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'resourceVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'watch' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->namespaces_domainmappings = new Google_Service_CloudRun_Resource_NamespacesDomainmappings(
        $this,
        $this->serviceName,
        'domainmappings',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'apis/domains.cloudrun.com/v1/{+parent}/domainmappings',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'apis/domains.cloudrun.com/v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'apiVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'kind' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'propagationPolicy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'apis/domains.cloudrun.com/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'apis/domains.cloudrun.com/v1/{+parent}/domainmappings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'continue' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fieldSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeUninitialized' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'labelSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'resourceVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'watch' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->namespaces_revisions = new Google_Service_CloudRun_Resource_NamespacesRevisions(
        $this,
        $this->serviceName,
        'revisions',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'apiVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'kind' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'propagationPolicy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'apis/serving.knative.dev/v1/{+parent}/revisions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'continue' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fieldSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeUninitialized' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'labelSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'resourceVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'watch' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->namespaces_routes = new Google_Service_CloudRun_Resource_NamespacesRoutes(
        $this,
        $this->serviceName,
        'routes',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'apis/serving.knative.dev/v1/{+parent}/routes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'continue' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fieldSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeUninitialized' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'labelSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'resourceVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'watch' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->namespaces_services = new Google_Service_CloudRun_Resource_NamespacesServices(
        $this,
        $this->serviceName,
        'services',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'apis/serving.knative.dev/v1/{+parent}/services',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'apiVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'kind' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'propagationPolicy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'apis/serving.knative.dev/v1/{+parent}/services',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'continue' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fieldSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeUninitialized' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'labelSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'resourceVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'watch' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'replaceService' => array(
              'path' => 'apis/serving.knative.dev/v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_authorizeddomains = new Google_Service_CloudRun_Resource_ProjectsAuthorizeddomains(
        $this,
        $this->serviceName,
        'authorizeddomains',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+parent}/authorizeddomains',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations = new Google_Service_CloudRun_Resource_ProjectsLocations(
        $this,
        $this->serviceName,
        'locations',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+name}/locations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_authorizeddomains = new Google_Service_CloudRun_Resource_ProjectsLocationsAuthorizeddomains(
        $this,
        $this->serviceName,
        'authorizeddomains',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+parent}/authorizeddomains',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_configurations = new Google_Service_CloudRun_Resource_ProjectsLocationsConfigurations(
        $this,
        $this->serviceName,
        'configurations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+parent}/configurations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'continue' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fieldSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeUninitialized' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'labelSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'resourceVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'watch' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_domainmappings = new Google_Service_CloudRun_Resource_ProjectsLocationsDomainmappings(
        $this,
        $this->serviceName,
        'domainmappings',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/domainmappings',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'apiVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'kind' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'propagationPolicy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+parent}/domainmappings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'continue' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fieldSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeUninitialized' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'labelSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'resourceVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'watch' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_revisions = new Google_Service_CloudRun_Resource_ProjectsLocationsRevisions(
        $this,
        $this->serviceName,
        'revisions',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'apiVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'kind' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'propagationPolicy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+parent}/revisions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'continue' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fieldSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeUninitialized' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'labelSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'resourceVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'watch' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_routes = new Google_Service_CloudRun_Resource_ProjectsLocationsRoutes(
        $this,
        $this->serviceName,
        'routes',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+parent}/routes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'continue' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fieldSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeUninitialized' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'labelSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'resourceVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'watch' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_services = new Google_Service_CloudRun_Resource_ProjectsLocationsServices(
        $this,
        $this->serviceName,
        'services',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/services',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'apiVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'kind' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'propagationPolicy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getIamPolicy' => array(
              'path' => 'v1/{+resource}:getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'options.requestedPolicyVersion' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+parent}/services',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'continue' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'fieldSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeUninitialized' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'labelSelector' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'resourceVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'watch' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'replaceService' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dryRun' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'setIamPolicy' => array(
              'path' => 'v1/{+resource}:setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'testIamPermissions' => array(
              'path' => 'v1/{+resource}:testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resource' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
