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

namespace Google\Service\RemoteBuildExecution\Resource;

use Google\Service\RemoteBuildExecution\BuildBazelRemoteExecutionV2ServerCapabilities;

/**
 * The "v2" collection of methods.
 * Typical usage is:
 *  <code>
 *   $remotebuildexecutionService = new Google\Service\RemoteBuildExecution(...);
 *   $v2 = $remotebuildexecutionService->v2;
 *  </code>
 */
class V2 extends \Google\Service\Resource
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
   * @return BuildBazelRemoteExecutionV2ServerCapabilities
   */
  public function getCapabilities($instanceName, $optParams = [])
  {
    $params = ['instanceName' => $instanceName];
    $params = array_merge($params, $optParams);
    return $this->call('getCapabilities', [$params], BuildBazelRemoteExecutionV2ServerCapabilities::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(V2::class, 'Google_Service_RemoteBuildExecution_Resource_V2');
