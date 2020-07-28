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
 * Service definition for AdMob (v1).
 *
 * <p>
 * The Google AdMob API lets you programmatically get reports on earnings.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/admob/api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AdMob extends Google_Service
{


  public $accounts;
  public $accounts_mediationReport;
  public $accounts_networkReport;
  
  /**
   * Constructs the internal representation of the AdMob service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://admob.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'admob';

    $this->accounts = new Google_Service_AdMob_Resource_Accounts(
        $this,
        $this->serviceName,
        'accounts',
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
            ),'list' => array(
              'path' => 'v1/accounts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_mediationReport = new Google_Service_AdMob_Resource_AccountsMediationReport(
        $this,
        $this->serviceName,
        'mediationReport',
        array(
          'methods' => array(
            'generate' => array(
              'path' => 'v1/{+parent}/mediationReport:generate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_networkReport = new Google_Service_AdMob_Resource_AccountsNetworkReport(
        $this,
        $this->serviceName,
        'networkReport',
        array(
          'methods' => array(
            'generate' => array(
              'path' => 'v1/{+parent}/networkReport:generate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
