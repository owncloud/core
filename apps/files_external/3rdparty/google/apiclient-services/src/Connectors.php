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
 * Service definition for Connectors (v2).
 *
 * <p>
 * Enables users to create and manage connections to Google Cloud services and
 * third-party business applications using the Connectors interface.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/apigee/docs/api-platform/connectors/about-connectors" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Connectors extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects_locations_connections;
  public $projects_locations_connections_actions;
  public $projects_locations_connections_entityTypes;
  public $projects_locations_connections_entityTypes_entities;

  /**
   * Constructs the internal representation of the Connectors service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://connectors.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'connectors';

    $this->projects_locations_connections = new Connectors\Resource\ProjectsLocationsConnections(
        $this,
        $this->serviceName,
        'connections',
        [
          'methods' => [
            'executeSqlQuery' => [
              'path' => 'v2/{+connection}:executeSqlQuery',
              'httpMethod' => 'POST',
              'parameters' => [
                'connection' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_connections_actions = new Connectors\Resource\ProjectsLocationsConnectionsActions(
        $this,
        $this->serviceName,
        'actions',
        [
          'methods' => [
            'execute' => [
              'path' => 'v2/{+name}:execute',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/{+parent}/actions',
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
    $this->projects_locations_connections_entityTypes = new Connectors\Resource\ProjectsLocationsConnectionsEntityTypes(
        $this,
        $this->serviceName,
        'entityTypes',
        [
          'methods' => [
            'list' => [
              'path' => 'v2/{+parent}/entityTypes',
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
    $this->projects_locations_connections_entityTypes_entities = new Connectors\Resource\ProjectsLocationsConnectionsEntityTypesEntities(
        $this,
        $this->serviceName,
        'entities',
        [
          'methods' => [
            'create' => [
              'path' => 'v2/{+parent}/entities',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v2/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'deleteEntitiesWithConditions' => [
              'path' => 'v2/{+entityType}/entities:deleteEntitiesWithConditions',
              'httpMethod' => 'POST',
              'parameters' => [
                'entityType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'conditions' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/{+parent}/entities',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'conditions' => [
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
                'sortBy' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'v2/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateEntitiesWithConditions' => [
              'path' => 'v2/{+entityType}/entities:updateEntitiesWithConditions',
              'httpMethod' => 'POST',
              'parameters' => [
                'entityType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'conditions' => [
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
class_alias(Connectors::class, 'Google_Service_Connectors');
