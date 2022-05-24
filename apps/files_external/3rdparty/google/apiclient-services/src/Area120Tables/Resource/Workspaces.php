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

namespace Google\Service\Area120Tables\Resource;

use Google\Service\Area120Tables\ListWorkspacesResponse;
use Google\Service\Area120Tables\Workspace;

/**
 * The "workspaces" collection of methods.
 * Typical usage is:
 *  <code>
 *   $area120tablesService = new Google\Service\Area120Tables(...);
 *   $workspaces = $area120tablesService->workspaces;
 *  </code>
 */
class Workspaces extends \Google\Service\Resource
{
  /**
   * Gets a workspace. Returns NOT_FOUND if the workspace does not exist.
   * (workspaces.get)
   *
   * @param string $name Required. The name of the workspace to retrieve. Format:
   * workspaces/{workspace}
   * @param array $optParams Optional parameters.
   * @return Workspace
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Workspace::class);
  }
  /**
   * Lists workspaces for the user. (workspaces.listWorkspaces)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of workspaces to return. The
   * service may return fewer than this value. If unspecified, at most 10
   * workspaces are returned. The maximum value is 25; values above 25 are coerced
   * to 25.
   * @opt_param string pageToken A page token, received from a previous
   * `ListWorkspaces` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListWorkspaces` must match the
   * call that provided the page token.
   * @return ListWorkspacesResponse
   */
  public function listWorkspaces($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListWorkspacesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Workspaces::class, 'Google_Service_Area120Tables_Resource_Workspaces');
