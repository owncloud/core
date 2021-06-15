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
 * Service definition for Adsense (v2).
 *
 * <p>
 * The AdSense Management API allows publishers to access their inventory and
 * run earnings and performance reports.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://code.google.com/apis/adsense/management/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Adsense extends Google_Service
{
  /** View and manage your AdSense data. */
  const ADSENSE =
      "https://www.googleapis.com/auth/adsense";
  /** View your AdSense data. */
  const ADSENSE_READONLY =
      "https://www.googleapis.com/auth/adsense.readonly";

  public $accounts;
  public $accounts_adclients;
  public $accounts_adclients_adunits;
  public $accounts_adclients_customchannels;
  public $accounts_adclients_urlchannels;
  public $accounts_alerts;
  public $accounts_payments;
  public $accounts_reports;
  public $accounts_reports_saved;
  public $accounts_sites;

  /**
   * Constructs the internal representation of the Adsense service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://adsense.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'adsense';

    $this->accounts = new Google_Service_Adsense_Resource_Accounts(
        $this,
        $this->serviceName,
        'accounts',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2/accounts',
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
            ),'listChildAccounts' => array(
              'path' => 'v2/{+parent}:listChildAccounts',
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
              ),
            ),
          )
        )
    );
    $this->accounts_adclients = new Google_Service_Adsense_Resource_AccountsAdclients(
        $this,
        $this->serviceName,
        'adclients',
        array(
          'methods' => array(
            'getAdcode' => array(
              'path' => 'v2/{+name}/adcode',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2/{+parent}/adclients',
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
              ),
            ),
          )
        )
    );
    $this->accounts_adclients_adunits = new Google_Service_Adsense_Resource_AccountsAdclientsAdunits(
        $this,
        $this->serviceName,
        'adunits',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getAdcode' => array(
              'path' => 'v2/{+name}/adcode',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2/{+parent}/adunits',
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
              ),
            ),'listLinkedCustomChannels' => array(
              'path' => 'v2/{+parent}:listLinkedCustomChannels',
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
              ),
            ),
          )
        )
    );
    $this->accounts_adclients_customchannels = new Google_Service_Adsense_Resource_AccountsAdclientsCustomchannels(
        $this,
        $this->serviceName,
        'customchannels',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2/{+parent}/customchannels',
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
              ),
            ),'listLinkedAdUnits' => array(
              'path' => 'v2/{+parent}:listLinkedAdUnits',
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
              ),
            ),
          )
        )
    );
    $this->accounts_adclients_urlchannels = new Google_Service_Adsense_Resource_AccountsAdclientsUrlchannels(
        $this,
        $this->serviceName,
        'urlchannels',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/{+parent}/urlchannels',
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
              ),
            ),
          )
        )
    );
    $this->accounts_alerts = new Google_Service_Adsense_Resource_AccountsAlerts(
        $this,
        $this->serviceName,
        'alerts',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/{+parent}/alerts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'languageCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_payments = new Google_Service_Adsense_Resource_AccountsPayments(
        $this,
        $this->serviceName,
        'payments',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v2/{+parent}/payments',
              'httpMethod' => 'GET',
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
    $this->accounts_reports = new Google_Service_Adsense_Resource_AccountsReports(
        $this,
        $this->serviceName,
        'reports',
        array(
          'methods' => array(
            'generate' => array(
              'path' => 'v2/{+account}/reports:generate',
              'httpMethod' => 'GET',
              'parameters' => array(
                'account' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'currencyCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dateRange' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dimensions' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'endDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filters' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'languageCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'metrics' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'reportingTimeZone' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'generateCsv' => array(
              'path' => 'v2/{+account}/reports:generateCsv',
              'httpMethod' => 'GET',
              'parameters' => array(
                'account' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'currencyCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dateRange' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dimensions' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'endDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filters' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'languageCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'metrics' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'reportingTimeZone' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_reports_saved = new Google_Service_Adsense_Resource_AccountsReportsSaved(
        $this,
        $this->serviceName,
        'saved',
        array(
          'methods' => array(
            'generate' => array(
              'path' => 'v2/{+name}/saved:generate',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'currencyCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dateRange' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'endDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'languageCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'reportingTimeZone' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'generateCsv' => array(
              'path' => 'v2/{+name}/saved:generateCsv',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'currencyCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dateRange' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'endDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'endDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'languageCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'reportingTimeZone' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startDate.day' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.month' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startDate.year' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'list' => array(
              'path' => 'v2/{+parent}/reports/saved',
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
              ),
            ),
          )
        )
    );
    $this->accounts_sites = new Google_Service_Adsense_Resource_AccountsSites(
        $this,
        $this->serviceName,
        'sites',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v2/{+parent}/sites',
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
              ),
            ),
          )
        )
    );
  }
}
