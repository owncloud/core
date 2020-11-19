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
class Google_Service_DoubleClickBidManager extends Google_Service
{
  /** View and manage your reports in DoubleClick Bid Manager. */
  const DOUBLECLICKBIDMANAGER =
      "https://www.googleapis.com/auth/doubleclickbidmanager";

  public $lineitems;
  public $queries;
  public $reports;
  public $sdf;
  
  /**
   * Constructs the internal representation of the DoubleClickBidManager
   * service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://doubleclickbidmanager.googleapis.com/';
    $this->servicePath = 'doubleclickbidmanager/v1.1/';
    $this->batchPath = 'batch';
    $this->version = 'v1.1';
    $this->serviceName = 'doubleclickbidmanager';

    $this->lineitems = new Google_Service_DoubleClickBidManager_Resource_Lineitems(
        $this,
        $this->serviceName,
        'lineitems',
        array(
          'methods' => array(
            'downloadlineitems' => array(
              'path' => 'lineitems/downloadlineitems',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'uploadlineitems' => array(
              'path' => 'lineitems/uploadlineitems',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->queries = new Google_Service_DoubleClickBidManager_Resource_Queries(
        $this,
        $this->serviceName,
        'queries',
        array(
          'methods' => array(
            'createquery' => array(
              'path' => 'query',
              'httpMethod' => 'POST',
              'parameters' => array(
                'asynchronous' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'deletequery' => array(
              'path' => 'query/{queryId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'queryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getquery' => array(
              'path' => 'query/{queryId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'queryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'listqueries' => array(
              'path' => 'queries',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'runquery' => array(
              'path' => 'query/{queryId}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'queryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'asynchronous' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->reports = new Google_Service_DoubleClickBidManager_Resource_Reports(
        $this,
        $this->serviceName,
        'reports',
        array(
          'methods' => array(
            'listreports' => array(
              'path' => 'queries/{queryId}/reports',
              'httpMethod' => 'GET',
              'parameters' => array(
                'queryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ),
          )
        )
    );
    $this->sdf = new Google_Service_DoubleClickBidManager_Resource_Sdf(
        $this,
        $this->serviceName,
        'sdf',
        array(
          'methods' => array(
            'download' => array(
              'path' => 'sdf/download',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
