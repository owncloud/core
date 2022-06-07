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
 * Service definition for DoubleClickBidManager (v2).
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
  public $queries_reports;

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
    $this->servicePath = 'v2/';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'doubleclickbidmanager';

    $this->queries = new DoubleClickBidManager\Resource\Queries(
        $this,
        $this->serviceName,
        'queries',
        [
          'methods' => [
            'create' => [
              'path' => 'queries',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => 'queries/{queryId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'queryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'queries/{queryId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'queryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'queries',
              'httpMethod' => 'GET',
              'parameters' => [
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
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
            ],'run' => [
              'path' => 'queries/{queryId}:run',
              'httpMethod' => 'POST',
              'parameters' => [
                'queryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'synchronous' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->queries_reports = new DoubleClickBidManager\Resource\QueriesReports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'get' => [
              'path' => 'queries/{queryId}/reports/{reportId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'queryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'queries/{queryId}/reports',
              'httpMethod' => 'GET',
              'parameters' => [
                'queryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
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
