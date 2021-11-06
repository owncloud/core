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

namespace Google\Service\CloudDebugger\Resource;

use Google\Service\CloudDebugger\ListDebuggeesResponse;

/**
 * The "debuggees" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouddebuggerService = new Google\Service\CloudDebugger(...);
 *   $debuggees = $clouddebuggerService->debuggees;
 *  </code>
 */
class DebuggerDebuggees extends \Google\Service\Resource
{
  /**
   * Lists all the debuggees that the user has access to.
   * (debuggees.listDebuggerDebuggees)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientVersion Required. The client version making the call.
   * Schema: `domain/type/version` (e.g., `google.com/intellij/v1`).
   * @opt_param bool includeInactive When set to `true`, the result includes all
   * debuggees. Otherwise, the result includes only debuggees that are active.
   * @opt_param string project Required. Project number of a Google Cloud project
   * whose debuggees to list.
   * @return ListDebuggeesResponse
   */
  public function listDebuggerDebuggees($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDebuggeesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DebuggerDebuggees::class, 'Google_Service_CloudDebugger_Resource_DebuggerDebuggees');
