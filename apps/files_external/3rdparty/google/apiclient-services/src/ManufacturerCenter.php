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
 * Service definition for ManufacturerCenter (v1).
 *
 * <p>
 * Public API for managing Manufacturer Center related data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/manufacturers/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class ManufacturerCenter extends \Google\Service
{
  /** Manage your product listings for Google Manufacturer Center. */
  const MANUFACTURERCENTER =
      "https://www.googleapis.com/auth/manufacturercenter";

  public $accounts_products;

  /**
   * Constructs the internal representation of the ManufacturerCenter service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://manufacturers.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'manufacturers';

    $this->accounts_products = new ManufacturerCenter\Resource\AccountsProducts(
        $this,
        $this->serviceName,
        'products',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/{+parent}/products/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+parent}/products/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'include' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/products',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'include' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
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
            ],'update' => [
              'path' => 'v1/{+parent}/products/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
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
class_alias(ManufacturerCenter::class, 'Google_Service_ManufacturerCenter');
