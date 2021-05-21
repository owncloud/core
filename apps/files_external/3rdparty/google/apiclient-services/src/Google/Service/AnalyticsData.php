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
 * Service definition for AnalyticsData (v1beta).
 *
 * <p>
 * Accesses report data in Google Analytics.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/analytics/devguides/reporting/data/v1/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AnalyticsData extends Google_Service
{
  /** View and manage your Google Analytics data. */
  const ANALYTICS =
      "https://www.googleapis.com/auth/analytics";
  /** See and download your Google Analytics data. */
  const ANALYTICS_READONLY =
      "https://www.googleapis.com/auth/analytics.readonly";

  public $properties;

  /**
   * Constructs the internal representation of the AnalyticsData service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://analyticsdata.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta';
    $this->serviceName = 'analyticsdata';

    $this->properties = new Google_Service_AnalyticsData_Resource_Properties(
        $this,
        $this->serviceName,
        'properties',
        array(
          'methods' => array(
            'batchRunPivotReports' => array(
              'path' => 'v1beta/{+property}:batchRunPivotReports',
              'httpMethod' => 'POST',
              'parameters' => array(
                'property' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchRunReports' => array(
              'path' => 'v1beta/{+property}:batchRunReports',
              'httpMethod' => 'POST',
              'parameters' => array(
                'property' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getMetadata' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'runPivotReport' => array(
              'path' => 'v1beta/{+property}:runPivotReport',
              'httpMethod' => 'POST',
              'parameters' => array(
                'property' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'runRealtimeReport' => array(
              'path' => 'v1beta/{+property}:runRealtimeReport',
              'httpMethod' => 'POST',
              'parameters' => array(
                'property' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'runReport' => array(
              'path' => 'v1beta/{+property}:runReport',
              'httpMethod' => 'POST',
              'parameters' => array(
                'property' => array(
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
