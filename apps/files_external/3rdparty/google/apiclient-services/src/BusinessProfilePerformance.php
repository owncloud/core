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
 * Service definition for BusinessProfilePerformance (v1).
 *
 * <p>
 * The Business Profile Performance API allows merchants to fetch performance
 * insights about their business profile on Google.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/my-business/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class BusinessProfilePerformance extends \Google\Service
{


  public $locations;
  public $locations_searchkeywords_impressions_monthly;

  /**
   * Constructs the internal representation of the BusinessProfilePerformance
   * service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://businessprofileperformance.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'businessprofileperformance';

    $this->locations = new BusinessProfilePerformance\Resource\Locations(
        $this,
        $this->serviceName,
        'locations',
        [
          'methods' => [
            'getDailyMetricsTimeSeries' => [
              'path' => 'v1/{+name}:getDailyMetricsTimeSeries',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dailyMetric' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dailyRange.endDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'dailyRange.endDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'dailyRange.endDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'dailyRange.startDate.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'dailyRange.startDate.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'dailyRange.startDate.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'dailySubEntityType.dayOfWeek' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dailySubEntityType.timeOfDay.hours' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'dailySubEntityType.timeOfDay.minutes' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'dailySubEntityType.timeOfDay.nanos' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'dailySubEntityType.timeOfDay.seconds' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->locations_searchkeywords_impressions_monthly = new BusinessProfilePerformance\Resource\LocationsSearchkeywordsImpressionsMonthly(
        $this,
        $this->serviceName,
        'monthly',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/searchkeywords/impressions/monthly',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'monthlyRange.endMonth.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'monthlyRange.endMonth.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'monthlyRange.endMonth.year' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'monthlyRange.startMonth.day' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'monthlyRange.startMonth.month' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'monthlyRange.startMonth.year' => [
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
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BusinessProfilePerformance::class, 'Google_Service_BusinessProfilePerformance');
