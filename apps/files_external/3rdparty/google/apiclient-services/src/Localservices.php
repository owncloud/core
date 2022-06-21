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
class Localservices extends \Google\Service
{
  /** See, edit, create, and delete your Google Ads accounts and data.. */
  const ADWORDS =
      "https://www.googleapis.com/auth/adwords";

  public $accountReports;
  public $detailedLeadReports;

  /**
   * Constructs the internal representation of the Localservices service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://localservices.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'localservices';

    $this->accountReports = new Localservices\Resource\AccountReports(
        $this,
        $this->serviceName,
        'accountReports',
        [
          'methods' => [
            'search' => [
              'path' => 'v1/accountReports:search',
              'httpMethod' => 'GET',
              'parameters' => [
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
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'query' => [
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
    $this->detailedLeadReports = new Localservices\Resource\DetailedLeadReports(
        $this,
        $this->serviceName,
        'detailedLeadReports',
        [
          'methods' => [
            'search' => [
              'path' => 'v1/detailedLeadReports:search',
              'httpMethod' => 'GET',
              'parameters' => [
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
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'query' => [
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
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Localservices::class, 'Google_Service_Localservices');
