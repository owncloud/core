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

namespace Google\Service\ToolResults\Resource;

use Google\Service\ToolResults\Environment;
use Google\Service\ToolResults\ListEnvironmentsResponse;

/**
 * The "environments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $toolresultsService = new Google\Service\ToolResults(...);
 *   $environments = $toolresultsService->environments;
 *  </code>
 */
class ProjectsHistoriesExecutionsEnvironments extends \Google\Service\Resource
{
  /**
   * Gets an Environment. May return any of the following canonical error codes: -
   * PERMISSION_DENIED - if the user is not authorized to read project -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the
   * Environment does not exist (environments.get)
   *
   * @param string $projectId Required. A Project id.
   * @param string $historyId Required. A History id.
   * @param string $executionId Required. An Execution id.
   * @param string $environmentId Required. An Environment id.
   * @param array $optParams Optional parameters.
   * @return Environment
   */
  public function get($projectId, $historyId, $executionId, $environmentId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'environmentId' => $environmentId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Environment::class);
  }
  /**
   * Lists Environments for a given Execution. The Environments are sorted by
   * display name. May return any of the following canonical error codes: -
   * PERMISSION_DENIED - if the user is not authorized to read project -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the
   * containing Execution does not exist
   * (environments.listProjectsHistoriesExecutionsEnvironments)
   *
   * @param string $projectId Required. A Project id.
   * @param string $historyId Required. A History id.
   * @param string $executionId Required. An Execution id.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of Environments to fetch. Default
   * value: 25. The server will use this default if the field is not set or has a
   * value of 0.
   * @opt_param string pageToken A continuation token to resume the query at the
   * next item.
   * @return ListEnvironmentsResponse
   */
  public function listProjectsHistoriesExecutionsEnvironments($projectId, $historyId, $executionId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListEnvironmentsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsHistoriesExecutionsEnvironments::class, 'Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsEnvironments');
