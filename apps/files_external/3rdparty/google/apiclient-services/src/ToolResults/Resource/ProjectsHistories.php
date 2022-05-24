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

use Google\Service\ToolResults\History;
use Google\Service\ToolResults\ListHistoriesResponse;

/**
 * The "histories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $toolresultsService = new Google\Service\ToolResults(...);
 *   $histories = $toolresultsService->histories;
 *  </code>
 */
class ProjectsHistories extends \Google\Service\Resource
{
  /**
   * Creates a History. The returned History will have the id set. May return any
   * of the following canonical error codes: - PERMISSION_DENIED - if the user is
   * not authorized to write to project - INVALID_ARGUMENT - if the request is
   * malformed - NOT_FOUND - if the containing project does not exist
   * (histories.create)
   *
   * @param string $projectId A Project id. Required.
   * @param History $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A unique request ID for server to detect
   * duplicated requests. For example, a UUID. Optional, but strongly recommended.
   * @return History
   */
  public function create($projectId, History $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], History::class);
  }
  /**
   * Gets a History. May return any of the following canonical error codes: -
   * PERMISSION_DENIED - if the user is not authorized to read project -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the History
   * does not exist (histories.get)
   *
   * @param string $projectId A Project id. Required.
   * @param string $historyId A History id. Required.
   * @param array $optParams Optional parameters.
   * @return History
   */
  public function get($projectId, $historyId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'historyId' => $historyId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], History::class);
  }
  /**
   * Lists Histories for a given Project. The histories are sorted by modification
   * time in descending order. The history_id key will be used to order the
   * history with the same modification time. May return any of the following
   * canonical error codes: - PERMISSION_DENIED - if the user is not authorized to
   * read project - INVALID_ARGUMENT - if the request is malformed - NOT_FOUND -
   * if the History does not exist (histories.listProjectsHistories)
   *
   * @param string $projectId A Project id. Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filterByName If set, only return histories with the given
   * name. Optional.
   * @opt_param int pageSize The maximum number of Histories to fetch. Default
   * value: 20. The server will use this default if the field is not set or has a
   * value of 0. Any value greater than 100 will be treated as 100. Optional.
   * @opt_param string pageToken A continuation token to resume the query at the
   * next item. Optional.
   * @return ListHistoriesResponse
   */
  public function listProjectsHistories($projectId, $optParams = [])
  {
    $params = ['projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListHistoriesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsHistories::class, 'Google_Service_ToolResults_Resource_ProjectsHistories');
