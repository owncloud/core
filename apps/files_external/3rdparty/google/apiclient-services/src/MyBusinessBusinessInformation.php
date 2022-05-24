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
 * Service definition for MyBusinessBusinessInformation (v1).
 *
 * <p>
 * The My Business Business Information API provides an interface for managing
 * business information on Google.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/my-business/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class MyBusinessBusinessInformation extends \Google\Service
{


  public $accounts_locations;
  public $attributes;
  public $categories;
  public $chains;
  public $googleLocations;
  public $locations;
  public $locations_attributes;

  /**
   * Constructs the internal representation of the MyBusinessBusinessInformation
   * service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://mybusinessbusinessinformation.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'mybusinessbusinessinformation';

    $this->accounts_locations = new MyBusinessBusinessInformation\Resource\AccountsLocations(
        $this,
        $this->serviceName,
        'locations',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/locations',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/locations',
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
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->attributes = new MyBusinessBusinessInformation\Resource\Attributes(
        $this,
        $this->serviceName,
        'attributes',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/attributes',
              'httpMethod' => 'GET',
              'parameters' => [
                'categoryName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'languageCode' => [
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
                'parent' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'regionCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showAll' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->categories = new MyBusinessBusinessInformation\Resource\Categories(
        $this,
        $this->serviceName,
        'categories',
        [
          'methods' => [
            'batchGet' => [
              'path' => 'v1/categories:batchGet',
              'httpMethod' => 'GET',
              'parameters' => [
                'languageCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'names' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'regionCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/categories',
              'httpMethod' => 'GET',
              'parameters' => [
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'languageCode' => [
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
                'regionCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->chains = new MyBusinessBusinessInformation\Resource\Chains(
        $this,
        $this->serviceName,
        'chains',
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
            ],'search' => [
              'path' => 'v1/chains:search',
              'httpMethod' => 'GET',
              'parameters' => [
                'chainName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->googleLocations = new MyBusinessBusinessInformation\Resource\GoogleLocations(
        $this,
        $this->serviceName,
        'googleLocations',
        [
          'methods' => [
            'search' => [
              'path' => 'v1/googleLocations:search',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->locations = new MyBusinessBusinessInformation\Resource\Locations(
        $this,
        $this->serviceName,
        'locations',
        [
          'methods' => [
            'associate' => [
              'path' => 'v1/{+name}:associate',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'clearLocationAssociation' => [
              'path' => 'v1/{+name}:clearLocationAssociation',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getAttributes' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getGoogleUpdated' => [
              'path' => 'v1/{+name}:getGoogleUpdated',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
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
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'updateAttributes' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'attributeMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->locations_attributes = new MyBusinessBusinessInformation\Resource\LocationsAttributes(
        $this,
        $this->serviceName,
        'attributes',
        [
          'methods' => [
            'getGoogleUpdated' => [
              'path' => 'v1/{+name}:getGoogleUpdated',
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
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MyBusinessBusinessInformation::class, 'Google_Service_MyBusinessBusinessInformation');
