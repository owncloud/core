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

use Google\Service\CloudDebugger\Breakpoint;
use Google\Service\CloudDebugger\ClouddebuggerEmpty;
use Google\Service\CloudDebugger\GetBreakpointResponse;
use Google\Service\CloudDebugger\ListBreakpointsResponse;
use Google\Service\CloudDebugger\SetBreakpointResponse;

/**
 * The "breakpoints" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouddebuggerService = new Google\Service\CloudDebugger(...);
 *   $breakpoints = $clouddebuggerService->breakpoints;
 *  </code>
 */
class DebuggerDebuggeesBreakpoints extends \Google\Service\Resource
{
  /**
   * Deletes the breakpoint from the debuggee. (breakpoints.delete)
   *
   * @param string $debuggeeId Required. ID of the debuggee whose breakpoint to
   * delete.
   * @param string $breakpointId Required. ID of the breakpoint to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientVersion Required. The client version making the call.
   * Schema: `domain/type/version` (e.g., `google.com/intellij/v1`).
   * @return ClouddebuggerEmpty
   */
  public function delete($debuggeeId, $breakpointId, $optParams = [])
  {
    $params = ['debuggeeId' => $debuggeeId, 'breakpointId' => $breakpointId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ClouddebuggerEmpty::class);
  }
  /**
   * Gets breakpoint information. (breakpoints.get)
   *
   * @param string $debuggeeId Required. ID of the debuggee whose breakpoint to
   * get.
   * @param string $breakpointId Required. ID of the breakpoint to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientVersion Required. The client version making the call.
   * Schema: `domain/type/version` (e.g., `google.com/intellij/v1`).
   * @return GetBreakpointResponse
   */
  public function get($debuggeeId, $breakpointId, $optParams = [])
  {
    $params = ['debuggeeId' => $debuggeeId, 'breakpointId' => $breakpointId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GetBreakpointResponse::class);
  }
  /**
   * Lists all breakpoints for the debuggee.
   * (breakpoints.listDebuggerDebuggeesBreakpoints)
   *
   * @param string $debuggeeId Required. ID of the debuggee whose breakpoints to
   * list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action.value Only breakpoints with the specified action
   * will pass the filter.
   * @opt_param string clientVersion Required. The client version making the call.
   * Schema: `domain/type/version` (e.g., `google.com/intellij/v1`).
   * @opt_param bool includeAllUsers When set to `true`, the response includes the
   * list of breakpoints set by any user. Otherwise, it includes only breakpoints
   * set by the caller.
   * @opt_param bool includeInactive When set to `true`, the response includes
   * active and inactive breakpoints. Otherwise, it includes only active
   * breakpoints.
   * @opt_param bool stripResults This field is deprecated. The following fields
   * are always stripped out of the result: `stack_frames`,
   * `evaluated_expressions` and `variable_table`.
   * @opt_param string waitToken A wait token that, if specified, blocks the call
   * until the breakpoints list has changed, or a server selected timeout has
   * expired. The value should be set from the last response. The error code
   * `google.rpc.Code.ABORTED` (RPC) is returned on wait timeout, which should be
   * called again with the same `wait_token`.
   * @return ListBreakpointsResponse
   */
  public function listDebuggerDebuggeesBreakpoints($debuggeeId, $optParams = [])
  {
    $params = ['debuggeeId' => $debuggeeId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBreakpointsResponse::class);
  }
  /**
   * Sets the breakpoint to the debuggee. (breakpoints.set)
   *
   * @param string $debuggeeId Required. ID of the debuggee where the breakpoint
   * is to be set.
   * @param Breakpoint $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string canaryOption The canary option set by the user upon setting
   * breakpoint.
   * @opt_param string clientVersion Required. The client version making the call.
   * Schema: `domain/type/version` (e.g., `google.com/intellij/v1`).
   * @return SetBreakpointResponse
   */
  public function set($debuggeeId, Breakpoint $postBody, $optParams = [])
  {
    $params = ['debuggeeId' => $debuggeeId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('set', [$params], SetBreakpointResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DebuggerDebuggeesBreakpoints::class, 'Google_Service_CloudDebugger_Resource_DebuggerDebuggeesBreakpoints');
