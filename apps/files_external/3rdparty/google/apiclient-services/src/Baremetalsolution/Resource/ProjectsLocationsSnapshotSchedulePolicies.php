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

namespace Google\Service\Baremetalsolution\Resource;

use Google\Service\Baremetalsolution\BaremetalsolutionEmpty;
use Google\Service\Baremetalsolution\ListSnapshotSchedulePoliciesResponse;
use Google\Service\Baremetalsolution\SnapshotSchedulePolicy;

/**
 * The "snapshotSchedulePolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $baremetalsolutionService = new Google\Service\Baremetalsolution(...);
 *   $snapshotSchedulePolicies = $baremetalsolutionService->snapshotSchedulePolicies;
 *  </code>
 */
class ProjectsLocationsSnapshotSchedulePolicies extends \Google\Service\Resource
{
  /**
   * Create a snapshot schedule policy in the specified project.
   * (snapshotSchedulePolicies.create)
   *
   * @param string $parent Required. The parent project and location containing
   * the SnapshotSchedulePolicy.
   * @param SnapshotSchedulePolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string snapshotSchedulePolicyId Required. Snapshot policy ID
   * @return SnapshotSchedulePolicy
   */
  public function create($parent, SnapshotSchedulePolicy $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], SnapshotSchedulePolicy::class);
  }
  /**
   * Delete a named snapshot schedule policy. (snapshotSchedulePolicies.delete)
   *
   * @param string $name Required. The name of the snapshot schedule policy to
   * delete.
   * @param array $optParams Optional parameters.
   * @return BaremetalsolutionEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], BaremetalsolutionEmpty::class);
  }
  /**
   * Get details of a single snapshot schedule policy.
   * (snapshotSchedulePolicies.get)
   *
   * @param string $name Required. Name of the resource.
   * @param array $optParams Optional parameters.
   * @return SnapshotSchedulePolicy
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], SnapshotSchedulePolicy::class);
  }
  /**
   * List snapshot schedule policies in a given project and location.
   * (snapshotSchedulePolicies.listProjectsLocationsSnapshotSchedulePolicies)
   *
   * @param string $parent Required. The parent project containing the Snapshot
   * Schedule Policies.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter List filter.
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @return ListSnapshotSchedulePoliciesResponse
   */
  public function listProjectsLocationsSnapshotSchedulePolicies($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSnapshotSchedulePoliciesResponse::class);
  }
  /**
   * Update a snapshot schedule policy in the specified project.
   * (snapshotSchedulePolicies.patch)
   *
   * @param string $name Output only. The name of the snapshot schedule policy.
   * @param SnapshotSchedulePolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to update.
   * @return SnapshotSchedulePolicy
   */
  public function patch($name, SnapshotSchedulePolicy $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], SnapshotSchedulePolicy::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSnapshotSchedulePolicies::class, 'Google_Service_Baremetalsolution_Resource_ProjectsLocationsSnapshotSchedulePolicies');
