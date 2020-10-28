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
 * Service definition for CloudSearch (v1).
 *
 * <p>
 * Cloud Search provides cloud-based search capabilities over G Suite data. The
 * Cloud Search API allows indexing of non-G Suite data into Cloud Search.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/cloud-search/docs/guides/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CloudSearch extends Google_Service
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
  public $settings_datasources;
  public $settings_searchapplications;
  public $stats;
  public $stats_index_datasources;
  public $stats_query_searchapplications;
  public $stats_session_searchapplications;
  public $stats_user_searchapplications;
  
  /**
   * Constructs the internal representation of the CloudSearch service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://cloudsearch.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'cloudsearch';

    $this->debug_datasources_items = new Google_Service_CloudSearch_Resource_DebugDatasourcesItems(
        $this,
        $this->serviceName,
        'items',
        array(
          'methods' => array(
            'checkAccess' => array(
              'path' => 'v1/debug/{+name}:checkAccess',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'searchByViewUrl' => array(
              'path' => 'v1/debug/{+name}/items:searchByViewUrl',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->debug_datasources_items_unmappedids = new Google_Service_CloudSearch_Resource_DebugDatasourcesItemsUnmappedids(
        $this,
        $this->serviceName,
        'unmappedids',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/debug/{+parent}/unmappedids',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->debug_identitysources_items = new Google_Service_CloudSearch_Resource_DebugIdentitysourcesItems(
        $this,
        $this->serviceName,
        'items',
        array(
          'methods' => array(
            'listForunmappedidentity' => array(
              'path' => 'v1/debug/{+parent}/items:forunmappedidentity',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'groupResourceName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userResourceName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->debug_identitysources_unmappedids = new Google_Service_CloudSearch_Resource_DebugIdentitysourcesUnmappedids(
        $this,
        $this->serviceName,
        'unmappedids',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/debug/{+parent}/unmappedids',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'resolutionStatusCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->indexing_datasources = new Google_Service_CloudSearch_Resource_IndexingDatasources(
        $this,
        $this->serviceName,
        'datasources',
        array(
          'methods' => array(
            'deleteSchema' => array(
              'path' => 'v1/indexing/{+name}/schema',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'getSchema' => array(
              'path' => 'v1/indexing/{+name}/schema',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'updateSchema' => array(
              'path' => 'v1/indexing/{+name}/schema',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->indexing_datasources_items = new Google_Service_CloudSearch_Resource_IndexingDatasourcesItems(
        $this,
        $this->serviceName,
        'items',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'v1/indexing/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'connectorName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'mode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'version' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'deleteQueueItems' => array(
              'path' => 'v1/indexing/{+name}/items:deleteQueueItems',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/indexing/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'connectorName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'index' => array(
              'path' => 'v1/indexing/{+name}:index',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/indexing/{+name}/items',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'connectorName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'brief' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'poll' => array(
              'path' => 'v1/indexing/{+name}/items:poll',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'push' => array(
              'path' => 'v1/indexing/{+name}:push',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'unreserve' => array(
              'path' => 'v1/indexing/{+name}/items:unreserve',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'upload' => array(
              'path' => 'v1/indexing/{+name}:upload',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->media = new Google_Service_CloudSearch_Resource_Media(
        $this,
        $this->serviceName,
        'media',
        array(
          'methods' => array(
            'upload' => array(
              'path' => 'v1/media/{+resourceName}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resourceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->operations = new Google_Service_CloudSearch_Resource_Operations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->operations_lro = new Google_Service_CloudSearch_Resource_OperationsLro(
        $this,
        $this->serviceName,
        'lro',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+name}/lro',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->query = new Google_Service_CloudSearch_Resource_Query(
        $this,
        $this->serviceName,
        'query',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1/query/search',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'suggest' => array(
              'path' => 'v1/query/suggest',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->query_sources = new Google_Service_CloudSearch_Resource_QuerySources(
        $this,
        $this->serviceName,
        'sources',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/query/sources',
              'httpMethod' => 'GET',
              'parameters' => array(
                'requestOptions.debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestOptions.languageCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestOptions.searchApplicationId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'requestOptions.timeZone' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->settings_datasources = new Google_Service_CloudSearch_Resource_SettingsDatasources(
        $this,
        $this->serviceName,
        'datasources',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/settings/datasources',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'get' => array(
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/settings/datasources',
              'httpMethod' => 'GET',
              'parameters' => array(
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'update' => array(
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->settings_searchapplications = new Google_Service_CloudSearch_Resource_SettingsSearchapplications(
        $this,
        $this->serviceName,
        'searchapplications',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/settings/searchapplications',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'get' => array(
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/settings/searchapplications',
              'httpMethod' => 'GET',
              'parameters' => array(
                'debugOptions.enableDebugging' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'reset' => array(
              'path' => 'v1/settings/{+name}:reset',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'v1/settings/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->stats = new Google_Service_CloudSearch_Resource_Stats(
        $this,
        $this->serviceName,
        'stats',
        array(
          'methods' => array(
            'getIndex' => array(
              'path' => 'v1/stats/index',
              'httpMethod' => 'GET',
              'parameters' => array(
                'toDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'getQuery' => array(
              'path' => 'v1/stats/query',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fromDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'getSession' => array(
              'path' => 'v1/stats/session',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fromDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'getUser' => array(
              'path' => 'v1/stats/user',
              'httpMethod' => 'GET',
              'parameters' => array(
                'fromDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->stats_index_datasources = new Google_Service_CloudSearch_Resource_StatsIndexDatasources(
        $this,
        $this->serviceName,
        'datasources',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/stats/index/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'toDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->stats_query_searchapplications = new Google_Service_CloudSearch_Resource_StatsQuerySearchapplications(
        $this,
        $this->serviceName,
        'searchapplications',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/stats/query/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fromDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->stats_session_searchapplications = new Google_Service_CloudSearch_Resource_StatsSessionSearchapplications(
        $this,
        $this->serviceName,
        'searchapplications',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/stats/session/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'toDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->stats_user_searchapplications = new Google_Service_CloudSearch_Resource_StatsUserSearchapplications(
        $this,
        $this->serviceName,
        'searchapplications',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/stats/user/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'toDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'fromDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'toDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
  }
}
