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
class Google_Service_PolyService extends Google_Service
{


  public $assets;
  public $users_assets;
  public $users_likedassets;
  
  /**
   * Constructs the internal representation of the PolyService service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://poly.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'poly';

    $this->assets = new Google_Service_PolyService_Resource_Assets(
        $this,
        $this->serviceName,
        'assets',
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
              'path' => 'v1/assets',
              'httpMethod' => 'GET',
              'parameters' => array(
                'format' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'category' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'curated' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'keywords' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxComplexity' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->users_assets = new Google_Service_PolyService_Resource_UsersAssets(
        $this,
        $this->serviceName,
        'assets',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+name}/assets',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'format' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'visibility' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
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
    $this->users_likedassets = new Google_Service_PolyService_Resource_UsersLikedassets(
        $this,
        $this->serviceName,
        'likedassets',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+name}/likedassets',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'format' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
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
