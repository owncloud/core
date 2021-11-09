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
 * Service definition for CloudSearch (v1).
 *
 * <p>
 * Cloud Search provides cloud-based search capabilities over Google Workspace
 * data. The Cloud Search API allows indexing of non-Google Workspace data into
 * Cloud Search.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/cloud-search/docs/guides/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class CloudSearch extends \Google\Service
{
  /** Index and serve your organization's data with Cloud Search. */
  const CLOUD_SEARCH =
      "https://www.googleapis.com/auth/cloud_search";
  /** Index and serve your organization's data with Cloud Search. */
  const CLOUD_SEARCH_DEBUG =
      "https://www.googleapis.com/auth/cloud_search.debug";
  /** Index and serve your organization's data with Cloud Search. */
  const CLOUD_SEARCH_INDEXING =
      "https://www.googleapis.com/auth/cloud_search.indexing";
  /** Search your organization's data in the Cloud Search index. */
  const CLOUD_SEARCH_QUERY =
      "https://www.googleapis.com/auth/cloud_search.query";
  /** Index and serve your organization's data with Cloud Search. */
  const CLOUD_SEARCH_SETTINGS =
      "https://www.googleapis.com/auth/cloud_search.settings";
  /** Index and serve your organization's data with Cloud Search. */
  const CLOUD_SEARCH_SETTINGS_INDEXING =
      "https://www.googleapis.com/auth/cloud_search.settings.indexing";
  /** Index and serve your organization's data with Cloud Search. */
  const CLOUD_SEARCH_SETTINGS_QUERY =
      "https://www.googleapis.com/auth/cloud_search.settings.query";
  /** Index and serve your organization's data with Cloud Search. */
  const CLOUD_SEARCH_STATS =
      "https://www.googleapis.com/auth/cloud_search.stats";
  /** Index and serve your organization's data with Cloud Search. */
  const CLOUD_SEARCH_STATS_INDEXING =
      "https://www.googleapis.com/auth/cloud_search.stats.indexing";

  public $debug_datasources_items;
  public $debug_datasources_items_unmappedids;
  public $debug_identitysources_items;
  public $debug_identitysources_unmappedids;
  public $indexing_datasources;
  public $indexing_datasources_items;
  public $media;
  public $operations;
  public $operations_lro;
  public $query;
  public $query_sources;
  public $settings;
  public $settings_datasources;
  public $settings_searchapplications;
  public $stats;
  public $stats_index_datasources;
  public $stats_query_searchapplications;
  public $stats_session_searchapplications;
  public $stats_user_searchapplications;
  public $v1;

  /**
   * Constructs the internal representation of the CloudSearch service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://cloudsearch.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'cloudsearch';

    $this->debug_datasources_items = new CloudSearch\Resource\DebugDatasourcesItems(
        $this,
        $this->serviceName,
        'items',
        [
          'methods' => [
            'checkAccess' => [
              'path' => 'v1/debug/{+name}:checkAccess',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'searchByViewUrl' => [
              'path' => 'v1/debug/{+name}/items:searchByViewUrl',
              'httpMethod' => 'POST',
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
    $this->debug_datasources_items_unmappedids = new CloudSearch\Resource\DebugDatasourcesItemsUnmappedids(
        $this,
        $this->serviceName,
        'unmappedids',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/debug/{+parent}/unmappedids',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
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
    $this->debug_identitysources_items = new CloudSearch\Resource\DebugIdentitysourcesItems(
        $this,
        $this->serviceName,
        'items',
        [
          'methods' => [
            'listForunmappedidentity' => [
              'path' => 'v1/debug/{+parent}/items:forunmappedidentity',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'groupResourceName' => [
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
                'userResourceName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->debug_identitysources_unmappedids = new CloudSearch\Resource\DebugIdentitysourcesUnmappedids(
        $this,
        $this->serviceName,
        'unmappedids',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/debug/{+parent}/unmappedids',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'resolutionStatusCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->indexing_datasources = new CloudSearch\Resource\IndexingDatasources(
        $this,
        $this->serviceName,
        'datasources',
        [
          'methods' => [
            'deleteSchema' => [
              'path' => 'v1/indexing/{+name}/schema',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'getSchema' => [
              'path' => 'v1/indexing/{+name}/schema',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'updateSchema' => [
              'path' => 'v1/indexing/{+name}/schema',
              'httpMethod' => 'PUT',
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
    $this->indexing_datasources_items = new CloudSearch\Resource\IndexingDatasourcesItems(
        $this,
        $this->serviceName,
        'items',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/indexing/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'connectorName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'mode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'version' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deleteQueueItems' => [
              'path' => 'v1/indexing/{+name}/items:deleteQueueItems',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/indexing/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'connectorName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'index' => [
              'path' => 'v1/indexing/{+name}:index',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/indexing/{+name}/items',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'brief' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'connectorName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
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
            ],'poll' => [
              'path' => 'v1/indexing/{+name}/items:poll',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'push' => [
              'path' => 'v1/indexing/{+name}:push',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'unreserve' => [
              'path' => 'v1/indexing/{+name}/items:unreserve',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'upload' => [
              'path' => 'v1/indexing/{+name}:upload',
              'httpMethod' => 'POST',
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
    $this->media = new CloudSearch\Resource\Media(
        $this,
        $this->serviceName,
        'media',
        [
          'methods' => [
            'upload' => [
              'path' => 'v1/media/{+resourceName}',
              'httpMethod' => 'POST',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->operations = new CloudSearch\Resource\Operations(
        $this,
        $this->serviceName,
        'operations',
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
    $this->operations_lro = new CloudSearch\Resource\OperationsLro(
        $this,
        $this->serviceName,
        'lro',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+name}/lro',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
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
    $this->query = new CloudSearch\Resource\Query(
        $this,
        $this->serviceName,
        'query',
        [
          'methods' => [
            'search' => [
              'path' => 'v1/query/search',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'suggest' => [
              'path' => 'v1/query/suggest',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->query_sources = new CloudSearch\Resource\QuerySources(
        $this,
        $this->serviceName,
        'sources',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/query/sources',
              'httpMethod' => 'GET',
              'parameters' => [
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestOptions.debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'requestOptions.languageCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestOptions.searchApplicationId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestOptions.timeZone' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->settings = new CloudSearch\Resource\Settings(
        $this,
        $this->serviceName,
        'settings',
        [
          'methods' => [
            'getCustomer' => [
              'path' => 'v1/settings/customer',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'updateCustomer' => [
              'path' => 'v1/settings/customer',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->settings_datasources = new CloudSearch\Resource\SettingsDatasources(
        $this,
        $this->serviceName,
        'datasources',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/settings/datasources',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'v1/settings/datasources',
              'httpMethod' => 'GET',
              'parameters' => [
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
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
            ],'update' => [
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'PUT',
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
    $this->settings_searchapplications = new CloudSearch\Resource\SettingsSearchapplications(
        $this,
        $this->serviceName,
        'searchapplications',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/settings/searchapplications',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'v1/settings/searchapplications',
              'httpMethod' => 'GET',
              'parameters' => [
                'debugOptions.enableDebugging' => [
                  'location' => 'query',
                  'type' => 'boolean',
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
            ],'reset' => [
              'path' => 'v1/settings/{+name}:reset',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'PUT',
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
    $this->stats = new CloudSearch\Resource\Stats(
        $this,
        $this->serviceName,
        'stats',
        [
          'methods' => [
            'getIndex' => [
              'path' => 'v1/stats/index',
              'httpMethod' => 'GET',
              'parameters' => [
                'fromDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'getQuery' => [
              'path' => 'v1/stats/query',
              'httpMethod' => 'GET',
              'parameters' => [
                'fromDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'getSession' => [
              'path' => 'v1/stats/session',
              'httpMethod' => 'GET',
              'parameters' => [
                'fromDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'getUser' => [
              'path' => 'v1/stats/user',
              'httpMethod' => 'GET',
              'parameters' => [
                'fromDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->stats_index_datasources = new CloudSearch\Resource\StatsIndexDatasources(
        $this,
        $this->serviceName,
        'datasources',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/stats/index/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fromDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->stats_query_searchapplications = new CloudSearch\Resource\StatsQuerySearchapplications(
        $this,
        $this->serviceName,
        'searchapplications',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/stats/query/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fromDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->stats_session_searchapplications = new CloudSearch\Resource\StatsSessionSearchapplications(
        $this,
        $this->serviceName,
        'searchapplications',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/stats/session/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fromDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->stats_user_searchapplications = new CloudSearch\Resource\StatsUserSearchapplications(
        $this,
        $this->serviceName,
        'searchapplications',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/stats/user/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fromDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'fromDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'toDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->v1 = new CloudSearch\Resource\V1(
        $this,
        $this->serviceName,
        'v1',
        [
          'methods' => [
            'initializeCustomer' => [
              'path' => 'v1:initializeCustomer',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudSearch::class, 'Google_Service_CloudSearch');
