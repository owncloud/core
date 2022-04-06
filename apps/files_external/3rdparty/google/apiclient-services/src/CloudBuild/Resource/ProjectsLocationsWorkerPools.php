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

namespace Google\Service\CloudBuild\Resource;

use Google\Service\CloudBuild\ListWorkerPoolsResponse;
use Google\Service\CloudBuild\Operation;
use Google\Service\CloudBuild\WorkerPool;

/**
 * The "workerPools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google\Service\CloudBuild(...);
 *   $workerPools = $cloudbuildService->workerPools;
 *  </code>
 */
class ProjectsLocationsWorkerPools extends \Google\Service\Resource
{
  /**
   * Creates a `WorkerPool`. (workerPools.create)
   *
   * @param string $parent Required. The parent resource where this worker pool
   * will be created. Format: `projects/{project}/locations/{location}`.
   * @param WorkerPool $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly If set, validate the request and preview the
   * response, but do not actually post it.
   * @opt_param string workerPoolId Required. Immutable. The ID to use for the
   * `WorkerPool`, which will become the final component of the resource name.
   * This value should be 1-63 characters, and valid characters are /a-z-/.
   * @return Operation
   */
  public function create($parent, WorkerPool $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a `WorkerPool`. (workerPools.delete)
   *
   * @param string $name Required. The name of the `WorkerPool` to delete. Format:
   * `projects/{project}/locations/{location}/workerPools/{workerPool}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing If set to true, and the `WorkerPool` is not
   * found, the request will succeed but no action will be taken on the server.
   * @opt_param string etag Optional. If provided, it must match the server's etag
   * on the workerpool for the request to be processed.
   * @opt_param bool validateOnly If set, validate the request and preview the
   * response, but do not actually post it.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns details of a `WorkerPool`. (workerPools.get)
   *
   * @param string $name Required. The name of the `WorkerPool` to retrieve.
   * Format: `projects/{project}/locations/{location}/workerPools/{workerPool}`.
   * @param array $optParams Optional parameters.
   * @return WorkerPool
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], WorkerPool::class);
  }
  /**
   * Lists `WorkerPool`s. (workerPools.listProjectsLocationsWorkerPools)
   *
   * @param string $parent Required. The parent of the collection of
   * `WorkerPools`. Format: `projects/{project}/locations/{location}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of `WorkerPool`s to return. The
   * service may return fewer than this value. If omitted, the server will use a
   * sensible default.
   * @opt_param string pageToken A page token, received from a previous
   * `ListWorkerPools` call. Provide this to retrieve the subsequent page.
   * @return ListWorkerPoolsResponse
   */
  public function listProjectsLocationsWorkerPools($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListWorkerPoolsResponse::class);
  }
  /**
   * Updates a `WorkerPool`. (workerPools.patch)
   *
   * @param string $name Output only. The resource name of the `WorkerPool`, with
   * format `projects/{project}/locations/{location}/workerPools/{worker_pool}`.
   * The value of `{worker_pool}` is provided by `worker_pool_id` in
   * `CreateWorkerPool` request and the value of `{location}` is determined by the
   * endpoint accessed.
   * @param WorkerPool $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A mask specifying which fields in `worker_pool`
   * to update.
   * @opt_param bool validateOnly If set, validate the request and preview the
   * response, but do not actually post it.
   * @return Operation
   */
  public function patch($name, WorkerPool $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsWorkerPools::class, 'Google_Service_CloudBuild_Resource_ProjectsLocationsWorkerPools');
