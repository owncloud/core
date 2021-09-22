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

namespace Google\Service\AIPlatformNotebooks\Resource;

use Google\Service\AIPlatformNotebooks\ListRuntimesResponse;
use Google\Service\AIPlatformNotebooks\Operation;
use Google\Service\AIPlatformNotebooks\ReportRuntimeEventRequest;
use Google\Service\AIPlatformNotebooks\ResetRuntimeRequest;
use Google\Service\AIPlatformNotebooks\Runtime;
use Google\Service\AIPlatformNotebooks\StartRuntimeRequest;
use Google\Service\AIPlatformNotebooks\StopRuntimeRequest;
use Google\Service\AIPlatformNotebooks\SwitchRuntimeRequest;

/**
 * The "runtimes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $notebooksService = new Google\Service\AIPlatformNotebooks(...);
 *   $runtimes = $notebooksService->runtimes;
 *  </code>
 */
class ProjectsLocationsRuntimes extends \Google\Service\Resource
{
  /**
   * Creates a new Runtime in a given project and location. (runtimes.create)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param Runtime $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string runtimeId Required. User-defined unique ID of this Runtime.
   * @return Operation
   */
  public function create($parent, Runtime $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single Runtime. (runtimes.delete)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of a single Runtime. The location must be a regional endpoint
   * rather than zonal. (runtimes.get)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param array $optParams Optional parameters.
   * @return Runtime
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Runtime::class);
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
   * @return ListRuntimesResponse
   */
  public function listProjectsLocationsRuntimes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRuntimesResponse::class);
  }
  /**
   * Report and process a runtime event. (runtimes.reportEvent)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param ReportRuntimeEventRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function reportEvent($name, ReportRuntimeEventRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reportEvent', [$params], Operation::class);
  }
  /**
   * Resets a Managed Notebook Runtime. (runtimes.reset)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param ResetRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function reset($name, ResetRuntimeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reset', [$params], Operation::class);
  }
  /**
   * Starts a Managed Notebook Runtime. Perform "Start" on GPU instances; "Resume"
   * on CPU instances See: https://cloud.google.com/compute/docs/instances/stop-
   * start-instance https://cloud.google.com/compute/docs/instances/suspend-
   * resume-instance (runtimes.start)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param StartRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function start($name, StartRuntimeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('start', [$params], Operation::class);
  }
  /**
   * Stops a Managed Notebook Runtime. Perform "Stop" on GPU instances; "Suspend"
   * on CPU instances See: https://cloud.google.com/compute/docs/instances/stop-
   * start-instance https://cloud.google.com/compute/docs/instances/suspend-
   * resume-instance (runtimes.stop)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param StopRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function stop($name, StopRuntimeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('stop', [$params], Operation::class);
  }
  /**
   * Switch a Managed Notebook Runtime. (runtimes.switchProjectsLocationsRuntimes)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/runtimes/{runtime_id}`
   * @param SwitchRuntimeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function switchProjectsLocationsRuntimes($name, SwitchRuntimeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('switch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRuntimes::class, 'Google_Service_AIPlatformNotebooks_Resource_ProjectsLocationsRuntimes');
