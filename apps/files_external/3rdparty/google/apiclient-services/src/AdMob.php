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
 * Service definition for AdMob (v1).
 *
 * <p>
 * The AdMob API allows publishers to programmatically get information about
 * their AdMob account.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/admob/api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class AdMob extends \Google\Service
{
  /** See your AdMob data. */
  const ADMOB_READONLY =
      "https://www.googleapis.com/auth/admob.readonly";
  /** See your AdMob data. */
  const ADMOB_REPORT =
      "https://www.googleapis.com/auth/admob.report";

  public $accounts;
  public $accounts_adUnits;
  public $accounts_apps;
  public $accounts_mediationReport;
  public $accounts_networkReport;

  /**
   * Constructs the internal representation of the AdMob service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://admob.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'admob';

    $this->accounts = new AdMob\Resource\Accounts(
        $this,
        $this->serviceName,
        'accounts',
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
            ],'list' => [
              'path' => 'v1/accounts',
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
            ],
          ]
        ]
    );
    $this->accounts_adUnits = new AdMob\Resource\AccountsAdUnits(
        $this,
        $this->serviceName,
        'adUnits',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/adUnits',
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
    $this->accounts_apps = new AdMob\Resource\AccountsApps(
        $this,
        $this->serviceName,
        'apps',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/apps',
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
    $this->accounts_mediationReport = new AdMob\Resource\AccountsMediationReport(
        $this,
        $this->serviceName,
        'mediationReport',
        [
          'methods' => [
            'generate' => [
              'path' => 'v1/{+parent}/mediationReport:generate',
              'httpMethod' => 'POST',
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
    $this->accounts_networkReport = new AdMob\Resource\AccountsNetworkReport(
        $this,
        $this->serviceName,
        'networkReport',
        [
          'methods' => [
            'generate' => [
              'path' => 'v1/{+parent}/networkReport:generate',
              'httpMethod' => 'POST',
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
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdMob::class, 'Google_Service_AdMob');
