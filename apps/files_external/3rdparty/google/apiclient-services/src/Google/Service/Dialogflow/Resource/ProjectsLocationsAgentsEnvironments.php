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
class Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsEnvironments extends Google_Service_Resource
{
  /**
   * Creates an Environment in the specified Agent. (environments.create)
   *
   * @param string $parent Required. The Agent to create an Environment for.
   * Format: `projects//locations//agents/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Environment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleLongrunningOperation
   */
  public function create($parent, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Environment $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dialogflow_GoogleLongrunningOperation");
  }
  /**
   * Deletes the specified Environment. (environments.delete)
   *
   * @param string $name Required. The name of the Environment to delete. Format:
   * `projects//locations//agents//environments/`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dialogflow_GoogleProtobufEmpty");
  }
  /**
   * Retrieves the specified Environment. (environments.get)
   *
   * @param string $name Required. The name of the Environment. Format:
   * `projects//locations//agents//environments/`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Environment
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Environment");
  }
  /**
   * Returns the list of all environments in the specified Agent.
   * (environments.listProjectsLocationsAgentsEnvironments)
   *
   * @param string $parent Required. The Agent to list all environments for.
   * Format: `projects//locations//agents/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 20 and at most 100.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListEnvironmentsResponse
   */
  public function listProjectsLocationsAgentsEnvironments($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListEnvironmentsResponse");
  }
  /**
   * Looks up the history of the specified Environment.
   * (environments.lookupEnvironmentHistory)
   *
   * @param string $name Required. Resource name of the environment to look up the
   * history for. Format: `projects//locations//agents//environments/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3LookupEnvironmentHistoryResponse
   */
  public function lookupEnvironmentHistory($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('lookupEnvironmentHistory', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3LookupEnvironmentHistoryResponse");
  }
  /**
   * Updates the specified Environment. (environments.patch)
   *
   * @param string $name The name of the environment. Format:
   * `projects//locations//agents//environments/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Environment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields get
   * updated.
   * @return Google_Service_Dialogflow_GoogleLongrunningOperation
   */
  public function patch($name, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Environment $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dialogflow_GoogleLongrunningOperation");
  }
}
