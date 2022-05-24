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
 * Service definition for AdSenseHost (v4.1).
 *
 * <p>
 * Generates performance reports, generates ad codes, and provides publisher
 * management capabilities for AdSense Hosts.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/adsense/host/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class AdSenseHost extends \Google\Service
{
  /** View and manage your AdSense host data and associated accounts. */
  const ADSENSEHOST =
      "https://www.googleapis.com/auth/adsensehost";

  public $accounts;
  public $accounts_adclients;
  public $accounts_adunits;
  public $accounts_reports;
  public $adclients;
  public $associationsessions;
  public $customchannels;
  public $reports;
  public $urlchannels;

  /**
   * Constructs the internal representation of the AdSenseHost service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = 'adsensehost/v4.1/';
    $this->batchPath = 'batch/adsensehost/v4.1';
    $this->version = 'v4.1';
    $this->serviceName = 'adsensehost';

    $this->accounts = new AdSenseHost\Resource\Accounts(
        $this,
        $this->serviceName,
        'accounts',
        [
          'methods' => [
            'get' => [
              'path' => 'accounts/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'accounts',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterAdClientId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_adclients = new AdSenseHost\Resource\AccountsAdclients(
        $this,
        $this->serviceName,
        'adclients',
        [
          'methods' => [
            'get' => [
              'path' => 'accounts/{accountId}/adclients/{adClientId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'accounts/{accountId}/adclients',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
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
    $this->accounts_adunits = new AdSenseHost\Resource\AccountsAdunits(
        $this,
        $this->serviceName,
        'adunits',
        [
          'methods' => [
            'delete' => [
              'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits/{adUnitId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adUnitId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits/{adUnitId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adUnitId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getAdCode' => [
              'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits/{adUnitId}/adcode',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adUnitId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'hostCustomChannelId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeInactive' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adUnitId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_reports = new AdSenseHost\Resource\AccountsReports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'generate' => [
              'path' => 'accounts/{accountId}/reports',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'startDate' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'endDate' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'dimension' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'metric' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'sort' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'startIndex' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->adclients = new AdSenseHost\Resource\Adclients(
        $this,
        $this->serviceName,
        'adclients',
        [
          'methods' => [
            'get' => [
              'path' => 'adclients/{adClientId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'adclients',
              'httpMethod' => 'GET',
              'parameters' => [
                'maxResults' => [
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
    $this->associationsessions = new AdSenseHost\Resource\Associationsessions(
        $this,
        $this->serviceName,
        'associationsessions',
        [
          'methods' => [
            'start' => [
              'path' => 'associationsessions/start',
              'httpMethod' => 'GET',
              'parameters' => [
                'productCode' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                  'required' => true,
                ],
                'websiteUrl' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'callbackUrl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userLocale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'websiteLocale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'verify' => [
              'path' => 'associationsessions/verify',
              'httpMethod' => 'GET',
              'parameters' => [
                'token' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->customchannels = new AdSenseHost\Resource\Customchannels(
        $this,
        $this->serviceName,
        'customchannels',
        [
          'methods' => [
            'delete' => [
              'path' => 'adclients/{adClientId}/customchannels/{customChannelId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customChannelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'adclients/{adClientId}/customchannels/{customChannelId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customChannelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'adclients/{adClientId}/customchannels',
              'httpMethod' => 'POST',
              'parameters' => [
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'adclients/{adClientId}/customchannels',
              'httpMethod' => 'GET',
              'parameters' => [
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'adclients/{adClientId}/customchannels',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customChannelId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'adclients/{adClientId}/customchannels',
              'httpMethod' => 'PUT',
              'parameters' => [
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->reports = new AdSenseHost\Resource\Reports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'generate' => [
              'path' => 'reports',
              'httpMethod' => 'GET',
              'parameters' => [
                'startDate' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'endDate' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'dimension' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'metric' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'sort' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'startIndex' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->urlchannels = new AdSenseHost\Resource\Urlchannels(
        $this,
        $this->serviceName,
        'urlchannels',
        [
          'methods' => [
            'delete' => [
              'path' => 'adclients/{adClientId}/urlchannels/{urlChannelId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'urlChannelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'adclients/{adClientId}/urlchannels',
              'httpMethod' => 'POST',
              'parameters' => [
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'adclients/{adClientId}/urlchannels',
              'httpMethod' => 'GET',
              'parameters' => [
                'adClientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
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
class_alias(AdSenseHost::class, 'Google_Service_AdSenseHost');
