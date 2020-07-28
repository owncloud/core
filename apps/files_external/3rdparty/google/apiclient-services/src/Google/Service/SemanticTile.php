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
class Google_Service_SemanticTile extends Google_Service
{


  public $featuretiles;
  public $terraintiles;
  
  /**
   * Constructs the internal representation of the SemanticTile service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://vectortile.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'vectortile';

    $this->featuretiles = new Google_Service_SemanticTile_Resource_Featuretiles(
        $this,
        $this->serviceName,
        'featuretiles',
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
                'enablePrivateRoads' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'enableDetailedHighwayTypes' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'clientInfo.applicationVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientInfo.operatingSystem' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientInfo.applicationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientInfo.deviceModel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientTileVersionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientInfo.platform' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'enableFeatureNames' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'enableUnclippedBuildings' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'clientInfo.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'languageCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'enablePoliticalFeatures' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'clientInfo.apiClient' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'enableModeledVolumes' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'regionCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->terraintiles = new Google_Service_SemanticTile_Resource_Terraintiles(
        $this,
        $this->serviceName,
        'terraintiles',
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
                'clientInfo.userId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientInfo.applicationVersion' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxElevationResolutionCells' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'clientInfo.apiClient' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientInfo.platform' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'altitudePrecisionCentimeters' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'terrainFormats' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'clientInfo.applicationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientInfo.operatingSystem' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'clientInfo.deviceModel' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'minElevationResolutionCells' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
  }
}
