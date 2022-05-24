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

use Google\Service\CloudRun\GoogleCloudRunV2ListTasksResponse;
use Google\Service\CloudRun\GoogleCloudRunV2Task;

/**
 * The "tasks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google\Service\CloudRun(...);
 *   $tasks = $runService->tasks;
 *  </code>
 */
class ProjectsLocationsJobsExecutionsTasks extends \Google\Service\Resource
{
  /**
   * Gets information about a Task. (tasks.get)
   *
   * @param string $name Required. The full name of the Task. Format: projects/{pr
   * oject}/locations/{location}/jobs/{job}/executions/{execution}/tasks/{task}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRunV2Task
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRunV2Task::class);
  }
  /**
   * List Tasks from an Execution of a Job.
   * (tasks.listProjectsLocationsJobsExecutionsTasks)
   *
   * @param string $parent Required. The Execution from which the Tasks should be
   * listed. To list all Tasks across Executions of a Job, use "-" instead of
   * Execution name. To list all Tasks across Jobs, use "-" instead of Job name.
   * Format:
   * projects/{project}/locations/{location}/jobs/{job}/executions/{execution}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of Tasks to return in this call.
   * @opt_param string pageToken A page token received from a previous call to
   * ListTasks. All other parameters must match.
   * @opt_param bool showDeleted If true, returns deleted (but unexpired)
   * resources along with active ones.
   * @return GoogleCloudRunV2ListTasksResponse
   */
  public function listProjectsLocationsJobsExecutionsTasks($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRunV2ListTasksResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsJobsExecutionsTasks::class, 'Google_Service_CloudRun_Resource_ProjectsLocationsJobsExecutionsTasks');
