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

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ListTestCaseResultsResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3TestCaseResult;

/**
 * The "results" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $results = $dialogflowService->results;
 *  </code>
 */
class ProjectsLocationsAgentsTestCasesResults extends \Google\Service\Resource
{
  /**
   * Gets a test case result. (results.get)
   *
   * @param string $name Required. The name of the testcase. Format:
   * `projects//locations//agents//testCases//results/`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3TestCaseResult
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDialogflowCxV3TestCaseResult::class);
  }
  /**
   * Fetches a list of results for a given test case.
   * (results.listProjectsLocationsAgentsTestCasesResults)
   *
   * @param string $parent Required. The test case to list results for. Format:
   * `projects//locations//agents// testCases/`. Specify a `-` as a wildcard for
   * TestCase ID to list results across multiple test cases.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter expression used to filter test case
   * results. See [API Filtering](https://aip.dev/160). The expression is case
   * insensitive. Only 'AND' is supported for logical operators. The supported
   * syntax is listed below in detail: [AND ] ... [AND latest] The supported
   * fields and operators are: field operator `environment` `=`, `IN` (Use value
   * `draft` for draft environment) `test_time` `>`, `<` `latest` only returns the
   * latest test result in all results for each test case. Examples: *
   * "environment=draft AND latest" matches the latest test result for each test
   * case in the draft environment. * "environment IN (e1,e2)" matches any test
   * case results with an environment resource name of either "e1" or "e2". *
   * "test_time > 1602540713" matches any test case results with test time later
   * than a unix timestamp in seconds 1602540713.
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return GoogleCloudDialogflowCxV3ListTestCaseResultsResponse
   */
  public function listProjectsLocationsAgentsTestCasesResults($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDialogflowCxV3ListTestCaseResultsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgentsTestCasesResults::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsTestCasesResults');
