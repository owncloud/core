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
 * The "runtimes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $notebooksService = new Google_Service_AIPlatformNotebooks(...);
 *   $runtimes = $notebooksService->runtimes;
 *  </code>
 */
class Google_Service_AIPlatformNotebooks_Resource_ProjectsLocationsRuntimes extends Google_Service_Resource
{
  /**
   * Creates a new Runtime in a given project and location. (runtimes.create)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param Google_Service_AIPlatformNotebooks_Runtime $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string runtimeId Required. User-defined unique ID of this Runtime.
   * @return Google_Service_AIPlatformNotebooks_Operation
   */
  public function create($parent, Google_Service_AIPlatformNotebooks_Runtime $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AIPlatformNotebooks_Operation");
  }
  /**
   * Deletes a single Runtime. (runtimes.delete)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
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
   * Gets details of a single Runtime. The location must be a regional endpoint
   * rather than zonal. (runtimes.get)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_AIPlatformNotebooks_Runtime
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AIPlatformNotebooks_Runtime");
  }
  /**
   * Lists Runtimes in a given project and location.
   * (runtimes.listProjectsLocationsRuntimes)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum return size of the list call.
   * @opt_param string pageToken A previous returned page token that can be used
   * to continue listing from the last result.
   * @return Google_Service_AIPlatformNotebooks_ListRuntimesResponse
   */
  public function listProjectsLocationsRuntimes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AIPlatformNotebooks_ListRuntimesResponse");
  }
  /**
   * Resets a Managed Notebook Runtime. (runtimes.reset)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param Google_Service_AIPlatformNotebooks_ResetRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AIPlatformNotebooks_Operation
   */
  public function reset($name, Google_Service_AIPlatformNotebooks_ResetRuntimeRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('reset', array($params), "Google_Service_AIPlatformNotebooks_Operation");
  }
  /**
   * Starts a Managed Notebook Runtime. Perform "Start" on GPU instances; "Resume"
   * on CPU instances See: https://cloud.google.com/compute/docs/instances/stop-
   * start-instance https://cloud.google.com/compute/docs/instances/suspend-
   * resume-instance (runtimes.start)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param Google_Service_AIPlatformNotebooks_StartRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AIPlatformNotebooks_Operation
   */
  public function start($name, Google_Service_AIPlatformNotebooks_StartRuntimeRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('start', array($params), "Google_Service_AIPlatformNotebooks_Operation");
  }
  /**
   * Stops a Managed Notebook Runtime. Perform "Stop" on GPU instances; "Suspend"
   * on CPU instances See: https://cloud.google.com/compute/docs/instances/stop-
   * start-instance https://cloud.google.com/compute/docs/instances/suspend-
   * resume-instance (runtimes.stop)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param Google_Service_AIPlatformNotebooks_StopRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AIPlatformNotebooks_Operation
   */
  public function stop($name, Google_Service_AIPlatformNotebooks_StopRuntimeRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('stop', array($params), "Google_Service_AIPlatformNotebooks_Operation");
  }
  /**
   * Switch a Managed Notebook Runtime. (runtimes.switchProjectsLocationsRuntimes)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param Google_Service_AIPlatformNotebooks_SwitchRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AIPlatformNotebooks_Operation
   */
  public function switchProjectsLocationsRuntimes($name, Google_Service_AIPlatformNotebooks_SwitchRuntimeRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('switch', array($params), "Google_Service_AIPlatformNotebooks_Operation");
  }
}
