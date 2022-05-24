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

use Google\Service\Tasks\Task;
use Google\Service\Tasks\Tasks as TasksModel;

/**
 * The "tasks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tasksService = new Google\Service\Tasks(...);
 *   $tasks = $tasksService->tasks;
 *  </code>
 */
class Tasks extends \Google\Service\Resource
{
  /**
   * Clears all completed tasks from the specified task list. The affected tasks
   * will be marked as 'hidden' and no longer be returned by default when
   * retrieving all tasks for a task list. (tasks.clear)
   *
   * @param string $tasklist Task list identifier.
   * @param array $optParams Optional parameters.
   */
  public function clear($tasklist, $optParams = [])
  {
    $params = ['tasklist' => $tasklist];
    $params = array_merge($params, $optParams);
    return $this->call('clear', [$params]);
  }
  /**
   * Deletes the specified task from the task list. (tasks.delete)
   *
   * @param string $tasklist Task list identifier.
   * @param string $task Task identifier.
   * @param array $optParams Optional parameters.
   */
  public function delete($tasklist, $task, $optParams = [])
  {
    $params = ['tasklist' => $tasklist, 'task' => $task];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Returns the specified task. (tasks.get)
   *
   * @param string $tasklist Task list identifier.
   * @param string $task Task identifier.
   * @param array $optParams Optional parameters.
   * @return Task
   */
  public function get($tasklist, $task, $optParams = [])
  {
    $params = ['tasklist' => $tasklist, 'task' => $task];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Task::class);
  }
  /**
   * Creates a new task on the specified task list. (tasks.insert)
   *
   * @param string $tasklist Task list identifier.
   * @param Task $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parent Parent task identifier. If the task is created at
   * the top level, this parameter is omitted. Optional.
   * @opt_param string previous Previous sibling task identifier. If the task is
   * created at the first position among its siblings, this parameter is omitted.
   * Optional.
   * @return Task
   */
  public function insert($tasklist, Task $postBody, $optParams = [])
  {
    $params = ['tasklist' => $tasklist, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Task::class);
  }
  /**
   * Returns all tasks in the specified task list. (tasks.listTasks)
   *
   * @param string $tasklist Task list identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string completedMax Upper bound for a task's completion date (as a
   * RFC 3339 timestamp) to filter by. Optional. The default is not to filter by
   * completion date.
   * @opt_param string completedMin Lower bound for a task's completion date (as a
   * RFC 3339 timestamp) to filter by. Optional. The default is not to filter by
   * completion date.
   * @opt_param string dueMax Upper bound for a task's due date (as a RFC 3339
   * timestamp) to filter by. Optional. The default is not to filter by due date.
   * @opt_param string dueMin Lower bound for a task's due date (as a RFC 3339
   * timestamp) to filter by. Optional. The default is not to filter by due date.
   * @opt_param int maxResults Maximum number of task lists returned on one page.
   * Optional. The default is 20 (max allowed: 100).
   * @opt_param string pageToken Token specifying the result page to return.
   * Optional.
   * @opt_param bool showCompleted Flag indicating whether completed tasks are
   * returned in the result. Optional. The default is True. Note that showHidden
   * must also be True to show tasks completed in first party clients, such as the
   * web UI and Google's mobile apps.
   * @opt_param bool showDeleted Flag indicating whether deleted tasks are
   * returned in the result. Optional. The default is False.
   * @opt_param bool showHidden Flag indicating whether hidden tasks are returned
   * in the result. Optional. The default is False.
   * @opt_param string updatedMin Lower bound for a task's last modification time
   * (as a RFC 3339 timestamp) to filter by. Optional. The default is not to
   * filter by last modification time.
   * @return TasksModel
   */
  public function listTasks($tasklist, $optParams = [])
  {
    $params = ['tasklist' => $tasklist];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], TasksModel::class);
  }
  /**
   * Moves the specified task to another position in the task list. This can
   * include putting it as a child task under a new parent and/or move it to a
   * different position among its sibling tasks. (tasks.move)
   *
   * @param string $tasklist Task list identifier.
   * @param string $task Task identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parent New parent task identifier. If the task is moved to
   * the top level, this parameter is omitted. Optional.
   * @opt_param string previous New previous sibling task identifier. If the task
   * is moved to the first position among its siblings, this parameter is omitted.
   * Optional.
   * @return Task
   */
  public function move($tasklist, $task, $optParams = [])
  {
    $params = ['tasklist' => $tasklist, 'task' => $task];
    $params = array_merge($params, $optParams);
    return $this->call('move', [$params], Task::class);
  }
  /**
   * Updates the specified task. This method supports patch semantics.
   * (tasks.patch)
   *
   * @param string $tasklist Task list identifier.
   * @param string $task Task identifier.
   * @param Task $postBody
   * @param array $optParams Optional parameters.
   * @return Task
   */
  public function patch($tasklist, $task, Task $postBody, $optParams = [])
  {
    $params = ['tasklist' => $tasklist, 'task' => $task, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Task::class);
  }
  /**
   * Updates the specified task. (tasks.update)
   *
   * @param string $tasklist Task list identifier.
   * @param string $task Task identifier.
   * @param Task $postBody
   * @param array $optParams Optional parameters.
   * @return Task
   */
  public function update($tasklist, $task, Task $postBody, $optParams = [])
  {
    $params = ['tasklist' => $tasklist, 'task' => $task, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Task::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Tasks::class, 'Google_Service_Tasks_Resource_Tasks');
