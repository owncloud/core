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
 * Service definition for CloudRetail (v2).
 *
 * <p>
 * Cloud Retail service enables customers to build end-to-end personalized
 * recommendation systems without requiring a high level of expertise in machine
 * learning, recommendation system, or Google Cloud.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/recommendations" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class CloudRetail extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects_locations_catalogs;
  public $projects_locations_catalogs_branches_operations;
  public $projects_locations_catalogs_branches_products;
  public $projects_locations_catalogs_completionData;
  public $projects_locations_catalogs_operations;
  public $projects_locations_catalogs_placements;
  public $projects_locations_catalogs_servingConfigs;
  public $projects_locations_catalogs_userEvents;
  public $projects_locations_operations;
  public $projects_operations;

  /**
   * Constructs the internal representation of the CloudRetail service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://retail.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'retail';

    $this->projects_locations_catalogs = new CloudRetail\Resource\ProjectsLocationsCatalogs(
        $this,
        $this->serviceName,
        'catalogs',
        [
          'methods' => [
            'completeQuery' => [
              'path' => 'v2/{+catalog}:completeQuery',
              'httpMethod' => 'GET',
              'parameters' => [
                'catalog' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataset' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'deviceType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'languageCodes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxSuggestions' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'visitorId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getDefaultBranch' => [
              'path' => 'v2/{+catalog}:getDefaultBranch',
              'httpMethod' => 'GET',
              'parameters' => [
                'catalog' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/{+parent}/catalogs',
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
              'path' => 'v2/{+name}',
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
            ],'setDefaultBranch' => [
              'path' => 'v2/{+catalog}:setDefaultBranch',
              'httpMethod' => 'POST',
              'parameters' => [
                'catalog' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_catalogs_branches_operations = new CloudRetail\Resource\ProjectsLocationsCatalogsBranchesOperations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/{+name}',
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
    $this->projects_locations_catalogs_branches_products = new CloudRetail\Resource\ProjectsLocationsCatalogsBranchesProducts(
        $this,
        $this->serviceName,
        'products',
        [
          'methods' => [
            'addFulfillmentPlaces' => [
              'path' => 'v2/{+product}:addFulfillmentPlaces',
              'httpMethod' => 'POST',
              'parameters' => [
                'product' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'addLocalInventories' => [
              'path' => 'v2/{+product}:addLocalInventories',
              'httpMethod' => 'POST',
              'parameters' => [
                'product' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v2/{+parent}/products',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'query',
                  'type' => 'string',
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
            ],'import' => [
              'path' => 'v2/{+parent}/products:import',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/{+parent}/products',
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
              'path' => 'v2/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'allowMissing' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeFulfillmentPlaces' => [
              'path' => 'v2/{+product}:removeFulfillmentPlaces',
              'httpMethod' => 'POST',
              'parameters' => [
                'product' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'removeLocalInventories' => [
              'path' => 'v2/{+product}:removeLocalInventories',
              'httpMethod' => 'POST',
              'parameters' => [
                'product' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setInventory' => [
              'path' => 'v2/{+name}:setInventory',
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
    $this->projects_locations_catalogs_completionData = new CloudRetail\Resource\ProjectsLocationsCatalogsCompletionData(
        $this,
        $this->serviceName,
        'completionData',
        [
          'methods' => [
            'import' => [
              'path' => 'v2/{+parent}/completionData:import',
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
    $this->projects_locations_catalogs_operations = new CloudRetail\Resource\ProjectsLocationsCatalogsOperations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
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
              'path' => 'v2/{+name}/operations',
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
    $this->projects_locations_catalogs_placements = new CloudRetail\Resource\ProjectsLocationsCatalogsPlacements(
        $this,
        $this->serviceName,
        'placements',
        [
          'methods' => [
            'predict' => [
              'path' => 'v2/{+placement}:predict',
              'httpMethod' => 'POST',
              'parameters' => [
                'placement' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'search' => [
              'path' => 'v2/{+placement}:search',
              'httpMethod' => 'POST',
              'parameters' => [
                'placement' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_catalogs_servingConfigs = new CloudRetail\Resource\ProjectsLocationsCatalogsServingConfigs(
        $this,
        $this->serviceName,
        'servingConfigs',
        [
          'methods' => [
            'predict' => [
              'path' => 'v2/{+placement}:predict',
              'httpMethod' => 'POST',
              'parameters' => [
                'placement' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'search' => [
              'path' => 'v2/{+placement}:search',
              'httpMethod' => 'POST',
              'parameters' => [
                'placement' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_catalogs_userEvents = new CloudRetail\Resource\ProjectsLocationsCatalogsUserEvents(
        $this,
        $this->serviceName,
        'userEvents',
        [
          'methods' => [
            'collect' => [
              'path' => 'v2/{+parent}/userEvents:collect',
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
              'path' => 'v2/{+parent}/userEvents:import',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'purge' => [
              'path' => 'v2/{+parent}/userEvents:purge',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'rejoin' => [
              'path' => 'v2/{+parent}/userEvents:rejoin',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'write' => [
              'path' => 'v2/{+parent}/userEvents:write',
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
    $this->projects_locations_operations = new CloudRetail\Resource\ProjectsLocationsOperations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
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
              'path' => 'v2/{+name}/operations',
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
    $this->projects_operations = new CloudRetail\Resource\ProjectsOperations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
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
              'path' => 'v2/{+name}/operations',
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
class_alias(CloudRetail::class, 'Google_Service_CloudRetail');
