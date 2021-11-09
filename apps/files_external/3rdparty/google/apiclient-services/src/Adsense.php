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
 * Service definition for Adsense (v2).
 *
 * <p>
 * The AdSense Management API allows publishers to access their inventory and
 * run earnings and performance reports.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/adsense/management/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Adsense extends \Google\Service
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
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://adsense.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'adsense';

    $this->accounts = new Adsense\Resource\Accounts(
        $this,
        $this->serviceName,
        'accounts',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/accounts',
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
            ],'listChildAccounts' => [
              'path' => 'v2/{+parent}:listChildAccounts',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
    $this->accounts_adclients = new Adsense\Resource\AccountsAdclients(
        $this,
        $this->serviceName,
        'adclients',
        [
          'methods' => [
            'getAdcode' => [
              'path' => 'v2/{+name}/adcode',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/{+parent}/adclients',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
    $this->accounts_adclients_adunits = new Adsense\Resource\AccountsAdclientsAdunits(
        $this,
        $this->serviceName,
        'adunits',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getAdcode' => [
              'path' => 'v2/{+name}/adcode',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/{+parent}/adunits',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
            ],'listLinkedCustomChannels' => [
              'path' => 'v2/{+parent}:listLinkedCustomChannels',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
    $this->accounts_adclients_customchannels = new Adsense\Resource\AccountsAdclientsCustomchannels(
        $this,
        $this->serviceName,
        'customchannels',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/{+parent}/customchannels',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
            ],'listLinkedAdUnits' => [
              'path' => 'v2/{+parent}:listLinkedAdUnits',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
    $this->accounts_adclients_urlchannels = new Adsense\Resource\AccountsAdclientsUrlchannels(
        $this,
        $this->serviceName,
        'urlchannels',
        [
          'methods' => [
            'list' => [
              'path' => 'v2/{+parent}/urlchannels',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
    $this->accounts_alerts = new Adsense\Resource\AccountsAlerts(
        $this,
        $this->serviceName,
        'alerts',
        [
          'methods' => [
            'list' => [
              'path' => 'v2/{+parent}/alerts',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'languageCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_payments = new Adsense\Resource\AccountsPayments(
        $this,
        $this->serviceName,
        'payments',
        [
          'methods' => [
            'list' => [
              'path' => 'v2/{+parent}/payments',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_reports = new Adsense\Resource\AccountsReports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'generate' => [
              'path' => 'v2/{+account}/reports:generate',
              'httpMethod' => 'GET',
              'parameters' => [
                'account' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'currencyCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dateRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dimensions' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'endDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'endDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'endDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'filters' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'languageCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'metrics' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'reportingTimeZone' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'generateCsv' => [
              'path' => 'v2/{+account}/reports:generateCsv',
              'httpMethod' => 'GET',
              'parameters' => [
                'account' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'currencyCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dateRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dimensions' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'endDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'endDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'endDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'filters' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'languageCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'metrics' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'reportingTimeZone' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_reports_saved = new Adsense\Resource\AccountsReportsSaved(
        $this,
        $this->serviceName,
        'saved',
        [
          'methods' => [
            'generate' => [
              'path' => 'v2/{+name}/saved:generate',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'currencyCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dateRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'endDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'endDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'endDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'languageCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'reportingTimeZone' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'generateCsv' => [
              'path' => 'v2/{+name}/saved:generateCsv',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'currencyCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dateRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'endDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'endDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'endDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'languageCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'reportingTimeZone' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'list' => [
              'path' => 'v2/{+parent}/reports/saved',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
    $this->accounts_sites = new Adsense\Resource\AccountsSites(
        $this,
        $this->serviceName,
        'sites',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2/{+parent}/sites',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
class_alias(Adsense::class, 'Google_Service_Adsense');
