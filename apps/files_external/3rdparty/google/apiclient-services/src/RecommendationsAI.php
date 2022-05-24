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
 * Service definition for RecommendationsAI (v1beta1).
 *
 * <p>
 * Note that we now highly recommend new customers to use Retail API, which
 * incorporates the GA version of the Recommendations AI funtionalities. To
 * enable Retail API, please visit
 * https://console.cloud.google.com/apis/library/retail.googleapis.com. The
 * Recommendations AI service enables customers to build end-to-end personalized
 * recommendation systems without requiring a high level of expertise in machine
 * learning, recommendation system, or Google Cloud.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/recommendations-ai/docs" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class RecommendationsAI extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects_locations_catalogs;
  public $projects_locations_catalogs_catalogItems;
  public $projects_locations_catalogs_eventStores_operations;
  public $projects_locations_catalogs_eventStores_placements;
  public $projects_locations_catalogs_eventStores_predictionApiKeyRegistrations;
  public $projects_locations_catalogs_eventStores_userEvents;
  public $projects_locations_catalogs_operations;

  /**
   * Constructs the internal representation of the RecommendationsAI service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://recommendationengine.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta1';
    $this->serviceName = 'recommendationengine';

    $this->projects_locations_catalogs = new RecommendationsAI\Resource\ProjectsLocationsCatalogs(
        $this,
        $this->serviceName,
        'catalogs',
        [
          'methods' => [
            'list' => [
              'path' => 'v1beta1/{+parent}/catalogs',
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
            ],'patch' => [
              'path' => 'v1beta1/{+name}',
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
    $this->projects_locations_catalogs_catalogItems = new RecommendationsAI\Resource\ProjectsLocationsCatalogsCatalogItems(
        $this,
        $this->serviceName,
        'catalogItems',
        [
          'methods' => [
            'create' => [
              'path' => 'v1beta1/{+parent}/catalogItems',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'import' => [
              'path' => 'v1beta1/{+parent}/catalogItems:import',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1beta1/{+parent}/catalogItems',
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
            ],'patch' => [
              'path' => 'v1beta1/{+name}',
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
    $this->projects_locations_catalogs_eventStores_operations = new RecommendationsAI\Resource\ProjectsLocationsCatalogsEventStoresOperations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1beta1/{+name}/operations',
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
    $this->projects_locations_catalogs_eventStores_placements = new RecommendationsAI\Resource\ProjectsLocationsCatalogsEventStoresPlacements(
        $this,
        $this->serviceName,
        'placements',
        [
          'methods' => [
            'predict' => [
              'path' => 'v1beta1/{+name}:predict',
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
    $this->projects_locations_catalogs_eventStores_predictionApiKeyRegistrations = new RecommendationsAI\Resource\ProjectsLocationsCatalogsEventStoresPredictionApiKeyRegistrations(
        $this,
        $this->serviceName,
        'predictionApiKeyRegistrations',
        [
          'methods' => [
            'create' => [
              'path' => 'v1beta1/{+parent}/predictionApiKeyRegistrations',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1beta1/{+parent}/predictionApiKeyRegistrations',
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
    $this->projects_locations_catalogs_eventStores_userEvents = new RecommendationsAI\Resource\ProjectsLocationsCatalogsEventStoresUserEvents(
        $this,
        $this->serviceName,
        'userEvents',
        [
          'methods' => [
            'collect' => [
              'path' => 'v1beta1/{+parent}/userEvents:collect',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ets' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'uri' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userEvent' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'import' => [
              'path' => 'v1beta1/{+parent}/userEvents:import',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1beta1/{+parent}/userEvents',
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
            ],'purge' => [
              'path' => 'v1beta1/{+parent}/userEvents:purge',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'rejoin' => [
              'path' => 'v1beta1/{+parent}/userEvents:rejoin',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'write' => [
              'path' => 'v1beta1/{+parent}/userEvents:write',
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
    $this->projects_locations_catalogs_operations = new RecommendationsAI\Resource\ProjectsLocationsCatalogsOperations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1beta1/{+name}/operations',
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
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RecommendationsAI::class, 'Google_Service_RecommendationsAI');
