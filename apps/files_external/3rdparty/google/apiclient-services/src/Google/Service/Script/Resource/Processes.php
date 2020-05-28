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
 * The "processes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $scriptService = new Google_Service_Script(...);
 *   $processes = $scriptService->processes;
 *  </code>
 */
class Google_Service_Script_Resource_Processes extends Google_Service_Resource
{
  /**
   * List information about processes made by or on behalf of a user, such as
   * process type and current status. (processes.listProcesses)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userProcessFilter.startTime Optional field used to limit
   * returned processes to those that were started on or after the given
   * timestamp.
   * @opt_param string userProcessFilter.projectName Optional field used to limit
   * returned processes to those originating from projects with project names
   * containing a specific string.
   * @opt_param string userProcessFilter.userAccessLevels Optional field used to
   * limit returned processes to those having one of the specified user access
   * levels.
   * @opt_param string userProcessFilter.functionName Optional field used to limit
   * returned processes to those originating from a script function with the given
   * function name.
   * @opt_param string userProcessFilter.scriptId Optional field used to limit
   * returned processes to those originating from projects with a specific script
   * ID.
   * @opt_param string userProcessFilter.types Optional field used to limit
   * returned processes to those having one of the specified process types.
   * @opt_param string userProcessFilter.statuses Optional field used to limit
   * returned processes to those having one of the specified process statuses.
   * @opt_param string userProcessFilter.deploymentId Optional field used to limit
   * returned processes to those originating from projects with a specific
   * deployment ID.
   * @opt_param string pageToken The token for continuing a previous list request
   * on the next page. This should be set to the value of `nextPageToken` from a
   * previous response.
   * @opt_param string userProcessFilter.endTime Optional field used to limit
   * returned processes to those that completed on or before the given timestamp.
   * @opt_param int pageSize The maximum number of returned processes per page of
   * results. Defaults to 50.
   * @return Google_Service_Script_ListUserProcessesResponse
   */
  public function listProcesses($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Script_ListUserProcessesResponse");
  }
  /**
   * List information about a script's executed processes, such as process type
   * and current status. (processes.listScriptProcesses)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The token for continuing a previous list request
   * on the next page. This should be set to the value of `nextPageToken` from a
   * previous response.
   * @opt_param int pageSize The maximum number of returned processes per page of
   * results. Defaults to 50.
   * @opt_param string scriptProcessFilter.endTime Optional field used to limit
   * returned processes to those that completed on or before the given timestamp.
   * @opt_param string scriptProcessFilter.userAccessLevels Optional field used to
   * limit returned processes to those having one of the specified user access
   * levels.
   * @opt_param string scriptProcessFilter.statuses Optional field used to limit
   * returned processes to those having one of the specified process statuses.
   * @opt_param string scriptProcessFilter.functionName Optional field used to
   * limit returned processes to those originating from a script function with the
   * given function name.
   * @opt_param string scriptProcessFilter.startTime Optional field used to limit
   * returned processes to those that were started on or after the given
   * timestamp.
   * @opt_param string scriptProcessFilter.deploymentId Optional field used to
   * limit returned processes to those originating from projects with a specific
   * deployment ID.
   * @opt_param string scriptId The script ID of the project whose processes are
   * listed.
   * @opt_param string scriptProcessFilter.types Optional field used to limit
   * returned processes to those having one of the specified process types.
   * @return Google_Service_Script_ListScriptProcessesResponse
   */
  public function listScriptProcesses($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('listScriptProcesses', array($params), "Google_Service_Script_ListScriptProcessesResponse");
  }
}
