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
 * The "snapshots" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $snapshots = $dataflowService->snapshots;
 *  </code>
 */
class Google_Service_Dataflow_Resource_ProjectsLocationsSnapshots extends Google_Service_Resource
{
  /**
   * Deletes a snapshot. (snapshots.delete)
   *
   * @param string $projectId The ID of the Cloud Platform project that the
   * snapshot belongs to.
   * @param string $location The location that contains this snapshot.
   * @param string $snapshotId The ID of the snapshot.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_DeleteSnapshotResponse
   */
  public function delete($projectId, $location, $snapshotId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'location' => $location, 'snapshotId' => $snapshotId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dataflow_DeleteSnapshotResponse");
  }
  /**
   * Gets information about a snapshot. (snapshots.get)
   *
   * @param string $projectId The ID of the Cloud Platform project that the
   * snapshot belongs to.
   * @param string $location The location that contains this snapshot.
   * @param string $snapshotId The ID of the snapshot.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_Snapshot
   */
  public function get($projectId, $location, $snapshotId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'location' => $location, 'snapshotId' => $snapshotId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dataflow_Snapshot");
  }
  /**
   * Lists snapshots. (snapshots.listProjectsLocationsSnapshots)
   *
   * @param string $projectId The project ID to list snapshots for.
   * @param string $location The location to list snapshots in.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string jobId If specified, list snapshots created from this job.
   * @return Google_Service_Dataflow_ListSnapshotsResponse
   */
  public function listProjectsLocationsSnapshots($projectId, $location, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'location' => $location);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dataflow_ListSnapshotsResponse");
  }
}
