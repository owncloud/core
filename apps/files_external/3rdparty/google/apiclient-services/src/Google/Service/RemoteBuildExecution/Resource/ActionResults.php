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
 * The "actionResults" collection of methods.
 * Typical usage is:
 *  <code>
 *   $remotebuildexecutionService = new Google_Service_RemoteBuildExecution(...);
 *   $actionResults = $remotebuildexecutionService->actionResults;
 *  </code>
 */
class Google_Service_RemoteBuildExecution_Resource_ActionResults extends Google_Service_Resource
{
  /**
   * Retrieve a cached execution result. Implementations SHOULD ensure that any
   * blobs referenced from the ContentAddressableStorage are available at the time
   * of returning the ActionResult and will be for some period of time afterwards.
   * The lifetimes of the referenced blobs SHOULD be increased if necessary and
   * applicable. Errors: * `NOT_FOUND`: The requested `ActionResult` is not in the
   * cache. (actionResults.get)
   *
   * @param string $instanceName The instance of the execution system to operate
   * against. A server may support multiple instances of the execution system
   * (with their own workers, storage, caches, etc.). The server MAY require use
   * of this field to select between them in an implementation-defined fashion,
   * otherwise it can be omitted.
   * @param string $hash The hash. In the case of SHA-256, it will always be a
   * lowercase hex string exactly 64 characters long.
   * @param string $sizeBytes The size of the blob, in bytes.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string inlineOutputFiles A hint to the server to inline the
   * contents of the listed output files. Each path needs to exactly match one
   * file path in either `output_paths` or `output_files` (DEPRECATED since v2.1)
   * in the Command message.
   * @opt_param bool inlineStderr A hint to the server to request inlining stderr
   * in the ActionResult message.
   * @opt_param bool inlineStdout A hint to the server to request inlining stdout
   * in the ActionResult message.
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult
   */
  public function get($instanceName, $hash, $sizeBytes, $optParams = array())
  {
    $params = array('instanceName' => $instanceName, 'hash' => $hash, 'sizeBytes' => $sizeBytes);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult");
  }
  /**
   * Upload a new execution result. In order to allow the server to perform access
   * control based on the type of action, and to assist with client debugging, the
   * client MUST first upload the Action that produced the result, along with its
   * Command, into the `ContentAddressableStorage`. Server implementations MAY
   * modify the `UpdateActionResultRequest.action_result` and return an equivalent
   * value. Errors: * `INVALID_ARGUMENT`: One or more arguments are invalid. *
   * `FAILED_PRECONDITION`: One or more errors occurred in updating the action
   * result, such as a missing command or action. * `RESOURCE_EXHAUSTED`: There is
   * insufficient storage space to add the entry to the cache.
   * (actionResults.update)
   *
   * @param string $instanceName The instance of the execution system to operate
   * against. A server may support multiple instances of the execution system
   * (with their own workers, storage, caches, etc.). The server MAY require use
   * of this field to select between them in an implementation-defined fashion,
   * otherwise it can be omitted.
   * @param string $hash The hash. In the case of SHA-256, it will always be a
   * lowercase hex string exactly 64 characters long.
   * @param string $sizeBytes The size of the blob, in bytes.
   * @param Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int resultsCachePolicy.priority The priority (relative importance)
   * of this content in the overall cache. Generally, a lower value means a longer
   * retention time or other advantage, but the interpretation of a given value is
   * server-dependent. A priority of 0 means a *default* value, decided by the
   * server. The particular semantics of this field is up to the server. In
   * particular, every server will have their own supported range of priorities,
   * and will decide how these map into retention/eviction policy.
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult
   */
  public function update($instanceName, $hash, $sizeBytes, Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult $postBody, $optParams = array())
  {
    $params = array('instanceName' => $instanceName, 'hash' => $hash, 'sizeBytes' => $sizeBytes, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ActionResult");
  }
}
