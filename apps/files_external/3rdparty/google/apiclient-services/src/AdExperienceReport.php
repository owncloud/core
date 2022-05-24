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
 * Service definition for AdExperienceReport (v1).
 *
 * <p>
 * Views Ad Experience Report data, and gets a list of sites that have a
 * significant number of annoying ads.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/ad-experience-report/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class AdExperienceReport extends \Google\Service
{


  public $sites;
  public $violatingSites;

  /**
   * Constructs the internal representation of the AdExperienceReport service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://adexperiencereport.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'adexperiencereport';

    $this->sites = new AdExperienceReport\Resource\Sites(
        $this,
        $this->serviceName,
        'sites',
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
            ],
          ]
        ]
    );
    $this->violatingSites = new AdExperienceReport\Resource\ViolatingSites(
        $this,
        $this->serviceName,
        'violatingSites',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/violatingSites',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdExperienceReport::class, 'Google_Service_AdExperienceReport');
