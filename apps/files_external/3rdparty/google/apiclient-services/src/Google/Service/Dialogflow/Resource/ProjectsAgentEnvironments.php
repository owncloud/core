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
 * The "environments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $environments = $dialogflowService->environments;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsAgentEnvironments extends Google_Service_Resource
{
  /**
   * Returns the list of all non-draft environments of the specified agent.
   * (environments.listProjectsAgentEnvironments)
   *
   * @param string $parent Required. The agent to list all environments from.
   * Format: `projects//agent`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of items to return in a
   * single page. By default 100 and at most 1000.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous list request.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2ListEnvironmentsResponse
   */
  public function listProjectsAgentEnvironments($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowV2ListEnvironmentsResponse");
  }
}
