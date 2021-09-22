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

use Google\Service\AIPlatformNotebooks\Execution;
use Google\Service\AIPlatformNotebooks\ListExecutionsResponse;
use Google\Service\AIPlatformNotebooks\Operation;

/**
 * The "executions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $notebooksService = new Google\Service\AIPlatformNotebooks(...);
 *   $executions = $notebooksService->executions;
 *  </code>
 */
class ProjectsLocationsExecutions extends \Google\Service\Resource
{
  /**
   * Creates a new Scheduled Notebook in a given project and location.
   * (executions.create)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param Execution $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string executionId Required. User-defined unique ID of this
   * execution.
   * @return Operation
   */
  public function create($parent, Execution $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes execution (executions.delete)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/executions/{execution_id}`
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
   * Gets details of executions (executions.get)
   *
   * @param string $name Required. Format:
   * `projects/{project_id}/locations/{location}/executions/{execution_id}`
   * @param array $optParams Optional parameters.
   * @return Execution
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Execution::class);
  }
  /**
   * Lists executions in a given project and location
   * (executions.listProjectsLocationsExecutions)
   *
   * @param string $parent Required. Format:
   * `parent=projects/{project_id}/locations/{location}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter applied to resulting executions. Currently
   * only supports filtering executions by a specified schedule_id. Format:
   * "schedule_id="
   * @opt_param string orderBy Sort by field.
   * @opt_param int pageSize Maximum return size of the list call.
   * @opt_param string pageToken A previous returned page token that can be used
   * to continue listing from the last result.
   * @return ListExecutionsResponse
   */
  public function listProjectsLocationsExecutions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListExecutionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsExecutions::class, 'Google_Service_AIPlatformNotebooks_Resource_ProjectsLocationsExecutions');
