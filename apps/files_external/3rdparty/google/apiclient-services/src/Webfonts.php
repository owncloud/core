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
 * Service definition for Webfonts (v1).
 *
 * <p>
 * The Google Web Fonts Developer API lets you retrieve information about web
 * fonts served by Google.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/fonts/docs/developer_api" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Webfonts extends \Google\Service
{


  public $webfonts;

  /**
   * Constructs the internal representation of the Webfonts service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://webfonts.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'webfonts';

    $this->webfonts = new Webfonts\Resource\Webfonts(
        $this,
        $this->serviceName,
        'webfonts',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/webfonts',
              'httpMethod' => 'GET',
              'parameters' => [
                'sort' => [
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
class_alias(Webfonts::class, 'Google_Service_Webfonts');
