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
 * Service definition for Localservices (v1).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://ads.google.com/local-services-ads/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Localservices extends Google_Service
{


  public $accountReports;
  public $detailedLeadReports;
  
  /**
   * Constructs the internal representation of the Localservices service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://localservices.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'localservices';

    $this->accountReports = new Google_Service_Localservices_Resource_AccountReports(
        $this,
        $this->serviceName,
        'accountReports',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1/accountReports:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'startDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->detailedLeadReports = new Google_Service_Localservices_Resource_DetailedLeadReports(
        $this,
        $this->serviceName,
        'detailedLeadReports',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1/detailedLeadReports:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'startDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}
