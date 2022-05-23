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
 * Service definition for Doubleclicksearch (v2).
 *
 * <p>
 * The Search Ads 360 API allows developers to automate uploading conversions
 * and downloading reports from Search Ads 360.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/search-ads" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Doubleclicksearch extends \Google\Service
{
  /** View and manage your advertising data in DoubleClick Search. */
  const DOUBLECLICKSEARCH =
      "https://www.googleapis.com/auth/doubleclicksearch";

  public $conversion;
  public $reports;
  public $savedColumns;

  /**
   * Constructs the internal representation of the Doubleclicksearch service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://doubleclicksearch.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'doubleclicksearch';

    $this->conversion = new Doubleclicksearch\Resource\Conversion(
        $this,
        $this->serviceName,
        'conversion',
        [
          'methods' => [
            'get' => [
              'path' => 'doubleclicksearch/v2/agency/{agencyId}/advertiser/{advertiserId}/engine/{engineAccountId}/conversion',
              'httpMethod' => 'GET',
              'parameters' => [
                'agencyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'engineAccountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'endDate' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ],
                'rowCount' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ],
                'startDate' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ],
                'startRow' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'required' => true,
                ],
                'adGroupId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'adId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'campaignId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'criterionId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'doubleclicksearch/v2/conversion',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'update' => [
              'path' => 'doubleclicksearch/v2/conversion',
              'httpMethod' => 'PUT',
              'parameters' => [],
            ],'updateAvailability' => [
              'path' => 'doubleclicksearch/v2/conversion/updateAvailability',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->reports = new Doubleclicksearch\Resource\Reports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'generate' => [
              'path' => 'doubleclicksearch/v2/reports/generate',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => 'doubleclicksearch/v2/reports/{reportId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getFile' => [
              'path' => 'doubleclicksearch/v2/reports/{reportId}/files/{reportFragment}',
              'httpMethod' => 'GET',
              'parameters' => [
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reportFragment' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],'getIdMappingFile' => [
              'path' => 'doubleclicksearch/v2/agency/{agencyId}/advertiser/{advertiserId}/idmapping',
              'httpMethod' => 'GET',
              'parameters' => [
                'agencyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'request' => [
              'path' => 'doubleclicksearch/v2/reports',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->savedColumns = new Doubleclicksearch\Resource\SavedColumns(
        $this,
        $this->serviceName,
        'savedColumns',
        [
          'methods' => [
            'list' => [
              'path' => 'doubleclicksearch/v2/agency/{agencyId}/advertiser/{advertiserId}/savedcolumns',
              'httpMethod' => 'GET',
              'parameters' => [
                'agencyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'advertiserId' => [
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
class_alias(Doubleclicksearch::class, 'Google_Service_Doubleclicksearch');
