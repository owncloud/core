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
 * Service definition for Dataflow (v1b3).
 *
 * <p>
 * Manages Google Cloud Dataflow projects on Google Cloud Platform.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/dataflow" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Dataflow extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and manage your Google Compute Engine resources. */
  const COMPUTE =
      "https://www.googleapis.com/auth/compute";
  /** View your Google Compute Engine resources. */
  const COMPUTE_READONLY =
      "https://www.googleapis.com/auth/compute.readonly";
  /** See your primary Google Account email address. */
  const USERINFO_EMAIL =
      "https://www.googleapis.com/auth/userinfo.email";

  public $projects;
  public $projects_jobs;
  public $projects_jobs_debug;
  public $projects_jobs_messages;
  public $projects_jobs_workItems;
  public $projects_locations;
  public $projects_locations_flexTemplates;
  public $projects_locations_jobs;
  public $projects_locations_jobs_debug;
  public $projects_locations_jobs_messages;
  public $projects_locations_jobs_snapshots;
  public $projects_locations_jobs_stages;
  public $projects_locations_jobs_workItems;
  public $projects_locations_snapshots;
  public $projects_locations_sql;
  public $projects_locations_templates;
  public $projects_snapshots;
  public $projects_templates;

  /**
   * Constructs the internal representation of the Dataflow service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://dataflow.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1b3';
    $this->serviceName = 'dataflow';

    $this->projects = new Dataflow\Resource\Projects(
        $this,
        $this->serviceName,
        'projects',
        [
          'methods' => [
            'deleteSnapshots' => [
              'path' => 'v1b3/projects/{projectId}/snapshots',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'snapshotId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'workerMessages' => [
              'path' => 'v1b3/projects/{projectId}/WorkerMessages',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_jobs = new Dataflow\Resource\ProjectsJobs(
        $this,
        $this->serviceName,
        'jobs',
        [
          'methods' => [
            'aggregated' => [
              'path' => 'v1b3/projects/{projectId}/jobs:aggregated',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'name' => [
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
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'create' => [
              'path' => 'v1b3/projects/{projectId}/jobs',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'replaceJobId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1b3/projects/{projectId}/jobs/{jobId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getMetrics' => [
              'path' => 'v1b3/projects/{projectId}/jobs/{jobId}/metrics',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1b3/projects/{projectId}/jobs',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'name' => [
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
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'snapshot' => [
              'path' => 'v1b3/projects/{projectId}/jobs/{jobId}:snapshot',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1b3/projects/{projectId}/jobs/{jobId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_jobs_debug = new Dataflow\Resource\ProjectsJobsDebug(
        $this,
        $this->serviceName,
        'debug',
        [
          'methods' => [
            'getConfig' => [
              'path' => 'v1b3/projects/{projectId}/jobs/{jobId}/debug/getConfig',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'sendCapture' => [
              'path' => 'v1b3/projects/{projectId}/jobs/{jobId}/debug/sendCapture',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_jobs_messages = new Dataflow\Resource\ProjectsJobsMessages(
        $this,
        $this->serviceName,
        'messages',
        [
          'methods' => [
            'list' => [
              'path' => 'v1b3/projects/{projectId}/jobs/{jobId}/messages',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'endTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'minimumImportance' => [
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
                'startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_jobs_workItems = new Dataflow\Resource\ProjectsJobsWorkItems(
        $this,
        $this->serviceName,
        'workItems',
        [
          'methods' => [
            'lease' => [
              'path' => 'v1b3/projects/{projectId}/jobs/{jobId}/workItems:lease',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'reportStatus' => [
              'path' => 'v1b3/projects/{projectId}/jobs/{jobId}/workItems:reportStatus',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations = new Dataflow\Resource\ProjectsLocations(
        $this,
        $this->serviceName,
        'locations',
        [
          'methods' => [
            'workerMessages' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/WorkerMessages',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_flexTemplates = new Dataflow\Resource\ProjectsLocationsFlexTemplates(
        $this,
        $this->serviceName,
        'flexTemplates',
        [
          'methods' => [
            'launch' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/flexTemplates:launch',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_jobs = new Dataflow\Resource\ProjectsLocationsJobs(
        $this,
        $this->serviceName,
        'jobs',
        [
          'methods' => [
            'create' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'replaceJobId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getExecutionDetails' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}/executionDetails',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
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
            ],'getMetrics' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}/metrics',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'name' => [
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
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'snapshot' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}:snapshot',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_jobs_debug = new Dataflow\Resource\ProjectsLocationsJobsDebug(
        $this,
        $this->serviceName,
        'debug',
        [
          'methods' => [
            'getConfig' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}/debug/getConfig',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'sendCapture' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}/debug/sendCapture',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_jobs_messages = new Dataflow\Resource\ProjectsLocationsJobsMessages(
        $this,
        $this->serviceName,
        'messages',
        [
          'methods' => [
            'list' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}/messages',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'endTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'minimumImportance' => [
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
                'startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_jobs_snapshots = new Dataflow\Resource\ProjectsLocationsJobsSnapshots(
        $this,
        $this->serviceName,
        'snapshots',
        [
          'methods' => [
            'list' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}/snapshots',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_jobs_stages = new Dataflow\Resource\ProjectsLocationsJobsStages(
        $this,
        $this->serviceName,
        'stages',
        [
          'methods' => [
            'getExecutionDetails' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}/stages/{stageId}/executionDetails',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'endTime' => [
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
                'startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_jobs_workItems = new Dataflow\Resource\ProjectsLocationsJobsWorkItems(
        $this,
        $this->serviceName,
        'workItems',
        [
          'methods' => [
            'lease' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}/workItems:lease',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'reportStatus' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/jobs/{jobId}/workItems:reportStatus',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_snapshots = new Dataflow\Resource\ProjectsLocationsSnapshots(
        $this,
        $this->serviceName,
        'snapshots',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/snapshots/{snapshotId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'snapshotId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/snapshots/{snapshotId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'snapshotId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/snapshots',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_sql = new Dataflow\Resource\ProjectsLocationsSql(
        $this,
        $this->serviceName,
        'sql',
        [
          'methods' => [
            'validate' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/sql:validate',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_templates = new Dataflow\Resource\ProjectsLocationsTemplates(
        $this,
        $this->serviceName,
        'templates',
        [
          'methods' => [
            'create' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/templates',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/templates:get',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'gcsPath' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'launch' => [
              'path' => 'v1b3/projects/{projectId}/locations/{location}/templates:launch',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dynamicTemplate.gcsPath' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dynamicTemplate.stagingLocation' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'gcsPath' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_snapshots = new Dataflow\Resource\ProjectsSnapshots(
        $this,
        $this->serviceName,
        'snapshots',
        [
          'methods' => [
            'get' => [
              'path' => 'v1b3/projects/{projectId}/snapshots/{snapshotId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'snapshotId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1b3/projects/{projectId}/snapshots',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'jobId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_templates = new Dataflow\Resource\ProjectsTemplates(
        $this,
        $this->serviceName,
        'templates',
        [
          'methods' => [
            'create' => [
              'path' => 'v1b3/projects/{projectId}/templates',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1b3/projects/{projectId}/templates:get',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'gcsPath' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'launch' => [
              'path' => 'v1b3/projects/{projectId}/templates:launch',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dynamicTemplate.gcsPath' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dynamicTemplate.stagingLocation' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'gcsPath' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'location' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Dataflow::class, 'Google_Service_Dataflow');
