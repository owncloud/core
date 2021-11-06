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
 * Service definition for AbusiveExperienceReport (v1).
 *
 * <p>
 * Views Abusive Experience Report data, and gets a list of sites that have a
 * significant number of abusive experiences.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/abusive-experience-report/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class AbusiveExperienceReport extends \Google\Service
{


  public $sites;
  public $violatingSites;

  /**
   * Constructs the internal representation of the AbusiveExperienceReport
   * service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://abusiveexperiencereport.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'abusiveexperiencereport';

    $this->sites = new AbusiveExperienceReport\Resource\Sites(
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
    $this->violatingSites = new AbusiveExperienceReport\Resource\ViolatingSites(
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
class_alias(AbusiveExperienceReport::class, 'Google_Service_AbusiveExperienceReport');
