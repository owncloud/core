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
 * Service definition for ToolResults (v1beta3).
 *
 * <p>
 * API to publish and access results from developer tools.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://firebase.google.com/docs/test-lab/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class ToolResults extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects;
  public $projects_histories;
  public $projects_histories_executions;
  public $projects_histories_executions_clusters;
  public $projects_histories_executions_environments;
  public $projects_histories_executions_steps;
  public $projects_histories_executions_steps_perfMetricsSummary;
  public $projects_histories_executions_steps_perfSampleSeries;
  public $projects_histories_executions_steps_perfSampleSeries_samples;
  public $projects_histories_executions_steps_testCases;
  public $projects_histories_executions_steps_thumbnails;

  /**
   * Constructs the internal representation of the ToolResults service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://toolresults.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta3';
    $this->serviceName = 'toolresults';

    $this->projects = new ToolResults\Resource\Projects(
        $this,
        $this->serviceName,
        'projects',
        [
          'methods' => [
            'getSettings' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/settings',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'initializeSettings' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}:initializeSettings',
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
    $this->projects_histories = new ToolResults\Resource\ProjectsHistories(
        $this,
        $this->serviceName,
        'histories',
        [
          'methods' => [
            'create' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filterByName' => [
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
    $this->projects_histories_executions = new ToolResults\Resource\ProjectsHistoriesExecutions(
        $this,
        $this->serviceName,
        'executions',
        [
          'methods' => [
            'create' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
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
            ],'patch' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_histories_executions_clusters = new ToolResults\Resource\ProjectsHistoriesExecutionsClusters(
        $this,
        $this->serviceName,
        'clusters',
        [
          'methods' => [
            'get' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/clusters/{clusterId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clusterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/clusters',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_histories_executions_environments = new ToolResults\Resource\ProjectsHistoriesExecutionsEnvironments(
        $this,
        $this->serviceName,
        'environments',
        [
          'methods' => [
            'get' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/environments/{environmentId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'environmentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/environments',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
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
    $this->projects_histories_executions_steps = new ToolResults\Resource\ProjectsHistoriesExecutionsSteps(
        $this,
        $this->serviceName,
        'steps',
        [
          'methods' => [
            'accessibilityClusters' => [
              'path' => 'toolresults/v1beta3/{+name}:accessibilityClusters',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'locale' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'create' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getPerfMetricsSummary' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfMetricsSummary',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
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
            ],'patch' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'publishXunitXmlFiles' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}:publishXunitXmlFiles',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_histories_executions_steps_perfMetricsSummary = new ToolResults\Resource\ProjectsHistoriesExecutionsStepsPerfMetricsSummary(
        $this,
        $this->serviceName,
        'perfMetricsSummary',
        [
          'methods' => [
            'create' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfMetricsSummary',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_histories_executions_steps_perfSampleSeries = new ToolResults\Resource\ProjectsHistoriesExecutionsStepsPerfSampleSeries(
        $this,
        $this->serviceName,
        'perfSampleSeries',
        [
          'methods' => [
            'create' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries/{sampleSeriesId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sampleSeriesId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_histories_executions_steps_perfSampleSeries_samples = new ToolResults\Resource\ProjectsHistoriesExecutionsStepsPerfSampleSeriesSamples(
        $this,
        $this->serviceName,
        'samples',
        [
          'methods' => [
            'batchCreate' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries/{sampleSeriesId}/samples:batchCreate',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sampleSeriesId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries/{sampleSeriesId}/samples',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sampleSeriesId' => [
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
    $this->projects_histories_executions_steps_testCases = new ToolResults\Resource\ProjectsHistoriesExecutionsStepsTestCases(
        $this,
        $this->serviceName,
        'testCases',
        [
          'methods' => [
            'get' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/testCases/{testCaseId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'testCaseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/testCases',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
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
    $this->projects_histories_executions_steps_thumbnails = new ToolResults\Resource\ProjectsHistoriesExecutionsStepsThumbnails(
        $this,
        $this->serviceName,
        'thumbnails',
        [
          'methods' => [
            'list' => [
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/thumbnails',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'historyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'executionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'stepId' => [
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
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ToolResults::class, 'Google_Service_ToolResults');
