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
 * The "testCases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $toolresultsService = new Google_Service_ToolResults(...);
 *   $testCases = $toolresultsService->testCases;
 *  </code>
 */
class Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsStepsTestCases extends Google_Service_Resource
{
  /**
   * Gets details of a Test Case for a Step. Experimental test cases API. Still in
   * active development. May return any of the following canonical error codes: -
   * PERMISSION_DENIED - if the user is not authorized to write to project -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the
   * containing Test Case does not exist (testCases.get)
   *
   * @param string $projectId A Project id. Required.
   * @param string $historyId A History id. Required.
   * @param string $executionId A Execution id Required.
   * @param string $stepId A Step id. Note: This step must include a
   * TestExecutionStep. Required.
   * @param string $testCaseId A Test Case id. Required.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ToolResults_TestCase
   */
  public function get($projectId, $historyId, $executionId, $stepId, $testCaseId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'stepId' => $stepId, 'testCaseId' => $testCaseId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ToolResults_TestCase");
  }
  /**
   * Lists Test Cases attached to a Step. Experimental test cases API. Still in
   * active development. May return any of the following canonical error codes: -
   * PERMISSION_DENIED - if the user is not authorized to write to project -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the
   * containing Step does not exist
   * (testCases.listProjectsHistoriesExecutionsStepsTestCases)
   *
   * @param string $projectId A Project id. Required.
   * @param string $historyId A History id. Required.
   * @param string $executionId A Execution id Required.
   * @param string $stepId A Step id. Note: This step must include a
   * TestExecutionStep. Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of TestCases to fetch. Default
   * value: 100. The server will use this default if the field is not set or has a
   * value of 0. Optional.
   * @opt_param string pageToken A continuation token to resume the query at the
   * next item. Optional.
   * @return Google_Service_ToolResults_ListTestCasesResponse
   */
  public function listProjectsHistoriesExecutionsStepsTestCases($projectId, $historyId, $executionId, $stepId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'stepId' => $stepId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ToolResults_ListTestCasesResponse");
  }
}
