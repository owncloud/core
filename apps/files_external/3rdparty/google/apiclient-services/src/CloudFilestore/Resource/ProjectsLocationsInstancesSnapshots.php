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

namespace Google\Service\CloudFilestore\Resource;

use Google\Service\CloudFilestore\ListSnapshotsResponse;
use Google\Service\CloudFilestore\Operation;
use Google\Service\CloudFilestore\Snapshot;

/**
 * The "snapshots" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fileService = new Google\Service\CloudFilestore(...);
 *   $snapshots = $fileService->snapshots;
 *  </code>
 */
class ProjectsLocationsInstancesSnapshots extends \Google\Service\Resource
{
  /**
   * Creates a snapshot. (snapshots.create)
   *
   * @param string $parent Required. The Filestore Instance to create the
   * snapshots of, in the format
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`
   * @param Snapshot $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string snapshotId Required. The ID to use for the snapshot. The ID
   * must be unique within the specified instance. This value must start with a
   * lowercase letter followed by up to 62 lowercase letters, numbers, or hyphens,
   * and cannot end with a hyphen.
   * @return Operation
   */
  public function create($parent, Snapshot $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a snapshot. (snapshots.delete)
   *
   * @param string $name Required. The snapshot resource name, in the format `proj
   * ects/{project_id}/locations/{location}/instances/{instance_id}/snapshots/{sna
   * pshot_id}`
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
   * Gets the details of a specific snapshot. (snapshots.get)
   *
   * @param string $name Required. The snapshot resource name, in the format `proj
   * ects/{project_id}/locations/{location}/instances/{instance_id}/snapshots/{sna
   * pshot_id}`
   * @param array $optParams Optional parameters.
   * @return Snapshot
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Snapshot::class);
  }
  /**
   * Lists all snapshots in a project for either a specified location or for all
   * locations. (snapshots.listProjectsLocationsInstancesSnapshots)
   *
   * @param string $parent Required. The instance for which to retrieve snapshot
   * information, in the format
   * `projects/{project_id}/locations/{location}/instances/{instance_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter List filter.
   * @opt_param string orderBy Sort results. Supported values are "name", "name
   * desc" or "" (unsorted).
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The next_page_token value to use if there are
   * additional results to retrieve for this list request.
   * @return ListSnapshotsResponse
   */
  public function listProjectsLocationsInstancesSnapshots($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSnapshotsResponse::class);
  }
  /**
   * Updates the settings of a specific snapshot. (snapshots.patch)
   *
   * @param string $name Output only. The resource name of the snapshot, in the
   * format `projects/{project_id}/locations/{location_id}/instances/{instance_id}
   * /snapshots/{snapshot_id}`.
   * @param Snapshot $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field.
   * @return Operation
   */
  public function patch($name, Snapshot $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsInstancesSnapshots::class, 'Google_Service_CloudFilestore_Resource_ProjectsLocationsInstancesSnapshots');
