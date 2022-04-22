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

namespace Google\Service\CloudTasks\Resource;

use Google\Service\CloudTasks\CloudtasksEmpty;
use Google\Service\CloudTasks\GetIamPolicyRequest;
use Google\Service\CloudTasks\ListQueuesResponse;
use Google\Service\CloudTasks\PauseQueueRequest;
use Google\Service\CloudTasks\Policy;
use Google\Service\CloudTasks\PurgeQueueRequest;
use Google\Service\CloudTasks\Queue;
use Google\Service\CloudTasks\ResumeQueueRequest;
use Google\Service\CloudTasks\SetIamPolicyRequest;
use Google\Service\CloudTasks\TestIamPermissionsRequest;
use Google\Service\CloudTasks\TestIamPermissionsResponse;

/**
 * The "queues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudtasksService = new Google\Service\CloudTasks(...);
 *   $queues = $cloudtasksService->queues;
 *  </code>
 */
class ProjectsLocationsQueues extends \Google\Service\Resource
{
  /**
   * Creates a queue. Queues created with this method allow tasks to live for a
   * maximum of 31 days. After a task is 31 days old, the task will be deleted
   * regardless of whether it was dispatched or not. WARNING: Using this method
   * may have unintended side effects if you are using an App Engine `queue.yaml`
   * or `queue.xml` file to manage your queues. Read [Overview of Queue Management
   * and queue.yaml](https://cloud.google.com/tasks/docs/queue-yaml) before using
   * this method. (queues.create)
   *
   * @param string $parent Required. The location name in which the queue will be
   * created. For example: `projects/PROJECT_ID/locations/LOCATION_ID` The list of
   * allowed locations can be obtained by calling Cloud Tasks' implementation of
   * ListLocations.
   * @param Queue $postBody
   * @param array $optParams Optional parameters.
   * @return Queue
   */
  public function create($parent, Queue $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Queue::class);
  }
  /**
   * Deletes a queue. This command will delete the queue even if it has tasks in
   * it. Note: If you delete a queue, a queue with the same name can't be created
   * for 7 days. WARNING: Using this method may have unintended side effects if
   * you are using an App Engine `queue.yaml` or `queue.xml` file to manage your
   * queues. Read [Overview of Queue Management and
   * queue.yaml](https://cloud.google.com/tasks/docs/queue-yaml) before using this
   * method. (queues.delete)
   *
   * @param string $name Required. The queue name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
   * @param array $optParams Optional parameters.
   * @return CloudtasksEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], CloudtasksEmpty::class);
  }
  /**
   * Gets a queue. (queues.get)
   *
   * @param string $name Required. The resource name of the queue. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
   * @param array $optParams Optional parameters.
   * @return Queue
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Queue::class);
  }
  /**
   * Gets the access control policy for a Queue. Returns an empty policy if the
   * resource exists and does not have a policy set. Authorization requires the
   * following [Google IAM](https://cloud.google.com/iam) permission on the
   * specified resource parent: * `cloudtasks.queues.getIamPolicy`
   * (queues.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists queues. Queues are returned in lexicographical order.
   * (queues.listProjectsLocationsQueues)
   *
   * @param string $parent Required. The location name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter `filter` can be used to specify a subset of queues.
   * Any Queue field can be used as a filter and several operators as supported.
   * For example: `<=, <, >=, >, !=, =, :`. The filter syntax is the same as
   * described in [Stackdriver's Advanced Logs
   * Filters](https://cloud.google.com/logging/docs/view/advanced_filters). Sample
   * filter "state: PAUSED". Note that using filters might cause fewer queues than
   * the requested page_size to be returned.
   * @opt_param int pageSize Requested page size. The maximum page size is 9800.
   * If unspecified, the page size will be the maximum. Fewer queues than
   * requested might be returned, even if more queues exist; use the
   * next_page_token in the response to determine if more queues exist.
   * @opt_param string pageToken A token identifying the page of results to
   * return. To request the first page results, page_token must be empty. To
   * request the next page of results, page_token must be the value of
   * next_page_token returned from the previous call to ListQueues method. It is
   * an error to switch the value of the filter while iterating through pages.
   * @return ListQueuesResponse
   */
  public function listProjectsLocationsQueues($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListQueuesResponse::class);
  }
  /**
   * Updates a queue. This method creates the queue if it does not exist and
   * updates the queue if it does exist. Queues created with this method allow
   * tasks to live for a maximum of 31 days. After a task is 31 days old, the task
   * will be deleted regardless of whether it was dispatched or not. WARNING:
   * Using this method may have unintended side effects if you are using an App
   * Engine `queue.yaml` or `queue.xml` file to manage your queues. Read [Overview
   * of Queue Management and queue.yaml](https://cloud.google.com/tasks/docs
   * /queue-yaml) before using this method. (queues.patch)
   *
   * @param string $name Caller-specified and required in CreateQueue, after which
   * it becomes output only. The queue name. The queue name must have the
   * following format: `projects/PROJECT_ID/locations/LOCATION_ID/queues/QUEUE_ID`
   * * `PROJECT_ID` can contain letters ([A-Za-z]), numbers ([0-9]), hyphens (-),
   * colons (:), or periods (.). For more information, see [Identifying
   * projects](https://cloud.google.com/resource-manager/docs/creating-managing-
   * projects#identifying_projects) * `LOCATION_ID` is the canonical ID for the
   * queue's location. The list of available locations can be obtained by calling
   * ListLocations. For more information, see
   * https://cloud.google.com/about/locations/. * `QUEUE_ID` can contain letters
   * ([A-Za-z]), numbers ([0-9]), or hyphens (-). The maximum length is 100
   * characters.
   * @param Queue $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A mask used to specify which fields of the queue
   * are being updated. If empty, then all fields will be updated.
   * @return Queue
   */
  public function patch($name, Queue $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Queue::class);
  }
  /**
   * Pauses the queue. If a queue is paused then the system will stop dispatching
   * tasks until the queue is resumed via ResumeQueue. Tasks can still be added
   * when the queue is paused. A queue is paused if its state is PAUSED.
   * (queues.pause)
   *
   * @param string $name Required. The queue name. For example:
   * `projects/PROJECT_ID/location/LOCATION_ID/queues/QUEUE_ID`
   * @param PauseQueueRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Queue
   */
  public function pause($name, PauseQueueRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('pause', [$params], Queue::class);
  }
  /**
   * Purges a queue by deleting all of its tasks. All tasks created before this
   * method is called are permanently deleted. Purge operations can take up to one
   * minute to take effect. Tasks might be dispatched before the purge takes
   * effect. A purge is irreversible. (queues.purge)
   *
   * @param string $name Required. The queue name. For example:
   * `projects/PROJECT_ID/location/LOCATION_ID/queues/QUEUE_ID`
   * @param PurgeQueueRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Queue
   */
  public function purge($name, PurgeQueueRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('purge', [$params], Queue::class);
  }
  /**
   * Resume a queue. This method resumes a queue after it has been PAUSED or
   * DISABLED. The state of a queue is stored in the queue's state; after calling
   * this method it will be set to RUNNING. WARNING: Resuming many high-QPS queues
   * at the same time can lead to target overloading. If you are resuming high-QPS
   * queues, follow the 500/50/5 pattern described in [Managing Cloud Tasks
   * Scaling Risks](https://cloud.google.com/tasks/docs/manage-cloud-task-
   * scaling). (queues.resume)
   *
   * @param string $name Required. The queue name. For example:
   * `projects/PROJECT_ID/location/LOCATION_ID/queues/QUEUE_ID`
   * @param ResumeQueueRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Queue
   */
  public function resume($name, ResumeQueueRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resume', [$params], Queue::class);
  }
  /**
   * Sets the access control policy for a Queue. Replaces any existing policy.
   * Note: The Cloud Console does not check queue-level IAM permissions yet.
   * Project-level permissions are required to use the Cloud Console.
   * Authorization requires the following [Google
   * IAM](https://cloud.google.com/iam) permission on the specified resource
   * parent: * `cloudtasks.queues.setIamPolicy` (queues.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns permissions that a caller has on a Queue. If the resource does not
   * exist, this will return an empty set of permissions, not a NOT_FOUND error.
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (queues.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsQueues::class, 'Google_Service_CloudTasks_Resource_ProjectsLocationsQueues');
