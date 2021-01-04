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
class Google_Service_CivicInfo extends Google_Service
{


  public $divisions;
  public $elections;
  public $representatives;

  /**
   * Constructs the internal representation of the CivicInfo service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://civicinfo.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'civicinfo';

    $this->divisions = new Google_Service_CivicInfo_Resource_Divisions(
        $this,
        $this->serviceName,
        'divisions',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'civicinfo/v2/divisions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->elections = new Google_Service_CivicInfo_Resource_Elections(
        $this,
        $this->serviceName,
        'elections',
        array(
          'methods' => array(
            'electionQuery' => array(
              'path' => 'civicinfo/v2/elections',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'voterInfoQuery' => array(
              'path' => 'civicinfo/v2/voterinfo',
              'httpMethod' => 'GET',
              'parameters' => array(
                'address' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'electionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'officialOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'returnAllAvailableData' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->representatives = new Google_Service_CivicInfo_Resource_Representatives(
        $this,
        $this->serviceName,
        'representatives',
        array(
          'methods' => array(
            'representativeInfoByAddress' => array(
              'path' => 'civicinfo/v2/representatives',
              'httpMethod' => 'GET',
              'parameters' => array(
                'address' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'includeOffices' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'levels' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'roles' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'representativeInfoByDivision' => array(
              'path' => 'civicinfo/v2/representatives/{ocdId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'ocdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'levels' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'recursive' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'roles' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
