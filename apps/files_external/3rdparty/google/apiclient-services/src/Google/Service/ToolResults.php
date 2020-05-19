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
class Google_Service_ToolResults extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $clusters;
  public $environments;
  public $executions;
  public $histories;
  public $perfMetricsSummary;
  public $perfSampleSeries;
  public $projects;
  public $samples;
  public $steps;
  public $testCases;
  public $thumbnails;
  
  /**
   * Constructs the internal representation of the ToolResults service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch/toolresults/v1beta3';
    $this->version = 'v1beta3';
    $this->serviceName = 'toolresults';

    $this->clusters = new Google_Service_ToolResults_Resource_Clusters(
        $this,
        $this->serviceName,
        'clusters',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/clusters/{clusterId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clusterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/clusters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->environments = new Google_Service_ToolResults_Resource_Environments(
        $this,
        $this->serviceName,
        'environments',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/environments/{environmentId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'environmentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/environments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->executions = new Google_Service_ToolResults_Resource_Executions(
        $this,
        $this->serviceName,
        'executions',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'patch' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->histories = new Google_Service_ToolResults_Resource_Histories(
        $this,
        $this->serviceName,
        'histories',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filterByName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->perfMetricsSummary = new Google_Service_ToolResults_Resource_PerfMetricsSummary(
        $this,
        $this->serviceName,
        'perfMetricsSummary',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfMetricsSummary',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->perfSampleSeries = new Google_Service_ToolResults_Resource_PerfSampleSeries(
        $this,
        $this->serviceName,
        'perfSampleSeries',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries/{sampleSeriesId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sampleSeriesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects = new Google_Service_ToolResults_Resource_Projects(
        $this,
        $this->serviceName,
        'projects',
        array(
          'methods' => array(
            'getSettings' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/settings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'initializeSettings' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}:initializeSettings',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->samples = new Google_Service_ToolResults_Resource_Samples(
        $this,
        $this->serviceName,
        'samples',
        array(
          'methods' => array(
            'batchCreate' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries/{sampleSeriesId}/samples:batchCreate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sampleSeriesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfSampleSeries/{sampleSeriesId}/samples',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sampleSeriesId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->steps = new Google_Service_ToolResults_Resource_Steps(
        $this,
        $this->serviceName,
        'steps',
        array(
          'methods' => array(
            'accessibilityClusters' => array(
              'path' => 'toolresults/v1beta3/{+name}:accessibilityClusters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'locale' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'create' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getPerfMetricsSummary' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/perfMetricsSummary',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'patch' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'publishXunitXmlFiles' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}:publishXunitXmlFiles',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->testCases = new Google_Service_ToolResults_Resource_TestCases(
        $this,
        $this->serviceName,
        'testCases',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/testCases/{testCaseId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'testCaseId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/testCases',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->thumbnails = new Google_Service_ToolResults_Resource_Thumbnails(
        $this,
        $this->serviceName,
        'thumbnails',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'toolresults/v1beta3/projects/{projectId}/histories/{historyId}/executions/{executionId}/steps/{stepId}/thumbnails',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'historyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'executionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'stepId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
  }
}
