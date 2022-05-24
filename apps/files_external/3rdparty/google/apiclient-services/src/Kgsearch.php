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
 * Service definition for Kgsearch (v1).
 *
 * <p>
 * Searches the Google Knowledge Graph for entities.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/knowledge-graph/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Kgsearch extends \Google\Service
{


  public $entities;

  /**
   * Constructs the internal representation of the Kgsearch service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://kgsearch.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'kgsearch';

    $this->entities = new Kgsearch\Resource\Entities(
        $this,
        $this->serviceName,
        'entities',
        [
          'methods' => [
            'search' => [
              'path' => 'v1/entities:search',
              'httpMethod' => 'GET',
              'parameters' => [
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'indent' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'languages' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'prefix' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'types' => [
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
class_alias(Kgsearch::class, 'Google_Service_Kgsearch');
