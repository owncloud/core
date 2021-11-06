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
 * Service definition for CivicInfo (v2).
 *
 * <p>
 * Provides polling places, early vote locations, contest data, election
 * officials, and government representatives for U.S. residential addresses.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/civic-information/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class CivicInfo extends \Google\Service
{


  public $divisions;
  public $elections;
  public $representatives;

  /**
   * Constructs the internal representation of the CivicInfo service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://civicinfo.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'civicinfo';

    $this->divisions = new CivicInfo\Resource\Divisions(
        $this,
        $this->serviceName,
        'divisions',
        [
          'methods' => [
            'search' => [
              'path' => 'civicinfo/v2/divisions',
              'httpMethod' => 'GET',
              'parameters' => [
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->elections = new CivicInfo\Resource\Elections(
        $this,
        $this->serviceName,
        'elections',
        [
          'methods' => [
            'electionQuery' => [
              'path' => 'civicinfo/v2/elections',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'voterInfoQuery' => [
              'path' => 'civicinfo/v2/voterinfo',
              'httpMethod' => 'GET',
              'parameters' => [
                'address' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'electionId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'officialOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'returnAllAvailableData' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->representatives = new CivicInfo\Resource\Representatives(
        $this,
        $this->serviceName,
        'representatives',
        [
          'methods' => [
            'representativeInfoByAddress' => [
              'path' => 'civicinfo/v2/representatives',
              'httpMethod' => 'GET',
              'parameters' => [
                'address' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeOffices' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'levels' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'roles' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'representativeInfoByDivision' => [
              'path' => 'civicinfo/v2/representatives/{ocdId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'ocdId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'levels' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'recursive' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'roles' => [
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
class_alias(CivicInfo::class, 'Google_Service_CivicInfo');
