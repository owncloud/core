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
 * Service definition for AnalyticsReporting (v4).
 *
 * <p>
 * Accesses Analytics report data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/analytics/devguides/reporting/core/v4/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class AnalyticsReporting extends \Google\Service
{
  /** View and manage your Google Analytics data. */
  const ANALYTICS =
      "https://www.googleapis.com/auth/analytics";
  /** See and download your Google Analytics data. */
  const ANALYTICS_READONLY =
      "https://www.googleapis.com/auth/analytics.readonly";

  public $reports;
  public $userActivity;

  /**
   * Constructs the internal representation of the AnalyticsReporting service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://analyticsreporting.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v4';
    $this->serviceName = 'analyticsreporting';

    $this->reports = new AnalyticsReporting\Resource\Reports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'batchGet' => [
              'path' => 'v4/reports:batchGet',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->userActivity = new AnalyticsReporting\Resource\UserActivity(
        $this,
        $this->serviceName,
        'userActivity',
        [
          'methods' => [
            'search' => [
              'path' => 'v4/userActivity:search',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AnalyticsReporting::class, 'Google_Service_AnalyticsReporting');
