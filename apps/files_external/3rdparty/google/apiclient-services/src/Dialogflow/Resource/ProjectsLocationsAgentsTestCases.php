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

namespace Google\Service\Dialogflow\Resource;

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3BatchDeleteTestCasesRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3BatchRunTestCasesRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3CalculateCoverageResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ExportTestCasesRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ImportTestCasesRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ListTestCasesResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3RunTestCaseRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3TestCase;
use Google\Service\Dialogflow\GoogleLongrunningOperation;
use Google\Service\Dialogflow\GoogleProtobufEmpty;

/**
 * The "testCases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $testCases = $dialogflowService->testCases;
 *  </code>
 */
class ProjectsLocationsAgentsTestCases extends \Google\Service\Resource
{
  /**
   * Batch deletes test cases. (testCases.batchDelete)
   *
   * @param string $parent Required. The agent to delete test cases from. Format:
   * `projects//locations//agents/`.
   * @param GoogleCloudDialogflowCxV3BatchDeleteTestCasesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function batchDelete($parent, GoogleCloudDialogflowCxV3BatchDeleteTestCasesRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Kicks off a batch run of test cases. This method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: BatchRunTestCasesMetadata - `response`:
   * BatchRunTestCasesResponse (testCases.batchRun)
   *
   * @param string $parent Required. Agent name. Format:
   * `projects//locations//agents/ `.
   * @param GoogleCloudDialogflowCxV3BatchRunTestCasesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function batchRun($parent, GoogleCloudDialogflowCxV3BatchRunTestCasesRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchRun', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Calculates the test coverage for an agent. (testCases.calculateCoverage)
   *
   * @param string $agent Required. The agent to calculate coverage for. Format:
   * `projects//locations//agents/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string type Required. The type of coverage requested.
   * @return GoogleCloudDialogflowCxV3CalculateCoverageResponse
   */
  public function calculateCoverage($agent, $optParams = [])
  {
    $params = ['agent' => $agent];
    $params = array_merge($params, $optParams);
    return $this->call('calculateCoverage', [$params], GoogleCloudDialogflowCxV3CalculateCoverageResponse::class);
  }
  /**
   * Creates a test case for the given agent. (testCases.create)
   *
   * @param string $parent Required. The agent to create the test case for.
   * Format: `projects//locations//agents/`.
   * @param GoogleCloudDialogflowCxV3TestCase $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3TestCase
   */
  public function create($parent, GoogleCloudDialogflowCxV3TestCase $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDialogflowCxV3TestCase::class);
  }
  /**
   * Exports the test cases under the agent to a Cloud Storage bucket or a local
   * file. Filter can be applied to export a subset of test cases. This method is
   * a [long-running operation](https://cloud.google.com/dialogflow/cx/docs/how
   * /long-running-operation). The returned `Operation` type has the following
   * method-specific fields: - `metadata`: ExportTestCasesMetadata - `response`:
   * ExportTestCasesResponse (testCases.export)
   *
   * @param string $parent Required. The agent where to export test cases from.
   * Format: `projects//locations//agents/`.
   * @param GoogleCloudDialogflowCxV3ExportTestCasesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function export($parent, GoogleCloudDialogflowCxV3ExportTestCasesRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('export', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets a test case. (testCases.get)
   *
   * @param string $name Required. The name of the testcase. Format:
   * `projects//locations//agents//testCases/`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3TestCase
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDialogflowCxV3TestCase::class);
  }
  /**
   * Imports the test cases from a Cloud Storage bucket or a local file. It always
   * creates new test cases and won't overwite any existing ones. The provided ID
   * in the imported test case is neglected. This method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: ImportTestCasesMetadata - `response`:
   * ImportTestCasesResponse (testCases.import)
   *
   * @param string $parent Required. The agent to import test cases to. Format:
   * `projects//locations//agents/`.
   * @param GoogleCloudDialogflowCxV3ImportTestCasesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function import($parent, GoogleCloudDialogflowCxV3ImportTestCasesRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Fetches a list of test cases for a given agent.
   * (testCases.listProjectsLocationsAgentsTestCases)
   *
   * @param string $parent Required. The agent to list all pages for. Format:
   * `projects//locations//agents/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 20. Note that when TestCaseView = FULL, the maximum page
   * size allowed is 20. When TestCaseView = BASIC, the maximum page size allowed
   * is 500.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @opt_param string view Specifies whether response should include all fields
   * or just the metadata.
   * @return GoogleCloudDialogflowCxV3ListTestCasesResponse
   */
  public function listProjectsLocationsAgentsTestCases($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDialogflowCxV3ListTestCasesResponse::class);
  }
  /**
   * Updates the specified test case. (testCases.patch)
   *
   * @param string $name The unique identifier of the test case.
   * TestCases.CreateTestCase will populate the name automatically. Otherwise use
   * format: `projects//locations//agents/ /testCases/`.
   * @param GoogleCloudDialogflowCxV3TestCase $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to specify which fields
   * should be updated. The `creationTime` and `lastTestResult` cannot be updated.
   * @return GoogleCloudDialogflowCxV3TestCase
   */
  public function patch($name, GoogleCloudDialogflowCxV3TestCase $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDialogflowCxV3TestCase::class);
  }
  /**
   * Kicks off a test case run. This method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: RunTestCaseMetadata - `response`: RunTestCaseResponse
   * (testCases.run)
   *
   * @param string $name Required. Format of test case name to run:
   * `projects//locations/ /agents//testCases/`.
   * @param GoogleCloudDialogflowCxV3RunTestCaseRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function run($name, GoogleCloudDialogflowCxV3RunTestCaseRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('run', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgentsTestCases::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsTestCases');
