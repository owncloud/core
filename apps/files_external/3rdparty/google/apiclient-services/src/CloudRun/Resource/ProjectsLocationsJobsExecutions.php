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

namespace Google\Service\CloudRun\Resource;

use Google\Service\CloudRun\GoogleCloudRunV2Execution;
use Google\Service\CloudRun\GoogleCloudRunV2ListExecutionsResponse;
use Google\Service\CloudRun\GoogleLongrunningOperation;

/**
 * The "executions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google\Service\CloudRun(...);
 *   $executions = $runService->executions;
 *  </code>
 */
class ProjectsLocationsJobsExecutions extends \Google\Service\Resource
{
  /**
   * Delete an Execution. (executions.delete)
   *
   * @param string $name Required. The name of the Execution to delete. Format:
   * projects/{project}/locations/{location}/jobs/{job}/executions/{execution}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag A system-generated fingerprint for this version of the
   * resource. This may be used to detect modification conflict during updates.
   * @opt_param bool validateOnly Indicates that the request should be validated
   * without actually deleting any resources.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets information about a Execution. (executions.get)
   *
   * @param string $name Required. The full name of the Execution. Format:
   * projects/{project}/locations/{location}/jobs/{job}/executions/{execution}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRunV2Execution
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRunV2Execution::class);
  }
  /**
   * List Executions from a Job. (executions.listProjectsLocationsJobsExecutions)
   *
   * @param string $parent Required. The Execution from which the Executions
   * should be listed. To list all Executions across Jobs, use "-" instead of Job
   * name. Format: projects/{project}/locations/{location}/jobs/{job}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of Executions to return in this call.
   * @opt_param string pageToken A page token received from a previous call to
   * ListExecutions. All other parameters must match.
   * @opt_param bool showDeleted If true, returns deleted (but unexpired)
   * resources along with active ones.
   * @return GoogleCloudRunV2ListExecutionsResponse
   */
  public function listProjectsLocationsJobsExecutions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRunV2ListExecutionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsJobsExecutions::class, 'Google_Service_CloudRun_Resource_ProjectsLocationsJobsExecutions');
