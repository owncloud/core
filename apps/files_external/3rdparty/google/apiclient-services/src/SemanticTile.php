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
 * Service definition for SemanticTile (v1).
 *
 * <p>
 * Serves vector tiles containing geospatial data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/maps/contact-sales/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class SemanticTile extends \Google\Service
{


  public $featuretiles;
  public $terraintiles;

  /**
   * Constructs the internal representation of the SemanticTile service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://vectortile.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'vectortile';

    $this->featuretiles = new SemanticTile\Resource\Featuretiles(
        $this,
        $this->serviceName,
        'featuretiles',
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
                'alwaysIncludeBuildingFootprints' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'clientInfo.apiClient' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.applicationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.applicationVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.deviceModel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.operatingSystem' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.platform' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.userId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientTileVersionId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'enableDetailedHighwayTypes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'enableFeatureNames' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'enableModeledVolumes' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'enablePoliticalFeatures' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'enablePrivateRoads' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'enableUnclippedBuildings' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'languageCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'regionCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->terraintiles = new SemanticTile\Resource\Terraintiles(
        $this,
        $this->serviceName,
        'terraintiles',
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
                'altitudePrecisionCentimeters' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'clientInfo.apiClient' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.applicationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.applicationVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.deviceModel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.operatingSystem' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.platform' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientInfo.userId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxElevationResolutionCells' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'minElevationResolutionCells' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'terrainFormats' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SemanticTile::class, 'Google_Service_SemanticTile');
