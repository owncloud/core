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
 * The "v2" collection of methods.
 * Typical usage is:
 *  <code>
 *   $remotebuildexecutionService = new Google_Service_RemoteBuildExecution(...);
 *   $v2 = $remotebuildexecutionService->v2;
 *  </code>
 */
class Google_Service_RemoteBuildExecution_Resource_V2 extends Google_Service_Resource
{
  /**
   * GetCapabilities returns the server capabilities configuration of the remote
   * endpoint. Only the capabilities of the services supported by the endpoint
   * will be returned: * Execution + CAS + Action Cache endpoints should return
   * both CacheCapabilities and ExecutionCapabilities. * Execution only endpoints
   * should return ExecutionCapabilities. * CAS + Action Cache only endpoints
   * should return CacheCapabilities. (v2.getCapabilities)
   *
   * @param string $instanceName The instance of the execution system to operate
   * against. A server may support multiple instances of the execution system
   * (with their own workers, storage, caches, etc.). The server MAY require use
   * of this field to select between them in an implementation-defined fashion,
   * otherwise it can be omitted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ServerCapabilities
   */
  public function getCapabilities($instanceName, $optParams = array())
  {
    $params = array('instanceName' => $instanceName);
    $params = array_merge($params, $optParams);
    return $this->call('getCapabilities', array($params), "Google_Service_RemoteBuildExecution_BuildBazelRemoteExecutionV2ServerCapabilities");
  }
}
