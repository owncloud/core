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

namespace Google\Service\Iam\Resource;

use Google\Service\Iam\ListWorkloadIdentityPoolsResponse;
use Google\Service\Iam\Operation;
use Google\Service\Iam\UndeleteWorkloadIdentityPoolRequest;
use Google\Service\Iam\WorkloadIdentityPool;

/**
 * The "workloadIdentityPools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iamService = new Google\Service\Iam(...);
 *   $workloadIdentityPools = $iamService->workloadIdentityPools;
 *  </code>
 */
class ProjectsLocationsWorkloadIdentityPools extends \Google\Service\Resource
{
  /**
   * Creates a new WorkloadIdentityPool. You cannot reuse the name of a deleted
   * pool until 30 days after deletion. (workloadIdentityPools.create)
   *
   * @param string $parent Required. The parent resource to create the pool in.
   * The only supported location is `global`.
   * @param WorkloadIdentityPool $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string workloadIdentityPoolId Required. The ID to use for the
   * pool, which becomes the final component of the resource name. This value
   * should be 4-32 characters, and may contain the characters [a-z0-9-]. The
   * prefix `gcp-` is reserved for use by Google, and may not be specified.
   * @return Operation
   */
  public function create($parent, WorkloadIdentityPool $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a WorkloadIdentityPool. You cannot use a deleted pool to exchange
   * external credentials for Google Cloud credentials. However, deletion does not
   * revoke credentials that have already been issued. Credentials issued for a
   * deleted pool do not grant access to resources. If the pool is undeleted, and
   * the credentials are not expired, they grant access again. You can undelete a
   * pool for 30 days. After 30 days, deletion is permanent. You cannot update
   * deleted pools. However, you can view and list them.
   * (workloadIdentityPools.delete)
   *
   * @param string $name Required. The name of the pool to delete.
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
   * Gets an individual WorkloadIdentityPool. (workloadIdentityPools.get)
   *
   * @param string $name Required. The name of the pool to retrieve.
   * @param array $optParams Optional parameters.
   * @return WorkloadIdentityPool
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], WorkloadIdentityPool::class);
  }
  /**
   * Lists all non-deleted WorkloadIdentityPools in a project. If `show_deleted`
   * is set to `true`, then deleted pools are also listed.
   * (workloadIdentityPools.listProjectsLocationsWorkloadIdentityPools)
   *
   * @param string $parent Required. The parent resource to list pools for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of pools to return. If
   * unspecified, at most 50 pools are returned. The maximum value is 1000; values
   * above are 1000 truncated to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListWorkloadIdentityPools` call. Provide this to retrieve the subsequent
   * page.
   * @opt_param bool showDeleted Whether to return soft-deleted pools.
   * @return ListWorkloadIdentityPoolsResponse
   */
  public function listProjectsLocationsWorkloadIdentityPools($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListWorkloadIdentityPoolsResponse::class);
  }
  /**
   * Updates an existing WorkloadIdentityPool. (workloadIdentityPools.patch)
   *
   * @param string $name Output only. The resource name of the pool.
   * @param WorkloadIdentityPool $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to update.
   * @return Operation
   */
  public function patch($name, WorkloadIdentityPool $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Undeletes a WorkloadIdentityPool, as long as it was deleted fewer than 30
   * days ago. (workloadIdentityPools.undelete)
   *
   * @param string $name Required. The name of the pool to undelete.
   * @param UndeleteWorkloadIdentityPoolRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function undelete($name, UndeleteWorkloadIdentityPoolRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('undelete', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsWorkloadIdentityPools::class, 'Google_Service_Iam_Resource_ProjectsLocationsWorkloadIdentityPools');
