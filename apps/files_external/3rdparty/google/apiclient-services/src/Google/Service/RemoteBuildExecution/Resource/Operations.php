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
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $remotebuildexecutionService = new Google_Service_RemoteBuildExecution(...);
 *   $operations = $remotebuildexecutionService->operations;
 *  </code>
 */
class Google_Service_RemoteBuildExecution_Resource_Operations extends Google_Service_Resource
{
  /**
   * Wait for an execution operation to complete. When the client initially makes
   * the request, the server immediately responds with the current status of the
   * execution. The server will leave the request stream open until the operation
   * completes, and then respond with the completed operation. The server MAY
   * choose to stream additional updates as execution progresses, such as to
   * provide an update as to the state of the execution.
   * (operations.waitExecution)
   *
   * @param string $name The name of the Operation returned by Execute.
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2WaitExecutionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RemoteBuildExecution_GoogleLongrunningOperation
   */
  public function waitExecution($name, Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2WaitExecutionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('waitExecution', array($params), "Google_Service_RemoteBuildExecution_GoogleLongrunningOperation");
  }
}
