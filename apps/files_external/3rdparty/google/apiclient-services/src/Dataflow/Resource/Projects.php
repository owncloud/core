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

namespace Google\Service\Dataflow\Resource;

use Google\Service\Dataflow\DeleteSnapshotResponse;
use Google\Service\Dataflow\SendWorkerMessagesRequest;
use Google\Service\Dataflow\SendWorkerMessagesResponse;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google\Service\Dataflow(...);
 *   $projects = $dataflowService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
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
   * @return DeleteSnapshotResponse
   */
  public function deleteSnapshots($projectId, $optParams = [])
  {
    $params = ['projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('deleteSnapshots', [$params], DeleteSnapshotResponse::class);
  }
  /**
   * Send a worker_message to the service. (projects.workerMessages)
   *
   * @param string $projectId The project to send the WorkerMessages to.
   * @param SendWorkerMessagesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SendWorkerMessagesResponse
   */
  public function workerMessages($projectId, SendWorkerMessagesRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('workerMessages', [$params], SendWorkerMessagesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_Dataflow_Resource_Projects');
