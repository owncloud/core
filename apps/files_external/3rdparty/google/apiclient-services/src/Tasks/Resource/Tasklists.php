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

namespace Google\Service\Tasks\Resource;

use Google\Service\Tasks\TaskList;
use Google\Service\Tasks\TaskLists as TaskListsModel;

/**
 * The "tasklists" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tasksService = new Google\Service\Tasks(...);
 *   $tasklists = $tasksService->tasklists;
 *  </code>
 */
class Tasklists extends \Google\Service\Resource
{
  /**
   * Deletes the authenticated user's specified task list. (tasklists.delete)
   *
   * @param string $tasklist Task list identifier.
   * @param array $optParams Optional parameters.
   */
  public function delete($tasklist, $optParams = [])
  {
    $params = ['tasklist' => $tasklist];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Returns the authenticated user's specified task list. (tasklists.get)
   *
   * @param string $tasklist Task list identifier.
   * @param array $optParams Optional parameters.
   * @return TaskList
   */
  public function get($tasklist, $optParams = [])
  {
    $params = ['tasklist' => $tasklist];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TaskList::class);
  }
  /**
   * Creates a new task list and adds it to the authenticated user's task lists.
   * (tasklists.insert)
   *
   * @param TaskList $postBody
   * @param array $optParams Optional parameters.
   * @return TaskList
   */
  public function insert(TaskList $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], TaskList::class);
  }
  /**
   * Returns all the authenticated user's task lists. (tasklists.listTasklists)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of task lists returned on one page.
   * Optional. The default is 20 (max allowed: 100).
   * @opt_param string pageToken Token specifying the result page to return.
   * Optional.
   * @return TaskListsModel
   */
  public function listTasklists($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], TaskListsModel::class);
  }
  /**
   * Updates the authenticated user's specified task list. This method supports
   * patch semantics. (tasklists.patch)
   *
   * @param string $tasklist Task list identifier.
   * @param TaskList $postBody
   * @param array $optParams Optional parameters.
   * @return TaskList
   */
  public function patch($tasklist, TaskList $postBody, $optParams = [])
  {
    $params = ['tasklist' => $tasklist, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], TaskList::class);
  }
  /**
   * Updates the authenticated user's specified task list. (tasklists.update)
   *
   * @param string $tasklist Task list identifier.
   * @param TaskList $postBody
   * @param array $optParams Optional parameters.
   * @return TaskList
   */
  public function update($tasklist, TaskList $postBody, $optParams = [])
  {
    $params = ['tasklist' => $tasklist, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], TaskList::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Tasklists::class, 'Google_Service_Tasks_Resource_Tasklists');
