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
 * Service definition for PlayableLocations (v3).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/maps/contact-sales/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_PlayableLocations extends Google_Service
{


  public $v3;

  /**
   * Constructs the internal representation of the PlayableLocations service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://playablelocations.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v3';
    $this->serviceName = 'playablelocations';

    $this->v3 = new Google_Service_PlayableLocations_Resource_V3(
        $this,
        $this->serviceName,
        'v3',
        array(
          'methods' => array(
            'logImpressions' => array(
              'path' => 'v3:logImpressions',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'logPlayerReports' => array(
              'path' => 'v3:logPlayerReports',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'samplePlayableLocations' => array(
              'path' => 'v3:samplePlayableLocations',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
