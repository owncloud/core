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
 * Service definition for DoubleClickBidManager (v1.1).
 *
 * <p>
 * DoubleClick Bid Manager API allows users to manage and create campaigns and
 * reports.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/bid-manager/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class DoubleClickBidManager extends \Google\Service
{
  /** View and manage your reports in DoubleClick Bid Manager. */
  const DOUBLECLICKBIDMANAGER =
      "https://www.googleapis.com/auth/doubleclickbidmanager";

  public $queries;
  public $reports;

  /**
   * Constructs the internal representation of the DoubleClickBidManager
   * service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://doubleclickbidmanager.googleapis.com/';
    $this->servicePath = 'doubleclickbidmanager/v1.1/';
    $this->batchPath = 'batch';
    $this->version = 'v1.1';
    $this->serviceName = 'doubleclickbidmanager';

    $this->queries = new DoubleClickBidManager\Resource\Queries(
        $this,
        $this->serviceName,
        'queries',
        [
          'methods' => [
            'createquery' => [
              'path' => 'query',
              'httpMethod' => 'POST',
              'parameters' => [
                'asynchronous' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'deletequery' => [
              'path' => 'query/{queryId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'queryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getquery' => [
              'path' => 'query/{queryId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'queryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'listqueries' => [
              'path' => 'queries',
              'httpMethod' => 'GET',
              'parameters' => [
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'runquery' => [
              'path' => 'query/{queryId}',
              'httpMethod' => 'POST',
              'parameters' => [
                'queryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'asynchronous' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->reports = new DoubleClickBidManager\Resource\Reports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'listreports' => [
              'path' => 'queries/{queryId}/reports',
              'httpMethod' => 'GET',
              'parameters' => [
                'queryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
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
class_alias(DoubleClickBidManager::class, 'Google_Service_DoubleClickBidManager');
