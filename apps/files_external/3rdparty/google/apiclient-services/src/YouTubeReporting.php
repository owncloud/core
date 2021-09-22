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
 * Service definition for YouTubeReporting (v1).
 *
 * <p>
 * Schedules reporting jobs containing your YouTube Analytics data and downloads
 * the resulting bulk data reports in the form of CSV files.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/youtube/reporting/v1/reports/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class YouTubeReporting extends \Google\Service
{
  /** View monetary and non-monetary YouTube Analytics reports for your YouTube content. */
  const YT_ANALYTICS_MONETARY_READONLY =
      "https://www.googleapis.com/auth/yt-analytics-monetary.readonly";
  /** View YouTube Analytics reports for your YouTube content. */
  const YT_ANALYTICS_READONLY =
      "https://www.googleapis.com/auth/yt-analytics.readonly";

  public $jobs;
  public $jobs_reports;
  public $media;
  public $reportTypes;

  /**
   * Constructs the internal representation of the YouTubeReporting service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://youtubereporting.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'youtubereporting';

    $this->jobs = new YouTubeReporting\Resource\Jobs(
        $this,
        $this->serviceName,
        'jobs',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/jobs',
              'httpMethod' => 'POST',
              'parameters' => [
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/jobs/{jobId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/jobs/{jobId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/jobs',
              'httpMethod' => 'GET',
              'parameters' => [
                'includeSystemManaged' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
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
    $this->jobs_reports = new YouTubeReporting\Resource\JobsReports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/jobs/{jobId}/reports/{reportId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'reportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/jobs/{jobId}/reports',
              'httpMethod' => 'GET',
              'parameters' => [
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'createdAfter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startTimeAtOrAfter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startTimeBefore' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->media = new YouTubeReporting\Resource\Media(
        $this,
        $this->serviceName,
        'media',
        [
          'methods' => [
            'download' => [
              'path' => 'v1/media/{+resourceName}',
              'httpMethod' => 'GET',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->reportTypes = new YouTubeReporting\Resource\ReportTypes(
        $this,
        $this->serviceName,
        'reportTypes',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/reportTypes',
              'httpMethod' => 'GET',
              'parameters' => [
                'includeSystemManaged' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'onBehalfOfContentOwner' => [
                  'location' => 'query',
                  'type' => 'string',
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
class_alias(YouTubeReporting::class, 'Google_Service_YouTubeReporting');
