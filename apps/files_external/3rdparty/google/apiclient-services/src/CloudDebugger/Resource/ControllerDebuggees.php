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

use Google\Service\CloudDebugger\RegisterDebuggeeRequest;
use Google\Service\CloudDebugger\RegisterDebuggeeResponse;

/**
 * The "debuggees" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouddebuggerService = new Google\Service\CloudDebugger(...);
 *   $debuggees = $clouddebuggerService->debuggees;
 *  </code>
 */
class ControllerDebuggees extends \Google\Service\Resource
{
  /**
   * Registers the debuggee with the controller service. All agents attached to
   * the same application must call this method with exactly the same request
   * content to get back the same stable `debuggee_id`. Agents should call this
   * method again whenever `google.rpc.Code.NOT_FOUND` is returned from any
   * controller method. This protocol allows the controller service to disable
   * debuggees, recover from data loss, or change the `debuggee_id` format. Agents
   * must handle `debuggee_id` value changing upon re-registration.
   * (debuggees.register)
   *
   * @param RegisterDebuggeeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return RegisterDebuggeeResponse
   */
  public function register(RegisterDebuggeeRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('register', [$params], RegisterDebuggeeResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ControllerDebuggees::class, 'Google_Service_CloudDebugger_Resource_ControllerDebuggees');
