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
 * The "tasks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudtasksService = new Google_Service_CloudTasks(...);
 *   $tasks = $cloudtasksService->tasks;
 *  </code>
 */
class Google_Service_CloudTasks_Resource_ProjectsLocationsQueuesTasks extends Google_Service_Resource
{
  /**
   * Creates a task and adds it to a queue.
   *
   * Tasks cannot be updated after creation; there is no UpdateTask command.
   *
   * * The maximum task size is 100KB. (tasks.create)
   *
   * @param string $parent Required. The queue name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
   *
   * The queue must already exist.
   * @param Google_Service_CloudTasks_CreateTaskRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_Task
   */
  public function create($parent, Google_Service_CloudTasks_CreateTaskRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudTasks_Task");
  }
  /**
   * Deletes a task.
   *
   * A task can be deleted if it is scheduled or dispatched. A task cannot be
   * deleted if it has executed successfully or permanently failed. (tasks.delete)
   *
   * @param string $name Required. The task name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID/tasks/TASK_ID`
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_CloudtasksEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudTasks_CloudtasksEmpty");
  }
  /**
   * Gets a task. (tasks.get)
   *
   * @param string $name Required. The task name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID/tasks/TASK_ID`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string responseView The response_view specifies which subset of
   * the Task will be returned.
   *
   * By default response_view is BASIC; not all information is retrieved by
   * default because some data, such as payloads, might be desirable to return
   * only when needed because of its large size or because of the sensitivity of
   * data that it contains.
   *
   * Authorization for FULL requires `cloudtasks.tasks.fullView` [Google
   * IAM](https://cloud.google.com/iam/) permission on the Task resource.
   * @return Google_Service_CloudTasks_Task
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudTasks_Task");
  }
  /**
   * Lists the tasks in a queue.
   *
   * By default, only the BASIC view is retrieved due to performance
   * considerations; response_view controls the subset of information which is
   * returned.
   *
   * The tasks may be returned in any order. The ordering may change at any time.
   * (tasks.listProjectsLocationsQueuesTasks)
   *
   * @param string $parent Required. The queue name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A token identifying the page of results to
   * return.
   *
   * To request the first page results, page_token must be empty. To request the
   * next page of results, page_token must be the value of next_page_token
   * returned from the previous call to ListTasks method.
   *
   * The page token is valid for only 2 hours.
   * @opt_param string responseView The response_view specifies which subset of
   * the Task will be returned.
   *
   * By default response_view is BASIC; not all information is retrieved by
   * default because some data, such as payloads, might be desirable to return
   * only when needed because of its large size or because of the sensitivity of
   * data that it contains.
   *
   * Authorization for FULL requires `cloudtasks.tasks.fullView` [Google
   * IAM](https://cloud.google.com/iam/) permission on the Task resource.
   * @opt_param int pageSize Maximum page size.
   *
   * Fewer tasks than requested might be returned, even if more tasks exist; use
   * next_page_token in the response to determine if more tasks exist.
   *
   * The maximum page size is 1000. If unspecified, the page size will be the
   * maximum.
   * @return Google_Service_CloudTasks_ListTasksResponse
   */
  public function listProjectsLocationsQueuesTasks($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudTasks_ListTasksResponse");
  }
  /**
   * Forces a task to run now.
   *
   * When this method is called, Cloud Tasks will dispatch the task, even if the
   * task is already running, the queue has reached its RateLimits or is PAUSED.
   *
   * This command is meant to be used for manual debugging. For example, RunTask
   * can be used to retry a failed task after a fix has been made or to manually
   * force a task to be dispatched now.
   *
   * The dispatched task is returned. That is, the task that is returned contains
   * the status after the task is dispatched but before the task is received by
   * its target.
   *
   * If Cloud Tasks receives a successful response from the task's target, then
   * the task will be deleted; otherwise the task's schedule_time will be reset to
   * the time that RunTask was called plus the retry delay specified in the
   * queue's RetryConfig.
   *
   * RunTask returns NOT_FOUND when it is called on a task that has already
   * succeeded or permanently failed. (tasks.run)
   *
   * @param string $name Required. The task name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID/tasks/TASK_ID`
   * @param Google_Service_CloudTasks_RunTaskRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudTasks_Task
   */
  public function run($name, Google_Service_CloudTasks_RunTaskRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('run', array($params), "Google_Service_CloudTasks_Task");
  }
}
