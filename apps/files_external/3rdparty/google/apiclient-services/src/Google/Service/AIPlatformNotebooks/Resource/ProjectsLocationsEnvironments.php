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
 *   $notebooksService = new Google_Service_AIPlatformNotebooks(...);
 *   $environments = $notebooksService->environments;
 *  </code>
 */
class Google_Service_AIPlatformNotebooks_Resource_ProjectsLocationsEnvironments extends Google_Service_Resource
{
  /**
   * Creates a new Environment. (environments.create)
   *
   * @param string $parent Required. Format:
   * `projects/{project_id}/locations/{location}`
   * @param Google_Service_AIPlatformNotebooks_Environment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string environmentId Required. User-defined unique ID of this
   * environment. The `environment_id` must be 1 to 63 characters long and contain
   * only lowercase letters, numeric characters, and dashes. The first character
   * must be a lowercase letter and the last character cannot be a dash.
   * @return Google_Service_AIPlatformNotebooks_Operation
   */
  public function create($parent, Google_Service_AIPlatformNotebooks_Environment $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AIPlatformNotebooks_Operation");
  }
  /**
   * Deletes a single Environment. (environments.delete)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/environments/{environment_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_AIPlatformNotebooks_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_AIPlatformNotebooks_Operation");
  }
  /**
   * Gets details of a single Environment. (environments.get)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/environments/{environment_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_AIPlatformNotebooks_Environment
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AIPlatformNotebooks_Environment");
  }
  /**
   * Lists environments in a project.
   * (environments.listProjectsLocationsEnvironments)
   *
   * @param string $parent Required. Format:
   * `projects/{project_id}/locations/{location}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum return size of the list call.
   * @opt_param string pageToken A previous returned page token that can be used
   * to continue listing from the last result.
   * @return Google_Service_AIPlatformNotebooks_ListEnvironmentsResponse
   */
  public function listProjectsLocationsEnvironments($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AIPlatformNotebooks_ListEnvironmentsResponse");
  }
}
