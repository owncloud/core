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
 * The "continuousTestResults" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $continuousTestResults = $dialogflowService->continuousTestResults;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsEnvironmentsContinuousTestResults extends Google_Service_Resource
{
  /**
   * Fetches a list of continuous test results for a given environment. (continuou
   * sTestResults.listProjectsLocationsAgentsEnvironmentsContinuousTestResults)
   *
   * @param string $parent Required. The environment to list results for. Format:
   * `projects//locations//agents// environments/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListContinuousTestResultsResponse
   */
  public function listProjectsLocationsAgentsEnvironmentsContinuousTestResults($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListContinuousTestResultsResponse");
  }
}
