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
 * Service definition for Clouderrorreporting (v1beta1).
 *
 * <p>
 * Groups and counts similar errors from cloud services and applications,
 * reports new errors, and provides access to error groups and their associated
 * errors.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/error-reporting/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Clouderrorreporting extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects;
  public $projects_events;
  public $projects_groupStats;
  public $projects_groups;

  /**
   * Constructs the internal representation of the Clouderrorreporting service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://clouderrorreporting.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta1';
    $this->serviceName = 'clouderrorreporting';

    $this->projects = new Clouderrorreporting\Resource\Projects(
        $this,
        $this->serviceName,
        'projects',
        [
          'methods' => [
            'deleteEvents' => [
              'path' => 'v1beta1/{+projectName}/events',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'projectName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_events = new Clouderrorreporting\Resource\ProjectsEvents(
        $this,
        $this->serviceName,
        'events',
        [
          'methods' => [
            'list' => [
              'path' => 'v1beta1/{+projectName}/events',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'groupId' => [
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
                'serviceFilter.resourceType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'serviceFilter.service' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'serviceFilter.version' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeRange.period' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'report' => [
              'path' => 'v1beta1/{+projectName}/events:report',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_groupStats = new Clouderrorreporting\Resource\ProjectsGroupStats(
        $this,
        $this->serviceName,
        'groupStats',
        [
          'methods' => [
            'list' => [
              'path' => 'v1beta1/{+projectName}/groupStats',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'alignment' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'alignmentTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'groupId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'order' => [
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
                'serviceFilter.resourceType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'serviceFilter.service' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'serviceFilter.version' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeRange.period' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timedCountDuration' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_groups = new Clouderrorreporting\Resource\ProjectsGroups(
        $this,
        $this->serviceName,
        'groups',
        [
          'methods' => [
            'get' => [
              'path' => 'v1beta1/{+groupName}',
              'httpMethod' => 'GET',
              'parameters' => [
                'groupName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1beta1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'name' => [
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
class_alias(Clouderrorreporting::class, 'Google_Service_Clouderrorreporting');
