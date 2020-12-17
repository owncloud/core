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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $projects = $dataflowService->projects;
 *  </code>
 */
class Google_Service_Dataflow_Resource_Projects extends Google_Service_Resource
{
  /**
   * Deletes a snapshot. (projects.deleteSnapshots)
   *
   * @param string $projectId The ID of the Cloud Platform project that the
   * snapshot belongs to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The location that contains this snapshot.
   * @opt_param string snapshotId The ID of the snapshot.
   * @return Google_Service_Dataflow_DeleteSnapshotResponse
   */
  public function deleteSnapshots($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('deleteSnapshots', array($params), "Google_Service_Dataflow_DeleteSnapshotResponse");
  }
  /**
   * Send a worker_message to the service. (projects.workerMessages)
   *
   * @param string $projectId The project to send the WorkerMessages to.
   * @param Google_Service_Dataflow_SendWorkerMessagesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_SendWorkerMessagesResponse
   */
  public function workerMessages($projectId, Google_Service_Dataflow_SendWorkerMessagesRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('workerMessages', array($params), "Google_Service_Dataflow_SendWorkerMessagesResponse");
  }
}
