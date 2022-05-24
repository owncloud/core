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
 * Service definition for PolyService (v1).
 *
 * <p>
 * The Poly API provides read access to assets hosted on poly.google.com to all,
 * and upload access to poly.google.com for whitelisted accounts.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/poly/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class PolyService extends \Google\Service
{


  public $assets;
  public $users_assets;
  public $users_likedassets;

  /**
   * Constructs the internal representation of the PolyService service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://poly.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'poly';

    $this->assets = new PolyService\Resource\Assets(
        $this,
        $this->serviceName,
        'assets',
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
              'path' => 'v1/assets',
              'httpMethod' => 'GET',
              'parameters' => [
                'category' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'curated' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'format' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'keywords' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxComplexity' => [
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
    $this->users_assets = new PolyService\Resource\UsersAssets(
        $this,
        $this->serviceName,
        'assets',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+name}/assets',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'format' => [
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
                'visibility' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_likedassets = new PolyService\Resource\UsersLikedassets(
        $this,
        $this->serviceName,
        'likedassets',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+name}/likedassets',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'format' => [
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
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PolyService::class, 'Google_Service_PolyService');
